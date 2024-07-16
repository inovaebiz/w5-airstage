<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treinamento_Model extends CI_Model{

    public function insert($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('treinamentos', $dados);
        }
    }
    public function getById($id){
        $this->db->where('t.treinamento_id',$id);
        $this->db->join("cliente c", "c.cliente_id = t.treinamento_cliente_id");
		$q = $this->db->get('treinamentos t');
        return $q;
    }
    
    public function getByStatus($s = NULL){
	    if($s != NULL)
        	$this->db->where('t.treinamento_status',$s);
        	
        $this->db->join("cliente c", "c.cliente_id = t.treinamento_cliente_id");
		$q = $this->db->get('treinamentos t');
        return $q;
    }
    
    public function getByIdCliente($id){
        $this->db->where('treinamento_cliente_id',$id);
		$q = $this->db->get('treinamentos');
        return $q;
    }
    
    public function delete($id = NULL)
    {
	    if($id != NULL){
			$this->db->where('treinamento_id',$id);
			$this->db->delete('treinamentos');
	    }
     }

    public function update($data) {
	    if($data != NULL){
		    $this->db->where('treinamento_id', $data['treinamento_id']);
	        $this->db->set($data);
	        $this->db->update('treinamentos');
		}
    }

	public function getAll($start = NULL,$end = NULL) {
        if($start != NULL)
	    	$this->db->where('DATE(treinamento_data) >= "'.$start.'"');
	    	
	    if($end != NULL)
	    	$this->db->where('DATE(treinamento_data) <= "'.$end.'"');
        $q = $this->db->get('treinamentos');
        return $q;
    }
}