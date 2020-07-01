<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model
{



	public function combo_jabatan_guru($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_jabatan WHERE hak_akses = 'guru' OR hak_akses = 'gurubk' ORDER BY id_jabatan ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach ($q->result() as $h) {
			if ($id == $h->id_jabatan) {
				$hasil .= '<option value="' . $h->id_jabatan . '" selected="selected">' . $h->nama_jabatan . '</option>';
			} else {
				$hasil .= '<option value="' . $h->id_jabatan . '">' . $h->nama_jabatan . '</option>';
			}
		}
		return $hasil;
	}

	public function combo_jabatan_staff($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_jabatan WHERE hak_akses = 'staff' ORDER BY id_jabatan ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach ($q->result() as $h) {
			if ($id == $h->id_jabatan) {
				$hasil .= '<option value="' . $h->id_jabatan . '" selected="selected">' . $h->nama_jabatan . '</option>';
			} else {
				$hasil .= '<option value="' . $h->id_jabatan . '">' . $h->nama_jabatan . '</option>';
			}
		}
		return $hasil;
	}

	public function combo_kelompok_pelajaran($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_kelompok_pelajaran  ORDER BY id_kelompok_pelajaran ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach ($q->result() as $h) {
			if ($id == $h->id_kelompok_pelajaran) {
				$hasil .= '<option value="' . $h->id_kelompok_pelajaran . '" selected="selected">' . $h->nama_kelompok_pelajaran . '</option>';
			} else {
				$hasil .= '<option value="' . $h->id_kelompok_pelajaran . '">' . $h->nama_kelompok_pelajaran . '</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>Pilih Tahun Ajaran - Semester</option>';
		foreach ($q->result() as $h) {
			if ($id == $h->id_tahun_ajaran) {
				$hasil .= '<option value="' . $h->id_tahun_ajaran . '" selected="selected">' . $h->tahun_ajaran . ' - Semester ' . $h->semester . '</option>';
			} else {
				$hasil .= '<option value="' . $h->id_tahun_ajaran . '">' . $h->tahun_ajaran . ' - Semester ' . $h->semester . '</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran_only($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>Pilih Tahun Ajaran </option>';
		foreach ($q->result() as $h) {
			if ($id == $h->tahun_ajaran) {
				$hasil .= '<option value="' . $h->tahun_ajaran . '" selected="selected">' . $h->tahun_ajaran . '</option>';
			} else {
				$hasil .= '<option value="' . $h->tahun_ajaran . '">' . $h->tahun_ajaran . '</option>';
			}
		}
		return $hasil;
	}

	public function combo_kelas($kode_kelas = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT kode_kelas,nama_kelas FROM mst_kelas WHERE aktif_kelas = 1 ORDER BY kode_kelas ASC");
		$hasil .= '<option selected="selected" value>PILIH KELAS</option>';
		foreach ($q->result() as $h) {
			if ($kode_kelas == $h->kode_kelas) {
				$hasil .= '<option value="' . $h->kode_kelas . '" selected="selected">' . $h->nama_kelas . '</option>';
			} else {
				$hasil .= '<option value="' . $h->kode_kelas . '">' . $h->nama_kelas . '</option>';
			}
		}
		return $hasil;
	}


	public function combo_mapel($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT id_mapel,nama_mapel FROM mst_mapel  ORDER BY id_mapel ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach ($q->result() as $h) {
			if ($id == $h->id_mapel) {
				$hasil .= '<option value="' . $h->id_mapel . '" selected="selected">' . $h->nama_mapel . '</option>';
			} else {
				$hasil .= '<option value="' . $h->id_mapel . '">' . $h->nama_mapel . '</option>';
			}
		}
		return $hasil;
	}

	public function combo_guru($id = "")
	{
		$hasil = "";
		$q = $this->db->query("SELECT id_guru,nama_guru FROM mst_guru  ORDER BY id_guru ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach ($q->result() as $h) {
			if ($id == $h->id_guru) {
				$hasil .= '<option value="' . $h->id_guru . '" selected="selected">' . $h->nama_guru . '</option>';
			} else {
				$hasil .= '<option value="' . $h->id_guru . '">' . $h->nama_guru . '</option>';
			}
		}
		return $hasil;
	}
}
