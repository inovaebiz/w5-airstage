<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
		<li class="breadcrumb-item active"><a href="<?= base_url('cliente/obra') ?>">Registro de obras</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar sua obra</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">

		<!--SIDEBAR-->
		<?php include("includes/sidebar.php") ?>

		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

			<!-- link-voltar -->
			<a href="<?= base_url('cliente/obra/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

			<h1>Editar sua obra</h1>
			<input type="hidden" id="sc" value='<?= json_encode($cats->result_array()) ?>'>

			<?php
			if ($camp) {
			?>
			<!-- section -->
			<section>
				<div class="row">
					<!-- Form -->
					<form id="needValidation" role="form" action="" method="post" class="f1" enctype="multipart/form-data" onsubmit="return montaKit();" autocomplete="off">
						<div class="e-form-marca"> </div>
						<div class="e-form-categoria"> </div>
						<div class="e-form-qtd"> </div>
						<input type="hidden" name="obra_data" id="obra_data" value="<?php echo date("Y-m-d H:i:s"); ?>">
						<input type="hidden" id="kit-list" name="kit-list">
						<!-- Endereco-empresa -->
						<fieldset>

							<h2>INFORME OS DADOS DA OBRA</h2>

							<div class="row">
								<div class="form-group col-md">
									<label class="large-label">Nome da Obra/Cliente: *</label>
									<input type="text" name="obra_nome" placeholder="Nome da Obra/Cliente *" data-field="Nome da Obra/Cliente" class="validation form-control" value="<?= $obraedit->obra_nome ?>">
								</div>
								<div class="form-group col-md">
									<label class="large-label">Nome do Cliente: *</label>
									<input type="text" name="obra_cliente" placeholder="Nome do Cliente *" class="form-control" value="<?= $cliente->cliente_razao_social ?>" readonly="readonly">
								</div>
								<div class="form-group col-md">
									<label class="large-label">Data: dd/mm/aaaa *</label>
									<?php
										// Data retornada do banco
										$dataTime = $obraedit->obra_data_instalacao;

										// Válida a data para inserir no input type="date" YYYY-MM-DD
										$data = substr($dataTime,0,10); // 1969-12-31
									?>
									<input type="date" min="<?= $camp->campanha_data_inicial ?>" name="obra_data_instalacao" id="obra_data_instalacao" placeholder="Data da Instalação *" class="validation form-control" value="<?= $data ?>" onblur="validaData()" required>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-4">
									<label class="large-label">Nome do Distribuidor: *</label>
									<select type="text" name="obra_distribuidor" id="obra_distribuidor_data_complete" placeholder="Distribuidor *" data-field="Distribuidor" class="validation form-control">
										<option value="<?= $obraedit->obra_distribuidor ?>"><?= $obraedit->obra_distribuidor ?></option>
									</select>
								</div>
								
								<div class="form-group col-md-4">
									<label class="large-label">Nome do Instalador/Vendedor Responsável pela Obra: *</label>
									<input type="text" name="obra_nome_instalador_vendedor_responsavel" placeholder="Nome do Instalador/Vendedor Responsável pela Obra *" data-field="Nome do Instalador/Vendedor Responsável pela Obra" class="validation form-control" value="<?= $obraedit->obra_nome_instalador_vendedor_responsavel ?>" required>
								</div>

								<div class="form-group col-md-4">
									<label class="large-label">CPF do Instalador/Vendedor Responsável pela Obra:</label>
									<input type="text" name="obra_cpf_instalador_vendedor_responsavel" placeholder="CPF do Instalador/Vendedor Responsável pela Obra" class="opcional form-control" value="<?= $obraedit->obra_cpf_instalador_vendedor_responsavel ?>" onblur="validarCpfObra(this.value)" onclick="resetCpfObra()">
									<span id="cpfError" style="color: red;"></span>
									<!--
									<div class="form-group col-md-4" style="display: none;">
										<input type="tel" name="obra_projetista" placeholder="Projetista" class="form-control" value="NA">
									</div>
									-->
								</div>
							</div>

							<small class="text-danger">(*) Campos de preenchimento obrigatório</small>

							<div class="row">
								<div class="form-group col-md-6">
									<div class="box-arquivos">
										<div id="arq_obra_anexo_nota_fiscal_venda">
											<?php
												if($obraedit->obra_anexo_nota_fiscal_venda) :
											?>
											<p>
												NOTA FISCAL DO EQUIPAMENTO<span> (.JPG/.JPGE/.PDF/.PNG)</span>
											</p>
											<a class="btn btn-primary btn-sm mr-2" href="<?= base_url() ?>uploads/<?= $obraedit->obra_anexo_nota_fiscal_venda ?>" target="_blank" title="Visualizar Nota Fiscal">Visualizar Nota Fiscal</a>
											<a class="btn btn-danger btn-sm ml-2" href="#" onclick="removeArquivo('<?=$obraedit->obra_id?>', 'obra_anexo_nota_fiscal_venda', '<?= $obraedit->obra_anexo_nota_fiscal_venda ?>')" title="Excluir Nota Fiscal">Excluir Nota Fiscal</a>
											<input type="hidden" name="obra_anexo_nota_fiscal_venda" value="<?= $obraedit->obra_anexo_nota_fiscal_venda ?>">
											<?php else : ?>
											<p>
												ANEXAR NOTA FISCAL DO EQUIPAMENTO<span> (.JPG/.JPGE/.PDF/.PNG)</span>
											</p>
											<input accept=".jpg, .jpeg, .png, .pdf" id="selecao-arquivo" class="btn opcional" name="obra_anexo_nota_fiscal_venda" type="file" style="display:inline; padding-bottom: 20px!important;" onchange="validarArquivo('selecao-arquivo')">
											<?php
												endif;
											?>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<div class="box-arquivos">
										<div id="arq_obra_anexo_nota_fiscal_instalacao">
											<?php
												if($obraedit->obra_anexo_nota_fiscal_instalacao) :
											?>											
											<p class="ml-2">
												COMPROVANTE DE INSTALAÇÃO OU ORDEM DE SERVIÇO ASSINADA PELO CLIENTE<span> (.JPG/.JPGE/.PDF/.PNG)</span>
											</p>
											<a class="btn btn-primary btn-sm mr-2" href="<?= base_url() ?>uploads/<?= $obraedit->obra_anexo_nota_fiscal_instalacao ?>" target="_blank" title="Visualizar Comprovante">Visualizar Comprovante</a>
											<a class="btn btn-danger btn-sm ml-2" href="#" onclick="removeArquivo('<?=$obraedit->obra_id?>', 'obra_anexo_nota_fiscal_instalacao', '<?= $obraedit->obra_anexo_nota_fiscal_instalacao ?>')" title="Excluir Comprovante">Excluir Comprovante</a>
											<input type="hidden" name="obra_anexo_nota_fiscal_instalacao" value="<?= $obraedit->obra_anexo_nota_fiscal_instalacao ?>">
											<?php else : ?>
												<p class="text-danger">
													* ANEXAR COMPROVANTE DE INSTALAÇÃO OU ORDEM DE SERVIÇO ASSINADA PELO CLIENTE<span> (.JPG/.JPGE/.PDF/.PNG)</span>
												</p>
												<input accept=".jpg, .jpeg, .png, .pdf" id="selecao-arquivo1" class="btn validation required" name="obra_anexo_nota_fiscal_instalacao" type="file" style="display:inline" required onchange="validarArquivo('selecao-arquivo1')">
											<?php
												endif;
											?>
										</div>
									</div>
								</div>
							</div>

							<div class="container text-center">
								<p><a href="<?= base_url('/Modelo de comprovante de instalação.docx') ?>" target="_blank">Baixe aqui o modelo do COMPROVANTE DE INSTALAÇÃO/ORDEM DE SERVIÇO
									</a></p>
							</div>

							<div class="botoes-aprovacao col-md-12">
								<button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
								<button type="button" onclick="valida();" class="btn btn-next">Avançar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
							</div>

						</fieldset>

						<!-- Autenticacao -->
						<fieldset>

							<h2>Insira os equipamentos Airstage instalados</h2>

							<div class="form-cadastro mb-3">
								<div class="col-md-12">
									<p>Selecione os equipamentos que fazem parte do kit instalado. <strong>Cada kit é formado por 1 condensador e seus evaporadores.</strong></p><br>
								</div>

								<?php if($ok->result()) : ?>

									<!--Lista categoria loop-->
									<?php foreach ($ok->result() as $dataEquip) : ?>

										<div class="col-md-12 row-categoria" id="equip-<?= $dataEquip->ok_id ?>">
											<div class="row">
												<div class="input-group col-md-6">
													<select name="ok_id[]" id="selCat-<?= $dataEquip->ok_id ?>" class="form-control row-cat" onchange="cat(this)" disabled>
														<option value="">Selecione a categoria</option>
														<?php foreach ($cats->result() as $c) : ?>
															<option value="<?= $c->sc_id ?>" <?= $c->sc_id === $dataEquip->sc_id ? "selected" : "" ?>><?= $c->sc_nome ?></option>
														<?php endforeach; ?>
													</select>
													<input type="hidden" name="ok_id[]" value="<?= $dataEquip->ok_id ?>">
												</div>
												<div class="input-group col-md-6 d-flex align-items-center">
													<!--
													<button class="btn btn-danger ml-2" onclick="removeEquipamento('equip-<?= $dataEquip->ok_id ?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
													&nbsp;
													-->
												</div>
											</div>
											<div class="row">
												<div class="input-group col-md-6">
													<select name="categ[]" id="selTipo-<?= $dataEquip->ok_id ?>" class="optional form-control row-tipo item-tipo modelo" onchange="tipo(this)" disabled>
														<option value="<?= $dataEquip->tipo_id ?>"><?= $dataEquip->tipo_nome ?></option>
													</select>
													<input type="hidden" name="categ[]" value="<?= $dataEquip->tipo_id ?>">
												</div>
												<div class="input-group col-md-6">
													<input type="tel" id="validaSerieCondensadora-<?= $dataEquip->ok_id ?>" name="eSerie[]" maxlength="7" placeholder="Número de série" class="form-control row-tipo item-tipo optional" onblur="validarCondensadora(this, 'modelo')" value="<?= $dataEquip->ok_serial ?>" disabled>
													<input type="hidden" name="eSerie[]" value="<?= $dataEquip->ok_serial ?>">
												</div>
											</div>

											<?php foreach ($oke->result() as $dataEquipEvap) : ?>

												<?php if($dataEquip->ok_id == $dataEquipEvap->oe_ok_id) : ?>
												<input type="hidden" name="oe_id" value="<?= $dataEquipEvap->oe_id ?>">
												<input type="hidden" name="oe_ok_id" value="<?= $dataEquipEvap->oe_ok_id ?>">
												<div class="row">
													<div class="input-group col-md-6">
														<select name="equipamento[]" id="selEquipamento-<?= $dataEquip->ok_id ?>" class="form-control row-equip" onchange="tipo(this)" <?php echo isset($dataEquipEvap->oe_produto_serial) ? "disabled"  : "" ?>>
															<option value="<?= $dataEquipEvap->equipamento_id ?>"><?= $dataEquipEvap->equipamento_nome ?></option>
														</select>
														<input type="hidden" name="equipamento[]" value="<?= $dataEquipEvap->equipamento_id ?>">
													</div>
													<div class="input-group col-md-6">
														<input type="tel" id="validaSerieEvaporadora-<?= $dataEquip->ok_id ?>" name="nSerie[]" maxlength="7" placeholder="Número de série" class="form-control" value="<?= $dataEquipEvap->oe_produto_serial ?>" <?php echo isset($dataEquipEvap->oe_produto_serial) ? "disabled"  : "" ?> onchange="validarEvaporadora(this)">
														<input type="hidden" name="nSerie[]" value="<?= $dataEquipEvap->oe_produto_serial ?>">
													</div>
												</div>
												<?php endif; ?>

											<?php endforeach; ?>
											
										</div>

										<!--################################		############################################# -->
										<div class="input-group col-md-12">
											<button type="button" onclick="newLine(this)" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Evaporador</button>
										</div>
									
									<?php endforeach; ?>
									<!--Lista categoria loop-->
								
								<?php else : ?>

									<!--Lista categoria-->
									<div class="col-md-12 row-categoria">
										<div class="row">
											<div class="input-group col-md-6">
												<select name="ok_id[]" id="selCat" class="form-control row-cat" onchange="cat(this)" required>
													<option value="">Selecione a categoria *</option>
													<?php foreach ($cats->result() as $c) : ?>
														<option value="<?= $c->sc_id ?>"><?= $c->sc_nome ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="input-group col-md-6">
												&nbsp;
											</div>
										</div>
										<div class="row">
											<div class="input-group col-md-6">
												<select name="categ[]" id="selTipo" class="form-control row-tipo item-tipo modelo" onchange="tipo(this)" required>
													<option value="">Condensador *</option>
												</select>
											</div>
											<div class="input-group col-md-6">
												<input type="tel" id="validaSerieCondensadora" name="eSerie[]" maxlength="10" minlength="6" placeholder="Número de série *" class="form-control row-tipo item-tipo" onkeyup="validarCondensadora(this)" required>
											</div>
										</div>
										<div class="row">
											<div class="input-group col-md-6">
												<select name="equipamento[]" id="selEquipamento" class="form-control row-equip dist">
													<option value="Sem equipamento">Sem equipamento</option>
												</select>
											</div>
											<div class="input-group col-md-6">
												<input type="tel" id="validaSerieEvaporadora" name="nSerie[]" maxlength="7" placeholder="Número de série" class="form-control" onchange="validarEvaporadora(this)">
											</div>
										</div>
									</div>
									<!--Lista categoria-->

									<!--################################		############################################# -->
									<div class="input-group col-md-12">
										<button type="button" onclick="newLine(this)" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Evaporador</button>
									</div>

								<?php endif; ?>

							</div>

							<div class="alert-notification">
								<div id="message" class="alert-msg text-center"></div>
							</div>

							<div class="input-group col-md-12">
								<button type="button" class="btn btn-primary btn-filtro" onclick="newCat(this)"> <i class="fa fa-plus" aria-hidden="true"></i> Nova Equipamento</button>
							</div>

							<div class="botoes-aprovacao col-md-12">
								<button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>

								<button type="submit" class="btn btn-primary btn-filtro" id="btn-enviar-obra" disabled>Concluir <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
							</div>

						</fieldset>

					</form>

				</div>
			</section>
			<?php } ?>

			<!-- link-voltar -->
			<!-- <a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a> -->

		</main>

	</div>
