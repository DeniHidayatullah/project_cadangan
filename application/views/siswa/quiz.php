<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> siswa</a></li>
            <li class="active"><?php echo $judul; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatb" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jadwal Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Ruangan</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jadwal->result_array() as $data) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kode_jadwal_pelajaran']; ?></td>
                                        <td><?php echo $data['kode_kelas']; ?></td>
                                        <td><?php echo $data['kode_guru']; ?></td>
                                        <td><?php echo $data['hari']; ?></td>
                                        <td><?php echo $data['jam_mulai']; ?></td>
                                        <td><?php echo $data['jam_selesai']; ?></td>
                                        <td><?php echo $data['kode_ruangan']; ?></td>
                                        <td><?php echo $data['id_tahun_ajaran']; ?></td>

                                        <td style="text-align:center;">
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'Absensi/hasil_rekap/' . $data['kode_jadwal_pelajaran']; ?>"><span class='glyphicon glyphicon-th'></span> Tampilkan </a>


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