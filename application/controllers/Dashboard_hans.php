<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        //$this->load->model('faculties_model');
    }
    
    public function index(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('dashboard/admin_dashboard.php');
        $this->load->view('includes/html_footer_full.php');
            
          

    }

}

?>