<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li><a href="<?php echo base_url(); ?>admin/Akademik/akd_mapel"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>admin/Akademik/akd_mapel_save" method="post">


					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="kode_mapel" value="<?php echo $kode_mapel; ?>">
                        <div class="box-body">
                        <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Kode Mata Pelajaran</label>
                                        <input type="text" class="form-control" name="kode_mapel" value="<?php echo $kode_mapel; ?>" required>
                                    </div>
                                    
                                </div>
                               
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>ID Kelompok Pelajaran</label>
                                        <input type="text" class="form-control" name="id_kelompok_pelajaran" value="<?php echo $id_kelompok_pelajaran; ?>" required>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Kode Jurusan</label>
                                        <input type="text" class="form-control" name="kode_jurusan" value="<?php echo $kode_jurusan; ?>" required>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Mata Pelajaran</label>
                                        <input type="text" class="form-control" name="nama_mapel" value="<?php echo $nama_mapel; ?>" required>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>KKM</label>
                                        <input type="text" class="form-control" name="kkm" value="<?php echo $kkm; ?>" required>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="aktif_mapel" value="<?php echo $aktif_mapel; ?>" required>
                                    </div>
                                    
                                </div>
                               
                            </div>
                       
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>admin/Akademik/akd_mapel"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>