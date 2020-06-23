<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('tipe') != "root") {
			redirect("../" . $this->session->userdata('tipe'));
		} else {
			redirect(base_url() . 'home');
		}
	}
	
	public function index() {
		$this->load->dbutil();
		$this->load->helper('file');
		
		$config = array(
			'format'	=> 'zip',
			'filename'	=> 'asisdb-'.date("dmy").'.sql'
		);
		
		$backup = $this->dbutil->backup($config);
		
		$save = './datadb/asisdb-'.date("dmy").'.zip';
		$db_name = "asisdb-".date('dmy').".zip";
        write_file($save, $backup);
	}

	public function direct() {
		$this->load->dbutil();
		$this->load->helper('file');
		
		$config = array(
			'format'	=> 'zip',
			'filename'	=> 'asisdb-'.date("dmy").'.sql'
		);
		
		$backup = $this->dbutil->backup($config);
		
		$save = './datadb/asisdb-'.date("dmy").'.zip';
		$db_name = "asisdb-".date('dmy').".zip";
		write_file($save, $backup);
		
		$this->load->helper('download');
		force_download($db_name, $backup);
	}
}