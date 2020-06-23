<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo $judul; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Siswa</a></li>
      <li class="active"><?php echo $judul; ?></li>
    </ol>
  </section>
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-xs-4">
                <form role="form" action="<?php echo base_url(); ?>admin/pengguna/proses_tampil_siswa" method="post">
                  <div class="row">
                    <div class="col-xs-6">
                      <select class="form-control select2" name="kode_kelas" required>
                        <?php echo $combo_kelas; ?>
                      </select>
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-xs-8 text-right">
                <a class="btn btn-primary" href="<?php echo base_url() . 'admin/siswa/siswa_export/' . $kode_kelas; ?>" target="_blank"><i class="fa fa-download"> </i> Export Ke Excel</a>
                <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-upload"> </i> Import Dari Excel</a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/pengguna/siswa_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="datatb" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nis</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>Kelas</th>
                  <th>Angkatan</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($siswa)) {
                  $no = 1;
                  foreach ($siswa->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['nama_siswa']; ?></td>
                      <td><?php echo $data['jenis_kelamin']; ?></td>
                      <td><?php if (!empty($data['tanggal_lahir'])) echo date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['angkatan']; ?></td>
                      <td style="text-align:center;"><?php
                                                      if ($data['aktif_siswa'] == '1') {
                                                        echo '<label class="label label-success">AKTIF</label>';
                                                      } else {
                                                        echo '<label class="label label-default">TIDAK AKTIF</label>';
                                                      }
                                                      ?>
                      </td>
                      <td style="text-align:center;">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'admin/Pengguna/siswa_detail/' . $data['nis']; ?>"><i class="fa fa-search"> </i> Detail</a>
                        <a class="btn btn-success btn-xs" href="<?php echo base_url() . 'admin/Pengguna/siswa_edit/' . $data['kode_siswa']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'admin/pengguna/siswa_hapus/' . $data['nis']; ?>"><i class="fa fa-trash"> </i> Hapus </a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>

                <?php } else {
                  echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>';
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

<div class="modal fade" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Import Data Siswa Dari Excel</h4>
      </div>
      <div class="modal-body">
        <div id="info"></div>
        <form role="form" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>File Excel</label>
            <input type="file" class="form-control" name="file_excel" required>
            <a href="<?php echo base_url(); ?>upload/siswa_import.xls" target="_blank" style="color:#000;text-decoration:underline;font-weight:bold;">Format file dapat didownload disini</a>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" name="btn_import"><i class="fa fa-save"> </i> Import</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php

if (isset($_POST['btn_import'])) {

  require('asset/excell/php-excel-reader/excel_reader2.php');

  require('asset/excell/SpreadsheetReader.php');


  $target_dir = "upload/";

  $name = pathinfo($_FILES['file_excel']['name'], PATHINFO_FILENAME);
  $extension = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);

  $increment = '';

  while (file_exists($target_dir . $name . $increment . '.' . $extension)) {
    $increment++;
  }

  $basename = md5($name . $increment) . '.' . $extension;
  $target_file = $target_dir . basename($basename);

  if (move_uploaded_file($_FILES["file_excel"]["tmp_name"], $target_file)) {
    $Reader = new SpreadsheetReader($target_file);


    foreach ($Reader as $row) {
      $datax[] = $row;
    }
    array_shift($datax);
    foreach ($datax as $item) {
      $in['nis'] = $item[0];
      $in['nisn'] = $item[1];
      $in['nama_siswa'] = $item[2];
      $in['kode_kelas'] = $item[3];
      $in['jenis_kelamin'] = $item[4];
      $in['angkatan'] = $item[5];
      $in['password'] = $item[0];
      $this->db->insert("pgn_siswa", $in);
    }
    echo '<script>
          alert("Berhasil Import Data Siswa");
          document.location.href="' . base_url() . 'siswa/siswa"
          </script>';
  }
}
?>