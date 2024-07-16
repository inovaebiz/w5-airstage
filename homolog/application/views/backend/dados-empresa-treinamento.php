<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('control/empresas/')?>">Empresas Cadastradas</a></li>
        <li class="breadcrumb-item active"> <a href="<?= base_url('control/empresas/visualizar-empresa/'.$treinamento->treinamento_cliente_id)?>">Detalhes</a></li>
        <li class="breadcrumb-item active"> Dados do Treinamento</li>
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
<a href="<?= base_url('control/empresas/visualizar-empresa/'.$treinamento->treinamento_cliente_id)?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Condensadores - Loja Arfrio</h1>


<!-- section -->
<section>
<div class="row">

<div class="col-md-12">

<h2>Dados do treinamento</h2>
<!-- Tabela -->
<table id="lista-padrao" class="table-interna-simples table table-striped table-bordered dt-responsive nowrap">


        </thead>
    <tbody>
    
    <tr>
      <td>NOME DO CLIENTE</td>
      <td><?= $treinamento->treinamento_nome?></td>
      </tr>      

    
    <tr >
      <td >ENDEREÇO</td>
      <td><?= $treinamento->treinamento_endereco?>, <?= $treinamento->treinamento_numero?><?= $treinamento->treinamento_complemento != '' ? ', '.$treinamento->treinamento_complemento : ''?> - <?= $treinamento->treinamento_bairro?> - <?= $treinamento->treinamento_cidade?> <?= $treinamento->treinamento_estado?> - CEP: <?= $treinamento->treinamento_cep?></td>
    
    </tr>

    <tr>
      <td>NOME DO RESPONSAVEL</td>
      <td><?= $treinamento->treinamento_responsavel?></td>
      
    </tr>

    <tr >
      <td>CPF</td>
      <td><?= $treinamento->treinamento_cpf?></td>
      
    </tr>

    <tr >
      <td>DATA DO TREINAMENTO</td>
      <td><?= date('d/m/Y', strtotime($treinamento->treinamento_data))?></td>
      
    </tr>

    <tr>
      <td>CERTIFICADO</td>
      <?php
	      if($treinamento->treinamento_anexo_comprovante != ''){
		      $on = 'onclick';
	      }else{
		      $on = '';
	      }
	   ?>
      <td><button type="submit" target="_blank" <?= $on?>="window.open('<?= base_url('uploads/'.$treinamento->treinamento_anexo_comprovante)?>', '_blank')" class="btn btn-primary"> <i class="fa fa-clipboard" aria-hidden="true"></i> Visualizar certificado</button></td>
    </tr>

   

  </tbody>
</table>





<!-- Tabela -->
  <table class="table tabela-pontos">
  
  <tbody>
    
    <tr >
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados neste treinamento</td>
 
      <td class="no-border total" width="30%"> 0 PONTOS </td>
    </tr>

  </tbody>
</table>




</div>
</div>
</section>

<!-- link-voltar -->
<a href="<?= base_url('control/empresas/visualizar-empresa/' . $treinamento->treinamento_cliente_id) ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>
</div>
</div>