<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Login extends CI_Controller{
    function __construct(){ 
        parent::__construct();
        $this->load->model('M_login');
    }
    function index(){
        $this->load->view('login');
    }
    function login_api(){
        $result['error'] = TRUE;
        $user=$this->M_login->cek_login($_POST['username'],md5($_POST['password'])); 
        if($user != NULL){
            $result=$user;
            $result['error'] = false;
            $result['msg'] = 'Selamat Datang, '.$user['username'];
        }else{
            $result['msg'] = 'Tidak ditemukan username';
        }
        echo json_encode($result);
    }
}