</div>

<script>
	function validarCpfObra(cpf) {
		// Remover caracteres não numéricos
		cpf = cpf.replace(/\D/g, '');

		// Verificar se o CPF tem 11 dígitos
		if (cpf.length !== 11) {
			document.getElementById('cpfError').innerText = 'CPF deve ter 11 dígitos';
			return;
		}

		// Calcular o primeiro dígito verificador
		let soma = 0;
		for (let i = 0; i < 9; i++) {
			soma += parseInt(cpf.charAt(i)) * (10 - i);
		}
		let primeiroDigito = 11 - (soma % 11);
		if (primeiroDigito > 9) {
			primeiroDigito = 0;
		}

		// Calcular o segundo dígito verificador
		soma = 0;
		for (let i = 0; i < 10; i++) {
			soma += parseInt(cpf.charAt(i)) * (11 - i);
		}
		let segundoDigito = 11 - (soma % 11);
		if (segundoDigito > 9) {
			segundoDigito = 0;
		}

		// Verificar se os dígitos verificadores estão corretos
		if (parseInt(cpf.charAt(9)) !== primeiroDigito || parseInt(cpf.charAt(10)) !== segundoDigito) {
			document.getElementById('cpfError').innerText = 'CPF inválido';
		} else {
			document.getElementById('cpfError').innerText = '';
		}
	}

	function resetCpfObra() {
		document.getElementById('cpfError').innerText = '';
	}
