<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('offerings_model');
        $this->load->model('faculties_model');
    }

    public function index(){
        $role = $this->session->userdata('role'); //Verificar se está correto fazer assim!!!

        switch ($role){
            case '1':
                $papel = $this->uri->segment(3);
                $lista = $this->users_model->getUsuarios($papel);
                $dados = array("usuarios" => $lista);
                $dados['papeis'] = $this->users_model->getPapeis();
                $this->load->view('includes/html_header');
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view("user/user_list", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;
            case '2':
                $papel = $this->uri->segment(3);
                $lista = $this->users_model->getUsuarios($papel);
                $dados = array("usuarios" => $lista);
                $dados['papeis'] = $this->users_model->getPapeis();
                $this->load->view('includes/html_header');
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view("user/user_list", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;

            case '3':
                $papel = $this->uri->segment(3);
                $lista = $this->users_model->getUsuarios($papel);
                $dados = array("usuarios" => $lista);
                $dados['papeis'] = $this->users_model->getPapeis();
                $this->load->view('includes/html_header');
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view("user/user_list", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;
            
            default:
                $this->load->view('errors/permission_denied');
                break;
        }
    }

    public function list(){
        $role = $this->session->userdata('role'); //Verificar se está correto fazer assim!!!

        switch ($role){
            case '1':
                $papel = $this->uri->segment(3);
                $lista = $this->users_model->buscartodospapel($papel);
                $dados = array("usuarios" => $lista);
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view('includes/html_header');
                $this->load->view("user/usuariolista", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;

            case '2':
                $papel = $this->uri->segment(3);
                $lista = $this->users_model->buscartodospapel($papel);
                $dados = array("usuarios" => $lista);
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view('includes/html_header');
                $this->load->view("user/usuariolista", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;

            case '3':
                $papel = $this->uri->segment(3);
                $lista = $this->users_model->buscartodospapel($papel);
                $dados = array("usuarios" => $lista);
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view('includes/html_header');
                $this->load->view("user/usuariolista", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;

            default:
                $this->load->view('errors/permission_denied');
                break;
        }
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

    public function insereUsuariosCSV(){
        $csv = $this->input->raw_input_stream;
        $csvFile = explode(PHP_EOL, $csv);
        $cols = explode(',', $csvFile[0]);
        $rows = array_slice($csvFile, 1);

        $return = TRUE;
        $teste = array();

        foreach($rows as $row){
            if($row == ""){
                continue;
            }
            $dados = explode(',', $row);
            foreach ($dados as $pos=>$dado){
                
                switch($cols[$pos]){
                    case "nome":
                        $nome = $dado;
                        break;
                    case "nome_social":
                        $nome_social = $dado;
                        break;
                    case "matricula":
                        $matricula = $dado;
                        break;
                    case "login":
                        $login = $dado;
                        break;
                    case "senha":
                        $senha = $dado;
                        break;
                    case "email":
                        $email = $dado;
                        break;
                    case "id_curso":
                        $id_curso = $dado;
                        break;
                    case "turma":
                        $turma = $dado;
                        break;
                    case "ano_de_ingresso":
                        $ano_de_ingresso = $dado;
                        break;
                    case "data_de_nascimento":
                        $data_de_nascimento = $dado;
                        break;
                    case "telefone":
                        $telefone = $dado;
                        break;
                    case "papel":
                        // $papel = $dado;
                        if($dado == 'aluno') $papel = '8';
                        elseif($dado == 'professor') $papel = '7';
                        elseif($dado == 'caeg') $papel = '2';
                        elseif($dado == 'administrador') $papel = '1';
                        else $papel = NULL;
                        break;
                    case "ativo":
                        $ativo = $dado;
                        break;
                }
            }
            $insertData = array(
                "id" => NULL,
                "nome" => $nome,
                "nome_social" => $nome_social,
                "matricula" => $matricula,
                "login" => $login,
                "senha" => $senha,
                "email" => $email,
                "id_curso" => $id_curso,
                "turma" => $turma,
                "ano_de_ingresso" => $ano_de_ingresso,
                "data_de_nascimento" => $data_de_nascimento,
                "telefone" => $telefone,
                "papel" => $papel,
                "ativo" => $ativo,
            );
            $id_usuario = $this->users_model->setUsuario($insertData);
            // array_push($teste, [$id_usuario, $insertData['papel']]);
            $return = $return && $this->users_model->setPapel($id_usuario, $insertData['papel']);
        }
        // return $return;
        $this->output->set_output(var_dump($return));
    }

    public function getRoles(){
        $id = $this->input->post('id');

        $this->output->set_output(json_encode($this->users_model->getRoles($id)));
    }

    public function getUsuarios(){
        $role = $this->input->post('role');
        switch ($role){
            case 'todos':
                $role = NULL;
                break;
            case 'alunos':
                $role = 8;
                break;
            case 'professores':
                $role = 7;
                break;
            case 'caeg':
                $role = range(1,6);
                break;
            case 'secretarios':
                $role = range(3);
                break;
            default:
                $role = 'undefined';
                break;
        }

        $result = $this->users_model->getUsuarios($role);

        $this->output->set_output(json_encode($result));
    }

    public function setUsuariosAtivo(){
        $id_user = intval($this->input->post('id_user'));
        $ativo = intval($this->input->post('ativo'));
        $return = $this->users_model->setUsuariosAtivo($id_user, $ativo);
        $this->output->set_output(var_dump($ativo));
    }

    public function setUsuarioHasOferecimento(){
        $id_usuario = intval($this->input->post('id_usuario'));
        $id_oferecimento = intval($this->input->post('id_oferecimento'));
        $inserirDado = $this->input->post('inserirDado');
        if($inserirDado == 'true'){
            $return = $this->users_model->setUsuarioHasOferecimento($id_usuario, $id_oferecimento);
        }else{
            $return = $this->users_model->deleteUsuarioHasOferecimento($id_usuario, $id_oferecimento);
        }
        $this->output->set_output($return);
    }

    public function getUsuarioOferecimentosAtivos(){
        $id_usuario = $this->input->post('id_usuario');
        $dados = $this->offerings_model->getUsuarioOferecimentosAtivos($id_usuario);

        $this->output->set_output(json_encode($dados));
    }

    public function downloadCSV(){
        $url = base_url()."application/csv/modelo_Usuarios.csv";
        $this->output->set_output($url);
    }

    public function editaLogin(){
        $login = $this->input->get("login");
        $matricula = $this->input->get("matricula");
        $dado = $this->users_novo_model->buscar($login, $matricula);
        $dados = array("dado" => $dado);
        $this->load->view('topbar/admin_topbar.php');
        $this->load->view('includes/html_header');
        $this->load->view("user/usuarioedit", $dados['id']);
        $this->load->view('includes/html_footer_full.php');
    }

    public function oferecimentosPorUsuario($id_usuario){
        $role = $this->session->userdata('role'); //Verificar se está correto fazer assim!!!

        $dados['id_usuario'] = $id_usuario;
        $dados['oferecimentos_ativos'] = $this->offerings_model->getOferecimentosAtivosDBC();
        switch ($role){
            case '1':
                $this->load->view('includes/html_header');
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view("user/usuarioOferecimentos", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;
            case '2':
                $this->load->view('includes/html_header');
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view("user/usuarioOferecimentos", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;

            case '3':
                $this->load->view('includes/html_header');
                $this->load->view('topbar/admin_topbar.php');
                $this->load->view("user/usuarioOferecimentos", $dados);
                $this->load->view('includes/html_footer_datatables.php');
                break;

            default:
                $this->load->view('errors/permission_denied');
                break;
        }
    }

    //Atualizar cadastro de usuário - Profile
    public function attProfile(){
        $dados['id'] = $this->input->post("id");
        $dados['matricula'] = $this->input->post("matricula");

        $dados['nome'] = $this->input->post("nome");
        $dados['nome_social'] = $this->input->post("nome_social");
        $dados['login'] = $this->input->post("login");
        $dados['telefone'] = $this->input->post("telefone");
        $dados['email'] = $this->input->post("email");
        $dados['id_curso'] = $this->input->post("id_curso");
        $dados['turma'] = $this->input->post("turma");
        $dados['ano_de_ingresso'] = $this->input->post("ano_de_ingresso");
        $dados['data_de_nascimento'] = $this->input->post("data_de_nascimento");

        $dados['ativo'] = $this->input->post("ativo");
        $dados['papel'] = $this->input->post("papel");
        $dados['senha'] = $this->input->post("senha");

        $return = $this->users_model->setUsuario($dados);
        
        $this->output->set_output($return);

        //echo '<script>alert("Dados atualizados!"); window.location = "/adhans/profile";</script>';
    }

    public function attSenha(){
        $id = $this->input->post("id");
        $senha = $this->input->post("senhanova");
        
        if(($this->input->post("senhaat")==$this->input->post("senhaconf")) && ($senha ==$this->input->post("senhanova2"))){
            $this->users_model->setSenha($id,$senha);
        echo '<script>alert("Senha atualizada com sucesso!"); window.location = "/adhans/profile";</script>';
        }else{
            echo '<script>alert("Senha atual não confere!"); window.location = "/adhans/profile";</script>';
        }

    
    }

    // Verifica existência do login e matrícula ao criar novo usuário
    public function verificaLogin(){
        $login = $this->input->post("login");
        $matricula = $this->input->post("matricula");
        $result = $this->users_model->verificaLogin($login,$matricula);
        
        $this->output->set_output($result);
    }

}

?>