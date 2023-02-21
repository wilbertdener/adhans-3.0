<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnostico extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        $this->load->model('diagnostico_model');
    }
    
    public function index(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('diagnostico/diagnostico_dashboard');
        $this->load->view('includes/html_footer_full.php');
            
          

    }

    public function forca(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('diagnostico/diagnostico_forca');
        $this->load->view('includes/html_footer_full.php');
            
          

    }

    public function histamina(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $data['endo_texto'] = $this->diagnostico_model->histamina_endo_texto();
        $data['exo_texto'] = $this->diagnostico_model->histamina_exo_texto();

        $data['endo_img'] = $this->diagnostico_model->histamina_endo_img();
        $data['exo_img'] = $this->diagnostico_model->histamina_exo_img();

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('diagnostico/diagnostico_histamina', $data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }

    public function sens(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $data['termica_texto'] = $this->diagnostico_model->sens_termica_texto();
        $data['dolorosa_texto'] = $this->diagnostico_model->sens_dolorosa_texto();
        $data['tatil_texto'] = $this->diagnostico_model->sens_tatil_texto();

        $data['termica_img'] = $this->diagnostico_model->sens_termica_img();
        $data['dolorosa_img'] = $this->diagnostico_model->sens_dolorosa_img();
        $data['tatil_img'] = $this->diagnostico_model->sens_tatil_img();

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('diagnostico/diagnostico_sens',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }

    public function sudoral(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $data['sudoral_texto'] = $this->diagnostico_model->sudoral_texto();

        $data['sudoral_img'] = $this->diagnostico_model->sudoral_img();

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('diagnostico/diagnostico_sudoral',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }

}

?>