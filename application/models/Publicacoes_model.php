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

    public function categoria_pub($id) {
        //Join com tabela usuário
        $this->db
            ->select('usuario.id as usuario_id, '
                . 'usuario.nome as nome_usuario, '
                . 'postagens.id,'
                . ' postagens.titulo, '
                . 'postagens.subtitulo, '
                . 'postagens.data, '
                . 'postagens.user, '
                . 'postagens.img, '
                . 'categoria.titulo titulo_categoria, '
                . 'postagens.categoria'
            );
        $this->db->from('postagens');
        $this->db->join('usuario', 'usuario.id = postagens.user');
        $this->db->join('categoria', 'categoria.id = postagens.categoria');
        $this->db->where("postagens.categoria = $id");

        $this->db->order_by('data', 'DESC');

        return $this->db->get()->result();
    }

    public function publicacao($id) {
        //Join com tabela usuário
        $this->db
            ->select('usuario.id as usuario_id, '
                . 'usuario.nome as nome_usuario, '
                . 'postagens.id,'
                . 'postagens.titulo, '
                . 'postagens.subtitulo, '
                . 'postagens.data, '
                . 'postagens.user, '
                . 'postagens.img, '
                . 'postagens.conteudo, '
                . 'categoria.titulo titulo_categoria, '
                . 'postagens.categoria'
            );
        $this->db->from('postagens');
        $this->db->join('usuario', 'usuario.id = postagens.user');
        $this->db->join('categoria', 'categoria.id = postagens.categoria');
        
        $this->db->where("postagens.id = $id");

        return $this->db->get()->result();
    }

}
