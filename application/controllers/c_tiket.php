<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_tiket extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('m_tiket');
    $this->load->model('m_jadwal');
  }

  public function tambah() {
    $kd_tiket = $this->input->post('kd_tiket');
    $id_user = $this->input->post('id_user');
    $kd_jadwal = $this->input->post('kd_jadwal');
    $jum_tiket = $this->input->post('jum_tiket');

    // tampil harga dari data jadwal berdasarkan $kd_jadwal
    $harga =  $this->m_jadwal->CariHarga($kd_jadwal);
    $tot_harga = $jum_tiket * $harga;

    if ($this->input->post('kd_tiket')==''){
        echo "<script>alert('Ups, kd_tiket Masih Kosong !'); history.go(-1);</script>";   
    } else if ($this->input->post('id_user')=='') {
        echo "<script>alert('Ups, id_user Masih Kosong !'); history.go(-1);</script>";   
    } else if ($this->input->post('kd_jadwal')=='') {
        echo "<script>alert('Ups, kd_jadwal Masih Kosong !'); history.go(-1);</script>";   
    } else if ($this->input->post('jum_tiket')=='') {
        echo "<script>alert('Ups, jum_tiket Masih Kosong !'); history.go(-1);</script>";   
    } else if ($tot_harga==0 || $tot_harga==null) {
        echo "<script>alert('Ups, tot_harga Masih Kosong !'); history.go(-1);</script>";   
    } else {
        // Simpan Data
        $result = $this->m_tiket->simpan($kd_tiket, $id_user, $kd_jadwal, $jum_tiket, $tot_harga);
      if ($result){
          echo "<script>alert('Data tiket Berhasil disimpan !'); history.go(-1)</script>"; 
          header('location:../path/data_tiket');
      } else {
          echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   
      }   
    }
  }
        
  function delete() {
      $this->m_tiket->hapus($this->uri->segment(3));
      redirect('path/data_tiket');    
  }
}
