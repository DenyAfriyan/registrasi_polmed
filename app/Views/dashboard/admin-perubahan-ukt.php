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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan Perubahan UKT</a></li>
                    </ol>
                </div>
            </div>
            <?php if(!empty (session()->getFlashdata('success'))):?>
            <div class="alert alert-success mt-3"><?= session()->getFlashdata('success');?></div>
            <?php endif;?>
            <?php if(!empty (session()->getFlashdata('danger'))):?>
            <div class="alert alert-danger mt-3"><?= session()->getFlashdata('danger');?></div>
            <?php endif;?>
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data  Permohonan Perubahan UKT</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No Pendaftaran</th>
                                                <th>Program Studi</th>
                                                <th>Peserta KIPK</th>
                                                <th>Nama Lengkap</th>
                                                <th>UKT Awal</th>
                                                <th>Aksi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($data_user as $u): 
                                            if ($u->perubahan_ukt == 1):?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?php echo $u->no_pendaftaran; ?></td>
                                                <td><?php echo $u->program_studi; ?></td>
                                                <td><?php echo $u->peserta_kipk; ?></td>
                                                <td><?php echo $u->nama_lengkap; ?></td>
                                                <td><?php echo $u->biaya; ?></td>
                                                <td><a class="btn btn-light" href="<?=base_url('dashboard/detail_validasi_ukt/'.$u->user_id);?>"><i class="fa fa-eye">&nbsp;Lihat Detail</i></a></td>
                                                <?php if ($u->status_perubahan == 0 ): ?>
                                                <td><button class="btn btn-warning" href=""><i class="fa fa-exclamation" disabled>&nbsp;Belum divalidasi</i></button></td>
                                                <?php elseif ($u->status_perubahan == 1 ):?>
                                                <td><button class="btn btn-success" href=""><i class="fa fa-check">&nbsp;Disetujui</i></button></td>
                                                <?php elseif ($u->status_perubahan == 2 ):?>
                                                <td><button class="btn btn-danger" href=""><i class="fa fa-check">&nbsp;Ditolak</i></button></td>
                                                <?php endif;?>
                                                
                                            </tr>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>No Pendaftaran</th>
                                                <th>Program Studi</th>
                                                <th>Peserta KIPK</th>
                                                <th>Nama Lengkap</th>
                                                <th>UKT Awal</th>
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