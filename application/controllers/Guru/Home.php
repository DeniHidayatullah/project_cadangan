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
		$this->load->view('guru/top_guru', $d);
		$this->load->view('guru/menu_guru');
		$this->load->view('guru/home_guru');
		$this->load->view('guru/bottom_guru');
	}
}
