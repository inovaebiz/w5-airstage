<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pontos extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model("Obra_Model", "obra");
    $this->load->model("Treinamento_Model", "treinamento");
    $this->load->model("Pontos_Model", "pontos");
    $this->load->model("Email_model", "email");
    $this->load->model("usuario_model", "usuario");
    $this->load->model("Equipamento_Model", "equip");
    $this->load->helper(array('form', 'url', 'noweb'));  //	HELPERS
    $this->load->library('form_validation');  //LIBRARYS
  }
  public function index()
  {
    $data = array(
      'view' => 'liberacao-de-pontos'
    );
    $this->load->view('template', $data);
  }
  public function liberacao()
  {
    $data = array(
      'view' => 'liberacao-de-pontos-dados-obra'
    );
    $this->load->view('template', $data);
  }
  public function treinamentos()
  {
    $obras = $this->treinamento->getByStatus("0");
    $data = array(
      'view' => 'liberacao-de-pontos-treinamentos',
      'obra' => $obras
    );
    $this->load->view('template', $data);
  }
  public function obras()
  {
    $obras = $this->obra->getObraByStatus("0");
    $data = array(
      'view' => 'liberacao-de-pontos-obras',
      'obra' => $obras
    );
    $this->load->view('template', $data);
  }
  public function liberacao_treinamentos()
  {
    if (!empty($_POST)) {
      $layout_fixo = $this->email->layout_email();
      $dados = $this->input->post();
      $this->treinamento->update($dados);
      $treinamento = $this->treinamento->getById($dados['treinamento_id'])->row();
      $empresa = $this->usuario->getById($treinamento->treinamento_cliente_id);
      $empresa = $empresa->first_row();
      if ($dados['treinamento_status'] == 1) {
        $insert = array(
          'ps_cliente_id' => $treinamento->treinamento_cliente_id,
          'ps_pontos' => $treinamento->treinamento_pontos,
          'ps_msg' => 'Treinamento #' . $treinamento->treinamento_id . ' - aprovado por ' . $this->session->userdata('control')->nome . ' - ' . date('d/m/Y H:i:s'),
        );
        $this->pontos->insert($insert);
      }

      ////////////////////
      $msg = '
      <body>
        <span class="preheader">Seu treinamento #' . $treinamento->treinamento_id . ' foi ' . ($dados['treinamento_status'] == 1 ? "aprovado" : "recusado") . '!</span>
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
                          <p>Seu treinamento #' . $treinamento->treinamento_id . ' foi ' . ($dados['treinamento_status'] == 1 ? "aprovado" : "recusado") . '</p>
                          <p>' . ($dados['treinamento_status'] == 1 ? "Clique no botão abaixo para ir ao portal, para ver o total de pontos que foi aprovado no seu treinamento!" : "Clique no botão abaixo para ir ao painel, para ver o motivo da recusa!") . '</p>
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
        'nome' => $treinamento->cliente_razao_social,
        'email' => $treinamento->cliente_email,
        'subject' => 'Status do treinamento foi alterado',
      );
      $this->email->send($email, $layout_fixo . $msg);
      /////////////////////////////////
      redirect('/control/pontos/treinamentos/');
    }

    $id = $this->uri->segment(4);
    $treinamento = $this->treinamento->getById($id);
    $treinamento = $treinamento->first_row();
    $status = $this->usuario->getAllMR();
    $data = array(
      'view' => 'registro-de-treinamentos-detalhe-admin',
      'treinamento' => $treinamento,
      'status' => $status
    );
    $this->load->view('template', $data);
  }
  public function liberacao_obras()
  {

    if (!empty($_POST)) {

      $dados = $this->input->post();

      if ($dados["obra_status"] == "1") {

        $dados["obra_aprovate"] = date("Y-m-d");
        $condData = $this->obra->getOK($dados['obra_id'])->result();
        foreach ($condData as $cond) :

          $this->equip->updatecondesadora($cond->ok_serial, $cond->tipo_nome);
        endforeach;
      } else {

        $s = $this->usuario->getAllMR();
        $motivo = NULL;
        foreach ($s->result() as $mr) :
          if ($mr->mr_id == $dados["obra_motivo"]) {
            $motivo = $mr->mr_nome;
            break;
          }
        endforeach;

        $condData = $this->obra->getOK($dados['obra_id'])->result();
        foreach ($condData as $cond) :
          $this->equip->updatecondesadoraLiberar($cond->ok_serial, $cond->tipo_nome);
        endforeach;
      }

      if ($dados["obra_motivo"] === "999") {
        $motivo = $dados["obra_obs"];
      }



      $this->obra->update($dados);

      $layout_fixo = $this->email->layout_email();
      $obra = $this->obra->getById($dados['obra_id'])->row();
      $empresa = $this->usuario->getById($obra->obra_cliente_id);
      $empresa = $empresa->first_row();

      if ($dados['obra_status'] == 1) {
        $insert = array(
          'ps_cliente_id' => $obra->obra_cliente_id,
          'ps_pontos' => $obra->obra_pontos,
          'ps_reais' => $obra->obra_reais,
          'ps_msg' => 'Obra #' . $obra->obra_id . ' - aprovado por "' . $this->session->userdata('control')->nome . '" - ' . date('d/m/Y H:i:s'),
        );
        $this->pontos->insert($insert);
      };

      $msg = '
          <body>
            <span class="preheader">Sua obra #' . $obra->obra_id . ' foi ' . ($dados['obra_status'] == 1 ? "aprovada" : "recusada") . '!</span>
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
                              <p>Sua obra #' . $obra->obra_id . ' foi ' . ($dados['obra_status'] == 1 ? $obra->obra_obs !== "" ? "aprovada com a seguinte ressalva:<br/> $obra->obra_obs" : "aprovada" : "recusada devido a: <br>\" " . $motivo . " \"</b>") . '</p>
                              <p>' . ($dados['obra_status'] == 1 ? "Clique no botão abaixo para ir ao portal, para ver o total de pontos que foi aprovado na sua obra!" : "Clique no botão abaixo para ir ao painel, para ver o motivo da recusa!") . '.</p>
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
        'nome' => $obra->cliente_razao_social,
        'email' => $obra->cliente_email,
        'subject' => 'Status da obra foi alterado',
      );

      if ($dados["obra_motivo"] === "97") {
        $msg = '
        <body>
            <span class="preheader">Sua obra #' . $obra->obra_id . ' foi ' . ($dados['obra_status'] == 1 ? "aprovada" :
          "recusada") . '!</span>
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
                                                <p> A plataforma do Programa Família Airstage exige que seja feito o upload (carregamento do arquivo) da cópia da Nota Fiscal de compra do produto Airstage por uma exigência do departamento de Compliance da nossa empresa para evitar fraudes e também porque esse documento é a base legal para a operação de pagamento pela pontuação acumulada e poderá ser solicitado eventualmente pela nossa auditoria interna e/ou externa.
        
                                                    <br>
                                                    <br>
        
                                                    Os dados pessoais que constam na Nota Fiscal de compra do produto Airstage são: nome completo, CPF, endereço completo, telefone e e-mail e esses mesmos dados o cliente/consumidor já informou para o instalador para que fosse realizada a instalação do produto e respectiva emissão de Recibo de Instalação ou de Nota Fiscal de Serviços de Instalação, portanto solicitar cópia legível da Nota Fiscal de compra do produto Airstage é permitido legalmente e não fere a Lei Geral de Proteção de Dados (LGPD), já que tais informações são necessárias ao serviço de instalação (art. 7º, V, da Lei nº 13.709/18 - LGPD).
                                                    
                                                    <br>
                                                    <br>
        
                                                    Para que a sua solicitação de pontuação possa ser aprovada na plataforma do Programa Família Airstage, orientamos que você entre em contato com o seu cliente (consumidor) ou com o arquiteto ou engenheiro responsável pela obra para solicitar cópia legível da Nota Fiscal de compra do produto Airstage e, em seguida, fazer o upload da nota na plataforma.
                                                    
                                                    <br>
                                                    <br>
        
                                                    E, para as próximas instalações dos condicionadores de ar Airstage, solicite sempre a Nota Fiscal de compra do produto ao cliente antes da instalação para evitar demora na aprovação na plataforma do Programa Família Airstage.
                                                    
                                                    <br>
                                                    <br>
                                                    Se necessário, este e-mail poderá ser encaminhado ao cliente ou ao seu representante (arquiteto, engenheiro, etc.) para esclarecer o motivo da nossa solicitação.
                                                    
                                                    <br>
                                                    <br>
                                                    Em caso de dúvida, favor nos contatar.
                                                    <br>
                                                    <br>
                                                    Agradecemos a compreensão.</p>
                                                <!-- Action -->
                                                <table class="body-action" align="center" width="100%" cellpadding="0"
                                                    cellspacing="0">
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
                                                                                    <a href="https://familiaairstage.com.br/"
                                                                                        class="button button--red"
                                                                                        target="_blank">Ir para o portal</a>
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
                                                    <br>Família Airstage
                                                </p>
                                                <!-- Sub copy -->
                                                <table class="body-sub">
                                                    <tr>
                                                        <td>
                                                            <p class="sub">Se você está tendo problemas com o botão acima, copie
                                                                e cole o URL abaixo em seu navegador da web.</p>
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
      }
      $this->email->send($email, $layout_fixo . $msg);

      redirect('/control/pontos/obras/');
    }
    $site = $this->obra->getSite()->row();
    $id = $this->uri->segment(4);
    $obra = $this->obra->getById($id);
    $obra = $obra->first_row();

    $ok = $this->obra->getOK($obra->obra_id);
    $oe = array();
    foreach ($ok->result() as $okItem) :
      $oe[$okItem->ok_id] = $this->obra->getOEByOK($okItem->ok_id);
    endforeach;



    $oee = $this->obra->getOEE($obra->obra_id);
    $status = $this->usuario->getAllMR();
    $data = array(
      'view' => 'registro-de-obras-detalhe-admin',
      'obra' => $obra,
      'oe' => $oe,
      'ok' => $ok,
      'oee' => $oee,
      'site' => $site,
      'status' => $status
    );
    $this->load->view('template', $data);
  }
}
