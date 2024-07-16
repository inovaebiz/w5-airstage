<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Numeros_de_series_Model extends CI_Model {

    public function get_numero_serie_is_used() {
        $this->db->where("is_used", "1");
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }

    public function insertNumeroSerie($dados = NULL) {
        if ($dados!=NULL) {
            $this->db->insert('equip_condesadora_serie', $dados);
        }
    }
    
    public function updateNumeroSerie($data) {
        if($data != NULL) {
            $this->db->where('id', $data['id']);
            $this->db->set($data);
            $this->db->update('equip_condesadora_serie');
        }
    }

    public function deleteNumeroSerie($id = NULL) {
        if($id != NULL) {
            $this->db->where('id',$id);
            $this->db->delete('equip_condesadora_serie');
        }
    }

    public function getByIdNumeroSerie($id) {
        $this->db->where('id',$id);
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }

    public function getByIdsNumerosSeries($ids) {
        
        $this->db->select('distribuidor_id');
        $this->db->from('equip_condesadora_serie');
        $this->db->where_in('id', $ids);
        $q = $this->db->get();

        return $q->result_array();

    }
    
    public function getByStatusIsUsed() {
        $q = $this->db->where('is_used','1');
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }

    public function getAllStatusNumeroSerie() {
        $q = $this->db->where('is_used','0,1');
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }
    
    public function getAllNumerosSeriesIsUsedAtivos() {
        $q = $this->db->where('is_used','1');
        $q = $this->db->get('equip_condesadora_serie');
        return $q->result();
    }
    
    public function getTotalRowsTermoBusca($termoBusca = null) {
        $this->db->select('equip_condesadora_serie.*, distribuidores.distribuidor_nome as nome_distribuidor');
        $this->db->from('equip_condesadora_serie');
        $this->db->join('distribuidores', 'equip_condesadora_serie.distribuidor_id = distribuidores.distribuidor_id', 'left');
        if ($termoBusca) {
            $this->db->like('distribuidores.distribuidor_nome', $termoBusca);
            $this->db->or_like('produto', $termoBusca);
            $this->db->or_like('serie', $termoBusca);
        }
        return $this->db->count_all_results();
    }

    public function getTermoBusca($limit, $offset, $termoBusca = null) {
        $this->db->select('equip_condesadora_serie.*, distribuidores.distribuidor_nome as nome_distribuidor');
        $this->db->from('equip_condesadora_serie');
        $this->db->join('distribuidores', 'equip_condesadora_serie.distribuidor_id = distribuidores.distribuidor_id', 'left');
        if ($termoBusca) {
            $this->db->like('distribuidores.distribuidor_nome', $termoBusca);
            $this->db->or_like('produto', $termoBusca);
            $this->db->or_like('serie', $termoBusca);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAll() {
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }

}