</script>

<script>
	function cat(e) {
		var div = e;
		let id = $(div).val();
		if (id != "") {
			$.ajax({
				url: "<?= base_url('ajax/cat') ?>",
				type: 'POST',
				data: {
					"cat": id
				},
				dataType: "json",
				success: function(e) {

					///////////////
					let pai = $(div).parent().parent().parent();
					let tipo = $(pai).find('.row-tipo');
					let equip = $(pai).find('.row-equip');

					for (let i = 0; i < equip.length; i++) {
						$(equip[i]).text('');
						$(equip[i]).append($('<option>', {
							value: "",
							text: "Evaporadora"
						}));
					}

					if ($.isArray(e)) {
						for (let i = 0; i < tipo.length; i++) {
							$(tipo[i]).text('');
							$(tipo[i]).append($('<option>', {
								value: "",
								text: "Condensadora"
							}));
							for (let j = 0; j < e.length; j++) {
								$(tipo[i]).append($('<option>', {
									value: e[j].tipo_id,
									text: e[j].tipo_nome
								}));
							}
						}
					}
				},
				error: function(e) {
					$(div).val('');
				}
			});
		} else {
			let pai = $(div).parent().parent().parent();
			let tipo = $(pai).find('.row-tipo');

			for (let j = 0; j < tipo.length; j++) {
				$(tipo[j]).text('');
				$(tipo[j]).append($('<option>', {
					value: "",
					text: "Condensadora"
				}));

			}
			let equip = $(pai).find('.row-equip');
			for (let i = 0; i < equip.length; i++) {
				$(equip[i]).text('');
				$(equip[i]).append($('<option>', {
					value: "",
					text: "Evaporadora"
				}));
			}
		}
	}

	function newLine(e) {
		let pai = $(e).parent();
		var anterior = $(pai).prev();
		let id = $(anterior).find('.row-tipo').val();
		if (id != "") {
			$.ajax({
				url: "<?= base_url('ajax/tipo') ?>",
				type: 'POST',
				data: {
					"tipo": id
				},
				dataType: "json",
				success: function(e) {
					var div = '<div class="row">';
					div += '<div class="input-group col-md-6">';
					div += '<select name="equipamento[]" id="" class="form-control row-equip dist">';
					if ($.isArray(e)) {
						div += '<option value="">Selecione o tipo</option>';
						for (let j = 0; j < e.length; j++) {
							div += '<option value="' + e[j].equipamento_id + '">' + e[j].equipamento_nome + '</option>';
						}
					} else {
						div += '<option value="">Evaporador</option>';
					}
					div += '</select>';
					div += '</div>';

					div += '<div class="input-group col-md-5">';
					div += '<input type="tel" id="" name="nSerie[]" placeholder="Número de série" class="form-control" maxlength="7" onchange="validarEvaporadora(this)">';
					div += '</div>';

					div += '<div class="col-md-1 d-flex justify-content-center align-items-center">';
					div += '<a onclick="xLine(this)" class="icone-evap-close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';
					div += '</div>';

					div += '</div>';
					$(anterior).append(div);
				},
				error: function(e) {

					$(div).val('');
				}
			});

		} else {
			var div = '<div class="row">';
			div += '<div class="input-group col-md-6">';
			div += '<select name="equipamento[]" id="" class="form-control row-equip">';
			div += '<option value="Sem equipamento">Sem equipamento</option>';
			div += '</select>';
			div += '</div>';
			div += '<div class="input-group col-md-5">';
			div += '<input type="tel" id="" name="nSerie[]" placeholder="Número de série" class="form-control" maxlength="7" onchange="validarEvaporadora(this)">';
			div += '</div>';

			div += '<div class="col-md-1 d-flex justify-content-center align-items-center">';
			div += '<a onclick="xLine(this)" class="icone-evap-close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';
			div += '</div>';

			div += '</div>';
			$(anterior).append(div);
		}
	}

	let codEquipamento;

	function tipo(e) {
		var div = e;
		let id = $(div).val();
		codEquipamento = $(div).text();

		if (id != "") {
			$.ajax({
				url: "<?= base_url('ajax/tipo') ?>",
				type: 'POST',
				data: {
					"tipo": id
				},
				dataType: "json",
				success: function(e) {

					///////////////
					let pai = $(div).parent().parent().parent();
					let tipo = $(pai).find('.row-equip');
					if ($.isArray(e)) {
						for (let i = 0; i < tipo.length; i++) {
							$(tipo[i]).text('');
							$(tipo[i]).append($('<option>', {
								value: "Sem equipamento",
								text: "Sem equipamento"
							}));
							for (let j = 0; j < e.length; j++) {
								$(tipo[i]).append($('<option>', {
									value: e[j].equipamento_id,
									text: e[j].equipamento_nome
								}));
							}
						}
					}
				},
				error: function(e) {
					$(div).val('');
				}
			});
		}
	}

	function xLine(e) {
		$(e).parent().parent().remove();

	}
	/////////////////////////////	categoria	///////////////////////////////////////////////////
	let contEqui = 1;

	function newCat(e) {

		// $("#btn-enviar-obra").prop("disabled", true);
		
		let pai = $(e).parent();
		var anterior = $(pai).prev();
		//$(anterior).after('<br>');
		var sc = JSON.parse($('#sc').val());

		var div = '<div class="form-cadastro mb-3">';
		div += '<div class="col-md-12 row-categoria">';
		div += '<div class="row">';

		div += '<div class="input-group col-md-6">';
		div += '<select name="ok_id[]" id="" class="form-control row-cat" onchange="cat(this)">';
		div += '<option value="">Categoria</option>';
		for (let i = 0; i < sc.length; i++) {
			div += '<option value="' + sc[i].sc_id + '">' + sc[i].sc_nome + '</option>';
		}
		div += '</select>';
		div += '</div>';
		
		div += '<div class="input-group col-md-6 d-flex align-items-center">';
		div += '<button type="button" onclick="xCat(this)" class="btn btn-danger ml-2"> <i class="fa fa-trash" aria-hidden="true"></i></button>';
		div += '</div>';

		div += '</div>';

		div += '<div class="row">';
		div += '<div class="input-group col-md-6">';
		div += `<select name="categ[]" id="" class="form-control row-tipo modelo${contEqui}" onchange="tipo(this)">`;
		div += '<option value="">Condensador</option>';
		div += '</select>';
		div += '</div>';

		div += '<div class="input-group col-md-6">';
		div += `<input type="tel" id="" name="eSerie[]" placeholder="Número de série" class="form-control" maxlength="7" onblur="validarCondensadora(this, 'modelo${contEqui}')" required>`;
		div += '</div>';
		div += '</div>';

		div += '<div class="row">';

		div += '<div class="input-group col-md-6">';
		div += '<select name="equipamento[]" id="" class="form-control row-equip">';
		div += '<option value="">Equipamento</option>';
		div += '</select>';
		div += '</div>';
		div += '<div class="input-group col-md-6">';
		div += '<input type="tel" id="" name="nSerie[]" placeholder="Número de série" class="form-control" maxlength="7"';
		div += '</div>';
		div += '</div>';
		div += '</div>';
		div += '</div>';

		div += '<div class="input-group col-md-12">';
		div += '<button type="button" onclick="newLine(this)" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Evaporador</button>';
		div += '</div>';

		$(anterior).before(div);
		contEqui++

	}

	function xCat(e) {
		$(e).parent().parent().parent().parent().remove();
	}
