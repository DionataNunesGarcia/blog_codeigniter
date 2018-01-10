<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('publicacoes_model', 'modelpublicacoes');
//        $dados['postagens'] = $this->modelpublicacoes->categoria_pub();
                
        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Categorias';
        $dados['subtitulo'] = 'Pesquisar';
        
        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/categoria');
        $this->load->view('backend/template/html-footer');
        
    }
}
