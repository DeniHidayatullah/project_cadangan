<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data_nilai_raport extends CI_Controller
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


    public function data_nilai_raport($id_tahun_ajaran = "")
    {
        $d['judul'] = "Data Nilai Raport";
        $d['data_nilai_raport'] = $this->Akd_model->akd_jadwal($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->gurukelas();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;

        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/data_nilai_raport');
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
        redirect("guru/data_nilai_raport/data_nilai_raport/" . $id_tahun_ajaran . "/" . $data->kode_kelas);
    }
}
