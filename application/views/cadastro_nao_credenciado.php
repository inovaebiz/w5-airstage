<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
	<tbody>
		<tr>
			<td colspan="19">
				<h2><center>RELATÓRIO NÃO CREDENCIADOS</center></h2>
			</td>
		</tr>
		<tr>
			<td>
				<b>ID</b>
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
				<b>REGASTES</b>
			</td>
		</tr>
		<?php
			$status = array (
				'Pendente',
				'Ativo',
				'Inativo',
				'Reprovado'
			);
		?>
		<?php foreach($usuarios->result() as $item){?>
		<tr>
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
			<td><?= $item->cliente_complemento?></td>
			<td><?= $item->cliente_bairro?></td>
			<td><?= $item->cliente_cidade?></td>
			<td><?= $item->cliente_estado?></td>
			<td><?= date('d/m/Y', strtotime($item->cliente_cadastro))?></td>
			<td><?= $item->obras?></td>
			<td><?= $item->saldo?></td>
			<td><?php if(isset($item->pontos)) : echo $item->pontos; endif;?></td>
			<td><?= $item->resgates?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
<?php
	$arquivo = 'Relatorio - Clientes Cadastrados Não Credenciados.xls';

	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel;charset=utf-8");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data");
?>