<?= $this->extend('layout/mahasiswa_template'); ?>

<?= $this->section('content'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

          
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                  <div class="alert alert-primary" role="alert">
                      Page KIPK Under Maintanance
                    </div>
                </div>
                <div class="row">
                  <div class="alert alert-primary" role="alert">
                      The Website Will Open Soon 07.00 WIB 11/04/2022
                  </div>
                </div>
                <div class="row">
                    <a href ="<?= base_url() ?>/mahasiswa" class="btn btn-primary" >Back to Dashboard<a/>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
<?= $this->endSection(); ?>