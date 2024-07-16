<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Politica_Model extends CI_Model{

    public function insert($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('politicas', $dados);
        }
    }
    public function update($dados) {
	    if($dados != NULL){
		    $this->db->where('politica_id', $dados['politica_id']);
	        $this->db->set($dados);
	        $this->db->update('politicas');
		}
    }
	public function getById($id)
    {	
	    $this->db->where('politica_id',$id);
		$q = $this->db->get('politicas');
        return $q;
    }
	public function getAll() {
        $q = $this->db->get('politicas');
        return $q;
    }
    public function getByStatus(){
		$this->db->where('politica_status = "1"');
	    $q = $this->db->get('politicas');
	    return $q;
    }
    public function delete($id = NULL)
    {
	    if($id != NULL){
			$this->db->where('politica_id',$id);
			$this->db->delete('politicas');
	    }
     }
   
    
    
}