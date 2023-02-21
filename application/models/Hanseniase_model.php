<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hanseniase_model extends CI_Model {

    public function historia_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'historia');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function historia_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'historia');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome,  imgs.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function indeterminada_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'hanseniase');
        $this->db->where('textos.metodo', 'indeterminada');
        
        $this->db->select('textos.texto as texto');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function tuberculoide_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'hanseniase');
        $this->db->where('textos.metodo', 'tuberculoide');
        
        $this->db->select('textos.texto as texto');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function dimorfa_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'hanseniase');
        $this->db->where('textos.metodo', 'dimorfa');
        
        $this->db->select('textos.texto as texto');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function virchowiana_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'hanseniase');
        $this->db->where('textos.metodo', 'virchowiana');
        
        $this->db->select('textos.texto as texto');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }




    public function indeterminada_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'hanseniase');
        $this->db->where('imgs.metodo', 'indeterminada');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function tuberculoide_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'hanseniase');
        $this->db->where('imgs.metodo', 'tuberculoide');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function dimorfa_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'hanseniase');
        $this->db->where('imgs.metodo', 'dimorfa');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function virchowiana_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'hanseniase');
        $this->db->where('imgs.metodo', 'virchowiana');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }



    public function sintomas_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'sintomas');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function sintomas_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'sintomas');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome,  imgs.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }


    public function epidemio_texto(){

        $dados = NULL;

        $this->db->from('textos');
       
        $this->db->where('textos.area', 'epidemio');
        
        $this->db->select('textos.texto as texto, textos.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

    public function epidemio_img(){

        $dados = NULL;

        $this->db->from('imgs');
       
        $this->db->where('imgs.area', 'epidemio');
        
        $this->db->select('imgs.local as local,  imgs.descricao as descricao, imgs.nome as nome,  imgs.topico as topico');

        
        $dados = $this->db->get()->result();
        return $dados;
        
    }

}