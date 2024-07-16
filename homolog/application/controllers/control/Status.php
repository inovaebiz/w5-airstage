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
//##################    Status  ################################# 
    public function index() {
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    $this->usuario->insertMR($dados);
		    redirect('control/status/?msg=cadastro');
	    }
	    $categorias = $this->usuario->getByStatusMrCategoria();
        $status = $this->usuario->getAllMR();
        $data = array(
        	'categorias' => $categorias,
        	'mr' => $status,
            'view' => 'cadastro-de-status',
        );
        $this->load->view('template', $data);
    }
    public function editar(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
            if(isset($dados['mr_status'])) {
                $dados['mr_status'] = 1;
            } else {
                $dados['mr_status'] = 0;
            }
		    $this->usuario->updateMR($dados);
		    redirect('control/status/?msg=editar');
	    }
        $categorias = $this->usuario->getByStatusMrCategoria();
	    $id = $this->uri->segment(4);
	    $status = $this->usuario->getAllMR(NULL, $id)->row();
	    $data = array(
            'categorias' => $categorias,
        	'mr' => $status,
            'view' => 'editar-mr',
        );
        $this->load->view('template', $data);
    }
    public function exclui(){
	    $id = $this->uri->segment(4);
	    $this->usuario->deleteMR($id);
		redirect('control/status/?msg=delete');
    }
//##################    !Status      ##################################
//##################    Categorias  #################################
    public function categoria(){
        $this->form_validation->set_rules('mr_categoria_nome', 'Nome', 'required');
        if($this->form_validation->run()){
            $dados = $this->input->post();
            if(isset($dados['mr_categoria_status'])){
                $dados['mr_categoria_status'] = 1;
            }else{
                $dados['mr_categoria_status'] = 0;
            }
            
            $this->usuario->insertMrCategoria($dados);
            redirect(base_url('control/status/categoria?msg=cadastro'));
        }
        $usuario = $this->usuario->getAllMrCategoria();
        $data = array(
            'usuario'=> $usuario,
            'view'=> 'gerenciar-categ-motivos-de-recusa',
        );
        $this->load->view('template', $data);
    }
    public function editar_categoria(){
        if(!empty($_POST)){
            $dados = $this->input->post();
            if(isset($dados['mr_categoria_status'])){
                $dados['mr_categoria_status'] = 1;
            }else{
                $dados['mr_categoria_status'] = 0;
            }
            $this->usuario->updateMrCategoria($dados);
            redirect('/control/status/categoria?msg=editar');
        }
        $id = $this->uri->segment(4);
        $usuario = $this->usuario->getByIdMrCategoria($id)->row();
        $data = array(
            'usuario'=> $usuario,
            'view'=> 'editar-categ-motivos-de-recusa',
        );
        $this->load->view('template', $data);
    }
    public function excluir_categoria(){
        $id = $this->uri->segment(4);
        $usuario = $this->usuario->deleteMrCategoria($id);
        redirect('/control/status/categoria?msg=delete');
    }
//##################    !Categorias      ##################################
}