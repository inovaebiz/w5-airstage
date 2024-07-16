<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar motivos de recusa</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">
		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>
		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Editar motivos de recusa</h1>
			<!-- section -->
			<section>
				<!-- Form -->
				<form method="POST" action="" class="form-cadastro">
					<input type="hidden" name="mr_id" value="<?=$mr->mr_id?>">
					<div class="row d-flex align-items-center">
						<div class="input-group col-md-3">
							<label class="text-left">Selecione uma categoria:</label>
                            <select id="mr_categoria_id" class="form-control" name="mr_categoria_id" required>
                            	<option value="">Selecione uma categoria</option>
                                <?php foreach ($categorias->result() as $item): ?>
                                    <option value="<?= $item->mr_categoria_id ?>" <?= ($item->mr_categoria_id == $mr->mr_categoria_id) ? 'selected' : '' ?>>
                                        <?= $item->mr_categoria_nome ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
						<div class="input-group col-md-7">
							<label class="text-left">Texto do motivo:</label>
							<input id="mr_nome" name="mr_nome" type="text" class="form-control" placeholder="Texto do motivo" autocomplete="off" value="<?=$mr->mr_nome?>"> 
						</div>
						<div class="input-group col-md-2">
							<label class="text-left">Ordem:</label>
							<input id="mr_ordem" name="mr_ordem" type="number" class="form-control" placeholder="Ordem" autocomplete="off" min="0" value="<?=$mr->mr_ordem?>"> 
						</div>
						<div class="f1-buttons col-md-3">
							<div class="onoffswitch3">
								<input id="ativar" type="checkbox" name="mr_status" class="onoffswitch3-checkbox" <?=$mr->mr_status == 1 ? "checked" : ""?>>
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
							<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Salvar</span></button>
						</div>
					</div>
				</form>
			</section><br>
			<!-- link-voltar -->
			<a href="<?= base_url('control/status/') ?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
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