<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Empresas Cadastradas</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
  <div class="row">

    <!--SIDEBAR-->
    <?php include("includes/sidebar.php") ?>

    <!-- MAIN -->
    <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
      <h1>Empresas Cadastradas</h1>
      <div class="">
        <div class="row">
          <div class="col">
            <!-- BOTOES -->
            <div class="botoes-aprovacao col-md-12">
              <div class="row">
                <div class="col-md">
                  <button type="button" class="btn btn-primary btn-filtro" data-toggle="modal" data-target="#ModalLongoExemplo"> Notificar Clientes <i class="fa fa-envelope" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <form class="forms" method="POST" action="" onsubmit="return confirmReset()">
              <!-- BOTOES -->
              <input type="hidden" name="delete_pontos" id="delete_pontos">
              <div class="botoes-aprovacao col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-filtro"> Zerar pontuações <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!-- section -->
      <section>
        <div class="row">

          <div class="col-md-12">

            <!-- Tabela -->
            <div class="container">
              <div class="text-right">
                <button type="submit" class="btn btn-success" onclick="getClientes()">
                  <strong>Gerar Excel</strong>
                </button>

              </div>
            </div>
            <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
              <thead class="thead-light">
                <tr>

                  <th width="25%">RAZÃO SOCIAL DA EMPRESA</th>
                  <th width="25%">CNPJ</th>
                  <th width="25%">CREDENCIADO</th>
                  <th width="25%">NASCIMENTO</th>
                  <th>OBRAS CADASTRADAS</th>
                  <th>SALDO ATUAL</th>
                  <th>STATUS</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                //verifica se tem página
                if (count($empresa->result()) == 0) {
                ?>
                  <tr>
                    <td class="text-center" colspan="6">Nenhuma empresa cadastrada.</td>
                  </tr>
                  <?php
                } else {
                  //lista as páginas
                  foreach ($empresa->result() as $item) {
                  ?>
                    <tr>
                      <td><?= $item->cliente_razao_social ?></td>
                      <td><?= $item->cliente_cnpj ?></td>
                      <td><?= $item->cliente_credenciado == 1 ? "Sim" : "Não" ?></td>
                      <td><?= $item->cliente_data_nascimento ?></td>
                      <td><?= $item->obras ?></td>
                      <td><?= $item->saldo ?></td>
                      <td>
                        <span class="<?= $item->cliente_status == 1 ? 'ativo' : 'inativo' ?>">
                          <?php
                          switch ($item->cliente_status) {
                            case 0:
                              echo "Aguardando aprovação";
                              break;
                            case 1:
                              echo "Ativo";
                              break;
                            case 2:
                              echo "Inativo";
                              break;
                            case 3:
                              echo "Reprovada";
                              break;
                          }
                          ?>
                        </span>
                      </td>
                      <td><a href="<?= base_url('control/empresas/visualizar-empresa/' . $item->cliente_id) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </tr>
                <?php
                  }
                }
                ?>

              </tbody>
            </table>

          </div>

        </div>
      </section>

    </main>
  </div>
</div>

<div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalLongoExemplo">Enviar Mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form method="POST" action="">
              <div class="form-group">
                <span>Status</span>
                <select class="form-control" name="destinatario-clientes-status" id="destinatario-clientes-status" onchange="blockCredenciados()">
                  <option value="">Todos</option>
                  <option value="1">Ativo</option>
                  <option value="0">Inativos</option>
                  <option value="2">Pendentes</option>
                  <option value="3">Reprovados</option>
                  <!-- <option value="3">Interno Airstage</option>
                   <option value="5">Credenciados</option>
                  <option value="6">Não Credenciados</option>
                  <option value="7">Clientes com Saldo</option>
                  <option value="0">Selecionar e-mail</option> -->
                </select>
                <br>
                <span>Credenciado</span>
                <select class="form-control" name="destinatario-clientes-credenciado" id="destinatario-clientes-credenciado">
                  <option value="">Todos</option>
                  <option value="1">Sim</option>
                  <option value="0">Não</option>
                  <!-- <option value="3">Interno Airstage</option>
                   <option value="5">Credenciados</option>
                  <option value="6">Não Credenciados</option>
                  <option value="7">Clientes com Saldo</option>
                  <option value="0">Selecionar e-mail</option> -->
                </select>
              </div>
              <br>

              <div class="form-group">
                <span>Assunto</span>
                <input class="form-control" type="text" name="assunto-clientes-geral" id="assunto-clientes-geral" required>
              </div>
              <div class="form-group">
                <span>Mensagem</span>
                <textarea class="form-control" name="mensagem-clientes-geral" id="mensagem-clientes-geral" rows="2" cols="50" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div style="display: none;">
  <table id="lista-clientes" class="table">
    <thead class="thead-light">
      <tr>

        <th>RAZÃO SOCIAL DA EMPRESA</th>
        <th>RESPONSÁVEL</th>
        <th>CNPJ</th>
        <th>CPF</th>
        <th>NASCIMENTO</th>
        <th>SALDO ATUAL</th>
      </tr>
    </thead>
    <tbody id="tbodyTableCliente">

    </tbody>
  </table>
</div>

<script>
  function getClientes() {
    $.ajax({
      url: "<?= base_url('/control/empresas/gerarexcel') ?>",
      type: 'GET',
      dataType: "json",
      success: function(dados) {

        let divTable = document.getElementById("lista-clientes");
        let tbodyTable = document.getElementById("tbodyTableCliente")

        let htmlClientes = dados.map(cliente =>
          `<tr>
            <td>${cliente.cliente_razao_social.toUpperCase()} </td>
            <td>${cliente.cliente_responsavel.toUpperCase()} </td>
            <td>${cliente.cliente_cnpj}</td>
            <td>${cliente.cliente_cpf}</td>
            <td>${cliente.cliente_data_nascimento}</td>
            <td>${cliente.saldo}</td>
          </tr>`
        )

        $('#tbodyTableCliente').append(htmlClientes);

        let dataTable = new Blob(['\ufeff' + divTable.outerHTML], {
          type: 'application/vnd.ms-excel'
        });


        // Download

        let url = window.URL.createObjectURL(dataTable);
        let a = document.createElement('a');
        a.href = url;
        a.download = `Lista Clientes ${new Date()}`
        a.click();

      },
      error: function(dados) {
        console.log(dados);


      }
    });
  }

  function blockCredenciados() {
    let status = document.querySelector('#destinatario-clientes-status').value;
    if (status === "3") {
      $("#destinatario-clientes-credenciado").val("").attr("disabled", "disabled");
    } else {
      $("#destinatario-clientes-credenciado").removeAttr("disabled");

    }
  }
  function confirmReset() {
      // Exibe uma mensagem de confirmação
      var confirmacao = confirm("Tem certeza que deseja zerar as pontuações?");

      // Se o usuário confirmar, envie o formulário
      if (confirmacao) {
          return true;
      } else {
      // Se o usuário cancelar, não envie o formulário
          return false;
      }
  }
</script>