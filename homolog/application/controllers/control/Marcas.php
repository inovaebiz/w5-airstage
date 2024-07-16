<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->model("Marcas_Model","marcas");
        
        $this->load->library('form_validation');	//LIBRARYS
    }
    /*public function index()
    {
        $data = array(
        	'view'=> 'cadastro-de-equipamentos'
        );
        $this->load->view('template', $data);
    }*/
//##################	Marcas	################################# 
    public function index(){
	    $this->form_validation->set_rules('marca_nome', 'Nome', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			if(isset($dados['marca_status'])){
		    	$dados['marca_status'] = 1;
		    }else{
			    $dados['marca_status'] = 0;
		    }
		    
		    $this->marcas->insertMarca($dados);
			redirect(base_url('control/marcas?msg=success'));
		}
	    $marcas = $this->marcas->getAllMarcas();
	    $data = array(
		    'marcas'=> $marcas,
        	'view'=> 'gerenciar-marcas',
        );
        $this->load->view('template', $data);
    }
    public function editar(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['marca_status'])){
			    $dados['marca_status'] = 1;
		    }else{
			    $dados['marca_status'] = 0;
		    }
		    $this->marcas->updateMarca($dados);
		    redirect('/control/marcas?msg=edit');
	    }
	    $id = $this->uri->segment(4);
	    $marca = $this->marcas->getByIdMarca($id)->row();
	    $data = array(
		    'marca'=> $marca,
        	'view'=> 'editar-marca',
        );
        $this->load->view('template', $data);
    }
    public function excluir(){
	    $id = $this->uri->segment(4);
	    $sc = $this->marcas->deleteMarca($id);
	    redirect('/control/marcas?msg=delete');
    }
//##################	!Marcas 	 ##################################
//##################	Categorias	################################# 
    public function categoria(){
	    $this->form_validation->set_rules('mcategoria_nome', 'Nome', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			if(isset($dados['mcategoria_status'])){
		    	$dados['mcategoria_status'] = 1;
		    }else{
			    $dados['mcategoria_status'] = 0;
		    }
		    
		    $this->marcas->insertCategoria($dados);
			redirect(base_url('control/marcas/categoria?msg=success'));
		}
	    $marcas = $this->marcas->getAllCategoria();
	    $data = array(
		    'marcas'=> $marcas,
        	'view'=> 'gerenciar-categ-marca',
        );
        $this->load->view('template', $data);
    }
    public function editar_categoria(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['mcategoria_status'])){
		    	$dados['mcategoria_status'] = 1;
		    }else{
			    $dados['mcategoria_status'] = 0;
		    }
		    $this->marcas->updateCategoria($dados);
		    redirect('/control/marcas/categoria?msg=edit');
	    }
	    $id = $this->uri->segment(4);
	    $sc = $this->marcas->getByIdCategoria($id)->row();
	    $data = array(
		    'sc'=> $sc,
        	'view'=> 'editar-categ-marca',
        );
        $this->load->view('template', $data);
    }
    public function excluir_categoria(){
	    $id = $this->uri->segment(4);
	    $sc = $this->marcas->deleteCategoria($id);
	    redirect('/control/marcas/categoria?msg=delete');
    }
//##################	!Categorias 	 ##################################
}