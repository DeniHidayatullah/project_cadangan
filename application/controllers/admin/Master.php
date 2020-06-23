<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


	public function __construct(){
		parent::__construct();
			$this->load->Model('Master_model');
			$this->load->Model('Combo_model');
	}


	public function index() {
		redirect(base_url());
	}


	public function jurusan() {
		$d['judul'] = "Data Jurusan";
		$d['jurusan'] = $this->Master_model->jurusan();
		$this->load->view('admin/top',$d);
		$this->load->view('admin/menu');
		$this->load->view('master/jurusan');
		$this->load->view('admin/bottom');	
	}

    public function jurusan_detail($nip) {
		$d['judul'] = "Data Jurusan";
		$d['judul2'] = "Detail";
		$get = $this->Master_model->jurusan_detail($nip);
		if($get->num_rows() == 0) {
			$this->load->view('admin/top',$d);
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		} else { 
			$data = $get->row();
			$d['kode_jurusan'] = $data->kode_jurusan;
			$d['nama_jurusan'] = $data->nama_jurusan;
			$d['kode_guru'] = $data->kode_guru;
			$d['aktif_jurusan'] = $data->aktif_jurusan;
			$this->load->view('admin/top',$d);
			$this->load->view('admin/menu');
			$this->load->view('master/jurusan_detail');
			$this->load->view('admin/bottom');	
		}
	}

	public function jurusan_tambah() {
		$d['judul'] = "Data Jurusan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_jurusan'] = "";
        $d['kode_jurusan'] = "";
        $d['kode_guru'] = "";
		$d['aktif_jurusan'] = "";
		$this->load->view('admin/top',$d);
		$this->load->view('admin/menu');
		$this->load->view('master/jurusan_tambah');
		$this->load->view('admin/bottom');
		
	}


	public function jurusan_edit($kode_jurusan) {
		$cek = $this->db->query("SELECT kode_jurusan FROM mst_jurusan WHERE kode_jurusan = '$kode_jurusan'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Jurusan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->jurusan_edit($kode_jurusan);
			$data = $get->row();
			$d['nama_jurusan'] = $data->nama_jurusan;
            $d['kode_jurusan'] = $data->kode_jurusan;
            $d['kode_guru'] = $data->kode_guru;
			$d['aktif_jurusan'] = $data->aktif_jurusan;
			$this->load->view('admin/top',$d);
			$this->load->view('admin/menu');
			$this->load->view('master/jurusan_tambah');
			$this->load->view('admin/bottom');
		} else {
			$this->load->view('admin/top');
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		}	
	}

	public function hapus($kode_jurusan){
		$this->Master_model->hapusdata($kode_jurusan);
		$this->session->set_flashdata('flash','dihapus');
		redirect('admin/master/jurusan');
	}
   
	public function jurusan_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_jurusan'] = $this->input->post("nama_jurusan");
            $in['kode_jurusan'] = $this->input->post("kode_jurusan");
            $in['kode_guru'] = $this->input->post("kode_guru");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT kode_jurusan FROM mst_jurusan WHERE kode_jurusan = '$in[kode_jurusan]'");
                $cek2 = $this->db->query("SELECT nama_jurusan FROM mst_jurusan WHERE nama_jurusan = '$in[nama_jurusan]'");
                $cek3 = $this->db->query("SELECT kode_guru FROM mst_jurusan WHERE kode_guru = '$in[kode_guru]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Jurusan Sudah Digunakan");
					redirect("admin/master/jurusan_tambah");	
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Jurusan Sudah Digunakan");
                    redirect("admin/master/jurusan_tambah");	
                } else if($cek3->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Guru Sudah Digunakan");
					redirect("admin/master/jurusan_tambah");
				} else { 	
					$this->db->insert("mst_jurusan",$in);
					$this->session->set_flashdata("success","Tambah Data Jurusan Berhasil");
					redirect("admin/master/jurusan");	
				}
			} elseif($tipe = 'edit') {
				$where['kode_jurusan'] 	= $this->input->post('kode_jurusan');
				$cek = $this->db->query("SELECT kode_jurusan FROM mst_jurusan WHERE kode_jurusan = '$in[kode_jurusan]' AND kode_jurusan != '$where[kode_jurusan]'");
                $cek2 = $this->db->query("SELECT nama_jurusan FROM mst_jurusan WHERE nama_jurusan = '$in[nama_jurusan]' AND kode_jurusan != '$where[kode_jurusan]'");
                $cek3 = $this->db->query("SELECT kode_guru FROM mst_jurusan WHERE kode_guru = '$in[kode_guru]' AND kode_jurusan != '$where[kode_jurusan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Jurusan Sudah Digunakan");
					redirect("admin/master/jurusan/jurusan_edit/".$this->input->post("kode_jurusan"));
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Jurusan Sudah Digunakan");
                    redirect("admin/master/jurusan/jurusan_edit/".$this->input->post("kode_jurusan"));
                } else if($cek3->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Guru Sudah Digunakan");
					redirect("admin/master/jurusan/jurusan_edit/".$this->input->post("kode_jurusan"));
				} else { 	
					$in['aktif_jurusan'] = $this->input->post("aktif_jurusan");
					$this->db->update("mst_jurusan",$in,$where);
					$this->session->set_flashdata("success","Ubah Data jurusan Berhasil");
					redirect("admin/master/jurusan");	
                }
				
			} else {
				redirect(base_url());
            }
        
    }

     
    public function kelas() {
        $d['judul'] = "Data Kelas";
        $d['kelas'] = $this->Master_model->kelas();
        $this->load->view('admin/top',$d);
        $this->load->view('admin/menu');
        $this->load->view('master/kelas');
        $this->load->view('admin/bottom');	
    }

    public function kelas_tambah() {
$d['judul'] = "Data Kelas";
$d['judul2'] = "Tambah";
$d['tipe'] = 'add';
$d['nama_kelas'] = "";
$d['kode_kelas'] = "";
$d['kode_guru'] = "";
$d['kode_jurusan'] = "";
$d['kode_ruangan'] = "";
$this->load->view('admin/top',$d);
$this->load->view('admin/menu');
$this->load->view('master/kelas_tambah');
$this->load->view('admin/bottom');

}

    public function kelas_edit($kode_kelas) {
        $cek = $this->db->query("SELECT kode_kelas FROM mst_kelas WHERE kode_kelas = '$kode_kelas'");
        if($cek->num_rows() > 0) { 
            $d['judul'] = "Data Kelas";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->Master_model->kelas_edit($kode_kelas);
            $data = $get->row();
            $d['nama_kelas'] = $data->nama_kelas;
            $d['kode_kelas'] = $data->kode_kelas;
            $d['kode_guru'] = $data->kode_guru;
            $d['kode_jurusan'] = $data->kode_jurusan;
            $d['kode_ruangan'] = $data->kode_ruangan;
            $this->load->view('admin/top',$d);
            $this->load->view('admin/menu');
            $this->load->view('master/kelas_tambah');
            $this->load->view('admin/bottom');
        } else {
            $this->load->view('admin/top');
            $this->load->view('admin/menu');
            $this->load->view('404');
            $this->load->view('admin/bottom');
        }
    }
	public function hapus_kelas($kode_kelas){
		$this->Master_model->hapus_kelas($kode_kelas);
		$this->session->set_flashdata('flash','dihapus');
		redirect('admin/master/kelas');
	}
              
                   public function kelas_save() {
                    $tipe = $this->input->post("tipe");	
                    $in['nama_kelas'] = $this->input->post("nama_kelas");
                    $in['kode_kelas'] = $this->input->post("kode_kelas");
                    $in['kode_guru'] = $this->input->post("kode_guru");
                    $in['kode_jurusan'] = $this->input->post("kode_jurusan");
                    $in['kode_ruangan'] = $this->input->post("kode_ruangan");
                    
                    if($tipe == "add") {
                        $cek = $this->db->query("SELECT kode_kelas FROM mst_kelas WHERE kode_kelas = '$in[kode_kelas]'");
                        $cek2 = $this->db->query("SELECT nama_kelas FROM mst_kelas WHERE nama_kelas = '$in[nama_kelas]'");
                        $cek3 = $this->db->query("SELECT kode_guru FROM mst_kelas WHERE kode_guru = '$in[kode_guru]'");
                        $cek5 = $this->db->query("SELECT kode_ruangan FROM mst_kelas WHERE kode_ruangan = '$in[kode_ruangan]'");
                        if($cek->num_rows() > 0) { 
                            $this->session->set_flashdata("error","Gagal Input. Kode Kelas Sudah Digunakan");
                            redirect("admin/master/kelas_tambah");	
                        } else if($cek2->num_rows() > 0) { 
                            $this->session->set_flashdata("error","Gagal Input. Nama Kelas Sudah Digunakan");
                            redirect("admin/master/kelas_tambah");	
                        } else if($cek3->num_rows() > 0) { 
                            $this->session->set_flashdata("error","Gagal Input. Kode Guru Sudah Digunakan");
                            redirect("admin/master/kelas_tambah");
                        
                        } else if($cek5->num_rows() > 0) { 
                            $this->session->set_flashdata("error","Gagal Input. Kode Ruangan Sudah Digunakan");
                            redirect("admin/master/kelas_tambah");
                        } else { 	
                            $this->db->insert("mst_kelas",$in);
                            $this->session->set_flashdata("success","Tambah Data Kelas Berhasil");
                            redirect("admin/master/kelas");	
                        }
					} elseif($tipe = 'edit') {
						$where['kode_kelas'] 	= $this->input->post('kode_kelas');
						$cek = $this->db->query("SELECT kode_kelas FROM mst_kelas WHERE kode_kelas = '$in[kode_kelas]' AND kode_kelas != '$where[kode_kelas]'");
						$cek2 = $this->db->query("SELECT nama_kelas FROM mst_kelas WHERE nama_kelas = '$in[nama_kelas]' AND kode_kelas != '$where[kode_kelas]'");
						$cek3 = $this->db->query("SELECT kode_guru FROM mst_kelas WHERE kode_guru = '$in[kode_guru]' AND kode_kelas != '$where[kode_kelas]'");
						if($cek->num_rows() > 0) { 
							$this->session->set_flashdata("error","Gagal Input. Kode Kelas Sudah Digunakan");
							redirect("admin/master/kelas/kelas_edit/".$this->input->post("kode_kelas"));
						} else if($cek2->num_rows() > 0) { 
							$this->session->set_flashdata("error","Gagal Input. Nama Kelas Sudah Digunakan");
							redirect("admin/master/kelas/kelas_edit/".$this->input->post("kode_kelas"));
						} else if($cek3->num_rows() > 0) { 
							$this->session->set_flashdata("error","Gagal Input. Kode Guru Sudah Digunakan");
							redirect("admin/master/Kelas/kelas_edit/".$this->input->post("kode_kelas"));
						} else { 								
							$this->db->update("mst_kelas",$in,$where);
							$this->session->set_flashdata("success","Ubah Data Kelas Berhasil");
							redirect("admin/master/kelas");	
						}
                    } else {
                        redirect(base_url());
                    }

    }

    public function ruangan() {
		$d['judul'] = "Data Ruangan";
		$d['ruangan'] = $this->Master_model->ruangan();
		$this->load->view('admin/top',$d);
		$this->load->view('admin/menu');
		$this->load->view('master/ruangan');
		$this->load->view('admin/bottom');	
	}

  	public function ruangan_tambah() {
		$d['judul'] = "Data Ruangan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_ruangan'] = "";
        $d['kode_ruangan'] = "";
        $d['kapasitas_belajar'] = "";
		$d['aktif_ruangan'] = "";
		$this->load->view('admin/top',$d);
		$this->load->view('admin/menu');
		$this->load->view('master/ruangan_tambah');
		$this->load->view('admin/bottom');
		
	}


	public function ruangan_edit($kode_ruangan) {
		$cek = $this->db->query("SELECT kode_ruangan FROM mst_ruangan WHERE kode_ruangan = '$kode_ruangan'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Ruangan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->ruangan_edit($kode_ruangan);
			$data = $get->row();
			$d['nama_ruangan'] = $data->nama_ruangan;
            $d['kode_ruangan'] = $data->kode_ruangan;
            $d['kapasitas_belajar'] = $data->kapasitas_belajar;
			$d['aktif_ruangan'] = $data->aktif_ruangan;
			$this->load->view('admin/top',$d);
			$this->load->view('admin/menu');
			$this->load->view('master/ruangan_tambah');
			$this->load->view('admin/bottom');
		} else {
			$this->load->view('admin/top');
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		}	
	}

    public function hapus_ruangan($kode_ruangan){
		$this->Master_model->hapus_ruangan($kode_ruangan);
		$this->session->set_flashdata('flash','dihapus');
		redirect('admin/master/ruangan');
	}
	public function ruangan_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_ruangan'] = $this->input->post("nama_ruangan");
            $in['kode_ruangan'] = $this->input->post("kode_ruangan");
            $in['kapasitas_belajar'] = $this->input->post("kapasitas_belajar");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT kode_ruangan FROM mst_ruangan WHERE kode_ruangan = '$in[kode_ruangan]'");
                $cek2 = $this->db->query("SELECT nama_ruangan FROM mst_ruangan WHERE nama_ruangan = '$in[nama_ruangan]'");
                $cek3 = $this->db->query("SELECT kapasitas_belajar FROM mst_ruangan WHERE kapasitas_belajar = '$in[kapasitas_belajar]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Ruangan Sudah Digunakan");
					redirect("admin/master/ruangan_tambah");	
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Ruangan Sudah Digunakan");
                    redirect("admin/master/ruangan_tambah");	
               	} else { 	
					$this->db->insert("mst_ruangan",$in);
					$this->session->set_flashdata("success","Tambah Data Ruangan Berhasil");
					redirect("admin/master/ruangan");	
				}
			} elseif($tipe = 'edit') {
				$where['kode_ruangan'] 	= $this->input->post('kode_ruangan');
				$cek = $this->db->query("SELECT kode_ruangan FROM mst_ruangan WHERE kode_ruangan = '$in[kode_ruangan]' AND kode_ruangan != '$where[kode_ruangan]'");
                $cek2 = $this->db->query("SELECT nama_ruangan FROM mst_ruangan WHERE nama_ruangan = '$in[nama_ruangan]' AND kode_ruangan != '$where[kode_ruangan]'");
                $cek3 = $this->db->query("SELECT kapasitas_belajar FROM mst_ruangan WHERE kapasitas_belajar = '$in[kapasitas_belajar]' AND kode_ruangan != '$where[kode_ruangan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Ruangan Sudah Digunakan");
					redirect("admin/master/ruangan/ruangan_edit/".$this->input->post("kode_ruangan"));
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Ruangan Sudah Digunakan");
                    redirect("admin/master/ruangan/ruangan_edit/".$this->input->post("kode_ruangan"));
                } else { 	
					$in['aktif_ruangan'] = $this->input->post("aktif_ruangan");
					$this->db->update("mst_ruangan",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Ruangan Berhasil");
					redirect("admin/master/ruangan");	
                }
				
			} else {
				redirect(base_url());
            }
        
	}
	
    public function tahun_ajaran()
	{
		$d['judul'] = "Data Tahun Ajaran";
		$d['tahun_ajaran'] = $this->Master_model->tahun_ajaran();
		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('master/tahun_ajaran');
		$this->load->view('admin/bottom');
	}

	public function tahun_ajaran_tambah()
	{
		$d['judul'] = "Data Tahun Ajaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_tahun_ajaran'] = "";
		$d['tahun_ajaran'] = "";
		$d['semester'] = "";
		$d['aktif_tahun_ajaran'] = "";
		$this->load->view('admin/top', $d);
		$this->load->view('admin/menu');
		$this->load->view('master/tahun_ajaran_tambah');
		$this->load->view('admin/bottom');
	}


	public function tahun_ajaran_edit($id)
	{
		$cek = $this->db->query("SELECT id_tahun_ajaran FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$id'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Tahun Ajaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->tahun_ajaran_edit($id);
			$data = $get->row();
			$d['id_tahun_ajaran'] = $data->id_tahun_ajaran;
			$d['tahun_ajaran'] = $data->tahun_ajaran;
			$d['semester'] = $data->semester;
			$d['aktif_tahun_ajaran'] = $data->aktif_tahun_ajaran;
			$this->load->view('admin/top', $d);
			$this->load->view('admin/menu');
			$this->load->view('master/tahun_ajaran_tambah');
			$this->load->view('admin/bottom');
		} else {
			$this->load->view('admin/top');
			$this->load->view('admin/menu');
			$this->load->view('404');
			$this->load->view('admin/bottom');
		}
	}

	public function tahun_ajaran_hapus($id)
	{
		$this->Master_model->tahun_ajaran_hapus($id);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('admin/Master/tahun_ajaran');
	}

	public function tahun_ajaran_save()
	{
		$tipe = $this->input->post("tipe");
		$in['id_tahun_ajaran'] = $this->input->post("id_tahun_ajaran");
		$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");
		$in['semester'] = $this->input->post("semester");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT id_tahun_ajaran FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$in[id_tahun_ajaran]'");
			$cek2 = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE tahun_ajaran = '$in[tahun_ajaran]'");
			$cek3 = $this->db->query("SELECT semester FROM mst_tahun_ajaran WHERE semester = '$in[semester]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. ID Sudah Digunakan");
				redirect("admin/master/tahun_ajaran_tambah");
			} else {
				$in['aktif_tahun_ajaran'] = $this->input->post("aktif_tahun_ajaran");
				$this->db->insert("mst_tahun_ajaran", $in);
				$this->session->set_flashdata("success", "Tambah Data Berhasil");
				redirect("admin/master/tahun_ajaran");
			}
		} elseif ($tipe = 'edit') {
			$where['id_tahun_ajaran'] 	= $this->input->post('id_tahun_ajaran');
			$cek = $this->db->query("SELECT id_tahun_ajaran FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$in[id_tahun_ajaran]' AND id_tahun_ajaran != '$where[id_tahun_ajaran]'");

			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. ID Sudah Digunakan");
				redirect("admin/master/tahun_ajaran/tahun_ajaran_edit/" . $this->input->post("id_tahun_ajaran"));
			} else {
				$in['aktif_tahun_ajaran'] = $this->input->post("aktif_tahun_ajaran");
				$this->db->update("mst_tahun_ajaran", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Berhasil");
				redirect("admin/master/tahun_ajaran");
			}
		} else {
			redirect(base_url());
		}
	}
    
}