<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProdiModel extends Model
{
    public function getUktByProdi($prodi)
    {             
        $query =  $this->db->table('user_prodi')->where(['program_studi' == $prodi]);
        return $query;
    }
  
}