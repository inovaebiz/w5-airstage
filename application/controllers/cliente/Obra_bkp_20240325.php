<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra extends MY_Cliente
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Usuario_model", "usuario");
		$this->load->model("Obra_Model", "obra");
		$this->load->model("Treinamento_Model", "treinamento");
		$this->load->model("Equipamento_Model", "equip");
		$this->load->model("Marcas_Model", "marcas");
		$this->load->model("Email_model", "email");
		$this->load->model("Pontos_Model", "pontos");
		$this->load->model("Campanha_Model", "campanha");

		// Carrega o arquivo de configuração de e-mail
        $this->config->load('email');

        $this->load->helper(array('form', 'url', 'noweb'));	//	HELPERS
		$this->load->library('form_validation');	//LIBRARYS
		$this->camp = $this->campanha->get_campanhas_ativas();
	}

	public function index()
	{
		$id = $this->session->userdata("cliente")->cliente_id;
		$obras = $this->obra->getByIdClienteObra($id);
		$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
		$mot = $this->obra->getAllMotivo();
		$data = array(
			'view' => 'registro-de-obras-listagem',
			'obras' => $obras,
			'pontuacao' => $pontuacao,
			'mot' => $mot,
			'camp' => $this->camp->first_row()
		);
		$this->load->view('cliente_template', $data);
	}

	public function visualizar()
	{
		$site = $this->obra->getSite()->row();
		$id = $this->uri->segment(4);
		$obra = $this->obra->getById($id);
		$obra = $obra->first_row();

		$ok = $this->obra->getOK($obra->obra_id);
		$oe = array();

		foreach ($ok->result() as $okItem) :
			$oe[$okItem->ok_id] = $this->obra->getOEByOK($okItem->ok_id);
		endforeach;

		$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();

		$oee = $this->obra->getOEE($obra->obra_id);
		$data = array(
			'view' => 'registro-de-obras-detalhe',
			'obra' => $obra,
			'oe' => $oe,
			'ok' => $ok,
			'oee' => $oee,
			'site' => $site,
			'pontuacao' => $pontuacao,
			'camp' => $this->camp->first_row()
		);
		$this->load->view('cliente_template', $data);
	}

	public function deletarequipamentoexterno() //	obra_equipamento_externo
	{
		$site = $this->obra->getSite()->row();
		$idequipamento = $this->uri->segment(5);
		$this->obra->deleteequipamentoexterno($idequipamento);
		$id = $this->uri->segment(4);

		$obra = $this->obra->getById($id);
		$obra = $obra->first_row();

		$ok = $this->obra->getOK($obra->obra_id);
		$oe = array();

		foreach ($ok->result() as $okItem) :
			$oe[$okItem->ok_id] = $this->obra->getOEByOK($okItem->ok_id);
		endforeach;

		$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();

		$oee = $this->obra->getOEE($obra->obra_id);
		$data = array(
			'view' => 'registro-de-obras-detalhe',
			'obra' => $obra,
			'oe' => $oe,
			'ok' => $ok,
			'oee' => $oee,
			'site' => $site,
			'pontuacao' => $pontuacao,
			'camp' => $this->camp->first_row()
		);
		$this->load->view('cliente_template', $data);
	}

	public function deletarequipamentokit() //	obra_kit
	{
		$site = $this->obra->getSite()->row();
		$idequipamento = $this->uri->segment(5);
		$this->obra->deleteequipamentokit($idequipamento);
		$id = $this->uri->segment(4);

		$obra = $this->obra->getById($id);
		$obra = $obra->first_row();

		$ok = $this->obra->getOK($obra->obra_id);
		$oe = array();

		foreach ($ok->result() as $okItem) :
			$oe[$okItem->ok_id] = $this->obra->getOEByOK($okItem->ok_id);
		endforeach;

		$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();

		$oee = $this->obra->getOEE($obra->obra_id);
		$data = array(
			'view' => 'registro-de-obras-detalhe',
			'obra' => $obra,
			'oe' => $oe,
			'ok' => $ok,
			'oee' => $oee,
			'site' => $site,
			'pontuacao' => $pontuacao,
			'camp' => $this->camp->first_row()
		);
		$this->load->view('cliente_template', $data);
	}

	public function cadastrar()
	{
		if (!empty($_POST)) {

			$d = $this->input->post();
			$obra = array(
				'obra_cliente_id' => $this->session->userdata("cliente")->cliente_id,
				'obra_data' => date('Y-m-d', strtotime(str_replace('/', '-', $d['obra_data']))),
				'obra_nome' => $d['obra_nome'],
				'obra_cliente' => $d['obra_cliente'],
				'obra_data_instalacao' => date('Y-m-d', strtotime(str_replace('/', '-', $d['obra_data_instalacao']))),
				'obra_distribuidor' => $d['obra_distribuidor'],
				// 'obra_cidade' => $d['obra_cidade'],
				// 'obra_estado' => $d['obra_estado'],
				// 'obra_cep' => $d['obra_cep'],
				// 'obra_endereco' => $d['obra_endereco'],
				// 'obra_numero' => $d['obra_numero'],
				// 'obra_complemento' => $d['obra_complemento'],
				// 'obra_bairro' => $d['obra_bairro'],
				// 'obra_aplicacao' => $d['obra_aplicacao'],
				'obra_nome_instalador_vendedor_responsavel' => $d['obra_nome_instalador_vendedor_responsavel'],
				'obra_cpf_instalador_vendedor_responsavel' => $d['obra_cpf_instalador_vendedor_responsavel'],
				// 'obra_projetista' => $d['obra_projetista'],
				// 'obra_nota_fiscal_data_distribuidor' => date('Y-m-d', strtotime( str_replace('/', '-',$d['obra_nota_fiscal_data_distribuidor']))),
			);
			
			$dire_uploads = './uploads/';

			// Verificar se o diretório uploads existe
			if (!is_dir($dire_uploads)) {

				// Se não existir, tentar criar o diretório
				if (!mkdir($dire_uploads, 0777, true)) {

					// Se a criação falhar, exibir uma mensagem de erro
					show_error('Não foi possível criar o diretório.');

				}

			}
			// echo "Diretório verificado e criado com sucesso!";
			
			if ($_FILES['obra_anexo_nota_fiscal_venda']['name'] != '') {
				$imagem = upload_('obra_anexo_nota_fiscal_venda');
				$obra['obra_anexo_nota_fiscal_venda'] = $imagem;
			}

			if ($_FILES['obra_anexo_nota_fiscal_instalacao']['name'] != '') {
				$imagem = upload_('obra_anexo_nota_fiscal_instalacao');
				$obra['obra_anexo_nota_fiscal_instalacao'] = $imagem;
			}

			$id = $this->obra->insert($obra);
			$serials = $this->input->post('nSerie');
			$prods = $this->input->post('equipamento');

			$serialCateg = $this->input->post('eSerie');
			$categ = $this->input->post('categ');

			$kit = $this->input->post('kit-list');
			$kit = str_replace(' ', '', $kit);

			$kit = explode(',', $kit);

			$pontos = 0;
			$reais = 0;
			$pSC = array();
			$pT = array();
			$j = 0;

			for ($i = 0; $i < count($categ); $i++) {
				$kit_cond = array(
					'ok_obra_id' => $id,
					'ok_condensador_id' => $categ[$i],
					'ok_serial' => $serialCateg[$i],
				);
				$cond_id = $this->obra->insertOK($kit_cond);
				$condData = $this->obra->getOK($id)->result();

				$this->equip->updatecondesadora($serialCateg[$i], $condData[$i]->tipo_nome);

				//pontos
				$tempOK = $this->equip->getTipoFull($categ[$i])->row();
				$pontos = $pontos + $tempOK->tipo_pontos;
				$reais = $reais + $tempOK->tipo_reais;

				$j2 = $kit[$i] + $j;

				for ($j; $j < $j2; $j++) {
					$prods_insert = array(
						'oe_obra' => $id,
						'oe_produto_id' => $prods[$j],
						'oe_produto_serial' => $serials[$j],
						'oe_ok_id' => $cond_id,
					);
					$this->obra->insertOE($prods_insert);
				}
			}

			// $marcas = $this->input->post('oee_marca');
			$categs = $this->input->post('oee_categoria');
			$qtds = $this->input->post('oee_qtd');

			$site = $this->obra->getSite()->row();

			/*
			for ($i = 0; $i < count($marcas); $i++) {

				$rel = array(
					'oee_obra' => $id,
					'oee_marca' => $marcas[$i],
					'oee_categoria' => $categs[$i],
					'oee_qtd' => $qtds[$i],
				);
				$this->obra->insertOEE($rel);
			}
			*/

			$up = array(
				"obra_id" => $id,
				"obra_pontos" => $pontos,
				"obra_reais" => $reais,
			);

			// Se a data da $obra for menor ou igual a 01/12 o saldo é 0

			// Convertendo a string da data para um objeto DateTime
			$dataObra = new DateTime($obra['obra_data_instalacao']);
			$dataLimite = new DateTime('2023-12-01');

			// Comparando as datas
			if ($dataObra < $dataLimite) {
				$up['obra_reais'] = 0;
			}

			$this->obra->update($up);

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
											<p>Você tem uma nova obra a aprovar.</p>
											<p><a target="_blank" href="' . base_url('/control/pontos/obras') . '">Veja por aqui.</a></p>
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
			
			// Variaveis para do configurações de e-mail
			$from_name = $this->config->item('from_name');
			$from_email = $this->config->item('from_email');
			$subject_prefix = $this->config->item('subject_prefix');

			$email = array(
				'nome' => $from_name,
				'email' => $from_email,
				'subject' => $subject_prefix,
			);
			
			$this->email->send($email, $msg);
			/////////////////////////
			redirect('cliente/obra?msg=cadastrar');

		} else {

			$categorias = $this->equip->getAllSC("1");
			$cliente = $this->session->userdata("cliente");
			$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
			$marcas = $this->marcas->getAllMarcas("1");
			$categs = $this->marcas->getAllCategoria(NULL, "1");
			$site = $this->obra->getSite()->row();
			$campanha = $this->campanha->get_campanhas_ativas();
			$datas_campanha = array();
			foreach ($campanha->result() as $cc) :
				if (strtotime($cc->campanha_data_final) < strtotime(date('Y-m-d')))
					continue;
				if ($cc->campanha_status != 1)
					continue;
				if (strtotime($cc->campanha_data_final) > strtotime($cc->campanha_data_inicial)) {
					$start = strtotime($cc->campanha_data_inicial);
					$end = strtotime($cc->campanha_data_final);
					while ($start <= $end) {
						$datas_campanha[] = date('Y/m/d', $start);
						$start = strtotime('+ 1 day', $start);
					}
				}
			endforeach;

			if (!empty($datas_campanha)) {
				$datas_campanha = '"' . implode('","', $datas_campanha) . '"';
			} else {
				$datas_campanha = "3000-10-10";
			}

			$data = array(
				'view' => 'cadastre-sua-obra',
				'cats' => $categorias,
				'cliente' => $cliente,
				'marcas' => $marcas,
				'categs' => $categs,
				'site' => $site,
				'pontuacao' => $pontuacao,
				'camp' => $this->camp->first_row(),
				'datas_campanha' => $datas_campanha,
			);
			$this->load->view('cliente_template', $data);
		}
	}

	public function getevaporadoradores()
	{
		// $dis = $this->uri->segment(5);
		$dados = $this->input->post();
		$evap = $this->equip->getevaporadora($dados['serie'], $dados['dist']);

		echo json_encode($evap->result());
	}

	public function getnotafiscal()
	{
		// $dis = $this->uri->segment(5);
		$dados = $this->input->post();
		$evap = $this->equip->getevaporadoranotafiscal($dados['nota_fiscal'], $dados['dist']);
		$cond = $this->equip->getcondesadoranotafiscal($dados['nota_fiscal'], $dados['dist']);

		echo json_encode([$evap->result(), $cond->result()]);
	}

	public function getcondensadores()
	{
		// $dis = $this->uri->segment(5);
		$dados = $this->input->post();
		$evap = $this->equip->getcondesadora($dados['serie'], $dados['modelo']);

		echo json_encode($evap->result());
	}

	public function editar()
	{		
		$id = $this->uri->segment(4);
		$obraedit = $this->obra->getById($id);

		$ok = $this->obra->getOK($id);
		$oke = $this->obra->getOE($id);
		$oe = array();

		foreach ($ok->result() as $okItem) :
			$oe[$okItem->ok_id] = $this->obra->getOEByOK($okItem->ok_id);
		endforeach;

		$oee = $this->obra->getOEE($id);

		if (!empty($_POST)) {

			$d = $this->input->post();
			$obra = array(
				'obra_cliente_id' => $this->session->userdata("cliente")->cliente_id,
				'obra_data' => date('Y-m-d', strtotime(str_replace('/', '-', $d['obra_data']))),
				'obra_nome' => $d['obra_nome'],
				'obra_cliente' => $d['obra_cliente'],
				'obra_data_instalacao' => date('Y-m-d', strtotime(str_replace('/', '-', $d['obra_data_instalacao']))),
				'obra_distribuidor' => $d['obra_distribuidor'],
				// 'obra_cidade' => $d['obra_cidade'],
				// 'obra_estado' => $d['obra_estado'],
				// 'obra_cep' => $d['obra_cep'],
				// 'obra_endereco' => $d['obra_endereco'],
				// 'obra_numero' => $d['obra_numero'],
				// 'obra_complemento' => $d['obra_complemento'],
				// 'obra_bairro' => $d['obra_bairro'],
				// 'obra_aplicacao' => $d['obra_aplicacao'],
				'obra_nome_instalador_vendedor_responsavel' => $d['obra_nome_instalador_vendedor_responsavel'],
				'obra_cpf_instalador_vendedor_responsavel' => $d['obra_cpf_instalador_vendedor_responsavel'],
				// 'obra_projetista' => $d['obra_projetista'],
				// 'obra_nota_fiscal_data_distribuidor' => date('Y-m-d', strtotime( str_replace('/', '-',$d['obra_nota_fiscal_data_distribuidor']))),
			);
			
			$dire_uploads = './uploads/';

			// Verificar se o diretório uploads existe
			if (!is_dir($dire_uploads)) {

				// Se não existir, tentar criar o diretório
				if (!mkdir($dire_uploads, 0777, true)) {

					// Se a criação falhar, exibir uma mensagem de erro
					show_error('Não foi possível criar o diretório.');

				}

			}
			// echo "Diretório verificado e criado com sucesso!";
			
			if ($_FILES['obra_anexo_nota_fiscal_venda']['name'] != '') {
				$imagem = upload_('obra_anexo_nota_fiscal_venda');
				$obra['obra_anexo_nota_fiscal_venda'] = $imagem;
			}

			if ($_FILES['obra_anexo_nota_fiscal_instalacao']['name'] != '') {
				$imagem = upload_('obra_anexo_nota_fiscal_instalacao');
				$obra['obra_anexo_nota_fiscal_instalacao'] = $imagem;
			}

			$id = $this->obra->insert($obra);
			$serials = $this->input->post('nSerie');
			$prods = $this->input->post('equipamento');

			$serialCateg = $this->input->post('eSerie');
			$categ = $this->input->post('categ');

			$kit = $this->input->post('kit-list');
			$kit = str_replace(' ', '', $kit);

			$kit = explode(',', $kit);

			$pontos = 0;
			$reais = 0;
			$pSC = array();
			$pT = array();
			$j = 0;

			for ($i = 0; $i < count($categ); $i++) {
				$kit_cond = array(
					'ok_obra_id' => $id,
					'ok_condensador_id' => $categ[$i],
					'ok_serial' => $serialCateg[$i],
				);
				$cond_id = $this->obra->insertOK($kit_cond);
				$condData = $this->obra->getOK($id)->result();

				$this->equip->updatecondesadora($serialCateg[$i], $condData[$i]->tipo_nome);

				//pontos
				$tempOK = $this->equip->getTipoFull($categ[$i])->row();
				$pontos = $pontos + $tempOK->tipo_pontos;
				$reais = $reais + $tempOK->tipo_reais;

				$j2 = $kit[$i] + $j;

				for ($j; $j < $j2; $j++) {
					$prods_insert = array(
						'oe_obra' => $id,
						'oe_produto_id' => $prods[$j],
						'oe_produto_serial' => $serials[$j],
						'oe_ok_id' => $cond_id,
					);
					$this->obra->insertOE($prods_insert);
				}
			}

			// $marcas = $this->input->post('oee_marca');
			$categs = $this->input->post('oee_categoria');
			$qtds = $this->input->post('oee_qtd');

			$site = $this->obra->getSite()->row();

			/*
			for ($i = 0; $i < count($marcas); $i++) {

				$rel = array(
					'oee_obra' => $id,
					'oee_marca' => $marcas[$i],
					'oee_categoria' => $categs[$i],
					'oee_qtd' => $qtds[$i],
				);
				$this->obra->insertOEE($rel);
			}
			*/

			$up = array(
				"obra_id" => $id,
				"obra_pontos" => $pontos,
				"obra_reais" => $reais,
			);

			// Se a data da $obra for menor ou igual a 01/12 o saldo é 0

			// Convertendo a string da data para um objeto DateTime
			$dataObra = new DateTime($obra['obra_data_instalacao']);
			$dataLimite = new DateTime('2023-12-01');

			// Comparando as datas
			if ($dataObra < $dataLimite) {
				$up['obra_reais'] = 0;
			}

			$this->obra->update($up);

			////////////////////

			// $msg = "<p>Olá</p>";
			// $msg .= "<p>Você tem uma obra atualizada a aprovar.</p>";
			// $msg .= "<p><a target='_blank' href='" . base_url('/control/pontos/liberacao_obras/' . $id) . "'>Veja por aqui.</a></p>";

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
											<p>Você tem uma obra atualizada a aprovar.</p>
											<p><a target="_blank" href="' . base_url('/control/pontos/liberacao_obras/' . $id) . '">Veja por aqui.</a></p>
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
			
			// Variaveis para do configurações de e-mail
			$from_name = $this->config->item('from_name');
			$from_email = $this->config->item('from_email');
			$subject_prefix = $this->config->item('subject_prefix');

			$email = array(
				'nome' => $from_name,
				'email' => $from_email,
				'subject' => $subject_prefix,
			);
			
			$this->email->send($email, $msg);
			/////////////////////////
			redirect('cliente/obra?msg=editar');

		} else {

			$categorias = $this->equip->getAllSC("1");
			$cliente = $this->session->userdata("cliente");
			$pontuacao = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
			$marcas = $this->marcas->getAllMarcas("1");
			$categs = $this->marcas->getAllCategoria(NULL, "1");
			$site = $this->obra->getSite()->row();
			$campanha = $this->campanha->get_campanhas_ativas();
			$datas_campanha = array();
			foreach ($campanha->result() as $cc) :
				if (strtotime($cc->campanha_data_final) < strtotime(date('Y-m-d')))
					continue;
				if ($cc->campanha_status != 1)
					continue;
				if (strtotime($cc->campanha_data_final) > strtotime($cc->campanha_data_inicial)) {
					$start = strtotime($cc->campanha_data_inicial);
					$end = strtotime($cc->campanha_data_final);
					while ($start <= $end) {
						$datas_campanha[] = date('Y/m/d', $start);
						$start = strtotime('+ 1 day', $start);
					}
				}
			endforeach;

			if (!empty($datas_campanha)) {
				$datas_campanha = '"' . implode('","', $datas_campanha) . '"';
			} else {
				$datas_campanha = "3000-10-10";
			}

			$data = array(
				'view' => 'cadastre-sua-obra',
				'cats' => $categorias,
				'cliente' => $cliente,
				'marcas' => $marcas,
				'categs' => $categs,
				'site' => $site,
				'oe' => $oe,
				'ok' => $ok,
				'oee' => $oee,
				'oke' => $oke,
				'pontuacao' => $pontuacao,
				'camp' => $this->camp->first_row(),
				'datas_campanha' => $datas_campanha,
			);
			$this->load->view('cliente_template', $data);
		}
	}

	public function excluir($id)
	{
		$query = $this->obra->getOK($id)->result();

		echo "<pre>";
		echo print_r($query);
		echo "</pre>";

		foreach ($query as $row) {

			$ok_id = $row->ok_id;
			$produto = $row->tipo_nome;
			$serie = $row->ok_serial;

			echo "<pre>";
			// echo print_r($ok_id);
			echo "<br />";
			// echo print_r($ok_obra_id);
			echo "<br />";
			echo print_r($produto);
			echo "<br />";
			echo print_r($serie);
			echo "</pre>";

			// Chama o método no arquivo Obra_Model.php para excluir a obra
			$this->obra->deletarobra($id);

			// Chama o método no arquivo Equipamento_Model.php para atualizar o status do is_used
			$this->equip->updatecondesadoraLiberar($serie, $produto);
		
		}

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
										<p>A obra <strong>#'. $id .'</strong> foi excluída.</p>
										<p><a target="_blank" href="' . base_url('/control/pontos/obras') . '">Veja por aqui.</a></p>
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

			// Variaveis para do configurações de e-mail
			$from_name = $this->config->item('from_name');
			$from_email = $this->config->item('from_email');
			$subject_prefix = $this->config->item('subject_prefix');

			$email = array(
				'nome' => $from_name,
				'email' => $from_email,
				'subject' => $subject_prefix,
			);

			$this->email->send($email, $msg);
			/////////////////////////////////
			redirect('cliente/obra?msg=excluir');
	}

	public function getobraequipamentos()
	{
		// $dis = $this->uri->segment(5);
		$dados = $this->input->post();
		$evap = $this->equip->getobraequipamento($dados['serie'], $dados['dist']);

		echo json_encode($evap->result());
	}

	public function deletararquivo($obra_id, $obra_arq)
	{
		// Lógica para excluir o arquivo do banco de dados
		$this->obra->deletararquivo($obra_id, $obra_arq);

		// Obtém o sexto parâmetro da URL
        $arquivo = $this->uri->segment(6);
        
        // Exclua o arquivo do sistema de arquivos
		unlink('uploads/' . $arquivo);

		// Retornar uma resposta JSON
		echo json_encode(array('success' => true));
    }
}