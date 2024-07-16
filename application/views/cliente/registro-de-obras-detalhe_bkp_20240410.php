<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('cliente/obra/') ?>">Registro de obras</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
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
            <a href="<?= base_url('cliente/obra/') ?>" class="link-voltar"><i class="fa fa-angle-double-left"
                    aria-hidden="true"></i> Voltar</a>

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
                                    <td>
                                        <?php
                                        if (is_array($distribuidores)) {
                                            foreach ($distribuidores as $distribuidor) {
                                                if($this->uri->segment(4) === $distribuidor->obra_id) {
                                                    echo $distribuidor->distribuidor_nome;
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <!--<td><?= $obra->obra_distribuidor ?></td>-->
                                </tr>
                                <!-- <tr>
                                  <td>DATA DA NOTA FISCAL DO DISTRIBUIDOR</td>
                                  <td><?= date('d/m/Y', strtotime($obra->obra_nota_fiscal_data_distribuidor)) ?></td>
                                </tr> -->
                                <tr>
                                    <td>NOTA FISCAL VENDA</td>
                                    <td><a href="/uploads/<?= $obra->obra_anexo_nota_fiscal_venda ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red float-right col-md-5"><i class="fa fa-file" aria-hidden="true"></i> Visualização nota fiscal</label></a></td>
                                </tr>

                                <tr>
                                    <td>NOTA FISCAL INSTALAÇÃO</td>
                                    <td><a href="/uploads/<?= $obra->obra_anexo_nota_fiscal_instalacao ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red float-right col-md-5"><i class="fa fa-file" aria-hidden="true"></i> Visualização nota fiscal</label></a></td>
                                </tr>


                            </tbody>
                        </table>

                        <!-- Tabela -->
                        <h2>EQUIPAMENTOS fujitsu INSTALADOS</h2>

                        <table id="lista-padrao"
                            class="display table-interna table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>

                                    <th width="30%">CATEGORIA</th>
                                    <th width="35%">CONDENSADORA</th>
                                    <th width="35%">EVAPORADORA</th>
                                    <th width="30%">AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ok->result() as $itemE) : ?>
                                <tr>
                                    <td> <?= $itemE->sc_nome ?> </td>
                                    <td> <?= $itemE->tipo_nome . "<br>"; ?><?php if ($itemE->ok_serial) {
                                                              echo "N. de série: " . $itemE->ok_serial;
                                                            } ?> </td>
                                    <td><?php
                                    foreach ($oe[$itemE->ok_id]->result() as $oeItem) :
                                      echo $oeItem->equipamento_nome . "<br>";
                                      if ($oeItem->oe_produto_serial) {
                                        echo  "N. de série: " . $oeItem->oe_produto_serial . "<br><br>";
                                      }
                                    endforeach;
                                    ?></td>
                                    <td>
                                        <a
                                            href="<?= base_url('/cliente/obra/deletarequipamentokit/' . $this->uri->segment(4) . '/' . $itemE->ok_id) ?>"><i
                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>

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
                        <table class="table tabela-pontos">
                            <tbody>
                                <tr>
                                    <td class="no-border total-acumulado" width="70%">Total de pontos acumulados nesta
                                        obra</td>
                                    <td class="no-border total" width="30%"><?= $obra->obra_pontos == 1 ? $obra->obra_pontos . " PONTO" : $obra->obra_pontos . " PONTOS" ?></td>
                                </tr>
                                <tr>
                                    <td class="no-border total-acumulado" width="70%">Total de reais acumulados nesta obra</td>
                                    <td class="no-border total" width="30%">R$ <?= $obra->obra_reais ? $obra->obra_reais . ',00' : '0,00' ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- link-voltar -->
            <a href="<?= base_url('cliente/obra/') ?>" class="link-voltar"><i class="fa fa-angle-double-left"
                    aria-hidden="true"></i> Voltar</a>

        </main>

    </div>
</div>