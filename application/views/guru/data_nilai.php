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
                                <form role="form" action="<?php echo base_url(); ?>guru/data_nilai/tampil" method="post">
                                    <div class="row">

                                        <div class="col-xs-6">
                                            <select class="form-control" name="id_tahun_ajaran" required>
                                                <?php echo $combo_tahun_ajaran; ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-2">
                                            <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
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
                                    <th>Jadwal Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Ruangan</th>
                                    <th>Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($data_nilai)) {
                                    $no = 1;
                                    foreach ($data_nilai->result_array() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['jadwal_pelajaran']; ?></td>
                                            <td><?php echo $data['kelas']; ?></td>
                                            <td><?php echo $data['guru']; ?></td>
                                            <td><?php echo $data['hari']; ?></td>
                                            <td><?php echo $data['mulai']; ?></td>
                                            <td><?php echo $data['selesai']; ?></td>
                                            <td><?php echo $data['ruangan']; ?></td>
                                            <td><?php echo $data['semester']; ?></td>

                                            <td>
                                                <a class="btn btn-primary btn-xs" href="<?php echo base_url() . '#' . $data['id']; ?>"> Input Nilai</a>

                                        </tr>
                                    <?php $no++;
                                    } ?>
                                <?php } else {
                                    echo '<tr><td colspan="9">Silahkan Pilih Tahun Akademimk Terlebih Dahulu</td></tr>';
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