
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('error404.php');
	}

}

/* End of file 404.php */
/* Location: ./application/controllers/404.php */
