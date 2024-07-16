<?php
// Obtém a URL atual
$current_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$current_url .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$cliente = NULL;
$cliente = $this->session->userdata("cliente");
if ($cliente) {
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Programa Família Airstage</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=yes">
        <meta name="msapplication-tap-highlight" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <meta name="keywords" content=">">
        <meta name="description" content="">
        <meta name="copyright" content="">
        <meta name="author" content="W5 Agência de Publicidade">
        <meta name="publisher" content="W5 Agência de Publicidade">

        <meta name="ROBOTS" content="index, follow">
        <meta name="revisit-after" content="15 Days">
        <meta name="rating" content="General">
        <meta name="expires" content="0">
        <meta http-equiv="cache-control" content="public">

        <!-- Favicons -->
        <link href="<?php echo base_url(); ?>assets-cliente/img/favicon.png" rel="icon">

        <!-- Styles -->
        <?php include("styles-cliente.php") ?>

    </head>
    <body>
        <header>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <img class="logo-fujitsu" src="<?php echo base_url(); ?>assets-cliente/img/logo-fujitsu-fujitsu-general-brazil.svg" width="400" height="69" title="Família Airstage" alt="Família Airstage">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 ">
                        <img class="logo-projeto" src="<?php echo base_url(); ?>assets-cliente/img/logo-familia-fujitsu.svg" width="150" height="auto" title="Projeto Família Airstage" alt="Projeto Família Airstage">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4  col-xl-4  user">
                        <div class="usuario">
                            <span><?= substr($cliente->cliente_razao_social, 0, 1) ?></span>
                            <p><?= strlen($cliente->cliente_razao_social) > 21 ? substr($cliente->cliente_razao_social, 0, 21) . '...' : $cliente->cliente_razao_social ?> </p>
                        </div>
                        <!-- SUBMENU -->
                        <div class="btn-group submenu">
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <!-- <button type="button" class="btn btn-secondary btn-pontuacao">
                        <p>sua Pontuação</p><span class="pontuacao"></span>
                        </button> -->
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="<?= base_url('cliente/auth/meus-dados') ?>" title="Acessar meus dados">
                                <i class="flaticon-user"></i> <span>Meus dados</span>
                            </a>
                            <a class="dropdown-item" href="<?= base_url('cliente/auth/logout') ?>" alt="Sair do sistema" title="Sair do sistema">
                                <i class="flaticon-logout"></i> <span>Sair</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<?php } else { ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Programa Família Airstage</title>
        <?php
            $cliente = NULL;
            $cliente = $this->session->userdata("usuario");
        ?>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=yes">
        <meta name="msapplication-tap-highlight" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <meta name="keywords" content=">">
        <meta name="description" content="">
        <meta name="copyright" content="">
        <meta name="author" content="W5 Agência de Publicidade">
        <meta name="publisher" content="W5 Agência de Publicidade">

        <meta name="ROBOTS" content="index, follow">
        <meta name="revisit-after" content="15 Days">
        <meta name="rating" content="General">
        <meta name="expires" content="0" />
        <meta http-equiv="cache-control" content="public">

        <!-- Favicons -->
        <link href="<?php echo base_url(); ?>assets-login/img/favicon.png" rel="icon">

        <!-- Styles -->
        <?php include("styles-login.php") ?>

    </head>
    <body>
        <?php
        if (strpos($current_url, 'login') !== false) :
        ?>
        <!--HEADER-->
        <header>
            <div class="container text-center">
                <img class="logo-fujitsu" src="<?php echo base_url(); ?>assets-login/img/logo-fujitsu-fujitsu-general-brazil.svg" width="400" height="69" title="Família Airstage" alt="Família Airstage">
            </div>
        </header>
        <?php
        elseif (strpos($current_url, 'cadastrar') !== false) :
        ?>
        <!--HEADER-->
        <header>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-4 logo-cadastro">
                        <img class="logo-fujitsu" src="<?php echo base_url(); ?>assets-cliente/img/logo-fujitsu-fujitsu-general-brazil.svg" width="400" height="69" title="Família Airstage" alt="Família Airstage">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                        <img class="logo-projeto w-25" src="<?php echo base_url(); ?>assets-cliente/img/logo-familia-fujitsu.svg" width="150" height="auto" title="Projeto Família Airstage" alt="Projeto Família Airstage">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 link-login">
                        <p class="link-top">
                            <a href="<?= base_url('tela-introdutoria') ?>" title="Saiba mais sobre a campanha"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Sobre a campanha</a>
                        </p>
                        <a href="<?= base_url('login') ?>" class="btn btn-lg btn-primary" title="Faça seu login">
                            <img class="img-fluid" src="<?php echo base_url(); ?>assets-cliente/img/arrow.png" width="22" height="19" title="Família Airstage" alt="Família Airstage">Faça seu Login
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <?php
        elseif (strpos($current_url, 'tela-introdutoria') !== false) :
        ?>
        <!--HEADER-->
        <header class="no-border">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12 col-lg-4 offset-lg-8 text-right">
                        <p> Já é cadastrado?
                            <a href="<?= base_url('login/') ?>" class="btn btn-lg btn-white" title="Faça seu login">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets-login/img/arrow-on.png" width="22" height="19" title="Família Airstage" alt="Família Airstage">Faça seu Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </header>
        <?php else : ?>
        <!--HEADER-->
        <header>
            <div class="container text-center">
                <img class="logo-fujitsu" src="<?php echo base_url(); ?>assets-login/img/logo-fujitsu-fujitsu-general-brazil.svg" width="400" height="69" title="Família Airstage" alt="Família Airstage">
            </div>
        </header>
        <?php endif; ?>
<?php } ?>
<div class="loader">
    <div class="col-lg-8 text-center mx-auto">
        <img class="animated infinite" src="<?php echo base_url(); ?>assets-cliente/img/logo-familia-fujitsu.svg" width="150" height="auto" title="Familia Airstage" alt="Familia Airstage"><br />
        <div class="mt-3 spinner-border" role="status">
            <span class="loaderS"></span>
        </div>
    </div>
</div>