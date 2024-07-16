<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resgate_Model extends CI_Model
{

    protected $table = 'resgates';
    protected $softDeletes = true; // Ativar exclusões suaves
    
    public function insert($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('resgates', $dados);
            return $this->db->insert_id();
        }
    }
    public function getById($id)
    {
        $this->db->where('resgate_id', $id);
        $q = $this->db->get('resgates');
        return $q;
    }

    public function getByIdCliente($id)
    {
        $this->db->where('resgates_cliente_id', $id);
        $q = $this->db->get('resgates');
        return $q;
    }

    public function getByStatus($id = NULL, $perfilUsuario = null)
    {
        $this->db->where('resgate_status = "1"');

        if ($id != NULL) {
            $this->db->where('campanha_id', $id);
        }

        if ($perfilUsuario == "1") { // Credenciados
            $this->db->where('tipo_cre', '1');
        } else { //Não Credenciados
            $this->db->where('tipo_cre !=', '1');
        }


        $q = $this->db->get('resgates');
        return $q;
    }

    public function delete($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('resgate_id', $id);
            $this->db->delete('resgates');
        }
    }

    public function update($data)
    {
        if ($data != NULL) {
            $this->db->where('resgate_id', $data['resgate_id']);
            $this->db->set($data);
            $this->db->update('resgates');
        }
    }

    public function getAll($c)
    {
        if ($c != NULL) {
            $this->db->where('campanha_id', $c);
        }
        $q = $this->db->get('resgates');
        return $q;
    }
}
