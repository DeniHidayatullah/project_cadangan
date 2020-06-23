<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->Model('pengguna_admin_model');
    }


    public function index()
    {
        redirect(base_url());
    }


    public function admin()
    {
        $d['judul'] = "Data Admin";
        $d['admin'] = $this->pengguna_admin_model->admin();
        $this->load->view('admin/top', $d);
        $this->load->view('admin/menu');
        $this->load->view('admin/admin1/admin');
        $this->load->view('admin/bottom');
    }
    public function admin_tambah()
    {

        $d['judul'] = 'Data Admin';
        $d['judul2'] = 'Tambah';
        $d['jenis'] = 'add';
        $d['id'] = "";
        $d['nama'] = "";
        $d['username'] = "";
        $d['password'] = "";
        $d['tipe'] = '';

        $this->load->view('admin/top', $d);
        $this->load->view('admin/menu');
        $this->load->view('admin/admin1/admin_tambah', $d);
        $this->load->view('admin/bottom');
    }
    public function admin_detail($id)
    {

        $d['judul'] = "Data Admin";
        $d['judul2'] = "Detail";
        $d['admin'] = $this->pengguna_admin_model->admin_detail($id);


        $this->load->view('admin/top', $d);
        $this->load->view('admin/menu');
        $this->load->view('admin/admin1/admin_detail');
        $this->load->view('admin/bottom');
    }

    public function admin_edit($id)
    {
        $cek = $this->db->query("SELECT id FROM pgn_admin WHERE id = '$id'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data Admin";
            $d['judul2'] = "Ubah";
            $d['jenis'] = 'edit';
            $get = $this->pengguna_admin_model->admin_edit($id);
            $data = $get->row();
            $d['id'] = $data->id;
            $d['nama'] = $data->nama;
            $d['username'] = $data->username;
            $d['password'] = $data->password;
            $d['tipe'] = $data->tipe;
            $this->load->view('admin/top', $d);
            $this->load->view('admin/menu');
            $this->load->view('admin/admin1/admin_tambah');
            $this->load->view('admin/bottom');
        } else {
            $this->load->view('admin/top', $d);
            $this->load->view('admin/menu');
            $this->load->view('404');
            $this->load->view('admin/bottom');
        }
    }

    public function hapus($id)
    {
        $this->pengguna_admin_model->hapusdata($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('admin/pengguna_admin/admin');
    }
    public function admin_save()
    {
        $jenis = $this->input->post("jenis");
        $in['id'] = $this->input->post("id");
        $in['nama'] = $this->input->post("nama");
        $in['username'] = $this->input->post("username");
        $in['password'] = $this->input->post("password");
        $in['tipe'] = $this->input->post("tipe");



        if ($jenis == "add") {
            $cek = $this->db->query("SELECT id FROM pgn_admin WHERE id = '$in[id]'");

            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata("error", "Gagal Input. ID Sudah Digunakan");
                redirect("admin/pengguna_admin/admin_tambah/");
            } else {
                $this->db->insert("pgn_admin", $in);
                $this->session->set_flashdata("success", "Tambah Data Admin Berhasil");
                redirect("admin/pengguna_admin/admin");
            }
        } elseif ($jenis = 'edit') {
            $where['id']     = $this->input->post('id');
            $cek = $this->db->query("SELECT id FROM pgn_admin WHERE id = '$in[id]' AND id != '$where[id]'");
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata("error", "Gagal Input.  id Sudah Digunakan");
                redirect("admin/pengguna_admin/admin_edit/" . $this->input->post("id"));
            } else {

                $this->db->update("pgn_admin", $in, $where);
                $this->session->set_flashdata("success", "Ubah Data Admin Berhasil");
                redirect("admin/pengguna_admin/admin");
            }
        } else {
            redirect(base_url());
        }
    }
}
