<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico_model extends CI_Model {

    public function get_exames() {
        $dados = NULL;
        $session = $this->session->userdata();
        $this->db->from('exames');
       
        $this->db->where('exames.id_usuario', $session['id']);
        $this->db->order_by('data', 'ASC');
        
        
        $dados = $this->db->get()->result();
        return $dados;
    }

    

}