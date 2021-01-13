<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_film extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_film');
	}
	
	public function tambah() {
		$kode = $this->input->post('kd_film');
		$judul = $this->input->post('judul');
		$jenis = $this->input->post('jenis');
		$tahun = $this->input->post('tahun');
		$image = $this->uploadImage("img-".$kode);
		$durasi = $this->input->post('durasi');

		if ($this->input->post('kd_film')==''){
				echo "<script>alert('Ups, kd_film Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('judul')==''){
				echo "<script>alert('Ups, judul Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('tahun')==''){
				echo "<script>alert('Ups, tahun Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('durasi')==''){
				echo "<script>alert('Ups, durasi Masih Kosong !'); history.go(-1);</script>";   
		} else {
			// Simpan Data
			$result = $this->m_film->simpan($kode, $judul, $jenis, $tahun, $image, $durasi);
			if ($result){
				echo "<script>alert('Data film Berhasil disimpan !'); history.go(-1)</script>";    
				header('location:../path/data_film');
			} else {
				echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   
			}   
		}
	}
				
	public function perbarui() {
		$kode = $this->input->post('kd_film');
		$judul = $this->input->post('judul');
		$jenis = $this->input->post('jenis');
		$tahun = $this->input->post('tahun');

		// cek jika gambar tidak diinput
		if (empty($_FILES["gambar"]["name"])) {
			$image = $this->input->post('old_image');
		} else {
			$image = $this->uploadImage("img-".$kode);
		}

		$durasi = $this->input->post('durasi');

		if ($this->input->post('kd_film')==''){
				echo "<script>alert('Ups, kd_film Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('judul')==''){
				echo "<script>alert('Ups, judul Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('tahun')==''){
				echo "<script>alert('Ups, tahun Masih Kosong !'); history.go(-1);</script>";   
		} else if ($this->input->post('durasi')==''){
				echo "<script>alert('Ups, durasi Masih Kosong !'); history.go(-1);</script>";   
		} else {
					// Simpan Data
			$result = $this->m_film->perbarui($kode, $judul, $jenis, $tahun, $image, $durasi);
			if ($result) {
				echo "<script>alert('Data film Berhasil diperbarui !'); history.go(-1)</script>";  
				echo "<meta http-equiv='refresh' content='0; url=../path/data_film'>";
			} else {
				echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   
			}   
		}
	}
 
	function delete() {
		$id = $this->uri->segment(3);
        $this->_deleteImage($id);
				
		if ($this->m_film->hapus($id)) {
			redirect('path/data_film');  
		} else {
		/* jika data tabel yang di relasikan sebagai foreign key memiliki record, maka akan error jika dihapus */
			echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
		}  
	}

	
	/*	Upload file gambar ke folder upload/film */
	public function uploadImage($image) {
		$config['upload_path']          = './upload/film/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $image;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		// buat library upload untuk menyimpan data config gambar
		$this->load->library('upload', $config);

		// cek sekaligus menyimpan gambar
		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		} else {
			// jika tidak terupload/tersimpan maka nama file menjadi default.jpg
			return "default.jpg";
		}
	}

	/*	hapus file gambar pada folder upload/film	*/
	private function _deleteImage($id) {
		$film = $this->m_film->get_by_id($id)[0];
		// print_r($film);
		// echo $film->gambar;

		// cek apakah file bernama default.jpg
		if ($film->gambar != "default.jpg") {
			// jika tidak maka hapus file gambar
			unlink(FCPATH."upload/film/".$film->gambar);
		}
	}
}
