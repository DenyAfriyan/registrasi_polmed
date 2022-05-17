<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Hash;

class Auth extends BaseController
{
    protected $userModel;

	public function __construct()
	{
        $this->userModel = new UserModel();
        helper(['url','form']);
	}

	public function index()
	{
		$data = [
			'title' => 'Masuk',
            'validation' => \Config\Services::validation(),
		];
		
		echo view('auth/masuk', $data);
	}
	
	function login()
	{
        if(!$this->validate([
            'no_pendaftaran' => [
                'rules' => 'required|is_not_unique[user.no_pendaftaran]',
                'errors' => [
                    'required' => 'Masukkan nomor pendaftaran',
                    'is_not_unique' => 'Nomor pendaftaran tidak valid',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan password',
                ]
            ]
        ])) {
            return redirect()->to('/auth')->withInput();
        }

        $nomorPendaftaran = $this->request->getPost('no_pendaftaran');
        $password = $this->request->getPost('password');
        $userInfo = $this->userModel->getWhere(['no_pendaftaran' => $nomorPendaftaran])->getRowArray();
        $checkPassword = hash::check($password, $userInfo['password']);
        
        if(!$checkPassword){
            return redirect()->to('/auth')->with('danger','Nomor pendaftaran atau Password salah');
        } else {
            $userId = $userInfo['id'];
            session()->set('loggedUser', $userId);
            if( $userInfo['role'] == 'Admin' ) {
                return redirect()->to('/dashboard');
            } elseif( $userInfo['role'] == 'User' ) {
                return redirect()->to('/mahasiswa');
            } else {
                
            }
        }
    }
	
	function logout()
	{
        session()->destroy();
        return redirect()->to('/auth')->with('success','Berhasil keluar');
	}
	
	function create_admin()
	{
        $values = [
            'no_pendaftaran' => '123456',
            'password' => Hash::make('asdasd'),
            'foto_profil' => 'default.png',
            'nama_lengkap' => 'Admin Registrasi',
            'program_studi' => '-',
            'peserta_kipk' => 0,
			'role' => 'Admin',
        ];
        
        $demo = $this->userModel->insert($values);
        
        if ($demo) {
            return redirect('/auth')->with('success','Akun admin berhasil dibuat');
        } else {
            return redirect('/auth')->with('danger','Akun admin gagal dibuat');
        }
	}
	
	public function change_password()
	{
	    $demo = $this->userModel->save([
	        'id' => 1,
	        'password' => Hash::make('regpolimedia123')    
	    ]);
        
        if ($demo) {
            return redirect('/auth')->with('success','Password akun admin berhasil diubah');
        } else {
            return redirect('/auth')->with('danger','Password akun admin gagal diubah');
        }
	}
}