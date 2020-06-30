<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('absensi_model');
        $this->load->Model('Combo_model');
        $this->load->Model('Pengguna_model');
    }


    public function index($id_tahun_ajaran = "")
    {
        $d['judul'] = "Laporan Presensi";
        $d['presensi'] = $this->absensi_model->presensi_model($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
        $data = $get->row();
        $d['nisn'] = $data->nisn;
        $d['kode_kelas'] = $data->kode_kelas;
        $this->load->view('siswa/top', $d);
        $this->load->view('siswa/menu_siswa');
        $this->load->view('siswa/presensi');
        $this->load->view('siswa/bottom');
    }

    public function tampil()
    {
        $d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
        $data = $get->row();
        $d['nisn'] = $data->nisn;
        $d['kode_kelas'] = $data->kode_kelas;
        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("siswa/presensi/" . $id_tahun_ajaran."/". $data->nisn."/".$data->kode_kelas);
    }
}
