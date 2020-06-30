<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class absensi_model extends CI_Model
{


	public function presensi_model($id_tahun_ajaran)
{
    $kode_kelas = $this->uri->segment(5);
    $q = $this->db->query("SELECT * FROM  akd_jadwal_pelajaran a 
	JOIN akd_mapel b ON a.kode_mapel=b.kode_mapel 
	  where a.kode_kelas='$kode_kelas' 
		AND a.id_tahun_ajaran='$id_tahun_ajaran'");
    return $q;
}
    
}
