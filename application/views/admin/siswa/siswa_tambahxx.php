<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Siswa</a></li>
        <li><a href="<?php echo base_url(); ?>siswa/siswa"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>siswa/siswa_save" method="post" enctype="multipart/form-data">

                          <?php if($this->session->flashdata('success')) { ?>
					      <div class="alert alert-success" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <i class="icon icon-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
					      </div>
					      <?php } ?>

					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
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
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="number" class="form-control" name="nis" value="<?php echo $nis; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input type="number" class="form-control" name="nisn" value="<?php echo $nisn; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_siswa" value="<?php echo $nama_siswa; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value>PILIH</option>
                                            <option value="Laki-Laki" <?php if($jenis_kelamin == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input  type="text" class="form-control tgl" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" placeholder="dd-mm-yyyy" required>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama" required>
                                            <option value>PILIH</option>
                                            <option value="Islam" <?php if($agama == 'Islam') echo 'selected'; ?>>Islam</option>
                                            <option value="Katolik" <?php if($agama == 'Katolik') echo 'selected'; ?>>Katolik</option>
                                            <option value="Protestan" <?php if($agama == 'Protestan') echo 'selected'; ?>>Protestan</option>
                                            <option value="Budha" <?php if($agama == 'Budha') echo 'selected'; ?>>Budha</option>
                                            <option value="Hindu" <?php if($agama == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                            <option value="Konghucu" <?php if($agama == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat_jalan" value="<?php echo $alamat_jalan; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" value="<?php echo $kelurahan; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="number" class="form-control" name="telepon" value="<?php echo $telepon; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Angkatan</label>
                                        <input type="number" class="form-control" name="angkatan" value="<?php echo $angkatan; ?>" placeholder="Contoh : 2019" required>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="kode_kelas" required>
                                           <?php echo $combo_kelas; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto">
                                        <p class="help-block">Format File Harus .jpg atau .png</p>
                                        <?php if(!empty($foto)) { ?>
                                            <img src="<?php echo base_url().'upload/siswa/'.$foto; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>  
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_siswa"  required>
                                            <option value="1" <?php if($aktif_siswa == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_siswa == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>siswa/siswa"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>