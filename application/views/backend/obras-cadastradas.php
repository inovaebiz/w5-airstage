<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Empresas Cadastradas</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Obras Cadastradas</h1>


<!-- section -->
<section>
<div class="row">

<?php
	$status = array(
		'Aguardando aprovação',
		'Aprovado',
		'Recusado',
	);
	
?>


<div class="col-md-12">

<!-- Tabela -->

    <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>      
      <th width="30%">RAZÃO SOCIAL DA EMPRESA</th>
      <th width="25%">CREDENCIADO</th>
      <th width="20%">DATA OBRA</th>
      <th width="25%">OBRAS CADASTRADA</th>
      <th>PONTOS</th>
      <th>STATUS</th>
      <th>MOTIVO</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $total=0;
    //verifica se tem página
    if(count($obras->result()) == 0)
    {
        ?>
        <tr>
            <td class="text-center" colspan="8">Nenhuma empresa cadastrada.</td>
        </tr>
        <?php
    }else
    {
        //lista as páginas
        foreach ($obras->result() as $item)
        {
	        $m = '';
    		foreach($mot->result() as $mo)
            {
                if($mo->mr_id == $item->obra_motivo)
                {
                    $m = $mo->mr_nome;
                }
            }
            if($item->obra_status == 2)
            {
                $total += (int)$item->obra_pontos;
            }

            $credenciado = '';
            foreach($usuarios->result() as $user)
            {
                if($user->cliente_id == $item->obra_cliente_id)
                {
                    $credenciado = $user->cliente_credenciado;
                }
            }
    ?>
    <tr>
      <td><?= $item->obra_cliente?></td>
      <td><?= $credenciado === '1' ? 'Sim' : 'Não' ?></td>
      <td><?= date('d/m/Y', strtotime($item->obra_data_instalacao))?></td>
      <td><?= $item->obra_nome?></td>
      <td><?= $item->obra_pontos?></td>
      <td><span class="<?= $item->obra_status == 1 ? 'ativo' : 'status'?>"><?= $status[$item->obra_status]?></span></td>
      <td><?= $m == '' ? '-' : $m?></td>
      <td><a href="<?= base_url('control/empresas/visualizar-obra/'.$item->obra_id)?>"><i class="fa fa-eye" aria-hidden="true"></i></a> 
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