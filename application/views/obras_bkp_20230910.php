<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
	<tbody>
		<tr>
			<td colspan="14">
				<h2>
					<center>RELATÓRIO</center>
				</h2>
			</td>
		</tr>
		<?php
		$status = array(
			'Aprovado',
			'Reprovado',
			'Aguardando Aprovação'
		);

		$dateinicio = str_replace('/', '-', $_GET["s"]);
		$newdatainicio = date("Ymd", strtotime($dateinicio));

		$datefim = str_replace('/', '-', $_GET["e"]);
		$newdatefim = date("Ymd", strtotime($datefim));
		$ativadata = false;
		if ($datefim || $dateinicio) {
			$ativadata = true;
		}
		if ($ativadata) {
		?>
			<tr>
				<td colspan="3">Data Inicio: <?= str_replace('-', '/', $dateinicio) ?></td>
				<td colspan="3">Data Final: <?= str_replace('-', '/', $datefim) ?></td>
			</tr>
			<tr>
				<td>
					<b>ID OBRA</b>
				</td>
				<td>
					<b>STATUS</b>
				</td>
				<td>
					<b>MOTIVO</b>
				</td>
				<td>
					<b>NOME DO CLIENTE</b>
				</td>
				<td>
					<b>NOME DA OBRA</b>
				</td>
				<!--
			<td>
				<b>CEP</b>
			</td>
			<td>
				<b>ENDEREÇO</b>
			</td>
			-->
				<td>
					<b>CIDADE</b>
				</td>
				<td>
					<b>ESTADO</b>
				</td>
				<td>
					<b>APLICAÇÃO</b>
				</td>
				<td>
					<b>DATA DA INSTALAÇÃO</b>
				</td>
				<!--<td>
				<b>NOTA FISCAL</b>
			</td>-->
				<td>
					<b>DISTRIBUIDOR</b>
				</td>
				<td>
					<b>DATA DA NOTA FISCAL DO DISTRIBUIDOR</b>
				</td>
				<td>
					<b>CATEGORIA</b>
				</td>
				<td>
					<b>CONDENSADOR</b>
				</td>
				<td>
					<b>CONDENSADOR NÚMERO DE SÉRIE</b>
				</td>
			</tr>

			<?php
			$existe = false;
			$ativacond = false;
			$ativacond1 = false;
			foreach ($equips->result() as $item) {

				$datainsta = date('Ymd', strtotime($item->obra_data_instalacao));
				if ($datainsta >= $newdatainicio) {
					if ($datainsta <= $newdatefim) {

						foreach ($serial_c->result() as $cs2) {
							if ($cs2->ok_condensador_id == $item->tipo_id) {
								if ($cs2->ok_obra_id == $item->obra_id) {
									if ($item->oe_ok_id == $cs2->ok_id) {

										$ativacond1 = $cs2->ok_serial;
									}
								}
							}
						}
			?>
						<tr>
							<td>
								<?= '#' . $item->obra_id ?>
							</td>
							<td>
								<?php if ($existe != $item->obra_id) { ?>
									<?php
									if ($item->obra_status == 1) {
										echo 'Aprovado';
									}
									if ($item->obra_status == 2) {
										echo 'Reprovado';
									}
									if ($item->obra_status == 3) {
										echo 'Aguardando Aprovação';
									}
									?></td>
						<?php } ?>
						<td>
							<?php
							if ($item->obra_motivo == 0) {
								echo "Obra sem motivo";
							} else {
								foreach ($motivo->result() as $m) {
									if ($m->mr_id == $item->obra_motivo) {
										echo $m->mr_nome;
									}
								}
							}

							?>
						</td>

						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= $item->obra_cliente ?>
							<?php } ?>
						</td>
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= $item->obra_nome ?>
							<?php } ?>
						</td>
						<!--
			<td>
			<php if ($existe != $item->obra_id){ ?>
				<= $item->obra_cep?>
			<php }?>
			</td>-->
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= $item->obra_cidade ?>
							<?php } ?>
						</td>
						<!--<td>
			<php if ($existe != $item->obra_id){ ?>
				<= $item->obra_endereco?>
			<php }?>
			</td>-->
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= $item->obra_estado ?>
							<?php } ?>
						</td>
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= $item->obra_aplicacao ?>
							<?php } ?>
						</td>
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= date('d/m/Y', strtotime($item->obra_data_instalacao)) ?>
							<?php } ?>
						</td>
						<!--<td></td>-->
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= $item->obra_distribuidor ?>
							<?php } ?>
						</td>
						<td>
							<?php if ($existe != $item->obra_id) { ?>
								<?= date('d/m/Y', strtotime($item->obra_nota_fiscal_data_distribuidor)) ?>
							<?php } ?>
						</td>
						<td>

							<?= $item->sc_nome ?>

						</td>
						<td>

							<?= $item->tipo_nome ?></td>

						<td>

							<?php
							foreach ($serial_c->result() as $cs) {
								if ($cs->ok_condensador_id == $item->tipo_id) {
									if ($cs->ok_obra_id == $item->obra_id) {
										if ($item->oe_ok_id == $cs->ok_id) {
											echo $cs->ok_serial;

											$ativacond1 = $cs->ok_serial;
										}
									}
								}
							}
							?>
						</td>
						</tr>

			<?php
						$existe = $item->obra_id;
						if ($item->obra_id == $existe) {
							$existe = $item->obra_id;
						}


						foreach ($serial_c->result() as $cs1) {
							if ($cs1->ok_condensador_id == $item->tipo_id) {
								if ($cs1->ok_obra_id == $item->obra_id) {


									if ($item->oe_ok_id == $cs1->ok_id) {

										$ativacond = $cs1->ok_serial;
									}
								}
							}
						}
					}
				}
			}

			?>

		<?php
		} else {
		?>

			<tr>
				<td>
					<b>ID OBRA</b>
				</td>
				<td>
					<b>STATUS</b>
				</td>
				<td>
					<b>MOTIVO</b>
				</td>
				<td>
					<b>NOME DO CLIENTE</b>
				</td>
				<td>
					<b>NOME DA OBRA</b>
				</td>
				<td>
					<b>CEP</b>
				</td>
				<td>
					<b>ENDEREÇO</b>
				</td>
				<td>
					<b>APLICAÇÃO</b>
				</td>
				<td>
					<b>DATA DA INSTALAÇÃO</b>
				</td>
				<td>
					<b>DISTRIBUIDOR</b>
				</td>
				<td>
					<b>DATA DA NOTA FISCAL DO DISTRIBUIDOR</b>
				</td>
				<td>
					<b>CATEGORIA</b>
				</td>
				<td>
					<b>CONDENSADOR</b>
				</td>
				<td>
					<b>CONDENSADOR NÚMERO DE SÉRIE</b>
				</td>
			</tr>

			<?php
			$existe = false;
			$ativacond = false;
			$ativacond1 = false;
			foreach ($equips->result() as $item) {

				$datainsta = date('Ymd', strtotime($item->obra_data_instalacao));
				foreach ($serial_c->result() as $cs2) {
					if ($cs2->ok_condensador_id == $item->tipo_id) {
						if ($cs2->ok_obra_id == $item->obra_id) {
							if ($item->oe_ok_id == $cs2->ok_id) {

								$ativacond1 = $cs2->ok_serial;
							}
						}
					}
				}


			?>
				<tr>
					<td>
						<?= '#' . $item->obra_id ?>
					</td>
					<td>
						<?php if ($existe != $item->obra_id) { ?>
							<?php if ($item->obra_status == 0) {
								echo 'Aguardando Aprovação';
							} else if ($item->obra_status == 1) {
								echo 'Aprovada';
							} else {
								echo 'Reprovada';
							} ?></td>
				<?php } ?>

				<td>
					<?php
					if ($item->obra_motivo == 0) {
						echo "Obra sem motivo";
					} else {
						foreach ($motivo->result() as $m) {
							if ($m->mr_id == $item->obra_motivo) {
								echo $m->mr_nome;
							}
						}
					}

					?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= $item->obra_cliente ?>
					<?php } ?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= $item->obra_nome ?>
					<?php } ?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= $item->obra_cep ?>
					<?php } ?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= $item->obra_endereco ?>
					<?php } ?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= $item->obra_aplicacao ?>
					<?php } ?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= date('d/m/Y', strtotime($item->obra_data_instalacao)) ?>
					<?php } ?>
				</td>

				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= $item->obra_distribuidor ?>
					<?php } ?>
				</td>
				<td>
					<?php if ($existe != $item->obra_id) { ?>
						<?= date('d/m/Y', strtotime($item->obra_nota_fiscal_data_distribuidor)) ?>
					<?php } ?>
				</td>
				<td>

					<?= $item->sc_nome ?>

				</td>
				<td>

					<?= $item->tipo_nome ?></td>

				<td>

					<?php
					foreach ($serial_c->result() as $cs) {
						if ($cs->ok_condensador_id == $item->tipo_id) {
							if ($cs->ok_obra_id == $item->obra_id) {
								if ($item->oe_ok_id == $cs->ok_id) {
									echo $cs->ok_serial;

									$ativacond1 = $cs->ok_serial;
								}
							}
						}
					}
					?>

				</td>
				</tr>

			<?php
				$existe = $item->obra_id;
				if ($item->obra_id == $existe) {
					$existe = $item->obra_id;
				}


				foreach ($serial_c->result() as $cs1) {
					if ($cs1->ok_condensador_id == $item->tipo_id) {
						if ($cs1->ok_obra_id == $item->obra_id) {


							if ($item->oe_ok_id == $cs1->ok_id) {

								$ativacond = $cs1->ok_serial;
							}
						}
					}
				}
			}

			?>



		<?php
		}
		?>

	</tbody>
</table>
<?php


$arquivo = 'Relatório Obras Cadastradas.xls';

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel;charset=utf-8");
header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
header("Content-Description: PHP Generated Data");



?>