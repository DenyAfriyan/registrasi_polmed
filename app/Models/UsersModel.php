<?php
namespace App\Models; 
use CodeIgniter\Model;
class UsersModel extends Model
{    
    public function getUsers()
    {             
        $query =  $this->db->table('user')
         ->select('*,user.id as user_id')
         ->join('user_metadata', 'user.no_pendaftaran = user_metadata.no_pendaftaran','left')
         ->join('user_survei', 'user.no_pendaftaran = user_survei.no_pendaftaran','left')
         ->join('user_payment', 'user.no_pendaftaran = user_payment.no_pendaftaran','left')
         ->join('user_file', 'user.no_pendaftaran = user_file.no_pendaftaran','left')
         ->get();  
        return $query;
    }
    
    public function getUsersById($id)
    {             
        $query =  $this->db->table('user')
         ->select('*,user.id as user_id')
         ->join('user_metadata', 'user.no_pendaftaran = user_metadata.no_pendaftaran','left')
         ->join('user_file', 'user.no_pendaftaran = user_file.no_pendaftaran','right')
         ->join('user_survei', 'user.no_pendaftaran = user_survei.no_pendaftaran','left')
         ->join('user_payment', 'user.no_pendaftaran = user_payment.no_pendaftaran','left')
         ->getWhere(['user.id'=>$id]);
        return $query;
    }
    
    public function updateSetujuByNoPendaftaran()
    {             

         $query =  $this->db->table('user')
         ->select('*,user.id as user_id')
         ->join('user_metadata', 'user.no_pendaftaran = user_metadata.no_pendaftaran');
         
        
         
        return $query;
    }
    
    public function updateTolakByNoPendaftaran()
    {             

         $query =  $this->db->table('user');
         $data =[
                'status_perubahan'     => 2,
                ];
        $query -> set($data);
         
        return $query;
    }
    
    public function count_mahasiswa()
    {
    $query =  $this->db->table('user')
    ->where(['role'=>'User']);

    return $query;
    }
    
    public function count_perubahan_ukt()
    {
    $query =  $this->db->table('user')
    ->where(['perubahan_ukt'=>'1']);

    return $query;
    }
    public function count_belum_divalidasi()
    {
    $query =  $this->db->table('user')
    ->where(['status_perubahan'=>'0']);

    return $query;
    }
  
  	public function getProdiByUser()
    {             
        $query =  $this->db->table('user')
         ->select('*,user.id as user_id')
         ->join('user_prodi', 'user.program_studi = user_prodi.program_studi','left');
         
        return $query;
    }
}