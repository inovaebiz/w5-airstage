<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Cadastro de equipamentos</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">
		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>
		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Editar Tipo Airstage</h1>
			<!-- section -->
			<section>
				<script>
					function editar(){
						let nome = $("#tipo_nome").val();
						// let pontos = $("#tipo_pontos").val();
						let tipo_cred_pontos = $("#tipo_cred_pontos").val();
						let tipo_nao_cred_pontos = $("#tipo_nao_cred_pontos").val();
						let m = "";
						
						if(nome == ""){
							m += "Campo nome é obrigatório! \n";
						}
						/*
						if(pontos == ""){
							m += "Campo pontos é obrigatório! \n";
						}
						*/
						if(tipo_cred_pontos == ""){
							m += "Campo credenciados pontos é obrigatório! \n";
						}
						if(tipo_nao_cred_pontos == ""){
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
				<!-- Form -->
				<form method="POST" class="form-cadastro" onsubmit="editar()">
					<input type="hidden" name="tipo_id" value="<?=$t->tipo_id?>">
					<div class="row">
						<div class="input-group col-md-12">
							<input type="text" class="form-control" name="tipo_nome" id="tipo_nome" placeholder="Nome" value="<?=$t->tipo_nome?>"> 
						</div>
						<!--
						<div class="input-group col-md-2">
							<input type="text" class="form-control" name="tipo_pontos" id="tipo_pontos" placeholder="pontos" value="<?=$t->tipo_pontos?>"> 
						</div>
						<div class="input-group col-md-2">
							<input type="number" class="form-control" name="tipo_reais" id="tipo_reais" placeholder="Valor em R$" value="<?=$t->tipo_reais?>"> 
						</div>
						-->
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="tipo_cred_pontos" id="tipo_cred_pontos" placeholder="Credenciados Pontos" value="<?=$t->tipo_cred_pontos?>"> 
						</div>
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="tipo_nao_cred_pontos" id="tipo_nao_cred_pontos" placeholder="Não Credenciados Pontos" value="<?=$t->tipo_nao_cred_pontos?>"> 
						</div>
						<div class="f1-buttons col-md-4">
							<div class="onoffswitch3">
								<input type="checkbox" name="tipo_status" class="onoffswitch3-checkbox" id="ativar" <?=$t->tipo_status == 1 ? "checked" : ""?>>
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
			<a href="<?= base_url('control/equipamentos/gerenciar-tipos/'.$t->tipo_sc)?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
		</main>
	</div>
</div>