</script>
<!--
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
$(document).ready(function() {

    // Carregar os selects iniciais
    cat($('#selCat .row-cat'));
    tipo($('#selTipo .row-tipo'));
	
	// $('select').trigger('change');
	$('option:selected').trigger('change');
	
});
</script>
-->
<script>
	function consultaCEP(CEP) {
		var er = new RegExp(/^[0-9]{5}\-?[0-9]{3}$/);
		if (er.test(CEP) != '') {
			$(".search-cep").hide();
			$(".search-load img").show();
			$.ajax({
				url: "<?= base_url('ajax/cep') ?>",
				type: 'GET',
				data: "tpA=buscaCEP&cep=" + escape(CEP),
				dataType: "json",
				success: function(dados) {

					if (dados.status == 1) {
						$("#endereco").val(dados.dados.logradouro);
						$("#bairro").val(dados.dados.bairro);
						$("#cidade").val(dados.dados.cidade);
						$("#estado").val(dados.dados.uf);
						$(".search-load img").hide();
						$(".search-cep").show();

					} else {
						$("#endereco").val('');
						$("#bairro").val('');
						$("#cidade").val('');
						$("#estado").val('');
						alert(dados.msgErro);
					}
				},
				error: function(dados) {

					$('#endereco').attr('readonly', false);
					$("#bairro").attr('readonly', false);
					$("#cidade").attr('readonly', false);
					$("#estado").attr('readonly', false);
				}
			});
		} else {
			alert('O campo CEP não pode ficar fazio!');
		}
	}

	function add_E() {
		var marca = $("#e-marca :selected").text();
		var categ = $("#e-categ :selected").text();

		var marca_id = $("#e-marca").val();
		var categ_id = $("#e-categ").val();
		var qtd = $("#e-qtd").val();
		if (marca != "" && categ != "" && qtd != "") {
			var table = $("#lista-padrao").DataTable();
			let ceil = table.row.add([categ, qtd, '<a href="#" onclick="remove_E(this)"><i class="fa fa-times-circle" aria-hidden="true"></i></a>']).draw().node();
			$(ceil).find('td').eq(1).addClass('qtd-E');

			$(".e-form-marca").append('<input type="hidden" name="oee_marca[]" value="' + marca_id + '">');
			$(".e-form-categoria").append('<input type="hidden" name="oee_categoria[]" value="' + categ_id + '">');
			$(".e-form-qtd").append('<input type="hidden" name="oee_qtd[]" value="' + qtd + '">');

			calcula();
		} else {
			alert("Faltando argumentos.");
		}
	}

	function calcula() {
		//var table = $("#lista-padrao").DataTable();
		//let lines = table.data().count();
		let qqtd = 0;
		let lines = $("#lista-padrao").find(".qtd-E");
		if (lines.length > 0) {
			for (let y = 0; y < lines.length; y++) {
				qqtd += parseInt(lines[y].innerHTML);
			}
		}
		let valor_pontos = <?= $site->pontos ?>;
		let pontos = qqtd * valor_pontos;
		$(".total").text(pontos + " PONTOS");
	}

	function remove_E(e) {
		var table = $("#lista-padrao").DataTable();
		var index = table.row($(e).parents('tr')).index();
		var row = table.row($(e).parents('tr')).remove().draw();

		$(".e-form-marca").find("input").eq(index).remove();
		$(".e-form-categoria").find("input").eq(index).remove();
		$(".e-form-qtd").find("input").eq(index).remove();
		calcula();
	}

	function montaKit() {
		let kit = $('.row-cat');
		let cola = "";
		let qtd = 0;

		for (let i = 0; i < kit.length; i++) {

			qtd = $(kit[i]).parent().parent().parent().find(".row-equip").length;
			if (i == 0) {
				cola += " " + qtd;
			} else {
				cola += ", " + qtd;
			}
		}

		$('#kit-list').val(cola);

		return true;
	}

	function removeEquipamento(id) {
		$(`#${id}`).remove();

		$.ajax({
			url: "<?= base_url('/cliente/obra/deletarequipamentokit/' . $this->uri->segment(4) . '/' . @$dataEquip->ok_id) ?>",
			type: 'GET',
			dataType: "json",

			success: function(dados) {

				alert("Removido Equipamento")

			},
			error: function(dados) {

			}
		});
	}

	function removeArquivo(obra_id, obra_arq, nome_arq) {
		
		const id_arq = $("#arq_" + obra_arq);
		
		if (confirm("Tem certeza que deseja excluir este arquivo?")) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('/cliente/obra/deletararquivo/');?>" + obra_id + "/" + obra_arq + "/" + nome_arq,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        
                        alert("Arquivo excluído com sucesso!");

                        // Atualizar a página ou fazer outras ações necessárias
        				for (child of id_arq.children()) {
							child.remove();
						}
                    	
                    	// Renderiza área de upload de arquivos
                    	appendUpObra(obra_arq);

                    } else {

                        alert("Erro ao excluir o arquivo.");

                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Erro ao processar a solicitação.");
                }
            });
        }
    }

    function appendUpObra(obra_arq) {

    	const arq_obra = $("#arq_" + obra_arq);
    	const id_arq = $(arq_obra).attr("id");
    	
    	if(id_arq == 'arq_obra_anexo_nota_fiscal_venda') {

			const div_obra_nota_fiscal =
			`<p>
				ANEXAR NOTA FISCAL DO EQUIPAMENTO<span> (.JPG/.JPGE/.PDF/.PNG)</span>
			</p>
			<input accept=".jpg, .jpeg, .png, .pdf" id="selecao-arquivo" class="btn opcional" name="obra_anexo_nota_fiscal_venda" type="file" style="display:inline; padding-bottom: 20px!important;" onchange="validarArquivo('selecao-arquivo')">`;

			arq_obra.append(div_obra_nota_fiscal);

		} else if (id_arq == 'arq_obra_anexo_nota_fiscal_instalacao') {

			const div_obra_comprovante =
			`<p class="text-danger">
				* ANEXAR COMPROVANTE DE INSTALAÇÃO OU ORDEM DE SERVIÇO ASSINADA PELO CLIENTE<span> (.JPG/.JPGE/.PDF/.PNG)</span>
			</p>
			<input accept=".jpg, .jpeg, .png, .pdf" id="selecao-arquivo1" class="btn validation required" name="obra_anexo_nota_fiscal_instalacao" type="file" style="display:inline" required onchange="validarArquivo('selecao-arquivo1')">`;

			arq_obra.append(div_obra_comprovante);

		}

	}
