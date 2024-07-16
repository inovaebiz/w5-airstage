<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resgate_Usuario_Model extends CI_Model
{
	public function getRegistrosAtualizados() {

		$this->db->select('*');
		$this->db->from('resgate_usuario');

        // Execute a consulta
        $query = $this->db->get();

        // Verifica se a consulta retornou resultados
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Retorna os resultados como um array associativo
        } else {
            return array(); // Retorna um array vazio se não houver resultados
        }
    }
}