<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
		<li class="breadcrumb-item active" aria-current="page">Política de Pontos</li>
	</ol>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Política de Pontos</h1>

			<section>
				<h2>Itens</h2>
				<div class="row">
					<div class="col-md-12">
						<!-- Tabela -->
						<table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="80%">ITEM</th>
									<th scope="col" width="20%">VALOR</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($politica->result() as $Item) : ?>
									<tr>
										<td><?= $Item->politica_nome ?></td>
										<td><?= $Item->politica_valor ?> <?= $Item->politica_valor == 1 ? "ponto" : "pontos" ?></td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
				<div class="clean">
					<hr>
				</div>
			</section>
		</main>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<img src="<?php echo base_url(); ?>assets-cliente/img/popups/popup-comunicado-obrigado-instaladores_20240423.png" alt="" class="img-fluid">
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
					Entendi
				</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(() => {
		$('#exampleModal').modal('show');
	});
</script>