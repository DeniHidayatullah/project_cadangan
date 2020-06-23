<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class absensi_model extends CI_Model
{


	public function hasil_rekap()
	{
		$q = $this->db->query("SELECT * FROM absensi_siswa ORDER BY id_absensi_siswa DESC");
		return $q;
	}

	public function jadwal()
	{
		$q = $this->db->query("SELECT * FROM akd_jadwal_pelajaran ORDER BY kode_jadwal_pelajaran DESC");
		return $q;
    }
    
}
