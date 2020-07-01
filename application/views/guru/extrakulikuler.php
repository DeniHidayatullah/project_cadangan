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
                                <form role="form" action="<?php echo base_url('guru/extrakulikuler/tampil/' . $kode_kelas); ?>" method="post">
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
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kegiatan Extrakulikuler</th>
                                    <th>Nilai</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($extrakulikuler)) {
                                    $no = 1;
                                    foreach ($extrakulikuler->result_array() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nisn']; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <td><textarea name='b" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['kegiatan'] ?></textarea></td>
                                            <td>
                                                <input type='text' name='a" . $no . "' value='<?php echo $data['nilai'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></>
                                            </td>
                                            <td><textarea name='b" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['deskripsi'] ?></textarea></td>
                                            <!-- <td><?php echo $data['kegiatan']; ?></td>
                                            <td><?php echo $data['nilai']; ?></td>
                                            <td><?php echo $data['deskripsi']; ?></td> -->
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="<?php echo base_url('guru/extrakulikuler/save'); ?>"> Simpan</a>
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url('guru/extrakulikuler/extrakulikuler'); ?>"> Batal</a>

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