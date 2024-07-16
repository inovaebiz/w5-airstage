<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pontuação</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">

        <!--SIDEBAR-->
        <?php include("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Pontuação</h1>
            <!-- section -->
            <section>
            <?php
            //lista as páginas
            foreach ($pages->result() as $item) :
                
                if($item->site_pag_id == 2) ://página de pontuação

                    if($item->status_pagina == 1) :
            ?>
                        <!-- Form -->
                        <form class="form-cadastro">
                            <div class="row">
                                <div class="col-md-10 col-lg-12">
                                    <!--
                                    <p><span>Parabéns!</span> Você acumulou um total de <span class=""> <?= ($pontuacao->saldo != NULL || $pontuacao->saldo != 0) ? $pontuacao->saldo : '0' ?> <?= $pontuacao->saldo == 1 ? "ponto" : "pontos" ?></span>
                                    e um total de <span>R$ <?= ($reais->reais != NULL || $reais->reais != 0) ? $reais->reais . ',00' : '0,00' ?></span>
                                    </p>
                                    -->
                                    <p><span>Parabéns!</span> Você acumulou um total de <span class=""> <?= ($pontuacao->saldo != NULL || $pontuacao->saldo != 0) ? $pontuacao->saldo : '0' ?> <?= $pontuacao->saldo == 1 ? "ponto" : "pontos" ?></span>
                                    </p>
                                </div>
                                <!-- <div class="f1-buttons col-md-3">
                                <button type="button" class="btn btn-primary btn-labeled" onclick="window.location='/cliente/resgate/'">
                                <span class="btn-label"><i class="fa fa-trophy fa-2x" aria-hidden="true"></i>Resgatar Prêmios</span></button>
                                </div> -->
                            </div>
                        </form>
                        <div class="row ">
                            <div class="col-md-12">
                                <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                        <th width="20%">DATA</th>
                                        <th width="60%">HISTÓRICO</th>
                                        <th width="20%">PONTOS ACUMULADOS</th>
                                        <!--<th width="20%">R$</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pontos->result() as $p) : ?>
                                        <tr>
                                        <td><?= date('d/m/Y H:i\h\s', strtotime($p->ps_data)) ?></td>
                                        <td><?= $p->ps_msg ?></td>
                                        <td><?= $p->ps_pontos ?></td>
                                        <!--<td><?= $p->ps_reais ? $p->ps_reais . ',00' : '0,00' ?></td>-->
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- Tabela -->
                                <table class="table ">
                                    <tbody>
                                        <tr>
                                            <td class="no-border total-acumulado" width="40%">Total de premiações acumuladas </td>
                                            <td class="no-border total" width="30%"> <?= ($pontuacao->saldo != NULL || $pontuacao->saldo != 0) ? $pontuacao->saldo : '0' ?> <?= $pontuacao->saldo == 1 ? "PONTO" : "PONTOS" ?> </td>
                                            <!--<td class="no-border total" width="30%"> R$ <?= ($reais->reais != NULL || $reais->saldo != 0) ? $reais->reais . ',00' : '0,00' ?> </td>-->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <?php
                    else :
            ?>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class='alert alert-warning text-center'>Campanha em andamento.</div>
                </div>
            </div>
            <?php
                    endif;

                endif;

            endforeach;

            ?>
            </section>
        </main>
    </div>
</div>