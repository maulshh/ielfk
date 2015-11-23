<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Not_found extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('mmenus', 'msites'));
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

    public function index()
    {
        $this->data['pages'] = 'Not Found';
        $this->data['menus'] = $this->mmenus->get_menus('front-end', $this->session->userdata('role_id'));
        $this->data['sites'] = $this->msites->get();
        $this->data['content'] = $this->load->view('not_found', $this->data, true);
        $this->data['header'] = $this->load->view('front/header', $this->data, true);
        $this->load->view('front/template', $this->data);
    }
}
