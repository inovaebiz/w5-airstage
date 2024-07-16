<?php 
$u = NULL; $u = $this->session->userdata("control");
$url_2 = $this->uri->segment(2);
$url_3 = $this->uri->segment(3);
?>
<?php
    if($u->id == 2 || $u->id == 15 || $u->id == 30 || $u->id == 34) :
?>
<?php
    endif;
?>
<div class="col-md-12 col-lg-3 col-xl-2 sidebar">
    <nav class="navbar-expand-lg navbar-light">
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <span class="back01">
                    <li>
                        <a class="<?= $view == 'dashboard' ? 'ativem' : ''?>" href="<?= base_url('control/') ?>" id="dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'aprovacao-de-empresas' || $view == 'aprovacao-empresa-dados') ? 'ativem' : ''?>" href="<?= base_url('control/empresas/aprovacao/')?>" id="aprovacao-empresas">Aprovação de credenciados</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'aprovacao-empresa-dados-nao' || $view == 'aprovacao-empresa-dados-nao-credenciado') ? 'ativem' : ''?>" href="<?= base_url('control/empresas/aprovacaonaocredenciado/')?>" id="aprovacao-empresas">Aprovação de não credenciados</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'empresas-cadastradas' || $view == 'dados-empresa') ? 'ativem' : ''?>" href="<?= base_url('control/empresas/')?>" id="empresas-cadastradas">Empresas cadastradas</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'obras-cadastradas' || $view == 'obras-cadastradas') ? 'ativem' : ''?>" href="<?= base_url('control/empresas/obras-cadastradas')?>" id="obras-cadastradas">Obras cadastradas</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'liberacao-de-pontos' || $view == 'liberacao-de-pontos-obras') ? 'ativem' : ''?>" href="<?= base_url('control/pontos/obras')?>" id="liberacao-pontos">Liberação de pontos de obras</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'liberacao-de-pontos' || $view == 'liberacao-de-pontos-treinamentos') ? 'ativem' : ''?>" href="<?= base_url('control/pontos/treinamentos')?>" id="liberacao-pontos">Liberação de pontos de treinamentos</a>
                    </li>
                </span>
                <span class="back02">
                    <li class="disabled">Configuração do sistema</li>
                    <li>
                        <a class="<?= $url_2 == 'auth' ? 'ativem' : ''?>" href="<?= base_url('control/auth/')?>" id="cadastro-acesso">Cadastro de acesso</a>
                    </li>
                    <li>
                        <a class="<?= $url_2 == 'campanha' ? 'ativem' : ''?>" href="<?= base_url('control/campanha/')?>" id="cadastro-campanha">Cadastro de campanha</a>
                    </li>
                    <li>
                        <a class="<?= $url_2 == 'distribuidores' ? 'ativem' : ''?>" href="<?= base_url('control/distribuidores/')?>" id="cadastro-distribuidores">Cadastro de distribuidores</a>
                    </li>
                    <li>
                        <a class="<?= $url_2 == 'equipamentos' ? 'ativem' : ''?>" href="<?= base_url('control/equipamentos/')?>" id="cadastro-equipamentos">Cadastro de equipamentos</a>
                    </li>
                    <li>
                        <a class="<?= $url_2 == 'numeros-de-series' ? 'ativem' : ''?>" href="<?= base_url('control/numeros-de-series/')?>" id="cadastro-de-numeros-de-series">Cadastro de Números de Séries</a>
                    </li>
                    <li>
                        <a class="<?= $view == "gerenciar-marcas" ? 'ativem' : ''?>" href="<?= base_url('control/marcas/')?>" id="gerenciar-marcas">Cadastro de outras marcas</a>
                    </li>
                    <li>
                        <a class="<?= $view == "gerenciar-categ-marca" ? 'ativem' : ''?>" href="<?= base_url('control/marcas/categoria')?>" id="cadastro-marcas">Categorias de outras marcas</a>
                    </li>
                    <li>
                        <a class="<?= ($view == 'editar-pontos') ? 'ativem' : ''?>" href="<?= base_url('control/pag/pontos')?>" id="cadastrar-pontos">Cadastrar pontos / Bloqueios</a>
                    </li>
                    <li>
                        <a class="<?= $view == 'cadastro-de-resgate' ? 'ativem' : ''?>" href="<?= base_url('control/resgate/')?>" id="cadastro-resgate">Cadastro de Prêmio</a>
                    </li>
                    <li>
                        <a class="<?= $view == 'resgates-pendentes' ? 'ativem' : ''?>" href="<?= base_url('/control/resgate/aprovar-resgates')?>" id="cadastro-resgate">Aprovação de Prêmios</a>
                    </li>
                    <li>
                        <a class="<?= $url_2 == 'politica' ? 'ativem' : ''?>" href="<?= base_url('control/politica/')?>" id="politica-pontos">Politica de Pontos</a>
                    </li>
                    <?php
                        if($u->id == 2 || $u->id == 15 || $u->id == 30 || $u->id == 34) :
                    ?>
                    <li>
                        <a class="<?= $view == "gerenciar-categ-motivos-de-recusa" ? 'ativem' : ''?>" href="<?= base_url('control/status/categoria')?>" id="cadastro-categoria-status">Categorias de Status de recusa</a>
                    </li>
                    <?php
                        endif;
                    ?>
                    <li>
                        <a class="<?= $view == "cadastro-de-status" ? 'ativem' : ''?>" href="<?= base_url('control/status/')?>" id="cadastro-status">Status de recusa</a>
                    </li>
                    <li>
                        <a class="<?= $url_2 == 'regulamento' ? 'ativem' : ''?>" href="<?= base_url('control/regulamento/')?>" id="regulamento">Editar regulamento</a>
                    </li>
                </span>
            </ul>
        </div>
    </nav>
</div>