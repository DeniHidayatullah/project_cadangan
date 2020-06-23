<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
    </section>
    <section class="content">

        <form action="<?php echo base_url(); ?>siswa/biodata_save" method="post" enctype="multipart/form-data">
            <!-- Main row -->
            <div class="row">
                <div class="col-xs-9">
                    <div class="box box-success">

                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icon icon-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                            </div>
                        <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Data Siswa</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Data Sekolah</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Data Keluarga</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>NIS</label>
                                                    <input type="number" class="form-control" name="nis" value="<?php echo $nis; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>NISN</label>
                                                    <input type="number" class="form-control" name="nisn" value="<?php echo $nisn; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_siswa" value="<?php echo $nama_siswa; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin" required>
                                                        <option value>PILIH</option>
                                                        <option value="Laki-Laki" <?php if ($jenis_kelamin == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                                                        <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" class="form-control tgl" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" placeholder="dd-mm-yyyy" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <select class="form-control" name="agama" required>
                                                        <option value>PILIH</option>
                                                        <option value="Islam" <?php if ($agama == 'Islam') echo 'selected'; ?>>Islam</option>
                                                        <option value="Katolik" <?php if ($agama == 'Katolik') echo 'selected'; ?>>Katolik</option>
                                                        <option value="Protestan" <?php if ($agama == 'Protestan') echo 'selected'; ?>>Protestan</option>
                                                        <option value="Budha" <?php if ($agama == 'Budha') echo 'selected'; ?>>Budha</option>
                                                        <option value="Hindu" <?php if ($agama == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                                        <option value="Konghucu" <?php if ($agama == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text" class="form-control" name="alamat_jalan" value="<?php echo $alamat_jalan; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Kelurahan</label>
                                                    <input type="text" class="form-control" name="kelurahan" value="<?php echo $kelurahan; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>No Handphone</label>
                                                    <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Telepon</label>
                                                    <input type="number" class="form-control" name="telepon" value="<?php echo $telepon; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Angkatan</label>
                                                    <input type="number" class="form-control" name="angkatan" value="<?php echo $angkatan; ?>" placeholder="Contoh : 2019" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select class="form-control" name="kode_kelas" disabled>
                                                        <?php echo $combo_kelas; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab_2">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Nama Sekolah</label>
                                                    <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $nama_sekolah; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Sekolah</label>
                                                    <select class="form-control" name="status_sekolah" >
                                                        <option value>PILIH</option>
                                                        <option value="SWASTA" <?php if($status_sekolah == 'SWASTA') echo 'selected'; ?>>SWASTA</option>
                                                        <option value="NEGERI" <?php if($status_sekolah == 'NEGERI') echo 'selected'; ?>>NEGERI</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Sekolah</label>
                                                    <input type="text" class="form-control" name="alamat_sekolah" value="<?php echo $alamat_sekolah; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tahun Lulus</label>
                                                    <input type="number" class="form-control" name="tahun_lulus" value="<?php echo $tahun_lulus; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h3>Data Ayah</h3>
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_ayah" value="<?php echo $nama_ayah; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan</label>
                                                    <select class="form-control" name="pendidikan_ayah" >
                                                        <option value>PILIH</option>
                                                        <option value="Tidak Sekolah" <?php if($pendidikan_ayah == 'Tidak Sekolah') echo 'selected'; ?>>Tidak Sekolah</option>
                                                        <option value="SD" <?php if($pendidikan_ayah == 'SD') echo 'selected'; ?>>SD</option>
                                                        <option value="SMP" <?php if($pendidikan_ayah == 'SMP') echo 'selected'; ?>>SMP</option>
                                                        <option value="SMA" <?php if($pendidikan_ayah == 'SMA') echo 'selected'; ?>>SMA</option>
                                                        <option value="DIPLOMA" <?php if($pendidikan_ayah == 'DIPLOMA') echo 'selected'; ?>>DIPLOMA</option>
                                                        <option value="S1" <?php if($pendidikan_ayah == 'S1') echo 'selected'; ?>>S1</option>
                                                        <option value="S2" <?php if($pendidikan_ayah == 'S2') echo 'selected'; ?>>S2</option>
                                                        <option value="S3" <?php if($pendidikan_ayah == 'S3') echo 'selected'; ?>>S3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo $pekerjaan_ayah; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Handphone</label>
                                                    <input type="number" class="form-control" name="no_hp_ayah" value="<?php echo $no_hp_ayah; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h3>Data Ibu</h3>
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_ibu" value="<?php echo $nama_ibu; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan</label>
                                                    <select class="form-control" name="pendidikan_ibu" >
                                                        <option value>PILIH</option>
                                                        <option value="Tidak Sekolah" <?php if($pendidikan_ibu == 'Tidak Sekolah') echo 'selected'; ?>>Tidak Sekolah</option>
                                                        <option value="SD" <?php if($pendidikan_ibu == 'SD') echo 'selected'; ?>>SD</option>
                                                        <option value="SMP" <?php if($pendidikan_ibu == 'SMP') echo 'selected'; ?>>SMP</option>
                                                        <option value="SMA" <?php if($pendidikan_ibu == 'SMA') echo 'selected'; ?>>SMA</option>
                                                        <option value="DIPLOMA" <?php if($pendidikan_ibu == 'DIPLOMA') echo 'selected'; ?>>DIPLOMA</option>
                                                        <option value="S1" <?php if($pendidikan_ibu == 'S1') echo 'selected'; ?>>S1</option>
                                                        <option value="S2" <?php if($pendidikan_ibu == 'S2') echo 'selected'; ?>>S2</option>
                                                        <option value="S3" <?php if($pendidikan_ibu == 'S3') echo 'selected'; ?>>S3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo $pekerjaan_ibu; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Handphone</label>
                                                    <input type="number" class="form-control" name="no_hp_ibu" value="<?php echo $no_hp_ibu; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h3>Data Wali</h3>
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_wali" value="<?php echo $nama_wali; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan</label>
                                                    <select class="form-control" name="pendidikan_wali" >
                                                        <option value>PILIH</option>
                                                        <option value="Tidak Sekolah" <?php if($pendidikan_wali == 'Tidak Sekolah') echo 'selected'; ?>>Tidak Sekolah</option>
                                                        <option value="SD" <?php if($pendidikan_wali == 'SD') echo 'selected'; ?>>SD</option>
                                                        <option value="SMP" <?php if($pendidikan_wali == 'SMP') echo 'selected'; ?>>SMP</option>
                                                        <option value="SMA" <?php if($pendidikan_wali == 'SMA') echo 'selected'; ?>>SMA</option>
                                                        <option value="DIPLOMA" <?php if($pendidikan_wali == 'DIPLOMA') echo 'selected'; ?>>DIPLOMA</option>
                                                        <option value="S1" <?php if($pendidikan_wali == 'S1') echo 'selected'; ?>>S1</option>
                                                        <option value="S2" <?php if($pendidikan_wali == 'S2') echo 'selected'; ?>>S2</option>
                                                        <option value="S3" <?php if($pendidikan_wali == 'S3') echo 'selected'; ?>>S3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" class="form-control" name="pekerjaan_wali" value="<?php echo $pekerjaan_wali; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Handphone</label>
                                                    <input type="number" class="form-control" name="no_hp_wali" value="<?php echo $no_hp_wali; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="box box-success">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="aktif_siswa" disabled>
                                    <option value="1" <?php if ($aktif_siswa == '1') echo 'selected'; ?>>AKTIF</option>
                                    <option value="0" <?php if ($aktif_siswa == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto Siswa</label>
                                <?php if (!empty($foto)) { ?>
                                    <img src="<?php echo base_url() . 'upload/siswa/' . $foto; ?>" class="img-responsive">
                                <?php } else {  ?>
                                    <img class="img-responsive" src="<?php echo base_url(); ?>asset/img/noimage.jpg">
                                <?php } ?>
                                <input type="file" name="foto">
                                <p class="help-block">Format File Harus .jpg atau .png</p>
                            </div>

                            <button style="width:100%;margin-bottom:5px;" type="submit" class="btn btn-success"><i class="fa fa-save"> </i> Simpan </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>