<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

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
    
    public function buscar($id) {
        $this->db->from('usuario');
        $this->db->where('id = ' . $id);
        return $this->db->get()->first_row();
    }
    
    public function listar() {
        
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('usuario')->result();
    }
}
