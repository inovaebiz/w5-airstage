<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
        
        $this->load->model("usuario_model", "usuario");
    }
    public function index() {
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    $this->usuario->insertMR($dados);
		    redirect('control/status/?msg=cadastrar');
	    }
	    $status = $this->usuario->getAllMR();
        $data = array(
        	'view' => 'cadastro-de-status',
        	'mr' => $status,
        );
        $this->load->view('template', $data);
    }
    public function editar(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    $this->usuario->updateMR($dados);
		    redirect('control/status/?msg=edit');
	    }
	    $id = $this->uri->segment(4);
	    $mr = $this->usuario->getAllMR(NULL, $id)->row();
	    $data = array(
        	'view' => 'editar-mr',
        	'mr' => $mr,
        );
        $this->load->view('template', $data);
    }
    public function exclui(){
	    $id = $this->uri->segment(4);
	    $this->usuario->deleteMR($id);
		redirect('control/status/?msg=delete');
    }
}