</script>
<script>
	function valida() {

		$("#btn-enviar-obra").prop("disabled", true);

		var $msg = 'Verifique os seguintes campos:\n';
		var $field;
		var erros = 0;

		$("#needValidation .validation").each(function() {

			$("#btn-enviar-obra").prop("disabled", false);

			erros = 0;

			if ($(this).val() == "" && $(this).attr('id') !== 'selecao-arquivo' && $(this).attr('id') !== 'selecao-arquivo1') {
				$field = $(this).attr('data-field');
				// $msg += "\n• " + $field;
				erros++;
			}
		});

		if (erros > 0) {
			alert($msg);
		}

		return;

	}

	function validarArquivo(id) {
		let arquivoInput = document.getElementById(id);
		let arquivo = arquivoInput.files[0];

		// Verificar se um arquivo foi selecionado
		if (arquivo) {
			// Verificar o tamanho do arquivo (em bytes)
			var tamanhoMaximo = 25 * 1024 * 1024; // 25 MB
			if (arquivo.size > tamanhoMaximo) {
				arquivoInput.value = "";
				alert("O arquivo excede o tamanho máximo permitido de 25 MB.");
				return;
			}

			// Verificar o formato do arquivo
			var formatoPermitido = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
			if (!formatoPermitido.includes(arquivo.type)) {
				arquivoInput.value = "";
				alert(
					"Formato de arquivo não suportado. Por favor, selecione um arquivo nos formatos JPG, JPEG, PNG ou PDF."
				);
				return;
			}

		} else {
			// Caso nenhum arquivo tenha sido selecionado
			alert("Nenhum arquivo selecionado.");
		}
	}

	function validaData() {
		let b = "<?= $camp->campanha_data_inicial ?>";
		let a = document.querySelector("#obra_data_instalacao").value;

		// Extrai o ano, mês e dia de cada data
		const [anoA, mesA, diaA] = a.split("-").map(Number);
		const [anoB, mesB, diaB] = b.split("-").map(Number);

		// Compara os anos
		if (anoA > anoB) {
			return 1; // 'a' é maior que 'b'
		} else if (anoA < anoB) {
			$("#obra_data_instalacao").val("")
			alert("Data inválida")
		}

		// Se os anos forem iguais, compara os meses
		if (mesA > mesB) {
			return 1; // 'a' é maior que 'b'
		} else if (mesA < mesB) {
			$("#obra_data_instalacao").val("")
			alert("Data inválida")
		}

		// Se os meses forem iguais, compara os dias
		if (diaA > diaB) {
			return 1; // 'a' é maior que 'b'
		} else if (diaA < diaB) {
			$("#obra_data_instalacao").val("")
			alert("Data inválida")
		}

		// As datas são iguais
		return 0;
	}
