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
	public function nilai_uts_siswa($id_tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa join mst_kelas on pgn_siswa.kode_kelas = mst_kelas.kode_kelas JOIN akd_jadwal_pelajaran ON akd_jadwal_pelajaran.kode_kelas=mst_kelas.kode_kelas  join  nilai_uts on nilai_uts.kode_jadwal_pelajaran=akd_jadwal_pelajaran.kode_jadwal_pelajaran join akd_mapel on akd_jadwal_pelajaran.kode_mapel=akd_mapel.kode_mapel  where akd_jadwal_pelajaran.id_tahun_ajaran = '$id_tahun_ajaran'ORDER BY pgn_siswa.nama_siswa ASC");
		return $q;
	}
	public function nilai_rapot_siswa($id_tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa join mst_kelas on pgn_siswa.kode_kelas = mst_kelas.kode_kelas JOIN akd_jadwal_pelajaran ON akd_jadwal_pelajaran.kode_kelas=mst_kelas.kode_kelas  join  nilai_uts on nilai_uts.kode_jadwal_pelajaran=akd_jadwal_pelajaran.kode_jadwal_pelajaran join akd_mapel on akd_jadwal_pelajaran.kode_mapel=akd_mapel.kode_mapel  where akd_jadwal_pelajaran.id_tahun_ajaran = '$id_tahun_ajaran'ORDER BY pgn_siswa.nama_siswa ASC");
		return $q;
	}


	public function capaian($id_tahun_ajaran)
	{
		$kode_kelas = $this->uri->segment(5);
		$q = $this->db->query("SELECT a.nisn, a.nama_siswa, f.*, c.nama_kelas FROM pgn_siswa a JOIN mst_kelas c ON c.kode_kelas=a.kode_kelas JOIN akd_jadwal_pelajaran d ON d.kode_kelas=c.kode_kelas JOIN mst_tahun_ajaran e ON e.id_tahun_ajaran=d.id_tahun_ajaran JOIN nilai_sikap_semester f ON f.id_tahun_ajaran=d.id_tahun_ajaran where a.kode_kelas= '$kode_kelas' AND d.id_tahun_ajaran='$id_tahun_ajaran' ORDER BY a.kode_siswa");
		return $q;
	}
	public function catatan($id_tahun_ajaran)
	{
		$kode_kelas = $this->uri->segment(5);
		$q = $this->db->query("SELECT a.nisn, a.nama_siswa, f.catatan FROM pgn_siswa a JOIN mst_kelas c ON c.kode_kelas=a.kode_kelas JOIN akd_jadwal_pelajaran d ON d.kode_kelas=c.kode_kelas JOIN mst_tahun_ajaran e ON e.id_tahun_ajaran=d.id_tahun_ajaran JOIN catatan_wakel f ON f.id_tahun_ajaran=d.id_tahun_ajaran where a.kode_kelas= '$kode_kelas' AND d.id_tahun_ajaran='$id_tahun_ajaran' ORDER BY a.kode_siswa");
		return $q;
	}
	public function prestasi($id_tahun_ajaran)
	{
		$kode_kelas = $this->uri->segment(5);
		$q = $this->db->query("SELECT a.nisn, a.nama_siswa, f.jenis_kegiatan, f.keterangan FROM pgn_siswa a JOIN mst_kelas c ON c.kode_kelas=a.kode_kelas JOIN akd_jadwal_pelajaran d ON d.kode_kelas=c.kode_kelas JOIN mst_tahun_ajaran e ON e.id_tahun_ajaran=d.id_tahun_ajaran JOIN nilai_prestasi f ON f.id_tahun_ajaran=d.id_tahun_ajaran where a.kode_kelas= '$kode_kelas' AND d.id_tahun_ajaran='$id_tahun_ajaran' ORDER BY a.kode_siswa");
		return $q;
	}
	public function extrakulikuler($id_tahun_ajaran)
	{
		$kode_kelas = $this->uri->segment(5);
		$q = $this->db->query("SELECT a.nisn, a.nama_siswa, f.kegiatan, f.nilai, f.deskripsi FROM pgn_siswa a JOIN mst_kelas c ON c.kode_kelas=a.kode_kelas JOIN akd_jadwal_pelajaran d ON d.kode_kelas=c.kode_kelas JOIN mst_tahun_ajaran e ON e.id_tahun_ajaran=d.id_tahun_ajaran JOIN nilai_extrakulikuler f ON f.id_tahun_ajaran=d.id_tahun_ajaran where a.kode_kelas= '$kode_kelas' AND d.id_tahun_ajaran='$id_tahun_ajaran' ORDER BY a.kode_siswa");
		return $q;
	}
	public function cetak_utswakel($id_tahun_ajaran)
	{
		$kode_kelas = $this->uri->segment(5);
		$q = $this->db->query("SELECT * FROM pgn_siswa join mst_kelas on pgn_siswa.kode_kelas = mst_kelas.kode_kelas JOIN akd_jadwal_pelajaran ON akd_jadwal_pelajaran.kode_kelas=mst_kelas.kode_kelas  join  nilai_uts on nilai_uts.kode_jadwal_pelajaran=akd_jadwal_pelajaran.kode_jadwal_pelajaran   where mst_kelas.kode_kelas = '$kode_kelas' AND akd_jadwal_pelajaran.id_tahun_ajaran = '$id_tahun_ajaran'ORDER BY pgn_siswa.nama_siswa ASC");
		return $q;
	}
	public function input_uts()
	{
		$q = $this->db->query("SELECT * FROM nilai_uts ORDER BY kode_siswa DESC");
		return $q;
	}
}
