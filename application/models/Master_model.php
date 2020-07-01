<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
{


	public function jurusan()
	{
		$q = $this->db->query("SELECT * FROM mst_jurusan ORDER BY kode_jurusan DESC");
		return $q;
	}

	public function jurusan_detail($id)
	{
		$q = $this->db->query("SELECT * FROM mst_jurusan WHERE kode_jurusan = '$id'");
		return $q;
	}

	public function jurusan_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_jurusan WHERE kode_jurusan = '$id'");
		return $q;
	}

	public function hapusdata($kode_jurusan)
	{
		$this->db->where('kode_jurusan', $kode_jurusan);
		$this->db->delete('mst_jurusan');
	}

	public function kelas()
	{
		$q = $this->db->query("SELECT * FROM mst_kelas ORDER BY kode_kelas DESC");
		return $q;
	}

	public function kelas_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_kelas WHERE kode_kelas = '$id'");
		return $q;
	}

	public function hapus_kelas($kode_kelas)
	{
		$this->db->where('kode_kelas', $kode_kelas);
		$this->db->delete('mst_kelas');
	}

	public function ruangan()
	{
		$q = $this->db->query("SELECT * FROM mst_ruangan ORDER BY kode_ruangan DESC");
		return $q;
	}

	public function ruangan_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_ruangan WHERE kode_ruangan = '$id'");
		return $q;
	}

	public function hapus_ruangan($kode_ruangan)
	{
		$this->db->where('kode_ruangan', $kode_ruangan);
		$this->db->delete('mst_ruangan');
	}

	public function kelompok_pelajaran()
	{
		$q = $this->db->query("SELECT * FROM akd_kelompok_pelajaran ORDER BY id_kelompok_pelajaran DESC");
		return $q;
	}

	public function kelompok_pelajaran_edit($id)
	{
		$q = $this->db->query("SELECT * FROM akd_kelompok_pelajaran WHERE id_kelompok_pelajaran = '$id'");
		return $q;
	}

	public function hapus_kelompok($id_kelompok_pelajaran)
	{
		$this->db->where('id_kelompok_pelajaran', $id_kelompok_pelajaran);
		$this->db->delete('akd_kelompok_pelajaran');
	}
	public function akd_mapel()
	{
		$q = $this->db->query("SELECT * FROM akd_mapel ORDER BY kode_mapel DESC");
		return $q;
	}
	public function akd_mapel_edit($kode)
	{
		$q = $this->db->query("SELECT * FROM akd_mapel WHERE kode_mapel = '$kode'");
		return $q;
	}
	public function akd_mapel_hapus($kode_mapel)
	{
		$this->db->where('kode_mapel', $kode_mapel);
		$this->db->delete('akd_mapel');
	}

	public function tahun_ajaran()
	{
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		return $q;
	}

	public function tahun_ajaran_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$id'");
		return $q;
	}

	public function tahun_ajaran_hapus($id)
	{
		$this->db->where('id_tahun_ajaran', $id);
		$this->db->delete('mst_tahun_ajaran');
	}
}
