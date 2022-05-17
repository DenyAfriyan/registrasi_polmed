<?= $this->extend('layout/mahasiswa_template'); ?>

<?= $this->section('content'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Biodata Diri</a></li>
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
                                    <form class="form-valide" action="<?= base_url(); ?>/mahasiswa/saveBiodataDiri/ <?= $userInfo['id'] ?>" method="post">
                                      <?= csrf_field(); ?>
                                      <h4>Data Pribadi</h4>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-pendaftaran">No. Pendaftaran <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no-pendaftaran" name="no-pendaftaran" placeholder="Masukan no pendaftaran.." value="<?= $users->no_pendaftaran ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="program-studi">Program Studi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="program-studi" name="program-studi" placeholder="Masukan program studi.." value="<?= $users->program_studi ?>" disabled>
                                            </div>
                                        </div>
                                        <label class="col-form-label col-sm-2 pt-0">Peserta KIPK: </label>
                                        	<div class="col-sm-10">
                                          		<div class="form-check mb-3">
                                            		<input class="form-check-input" type="radio" name="kipk" value="kipk" <?= $users->peserta_kipk == "Y" ? "checked " . " disabled": "disabled" ;?>>
                                            		<label class="form-check-label">KIPK</label>
                                          		</div>
                                              <div class="form-check mb-3">
                                            		<input class="form-check-input" type="radio" name="kipk" value="nonkipk" <?= $users->peserta_kipk == "T" ? "checked " . " disabled": "disabled" ;?>>
                                            		<label class="form-check-label">non-KIPK</label>
                                          	</div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-lengkap">Nama Lengkap <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-lengkap" name="nama-lengkap" placeholder="Masukan nama lengkap.." value="<?= $users->nama_lengkap ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir">Tempat Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="tempat-lahir" name="tempat-lahir" rows="5" placeholder="Masukan tempat lahir.." value="<?= $users->tempat_lahir == null ? old('tempat-lahir') : $users->tempat_lahir ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tempat-lahir'): '' ?></div>
                                            </div>
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir">Tanggal Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" rows="5" placeholder="Masukan tanggal lahir.." value="<?= $users->tanggal_lahir ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tanggal-lahir'): '' ?></div>
                                            </div>
                                        </div>
                                      	<label class="col-form-label col-sm-2 pt-0">Jenis Kelamin: </label>
                                      	<div class="col-sm-10">
                                        	<div class="form-check mb-3">
                                          		<input class="form-check-input" type="radio" name="jenis-kelamin" value="pria" <?= $users->jenis_kelamin == "pria" ? "checked ": "" ;?>>
                                          		<label class="form-check-label">Pria</label>
                                        	</div>
                                        	<div class="form-check mb-3">
                                          		<input class="form-check-input" type="radio" name="jenis-kelamin" value="wanita" <?= $users->jenis_kelamin == "wanita" ? "checked ": "" ;?>>
                                          		<label class="form-check-label">Wanita</label>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'jenis-kelamin'): '' ?></div>	
                                        	</div>
                                      	</div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="agama">Agama <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="agama" name="agama">
                                                    <option value="">Please select</option>
                                                    <option value="Islam" <?= $users->agama == "Islam" ? "selected ": "" ;?>>Islam</option>
                                                    <option value="Khatolik" <?= $users->agama == "Khatolik" ? "selected ": "" ;?>>Khatolik</option>
                                                    <option value="Protestan" <?= $users->agama == "Protestan" ? "selected ": "" ;?>>Protestan</option>
                                                    <option value="Budha" <?= $users->agama == "Budha" ? "selected ": "" ;?>>Budha</option>
                                                    <option value="Hindu" <?= $users->agama == "Hindu" ? "selected ": "" ;?>>Hindu</option>
                                                    <option value="Khonghucu" <?= $users->agama == "Khonghucu" ? "selected ": "" ;?>>Khonghucu</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'agama'): '' ?></div>
                                            </div>	
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik">NIK <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="nik" name="nik" rows="5" placeholder="Masukan NIK.." value="<?= $users->nik == null ? old('nik') : $users->nik ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nik'): '' ?></div>
                                            </div>	
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nisn">NISN <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="nisn" name="nisn" rows="5" placeholder="Masukan NISN.." value="<?= $users->nisn== null ? old('nisn') : $users->nisn ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nisn'): '' ?></div>
                                            </div>	
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="npwp">NPWP 
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="npwp" name="npwp" rows="5" placeholder="Masukan NPWP.." value="<?= $users->npwp ?>">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="alamat">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Masukan alamat.." ><?=$users->alamat;?></textarea>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'alamat'): '' ?></div>
                                            </div>	
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kode-pos">Kode Pos <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="kode-pos" name="kode-pos" rows="5" placeholder="Masukan kode pos.." value="<?= $users->kode_pos == null ? old('kode-pos') : $users->kode_pos ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'kode-pos'): '' ?></div>
                                            </div>	
                                        </div>
                                        <div class="form-group row">
                                            <!--<label class="col-lg-4 col-form-label" for="kelurahan">Kelurahan <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kelurahan" name="kelurahan">
                                                    <option value="">Please select</option>
                                                  	<option value="kelurahan">kelurahan</option>
                                                </select>
                                            </div>-->
                                          	<label class="col-lg-4 col-form-label" for="kelurahan">Kelurahan <span class="text-danger">*</span></label>
                                          	<div class="col-lg-6">
                                                <input class="form-control" id="kelurahan" name="kelurahan" rows="5" value="<?= $users->kelurahan ?>" placeholder="Masukan kelurahan..">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'kelurahan'): '' ?></div>
                                            </div>	
                                        </div>
                                       <div class="form-group row">
                                            <!--<label class="col-lg-4 col-form-label" for="kecamatan">Kecamatan <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kecamatan" name="kecamatan">
                                                    <option value="">Please select</option>
                                                  	<option value="html">kecamatan</option>
                                                </select>
                                            </div>-->
                                         	<label class="col-lg-4 col-form-label" for="kecamatan">kecamatan <span class="text-danger">*</span></label>
                                          	<div class="col-lg-6">
                                                <input class="form-control" id="kecamatan" name="kecamatan" rows="5" value="<?= $users->kecamatan ?>" placeholder="Masukan kecamatan..">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'kecamatan'): '' ?></div>
                                            </div>	
                                        </div>
                                      <div class="form-group row">
                                            <!--<label class="col-lg-4 col-form-label" for="kota-kab">Kota/Kab. <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kota-kab" name="kota-kab">
                                                    <option value="">Please select</option>
                                                  	<option value="html">kota-kab</option>
                                                </select>
                                            </div> -->
                                        	<label class="col-lg-4 col-form-label" for="kota-kab">Kota/Kab <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="kota-kab" name="kota-kab" rows="5" value="<?= $users->kota_kabupaten ?>" placeholder="Masukan kabupaten..">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'kota-kab'): '' ?></div>
                                            </div>	
                                        </div>
                                      <div class="form-group row">
                                            <!-- <label class="col-lg-4 col-form-label" for="provinsi">Provinsi <span class="text-danger">*</span> 
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="provinsi" name="provinsi">
                                                    <option value="">Please select</option>
                                                  	<option value="html">provinsi</option>
                                                </select>
                                            </div> -->
                                         	<label class="col-lg-4 col-form-label" for="provinsi">Provinsi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="provinsi" name="provinsi" rows="5" value="<?= $users->provinsi ?>" placeholder="Masukan provinsi..">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'provinsi'): '' ?></div>
                                            </div>	
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-tinggal">Tempat Tinggal <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="tempat-tinggal" name="tempat-tinggal">
                                                    <option value="">Please select</option>
                                                    <option value="Kos" <?= $users->tempat_tinggal == "Kos" ? "selected ": "" ;?>>Kos</option>
                                                    <option value="Kontrakan" <?= $users->tempat_tinggal == "Kontrakan" ? "selected ": "" ;?>>Kontrakan</option>
                                                    <option value="Milik Sendiri" <?= $users->tempat_tinggal == "Milik Sendiri" ? "selected ": "" ;?>>Milik Sendiri</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tempat-tinggal'): '' ?></div>
                                            </div>	
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="alat-transportasi">Alat Transportasi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="alat-transportasi" name="alat-transportasi">
                                                    <option value="">Please select</option>
                                                  	<option value="Angkutan Umum" <?= $users->alat_transportasi == "Angkutan Umum" ? "selected ": "" ;?>>Angkutan Umum</option>
                                                    <option value="Sepeda" <?= $users->alat_transportasi == "Sepeda" ? "selected ": "" ;?>>Sepeda</option>
                                                    <option value="Motor" <?= $users->alat_transportasi == "Motor" ? "selected ": "" ;?>>Motor</option>
                                                    <option value="Mobil" <?= $users->alat_transportasi == "Mobil" ? "selected ": "" ;?>>Mobil</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'alat-transportasi'): '' ?></div>	
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-telp">No Telp/HP <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="no-telp" name="no-telp" rows="5" placeholder="Masukan no.telp.."  value="<?= $users->no_telp ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'no-telp'): '' ?></div>	
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no-whatsapp">No Whatsapp <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="no-whatsapp" name="no-whatsapp" rows="5" placeholder="Masukan no.whatsapp.."  value="<?= $users->no_whatsapp ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'no-whatsapp'): '' ?></div>	
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger" value="<?= $users->email ?>">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="email" name="email" rows="5" placeholder="Masukan email.."  value="<?= $users->email ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'email'): '' ?></div>	
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="ukuran-almamater">Ukuran Almamater <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="ukuran-almamater" name="ukuran-almamater">
                                                    <option value="">Please select</option>
                                                  	<option value="S" <?= $users->ukuran_jas_almamater == "S" ? "selected ": "" ;?>>S</option>
                                                    <option value="M" <?= $users->ukuran_jas_almamater == "M" ? "selected ": "" ;?>>M</option>
                                                    <option value="L" <?= $users->ukuran_jas_almamater == "L" ? "selected ": "" ;?>>L</option>
                                                    <option value="XL" <?= $users->ukuran_jas_almamater == "XL" ? "selected ": "" ;?>>XL</option>
                                                  	<option value="XXL" <?= $users->ukuran_jas_almamater == "XXL" ? "selected ": "" ;?>>XXL</option>
                                                  	<option value="XXXL" <?= $users->ukuran_jas_almamater == "XXXL" ? "selected ": "" ;?>>XXXL</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'ukuran-almamater'): '' ?></div>	
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="ukuran-baju-praktik">Ukuran Baju Praktik <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="ukuran-baju-praktik" name="ukuran-baju-praktik">
                                                    <option value="">Please select</option>
                                                  	<option value="S" <?= $users->ukuran_baju_praktik == "S" ? "selected ": "" ;?>>S</option>
                                                    <option value="M" <?= $users->ukuran_baju_praktik == "M" ? "selected ": "" ;?>>M</option>
                                                    <option value="L" <?= $users->ukuran_baju_praktik == "L" ? "selected ": "" ;?>>L</option>
                                                    <option value="XL" <?= $users->ukuran_baju_praktik == "XL" ? "selected ": "" ;?>>XL</option>
                                                  	<option value="XXL" <?= $users->ukuran_baju_praktik == "XXL" ? "selected ": "" ;?>>XXL</option>
                                                  	<option value="XXXL" <?= $users->ukuran_baju_praktik == "XXXL" ? "selected ": "" ;?>>XXXL</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'ukuran-baju-praktik'): '' ?></div>	
                                            </div>
                                        </div>
                                      <h4>Data Orang Tua</h4>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-ayah">Nama Ayah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-ayah" name="nama-ayah" placeholder="Masukan nama ayah.."  value="<?= $users->nama_ayah ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nama-ayah'): '' ?></div>	
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik-ayah">NIK Ayah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nik-ayah" name="nik-ayah" placeholder="Masukan NIK ayah.."  value="<?= $users->nik_ayah ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nik-ayah'): '' ?></div>
                                            </div>	
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ayah">Tempat Lahir Ayah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ayah" name="tempat-lahir-ayah" placeholder="Masukan tempat lahir ayah.."  value="<?= $users->tempat_lahir_ayah ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tempat-lahir-ayah'): '' ?></div>	
                                            </div>                                          	
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir-ayah">Tanggal Lahir Ayah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal-lahir-ayah" name="tanggal-lahir-ayah" placeholder="Masukan tanggal lahir ayah.."  value="<?= $users->tanggal_lahir_ayah ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tanggal-lahir-ayah'): '' ?></div>	
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pendidikan-terakhir-ayah">Pendidikan Terakhir Ayah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="pendidikan-terakhir-ayah" name="pendidikan-terakhir-ayah">
                                                    <option value="">Please select</option>
                                                    <option value="Tidak Sekolah" <?= $users->pendidikan_terakhir_ayah == "Tidak Sekolah" ? "selected ": "" ;?>>Tidak Sekolah</option>
                                                    <option value="SD" <?= $users->pendidikan_terakhir_ayah == "SD" ? "selected ": "" ;?>>SD</option>
                                                    <option value="SMP" <?= $users->pendidikan_terakhir_ayah == "SMP" ? "selected ": "" ;?>>SMP</option>
                                                    <option value="SMA" <?= $users->pendidikan_terakhir_ayah == "SMA" ? "selected ": "" ;?>>SMA</option>
                                                    <option value="Diploma" <?= $users->pendidikan_terakhir_ayah == "Diploma" ? "selected ": "" ;?>>Diploma</option>
                                                    <option value="S1" <?= $users->pendidikan_terakhir_ayah == "S1" ? "selected ": "" ;?>>S1</option>
                                                  	<option value="S2" <?= $users->pendidikan_terakhir_ayah == "S2" ? "selected ": "" ;?>>S2</option>
                                                  	<option value="S3" <?= $users->pendidikan_terakhir_ayah == "S3" ? "selected ": "" ;?>>S3</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'pendidikan-terakhir-ayah'): '' ?></div>
                                            </div>	
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaan-ayah">Pekerjaan Ayah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="pekerjaan-ayah" name="pekerjaan-ayah">
                                                    <option value="">Please select</option>
                                                    <option value="Tidak Bekerja" <?= $users->pekerjaan_ayah == "Tidak Bekerja" ? "selected ": "" ;?>>Tidak Bekerja</option>
                                                    <option value="Petani" <?= $users->pekerjaan_ayah == "Petani" ? "selected ": "" ;?>>Petani</option>
                                                    <option value="Peternak" <?= $users->pekerjaan_ayah == "Peternak" ? "selected ": "" ;?>>Peternak</option>
                                                    <option value="Pedagang" <?= $users->pekerjaan_ayah == "Pedagang" ? "selected ": "" ;?>>Pedagang</option>
                                                    <option value="Karyawan Swasta" <?= $users->pekerjaan_ayah == "Karyawan Swasta" ? "selected ": "" ;?>>Karyawan Swasta</option>
                                                    <option value="PNS" <?= $users->pekerjaan_ayah == "PNS" ? "selected ": "" ;?>>PNS</option>
                                                  	<option value="Wirausaha" <?= $users->pekerjaan_ayah == "Wirausaha" ? "selected ": "" ;?>>Wirausaha</option>
                                                  	<option value="Pensiunan" <?= $users->pekerjaan_ayah == "Pensiunan" ? "selected ": "" ;?>>Pensiunan</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'pekerjaan-ayah'): '' ?></div>
                                            </div>	
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="penghasilan-ayah">Penghasilan Ayah (Sebulan) <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="penghasilan-ayah" name="penghasilan-ayah">
                                                    <option value="">Please select</option>
                                                    <option value="Di bawah Rp.500 ribu s.d Rp. 1 juta" <?= $users->penghasilan_ayah == "Di bawah Rp.500 ribu s.d Rp. 1 juta" ? "selected ": "" ;?>>Di bawah Rp.500 ribu s.d Rp. 1 juta</option>
                                                  	<option value="Rp. 1 juta s.d Rp. 2 juta" <?= $users->penghasilan_ayah == "Rp. 1 juta s.d Rp. 2 juta" ? "selected ": "" ;?>>Rp. 1 juta s.d Rp. 2 juta</option>
                                                  	<option value="Rp. 2 juta s.d Rp. 5 juta" <?= $users->penghasilan_ayah == "Rp. 2 juta s.d Rp. 5 juta" ? "selected ": "" ;?>>Rp. 2 juta s.d Rp. 5 juta</option>
                                                  	<option value="Di atas Rp. 5 juta" <?= $users->penghasilan_ayah == "Di atas Rp. 5 juta" ? "selected ": "" ;?>>Di atas Rp. 5 juta</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'penghasilan-ayah'): '' ?></div>	
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-ibu">Nama Ibu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-ibu" name="nama-ibu" placeholder="Masukan nama ibu.."  value="<?= $users->nama_ibu ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nama-ibu'): '' ?></div>
                                            </div>	
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik-ibu">NIK Ibu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nik-ibu" name="nik-ibu" placeholder="Masukan NIK ibu.."  value="<?= $users->nik_ibu ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nik-ibu'): '' ?></div>
                                            </div>	
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tempat-lahir-ibu">Tempat Lahir Ibu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat-lahir-ibu" name="tempat-lahir-ibu" placeholder="Masukan tempat lahir ibu.."  value="<?= $users->tempat_lahir_ibu ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tempat-lahir-ibu'): '' ?></div>
                                            </div>	
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tanggal-lahir-ibu">Tanggal Lahir Ibu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal-lahir-ibu" name="tanggal-lahir-ibu" placeholder="Masukan tanggal lahir ibu.."  value="<?= $users->tanggal_lahir_ibu ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tanggal-lahir-ibu'): '' ?></div>
                                            </div>	
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pendidikan-terakhir-ibu">Pendidikan Terakhir Ibu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="pendidikan-terakhir-ibu" name="pendidikan-terakhir-ibu">
                                                    <option value="">Please select</option>
                                                    <option value="Tidak Sekolah" <?= $users->pendidikan_terakhir_ibu == "Tidak Sekolah" ? "selected ": "" ;?>>Tidak Sekolah</option>
                                                    <option value="SD" <?= $users->pendidikan_terakhir_ibu == "SD" ? "selected ": "" ;?>>SD</option>
                                                    <option value="SMP" <?= $users->pendidikan_terakhir_ibu == "SMP" ? "selected ": "" ;?>>SMP</option>
                                                    <option value="SMA" <?= $users->pendidikan_terakhir_ibu == "SMA" ? "selected ": "" ;?>>SMA</option>
                                                    <option value="Diploma" <?= $users->pendidikan_terakhir_ibu == "Diploma" ? "selected ": "" ;?>>Diploma</option>
                                                    <option value="S1" <?= $users->pendidikan_terakhir_ibu == "S1" ? "selected ": "" ;?>>S1</option>
                                                  	<option value="S2" <?= $users->pendidikan_terakhir_ibu == "S2" ? "selected ": "" ;?>>S2</option>
                                                  	<option value="S3" <?= $users->pendidikan_terakhir_ibu == "S3" ? "selected ": "" ;?>>S3</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'pendidikan-terakhir-ibu'): '' ?></div>
                                            </div>	
                                        </div>
                                      	<div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaan-ibu">Pekerjaan Ibu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="pekerjaan-ibu" name="pekerjaan-ibu">
                                                    <option value="">Please select</option>
                                                    <option value="Tidak Bekerja" <?= $users->pekerjaan_ibu == "Tidak Bekerja" ? "selected ": "" ;?>>Tidak Bekerja</option>
                                                    <option value="Petani" <?= $users->pekerjaan_ibu == "Petani" ? "selected ": "" ;?>>Petani</option>
                                                    <option value="Peternak" <?= $users->pekerjaan_ibu == "Peternak" ? "selected ": "" ;?>>Peternak</option>
                                                    <option value="Pedagang" <?= $users->pekerjaan_ibu == "Pedagang" ? "selected ": "" ;?>>Pedagang</option>
                                                    <option value="Karyawan Swasta" <?= $users->pekerjaan_ibu == "Karyawan Swasta" ? "selected ": "" ;?>>Karyawan Swasta</option>
                                                    <option value="PNS" <?= $users->pekerjaan_ibu == "PNS" ? "selected ": "" ;?>>PNS</option>
                                                  	<option value="Wirausaha" <?= $users->pekerjaan_ibu == "Wirausaha" ? "selected ": "" ;?>>Wirausaha</option>
                                                  	<option value="Pensiunan" <?= $users->pekerjaan_ibu == "Pensiunan" ? "selected ": "" ;?>>Pensiunan</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'pekerjaan-ibu'): '' ?></div>
                                            </div>	
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="penghasilan-ibu">Penghasilan Ibu (Sebulan) <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="penghasilan-ibu" name="penghasilan-ibu">
                                                    <option value="">Please select</option>
                                                    <option value="Di bawah Rp.500 ribu s.d Rp. 1 juta" <?= $users->penghasilan_ibu == "Di bawah Rp.500 ribu s.d Rp. 1 juta" ? "selected ": "" ;?>>Di bawah Rp.500 ribu s.d Rp. 1 juta</option>
                                                  	<option value="Rp. 1 juta s.d Rp. 2 juta" <?= $users->penghasilan_ibu == "Rp. 1 juta s.d Rp. 2 juta" ? "selected ": "" ;?>>Rp. 1 juta s.d Rp. 2 juta</option>
                                                  	<option value="Rp. 2 juta s.d Rp. 5 juta" <?= $users->penghasilan_ibu == "Rp. 2 juta s.d Rp. 5 juta" ? "selected ": "" ;?>>Rp. 2 juta s.d Rp. 5 juta</option>
                                                  	<option value="Di atas Rp. 5 juta" <?= $users->penghasilan_ibu == "Di atas Rp. 5 juta" ? "selected ": "" ;?> >Di atas Rp. 5 juta</option>
                                                </select>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'penghasilan-ibu'): '' ?></div>	
                                            </div>
                                        </div>
                                      <h4>Data Pribadi</h4>
                                      <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="asal-sekolah">Asal Sekolah <span class="text-danger">*</span>
                                        </label>
                                            <div class="col-lg-6">
                                              <select class="form-control" id="asal-sekolah" name="asal-sekolah">
                                                <option value="">Please select</option>
                                                <option value="SMA" <?= $users->asal_sekolah == "SMA" ? "selected ": "" ;?>>SMA</option>
                                                <option value="SMK" <?= $users->asal_sekolah == "SMK" ? "selected ": "" ;?>>SMK</option>
                                                <option value="MA" <?= $users->asal_sekolah == "MA" ? "selected ": "" ;?>>MA</option>
                                                <option value="Paket C" <?= $users->asal_sekolah == "Paket C" ? "selected ": "" ;?>>Paket C</option>
                                              </select>
                                              <div class="text-danger small"><?= isset($validation) ? display_error($validation,'asal-sekolah'): '' ?></div>
                                            </div>	
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama-sekolah">Nama Sekolah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama-sekolah" name="nama-sekolah" placeholder="Masukan nama Sekolah.."  value="<?= $users->nama_sekolah ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'nama-sekolah'): '' ?></div>	
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="provinsi-sekolah">Provinsi Sekolah <span class="text-danger">*</span>
                                            </label>
                                         	<div class="col-lg-6">
                                                <input type="text" class="form-control" id="provinsi-sekolah" name="provinsi-sekolah" placeholder="Masukan provinsi Sekolah.."  value="<?= $users->provinsi_sekolah ?>">
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'provinsi-sekolah'): '' ?></div>	
                                            </div>
                                        </div>
                                       <label class="col-form-label col-sm-2 pt-0">Tahun Lulus: </label>
                                        	<div class="col-sm-10">
                                          		<div class="form-check mb-3">
                                            		<input class="form-check-input" type="radio" name="tahun-lulus" value="2020" <?= $users->tahun_lulus == "2020" ? "checked ": "" ;?>>
                                            		<label class="form-check-label">2020</label>
                                          		</div>
                                              	<div class="form-check mb-3">
                                            		<input class="form-check-input" type="radio" name="tahun-lulus" value="2021" <?= $users->tahun_lulus == "2021" ? "checked ": "" ;?>>
                                            		<label class="form-check-label">2021</label>
                                              	</div>
                                              	<div class="form-check mb-3">
                                            		<input class="form-check-input" type="radio" name="tahun-lulus" value="2022" <?= $users->tahun_lulus == "2022" ? "checked ": "" ;?>>
                                            		<label class="form-check-label">2022</label>
                                              	</div>
                                              	<div class="text-danger small"><?= isset($validation) ? display_error($validation,'tahun-lulus'): '' ?></div>
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