<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnostico_model extends CI_Model {

    


    public function histamina_endo_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'histamina');
        $this->db->where('textos.metodo', 'endogena');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function histamina_exo_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'histamina');
        $this->db->where('textos.metodo', 'exogena');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function histamina_endo_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'histamina');
        $this->db->where('imgs.metodo', 'endogena');
        
        $this->db->select('imgs.local as local, imgs.topico as topico, imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function histamina_exo_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'histamina');
        $this->db->where('imgs.metodo', 'exogena');
        
        $this->db->select('imgs.local as local, imgs.topico as topico, imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }



    public function sens_termica_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'termica');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sens_dolorosa_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'dolorosa');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sens_tatil_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'sens');
        $this->db->where('textos.metodo', 'tatil');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sens_termica_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'termica');
        
        $this->db->select('imgs.local as local, imgs.topico as topico, imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sens_dolorosa_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'dolorosa');
        
        $this->db->select('imgs.local as local, imgs.topico as topico, imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sens_tatil_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'sens');
        $this->db->where('imgs.metodo', 'tatil');
        
        $this->db->select('imgs.local as local, imgs.topico as topico, imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }
    
    public function sudoral_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'sudoral');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sudoral_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'sudoral');
        
        $this->db->select('imgs.local as local, imgs.topico as topico, imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    



}