<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanha extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->helper(array('form', 'url', 'noweb'));
         $this->load->model("Campanha_Model","campanha");	//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
    }
    public function index()
    {
		$sql = "SELECT campanha_id, campanha_nome, campanha_status, campanha_data_inicial, campanha_data_final, campanha_data_inicial_resgate, campanha_data_final_resgate FROM campanhas";
				
		$this->form_validation->set_rules('campanha_nome', 'Nome da Campanha', 'required|is_unique[campanhas.campanha_nome]');
		$this->form_validation->set_rules('campanha_data_inicial', 'Data Inicial', 'required');
		$this->form_validation->set_rules('campanha_data_final', 'Data Final', 'required');
		$this->form_validation->set_rules('campanha_data_inicial_resgate', 'Data Inicial Resgate', 'required');
		$this->form_validation->set_rules('campanha_data_final_resgate', 'Data Final Resgate', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			$dados['campanha_status'] = 1;
			$dados['campanha_data_inicial'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_inicial'])));
			$dados['campanha_data_final'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_final'])));
			$dados['campanha_data_inicial_resgate'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_inicial_resgate'])));
			$dados['campanha_data_final_resgate'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_final_resgate'])));
			$this->campanha->insert($dados);
			redirect(base_url('control/campanha?msg=cadastrada'));
		}
		$campanhas = $this->campanha->getAll();
        $data = array(
        	'view'=> 'cadastro-de-campanha',
        	'campanhas' => $campanhas
        );
        $this->load->view('template', $data);
    }

    public function editar_campanha($id = NULL)
    {
        if(!empty($_POST)){
            $dados = $this->input->post();
            if(isset($dados['campanha_status'])){
                $dados['campanha_status'] = 1;
                $dados['campanha_data_inicial'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_inicial'])));
				$dados['campanha_data_final'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_final'])));
				$dados['campanha_data_inicial_resgate'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_inicial_resgate'])));
				$dados['campanha_data_final_resgate'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_final_resgate'])));
            }else{
                $dados['campanha_status'] = 0;
                $dados['campanha_data_inicial'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_inicial'])));
				$dados['campanha_data_final'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_final'])));
				$dados['campanha_data_inicial_resgate'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_inicial_resgate'])));
				$dados['campanha_data_final_resgate'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['campanha_data_final_resgate'])));
            }
            $this->campanha->update($dados);
            redirect('/control/campanha?msg=editar');
        }
        $id = $this->uri->segment(4);
        $campanhas = $this->campanha->getById($id)->row();
        $data = array(
            'campanhas'=> $campanhas,
            'view'=> 'editar-campanha'
        );
        $this->load->view('template', $data);
    }

    public function excluir_campanha(){
		$id = $this->uri->segment(4);
		if ($id != ''){
            $this->campanha->delete($id);
            redirect('control/campanha?msg=delete');
        }
	}

	public function encerrar_campanha() {
		$id = $this->uri->segment(4);
		if($id){
			$dados = array(
				'campanha_id' => $id,
				'campanha_status' => 0
			);
			$this->campanha->update($dados);
			redirect(base_url('/control/campanha?msg=campanha'));
		}
	}
	
}