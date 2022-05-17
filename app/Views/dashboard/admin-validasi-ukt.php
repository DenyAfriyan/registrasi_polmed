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
                                <h4 class="card-title">Data Calon Mahasiswa</h4>
                                <div class="table-responsive">
                                    <table  class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No Pendaftaran</th>
                                                <th>Program Studi</th>
                                                <th>Peserta KIPK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Aksi</th>
                                                <th>Status</th>
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
                                                <td><?php echo $u->peserta_kipk ?></td>
                                                <td><?php echo $u->nama_lengkap ?></td>
                                                <td>
                                                
                                                <a class="btn btn-light" href="<?=base_url('dashboard/detail_validasi_ukt/'.$u->id)?>"><i class="fa fa-eye">&nbsp;Lihat Detail<p hidden><?=$u->status_perubahan?></p></i></a></td>
                                                <?php if ($u->status_perubahan == 0 ): ?>
                                                
                                                <td><a class="btn btn-warning" href=""><i class="fa-solid fa-circle-exclamation">&nbsp;Belum Divalidasi<?=$u->status_perubahan?></i></a></td>
                                                <?php elseif ($u->status_perubahan == 1 ):?> 
                                                <td><a class="btn btn-success" href=""><i class="fa fa-check">&nbsp;Disetujui<?=$u->status_perubahan?></i></a></td>
                                                <?php else: ?>
                                                <td><a class="btn btn-danger" href=""><i class="fa fa-check">&nbsp;Ditolak<?=$u->status_perubahan?></i></a></td>
                                                <?php endif;?>
                                                
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>No Pendaftaran</th>
                                                <th>Program Studi</th>
                                                <th>Peserta KIPK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Aksi</th>
                                                <th>Status</th>
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