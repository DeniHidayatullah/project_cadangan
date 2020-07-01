<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capaian extends CI_Controller
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


    public function capaian($id_tahun_ajaran = "")
    {
        $d['judul'] = "Input Capaian Hasil Belajar";
        $d['capaian'] = $this->Nilai_model->capaian($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->gurukelas();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/capaian');
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
        redirect("guru/capaian/capaian/" . $id_tahun_ajaran . "/" . $data->kode_kelas);
    }
}
