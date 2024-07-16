<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('cliente/politica/') ?>">Área do cliente</a></li>
		<li class="breadcrumb-item active" aria-current="page">Aprovar de prêmio</li>
	</ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Aprovação de prêmio</h1>

			<section>

				<div class="row ">
					<div class="col-md-12">

						<div class="alert-notification pt-3">
							<div id="message" class="alert-msg text-center"></div>
						</div>

						<table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
							<thead class="thead-light">
								<tr>
									<th>ID</th>
									<th width="13%">DATA</th>
									<th>PONTOS RESGATADOS</th>
									<th>SALDO DISPONÍVEL</th>
									<th>PONTOS NECESSÁRIOS</th>
									<th>PRÊMIO</th>
									<th>CLIENTE</th>
									<th width="25%">AÇÃ0</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($resgates->result() as $r) : ?>

									<?php
									if ($r->resgate_valor_premio) { ?>
										<tr>
											<td>
												#<?= $r->ru_id ?>
											</td>
											<td>
												<?= date('d/m/Y', strtotime($r->ru_data)) ?>
											</td>
											<!--<td>R$ <= number_format($r->resgate_valor_premio, 2, ',', '.') ></td>-->
											<td>
												<?= $r->resgate_pontos ?>
											</td>
											<td>
												<?php foreach ($empresas->result() as $e) :
													if ($r->ru_cliente_id == $e->cliente_id) {
														echo $e->saldo;
													}
												endforeach; ?>
											</td>
											<td>
												<?php
												if (is_numeric($r->resgate_valor_premio)) {
													$descobre = 'int';
												} else {
													$descobre = 'sring';
												}

												if ($descobre == "sring") {
													echo $r->resgate_pontos;
												} else {
													echo "0";
												}
												?>
												<!--R$ <= $r->resgate_valor_premio >-->
											</td>
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
												<!--R$ <= $r->resgate_valor_premio >-->
											</td>
											<td>
												<a href="<?php echo base_url(); ?>control/empresas/visualizar-empresa/<?= $r->ru_cliente_id ?>" target="_blank"><?= $r->cliente_razao_social ?></a>
											</td>
											<td>
												<div>
													<select data-target="selOp_<?= $r->ru_id ?>" onchange="validarMotivo(this)">
														<option value="">Selecione</option>
														<option value="A">Aprovar</option>
														<option value="R">Reprovar</option>
													</select>
												</div>
												<div id="motivoRecusa_<?= $r->ru_id ?>" style="display: none;">
													<select id="selOpMotRec_<?= $r->ru_id ?>" class="chosen-select-reason form-control motivo-recusa" data-target="selOpMotRec_<?= $r->ru_id ?>" onchange="setMotivo(this)">
														<option value="">Motivo da reprovação</option>
														<?php
															foreach ($status->result() as $ss) :
																if($ss->mr_categoria_id == '5') :
														?>
															<option value="<?= $ss->mr_id ?>"><?= $ss->mr_nome ?></option>
														<?php
																endif;
															endforeach;
														?>
													</select>
												</div>
												<div id="aprovarPremio_<?= $r->ru_id ?>" style="display: none;">
													<a id="aprova_<?= $r->ru_id ?>" class="btn btn-success text-white" onclick="aprovarPremio(<?= $r->ru_id ?>)">Salvar</a>
												</div>
												<div id="reprovarPremio_<?= $r->ru_id ?>" style="display: none;">
													<a id="recusa_<?= $r->ru_id ?>" class="btn btn-danger text-white" href="#" onclick="reprovarPremio(<?= $r->ru_id ?>)">Recusar</a>
												</div>
											</td>
										</tr>
									<?php } ?>
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
	function validarMotivo(id) {

		let targetId = $(id).data("target").split("_").pop();
		$(`#selOpMotRec_${targetId}`).find("option").attr("selected", false);
		let acao = $(id).val();

		if (acao === "A") {

			motivoRecusa = undefined;
			$(`#aprovarPremio_${targetId}`).show();

		} else {

			$(`#aprovarPremio_${targetId}`).hide();

		}

		if (acao === "R") {

			if (!motivoRecusa) {
				alert("Informe o motivo da recusa.")
			}

			$(`#reprovarPremio_${targetId}`).show();
			$(`#motivoRecusa_${targetId}`).show();
		
		} else {
		
			$(`#reprovarPremio_${targetId}`).hide();
			$(`#motivoRecusa_${targetId}`).hide();
		
		}
	}

	let motivoRecusa;

	function setMotivo(id) {

		let targetId = $(id).data("target").split("_").pop();
		let motivoRecusa = $(id).val();
		// let a = $(`#recusa_${targetId}`);
		$(id).find("option").attr("selected", false);
		$(id).find(`option[value="${motivoRecusa}"]`).attr("selected", true);
		// a.href = `<?php echo base_url(); ?>control/resgate/reprovar/${targetId}/${motivoRecusa}/`;
		// console.log(a.href);
	}

	let data = {
		msg_alert_aprovado: "<div class='alert alert-success'>Prêmio aprovado!</div>",
		msg_alert_reprovado: "<div class='alert alert-danger'>Prêmio reprovado!</div>",
		msg_alert_error: "<div class='alert alert-danger'>Aconteceu algum erro!</div>",
	};

	let alert_aprovado = data.msg_alert_aprovado;
	let alert_reprovado = data.msg_alert_reprovado;
	let alert_error = data.msg_alert_error;
	
	function aprovarPremio(id) {

		if (confirm("Você tem certeza que deseja aprovar este resgate? \n Esta ação não pode ser desfeita!")) {
			
			$.ajax({
				url: "<?= base_url('control/resgate/aprovar') ?>",
				type: 'POST',
				data: {
					"id" : id,
					"status" : 1
				},
				dataType: "json",

				success: function(response) {
					
					if (response) {
				
						document.getElementById('message').innerHTML = alert_aprovado;
						$('#message').slideDown('slow');
						setTimeout(function() {
							$('#message .alert').fadeOut('hide');
						}, 3000);

						location.reload();
					
					}

				},
				error: function(response) {

					document.getElementById('message').innerHTML = alert_error;
					$('#message').slideDown('slow');
					setTimeout(function() {
						$('#message .alert').fadeOut('hide');
					}, 3000);

				}
			});

		}

	}

	function reprovarPremio(id) {

		let motivoRecusa = $(`#selOpMotRec_${id} option:selected`).text();

		if (confirm("Você tem certeza que deseja reprovar este resgate? \n Esta ação não pode ser desfeita!")) {
			
			$.ajax({
				url: "<?= base_url('control/resgate/reprovar') ?>",
				type: 'POST',
				data: {
					"id" : id,
					"status" : 2,
					"motivo" : motivoRecusa
				},
				dataType: "json",

				success: function(response) {
					
					if (response) {
				
						document.getElementById('message').innerHTML = alert_reprovado;
						$('#message').slideDown('slow');
						setTimeout(function() {
							$('#message .alert').fadeOut('hide');
						}, 3000);

						location.reload();
						/*
						// Limpe a tabela
            			$('#lista-padrao tbody').empty();

            			// Itere sobre os dados atualizados e adicione-os à tabela
			            $.each(response, function(index, r){
			                
			                let newRow = `
							                <tr>
												<td>${r.ru_data}</td>
												<td>${r.resgate_pontos}</td>
												<td>${r.saldo}</td>
												<td>
													${r.resgate_valor_premio}
												</td>
												<td>
													<a href="<?php echo base_url(); ?>control/empresas/visualizar-empresa/${r.ru_cliente_id}" target="_blank">${r.cliente_razao_social}</a>
												</td>
												<td>
													<div>
														<select data-target="selOp_${r.ru_id}" onchange="validarMotivo(this)">
															<option value="">Selecione</option>
															<option value="A">Aprovar</option>
															<option value="R">Reprovar</option>
														</select>
													</div>
													<div id="motivoRecusa_${r.ru_id}" style="display: none;">
														<select id="selOpMotRec_${r.ru_id}" data-target="selOpMotRec_${r.ru_id}" class="form-control motivo-recusa" onchange="setMotivo(this)">
															<option value="">Motivo da reprovação</option>
														</select>
													</div>
													<div id="aprovarPremio_${r.ru_id}" style="display: none;">
														<a id="aprova_${r.ru_id}" class="btn btn-success text-white" onclick="aprovarPremio(${r.ru_id})">Salvar</a>
													</div>
													<div id="reprovarPremio_${r.ru_id}" style="display: none;">
														<a id="recusa_${r.ru_id}" class="btn btn-danger text-white" href="#" onclick="reprovarPremio(${r.ru_id})">Recusar</a>
													</div>
												</td>
											</tr>`;
			                $('#lista-padrao tbody').append(newRow);
			            
			            });
			            */
					
					}

				},
				error: function(response) {

					document.getElementById('message').innerHTML = alert_error;
					$('#message').slideDown('slow');
					setTimeout(function() {
						$('#message .alert').fadeOut('hide');
					}, 3000);

				}
			});

		}

	}
</script>