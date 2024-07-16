<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
		<li class="breadcrumb-item active" aria-current="page">Registro de Obras</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Meus resgates</h1>
			<!-- section -->
			<section>
			<?php
            //lista as páginas
            foreach ($pages->result() as $item) :
                
                if($item->site_pag_id == 4) ://página meus resgates

                    if($item->status_pagina == 1) :
            ?>
				<div class="row ">
					<div class="col-md-12">
						<table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
							<thead class="thead-light">
								<tr>
									<th width="35%">DATA</th>
									<th>PONTOS NECESSARIOS</th>
									<th>PREMIO</th>
									<th>STATUS</th>
									<th>MOTIVO</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($resgates->result() as $r) : ?>
									<tr>
										<td><?= date('d/m/Y', strtotime($r->ru_data)) ?></td>
										<td><?= $r->resgate_pontos ?></td>
										<!--<td>R$ <=number_format($r->resgate_valor_premio, 2, ',', '.')></td>-->
										<td>
											<?php
											if (is_numeric($r->resgate_valor_premio)) {
												$descobre = 'int';
											} else {
												$descobre = 'sring';
											}

											if ($descobre == "sring") {
												echo $r->resgate_valor_premio;
											} else {
												echo "R$ " . number_format($r->resgate_valor_premio, 2, ',', '.');
											}
											?>
										</td>
										<td>
											<span class="<?= $r->ru_status == 0 || $r->ru_status == 3 ? "status" : "ativo" ?>">
												<?php
												switch ($r->ru_status) {
													case 0:
														echo "Processando solicitação.";
														break;
													case 1:
														echo "Solicitação deferida.";
														break;
													case 3:
														echo "Solicitação recusada.";
														break;
												}
												?>
											</span>
										</td>
										<td><?= $r->ru_status == 3 ? $r->motivos_de_recusa : ""  ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php
                    else :
            ?>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class='alert alert-warning text-center'>Campanha em andamento.</div>
                </div>
            </div>
            <?php
                    endif;

                endif;

            endforeach;

            ?>
			</section>
		</main>
	</div>
</div>