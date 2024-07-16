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

<h1>Editar Categorias Airstage</h1>

<!-- section -->
<section>
<script>
	function cadastrar(){
		let nome = $("#sc_nome").val();
		let pontos = $("#sc_pontos").val();
		
		let m = "";
		if(nome == ""){
			m += "Campo nome é obrigatório! \n";
		}
		if(pontos == ""){
			m += "Campo pontos é obrigatório! \n";
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
<form method="POST" class="form-cadastro" onsubmit="cadastrar()">
	<input type="hidden" name="sc_id" value="<?=$sc->sc_id?>">

	<div class="row">
	  <div class="input-group col-md-12">
	    <input type="text" class="form-control" name="sc_nome" id="sc_nome" placeholder="Nome" value="<?=$sc->sc_nome?>"> 
	  </div>
	
		<div class="input-group col-md-6">
			<input type="hidden" class="form-control" name="sc_pontos" id="sc_pontos" placeholder="pontos" value="<?=$sc->sc_pontos?>"> 
		</div>
		
		<div class="f1-buttons col-md-4">
			<div class="onoffswitch3">
			    <input type="checkbox" name="sc_status" class="onoffswitch3-checkbox" id="ativar" <?=$sc->sc_status == 1 ? "checked" : ""?>>
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
<a href="<?= base_url('control/equipamentos/')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>
</div>
</div>