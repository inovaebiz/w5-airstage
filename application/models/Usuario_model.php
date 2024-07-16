<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model
{

    public function insert($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('cliente', $dados);
        }
    }
    public function insertUser($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('usuarios', $dados);
        }
    }
    public function insertCEmpresa($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('empresa', $dados);
        }
    }
    public function getById($id)
    {
        $this->db->where('cliente_id', $id);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByPendentes()
    {
        $this->db->where('cliente_status="0"');
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByPendentesCredenciados()
    {
        $this->db->where('cliente_status="0"');
        $this->db->where('cliente_credenciado="1"');
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByPendentesNaoCredenciados()
    {
        $this->db->where('cliente_status="0"');
        $this->db->where('cliente_credenciado="0"');
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getUsers($status = NULL, $perfil = NULL)
    {
        if ($status != NULL)
            $this->db->where('status', $status);

        if ($perfil != NULL)
            $this->db->where('perfil', $perfil);

        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByEmail($email)
    {
        $this->db->where('cliente_email', $email);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByCNPJ($cnpj)
    {
        $this->db->where('cliente_cnpj', $cnpj);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByRecu($email)
    {
        $this->db->where('cliente_email', $email);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByLogin($login)
    {
        $this->db->where('login', $login);
        $this->db->where('status = "1"');

        $q = $this->db->get('usuarios');
        return $q;
    }

    public function getSitePage()
    {
        $q = $this->db->get('site_pag');
        return $q;
    }

    public function delete($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id', $id);
            $this->db->delete('cliente');
        }
    }
    public function deleteUser($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id', $id);
            $this->db->delete('usuarios');
        }
    }

    public function update($data)
    {
        if ($data != NULL) {
            $this->db->where('cliente_id', $data['cliente_id']);
            $this->db->set($data);
            $this->db->update('cliente');
        }
    }

    public function getAll($start = NULL, $end = NULL)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $q = $this->db->get('cliente');
        return $q;
    }

    public function getByIdCredenciado($id = null)
    {
        $this->db->select('cliente_credenciado');
        $this->db->where('cliente_id',$id);
        $this->db->from('cliente');
        $q = $this->db->get();
        return $q;
    }

    public function getAllClientCredenciado($start = NULL, $end = NULL)
    {

        $this->db->where('cliente_credenciado = 1');

        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $q = $this->db->get('cliente');
        return $q;
    }

    public function getDash($start = NULL, $end = NULL, $iscred = null)
    {
        if ($start != NULL)
            $this->db->where('DATE(c.cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(c.cliente_cadastro) <= "' . $end . '"');

        if ($iscred != NULL)
            $this->db->where('c.cliente_credenciado = "' . $iscred . '"');

        $this->db->select('c.*, 
	    (SELECT IFNULL(SUM(ps.ps_pontos), 0) FROM pontos_saldo ps WHERE c.cliente_id = ps.ps_cliente_id) as saldo, 
	    
	    (SELECT IFNULL(COUNT(*),0 ) FROM obra o WHERE o.obra_cliente_id = c.cliente_id LIMIT 1) as obras, 
	    
	    (SELECT IFNULL(SUM(obra.obra_pontos),0 ) FROM obra 
        WHERE obra.obra_cliente_id = c.cliente_id 
        AND obra.obra_status = 1 LIMIT 1) as pontosLiberados,
	    
        (SELECT IFNULL(SUM(obra.obra_pontos),0 ) FROM obra 
        WHERE obra.obra_cliente_id = c.cliente_id 
        AND obra.obra_status = 2 LIMIT 1) as pontosRecusados,

	    (SELECT IFNULL(COUNT(*),0 ) FROM resgate_usuario ru WHERE ru.ru_cliente_id = c.cliente_id and ru.ru_status = 1 LIMIT 1) as resgates,

        (SELECT SUM(r.resgate_pontos) FROM resgate_usuario ru inner join resgates r on ru.ru_resgate_id = r.resgate_id WHERE ru.ru_cliente_id = c.cliente_id) as resgatesUser
        
        ');

        $q = $this->db->get('cliente c');
        return $q;
    }

    ///////////////////////////// CAMPANHA ///////////////////////////////
    public function getDash2($start = NULL, $end = NULL, $iscred = null)
    {
        if ($start != NULL)
            $this->db->where('DATE(o.obra_data) >=', $start);

        if ($end != NULL)
            $this->db->where('DATE(o.obra_data) <=', $end);

        if ($iscred != NULL)
            $this->db->where('c.cliente_credenciado', $iscred);

        $this->db->select('c.*, o.obra_id, o.obra_data, o.obra_pontos, (SELECT IFNULL(SUM(ps.ps_pontos), 0) FROM pontos_saldo ps WHERE c.cliente_id = ps.ps_cliente_id AND DATE(ps.ps_data) >= "' . $start . '") as saldo,

        (SELECT IFNULL(SUM(ps.ps_reais), 0) FROM pontos_saldo ps WHERE c.cliente_id = ps.ps_cliente_id AND DATE(ps.ps_data) >= "2023-12-01") as reais, 
        
        (SELECT IFNULL(COUNT(*),0 ) FROM obra o WHERE DATE(o.obra_data) >= "' . $start . '" AND o.obra_cliente_id = c.cliente_id) as obras,
        
        (SELECT IFNULL(SUM(o.obra_pontos),0 ) FROM obra o WHERE o.obra_cliente_id = c.cliente_id AND DATE(o.obra_data) >= "' . $start . '" AND o.obra_status = 1) as pontosLiberados,
        
        (SELECT IFNULL(SUM(o.obra_pontos),0 ) FROM obra o WHERE o.obra_cliente_id = c.cliente_id AND DATE(o.obra_data) >= "' . $start . '" AND o.obra_status = 2) as pontosRecusados,

        (SELECT IFNULL(COUNT(*),0 ) FROM resgate_usuario ru WHERE ru.ru_cliente_id = c.cliente_id AND DATE(ru.ru_data) >= "' . $start . '" AND ru.ru_status = 1) as resgates,

        (SELECT SUM(r.resgate_pontos) FROM resgate_usuario ru inner join resgates r ON ru.ru_resgate_id = r.resgate_id WHERE ru.ru_cliente_id = c.cliente_id AND DATE(ru.ru_data) >= "' . $start . '") as resgatesUser');

        $this->db->from('cliente c');
        $this->db->join('obra o', 'o.obra_cliente_id = c.cliente_id', 'left');
        $this->db->group_by('c.cliente_id');

        $q = $this->db->get();
        return $q;
    }

    public function getMarcas()
    {
        $q = $this->db->get('marcas');
        return $q;
    }
    public function getMarcasCategoria()
    {
        $q = $this->db->get('marcas_categorias');
        return $q;
    }
    public function getEmpresas($id = null)
    {
        $this->db->select('c.*,(SELECT IFNULL(SUM(ps.ps_pontos), 0) FROM pontos_saldo ps WHERE c.cliente_id = ps.ps_cliente_id) as saldo, (SELECT IFNULL(COUNT(*),0 ) FROM obra o WHERE o.obra_cliente_id = c.cliente_id LIMIT 1) as obras');

        if($id){
            $this->db->where('c.cliente_id', $id);
        }

        $q = $this->db->get('cliente c');
        return $q;
    }

    public function getEmpresasComSaldo()
    {
        $this->db->select('c.*,(SELECT IFNULL(SUM(ps.ps_pontos), 0) FROM pontos_saldo ps WHERE c.cliente_id = ps.ps_cliente_id) as saldo, (SELECT IFNULL(COUNT(*),0 ) FROM obra o WHERE o.obra_cliente_id = c.cliente_id LIMIT 1) as obras');

        $q = $this->db->get('cliente c');

        $c = array();
        foreach ($q->result() as $cc) :
            if ($cc->saldo > 0) {
                $obj = (object) array('email' => $cc->cliente_email);
                array_push($c, $obj);
            }
        endforeach;

        return $c;
    }


    public function zerarPontuacaoGeral()
    {
        $this->db->where('ps_id !=', "0");
        $this->db->set("ps_pontos", "0");
        $this->db->set("ps_reais", "0");
        $this->db->update('pontos_saldo');
    }

    public function zerarPontuacao($id)
    {
        $this->db->where('ps_cliente_id', $id);
        $this->db->set("ps_pontos", "0");
        $this->db->update('pontos_saldo');
    }

    public function getEmails($status = null, $credenciado = null)
    
    {

        $this->db->select('cliente_email');

        if (is_numeric($status)) {
            $this->db->where('cliente_status', $status);
        }

        if (is_numeric($credenciado)) {
            $this->db->where('cliente_credenciado', $credenciado);
        }

        $q = $this->db->get('cliente');
        return $q;
    }

    public function getEmailsUsers()
    {

        $this->db->select('email');
        $this->db->where('status', '1');
        $q = $this->db->get('usuarios');
        return $q;
    }

    public function getCnpjs()
    {
        $this->db->select('cliente_cnpj');
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getAllUser()
    {
        $q = $this->db->get('usuarios');
        return $q;
    }

    public function getAllClientAtived($start = NULL, $end = NULL)
    {

        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status', 1);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getAllCredenciadoOrNotClientAtived($start = NULL, $end = NULL, $is = NULL, $iscred = NULL)
    {

        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');


        if ($iscred != NULL)
            $this->db->where('cliente_credenciado = ' . $iscred . '');


        if ($is != NULL)
            $this->db->where('cliente_status ' . $is . '');

        $q = $this->db->get('cliente');
        return $q;
    }

    public function getAllClientPendente($start = NULL, $end = NULL)
    {

        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status !=', 1);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function getAllClientNaoCredencia($start = NULL, $end = NULL, $isAtive = null)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        if ($isAtive != NULL) {
            if ($isAtive == '0') {
                $this->db->where('cliente_status != 1');
            } else {
                $this->db->where('cliente_status = 1');
            }
        }

        $this->db->where('cliente_credenciado != 1');

        $q = $this->db->get('cliente');
        return $q;
    }

    public function getAllClientNaoCredenciadoInativo($start = NULL, $end = NULL)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status = 2');

        $this->db->where('cliente_credenciado != 1');

        $q = $this->db->get('cliente');

        return $q;
    }

    public function getAllClientNaoCredenciadoPendentes($start = NULL, $end = NULL)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status = 0');

        $this->db->where('cliente_credenciado != 1');

        $q = $this->db->get('cliente');

        return $q;
    }

    public function getAllClientNaoCredenciadoReprovados($start = NULL, $end = NULL)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status = 3');

        $this->db->where('cliente_credenciado != 1');

        $q = $this->db->get('cliente');

        return $q;
    }

    public function getAllClientCredenciadoReprovados($start = NULL, $end = NULL)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status = 3');

        $this->db->where('cliente_credenciado = 1');

        $q = $this->db->get('cliente');

        return $q;
    }

    public function getAllClientInative($start = NULL, $end = NULL)
    {
        if ($start != NULL)
            $this->db->where('DATE(cliente_cadastro) >= "' . $start . '"');

        if ($end != NULL)
            $this->db->where('DATE(cliente_cadastro) <= "' . $end . '"');

        $this->db->where('cliente_status', 2);
        $q = $this->db->get('cliente');
        return $q;
    }

    
    public function getByIdUser($id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get('usuarios');
        return $q;
    }
    
    public function getByUsuRecu($email)
    {
        $this->db->where('email', $email);
        $q = $this->db->get('usuarios');
        return $q;
    }
    
    public function updateUser($data)
    {
        if ($data != NULL) {

            // Convertendo array para uma string de valores separados por vírgula
            if (isset($data['distribuidores_parceiros']) && is_array($data['distribuidores_parceiros'])) {
                $data['distribuidores_parceiros'] = implode(', ', $data['distribuidores_parceiros']);
            }
            
            $this->db->where('cliente_id', $data['cliente_id']);
            $this->db->set($data);
            $this->db->update('cliente');

        }
    }
    
    public function setCodeUser($id, $code)
    {
        $this->db->where('cliente_id', $id);
        $this->db->set("code", $code);
        $this->db->update('cliente');
    }

    public function confirmCodeEmail($code)
    {
        $this->db->where('code=', $code);
        $q = $this->db->get('cliente');
        return $q;
    }

    public function updateUser2($data)
    {
        if ($data != NULL) {
            $this->db->where('id', $data['id']);
            $this->db->set($data);
            $this->db->update('usuarios');
        }
    }
    ///////////////////////////// CATEGORIA MOTIVO ///////////////////////////////
    public function insertMrCategoria($dados = NULL) {
        if ($dados!=NULL){
            $this->db->insert('motivos_de_recusa_categorias', $dados);
        }
    }

    public function updateMrCategoria($data) {
        if($data != NULL){
            $this->db->where('mr_categoria_id', $data['mr_categoria_id']);
            $this->db->set($data);
            $this->db->update('motivos_de_recusa_categorias');
        }
    }

    public function deleteMrCategoria($id = NULL) {
        if($id != NULL){
            $this->db->where('mr_categoria_id',$id);
            $this->db->delete('motivos_de_recusa_categorias');
        }
    }

    public function getByIdMrCategoria($id){
        $this->db->where('mr_categoria_id',$id);
        $q = $this->db->get('motivos_de_recusa_categorias');
        return $q;
    }

    public function getByStatusMrCategoria() {
        $q = $this->db->where('mr_categoria_status','1');
        $q = $this->db->get('motivos_de_recusa_categorias');
        return $q;
    }

    public function getAllMrCategoria($id = NULL, $s = NULL) {
        if($id != NULL)
            $this->db->where('mr_categoria_id',$id);
            
        if($s != NULL)
            $this->db->where('mr_categoria_status',$s);
        $q = $this->db->get('motivos_de_recusa_categorias');
        return $q;
    }

    ///////////////////////////// MOTIVO ///////////////////////////////
    public function getAllMR($s = NULL, $id = NULL)
    {
        $this->db->select('motivos_de_recusa.*, motivos_de_recusa_categorias.mr_categoria_nome');
        $this->db->from('motivos_de_recusa');
        $this->db->join('motivos_de_recusa_categorias', 'motivos_de_recusa.mr_categoria_id = motivos_de_recusa_categorias.mr_categoria_id', 'left');

        if ($s != NULL) {
            $this->db->where('motivos_de_recusa.mr_status', $s);
        } else {
            $this->db->where_in('motivos_de_recusa.mr_status', array(0, 1));
        }

        if ($id != NULL) {
            $this->db->where('motivos_de_recusa.mr_id', $id);
        }

        $this->db->order_by('mr_ordem', 'ASC');

        $q = $this->db->get();
        return $q;
    }

    public function insertMR($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('motivos_de_recusa', $dados);
        }
    }

    public function insertLogUpdateUser($dados)
    {
        if ($dados != NULL) {
            $this->db->insert('logsEmpresas', $dados);
        }
    }

    public function updateMR($data)
    {
        if ($data != NULL) {
            $this->db->where('mr_id', $data['mr_id']);
            $this->db->set($data);
            $this->db->update('motivos_de_recusa');
        }
    }
    public function deleteMR($id = NULL)
    {
        if ($id != NULL) {
            $data = array("mr_status" => 2);

            $this->db->where('mr_id', $id);
            $this->db->set($data);
            $this->db->update('motivos_de_recusa');
        }
    }
    //////////////////////////////////////////////////////////////////////  

    /////////////////////// RECUPERA SENHA ///////////////////////////////
    public function getHash($data = NULL)
    {
        if ($data != NULL) {
            $this->db->where('recupera_hash', $data);
            $q =  $this->db->get('recupera_senha');
            return $q;
        }
    }

    public function updateHash($data)
    {
        $this->db->where('recupera_hash', $data['recupera_hash']);
        $this->db->set($data);
        $this->db->update('recupera_senha');
    }

    public function insertHash($dados = NULL)
    {
        if ($dados != NULL) {
            $this->db->insert('recupera_senha', $dados);
        }
    }

    //////////////////////////////////////////////////////////////////////

    public function sumPointsRescue($id_user = null)
    {


        $this->db->join("resgates r", "ru.ru_resgate_id = r.resgate_id");
        $this->db->select('SUM(r.resgate_pontos)');

        if ($id_user) {
            $this->db->where('ru.ru_cliente_id', $id_user);
        }

        $q = $this->db->get('resgate_usuario ru');
        return $q;
    }
}
