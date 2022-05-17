<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSurveiModel extends Model
{
    protected $table = 'user_survei';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_user',
      	'no_pendaftaran',
        'kenapa_memilih_polimedia',
        'kenapa_memilih_program_studi_tersebut',
        'darimana_mengetahui_polimedia',
        'media_apa_yang_kamu_gunakan_jika_ada_pertanyaan',
        'Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia',
        'Kemudahan_akses_pelayanan_informasi_selama_proses_PMB',
        'Kelengkapan_informasi_selama_proses_PMB',
      	'Kejelasan_informasi_selama_proses_PMB',
      	'Kecepatan_respon_pelayanan_informasi_selama_proses_PMB',
      	'Pelayanan_publik_selam_proses_PMB'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}