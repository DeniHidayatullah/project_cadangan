<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li><a href="<?php echo base_url(); ?>master/tahun_ajaran"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>admin/master/tahun_ajaran_save" method="post">


					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_tahun_ajaran" value="<?php echo $id_tahun_ajaran; ?>">
                        <div class="box-body">
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="text" class="form-control" name="semester" value="<?php echo $semester; ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_tahun_ajaran"  required>
                                            <option value="1" <?php if($aktif_tahun_ajaran == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_tahun_ajaran == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>admin/master/tahun_ajaran"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>