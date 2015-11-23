<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 */
class Login extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'msites', 'mpermissions'));
    }

    public function _loaddata($module, $permission, $bol=false){
        if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
            if($bol) return false;
            redirect(base_url('dashboard'));
        }
		$this->data = NULL;
        $this->data['sites'] = $this->msites->get();
        return true;
	}

    public function index(){
		$this->_loaddata('login', 'read');
        if(!$error = $this->input->get('error'))
        	$error = '';        
        else if($_GET['error'] == 1)
	       	$error = '<code>Password atau username tidak valid.</code><br><br>';
        else
	       	$error = '<code>Anda tidak punya hak akses untuk halaman tersebut.</code><br><br>';
        $this->data['notice'] = $error;
        $this->load->view('login', $this->data);
    }

    public function login_auth($bol = false) {
        if(!$this->_loaddata('login', 'read', $bol)){
            echo "Anda telah login!";
            return;
        }
        $usr = $this->input->post('email');
        $pass = $this->input->post('pass');
        $query = $this->musers->user_auth($usr, $pass);
//        print_r($query);
        if($query) {
            $arryauser = array(
                'user_id'=>$query->user_id,
                'role_id' => $query->role_id,
                'role_name' => $query->role_name,
                'username' => $query->username,
                'pict' => $query->pict,
                'name' => $query->name);
            $this->session->set_userdata($arryauser);
            if($bol) {
                echo "Anda telah masuk kedalam sistem<br><br>";
                return;
            }
            redirect(base_url('dashboard'));
        }
//        print_r($arryauser);
        if($bol){
            echo "<code>Password atau username tidak valid.</code><br><br>";
            return;
        }
        redirect(base_url('login?error=1'));
    }
}
?>
