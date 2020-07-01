<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extrakulikuler extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Nilai_model');
        $this->load->Model('Combo_model');
        $this->load->Model('Pengguna_model');
    }


    public function index()
    {
        redirect(base_url());
    }


    public function extrakulikuler($id_tahun_ajaran = "")
    {
        $d['jenis'] = 'add';
        $d['judul'] = "Input Extrakulikuler Siswa";
        $d['extrakulikuler'] = $this->Nilai_model->extrakulikuler($id_tahun_ajaran);
        $d['id_tahun_ajaran'] = $id_tahun_ajaran;
        $d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->gurukelas();
        $data = $get->row();
        $d['nisn'] = $data->nisn;
        $d['nama_siswa'] = $data->nama_siswa;
        $d['kegiatan'] = $data->kegiatan;
        $d['nilai'] = $data->nilai;
        $d['deskripsi'] = $data->deskripsi;
        $d['kode_kelas'] = $data->kode_kelas;

        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($id_tahun_ajaran);
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/extrakulikuler');
        $this->load->view('guru/bottom_guru');
    }
    public function tampil()
    {
        $d['pgn_guru'] = $this->db->get_where('pgn_guru', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $get = $this->Pengguna_model->gurukelas();
        $data = $get->row();
        $d['kode_kelas'] = $data->kode_kelas;
        $id_tahun_ajaran = $this->input->post("id_tahun_ajaran");
        redirect("guru/extrakulikuler/extrakulikuler/" . $id_tahun_ajaran . "/" . $data->kode_kelas);
    }
    public function save()
    {
        $jenis = $this->input->post("jenis");
        $in['nisn'] = $this->input->post("nisn");
        $in['nama_siswa'] = $this->input->post("nama_siswa");
        $in['kegiatan'] = $this->input->post("kegiatan");
        $in['nilai'] = $this->input->post("nilai");
        $in['deskripsi'] = $this->input->post("deskripsi");




        if ($jenis == "add") {
            $where['id_nilai_extrakulikuler']     = $this->input->post('id_nilai_extrakulikuler');
            $cek = $this->db->query("SELECT id_nilai_extrakulikuler FROM nilai_extrakulikuler WHERE id_nilai_extrakulikuler = '$in[id_nilai_extrakulikuler]' AND id_nilai_extrakulikuler != '$where[id_nilai_extrakulikuler]'");
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata("error", "Gagal Input.  id Sudah Digunakan");
                redirect("guru/extrakulikuler/tampil/" . $this->input->post("id"));
            } else {

                $this->db->update("nilai_extrakulikuler", $in, $where);
                $this->session->set_flashdata("success", "Ubah Data Admin Berhasil");
                redirect("admin/extrakulikuler/extrakulikuler");
            }
        } else {
            redirect(base_url());
        }
    }
}
