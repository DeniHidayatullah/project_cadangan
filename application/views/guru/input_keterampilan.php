<div class="content-wrapper">

    <section class="content">
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>Input Nilai Keterampilan Siswa</b></h3>
                </div>

                <div class='box-body' style='overflow-x: auto'>
                    <div class='col-md-12'>
                        <table class='table table-condensed table-hover'>
                            <tbody>
                                <?php

                                if (!empty($input)) {
                                    $no = 1;
                                    foreach ($input->result_array() as $data) { ?>

                                        <tr>
                                            <th width='120px' scope='row'>Kode Kelas</th>
                                            <td><?php echo $data['kode_kelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Nama Kelas</th>
                                            <td><?php echo $data['nama_kelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Mata Pelajaran</th>
                                            <td><?php echo $data['nama_mapel']; ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                <?php } else {
                                    echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class='panel-body'>
                        <table class='table table-bordered table-striped'>
                            <tr>
                                <th style='border:1px solid #e3e3e3' width='30px' rowspan='2'>No</th>
                                <th style='border:1px solid #e3e3e3' width='170px' rowspan='2'>Nama</th>

                                <th style='border:1px solid #e3e3e3' colspan='6'>
                                    <center>Penilaian</center>
                                </th>

                                <th style='border:1px solid #e3e3e3' rowspan='2'>
                                    <center>Deskripsi</center>
                                </th>
                                <th style='border:1px solid #e3e3e3; width:65px' rowspan='2'>
                                    <center>Action</center>
                                </th>
                            </tr>
                            <tr>
                                <th style='border:1px solid #e3e3e3; width:110px' colspan=2>
                                    <center>Praktek</center>
                                </th>
                                <th style='border:1px solid #e3e3e3; width:110px' colspan=2>
                                    <center>Proyek</center>
                                </th>
                                <th style='border:1px solid #e3e3e3; width:110px' colspan=2>
                                    <center>Portofolio</center>
                                </th>
                            </tr>
                            <tbody>
                                <?php

                                if (!empty($input)) {
                                    $no = 1;
                                    foreach ($input->result_array() as $data) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <input type='hidden' name='nisn' value='$r[nisn]'>
                                            <input type='hidden' name='id' value='$e[id_nilai_pengetahuan]'>
                                            <input type='hidden' name='status' value='$name'>

                                            <td align=center><input type='text' name='b' value='<?php echo $data['nilai1'] ?>' style='width:35px; text-align:center; padding:0px'></td>
                                            <td align=center><input type='text' name='c' value='<?php echo $data['nilai2'] ?>' style='width:35px; text-align:center; padding:0px'></td>
                                            <td align=center><input type='text' name='d' value='<?php echo $data['nilai3'] ?>' style='width:35px; text-align:center; padding:0px'></td>
                                            <td align=center><input type='text' name='e' value='<?php echo $data['nilai4'] ?>' style='width:35px; text-align:center; padding:0px'></td>
                                            <td align=center><input type='text' name='f' value='<?php echo $data['nilai5'] ?>' style='width:35px; text-align:center; padding:0px'></td>
                                            <td align=center><input type='text' name='g' value='<?php echo $data['nilai6'] ?>' style='width:35px; text-align:center; padding:0px'></td>
                                            <td><textarea name='h" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'><?php echo $data['deskripsi'] ?></textarea></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="<?php echo base_url('guru/input_raport/input_raport'); ?>"> Simpan</a>
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url('guru/input_raport/input_raport'); ?>"> Batal</a>


                                        </tr>
                                    <?php $no++;
                                    } ?>
                                <?php } else {
                                    echo '<tr><td colspan="9">Silahkan Pilih Tahun Akademimk Terlebih Dahulu</td></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div style='clear:both'>
                    </div>
                    <div class='box-footer'>
                        <a href="<?php echo base_url('guru/input_raport/input_raport'); ?>"><button type='button' class='btn btn-danger pull-right'>Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>