<?= $this->extend('layout/mahasiswa_template'); ?>

<?= $this->section('content'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                  
                      <?php if(!empty (session()->getFlashdata('success'))):?>
                          <div class="alert alert-success text-white"><?= session()->getFlashdata('success');?></div>
                      <?php endif;?>
                      <?php if(!empty (session()->getFlashdata('danger'))):?>
                          <div class="alert alert-danger text-white"><?= session()->getFlashdata('danger');?></div>
                      <?php endif;?>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Surat Pernyataan UKT</h4>
                              	<div class="invalid-feedback"><?= $validation->getError('peserta-kipk'); ?></div>
                                <div class="basic-form mt-3">
                                    <form action="<?= base_url() ?>/mahasiswa/savePernyataanUkt/<?= $userInfo['id'] ?>" method="POST" enctype="multipart/form-data">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0">Download Surat Pernyataan UKT: </label>
                                                <div class="col-sm-8">
                                                    
                                                    <div class="form-check mb-3">
                                  
                                  						<a class="btn btn-success mb-3" href="<?= base_url(); ?>/mahasiswa/downloadSuratPernyataanUkt">Download Surat Pernyataan UKT<a/><br>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0" for="spu">Upload Surat Pernyataan UKT: </label>
                                                <div class="col-sm-8">
                                                    
                                                    <div class="form-check mb-3">

                                                         <div class="basic-form">
                                                             <div class="form-group">
                                                               	<input type="file" class="form-control-file" name="spu" id="spu">
                                                             </div>
                                                              <div class="text-danger small"><?= isset($validation) ? display_error($validation,'spu'): '' ?></div>
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