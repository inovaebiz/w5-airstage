<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica/') ?>">Área do cliente</a></li>
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
<a href="<?= base_url('cliente/treinamento/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1><?= $treinamento->treinamento_nome?></h1>


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
		 <a href="<?= base_url('uploads/' . $treinamento->treinamento_anexo_comprovante) ?>" target="_blank"><label for="selecao-arquivo" class="btn btn-primary btn-red col-md-5">
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
    <tr>
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados neste treinamento</td>
 
      <td class="no-border total" width="30%"> <?=$treinamento->treinamento_pontos?> PONTOS </td>
    </tr>

  </tbody>
</table>




	<!-- BOTOES -->
	<div class="botoes-aprovacao">
		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="treinamento_id" value="<?=$treinamento->treinamento_id?>">
			<div class="row">
          <div class="form-group col-12 col-sm-12 col-md-8 col-lg-7 col-xl-10">
						<select id="treinamento_motivo" class="chosen-select-reason reprovacao" name="treinamento_motivo">
							<option value="">Selecione o motivo da reprovação</option>
							<?php
                foreach($status->result() as $ss) :
                  if($ss->mr_categoria_id == '4') :
              ?>
							<option value="<?=$ss->mr_id?>"><?=$ss->mr_nome?></option>
							<?php
                  endif;
                endforeach;
              ?>
						</select>
          </div>
          <div class="form-group col-12 col-sm-12 col-md-4 col-lg-5 col-xl-2">
						<button type="submit" class="btn btn-primary btn-red" name="treinamento_status" value="2" onclick="return valida();">Recusar</button>
					</div>
					
					<div class="col-12 col-sm-3 col-md-4 col-lg-4 col-xl-2">
						<button type="submit" class="btn btn-primary btn-green" name="treinamento_status" value="1"> Liberar pontos <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
					
					</div>
			</div>
		</form>
	</div>


</div>
</div>
</section>

<!-- link-voltar -->
<a href="<?= base_url('control/pontos/treinamentos')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>

</div>
</div>
<script>
	function valida(){
		let motivo = $("#treinamento_motivo").val();
		if(motivo == ""){
			alert("Selecione o motivo.");
			return false;
		}else{
			return true;
		}
	}
</script>