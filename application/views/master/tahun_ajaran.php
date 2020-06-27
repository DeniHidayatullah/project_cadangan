<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo $judul; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Master </a></li>
      <li class="active"><?php echo $judul; ?></li>
    </ol>
  </section>
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/master/tahun_ajaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="datatb" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tahun Ajaran</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
              
                foreach ($tahun_ajaran->result_array() as $data) { ?>
                  <tr>
                    <td><?php echo $data['tahun_ajaran']; ?></td>
                    <td><?php echo $data['semester']; ?></td>
                    <td style="text-align:center;"><?php
                                                    if ($data['aktif_tahun_ajaran'] == '1') {
                                                      echo '<label class="label label-success">AKTIF</label>';
                                                    } else {
                                                      echo '<label class="label label-default">TIDAK AKTIF</label>';
                                                    }
                                                    ?>
                    </td>
                    <td style="text-align:center;">
                      <a class="btn btn-success btn-xs" href="<?php echo base_url() . 'admin/master/tahun_ajaran_edit/' . $data['id_tahun_ajaran']; ?>"><i class="fa fa-edit"> </i> Ubah </a>
                    </td>
                    <td style="text-align:center;">
                      <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'admin/master/tahun_ajaran_hapus/' . $data['id_tahun_ajaran']; ?>"><i class="fa fa-edit"> </i> Hapus </a>
                    </td>

                  </tr>
                <?php 
                } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>