<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();       
        
        $this->logado->verificaLogin();
    }

    public function index() {
        $this->load->library('table');
        $dados['entidades'] = $this->categorias;

        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Categorias';
        $dados['subtitulo'] = 'Administrar';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/categoria');
        $this->load->view('backend/template/html-footer');
    }

    public function incluir() {
        $this->load->library('table');
        $dados['entidade'] = $this->modelcategorias->novo();

        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Categorias';
        $dados['subtitulo'] = 'Administrar';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/categoria-abrir');
        $this->load->view('backend/template/html-footer');
        
    }

    public function excluir($id) {
        if($this->modelcategorias->excluir($id)){
            $this->session->set_flashdata('alert', ['mensagem' => 'O item foi excluído com sucesso.','class' => 'success']);
            redirect(base_url('admin/categoria'));
        }else{
            echo 'Houve um erro no sistema.';
        }
    }

    public function alterar($id) {
        $this->load->library('table');
        $dados['entidade'] = $this->modelcategorias->buscar($id);

        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Categorias';
        $dados['subtitulo'] = 'Administrar';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/categoria-abrir');
        $this->load->view('backend/template/html-footer');
    }

    public function salvar() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'titulo', 'Nome da Categoria', 'required|min_length[3]'
        );
        
        if($this->form_validation->run() == false){
            $this->index();
        }else{
            $dados = $this->input->post();
            
            if($this->modelcategorias->salvar($dados)){
                $this->session->set_flashdata('alert', ['mensagem' => 'Dados salvos com sucesso.','class' => 'success']);
                redirect(base_url('admin/categoria'));
            }else{
                $this->session->set_flashdata('alert', ['mensagem' => 'Houve um erro no sistema.','class' => 'danger']);
                redirect(base_url('admin/categoria'));
            }
        }
        
    }
}
