<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_raport extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Akd_model');
        $this->load->Model('Combo_model');
        $this->load->Model('Pengguna_model');
        $this->load->Model('Nilai_model');
    }


    public function index()
    {
        redirect(base_url());
    }


    public function input_raport($id_tahun_ajaran = "")
    {
        $d['judul'] = "Input Nilai Raport";
        $d['input_raport'] = $this->Akd_model->akd_jadwal($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->gurukelas();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;

        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/input_raport');
        $this->load->view('guru/bottom_guru');
    }



    public function tampil()
    {
        $d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->gurukelas();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;

        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("guru/input_raport/input_raport/" . $id_tahun_ajaran . "/" . $data->kode_kelas);
    }
    public function input_sikap()
    {
        $d['judul'] = "Input Sikap";
        $d['input'] = $this->Nilai_model->input_sikap();
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/input_sikap');
        $this->load->view('guru/bottom_guru');
    }
    public function input_keterampilan()
    {
        $d['judul'] = "Input Keterampilan";
        $d['input'] = $this->Nilai_model->input_keterampilan();
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/input_keterampilan');
        $this->load->view('guru/bottom_guru');
    }
    public function input_pengetahuan()
    {
        $d['judul'] = "Input Pengetahuan";
        $d['input'] = $this->Nilai_model->input_pengetahuan();
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/input_pengetahuan');
        $this->load->view('guru/bottom_guru');
    }
}
