<div class="content-wrapper">

    <section class="content">
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>Input Nilai Sikap Siswa</b></h3>
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

                        <div id='myTabContent' class='tab-content'>

                            <!-- // Ini Halaman unutk Nilai Spiritual -->
                            <div role='tabpanel' class='tab-pane fade active in' id='spiritual' aria-labelledby='spiritual-tab'>
                                <div class='col-md-12'>
                                    <form action='index_guru.php?view=raport&act=listsiswasikap&jdwl=$_GET[jdwl]&kd=$_GET[kd]&id=$_GET[id]&tahun=$_GET[tahun]' method='POST'>
                                        <input type='hidden' value='spiritual' name='status'>
                                        <table class='table table-bordered table-striped'>
                                            <tr>
                                                <th style='border:1px solid #e3e3e3' width='30px' rowspan='2'>No</th>
                                                <th style='border:1px solid #e3e3e3' width='80px' rowspan='2'>NISN</th>
                                                <th style='border:1px solid #e3e3e3' width='190px' rowspan='2'>Nama</th>
                                                <th style='border:1px solid #e3e3e3' colspan='3'>
                                                    <center>Penilaian Spiritual</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style='border:1px solid #e3e3e3;'>
                                                    <center>Positif</center>
                                                </th>
                                                <th style='border:1px solid #e3e3e3;'>
                                                    <center>Negatif</center>
                                                </th>
                                                <th style='border:1px solid #e3e3e3;'>
                                                    <center>Desktipsi</center>
                                                </th>
                                            </tr>
                                            <tbody>
                                                <?php

                                                if (!empty($input)) {
                                                    $no = 1;
                                                    foreach ($input->result_array() as $data) { ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $data['nisn']; ?></td>
                                                            <td><?php echo $data['nama_siswa']; ?></td>
                                                            <input type='hidden' name='nisn" . $no . "' value='$r[nisn]'>
                                                            <td align=center><textarea name='a" . $no . "' class='form-control' style='width:100%; color:blue' placeholder=' Tuliskan Positif...'><?php echo $data['positif'] ?></textarea></td>
                                                            <td align=center><textarea name='b" . $no . "' class='form-control' style='width:100%; color:blue' placeholder=' Tuliskan Negatif...'><?php echo $data['negatif'] ?></textarea></td>
                                                            <td align=center><textarea name='c" . $no . "' class='form-control' style='width:100%; color:blue' placeholder=' Tuliskan Deskripsi...'><?php echo $data['deskripsi'] ?></textarea></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                <?php } else {
                                                    echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>';
                                                } ?>
                                            </tbody>
                                        </table>
                                </div>
                                <div style='clear:both'></div>
                                <div class='box-footer'>

                                    <a href="<?php echo base_url('guru/input_raport/input_raport'); ?>"><button type='button' class='btn btn-success'>Simpan</button></a>
                                    <a href="<?php echo base_url('guru/input_raport/input_raport'); ?>"><button type='button' class='btn btn-danger'>Kembali</button></a>
                                </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>