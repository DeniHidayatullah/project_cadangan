<?php

class Diagram_model extends CI_Model
{


    public function lingkaran()
    {
        return $this->db->query('select jenis_kelamin,count(*) as jumlah from pgn_siswa GROUP BY jenis_kelamin')->result_array();
    }
    public function batang()
    {
    }

    public function kelas()
    {
        return $this->db->query('SELECT count(*) as total FROM mst_kelas')->result_array();
    }
    public function jurusan()
    {
        return $this->db->query('SELECT count(*) as total FROM mst_jurusan')->result_array();
    }
    public function guru()
    {
        return $this->db->query('SELECT count(*) as total FROM pgn_guru')->result_array();
    }
    public function siswa()
    {
        return $this->db->query('SELECT count(*) as total FROM pgn_siswa')->result_array();
    }
}
