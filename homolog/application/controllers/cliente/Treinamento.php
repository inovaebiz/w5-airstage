<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treinamento extends MY_Cliente
{
    public function __construct() {
        parent:: __construct();
        $this->load->model("Usuario_model","usuario");
        $this->load->model("Treinamento_Model","treinamento");
        $this->load->model("Obra_Model","obra");
        $this->load->model("Email_model","email");
        $this->load->model("Pontos_Model","pontos");
        $this->load->model("Campanha_Model","campanha");
        
        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
        $this->load->model("Campanha_Model","campanha");
		$this->camp = $this->campanha->get_campanhas_ativas();
        
    }
    
    public function index() {
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $id = $this->session->userdata("cliente")->cliente_id;
		$treinamento = $this->treinamento->getByIdCliente($id);
        $data = array(
        	'view' => 'registro-de-treinamentos',
        	'treinamento' => $treinamento,
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
    
     public function detalhe_treinamento() {
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $id = $this->uri->segment(4);
		$treinamento = $this->treinamento->getById($id);
		$treinamento = $treinamento->first_row();
        $data = array(
        	'view' => 'registro-de-treinamentos-detalhe',
        	'treinamento' => $treinamento,
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
     public function cadastro_treinamento() {
	    $this->form_validation->set_rules('treinamento_nome', 'Nome', 'required');
	    if($this->form_validation->run()){
		    $dados = $this->input->post();
		    $site = $this->obra->getSite()->row();
		    $dados['treinamento_pontos'] = $site->t_pontos;
		    $dados['treinamento_data'] = date('Y-m-d', strtotime(str_replace('/', '-', $dados['treinamento_data'])));
		    if($_FILES['treinamento_anexo_comprovante']['name'] != ''){
                $imagem = upload_('treinamento_anexo_comprovante');
                $dados['treinamento_anexo_comprovante'] = $imagem;
            }
		    $this->treinamento->insert($dados);

		    ////////////////////

		    // $msg = "<p>Olá</p>";
		    // $msg .= "<p>Você tem um novo treinamento a aprovar.</p>";
		    // $msg .= "<p><a target='_blank' href='".base_url('/control/pontos/treinamentos')."'>Veja por aqui.</a></p>";
		    
		    $msg = '<html>
	        <body>
	          <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
	            <tr>
	              <td align="center">
	                <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
	                  <tr>
	                    <td class="email-masthead">
	                      <a href="https://familiaairstage.com.br/" class="email-masthead_name"><img src="https://familiaairstage.com.br/assets-control/img/template-header.jpg"></a>
	                    </td>
	                  </tr>
	                  <!-- Email Body -->
	                  <tr>
	                    <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
	                      <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
	                        <!-- Body content -->
	                        <tr>
	                          <td class="content-cell">
	                            <p>Olá</p>
	                            <p>Você tem um novo treinamento a aprovar.</p>
	                            <p><a target="_blank" href="' . base_url('/control/pontos/treinamentos') . '">Veja por aqui.</a></p>
	                          </td>
	                        </tr>
	                      </table>
	                    </td>
	                  </tr>
	                  <tr>
	                    <td>
	                      <table class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0">
	                        <tr>
	                          <td class="content-cell" align="center">
	                            <img src="https://familiaairstage.com.br/assets-control/img/template-footer.jpg">
	                            <p class="sub align-center">&copy; 2023 Família Airstage. Todos os direitos reservados.</p>
	                          </td>
	                        </tr>
	                      </table>
	                    </td>
	                  </tr>
	                </table>
	              </td>
	            </tr>
	          </table>
	        </body>
	      </html>';

		    $email = array(
			    'nome' => 'Familia Airstage',
			    'email' => 'contato@familiafujitsu.com.br',
			    'subject' => 'Novo treinamento cadastrado'
		    );
		    $this->email->send($email, $msg);
		    redirect('/cliente/treinamento?msg=cadastrar');
	    }
	    
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $id = $this->session->userdata("cliente")->cliente_id;
		$user = $this->usuario->getById($id);
		$cliente = $user->first_row();
		
		$campanha = $this->campanha->get_campanhas_ativas();
		$datas_campanha = array();
		foreach($campanha->result() as $cc):
			if(strtotime($cc->campanha_data_final) < strtotime(date('Y-m-d')))
				continue;
			if($cc->campanha_status != 1)
				continue;
			if(strtotime($cc->campanha_data_final) > strtotime($cc->campanha_data_inicial)){
				$start = strtotime($cc->campanha_data_inicial);
				$end = strtotime($cc->campanha_data_final);
				while($start <= $end){
					$datas_campanha[] = date('Y/m/d', $start);
					$start = strtotime('+ 1 day', $start);
				}
			}
		endforeach;
		
		
		if(!empty($datas_campanha)){
			$datas_campanha = '"' . implode('","', $datas_campanha) . '"';
		}else{
			$datas_campanha = "3000-10-10";
		}
		
        $data = array(
        	'view' => 'registro-de-treinamentos-cadastre',
        	'cliente' => $cliente,
        	'datas_campanha' => $datas_campanha,
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
    public function deletar_treinamento(){
	    $id = $this->uri->segment(4);
	    if(!is_numeric($id)){
		    redirect('/cliente/treinamento/');
	    }
	    $treinamento = $this->treinamento->getById($id);
	    
	    if($treinamento->num_rows() == 1){
		    $treinamento = $treinamento->row();
	    }else{
		    redirect('/cliente/treinamento');
	    }
	    
	    $this->treinamento->delete($treinamento->treinamento_id);
	    redirect('/cliente/treinamento?msg=delete');
    }
    }