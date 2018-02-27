<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    public $id;
    public $titulo;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function novo() {
        $categoria = new stdClass();
        $categoria->id = '';
        $categoria->titulo = '';
        
        return $categoria;
    }
    
    public function buscar($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->get('categoria')->row();
    }
    
    public function listar_categorias() {
        $this->db->order_by('titulo', 'ASC');
        
        return $this->db->get('categoria')->result();
    }
        
    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('categoria');
    }
    
    public function salvar($dados){
        
        if($dados['id'] !== ''){            
            $this->db->where('id', $dados['id']);
            return $this->db->update('categoria', $dados);            
        }else{            
            return $this->db->insert('categoria', $dados);
        }
    }
}
