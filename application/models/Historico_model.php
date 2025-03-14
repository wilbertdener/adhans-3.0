<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico_model extends CI_Model {

    public function get_exames() {
        $dados = NULL;
        $session = $this->session->userdata();
        $this->db->from('exames');
       
        $this->db->where('exames.id_usuario', $session['id']);
        $this->db->order_by('id', 'DESC');
        
        
        $dados = $this->db->get()->result();
        return $dados;
    }

    
    
    public function get_fotos_by_usuario() {
        $dados = NULL;
        $session = $this->session->userdata();
    
        $this->db->select('fotos.id, fotos.local, fotos.Roi_dentro1, fotos.Roi_dentro2, fotos.Roi_dentro3, fotos.Roi_fora1, fotos.Roi_fora2, fotos.Roi_fora3,fotos.dimensao');
        $this->db->from('fotos');
    
        // Fazer JOIN com a tabela exames para obter apenas as fotos associadas ao usuário logado
        $this->db->join('exames', 'fotos.id = exames.id_foto1 OR fotos.id = exames.id_foto2');
    
        // Filtrar pelo id do usuário logado
        $this->db->where('exames.id_usuario', $session['id']);
    
        // Ordenar pelos IDs dos exames
        $this->db->order_by('exames.id', 'ASC');
    
        $dados = $this->db->get()->result();
        return $dados;
    }
    

}