<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function buatkode($nomor_terakhir, $kunci, $jumlah_karakter = 0) {

    $nomor_baru = intval(substr($nomor_terakhir, strlen($kunci))) + 1;
    $nomor_baru_plus_nol = str_pad($nomor_baru, $jumlah_karakter, "0", STR_PAD_LEFT);
    $kode = $kunci . $nomor_baru_plus_nol;
    return $kode;
}

