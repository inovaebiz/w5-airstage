<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribuidores extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form', 'url', 'noweb'));
		$this->load->model("Distribuidores_Model","distribuidor");	//	HELPERS
		$this->load->library('form_validation');						//LIBRARYS
	}

	public function index()
	{
		if(!empty($_POST)){
			$dados = $this->input->post();
			if(isset($dados['distribuidor_status'])) {
				$dados['distribuidor_status'] = 1;
			} else {
				$dados['distribuidor_status'] = 0;
			}
			$this->distribuidor->insertDistribuidor($dados);
			redirect('/control/distribuidores?msg=cadastro');
		}
		$distribuidores = $this->distribuidor->getAll();
		$data = array(
			'distribuidores' => $distribuidores,
			'view'=> 'cadastro-de-distribuidores'
		);
		$this->load->view('template', $data);

	}

	public function editar_distribuidor()
	{
		if(!empty($_POST)){
			$dados = $this->input->post();
			if(isset($dados['distribuidor_status'])) {
				$dados['distribuidor_status'] = 1;
			} else {
				$dados['distribuidor_status'] = 0;
			}
			$this->distribuidor->updateDistribuidor($dados);
			redirect('/control/distribuidores?msg=editar');
		}
		$id = $this->uri->segment(4);
		$distribuidores = $this->distribuidor->getByIdDistribuidor($id)->row();
		$data = array(
			'distribuidores'=> $distribuidores,
			'view'=> 'editar-distribuidor'
		);
		$this->load->view('template', $data);
	}

	public function excluir_distribuidor()
	{
		$id = $this->uri->segment(4);
		if ($id != '') {
			$this->distribuidor->deleteDistribuidor($id);
			redirect('control/distribuidores?msg=delete');
		}
	}
}