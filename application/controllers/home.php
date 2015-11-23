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
        $this->data['pages'] = 'Beranda';
        $this->_loaddata('front-end', 'read');
        $this->data['beasiswa_post'] = $this->mposts->get_many(array('posts.post_type_id' => '11', 'nodes.status' => 'published'),
            false, 'nodes.created', false, false, 4);
        $this->data['informasi_post'] = $this->mposts->get_many(array('posts.post_type_id' => '7', 'nodes.status' => 'published'),
            false, 'nodes.created', false, false, 3);
        $this->data['event_post'] = $this->mposts->get_many(array('posts.post_type_id' => '3', 'nodes.status' => 'published'),
            false, 'nodes.created', false, false, 3);
        $this->data['news_post'] = $this->mposts->get_many(array('posts.post_type_id' => '2', 'nodes.status' => 'published'),
            false, 'nodes.created', false, false, 3);
        $this->data['content'] = $this->load->view('front/home', $this->data, true);
        $this->load->view('front/template', $this->data);
    }

    public function trial(){
        $this->_loaddata('front-end', 'read');
        $this->load->view('front/trial', $this->data);
    }

    public function empty_func(){
		$this->_loaddata('empty_func', 'read');
		$this->load->view('empty_view', $this->data);
    }
}