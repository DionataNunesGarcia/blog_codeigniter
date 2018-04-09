<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public $table = 'usuario';
    
    public $id;
    public $nome;
    public $email;
    public $img;
    public $historico;
    public $user;
    public $senha;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function novo() {
        $entidade = new stdClass();
        $entidade->id = '';
        $entidade->nome = '';
        $entidade->email = '';
        $entidade->img = '';
        $entidade->historico = '';
        $entidade->user = '';
        $entidade->senha = '';
        
        return $entidade;
    }
        
    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete($this->table);
    }
    
    public function salvar($dados){
        
        unset($dados['confirmar-senha']);
        
        if($dados['id'] !== ''){
            
            $entidade = $this->buscar($dados['id']);
            
            
            if($dados['senha'] == ''){                
                $dados['senha'] = $entidade->senha;
            }else{
                $dados['senha'] = md5($dados['senha']);
            }
            
            $this->db->where('id', $dados['id']);
            return $this->db->update($this->table, $dados);            
        }else{   
            return $this->db->insert($this->table, $dados);
        }
    }
    
    public function buscar($id, $md5 = false) {
        
        $textId = (!$md5) ? 'id' :'md5(id)';
        
        $this->db->from($this->table);
        $this->db->where($textId . '= ', $id);
      
        return $this->db->get()->first_row();
    }
    
    public function listar() {
        
        $this->db->order_by('nome', 'ASC');
        return $this->db->get($this->table)->result();
    }
}
