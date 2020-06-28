<!-- <?php
      $id = $this->session->userdata("id");
      $data_siswa = $this->db->query("SELECT foto FROM pgn_siswa WHERE kode_siswa = '$id'")->row();
      if (!empty($data_siswa->foto)) {
        $foto = base_url() . 'upload/siswa/' . $data_siswa->foto;
      } else {
        $foto = base_url() . 'upload/user.jpg';
      }
      ?> -->


<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar ">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $foto; ?>" class="img-responsive" style="width:50px;height:50px;" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata("nama"); ?></p>
        <p><?php echo ucfirst($this->session->userdata("hak_akses")); ?></p>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU NAVIGASI</li>
      <li>
        <a href="<?php echo base_url(); ?>guru/home">
          <i class="fa fa-dashboard"></i> <span>Home</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>guru/jadwal/jadwal">
          <i class="fa fa-th-large"></i> <span>Jadwal Pelajaran</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url(); ?>calendar">
          <i class="fa fa-users"></i> <span>Quiz/UjianOnline</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'nilai') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'nilai') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-list-alt"></i> <span>Input Nilai Siswa</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/nilai/cetak_uts"><i class="fa fa-angle-double-right"></i> Input Nilai UTS</a></li>
          <li><a href="<?php echo base_url(); ?>nilai/nilai_raport"><i class="fa fa-angle-double-right"></i> Input Nilai Raport</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'nilai') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'nilai') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-list-alt"></i> <span>Raport</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/nilai/cetak_uts"><i class="fa fa-angle-double-right"></i> Data Nilai UTS</a></li>
          <li><a href="<?php echo base_url(); ?>guru/cetak_uts/cetak_uts"><i class="fa fa-angle-double-right"></i> Cetak Raport UTS</a></li>
          <li><a href="<?php echo base_url(); ?>guru/capaian/capaian"><i class="fa fa-angle-double-right"></i> Data Capaian Belajar</a></li>
          <li><a href="<?php echo base_url(); ?>guru/extrakulikuler/extrakulikuler"><i class="fa fa-angle-double-right"></i> Data Extrakulikuler</a></li>
          <li><a href="<?php echo base_url(); ?>guru/prestasi/prestasi"><i class="fa fa-angle-double-right"></i> Data Prestasi</a></li>
          <li><a href="<?php echo base_url(); ?>guru/catatan/catatan"><i class="fa fa-angle-double-right"></i> Data Catatan Wakel</a></li>
          <li><a href="<?php echo base_url(); ?>admin/nilai/cetak_uts"><i class="fa fa-angle-double-right"></i> Data Nilai Raport</a></li>
          <li><a href="<?php echo base_url(); ?>guru/cetak_raport/cetak_raport"><i class="fa fa-angle-double-right"></i> Cetak Raport</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>guru/Calendar">
          <i class="fa fa-tags"></i> <span>Kalender Akademik</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>