<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_model extends CI_Model
{


	public function cetak_uts($kode_kelas, $id_tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa join mst_kelas on pgn_siswa.kode_kelas = mst_kelas.kode_kelas JOIN akd_jadwal_pelajaran ON akd_jadwal_pelajaran.kode_kelas=mst_kelas.kode_kelas  join  nilai_uts on nilai_uts.kode_jadwal_pelajaran=akd_jadwal_pelajaran.kode_jadwal_pelajaran   where mst_kelas.kode_kelas = '$kode_kelas' AND akd_jadwal_pelajaran.id_tahun_ajaran = '$id_tahun_ajaran'ORDER BY pgn_siswa.nama_siswa ASC");
		return $q;
	}
	public function uts($id_tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa join mst_kelas on pgn_siswa.kode_kelas = mst_kelas.kode_kelas JOIN akd_jadwal_pelajaran ON akd_jadwal_pelajaran.kode_kelas=mst_kelas.kode_kelas  join  nilai_uts on nilai_uts.kode_jadwal_pelajaran=akd_jadwal_pelajaran.kode_jadwal_pelajaran   where akd_jadwal_pelajaran.id_tahun_ajaran = '$id_tahun_ajaran'ORDER BY pgn_siswa.nama_siswa ASC");
		return $q;
	}
}
