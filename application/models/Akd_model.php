<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akd_model extends CI_Model {

    
public function akd_jadwal($id_tahun_ajaran)
{
    $kode_kelas = $this->uri->segment(5);
    $q = $this->db->query("SELECT a.*, e.nama_kelas, b.nama_mapel, c.nama_guru, d.nama_ruangan FROM akd_jadwal_pelajaran a 
    JOIN akd_mapel b ON a.kode_mapel=b.kode_mapel
      JOIN pgn_guru c ON a.kode_guru=c.kode_guru 
        JOIN mst_ruangan d ON a.kode_ruangan=d.kode_ruangan
          JOIN mst_kelas e ON a.kode_kelas=e.kode_kelas 
          where a.kode_kelas='$kode_kelas' AND a.id_tahun_ajaran='$id_tahun_ajaran' ORDER BY a.kode_jadwal_pelajaran DESC");
    return $q;
}



}