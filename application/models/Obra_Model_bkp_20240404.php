<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra_Model extends CI_Model
{

	public function insert($dados = NULL)
	{
		if ($dados != NULL) {
			$this->db->insert('obra', $dados);
			return $this->db->insert_id();
		}
	}
	public function getById($id)
	{
		$this->db->where('o.obra_id', $id);
		$this->db->join("cliente c", "o.obra_cliente_id = c.cliente_id");
		$q = $this->db->get('obra o');
		return $q;
	}

	public function getObraByStatus($status = NULL)
	{
		if ($status != NULL)
			$this->db->where('o.obra_status', $status);

		$this->db->join("cliente c", "o.obra_cliente_id = c.cliente_id");
		$q = $this->db->get('obra o');
		return $q;
	}

	public function getByIdClienteObra($id)
	{
		$q = $this->db->order_by('obra_id', 'DESC');
		$q = $this->db->where('obra_cliente_id', $id);
		$q = $this->db->get('obra');
		return $q;
	}

	/*
	public function getByIdObraKit($ok_id = NULL)
	{
		if ($ok_id != NULL) {
			$this->db->select('*');
			$this->db->from('obra_kit');
			$this->db->where_in('ok_id', $ok_id);
			$query = $this->db->get();
			return $query->result(); // Retorna os resultados da consulta
		} else {
			$this->db->select('*');
			$this->db->from('obra_kit');
			$query = $this->db->get();
			return $query->result(); // Retorna os resultados da consulta
		}
	}
	*/

	public function deleteequipamento($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('oe_id', $id);
			$this->db->delete('obra_equipamentos');
		}
	}

	public function deleteequipamentoexterno($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('oee_id', $id);
			$this->db->delete('obra_equipamento_externo');
		}
	}

	public function deleteequipamentokit($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('ok_id', $id);
			$this->db->delete('obra_kit');
		}
	}

	public function delete($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('obra_id', $id);
			$this->db->delete('obra');
		}
	}

	public function update($data)
	{
		if ($data != NULL) {
			$this->db->where('obra_id', $data['obra_id']);
			$this->db->set($data);
			$this->db->update('obra');
		}
	}

	public function getAllMotivo()
	{
		$q = $this->db->get('motivos_de_recusa');
		return $q;
	}
	public function getAll($start = NULL, $end = NULL)
	{
		$this->db->order_by('obra_id', 'DESC');

		if ($start != NULL)
			$this->db->where('DATE(obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra');
		return $q;
	}
	//##################	Equipamentos	###########################################
	/*
	public function getEquipamentos($oe_ok_id = NULL)
	{
		if ($oe_ok_id != NULL) {
			$this->db->select('*');
			$this->db->from('obra_equipamentos');
			$this->db->where_in('oe_ok_id', $oe_ok_id);
			$query = $this->db->get();
			return $query->result(); // Retorna os resultados da consulta
		} else {
			$this->db->select('*');
			$this->db->from('obra_equipamentos');
			$query = $this->db->get();
			return $query->result(); // Retorna os resultados da consulta
		}
	}
	*/
	
	public function insertOE($dados = NULL)
	{
		if ($dados != NULL) {
			$this->db->insert('obra_equipamentos', $dados);
		}
	}

	public function GetAllOE($start = NULL, $end = NULL)
	{
		$this->db->join('obra o', 'o.obra_id = oe.oe_obra');

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_equipamentos oe');
		return $q;
	}

	public function getOE($obra = NULL, $group = NULL)
	{
		$this->db->select('e.*, oe.*, t.*, sc.*, o.*');

		$this->db->join('obra o', 'o.obra_id = oe.oe_obra');
		$this->db->join('equipamento e', 'e.equipamento_id = oe.oe_produto_id');
		$this->db->join('tipo t', 't.tipo_id = e.equipamento_tipo');
		$this->db->join('sub_categoria sc', 'sc.sc_id = t.tipo_sc');

		if ($obra != NULL) {
			$this->db->where('oe.oe_obra', $obra);
		}

		if ($group != NULL) {
			$this->db->group_by($group);
		}
		$this->db->order_by("sc.sc_id", "ASC");
		$this->db->order_by("t.tipo_nome", "ASC");

		$q = $this->db->get('obra_equipamentos oe');
		return $q;
	}

	public function getOED($obra = NULL, $group = NULL)
	{
		$this->db->select('e.*, oe.*, t.*, sc.*, o.*');

		$this->db->join('obra o', 'o.obra_id = oe.oe_obra');
		$this->db->join('equipamento e', 'e.equipamento_id = oe.oe_produto_id');
		$this->db->join('tipo t', 't.tipo_id = e.equipamento_tipo');
		$this->db->join('sub_categoria sc', 'sc.sc_id = t.tipo_sc');

		if ($obra != NULL) {
			$this->db->where('oe.oe_obra', $obra);
		}

		if ($group != NULL) {
			$this->db->group_by($group);
		}
		$this->db->order_by("o.obra_id", "ASC");

		$q = $this->db->get('obra_equipamentos oe');

		return $q;
	}


	//##################	Categ- Tipo	###########################################
	public function insertOK($dados = NULL)
	{
		if ($dados != NULL) {
			$this->db->insert('obra_kit', $dados);
			return $this->db->insert_id();
		}
	}

	public function getAllSerialC()
	{
		$q = $this->db->get('obra_kit');
		return $q;
	}
	public function getAllSerialE()
	{
		$q = $this->db->get('obra_equipamentos');
		return $q;
	}

	public function getOK($obra = NULL)
	{
		$this->db->select('ok.*, t.*, sc.*');

		$this->db->join('obra_kit ok', 'ok.ok_condensador_id = t.tipo_id');
		$this->db->join('sub_categoria sc', 'sc.sc_id = t.tipo_sc');

		if ($obra != NULL) {
			$this->db->where('ok.ok_obra_id', $obra);
		}

		$this->db->order_by("ok.ok_id", "ASC");
		//$this->db->order_by("t.tipo_nome", "ASC");

		$q = $this->db->get('tipo t');
		return $q;
	}

	public function getOEByOK($obra = NULL)
	{
		if ($obra != NULL) {
			$this->db->where('oe.oe_ok_id', $obra);
		}

		$this->db->join('equipamento e', 'e.equipamento_id = oe.oe_produto_id');

		$q = $this->db->get('obra_equipamentos oe');
		return $q;
	}
	//##################	Equipamentos-Externos	###########################################
	public function insertOEE($dados = NULL)
	{
		if ($dados != NULL) {
			$this->db->insert('obra_equipamento_externo', $dados);
		}
	}

	public function GetAllOEE($start = NULL, $end = NULL)
	{
		$this->db->join('obra o', 'o.obra_id = oee.oee_obra');

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_equipamento_externo oee');
		return $q;
	}

	public function getOEE($obra = NULL)
	{
		$this->db->select('oee.*,o.*, mc.*, m.*');

		$this->db->join('obra o', 'o.obra_id = oee.oee_obra');
		$this->db->join('marcas_categorias mc', 'mc.mcategorias_id = oee.oee_categoria');
		$this->db->join('marcas m', 'm.marca_id = oee.oee_marca');

		if ($obra != NULL) {
			$this->db->where('oee.oee_obra', $obra);
		}

		$q = $this->db->get('obra_equipamento_externo oee');
		return $q;
	}
	//##################	Equipamentos-Externos Pontos Site	#################################
	public function getSite()
	{
		$this->db->where('site_id', 1);
		$q = $this->db->get('site');
		return $q;
	}

	public function updateSite($data)
	{
		if ($data != NULL) {
			$this->db->where('site_id', 1);
			$this->db->set($data);
			$this->db->update('site');
		}
	}

	public function updateSitePag($data)
	{
		
		if ($data != NULL) {
			$this->db->where('site_pag_id', $data['site_pag_id']);
			$this->db->set($data);
			$this->db->update('site_pag');
		}
	}
	//##################	Relatório	#################################
	public function rhighWallQF($start = NULL, $end = NULL)
	{
		$this->db->join('tipo t', 't.tipo_id = ok.ok_condensador_id');
		$this->db->join('obra o', 'o.obra_id = ok.ok_obra_id');

		$this->db->where('t.tipo_id IN (21, 22, 25, 26, 27, 28, 34)');
		$this->db->where('o.obra_status', "1");

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_kit ok');
		return $q;
	}
	public function rhighWallF($start = NULL, $end = NULL)
	{
		$this->db->join('tipo t', 't.tipo_id = ok.ok_condensador_id');
		$this->db->join('obra o', 'o.obra_id = ok.ok_obra_id');

		$this->db->where('t.tipo_id IN (23, 24, 29, 30, 31, 32, 33)');
		$this->db->where('o.obra_status', "1");

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_kit ok');
		return $q;
	}
	public function rTeto($start = NULL, $end = NULL)
	{
		$this->db->join('tipo t', 't.tipo_id = ok.ok_condensador_id');
		$this->db->join('obra o', 'o.obra_id = ok.ok_obra_id');

		$this->db->where('t.tipo_sc', "8");
		$this->db->where('o.obra_status', "1");

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_kit ok');
		return $q;
	}

	public function rCassete($start = NULL, $end = NULL)
	{
		$this->db->join('tipo t', 't.tipo_id = ok.ok_condensador_id');
		$this->db->join('obra o', 'o.obra_id = ok.ok_obra_id');

		$this->db->where('t.tipo_sc', "11");
		$this->db->where('o.obra_status', "1");

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_kit ok');
		return $q;
	}

	public function rMulti($start = NULL, $end = NULL)
	{
		$this->db->join('tipo t', 't.tipo_id = ok.ok_condensador_id');
		$this->db->join('obra o', 'o.obra_id = ok.ok_obra_id');

		$this->db->where('t.tipo_sc', "7");
		$this->db->where('o.obra_status', "1");

		if ($start != NULL)
			$this->db->where('DATE(o.obra_aprovate) >= "' . $start . '"');

		if ($end != NULL)
			$this->db->where('DATE(o.obra_aprovate) <= "' . $end . '"');

		$q = $this->db->get('obra_kit ok');
		return $q;
	}

	//##################	Excluir Obra	#################################
	public function deletarobra($id = NULL) {

		// Lógica para excluir o resgitro da tabela Obra do banco de dados
		$this->db->where('obra_id', $id);
		$this->db->delete('obra');

		// Lógica para excluir o resgitro da tabela Obra Equipamentos do banco de dados
		$this->db->where('oe_obra', $id);
		$this->db->delete('obra_equipamentos');

		// Lógica para excluir o resgitro da tabela Obra Kit do banco de dados
		$this->db->where('ok_obra_id', $id);
		$this->db->delete('obra_kit');
		
	}

	//##################	Excluir Arquivo	#################################
	public function deletararquivo($obra_id, $obra_arq) {
        
        // Lógica para excluir o arquivo do banco de dados
        $this->db->where('obra_id', $obra_id);
        $this->db->set($obra_arq, NULL);
        $this->db->update('obra');
    
    }

}