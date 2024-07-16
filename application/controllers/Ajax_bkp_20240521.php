<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ajax extends CI_Controller
{
	public $menu;
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Equipamento_Model", "equip");
		$this->load->model("Campanha_Model", "campanha"); //models
		$this->load->model("usuario_model", "usuario");
		$this->load->model("Distribuidores_Model","distribuidor");
		$this->load->model("Numeros_de_series_Model","numero_serie");
		$this->load->helper(array('form', 'text'));	//helper

		$this->load->library('form_validation');		//library
	}

	public function atualizar_data()
	{
		$data = date('Y-m-d');
		$campanhas = $this->campanha->getByStatus();
		foreach ($campanhas->result() as $item) {
			if (!((strtotime($item->campanha_data_inicial) <= strtotime($data)) && (strtotime($item->campanha_data_final) >= strtotime($data)))) {
				$dados = array(
					'campanha_id' => $item->campanha_id,
					'campanha_status' => 0
				);
				$this->campanha->update($dados);
			}
			if ((strtotime($item->campanha_data_final) < strtotime($data))) {
				$dados = array(
					'campanha_id' => $item->campanha_id,
					'campanha_status' => 0
				);
				$this->campanha->update($dados);
			}
		}
		echo 'Atualizar Status';
	}


	//funcao da login
	public function index()
	{
		echo 1;
	} // fim login//

	public function cat()
	{
		//if(!empty($_POST)){
		$id = $this->input->post('cat');
		$tipos = $this->equip->getAllT2($id);
		echo json_encode($tipos->result_array());


		//}
	}

	public function tipo()
	{
		//if(!empty($_POST)){
		$id = $this->input->post('tipo');
		$tipos = $this->equip->getAllEView($id);
		echo json_encode($tipos->result_array());
		//}
	}

	public function cep()
	{
		if (isset($_POST['tpA'])) {
			$action = $_POST['tpA'];
		} else if (isset($_GET['tpA'])) {
			$action = $_GET['tpA'];
		} else {
			$action = NULL;
		}

		//verifica o tipo
		switch ($action) {

				//Busca CEP e retorna os dados referente ao CEP
			case "buscaCEP":


				$cep = trim(strip_tags($_GET['cep']));
				if (!preg_match("/^[0-9]{5}\-[0-9]{3}$/", $cep)) {
					$result['status'] = 0;
					$result['msgErro'] = "CEP inválido!(0)";

					echo json_encode($result);
					exit;
				}

				//$obj = new consultaCep($cep);echo "<pre>";print_r($obj);echo "</pre>";

				//exit;
				$objCep = verificaCEP($cep);
				if ($objCep) {
					$result['status'] = 1;
					$result['dados'] = $objCep;
				} else {
					$result['status'] = 0;
					$result['msgErro'] = "CEP inválido!(1)";
				}

				echo json_encode($result);
				exit;

				break;

			default:
				$result['status'] = 'null';
				$result['msgErro'] = 'Ocorreu um erro!';
				echo json_encode($result);
				exit();
		}
	}

	public function cnpj()
	{

		$user = $this->usuario->getByCNPJ($this->input->post('cnpj'));
		echo json_encode($user->result());

	}

	public function email()
	{

		$user = $this->usuario->getByEmail($this->input->post('email'));
		echo json_encode($user->result());

	}

	public function distribuidores()
	{
		
		$distribuidores = $this->distribuidor->getAllDistribuidoresAtivos();
		foreach ($distribuidores as $item) {
			$distribuidor = array(
				'id' => $item->distribuidor_id,
				'distribuidor' => $item->distribuidor_nome
			);
			
			$data[] = $distribuidor; // Adiciona o distribuidor ao array $data
		}

		echo json_encode($data);
	
	}

	public function Numeros_de_series()
	{
		
		$numeros_series = $this->numero_serie->getAllNumerosSeriesIsUsedAtivos();
		foreach ($numeros_series as $item) {
			$numero_serie = array(
				'id' => $item->id,
				'distribuidor' => $item->distribuidor,
				'distribuidor_id' => $item->distribuidor_id,
				'produto' => $item->produto,
				'serie' => $item->serie,
				'is_used' => $item->is_used
			);
			
			$data[] = $numero_serie; // Adiciona o numero_serie ao array $data
		}

		echo json_encode($data);
	
	}

}

