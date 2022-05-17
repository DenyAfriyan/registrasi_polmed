    <?= $this->extend('layout/mahasiswa_template'); ?>

    <?= $this->section('content'); ?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        <!-- <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Status Pembayaran</a></li>
                </ol>
            </div>
        </div> -->
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-12 mb-3">
                                    <div class="card-content">
                                        <?php if( $userPayment['status_pembayaran'] == 'Lunas' ) :
                                            $color = 'success';
                                        elseif( $userPayment['status_pembayaran'] == 'Belum Dibayar' ) : 
                                            $color = 'warning';
                                        else :
                                            $color = 'danger';
                                        endif; ?>
                                        <h4>Status Pembayaran: <span class="text-<?= $color; ?>"><?= $userPayment['status_pembayaran']; ?></span></h4>
                                        <!--<h4>Informasi: <span class="text-warning">Pembayaran dapat dilakukan pada Selasa, 12 April 2022</span></h4>-->
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-4 mb-5">
                                    <h2 class="card-title">BNI VIRTUAL ACCOUNT</h2>
                                    <h1 class="text-danger"><?= $userPayment['virtual_account']; ?></h1>
                                </div>
                                <div class="col-lg-12 text-center mt-4 mb-5">
                                    <h2 class="card-title">Jumlah yang harus dibayarakan</h2>
                                  	<?php if($userPayment['virtual_account'] != null) {
                                  	    $nominal = $userPayment['trx_amount'];
                                  	} else {
                                  	    $nominal = '0';
                                  	}
									$tagihan = number_format($nominal,2,',','.'); ?>
                                    <h1 class="text-danger">Rp<?= $tagihan; ?></h1>
                                </div>
                                <div class="col-lg-12 text-center mt-3 mb-3">
                                    <div class="card-content">
                                        <h5>Batas waktu pembayaran sampai dengan tanggal</h5>
                                        <!--<h3><span class="text-danger">23 April 2022 23:59 WIB</span></h3>-->
                                        <?php $now = time();
                                        $expired = strtotime($userPayment['datetime_expired']);
                                        $remaining = $expired - $now; 
                                        if($userPayment['status_pembayaran'] != 'Lunas') : ?>
                                            <h3><span class="text-danger"><?= date('j F Y H:i \W\I\B', strtotime($userPayment['datetime_expired'])); ?></span></h3>
                                            <h5>Pembayaran akan dibatalkan otomatis</h5>
                                            <h5>apabila dalam batas waktu di atas tidak dilakukan pembayaran</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-3 mb-3">
                                    <?php if($userPayment['virtual_account'] != null) : 
                                        if($userPayment['status_pembayaran'] != 'Lunas') : ?>
                                            <a class="btn btn-success d-inline text-white" href="/mahasiswa/inquiry_va">Cek Status Pembayaran</a>
                                            <?php if($remaining < 0) : ?>
                                                <a class="btn btn-warning d-inline text-white" href="/mahasiswa/create_va">Buat Ulang Virtual Account</a>
                                            <?php endif; 
                                        endif; 
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Tata Cara Pembayaran</h4>
                        <p class="text-muted"><code></code>
                        </p>
                        <div id="accordion-three" class="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1"><i class="fa" aria-hidden="true"></i> ATM</h5>
                                </div>
                                <div id="collapseOne1" class="collapse" data-parent="#accordion-three">
                                    <div class="card-body">
                                        <ul>
                                            <li>Masukkan Kartu Anda > Pilih Bahasa > Masukkan PIN ATM Anda.</li>
                                            <li>Pilih “Menu Lainnya“ > Pilih “Transfer“.</li>
                                            <li>Pilih Jenis rekening yang akan Anda gunakan (Contoh : Dari Rekening Tabungan).</li>
                                            <li>Pilih Virtual Account Billing.</li>
                                            <li>Masukkan nomor Virtual Account Anda (contoh: 8277087781881441).</li>
                                            <li>Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                                            <li>Apabila Nama dan Tagihan telah sesuai, lanjutkan transaksi.</li>
                                            <li>Transaksi Anda sudah selesai.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2"><i class="fa" aria-hidden="true"></i> Internet Banking BNI</h5>
                                </div>
                                <div id="collapseTwo2" class="collapse" data-parent="#accordion-three">
                                    <div class="card-body">
                                        <ul>
                                            <li>Akses ibank.bni.co.id > Masukkan User ID dan password.</li>
                                            <li>Klik menu Transfer, lalu pilih “Virtual Account Billing.</li>
                                            <li>Masukan nomor Virtual Account Anda (contoh: 8277087781881441), Lalu pilih rekening debet. Kemudian tekan Lanjut.</li>
                                            <li>Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                                            <li>Masukkan Kode Otentikasi Token.</li>
                                            <li>Pembayaran Anda telah berhasil.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4"><i class="fa" aria-hidden="true"></i> Mobile Banking BNI</h5>
                                </div>
                                <div id="collapseOne4" class="collapse" data-parent="#accordion-three">
                                    <div class="card-body">
                                        <ul>
                                            <li>Akses BNI Mobile Banking dari handphone kemudian masukkan user ID dan password.</li>
                                            <li>Pilih menu “Transfer”.</li>
                                            <li>Pilih menu Virtual Account Billing” kemudian pilih rekening debet.</li>
                                            <li>Masukkan nomor Virtual Account Anda (contoh: 8277087781881441) pada menu input baru”.</li>
                                            <li>Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                                            <li>Apabila Nama dan Tagihan sudah benar,lanjutkan dan masukkan Password</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5"><i class="fa" aria-hidden="true"></i> SMS Banking BNI</h5>
                                </div>
                                <div id="collapseTwo5" class="collapse" data-parent="#accordion-three">
                                    <div class="card-body">
                                        <ul>
                                            <li>Kirim SMS dengan Format : TRF [SPASI] NomorVA [SPASI] NOMINAL</li>
                                            <li>kemudian kirim ke 3346</li>
                                            <li>(Contoh: TRF 8102020015390000 300000)</li>
                                            <li>Balas SMS yang masuk dan ikuti petunjuk</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6"><i class="fa" aria-hidden="true"></i> ATM Bersama/Transfer antar Bank</h5>
                                </div>
                                <div id="collapseThree6" class="collapse" data-parent="#accordion-three">
                                    <div class="card-body">
                                        <ul>
                                            <li>Masukkan kartu ke mesin ATM Bersama.</li>
                                            <li>Pilih Transaksi Lainnya</li>
                                            <li>Pilih menu ”Transfer”.</li>
                                            <li>Pilih ”Transfer ke Bank Lain</li>
                                            <li>Masukkan kode bank BNI (009) dan 16 Digit Nomor Virtual Account (contoh:8277087781881441).</li>
                                            <li>Konfirmasi rincian Anda akan tampil di layar, cek dan tekan 'Ya' untuk melanjutkan.</li>
                                            <li>Transaksi Berhasil.</li>
                                        </ul>
                                    </div>
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

    <?= $this->endSection(); ?>