<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
    }
    
    public function index(){
        $lista = $this->users_model->retornaId($this->session->userdata('id'));
        $dados = array("usuario" => $lista);
        $id = $this->session->userdata('id');
        $data = $this->login_model->getuser($id);

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        if($data->papel=="admin"){
            $this->load->view('user/usuarioAdmin.php',$data);
        }else{
            $this->load->view('user/usuarioProfile.php',$data);
        }
        
        $this->load->view('includes/html_footer_full.php');
    }

    public function setuser(){
        
        $data['login'] = $this->input->post('id_login');
        $data['senha'] = $this->input->post('id_senha');
        $data['email'] = $this->input->post('id_email');
        $data['nome'] = $this->input->post('id_nome');
        $data['nome_social'] = $this->input->post('id_nomesoc');
        $data['data_de_nascimento'] = $this->input->post('id_data');
        
        $data['papel'] = $this->input->post('id_papel');
        $data['ativo'] = 1;

        $this->users_model->set_user($data);



        

    }
}

?>