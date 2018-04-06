<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_model', 'modelUsuarios');
        $this->usuarios = $this->modelUsuarios->listar();    
    }

    public function index() {
        $this->load->library('table');
        
        $this->logado->verificaLogin();
        $dados['entidades'] = $this->usuarios;
        
        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Painel de Controle';
        $dados['subtitulo'] = 'Usuários';
        
        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/usuarios');
        $this->load->view('backend/template/html-footer');
        
    }
    
    public function incluir() {
        $this->load->library('table');
        $dados['entidade'] = $this->modelUsuarios->novo();

        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Usuários';
        $dados['subtitulo'] = 'Administrar';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/usuario-abrir');
        $this->load->view('backend/template/html-footer');
        
    }

    public function excluir($id) {
        if($this->modelUsuarios->excluir($id)){
            $this->session->set_flashdata('alert', ['mensagem' => 'O item foi excluído com sucesso.','class' => 'success']);
            redirect(base_url('admin/usuarios'));
        }else{
            $this->session->set_flashdata('alert', ['mensagem' => 'Houve um erro no sistema.','class' => 'danger']);
            redirect(base_url('admin/usuarios'));
        }
    }

    public function alterar($id) {
        $this->load->library('table');
        $dados['entidade'] = $this->modelUsuarios->buscar($id, true);

        //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Categorias';
        $dados['subtitulo'] = 'Administrar';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/usuario-abrir');
        $this->load->view('backend/template/html-footer');
    }

    public function salvar_alteracoes() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'titulo', 'Nome da Categoria', 'required|min_length[3]'
        );
        
        if($this->form_validation->run() == false){
            $this->index();
        }else{
            $dados = $this->input->post();
            unset($dados['confirmar-senha']);
           
            if($this->modelUsuarios->salvar($dados)){
                $this->session->set_flashdata('alert', ['mensagem' => 'Dados salvos com sucesso.','class' => 'success']);
                redirect(base_url('admin/categoria'));
            }else{
                $this->session->set_flashdata('alert', ['mensagem' => 'Houve um erro no sistema.','class' => 'danger']);
                redirect(base_url('admin/categoria'));
            }
        }
        
    }
    
    public function pag_login() {
          //Dados para serem apresentados no cabeçalho
        $dados['titulo'] = 'Painel de Controle';
        $dados['subtitulo'] = 'Home';
        
        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/login');
        $this->load->view('backend/template/html-footer');
    }
    
    public function login() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'txt-user', 'Usuário', 'required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'txt-senha', 'Senha', 'required|min_length[3]'
        );
        
        if($this->form_validation->run() == false){
            $this->pag_login();
        }else{
            $dados = $this->input->post();
            
            $this->db->where('user', $dados['txt-user']);
            $this->db->where('senha', $dados['txt-senha']);
            
            $logado = $this->db->get('usuario')->row();
            
            if(!empty($logado)){
                
                $this->session->set_flashdata('alert', ['mensagem' => 'Login efetuado com sucesso.','class' => 'success']);
                
                $dadosSessao['userLogado'] = $logado;
                $dadosSessao['logado'] = true;
                
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin'));
                
            }else{
                
                $this->session->set_flashdata('alert', ['mensagem' => 'O usuário ou a senha estão incorretos','class' => 'danger']);
                
                $dadosSessao['userLogado'] = null;
                $dadosSessao['logado'] = false;
                
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin/login'));
                
            }
        }        
    }
    
    public function logout() {
        
        $this->session->set_flashdata('alert', ['mensagem' => 'Você saiu do sistema com sucesso.','class' => 'success']);
                
        $dadosSessao['userLogado'] = null;
        $dadosSessao['logado'] = false;

        $this->session->set_userdata($dadosSessao);
        redirect(base_url('admin/login'));
    }
}
