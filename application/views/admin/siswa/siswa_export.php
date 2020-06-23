<?php
header("Content-type: application/vnd-ms-excel");
$tgl = date("d-m-Y");
$judul = "DATA_SISWA_" . strtoupper($nama_kelas) . ".xls";
header("Content-Disposition: attachment; filename=$judul");

?>
<p>Data Siswa Kelas <?php echo $nama_kelas; ?></p>
<table id="datatb" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat,Tanggal Lahir</th>
            <th>Kelas</th>
            <th>Angkatan</th>
            <th>Ho Handphone</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Agama</th>
            <th>Status Siswa</th>
            <th>Asal Sekolah</th>
            <th>Jenis Sekolah</th>
            <th>Alamat Sekolah</th>
            <th>Tahun Lulus</th>
            <th>Nama Ayah</th>
            <th>Pendidikan Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>No Handphone Ayah</th>
            <th>Nama Ibu</th>
            <th>Pendidikan Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>No Handphone Ibu</th>
            <th>Nama Wali</th>
            <th>Pendidikan Wali</th>
            <th>Pekerjaan Wali</th>
            <th>No Handphone Wali</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($siswa)) {
            $no = 1;
            foreach ($siswa->result_array() as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nama_siswa']; ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    <td><?php if (!empty($data['tanggal_lahir'])) echo $data['tempat_lahir'] . ', ';
                        echo date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></td>
                    <td><?php echo $data['nama_kelas']; ?></td>
                    <td><?php echo $data['angkatan']; ?></td>
                    <td>'<?php echo $data['hp']; ?></td>
                    <td>'<?php echo $data['telepon']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['alamat_jalan']; ?></td>
                    <td><?php echo $data['kelurahan']; ?></td>
                    <td><?php echo $data['kecamatan']; ?></td>
                    <td><?php echo $data['agama']; ?></td>
                    <td style="text-align:center;"><?php
                                                    if ($data['aktif_siswa'] == '1') {
                                                        echo '<label class="label label-success">AKTIF</label>';
                                                    } else {
                                                        echo '<label class="label label-default">TIDAK AKTIF</label>';
                                                    }
                                                    ?>
                    </td>
                    <td><?php echo $data['nama_sekolah']; ?></td>
                    <td><?php echo $data['status_sekolah']; ?></td>
                    <td><?php echo $data['alamat_sekolah']; ?></td>
                    <td><?php echo $data['tahun_lulus']; ?></td>
                    <td><?php echo $data['nama_ayah']; ?></td>
                    <td><?php echo $data['pendidikan_ayah']; ?></td>
                    <td><?php echo $data['pekerjaan_ayah']; ?></td>
                    <td>'<?php echo $data['no_hp_ayah']; ?></td>
                    <td><?php echo $data['nama_ibu']; ?></td>
                    <td><?php echo $data['pendidikan_ibu']; ?></td>
                    <td><?php echo $data['pekerjaan_ibu']; ?></td>
                    <td>'<?php echo $data['no_hp_ibu']; ?></td>
                    <td><?php echo $data['nama_wali']; ?></td>
                    <td><?php echo $data['pendidikan_wali']; ?></td>
                    <td><?php echo $data['pekerjaan_wali']; ?></td>
                    <td>'<?php echo $data['no_hp_wali']; ?></td>
                </tr>
            <?php $no++;
            } ?>

        <?php } else {
            echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>';
        } ?>
    </tbody>
</table>