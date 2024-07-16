<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar campanha</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Editar campanha Airstage</h1>
            <!-- section -->
            <section>
                <!-- Form -->
                <form class="form-cadastro" method="POST" action="">
                    <input type="hidden" name="campanha_id" value="<?=$campanhas->campanha_id?>">
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-9">
                            <input id="campanha_nome" type="text" class="form-control" name="campanha_nome" placeholder="Nome da campanha" value="<?=$campanhas->campanha_nome?>">
                        </div>
                        <div class="input-group col-md-3">
                            <div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="campanha_status" class="onoffswitch3-checkbox" <?=$campanhas->campanha_status == 1 ? "checked" : ""?>>
                                <label class="onoffswitch3-label" for="ativar">
                                    <span class="onoffswitch3-inner">
                                        <span class="onoffswitch3-active">
                                            Desativar
                                            <span class="onoffswitch3-switch">Ativo</span>
                                        </span>
                                        <span class="onoffswitch3-inactive">
                                            Ativar
                                            <span class="onoffswitch3-switch">Inativo</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-2">
                            <label>Período da Campanha:</label>
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="start-date-campaign" type="text" class="form-control" name="campanha_data_inicial" placeholder="De" value="<?= date('d/m/Y', strtotime($campanhas->campanha_data_inicial)) ?>">
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="end-date-campaign" type="text" class="form-control" name="campanha_data_final" placeholder="Até" value="<?= date('d/m/Y', strtotime($campanhas->campanha_data_final)) ?>">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-2">
                            <label>Período de Regaste:</label>
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="rescue-start-date-campaign" type="text" class="form-control" name="campanha_data_inicial_resgate" placeholder="De" value="<?= date('d/m/Y', strtotime($campanhas->campanha_data_inicial_resgate)) ?>">
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="rescue-end-date-campaign" type="text" class="form-control" name="campanha_data_final_resgate" placeholder="Até" value="<?= date('d/m/Y', strtotime($campanhas->campanha_data_final_resgate)) ?>">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="f1-buttons col-md-3">
                            <button type="submit" class="btn btn-primary btn-labeled ">
                                <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Salvar campanha</span>
                            </button>
                        </div>
                    </div>
                </form>
			</section><br>
			<!-- link-voltar -->
			<a href="<?= base_url('control/campanha/')?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
        </main>
    </div>
</div>