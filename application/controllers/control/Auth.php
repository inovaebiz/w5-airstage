<?php

if ( ! defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("usuario_model", "usuario");
    $this->load->model("Email_model", "email");
    $this->load->library('form_validation');

    $this->load->helper(array('form', 'url', 'noweb'));
  }

  public function index()
  {
    $user = $this->session->userdata('control');

    if ( ! $user) {
      redirect(base_url('control/auth/login')); // VERICA SE O USUARIO ESTA LOGADO
    }

    $this->form_validation->set_rules('nome', 'Nome', 'required');
    $this->form_validation->set_rules('login', 'Login', 'required|is_unique[usuarios.login]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]');
    $this->form_validation->set_rules('senha', 'Senha', 'required');
    $this->form_validation->set_rules('resenha', 'Confirme a senha', 'required|matches[senha]');

    if ($this->form_validation->run()) {
      $dados = $this->input->post();
      unset($dados['resenha']);
      $dados['senha'] = md5($dados['senha']);
      $this->usuario->insertUser($dados);
      redirect(base_url('control/auth?msg=success'));
    }

    $usuarios = $this->usuario->getAllUser();
    $dados    = array(
      'view'     => 'cadastro-de-acesso',
      'usuarios' => $usuarios,
    );
    $this->load->view("template", $dados);
  }

  public function login()
  {
    $logado = $this->session->userdata("control");

    if ($logado) {
      redirect(base_url('control'));
    }

    $this->form_validation->set_rules('login', 'Login', 'required');
    $this->form_validation->set_rules('senha', 'Senha', 'required');

    $ex = '';

    if ($this->form_validation->run()) {
      $usuario = $this->input->post("login");
      $senha   = md5($this->input->post("senha"));
      $user    = $this->usuario->getByLogin($usuario);

      if (count($user->result()) > 0) {
        $u = $user->first_row();

        if ($u->senha == $senha) {
          $this->session->set_userdata("control", $u);
          redirect(base_url('control'));
        } else {
          $ex = 'Verifique os dados informados.';
        }

      } else {
        $ex = 'Verifique os dados informados.';
      }

    }

    $dados = array(
      'view' => 'login',
      'ex'   => $ex,
    );
    $this->load->view("template", $dados);

  }

  public function editar_usuario()
  {
    $editar_id = $this->session->userdata("control")->id;
    $this->form_validation->set_rules('nome', 'Nome', 'required');
    $this->form_validation->set_rules('email', 'E-mail', 'required');

    if (isset($_POST['senha'])) {

      if ($_POST['senha'] != '') {
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('resenha', 'Confirme a senha', 'required|matches[senha]');
      }

    }

    if ($this->form_validation->run()) {
      $dados = $this->input->post();
      unset($dados['resenha']);

      if ($dados['senha'] != '') {
        $dados['senha'] = md5($dados['senha']);
      } else {
        unset($dados['senha']);
      }

      $this->usuario->updateUser2($dados);
      redirect(base_url('control/auth?msg=edit'));
    }

    $u       = null;
    $id      = $this->uri->segment(4);
    $user    = $this->usuario->getByIdUser($id);
    $usuario = $user->first_row();
    //var_dump($cliente);
    $dados = array(
      'view'    => 'edicao-de-cadastro',
      'usuario' => $usuario,
    );
    $this->load->view("template", $dados);
  }

  public function logout()
  {
    $this->session->unset_userdata("control");
    $this->session->unset_userdata("logado");
    redirect(base_url('control/auth/login/'));
  }

  public function excluir_usuario()
  {
    $id = $this->uri->segment(4);

    if ($id != '') {
      $this->usuario->deleteUser($id);
      redirect('control/auth?msg=delete');
    }

  }

  public function recuperar_senha()
  {
    $ex = '';
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run()) {
      $u = $this->usuario->getByUsuRecu($this->input->post('email'));

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
      'ex'   => $ex,
    );
    $this->load->view('template', $dados);

  }

  public function envia_recuperacao($usuario = null)
  {
    //Cria hash para recuperacao da senha
    $hash = md5(date("Y-m-d H:i:s"));
    $data = array(
      'recupera_hash'       => $hash,
      'recupera_id_usuario' => $usuario->id,
      'recupera_status'     => '1',
    );
    $this->usuario->insertHash($data);
    $layout_fixo = $this->email->layout_email();
    $msg         = '
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
                      <h1>Olá ' . $usuario->nome . ',</h1>
                      <p>Recentemente, você solicitou a redefinição de sua senha para a conta Família Airstage. Use o botão abaixo para redefini-la.<br><strong>Essa redefinição de senha é válida apenas pelas próximas 24 horas.</strong></p>
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
                                        <a href="' . base_url('control/auth/redefinir-senha/' . $hash) . '" class="button button--red" target="_blank">Redefinir sua senha</a>
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
      'nome'    => $usuario->nome,
      'email'   => $usuario->email,
      'subject' => 'Mudança de Senha',
    );
    $this->email->send($email, $layout_fixo . $msg);
    redirect('/control/auth/recuperar-senha?msg=send');
  }

  public function redefinir_senha()
  {
    $hashSeg = $this->uri->segment(4);
    $h       = $this->usuario->getHash($hashSeg);
    $hash    = $h->first_row();
    $this->form_validation->set_rules('senha', 'Nova senha', 'alpha_numeric');
    $this->form_validation->set_rules('resenha', 'Confirma Senha', 'Required|matches[senha]');
    $ex = '';

    if ($this->form_validation->run()) {
      //redefine senha
      $data = array(
        'senha' => md5($this->input->post('senha')),
        'id'    => $this->input->post('id'),
      );
      $this->usuario->updateUser($data);

      //desabilita hash do link

      $hashPost = $this->input->post('recupera_hash');
      $hashData = array(
        'recupera_hash'   => $hashPost,
        'recupera_status' => '0',
      );
      $this->usuario->updateHash($hashData);
      redirect(base_url('control/auth/login?msg=edit'));
    }

    $user = null;

    if (count($h->result()) > 0) {

      if ($hash->recupera_status == '1') {
        $user = $this->usuario->getByIdUser($hash->recupera_id_usuario)->first_row();
      } else {
        $ex = 'O link de redefinição de senha que acessou não é mais valido.<br> Por favor repita o processo!';
      }

    } else {
      $ex = 'O link de redefinição de senha que acessou é invalido.';

    }

    $dados = array(
      'view'    => 'redefinir-senha',
      'ex'      => $ex,
      'cliente' => $user,
      'hash'    => $hashSeg,
    );

    $this->load->view('template', $dados);

  }

  public function senha_alterada()
  {
    $dados = array(
      'view' => 'senha-alterada',
    );
    $this->load->view('template', $dados);
  }

}
