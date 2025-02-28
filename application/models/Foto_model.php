<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_model extends CI_Model {

    public function set_foto($caminho, $tempo) {
        $data = array(
            'local' => $caminho,
            'tempo' => $tempo 
        );

        // Insere os dados na tabela 'fotos'
        if ($this->db->insert('fotos', $data)) {
            return $this->db->insert_id(); // Retorna o ID da imagem inserida
        } else {
            return false; // Retorna falso em caso de erro
        }
    }

    public function set_exame($nome_pac, $foto2){

        
        $this->db->where('tempo', '0');
        $this->db->select_max('id');
        $query = $this->db->get('fotos');
        $result = $query->row();
        
        $foto1= $result->id;
        $session = $this->session->userdata();
        $nome_pac = str_replace("%20", " ", $nome_pac);
        $data_atual = date("Y-m-d");




        $data = array(
            'id_usuario' => $session['id'],
            'nome_pac' => $nome_pac,
            'id_foto1'=> $foto1,
            'id_foto2'=> $foto2,
            'data'=> $data_atual
        );

        // Insere os dados na tabela 'fotos'
        if ($this->db->insert('exames', $data)) {
            return $this->db->insert_id(); // Retorna o ID da imagem inserida
        } else {
            return false; // Retorna falso em caso de erro
        }
    }

    
    
    public function get_max_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get('fotos');
        $result = $query->row();
        
        return $result ? $result->id+1 : 1; // Retorna o maior ID ou null se não houver registros
    }
    

}