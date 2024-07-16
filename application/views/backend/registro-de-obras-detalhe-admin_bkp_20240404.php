<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control/') ?>">Administrador</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('control/pontos/obras') ?>">Liberação de pontos de obra</a></li>
        <li class="breadcrumb-item active" aria-current="page">detalhe da obra</li>
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
      <a href="<?= base_url('control/pontos/obras') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

      <h1><?= $obra->obra_nome ?></h1>


      <!-- section -->
      <section>
        <div class="row">
          <div class="col-md-12">

            <h2>Dados da obra</h2>


            <!-- Tabela -->
            <table id="dados-obra" class="table table-striped table-bordered dt-responsive nowrap">
              <tbody>

                <tr>
                  <td width="20%">NOME DA OBRA</td>
                  <td width="80%"><?= $obra->obra_nome ?></td>
                </tr>

                <tr>
                  <td width="20%">NOME DO CLIENTE</td>
                  <td width="80%"><?= $obra->obra_cliente ?></td>
                </tr>

                <?php if (($obra->obra_nome_instalador_vendedor_responsavel != '') && ($obra->obra_cpf_instalador_vendedor_responsavel != '')) { ?>
                <tr>
                  <td>INSTALADOR/VENDEDOR</td>
                  <td><?= $obra->obra_nome_instalador_vendedor_responsavel ?> - <?= $obra->obra_cpf_instalador_vendedor_responsavel ?></td>
                </tr>
                <?php } ?>

                <tr>
                  <td>DATA DA INSTALAÇÃO</td>
                  <td><?= date('d/m/Y', strtotime($obra->obra_data_instalacao)) ?></td>
                </tr>

                <?php if ($obra->obra_nota_fiscal_distribuidor != '') { ?>
                <tr>
                    <td>NOTA FISCAL</td>
                    <td><?= $obra->obra_nota_fiscal_distribuidor ?></td>
                </tr>
                <?php } ?>
                
                <tr>
                  <td>DISTRIBUIDOR</td>
                  <td><?= $obra->obra_distribuidor ?></td>
                </tr>

                <!-- <tr>
                  <td>DATA DA NOTA FISCAL DO DISTRIBUIDOR</td>
                  <td><?= date('d/m/Y', strtotime($obra->obra_nota_fiscal_data_distribuidor)) ?></td>
                </tr> -->
                <?php if ($obra->obra_anexo_nota_fiscal_venda != '') { ?>
                  <tr>
                    <td>NOTA FISCAL VENDA</td>
                    <td><a href="<?= base_url('uploads/' . $obra->obra_anexo_nota_fiscal_venda) ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red float-right col-md-5"><i class="fa fa-file" aria-hidden="true"></i> Visualização nota fiscal</label></a></td>
                  </tr>
                <?php } ?>

                <tr>
                  <td>NOTA FISCAL INSTALAÇÃO</td>
                  <td><a href="<?= base_url('uploads/' . $obra->obra_anexo_nota_fiscal_instalacao) ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red float-right col-md-5"><i class="fa fa-file" aria-hidden="true"></i> Visualização nota fiscal</label></a></td>
                </tr>


              </tbody>
            </table>
            <div class="clean"></div>

            <!-- Tabela -->
            <h2>Equipamentos Fujitsu Instalados</h2>

            <table id="lista-padrao" class="display table-interna table table-striped table-bordered dt-responsive nowrap">
              <thead class="thead-light">
                <tr>

                  <th width="30%">CATEGORIA</th>
                  <th width="35%">CONDENSADORA</th>
                  <th width="35%">EVAPORADORA</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($ok->result() as $itemE) : ?>
                  <tr>
                    <td> <?= $itemE->sc_nome ?> </td>
                    <td> <?= $itemE->tipo_nome . "<br>N. de série: " . $itemE->ok_serial ?> </td>
                    <td><?php
                        foreach ($oe[$itemE->ok_id]->result() as $oeItem) :
                          echo $oeItem->equipamento_nome . "<br> N. de série: " . $oeItem->oe_produto_serial . "<br><br>";
                        endforeach;
                        ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!--table class="table tabela-pontos">
              <tbody>
                <tr>
                  <td class="no-border" width="20%"></td>
                  <td class="no-border total-acumulado" width="50%">Total de pontos acumulados nesta etapa</td>
                  <td class="no-border total" width="30%"> <?= $total ?> PONTOS </td>
                </tr>
              </tbody>
            </table-->


            <!-- Tabela -->
            <!-- <h2>EQUIPAMENTOS INSTALADOS DE OUTRAS MARCAS</h2>
            <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
              <thead class="thead-light">
                <tr>
                  <th width="20%">MARCA</th>
                  <th width="55%">TIPO DE PRODUTO</th>
                  <th width="10%">QUANTIDADE</th>

                </tr>
              </thead>
              <tbody>
                <?php
                //$p = 0;
                foreach ($oee->result() as $tempOee) :
                  //$p += $tempOee->oee_qtd * $site->pontos;
                ?>
                  <tr>
                    <td><?= $tempOee->marca_nome ?></td>
                    <td><?= $tempOee->mcategoria_nome ?></td>
                    <td><?= $tempOee->oee_qtd ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table> -->
            <!-- Tabela -->
            <table class="table tabela-pontos">
              <tbody>
                <tr>
                  <td class="no-border total-acumulado" width="70%">Total de pontos acumulados nesta obra</td>
                  <td class="no-border total" width="30%"> <?= $obra->obra_pontos ?> PONTOS </td>
                </tr>
                <tr>
                  <td class="no-border total-acumulado" width="70%">Total de reais acumulados nesta obra</td>
                  <td class="no-border total" width="30%">R$ <?= $obra->obra_reais ? $obra->obra_reais : 0 ?> </td>
                </tr>
              </tbody>
            </table>
            <div class="buttons text-center">
              <div class="row">
                <div class="aprov col-md-4">
                  <input type="radio" name="btn" class="btn_apro_1" checked value="1" onclick="muda(1)"> <span style="font-size: 22px;margin-left:5px;position:relative;top:5px;text-transform: uppercase;">Aprovar</span>
                </div>
                <div class="aprov col-md-4">
                  <input type="radio" name="btn" class="btn_apro_1" value="1" onclick="obraRessalva()"> <span style="font-size: 22px;margin-left:5px;position:relative;top:5px;text-transform: uppercase;">Aprovar c/ ressalva</span>
                </div>
                <div class="recus col-md-4">
                  <input type="radio" name="btn" class="btn_apro_0" value="0" onclick="muda(0)"><span style="font-size: 22px;margin-left:5px;position:relative;top:5px;text-transform: uppercase;">Recusar</span>
                </div>
              </div>
            </div>
            <div style="clear:both;"></div>
            <!-- BOTOES -->
            <div class="botoes-aprovacao">
              <form method="POST" enctype="multipart/form-data" onsubmit="return valida();">
                <input type="hidden" name="obra_id" value="<?= $obra->obra_id ?>">
                <div class="row">
                  <div class="col-md" id="recus" style="display: none;">
                    <select name="obra_motivo" id="obra_motivo" class="reprovacao" onchange="outromotivo()">
                      <option value="">Selecione o motivo da reprovação</option>
                      <option value="999">Outros</option>
                      <?php foreach ($status->result() as $ss) : ?>
                        <option value="<?= $ss->mr_id ?>"><?= $ss->mr_nome ?></option>
                      <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary btn-red" name="obra_status" value="2">Recusar</button>
                  </div>

                  <div class="col-md" id="aprov">
                    <button type="submit" class="btn btn-primary btn-green pull-right" name="obra_status" value="1"> Liberar pontos <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>

                  </div>
                </div>
                <input type="hidden" name="obra_obs" id="obra_obs" class="form-control">

                <div class="container" id="outroMotivo" style="display: none;">
                  <span>Outros motivos:</span>
                  <textarea id="obra_obs_motivo" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="container" id="obraRessalva" style="display: none;">
                  <span>Obra ressalva:</span>
                  <textarea id="obra_obs_ressalva" class="form-control" cols="30" rows="10"></textarea>

                </div>
              </form>
            </div>



          </div>
        </div>
      </section>
      <!-- link-voltar -->
      <a href="<?= base_url('control/pontos/obras/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

    </main>

  </div>
