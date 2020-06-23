<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_admin_model extends CI_Model
{


    public function admin()
    {
        $q = $this->db->query("SELECT * FROM pgn_admin");
        return $q;
    }


    public function admin_detail($id)
    {
        return $this->db->get_where('pgn_admin', ['id' => $id])->row_array();
    }

    public function admin_edit($id)
    {
        $q = $this->db->query("SELECT * FROM pgn_admin WHERE id = '$id'");
        return $q;
    }
    public function hapusdata($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pgn_admin');
    }
}
