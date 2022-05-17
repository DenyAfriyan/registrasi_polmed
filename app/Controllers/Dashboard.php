<?php

namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\UserModel;
use App\Models\UsersModel;
use App\Models\UserMetadataModel;

class Dashboard extends BaseController
{
    protected $adminModels;
    protected $userModel;
    protected $usersModel;
    protected $userMetadataModel;
    
    public function __construct(){
        
        $this->adminModels = new AdminModels();
        $this->userModel = new UserModel();
        $this->usersModel = new UsersModel();
        $this->userMetaModel = new UserMetadataModel();
        
        helper(['url','form']);
        
        $loggedUser = session()->get('loggedUser');
        $this->userInfo = $this->userModel->find($loggedUser);
        $this->db      = \Config\Database::connect();
    }
    
    public function index()
    {
        $countMahasiswa = $this->usersModel->count_mahasiswa()->countAllResults();
        $countPerubahanUkt = $this->usersModel->count_perubahan_ukt()->countAllResults();
        $countBelumDivalidasi = $this->usersModel->count_belum_divalidasi()->countAllResults();
        $data =[
            'title' => 'Dashboard - Admin',
            'userInfo' => $this->userInfo,
            'countMahasiswa' => $countMahasiswa,
            'countPerubahanUkt' => $countPerubahanUkt,
            'countBelumDivalidasi' => $countBelumDivalidasi
            
            ];
            if ($this->userInfo['role'] == 'Admin'){
           
        return view('dashboard/index',$data);
            }else{
                return view('mahasiswa/index',$data);
            }
    }
    
    /*public function validasi_ukt(){
        $data_user = $this->usersModel->getUsers()->getResult();
        $data =[
            'title' => 'validasi - Admin',
            'data_user' => $data_user 
            ];
        return view('dashboard/admin-validasi-ukt',$data);
    }*/
    
     public function perubahan_ukt(){
        $data_user = $this->usersModel->getUsers()->getResult();
        $data =[
            'title' => 'validasi - Admin',
            'data_user' => $data_user,
            'userInfo' => $this->userInfo,
            ];
        return view('dashboard/admin-perubahan-ukt',$data);
    }
    
    public function biodata_mahasiswa(){
        $data_user = $this->usersModel->getUsers()->getResult();
        $data =[
            'title' => 'validasi - Admin',
            'data_user' => $data_user,
            'userInfo' => $this->userInfo,
            ];
        return view('dashboard/admin-biodata-mahasiswa',$data);
    }
    public function tes_table(){
        $data_user = $this->usersModel->getUsers()->getResult();
        $data =[
            'title' => 'validasi - Admin',
            'data_user' => $data_user,
            'userInfo' => $this->userInfo,
            ];
        return view('dashboard/admin-tes_table',$data);
    }
    
    public function detail_validasi_ukt($id)
    {
        $data_user = $this->usersModel->getUsersById($id)->getRow();
        
		$data = [
		    'title'=> 'Detail Validasi - Admin',

		    'users' => $data_user,
		    'userInfo' => $this->userInfo,
		    ];
		
		 return view('dashboard/admin-detail-validasi-ukt',$data);

    }
    public function simpan_validasi_ukt($id)
    {
        
        $data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;
      	$builder = $this->db->table('user_metadata');
        $data = [
          'biaya' => $this->request->getVar('biaya')
        ];
      	$builder->set($data);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();
      
       $builder = $this->db->table('user');
        $data1 = [
          'status_perubahan' => 1,
          'status_disetujui' =>1
        ];
      	$builder->set($data1);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();
    
        return redirect()->to('/dashboard/perubahan_ukt/')->with('success','Perubahan UKT telah disetujui');
    }
    
    public function tolak_validasi_ukt($id)
    {
        $data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;
        $this->usersModel->updateTolakByNoPendaftaran() 
        ->where ('no_pendaftaran',$no_pendaftaran)
        ->update();
        $data =[
                'id'     => $id,
                'userInfo' => $this->userInfo,
            ];

        return redirect()->to('/dashboard/perubahan_ukt/')->with('danger','Perubahan UKT telah ditolak');
    }
    
    public function detail_biodata_mahasiswa($id){
        $data_user = $this->usersModel->getUsersById($id)->getRow();
       
        
		$data = [
		    'title'=> 'Detail Validasi - Admin',

		    'users' => $data_user,
		    'userInfo' => $this->userInfo,
		    ];
		
		 return view('dashboard/admin-detail-biodata-mahasiswa',$data);

    }
  public function status_mahasiswa(){
        $data_user = $this->usersModel->getUsers()->getResult();
        $data =[
            'title' => 'validasi - Admin',
            'data_user' => $data_user,
            'userInfo' => $this->userInfo,
            ];
        return view('dashboard/admin-status-mahasiswa',$data);
    }
}