</script>

<script>
	const distribuidores = [
		'AAC', 'ADIAS', 'ARMAZENS GERAIS TRIANON', 'BAUER AR CONDICIONADO E REFRIGERACAO', 'BEM ESTAR & JFS REFRIGERACAO',
		'BHP', 'CENTRAL AR', 'CLIMARIO', 'DUZZI - TOTALINE', 'ELETROFRIG', 'FRIGELAR', 'FRIOPEÇAS', 'FUJITSU GENERAL DO BRASIL', 'INSTITUTO BRASILEIRO DE ENSAIOS DE CONFO', 'JABIL INDUSTRIAL DO BRASIL', 'JOSE HENRIQUE VEDOVELLI', 'LEVEROS', 'ODENIR KAZUO CONNO', 'POLO FRIO', 'POLOAR - STR', 'POLOFRIO', 'UL TESTTECH LABORATORIOS DE AVALIACAO DA'
	];

	for (distribuidor of distribuidores) {
		var html = '<option>' + distribuidor + '</option>';
		document.getElementById('obra_distribuidor_data_complete').innerHTML += html;
	}

	let data = {
		msg_alert_condensadora: "<div class='alert alert-danger'>Número de série invalido ou já computado em outra obra.</div>",
		msg_alert_condensadora_in_used: "<div class='alert alert-danger'>Número de séria já cadastrado em outra obra.</div>",
		msg_alert_evaporadora: "<div class='alert alert-danger'>Número de série invalido e já computado em obra acima.</div>",
		msg_alert_sucesso: "<div class='alert alert-success'>Número de série valido.</div>",
	};

	let alert_condensadora = data.msg_alert_condensadora;
	let alert_condensadora_in_used = data.msg_alert_condensadora_in_used;
	let alert_evaporadora = data.msg_alert_evaporadora;
	let alert_sucesso = data.msg_alert_sucesso;

	function validarEvaporadora(e) {
		
		let dataSearch = $(e).val();

		console.log(dataSearch);

		if (dataSearch.length >= 7) {

			let dist = $(".dist option:selected").text();

			$.ajax({
				url: "<?= base_url('/cliente/obra/getobraequipamentos') ?>",
				type: 'POST',
				data: {
					"dist": dist.split(' ')[0].trim(),
					"serie": dataSearch
				},
				dataType: "json",

				success: function(dados) {

					if (dados.length == 1) {
				
						$(e).val('');
						document.getElementById('message').innerHTML = alert_evaporadora;
						$('#message').slideDown('slow');
						setTimeout(function() {
							$('#message .alert').fadeOut('hide');
						}, 3000);
					
					} else {

						document.getElementById('message').innerHTML = alert_sucesso;
						setTimeout(function() {
							$('#message .alert').fadeOut('hide');
						}, 3000);
						$("#btn-enviar-obra").prop("disabled", false);
					
					}

				},
				error: function(dados) {

				}
			});

		}

	}

	function validarCondensadora(e, clas) {

		// $("#btn-enviar-obra").prop("disabled", true);

		let dataSearch = $(e).val();

		if (dataSearch.length >= 7) {

			let modelo = $(".modelo option:selected").text();

			if (clas) {
				modelo = $(`.${clas} option:selected`).text();
			}

			// $("#btn-enviar-obra").prop("disabled", false);
			$.ajax({
				url: "<?= base_url('/cliente/obra/getcondensadores') ?>",
				type: 'POST',
				data: {
					"modelo": modelo.split(' ')[0].trim(),
					"serie": dataSearch
				},
				dataType: "json",

				success: function(dados) {

					if (dados.length == 0) {
				
						$(e).val('');
						document.getElementById('message').innerHTML = alert_condensadora;
						$('#message').slideDown('slow');
						setTimeout(function() {
							$('#message .alert').fadeOut('hide');
						}, 3000);
					
					} else {

						document.getElementById('message').innerHTML = alert_sucesso;
						setTimeout(function() {
							$('#message .alert').fadeOut('hide');
						}, 3000);
						$("#btn-enviar-obra").prop("disabled", false);
					
					}

				},
				error: function(dados) {

				}
			});

		} else {

			$("#btn-enviar-obra").prop("disabled", true);

		}

	}

	function validarEmissao(array) {

		let dataLimite = new Date("01/31/2022");

		for (var i = 0; i < array.length; i++) {
			var dataEmissao = new Date(array[i].emissão);
			if (dataEmissao >= dataLimite) {
				return true;
			}
		}
		return false;
	}

	function validanotafiscal(e) {

		let dataSearch = $(e).val();
		let distribuiidor = document.getElementById('obra_distribuidor_data_complete').value;

		$.ajax({
			url: "<?= base_url('/cliente/obra/getnotafiscal') ?>",
			type: 'POST',
			data: {
				"dist": distribuiidor,
				"nota_fiscal": dataSearch
			},
			dataType: "json",

			success: function(dados) {

				let isSuccess = false;

				for (let data of dados) {
					if (data.length > 0) {
						isSuccess = true;
					}
				}

				if (!isSuccess) {
					$(e).val('');
					document.getElementById('alert-notafiscal').style.display = 'block';
					setTimeout(function() {
						document.getElementById('alert-notafiscal').style.display = 'none';
					}, 3000);
				} else {
					document.getElementById('alert-notafiscal').style.display = 'none';
				}

			},
			error: function(dados) {

			}
		});

	}
