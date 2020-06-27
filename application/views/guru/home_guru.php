<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>

    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body box-profile">
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('danger'); ?></span>
                            </div>
                        <?php } ?>


                        <?php if (!empty($foto)) { ?>
                            <img class="profile-user-img img-responsive" src="<?php echo base_url() . 'upload/guru/' . $foto; ?>" alt="<?php echo $nama_guru; ?>">
                        <?php } else { ?>
                            <img class="profile-user-img img-responsive" src="<?php echo base_url() . 'upload/noimage.jpg'; ?>" alt="<?php echo $nama_guru; ?>">
                        <?php } ?>
                        <table id="datatb" class="table table-bordered table-hover">
                            <tr>
                                <td style="width:200px;font-weight:bold;">Kode Guru</td>
                                <td style="width:10px;">:</td>
                                <td><?php echo $kode_guru; ?></td>
                            </tr>
                            <tr>
                                <td style="width:200px;font-weight:bold;">NIP</td>
                                <td style="width:10px;">:</td>
                                <td><?php echo $nip; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">NIK</td>
                                <td>:</td>
                                <td><?php echo $nik; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">NUPTK</td>
                                <td>:</td>
                                <td><?php echo $nuptk; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Nama Guru</td>
                                <td>:</td>
                                <td><?php echo $nama_guru; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo $jenis_kelamin; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td><?php echo $tempat_lahir . ', ' . $tanggal_lahir; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Agama</td>
                                <td>:</td>
                                <td><?php echo $agama; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Alamat</td>
                                <td>:</td>
                                <td><?php echo $alamat_jalan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Kelurahan</td>
                                <td>:</td>
                                <td><?php echo $kelurahan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Kecamatan</td>
                                <td>:</td>
                                <td><?php echo $kecamatan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Kode Pos</td>
                                <td>:</td>
                                <td><?php echo $kode_pos; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">No Handphone</td>
                                <td>:</td>
                                <td><?php echo $hp; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Telepon</td>
                                <td>:</td>
                                <td><?php echo $telepon; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Email</td>
                                <td>:</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Password</td>
                                <td>:</td>
                                <td><?php echo $password; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Status</td>
                                <td>:</td>
                                <td><?php if ($aktif_guru == '1') echo 'AKTIF';
                                    else echo 'TIDAK AKTIF'; ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>