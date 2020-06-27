<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_capaian extends CI_Controller
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


    public function cetak_uts($kode_kelas = "", $id_tahun_ajaran = "")
    {
        $d['judul'] = "Data Siswa";
        if (!empty($kode_kelas)) {
            $d['nilai_uts'] = $this->Nilai_model->cetak_uts($kode_kelas, $id_tahun_ajaran);
            $d['kode_kelas'] = $kode_kelas;
            $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        } else {
            $d['nilai_uts'] = "";
            $d['kode_kelas'] = "";
            $d['id_tahun_ajaran'] = "";
        }
        $d['combo_kelas'] = $this->Combo_model->combo_kelas($kode_kelas);
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('admin/top', $d);
        $this->load->view('admin/menu');
        $this->load->view('laporan_nilai/cetak_uts');
        $this->load->view('admin/bottom');
    }



    public function tampil_siswa()
    {
        $kode_kelas = $this->input->post("kode_kelas");
        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("admin/nilai/cetak_uts/" . $kode_kelas . "/" . $id_tahun_ajaran);
    }
}
