<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regulamento extends MY_Cliente
{
    public function __construct() {
        parent:: __construct();
        $this->load->model("Regulamento_Model","regulamento");
        $this->load->model("Pontos_Model","pontos");
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
        $this->load->model("Campanha_Model","campanha");
		$this->camp = $this->campanha->get_campanhas_ativas();
        
    }
    public function index() {
	    $regulamento = $this->regulamento->getAll();
	    $regulamento = $this->regulamento->getById(3);
		$regulamento = $regulamento->first_row();
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
        $data = array(
        	'view' => 'regulamento',
        	'regulamento' => $regulamento,
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
}