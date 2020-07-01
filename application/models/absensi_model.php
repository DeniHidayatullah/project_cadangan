<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class absensi_model extends CI_Model
{


	public function presensi_model($id_tahun_ajaran)
{
    $nisn = $this->uri->segment(5);
    $q = $this->db->query("SELECT a.* , d.nama_mapel FROM  absensi_siswa a 
	JOIN pgn_siswa c ON a.kode_siswa=c.kode_siswa
    JOIN akd_jadwal_pelajaran b ON a.kode_jadwal_pelajaran=b.kode_jadwal_pelajaran 
    JOIN akd_mapel d ON d.kode_mapel=b.kode_mapel 
	  where c.nisn='$nisn'
		AND b.id_tahun_ajaran='$id_tahun_ajaran'");
    return $q;
}

public function total_pertemuan()
{
    $kode_jadwal_pelajaran = $this->uri->segment(5);
    $q = $this->db->query("SELECT Count(*) FROM `absensi_siswa` where kode_jadwal_pelajaran='$kode_jadwal_pelajaran' GROUP BY tanggal");
    return $q;
}
    
}
