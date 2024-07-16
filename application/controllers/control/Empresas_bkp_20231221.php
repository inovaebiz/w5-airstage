<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Empresas extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->helper(array('form', 'url', 'noweb'));
    $this->load->model("usuario_model", "usuario");
    $this->load->model("Treinamento_Model", "treinamento");
    $this->load->model("Resgate_Model", "resgate");
    $this->load->model("Obra_Model", "obra");   //	HELPERS
    $this->load->model("Email_model", "email");
    $this->load->model("Pontos_Model", "pontos");

    $this->load->library('form_validation');  //LIBRARYS

    $this->load->model("Campanha_Model", "campanha");
    $this->camp = $this->campanha->get_campanhas_ativas();
  }
  public function index()
  {
    if (isset($_POST['delete_pontos'])) {
      $this->usuario->zerarPontuacaoGeral();
    }

    if (isset($_POST['mensagem-clientes-geral'])) {

      $status = $_POST['destinatario-clientes-status'];
      $credenciado = $status == "3" ? "" : $_POST['destinatario-clientes-credenciado'];

      $status = $status == "" ? null : intval($status);
      $credenciado = $credenciado == "" ? null : intval($credenciado);

      $emails = $this->usuario->getEmails($status, $credenciado);

      $email = array(
        'nome' => 'Familia Airstage',
        'email' => 'contato@familiafujitsu.com.br',
        'subject' => $_POST['assunto-clientes-geral'],
      );

      $this->email->send($email, $_POST['mensagem-clientes-geral'], $emails->result(), true);

      echo '<script>';
      echo 'alert("Notificação enviada com sucesso!")';
      echo '</script>';
    }

    $empresas = $this->usuario->getEmpresas();

    $data = array(
      'view' => 'empresas-cadastradas',
      'empresa' => $empresas
    );
    $this->load->view('template', $data);
  }

  public function gerarexcel()
  {

    $empresas = $this->usuario->getEmpresas();
    echo json_encode($empresas->result());
  }


  public function visualizar_empresa()
  {
    $id = $this->uri->segment(4);

    if (isset($_POST['delete_pontos_id'])) {

      $this->usuario->zerarPontuacao($id);
    }

    if (isset($_POST['cliente_senha'])) {
      if ($_POST['cliente_senha'] != '') {
        $this->form_validation->set_rules('cliente_senha', 'Senha', 'required');
        $this->form_validation->set_rules('resenha', 'Confirme a senha', 'required|matches[cliente_senha]');
      }
    }

    if (isset($_POST['resgate_id_control'])) {

      $dados = $this->input->post();
      $p = $this->pontos->getPontos($id)->row();

      if ($p->saldo < $dados['resgate_pontos_control']) {
        echo '<script>';
        echo 'alert("Você não possui pontos o suficiente!")';
        echo '</script>';
      } else {

        $pontos = array(
          'ps_cliente_id' => $id,
          'ps_pontos' => ($dados['resgate_pontos_control'] * -1),
          'ps_msg' => 'Resgate #' . $dados['resgate_id_control'],
        );
        $this->pontos->insert($pontos);

        $ru = array(
          'ru_cliente_id' => $id,
          'ru_resgate_id' => $dados['resgate_id_control'],
        );
        $this->pontos->insertRU($ru);

        ////////////////////

        // $msg = "<p>Olá</p>";
        // $msg .= "<p>Você tem um novo resgate a aprovar.</p>";
        // $msg .= "<p><a target='_blank' href='" . base_url('/control/resgate/aprovar-resgates') . "'>Veja por aqui.</a></p>";

        $msg = '<html>
          <body>
            <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
                  <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="email-masthead">
                        <a href="https://familiaairstage.com.br/" class="email-masthead_name"><img src="https://familiaairstage.com.br/assets-control/img/template-header.jpg"></a>
                      </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                      <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                          <!-- Body content -->
                          <tr>
                            <td class="content-cell">
                              <p>Olá</p>
                              <p>Você tem um novo resgate a aprovar.</p>
                              <p><a target="_blank" href="' . base_url('/control/resgate/aprovar-resgates') . '">Veja por aqui.</a></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0">
                          <tr>
                            <td class="content-cell" align="center">
                              <img src="https://familiaairstage.com.br/assets-control/img/template-footer.jpg">
                              <p class="sub align-center">&copy; 2023 Família Airstage. Todos os direitos reservados.</p>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </body>
        </html>';

        $email = array(
          'nome' => 'Familia Airstage',
          'email' => 'contato@familiafujitsu.com.br',
          'subject' => 'Novo resgate cadastrado',
        );
        $this->email->send($email, $msg);
        /////////////////////////////////
        echo '<script>';
        echo 'alert("Resgate realizado com sucesso!")';
        echo '</script>';
      }
    } else {
      $this->form_validation->set_rules('cliente_telefone', 'Telefone', 'required');
      $this->form_validation->set_rules('cliente_cep', 'CEP', 'required');
    }


    if ($this->form_validation->run()) {
      $dados = $this->input->post();
      $userAuth = $this->session->userdata('control');
      if (isset($dados['cliente_status'])) {
        $dados['cliente_status'] = 1;
      } else {
        $dados['cliente_status'] = 2;
      }
      unset($dados['resenha']);
      if ($dados['cliente_senha'] != '') {
        $dados['cliente_senha'] = md5($dados['cliente_senha']);
      } else {
        unset($dados['cliente_senha']);
      }

      $dadosLog = array(
        "usuarioQueModificou" => $userAuth->id,
        "usuarioModificado" => $dados['cliente_id'],
        "status" => $dados['cliente_status'],
        "credenciado" => $dados['cliente_credenciado']

      );

      $this->usuario->insertLogUpdateUser($dadosLog);
      $this->usuario->update($dados);
      redirect(base_url('control/empresas/visualizar-empresa/' . $id . '?msg=success'));
    }



    $empresa = $this->usuario->getById($id);
    $empresa = $empresa->first_row();
    $treinamentos = $this->treinamento->getByIdCliente($id);
    $obras = $this->obra->getByIdClienteObra($id);
    $resgates = $this->pontos->getRUByUser($id);
    $mot = $this->obra->getAllMotivo();

    $empresaData = $this->usuario->getById($id)->result();
    $resgatesall = $this->camp->row() != NULL ? $this->resgate->getByStatus($this->camp->row()->campanha_id, current($empresaData)->cliente_credenciado) : NULL;


    $data = array(
      'view' => 'dados-empresa',
      'empresa' => $empresa,
      'obras' => $obras,
      'treinamentos' => $treinamentos,
      'resgates' => $resgates,
      'mot' => $mot,
      'resgatesall' => $resgatesall,
      'camp' => $this->camp->first_row()
    );
    $this->load->view('template', $data);
  }
  public function obras_cadastradas()
  {
    $obras = $this->obra->getAll();
    $mot = $this->obra->getAllMotivo();
    $data = array(
      'view' => 'obras-cadastradas',
      'mot' => $mot,
      'obras' => $obras
    );
    $this->load->view('template', $data);
  }
  public function visualizar_treinamento()
  {
    $id = $this->uri->segment(4);
    $treinamento = $this->treinamento->getById($id);
    $treinamento = $treinamento->first_row();
    $data = array(
      'view' => 'dados-empresa-treinamento',
      'treinamento' => $treinamento
    );
    $this->load->view('template', $data);
  }
  public function visualizar_obra()
  {
    $id = $this->uri->segment(4);
    $obra = $this->obra->getById($id);
    $obra = $obra->first_row();
    $ok = $this->obra->getOK($obra->obra_id);
    $oe = array();
    foreach ($ok->result() as $okItem) :
      $oe[$okItem->ok_id] = $this->obra->getOEByOK($okItem->ok_id);
    endforeach;

    $oee = $this->obra->getOEE($obra->obra_id);
    $data = array(
      'view' => 'dados-empresa-obra',
      'obra' => $obra,
      'oe' => $oe,
      'ok' => $ok,
      'oee' => $oee
    );
    $this->load->view('template', $data);
  }
  public function aprovacao()
  {
    $empresas = $this->usuario->getByPendentesCredenciados();
    $data = array(
      'view' => 'aprovacao-de-empresas',
      'empresas' => $empresas
    );
    $this->load->view('template', $data);
  }
  public function aprovacaonaocredenciado()
  {
    $empresas = $this->usuario->getByPendentesNaoCredenciados();
    $data = array(
      'view' => 'aprovacao-empresa-dados-nao-credenciado',
      'empresas' => $empresas
    );
    $this->load->view('template', $data);
  }

  public function visualizar_aprovacao()
  {
    $id = $this->uri->segment(4);
    $empresa = $this->usuario->getById($id);
    $empresa = $empresa->first_row();
    $status = $this->usuario->getAllMR();
    $layout_fixo = $this->email->layout_email();

    if (!empty($_POST)) {

      $dados = $this->input->post();

      if (isset($_POST['edit'])) {
        $dados['cliente_id'] = $id;
        unset($dados['edit']);
        $this->usuario->update($dados);
        redirect(base_url('control/empresas/aprovacao?msg=edit'));
      }

      $dados['cliente_id'] = $id;
      unset($dados['recu']);
      unset($dados['apro']);

      $this->usuario->update($dados);

      $cli = $this->usuario->getById($id)->row();

      if ($dados['cliente_status'] == 1) {
        $msg = '
          <body>
            <span class="preheader">Cadastro aprovado com sucesso!</span>
            <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
                  <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="email-masthead">
                        <a href="https://familiaairstage.com.br/" class="email-masthead_name"><img src="https://familiaairstage.com.br/assets-control/img/template-header.jpg"></a>
                      </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                      <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                          <!-- Body content -->
                          <tr>
                            <td class="content-cell">
                              <h1>Olá ' . $empresa->cliente_razao_social . ',</h1>
                              <p>Seu cadastro com aprovado com sucesso!</p>
                              <p>Agora você tem acesso ao Portal Família Airstage, sua empresa poderá efetuar o registro de suas obras e incluir todos equipamentos Airstage instalados, e assim ganhando pontos para serem revertidos por prêmios.</p>
                              <!-- Action -->
                              <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center">
                                    <!-- Border based button
                              https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>
                                                <a href="https://familiaairstage.com.br/" class="button button--red" target="_blank">Ir para o portal</a>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>                
                              <p>Atenciosamente,
                              <br>Família Airstage</p>
                              <!-- Sub copy -->
                              <table class="body-sub">
                                <tr>
                                  <td>
                                    <p class="sub">Se você está tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador da web.</p>
                                    <p class="sub">https://familiaairstage.com.br/</p>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <tr>
                      <td>
                        <table class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0">
                          <tr>
                            <td class="content-cell" align="center">
                              <img src="https://familiaairstage.com.br/assets-control/img/template-footer.jpg">
                              <p class="sub align-center">&copy; 2023 Família Airstage. Todos os direitos reservados.</p>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </body>';

        $email = array(
          'nome' => $cli->cliente_razao_social,
          'email' => $cli->cliente_email,
          'subject' => 'Aprovação de cadastro',
        );
        $this->email->send($email, $layout_fixo . $msg);
        /////////////////////////////////

        redirect(base_url('control/empresas/aprovacao?msg=aprovada'));
      }

      if ($dados['cliente_status'] == 3) {
        $s = $this->usuario->getAllMR(NULL, $dados['cliente_motivo'])->row();

        $msg = '<body>
        <span class="preheader">' . $s->mr_nome . '</span>
        <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">
              <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="email-masthead">
                    <a href="https://familiaairstage.com.br/" class="email-masthead_name"><img src="https://familiaairstage.com.br/assets-control/img/template-header.jpg"></a>
                  </td>
                </tr>
                <!-- Email Body -->
                <tr>
                  <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                      <!-- Body content -->
                      <tr>
                        <td class="content-cell">
                          <h1>Olá ' . $empresa->cliente_razao_social . ',</h1>
                          <p>Seu cadastro foi recusado devido a ' . $s->mr_nome . '</p>
                          
                          <p>Atenciosamente,
                            <br>Família Airstage</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="content-cell" align="center">
                          <img src="https://familiaairstage.com.br/assets-control/img/template-footer.jpg">
                          <p class="sub align-center">&copy; 2023 Família Airstage. Todos os direitos reservados.</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        </body>
        </html>';

        $email = array(
          'nome' => $cli->cliente_razao_social,
          'email' => $cli->cliente_email,
          'subject' => 'Recusa de cadastro',
        );
        $this->email->send($email, $layout_fixo . $msg);
        /////////////////////////////////
        redirect(base_url('control/empresas/aprovacao?msg=reprovada'));
      }
    }

    $data = array(
      'view' => 'aprovacao-empresa-dados',
      'empresa' => $empresa,
      'status' => $status,
    );
    $this->load->view('template', $data);
  }

  public function visualizar_aprovacao_nao_credenciado()
  {
    $id = $this->uri->segment(4);
    $empresa = $this->usuario->getById($id);
    $empresa = $empresa->first_row();
    $status = $this->usuario->getAllMR();
    $layout_fixo = $this->email->layout_email();

    if (!empty($_POST)) {
      if (isset($_POST['edit'])) {
        $dados = $this->input->post();
        $dados['cliente_id'] = $id;

        unset($dados['edit']);
        $this->usuario->update($dados);
        redirect(base_url('control/empresas/aprovacaonaocredenciado?msg=edit'));
      }
      $dados = $this->input->post();
      $dados['cliente_id'] = $id;
      unset($dados['recu']);
      unset($dados['apro']);

      $this->usuario->update($dados);

      $cli = $this->usuario->getById($id)->row();

      if ($dados['cliente_status'] == 1) {
        $msg = '
      <body>
        <span class="preheader">Cadastro aprovado com sucesso!</span>
        <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">
              <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="email-masthead">
                    <a href="https://familiaairstage.com.br/" class="email-masthead_name"><img src="https://familiaairstage.com.br/assets-control/img/template-header.jpg"></a>
                  </td>
                </tr>
                <!-- Email Body -->
                <tr>
                  <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                      <!-- Body content -->
                      <tr>
                        <td class="content-cell">
                          <h1>Olá ' . $empresa->cliente_razao_social . ',</h1>
                          <p>Seu cadastro com aprovado com sucesso!</p>
                          <p>Agora você tem acesso ao Portal Família Airstage, sua empresa poderá efetuar o registro de suas obras e incluir todos equipamentos Airstage instalados, e assim ganhando pontos para serem revertidos por prêmios.</p>
                          <!-- Action -->
                          <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center">
                                <!--
                                  Border based button
                                  https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design
                                -->
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center">
                                      <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td>
                                            <a href="https://familiaairstage.com.br/" class="button button--red" target="_blank">Ir para o portal</a>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>                
                          <p>Atenciosamente,
                          <br>Família Airstage</p>
                          <!-- Sub copy -->
                          <table class="body-sub">
                            <tr>
                              <td>
                                <p class="sub">Se você está tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador da web.</p>
                                <p class="sub">https://familiaairstage.com.br/</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <tr>
                  <td>
                    <table class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="content-cell" align="center">
                          <img src="https://familiaairstage.com.br/assets-control/img/template-footer.jpg">
                          <p class="sub align-center">&copy; 2023 Família Airstage. Todos os direitos reservados.</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </body>';

        $email = array(
          'nome' => $cli->cliente_razao_social,
          'email' => $cli->cliente_email,
          'subject' => 'Aprovação de cadastro',
        );
        $this->email->send($email, $layout_fixo . $msg);
        ///////////////////////////////

        redirect(base_url('control/empresas/aprovacaonaocredenciado?msg=aprovada'));
      }
      if ($dados['cliente_status'] == 3) {
        $s = $this->usuario->getAllMR(NULL, $dados['cliente_motivo'])->row();

        $msg = '<body>
              <span class="preheader">' . $s->mr_nome . '</span>
              <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
                    <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="email-masthead">
                          <a href="https://familiaairstage.com.br/" class="email-masthead_name"><img src="https://familiaairstage.com.br/assets-control/img/template-header.jpg"></a>
                        </td>
                      </tr>
                      <!-- Email Body -->
                      <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                          <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                            <!-- Body content -->
                            <tr>
                              <td class="content-cell">
                                <h1>Olá ' . $empresa->cliente_razao_social . ',</h1>
                                <p>Seu cadastro foi recusado devido a ' . $s->mr_nome . '</p>
                                
                                <p>Atenciosamente,
                                  <br>Família Airstage</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0">
                            <tr>
                              <td class="content-cell" align="center">
                                <img src="https://familiaairstage.com.br/assets-control/img/template-footer.jpg">
                                <p class="sub align-center">&copy; 2023 Família Airstage. Todos os direitos reservados.</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              </body>
             </html>';

        $email = array(
          'nome' => $cli->cliente_razao_social,
          'email' => $cli->cliente_email,
          'subject' => 'Recusa de cadastro',
        );
        $this->email->send($email, $layout_fixo . $msg);
        /////////////////////////////////
        redirect(base_url('control/empresas/aprovacao?msg=reprovada'));
      }
    }

    $data = array(
      'view' => 'aprovacao-empresa-dados-nao',
      'empresa' => $empresa,
      'status' => $status,
    );
    $this->load->view('template', $data);
  }

  public function obras()
  {
    $data = array(
      'view' => 'aprovacao-de-empresas'
    );
    $this->load->view('template', $data);
  }

  public function treinamentos()
  {
    $data = array(
      'view' => 'aprovacao-de-empresas'
    );
    $this->load->view('template', $data);
  }

  public function resgate()
  {
    $data = array(
      'view' => 'aprovacao-de-empresas'
    );
    $this->load->view('template', $data);
  }
}
