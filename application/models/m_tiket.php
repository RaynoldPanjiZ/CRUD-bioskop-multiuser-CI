<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class m_tiket extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function tampil_kode(){
        $query = $this->db->get('tb_tiket');
        if($query->num_rows()<1) {
            return 1;
        } else {
            $this->db->last_query();
            return $query->result(); 
        }
    }
    
    function get_by_id($id){
        $this->db->where('kd_tiket', $id);
        $query = $this->db->get('tb_tiket');
        return $query->result();
    }
    
    function tampilkan() {
        $query = $this->db->select('*');
        $query = $this->db->from('tb_tiket');
        $query = $this->db->join('tb_jadwal', 'tb_tiket.kd_jadwal = tb_jadwal.kd_jadwal', 'inner');
        $query = $this->db->join('tb_film', 'tb_jadwal.kd_film = tb_film.kd_film', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    function cek_by_user($id_user) {
        $this->db->where('id_user', $id_user);
        return $this->tampilkan();
    }

    function simpan($kode, $id_user, $kd_jadwal, $jum_tiket, $tot_harga){
        $data = array(
            'kd_tiket'=>$kode,
            'id_user'=>$id_user,
            'kd_jadwal'=>$kd_jadwal,
            'jum_tiket' => $jum_tiket,
            'tot_harga' => $tot_harga
        );    
        $query = $this->db->insert('tb_tiket', $data);    
        return $query;
    }
    
    function hapus($id){
        $this->db->where('kd_tiket', $id);
        $query = $this->db->delete('tb_tiket');
        return $query;
    }
    
}
