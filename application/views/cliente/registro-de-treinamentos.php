<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica/')?>">Área do cliente</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registro de Treinamentos</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Registro de treinamentos</h1>

<section>

<!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="col-md-8">
    <p><span>Cadastre seus Treinamentos</span> e acumule pontos que serão revertidos em prêmios.</p>
  </div>

<div class="f1-buttons col-md-4">

<a class="btn btn-primary btn-labeled" href="<?= base_url('cliente/treinamento/cadastro-treinamento')?>" role="button">

<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar Novo treinamento</span></a>
</div>

</div>
</form>


<div class="row ">
<div class="col-md-12">

<!-- Tabela -->
<h2>Treinamentos cadastrados</h2> 

<!-- Form -->

	<?php
	    if(isset($_GET['msg'])){
		    switch($_GET['msg']){
			    case 'delete':?>
               		 <div class="alert alert-success">Treinamento excluido com sucesso!</div>
			    <?php
			    break;
			    
		    }
		}?> 
	<?php
	    if(isset($_GET['msg'])){
		    switch($_GET['msg']){
			    case 'cadastro':?>
               		 <div class="alert alert-success">Treinamento cadastrado com sucesso!</div>
			    <?php
			    break;
			    
		    }
		}?> 
	<?php
	    if(isset($_GET['msg'])){
		    switch($_GET['msg']){
			    case 'edit':?>
               		 <div class="alert alert-success">Treinamento editado com sucesso!</div>
			    <?php
			    break;
			    
		    }
		}?> 
    <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="35%">NOME DO PARTICIPANTE</th>
      <th>DATA</th>
      <th>PONTOS ACUMULADOS</th>
      <th>STATUS</th>
      <th width="7%"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    //verifica se tem página
    if(count($treinamento->result()) == 0)
    {
        ?>
        <tr>
            <td class="text-center" colspan="6">Nenhum treinamento para mostrar.</td>
        </tr>
        <?php
    }else
    {
        //lista as páginas
        foreach ($treinamento->result() as $item)
        {
    ?>
    <tr>
      <td><?=$item->treinamento_nome?></td>
      <td><?= date('d/m/Y', strtotime($item->treinamento_data))?></td>
      <td><?=$item->treinamento_pontos?></td>
      <td> <span class="<?= $item->treinamento_status == 1 ? 'ativo' : 'status'?>">
		  
		  
		  <!--?= $item->treinamento_status == 1 ? 'Pontos Liberados' : 'Aguardando liberação dos pontos'?>-->
		  <?
			if ($item->treinamento_status == 0) {echo'Aguardando liberação dos pontos';} 
		    elseif ($item->treinamento_status == 1) {echo'Pontos Liberados';}
			else{echo'Reprovado';}
			
			$item->treinamento_motivo
		  ?>
		  </span> 
		</td>
      <td> <a href="<?= base_url('cliente/treinamento/detalhe-treinamento/'.$item->treinamento_id)?>"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="<?= base_url('cliente/treinamento/deletar-treinamento/'.$item->treinamento_id)?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>
<?php
		        }
		    }
		    ?>
  </tbody>
</table>



</div>
</div>
</section>



</main>

</div>
</div>