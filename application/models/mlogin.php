<?php if (!defined('BASEPATH')) exit ('no direct script access allowed');

class mlogin extends CI_Model{
    
    
    function __construct() {
        parent::__construct();        
    }
    
    function login($username, $password){

        // cek di tb_customer
        $this->db->where('username', $username);
        $this->db->where('pass', $password); 
        $this->db->limit(1);
        $query = $this->db->get('tb_customer');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
        // cek di tb_admin
            $this->db->where('username', $username);
            $this->db->where('pass', $password); 
            $this->db->limit(1);
            $query = $this->db->get('tb_admin');
            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return FALSE;
            }
        }
    }
}