<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class m_film extends CI_Model{
	
	
	function __construct() {
		parent::__construct();
	}
	
	function simpan($kode, $judul, $jenis, $tahun, $image, $durasi){
		$data = array(
			'kd_film'=>$kode,
			'judul'=>$judul,
			'jenis'=>$jenis,
			'tahun_rilis' => $tahun,
			'gambar' => $image,
			'durasi' => $durasi
		);    
		$query = $this->db->insert('tb_film', $data);
		return $query;
	}
	
	function perbarui($kode, $judul, $jenis, $tahun, $image, $durasi){
		$data = array(
			'kd_film'=>$kode,
			'judul'=>$judul,
			'jenis'=>$jenis,
			'tahun_rilis' => $tahun,
			'gambar' => $image,
			'durasi' => $durasi
		);      
		$this->db->where('kd_film', $kode);
		return $this->db->update('tb_film', $data); 
	}
	
	function tampil_kode(){
		$query = $this->db->get('tb_film');
		if($query->num_rows()<1) {
			return 1;
		} else {
			$this->db->last_query();
			return $query->result(); 
		}	
	}
	
	function tampilkan(){
		$query = $this->db->get('tb_film');
		return $query->result();    
		
	}
	
	function get_by_id($id){
		$this->db->where('kd_film', $id);
		$query = $this->db->get('tb_film');
		return $query->result();   
		
	}
	
	function hapus($id){
		$this->db->db_debug = FALSE; // agar debug error pada database tidak ditampilkan dihalaman web
		$this->db->where('kd_film', $id);
		$query = $this->db->delete('tb_film');
		return $query;
	}
}
