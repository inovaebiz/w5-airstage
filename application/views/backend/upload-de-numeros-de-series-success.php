<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Upload de números de séries</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Upload de números de séries Airstage</h1>
            <!-- section -->
            <section>
                <h2>Upload de Números de Série</h2>

                <?php if (isset($message)): ?>
                <div class="alert alert-success text-center">
                    <?php echo $message; ?>
                </div>
                <?php endif; ?>

                <?php 
                // Função para remover duplicatas
                function unique_multidim_array($array, $key) {
                    $temp_array = array();
                    $i = 0;
                    $key_array = array();

                    foreach($array as $val) {
                        if (!in_array($val[$key], $key_array)) {
                            $key_array[$i] = $val[$key];
                            $temp_array[$i] = $val;
                        }
                        $i++;
                    }
                    return $temp_array;
                }

                // Remover duplicatas em validRows e existingRows com base na combinação dos campos
                $validRows = unique_multidim_array($validRows, 'D'); // D é o campo 'serie'
                $existingRows = unique_multidim_array($existingRows, 'D'); // D é o campo 'serie'
                ?>

                <?php if (!empty($validRows)): ?>
                <h3>Dados inseridos com sucesso</h3>
                <p>Total de dados inseridos: <?= count($validRows); ?></p>
                <table id="lista-padrao-numeros-series-novos" class="display table dt-responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">LINHA</th>
                            <th width="15%">DATA DA EMISSÃO</th>
                            <th width="35%">DISTRIBUIDOR</th>
                            <th>NÚMERO DO EQUIPAMENTO</th>
                            <th>NÚMERO DE SÉRIE</th>
                        </tr>
                    </thead>
                    <tbody class="forms">
                        <?php foreach ($validRows as $rowNumber => $row): ?>
                        <tr>
                            <td>#<?= $rowNumber + 1 ?></td>
                            <td><?= date('d/m/Y', strtotime($row['A'])) ?></td>
                            <td><?= $row['DISTRIBUIDOR'] ?></td>
                            <td><?= $row['C'] ?></td>
                            <td><?= $row['D'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>                
                <?php endif; ?>

                <?php if (!empty($existingRows)): ?>
                <h3>Dados já existentes</h3>
                <p>Total de dados já existentes: <?= count($existingRows); ?></p>
                <table id="lista-padrao-numeros-series-existentes" class="display table dt-responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">DATA DA EMISSÃO</th>
                            <th width="35%">DISTRIBUIDOR</th>
                            <th>NÚMERO DO EQUIPAMENTO</th>
                            <th>NÚMERO DE SÉRIE</th>
                        </tr>
                    </thead>
                    <tbody class="forms">
                        <?php foreach ($existingRows as $rowNumber => $row): ?>
                        <tr>
                            <td>#<?= $rowNumber + 1 ?></td>
                            <td><?= date('d/m/Y', strtotime($row['dados']['A'])) ?></td>
                            <td><?= $row['dados']['DISTRIBUIDOR'] ?></td>
                            <td><?= $row['dados']['C'] ?></td>
                            <td><?= $row['dados']['D'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

            </section><br>
            <!-- link-voltar -->
            <a href="<?= base_url('control/numeros-de-series/')?>" class="link-voltar">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
            </a>
        </main>
    </div>
</div>