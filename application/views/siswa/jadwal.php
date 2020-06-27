<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>

    </section>
    <section class="content">
        <!-- Main row -->

        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-6">
                                <form role="form" action="<?php echo base_url(); ?>siswa/jadwal/tampil" method="post">
                                    <div class="row">

                                        <div class="col-xs-6">
                                            <select class="form-control" name="id_tahun_ajaran" required>
                                                <?php echo $combo_tahun_ajaran; ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-2">
                                            <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Lihat </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatb" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pelajaran</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Ruang</th>
                                    <th>Semester</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php

                                if (!empty($jadwal)) {
                                    $no = 1;
                                    foreach ($jadwal->result_array() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['kode_mapel']; ?></td>
                                            <td><?php echo $data['nama_mapel']; ?></td>
                                            <td><?php echo $data['kode_kelas']; ?></td>
                                            <td><?php echo $data['nama_guru']; ?></td>
                                            <td><?php echo $data['hari']; ?></td>
                                            <td><?php echo $data['jam_mulai']; ?></td>
                                            <td><?php echo $data['jam_selesai']; ?></td>
                                            <td><?php echo $data['kode_ruangan']; ?></td>
                                            <td><?php echo $data['id_tahun_ajaran']; ?></td>

                                        </tr>
                                    <?php $no++;
                                    } ?>
                                <?php } else {
                                    echo '<tr><td colspan="9">Silahkan Pilih Tahun Akdemik Terlebih Dahulu</td></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>