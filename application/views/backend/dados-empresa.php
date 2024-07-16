<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('control/empresas') ?>">Empresas Cadastradas</a></li>
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
      <a href="<?= base_url('control/empresas') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

      <form class="forms" method="POST" action="">
        <div class="row">
          <div class="col-md-8">
            <h1>Página de <?= $empresa->cliente_responsavel ?> Obras</h1>
          </div>

          <!-- navegacao -->
          <div class="col-md-1">
            <!--<a href="#" class="link-ativo"><i class="fa fa-times-circle" aria-hidden="true"></i> Excluir usuário</a>-->
          </div>

          <?php if ($empresa->cliente_status == 1 || $empresa->cliente_status == 2) { ?>
            <div class="col-md-3">
              <div class="onoffswitch3">
                <input type="checkbox" name="cliente_status" class="onoffswitch3-checkbox" id="myonoffswitch3" <?= $empresa->cliente_status == 1 ? 'checked' : '' ?>>
                <label class="onoffswitch3-label" for="myonoffswitch3">
                  <span class="onoffswitch3-inner">

                    <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
                    <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
                  </span>
                </label>
              </div>
            </div>
          <?php } ?>
        </div>



        <!-- section -->
        <section>
          <?php
          if (isset($_GET['msg'])) {
            switch ($_GET['msg']) {
              case 'success': ?>
                <br>
                <div class="alert alert-success">Dados editado com sucesso!</div>
          <?php
                break;
            }
          }
          ?>
          <form class="forms" method="POST" action="">
            <div class="row">
              <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>'); ?>

                <h2>Dados da empresa</h2>
                <!-- Tabela -->
                <table id="dados-empresa" class="table table-striped table-bordered dt-responsive nowrap">
                  <input type="hidden" name="cliente_id" value="<?= $empresa->cliente_id ?>">

                  <tbody>
                    <tr>
                      <td width="35%">RAZÃO SOCIAL</td>
                      <td><span class="lock"><input type="text" class="form-control form-control-interno" value="<?= $empresa->cliente_razao_social ?>" id="cliente_razao_social" name="cliente_razao_social"></span></td>
                    </tr>
                    <tr>
                      <td>CNPJ</td>
                      <td><span class="lock"><input type="text" class="form-control form-control-interno" value="<?= $empresa->cliente_cnpj ?>" id="cliente_cnpj" name="cliente_cnpj"></span></td>
                    </tr>
                    <tr>
                      <td>NOME COMPLETO DO PROPRIETÁRIO</td>
                      <td><span class="lock"><input type="text" class="form-control form-control-interno" value="<?= $empresa->cliente_responsavel ?>" id="cliente_responsavel" name="cliente_responsavel"></span></td>
                    </tr>
                    <tr>
                      <td>CPF DO PROPRIETÁRIO</td>
                      <td><span class="lock"><input type="text" class="form-control form-control-interno" value="<?= $empresa->cliente_cpf ?>" id="cliente_cpf" name="cliente_cpf"></span></td>
                    </tr>
                    <tr>
                      <td>DATA DE NASCIMENTO DO PROPRIETÁRIO</td>
                      <td><span class="lock"><input type="text" class="form-control form-control-interno" value="<?= $empresa->cliente_data_nascimento ?>" id="cliente_data_nascimento" name="cliente_data_nascimento"></span></td>
                    </tr>
                    <tr>
                      <td>E-MAIL</td>
                      <td><input class="form-control form-control-interno" type="text" value="<?= $empresa->cliente_email ?>" id="cliente_email" name="cliente_email"></input></td>
                    </tr>
                    <tr>
                      <td>TELEFONE</td>
                      <td><input type="text" id="cliente_telefone" name="cliente_telefone" value="<?= $empresa->cliente_telefone ?>" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>CELULAR</td>
                      <td><input type="text" id="cliente_celular" name="cliente_celular" value="<?= $empresa->cliente_celular ?>" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>CREDENCIADO</td>
                      <td>

                        <select class="form-control form-control-interno" name="cliente_credenciado" id="cliente_credenciado" value="<?= $empresa->cliente_credenciado ?>">
                          <option value="">Selecione para alterar</option>
                          <option value="1" <?= $empresa->cliente_credenciado === '1' ? 'selected' : '' ?>>Sim</option>
                          <option value="0" <?= $empresa->cliente_credenciado === '0' ? 'selected' : '' ?>>Não</option>
                        </select>
                      </td>
                    </tr>

                    <tr>
                        <td>DISTRIBUIDORES PARCEIROS</td>
                        <td>
                            <input type="text" id="distribuidores_parceiros" name="distribuidores_parceiros" value="<?php
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
                                ?>" class="form-control form-control-interno" disabled>
                        </td>
                        <!--<td><?= $empresa->distribuidores_parceiros ? $empresa->distribuidores_parceiros : "" ?></td>-->
                    </tr>

                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                <!-- Tabela -->
                <h2>Endereço da empresa</h2>
                <table id="endereco-empresa" class="table table-striped table-bordered dt-responsive nowrap">


                  <tbody>

                    <tr>
                      <td width="35%">CEP</td>

                      <td><input type="text" id="cliente_cep" name="cliente_cep" value="<?= $empresa->cliente_cep ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>


                    <tr>
                      <td>ENDEREÇO</td>
                      <td><input type="text" id="cliente_endereco" name="cliente_endereco" value="<?= $empresa->cliente_endereco ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>NÚMERO</td>
                      <td><input type="text" id="cliente_numero" name="cliente_numero" value="<?= $empresa->cliente_numero ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>COMPLEMENTO</td>
                      <td><input type="text" id="cliente_complemento" name="cliente_complemento" value="<?= $empresa->cliente_complemento ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>BAIRRO</td>
                      <td><input type="text" id="cliente_bairro" name="cliente_bairro" value="<?= $empresa->cliente_bairro ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>CIDADE</td>
                      <td><input type="text" id="cliente_cidade" name="cliente_cidade" value="<?= $empresa->cliente_cidade ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>

                    <tr>
                      <td>ESTADO</td>
                      <td><input type="text" id="cliente_estado" name="cliente_estado" value="<?= $empresa->cliente_estado ?>" maxlength="100" class="form-control form-control-interno"></td>
                    </tr>

                  </tbody>
                </table>
              </div>

              <div class="col-md-12">
                <!-- Tabela -->
                <h2>Autenticação</h2>
                <table id="endereco-empresa" class="table table-striped table-bordered dt-responsive nowrap">
                  <tbody>
                    <tr>
                      <td width="35%">NOVA SENHA</td>
                      <td><input type="password" id="cliente_senha" name="cliente_senha" class="form-control form-control-interno" placeholder="Apenas se desejar mudar" autocomplete="off"></td>
                    </tr>

                    <tr>
                      <td>CONFIRMAR SENHA</td>
                      <td><input type="password" id="resenha" name="resenha" class="form-control form-control-interno" autocomplete="off"></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <!-- BOTOES -->
            <div class="botoes-aprovacao col-md-12">
              <div class="row">
                <div class="col-md-6">
                </div>

                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-filtro"> Atualizar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
        </section>

      </form>
      <?php
      $status = array(
        'Aguardando aprovação',
        'Aprovado',
        'Recusado',
      );
      ?>


        <?php
        // Soma de Pontos
        $somaPontos = 0;
        foreach ($obras->result() as $item) {
          if($item->obra_status == 1) {

            if(date("Y/m/d", strtotime($item->obra_data)) >= '2023/04/01') {
              $somaPontos += $item->obra_pontos;
            }

          }
        }
        // Soma de Resgate
        $somaResgatePontos = 0;
        foreach ($resgates->result() as $item) {
          if($item->resgate_status == 1) {
            if(date("Y/m/d", strtotime($item->ru_data)) >= '2023/04/01') {
              $somaResgatePontos += $item->resgate_pontos;
            }
          }
        }
        ?>

      <!-- section -->
      <section>
        <div class="row">
          <div class="col-md-12">
            <!-- Tabela -->
            <h2>Obras cadastradas</h2>





            <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
              <thead class="thead-light">
                <tr>
                  <th width="35%">OBRA</th>
                  <th>DATA INSTALAÇÃO</th>
                  <th>PONTOS ACUMULADOS</th>
                  <!--<th>R$</th>-->
                  <th>STATUS</th>
                  <th>MOTIVO</th>
                  <th width="7%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                //verifica se tem página
                if (count($obras->result()) == 0) {
                ?>
                  <tr>
                    <td class="text-center" colspan="7">Nenhuma obra cadastrada.</td>
                  </tr>
                  <?php
                } else {
                  //lista as páginas
                  foreach ($obras->result() as $item) {
                    $m = '';
                    foreach ($mot->result() as $mo) {
                      if ($mo->mr_id == $item->obra_motivo) {
                        $m = $mo->mr_nome;
                      }
                    }
                  ?>
                    <tr>
                      <td><?= $item->obra_nome ?></td>
                      <td><?= date('d/m/Y', strtotime($item->obra_data_instalacao)) ?></td>
                      <td><?= $item->obra_pontos ?></td>
                      <!--<td><?= $item->obra_reais ? $item->obra_reais . ',00' : '0,00' ?></td>-->
                      <td><span class="<?= $item->obra_status == 1 ? 'ativo' : 'status' ?>"><?= $status[$item->obra_status] ?></span> </td>
                      <td><?= $m == '' ? '-' : $m ?></td>
                      <td> <a href="<?= base_url('control/empresas/visualizar-obra/' . $item->obra_id) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <!--<a href="<= base_url('control/empresas/excluir-obra/'.$item->obra_id)?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>-->
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>

                <!--<tr>
      <td>Agência de publicidade</td>
      <td>15/05/2018 - 09:15</td>
      <td>8</td>
      <td><span class="ativo">Pontos liberados</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>-->



              </tbody>
            </table>
          </div>
            <div class="col-md-12" style="display: none">
                <!-- Tabela -->
                <table class="table tabela-pontos">
                    <tbody>

                        <tr>
                            <td class="no-border total-acumulado" width="70%">Total de Pontos das Obras Cadastradas</td>
                            <td class="no-border total" width="30%">
                                <?= $somaPontos; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
      </section>



      <!-- section -->
      <section>
        <div class="row">
          <div class="col-md-12">

            <!-- Tabela -->
            <h2>Treinamentos Cadastrados</h2>



            <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
              <thead class="thead-light">
                <tr>

                  <th width="35%">TREINAMENTO</th>
                  <th>DATA</th>
                  <th>PONTOS ACUMULADOS</th>
                  <th>STATUS</th>
                  <th width="7%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                //verifica se tem página
                if (count($treinamentos->result()) == 0) {
                ?>
                  <tr>
                    <td class="text-center" colspan="7">Nenhum treinamento cadastrado.</td>
                  </tr>
                  <?php
                } else {
                  //lista as páginas
                  foreach ($treinamentos->result() as $item) {
                  ?>
                    <tr>
                      <td><?= $item->treinamento_nome ?></td>
                      <td><?= date('d/m/Y', strtotime($item->treinamento_data)) ?></td>
                      <td><?= $item->treinamento_pontos ?></td>
                      <td><span class="<?= $item->treinamento_status == 1 ? 'ativo' : 'status' ?>"><?= $status[$item->treinamento_status] ?></span> </td>
                      <td><a href="<?= base_url('control/empresas/visualizar-treinamento/' . $item->treinamento_id) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <!--<a href="<= base_url('control/empresas/excluir-treinamento/'.$item->treinamento_id)?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>-->
                      </td>
                    </tr>

                <?php
                  }
                }
                ?>
                <!--<tr>
      <td>Instalações Gelair</td>
      <td>15/05/2018 - 09:15</td>
      <td>4</td>
      <td><span class="ativo">Pontos liberados</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa-treinamento.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>-->


              </tbody>
            </table>
          </div>
        </div>
      </section>



      <!-- section -->
      <section>
        <div class="row">
          <div class="col-md-12">
            <!-- Tabela -->
            <h2>PRÊMIO RESGATADO</h2>
            <form class="forms" method="POST" action="" onsubmit="return confirmReset()">
              <!-- BOTOES -->
              <input type="hidden" name="delete_pontos_id" id="delete_pontos_id">
              <div class="botoes-aprovacao col-md-12">
                <div class="row">
                  <div class="col-md-6">
                  </div>

                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-filtro"> Zerar pontuações <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
            </form>

            <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
              <thead class="thead-light">
                <tr>

                  <th>DATA</th>
                  <th>PONTOS RESGATADOS</th>
                  <th>PRÊMIO</th>

                </tr>
              </thead>
              <tbody>

                <?php
                //verifica se tem página
                if (count($resgates->result()) == 0) {
                ?>
                  <tr>
                    <td class="text-center" colspan="3">Nenhum resgate realizado.</td>
                  </tr>
                  <?php
                } else {
                  //lista as páginas
                  foreach ($resgates->result() as $item) {
                  ?>
                    <tr>

                      <td class="text-center"><?= date('d/m/Y', strtotime($item->ru_data)) ?></td>
                      <td class="text-center"><?= isset($item->resgate_pontos) ? $item->resgate_pontos : "Informação não disponível"?></td>
                      <td><span class="ativo">
                          <?php
                          if (is_numeric($item->resgate_valor_premio)) {
                            $descobre = 'int';
                          } else {
                            $descobre = 'sring';
                          }
                          if ($descobre == "sring") {
                            echo isset($item->resgate_valor_premio) ? $item->resgate_valor_premio : "Informação não disponível";
                          } else {
                            echo "R$ " . number_format($item->resgate_valor_premio, 2, ',', '.');
                          }
                          ?>

                          <!--R$ <= number_format($item->resgate_valor_premio, 2, ',', '.')>-->
                        </span>
                      </td>

                    </tr>
                <?php
                  }
                }
                ?>

              </tbody>
            </table>
          </div>

          <div class="col-md-12" style="display: none">
            
            <!-- Tabela -->
            <table class="table tabela-pontos">
                <tbody>

                    <tr>
                        <td class="no-border total-acumulado" width="70%">Total de Pontos de Prêmio resgatado</td>
                        <td class="no-border total" width="30%">
                            <?= $somaResgatePontos; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
          </div>

          <div class="col-md-12" style="display: none">
            
            <!-- Tabela -->
            <table class="table tabela-pontos">
                <tbody>

                    <tr>
                        <td class="no-border total-acumulado" width="70%">Total de pontos não resgatados</td>
                        <td class="no-border total" width="30%">
                            <?= $somaPontos - $somaResgatePontos; ?>
                        </td>
                    </tr>

                    <!--
                    <tr>
                        <td class="no-border total-acumulado" width="70%">Total de reais acumulados</td>
                        <td class="no-border total" width="30%">R$ </td>
                    </tr>
                    -->

                </tbody>
            </table>
          </div>

          <?php
          //verifica se tem página
          if ($resgatesall !== NULL) {
            if (count($resgatesall->result()) == 0) {
          ?><!--
              <tr>
                <td class="text-center" colspan="6">Nenhum treinamento para mostrar.</td>
              </tr>
            -->
              <?php
            } else {
              //lista as páginas
              foreach ($resgatesall->result() as $item) {

                if ($camp !== NULL && $camp->campanha_id = $item->campanha_id) {
              ?>

                  <!-- box-estrela -->
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="box-estrela">
                      <div class="estrela estrela-<?= $item->resgate_nro_estrelas ?>">
                        <p>Prêmio</p> <?php if ($item->tipo_premio == 1) { ?>
                          <span><?= $item->resgate_valor_premio ?> reais</span>
                        <?php } else { ?>
                          <span style="font-size: 18px;margin-top:6px;"><?= $item->resgate_valor_premio ?></span>
                        <?php } ?>
                      </div>
                      <div class="base-estrela">
                        <span><?= $item->resgate_pontos ?> pontos</span>
                        <span class="divider"></span>
                        <form method="post" enctype="multipart/form-data">
                          <input type="hidden" name="resgate_id_control" value="<?= $item->resgate_id ?>">
                          <input type="hidden" name="resgate_pontos_control" value="<?= $item->resgate_pontos ?>">
                          <button type="submit" class="btn btn-primary btn-green"> Resgatar!</button>
                        </form>
                      </div>


                    </div>
                  </div>
          <?php
                }
              }
            }
          }
          ?>
        </div>
      </section>

      <!-- link-voltar -->
      <a href="<?= base_url('control/empresas/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

    </main>
  </div>
</div>
<script>
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