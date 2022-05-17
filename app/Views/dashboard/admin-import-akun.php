<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
    
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        <!-- <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div> -->
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="card-title mb-4">Import Akun Calon Mahasiswa</h4>
                                    <div class="basic-form">
                                        <form action="/admin/importing_akun" method="post" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_excel" name="file_excel" accept=".xls,.xlsx">
                                                    <label class="custom-file-label" id="nama_berkas">Pilih file excel</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-dark">Import</button>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'file_excel'): '' ?></span>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <a class="btn btn-dark" href="<?= base_url('files/pdf/Import_User_Reg_PoliMedia.xlsx'); ?>" download>Download Template</a>
                                </div>
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
    
    <script type="text/javascript">
        $(document).ready(function(){
            document.getElementById('file_excel').onchange = function () {
                var nama_berkas = this.value
                console.log(nama_berkas)
                if(nama_berkas != '')
                {
                    $('#nama_berkas').text(nama_berkas);
                }
            };
        });
    </script>
    
<?= $this->endSection(); ?>