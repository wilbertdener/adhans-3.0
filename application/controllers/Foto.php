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

            $foto=$this->users_model->get_foto();
            $this->load->view('includes/html_header',$foto);
            $this->load->view('enviar_foto/enviar_foto.php',$data);
            $this->load->view('includes/html_footer.php');
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }

    public function definir_roi($id,$foto='0'){

        if($foto=='0'){
            $ids_fotos=[intval($id)-1,intval($id)];
        }else{
            $ids_fotos=[intval($id),intval($id)+1];
        }
        
        $role = $this->session->userdata();
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            
            $data['foto'] =$this->foto_model->get_fotos_by_id($ids_fotos[$foto]);
            
            
            $foto=$this->users_model->get_foto();
            $this->load->view('includes/html_header',$foto);
            $this->load->view('enviar_foto/definir_roi.php',$data);
            $this->load->view('includes/html_footer.php');
            
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }

    public function resultado($foto=null){

        
        $role = $this->session->userdata();
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            $data['foto'] =$this->foto_model->get_exame_by_id_foto($foto);
            
            
            $foto=$this->users_model->get_foto();
            $this->load->view('includes/html_header',$foto);
            $this->load->view('enviar_foto/resultado.php',$data);
            $this->load->view('includes/html_footer.php');
            
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }


    public function upload($tempo,$nome_pac='Sem nome'){
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
        $config['upload_path']   = './img/exames/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp|webp|tiff|avif|svg|ico';
        $config['max_size']      = 10240; // 2MB
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
            
            echo json_encode(['success' => false, 'message' => $this->upload->display_errors(),'id' => $nome]);
        } else {
            $resp = $this->foto_model->set_foto("/adhans/img/exames/". $nome_completo,$tempo);
            if($tempo==1){
                $resp2 = $this->foto_model->set_exame($nome_pac, $nome);
                
            }
            echo json_encode([
                'success' => true, 
                'message' => 'Imagem salva com sucesso!',
                'caminho' => base_url('img/exames/' . $this->upload->data('file_name')),
                'id' => $nome
            ]);
        }
    }

    public function atualizaexame() {
        // Verifica se o valor foi enviado via POST
        $valor = $this->input->post('valor');
        $id = $this->input->post('id');
    
        // Verifica se o valor não está vazio
        if ($valor) {
            $result = $this->foto_model->update_exame($id,$valor);
            echo json_encode(true);
        } else {
            // Caso não tenha valor, retornamos FALSE
            echo json_encode(false);
        }
    }


    public function teste(){
        $role = $this->session->userdata();
        $data['foto'] =$this->foto_model->get_fotos_by_id(1);
        
        $coordenadas = $data['foto'];
        if ($coordenadas) {
            // Converter para um formato JSON para fácil uso no JS
            $data['coordenadas'] = json_encode([$coordenadas->Roi_dentro1, $coordenadas->Roi_dentro2, $coordenadas->Roi_dentro3, $coordenadas->Roi_fora1, $coordenadas->Roi_fora2, $coordenadas->Roi_fora3]);
        } else {
            $data['coordenadas'] = json_encode([]);  // Caso não haja coordenadas no banco
        }
        
        
        if($this->session->userdata('logged_in')){
            $data['perfil'] =$role ;
            $data['id_foto'] ='1' ;

            $foto=$this->users_model->get_foto();
            $this->load->view('includes/html_header',$foto);
            $this->load->view('enviar_foto/teste.php',$data);
            $this->load->view('includes/html_footer.php');
            #$this->login_model->logout();
            
        }else{
            redirect('login');
        }
       
    }

    public function rois_definidos() {
        
        // Recebe os dados enviados pelo AJAX
        $post_data = json_decode(file_get_contents("php://input"), true);
    
        // Verifica se as coordenadas foram enviadas
        if (!isset($post_data['coordenadas']) || empty($post_data['coordenadas'])) {
            echo json_encode(["status" => "erro", "mensagem" => "Nenhuma coordenada recebida!"]);
            return;
        }

        if (!isset($post_data['id_foto']) || empty($post_data['id_foto'])) {
            echo json_encode(["status" => "erro", "mensagem" => "Nenhuma usuario vinculado!"]);
            return;
        }

        $vetor_coordenadas = [];

        // Percorre todas as coordenadas recebidas
        foreach ($post_data['coordenadas'] as $coordenada) {
            // Extrai "x" e "y"
            $x = intval($coordenada['x']);
            $y = intval($coordenada['y']);

            // Cria a string no formato "x;y" e adiciona ao vetor
            $vetor_coordenadas[] = $x . ';' . $y;
        }
        //dimensao: dimensao
        $result = $this->foto_model->update_coordenadas_foto($post_data['id_foto'], $vetor_coordenadas,$post_data['dimensao']);
        
        echo json_encode(["status" => "sucesso", "mensagem" => "coordenadas salva"  ]);
        //$post_data['coordenadas']
        //$post_data['id_foto']
    
        // Pegando ID do usuário logado (se aplicável)
        //$session = $this->session->userdata();
        //$id_usuario = $session['id'];
        /*
        // Inserindo coordenadas no banco
        foreach ($post_data['coordenadas'] as $coordenada) {
            $data = [
                "id_usuario" => $id_usuario,
                "x" => $coordenada['x'],
                "y" => $coordenada['y']
            ];
            $this->db->insert("coordenadas", $data);
        }
    
        echo json_encode(["status" => "sucesso", "mensagem" => "Coordenadas salvas!"]);
        
        $date['perfil'] =$role ;
        $date['id_foto'] ='1' ;

        var_dump($data);
        var_dump($id_foto);
        $foto=$this->users_model->get_foto();
        $this->load->view('includes/html_header',$foto);
        $this->load->view('enviar_foto/teste.php',$date);
        $this->load->view('includes/html_footer.php');*/
    }

}

?>