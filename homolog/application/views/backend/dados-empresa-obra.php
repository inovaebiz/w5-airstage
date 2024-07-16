<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('control/empresas/') ?>">Empresas Cadastradas</a></li>
        <li class="breadcrumb-item active"> <a href="<?= base_url('control/empresas/visualizar-empresa/' . $obra->obra_cliente_id) ?>">Detalhes</a></li>
        <li class="breadcrumb-item active"> Dados da Obra</li>
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
            <a href="<?= base_url('control/empresas/obras-cadastradas/' . $obra->obra_cliente_id) ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

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

                                <tr>
                                  <td width="20%">CREDENCIADO</td>
                                  <td width="80%">
                                    <?php
                                        $credenciado = '';
                                        foreach($usuarios->result() as $user)
                                        {
                                            if($user->cliente_id == $obra->obra_cliente_id)
                                            {
                                                echo $user->cliente_credenciado  === '1' ? 'Sim' : 'Não';
                                            }
                                        }
                                    ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>INSTALADOR/VENDEDOR</td>
                                    <td><?= $obra->obra_nome_instalador_vendedor_responsavel ?> - <?= $obra->obra_cpf_instalador_vendedor_responsavel ?></td>
                                </tr>

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

                                <!--  <tr>
                                <td>DATA DA NOTA FISCAL DO DISTRIBUIDOR</td>
                                <td><?= date('d/m/Y', strtotime($obra->obra_nota_fiscal_data_distribuidor)) ?></td>
                                </tr> -->
                                <?php if ($obra->obra_anexo_nota_fiscal_venda != '') { ?>
                                <tr>
                                    <td>NOTA FISCAL VENDA</td>
                                    <td><a href="<?= base_url('uploads/' . $obra->obra_anexo_nota_fiscal_venda) ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red col-md-5">
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    Visualização nota fiscal</label></a></td>
                                </tr>
                                <?php } ?>

                                <?php if ($obra->obra_anexo_nota_fiscal_instalacao != '') { ?>
                                <tr>
                                    <td>NOTA FISCAL INSTALAÇÃO</td>
                                    <td><a href="<?= base_url('uploads/' . $obra->obra_anexo_nota_fiscal_instalacao) ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red col-md-5">
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    Visualização nota fiscal</label></a></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                        <!-- Tabela -->
                        <h2>Equipamentos Fujitsu Instalados</h2>

                        <table id="lista-padrao" class="display table-interna table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th width="25%">CATEGORIA</th>
                                    <th width="30%">CONDENSADOR</th>
                                    <th width="30%">EVAPORADORES</th>
                                    <!--  <th width="5%"></th> -->
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

                        <!-- Tabela -->
                        <table class="table tabela-pontos">

                            <tbody>

                                <tr>
                                    <td class="no-border total-acumulado" width="70%">Total de pontos acumulados nesta obra</td>
                                    <td class="no-border total" width="30%"><?= $obra->obra_pontos == 1 ? $obra->obra_pontos . " PONTO" : $obra->obra_pontos . " PONTOS" ?></td>
                                </tr>
                                <!--
                                <tr>
                                    <td class="no-border total-acumulado" width="70%">Total de reais acumulados nesta obra</td>
                                    <td class="no-border total" width="30%">R$ <?= $obra->obra_reais ? $obra->obra_reais . ',00' : '0,00' ?> </td>
                                </tr>
                                -->

                            </tbody>
                        </table>

                    </div>
                </div>
            </section>

            <!-- link-voltar -->
            <a href="<?= base_url('control/empresas/obras-cadastradas/' . $obra->obra_cliente_id) ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

        </main>
    </div>
</div>