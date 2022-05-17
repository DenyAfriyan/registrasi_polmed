<?= $this->extend('layout/mahasiswa_template'); ?>

<?= $this->section('content'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Upload Dokumen</a></li>
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
                                    <form class="form-valide" action="<?= base_url(); ?>/mahasiswa/saveUploadDokumen/ <?= $userInfo['id'] ?>" method="post" enctype="multipart/form-data">
                                      <?= csrf_field(); ?>
                                      	<input type="hidden" name="id" id="id" value="<?= $userInfo['id'] ?>"> 
                                         <div class="col-lg-12">
                                           <h2 class="card-title mb-4">UPLOAD DOKUMEN MAHASISWA</h2>
                                           <h4 class="card-subtitle">Pas Foto 4x6- Kemeja Putih- Kerudung Hitam (Jika Hijab)-Background Merah</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="pas-foto" id="pas-foto" value="<?= $data_user->pas_foto ?>">
                                                 <div><small class="form-group text-danger">*Ekstensi file Pas Foto yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File Pas Foto yang di upload maksimal 500kb</small></div>
                                               </div>
                            					<div class="text-danger small"><?= isset($validation) ? display_error($validation,'pas-foto'): '' ?></div>
                                           </div>
                                           <h4 class="card-title">KTP</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="ktp" id="ktp">
                                                 <div><small class="form-group text-danger">*Ekstensi file KTP yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File KTP yang di upload maksimal 500kb</small></div>
                                               </div>
                                             	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'ktp'): '' ?></div>
                                           </div>
                                           <h4 class="card-title">Kartu Keluarga</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="kk" id="kk">
                                                 <div><small class="form-group text-danger">*Ekstensi file KK yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File KK yang di upload maksimal 500kb</small></div>
                                               </div>
                                             	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'kk'): '' ?></div>
                                           </div>
                                           <h4 class="card-title">Ijazah/SKL</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="ijazah" id="ijazah">
                                                 <div><small class="form-group text-danger">*Ekstensi file Ijazah yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File Ijazah yang di upload maksimal 500kb</small></div>
                                               </div>
                                             	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'ijazah'): '' ?></div>
                                           </div>
                                           <h4 class="card-title">Surat Keterangan Sehat Jasmani</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="sksj" id="sksj">
                                                 <div><small class="form-group text-danger">*Ekstensi file SKSJ yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File SKSJ yang di upload maksimal 500kb</small></div>
                                               </div>
                                             <div class="text-danger small"><?= isset($validation) ? display_error($validation,'sksj'): '' ?></div>
                                           </div>
                                           <h4 class="card-title">Surat Keterangan Bebas Narkoba</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="skbn" id="skbn">
                                                 <div><small class="form-group text-danger">*Ekstensi file SKBN yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File SKBN yang di upload maksimal 500kb</small></div>
                                               </div>
                                             <div class="text-danger small"><?= isset($validation) ? display_error($validation,'skbn'): '' ?></div>
                                           </div>
                                           <h4 class="card-title">Surat Keterangan Tidak Buta Warna</h4>
                                           <div class="basic-form">
                                               <div class="form-group">
                                                 <input type="file" class="form-control-file" name="sktbw" id="sktbw">
                                                 <div><small class="form-group text-danger">*Ekstensi file SKTBW yang di upload harus berupa pdf</small></div>
                                             	<div><small class="form-group text-danger">*File SKTBW yang di upload maksimal 500kb</small></div>
                                               </div>
                                             <div class="text-danger small"><?= isset($validation) ? display_error($validation,'sktbw'): '' ?></div>
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