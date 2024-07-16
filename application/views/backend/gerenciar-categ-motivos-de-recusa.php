<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Cadastro de categorias de motivos de recusa</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Cadastro de Categorias de Motivos de Recusa</h1>
			<section>
				<?php
                    if($u->id == 2 || $u->id == 15 || $u->id == 30 || $u->id == 34) :
                ?>
				<?php
                if (isset($_GET['msg'])) {
                    switch ($_GET['msg']) {
                        // CADASTRO
                        case 'cadastro' :
                            echo '<div class="alert alert-success text-center">Categoria cadastrada com sucesso!</div>';
                        break;
                        // EDITAR
                        case 'editar' :
                            echo '<div class="alert alert-warning text-center">Categoria editada com sucesso!</div>';
                        break;
                        // DELETE
                        case 'delete' :
                            echo '<div class="alert alert-danger text-center">Categoria excluida com sucesso!</div>';
                        break;
                    }
                }
                echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                ?>
				<!-- Form -->
				<form method="POST" action="" class="form-cadastro">
					<div class="row">
						<div class="input-group col-md-6">
							<input type="text" class="form-control" name="mr_categoria_nome" id="mr_categoria_nome" placeholder="Nome da categoria"> 
						</div>
						<div class="f1-buttons col-md-3">
							<div class="onoffswitch3">
								<input id="ativar" type="checkbox" name="mr_categoria_status" class="onoffswitch3-checkbox" checked>
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
							<button type="submit" class="btn btn-primary btn-labeled">
							<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar categoria</span></button>
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
									<th width="5%">ID</th>
									<th width="35%">CATEGORIA</th>
									<th>STATUS</th>
									<th></th>
								</tr>
							</thead>
							<tbody class="forms">
							<?php foreach($usuario->result() as $item): ?>
							<tr>
								<td>#<?= $item->mr_categoria_id ?></td>
								<td><?= $item->mr_categoria_nome ?></td>
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
									<span class="<?= $item->mr_categoria_status == 1 ? 'ativo' : 'status'?>"><?= $item->mr_categoria_status == 1 ? 'Ativo' : 'Inativo'?></span>
								</td>
								<td>
									<a href="<?= base_url() ?>control/status/editar-categoria/<?=$item->mr_categoria_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="<?= base_url() ?>control/status/excluir-categoria/<?=$item->mr_categoria_id?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php
					else :
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning text-center">Você não tem permissão para acessar essa área, por favor, entre em contato com o administrador do sistema.</div>
					</div>
				</div>
				<?php
                    endif;
                ?>
			</section>
		</main>
	</div>
</div>