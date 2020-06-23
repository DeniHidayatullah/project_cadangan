<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('diagram_model');
	}

	public function index()
	{
		$d['judul'] = "Dashboard";
		$d['home'] = $this->diagram_model->lingkaran();
		$d['done'] = $this->diagram_model->batang();
		$d['kelas'] = $this->diagram_model->kelas();
		$d['jurusan'] = $this->diagram_model->jurusan();
		$d['guru'] = $this->diagram_model->guru();
		$d['siswa'] = $this->diagram_model->siswa();
		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('admin/home');
		$this->load->view('admin/bottom');
	}
}
