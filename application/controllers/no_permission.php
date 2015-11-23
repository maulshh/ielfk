<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class No_permission extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('msites'));
    }
	
	public function _loaddata($module, $permission, $bol=false){
		if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
			if($bol) return false;
			redirect(base_url('login?error=k'));
		}
		$this->data = NULL;
		$this->data['menus'] = $this->mmenus->get_menus('admin-satu', $this->session->userdata('role_id'));
		$this->data['sites'] = $this->msites->get(); //data website secara umum

        return true;
    }
	
	public function index(){
		$this->_loaddata();
		$this->data['pages'] = 'No Permission';
		$this->load->view('front/no_permission', $this->data);
	}
}