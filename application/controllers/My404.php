<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My404 extends CI_Controller
{

	public function index()
	{
		$this->output->set_status_header('404');
       	$this->load->view('err404');
	}

}
