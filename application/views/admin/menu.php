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
        <a href="<?php echo base_url(); ?>admin/home">
          <i class="fa fa-dashboard"></i> <span>Home</span>
        </a>
      </li>

      <li class="<?php if ($this->uri->segment(1) == 'pengguna') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'pengguna') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-user"></i> <span>Pengguna</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/pengguna/siswa"><i class="fa fa-angle-double-right"></i> Siswa</a></li>
          <li><a href="<?php echo base_url(); ?>admin/pengguna/guru"><i class="fa fa-angle-double-right"></i> Guru</a></li>
          <li><a href="<?php echo base_url(); ?>admin/pengguna_admin/admin"><i class="fa fa-angle-double-right"></i> Admin</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'master') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'master') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-hdd-o"></i> <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/master/tahun_ajaran"><i class="fa fa-angle-double-right"></i> Tahun Ajaran</a></li>
          <li><a href="<?php echo base_url(); ?>admin/master/ruangan"><i class="fa fa-angle-double-right"></i> Ruangan</a></li>
          <li><a href="<?php echo base_url(); ?>admin/master/jurusan"><i class="fa fa-angle-double-right"></i> Jurusan</a></li>
          <li><a href="<?php echo base_url(); ?>admin/master/kelas"><i class="fa fa-angle-double-right"></i> Kelas</a></li>
          <li><a href="<?php echo base_url(); ?>master/predikat"><i class="fa fa-angle-double-right"></i> Rentang Nilai / Predikat</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'akademik') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'akademik') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-tag"></i> <span>Akademik</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/Akademik/kelompok_pelajaran"><i class="fa fa-angle-double-right"></i> Kelompok Mata Pelajaran</a></li>
          <li><a href="<?php echo base_url(); ?>master/jurusan"><i class="fa fa-angle-double-right"></i> Mata Pelajaran</a></li>
          <li><a href="<?php echo base_url(); ?>master/kelas"><i class="fa fa-angle-double-right"></i> Jadwal Pelajaran</a></li>
          <li><a href="<?php echo base_url(); ?>master/mapel"><i class="fa fa-angle-double-right"></i> Kompetensi Dasar</a></li>
          <li><a href="<?php echo base_url(); ?>master/predikat"><i class="fa fa-angle-double-right"></i> Rentang Nilai / Predikat</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'presensi') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'presensi') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-calendar"></i> <span>Presensi Siswa</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>master/tahun_ajaran"><i class="fa fa-angle-double-right"></i> Presensi</a></li>
          <li><a href="<?php echo base_url(); ?>admin/absensi/rekap_absensi"><i class="fa fa-angle-double-right"></i> Rekap Presensi</a></li>
        </ul>
      </li>

      <li>
        <a href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran">
          <i class="fa fa-tags"></i> <span>Journal KBM</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'nilai') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'nilai') echo 'menu-open'; ?>">
        <a href="#">
          <i class="fa fa-list-alt"></i> <span>Laporan Nilai Siswa</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/nilai/cetak_uts"><i class="fa fa-angle-double-right"></i> Cetak Raport UTS</a></li>
          <li><a href="<?php echo base_url(); ?>nilai/nilai_raport"><i class="fa fa-angle-double-right"></i> Cetak Raport</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>calendar">
          <i class="fa fa-tags"></i> <span>Kalender Akademik</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>