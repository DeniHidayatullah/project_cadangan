<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

	public function cek($in)
	{
		$username = $in['username'];
		$password = $in['password'];

		$q_admin = $this->db->query("SELECT * FROM pgn_admin WHERE username = '$username' AND password = '$password'");
		$guru =  $this->db->query("SELECT * FROM pgn_guru WHERE kode_guru= '$username' AND password = '$password'");
		$siswa =  $this->db->query("SELECT * FROM pgn_siswa WHERE nisn= '$username' AND password = '$password'");


		if ($q_admin->num_rows() > 0) {
			foreach ($q_admin->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = 'admin';
				$this->session->set_userdata($session);
			}
			redirect('admin/home');
		} elseif ($guru->num_rows() > 0) {
			foreach ($guru->result() as $data) {
				$session['username'] = $data->username;
				$session['kode_guru'] = $data->kode_guru;
				$session['nama_guru'] = $data->nama_guru;
				$session['hak_akses'] = 'guru';
				$this->session->set_userdata($session);
			}
			redirect('guru/home');
		} elseif ($siswa->num_rows() > 0) {
			foreach ($siswa->result() as $data) {
				$session['username'] = $data->username;
				$session['kode_siswa'] = $data->kode_siswa;
				$session['nama_siswa'] = $data->nama_siswa;
				$session['hak_akses'] = 'siswa';
				$this->session->set_userdata($session);
			}
			redirect('siswa/home');
		} else {
			$this->session->set_flashdata("error", "Gagal Login. Nip dan Password Salah");
			redirect(base_url('Login'));
		}
	}
	public function update_password($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
