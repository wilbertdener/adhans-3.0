<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acompanhamento extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        $this->load->model('acompanhamento_model');
    }
    
    public function index(){
        
        $role = $this->session->userdata('id');
        $data['id_user'] =$role ;
        
        $data['pacientes'] =$this->acompanhamento_model->get_pac($role);
        $data['historico'] =$this->acompanhamento_model->get_hist();
        $data['teste'] = Null;

        $this->load->view('includes/html_header');
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('acompanhamento/acompanhamento_list',$data);
        $this->load->view('includes/html_footer_full.php');
            
          

    }

    
    



    public function setfoto(){
        
        $data['id_pac'] = $this->input->post('id_paciente');
        $data['local'] = $this->input->post('id_local');
        $data['resumo'] = $this->input->post('id_resumo');
        $data['status'] = $this->input->post('id_status');
        $data['comentario'] = $this->input->post('id_comentario');
        $data['exame'] = $this->input->post('id_exame');
        $data['data'] = date("Y-m-d H:i:sa");
        $data['id_usuario'] = $this->input->post('id_med');
        

        $this->acompanhamento_model->set_foto($data);
    }

    public function setuser(){
        
        $data['nome'] = $this->input->post('id_nome');
        $data['data_nasc'] = $this->input->post('id_data');
        $data['cod'] = $this->input->post('id_cod');
        
        $data['id_usuario'] = $this->input->post('id_med');
        $data['data'] = date("Y-m-d H:i:sa");

        $this->acompanhamento_model->set_user($data);
    }

    public function updateuser(){
        
        $nome = $this->input->post('id_nome');
        $data = $this->input->post('id_data');
        $cod = $this->input->post('id_cod');
        $newcod = $this->input->post('id_new_cod');
        
        

        $this->acompanhamento_model->update_user($nome,$data,$cod,$newcod);
    }
    
    public function addNewDocument($extension, $name, $quest='0', $folder='uploads'){
        //$this->output->set_output($name);
        $file = $this->input->raw_input_stream;
        $name = urldecode($name); //Usar caracteres ç,~,´,`
        $docName = $name.$extension;

        //if($quest == '0'){ //Não é um questionario
            //Carregar o documento para pasta do servidor
            file_put_contents(__DIR__ ."/../".$folder."/".$docName, $file);
            
            //Carregar dados do documento para banco de dados
            //----------------
            //Nome do documento salvo
            $data['name'] = $docName;

            //Data do upload
            date_default_timezone_set('America/Sao_Paulo');
            $data['uploaded_on'] = $today = date("Y-m-d H:i:s");

            //Nome que será mostrado
            $nameFull = explode("_", $name);
            $data['nameShown'] = $nameFull[sizeof($nameFull) - 1];

            $data['extension'] = $extension;
            
            //Subir para o banco
            $result = $this->acompanhamento_model->uploadFile($data);
        
    }


}

?>