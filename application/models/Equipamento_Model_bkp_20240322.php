<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Equipamento_Model extends CI_Model
{
    //##################	Sub-categorias	###########################################
    public function insertSC($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('sub_categoria', $dados);
        }
    }
    public function getByIdSC($id)
    {
        $this->db->where('sc_id', $id);
        $q = $this->db->get('sub_categoria');
        return $q;
    }

    public function deleteSC($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('sc_id', $id);
            $this->db->delete('sub_categoria');
        }
    }

    public function updateSC($data)
    {
        if ($data != NULL) {
            $this->db->where('sc_id', $data['sc_id']);
            $this->db->set($data);
            $this->db->update('sub_categoria');
        }
    }
    public function getAllSC($s = NULL)
    {
        if ($s != NULL)
            $this->db->where('sc_status', $s);
        $q = $this->db->get('sub_categoria');
        return $q;
    }

    public function getevaporadora($serie, $distribuidor)
    {   
        $this->db->where('serie', $serie);
        // $this->db->where('distribuidor', $distribuidor);
        $q = $this->db->get('equip_evaporadora_serie');
        return $q;
    }

    public function getcondesadora($serie, $produto, $emissao = NULL)
    {   
        $this->db->where('serie', $serie);
        $this->db->where('produto', $produto);
        $this->db->where('is_used !=', 1);
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }

    public function getobraequipamento($serie)
    {   
        $this->db->where('oe_produto_serial', $serie);
        $q = $this->db->get('obra_equipamentos');
        return $q;
    }

    public function updatecondesadora($serie, $produto, $emissao = NULL)
    {   
        $this->db->where('serie', $serie);
        $this->db->where('produto', $produto);
        $this->db->set('is_used', 1);
        $q = $this->db->update('equip_condesadora_serie');
        return $q;
    }

    public function updatecondesadoraLiberar($serie, $produto, $emissao = NULL)
    {   
        $this->db->where('serie', $serie);
        $this->db->where('produto', $produto);
        $this->db->set('is_used', 0);
        $q = $this->db->update('equip_condesadora_serie');
        return $q;
    }

    public function getevaporadoranotafiscal($nota, $distribuidor)
    {   
        $this->db->where('nota_fiscal', $nota);
        $this->db->where('distribuidor', $distribuidor);
        $q = $this->db->get('equip_evaporadora_serie');
        return $q;
    }

    public function getcondesadoranotafiscal($nota, $distribuidor)
    {   
        $this->db->where('nota_fiscal', $nota);
        $this->db->where('distribuidor', $distribuidor);
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }
    //##################	!Sub-categorias	###########################################
    //##################	Tipos	###########################################
    public function insertT($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('tipo', $dados);
        }
    }
    public function getByIdT($id)
    {
        $this->db->where('tipo_id', $id);
        $q = $this->db->get('tipo');
        return $q;
    }

    public function deleteT($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('tipo_id', $id);
            $this->db->delete('tipo');
        }
    }

    public function updateT($data)
    {
        if ($data != NULL) {
            $this->db->where('tipo_id', $data['tipo_id']);
            $this->db->set($data);
            $this->db->update('tipo');
        }
    }
    public function getAllT($id = NULL)
    {
        if ($id != NULL)
            $this->db->where('tipo_sc', $id);
        $q = $this->db->get('tipo');
        return $q;
    }

    public function getAllT2($id = NULL)
    {
        if ($id != NULL)
            $this->db->where('tipo_sc', $id);
        $this->db->where('tipo_status=', 1);
        $q = $this->db->get('tipo');
        return $q;
    }
    //##################	!Tipos	###########################################
    //##################	Equipamentos	###########################################
    public function insertE($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('equipamento', $dados);
        }
    }
    public function getByIdE($id)
    {
        $this->db->where('equipamento_id', $id);
        $q = $this->db->get('equipamento');
        return $q;
    }

    public function getEFull($id)
    {
        $this->db->select("e.*, t.*, sc.*");
        $this->db->where('e.equipamento_id', $id);
        $this->db->join("tipo t", "t.tipo_id = e.equipamento_tipo");
        $this->db->join("sub_categoria sc", "t.tipo_sc = sc.sc_id");

        $q = $this->db->get('equipamento e');
        return $q;
    }

    public function getTipoFull($id)
    {
        $this->db->select("t.*, sc.*");
        $this->db->where('t.tipo_id', $id);
        $this->db->join("sub_categoria sc", "t.tipo_sc = sc.sc_id");

        $q = $this->db->get('tipo t');
        return $q;
    }

    public function deleteE($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('equipamento_id', $id);
            $this->db->delete('equipamento');
        }
    }

    public function updateE($data)
    {
        if ($data != NULL) {
            $this->db->where('equipamento_id', $data['equipamento_id']);
            $this->db->set($data);
            $this->db->update('equipamento');
        }
    }

    public function getAllE($id = NULL)
    {
        if ($id != NULL)
            $this->db->where('equipamento_tipo', $id);
        $q = $this->db->get('equipamento');
        return $q;
    }

    public function getAllEView($id = NULL)
    {
        if ($id != NULL)
            $this->db->where('equipamento_tipo', $id);
        $this->db->where('equipamento_status=', 1);
        $q = $this->db->get('equipamento');
        return $q;
    }
}
