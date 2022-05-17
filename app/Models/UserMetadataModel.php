<?php

namespace App\Models;

use CodeIgniter\Model;

class UserMetadataModel extends Model
{
    protected $table = 'user_metadata';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
    	'no_pendaftaran',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'nik',
        'nisn',
        'npwp',
        'alamat',
        'kode_pos',
        'kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
        'tempat_tinggal',
        'alat_transportasi',
        'no_telp',
        'no_whatsapp',
        'email',
        'ukuran_jas_almamater',
        'ukuran_baju_praktik',
        'nama_ayah',
        'nik_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pendidikan_terakhir_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'pendidikan_terakhir_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'asal_sekolah',
        'nama_sekolah',
        'provinsi_sekolah',
        'tahun_lulus',
        'peserta_kipk',
        'biaya'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}