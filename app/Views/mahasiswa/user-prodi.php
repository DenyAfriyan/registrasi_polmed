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
                                <h4 class="card-title">Validasi Pilihan Program Studi</h4>
                                <div class="basic-form mt-3">
                                    <form>
                                        <div class="form-group">
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="optradio"> Program Studi 1</label>
                                            </div>
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="optradio"> Program Studi 2</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Validasi Pilihan Program Studi</h4>
                                <div class="basic-form mt-3">
                                    <form action="<?= base_url() ?>/mahasiswa/saveProdi/<?= $userInfo['id'] ?>" method="POST">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-2 pt-0">Program Studi: </label>
                                              	<div class="invalid-feedback"><?= $validation->getError('program_studi'); ?></div>
                                                <div class="col-sm-10">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="radio" name="program_studi" value="<?= $prodi->nilai_ukt_semester ?>">
                                                        <label class="form-check-label"><?= $userInfo['program_studi'] ?></label>
                                                    </div>
                                                  	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'program_studi'): '' ?></div>
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