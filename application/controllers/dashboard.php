<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mposts', 'msites'));
    }

	public function _loaddata($module, $permission, $bol=false){
		if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
			if($bol) return false;
			redirect(base_url('login?error=k'));
		}
		$this->data = NULL;
        $this->data['menus'] = $this->mmenus->get_menus('admin-page', $this->session->userdata('role_id'));
        $this->data['sites'] = $this->msites->get();
		return true;
	}
	
	public function index(){
		$this->_loaddata('admin-page', 'read');
		$this->data['pages'] = 'Dashboard';
		$this->data['content'] = $this->load->view('dashboard', $this->data, true);
		$this->load->view('template', $this->data);
	}
    
    public function empty_func(){
		$this->_loaddata('empty_func', 'read');
		$this->load->view('empty_view', $this->data);
    }
}