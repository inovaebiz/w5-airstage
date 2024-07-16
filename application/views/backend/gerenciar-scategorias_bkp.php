<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('control')?>">Administrador</a></li>
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

<h1>Cadastro de Categorias Airstage</h1>

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
<form method="POST" class="form-cadastro" onsubmit="return cadastrar()">

	<div class="row">
	  <div class="input-group col-md-12">
	    <input type="text" class="form-control" name="sc_nome" id="sc_nome" placeholder="Nome"> 
	  </div>
	
		<div class="input-group col-md-6">
			<input type="text" class="form-control" name="sc_pontos" id="sc_pontos" placeholder="pontos"> 
		</div>
		
		<div class="f1-buttons col-md-3">
			<div class="onoffswitch3">
			    <input type="checkbox" name="sc_status" class="onoffswitch3-checkbox" id="ativar" checked>
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
		  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Nova categoria</span></button>
	  </div>

	</div>
</form>


<div class="row">
<div class="col-md-12">

<h2>Categorias Cadastradas</h2> 

<!-- Tabela -->
   <table id="lista-padrao" class="display table  dt-responsive nowrap ">
    <thead class="thead-light">
    <tr>
      
      <th width="40%">NOME</th>
      <th>STATUS</th>
      <th>PONTUAÇÃO</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="forms">
    	<?php foreach($sc->result() as $item): ?>
    	<tr>
			<td><?= $item->sc_nome ?></td>
			<td class="text-center">
				<!--<div class="onoffswitch3">
					<input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-01" <?=$item->sc_status == 1 ? "checked" : ""?>>
					<label class="onoffswitch3-label" for="status-01">
						<span class="onoffswitch3-inner">
						
						<span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
						<span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
						</span>
					</label>
				</div>-->
				<span class="<?= $item->sc_status == 1 ? 'ativo' : 'status'?>"><?= $item->sc_status == 1 ? 'Ativo' : 'Inativo'?></span>
			</td>
			<td class="pontos"> <?=$item->sc_pontos?> PONTOS </td>
			<td>
				<a href="/control/equipamentos/editar-categoria/<?=$item->sc_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a href="/control/equipamentos/excluir-categoria/<?=$item->sc_id?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				<a href="/control/equipamentos/gerenciar-tipos/<?=$item->sc_id?>"><i class="fa fa-bookmark" aria-hidden="true"></i></a>
			</td>
		
		</tr>
    	
    	<?php endforeach; ?>
		
  </tbody>
</table>

</div>


</div>
</section>


</main>
</div>
</div>