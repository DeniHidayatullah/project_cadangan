<?php
$id = $this->session->userdata("id");
$data_siswa = $this->db->query("SELECT foto FROM pgn_siswa WHERE kode_siswa = '$id'")->row();
if (!empty($data_siswa->foto)) {
  $foto = base_url() . 'upload/siswa/' . $data_siswa->foto;
} else {
  $foto = base_url() . 'upload/logoasis.png';
}
?>


<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
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
    <br>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU SISWA</li>
      <li>
        <a href="<?php echo base_url(); ?>siswa/Home">
          <i class="fa fa-dashboard"></i> <span>Home</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('siswa/jadwal/detail_jadwal/'); ?>"
          <i class="fa fa-tag"></i> <span>Jadwal Pelajaran</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('siswa/presensi/'); ?>"
          <i class="fa fa-th-large"></i> <span>Presensi Siswa</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url(); ?>siswa/quiz/tampilan">
          <i class="fa fa-dashboard"></i> <span>Quiz/Ujian Online</span>
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
          <li><a href="<?php echo base_url(); ?>siswa/uts/uts"><i class="fa fa-angle-double-right"></i> Cetak Raport UTS</a></li>
          <li><a href="<?php echo base_url(); ?>siswa/raport/raport"><i class="fa fa-angle-double-right"></i> Cetak Raport</a></li>
        </ul>
      </li>

      <li>
        <a href="<?php echo base_url(); ?>siswa/Calendar">
          <i class="fa fa-tags"></i> <span>Kalender Akademik</span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>