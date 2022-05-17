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
          
          <?php if(!empty (session()->getFlashdata('success'))):?>
              <div class="alert alert-success text-white"><?= session()->getFlashdata('success');?></div>
          <?php endif;?>
          <?php if(!empty (session()->getFlashdata('danger'))):?>
              <div class="alert alert-danger text-white"><?= session()->getFlashdata('danger');?></div>
          <?php endif;?>
          
           <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?= base_url(); ?>/mahasiswa/savePpu/ <?= $userInfo['id'] ?>" method="post" enctype="multipart/form-data">
                                      <?= csrf_field(); ?> 
                                         <div class="col-lg-12">
                                           <h4 class="card-title">Upload File Perubahan UKT</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="ppu" id="ppu">
                                               </div>
                            					<div class="text-danger small"><?= isset($validation) ? display_error($validation,'pas-foto'): '' ?></div>
                                           </div>   
                                        </div>
                                      <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
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