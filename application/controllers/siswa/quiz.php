<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('absensi_model');
        $this->load->Model('Combo_model');
    }


    public function index()
    {
        redirect(base_url());
    }

    public function tampilan()
    {
        $d['judul'] = "Quiz dan Ujian Online";
        $d['jadwal'] = $this->absensi_model->jadwal();
        $this->load->view('siswa/top', $d);
        $this->load->view('siswa/menu_siswa');
        $this->load->view('siswa/quiz');
        $this->load->view('siswa/bottom');
    }
}
