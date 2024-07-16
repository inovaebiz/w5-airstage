<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resgate extends MY_Cliente
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Usuario_model","usuario");
		$this->load->model("Resgate_Model", "resgate");
		$this->load->model("Pontos_Model", "pontos");
		$this->load->model("Email_model", "email");

		$this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
		$this->load->library('form_validation');	//LIBRARYS
		$this->load->model("Campanha_Model", "campanha");
		$this->camp = $this->campanha->get_campanhas_ativas();
	}
	public function index()
	{
		if (!empty($_POST)) {

			$dados = $this->input->post();
			$p = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
			
			if ($p->saldo < $dados['resgate_pontos']) {
				echo '<script>';
				echo 'alert("Você não possui pontos o suficiente!")';
				echo '</script>';
			} 
			else {

				$pontos = array(
					'ps_cliente_id' => $this->session->userdata('cliente')->cliente_id,
					'ps_pontos' => ($dados['resgate_pontos'] * -1),
					'ps_msg' => 'Resgate #' . $dados['resgate_id'],
				);
				$this->pontos->insert($pontos);

				$ru = array(
					'ru_cliente_id' => $this->session->userdata('cliente')->cliente_id,
					'ru_resgate_id' => $dados['resgate_id'],
				);
				$this->pontos->insertRU($ru);

				////////////////////

				// $msg = "<p>Olá</p>";
				// $msg .= "<p>Você tem um novo resgate a aprovar.</p>";
				// $msg .= "<p><a target='_blank' href='" . base_url('/control/resgate/aprovar-resgates') . "'>Veja por aqui.</a></p>";

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
										<p>Você tem um novo resgate a aprovar.</p>
										<p><a target="_blank" href="' . base_url('/control/resgate/aprovar-resgates') . '">Veja por aqui.</a></p>
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
					'subject' => 'Novo resgate cadastrado',
				);
				$this->email->send($email, $msg);
				/////////////////////////////////
				echo '<script>';
				echo 'alert("Resgate realizado com sucesso!")';
				echo '</script>';
			}
		}

		$camp_id = $this->camp->row() ? $this->camp->row()->campanha_id : 0;

		$resgates = $this->resgate->getByStatus($camp_id, $this->session->userdata('cliente')->cliente_credenciado);

		$pontos = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
		$pages = $this->usuario->getSitePage();

		$data = array(
			'view' => 'resgate-seus-premios',
			'resgates' => $resgates,
			'pontos' => $pontos,
			'pontuacao' => $pontos,
			'pages' => $pages,
			'camp' => $this->camp->first_row()
		);
		$this->load->view('cliente_template', $data);
	}
	public function meus_resgates()
	{
		$cliente = $this->session->userdata('cliente')->cliente_id;
		$resgates = $this->pontos->getRUByUser($cliente);
		$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
		$pages = $this->usuario->getSitePage();
		
		$data = array(
			'view' => 'meus-resgates',
			'resgates' => $resgates,
			'pontuacao' => $pontuacao,
			'pages' => $pages,
			'camp' => $this->camp->first_row()
		);
		$this->load->view('cliente_template', $data);
	}
}
