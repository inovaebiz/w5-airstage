<?php header("Access-Control-Allow-Origin: *");
if (!defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("usuario_model", "usuario");
    $this->load->model("Regulamento_Model", "regu");
    $this->load->model("Pontos_Model", "pontos");
    $this->load->model("Email_model", "email");
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url', 'noweb'));
    $this->load->model("Campanha_Model", "campanha");
    $this->camp = $this->campanha->get_campanhas_ativas();
  }

  public function index()
  {
    $user = $this->session->userdata('cliente');
    if (!$user) {
      redirect(base_url('cliente/auth/login')); // VERICA SE O USUARIO ESTA LOGADO 
    }
    $usuarios = $this->usuario->getAll();
    $dados = array(
      'view' => 'gerenciar-usuarios',
      'usuarios' => $usuarios,
      'camp' => $this->camp->first_row()
    );
    $this->load->view("template", $dados);
  }
  public function step1Ajax()
  {
    if (!empty($_POST)) {
      $d = $this->input->post();
      $us = $this->usuario->getCli($d['email'], $d['cnpj']);
      if ($us->num_rows() > 0) {
        echo 0;
      } else {
        echo 1;
      }
    }
  }

  public function login()
  {
    $logado = $this->session->userdata("cliente");
    $pages  = $this->usuario->getSitePage();

    if ($logado)
      redirect(base_url('cliente/politica/'));

    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('senha', 'Senha', 'required');

    $ex = '';
    if ($this->form_validation->run()) {
      $email = $this->input->post("email");
      $senha = md5($this->input->post("senha"));
      $user = $this->usuario->getByEmail($email);
      //echo $this->db->last_query();
      //exit;

      if (count($user->result()) > 0) {
        $u = $user->first_row();

        if ($user->result()[0]->cliente_status != 1) {
          $ex = 'Verifique os dados informados.';
        } else {

          if ($u->cliente_senha == $senha) {
            $this->session->set_userdata("cliente", $u);
            redirect(base_url('cliente/politica/'));
          } else {
            $ex = 'Verifique os dados informados.';
          }
        }
      } else {
        $ex = 'Verifique os dados informados.';
      }
    }
    $dados = array(
      'view' => 'login',
      'ex' => $ex,
      'page' => $pages
    );
    $this->load->view("cliente_template", $dados);
  }

  public function cadastrar()
  {
    $this->form_validation->set_rules('cliente_razao_social', 'Razão Social', 'required');
    $this->form_validation->set_rules('cliente_email', 'E-mail', 'required|is_unique[cliente.cliente_email]');
    if ($this->form_validation->run()) {

      $dados = $this->input->post();

      $dados['distribuidoresparceiros'] = join(", ", $dados['distribuidoresparceiros']);
      unset($dados['resenha']);
      $dados['cliente_senha'] = md5($dados['cliente_senha']);
      $dados['cliente_cadastro'] = date("Y-m-d");

      $isCreate  = $this->usuario->insert($dados);


      //////////////////

      $msg = "<p>Olá</p>";
      $msg .= "<p>Você tem um novo cadastro a aprovar.</p>";
      $msg .= "<p><a target='_blank' href='" . base_url('/control/empresas/aprovacao/') . "'>Veja por aqui.</a></p>";

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
                            <p>Você tem um novo cadastro a aprovar.</p>
                            <p><a target="_blank" href="' . base_url('/control/empresas/aprovacao/') . '">Veja por aqui.</a></p>
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
        'subject' => 'Novo cadastro de cliente',
      );
      $this->email->send($email, $msg);
      ///////////////////////////////

      //////////////////

      $layout_fixo = $this->email->layout_email();

      $msg = '<html>
          <body>
          <span class="preheader">Obrigado por cadastrar-se no Programa Família Airstage. Reunimos algumas informações e recursos para ajudar você a começar.</span>
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
                            <h1>Olá ' . $dados['cliente_razao_social'] . ',</h1>
                            <p>Obrigado por cadastrar-se no Programa Família Airstage. Estamos felizes em ter você conosco.</p>

                            <p>Atenciosamente,
                              <br>Família Airstage</p>

                            <!-- Sub copy -->
                            <table class="body-sub">
                              <tr>
                                <td>
                                  <p class="sub">Em até 2 dias úteis, nossa equipe entrará em contato por e-mail, informando que o cadastro foi realizado, liberando seu acesso.</p>
                                </td>
                              </tr>
                            </table>
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
        'nome' => $dados['cliente_razao_social'],
        //'email' => 'contato@familiafujitsu.com.br',
        'email' => $dados['cliente_email'],
        'subject' => 'Familia Airstage',
      );
      $this->email->send($email, $layout_fixo . $msg);
      ///////////////////////////////

      if ($isCreate == null) {
        redirect(base_url('cliente/auth/cadastro-sucesso'));
      }
      // redirect("/cadastro-sucesso");
    }
    $regu = $this->regu->getById(3);
    $regu = $regu->first_row();
    $politica = $this->regu->getById(4);
    $politica = $politica->first_row();
    $dados = array(
      'view' => 'cadastro',
      'regu' => $regu,
      'politica' => $politica,
      'camp' => null
    );
    $this->load->view("cliente_template", $dados);
  }

  public function cadastro_sucesso()
  {
    $dados = array(
      'view' => 'cadastro-success',
    );
    $this->load->view("cliente_template", $dados);
  }


  public function cadastrar_()
  {
    $this->form_validation->set_rules('empresa_razao_social', 'Nome', 'required');
    $this->form_validation->set_rules('empresa_email', 'Email', 'required|valid_email||is_unique[empresa.empresa_email]');
    $this->form_validation->set_rules('login', 'Login', 'required');
    $this->form_validation->set_rules('senha', 'Senha', 'required');
    $this->form_validation->set_rules('resenha', 'Confirme a senha', 'required|matches[senha]');
    $ex = '';
    $foto = '';
    if ($this->form_validation->run()) {
      $nUser = array(
        'email' => $this->input->post('email'),
        'login' => $this->input->post('login'),
        'nome' => $this->input->post('nome'),
        'tel' => $this->input->post('tel'),
        'cep' => $this->input->post('cep'),
        'logradouro' => $this->input->post('logradouro'),
        'numero' => $this->input->post('numero'),
        'comp' => $this->input->post('comp'),
        'status' => $this->input->post('status'),
        'bairro' => $this->input->post('bairro'),
        'uf' => $this->input->post('uf'),
        'cidade' => $this->input->post('cidade'),
        'senha' => md5($this->input->post('senha')),
      );
      $this->usuario->insert($nUser);
      redirect(base_url('cliente/auth?msg=cadastrar'));
    }
    $dados = array(
      'view' => 'cadastro',
      'ex' => $ex
    );
    $this->load->view("cliente_template", $dados);
  }


  public function meus_dados()
  {
    $user = $this->session->userdata('cliente');
    //$editar_id = $this->uri->segment(4);
    $editar_id = $this->session->userdata("cliente")->cliente_id;
    $editando_id = $user->cliente_id;
    if ($editando_id != 1) {
      if ($editar_id == 1) {
        redirect('/cliente/auth/meus-dados/' . $editando_id);
      }
    }

    $this->form_validation->set_rules('cliente_razao_social', 'Razão Social', 'required');
    $this->form_validation->set_rules('cliente_email', 'E-mail', 'required');

    if (isset($_POST['cliente_senha'])) {
      if ($_POST['cliente_senha'] != '') {
        $this->form_validation->set_rules('cliente_senha', 'Senha', 'required');
        $this->form_validation->set_rules('resenha', 'Confirme a senha', 'required|matches[cliente_senha]');
      }
    }
    if ($this->form_validation->run()) {

      $dados = $this->input->post();
      $dados['cliente_id'] = $editar_id;

      unset($dados['resenha']);
      if ($dados['cliente_senha'] != '') {
        $dados['cliente_senha'] = md5($dados['cliente_senha']);
      } else {
        unset($dados['cliente_senha']);
      }
      $this->usuario->updateUser($dados);
      redirect(base_url('cliente/auth/meus-dados?msg=edit'));
    }
    $u = NULL;
    //$id = $this->uri->segment(4);
    $id = $this->session->userdata("cliente")->cliente_id;
    $user = $this->usuario->getById($id);
    $cliente = $user->first_row();
    //var_dump($cliente);
    $pontos = $this->pontos->getPontos($this->session->userdata('cliente')->cliente_id)->row();
    $dados = array(
      'view' => 'meus-dados',
      'cliente' => $cliente,
      'pontuacao' => $pontos,
      'camp' => $this->camp->first_row()
    );
    $this->load->view("cliente_template", $dados);
  }

  public function updateemail()
  {
    $user = $this->session->userdata('cliente');
    $code = rand();

    ////////////////////

    // $msg = "<p>Olá</p>";
    // $msg .= "<p>Use o seguinte codigo para confirmar a atualização</p>";
    // $msg .= "<p>" . $code . "</p>";

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
                            <p>Use o seguinte codigo para confirmar a atualização</p>
                            <p>"' . $code . '"</p>
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
      'email' => $user->cliente_email,
      'subject' => 'Atualização de E-mail',
    );
    $this->email->send($email, $msg);
    $this->usuario->setCodeUser($user->cliente_id, $code);
    echo json_encode($user);
  }


  public function confirmemailuser()
  {
    $user = $this->usuario->confirmCodeEmail($_GET['code'])->first_row();
    ////////////////////

    // $msg = "<p>Olá</p>";
    // $msg .= "<p>Cliente " . $user->cliente_razao_social . " CNPJ " . $user->cliente_cnpj . ", realizou atualização de e-mail</p>";

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
                            <p>Cliente "' . $user->cliente_razao_social . '" CNPJ "' . $user->cliente_cnpj . '", realizou atualização de e-mail</p>
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
      'subject' => 'Atualização de E-mail',
    );
    $this->email->send($email, $msg);
    echo json_encode($user);
  }

  public function logout()
  {
    $this->session->unset_userdata("cliente");
    $this->session->unset_userdata("logado");
    redirect(base_url('cliente/auth/login/'));
  }

  public function deletar_usuario()
  {
    $logado = $this->session->userdata("logado");

    $id = $this->uri->segment(4);
    if ($id != '') {
      $this->usuario->delete($id);
      redirect('cliente/auth?msg=delete');
    }
  }

  public function tela_introdutoria()
  {
    $introducao = $this->regu->getById(1);
    $introducao = $introducao->first_row();

    $introPart = $this->regu->getById(2);
    $introPart = $introPart->first_row();

    $data = array(
      'view' => 'tela-introdutoria',
      'introducao' => $introducao,
      'introPart' => $introPart
    );
    $this->load->view('cliente_template', $data);
  }

  public function recuperar_senha()
  {
    $ex = '';
    $this->form_validation->set_rules('email', 'Email', 'required');
    if ($this->form_validation->run()) {
      $u = $this->usuario->getByRecu($this->input->post('email'));
      if (count($u->result()) > 0) {
        //envia email para email do usuario
        $usuario = $u->first_row();
        if ($this->envia_recuperacao($usuario)) {
        }
      } else {
        $ex = 'Usuario não encontrado no base de dados!';
      }
    }


    $dados = array(
      'view' => 'recuperar-senha',
      'ex' => $ex,
    );
    $this->load->view('cliente_template', $dados);
  }

  public function email()
  {
    $msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
          <title>Set up a new password for {{ product_name }}</title>
          <!--
          The style block is collapsed on page load to save you some scrolling.
          Postmark automatically inlines all CSS properties for maximum email client
          compatibility. You can just update styles here, and Postmark does the rest.
          -->
          <style type="text/css" rel="stylesheet" media="all">
          /* Base ------------------------------ */

          *:not(br):not(tr):not(html) {
            font-family: "Montserrat", Arial;
            box-sizing: border-box;
          }

          body {
            width: 100% !important;
            height: 100%;
            margin: 0;
            line-height: 1.4;
            background-color: #F2F4F6;
            color: #74787E;
            -webkit-text-size-adjust: none;
          }

          p,
          ul,
          ol,
          blockquote {
            line-height: 1.4;
            text-align: left;
          }

          a {
            color: #3869D4;
          }

          a img {
            border: none;
          }

          td {
            word-break: break-word;
          }
          /* Layout ------------------------------ */

          .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            background-color: #F2F4F6;
          }

          .email-content {
            width: 100%;
            margin: 0;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
          }
          /* Masthead ----------------------- */

          .email-masthead {
            padding: 25px 0;
            text-align: center;
          }

          .email-masthead_logo {
            width: 94px;
          }

          .email-masthead_name {
            font-size: 16px;
            font-weight: bold;
            color: #bbbfc3;
            text-decoration: none;
            text-shadow: 0 1px 0 white;
          }
          /* Body ------------------------------ */

          .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            border-top: 1px solid #EDEFF2;
            border-bottom: 1px solid #EDEFF2;
            background-color: #FFFFFF;
          }

          .email-body_inner {
            width: 570px;
            margin: 0 auto;
            padding: 0;
            -premailer-width: 570px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            background-color: #FFFFFF;
          }

          .email-footer {
            width: 570px;
            margin: 0 auto;
            padding: 0;
            -premailer-width: 570px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            text-align: center;
          }

          .email-footer p {
            color: #AEAEAE;
          }

          .body-action {
            width: 100%;
            margin: 30px auto;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            text-align: center;
          }

          .body-sub {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #EDEFF2;
          }

          .content-cell {
            padding: 35px;
          }

          .preheader {
            display: none !important;
            visibility: hidden;
            mso-hide: all;
            font-size: 1px;
            line-height: 1px;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
          }
          /* Attribute list ------------------------------ */

          .attributes {
            margin: 0 0 21px;
          }

          .attributes_content {
            background-color: #EDEFF2;
            padding: 16px;
          }

          .attributes_item {
            padding: 0;
          }
          /* Related Items ------------------------------ */

          .related {
            width: 100%;
            margin: 0;
            padding: 25px 0 0 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
          }

          .related_item {
            padding: 10px 0;
            color: #74787E;
            font-size: 15px;
            line-height: 18px;
          }

          .related_item-title {
            display: block;
            margin: .5em 0 0;
          }

          .related_item-thumb {
            display: block;
            padding-bottom: 10px;
          }

          .related_heading {
            border-top: 1px solid #EDEFF2;
            text-align: center;
            padding: 25px 0 10px;
          }
          /* Discount Code ------------------------------ */

          .discount {
            width: 100%;
            margin: 0;
            padding: 24px;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            background-color: #EDEFF2;
            border: 2px dashed #9BA2AB;
          }

          .discount_heading {
            text-align: center;
          }

          .discount_body {
            text-align: center;
            font-size: 15px;
          }
          /* Social Icons ------------------------------ */

          .social {
            width: auto;
          }

          .social td {
            padding: 0;
            width: auto;
          }

          .social_icon {
            height: 20px;
            margin: 0 8px 10px 8px;
            padding: 0;
          }
          /* Data table ------------------------------ */

          .purchase {
            width: 100%;
            margin: 0;
            padding: 35px 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
          }

          .purchase_content {
            width: 100%;
            margin: 0;
            padding: 25px 0 0 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
          }

          .purchase_item {
            padding: 10px 0;
            color: #74787E;
            font-size: 15px;
            line-height: 18px;
          }

          .purchase_heading {
            padding-bottom: 8px;
            border-bottom: 1px solid #EDEFF2;
          }

          .purchase_heading p {
            margin: 0;
            color: #9BA2AB;
            font-size: 12px;
          }

          .purchase_footer {
            padding-top: 15px;
            border-top: 1px solid #EDEFF2;
          }

          .purchase_total {
            margin: 0;
            text-align: right;
            font-weight: bold;
            color: #2F3133;
          }

          .purchase_total--label {
            padding: 0 15px 0 0;
          }
          /* Utilities ------------------------------ */

          .align-right {
            text-align: right;
          }

          .align-left {
            text-align: left;
          }

          .align-center {
            text-align: center;
          }
          /*Media Queries ------------------------------ */

          @media only screen and (max-width: 600px) {
            .email-body_inner,
            .email-footer {
              width: 100% !important;
            }
          }

          @media only screen and (max-width: 500px) {
            .button {
              width: 100% !important;
            }
          }
          /* Buttons ------------------------------ */

          .button {
            background-color: #3869D4;
            border-top: 10px solid #3869D4;
            border-right: 18px solid #3869D4;
            border-bottom: 10px solid #3869D4;
            border-left: 18px solid #3869D4;
            display: inline-block;
            color: #FFF;
            text-decoration: none;
            border-radius: 3px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
            -webkit-text-size-adjust: none;
          }

          .button--green {
            background-color: #22BC66;
            border-top: 10px solid #22BC66;
            border-right: 18px solid #22BC66;
            border-bottom: 10px solid #22BC66;
            border-left: 18px solid #22BC66;
          }

          .button--red {
            background-color: #FF0000;
            border-top: 10px solid #FF0000;
            border-right: 18px solid #FF0000;
            border-bottom: 10px solid #FF0000;
            border-left: 18px solid #FF0000;
          }
          /* Type ------------------------------ */

          h1 {
            margin-top: 0;
            color: #2F3133;
            font-size: 19px;
            font-weight: bold;
            text-align: left;
          }

          h2 {
            margin-top: 0;
            color: #2F3133;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
          }

          h3 {
            margin-top: 0;
            color: #2F3133;
            font-size: 14px;
            font-weight: bold;
            text-align: left;
          }

          p {
            margin-top: 0;
            color: #74787E;
            font-size: 16px;
            line-height: 1.5em;
            text-align: left;
          }

          p.sub {
            font-size: 12px;
            margin-top:20px!important;
            margin-bottom:0!important;
          }


          p.center {
            text-align: center;
          }
          </style>
        </head>
        <body>
          <span class="preheader">Use este link para redefinir sua senha. O link é válido apenas por 24 horas.</span>
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
                            <h1>Olá Lucas,</h1>
                            <p>Recentemente, você solicitou redefinir sua senha para sua conta da Família Airstage. Use o botão abaixo para redefini-lo.<br><strong>Essa redefinição de senha é válida apenas pelas próximas 24 horas.</strong></p>
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
                                              <a href="" class="button button--red" target="_blank">Redefinir sua senha</a>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                            <p>Se você não solicitou uma redefinição de senha, ignore este e-mail ou entre em contato com o suporte se tiver dúvidas..</p>
                            <p>Atenciosamente,
                              <br>Família Airstage</p>
                            <!-- Sub copy -->
                            <table class="body-sub">
                              <tr>
                                <td>
                                  <p class="sub">Se você está tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador da web.</p>
                                  <p class="sub"></p>
                                </td>
                              </tr>
                            </table>
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
    echo $msg;
  }

  function envia_recuperacao($usuario = NULL)
  {
    //Cria hash para recuperacao da senha
    $hash = md5(date("Y-m-d H:i:s"));
    $data = array(
      'recupera_hash' => $hash,
      'recupera_id_cliente' => $usuario->cliente_id,
      'recupera_status' => '1'
    );
    $this->usuario->insertHash($data);
    $layout_fixo = $this->email->layout_email();
    $msg = '<html>
          <body>
          <span class="preheader">Use este link para redefinir sua senha. O link é válido apenas por 24 horas.</span>
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
                            <h1>Olá ' . $usuario->cliente_razao_social . ',</h1>
                            <p>Recentemente, você solicitou redefinir sua senha para sua conta da Família Airstage. Use o botão abaixo para redefini-lo.<br><strong>Essa redefinição de senha é válida apenas pelas próximas 24 horas.</strong></p>
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
                                              <a href="' . base_url('cliente/auth/redefinir-senha/' . $hash) . '" class="button button--red" target="_blank">Redefinir sua senha</a>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                            <p>Se você não solicitou uma redefinição de senha, ignore este e-mail ou entre em contato com o suporte se tiver dúvidas..</p>
                            <p>Atenciosamente,
                              <br>Família Airstage</p>
                            <!-- Sub copy -->
                            <table class="body-sub">
                              <tr>
                                <td>
                                  <p class="sub">Se você está tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador da web.</p>
                                  <p class="sub">' . base_url('cliente/auth/redefinir-senha/' . $hash) . '</p>
                                </td>
                              </tr>
                            </table>
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
      'email' => $usuario->cliente_email,
      'subject' => 'Mudança de Senha',
    );
    $this->email->send($email, $layout_fixo . $msg);
    redirect('/recuperar-senha?msg=send');
  }

  public function redefinir_senha()
  {
    $hashSeg = $this->uri->segment(4);
    $h = $this->usuario->getHash($hashSeg);
    $hash = $h->first_row();
    $this->form_validation->set_rules('cliente_senha', 'Nova senha', 'alpha_numeric');
    $this->form_validation->set_rules('resenha', 'Confirma Senha', 'Required|matches[cliente_senha]');
    $ex = '';

    if ($this->form_validation->run()) {
      //redefine senha
      $data = array(
        'cliente_senha' => md5($this->input->post('cliente_senha')),
        'cliente_id' => $this->input->post('cliente_id')
      );
      $this->usuario->update($data);

      //desabilita hash do link

      $hashPost = $this->input->post('recupera_hash');
      $hashData = array(
        'recupera_hash' => $hashPost,
        'recupera_status' => '0'
      );
      $this->usuario->updateHash($hashData);
      redirect(base_url('cliente/auth/senha_alterada'));
    }

    $user = NULL;
    if (count($h->result()) > 0) {

      if ($hash->recupera_status == '1') {
        $user = $this->usuario->getById($hash->recupera_id_cliente)->first_row();
      } else {
        $ex = 'O link de redefinição de senha que acessou não é mais valido.<br> Por favor repita o processo!';
      }
    } else {
      $ex = 'O link de redefinição de senha que acessou é invalido.';
    }

    $dados = array(
      'view' => 'redefinir-senha',
      'ex' => $ex,
      'cliente' => $user,
      'hash' => $hashSeg
    );

    $this->load->view('cliente_template', $dados);
  }

  function senha_alterada()
  {
    $dados = array(
      'view' => 'senha-alterada'
    );
    $this->load->view('cliente_template', $dados);
  }
}
