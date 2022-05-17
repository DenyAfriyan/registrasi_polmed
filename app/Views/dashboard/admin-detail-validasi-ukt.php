<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Validasi Perubahan UKT</a></li>
                    </ol>
                </div>
            </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Formulir pengajuan UKT</h4>
                                <a href="<?= base_url('files/pdf/pengajuan-perubahan-ukt/'.$users->ppu)?>" target="_blank" class="btn btn-secondary">Lihat Formulir</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?= base_url(); ?>/mahasiswa/saveBiodataDiri" method="post">
                                      <?= csrf_field(); ?>
                                      <h4>Hasil Survei <?=$users->nama_lengkap?></h4>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-pendaftaran">Kenapa Memilih Polimedia ?
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no-pendaftaran" name="no-pendaftaran" value="<?=$users->kenapa_memilih_polimedia;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Kenapa Memilih Program Studi Tersebut
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->kenapa_memilih_program_studi_tersebut;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Darimana Mengetahui Polimedia
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->darimana_mengetahui_polimedia;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Media Apa yang Kamu Gunakan Jika ada Pertanyaan?
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->media_apa_yang_kamu_gunakan_jika_ada_pertanyaan;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Media yang Efektif Untuk Mendapatkan Informasi Terkait Polimedia
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Media yang Efektif Untuk Mendapatkan Informasi Terkait Polimedia
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->Media_yang_efektif_untuk_mendapatkan_informasi_terkait_PoliMedia;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">kemudahan Akses Pelayanan Informasi Selama Proses PMB
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->Kemudahan_akses_pelayanan_informasi_selama_proses_PMB;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">kelengkapan Informasi Selama Proses PMB
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->Kelengkapan_informasi_selama_proses_PMB;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">kejelasan Informasi Selama Proses PMB
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->Kejelasan_informasi_selama_proses_PMB;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Kecepatan Respon Pelayanan Informasi Selama Proses PMB
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->	Kecepatan_respon_pelayanan_informasi_selama_proses_PMB;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Pelayanan Publik Selama Proses PMB
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->	Pelayanan_publik_selam_proses_PMB;?>" disabled>
                                            </div>
                                        </div>
                                      	
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($users->status_perubahan == 0):?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jika Pengajuan Perubahan UKT Disetujui, Masukan Nominal Angka<span class="text-danger">*</span>
                                <br><br>Jika Pengajuan Perubahan UKT ditolak, Abaikan Nominal Angka Kemudian Tekan Tombol Tolak</h4>
                                <div class="basic-form mt-3">
                                    <form method="post" action="<?=base_url('dashboard/simpan_validasi_ukt/' . $users->user_id); ?>">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-2 pt-0">contoh : 5000000</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="text" name="biaya" id="biaya" required>
                                                        <label class="form-check-label"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Anda yakin Menyetujui perubahan ?')">Setujui</button>
                                                </div>
                                            </form>
                                                <form method="post" action="<?= base_url('dashboard/tolak_validasi_ukt/' . $users->user_id); ?>">
                                                        <div class="col-lg-1">
                                                            <!--<input class="form-check-input" type="text" name="id" value="1">-->
                                                            <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Anda yakin Menolak perubahan ukt ?')">Tolak</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                </div>

                
                 
        </div>
            
<!-- #/ container -->
</div>

<!--**********************************
            Content body end
        ***********************************-->
<?= $this->endSection(); ?>