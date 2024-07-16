<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
	<tbody>
		<tr>
			<td colspan="7">
				<h2><center>RELATÓRIO</center></h2>
			</td>
		</tr>
		<tr>
			<td>
				<b>ID</b>
			</td>
			<td>
				<b>RAZÃO SOCIAL</b>
			</td>
			<td>
				<b>NOME DA OBRA</b>
			</td>
			<td>
				<b>MARCA</b>
			</td>
			<td>
				<b>CATEGORIA</b>
			</td>
			<td>
				<b>QUANTIDADE</b>
			</td>
			<td>
				<b>PONTOS</b>
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
		<?php foreach($equip_externos->result() as $item){?>
		<tr>
			<td><?= '#'.$item->oee_id?></td>
			<td><?= $item->obra_cliente?></td>
			<td><?= $item->obra_nome?></td>
			<td>
				<?php foreach($marcas->result() as $m){
					if($m->marca_id == $item->oee_marca){
						echo $m->marca_nome;	
					}
				}
				?>
			</td>
			<td><?php foreach($marcas_categorias->result() as $m){
					if($m->mcategorias_id == $item->oee_categoria){
						echo $m->mcategoria_nome;	
					}
				}
				?>
				<?= $item->oee_categoria?></td>
			<td><?= $item->oee_qtd?></td>
			<td><?= $item->obra_pontos?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
<?php
	$arquivo = 'Relatório Equip. de Outras Marcas.xls';

	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel;charset=utf-8");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data");
?>