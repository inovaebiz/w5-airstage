<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar marca</li>
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
<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
     
<!-- Form -->
<form method="POST" action="" class="form-cadastro">

	<div class="row">
	  <div class="input-group col-md-6">
	    <input type="text" class="form-control" name="marca_nome" id="marca_pontos" value="<?= $marca->marca_nome?>" placeholder="Nome da Marca"> 
	  </div>
		<div class="f1-buttons col-md-3">
			<div class="onoffswitch3">
			    <input type="checkbox" name="marca_status" class="onoffswitch3-checkbox" id="ativar" <?= $marca->marca_status == 1 ? 'checked' : ''?>>
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
		  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Editar marca</span></button>
	  </div>

	</div>
</form>
</section>


</main>
</div>
</div>