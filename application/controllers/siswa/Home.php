<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Pengguna_model');
    }

    public function index()
    {
        $d['judul'] = "Dashboard";
        $d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
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
        
        $this->load->view('siswa/top', $d);
        $this->load->view('siswa/menu_siswa');
        $this->load->view('siswa/home');
        $this->load->view('siswa/bottom');
    }
}
