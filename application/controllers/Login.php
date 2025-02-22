<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }
    
    public function index(){
		$this->load->view('includes/html_header');
        //
        $data['logo'] = $this->login_model->logo();
		$this->load->view('login',$data);
    }

    

    public function login_user($alerta = null){
        if($this->input->post('entrar') === 'entrar'){
            

            $this->form_validation->set_rules('login','LOGIN','required');
            $this->form_validation->set_rules('senha','SENHA','required|min_length[4]|max_length[45]');
            

            if($this->form_validation->run() === TRUE){
                
                
                //checando se a credencial existe
                $result = $this->login_model->check_login();
                
                switch ($result) {
                    case 'incorrect credentials':
                        
                        //login inválido
                        $alerta = array(
                        "class" => "danger",
                        "mensagem" => "Dados inválidos, senha ou login incorreto."
                        );
                        break;
                    case 'TRUE':
                        $this->login_model->check_login();
                        redirect('dashboard');
                        break;
                    default:
                        //login inválido
                        
                        $alerta = array(
                        "class" => "danger",
                        "mensagem" => "Dados inválidos, cheque seu cadastro."
                        );
                        break;
                }

            }else{
                
                $alerta = array(
                    "class" => "danger",
                    "mensagem" => "Entrada inválida, tente novamente."
                    //.validation_errors()
                );
            }

        }
        
        $dados = array(
            "alerta" => $alerta
		);
		$this->load->view('includes/html_header');
        $this->load->view('login', $dados);
    }

    public function forgot(){

        $alerta = null;

        if($this->input->post('resetar') === 'resetar'){
            //proteção contra ataque de captcha
            if($this->input->post('captcha')) redirect ('login/login_user');

            //Validação do formulário
            $this->form_validation->set_rules('login','LOGIN','required');

            //Checando se a entrada de dados inicial está ok
            if($this->form_validation->run() === TRUE){
           
                //checando se a credencial existe
                $result = $this->login_model->check_forgot();
                
                switch ($result) {
                    case 'FALSE':
                        //usuário inválido
                        $alerta = array(
                        "class" => "danger",
                        "mensagem" => "Função temporariamente inativa, entre em contato com o administrador
                        do sistema: portfoliousp@gmail.com."
                        );
                        break;
                    case 'TRUE':
                        //reset válido
                        redirect('login/reset_success');
                        break;
                    default:
                        //login inválido
                        $alerta = array(
                        "class" => "danger",
                        "mensagem" => "Dados inválidos, cheque seu cadastro."
                        );
                        break;
                }

            }else{
                $alerta = array(
                    "class" => "danger",
                    "mensagem" => "Entrada inválida, tente novamente."
                    //.validation_errors()
                );
            }

        }

        $dados = array(
            "alerta" => $alerta
		);
		$this->load->view('includes/html_header');
        $this->load->view('forgot', $dados);
    }

    public function reset_success(){
        $alerta = array(
            "class" => "success",
            "mensagem" => "Sucesso! Nova senha enviada para seu email."
            );

        $dados['alerta'] = $alerta;
        $dados['voltar'] = 'login';

        $this->load->view('includes/html_header');
        $this->load->view('alert', $dados);
    }   

    public function get_out(){
        $this->session->sess_destroy();
        $this->load->view('includes/html_header');
        $this->load->view('login');
    } 
}