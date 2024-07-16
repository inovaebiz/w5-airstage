<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar Item Politica de Pontos</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">
		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>
		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Editar Item Politica de Pontos</h1>
			<!-- section -->
			<section>
				<script>
					function editar(){
						let nome = $("#politica_nome").val();
						// let pontos = $("#politica_valor").val();
						let politica_cred_pontos = $("#politica_cred_pontos").val();
						let politica_nao_cred_pontos = $("#politica_nao_cred_pontos").val();
						let m = "";
						
						if(nome == ""){
							m += "Campo nome é obrigatório! \n";
						}
						/*
						if(pontos == ""){
							m += "Campo valor é obrigatório! \n";
						}
						*/
						if(politica_cred_pontos == ""){
							m += "Campo credenciados pontos é obrigatório! \n";
						}
						if(politica_nao_cred_pontos == ""){
							m += "Campo não credenciados pontos é obrigatório! \n";
						}
						
						if(m != ""){
							alert(m);
							return false;
						}else{
							return true;
						}
					}
				</script>
				<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
				<!-- Form -->
				<form method="POST" action="" class="form-cadastro" onsubmit="return editar()">
					<input type="hidden" name="politica_id"  value="<?= $politica->politica_id?>"> 
					<div class="row">
						<div class="input-group col-md-12">
							<input type="text" class="form-control" name="politica_nome" id="politica_nome" value="<?= $politica->politica_nome?>" placeholder="Nome"> 
						</div>
						<!--
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="politica_valor" id="politica_valor" value="<?= $politica->politica_valor?>" placeholder="Valor"> 
						</div>
						-->
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="politica_cred_pontos" id="politica_cred_pontos" value="<?= $politica->politica_cred_pontos?>" placeholder="Credenciados Pontos"> 
						</div>
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="politica_nao_cred_pontos" id="politica_nao_cred_pontos" value="<?= $politica->politica_nao_cred_pontos?>" placeholder="Não Credenciados Pontos"> 
						</div>
						<div class="f1-buttons col-md-3">
							<div class="onoffswitch3">
								<input type="checkbox" name="politica_status" class="onoffswitch3-checkbox" id="ativar" <?= $politica->politica_status == 1 ? 'checked' : ''?>>
								<label class="onoffswitch3-label" for="ativar">
									<span class="onoffswitch3-inner">

									<span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
									<span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
									</span>
								</label>
							</div>
						</div>
						<div class="f1-buttons col-md-2">
							<button type="submit" class="btn btn-primary btn-labeled">
							<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Salvar</span></button>
						</div>
					</div>
				</form>
			</section><br>
			<!-- link-voltar -->
			<a href="<?= base_url('control/politica/')?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
		</main>
	</div>
</div>