</script>
<!--
<script src="<?php echo base_url(); ?>assets-control/estados.js"></script>
<script src="<?php echo base_url(); ?>assets-control/cidades.js"></script>
<script>
	if (estados && cidades) {

		function carregarEstados() {
			let estadoSelect = document.getElementById("estado");

			// Preencher a lista de estados
			for (let i = 0; i < estados.length; i++) {
				let estadoOption = document.createElement("option");
				estadoOption.value = estados[i].Nome;
				estadoOption.innerHTML = estados[i].Nome;
				estadoSelect.appendChild(estadoOption);
			}

			carregarCidades()
		}

		function carregarCidades() {

			let estadoSelect = document.getElementById("estado");
			let cidadeSelect = document.getElementById("cidade");

			// Limpar lista de cidades
			cidadeSelect.innerHTML = "";

			// Obter o valor selecionado do estado
			let estadoId = estadoSelect.value;


			// Verificar se um estado foi selecionado
			if (estadoId !== "") {

				let estadoFiltrado = estados.filter(function(estado) {
					return estado.Nome === estadoId;
				});

				if (estadoFiltrado[0]) {

					// Filtrar as cidades pelo estado selecionado
					let cidadesFiltradas = cidades.filter(function(cidade) {
						return cidade.Estado === estadoFiltrado[0].ID;
					});

					// Preencher a lista de cidades
					for (let i = 0; i < cidadesFiltradas.length; i++) {
						let cidadeOption = document.createElement("option");
						cidadeOption.value = cidadesFiltradas[i].Nome;
						cidadeOption.innerHTML = cidadesFiltradas[i].Nome;
						cidadeSelect.appendChild(cidadeOption);
					}
				}

			} else {
				// Caso nenhum estado seja selecionado, exibir mensagem padrão
				let cidadeOption = document.createElement("option");
				cidadeOption.value = "";
				cidadeOption.innerHTML = "Selecione um estado primeiro";
				cidadeSelect.appendChild(cidadeOption);
			}
		}

		// Carregar os estados ao carregar a página
		carregarEstados();
	}
</script>
-->