<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_jadwal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_jadwal');
	}

	public function tambah() {
		$kode = $this->input->post('kode');
		$kd_studio = $this->input->post('kd_studio');
		$kd_film = $this->input->post('kd_film');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$harga = $this->input->post('harga');

		if ($this->input->post('kode')==''){
				echo "<script>alert('Ups, kode Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('kd_studio')=='') {
				echo "<script>alert('Ups, kd_studio Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('kd_film')=='') {
				echo "<script>alert('Ups, kd_film Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('tanggal')=='') {
				echo "<script>alert('Ups, tanggal Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('jam')=='') {
				echo "<script>alert('Ups, jam Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('harga')=='') {
				echo "<script>alert('Ups, harga Masih Kosong !'); history.go(-1);</script>";   
		} else {
				// Simpan Data
				$result = $this->m_jadwal->simpan($kode, $kd_studio, $kd_film, $tanggal, $jam, $harga);
			if ($result){
					echo "<script>alert('Jadwal Tayang Berhasil disimpan !'); history.go(-1)</script>"; 
					header('location:../path/data_jadwal');
			} else {
					echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   
	 		}   
		}
	}
				
	public function perbarui() {
		$kode = $this->input->post('kode');
		$kd_studio = $this->input->post('kd_studio');
		$kd_film = $this->input->post('kd_film');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$harga = $this->input->post('harga');

		if ($this->input->post('kode')==''){
				echo "<script>alert('Ups, kode Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('kd_studio')=='') {
				echo "<script>alert('Ups, kd_studio Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('kd_film')=='') {
				echo "<script>alert('Ups, kd_film Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('tanggal')=='') {
				echo "<script>alert('Ups, tanggal Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('jam')=='') {
				echo "<script>alert('Ups, jam Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('harga')=='') {
				echo "<script>alert('Ups, harga Masih Kosong !'); history.go(-1);</script>";   
		} else {
			// Simpan Data
			$result = $this->m_jadwal->perbarui($kode, $kd_studio, $kd_film, $tanggal, $jam, $harga);
			if ($result){
					echo "<script>alert('Jadwal Tayang Berhasil diperbarui !'); history.go(-1)</script>";  
					echo "<meta http-equiv='refresh' content='0; url=../path/data_jadwal'>";
			} else {
					echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   
			}   
		}
	}
 
	function delete() {
		$r = $this->m_jadwal->hapus($this->uri->segment(3));
		// cek hasil query
		if ($r) {
			redirect('path/data_jadwal');    
		} else {
		/* jika data tabel yang di relasikan sebagai foreign key memiliki record, maka akan error jika dihapus */
			echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !\\n\\nSaat ini Customer sedang memesan jadwal tersebut !!'); history.go(-1)</script>";
		}
	}
}
