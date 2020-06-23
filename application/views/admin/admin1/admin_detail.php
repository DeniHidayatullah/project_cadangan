<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
            <li><a href="<?php echo base_url(); ?>admin/pengguna_admin/admin"><?php echo $judul; ?></a></li>
            <li class="active"><?php echo $judul2; ?></li>
        </ol>
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
                        <table id="datatb" class="table table-bordered table-hover">
                            <tr>
                                <td style="width:200px;font-weight:bold;">Id</td>
                                <td style="width:10px;">:</td>
                                <td><?php echo $admin['id']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Nama Admin</td>
                                <td>:</td>
                                <td><?php echo $admin['nama']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Username</td>
                                <td>:</td>
                                <td><?php echo $admin['username']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Password</td>
                                <td>:</td>
                                <td><?php echo $admin['password']; ?></td>
                            </tr>

                            <tr>
                                <td style="font-weight:bold;">Tipe</td>
                                <td>:</td>
                                <td><?php echo $admin['tipe']; ?></td>
                            </tr>

                        </table>





                        <a href="<?php echo base_url() . 'admin/pengguna_admin/admin/'; ?>" class="btn btn-default btn-block"><b><i class="fa fa-arrow-left"> </i> Kembali</b></a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>