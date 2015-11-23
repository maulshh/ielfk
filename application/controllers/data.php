<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'msites'));
        $this->load->library('zip');
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
        $this->_loaddata('admin-satu', 'read');
        $this->data['pages'] = 'Data';
        $this->data['content'] = $this->load->view('data', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function import_tables($cat){
        $this->_loaddata('admin-satu', 'read');
        $target = DOC_ROOT."db/import/";
        $no_error = true;
        if($cat == "formulir")
            $tables = array('users' => 0, 'formulir' => 1, 'data_diri' => 2);
        else if($cat == 'jurusan')
            $tables = array('fakultas' => 0, 'jurusan' => 1, 'biaya_pendidikan' => 2);
        else if($cat == 'mahasiswa')
            $tables = array('users' => 0, 'data_diri' => 1, 'mahasiswa' => 2, 'formulir' => 3);
        else
            $tables = array($cat => 0);
        $uploads = array();
        for($i=0; $i<count($_FILES["file"]["type"]); $i++){
            $name = end(explode('-', $_FILES["file"]["name"][$i]));
            $nama = explode('.',$name);
            $target_dir = $target.$nama[0].time().".txt";
            if (($_FILES["file"]["name"][$i] != '')
                && ($_FILES["file"]["size"][$i] < 600000)
                && move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_dir)) {
            } else{
                $no_error = false;
                break;
            }
            $urutan = $tables[$nama[0]];
            $uploads[$urutan]['target'] = $target_dir;
            $uploads[$urutan]['name'] = $nama[0];
        }
        foreach($uploads as $upload){
            if(!$this->msites->import($upload['target'], $upload['name'])){
                $no_error = false;
                $er = $upload['name'];
                break;
            }
        }
        if($no_error){
            echo "<script>alert('import berhasil!');";
            echo "history.go(-1);</script>";
        } else {
            echo "<script>alert('import gagal pada tabel $er!');";
            echo "history.go(-1);</script>";
        }
    }

    public function export($cat){
        $this->_loaddata('admin-satu', 'read');
        if($cat == "formulir") {
            $tables = array('users', 'formulir', 'data_diri');
            $where = array(
                'users' => "role_id = 0",
                'formulir' => "sudah = 1 AND tahun_ajaran_id = ".TAHUN_AJARAN,
                'data_diri' => 1,
            );
        }
        else if($cat == 'jurusan'){
            $tables = array('fakultas', 'jurusan', 'biaya_pendidikan');
            $where = array(
                'fakultas' => 1,
                'jurusan' => 1,
                'biaya_pendidikan' => 1,
            );
        }
        else if($cat == 'mahasiswa') {
            $tables = array('users', 'formulir', 'mahasiswa', 'data_diri');
            $where = array(
                'users' => "role_id = 4",
                'formulir' => "sudah = 1",
                'mahasiswa' => 1,
                'data_diri' => 1,
            );
        }
        else if($cat == 'dosen') {
            $tables = array('users', 'dosen', 'data_diri');
            $where = array(
                'users' => "role_id = 3",
                'dosen' => 1,
                'data_diri' => 1,
            );
        } else{
            $tables = array($cat);
            $where = array($cat => 1);
        }
        foreach($tables as $table) {
            if ($name = $this->msites->export($table, $where[$table])) {
                $type = $this->input->post('type') ? $this->input->post('type') : "csv";
                $content = file_get_contents($name); // Read the file's contents
                $name = "$table." . $type;
                $this->zip->add_data($name, $content);
            } else{
                echo "<script>alert('export gagal!');";
                echo "history.go(-1);</script>";
            }
        }
        $this->zip->download($cat.'.zip');
    }

    public function empty_func(){
        $this->_loaddata('empty_func', 'read');
        $this->load->view('empty_view', $this->data);
    }
}