<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposta_Model extends CI_Model{

    public function insert($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('proposta', $dados);
            return $this->db->insert_id();
        }
    }
    public function getById($id){
        $this->db->where('proposta_id',$id);
		$q = $this->db->get('proposta');
        return $q;
    }

    public function delete($id = NULL) {
	    if($id != NULL){
			$this->db->where('proposta_id',$id);
			$this->db->delete('proposta');
	    }
     }

    public function update($data) {
	    if($data != NULL){
		    $this->db->where('proposta_id', $data['proposta_id']);
	        $this->db->set($data);
	        $this->db->update('proposta');
		}
    }
	public function getAll() {
		$this->db->select('p.*, g.grupo_nome, ps.ps_nome, (SELECT (po_msg) FROM proposta_obs po WHERE po.po_proposta = p.proposta_id ORDER BY po.po_id LIMIT 1) as status');
		$this->db->join('grupo g', 'p.proposta_group = g.grupo_id', 'left');
		$this->db->join('proposta_status ps', 'p.proposta_status = ps.ps_id', 'left');
		$this->db->order_by('p.proposta_data_beta', 'ASC');
        $q = $this->db->get('proposta p');
        return $q;
    }
    public function getAllPs() {
        $q = $this->db->get('proposta_status');
        return $q;
    }
    
    public function insertObs($dados = NULL){
	    if ($dados != NULL){
            $this->db->insert('proposta_obs', $dados);
        }
    }
    
    public function getPropostaObs($prop = NULL){
	    if($prop != NULL)
	   		$this->db->where('po_proposta', $prop);
	   		
	   	$q = $this->db->get('proposta_obs');
        return $q;
    }
}