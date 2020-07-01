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
                                <form role="form" action="<?php echo base_url('guru/capaian/tampil/' . $kode_kelas); ?>" method="post">
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
                                    <th rowspan='2'>No</th>
                                    <th rowspan='2'>NISN</th>
                                    <th rowspan='2'>Nama Siswa</th>
                                    <th colspan='2'>
                                        <center>Sikap Spiritual</center>
                                    </th>
                                    <th colspan='2'>
                                        <center>Sikap Sosial</center>
                                    </th>
                                    <th rowspan='2'>Action</th>
                                </tr>
                                <tr>
                                    <th>
                                        <center>Predikat</center>
                                    </th>
                                    <th>
                                        <center>Deskripsi</center>
                                    </th>
                                    <th>
                                        <center>Predikat</center>
                                    </th>
                                    <th>
                                        <center>Deskripsi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($capaian)) {
                                    $no = 1;
                                    foreach ($capaian->result_array() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nisn']; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <input type='hidden' name='nisn" . $no . "' value=<?= '$r[nisn]' ?>>
                                            <td>
                                                <center><input type='text' name='a" . $no . "' value='<?php echo $data['spiritual_predikat'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></center>
                                            </td>
                                            <td><textarea name='b" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['spiritual_deskripsi'] ?></textarea></td>
                                            <td>
                                                <center><input type='text' name='c" . $no . "' value='<?php echo $data['sosial_predikat'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></center>
                                            </td>
                                            <td><textarea name='d" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['sosial_deskripsi'] ?></textarea></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="<?php echo base_url('guru/'); ?>"> Simpan</a>
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url('guru/capaian/capaian'); ?>"> Batal</a>


                                        </tr>
                                    <?php $no++;
                                    } ?>
                                <?php } else {
                                    echo '<tr><td colspan="9">Silahkan Pilih Tahun Akademimk Terlebih Dahulu</td></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <button type='submit' name='simpan' class='btn btn-info'>Simpan</button>
                    <button type='reset' class='btn btn-danger pull-right' href="<?php echo base_url('guru/capaian/capaian'); ?>">Batal</button> -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>