function verificaCEP($CEP = NULL)
{
	//verifica se CEP é válido
	if (preg_match("/^[0-9]{5}\-?[0-9]{3}$/", $CEP)) {
		//caso tenha hifen(-) remove
		$cepTmp = preg_replace("/\D/", "", $CEP);
		$CEP = $cepTmp;

		if ($CEP) {
			//efetua busca na API de CEP postmon.com.br
			//não tem no banco precisa buscar na API postmon.com.br
			$urlAPI = "http://api.postmon.com.br/v1/cep/" . $CEP;

			try {
				//obtem os dados
				$dadosAPI = @file_get_contents($urlAPI);

				//verifica se retornou um JSON válido
				if (preg_match("/^\{[\w\W\d\D]*\}$/i", $dadosAPI)) {
					//converte JSON em Array
					$arrayResult = json_decode($dadosAPI, TRUE);

					//verifica se o array do logradouro existe, caso verdadeiro insere os dados no banco
					if (isset($arrayResult['logradouro'])) {

						//monta array de retorno
						$return['cep'] = preg_replace("/^([0-9]{5})\-?([0-9]{3})$/", "$1-$2", $CEP);
						$return['logradouro'] = $arrayResult['logradouro'];
						$return['bairro'] = $arrayResult['bairro'];
						$return['cidade'] = $arrayResult['cidade'];
						$return['uf'] = $arrayResult['estado'];

						return $return;
					} else {
						//ocorreu algum erro

						################################
						//efetua busca na API de CEP
						//não tem no banco precisa buscar na API
						$urlAPI = "http://cep.correiocontrol.com.br/" . $CEP . ".json";

						try {
							//obtem os dados
							$dadosAPI = @file_get_contents($urlAPI);

							//verifica se retornou um JSON válido
							if (preg_match("/^\{[\w\W\d\D]*\}$/i", $dadosAPI)) {
								//converte JSON em Array
								$arrayResult = json_decode($dadosAPI, TRUE);

								//verifica se o array do logradouro existe, caso verdadeiro insere os dados no banco
								if (isset($arrayResult['logradouro'])) {

									//monta array de retorno
									$return['cep'] = preg_replace("/^([0-9]{5})\-?([0-9]{3})$/", "$1-$2", $CEP);
									$return['logradouro'] = $arrayResult['logradouro'];
									$return['bairro'] = $arrayResult['bairro'];
									$return['cidade'] = $arrayResult['localidade'];
									$return['uf'] = $arrayResult['uf'];

									return $return;
								} else {
									//ocorreu algum erro


									//efetua busca nos correios
									$objCep = new consultaCep;
									$arrayResult = $objCep->buscaCorreios($CEP);
									if ($arrayResult) {

										//monta array de retorno
										$return['cep'] = preg_replace("/^([0-9]{5})\-?([0-9]{3})$/", "$1-$2", $CEP);
										$return['logradouro'] = $objCep->tipoLogradouro . " " . $objCep->logradouro;
										$return['bairro'] = $objCep->bairro;
										$return['cidade'] = $objCep->cidade;
										$return['uf'] = $objCep->uf;

										return $return;
									} else {
										return FALSE;
									}
								}
							} else {
								//efetua busca nos correios

								$arrayResult = buscaCorreios($CEP);
								if (is_array($arrayResult)) {



									return $arrayResult;
								} else {
									return FALSE;
								}
							}
						} catch (Exception $e) {
							//efetua busca nos correios
							$arrayResult = buscaCorreios($CEP);
							if (is_array($arrayResult)) {

								return $arrayResult;
							} else {
								return FALSE;
							}
						}
						###############################

					}
				} else {
					################################
					//efetua busca na API de CEP
					//não tem no banco precisa buscar na API
					$urlAPI = "http://cep.correiocontrol.com.br/" . $CEP . ".json";

					try {
						//obtem os dados
						$dadosAPI = @file_get_contents($urlAPI);

						//verifica se retornou um JSON válido
						if (preg_match("/^\{[\w\W\d\D]*\}$/i", $dadosAPI)) {
							//converte JSON em Array
							$arrayResult = json_decode($dadosAPI, TRUE);

							//verifica se o array do logradouro existe, caso verdadeiro insere os dados no banco
							if (isset($arrayResult['logradouro'])) {

								//monta array de retorno
								$return['cep'] = preg_replace("/^([0-9]{5})\-?([0-9]{3})$/", "$1-$2", $CEP);
								$return['logradouro'] = $arrayResult['logradouro'];
								$return['bairro'] = $arrayResult['bairro'];
								$return['cidade'] = $arrayResult['localidade'];
								$return['uf'] = $arrayResult['uf'];

								return $return;
							} else {
								//ocorreu algum erro


								$arrayResult = buscaCorreios($CEP);
								if (is_array($arrayResult)) {

									return $arrayResult;
								} else {
									return FALSE;
								}
							}
						} else {
							$arrayResult = buscaCorreios($CEP);
							if (is_array($arrayResult)) {

								return $arrayResult;
							} else {
								return FALSE;
							}
						}
					} catch (Exception $e) {
						//efetua busca nos correios
						$arrayResult = buscaCorreios($CEP);
						if (is_array($arrayResult)) {

							return $arrayResult;
						} else {
							return FALSE;
						}
					}
					##############################
				}
			} catch (Exception $e) {
				################################
				//efetua busca na API de CEP
				//não tem no banco precisa buscar na API
				$urlAPI = "http://cep.correiocontrol.com.br/" . $CEP . ".json";

				try {
					//obtem os dados
					$dadosAPI = @file_get_contents($urlAPI);

					//verifica se retornou um JSON válido
					if (preg_match("/^\{[\w\W\d\D]*\}$/i", $dadosAPI)) {
						//converte JSON em Array
						$arrayResult = json_decode($dadosAPI, TRUE);

						//verifica se o array do logradouro existe, caso verdadeiro insere os dados no banco
						if (isset($arrayResult['logradouro'])) {

							//monta array de retorno
							$return['cep'] = preg_replace("/^([0-9]{5})\-?([0-9]{3})$/", "$1-$2", $CEP);
							$return['logradouro'] = $arrayResult['logradouro'];
							$return['bairro'] = $arrayResult['bairro'];
							$return['cidade'] = $arrayResult['localidade'];
							$return['uf'] = $arrayResult['uf'];

							return $return;
						} else {
							//ocorreu algum erro


							//efetua busca nos correios

							$arrayResult = buscaCorreios($CEP);
							if (is_array($arrayResult)) {

								return $arrayResult;
							} else {
								return FALSE;
							}
						}
					} else {
						//efetua busca nos correios
						$arrayResult = buscaCorreios($CEP);
						if (is_array($arrayResult)) {

							return $arrayResult;
						} else {
							return FALSE;
						}
					}
				} catch (Exception $e) {
					//efetua busca nos correios
					$arrayResult = buscaCorreios($CEP);
					if (is_array($arrayResult)) {

						return $arrayResult;
					} else {
						return FALSE;
					}
				}
				###############################
			}
		}
	} else {
		return FALSE;
	}
}
