<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regulamento_Model extends CI_Model{

    public function insert($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('regulamento', $dados);
        }
    }
    public function update($dados) {
	    if($dados != NULL){
		    $this->db->where('regulamento_id', $dados['regulamento_id']);
	        $this->db->set($dados);
	        $this->db->update('regulamento');
		}
    }
	public function getById($id)
    {	
	    $this->db->where('regulamento_id',$id);
		
		$q = $this->db->get('regulamento');
        return $q;
    }
	public function getAll() {
        $q = $this->db->get('regulamento');
        return $q;
    }
   
    
    
}