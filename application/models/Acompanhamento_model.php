<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acompanhamento_model extends CI_Model {

    


    public function get_pac($id){

        $dados = NULL;

        $this->db->from('pacientes');
       
        $this->db->where('pacientes.id_usuario', $id);
        
        
        $this->db->select('pacientes.cod as cod, pacientes.nome as nome, pacientes.data as data');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    
    public function get_hist(){

        $dados = NULL;

        $this->db->from('historico');
       
        $this->db->where('historico.id_pac', '0');
        
        
        

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }
    
    public function set_foto($data){
        
        $this->db->insert('historico',$data);
    }

    public function set_user($data){
        
        $this->db->insert('pacientes',$data);
    }

    public function update_user($nome,$data,$cod,$newcod){
       

        $this->db->from('pacientes');
        if($nome!=""){
            $this->db->set('nome',$nome);
        }
        if($data!=""){
            $this->db->set('data_nasc',$data);
        }
        if($newcod!=""){
            $this->db->set('cod',$newcod);
        }
        

        $this->db->where('cod', $cod);
        $this->db->update('pacientes');

        return TRUE;
    }
    

    public function uploadFile($data){
        //if($this->db->insert('documentos', $data)){
        //    return TRUE;
        //}else{
        //    return FALSE;
        //}
        return TRUE;
    }
}