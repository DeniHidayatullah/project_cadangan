<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_raport extends CI_Controller
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


    public function cetak_raport($id_tahun_ajaran = "")
    {
        $d['judul'] = "Cetak Raport Siswa";
        if (!empty($kode_kelas)) {
            $d['nilai_raport'] = $this->Nilai_model->cetak_uts($id_tahun_ajaran);

            $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        } else {
            $d['nilai_raport'] = "";
            $d['id_tahun_ajaran'] = "";
        }

        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/cetak_raport');
        $this->load->view('guru/bottom_guru');
    }



    public function tampil()
    {
        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("guru/cetak_raport/cetak_raport/" . $id_tahun_ajaran);
    }
}
