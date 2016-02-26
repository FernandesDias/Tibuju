<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Produtos extends CI_Controller{
    private $categorias;
    public function __construct() {
        parent::__construct();
        $this->load->model('categorias_model','modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
        $this->load->model('produtos_model','modelprodutos');
    }
    public function index($pular = null){
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url("administracao/produtos/index");
        $config['total_rows'] = $this->modelprodutos->contar();
        $produtos_por_pagina = 5;
        $config['per_page'] = $produtos_por_pagina;
        $this->pagination->initialize($config);
        $dados['links_paginacao'] = $this->pagination->create_links();
        $dados['produtos'] = $this->modelprodutos->listar($pular,$produtos_por_pagina);
        $dados['categorias'] = $this->categorias;
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/produtos',$dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
}