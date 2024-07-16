<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar categoria de motivos de recusa</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Editar categoria de motivos de recusa</h1>
			<section>
				<?php
                    if($u->id == 2 || $u->id == 15 || $u->id == 30 || $u->id == 34) :
                ?>
				<!-- Form -->
				<form method="POST" action="" class="form-cadastro">
					<input type="hidden" name="mr_categoria_id" value="<?=$usuario->mr_categoria_id?>">
					<div class="row">
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="mr_categoria_nome" id="mr_categoria_nome" placeholder="Nome da categoria" value="<?=$usuario->mr_categoria_nome?>"> 
						</div>
						<div class="f1-buttons col-md-3">
							<div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="mr_categoria_status" class="onoffswitch3-checkbox" <?=$usuario->mr_categoria_status == 1 ? "checked" : ""?>>
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
				<?php
					else :
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning text-center">Você não tem permissão para acessar essa área, por favor, entre em contato com o administrador do sistema.</div>
					</div>
				</div>
				<?php
                    endif;
                ?>
			</section><br>
			<!-- link-voltar -->
			<a href="<?= base_url('control/status/categoria/')?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
		</main>
	</div>
</div>