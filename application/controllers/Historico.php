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
        
        if($this->session->userdata('logged_in')){
            $role = $this->session->userdata();
            $data['exames'] =$this->historico_model->get_exames();
            $data['fotos'] =$this->historico_model->get_fotos_by_usuario();
            
            
            
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