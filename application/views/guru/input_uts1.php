<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class='col-md-12'>
                <div class='box box-info'>

                    <div class='box-body'>

                        <div class='col-md-12'>
                            <table class='table table-condensed table-hover'>
                                <tbody>
                                    <input type='hidden' name='id' value='$s[kode_kelas]'>
                                    <tr>
                                        <th width='120px' scope='row'>Kode Kelas</th>
                                        <td>$d[kode_kelas]</td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Nama Kelas</th>
                                        <td>$d[nama_kelas]</td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Mata Pelajaran</th>
                                        <td>$m[nama_matapelajaran]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='col-md-12'>
                            <table class='table table-condensed table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th rowspan='2'>No</th>
                                        <th rowspan='2'>NISN</th>
                                        <th rowspan='2'>Nama Siswa</th>
                                        <th colspan='2'>
                                            <center>Pengetahuan</center>
                                        </th>
                                        <th colspan='2'>
                                            <center>Keterampilan</center>
                                        </th>
                                        <th rowspan='2'>Action</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <center>Angka</center>
                                        </th>
                                        <th>
                                            <center>Deskripsi</center>
                                        </th>
                                        <th>
                                            <center>Angka</center>
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
                                                    <center><input type='text' name='a" . $no . "' value='<?php echo $data['angka_pengetahuan'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></center>
                                                </td>
                                                <td><textarea name='b" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['deskripsi_pengetahuan'] ?></textarea></td>
                                                <td>
                                                    <center><input type='text' name='c" . $no . "' value='<?php echo $data['angka_keterampilan'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></center>
                                                </td>
                                                <td><textarea name='d" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['deskripsi_keterampilan'] ?></textarea></td>
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

                            <a href="<?php echo base_url(); ?>guru/input_uts/input_uts"><button type='button' class='btn btn-danger pull-right'>Kembali</button></a>
                        </div>
                    </div>";
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>