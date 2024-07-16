<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Politica extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->helper(array('form', 'url', 'noweb'));	
        $this->load->model("Politica_Model","politica"); //	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
    }
    public function index()
    {
		$this->form_validation->set_rules('politica_nome', 'Politica Nome', 'required|is_unique[politicas.politica_nome]');
		// $this->form_validation->set_rules('politica_valor', 'Politica Valor', 'required');
		$this->form_validation->set_rules('politica_cred_pontos', 'Politica Credenciados Pontos', 'required');
		$this->form_validation->set_rules('politica_nao_cred_pontos', 'Politica Não Credenciados Pontos', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			if(isset($dados['politica_status'])){
			    $dados['politica_status'] = 1;
		    }else{
			    $dados['politica_status'] = 0;
		    }
			$this->politica->insert($dados);
			redirect(base_url('control/politica?msg=success'));
		}
		
		$politica = $this->politica->getAll();
        $data = array(
        	'view'=> 'gerenciar-politica',
        	'politicas' => $politica,
        );
        $this->load->view('template', $data);
    }
    public function editar()
    {
		$this->form_validation->set_rules('politica_nome', 'Politica Nome', 'required');
		// $this->form_validation->set_rules('politica_valor', 'Politica Valor', 'required');
		$this->form_validation->set_rules('politica_cred_pontos', 'Politica Credenciados Pontos', 'required');
		$this->form_validation->set_rules('politica_nao_cred_pontos', 'Politica Não Credenciados Pontos', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			if(isset($dados['politica_status'])){
			    $dados['politica_status'] = 1;
		    }else{
			    $dados['politica_status'] = 0;
		    }
			$this->politica->update($dados);
			redirect(base_url('control/politica?msg=success'));
		}
		$id = $this->uri->segment(4);
		$politica = $this->politica->getById($id);
		$politica = $politica->first_row();
        $data = array(
        	'view'=> 'editar-politica',
        	'politica' => $politica,
        );
        $this->load->view('template', $data);
    }
    public function excluir()
    {
		$id = $this->uri->segment(4);
		if ($id != ''){
		$this->politica->delete($id);
        redirect('control/politica?msg=delete');
		}
    }
}