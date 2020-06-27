<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uts extends CI_Controller
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


    public function uts($id_tahun_ajaran = "")
    {
        $d['judul'] = "Laporan Nilai UTS";
        if (!empty($kode_kelas)) {
            $d['nilai_uts'] = $this->Nilai_model->uts($id_tahun_ajaran);

            $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        } else {
            $d['nilai_uts'] = "";
            $d['id_tahun_ajaran'] = "";
        }

        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('siswa/top', $d);
        $this->load->view('siswa/menu_siswa');
        $this->load->view('siswa/uts');
        $this->load->view('siswa/bottom');
    }



    public function tampil()
    {

        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("siswa/uts/uts/" . $id_tahun_ajaran);
    }
}
