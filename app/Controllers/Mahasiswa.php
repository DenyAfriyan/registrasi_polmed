<?php

namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\UserModel;
use App\Models\UsersModel;
use App\Models\UserMetadataModel;
use App\Models\UserPaymentModel;
use App\Models\UsersFileModel;
use App\Models\UserSurveiModel;
use App\Models\UserProdiModel;
use App\Libraries\BniEnc;

class Mahasiswa extends BaseController
{
    protected $adminModels;
    protected $userModel;
    protected $usersModel;
    protected $userMetadataModel;
    protected $userPaymentModel;
    protected $usersFileModel;
    protected $userSurveiModel;
    protected $userProdiModel;
    
    public function __construct(){
        
        $this->adminModels = new AdminModels();
        $this->userModel = new UserModel();
        $this->usersModel = new UsersModel();
        $this->userMetaModel = new UserMetadataModel();
        $this->userPaymentModel = new UserPaymentModel();
        $this->usersFileModel = new UsersFileModel();
        $this->userSurveiModel = new UserSurveiModel();
        $this->userProdiModel = new UserProdiModel();
    
        helper(['url','form']);
    
        $loggedUser = session()->get('loggedUser');
        $this->userInfo = $this->userModel->find($loggedUser);
        $this->userMeta = $this->usersModel->getUsersById($loggedUser)->getRow();
        $this->userComplete = $this->usersModel->getUsersById($this->userInfo['id'])->getRow();
      	
		$this->db      = \Config\Database::connect();
		$this->builderUserPayment = $this->db->table('user_payment');
    }
    public function index()
    {
      
      	if(!session()->get('loggedUser')){
         	return redirect()->to('auth'); 
        }
      
        $id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow();
        
        $data =[
            'title' => 'Dashboard',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
            'data_user' => $data_user,
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'user' => $this->userModel->where('id',$id)->first(),
          	
            ];
        return view('mahasiswa/index',$data);
    }
  
  	public function survei()
    {
        $data_user = $this->usersModel->getUsers()->getResult();
        $id = $this->userInfo['id'];
      
      	if($this->userInfo['status_survei'] == 1){
         	return redirect()->to('mahasiswa/prodi'); 
        }
        
        $data =[
            'title' => 'Survei',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
            'data_user' => $data_user,
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'user' => $this->userModel->where('id',$id)->first()
            ];
        return view('/mahasiswa/user-survei',$data);
    }

