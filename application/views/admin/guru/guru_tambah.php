<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Pengguna</a></li>
            <li><a href="<?php echo base_url(); ?>pengguna/guru"><?php echo $judul; ?></a></li>
            <li class="active"><?php echo $judul2; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <form role="form" action="<?php echo base_url(); ?>admin/pengguna/guru_save" method="post" enctype="multipart/form-data">

                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icon icon-remove"></i>
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
                        <input type="hidden" name="kode_guru" value="<?php echo $kode_guru; ?>">
                        <input type="hidden" name="nip_lama" value="<?php echo $nip; ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Kode Guru</label>
                                        <input type="number" class="form-control" name="kode_guru" value="<?php echo $kode_guru; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>NIPTK</label>
                                        <input type="number" class="form-control" name="nip" value="<?php echo $nip; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>NUPTK</label>
                                        <input type="number" class="form-control" name="nuptk" value="<?php echo $nuptk; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="nik" value="<?php echo $nik; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_guru" value="<?php echo $nama_guru; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" required>
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
                                            <input type="text" class="form-control tgl" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat_jalan" value="<?php echo $alamat_jalan; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control" name="kelurahan" value="<?php echo $kelurahan; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>No Handphone</label>
                                            <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="number" class="form-control" name="telepon" value="<?php echo $telepon; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control" name="agama">
                                                <option value>PILIH</option>
                                                <option value="ISLAM" <?php if ($agama == 'ISLAM') echo 'selected'; ?>>ISLAM</option>
                                                <option value="KATOLIK" <?php if ($agama == 'KATOLIK') echo 'selected'; ?>>KATOLIK</option>
                                                <option value="PROTESTAN" <?php if ($agama == 'PROTESTAN') echo 'selected'; ?>>PROTESTAN</option>
                                                <option value="BUDHA" <?php if ($agama == 'BUDHA') echo 'selected'; ?>>BUDHA</option>
                                                <option value="HINDU" <?php if ($agama == 'HINDU') echo 'selected'; ?>>HINDU</option>
                                                <option value="KONGHUCU" <?php if ($agama == 'KONGHUCU') echo 'selected'; ?>>KONGHUCU</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <select class="form-control" name="kewarganegaraan">
                                                <option value>PILIH</option>
                                                <option value="WNI" <?php if ($kewarganegaraan == 'WNI') echo 'selected'; ?>>WNI</option>
                                                <option value="WNA" <?php if ($kewarganegaraan == 'WNA') echo 'selected'; ?>>WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto">
                                            <p class="help-block">Format File Harus .jpg atau .png</p>
                                            <?php if (!empty($foto)) { ?>
                                                <img src="<?php echo base_url() . 'upload/guru/' . $foto; ?>" style="width:100px;height:100px;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="aktif_guru">
                                                <option value="1" <?php if ($aktif_guru == '1') echo 'selected'; ?>>AKTIF</option>
                                                <option value="0" <?php if ($aktif_guru == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                                <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>admin/pengguna/guru"><i class="fa fa-arrow-left"> </i> Kembali</a>
                            </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>