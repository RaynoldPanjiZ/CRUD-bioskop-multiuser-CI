<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class m_jadwal extends CI_Model{
	
	
	function __construct() {
		parent::__construct();
	}
	
	function tampil_kode(){
		$query = $this->db->get('tb_jadwal');
		if($query->num_rows()<1) {
			return 1;
		} else {
			$this->db->last_query();
			return $query->result(); 
		}
	}
	
	function tampilkan(){
		$query = $this->db->select('*');
		$query = $this->db->from('tb_jadwal');
		$query = $this->db->join('tb_studio', 'tb_jadwal.kd_studio = tb_studio.kd_studio', 'inner');
		$query = $this->db->join('tb_film', 'tb_jadwal.kd_film = tb_film.kd_film', 'inner');
		$query = $this->db->get();
		return $query->result();    
	}
	
	function get_by_id($id){
        $this->db->where('kd_jadwal', $id);
        $query = $this->db->get('tb_jadwal');
        return $query->result();      
    }

	function CariHarga($jadwal) {
		$query = $this->db->select('harga');
		$query = $this->db->from('tb_jadwal');
		$query = $this->db->where('kd_jadwal', $jadwal);
		$query = $this->db->get();
		return $query->row()->harga;  	
	}
	
	function tampil_studio(){    
        $query = $this->db->get('tb_studio');
        return $query->result();    
    }
	
	function simpan($kode, $kd_studio, $kd_film, $tanggal, $jam, $harga){
		$data = array(
			'kd_jadwal'=>$kode,
			'kd_studio'=>$kd_studio,
			'kd_film'=>$kd_film,
			'tanggal'=>$tanggal,
			'jam'=>$jam,
			'harga'=>$harga
		);    
		$query = $this->db->insert('tb_jadwal', $data);
		return $query;
	}
	
	function perbarui($kode, $kd_studio, $kd_film, $tanggal, $jam, $harga){
		 $data = array(
			'kd_jadwal'=>$kode,
			'kd_studio'=>$kd_studio,
			'kd_film'=>$kd_film,
			'tanggal'=>$tanggal,
			'jam'=>$jam,
			'harga'=>$harga
		);      
		$this->db->where('kd_jadwal', $kode);
		return $this->db->update('tb_jadwal', $data); 
	}
	
	function hapus($id){
		$this->db->db_debug = FALSE;
		$this->db->where('kd_jadwal', $id);
		$query = $this->db->delete('tb_jadwal');
		return $query;
	}	
}