    public function saveSurvei($id)
    {
    
    if(!$this->validate([
        'kenapa_memilih_polimedia' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'kenapa_memilih_program_studi_tersebut' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'darimana_mengetahui_polimedia' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'media_apa_yang_kamu_gunakan_jika_ada_pertanyaan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'Kemudahan_akses_pelayanan_informasi_selama_proses_PMB' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'Kelengkapan_informasi_selama_proses_PMB' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'Kejelasan_informasi_selama_proses_PMB' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'Kecepatan_respon_pelayanan_informasi_selama_proses_PMB' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        'Pelayanan_publik_selam_proses_PMB' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom harus diisi'
            ]
        ],
        ])) {
            return redirect()->to('/mahasiswa/survei')->withInput();
        };
      
      
       	$data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;
      
      	$builder = $this->db->table('user_survei');
        $data = [
          'kenapa_memilih_polimedia' => $this->request->getVar('kenapa_memilih_polimedia'),
          'kenapa_memilih_program_studi_tersebut' => $this->request->getVar('kenapa_memilih_program_studi_tersebut'),
          'darimana_mengetahui_polimedia' => $this->request->getVar('darimana_mengetahui_polimedia'),
          'media_apa_yang_kamu_gunakan_jika_ada_pertanyaan' => $this->request->getVar('media_apa_yang_kamu_gunakan_jika_ada_pertanyaan'),
          'Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia' => $this->request->getVar('Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia'),
          'Kemudahan_akses_pelayanan_informasi_selama_proses_PMB' => $this->request->getVar('Kemudahan_akses_pelayanan_informasi_selama_proses_PMB'),
          'Kelengkapan_informasi_selama_proses_PMB' => $this->request->getVar('Kelengkapan_informasi_selama_proses_PMB'),
          'Kejelasan_informasi_selama_proses_PMB' => $this->request->getVar('Kejelasan_informasi_selama_proses_PMB'),
          'Kecepatan_respon_pelayanan_informasi_selama_proses_PMB' => $this->request->getVar('Kecepatan_respon_pelayanan_informasi_selama_proses_PMB'),
          'Pelayanan_publik_selam_proses_PMB' => $this->request->getVar('Pelayanan_publik_selam_proses_PMB'),
        ];
      	$builder->set($data);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();
    
        $this->userModel->save([
          'id' => $id,
          'status_survei' => 1,
        ]);
    
        return redirect()->to('mahasiswa/prodi');
    }

    public function prodi(){
        $data_user = $this->usersModel->getUsers()->getResult();
        $id = $this->userInfo['id'];
        $program_studi = $this->userInfo['program_studi'];
        $prodi = $this->usersModel->getProdiByUser()->getWhere(['user.program_studi'=>$program_studi])->getRow();
      
      	if($this->userInfo['status_prodi'] == 1){
         	return redirect()->to('mahasiswa/kipk'); 
        }
    
        $data =[
            'title' => 'Prodi',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
        	'user' => $this->userModel->where('id',$id)->first(),
            'data_user' => $data_user,
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
          	'prodi' => $prodi
            ];
        return view('mahasiswa/user-prodi',$data);
    }

    public function saveProdi($id)
    {
        if(!$this->validate([
        'program_studi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom program studi harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/mahasiswa/prodi')->withInput();
        };

        $this->userModel->save([
            'id' => $id,
            'status_prodi' => 1,
        ]);
      
      	$data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;
      
        $builder = $this->db->table('user_metadata');
        $data = [
          'biaya' => $this->request->getVar('program_studi')
        ];
      	$builder->set($data);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();

            return redirect()->to('mahasiswa/kipk');
    }

    public function kipk(){
        $id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow(); 	
      
       	if($this->userInfo['status_kipk'] == 1){
         	return redirect()->to('mahasiswa/pembayaran_mahasiswa'); 
        }
      
        $data =[
            'title' => 'KIPK',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'users' => $data_user,
            ];
        return view('mahasiswa/user-kipk-duplicate',$data);
    }
    
     public function kipk_duplicate(){
        $id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow(); 	
      
       	if($this->userInfo['status_kipk'] == 1){
         	return redirect()->to('mahasiswa/pembayaran_mahasiswa'); 
        }
      
        $data =[
            'title' => 'KIPK',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'users' => $data_user,
            ];
        return view('mahasiswa/user-kipk-duplicate',$data);
    }
     public function kipk_perubahan_ukt(){
        $id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow(); 	
      
       	if($this->userInfo['status_kipk'] == 1){
         	return redirect()->to('mahasiswa/pembayaran_mahasiswa'); 
        }
      
        $data =[
            'title' => 'KIPK',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'users' => $data_user,
            ];
        return view('mahasiswa/user-kipk-perubahan-duplicate',$data);
    }

    public function saveKipk($id)
    {
      if(!$this->validate([
          'peserta-kipk' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Kolom KIPK harus diisi'
              ]
          ]
      ])) {
        return redirect()->to('/mahasiswa/kipk')->withInput();
      };
          
        $data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;   
    
      	//KIPK
        $data = explode( "," , $this->request->getVar('peserta-kipk'));
        $kipk = $data[0]; //T
        $perubahan_ukt = $data[1]; //1
      	$status_perubahan = $data[2]; //0
      
      	if($perubahan_ukt == 1){
             if(!$this->validate([
                'ppu' => [
                  'rules' => 'uploaded[ppu]|max_size[ppu,15360]|mime_in[ppu,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                      'errors' => [
                          'uploaded' => 'Upload berkas pengajuan perubahan pembayaran UKT terlebih dahulu',
                          'max_size' => 'Ukuran berkas terlalu besar',
                          'mime_in' => 'Ekstensi berkas tidak didukung'
                      ]
              ]
            ])) {
              return redirect()->to('/mahasiswa/kipk')->withInput();
            };

            //File PPU
            $filePpu = $this->request->getFile('ppu');

            if($filePpu->getError() == 4) {
              //$ktp = $this->request->getVar('ktp_lama');
            } else {
              // generate nama file random
              $ppu = $filePpu->getRandomName();
              // pindahkan file
              $filePpu->move('files/pdf/pengajuan-perubahan-ukt', $ppu);
            }
          
          $builder = $this->db->table('user_file');
          $data = [
            'ppu' => $ppu
          ];
          $builder->set($data);
          $builder->where ('no_pendaftaran',$no_pendaftaran);
          $builder->update();
          
        }
    
        $this->userModel->save([
            'id' => $id,
            'status_kipk' => 1,
          	'status_perubahan' => $status_perubahan,
            'perubahan_ukt' => $perubahan_ukt
        ]);
      
        $builder = $this->db->table('user_metadata');
        $data = [
          'peserta_kipk' => $kipk
        ];
      	$builder->set($data);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();

        if($perubahan_ukt == 1){
          	return redirect()->to('mahasiswa/pembayaran_Mahasiswa');
        } else {
        	return redirect()->to('mahasiswa/create_va');
        }
    }

   public function pembayaran_Mahasiswa()
    {
      	$id = session()->get('loggedUser');
        $data_user = $this->usersModel->getUsersById($id)->getRow();
      
        if($data_user->status_perubahan != 0){
          	return redirect()->to('mahasiswa/create_va');
        }
      
        $data =[
            'title' => 'Pembayaran Mahasiswa',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'data_user' => $data_user 
            ];
        return view('mahasiswa/user-maintenance-pembayaran',$data);
    }
  
  	public function pernyataanUkt(){
     	$id = session()->get('loggedUser');
        $data_user = $this->usersModel->getUsersById($id)->getRow();
      
        $data =[
            'title' => 'Pernyataan UKT',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'data_user' => $data_user 
            ];
        return view('mahasiswa/user-pernyataan-ukt',$data);
    }
  
  	public function savePernyataanUkt($id){
		if(!$this->validate([
                'spu' => [
                  'rules' => 'uploaded[spu]|max_size[spu,15360]|mime_in[spu,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                      'errors' => [
                          'uploaded' => 'Upload Surat Pernyataan UKT terlebih dahulu',
                          'max_size' => 'Ukuran berkas terlalu besar',
                          'mime_in' => 'Ekstensi berkas tidak didukung'
                      ]
              ]
            ])) {
              return redirect()->to('/mahasiswa/pernyataanUkt')->withInput();
            };
      
      
            $data_user = $this->usersModel->getUsersById($id)->getRow();
            $no_pendaftaran=$data_user->no_pendaftaran;

            //File PPU
            $fileSpu = $this->request->getFile('spu');

            if($fileSpu->getError() == 4) {
              //$ktp = $this->request->getVar('ktp_lama');
            } else {
              // generate nama file random
              $spu = $fileSpu->getRandomName();
              // pindahkan file
              $fileSpu->move('files/pdf/surat-pernyataan-ukt', $spu);
            }
          
          $builder = $this->db->table('user_file');
          $data = [
            'spu' => $spu
          ];
          $builder->set($data);
          $builder->where ('no_pendaftaran',$no_pendaftaran);
          $builder->update();
      
      	 $this->userModel->save([
              'id' => $id,
              'status_disetujui' => 0,
          ]);
      
      	return redirect()->to('mahasiswa/create_va');
          
    }
  
    public function biodata_diri(){
        $id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow(); 	
        
        $data =[
            'title' => 'Biodata Diri',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'users' => $data_user 
            ];

        return view('mahasiswa/user-biodata-diri',$data);     
    }

	public function saveBiodataDiri($id){
    if(!$this->validate([
       'tempat-lahir' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tempat lahir harus diisi'
            ]
        ],
       'tanggal-lahir' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal lahir harus diisi'
            ]
        ],
        'jenis-kelamin' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jenis kelamin harus diisi'
            ]
        ],
        'agama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Agama harus diisi'
            ]
        ],
        'nik' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NIK harus diisi'
            ]
        ],
        'nisn' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NISN harus diisi'
            ]
        ],
        //'npwp' => [
        //    'rules' => 'required',
        //    'errors' => [
        //        'required' => 'NISN harus diisi'
        //    ]
        //],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi'
            ]
        ],
        'kode-pos' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kode Pos harus diisi'
            ]
        ],
      	'kelurahan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kelurahan harus diisi'
            ]
        ],
        'kecamatan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kecamatan harus diisi'
            ]
        ],
        'kota-kab' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kota/Kabupaten Pos harus diisi'
            ]
        ],
        'provinsi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Provinsi harus diisi'
            ]
        ],
      	'tempat-tinggal' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tempat tinggal harus diisi'
            ]
        ],
       	'alat-transportasi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alat transportasi harus diisi'
            ]
        ],
       	'no-telp' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'No Telp harus diisi'
            ]
        ],
       	'no-whatsapp' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'No whatsapp harus diisi'
            ]
        ],
      	'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Email harus diisi'
            ]
        ],
       	'ukuran-almamater' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Ukuran almamater harus diisi'
            ]
        ],
       	'ukuran-baju-praktik' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Ukuran baju praktik harus diisi'
            ]
        ],
      
      	//Ayah
      	'nama-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama ayah harus diisi'
            ]
        ],
      	'nik-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NIK ayah harus diisi'
            ]
        ],
      	'tempat-lahir-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tempat lahir ayah harus diisi'
            ]
        ],
      	'tanggal-lahir-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal lahir ayah harus diisi'
            ]
        ],
      	'pendidikan-terakhir-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pendidikan terakhir ayah harus diisi'
            ]
        ],
      	'pekerjaan-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pekerjaan ayah harus diisi'
            ]
        ],
      	'penghasilan-ayah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Penghasilan ayah harus diisi'
            ]
        ],
      
      	//Ibu
        'nama-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama ibu harus diisi'
            ]
        ],
      	'nik-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NIK ibu harus diisi'
            ]
        ],
      	'tempat-lahir-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tempat lahir ibu harus diisi'
            ]
        ],
      	'tanggal-lahir-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal lahir ibu harus diisi'
            ]
        ],
      	'pendidikan-terakhir-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pendidikan terakhir ibu harus diisi'
            ]
        ],
      	'pekerjaan-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pekerjaan ibu harus diisi'
            ]
        ],
      	'penghasilan-ibu' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Penghasilan ibu harus diisi'
            ]
        ],
      
      
      	'asal-sekolah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Asal sekolah harus diisi'
            ]
        ],
      	'nama-sekolah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Asal sekolah harus diisi'
            ]
        ],
      	'provinsi-sekolah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Provinsi sekolah harus diisi'
            ]
        ],
      	'tahun-lulus' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tahun lulus harus diisi'
            ]
        ],
        ])) {
            return redirect()->to('/mahasiswa/biodata_diri')->withInput();
        };
    
        $data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;
      
        $builder = $this->db->table('user_metadata');
        $data = [
        'tempat_lahir' => $this->request->getVar('tempat-lahir'),
        'tanggal_lahir' => $this->request->getVar('tanggal-lahir'),
        'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
        'agama' => $this->request->getVar('agama'),
        'nik' => $this->request->getVar('nik'),
        'nisn' => $this->request->getVar('nisn'),
        'npwp' => $this->request->getVar('npwp'),
        'alamat' => $this->request->getVar('alamat'),
        'kode_pos' => $this->request->getVar('kode-pos'),
        'kelurahan' => $this->request->getVar('kelurahan'),
        'kecamatan' => $this->request->getVar('kecamatan'),
        'kota_kabupaten' => $this->request->getVar('kota-kab'),
        'provinsi' => $this->request->getVar('provinsi'),
        'tempat_tinggal' => $this->request->getVar('tempat-tinggal'),
        'alat_transportasi' => $this->request->getVar('alat-transportasi'),
        'no_telp' => $this->request->getVar('no-telp'),
        'no_whatsapp' => $this->request->getVar('no-whatsapp'),
        'email' => $this->request->getVar('email'),
        'ukuran_jas_almamater' => $this->request->getVar('ukuran-almamater'),
        'ukuran_baju_praktik' => $this->request->getVar('ukuran-baju-praktik'),
        
        'nama_ayah' => $this->request->getVar('nama-ayah'),
        'nik_ayah' => $this->request->getVar('nik-ayah'),
        'tempat_lahir_ayah' => $this->request->getVar('tempat-lahir-ayah'),
        'tanggal_lahir_ayah' => $this->request->getVar('tanggal-lahir-ayah'),
        'pendidikan_terakhir_ayah' => $this->request->getVar('pendidikan-terakhir-ayah'),
        'pekerjaan_ayah' => $this->request->getVar('pekerjaan-ayah'),
        'penghasilan_ayah' => $this->request->getVar('penghasilan-ayah'),
        
        'nama_ibu' => $this->request->getVar('nama-ibu'),
        'nik_ibu' => $this->request->getVar('nik-ibu'),
        'tempat_lahir_ibu' => $this->request->getVar('tempat-lahir-ibu'),
        'tanggal_lahir_ibu' => $this->request->getVar('tanggal-lahir-ibu'),
        'pendidikan_terakhir_ibu' => $this->request->getVar('pendidikan-terakhir-ibu'),
        'pekerjaan_ibu' => $this->request->getVar('pekerjaan-ibu'),
        'penghasilan_ibu' => $this->request->getVar('penghasilan-ibu'),
        
        'asal_sekolah' => $this->request->getVar('asal-sekolah'),
        'nama_sekolah' => $this->request->getVar('nama-sekolah'),
        'provinsi_sekolah' => $this->request->getVar('provinsi-sekolah'),
        'tahun_lulus' => $this->request->getVar('tahun-lulus'),
        ];
      	$builder->set($data);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();
    
        return redirect()->to('mahasiswa/upload_dokumen');
}

    public function upload_dokumen(){
        $id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow();
      
        $data =[
            'title' => 'Upload Dokumen',
            'userInfo' => $this->userInfo,
            'validation' => \Config\Services::validation(),
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
            'data_user' => $data_user 
            ];
        return view('mahasiswa/user-upload-dokumen',$data);
    }

    public function saveUploadDokumen($id){
    if(!$this->validate([
        'pas-foto' => [
            'rules' => 'uploaded[pas-foto]|max_size[pas-foto,15360]|mime_in[pas-foto,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/docx]',
                'errors' => [
                    'uploaded' => 'Pilih file Pas Foto terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                ]
        ],
        'ktp' => [
            'rules' => 'uploaded[ktp]|max_size[ktp,15360]|mime_in[ktp,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                'errors' => [
                    'uploaded' => 'Pilih file KTP terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                  ]
        ],
        'kk' => [
            'rules' => 'uploaded[kk]|max_size[kk,15360]|mime_in[kk,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                'errors' => [
                    'uploaded' => 'Pilih file KK terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                ]
         ],
        'ijazah' => [
            'rules' => 'uploaded[ijazah]|max_size[ijazah,15360]|mime_in[ijazah,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                'errors' => [
                    'uploaded' => 'Pilih file ijazah terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                ]
         ],
        'sksj' => [
            'rules' => 'uploaded[sksj]|max_size[sksj,15360]|mime_in[sksj,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                'errors' => [
                    'uploaded' => 'Pilih file surat keterangan bebas jasmani terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                ]
         ],
        'skbn' => [
            'rules' => 'uploaded[skbn]|max_size[skbn,15360]|mime_in[skbn,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                'errors' => [
                    'uploaded' => 'Pilih file Surat keterangan bebas narkoba terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                ]
         ],
        'sktbw' => [
            'rules' => 'uploaded[sktbw]|max_size[sktbw,15360]|mime_in[sktbw,application/pdf,application/zip,application/msword,application/x-tar,application/jpg,application/png,application/jpeg,application]',
                'errors' => [
                    'uploaded' => 'Pilih file surat keterangan bebas buta warna terlebih dahulu',
                    'max_size' => 'Ukuran berkas terlalu besar',
                    'mime_in' => 'Ekstensi berkas tidak didukung'
                ]
        ],
        ])) {
            return redirect()->to('/mahasiswa/upload_dokumen')->withInput();
        };
        
        $filePasFoto = $this->request->getFile('pas-foto');
        $fileKtp = $this->request->getFile('ktp');
        $fileKk = $this->request->getFile('kk');
        $fileIjazah = $this->request->getFile('ijazah');
        $fileSksj = $this->request->getFile('sksj');
        $fileSkbn = $this->request->getFile('skbn');
        $fileSktbw = $this->request->getFile('sktbw');
    
        // cek gambar, apakah tetap gambar lama
        if($filePasFoto->getError() == 4) {
            //$pasFoto = $this->request->getVar('pas_foto_lama');
        } else {
            // generate nama file random
            $pasFoto = $filePasFoto->getRandomName();
            // pindahkan file
            $filePasFoto->move('files/pdf/berkas-mahasiswa', $pasFoto);
        }
    
    if($fileKtp->getError() == 4) {
            //$ktp = $this->request->getVar('ktp_lama');
        } else {
            // generate nama file random
            $ktp = $fileKtp->getRandomName();
            // pindahkan file
            $fileKtp->move('files/pdf/berkas-mahasiswa', $ktp);
        }
    
    if($fileKk->getError() == 4) {
            //$ktp = $this->request->getVar('ktp_lama');
        } else {
            // generate nama file random
            $kk = $fileKk->getRandomName();
            // pindahkan file
            $fileKk->move('files/pdf/berkas-mahasiswa', $kk);
        }
    
        if($fileIjazah->getError() == 4) {
            //$ktp = $this->request->getVar('ktp_lama');
        } else {
            // generate nama file random
            $ijazah = $fileIjazah->getRandomName();
            // pindahkan file
            $fileIjazah->move('files/pdf/berkas-mahasiswa', $ijazah);
        }
    
        if($fileSksj->getError() == 4) {
            //$ktp = $this->request->getVar('ktp_lama');
        } else {
            // generate nama file random
            $sksj = $fileSksj->getRandomName();
            // pindahkan file
            $fileSksj->move('files/pdf/berkas-mahasiswa', $sksj);
        }
    
        if($fileSkbn->getError() == 4) {
            //$ktp = $this->request->getVar('ktp_lama');
        } else {
            // generate nama file random
            $skbn = $fileSkbn->getRandomName();
            // pindahkan file
            $fileSkbn->move('files/pdf/berkas-mahasiswa', $skbn);
        }
    
    if($fileSktbw->getError() == 4) {
            //$ktp = $this->request->getVar('ktp_lama');
        } else {
            // generate nama file random
            $sktbw = $fileSktbw->getRandomName();
            // pindahkan file
            $fileSktbw->move('files/pdf/berkas-mahasiswa', $sktbw);
        }    
      
       	$data_user = $this->usersModel->getUsersById($id)->getRow();
        $no_pendaftaran=$data_user->no_pendaftaran;
      
        $builder = $this->db->table('user_file');
        $data = [
           'pas_foto'=> $pasFoto,
            'ktp'=> $ktp,
            'kk'=> $kk,
            'ijazah'=> $ijazah,
            'pas_foto'=> $pasFoto,
            'sksj'=> $sksj,
            'skbn'=> $skbn,
            'sktbw'=> $sktbw,
        ];
      	$builder->set($data);
      	$builder->where ('no_pendaftaran',$no_pendaftaran);
        $builder->update();
    
        return redirect()->to('mahasiswa/finalisasiData');
    
    }

    public function downloadBerkasNonKIPK()
    {
    	return $this->response->download('images/berkas/' . "FORM PERMOHONAN UKT 2022 FINAL.docx", null);
    }
  
   	public function downloadFormRegist()
    {
    	return $this->response->download('files/pdf/form-registrasi-mahasiswa/' . "Form Registrasi Mahasiswa Baru.pdf", null);
    }
  
  	public function downloadSuratPernyataanUkt()
    {
    	return $this->response->download('files/pdf/surat-pernyataan-ukt/' . "SURAT PERNYATAAN UKT.pdf", null);
    }
  
  
  	public function finalisasiData()
    {
      	$id = session()->get('loggedUser');
      	$data_user = $this->usersModel->getUsersById($id)->getRow(); 	
      	
      	$data = [
        	'title' => "Finalisasi Data",
          	'users' => $data_user,
          	'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first(),
          	'userInfo' => $this->userInfo
        ];
          
        return view('mahasiswa/user-finalisasi-data', $data);
    }
  
  	public function saveFinalisasiData()
    {
 	 	$id = session()->get('loggedUser');
        $this->userModel->save([
            'id' => $id,
            'status_finalisasi' => 1
        ]);
      
      	return redirect()->to('mahasiswa/index');
    }
  
  	public function under_maintanance()
    {
      $data = [
        'title' => "Under Maintanance",
        'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first()
      ];
      
      return view('mahasiswa/under-maintanance');
    }
    
    // BNI API get content
    function get_content($url, $post = '') {
        $usecookie = __DIR__ . "/cookie.txt";
        $header[] = 'Content-Type: application/json';
        $header[] = "Accept-Encoding: gzip, deflate";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        // curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");
    
        if ($post)
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        $rs = curl_exec($ch);
    
        if(empty($rs)){
            var_dump($rs, curl_error($ch));
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        return $rs;
    }
    
    // Create VA - Membuat Virtual Account
    public function create_va()
    {
        // $userMetadata = $this->userMeta->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first();
		
        // FROM BNI
        $prefix = '988';
        $client_id = '91014';
        $secret_key = 'c6925cc294d7481111d6a04763af12bd';
        $url = 'https://api.bni-ecollection.com/';
        
        $data_asli = array(
            'client_id' => $client_id,
            'prefix' => $prefix,
            'trx_id' => mt_rand(), // fill with Billing ID
            'trx_amount' => $this->userComplete->biaya,
            'type' => 'createBilling',
            'billing_type' => 'c',
            'datetime_expired' => date('c', time() + 24 * 3600), // billing will 
            'virtual_account' => '',
            'customer_name' => $this->userInfo['nama_lengkap'],
            'customer_email' => '',
            'customer_phone' => '',
        );
        
        $hashed_string = BniEnc::encrypt(
            $data_asli,
            $client_id,
            $secret_key
        );
        
        $data = array(
            'client_id' => $client_id,
            'data' => $hashed_string,
        );
        
        $response = self::get_content($url, json_encode($data));
        $response_json = json_decode($response, true);
        
        if ($response_json['status'] !== '000') {
            // handling jika gagal
            var_dump($response_json);
        } else {
            $data_response = BniEnc::decrypt($response_json['data'], $client_id, $secret_key);
            // $data_response will contains something like this: 
            // array(
            // 	'virtual_account' => 'xxxxx',
            // 	'trx_id' => 'xxx',
            // );
            var_dump($data_response);
            
            
            $values = [
                'virtual_account' => $data_response['virtual_account'],
                'trx_id' => $data_response['trx_id'],
                'customer_name' => $data_asli['customer_name'],
                'trx_amount' => $data_asli['trx_amount'],
                'payment_amount' => '',
                'cumulative_payment_amount' => '',
                'payment_ntb' => '',
                'datetime_payment' => '',
                'datetime_payment_iso8601' => '',
                'datetime_expired' => $data_asli['datetime_expired'],
                'status_pembayaran' => 'Belum Dibayar',
            ];
            
            $this->userPaymentModel->update($this->userInfo['no_pendaftaran'], $values);
        }
        return redirect()->to('mahasiswa/pembayaran');
    }
    
  	// Inquiry VA - Melakukan pengecekan manual status pembayaran
    public function inquiry_va()
    {
		$query = $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first();
        
        // FROM BNI
        $prefix = '988';
        $client_id = '91014';
        $secret_key = 'c6925cc294d7481111d6a04763af12bd';
        $url = 'https://api.bni-ecollection.com/';
      	$trxId = $query['trx_id'];
      
      
        $data_asli = array(
            'client_id' => $client_id,
            'prefix' => $prefix,
            'trx_id' => $trxId,
            'type' => 'inquiryBilling',
        );
      	
        $hashed_string = BniEnc::encrypt(
            $data_asli,
            $client_id,
            $secret_key
        );
        
        $data = array(
            'client_id' => $client_id,
            'data' => $hashed_string,
        );
      
        $response = self::get_content($url, json_encode($data));
        $response_json = json_decode($response, true);
        
        if ($response_json['status'] !== '000') {
            // handling jika gagal
            var_dump($response_json);
        } else {
            $data_response = BniEnc::decrypt($response_json['data'], $client_id, $secret_key);
            // $data_response will contains something like this: 
            // array(
            // 	'virtual_account' => 'xxxxx',
            // 	'trx_id' => 'xxx',
            // );
            
            if ( $data_response['payment_amount'] == 0 ) {
                $status = 'Belum Dibayar';
            } else {
                $status = 'Lunas';
            }
            
            $values = [
                'payment_amount' => $data_response['payment_amount'],
                'payment_ntb' => $data_response['payment_ntb'],
                'datetime_payment' => $data_response['datetime_payment'],
                'datetime_payment_iso8601' => $data_response['datetime_payment_iso8601'],
              	'status_pembayaran' => $status
            ];
            
            $this->userPaymentModel->update($this->userInfo['no_pendaftaran'], $values);
        }
        return redirect()->to('mahasiswa/pembayaran');
    }
  
  	// Update VA - membuat kadaluarsa
    public function update_va($trxId, $virtualAccount)
    {
        // FROM BNI
        $prefix = '988';
        $client_id = '91014';
        $secret_key = 'c6925cc294d7481111d6a04763af12bd';
        $url = 'https://api.bni-ecollection.com/';
        
        // billing yang ingin diupdate
        // $trxId = '1979901603';
        // $virtualAccount = '9889101422041003';
        
        $data_asli = array(
            'client_id' => $client_id,
            'prefix' => $prefix,
            'trx_id' => $trxId,
            'trx_amount' => $this->userComplete->biaya,
            'type' => 'updateBilling',
            'billing_type' => 'c',
            'datetime_expired' => '2022-04-09T16:00:00+07:00',
            'virtual_account' => $virtualAccount,
            'customer_name' => $this->userInfo['nama_lengkap'],
            'customer_email' => '',
            'customer_phone' => '',
        );
        
        $hashed_string = BniEnc::encrypt(
            $data_asli,
            $client_id,
            $secret_key
        );
        
        $data = array(
            'client_id' => $client_id,
            'data' => $hashed_string,
        );
        
        $response = self::get_content($url, json_encode($data));
        $response_json = json_decode($response, true);
        
        if ($response_json['status'] !== '000') {
            // handling jika gagal
            var_dump($response_json);
        } else {
            $data_response = BniEnc::decrypt($response_json['data'], $client_id, $secret_key);
            // $data_response will contains something like this: 
            // array(
            // 	'virtual_account' => 'xxxxx',
            // 	'trx_id' => 'xxx',
            // );
            var_dump($data_response);
            
            $values = [
                'virtual_account' => $data_response['virtual_account'],
                'trx_id' => $data_response['trx_id'],
                'datetime_expired' => $data_asli['datetime_expired'],
                'status_pembayaran' => 'Kadaluarsa',
            ];
            
            $this->userPaymentModel->update($this->userInfo['no_pendaftaran'], $values);
        }
        return redirect()->to('mahasiswa/pembayaran');
    }
    
  	// [DEMO] Generate nama file for [DEMO] api_callback
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
  	// [DEMO] Otomatis update data dari BNI
    public function api_callback()
    {
        $entityBody = $_SERVER['REMOTE_ADDR'] . "\n";
        $entityBody .= file_get_contents('php://input');
        $filename = substr($this->generateRandomString(), 0, 10) . '.txt';
        file_put_contents($filename, $entityBody);
        
        echo '{“status : 000"}';
        exit;
        
        /* $values = [
            'payment_amount' => $data['payment_amount'],
            'cumulative_payment_amount' => $data['cumulative_payment_amount'],
            'payment_ntb' => $data['payment_ntb'],
            'datetime_payment' => $data['datetime_payment'],
            'datetime_payment_iso8601' => $data['datetime_payment_iso8601'],
            'status_pembayaran' => 'lunas',
        ];
        
        $this->builderUserPayment->update($values, ['trx_id' => $data['trx_id']]);
        
        echo 'status : 000"';
        exit; */
    }

    // Otomatis update data dari BNI
    /* public function api_callback()
    {
        // FROM BNI
        $client_id = '91014';
        $secret_key = 'c6925cc294d7481111d6a04763af12bd';
        
        
        // URL utk simulasi pembayaran: http://dev.bni-ecollection.com/
        
        
        $data = file_get_contents('php://input');
        
        $data_json = json_decode($data, true);
        
        $filename = substr($this->generateRandomString(), 0, 10) . '.txt';
        file_put_contents($filename, $entityBody);
        
        if (!$data_json) {
            // handling orang iseng
            echo '{"status":"999","message":"jangan iseng :D"}';
        } else {
            if ($data_json['client_id'] === $client_id) {
                $data_asli = BniEnc::decrypt(
                    $data_json['data'],
                    $client_id,
                    $secret_key
                );
        
                if (!$data_asli) {
                    // handling jika waktu server salah/tdk sesuai atau secret key salah
                    echo '{"status":"999","message":"waktu server tidak sesuai NTP atau secret key salah."}';
                } else {
                    // insert data asli ke db
                    $values = [
                        'trx_id' => $data_json['trx_id'],
                        'virtual_account' => $data_json['virtual_account'],
                        'customer_name' => $data_json['customer_name'],
                        'trx_amount' => $data_json['trx_amount'],
                        'payment_amount' => $data_json['payment_amount'],
                        'cumulative_payment_amount' => $data_json['cumulative_payment_amount'],
                        'payment_ntb' => $data_json['payment_ntb'],
                        'datetime_payment' => $data_json['datetime_payment'],
                        'datetime_payment_iso8601' => $data_json['datetime_payment_iso8601'],
                        'status_pembayaran' => 'lunas',
                    ];
                    
					$query = $this->builderUserPayment->update($values, ['trx_id' => $data_json['trx_id']]);
                    
                    if ($query) {
                        echo '{"status":"000"}';
                    } else {
                        echo 'update error';
                    }
                    
                    exit;
                }
            }
        }
    } */
    
    // Halaman Pembayaran
    public function pembayaran()
    {
        $data =[
            'title' => 'Tata Cara Pembayaran',
            'userInfo' => $this->userInfo,
            'userPayment' => $this->userPaymentModel->where('no_pendaftaran', $this->userInfo['no_pendaftaran'])->first()
        ];
        
        date_default_timezone_set("Asia/Jakarta");
        
        if( $data['userPayment']['virtual_account'] != null ) :
            return view('mahasiswa/user-pembayaran', $data);
        else :
            return redirect()->to('mahasiswa');
        endif;
    }
}