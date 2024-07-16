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
<!-- link-voltar -->
<a href="<?= base_url('control/equipamentos/gerenciar-tipos')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
<h1>Cadastro de Equipamento Airstage</h1>

<!-- section -->
<section>
<script>
	function cadastrar(){
		let nome = $("#equipamento_nome").val();
		let pontos = $("#equipamento_pontos").val();
		
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
	<input type="hidden" name="equipamento_tipo" value="<?=$this->uri->segment(4)?>">

	<div class="row">
	  <div class="input-group col-md-12">
	    <input type="text" class="form-control" name="equipamento_nome" id="equipamento_nome" placeholder="Nome"> 
	  </div>
	
		<div class="input-group col-md-6">
			<input type="hidden" class="form-control" name="equipamento_pontos" id="equipamento_pontos" placeholder="Pontos" value="0"> 
		</div>
		
		<div class="f1-buttons col-md-3">
			<div class="onoffswitch3">
			    <input type="checkbox" name="equipamento_status" class="onoffswitch3-checkbox" id="ativar" checked>
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
		  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Novo equipamento</span></button>
	  </div>

	</div>
</form>


<div class="row">
<div class="col-md-12">

<h2>Equipamentos Cadastrados</h2> 

<!-- Tabela -->
   <table id="lista-padrao" class="display table  dt-responsive nowrap ">
    <thead class="thead-light">
    <tr>
      
      <th width="40%">NOME</th>
      <th>STATUS</th>
      <!-- <th>PONTUAÇÃO</th> -->
      <th></th>
    </tr>
  </thead>
  <tbody class="forms">
	  	<?php $i = 0;?>
    	<?php foreach($t->result() as $item): ?>
    	<tr>
			<td><?= $item->equipamento_nome ?></td>
			<td class="text-center">
				<!--<div class="onoffswitch3">
					<input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-0<?= $i?>" <?=$item->equipamento_status == 1 ? "checked" : ""?>>
					<label class="onoffswitch3-label" for="status-0<?= $i?>">
						<span class="onoffswitch3-inner">
						
						<span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
						<span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
						</span>
					</label>
				</div>-->
				<span class="<?= $item->equipamento_status == 1 ? 'ativo' : 'status'?>"><?= $item->equipamento_status == 1 ? 'Ativo' : 'Inativo'?></span>
			</td>
			<!-- <td class="pontos"> <?=$item->equipamento_pontos?> PONTOS </td> -->
			<td>
				<a href="<?= base_url() ?>control/equipamentos/editar-equipamento/<?=$item->equipamento_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<!-- <a href="<?= base_url() ?>control/equipamentos/excluir-equipamento/<?=$item->equipamento_id?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a> -->
			</td>
		
		</tr>
    	
    	<?php $i++;endforeach; ?>
		
  </tbody>
</table>

</div>


</div>
</section>
<!-- link-voltar -->
<a href="#" onclick="window.history.go(-1); return false;" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>
</div>
</div>