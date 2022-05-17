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
                    <!-- <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Validasi Pendaftar KIPK/non-KIPK</h4>
                                <div class="basic-form mt-3">
                                    <form>
                                        <div class="form-group">
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="optradio"> KIPK</label>
                                            </div>
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="optradio"> non-KIPK</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                  
                      <?php if(!empty (session()->getFlashdata('success'))):?>
                          <div class="alert alert-success text-white"><?= session()->getFlashdata('success');?></div>
                      <?php endif;?>
                      <?php if(!empty (session()->getFlashdata('danger'))):?>
                          <div class="alert alert-danger text-white"><?= session()->getFlashdata('danger');?></div>
                      <?php endif;?>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Validasi Permohonan Perubahan UKT</h4>
                              	<div class="invalid-feedback"><?= $validation->getError('peserta-kipk'); ?></div>
                                <div class="basic-form mt-3">
                                    <form action="<?= base_url() ?>/mahasiswa/saveKipk/<?= $userInfo['id'] ?>" method="POST" enctype="multipart/form-data">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-2 pt-0" for="peserta-kipk">Status: </label>
                                                <div class="col-sm-10">
                                                    
                                                    <div class="form-check mb-3">
                                                      	<h5>Permohonan Perubahan UKT</h5>

                                                      	<input class="form-check-input" type="radio" name="peserta-kipk" value="T, 1, 0" <?= $users->peserta_kipk == "Y" ? " disabled": "" ;?>>
                                                      	<label class="form-check-label">Permohonan Pengajuan Perubahan Pembayaran UKT</label><br>
                                                      	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'peserta-kipk'): '' ?></div>
                                  
                                  						<a class="btn btn-success mb-3" href="<?= base_url(); ?>/mahasiswa/downloadBerkasNonKIPK">Download Berkas Pengajuan<a/><br>
                                                        <small class="text-danger mb-2">*Perhatian!!! Jika mengajukan permohonan pengajuan perubahan UKT upload file lebih dulu</small>
                                                          <div class="basic-form">
                                                             <div class="form-group">
                                                               	<input type="file" class="form-control-file" name="ppu" id="ppu">
                                                               	<div><small class="form-group text-danger">*Ekstensi file permohonan pengajuan perubahan UKT yang di upload harus berupa pdf</small></div>
                                             					<div><small class="form-group text-danger">*Permohonan pengajuan perubahan UKT yang di upload maksimal 500kb</small></div>
                                                             </div>
                                                              <div class="text-danger small"><?= isset($validation) ? display_error($validation,'ppu'): '' ?></div>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-lg-8">
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