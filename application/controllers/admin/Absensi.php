<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
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

    public function rekap_absensi() {
		$d['judul'] = "Data Rekap Presensi";
		$d['jadwal'] = $this->absensi_model->jadwal();
		$this->load->view('admin/top',$d);
		$this->load->view('admin/menu');
		$this->load->view('admin/data_absensi/rekap_absensi');
		$this->load->view('admin/bottom');	
    }
    
	public function hasil_rekap()
	{
	 	$d['judul'] = "Rekap Data Absensi Siswa Pada";
	 	$d['hasil_rekap'] = $this->absensi_model->hasil_rekap();
	 	$this->load->view('admin/top', $d);
	 	$this->load->view('admin/menu');
	 	$this->load->view('admin/data_absensi/hasil_rekap');
	 	$this->load->view('admin/bottom');
	 }

	
}
