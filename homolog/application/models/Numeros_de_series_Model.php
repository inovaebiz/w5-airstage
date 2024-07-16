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
        $this->db->order_by('data_emissao', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAll() {
        $q = $this->db->get('equip_condesadora_serie');
        return $q;
    }

    public function saveSeries($row) {
        
        $insert_data = array(
            'data_emissao' => $row['A'],
            'distribuidor_id' => $row['B'],
            'produto' => $row['C'],
            'serie' => $row['D'],
            'is_used' => 0
        );

        // Inserir somente se não existir
        if (!$this->serieExists($row['A'], $row['B'], $row['C'], $row['D'])) {
            
            $this->db->insert('equip_condesadora_serie', $insert_data);
            
        }

    }

    public function serieExists($data_emissao, $distribuidor_id, $produto, $serie) {
        
        /*
        echo "data_emissao " . $data_emissao;
        echo "<br />";
        echo "distribuidor_id " . $distribuidor_id;
        echo "<br />";
        echo "produto " . $produto;
        echo "<br />";
        echo "serie " . $serie;
        echo "<br /><br />";
        */

        // Verificar se algum parâmetro é null e lançar exceção
        if ($data_emissao === null || $distribuidor_id === null || $produto === null || $serie === null) {
            throw new InvalidArgumentException("Todos os parâmetros são necessários para verificar a existência da série.");
        }

        // Verificar a existência da série
        $result = $this->db->get_where('equip_condesadora_serie', [
            'data_emissao' => $data_emissao,
            'distribuidor_id' => $distribuidor_id,
            'produto' => $produto,
            'serie' => $serie
        ])->row();

        return $result ? $result : false;
    }
}