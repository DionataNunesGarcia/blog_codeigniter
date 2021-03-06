<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    public $table = 'categoria';
    
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
        return $this->db->get($this->table)->row();
    }
    
    public function listar_categorias() {
        $this->db->order_by('titulo', 'ASC');
        
        return $this->db->get($this->table)->result();
    }
        
    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete($this->table);
    }
    
    public function salvar($dados){
        
        if($dados['id'] !== ''){            
            $this->db->where('id', $dados['id']);
            return $this->db->update($this->table, $dados);            
        }else{            
            return $this->db->insert($this->table, $dados);
        }
    }
}
