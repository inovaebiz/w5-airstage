<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribuidores_Model extends CI_Model {

    public function get_distribuidores_ativas() {
        $this->db->where("distribuidor_status", "1");
        $q = $this->db->get('distribuidores');
        return $q;
    }

    public function insertDistribuidor($dados = NULL) {
        if ($dados!=NULL) {
            $this->db->insert('distribuidores', $dados);
        }
    }
    
    public function updateDistribuidor($data) {
        if($data != NULL) {
            $this->db->where('distribuidor_id', $data['distribuidor_id']);
            $this->db->set($data);
            $this->db->update('distribuidores');
        }
    }

    public function deleteDistribuidor($id = NULL) {
        if($id != NULL) {
            $this->db->where('distribuidor_id',$id);
            $this->db->delete('distribuidores');
        }
    }

    public function getByIdDistribuidor($id) {
        $this->db->where('distribuidor_id',$id);
        $q = $this->db->get('distribuidores');
        return $q;
    }

    public function getByIdsDistribuidores($ids) {

        $this->db->select('distribuidor_nome');
        $this->db->from('distribuidores');
        $this->db->where_in('distribuidor_id', $ids);
        $this->db->where('distribuidor_status', 1);
        $q = $this->db->get();

        return $q->result_array();
    }

    public function getDistribuidorByNome($distribuidor_nome) {
        // Remove espaços extras no início e no fim e substitui todos os separadores por um único espaço
        $distribuidor_nome_formatado = preg_replace('/\s+/', ' ', trim(str_replace(['/', '-', '&'], ' ', $distribuidor_nome)));

        // Preparar a consulta SQL para encontrar distribuidores, ignorando caracteres especiais
        $this->db->select('*');
        $this->db->from('distribuidores');
        $this->db->where("REPLACE(REPLACE(REPLACE(REPLACE(distribuidor_nome, ' ', ''), '/', ''), '-', ''), '&', '') LIKE", "%" . str_replace([' ', '/', '-', '&'], '', $distribuidor_nome_formatado) . "%");
        $q = $this->db->get();

        return $q->row();
    }
    
    public function getByStatusDistribuidor() {
        $q = $this->db->where('distribuidor_status','1');
        $q = $this->db->get('distribuidores');
        return $q;
    }

    public function getAllStatusDistribuidor() {
        $q = $this->db->where('distribuidor_status','0,1');
        $q = $this->db->get('distribuidores');
        return $q;
    }
    
    public function getAllDistribuidoresAtivos() {
        $q = $this->db->where('distribuidor_status','1');
        $q = $this->db->get('distribuidores');
        return $q->result();
    }
    
    public function getAll() {
        $q = $this->db->get('distribuidores');
        return $q;
    }

}