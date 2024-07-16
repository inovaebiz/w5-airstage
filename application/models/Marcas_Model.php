<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas_Model extends CI_Model{
//##################	Sub-categorias	###########################################
    public function insertMarca($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('marcas', $dados);
        }
    }
    public function getByIdMarca($id){
        $this->db->where('marca_id',$id);
		$q = $this->db->get('marcas');
        return $q;
    }
    public function getByIdMarcaCliente($id){
        $this->db->where('marca_cliente_id',$id);
		$q = $this->db->get('marcas');
        return $q;
    }

    public function deleteMarca($id = NULL) {
	    if($id != NULL){
			$this->db->where('marca_id',$id);
			$this->db->delete('marcas');
	    }
     }

    public function updateMarca($data) {
	    if($data != NULL){
		    $this->db->where('marca_id', $data['marca_id']);
	        $this->db->set($data);
	        $this->db->update('marcas');
		}
    }
	public function getAllMarcas($s = NULL) {
		if($s != NULL)
			$this->db->where('marca_status',$s);
        $q = $this->db->get('marcas');
        return $q;
    }
//##################	!Sub-categorias	###########################################
//##################	Tipos	###########################################
	public function insertCategoria($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('marcas_categorias', $dados);
        }
    }
    public function getByIdCategoria($id){
        $this->db->where('mcategorias_id',$id);
		$q = $this->db->get('marcas_categorias');
        return $q;
    }
    public function getByIdCategoriaMarca($id){
        $this->db->where('mcategoria_marca_id',$id);
		$q = $this->db->get('marcas_categorias');
        return $q;
    }

    public function deleteCategoria($id = NULL) {
	    if($id != NULL){
			$this->db->where('mcategorias_id',$id);
			$this->db->delete('marcas_categorias');
	    }
     }

    public function updateCategoria($data) {
	    if($data != NULL){
		    $this->db->where('mcategorias_id', $data['mcategorias_id']);
	        $this->db->set($data);
	        $this->db->update('marcas_categorias');
		}
    }
	public function getAllCategoria($id = NULL, $s = NULL) {
		if($id != NULL)
			$this->db->where('mcategorias_id',$id);
			
		if($s != NULL)
			$this->db->where('mcategoria_status',$s);
        $q = $this->db->get('marcas_categorias');
        return $q;
    }
//##################	!Tipos	###########################################
}