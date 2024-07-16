<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('control/empresas/aprovacao') ?>">Aprovação de empresa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
  <div class="row">

    <!--SIDEBAR-->
    <?php include("includes/sidebar.php") ?>

    <!-- MAIN -->
    <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

      <!-- link-voltar -->
      <a href="<?= base_url('control/empresas/aprovacao/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

      <h1>Aprovação de não credenciado</h1>



      <!-- section -->
      <section>
        <div class="row">
          <div class="col-md-12">

            <?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>'); ?>

            <h2>Dados da empresa</h2>
            <!-- Tabela -->
            <table id="dados-empresa" class="table table-striped table-bordered dt-responsive nowrap">

              <tbody>
                <tr>
                  <td width="30%">RAZÃO SOCIAL</td>
                  <td><?= $empresa->cliente_razao_social ?></td>
                </tr>
                <tr>
                  <td width="30%">CNPJ</td>
                  <td><?= $empresa->cliente_cnpj ?></td>
                </tr>
                <tr>
                  <td>NOME COMPLETO DO PROPRIETÁRIO</td>
                  <td><?= $empresa->cliente_responsavel ?></td>
                </tr>
                <tr>
                  <td>CPF DO PROPRIETÁRIO</td>
                  <td><?= $empresa->cliente_cpf ?></td>
                </tr>
                <tr>
                  <td>DATA DE NASCIMENTO DO PROPRIETÁRIO</td>
                  <td><?= $empresa->cliente_data_nascimento ?></td>
                </tr>

                <tr>
                  <td>E-MAIL</td>
                  <td><?= $empresa->cliente_email ?></td>
                </tr>

                <tr>
                  <td>TELEFONE</td>
                  <td><?= $empresa->cliente_telefone ?></td>
                </tr>

                <tr>
                  <td>CELULAR</td>
                  <td><?= $empresa->cliente_celular ?></td>
                </tr>

                <tr>
                  <td>CREDENCIADO</td>
                  <td>
                    <select class="form-control form-control-interno" onchange="setNaoCredenciado(this)" name="cliente_credenciado">
                      <option value="">Selecione para alterar</option>
                      <option value="1">Sim</option>
                      <option value="0" selected>Não</option>
                    </select>
                  </td>
                </tr>

                <tr>
                    <td>DISTRIBUIDORES PARCEIROS</td>
                    <td>
                        <?php
                            if (is_array($distribuidores) || $distribuidores instanceof Countable) {
                                $count = count($distribuidores);
                                $distribuidores_str = '';
                                foreach ($distribuidores as $indice => $item) {
                                    $distribuidores_str .= $item;
                                    if ($indice < $count - 1) {
                                        $distribuidores_str .= ", ";
                                    }
                                }
                                echo trim($distribuidores_str);
                            }
                        ?>
                    </td>
                    <!--<td><?= $empresa->distribuidores_parceiros ? $empresa->distribuidores_parceiros : "" ?></td>-->
                </tr>


              </tbody>
            </table>


            <!-- Tabela -->
            <h2>Endereço da empresa</h2>
            <table id="endereco-empresa" class="table table-striped table-bordered dt-responsive nowrap">

              <tbody>

                <tr>
                  <td width="30%">CEP</td>
                  <td><?= $empresa->cliente_cep ?></td>
                </tr>


                <tr>
                  <td>ENDEREÇO</td>
                  <td><?= $empresa->cliente_endereco ?></td>
                </tr>

                <tr>
                  <td>NÚMERO</td>
                  <td><?= $empresa->cliente_numero ?></td>
                </tr>

                <tr>
                  <td>COMPLEMENTO</td>
                  <td><?= $empresa->cliente_complemento ?></td>
                </tr>

                <tr>
                  <td>BAIRRO</td>
                  <td><?= $empresa->cliente_bairro ?></td>
                </tr>

                <tr>
                  <td>CIDADE</td>
                  <td><?= $empresa->cliente_cidade ?></td>
                </tr>

                <tr>
                  <td>ESTADO</td>
                  <td><?= $empresa->cliente_estado ?></td>
                </tr>

              </tbody>
            </table>

            <!-- Tabela ->
<h2>Autenticação</h2>
<table id="autenticao" class="table table-striped table-bordered dt-responsive nowrap">

  <tbody>
    
    <tr>
      <td width="30%">NOME DO RESPONSÁVEL</td>
      <td><?= $empresa->cliente_responsavel ?></td>
    </tr>

    
    <tr>
      <td>DATA DE NASCIMENTO</td>
      <td><?= date('d/m/Y', strtotime($empresa->cliente_endereco)) ?></td>
    </tr>

    <tr>
      <td>CPF</td>
      <td><?= $empresa->cliente_cpf ?></td>
    </tr>

    <tr>
      <td>RG</td>
      <td><?= $empresa->cliente_rg ?></td>
    </tr>


  </tbody>
</table>

            <!-- BOTOES -->
            <div class="botoes-aprovacao">
              <div class="form-row">
                <div class="form-group col-12 col-sm-12 col-md-10 col-lg-9 col-xl-9">
                  <form class="form-reprovar" action="" method="post">
                    <input type="hidden" name="cliente_status" value="3">
                    <div class="form-row">
                      <div class="form-group col-12 col-sm-12 col-md-8 col-lg-7 col-xl-10">
                        <select id="stateSelect" class="chosen-select-reason reprovacao" name="cliente_motivo">
                          <option value="">Selecione o motivo da reprovação</option>
                          <?php
                            foreach ($status->result() as $ss) :
                              if($ss->mr_categoria_id == '1') :
                          ?>
                            <option value="<?= $ss->mr_id ?>"><?= $ss->mr_nome ?></option>
                          <?php
                              endif;
                            endforeach;
                          ?>
                        </select>
                        <div id="error-message" class="alert alert-danger error-message text-center mt-3">Por favor, selecione um motivo.</div>
                      </div>
                      <div class="form-group col-12 col-sm-12 col-md-4 col-lg-5 col-xl-2">
                        <button type="submit" name="recu" value="2" class="btn btn-primary btn-red">Reprovar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-2 col-lg-3 col-xl-3">
                  <form class="form-aprovar" action="" method="post">
                    <input type="hidden" name="cliente_status" value="1">
                    <input type="hidden" name="cliente_credenciado" id="not_cliente_credenciado" value="0">
                    <button type="submit" name="apro" value="3" class="btn btn-primary btn-green"> Aprovar Usuário <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- link-voltar -->
      <a href="<?= base_url('control/empresas/aprovacao/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

    </main>
  </div>
</div>


<script>
  function setNaoCredenciado(e) {
    $("#not_cliente_credenciado").val(e.value);
  }
</script>