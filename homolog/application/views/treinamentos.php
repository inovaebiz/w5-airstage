<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
	<tbody>
		<tr>
			<td colspan="15">
				<h2><center>RELATÓRIO</center></h2>
			</td>
		</tr>
		<tr>
			<td>
				<b>ID</b>
			</td>
			<td>
				<b>NOME</b>
			</td>
			<td>
				<b>CLIENTE</b>
			</td>
			<td>
				<b>CIDADE</b>
			</td>
			<td>
				<b>ESTADO</b>
			</td>
			<td>
				<b>DATA</b>
			</td>
			<td>
				<b>COMPROVANTE</b>
			</td>			
			<td>
				<b>PONTOS</b>
			</td>
			<td>
				<b>TREINAMENTO STATUS</b>
			</td>
		</tr>
		<?php
			$status = array (
				'Aguardando aprovação',
				'Aprovado',
				'Reprovado'
			);
		?>
		<?php foreach($treinamento->result() as $item){?>
		<tr>
			<td><?= '#'.$item->treinamento_id?></td>
			<td><?= $item->treinamento_nome?></td>
			<td><?= $item->treinamento_cliente?></td>
			<td><?= $item->treinamento_cidade?></td>
			<td><?= $item->treinamento_estado?></td>
			<td><?= date('d/m/Y', strtotime($item->treinamento_data))?></td>
			<td><a href="<?= base_url('uploads/'.$item->treinamento_anexo_comprovante)?>"><?= base_url('uploads/'.$item->treinamento_anexo_comprovante)?></a></td>
			<td><?= $item->treinamento_pontos?></td>
			<td><?= $status[$item->treinamento_status]?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
<?php
	$arquivo = 'Relatório de Treinamentos.xls';

	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel;charset=utf-8");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data");
?>