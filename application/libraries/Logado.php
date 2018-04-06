<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logado {

    public function verificaLogin() {
        $CI =& get_instance();
        
        if(!$CI->session->userdata('logado')){
            $CI->session->set_flashdata('alert', ['mensagem' => 'Você precisa estar logado para acessar o sistema','class' => 'danger']);
            redirect(base_url('admin/login'));
        }
    }
}