<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liberação de pontos</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Liberação de pontos de treinamentos</h1>


<!-- section -->
<section>
<div class="row">

<div class="col-md-12">
<!-- Tabela -->

    <table id="lista-padrao" class="table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="50%">NOME DA EMPRESA</th>
      <th>NOME DO PARTICIPANTE</th>
      <th>PONTOS</th>
      <th>STATUS</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
	  <?php foreach($obra->result() as $o):?>
	  <tr>  
		<td><?=$o->cliente_razao_social?></td>
		<td><?=$o->treinamento_nome?></td>
		<td><?=$o->treinamento_pontos?></td>
		<td><span class="status">Aguardando liberação dos pontos</span> </td>
		<td> <a href="<?= base_url() ?>control/pontos/liberacao-treinamentos/<?=$o->treinamento_id?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
	</tr>
	  <?php endforeach;?>
	


  </tbody>
</table>

</div>

</div>
</section>

</main>
</div>
</div>