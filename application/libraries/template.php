<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Alowed');

class template{
    
    protected $_ci;
    function __construct() {
        
        $this->_ci=&get_instance();
    }
    
    function display($template, $data=NULL){
        $data['_content'] = $this->_ci->load->view($template, $data, TRUE);

        $data['_header_admin'] = $this->_ci->load->view('/admin/header', $data, TRUE);
        $data['_menu_admin'] = $this->_ci->load->view('/admin/menu', $data, TRUE);
        $data['_footer_admin'] = $this->_ci->load->view('/admin/footer', $data, TRUE);
        $this->_ci->load->view('/admin/vutama.php',$data, TRUE);
        
        $data['_header_customer'] = $this->_ci->load->view('/customer/header', $data, TRUE);
        $data['_menu_customer'] = $this->_ci->load->view('/customer/menu', $data, TRUE);
        $data['_footer_customer'] = $this->_ci->load->view('/customer/footer', $data, TRUE);
        $this->_ci->load->view('/customer/vutama.php',$data, TRUE);
    }

}
