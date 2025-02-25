<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        $this->load->model('historico_model');
        //$this->load->model('faculties_model');
    }
    
    public function index(){
        #$this->login_model->logout();
        $role = $this->session->userdata();
        if($role['logged_in']){
            $role = $this->session->userdata();
            $data['exames'] =$this->historico_model->get_exames();
            
            $this->load->view('includes/html_header.php');
            $this->load->view('historico/historico_dashboard.php',$data);
            $this->load->view('includes/html_footer.php');
            
            
        }else{
            redirect('login');
        }
         
    }
    public function teste(){
        
            $this->load->view('historico/teste');
            
            
            
       
         
    }

}

?>