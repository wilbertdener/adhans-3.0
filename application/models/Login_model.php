<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function check_login(){
        
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->from('usuarios');
       
        $this->db->where('usuarios.login', $login);
        $this->db->where('usuarios.senha', $senha);
        $this->db->where('ativo', 1);


        $this->db->select('usuarios.nome as nome, usuarios.id as id');

        $result = $this->db->get();
        $row = $result->row();
        
        if($result->num_rows() === 1){

            $session_data = array(
                'iduser' => $row->id,
                'name' => $row->nome,
                'papel' => $row->papel,
            );
            $this->set_session($session_data);
            return 'TRUE';
        }else{
            return 'incorrect credentials';
        }
        
    }

    public function check_forgot(){
        
        //armazena os dados do formulario em variáveis
        $login = $this->input->post('login');
        
        //definindo o parametro from
        $this->db->from('usuarios');
       
        //definindo os parametros where (especificando o usuário)
        $this->db->where('matricula', $login);
        
        //executando a query e armazenando o resultado nessa variável
        $result = $this->db->get()->result();
        
        if($result != NULL){
            //usuario existe, gerar nova senha
            $bytes = random_bytes(3);
            $data = bin2hex($bytes);

            //resetar a senha
            $this->db->set('senha', $data);
            $this->db->where('matricula', $login);
            $this->db->update('usuarios');

            //enviar senha para email
            $this->email->from('portfoliousp@gmail.com', 'Porfólio USP');
            $this->email->to($result[0]->email);
            $this->email->subject('Redefinição de Senha');
            $this->email->message('Sua nova senha é'.$data);  
            $this->email->send();

            if (!$this->email->send())
                {
                    return 'FALSE';
                }

            return 'TRUE';
        }else{
            //usuário não encontrado
            return 'FALSE';
        }
        
    }
    
    public function set_session($session_data){
        $sess_data = array(
            'id' => $session_data['iduser'],
            'name' => $session_data['name'],
            'papel' => $session_data['papel'],
            'logged_in' => true
        );
        
        $this->session->set_userdata($sess_data);
    }

    public function getuser($id){
        $dados = NULL;

        $this->db->from('usuarios');
       
        $this->db->where('usuarios.id', $id);
        
        
        $dados = $this->db->get()->row();
        return $dados;

    }

    public function logo(){

        
        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('id', '20');
        
        $this->db->select('imgs.local as local, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

}