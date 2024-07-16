<?php if (!empty($numeros_series)): ?>
    <?php foreach ($numeros_series as $item): ?>
        <tr role="row">
            <td tabindex="0"><?= '#' . $item->id; ?></td>
            <td><?= date('d/m/Y', strtotime($item->data_emissao)) ?></td>
            <td><?= $item->nome_distribuidor; ?></td>
            <td><?= $item->produto; ?></td>
            <td><?= $item->serie; ?></td>
            <td class="text-center">
                <span class="<?= $item->is_used == 1 ? 'cadastrado' : 'disponivel'?>">
                    <?= $item->is_used == 1 ? 'CADASTRADO' : 'DISPONÍVEL'?>
                </span>
            </td>
            <td>
                <a href="<?= site_url('control/numeros-de-series/editar-numero-de-serie/' . $item->id); ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                <!--
                <a href="<?= site_url('control/numeros-de-series/excluir-numero-de-serie/' . $item->id); ?>">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
                -->
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="7">Nenhum registro encontrado</td>
    </tr>
<?php endif; ?>