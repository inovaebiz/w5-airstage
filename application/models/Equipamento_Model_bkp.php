<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipamento_Model extends CI_Model{
//##################	Sub-categorias	###########################################
    public function insertSC($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('sub_categoria', $dados);
        }
    }
    public function getByIdSC($id){
        $this->db->where('sc_id',$id);
		$q = $this->db->get('sub_categoria');
        return $q;
    }

    public function deleteSC($id = NULL) {
	    if($id != NULL){
			$this->db->where('sc_id',$id);
			$this->db->delete('sub_categoria');
	    }
     }

    public function updateSC($data) {
	    if($data != NULL){
		    $this->db->where('sc_id', $data['sc_id']);
	        $this->db->set($data);
	        $this->db->update('sub_categoria');
		}
    }
	public function getAllSC($s = NULL) {
		if($s != NULL)
			$this->db->where('sc_status', $s);
        $q = $this->db->get('sub_categoria');
        return $q;
    }
//##################	!Sub-categorias	###########################################
//##################	Tipos	###########################################
	public function insertT($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('tipo', $dados);
        }
    }
    public function getByIdT($id){
        $this->db->where('tipo_id',$id);
		$q = $this->db->get('tipo');
        return $q;
    }

    public function deleteT($id = NULL) {
	    if($id != NULL){
			$this->db->where('tipo_id',$id);
			$this->db->delete('tipo');
	    }
     }

    public function updateT($data) {
	    if($data != NULL){
		    $this->db->where('tipo_id', $data['tipo_id']);
	        $this->db->set($data);
	        $this->db->update('tipo');
		}
    }
	public function getAllT($id = NULL) {
		if($id != NULL)
			$this->db->where('tipo_sc',$id);
        $q = $this->db->get('tipo');
        return $q;
    }
//##################	!Tipos	###########################################
//##################	Equipamentos	###########################################
	public function insertE($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('equipamento', $dados);
        }
    }
    public function getByIdE($id){
        $this->db->where('equipamento_id',$id);
		$q = $this->db->get('equipamento');
        return $q;
    }
    
    public function getEFull($id){
	    $this->db->select("e.*, t.*, sc.*");
        $this->db->where('e.equipamento_id',$id);
        $this->db->join("tipo t", "t.tipo_id = e.equipamento_tipo");
        $this->db->join("sub_categoria sc", "t.tipo_sc = sc.sc_id");
        
		$q = $this->db->get('equipamento e');
        return $q;
    }
    
    public function getTipoFull($id){
	    $this->db->select("t.*, sc.*");
        $this->db->where('t.tipo_id',$id);
        $this->db->join("sub_categoria sc", "t.tipo_sc = sc.sc_id");
        
		$q = $this->db->get('tipo t');
        return $q;
    }

    public function deleteE($id = NULL) {
	    if($id != NULL){
			$this->db->where('equipamento_id',$id);
			$this->db->delete('equipamento');
	    }
     }

    public function updateE($data) {
	    if($data != NULL){
		    $this->db->where('equipamento_id', $data['equipamento_id']);
	        $this->db->set($data);
	        $this->db->update('equipamento');
		}
    }
	public function getAllE($id = NULL) {
		if($id != NULL)
            $this->db->select('*');
            $this->db->from('sub_categoria');
            $this->db->join('equipamento', 'equipamento.equipamento_id = sub_categoria.sc_id');
   //       $query = $this->db->get();
            // $this->db->where('equipamento_status =','1');

			
   //          // $this->db->join("equipamento eq", "t.equipamento_tipo = eq.equipamento_id");
   //          $this->db->where('tipo_status =', '1');
            
        $q = $this->db->get();
        return $q;
    }
//##################	!Equipamentos	###########################################
}