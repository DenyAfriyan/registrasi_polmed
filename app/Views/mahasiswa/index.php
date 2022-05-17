
<?= $this->extend('layout/mahasiswa_template'); ?>

<?= $this->section('content'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Dashboard</h4>
                                <div class="alert alert-success" role="alert">
                                      <h1 class="alert-heading">Selamat Kepada <?=$user['nama_lengkap']?>!!!</h1>
                                      <h4>Anda Telah Diterima Di prodi <?=$user['program_studi']?> Politeknik Negeri Media Kreatif</h4>
                                      
                                      <hr>
                                    <?php if($data_user->status_kipk == 0) :?>
                                        <a href ="<?= base_url() ?>/mahasiswa/survei" class ="btn btn-primary">Isi Survei </a>
                                    <?php endif; ?>
                                  
                                  	<?php if($data_user->status_finalisasi == 1) :?>
                                  		<a href ="<?= base_url() ?>/mahasiswa/downloadFormRegist" class ="btn btn-primary">Download Form Registrasi Mahasiswa Baru </a>
                                  	<?php endif; ?>
                                  	<?php if($data_user->status_perubahan == 0 && $data_user->perubahan_ukt == 1 && $userPayment['trx_id']=='') :?>
                                  	    <a href ="<?= base_url() ?>/mahasiswa/pembayaran_Mahasiswa" class ="btn btn-primary">Cek Validasi Admin</a>
                                <?php endif; ?>
                                <?php if($data_user->status_perubahan == 1 && $data_user->perubahan_ukt == 1 && $userPayment['trx_id']=='' && $data_user->status_disetujui == 1) :?>
                                        <h3 class="alert-heading">Selamat Pengajuan Perubahan UKT Disetujui!</h3>
                                        <a href ="<?= base_url() ?>/mahasiswa/pernyataanUkt" class ="btn btn-primary">Upload Berkas Menyetujui UKT</a>
                                <?php endif; ?>
                                  
                                  	
                                </div>
                                <?php if($data_user->status_perubahan == 1 && $data_user->perubahan_ukt == 1 && $userPayment['trx_id']=='' && $data_user->status_disetujui == 0) :?>
                                  	    <div class="alert alert-success" role="alert">Selamat Pengajuan Perubahan UKT Disetujui!
                                  	    <hr>
                                  	    <a href ="<?= base_url() ?>/mahasiswa/pembayaran_Mahasiswa" class ="btn btn-primary">Buat Virtual Account Pembayaran</a>
                                  	    </div>
                                <?php endif; ?>
                                <?php if($data_user->status_perubahan == 2 && $data_user->perubahan_ukt == 1 && $userPayment['trx_id']=='') :?>
                                  	    <div class="alert alert-danger" role="alert">Mohon Maaf Pengajuan Perubahan UKT Tidak Disetujui!
                                  	    <hr>
                                  	    <a href ="<?= base_url() ?>/mahasiswa/pembayaran_Mahasiswa" class ="btn btn-primary">Buat Virtual Account Pembayaran</a>
                                  	    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Pemberitahuan <i class="fa fa-bullhorn"></i>
                                <div class="alert alert-warning my-3" role="alert">
                                      <h2 class="alert-heading">Cetak Bukti Registrasi Ulang akan di buka sistem nya pada tanggal 12 April 2022</h2>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
<?= $this->endSection(); ?>