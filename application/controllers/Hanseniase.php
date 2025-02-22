<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hanseniase extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        $this->load->model('hanseniase_model');
    }
    
    public function index(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('hanseniase/hanseniase_dashboard');
        $this->load->view('includes/html_footer_full.php');
            
          

    }
    public function historia(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;

        $data['historia_texto'] = $this->hanseniase_model->historia_texto();

        $data['historia_img'] = $this->hanseniase_model->historia_img();
        
        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('hanseniase/hanseniase_historia',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }
    public function epidemio(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;

        $data['epidemio_texto'] = $this->hanseniase_model->epidemio_texto();

        $data['epidemio_img'] = $this->hanseniase_model->epidemio_img();
        
        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('hanseniase/hanseniase_epidemio',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }
    public function tipos(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $data['indeterminada_texto'] = $this->hanseniase_model->indeterminada_texto();
        $data['tuberculoide_texto'] = $this->hanseniase_model->tuberculoide_texto();
        $data['dimorfa_texto'] = $this->hanseniase_model->dimorfa_texto();
        $data['virchowiana_texto'] = $this->hanseniase_model->virchowiana_texto();

        $data['indeterminada_img'] = $this->hanseniase_model->indeterminada_img();
        $data['tuberculoide_img'] = $this->hanseniase_model->tuberculoide_img();
        $data['dimorfa_img'] = $this->hanseniase_model->dimorfa_img();
        $data['virchowiana_img'] = $this->hanseniase_model->virchowiana_img();


        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('hanseniase/hanseniase_tipos',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }
    public function sintomas(){
        
        $role = $this->session->userdata('role');
        $data['role'] =$role ;
        
        $data['sintomas_texto'] = $this->hanseniase_model->sintomas_texto();

        $data['sintomas_img'] = $this->hanseniase_model->sintomas_img();

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('hanseniase/hanseniase_sintomas',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }
}

?>