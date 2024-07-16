<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipamentos extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->model("Equipamento_Model","equip");
        
        $this->load->library('form_validation');	//LIBRARYS
    }
    /*public function index()
    {
        $data = array(
        	'view'=> 'cadastro-de-equipamentos'
        );
        $this->load->view('template', $data);
    }*/
//##################	Sub-categorias	################################# 
    public function index(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['sc_status'])){
			    $dados['sc_status'] = 1;
		    }else{
			    $dados['sc_status'] = 0;
		    }
		    $this->equip->insertSC($dados);
		    redirect('/control/equipamentos?msg=cadastro');
	    }
	    $sc = $this->equip->getAllSC();
	    $data = array(
		    'sc'=> $sc,
        	'view'=> 'gerenciar-scategorias',
        );
        $this->load->view('template', $data);
    }
    public function editar_categoria(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['sc_status'])){
			    $dados['sc_status'] = 1;
		    }else{
			    $dados['sc_status'] = 0;
		    }
		    $this->equip->updateSC($dados);
		    redirect('/control/equipamentos?msg=edit');
	    }
	    $id = $this->uri->segment(4);
	    $sc = $this->equip->getByIdSC($id)->row();
	    $data = array(
		    'sc'=> $sc,
        	'view'=> 'editar-scategorias',
        );
        $this->load->view('template', $data);
    }
    public function excluir_categoria(){
	    $id = $this->uri->segment(4);
	    $sc = $this->equip->deleteSC($id);
	    redirect('/control/equipamentos?msg=delete');
    }
//##################	!Sub-categorias	##################################
//##################	Tipos			##################################    
    public function gerenciar_tipos(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['tipo_status'])){
			    $dados['tipo_status'] = 1;
		    }else{
			    $dados['tipo_status'] = 0;
		    }
		    $this->equip->insertT($dados);
		    redirect('/control/equipamentos/gerenciar-tipos/'.$this->uri->segment(4).'?msg=cadastro');
	    }
	    $id = $this->uri->segment(4);
	    $t = $this->equip->getAllT($id);
	    $data = array(
		    't'=> $t,
        	'view'=> 'gerenciar-t',
        );
        $this->load->view('template', $data);
    }
    public function editar_tipo(){
	    $id = $this->uri->segment(4);
	    $t = $this->equip->getByIdT($id)->row();
	    
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['tipo_status'])){
			    $dados['tipo_status'] = 1;
		    }else{
			    $dados['tipo_status'] = 0;
		    }
		    $this->equip->updateT($dados);
		    redirect('/control/equipamentos/gerenciar-tipos/'.$t->tipo_sc.'?msg=edit');
	    }
	    
	    $data = array(
		    't'=> $t,
        	'view'=> 'editar-t',
        );
        $this->load->view('template', $data);
    }
    public function excluir_tipo(){
	    $id = $this->uri->segment(4);
	    $t = $this->equip->getByIdT($id)->row();
	    $sc = $this->equip->deleteT($id);
	    redirect('/control/equipamentos/gerenciar-tipos/'.$t->tipo_sc.'?msg=delete');
    }
//##################	!Tipos			###################################
//##################	Equipamentos	###################################    
    public function gerenciar_equipamentos(){
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['equipamento_status'])){
			    $dados['equipamento_status'] = 1;
		    }else{
			    $dados['equipamento_status'] = 0;
		    }
		    $this->equip->insertE($dados);
		    redirect('/control/equipamentos/gerenciar-equipamentos/'.$this->uri->segment(4).'?msg=cadastro');
	    }
	    $id = $this->uri->segment(4);
	    $t = $this->equip->getAllE($id);
	    $data = array(
		    't'=> $t,
        	'view'=> 'gerenciar-e',
        );
        $this->load->view('template', $data);
    }
    public function editar_equipamento(){
	    $id = $this->uri->segment(4);
	    $t = $this->equip->getByIdE($id)->row();
	    
	    if(!empty($_POST)){
		    $dados = $this->input->post();
		    if(isset($dados['equipamento_status'])){
			    $dados['equipamento_status'] = 1;
		    }else{
			    $dados['equipamento_status'] = 0;
		    }
		    $this->equip->updateE($dados);
		    redirect('/control/equipamentos/gerenciar-equipamentos/'.$t->equipamento_tipo.'?msg=edit');
	    }
	    
	    $data = array(
		    't'=> $t,
        	'view'=> 'editar-e',
        );
        $this->load->view('template', $data);
    }
    public function excluir_equipamento(){
	    $id = $this->uri->segment(4);
	    $t = $this->equip->getByIdE($id)->row();
	    $sc = $this->equip->deleteE($id);
	    redirect('/control/equipamentos/gerenciar-equipamentos/'.$t->equipamento_tipo.'?msg=delete');
    }
//##################	!Equipamentos	###########################################
}