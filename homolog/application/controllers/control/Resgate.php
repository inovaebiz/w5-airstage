<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resgate extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url', 'noweb'));
		$this->load->model("Resgate_Model", "resgate"); //	HELPERS
		$this->load->model("Resgate_Usuario_Model", "resgate_usuario");
		$this->load->model("Pontos_Model", "pontos");
		$this->load->model("Campanha_Model", "campanha");
		$this->load->model("Email_model", "email");
		$this->load->model("usuario_model", "usuario");

		$this->load->library('form_validation');	//LIBRARYS
	}

	public function index()
	{
		$dados = $this->input->post();
		$this->form_validation->set_rules('resgate_nro_estrelas', 'Estrelas', 'required');
		$this->form_validation->set_rules('resgate_valor_premio', 'Valor do Prêmio', 'required');
		$this->form_validation->set_rules('resgate_pontos', 'Pontos', 'required');
		if ($this->form_validation->run()) {

			$dados = $this->input->post();
			$this->resgate->insert($dados);
			redirect(base_url('control/resgate?msg=cadastrado'));
		}
		$c = '0';
		if (isset($_GET['c'])) {
			$c = $_GET['c'];
		}
		$resgates = $this->resgate->getAll($c);
		$campanhas = $this->campanha->getAll();
		$data = array(
			'view' => 'cadastro-de-resgate',
			'resgates' => $resgates,
			'campanhas' => $campanhas
		);
		$this->load->view('template', $data);
	}

	public function status()
	{
		$id = $this->uri->segment(4);
		$resgate = $this->resgate->getById($id);
		$resgate = $resgate->first_row();
		if ($resgate->resgate_status == 1) {
			$status = array(
				'resgate_id' => $resgate->resgate_id,
				'resgate_status' => 0
			);
		} else {
			$status = array(
				'resgate_id' => $resgate->resgate_id,
				'resgate_status' => 1
			);
		}
		$this->resgate->update($status);
		redirect(base_url('control/resgate/'));
	}

	public function aprovar_resgates()
	{
		$resgates = $this->pontos->getRUByUser(NULL, "0");
		$status = $this->usuario->getAllMR();
		$empresas = $this->usuario->getEmpresas();

		$data = array(
			'view' => 'resgates-pendentes',
			'resgates' => $resgates,
			'status' => $status,
			'empresas' => $empresas
		);
		$this->load->view('template', $data);
	}

	public function aprovar()
	{
		
		if (!empty($_POST)) {
		
			$d = $this->input->post();
			$resgates = $this->pontos->getRUByUser(NULL, NULL, $d['id'])->row();

			$data = array(
				'ru_id' => $d['id'],
				'ru_status' => $d['status']
			);
			$this->pontos->updateRU($data);
			////////////////////
			
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
		                            <p>Seu resgate foi aprovado.</p>
		                            <p>Em caso de algum problema com estoque entraremos em contato.</p>
		                            <p><a target="_blank" href="' . base_url('/cliente/pontuacao') . '">Veja por aqui.</a></p>
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
				'nome' => $resgates->cliente_razao_social,
				'email' => $resgates->cliente_email,
				'subject' => 'Resgate aprovado',
			);
			
			$this->email->send($email, $msg);
			/////////////////////////////////

			$dados_atualizados = $this->resgate_usuario->getRegistrosAtualizados();
			
			// Retorne a resposta em formato JSON
			// $response = array(
			//	'status' => 'success',
			// );
			echo json_encode($dados_atualizados);		
			
		} else {

			// Retorne a resposta em formato JSON
			$response = array(
				'status' => 'error',
			);
			echo json_encode($response);

		}

	}

	public function reprovar()
	{
		
		if (!empty($_POST)) {
		
			$d = $this->input->post();
			$resgates = $this->pontos->getRUByUser(NULL, NULL, $d['id'])->row();

			$data = array(
				'ru_id' => $d['id'],
				'ru_status' => $d['status'],
				'motivos_de_recusa' => $d['motivo']
			);
			$this->pontos->updateRecusar($data, $resgates);
			////////////////////
			
			// $msg = "<p>Olá</p>";
			// $msg .= "<p>Você tem uma nova obra a aprovar.</p>";
			// $msg .= "<p><a target='_blank' href='" . base_url('/control/pontos/obras') . "'>Veja por aqui.</a></p>";

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
		                            <p>Infelizmente seu resgate foi reprovado e segue abaixo o motivo:</p>
		                            <p>'.$data['motivos_de_recusa'].'</p>
		                            <p><a target="_blank" href="' . base_url('/cliente/pontuacao') . '">Veja por aqui.</a></p>
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
				'nome' => $resgates->cliente_razao_social,
				'email' => $resgates->cliente_email,
				'subject' => 'Resgate reprovado',
			);
			
			$this->email->send($email, $msg);
			/////////////////////////////////

			$dados_atualizados = $this->resgate_usuario->getRegistrosAtualizados();
			
			// Retorne a resposta em formato JSON
			// $response = array(
			//	'status' => 'success',
			// );
			echo json_encode($dados_atualizados);
		
		} else {

			// Retorne a resposta em formato JSON
			$response = array(
				'status' => 'error',
			);
			echo json_encode($response);

		}

	}

}