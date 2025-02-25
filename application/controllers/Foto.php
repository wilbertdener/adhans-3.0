<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        //$this->load->model('faculties_model');
    }
    
    public function index(){
        
        $role = $this->session->userdata();
        $data['perfil'] =$role ;
        
        $this->load->view('includes/html_header');
        $this->load->view('enviar_fotos/enviar_foto_dashboard.php',$data);
        $this->load->view('includes/html_footer.php');
        
            
          

    }

}

?>