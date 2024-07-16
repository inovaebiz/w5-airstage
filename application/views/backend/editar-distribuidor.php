<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar distribuidor</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Editar distribuidor Airstage</h1>
            <!-- section -->
            <section>
            	<!-- Form -->
            	<form class="form-cadastro" method="POST" action="">
            		<input type="hidden" name="distribuidor_id" value="<?=$distribuidores->distribuidor_id?>">
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-6">
                            <input id="distribuidor_nome" type="text" class="form-control" name="distribuidor_nome" placeholder="Nome do distribuidor" value="<?=$distribuidores->distribuidor_nome?>">
                        </div>
                        <div class="f1-buttons col-md-3">
                            <div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="distribuidor_status" class="onoffswitch3-checkbox" <?=$distribuidores->distribuidor_status == 1 ? "checked" : ""?>>
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
                        <div class="f1-buttons col-md-3">
                            <button type="submit" class="btn btn-primary btn-labeled">
                            	<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Salvar</span></button>
                        </div>
                    </div>
                </form>
			</section><br>
			<!-- link-voltar -->
			<a href="<?= base_url('control/distribuidores/')?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
        </main>
    </div>
</div>