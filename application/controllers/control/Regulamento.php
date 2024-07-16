<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regulamento extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->helper(array('form', 'url', 'noweb'));	
        $this->load->model("Regulamento_Model","regulamento"); //	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
    }
    public function index()
    {
	    $this->form_validation->set_rules('regulamento_texto', 'Regulamento', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			$this->regulamento->update($dados);
			redirect(base_url('control/regulamento?msg=success'));
		}
		$introducao = $this->regulamento->getById(1);
		$introducao = $introducao->first_row();
		
		$introPart = $this->regulamento->getById(2);
		$introPart = $introPart->first_row();
		
		$regulamento = $this->regulamento->getById(3);
		$regulamento = $regulamento->first_row();
		
		$politica = $this->regulamento->getById(4);
		$politica = $politica->first_row();
        $data = array(
        	'view'=> 'editar-regulamento',
        	'regulamento' => $regulamento,
        	'introducao' => $introducao,
        	'introPart' => $introPart,
        	'politica' => $politica
        );
        $this->load->view('template', $data);
    }
}