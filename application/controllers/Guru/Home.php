<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Pengguna_model');
		$this->load->Model('Combo_model');
	}

	public function index()
	{
		$d['judul'] = "Dashboard";
		$d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->guru();
        $data = $get->row();
        $d['kode_guru'] = $data->kode_guru;
        $d['nip'] = $data->nip;
        $d['nik'] = $data->nik;
        $d['nuptk'] = $data->nuptk;
        $d['nama_guru'] = $data->nama_guru;
		$d['jenis_kelamin'] = $data->jenis_kelamin;
        $d['tempat_lahir'] = $data->tempat_lahir;
        $d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
        $d['agama'] = $data->agama;
		$d['alamat_jalan'] = $data->alamat_jalan;
		$d['rt'] = $data->rt;
        $d['rw'] = $data->rw;
        $d['kelurahan'] = $data->kelurahan;
        $d['kecamatan'] = $data->kecamatan;
        $d['kode_pos'] = $data->kode_pos;
        $d['hp'] = $data->hp;
        $d['telepon'] = $data->telepon;
        $d['email'] = $data->email;
        $d['foto'] = $data->foto;
		$d['kewarganegaraan'] = $data->kewarganegaraan;
		$d['password'] = $data->password;
        $d['aktif_guru'] = $data->aktif_guru;
		$this->load->view('guru/top_guru', $d);
		$this->load->view('guru/menu_guru');
		$this->load->view('guru/home_guru');
		$this->load->view('guru/bottom_guru');
	}
}
