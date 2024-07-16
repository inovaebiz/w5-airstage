<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de números de séries</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Cadastro de números de séries</h1>
            <!-- section -->
            <section>
                <?php
                if (isset($_GET['msg'])) {
                    switch ($_GET['msg']) {
                        // CADASTRADO
                        case 'cadastrado' :
                            echo '<div class="alert alert-success text-center">Número de série cadastrado com sucesso!</div>';
                        break;
                        // EDITAR
                        case 'editar' :
                            echo '<div class="alert alert-warning text-center">Número de série editado com sucesso!</div>';
                        break;
                        // DELETE
                        case 'delete' :
                            echo '<div class="alert alert-danger text-center">Número de série excluido com sucesso!</div>';
                        break;
                    }
                }
                echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                ?>
                <h2>Selecione o arquivo Excel de preferência em .CSV para realizar através do Upload</h2>
                <!-- Form -->
                <form class="form-cadastro" method="POST" action="<?= base_url('control/numeros-de-series/upload') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row d-flex align-items-center">
                        <div class="f1-buttons col-md-9">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="f1-buttons col-md-3">   
                            <button type="submit" class="btn btn-primary btn-labeled">
                                <span class="btn-label"><i class="fa fa-upload" aria-hidden="true"></i>Upload</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="mt-3">
                    <p>
                        <small class="text-danger"><strong>IMPORTANTE:</strong> O carregamento dos dados não pode ser uma quantidade grande por causa das regras dos campos para validação de comparação dos mesmos e se possível importar no máximo de 100 a 200 registros no arquivo.</small>
                    </p>
                    <p>
                        <small class="text-success"><a href="<?php echo base_url(); ?>modelo-upload-numeros-de-series.csv" target="_blank">Clique aqui</a>, para baixar o modelo do arquivo de acordo com os parâmetros de preenchimento dos dados.</small>
                    </p>
                </div>
                <h2>Cadastre os dados do número do equipamento e série</h2>
                <!-- Form -->
                <form class="form-cadastro" method="POST" action="">
                    <div class="row pb-3">
                        <div class="input-group col-md-3">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="issuance-date" type="text" class="form-control" name="data_emissao" placeholder="Data da emissão" required>
                        </div>
                        <div class="input-group col-md-3">
                            <select id="distribuidor_id" class="form-control" name="distribuidor_id" required>
                                <option value="">Selecione um distribuidor</option>
                                <?php foreach ($distribuidores->result() as $distribuidor): ?>
                                    <option value="<?= $distribuidor->distribuidor_id ?>"><?= $distribuidor->distribuidor_nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <input id="produto" type="text" class="form-control" name="produto" placeholder="Número do equipamento" required>
                        </div>
                        <div class="input-group col-md-3">
                            <input id="serie" type="text" class="form-control" name="serie" placeholder="Número de série" required>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="f1-buttons col-md-6">
                            <div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="is_used" class="onoffswitch3-checkbox">
                                <label class="onoffswitch3-label" for="ativar">
                                    <span class="onoffswitch3-inner">
                                        <span class="onoffswitch3-disponivel">
                                            Disponível
                                            <span class="onoffswitch3-switch">Cadastrado</span>
                                        </span>
                                        <span class="onoffswitch3-cadastrado">
                                            Cadastrado
                                            <span class="onoffswitch3-switch">Disponível</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="f1-buttons col-md-3">
                            <button type="submit" class="btn btn-primary btn-labeled">
                                <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar número de série</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Números de Séries Cadastrados</h2> 
                        <!-- Tabela -->
                        <div id="lista-padrao_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <?php $this->load->view('pagination_filter'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="lista-padrao-numeros-series" class="display table dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="15%">DATA DA EMISSÃO</th>
                                                <th width="35%">DISTRIBUIDOR</th>
                                                <th>NÚMERO DO EQUIPAMENTO</th>
                                                <th>NÚMERO DE SÉRIE</th>
                                                <th>STATUS</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="forms">
                                        <?php $this->load->view('tabela_numeros_series', ['numeros_series' => $numeros_series]); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="lista-padrao-numeros-series_info" role="status" aria-live="polite">
                                        Mostrando de <?php echo $offset + 1; ?> até <?php echo $offset + count($numeros_series); ?> de <?php echo $total_rows; ?> registros
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div id="pagination" class="dataTables_paginate paging_simple_numbers"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>