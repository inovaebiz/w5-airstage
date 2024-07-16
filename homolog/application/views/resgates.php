<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
	<tbody>
		<tr>
			<td colspan="4">
				<h2>
					<center>RELATÓRIO</center>
				</h2>
			</td>
		</tr>
		<tr>
			<td>
				<b>CNPJ</b>
			</td>
			<td>
				<b>RAZÃO SOCIAL</b>
			</td>
			<td>
				<b>PONTOS</b>
			</td>
			<td>
				<b>DATA</b>
			</td>
			<td>
				<b>PRÊMIO</b>
			</td>
		</tr>
		<?php foreach ($resgate->result() as $item) { ?>
			<tr>
				<td><?= $item->cliente_cnpj ?></td>
				<td><?= $item->cliente_razao_social ?></td>
				<td><?= $item->resgate_pontos ? $item->resgate_pontos : "Informação não disponível" ?></td>
				<td><?= $item->ru_data ?></td>
				<td><?= $item->resgate_valor_premio ?  $item->resgate_valor_premio : "Informação não disponível" ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php
	$arquivo = 'Relatorio - Resgates Clientes.xls';

	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel;charset=utf-8");
	header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	header("Content-Description: PHP Generated Data");
?>