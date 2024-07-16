<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_Model extends CI_Model{

    public function insert($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('grupo', $dados);
        }
    }
    public function getById($id){
        $this->db->where('grupo_id',$id);
		$q = $this->db->get('grupo');
        return $q;
    }

    public function delete($id = NULL) {
	    if($id != NULL){
			$this->db->where('grupo_id',$id);
			$this->db->delete('grupo');
	    }
     }

    public function update($data) {
	    if($data != NULL){
		    $this->db->where('grupo_id', $data['grupo_id']);
	        $this->db->set($data);
	        $this->db->update('grupo');
		}
    }
	public function getAll() {
		$this->db->select('g.*, u.nome');
		$this->db->join('usuarios u', 'g.grupo_responsavel = u.id', 'left');
		
        $q = $this->db->get('grupo g');
        return $q;
    }
    
    public function getGroup(){
	    $this->db->order_by('grupo_contador', 'ASC');
	    $this->db->limit(1);
	    $q = $this->db->get('grupo');
	    return $q;
    }
}