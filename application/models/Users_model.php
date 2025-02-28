<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function getUsuarios($role = NULL, $id_offering = NULL){
        if($role == 'undefined'){
            return NULL;
        }else{
            $this->db->from('usuarios');
            $this->db->join('usuarios_role', 'usuarios.id = usuarios_role.id_usuarios','left');
            $this->db->join('role', 'role.id = usuarios_role.id_role', 'left');
        
            if($role != NULL){
                $this->db->where_in('usuarios_role.id_role', $role);
            }

            if($id_offering != NULL){
                $this->db->join('usuario_has_oferecimento', 'usuario_has_oferecimento.id_usuario = usuarios.id');
                $this->db->where_in('usuario_has_oferecimento.id_oferecimento', $id_offering);
            }

            $this->db->order_by('usuarios.ativo', 'desc');
            $this->db->order_by('usuarios.nome');
            
            // $this->db->distinct();
            $this->db->select('usuarios.id as id, usuarios.nome as nome, usuarios.matricula as matricula, usuarios.login as login, usuarios.senha as senha, usuarios.email as email, usuarios.id_curso as id_curso, usuarios.turma as turma, usuarios.ano_de_ingresso as ano_de_ingresso, usuarios.nome_social as nome_social, usuarios.data_de_nascimento as data_de_nascimento, usuarios.papel as papel, usuarios.telefone as telefone, usuarios.ativo as ativo, role.id as id_role, role.nome as nome_role');

            $dados = $this->db->get()->result();
            return $dados;
        }
    }

    public function getPapeis(){
        $this->db->from('role');
        return $this->db->get()->result();
    }

    public function getRoles($id){
        $this->db->from('usuarios_role');
        $this->db->where('id_usuarios', $id);
        return $this->db->get()->result();
    }
    public function setUsuariosAtivo($id_user, $ativo){
        $this->db->from('usuarios');
        $this->db->where('id', $id_user);
        $this->db->set('ativo',$ativo);
        return $this->db->update('usuarios');
    }
    public function setUsuario($dados){
        if($dados['id'] == '' || $dados['id'] == NULL){
            $this->db->insert('usuarios', $dados);
            $result = $this->db->insert_id();
        }else{
            $this->db->where('id', $dados['id']);
            $this->db->update('usuarios', $dados);
            $result = $dados['id'];
        }
        return $result;
    }

    public function setUsuarioHasOferecimento($id_usuario, $id_oferecimento){
        $this->deleteUsuarioHasOferecimento($id_usuario, $id_oferecimento);
        $dados['id_usuario'] = $id_usuario;
        $dados['id_oferecimento'] = $id_oferecimento;
        return $this->db->insert('usuario_has_oferecimento', $dados);
    }

    public function setPapel($id, $papeis){
        //Primeiro deleta todos os papeis do usuario
        $this->db->where('id_usuarios', $id);
        $this->db->delete('usuarios_role');

        $result = true;

        if(is_array($papeis)){
            foreach($papeis as $papel){
                if($papel == ''){
                    break;
                }
                $data['id_usuarios'] = intval($id);
                $data['id_role'] = intval($papel);
                $result = $result && $this->db->insert('usuarios_role', $data);
            }
        }else{
            if($papeis != NULL){
                $data['id_usuarios'] = intval($id);
                $data['id_role'] = intval($papeis);
                $result = $result && $this->db->insert('usuarios_role', $data);
            }
        }
        return $result;
    }

    public function inserirUsersCSV(){
        //LEMBRAR DE SALVAR O ARQUIVO CSV UTF-8;
        strtolower($data[12]) == 'ativo' ? $ativo = 1 : $ativo = 0;
        
        $sql = "INSERT INTO `usuarios` (matricula, nome, nome_social, data_de_nascimento,login, senha, email, id_curso, turma, ano_de_ingresso, papel, telefone, ativo) 
        VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]',
        '$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$ativo')";
        
        return $this->db->query($sql);
    }

    // retorna a lista de alunos dado um oferecimento
    // public function getStudents($offering = NULL){

    //     $dados = NULL;
    //     if($offering!= NULL){
    //         $this->db->where('id_oferecimento', $offering);
    //         $this->db->from('usuarios');
    //         $this->db->join('oferecimento_has_alunos', 'usuarios.matricula = oferecimento_has_alunos.matricula_usuario');
    //         $dados = $this->db->get()->result();
    //     }
    //     return $dados;

    // }

    // retorna um aluno dado um id de usuário
    public function getStudent($student_id = NULL){

        $dados = NULL;
        $this->db->from('usuarios');
        $this->db->where('id', $student_id);
        $dados = $this->db->get()->row();

        return $dados;
    }

    public function salvar($id,$usuario){
        
        $this->db->where("id",$id);
        return $this->db->update("usuarios",$usuario);
    }

    public function setSenha($id,$senha){
        $this->db->set("senha",$senha);
        $this->db->where("id",$id);
        return $this->db->update("usuarios");
    }
    
    public function retornaId($id){
        return $this->db->get_where("usuarios",array(
            "id" => $id
        ))->row_array();
    }

    public function buscarTodosPapel($papel){
        return $papel == '' ? 
        $this->db->get("usuarios")->result_array() : 
        $this->db->get_where("usuarios",array(
            "papel" => $papel
        ))->result_array();
    }

    public function deleteUsuarioHasOferecimento($id_usuario, $id_oferecimento){
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('id_oferecimento', $id_oferecimento);
        return $this->db->delete('usuario_has_oferecimento');
    }

    public function verificaLogin($login,$matricula){
        $this->db->where('login',$login);
        $query = $this->db->get("usuarios");

        if($query->num_rows() > 0){
            return 1;
            // Sim, já existe esse login no bd
        } else{
            // Ainda não existe o login no bd e Verifica Matricula
            $this->db->where('matricula',$matricula);
            $query = $this->db->get("usuarios");

            if($query->num_rows() > 0){
                return 2;
                // Sim, já existe esse MATRICULA no bd
            } else{
                return 0;
                // Ainda não existe o MATRICULA no bd
            }
        }
    }


    public function set_user($data){
        
        $this->db->insert('pacientes',$data);
    }

    public function get_foto(){
        $session = $this->session->userdata();
        
        
        
        $this->db->from('usuarios');
       
        $this->db->where('id', $session['id']);
        $this->db->select('usuarios.foto');
        $dados = $this->db->get()->row();
        
        return $dados;
        
        
    }

    public function updte_foto($foto){
        
        $session = $this->session->userdata();
        
        
        // Prepara os dados para a atualização
        $data = array(
            'foto' => $foto // Atualiza o campo 'diagnostico' com o novo valor
        );
        
        // Realiza a atualização na tabela 'exames' onde o 'id' é igual ao valor recebido
        $this->db->where('id', $session['id']);  // Define a condição para a atualização
        $this->db->update('usuarios', $data);  // Atualiza a tabela 'exames'
        return true;
        // Verifica se a atualização foi bem-sucedida
        if ($this->db->affected_rows() > 0) {
            return true;  // Retorna true caso tenha atualizado com sucesso
        } else {
            return false; // Retorna false caso não tenha ocorrido atualização
        }
        
    }

}