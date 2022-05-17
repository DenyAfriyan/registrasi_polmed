<?= $this->extend('layout/mahasiswa_template'); ?>

<?= $this->section('content'); ?>
    
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <!-- row -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Survei Mahasiswa</h4>
                                <div class="form-validation">
                                    <form class="form-valide" action="<?= base_url('/mahasiswa/saveSurvei/' . $userInfo['id']) ?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="kenapa_memilih_polimedia">Kenapa memilih PoliMedia? <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_polimedia" value="Perguruan Tinggi Negeri" > Perguruan Tinggi Negeri</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_polimedia" value="Prospek Peluang Kerja" > Prospek Peluang Kerja</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_polimedia" value="Pembelajaran Praktik" > Pembelajaran Praktik</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_polimedia" value="Dosen Profesional" > Dosen Profesional</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_polimedia" value="Fasilitas Praktik" > Fasilitas Praktik</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_polimedia" value="Biaya/UKT Terjangkau" > Biaya/UKT Terjangkau</label>
                                                        </div>
                                                      	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'kenapa_memilih_polimedia'): '' ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="kenapa_memilih_program_studi_tersebut">Kenapa memilih Program Studi tersebut? <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_program_studi_tersebut" value="Sesuai Minat dan Bakat" > Sesuai Minat dan Bakat</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_program_studi_tersebut" value="Sesuai Jurusan Sekolah" > Sesuai Jurusan Sekolah</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_program_studi_tersebut" value="Tertarik dengan Profil Lulusan" > Tertarik dengan Profil Lulusan</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_program_studi_tersebut" value="Dosen Profesional" > Dosen Profesional</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="kenapa_memilih_program_studi_tersebut" value="Fasilitas Praktik" > Fasilitas Praktik</label>
                                                        </div>
                                                      <div class="text-danger small"><?= isset($validation) ? display_error($validation,'kenapa_memilih_program_studi_tersebut'): '' ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="darimana_mengetahui_polimedia">Darimana Mengetahui PoliMedia? <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Teman Sekolah" > Teman Sekolah</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Guru Bimbingan Konseling" > Guru Bimbingan Konseling</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Alumni Sekolah" > Alumni Sekolah</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Media Massa" > Media Massa</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Media Sosial" > Media Sosial</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Website" > Website</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Videotron" > Videotron</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="darimana_mengetahui_polimedia" value="Pameran" > Pameran</label>
                                                        </div>
                                                      <div class="text-danger small"><?= isset($validation) ? display_error($validation,'darimana_mengetahui_polimedia'): '' ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="media_apa_yang_kamu_gunakan_jika_ada_pertanyaan">Media apa yang kamu gunakan jika ada pertanyaan? <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="media_apa_yang_kamu_gunakan_jika_ada_pertanyaan" value="Whatsapp Call Center PoliMedia" > Whatsapp Call Center PoliMedia</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="media_apa_yang_kamu_gunakan_jika_ada_pertanyaan"  value="Akun Instagram @polimediakreatif" > Akun Instagram @polimediakreatif</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="media_apa_yang_kamu_gunakan_jika_ada_pertanyaan"  value="Email humas@polimedia.ac.id" > Email humas@polimedia.ac.id</label>
                                                        </div>
                                                      	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'media_apa_yang_kamu_gunakan_jika_ada_pertanyaan'): '' ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia">Media yang efektif untuk mendapatkan informasi terkait PoliMedia? <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia" value="Poster" > Poster</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia" value="Videotron" > Videotron</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia" value="Media Sosial" > Media Sosial</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia" value="Website" > Website</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia" value="Majalah Kampus" > Majalah Kampus</label>
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia" value="Media Massa" > Media Massa</label>
                                                        </div>
                                                      <div class="text-danger small"><?= isset($validation) ? display_error($validation,'Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia'): '' ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="Kemudahan_akses_pelayanan_informasi_selama_proses_PMB">Kemudahan akses pelayanan informasi selama proses PMB? <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kemudahan_akses_pelayanan_informasi_selama_proses_PMB" value="Kurang" > Kurang</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kemudahan_akses_pelayanan_informasi_selama_proses_PMB" value="Cukup" > Cukup</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kemudahan_akses_pelayanan_informasi_selama_proses_PMB" value="Baik" > Baik</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="Kemudahan_akses_pelayanan_informasi_selama_proses_PMB" value="Baik Sekali" > Baik Sekali</label>
                                                </div>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'Kemudahan_akses_pelayanan_informasi_selama_proses_PMB'): '' ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="Kelengkapan_informasi_selama_proses_PMB">Kelengkapan informasi selama proses PMB? <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kelengkapan_informasi_selama_proses_PMB" value="Kurang" > Kurang</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kelengkapan_informasi_selama_proses_PMB" value="Cukup" > Cukup</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kelengkapan_informasi_selama_proses_PMB" value="Baik" > Baik</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="Kelengkapan_informasi_selama_proses_PMB" value="Baik Sekali" > Baik Sekali</label>
                                                </div>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'Kelengkapan_informasi_selama_proses_PMB'): '' ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="Kejelasan_informasi_selama_proses_PMB">Kejelasan informasi selama proses PMB? <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kejelasan_informasi_selama_proses_PMB" value="Kurang" > Kurang</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kejelasan_informasi_selama_proses_PMB" value="Cukup" > Cukup</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kejelasan_informasi_selama_proses_PMB" value="Baik" > Baik</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="Kejelasan_informasi_selama_proses_PMB" value="Baik Sekali" > Baik Sekali</label>
                                                </div>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'Kejelasan_informasi_selama_proses_PMB'): '' ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="Kecepatan_respon_pelayanan_informasi_selama_proses_PMB">Kecepatan respon pelayanan informasi selama proses PMB? <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kecepatan_respon_pelayanan_informasi_selama_proses_PMB" value="Kurang" > Kurang</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kecepatan_respon_pelayanan_informasi_selama_proses_PMB" value="Cukup" > Cukup</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Kecepatan_respon_pelayanan_informasi_selama_proses_PMB" value="Baik" > Baik</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="Kecepatan_respon_pelayanan_informasi_selama_proses_PMB" value="Baik Sekali" > Baik Sekali</label>
                                                </div>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'Kecepatan_respon_pelayanan_informasi_selama_proses_PMB'): '' ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label" for="Pelayanan_publik_selam_proses_PMB">Pelayanan publik selama proses PMB? <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Pelayanan_publik_selam_proses_PMB" value="Kurang" > Kurang</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Pelayanan_publik_selam_proses_PMB" value="Cukup" > Cukup</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="Pelayanan_publik_selam_proses_PMB" value="Baik" > Baik</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="Pelayanan_publik_selam_proses_PMB" value="Baik Sekali" > Baik Sekali</label>
                                                </div>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'Pelayanan_publik_selam_proses_PMB'): '' ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
<?= $this->endSection(); ?>