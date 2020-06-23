<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view("login");
	}


	public function cek() {
		if($this->input->method(TRUE) == 'POST' && !empty($_POST)) {
			$in['username'] = $this->input->post('username');
			$in['password'] = $this->input->post('password');
			$this->Login_model->cek($in);
			
		} else {
			redirect(base_url('Login'));
		}
	}

}
