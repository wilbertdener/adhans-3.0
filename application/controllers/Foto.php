<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('users_model');
        $this->load->model('foto_model');
        
        //$this->load->model('faculties_model');
    }
    
    public function index(){
        $role = $this->session->userdata();
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            
            $this->load->view('includes/html_header');
            $this->load->view('enviar_foto/enviar_foto1.php',$data);
            $this->load->view('includes/html_footer.php');
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }

    public function foto1_rois_dentro(){
        $role = $this->session->userdata();
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            
            $this->load->view('includes/html_header');
            $this->load->view('enviar_foto/enviar_foto1.php',$data);
            $this->load->view('includes/html_footer.php');
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }

    public function foto2(){
        $role = $this->session->userdata();
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            
            $this->load->view('includes/html_header');
            $this->load->view('enviar_foto/enviar_foto2.php',$data);
            $this->load->view('includes/html_footer.php');
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }
    /*
    public function fotos_upload(){
        
        $usuario_exame_arquivo = json_decode($this->input->post('arquivo_dados'));
        armazenarArquivos($usuario_exame_arquivo->nome_arquivo,$usuario_exame_arquivo->arquivo);
       //$usuario_exame_arquivo = json_decode($this->input->post('usuario_exame_arquivo'));
			//$usuario_exame_arquivo = $this->apoio->deletarCaracteresEspeciais($usuario_exame_arquivo);
            //$usuario_exame_arquivo->id_usuario_autenticacao = $this->session->userdata('id_usuario');
            //$resultado = $this->exames_model->setUsuarioExameArquivo($usuario_exame_arquivo);
        $this->output->set_output(True);
       
    }

    public function armazenarArquivos($nome_arquivo,$arquivo) {
        $arquivo = file_put_contents(__DIR__ ."/../../img/exames/".$nome_arquivo, $arquivo);
    }*/

    public function upload($tempo,$nome_pac='Sem nome'){
        header('Content-Type: application/json'); // Define a resposta como JSON

        // Verifica se um arquivo foi enviado corretamente
        if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] != 0) {
            echo json_encode(['success' => false, 'message' => 'Nenhum arquivo enviado ou erro no upload.']);
            return;
        }

        // Configuração do upload
        $config['upload_path']   = './img/exames/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; // 2MB
        //pega no bd e setar la depois
        $nome = $this->foto_model->get_max_id();
        
        //var_dump($nome.toString());
        $config['file_name']= $nome;

        // Carrega a biblioteca de upload do CodeIgniter
        $this->load->library('upload', $config);
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo enviado
        $nome_completo = $nome . "." . $extensao;
        // Tenta fazer o upload
        if (!$this->upload->do_upload('imagem')) {
            
            echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
        } else {
            $resp = $this->foto_model->set_foto("/adhans/img/exames/". $nome_completo,$tempo);
            if($tempo==1){
                $resp2 = $this->foto_model->set_exame($nome_pac, $nome);
                
            }
            echo json_encode([
                'success' => true, 
                'message' => 'Imagem salva com sucesso!',
                'caminho' => base_url('img/exames/' . $this->upload->data('file_name'))
            ]);
        }
    }
}

?>