</div>
<script>
  let tipo = 1;

  function valida() {
    let motivo = $("#obra_motivo").val();
    $("#obra_obs_r").prop('required', false);
    $("#obra_obs_ressalva").prop('required', false);
    $("#obra_obs_motivo").prop('required', false);


    if ($("#obra_obs_motivo").val() !== "") {
      $("#obra_obs").val($("#obra_obs_motivo").val());
    }

    if ($("#obra_obs_ressalva").val() !== "") {
      $("#obra_obs").val($("#obra_obs_ressalva").val());
    }

    if (motivo === "" && $("#obra_obs_ressalva").val() === "" && $("#obra_obs_motivo").val() === "" && tipo != 1) {
      alert("Selecione o motivo.");
      return false;
    } else {
      return true;
    }
  }

  function muda(e) {

    $('#obraRessalva').hide();
    $('#outroMotivo').hide();
    tipo = e;

    $("#obra_obs_ressalva").prop('required', false);

    if (e == 1) {
      $("#aprov").show();
      $("#recus").hide();

    } else {
      $("#aprov").hide();
      $("#recus").show();
    }
  }

  function outromotivo() {
    tipo = 2;

    let motivo = document.getElementById("obra_motivo").value;
    console.log(motivo);
    $("#outroMotivo").hide();
    $("#obra_obs_motivo").prop('required', false);

    if (motivo === "999") {
      $("#outroMotivo").show();
      $("#obra_obs_motivo").prop('required', true);
    }

  }

  function obraRessalva() {
    tipo = 3;
    $("#outroMotivo").hide();
    $("#recus").hide();
    $("#aprov").show();
    $('#obraRessalva').show();
    $("#obra_obs_ressalva").prop('required', true);

  }
</script>
<style>
  select.reprovacao {
    width: 77%;
  }
</style>