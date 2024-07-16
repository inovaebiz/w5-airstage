<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
	<tbody>
		<tr>
			<td colspan="27">
				<h2><center>RELATÓRIO FECHAMENTO CAMPANHA</center></h2>
			</td>
		</tr>
		<?php
		$status = array (
			'Pendente',
			'Ativo',
			'Inativo',
			'Reprovado'
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
				<td colspan="24">Data Final: <?= str_replace('-', '/', $datefim) ?></td>
			</tr>
			<tr>
				<td>
					<b>ID OBRA</b>
				</td>
				<td>
					<b>DATA CADASTRO OBRA</b>
				</td>
				<td>
					<b>ID CLIENTE</b>
				</td>
				<td>
					<b>Status</b>
				</td>
				<td>
					<b>RAZÃO SOCIAL</b>
				</td>
				<td>
					<b>CNPJ</b>
				</td>
				<td>
					<b>E-MAIL</b>
				</td>
				<td>
					<b>TELEFONE</b>
				</td>
				<td>
					<b>CELULAR</b>
				</td>
				<td>
					<b>CEP</b>
				</td>
				<td>
					<b>ENDEREÇO</b>
				</td>
				<td>
					<b>NÚMERO</b>
				</td>
				<td>
					<b>CPF</b>
				</td>
				<td>
					<b>PROPRIETÁRIO</b>
				</td>
				<td>
					<b>CREDENCIADO</b>
				</td>
				<td>
					<b>NASCIMENTO</b>
				</td>
				<td>
					<b>COMPLEMENTO</b>
				</td>
				<td>
					<b>BAIRRO</b>
				</td>
				<td>
					<b>CIDADE</b>
				</td>
				<td>
					<b>ESTADO</b>
				</td>
				<td>
					<b>DATA CADASTRO</b>
				</td>
				<td>
					<b>OBRAS CADASTRADAS</b>
				</td>
				<td>
					<b>PONTOS LIBERADOS</b>
				</td>
				<td>
					<b>PONTOS RECUSADOS</b>
				</td>
				<td>
					<b>PONTOS RESGATADOS</b>
				</td>
				<td>
					<b>SALDO DE PONTOS NÃO RESGATADOS</b>
				</td>
				<td>
					<b>VALORES COM CAMPANHA DE MULTI E TETO</b>
				</td>
			</tr>
			<?php foreach($usuarios->result() as $item) { ?>
			<tr>
				<td><?= '#'.$item->obra_id?></td>
				<td><?= date('d/m/Y', strtotime($item->obra_data))?></td>
				<td><?= '#'.$item->cliente_id?></td>
				<td><?= $status[$item->cliente_status]?></td>
				<td><?= $item->cliente_razao_social?></td>
				<td><?= $item->cliente_cnpj?></td>
				<td><?= $item->cliente_email?></td>
				<td><?= $item->cliente_telefone?></td>
				<td><?= $item->cliente_celular?></td>
				<td><?= $item->cliente_cep?></td>
				<td><?= $item->cliente_endereco?></td>
				<td><?= $item->cliente_numero?></td>
				<td><?= $item->cliente_cpf?></td>
				<td><?= $item->cliente_responsavel?></td>
				<td><?= $item->cliente_credenciado == 1 ? "Sim" : "Não" ?></td>
				<td><?= $item->cliente_data_nascimento?></td>
				<td><?= $item->cliente_complemento?></td>
				<td><?= $item->cliente_bairro?></td>
				<td><?= $item->cliente_cidade?></td>
				<td><?= $item->cliente_estado?></td>
				<td><?= date('d/m/Y', strtotime($item->cliente_cadastro))?></td>
				<td><?= $item->obras?></td>
				<td><?= $item->pontosLiberados?></td>
				<td><?= $item->pontosRecusados?></td>
				<td><?= $item->resgatesUser?></td>
				<td><?= $item->saldo?></td>
				<td><?= $item->reais?></td>
			</tr>

			<?php } ?>
		<?php
		} else {
		?>
			<tr>
				<td>
					<b>ID OBRA</b>
				</td>
				<td>
					<b>DATA CADASTRO OBRA</b>
				</td>
				<td>
					<b>ID CLIENTE</b>
				</td>
				<td>
					<b>Status</b>
				</td>
				<td>
					<b>RAZÃO SOCIAL</b>
				</td>
				<td>
					<b>CNPJ</b>
				</td>
				<td>
					<b>E-MAIL</b>
				</td>
				<td>
					<b>TELEFONE</b>
				</td>
				<td>
					<b>CELULAR</b>
				</td>
				<td>
					<b>CEP</b>
				</td>
				<td>
					<b>ENDEREÇO</b>
				</td>
				<td>
					<b>NÚMERO</b>
				</td>
				<td>
					<b>CPF</b>
				</td>
				<td>
					<b>PROPRIETÁRIO</b>
				</td>
				<td>
					<b>CREDENCIADO</b>
				</td>
				<td>
					<b>NASCIMENTO</b>
				</td>
				<td>
					<b>COMPLEMENTO</b>
				</td>
				<td>
					<b>BAIRRO</b>
				</td>
				<td>
					<b>CIDADE</b>
				</td>
				<td>
					<b>ESTADO</b>
				</td>
				<td>
					<b>DATA CADASTRO</b>
				</td>
				<td>
					<b>OBRAS CADASTRADAS</b>
				</td>
				<td>
					<b>PONTOS LIBERADOS</b>
				</td>
				<td>
					<b>PONTOS RECUSADOS</b>
				</td>
				<td>
					<b>PONTOS RESGATADOS</b>
				</td>
				<td>
					<b>SALDO DE PONTOS NÃO RESGATADOS</b>
				</td>
				<td>
					<b>VALORES COM CAMPANHA DE MULTI E TETO</b>
				</td>
			</tr>
			<?php foreach($usuarios->result() as $item) {?>
			<tr>
				<td><?= '#'.$item->obra_id?></td>
				<td><?= date('d/m/Y', strtotime($item->obra_data))?></td>
				<td><?= '#'.$item->cliente_id?></td>
				<td><?= $status[$item->cliente_status]?></td>
				<td><?= $item->cliente_razao_social?></td>
				<td><?= $item->cliente_cnpj?></td>
				<td><?= $item->cliente_email?></td>
				<td><?= $item->cliente_telefone?></td>
				<td><?= $item->cliente_celular?></td>
				<td><?= $item->cliente_cep?></td>
				<td><?= $item->cliente_endereco?></td>
				<td><?= $item->cliente_numero?></td>
				<td><?= $item->cliente_cpf?></td>
				<td><?= $item->cliente_responsavel?></td>
				<td><?= $item->cliente_credenciado == 1 ? "Sim" : "Não" ?></td>
				<td><?= $item->cliente_data_nascimento?></td>
				<td><?= $item->cliente_complemento?></td>
				<td><?= $item->cliente_bairro?></td>
				<td><?= $item->cliente_cidade?></td>
				<td><?= $item->cliente_estado?></td>
				<td><?= date('d/m/Y', strtotime($item->cliente_cadastro))?></td>
				<td><?= $item->obras?></td>
				<td><?= $item->pontosLiberados?></td>
				<td><?= $item->pontosRecusados?></td>
				<td><?= $item->resgatesUser?></td>
				<td><?= $item->saldo?></td>
				<td><?= $item->reais?></td>
			</tr>

			<?php } ?>
		<?php
		}
		?>
	</tbody>
</table>
<?php
	$arquivo = 'Relatorio - Fechamento Campanha.xls';

	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel;charset=utf-8");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data");
?>