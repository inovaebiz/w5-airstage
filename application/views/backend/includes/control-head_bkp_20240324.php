<?php 
	$u = NULL; $u = $this->session->userdata("control");
	if($u){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard | Programa Família Airstage</title>
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
    <!-- Icon fonts -->
    <link href="<?php echo base_url(); ?>assets-control/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets-control/fonts/fonts.css" rel="stylesheet">

    <!-- DataTable -->
    <link href="<?php echo base_url(); ?>assets-control/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets-control/css/datatable/responsive.bootstrap4.min.css" rel="stylesheet">       

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets-control/css/bootstrap/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets-control/css/editor/theme-default.css" rel="stylesheet">

    <!-- Datapicker -->
    <link href="<?php echo base_url(); ?>assets-control/css/datapicker/jquery.datetimepicker.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets-control/css/estilo.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets-control/img/favicon.png" rel="icon">
</head>
<header>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <img class="logo-fujitsu" src="<?php echo base_url(); ?>assets-control/img/logo-fujitsu-fujitsu-general-brazil.svg" alt="Família Airstage" title="Família Airstage">
            </div>
            <div class="col-sm-12 col-md-8 col-lg-4 col-xl-4">
                <img class="logo-projeto w-25" src="<?php echo base_url(); ?>assets-control/img/programa-familia-fujitsu.svg" width="150" height="auto" title="Projeto Família Airstage" alt="Projeto Família Airstage">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 offset-lg-1 col-xl-3 offset-xl-1 user">
                <div class="usuario">
                    <span><?= substr($u->nome ,0,1)?></span> <p><?= $u->nome?></p>
                </div>
                <!-- SUBMENU -->
                <div class="btn-group submenu">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <!-- <button type="button" class="btn btn-secondary"><p>sua Pontuação</p><span class="pontuacao">8</span></button> -->
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        <!-- <a class="dropdown-item" href="#" alt="Acessar meus dados" title="Acessar meus dados"><i class="flaticon-user"></i> <span>Meus dados</span></a> -->
                        <a class="dropdown-item" href="<?= base_url('control/auth/logout')?>" alt="Sair do sistema" title="Sair do sistema"><i class="flaticon-logout"></i> <span>Sair</span></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php } else {?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard | Programa Família Airstage</title>
    <?php
        $u = NULL;
        $u = $this->session->userdata("usuario");
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
    <meta name="expires" content="0">
    <meta http-equiv="cache-control" content="public">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets-control/img/favicon.png" rel="icon">
    <!-- Icon fonts -->
    <link href="<?php echo base_url(); ?>assets-control/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets-control/fonts/fonts.css" rel="stylesheet">

      <!-- DataTable -->
    <link href="<?php echo base_url(); ?>assets-control/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets-control/css/datatable/responsive.bootstrap4.min.css" rel="stylesheet">       

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets-control/css/bootstrap/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets-control/css/editor/theme-default.css" rel="stylesheet">

    <!-- Datapicker -->
    <link href="<?php echo base_url(); ?>assets-control/css/datapicker/jquery.datetimepicker.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets-control/css/estilo.css" rel="stylesheet">
</head>
<?php } ?>