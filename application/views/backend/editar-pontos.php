<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
		<li class="breadcrumb-item active" aria-current="page">Quantidade de pontos por Equipamento externo</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

			<h1>Cadastrar pontos</h1>

			<!-- section -->
			<section>
				<script>
					function cadastrar() {
						let pontos = $("#pontos").val();

						let m = "";
						if (pontos == "") {
							m += "Campo pontos é obrigatório! \n";
						}

						if (m != "") {
							alert(m);
							return false;
						} else {
							return true;
						}
					}
				</script>

				<?php
				if (isset($_GET['msg'])) {
					switch ($_GET['msg']) {
						case 'edit': ?>
							<br>
							<div class="alert alert-success text-center">Pontos editados com sucesso!</div>
				<?php
					}
				} ?>

				<!-- Form -->
				<form method="POST" class="form-cadastro" onsubmit="cadastrar()">
					<div class="row">
						<div class="input-group col-md-4">
							<label class="text-left">PONTOS POR TREINAMENTO</label>
							<input type="text" class="form-control" name="t_pontos" id="t_pontos" placeholder="pontos" value="<?= $site->t_pontos ?>">
						</div>

						<div class="input-group col-md-4">
							<label class="text-left">PONTOS EQUIPAMENTOS OUTRAS MARCAS</label>
							<input type="text" class="form-control" name="pontos" id="pontos" placeholder="pontos" value="<?= $site->pontos ?>">
						</div>

						<div class="f1-buttons col-md-4">
							<label>&nbsp;</label>
							<button type="submit" class="btn btn-primary btn-labeled">
								<span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i>Salvar</span></button>
						</div>
					</div>
				</form>

				<h1 class="pt-5">Bloquear Acesso</h1>

				<!-- Form -->
				<form method="POST" class="form-cadastro" onsubmit="cadastrar()">
					<div class="row">
						<div class="input-group col-md-4">
							<label class="text-left">ÁREA</label>
							<select type="text" class="form-control" id="site_pag_id" name="site_pag_id">
								<option value="1">REGISTRO DE OBRAS</option>
								<option value="2">PONTUAÇÃO</option>
								<option value="3">RESGATE DE PRÊMIOS</option>
								<option value="4">MEUS RESGATES</option>
							</select>
						</div>

						<div class="input-group col-md-4">
							<label class="text-left">STATUS</label>
							<select type="text" class="form-control" name="status_pagina" id="status_pagina">
								<option value="1">Liberado</option>
								<option value="0">Não liberado</option>
							</select>
						</div>

						<div class="f1-buttons col-md-4">
							<label>&nbsp;</label>
							<button type="submit" class="btn btn-primary btn-labeled">
								<span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i>Salvar</span></button>
						</div>
					</div>
				</form>

				<table class="display table table-striped table-bordered dt-responsive nowrap">
					<thead class="thead-light">
						<tr>

							<th>PÁGINA</th>
							<th>STATUS</th>
						</tr>
					</thead>
					<tbody>

						<?php

						//lista as páginas
						foreach ($pages->result() as $item) {
						?>
							<tr>
								<td>
									<?php
									switch ($item->site_pag_id) {
										case 1:
											echo "REGISTRO DE OBRAS";
											break;
										case 2:
											echo "PONTUAÇÃO";
											break;
										case 3:
											echo "RESGATE DE PRÊMIOS";
											break;
										case 4:
											echo "MEUS RESGATES";
											break;
									}
									?>
								</td>


								<td>
									<span class="<?= $item->status_pagina == 1 ? 'ativo' : 'inativo' ?>">
										<?= $item->status_pagina == 1 ? 'Ativo' : 'Inativo' ?>
									</span>
								</td>

							<?php

						}
							?>

					</tbody>
				</table>

			</section>


		</main>
	</div>
</div>