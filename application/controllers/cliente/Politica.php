<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Politica extends MY_Cliente
{
    public function __construct() {
        parent:: __construct();
        $this->load->model("Politica_Model","politica");
        $this->load->model("Regulamento_Model","regulamento");
        $this->load->model("Pontos_Model","pontos");
        
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
        $this->load->model("Campanha_Model","campanha");
		$this->camp = $this->campanha->get_campanhas_ativas();
        
    }
     public function index() {
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $politica = $this->politica->getByStatus();
        $data = array(
        	'view' => 'politica-de-pontos',
        	'politica' => $politica,
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
     public function privacidade() {
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $politica = $this->regulamento->getById(4);
		$politica = $politica->first_row();
        $data = array(
        	'view' => 'politica-privacidade',
        	'politica' => $politica,
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
    
    }