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

<h1>Cadastro de Outras Marcas</h1>
<section>
<div class="col-md-2 pull-left">
		  <button type="submit" class="btn btn-primary btn-labeled">
		  <span class="btn-label"><i class="fa fa-pencil" aria-hidden="true"></i>Pontos</span></button>
	  <div class="clean"></div><br>
</div>
<!--<div class="col-md-3 pull-right">
		  <button type="submit" class="btn btn-primary btn-labeled">
		  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar categorias</span></button>
	  <div class="clean"></div><br>
</div>-->
<!-- section -->
<div class="clean"></div><br>
<script>
	/*function cadastrar(){
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
	}onsubmit="return cadastrar()"*/
</script>
<br><br>
<?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'success':?>
			<div class="alert alert-success">Resgate cadastrado com sucesso!</div>
			<?php
		break;   
	}
}
?> 
<?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'edit':?>
			<div class="alert alert-success">Marca editada com sucesso!</div>
			<?php
		break;   
	}
}
?> 
<?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'delete':?>
			<div class="alert alert-danger">Marca excluida com sucesso!</div>
			<?php
		break;   
	}
}
?> 
<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
     
<!-- Form -->
<form method="POST" action="" class="form-cadastro">
	<input type="hidden" name="mcategorias_id" value="<?=$sc->mcategorias_id?>">
	<div class="row">
	  <div class="input-group col-md-6">
	    <input type="text" class="form-control" name="mcategoria_nome" id="mcategoria_nome" placeholder="Nome da categoria" value="<?=$sc->mcategoria_nome?>"> 
	  </div>
		<div class="f1-buttons col-md-3">
			<div class="onoffswitch3">
			    <input type="checkbox" name="mcategoria_status" class="onoffswitch3-checkbox" id="ativar" <?=$sc->mcategoria_status == 1 ? "checked" : ""?>>
			    <label class="onoffswitch3-label" for="ativar">
			        <span class="onoffswitch3-inner">
			           
			            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
			          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
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

</section>


</main>
</div>
</div>