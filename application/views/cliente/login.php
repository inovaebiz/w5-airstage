<!-- CONTAINER -->
<div class="container">
    <?php

    foreach ($page->result() as $itemPage) :
        echo "<script> localStorage.setItem('pagina_" . $itemPage->site_pag_id . "', " . $itemPage->status_pagina . "); </script>";
    endforeach;

    ?>
    <div class="row align-item-end">
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <img class="programa-familia-fujitsu mt-3" src="<?php echo base_url(); ?>assets-login/img/programa-familia-fujitsu.svg" width="150" height="196" title="Família Airstage" alt="Família Airstage">
            <div class="box-login">
                <a href="<?php echo base_url(); ?>cadastrar" class="btn btn-cadastre-se" alt="Cadastre-se" title="Cadastre-se">Cadastre-se</a>
                <form id="ja-sou-cadastrado" class="pt-3" name="form" method="post">
                    <?php
                    echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                    if (isset($ex)) {
                        if ($ex != '') {
                            echo '<div class="overlay-return"></div>
                            <div id="inline_content" style="
                                background-color: #fff;
                                border-radius: 0;
                                border: 1px solid #dd0f23;
                                text-align: center;
                                position: absolute!important;
                                top: 0!important;
                                left: 0!important;
                                z-index: 1001!important;
                                height: 100%!important;
                                width: 100%!important;
                                margin: 10px 10px 10px 10px;
                                padding: 50px 50px;" class="text-center">
                                <div class="col-md-12">
                                    <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">' . $ex . '</h2>
                                    <button type="button" id="btn-ok" class="btn btn-finalizado" style="background-color: #ED1C24;">Tente novamente</button>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                    <div class="form-group position-relative">
                        <label for="inputEmail" class="sr-only">E-mail</label>
                        <i class="icone-email icons"></i>
                        <input type="text" id="email" name="email" class="form-control campo-login" placeholder="E-mail" value="<?= set_value('email') ?>" required autofocus>
                    </div>
                    <div class="form-group position-relative">
                        <label for="inputPassword" class="sr-only">Senha</label>
                        <i class="icone-senha icons"></i>
                        <input type="password" id="senha" name="senha" class="form-control campo-senha" placeholder="Senha" required>
                        <small id="link-esquecer-senha" class="link-esquecer-senha"><a href="<?php echo base_url(); ?>recuperar-senha">Esqueci a senha</a></small>
                    </div>

                    <button class="btn btn-entrar" type="submit">Entrar</button>
                </form>
            </div>
            <h5 class="font-weight-normal text-primary">Um novo nome, as mesmas vantagens, incentivos e sucesso nos negócios</h5>
            <small>O <strong>Programa Família Airstage</strong>, nosso programa de incentivo que agora passa a se chamar <strong>Família Airstage</strong>, ganha um novo nome mas continua o mesmo: cheio de oportunidades e benefícios exclusivos feitos especialmente para vocês, parceiros instaladores, registrarem suas instalações e obterem pontos, que podem ser trocados por dinheiro ou prêmios.</small>
            <a class="link-primary" href="<?= base_url('/tela-introdutoria') ?>" title="Clique aqui e saiba mais">
                <h5 class="font-weight-normal pt-3">
                    <img src="<?php echo base_url(); ?>assets-login/img/clique-aqui-e-saiba-mais.svg" alt="Clique aqui e saiba mais" title="Clique aqui e saiba mais"> Clique aqui e saiba mais
                </h5>
            </a>
            <h5 class="font-weight-normal text-primary pt-3">Tutorial do programa</h5>
            <small>Faça o download do Tutorial do programa Fujitsu</small>
            <h5 class="font-weight-normal text-primary pt-3">
                <a class="link-primary" href="<?= base_url('/tutorial-site-familia-airstage.pdf') ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Clique aqui</a>
            </h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 order-first order-lg-last">
            <img class="programa-familia-fujitsu-mob mt-3" src="<?php echo base_url(); ?>assets-login/img/programa-familia-fujitsu.svg" alt="Família Airstage" title="Família Airstage">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets-login/img/mais-vantagens.png" alt="Mais vantagens, mais incentivo, mais sucesso em nossos negócios" title="Mais vantagens, mais incentivo, mais sucesso em nossos negócios">
        </div>
    </div>
</div>

<!-- Scripts -->
<?php include("scripts.php") ?>