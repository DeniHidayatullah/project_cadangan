<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Akd_model');
        $this->load->Model('Combo_model');
        $this->load->Model('Pengguna_model');
    }

    public function index()
    {
		redirect(base_url());
    }
    public function detail_jadwal($id_tahun_ajaran = "")
    {
        $d['judul'] = "jadwal Pelajaran";
        $d['jadwal'] = $this->Akd_model->akd_jadwal($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;
        $this->load->view('siswa/top', $d);
        $this->load->view('siswa/menu_siswa');
        $this->load->view('siswa/vw_jadwal');
        $this->load->view('siswa/bottom');
    }


    public function tampil()
    {$d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;
        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("siswa/jadwal/detail_jadwal/" . $id_tahun_ajaran ."/". $data->kode_kelas);
    }
}
