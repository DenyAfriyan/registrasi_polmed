<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersFileModel extends Model
{
    protected $table = 'user_file';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_user',
      	'no_pendaftaran',
        'pas_foto',
        'ktp',
        'kk',
      	'ijazah',
        'sksj',
        'skbn',
        'sktbw',
        'ppu',
      	'spu',
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}