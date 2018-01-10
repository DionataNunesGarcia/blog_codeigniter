 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sobrenos_model extends CI_Model {
    //nome, email, telefone, endereco, numero, cidade, uf, img, descricao
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $numero;
    public $cidade;
    public $uf;
    public $img;
    public $descricao;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function buscar() {
        
        return $this->db->get('sobre')->first_row();
    }
}
