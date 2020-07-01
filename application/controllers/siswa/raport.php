<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Nilai_model');
        $this->load->Model('Combo_model');
        $this->load->Model('Pengguna_model');
    }


    public function index()
    {
        redirect(base_url());
    }


    public function nilai_raport($id_tahun_ajaran = "")
    {
        $d['judul'] = "Laporan Nilai Akhir";
        $d['nilai_uts'] = $this->Nilai_model->nilai_uts_siswa($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
        $data = $get->row();
        $d['nisn'] = $data->nisn;
        $this->load->view('siswa/top', $d);
        $this->load->view('siswa/menu_siswa');
        $this->load->view('siswa/vw_raport');
        $this->load->view('siswa/bottom');
    }



    public function tampil()
    {
        $d['pgn_siswa'] = $this->db->get_where('pgn_siswa', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();
        $get = $this->Pengguna_model->pgnsiswa();
        $data = $get->row();
        $d['nisn'] = $data->nisn;
        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("siswa/raport/nilai_rapot/" . $id_tahun_ajaran."/". $data->nisn);
    }
}
