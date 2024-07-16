<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanha_Model extends CI_Model{
	public function get_campanhas_ativas(){
		$this->db->where("campanha_status", "1");
		$q = $this->db->get('campanhas');
        return $q;
	}

    public function insert($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('campanhas', $dados);
        }
    }
    public function getById($id){
        $this->db->where('campanha_id',$id);
		$q = $this->db->get('campanhas');
        return $q;
    }
    
    public function delete($id = NULL)
    {
	    if($id != NULL){
			$this->db->where('campanha_id',$id);
			$this->db->delete('campanhas');
	    }
     }

    public function update($data) {
	    if($data != NULL){
		    $this->db->where('campanha_id', $data['campanha_id']);
	        $this->db->set($data);
	        $this->db->update('campanhas');
		}
    }
    public function getByStatus() {
		$q = $this->db->where('campanha_status','1');
        $q = $this->db->get('campanhas');
        return $q;
    }
	public function getAllStatus() {
		$q = $this->db->where('campanha_status','1');
        $q = $this->db->get('campanhas');
        return $q;
    }
	public function getAll() {
        $q = $this->db->get('campanhas');
        return $q;
    }
}