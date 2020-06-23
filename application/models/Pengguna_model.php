<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{


	public function guru()
	{
		$q = $this->db->query("SELECT * FROM pgn_guru");
		return $q;
	}


	public function guru_detail($nip)
	{
		$q = $this->db->query("SELECT * FROM pgn_guru WHERE nip = '$nip'");
		return $q;
	}

	public function guru_edit($kode_guru)
	{
		$q = $this->db->query("SELECT * FROM pgn_guru WHERE kode_guru = '$kode_guru'");
		return $q;
	}
	public function hapusdata($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete('pgn_guru');
	}

	//Pengguna siswa
	public function siswa($kode_kelas)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa a join mst_kelas b on a.kode_kelas=b.kode_kelas  WHERE a.kode_kelas = '$kode_kelas' ORDER BY a.nama_siswa ASC");
		return $q;
	}

	public function siswa_pindah_kelas($kode_kelas, $angkatan)
	{
		if (!empty($angkatan)) {
			$angkatan = "AND angkatan ='$angkatan'";
		}
		$q = $this->db->query("SELECT * FROM pgn_siswa  WHERE kode_kelas = '$kode_kelas' $angkatan ORDER BY nama_siswa ASC");
		return $q;
	}


	public function siswa_all($kode_kelas)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa a join mst_kelas b on a.kode_kelas=b.kode_kelas  WHERE a.kode_kelas = '$kode_kelas'");
		return $q;
	}


	public function siswa_detail($nis)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa WHERE nis = '$nis'");
		return $q;
	}

	public function siswa_edit($kode_siswa)
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa WHERE kode_siswa = $kode_siswa");
		return $q;
	}

	public function pgnsiswa()
	{
		$q = $this->db->query("SELECT * FROM pgn_siswa");
		return $q;
	}

	public function hapus_siswa($nis)
	{
		$this->db->where('nis', $nis);
		$this->db->delete('pgn_siswa');
	}
}
