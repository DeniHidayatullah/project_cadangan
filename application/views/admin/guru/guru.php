<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo $judul; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Pengguna</a></li>
      <li class="active"><?php echo $judul; ?></li>
    </ol>
  </section>
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/pengguna/guru_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalImport"><i class="fa fa-plus"> </i> Import Excel</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="datatb" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIPTK</th>
                  <th>NIK</th>
                  <th>Nama Guru</th>
                  <th>No Handphone</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($guru->result_array() as $data) { ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nip']; ?></td>
                    <td><?php echo $data['nik']; ?></td>
                    <td><?php echo $data['nama_guru']; ?></td>
                    <td><?php echo $data['hp']; ?></td>
                    <td style="text-align:center;"><?php
                                                    if ($data['aktif_guru'] == '1') {
                                                      echo '<label class="label label-success">AKTIF</label>';
                                                    } else {
                                                      echo '<label class="label label-default">TIDAK AKTIF</label>';
                                                    }
                                                    ?>
                    </td>
                    <td style="text-align:center;">
                      <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'admin/pengguna/guru_detail/' . $data['nip']; ?>"><i class="fa fa-search"> </i> Detail</a>
                      <a class="btn btn-success btn-xs" href="<?php echo base_url() . 'admin/pengguna/guru_edit/' . $data['kode_guru']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                      <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'admin/pengguna/hapus/' . $data['nip']; ?>"><i class="fa fa-trash"> </i> Hapus </a>
                    </td>
                  </tr>
                <?php $no++;
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

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalUnggahLabel">Import Data Guru</h4>
      </div>

      <form action="<?php echo base_url(); ?>pengguna/guru_import" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <table class="table-form">
            <tbody>
              <tr>
                <td class="tblabel">Pilih File </th>
                <td><input class="form-control" name="file_import" type="file" required /></td>
              </tr>
            </tbody>
          </table>
          <br>
          <p style="margin:0;">- Ukuran Maks <b>5MB</b> dan Format File <b>.xlsx</b>.</p>
          <p style="margin:0;">- Format unggah data dapat di unduh <a href="<?php echo base_url(); ?>upload/format/guru_import.xlsx" target="_blank">DISINI</a></a>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary"><i class="fa fa-upload"> </i> Import Data</button>
        </div>
      </form>
    </div>
  </div>
</div>