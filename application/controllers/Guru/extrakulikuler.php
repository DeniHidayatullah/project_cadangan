<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extrakulikuler extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Nilai_model');
        $this->load->Model('Combo_model');
    }


    public function index()
    {
        redirect(base_url());
    }


    public function extrakulikuler($id_tahun_ajaran = "")
    {
        $d['judul'] = "Input Extrakulikuler Siswa";
        if (!empty($kode_kelas)) {
            $d['extrakulikuler'] = $this->Nilai_model->uts($id_tahun_ajaran);

            $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        } else {
            $d['extrakulikuler'] = "";
            $d['id_tahun_ajaran'] = "";
        }

        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/extrakulikuler');
        $this->load->view('guru/bottom_guru');
    }
    public function tampil()
    {

        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("guru/extrakulikuler/extrakulikuler/" . $id_tahun_ajaran);
    }
}