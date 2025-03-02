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

    
    
    public function get_max_id()    {
        $this->db->select_max('id');
        $query = $this->db->get('fotos');
        $result = $query->row();
        
        return $result ? $result->id+1 : 1; // Retorna o maior ID ou null se não houver registros
    }

    public function get_fotos_by_id($id) {
        $dados = NULL;
        $session = $this->session->userdata();
        $this->db->from('fotos');
       
        $this->db->where_in('fotos.id', $id);
        
        $dados = $this->db->get()->row();
        return $dados;
    }

    public function get_exame_by_id_foto($id) {
        //foto2
        $dados = NULL;
        
        $this->db->from('exames');
       
        $this->db->where('id_foto2', $id);
        
        $dados = $this->db->get()->row();
        return $dados;
    }

    public function update_exame($id, $diagnostico) {
        // Prepara os dados para a atualização
        $data = array(
            'diagnostico' => $diagnostico // Atualiza o campo 'diagnostico' com o novo valor
        );
        
        // Realiza a atualização na tabela 'exames' onde o 'id' é igual ao valor recebido
        $this->db->where('id', $id);  // Define a condição para a atualização
        $this->db->update('exames', $data);  // Atualiza a tabela 'exames'
    
        // Verifica se a atualização foi bem-sucedida
        if ($this->db->affected_rows() > 0) {
            return true;  // Retorna true caso tenha atualizado com sucesso
        } else {
            return false; // Retorna false caso não tenha ocorrido atualização
        }
    }

    public function update_coordenadas_foto($id, $coordenadas,$dimensao) {
        // Prepara os dados para a atualização
       
        $data = array(
            'Roi_dentro1' => $coordenadas[0],
            'Roi_dentro2' => $coordenadas[1],
            'Roi_dentro3' => $coordenadas[2],
            'Roi_fora1' => $coordenadas[3],
            'Roi_fora2' => $coordenadas[4],
            'Roi_fora3' => $coordenadas[5], 
            'dimensao' =>$dimensao,// Atualiza o campo 'diagnostico' com o novo valor
        );
        
        
        // Realiza a atualização na tabela 'exames' onde o 'id' é igual ao valor recebido
        $this->db->where('id', $id);  // Define a condição para a atualização
        $this->db->update('fotos', $data);  // Atualiza a tabela 'exames'
    
        // Verifica se a atualização foi bem-sucedida
        /*
        if ($this->db->affected_rows() > 0) {
            return true;  // Retorna true caso tenha atualizado com sucesso
        } else {
            return false; // Retorna false caso não tenha ocorrido atualização
        }*/
        return true;
    }
    
    

}