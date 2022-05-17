<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
      'no_pendaftaran',
      'password',
      'foto_profil',
      'nama_lengkap',
      'program_studi',
      'role',
      'status_survei',
      'status_prodi',
      'status_kipk',
      'status_perubahan',
      'status_disetujui',
      'status_finalisasi',
      'perubahan_ukt',
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}