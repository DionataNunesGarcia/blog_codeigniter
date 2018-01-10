<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes_model extends CI_Model {

    public $id;
    public $titulo;
    public $categoria;
    public $subtitulo;
    public $conteudo;
    public $data;
    public $img;
    public $user;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function destaques_home() {
        //Join com tabela usuário
        $this->db->select('usuario.id as usuario_id, usuario.nome as nome_usuario, postagens.id, postagens.titulo, postagens.subtitulo, postagens.data, postagens.user, postagens.img');
        $this->db->from('postagens');
        $this->db->join('usuario', 'usuario.id = postagens.user');
        
        $this->db->limit(4);
        $this->db->order_by('data', 'DESC');
        
        return $this->db->get()->result();
    }
}
