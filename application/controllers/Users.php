<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        
    }



    public function setUsuario(){ 
        $usuarioNovo = array(
            "id" => $this->input->post("id"),
            "nome" => $this->input->post("nome"),
            "nome_social" => $this->input->post("nome_Social"),
            "matricula" => $this->input->post("matricula"),
            "login" => $this->input->post("login"),
            "senha" => $this->input->post("senha"),
            "email" => $this->input->post("email"),
            "id_curso" => $this->input->post("id_curso"),
            "data_de_nascimento" => $this->input->post("data_de_nascimento"),
            "telefone" => $this->input->post("telefone"),
            "ativo" => $this->input->post("ativo"),            
        );
        
        $id = $this->users_model->setUsuario($usuarioNovo);
        $result = true;

        $papeis = json_decode($this->input->post("papeis"));
        $result = $result && $this->users_model->setPapel($id, $papeis);
        $this->output->set_output($result);
    }

    public function logout() {
        $array_items = array('id_usuario' => '', 'email' => '', 'nome' => '', 'logado' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect('login');
    }

    public function index(){
        $pagamento = $this->input->get('pagamento');
        if (!$this->apoio->getManutencao()) {
            $data['loginGoogle'] = false;
            $id_usuario_autenticacao_familiar = $this->session->userdata('id_usuario_autenticacao_familiar'); //Se não tiver setado, retorna nulo
            if($this->apoio->autenticarUsuario($id_usuario_autenticacao_familiar)){
                if ($pagamento == '1') {
                    redirect('pagamentos/assinatura?plano=' . $this->input->get('plano'));
                } else {
                    redirect('dashboard');
                }
            }else{
                $data['loginURL'] = $this->google->loginURL();
                $this->load->view('login/html_header_login');
                $this->load->view('login/login',$data);
            }
        }
    }

    public function loginGoogle(){ 
    
        $autent = $this->google->getAuthenticate();
        $gpInfo = $this->google->getUserInfo();
        
        $data['nome'] = $gpInfo['name'];
        $data['email'] = $gpInfo['email'];
        $data['senha'] = json_decode($autent)->access_token;
        $data['codigo'] = '12345'; //Apenas um código aleatório pois é um campo obrigatório no front

        $validado = $this->login_model->validarLoginGoogle($data['email'],$data['senha']);
        
       
        if($validado){
            redirect('dashboard');
            
        }else{
            $data['loginGoogle'] = true;
            $data['loginURL'] = $this->google->loginURL();

            $this->load->view('login/html_header_login');
            $this->load->view('login/login',$data);
            
        }
    } 
      
	public function login($nome=NULL, $email=NULL, $celular=NULL, $via_google=0){
        if($via_google){
            $validado = $this->login_model->validarLoginGoogle($email);
            if($validado){redirect('dashboard');}else{
                //Cadastro do usuario
            }
        }else{
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $validado = $this->login_model->validarLogin($email, $senha);
            // if($validado){$this->monitoramento_usuario_model->setUsuarioLogs($this->session->userdata('id_usuario'));}   
            $this->output->set_output($validado);
        }
    }

    

    public function recuperarSenha(){
        $this->load->view('login/html_header_login');
        $this->load->view('login/recuperar_senha');
    }
    
    public function upload(){
/*
        if(){

        }*/
        
        
        header('Content-Type: application/json'); // Define a resposta como JSON

        // Verifica se um arquivo foi enviado corretamente
        if (!isset($_FILES['imagem'])) {
            echo json_encode(['success' => false, 'message' => 'Nenhum arquivo foi enviado.']);
            return;
        }
        
        if ($_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE   => 'O arquivo excede o limite definido no php.ini.',
                UPLOAD_ERR_FORM_SIZE  => 'O arquivo excede o limite permitido pelo formulário.',
                UPLOAD_ERR_PARTIAL    => 'O upload do arquivo foi interrompido.',
                UPLOAD_ERR_NO_FILE    => 'Nenhum arquivo foi enviado.',
                UPLOAD_ERR_NO_TMP_DIR => 'Pasta temporária ausente.',
                UPLOAD_ERR_CANT_WRITE => 'Falha ao escrever o arquivo no disco.',
                UPLOAD_ERR_EXTENSION  => 'Uma extensão do PHP interrompeu o upload.'
            ];
            $errorMessage = $errorMessages[$_FILES['imagem']['error']] ?? 'Erro desconhecido no upload.';
            
            echo json_encode(['success' => false, 'message' => $errorMessage]);
            return;
        }
        
        // Configuração do upload
        $config['upload_path']   = './img/perfil/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp|webp|tiff|avif|svg|ico';
        $config['max_size']      = 10240; // 2MB
        $config['overwrite'] = TRUE;
        //pega no bd e setar la depois
        $nome = $this->session->userdata()['id'];
        
        //var_dump($nome.toString());
        $config['file_name']= $nome;

        // Carrega a biblioteca de upload do CodeIgniter
        $this->load->library('upload', $config);
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo enviado
        $nome_completo = $nome . "." . $extensao;
        
        // Tenta fazer o upload

        

        if (!$this->upload->do_upload('imagem')) {
            
            echo json_encode(['success' => false, 'message' => $this->upload->display_errors(),'id' => $nome]);
        } else {
            $resp = $this->users_model->updte_foto("/adhans/img/perfil/". $nome_completo);
            
            echo json_encode([
                'success' => true, 
                'message' => 'Imagem salva com sucesso!',
                'caminho' => base_url('/img/perfil/' . $this->upload->data('file_name')),
                'id' => $nome
            ]);
        }
    }

}

?>