<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica/')?>">Área do cliente</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('cliente/treinamento/')?>">Registro de treinamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
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
<a href="<?= base_url('cliente/treinamento/')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Condensadores - loja Ar frio</h1>


<!-- section -->
<section>
<div class="row">
<div class="col-md-12">

<h2>Dados do treinamento</h2>

<!-- Tabela -->
<table id="dados-treinamento" class="table table-striped table-bordered dt-responsive nowrap">
    <tbody>
    
    <tr>
      <td width="20%">NOME DO PARTICIPANTE</td>
      <td width="80%"><?= $treinamento->treinamento_nome?></td>
    </tr>
    <!--
    <tr>
      <td>BAIRRO</td>
      <td><= $treinamento->treinamento_bairro?></td>
    </tr>
	-->
	<tr>
      <td>CIDADE</td>
      <td><?= $treinamento->treinamento_cidade?></td>
    </tr>
    <tr>
      <td>ESTADO</td>
      <td><?= $treinamento->treinamento_estado?></td>
    </tr>
    <tr>
      <td>DATA DO TREINAMENTO</td>
      <td><?= date('d/m/Y', strtotime($treinamento->treinamento_data))?></td>
    </tr>
     <tr>
      <td>CERTIFICADO</td>
      <td>
	     <?php if($treinamento->treinamento_anexo_comprovante != NULL){?>
		 <a href="/uploads/<?=$treinamento->treinamento_anexo_comprovante?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red col-md-5">
		<i class="fa fa-file" aria-hidden="true"></i>
		Visualização comprovante</label></a>
		<?php }?>
      </td>
    </tr>
    
  </tbody>
</table>

<!-- Tabela -->
    <table class="table tabela-pontos">
  
  <tbody>
    
    <tr >
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados neste treinamento</td>
 
      <td class="no-border total" width="30%"> <?=$treinamento->treinamento_pontos?> PONTOS </td>
    </tr>

  </tbody>
</table>


</div>
</div>
</section>

<!-- link-voltar -->
<a href="<?= base_url('cliente/treinamento/')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>

</div>
</div>