<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control/politica') ?>">Área do cliente</a></li>
        <li class="breadcrumb-item active" aria-current="page">Resgate de prêmios</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">

        <!--SIDEBAR-->
        <?php include("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Resgate de prêmios</h1>
            <!-- section -->
            <section>
            <?php
            //lista as páginas
            foreach ($pages->result() as $item) :
                
                if($item->site_pag_id == 3) ://página de resgate de prêmios

                    if($item->status_pagina == 1) :
            ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="total-pontos">
                            <div class="box-estrela2">
                                <p> Total de pontos acumulados: </p>
                                <span class="number"><?= ($pontos->saldo != NULL || $pontos->saldo != 0) ? $pontos->saldo : '0' ?></span> <span class="pts">pts</span>
                            </div>
                            <span class="atencao">Atenção!</span>
                            <p>Após a solicitação da troca, as premiações serão entregues em um prazo mínimo de 30 dias úteis, contados a partir das datas informadas para período de trocas.</p>
                        </div>
                    </div>

                    <?php
                    //verifica se tem página

                    if (count($resgates->result()) == 0) {
                    ?>
                        <tr>
                            <td class="text-center" colspan="6">Nenhum resgate para mostrar.</td>
                        </tr>
                    <?php
                    } else {
                        //lista as páginas
                        if(!is_null($camp)) {

                            foreach ($resgates->result() as $item) {

                                if ($camp->campanha_id = $item->campanha_id) {
                    ?>

                                <!-- box-estrela -->
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="box-estrela">
                    <?php
                                        if ($item->img_premio == null) {
                    ?>
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
                                                <input type="hidden" name="resgate_id" value="<?= $item->resgate_id ?>">
                                                <input type="hidden" name="resgate_pontos" value="<?= $item->resgate_pontos ?>">
                                                <button type="submit" class="btn btn-primary btn-green"> Resgatar!</button>
                                            </form>
                                        </div>
                    <?php
                                        } else {
                    ?>
                                        <div class="text-center">
                                            <img src="<?= $item->img_premio ?>" alt="" style="width: 90%" onclick="showModalImage('<?= $item->img_premio ?>---<?= $item->resgate_nro_estrelas ?>---<?= $item->resgate_pontos ?>')">
                                            <div class="base-estrela">
                                                <span><?= $item->resgate_pontos ?> pontos</span>
                                                <form method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="resgate_id" value="<?= $item->resgate_id ?>">
                                                    <input type="hidden" name="resgate_pontos" value="<?= $item->resgate_pontos ?>">
                                                    <button type="submit" class="btn btn-primary btn-green"> Resgatar!</button>
                                                </form>
                                            </div>
                                        </div>
                    <?php
                                    }
                    ?>
                                    </div>
                                </div>
                    <?php
                                }
                            }
                        } else {
                    ?>  
                        <tr>
                            <td class="text-center" colspan="6">Sem campanha ativa.</td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content text-center">
                                <div class="container">
                                    <div class="text-center">
                                        <img src="" alt="" id="imgPremio" class="w-75">
                                        <div class="base-estrela">
                                            <span><?= $item->resgate_pontos ?> pontos <br> <?= $item->resgate_nro_estrelas ?> estrelas</span>
                                            <span class="divider"></span>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="resgate_id" value="<?= $item->resgate_id ?>">
                                                <input type="hidden" name="resgate_pontos" value="<?= $item->resgate_pontos ?>">
                                                <button type="submit" class="btn btn-primary btn-green"> Resgatar!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
    function showModalImage(img) {
        img = img.split("---")
        var image = document.getElementById('imgPremio');
        image.src = img[0]
        $('#myModal').modal('show')
        return;
    }
</script>