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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?= base_url(); ?>/mahasiswa/saveBiodataDiri" method="post">
                                      <?= csrf_field(); ?>
                                      <h4>Biodata dan Berkas <?=$users->nama_lengkap?></h4>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-pendaftaran">No. Pendaftaran
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no-pendaftaran" name="no-pendaftaran" value="<?=$users->no_pendaftaran;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Program Studi
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->program_studi;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Peserta KIPK ?
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" value="<?=$users->peserta_kipk;?>" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-lengkap">Nama Lengkap
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-lengkap" name="nama-lengkap" value="<?=$users->nama_lengkap;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir">Tempat Lahir
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="tempat-lahir" name="tempat-lahir" rows="5" value="<?=$users->tempat_lahir;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir">Tanggal Lahir
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" rows="5" value="<?=$users->tanggal_lahir;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir">Jenis Kelamin
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="jenis-kelamin" name="jenis-kelamin" rows="5" value="<?=$users->jenis_kelamin;?>" disabled>
                                            </div>
                                        </div>
                                      	
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir">
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="agama" name="agama" rows="5" value="<?=$users->agama;?>" disabled>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik">NIK
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="nik" name="nik" rows="5" value="<?=$users->nik;?>" disabled>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nisn">NISN
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="nisn" name="nisn" rows="5" value="<?=$users->nisn;?>" disabled>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="npwp">NPWP
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="npwp" name="npwp" rows="5" value="<?=$users->npwp;?>" disabled>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="alamat">Alamat
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="5" value="<?=$users->alamat;?>" disabled></textarea>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kode-pos">Kode Pos
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="kode-pos" name="kode-pos" rows="5" value="<?=$users->kode_pos;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kode-pos">Kelurahan
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="kelurahan" name="kelurahan" rows="5" value="<?=$users->kelurahan;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kode-pos">Kecamatan
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="kecamatan" name="kecamatan" rows="5" value="<?=$users->kecamatan;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kode-pos">Kota / Kab.
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="kota_kabupaten" name="kota_kabupaten" rows="5" value="<?=$users->kota_kabupaten;?>" disabled>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kode-pos">Provinsi
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="provinsi" name="provinsi" rows="5" value="<?=$users->provinsi;?>" disabled>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-tinggal">Tempat Tinggal
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="tempat-tinggal" name="tempat-tinggal" rows="5" value="<?=$users->tempat_tinggal;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-tinggal">Alat Transportasi
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="tempat-tinggal" name="tempat-tinggal" rows="5" value="<?=$users->alat_transportasi;?>" disabled>
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-telp">No Telp/HP
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="no-telp" name="no-telp" rows="5" value="<?=$users->no_telp;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-whatsapp">No Whatsapp
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="no-whatsapp" name="no-whatsapp" rows="5" value="<?=$users->no_whatsapp;?>" disabled> 
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="email" name="email" rows="5" value="<?=$users->email;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Ukuran Jas Almamater
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="ukuran_jas_almamater" name="ukuran_jas_almamater" rows="5" value="<?=$users->ukuran_jas_almamater;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Ukuran Baju Praktik
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="ukuran_baju_praktik" name="ukuran_baju_praktik" rows="5" value="<?=$users->ukuran_baju_praktik;?>" disabled>
                                            </div>
                                        </div>

                                      <h4>Data Orang Tua</h4>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-ayah">Nama Ayah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-ayah" name="nama-ayah" value="<?=$users->nama_ayah;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik-ayah">NIK Ayah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nik-ayah" name="nik-ayah" value="<?=$users->nik_ayah;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ayah">Tempat Lahir Ayah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ayah" name="tempat-lahir-ayah" value="<?=$users->tempat_lahir_ayah;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir-ayah">Tanggal Lahir Ayah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal-lahir-ayah" name="tanggal-lahir-ayah" value="<?=$users->tanggal_lahir_ayah;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ayah">Pendidikan Terakhir Ayah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ayah" name="tempat-lahir-ayah" value="<?=$users->pendidikan_terakhir_ayah;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ayah">Pekerjaan Ayah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ayah" name="tempat-lahir-ayah" value="<?=$users->pekerjaan_ayah;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ayah">Penghasilan Ayah (Sebulan)
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ayah" name="tempat-lahir-ayah" value="<?=$users->penghasilan_ayah;?>" disabled>
                                            </div>
                                        </div>
                                       
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-ibu">Nama Ibu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-ibu" name="nama-ibu" value="<?=$users->nama_ibu;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik-ibu">NIK Ibu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nik-ibu" name="nik-ibu" value="<?=$users->nik_ibu;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Tempat Lahir Ibu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ibu" name="tempat-lahir-ibu" value="<?=$users->tempat_lahir_ibu;?>" disabled>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir-ibu">Tanggal Lahir Ibu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal-lahir-ibu" name="tanggal-lahir-ibu" value="<?=$users->tanggal_lahir_ibu;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Pendidikan Terakhir Ibu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ibu" name="tempat-lahir-ibu" value="<?=$users->pendidikan_terakhir_ibu;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Pekerjaan Ibu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ibu" name="tempat-lahir-ibu" value="<?=$users->pekerjaan_ibu;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Penghasilan Ibu (sebulam)
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ibu" name="tempat-lahir-ibu" value="<?=$users->penghasilan_ibu;?>" disabled>
                                            </div>
                                        </div>
                                      <h4>Data Pribadi</h4>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Asal Sekolah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ibu" name="tempat-lahir-ibu" value="<?=$users->asal_sekolah;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-sekolah">Nama Sekolah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" value="<?=$users->nama_sekolah;?>" disabled>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-sekolah">Provinsi Sekolah
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" value="<?=$users->provinsi_sekolah;?>" disabled>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-sekolah">Tahun lulus
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" value="<?=$users->tahun_lulus;?>" disabled>
                                            </div>
                                        </div>
                                      <h4>Berkas Mahasiswa</h4>
                                     
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Pas Foto 4x6
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/'.$users->pas_foto)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">KTP
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/'.$users->ktp)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Kartu Keluarga
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/'.$users->kk)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Ijazah/SKL
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/'.$users->ijazah)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Surat Keterangan Sehat Jasmani
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/'.$users->sksj)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Surat Keterangan Bebas Narkoba
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/' . $users->skbn)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Surat Keterangan Tidak Buta Warna (khusus prodi tertentu)
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/berkas-mahasiswa/' . $users->sktbw)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Surat Perubahan UKT
                                            </label>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url('files/pdf/surat-pernyataan-ukt/' . $users->spu)?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
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