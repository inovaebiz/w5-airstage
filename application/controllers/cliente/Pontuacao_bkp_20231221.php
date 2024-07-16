<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pontuacao extends MY_Cliente
{
    public function __construct() {
        parent:: __construct();
        $this->load->model("Usuario_model","usuario");
        $this->load->model("Treinamento_Model","treinamento");
        $this->load->model("Pontos_Model","pontos");
        
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
        $this->load->model("Campanha_Model","campanha");
		$this->camp = $this->campanha->get_campanhas_ativas();
        
    }
     public function index() {
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $pontos = $this->pontos->getPontosHistorico($this->session->userdata('cliente')->cliente_id);
	    $reais = $this->pontos->getReais($this->session->userdata('cliente')->cliente_id)->row();

        $data = array(
        	'view' => 'pontuacao',
        	'pontos' => $pontos,
        	'pontuacao' => $pontuacao,
        	'reais' => $reais,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
}