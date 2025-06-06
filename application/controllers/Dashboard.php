<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        //$this->load->model('faculties_model');
        //$this->lang->load('geral_lang');
    }
    
    public function index(){
        $role = $this->session->userdata();
        
        
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            
            $foto=$this->users_model->get_foto();
            $this->load->view('includes/html_header',$foto);
            $this->load->view('dashboard/dashboard.php',$data);
            $this->load->view('includes/html_footer.php');
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
            
            
          

    }

}

?>