<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pontos_Model extends CI_Model
{
	
	protected $table = 'pontos_saldo';
    protected $softDeletes = true; // Ativar exclusões suaves

	public function getPontos($cli = NULL)
	{
		$this->db->select('ps.*, IFNULL(SUM(ps.ps_pontos), 0) as saldo');
		$this->db->where('ps.ps_cliente_id ', $cli);
		$q = $this->db->get('pontos_saldo ps');
		return $q;
	}

	public function getReais($cli = NULL)
	{
		$this->db->select('ps.*, IFNULL(SUM(ps.ps_reais), 0) as reais');
		$this->db->where('ps.ps_cliente_id ', $cli);
		$q = $this->db->get('pontos_saldo ps');
		return $q;
	}

	public function getPontosFull($start = NULL, $end = NULL)
	{
		$this->db->select('ps.*, IFNULL(SUM(ps.ps_pontos), 0) as saldo');
		$this->db->where('ps.ps_pontos > 0 ');
		$this->db->where('ps.ps_pontos > 0 ');

		if ($start != NULL)
			$this->db->where('DATE(ps_data) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(ps_data) <= "' . $end . '"');

		$this->db->limit('1');
		$q = $this->db->get('pontos_saldo ps');
		return $q;
	}

	public function getPontosHistorico($cli = NULL)
	{
		$this->db->select('ps.*');
		$this->db->where('ps.ps_cliente_id ', $cli);
		$q = $this->db->get('pontos_saldo ps');
		return $q;
	}


	public function insert($dados = NULL)
	{
		if ($dados != NULL) {
			$this->db->insert('pontos_saldo', $dados);
			return $this->db->insert_id();
		}
	}

	public function getById($id)
	{
		$this->db->where('ps_id', $id);
		$q = $this->db->get('pontos_saldo');
		return $q;
	}


	public function delete($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('ps_id', $id);
			$this->db->delete('pontos_saldo');
		}
	}

	public function update($data)
	{
		if ($data != NULL) {
			$this->db->where('ps_id', $data['ps_id']);
			$this->db->set($data);
			$this->db->update('pontos_saldo');
		}
	}
	/////////	RESGATE USUARIO	///////////
	public function insertRU($dados = NULL)
	{
		if ($dados != NULL) {
			$this->db->insert('resgate_usuario', $dados);
			return $this->db->insert_id();
		}
	}

	public function getResgates($start = NULL, $end = NULL)
	{

		$this->db->join("resgates r", "r.resgate_id = ru.ru_resgate_id", "left");
		$this->db->join("cliente c", "c.cliente_id = ru.ru_cliente_id");

		if ($start != NULL)
			$this->db->where('DATE(ru_data) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(ru_data) <= "' . $end . '"');

		$q = $this->db->get('resgate_usuario ru ');
		return $q;
	}

	public function updateRU($data)
	{
		if ($data != NULL) {
			$this->db->where('ru_id', $data['ru_id']);
			$this->db->set($data);
			$this->db->update('resgate_usuario');
		}
	}

	public function updateRecusar($data, $pontosadd)
	{
		if ($data != NULL) {
			$this->db->where('ru_id', $data['ru_id']);
			$this->db->set($data);
			$this->db->update('resgate_usuario');


			$pontos = array(
				'ps_cliente_id' => $pontosadd->ru_cliente_id,
				'ps_pontos' => ($pontosadd->resgate_pontos),
				'ps_msg' => 'Recusa Solicitação #' . $data['ru_id'],
			);
			$this->pontos->insert($pontos);
		}
	}

	public function getRUByUser($cliente = NULL, $status = NULL, $id = NULL)
	{
		$this->db->join("resgates r", "r.resgate_id = ru.ru_resgate_id", "left");
		$this->db->join("cliente c", "c.cliente_id = ru.ru_cliente_id");

		if ($cliente != NULL) {
			$this->db->where("ru.ru_cliente_id", $cliente);
		}
		if ($status != NULL) {
			$this->db->where("ru.ru_status", $status);
		}

		if ($id != NULL) {
			$this->db->where("ru.ru_id", $id);
		}

		$q = $this->db->get('resgate_usuario ru');
		return $q;
	}
}
