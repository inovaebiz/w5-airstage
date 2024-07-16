<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atendimento extends MY_Cliente
{
    public function __construct() {
        parent:: __construct();
        $this->load->model("usuario_model","usuario");
        $this->load->helper(array('form', 'url', 'noweb'));
        $this->load->model('Email_model', 'email');	
        $this->load->model("Pontos_Model","pontos");//	HELPERS
        $this->load->library('form_validation');	//LIBRARYS
        
        $this->load->model("Campanha_Model","campanha");
		$this->camp = $this->campanha->get_campanhas_ativas();
        
    }
    public function index() {
	    $pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
	    $id = $this->session->userdata("cliente")->cliente_id;
		$user = $this->usuario->getById($id);
		$cliente = $user->first_row();
	    $this->form_validation->set_rules('assunto', 'Assunto', 'required');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'required');
		if($this->form_validation->run()){
			$dados = $this->input->post();
			$email = array(
			    'nome' => $cliente->cliente_razao_social,
			    'email' => 'contato@familiafujitsu.com.br',
			    'subject' => $dados['assunto'],
		    );
		    $html = '';
		    $html .= '<html>
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
			                          <td class="content-cell">';
			$html .='<h1>Olá</h1><br>';
			$html .= '<p>Você tem uma nova mensagem de '.$cliente->cliente_razao_social.'!</p><br>';
			$html .= '<p>'.$cliente->cliente_email.'</p><br>';
			$html .= '<p>'.$dados['mensagem'].'</p><br>';
			$html .= '<p>Atenciosamente</p>';
			$html .= '					</td>
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

		    $this->email->send($email,$html);
			redirect(base_url('cliente/atendimento?msg=send'));
		}

        $data = array(
        	'view' => 'atendimento',
        	'pontuacao' => $pontuacao,
        	'camp' => $this->camp->first_row()
        );
        $this->load->view('cliente_template', $data);
    }
}