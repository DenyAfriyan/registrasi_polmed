<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserSurveiModel;
use App\Models\UserMetadataModel;
use App\Models\UsersFileModel;
use App\Models\UserPaymentModel;
use App\Models\UsersModel;
use App\Libraries\Hash;
use PHPExcel;
use PHPExcel_IOFactory;

class Admin extends BaseController
{
    protected $userModel;
    protected $userSurveiModel;
    protected $userMetadataModel;
    protected $userFileModel;
    protected $userPaymentModel;
    protected $usersModel;
    
	public function __construct()
	{
        $this->userModel = new UserModel();
        $this->userSurveiModel = new UserSurveiModel();
        $this->userMetadataModel = new UserMetadataModel();
        $this->userFileModel = new UsersFileModel();
        $this->userPaymentModel = new UserPaymentModel();
        $this->usersModel = new UsersModel();
      
        helper(['url','form']);
        
        $loggedUser = session()->get('loggedUser');
        $this->userInfo = $this->userModel->find($loggedUser);
      
        $this->db = \Config\Database::connect();
        $this->builderUser = $this->db->table('user');
    }
    
    public function import_akun()
    {
        $data = [
            'mainTitle' => 'Daftar Akun',
            'title' => 'Import Akun',
			'userInfo' => $this->userInfo,
			//'pemberitahuan' => $this->pemberitahuan,
            'validation' => \Config\Services::validation(),
        ];
        
        return view('dashboard/admin-import-akun', $data);
    }
    
    public function importing_akun()
	{
        if(!$this->validate([
            'file_excel' => [
                'rules' => 'uploaded[file_excel]',
                'errors' => [
                    'uploaded' => 'Pilih file Excel terlebih dahulu'
                ]
            ]
        ])) {
            return redirect()->to('/admin/import_akun')->withInput();
        }
      	
        $this->builderUser->selectMax('id');
        $query = $this->builderUser->get()->getRowArray();
        $lastId = $query['id'];
      
		$file = $this->request->getFile('file_excel');
		if($file){
			$excelReader  = new PHPExcel();
			//mengambil lokasi temp file
			$fileLocation = $file->getTempName();
			//baca file
			$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
			//ambil sheet active
			$sheet	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			//looping untuk mengambil data
			foreach ($sheet as $idx => $data) {
				//skip index 1 karena title excel
				if( $idx==1 ){
					continue;
				}
				
				// insert user 
				$this->userModel->insert([
					'no_pendaftaran' => $data['B'],
					'password' => Hash::make($data['C']),
					'foto_profil' => 'default.png',
					'nama_lengkap' => $data['D'],
					'program_studi' => $data['E'],
					'role' => 'User',
				]);
				
				// insert user survei
				$this->userSurveiModel->insert([
					'no_pendaftaran' => $data['B']
				]);
				
				// insert user metadata
				$this->userMetadataModel->insert([
					'no_pendaftaran' => $data['B'],
					'peserta_kipk' => $data['F']
				]);
				
				// insert user file
				$this->userFileModel->insert([
					'no_pendaftaran' => $data['B']
				]);
				
				// insert user payment
				$this->userPaymentModel->insert([
					'no_pendaftaran' => $data['B']
				]);
			}
		}
		
		return redirect()->to('dashboard')->with('success','Data berhasil diimport'); 
	}
	
	public function exporting_status_mahasiswa()
	{
        $dataUser = $this->usersModel->getUsers()->getResult();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No')
        ->SetCellValue('B1', 'Nomor Pendaftaran')
        ->SetCellValue('C1', 'Nama Lengkap')
        ->SetCellValue('D1', 'Program Studi')
        ->SetCellValue('E1', 'Sudah Isi Survei')
        ->SetCellValue('F1', 'Sudah Bayar')
        ->SetCellValue('G1', 'Sudah Upload File');   
        
        // set Row
        $rowCount = 2;
        $no = 1;
        foreach ($dataUser as $data) {
          	$data->status_survei==1?$s1='sudah':$s1='belum';
            $data->ijazah==''?$s3='belum':$s3='sudah';
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $no++)
            ->SetCellValue('B' . $rowCount, $data->no_pendaftaran)
            ->SetCellValue('C' . $rowCount, $data->nama_lengkap)
            ->SetCellValue('D' . $rowCount, $data->program_studi)
            ->SetCellValue('E' . $rowCount, $s1)
            ->SetCellValue('F' . $rowCount, $data->status_pembayaran)
            ->SetCellValue('G' . $rowCount, $s3);
            $rowCount++;
        }
        $filename = "Reg_PoliMedia-Status_Mahasiswa ". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
	}
}