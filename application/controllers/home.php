<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mposts', 'msites'));
    }

    public function _loaddata($module, $permission, $bol=false){
        if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
            if($bol) return false;
            redirect(base_url('no_permission'));
        }
        $this->data['sites'] = $this->msites->get();
        $data['site_menus'] = $this->mmenus->get_menus('site-menu', $this->session->userdata('role_id'));
        $this->data['menus'] = $this->mmenus->get_menus('front-end', $this->session->userdata('role_id'));
        $this->data['header'] = $this->load->view('front/header', $this->data, true);
        $this->data['footer'] = $this->load->view('front/footer', $data, true);
        return true;
	}

    public function index(){
        $this->load->view('front/home');
    }

    public function empty_func(){
		$this->_loaddata('empty_func', 'read');
		$this->load->view('empty_view', $this->data);
    }
}