<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Cadastro de motivos de recusa</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">
		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>
		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Cadastro de motivos de recusa</h1>
			<!-- section -->
			<section>
				<?php
                if (isset($_GET['msg'])) {
                    switch ($_GET['msg']) {
                        // CADASTRO
                        case 'cadastro' :
                            echo '<div class="alert alert-success text-center">Motivo cadastrado com sucesso!</div>';
                        break;
                        // EDITAR
                        case 'editar' :
                            echo '<div class="alert alert-warning text-center">Motivo editado com sucesso!</div>';
                        break;
                        // DELETE
                        case 'delete' :
                            echo '<div class="alert alert-danger text-center">Motivo excluido com sucesso!</div>';
                        break;
                    }
                }
                echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                ?>
				<!-- Form -->
				<form method="POST" action="" class="form-cadastro">
					<div class="row d-flex align-items-center">
						<div class="input-group col-md-3">
							<label class="text-left">Selecione uma categoria:</label>
                            <select id="mr_categoria_id" class="form-control" name="mr_categoria_id" required>
                                <option value="">Selecione uma categoria</option>
                                <?php foreach ($categorias->result() as $item): ?>
                                    <option value="<?= $item->mr_categoria_id ?>"><?= $item->mr_categoria_nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
						<div class="input-group col-md-7">
							<label class="text-left">Texto do motivo:</label>
							<input id="mr_nome" name="mr_nome" type="text" class="form-control" placeholder="Texto do motivo" autocomplete="off"> 
						</div>
						<div class="input-group col-md-2">
							<label class="text-left">Ordem:</label>
							<input id="mr_ordem" name="mr_ordem" type="number" class="form-control" placeholder="Ordem" autocomplete="off" min="0" value="1"> 
						</div>
						<div class="f1-buttons col-md-3">
							<div class="onoffswitch3">
								<input id="ativar" type="checkbox" name="mr_status" class="onoffswitch3-checkbox" checked>
								<label class="onoffswitch3-label" for="ativar">
									<span class="onoffswitch3-inner">
										<span class="onoffswitch3-active">
											Desativar
											<span class="onoffswitch3-switch">Ativo</span>
										</span>
										<span class="onoffswitch3-inactive">
											Ativar
											<span class="onoffswitch3-switch">Inativo</span>
										</span>
									</span>
								</label>
							</div>
						</div>
						<div class="f1-buttons col-md-3">
							<button type="submit" class="btn btn-primary btn-labeled" onclick="return confirma()">
							<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar motivo</span></button>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<h2>Motivos ativos cadastrados</h2>
						<!-- Tabela -->
						<table id="lista-padrao" class="display table dt-responsive nowrap">
							<thead class="thead-light">
								<tr>
									<th width="30%">CATEGORIA</th>
									<th width="50%">TEXTO DO MOTIVO</th>
									<th>Ordem</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($mr->result() as $mItem) : ?>
									<tr>
										<td>
											<?=$mItem->mr_categoria_nome?>
										</td>
										<td>
											<span><?=$mItem->mr_nome?></span>
										</td>
										<td>
											<?=$mItem->mr_ordem?>
										</td>
										<td>
											<span class="<?= $mItem->mr_status == 1 ? 'ativo' : 'status'?>"><?= $mItem->mr_status == 1 ? 'Ativo' : 'Inativo'?></span>
										</td>
										<td>
											<a href="<?= base_url(); ?>control/status/editar/<?=$mItem->mr_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        	<a href="<?= base_url(); ?>control/status/exclui/<?=$mItem->mr_id?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
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
<script>
function confirma(){
	let mr = $('#mr_nome').val();
	let ordem = $('#mr_ordem').val();
	let msg = "";

	if(mr == ""){
		msg += "O campo do motivo não pode ser vazio.";
		return false;
	}
	if(ordem == ""){
		msg += "O campo da ordem não pode ser vazio.";
		return false;
	}
	
	if(msg != ""){
		alert(msg);
		return false;
	}else{
		return true;
	}
}
</script>