<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
						<div class="box-header">
              <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>admin/Akademik/akd_mapel_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mata Pelajaran</th>
                    <th>ID Kelompok Pelajaran</th>
                    <th>Kode Jurusan</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>KKM</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no = 1;
					foreach($mapel->result_array() as $data) { ?>
				<tr>
						<td><?php echo $no; ?></td>
            <td><?php echo $data['kode_mapel']; ?></td>
						<td><?php echo $data['id_kelompok_pelajaran']; ?></td>
            <td><?php echo $data['kode_jurusan']; ?></td>
						<td><?php echo $data['nama_mapel']; ?></td>
            <td><?php echo $data['kkm']; ?></td>
						<td><?php echo $data['aktif_mapel']; ?></td>
              <td style="text-align:center;">
              <a class="btn btn-danger btn-xs" href="<?php echo base_url().'admin/Akademik/akd_mapel_edit/'.$data['kode_mapel']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
              <a class="btn btn-danger btn-xs" href="<?php echo base_url().'admin/Akademik/akd_mapel_hapus/'.$data['kode_mapel']; ?>"><i class="fa fa-edit"> </i> Hapus</a>
                        
                      </td>
                    </tr>
				<?php $no++; } ?>
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