<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubah_password extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }


    public function index()
    {
        redirect(base_url());
    }
    public function ubah()
    {


        $d['judul'] = "Ubah Password";


        $this->load->view('admin/top', $d);
        $this->load->view('admin/menu');
        $this->load->view('admin/password');
        $this->load->view('admin/bottom');
    }
    public function ubah_aksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');
        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $d['judul'] = "Ubah Password";
            $this->load->view('admin/top', $d);
            $this->load->view('admin/menu');
            $this->load->view('admin/password');
            $this->load->view('admin/bottom');
        } else {
            $data = array('password' => $pass_baru);
            $id = array('username' => $this->session->set_userdata('username'));
            $this->Login_model->update_password($id, $data, 'pgn_admin');
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('admin/Home');
        }
    }
}
