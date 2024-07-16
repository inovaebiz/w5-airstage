<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
		<li class="breadcrumb-item active" aria-current="page">Meus Dados</li>
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
			<a href="<?= base_url('cliente/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

			<h1>Meus Dados</h1>


			<!-- section -->
			<section class="forms">
				<form method="POST" action="" enctype="multipart/form-data">
					<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>'); ?>


					<div class="row">
						<div class="col-md-12">

							<h2>Dados da empresa</h2>
							<!-- Tabela -->
							<table id="dados-empresa" class="table table-striped table-bordered dt-responsive nowrap">
								<tbody>
									<tr>
										<td width="35%">RAZÃO SOCIAL</td>
										<td><span class="lock"><?= $cliente->cliente_razao_social ?></span></td>
										<input type="hidden" name="cliente_razao_social" value="<?= $cliente->cliente_razao_social ?>">
									</tr>
									<tr>
										<td>CNPJ</td>
										<td><span class="lock"><?= $cliente->cliente_cnpj ?></span></td>
									</tr>
									<tr>
										<td width="35%">NOME COMPLETO DO PROPRIETÁRIO</td>
										<td><span class="lock"><?= $cliente->cliente_responsavel ?></span></td>
									</tr>
									<tr>
										<td>CPF DO PROPRIETÁRIO</td>
										<td><span class="lock"><?= $cliente->cliente_cpf ?></span></td>
									</tr>
									<tr>
										<td width="35%">DATA DE NASCIMENTO DO PROPRIETÁRIO</td>
										<td><span class="lock"><?= $cliente->cliente_data_nascimento ?></span></td>
									</tr>
									<tr>
										<td>E-MAIL</td>
										<td>
											<div class="row">
												<div class="col">
													<input type="text" class="form-control form-control-interno" name="cliente_email" id="cliente_email" value="<?= $cliente->cliente_email ?>">
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>TELEFONE</td>
										<td><input type="text" id="cliente_telefone" name="cliente_telefone" value="<?= $cliente->cliente_telefone ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>CELULAR</td>
										<td><input type="text" id="cliente_celular" name="cliente_celular" value="<?= $cliente->cliente_celular ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
								</tbody>
							</table>


							<!-- Tabela -->
							<h2>Endereço da empresa</h2>
							<table id="endereco-empresa" class="table table-striped table-bordered dt-responsive nowrap">
								<tbody>
									<tr>
										<td width="35%">CEP</td>
										<td><input type="text" id="cliente_cep" name="cliente_cep" value="<?= $cliente->cliente_cep ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>ENDEREÇO</td>
										<td><input type="text" id="cliente_endereco" name="cliente_endereco" value="<?= $cliente->cliente_endereco ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>NÚMERO</td>
										<td><input type="text" id="cliente_numero" name="cliente_numero" value="<?= $cliente->cliente_numero ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>COMPLEMENTO</td>
										<td><input type="text" id="cliente_complemento" name="cliente_complemento" value="<?= $cliente->cliente_complemento ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>BAIRRO</td>
										<td><input type="text" id="cliente_bairro" name="cliente_bairro" value="<?= $cliente->cliente_bairro ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>CIDADE</td>
										<td><input type="text" id="cliente_cidade" name="cliente_cidade" value="<?= $cliente->cliente_cidade ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>ESTADO</td>
										<td><input type="text" id="cliente_estado" name="cliente_estado" value="<?= $cliente->cliente_estado ?>" maxlength="100" class="form-control form-control-interno"></td>
									</tr>
								</tbody>
							</table>

							<!-- Tabela -->
							<h2>Autenticação</h2>
							<table id="autenticacao" class="table table-striped table-bordered dt-responsive nowrap">
								<tbody>
									<tr>
										<td width="35%">NOVA SENHA</td>
										<td><input type="password" id="cliente_senha" name="cliente_senha" placeholder="Apenas se deseja alterar" class="form-control form-control-interno"></td>
									</tr>
									<tr>
										<td>REPETIR A NOVA SENHA</td>
										<td><input type="password" id="resenha" name="resenha" placeholder="Apenas se deseja alterar" class="form-control form-control-interno"></td>
									</tr>
								</tbody>
							</table>

							<!-- Filtro-->
							<div class="descricao-senha">
								<p>1. A senha deve conter ao menos 8 caracteres, números e letras, sendo uma maiúscula;</p>
								<p>2. O login será o e-mail cadastrado nos Dados da empresa.</p>
							</div>
						</div>


						<!-- BOTOES -->
						<div class="botoes-aprovacao col-md-12">
							<div class="row">
								<div class="col-md-6">
									<a href="<?= base_url('cliente/') ?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
								</div>

								<div class="col-md-6">
									<button type="submit" class="btn btn-primary btn-filtro"> Atualizar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</section>



		</main>

	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Atualizar E-mail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="code-update-email" class="col-form-label">Informe o código recebido!</label>
						<input type="text" class="form-control" id="code-update-email">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="confirmCodeUser()">Confirmar</button>
			</div>
		</div>
	</div>
</div>


<script>
	function updateEmail() {
		$.ajax({
			url: "<?= base_url('/cliente/auth/updateemail') ?>",
			type: 'GET',
			data: "<?= $cliente->cliente_email ?>",
			dataType: "json",
			success: function(dados) {
				console.log(dados);

			},
			error: function(dados) {

			}
		});
	}

	function confirmCodeUser() {

		let codeConfirm = document.getElementById('code-update-email').value;

		$.ajax({
			url: "<?= base_url('/cliente/auth/confirmemailuser') ?>",
			type: 'GET',
			data: `code=${codeConfirm}`,
			dataType: "json",
			success: function(dados) {
				if (!dados) {
					alert("Código inválido!")
				}else {
					console.log("AQUI ");
					let email = document.getElementById('cliente_email').value;
					email.disabled = false;
					$('#exampleModal').modal('hide');
					$('#cliente_email').prop("disabled", false);
					$('.cliente_email').prop("disabled", false);
				}

			},
			error: function(dados) {

			}
		});
	}
</script>