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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Validasi UKT</a></li>
                    </ol>
                </div>
            </div>
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data dan Berkas Mahasiswa</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No Pendaftaran</th>
                                                <th>Program Studi</th>
                                                <th>Nama Lengkap</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($data_user as $u): ?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?php echo $u->no_pendaftaran ?></td>
                                                <td><?php echo $u->program_studi ?></td>
                                                <td><?php echo $u->nama_lengkap ?></td>
                                                <td><a class="btn btn-light" href="<?=base_url('dashboard/detail_biodata_mahasiswa/'.$u->user_id)?>"><i class="fa fa-eye">&nbsp;Lihat Detail</i></a></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>No Pendaftaran</th>
                                                <th>Program Studi</th>
                                                <th>Nama Lengkap</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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