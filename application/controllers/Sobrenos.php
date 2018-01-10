<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sobrenos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }

    public function index() {
        $dados['categorias'] = $this->categorias;
        $this->load->model('sobrenos_model', 'modelSobre');
        $this->load->model('usuarios_model', 'modelUsuarios');
        
        $dados['sobre'] = $this->modelSobre->buscar();
        $dados['usuarios'] = $this->modelUsuarios->listar();
        
        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Sobre Nós';
        $dados['subtitulo'] = $dados['sobre']->nome;
                        
        $this->load->view('frontend/template/html-header', $dados);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/sobrenos');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
        
    }
    
    public function autor($id, $slug = null) {
    
        $dados['categorias'] = $this->categorias;
        $this->load->model('usuarios_model', 'modelUsuarios');
        $dados['autor'] = $this->modelUsuarios->buscar($id);
                
        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Sobre Nós';
        $dados['subtitulo'] = 'Autor';
        
        $this->load->view('frontend/template/html-header', $dados);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/autor');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
        
    }
}
