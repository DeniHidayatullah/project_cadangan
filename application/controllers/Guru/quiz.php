<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class quiz extends CI_Controller {


	public function __construct(){
		parent::__construct();
			$this->load->Model('Nilai_model');
			$this->load->Model('Combo_model');
	}


	public function index() {
		redirect(base_url());
	}


	public function quiz($kode_kelas = "" , $id_tahun_ajaran="")
	{
		$d['judul'] = "Quiz/Ujian Online";
		if (!empty($kode_kelas)) {
			$d['nilai_uts'] = $this->Nilai_model->cetak_uts($kode_kelas,$id_tahun_ajaran);
			$d['kode_kelas'] = $kode_kelas;
			$d['id_tahun_ajaran'] = $id_tahun_ajaran;
		} else {
			$d['nilai_uts'] = "";
			$d['kode_kelas'] = "";
			$d['id_tahun_ajaran'] = "";
		}
		$d['combo_kelas'] = $this->Combo_model->combo_kelas($kode_kelas);
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
		$this->load->view('guru/top_guru',$d);
		$this->load->view('guru/menu_guru');
		$this->load->view('guru/tampil_quiz');
		$this->load->view('guru/bottom_guru');	
	}



	public function tampil()
	{
		$kode_kelas = $this->input->post("kode_kelas");
		$id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
		redirect("guru/quiz/cetak_uts/" . $kode_kelas ."/".$id_tahun_ajaran);
	}
	
   
    
}