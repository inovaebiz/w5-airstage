<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica/')?>">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Aprovar de prêmio</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Aprovação de prêmio</h1>

<section>

<div class="row ">
<div class="col-md-12">

  <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      <th width="35%">DATA</th>
      <th>PONTOS NECESSARIOS</th>
      <th>PREMIO</th>
      <th>CLIENTE</th>
      <th>AÇÃ0</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($resgates->result() as $r):?>
  	<tr>
	  	<td><?= date('d/m/Y', strtotime($r->ru_data))?></td>
	  	<td><?=$r->resgate_pontos?></td>
	  	<td>R$ <?=number_format($r->resgate_valor_premio, 2, ',', '.')?></td>
	  	<td><a target="_blank" href="/control/empresas/visualizar-empresa/<?=$r->ru_cliente_id?>">Clique aqui para ver o cliente</a></td>
	  	<td><a onclick="return confirm('Você tem certeza que deseja aprovar este resgate? \n Esta ação não pode ser desfeita!')" href="/control/resgate/aprovar/<?=$r->ru_id?>"><i class="fa fa-check-circle" aria-hidden="true"></i></a></td>
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