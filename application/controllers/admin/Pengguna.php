<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Pengguna_model');
		$this->load->Model('Combo_model');
	}


	public function index()
	{
		redirect(base_url());
	}


	public function guru()
	{
		$d['judul'] = "Data Guru";
		$d['guru'] = $this->Pengguna_model->guru();
		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('admin/guru/guru');
		$this->load->view('admin/bottom');
	}

	public function guru_detail($nip)
	{
		$d['judul'] = "Data Guru";
		$d['judul2'] = "Detail";
		$get = $this->Pengguna_model->guru_detail($nip);
		if ($get->num_rows() == 0) {
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		} else {
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nuptk'] = $data->nuptk;
			$d['nik'] = $data->nik;
			$d['nama_guru'] = $data->nama_guru;
			$d['password'] = $data->password;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
			$d['tempat_lahir'] = $data->tempat_lahir;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['agama'] = $data->agama;
			$d['kewarganegaraan'] = $data->kewarganegaraan;
			$d['foto'] = $data->foto;
			$d['kode_guru'] = $data->kode_guru;
			$d['aktif_guru'] = $data->aktif_guru;
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('admin/guru/guru_detail');
			$this->load->view('admin/bottom');
		}
	}

	public function guru_tambah()
	{
		$d['judul'] = "Data Guru";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nip'] = "";
		$d['nuptk'] = "";
		$d['nik'] = "";
		$d['nama_guru'] = "";
		$d['password'] = "";
		$d['jenis_kelamin'] = "";
		$d['tanggal_lahir'] = "";
		$d['tempat_lahir'] = "";
		$d['alamat_jalan'] = "";
		$d['kelurahan'] = "";
		$d['kecamatan'] = "";
		$d['hp'] = "";
		$d['telepon'] = "";
		$d['email'] = "";
		$d['agama'] = "";
		$d['kewarganegaraan'] = "";
		$d['foto'] = "";
		$d['kode_guru'] = "";
		$d['aktif_guru'] = "";
		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('admin/guru/guru_tambah');
		$this->load->view('admin/bottom');
	}


	public function guru_edit($kode_guru)
	{
		$cek = $this->db->query("SELECT kode_guru FROM pgn_guru WHERE kode_guru = '$kode_guru'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Guru";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Pengguna_model->guru_edit($kode_guru);
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nuptk'] = $data->nuptk;
			$d['nik'] = $data->nik;
			$d['nama_guru'] = $data->nama_guru;
			$d['password'] = $data->password;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			if (!empty($data->tanggal_lahir) && $data->tanggal_lahir != '0000-00-00') {
				$d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
			} else {
				$d['tanggal_lahir'] = '';
			}
			$d['tempat_lahir'] = $data->tempat_lahir;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['agama'] = $data->agama;
			$d['kewarganegaraan'] = $data->kewarganegaraan;
			$d['foto'] = $data->foto;
			$d['kode_guru'] = $data->kode_guru;
			$d['aktif_guru'] = $data->aktif_guru;
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('admin/guru/guru_tambah');
			$this->load->view('admin/bottom');
		} else {
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		}
	}

	public function guru_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nip'] = $this->input->post("nip");
		$in['nuptk'] = $this->input->post("nuptk");
		$in['nik'] = $this->input->post("nik");
		$in['nama_guru'] = $this->input->post("nama_guru");
		$in['password'] = $this->input->post("password");
		$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
		$in['tanggal_lahir'] = date("Y-m-d", strtotime($this->input->post("tanggal_lahir")));
		$in['tempat_lahir'] = $this->input->post("tempat_lahir");
		$in['alamat_jalan'] = $this->input->post("alamat_jalan");
		$in['kelurahan'] = $this->input->post("kelurahan");
		$in['kecamatan'] = $this->input->post("kecamatan");
		$in['hp'] = $this->input->post("hp");
		$in['telepon'] = $this->input->post("telepon");
		$in['email'] = $this->input->post("email");
		$in['agama'] = $this->input->post("agama");
		$in['kewarganegaraan'] = $this->input->post("kewarganegaraan");
		$in['password'] = $this->input->post("nip");
		$in['kode_guru'] = $this->input->post("kode_guru");


		$config['upload_path'] = './upload/guru';
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);


		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nip FROM pgn_guru WHERE nip = '$in[nip]'");
			$cek2 = $this->db->query("SELECT nik FROM pgn_guru WHERE nik = '$in[nik]'");
			$cek3 = $this->db->query("SELECT nuptk FROM pgn_guru WHERE nuptk = '$in[nuptk]'");
			$cek4 = $this->db->query("SELECT kode_guru FROM pgn_guru WHERE kode_guru = '$in[kode_guru]'");

			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. NIPTK Sudah Digunakan");
				redirect("admin/pengguna/guru_tambah/");
			} else if ($cek2->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. NIK Sudah Digunakan");
				redirect("admin/pengguna/guru_tambah");
			} else if ($cek3->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. NUPTK Sudah Digunakan");
				redirect("admin/pengguna/guru_tambah");
			} else if ($cek4->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Kode Guru Sudah Digunakan");
				redirect("admin/pengguna/guru_tambah");
			} else {
				$this->db->insert("pgn_guru", $in);
				$this->session->set_flashdata("success", "Tambah Data Guru Berhasil");
				redirect("admin/pengguna/guru");
			}
		} elseif ($tipe = 'edit') {
			$where['kode_guru'] 	= $this->input->post('kode_guru');

			$cek = $this->db->query("SELECT kode_guru FROM pgn_guru WHERE kode_guru = '$in[kode_guru]' AND kode_guru != '$where[kode_guru]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Data udah Digunakan");
				redirect("admin/pengguna/guru_edit/" . $this->input->post("kode_guru"));
			} else {
				$in['aktif_guru'] = $this->input->post("aktif_guru");
				$this->db->update("pgn_guru", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Guru Berhasil");
				redirect("admin/pengguna/guru");
			}
		} else {
			redirect(base_url());
		}
	}

	public function guru_import()
	{
		$unggah['upload_path']   = './upload/';
		$unggah['allowed_types'] = 'xlsx';
		$unggah['file_name']     = 'guru_import';
		$unggah['overwrite']     = true;
		$unggah['max_size']      = 5120;

		$this->load->library('upload');

		$this->upload->initialize($unggah);
		if ($this->upload->do_upload('file_import')) {
			$file_excel = new unggahexcel('upload/guru_import.xlsx', null);

			if (count($file_excel->Sheets()) == 1) {
				$baris = 1;

				foreach ($file_excel as $kolom) {
					if ($baris >= 2) {
						$cek = $this->db->query("SELECT nip FROM pgn_guru WHERE nip = '$kolom[0]'");
						if ($cek->num_rows() == 0) {
							$in['nip'] = $kolom[0];
							$in['nama_guru'] = $kolom[1];
							$in['jenis_kelamin'] = $kolom[2];
							$in['id_jabatan'] = $kolom[3];
							$in['password'] = $kolom[0];
							$this->db->insert("pgn_guru", $in);
						}
					}
					$baris++;
				}

				$this->session->set_flashdata("success", "Berhasil Import Data Guru");
			} else {
				$this->session->set_flashdata("error", "Gagal Import Data");
			}
			unlink('./upload/guru_import.xlsx');
			redirect("pengguna/guru");
		} else {
			redirect(base_url());
		}
	}
	public function hapus($nip)
	{
		$this->Pengguna_model->hapusdata($nip);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('admin/pengguna/guru');
	}

	//Pengguna siswa

	public function proses_tampil_siswa()
	{
		$kode_kelas = $this->input->post("kode_kelas");
		redirect("admin/pengguna/siswa/" . $kode_kelas);
	}

	public function siswa($kode_kelas = "")
	{
		$d['judul'] = "Data Siswa";
		if (!empty($kode_kelas)) {
			$d['siswa'] = $this->Pengguna_model->siswa($kode_kelas);
			$d['kode_kelas'] = $kode_kelas;
		} else {
			$d['siswa'] = "";
			$d['kode_kelas'] = "";
		}
		$d['combo_kelas'] = $this->Combo_model->combo_kelas($kode_kelas);
		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('admin/siswa/siswa');
		$this->load->view('admin/bottom');
	}

	public function biodata()
	{
		$kode_siswa = $this->session->userdata("id");

		$get = $this->Pengguna_model->siswa_edit($kode_siswa);

		$d['judul'] = "Data Siswa";
		$d['judul2'] = "Ubah";
		$d['tipe'] = 'edit';
		$data = $get->row();
		$d['nis'] = $data->nis;
		$d['nisn'] = $data->nisn;
		$d['nama_siswa'] = $data->nama_siswa;
		$d['jenis_kelamin'] = $data->jenis_kelamin;
		$d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
		$d['tempat_lahir'] = $data->tempat_lahir;
		$d['alamat_jalan'] = $data->alamat_jalan;
		$d['kelurahan'] = $data->kelurahan;
		$d['kecamatan'] = $data->kecamatan;
		$d['hp'] = $data->hp;
		$d['telepon'] = $data->telepon;
		$d['email'] = $data->email;
		$d['agama'] = $data->agama;
		$d['angkatan'] = $data->angkatan;
		$d['foto'] = $data->foto;
		$d['combo_kelas'] = $this->Combo_model->combo_kelas($data->kode_kelas);
		$d['kode_siswa'] = $data->kode_siswa;
		$d['aktif_siswa'] = $data->aktif_siswa;

		$d['nama_ayah'] = $data->nama_ayah;
		$d['pendidikan_ayah'] = $data->pendidikan_ayah;
		$d['pekerjaan_ayah'] = $data->pekerjaan_ayah;
		$d['no_hp_ayah'] = $data->no_hp_ayah;

		$d['nama_ibu'] = $data->nama_Ibu;
		$d['pendidikan_ibu'] = $data->pendidikan_ibu;
		$d['pekerjaan_ibu'] = $data->pekerjaan_ibu;
		$d['no_hp_ibu'] = $data->no_hp_ibu;

		$d['nama_wali'] = $data->nama_wali;
		$d['pendidikan_wali'] = $data->pendidikan_wali;
		$d['pekerjaan_wali'] = $data->pekerjaan_wali;
		$d['no_hp_wali'] = $data->no_hp_wali;

		$d['nama_sekolah'] = $data->nama_sekolah;
		$d['status_sekolah'] = $data->status_sekolah;
		$d['alamat_sekolah'] = $data->alamat_sekolah;
		$d['tahun_lulus'] = $data->tahun_lulus;

		$this->load->view('top', $d);
		$this->load->view('menu_siswa');
		$this->load->view('admin/siswa/biodata');
		$this->load->view('bottom');
	}



	public function siswa_detail($nis)
	{
		$d['judul'] = "Data Siswa";
		$d['judul2'] = "Detail";
		$get = $this->Pengguna_model->siswa_detail($nis);
		if ($get->num_rows() == 0) {
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		} else {
			$data = $get->row();
			$d['kode_siswa'] = $data->kode_siswa;
			$d['nis'] = $data->nis;
			$d['nisn'] = $data->nisn;
			$d['nama_siswa'] = $data->nama_siswa;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['tempat_lahir'] = $data->tempat_lahir;
			$d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
			$d['agama'] = $data->agama;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['kode_pos'] = $data->kode_pos;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['foto'] = $data->foto;
			$d['angkatan'] = $data->angkatan;
			$d['kode_kelas'] = $data->kode_kelas;
			$d['password'] = $data->password;
			$d['aktif_siswa'] = $data->aktif_siswa;

			$d['nama_ayah'] = $data->nama_ayah;
			$d['pekerjaan_ayah'] = $data->pekerjaan_ayah;
			$d['pendidikan_ayah'] = $data->pendidikan_ayah;
			$d['no_hp_ayah'] = $data->no_hp_ayah;

			$d['nama_ibu'] = $data->nama_Ibu;
			$d['pekerjaan_ibu'] = $data->pekerjaan_ibu;
			$d['pendidikan_ibu'] = $data->pendidikan_ibu;
			$d['no_hp_ibu'] = $data->no_hp_ibu;

			$d['nama_wali'] = $data->nama_wali;
			$d['pekerjaan_wali'] = $data->pekerjaan_wali;
			$d['pendidikan_wali'] = $data->pendidikan_wali;
			$d['no_hp_wali'] = $data->no_hp_wali;

			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('admin/siswa/siswa_detail');
			$this->load->view('admin/bottom');
		}
	}

	public function siswa_tambah()
	{
		$d['judul'] = "Data Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['kode_siswa'] = "";
		$d['nis'] = "";
		$d['nisn'] = "";
		$d['nama_siswa'] = "";
		$d['jenis_kelamin'] = "";
		$d['tempat_lahir'] = "";
		$d['tanggal_lahir'] = "";
		$d['agama'] = "";
		$d['alamat_jalan'] = "";
		$d['kelurahan'] = "";
		$d['kecamatan'] = "";
		$d['kode_pos'] = "";
		$d['hp'] = "";
		$d['telepon'] = "";
		$d['email'] = "";
		$d['foto'] = "";
		$d['angkatan'] = "";
		$d['kode_kelas'] = "";
		$d['password'] = "";
		$d['aktif_siswa'] = "";

		$d['nama_ayah'] = "";
		$d['pekerjaan_ayah'] = "";
		$d['pendidikan_ayah'] = "";
		$d['no_hp_ayah'] = "";

		$d['nama_ibu'] = "";
		$d['pekerjaan_ibu'] = "";
		$d['pendidikan_ibu'] = "";
		$d['no_hp_ibu'] = "";

		$d['nama_wali'] = "";
		$d['pekerjaan_wali'] = "";
		$d['pendidikan_wali'] = "";
		$d['no_hp_wali'] = "";

		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('admin/siswa/siswa_tambah');
		$this->load->view('admin/bottom');
	}


	public function siswa_edit($kode_siswa)
	{
		$cek = $this->db->query("SELECT kode_siswa FROM pgn_siswa WHERE kode_siswa = '$kode_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Pengguna_model->siswa_edit($kode_siswa);
			$data = $get->row();
			$d['kode_siswa'] = $data->kode_siswa;
			$d['nis'] = $data->nis;
			$d['nisn'] = $data->nisn;
			$d['nama_siswa'] = $data->nama_siswa;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['tempat_lahir'] = $data->tempat_lahir;
			if (!empty($data->tanggal_lahir) && $data->tanggal_lahir != '0000-00-00') {
				$d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
			} else {
				$d['tanggal_lahir'] = '';
			}
			$d['agama'] = $data->agama;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['kode_pos'] = $data->kode_pos;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['foto'] = $data->foto;
			$d['angkatan'] = $data->angkatan;
			$d['kode_kelas'] = $data->kode_kelas;
			$d['password'] = $data->password;
			$d['aktif_siswa'] = $data->aktif_siswa;

			$d['nama_ayah'] = $data->nama_ayah;
			$d['pekerjaan_ayah'] = $data->pekerjaan_ayah;
			$d['pendidikan_ayah'] = $data->pendidikan_ayah;
			$d['no_hp_ayah'] = $data->no_hp_ayah;

			$d['nama_ibu'] = $data->nama_Ibu;
			$d['pekerjaan_ibu'] = $data->pekerjaan_ibu;
			$d['pendidikan_ibu'] = $data->pendidikan_ibu;
			$d['no_hp_ibu'] = $data->no_hp_ibu;

			$d['nama_wali'] = $data->nama_wali;
			$d['pekerjaan_wali'] = $data->pekerjaan_wali;
			$d['pendidikan_wali'] = $data->pendidikan_wali;
			$d['no_hp_wali'] = $data->no_hp_wali;

			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('admin/siswa/siswa_tambah');
			$this->load->view('admin/bottom');
		} else {
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		}
	}

	public function siswa_save()
	{
		$tipe = $this->input->post("tipe");

		$in['kode_siswa'] = $this->input->post("kode_siswa");
		$in['nis'] = $this->input->post("nis");
		$in['nisn'] = $this->input->post("nisn");
		$in['nama_siswa'] = $this->input->post("nama_siswa");
		$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
		$in['tempat_lahir'] = $this->input->post("tempat_lahir");
		$in['tanggal_lahir'] = date("Y-m-d", strtotime($this->input->post("tanggal_lahir")));
		$in['agama'] = $this->input->post("agama");
		$in['alamat_jalan'] = $this->input->post("alamat_jalan");
		$in['kelurahan'] = $this->input->post("kelurahan");
		$in['kecamatan'] = $this->input->post("kecamatan");
		$in['kode_pos'] = $this->input->post("kode_pos");
		$in['hp'] = $this->input->post("hp");
		$in['telepon'] = $this->input->post("telepon");
		$in['email'] = $this->input->post("email");
		$in['angkatan'] = $this->input->post("angkatan");
		$in['kode_kelas'] = $this->input->post("kode_kelas");
		$in['password'] = $this->input->post("password");
		$in['aktif_siswa'] = $this->input->post("aktif_siswa");

		$in['nama_ayah'] = $this->input->post("nama_ayah");
		$in['pekerjaan_ayah'] = $this->input->post("pekerjaan_ayah");
		$in['pendidikan_ayah'] = $this->input->post("pendidikan_ayah");
		$in['no_hp_ayah'] = $this->input->post("no_hp_ayah");

		$in['nama_ibu'] = $this->input->post("nama_ibu");
		$in['pekerjaan_ibu'] = $this->input->post("pekerjaan_ibu");
		$in['pendidikan_ibu'] = $this->input->post("pendidikan_ibu");
		$in['no_hp_ibu'] = $this->input->post("no_hp_ibu");

		$in['nama_wali'] = $this->input->post("nama_wali");
		$in['pekerjaan_wali'] = $this->input->post("pekerjaan_wali");
		$in['pendidikan_wali'] = $this->input->post("pendidikan_wali");
		$in['no_hp_wali'] = $this->input->post("no_hp_wali");

		$config['upload_path'] = './upload/siswa';
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);


		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nis FROM pgn_siswa WHERE nis = '$in[nis]'");

			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. NISN Sudah Digunakan");
				redirect("admin/pengguna/siswa_tambah/");
			} else {
				$this->db->insert("pgn_siswa", $in);
				$this->session->set_flashdata("success", "Tambah Data Siswa Berhasil");
				redirect("admin/pengguna/siswa");
			}
		} elseif ($tipe = 'edit') {
			$where['kode_siswa'] 	= $this->input->post('kode_siswa');
			$cek = $this->db->query("SELECT kode_siswa FROM pgn_siswa WHERE kode_siswa = '$in[kode_siswa]' AND kode_siswa != '$where[kode_siswa]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input.  Kode Siswa Sudah Digunakan");
				redirect("admin/pengguna/siswa_edit/" . $this->input->post("kode_siswa"));
			} else {
				$d['aktif_siswa'] = $this->input->post("aktif_siswa");
				$this->db->update("pgn_siswa", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Siswa Berhasil");
				redirect("admin/pengguna/siswa");
			}
		} else {
			redirect(base_url());
		}
	}

	public function siswa_import()
	{
		$unggah['upload_path']   = './upload/';
		$unggah['allowed_types'] = 'xlsx';
		$unggah['file_name']     = 'siswa_import';
		$unggah['overwrite']     = true;
		$unggah['max_size']      = 5120;

		$this->load->library('upload');

		$this->upload->initialize($unggah);
		if ($this->upload->do_upload('file_import')) {
			$file_excel = new unggahexcel('upload/siswa_import.xlsx', null);

			if (count($file_excel->Sheets()) == 1) {
				$baris = 1;

				foreach ($file_excel as $kolom) {
					if ($baris >= 2) {
						$cek = $this->db->query("SELECT nis FROM pgn_siswa WHERE nis = '$kolom[0]'");
						if ($cek->num_rows() == 0) {
							$in['nis'] = $kolom[0];
							$in['nama_siswa'] = $kolom[1];
							$in['jenis_kelamin'] = $kolom[2];
							$in['kode_kelas'] = $kolom[3];
							$in['password'] = $kolom[0];
							$this->db->insert("pgn_siswa", $in);
						}
					}
					$baris++;
				}

				$this->session->set_flashdata("success", "Berhasil Import Data Siswa");
			} else {
				$this->session->set_flashdata("error", "Gagal Import Data");
			}
			unlink('./upload/siswa_import.xlsx');
			redirect("pengguna/siswa");
		} else {
			redirect(base_url());
		}
	}
	public function siswa_hapus($nis)
	{
		$this->Pengguna_model->siswa_hapus($nis);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('admin/pengguna/siswa');
	}
}
