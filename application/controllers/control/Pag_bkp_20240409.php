<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Pag extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model("Obra_Model", "obra");
    $this->load->model("usuario_model", "usuario");
    $this->load->model("Email_model", "email");
    $this->load->model("Pontos_Model", "pontos");
    $this->load->model("Treinamento_Model", "treinamento");
    $this->load->model("Resgate_Model", "resgate"); //	HELPERS
    $this->load->helper(array('form', 'url', 'noweb')); //  HELPERS
    $this->load->library('form_validation'); //LIBRARYS
  }

  public function dashboard()
  {
    $s = null;
    $e = null;

    if (!empty($_GET)) {

      if (isset($_GET['s'])) {

        if ($_GET['s'] != "") {
          $s = date('Y-m-d', strtotime(str_replace('/', '-', $_GET['s'])));
        }
      }

      if (isset($_GET['e'])) {

        if ($_GET['e'] != "") {
          $e = date('Y-m-d', strtotime(str_replace('/', '-', $_GET['e'])));
        }
      }

      // if (isset($_GET['c'])) {

      //   if ($_GET['c'] != "") {
      //     var_dump($_GET['c']);
      //   }
      // }
    }

    $usuarios              = $this->usuario->getAllClientCredenciado($s, $e);
    $usuarios              = $usuarios->num_rows();

    $usuariosAll              = $this->usuario->getAll($s, $e);
    $usuariosAll              = $usuariosAll->num_rows();


    $obras                 = $this->obra->getAll($s, $e);
    $obras                 = $obras->num_rows();
    $equipamentos_externos = $this->obra->GetAllOEE($s, $e);
    $equipamentos_externos = $equipamentos_externos->num_rows();
    $usuariosAtivos        = $this->usuario->getAllCredenciadoOrNotClientAtived($s, $e, '=1', 1);
    $usuariosAtivos        = $usuariosAtivos->num_rows();
    $usuariosInativos        = $this->usuario->getAllCredenciadoOrNotClientAtived($s, $e, "=2", 1);
    $usuariosInativos        = $usuariosInativos->num_rows();

    $usuariosNaoCreadenciado = $this->usuario->getAllClientNaoCredencia($s, $e);
    $usuariosNaoCreadenciado = $usuariosNaoCreadenciado->num_rows();

    $usuariosNaoCreadenciadoAtivo = $this->usuario->getAllClientNaoCredencia($s, $e, '1');
    $usuariosNaoCreadenciadoAtivo = $usuariosNaoCreadenciadoAtivo->num_rows();

    $usuariosNaoCreadenciadoNaoAtivo = $this->usuario->getAllClientNaoCredenciadoPendentes($s, $e, '0');
    $usuariosNaoCreadenciadoNaoAtivo = $usuariosNaoCreadenciadoNaoAtivo->num_rows();

    $usuariosNaoCreadenciadoNaoAtivos = $this->usuario->getAllClientNaoCredenciadoInativo($s, $e);
    $usuariosNaoCreadenciadoNaoAtivos = $usuariosNaoCreadenciadoNaoAtivos->num_rows();


    $usuariosNaoCreadenciadoReprovados = $this->usuario->getAllClientNaoCredenciadoReprovados($s, $e);
    $usuariosNaoCreadenciadoReprovados = $usuariosNaoCreadenciadoReprovados->num_rows();


    $usuariosCreadenciadoReprovados = $this->usuario->getAllClientCredenciadoReprovados($s, $e);
    $usuariosCreadenciadoReprovados = $usuariosCreadenciadoReprovados->num_rows();


    $usuariosPendente        = $this->usuario->getAllCredenciadoOrNotClientAtived($s, $e, '= 0', 1);
    $usuariosPendente        = $usuariosPendente->num_rows();
    $resgateAll              = $this->usuario->sumPointsRescue();



    foreach ($resgateAll->result()[0] as $property => $value) {
      $first_value = $value;
      break;
    }

    $resgateAll = $first_value;

    //$pontos_r = $this->pontos->getPontosFull($s, $e);
    //$pr = $pontos_r->num_rows() == 0 ? 0 : $pontos_r->row()->saldo;
    $pontos_r = $this->obra->getAll($s, $e);
    $pontos_a = 0;

    foreach ($pontos_r->result() as $item) {

      if ($item->obra_status == 1) {
        $pontos_a += (int)$item->obra_pontos;
      }
    }

    $highWallQF = $this->obra->rhighWallQF($s, $e)->num_rows();
    $highWallF  = $this->obra->rhighWallF($s, $e)->num_rows();
    $teto       = $this->obra->rTeto($s, $e)->num_rows();
    $cassete    = $this->obra->rCassete($s, $e)->num_rows();
    $multi      = $this->obra->rMulti($s, $e)->num_rows();
    $equips     = $this->obra->getOE(null, null);

    $treinamento                   = $this->treinamento->getAll($s, $e);
    $treinamentos                  = $treinamento->num_rows();
    $treinamento_pontos_liberado   = 0;
    $treinamento_pontos_aguardando = 0;

    foreach ($treinamento->result() as $item) {

      if ($item->treinamento_status == '1') {
        $treinamento_pontos_liberado += (int)$item->treinamento_pontos;
      }
    }

    foreach ($treinamento->result() as $item) {

      if ($item->treinamento_status == '0') {
        $treinamento_pontos_aguardando += (int)$item->treinamento_pontos;
      }
    }


    $data = array(
      'view'                          => 'dashboard',
      'usuarios'                      => $usuarios - $usuariosCreadenciadoReprovados,
      'obras'                         => $obras,
      'equip_ex'                      => $equipamentos_externos,
      'pontos_a'                      => $pontos_a,
      'highWallQF'                    => $highWallQF,
      'highWallF'                     => $highWallF,
      'teto'                          => $teto,
      'cassete'                       => $cassete,
      'multi'                         => $multi,
      'treinamentos'                  => $treinamentos,
      'treinamento_pontos_liberado'   => $treinamento_pontos_liberado,
      'treinamento_pontos_aguardando' => $treinamento_pontos_aguardando,
      'usuariosAtivos'                => $usuariosAtivos,
      'usuariosInativos'              => $usuariosInativos,
      'usuariosPendente'              => $usuariosPendente,
      'usuariosNaoCreadenciado'       => $usuariosNaoCreadenciado - $usuariosNaoCreadenciadoReprovados,
      'usuariosNaoCreadenciadoAtivo'  => $usuariosNaoCreadenciadoAtivo,
      'usuariosNaoCreadenciadoNaoAtivo'  => $usuariosNaoCreadenciadoNaoAtivo,
      'usuariosAll'                   => $usuariosAll - $usuariosNaoCreadenciadoReprovados - $usuariosCreadenciadoReprovados,
      'usuariosNaoCreadenciadoNaoAtivos' => $usuariosNaoCreadenciadoNaoAtivos,
      'usuariosNaoCreadenciadoReprovados' => $usuariosNaoCreadenciadoReprovados,
      'usuariosCreadenciadoReprovados' => $usuariosCreadenciadoReprovados,
      'resgateAll'                     => $resgateAll
    );
    $this->load->view('template', $data);
  }

  public function dashboardXLS()
  {
    $s = $e = null;

    if (!empty($_GET)) {

      if (isset($_GET['s'])) {

        if ($_GET['s'] != "") {
          $s = date('Y-m-d', strtotime(str_replace('/', '-', $_GET['s'])));
        }
      }

      if (isset($_GET['e'])) {

        if ($_GET['e'] != "") {
          $e = date('Y-m-d', strtotime(str_replace('/', '-', $_GET['e'])));
        }
      }
    }

    $c = null;

    if (!empty($_GET)) {

      if (isset($_GET['c'])) {

        if ($_GET['c'] == 1) {
          $usuarios = $this->usuario->getDash($s, $e);
          $data     = array(
            'usuarios' => $usuarios,
          );
          $this->load->view('cadastro', $data);
        }

        if ($_GET['c'] == 2) {
          $obras    = $this->obra->getAll($s, $e);
          $motivo    = $this->obra->getAllMotivo($s, $e);
          $equips   = $this->obra->getOED(null, null);
          $ok       = $this->obra->getOK();
          $serial_c = $this->obra->getAllSerialC();
          $serial_e = $this->obra->getAllSerialE();

          //var_dump($serial_e->row());

          //var_dump($equips->result());

          //exit;

          //var_dump($obras->row());
          //exit;

          $data = array(
            'obras'    => $obras,
            'equips'   => $equips,
            'serial_c' => $serial_c,
            'serial_e' => $serial_e,
            'ok'       => $ok,
            'motivo'   => $motivo
          );
          $this->load->view('obras', $data);
        }

        if ($_GET['c'] == 3) {
          $treinamento = $this->treinamento->getAll($s, $e);
          $data        = array(
            'treinamento' => $treinamento,
          );
          $this->load->view('treinamentos', $data);
        }

        if ($_GET['c'] == 4) {
          $usuarios = $this->usuario->getDash($s, $e, 1);
          $data     = array(
            'usuarios' => $usuarios,
          );
          $this->load->view('cadastro_credenciado', $data);
        }

        if ($_GET['c'] == 5) {
          $usuarios = $this->usuario->getDash($s, $e, 0);
          $data     = array(
            'usuarios' => $usuarios,
          );
          $this->load->view('cadastro_nao_credenciado', $data);
        }

        if ($_GET['c'] == 6) {
          $resgate = $this->pontos->getResgates($s, $e);
          $data     = array(
            'resgate' => $resgate,
          );
          $this->load->view('resgates', $data);
        }

        if ($_GET['c'] == 7) {
          $usuarios = $this->usuario->getDash2($s, $e, 0);
          $data     = array(
            'usuarios' => $usuarios,
          );
          $this->load->view('fechamento_campanha', $data);
        }

      }
    }

    //$usuarios = $this->usuario->getDash($s, $e);

    //var_dump($usuarios->result());

    //exit;

    //$usuarios = $usuarios->num_rows();

    //$obras = $this->obra->getAll($s, $e );

    //$obras = $obras->num_rows();

    //$equipamentos_externos = $this->obra->GetAllOEE($s, $e );

    //$pontos_r = $this->pontos->getPontosFull($s, $e);

    //$pr = $pontos_r->num_rows() == 0 ? 0 : $pontos_r->row()->saldo;

    //$highWallQF = $this->obra->rhighWallQF($s, $e)->num_rows();

    //$highWallF = $this->obra->rhighWallF($s, $e )->num_rows();

    //$teto = $this->obra->rTeto($s, $e )->num_rows();

    //$cassete = $this->obra->rCassete($s, $e )->num_rows();
    //$multi = $this->obra->rMulti($s, $e )->num_rows();

  }

  public function pontos()
  {

    $dados = $this->input->post();

    if (isset($_POST['site_pag_id'])) {

      $dados = $this->input->post();
      $this->obra->updateSitePag($dados);
      redirect(base_url('control/pag/pontos?msg=edit'));
    } else {

      $this->form_validation->set_rules('pontos', 'Pontos', 'required');

      if ($this->form_validation->run()) {
        $dados = $this->input->post();
        $this->obra->updateSite($dados);
        redirect(base_url('control/pag/pontos?msg=edit'));
      }
    }

    $pages = $this->usuario->getSitePage();
    $site = $this->obra->getSite()->row();
    $data = array(
      'view' => 'editar-pontos',
      'site' => $site,
      'pages' => $pages
    );
    $this->load->view('template', $data);
  }

  public function sendTesteEmail()
  {
    $msg   = '<p>Mensagem teste</p>';
    $email = array(
      'nome'    => 'Familia Airstage',
      'email'   => 'gerson@w5.com.br',
      'subject' => 'Mudança de Senha',
    );

    $result = $this->email->send($email, $msg);

    var_dump($result);
  }
}