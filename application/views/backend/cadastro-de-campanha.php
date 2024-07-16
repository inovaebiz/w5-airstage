<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de campanha</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">

        <!--SIDEBAR-->
        <?php include("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

            <h1>Cadastro de campanha</h1>
            <!-- section -->
            <section>
                <?php
                if (isset($_GET['msg'])) {
                    switch ($_GET['msg']) {
                        // CADASTRADA
                        case 'cadastrada' :
                            echo '<div class="alert alert-success text-center">Campanha cadastrada com sucesso!</div>';
                        break;
                        // CAMPANHA
                        case 'campanha' :
                            echo '<div class="alert alert-warning text-center">Campanha encerrada com sucesso!</div>';
                        break;
                        // DELETE
                        case 'delete' :
                            echo '<div class="alert alert-danger text-center">Campanha excluida com sucesso!</div>';
                        break;
                    }
                }
                echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                ?>
                <!-- Form -->
                <form class="form-cadastro" method="POST" action="">
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-9">
                            <input id="campanha_nome" type="text" class="form-control" name="campanha_nome" placeholder="Nome da campanha">
                        </div>
                        <div class="input-group col-md-3">
                            <div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="campanha_status" class="onoffswitch3-checkbox" checked>
                                <label class="onoffswitch3-label" for="ativar">
                                    <span class="onoffswitch3-inner">
                                        <span class="onoffswitch3-active">
                                            Desativar
                                            <span class="onoffswitch3-switch">Ativo</span>
                                        </span>
                                        <span class="onoffswitch3-inactive">
                                            Ativar
                                            <span class="onoffswitch3-switch">Inativo</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-2">
                            <label>Período da Campanha:</label>
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="start-date-campaign" type="text" class="form-control" name="campanha_data_inicial" placeholder="De">
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="end-date-campaign" type="text" class="form-control" name="campanha_data_final" placeholder="Até">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-2">
                            <label>Período de Regaste:</label>
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="rescue-start-date-campaign" type="text" class="form-control" name="campanha_data_inicial_resgate" placeholder="De">
                        </div>
                        <div class="input-group col-md-5">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input id="rescue-end-date-campaign" type="text" class="form-control" name="campanha_data_final_resgate" placeholder="Até">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="f1-buttons col-md-3">
                            <button type="submit" class="btn btn-primary btn-labeled ">
                                <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar campanha</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabela -->
                        <h2>Campanhas cadastradas</h2>
                        <table id="lista-padrao" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th width="30%">CAMPANHA</th>
                                    <th>DATA INICIAL</th>
                                    <th>DATA FINAL</th>
                                    <th>DATA INICIAL RESGATE</th>
                                    <th>DATA FINAL RESGATE</th>
                                    <th>STATUS</th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //verifica se tem página
                                if (count($campanhas->result()) == 0) {
                                ?>
                                <tr>
                                    <td class="text-center" colspan="7">Nenhuma campanha para mostrar.</td>
                                </tr>
                                <?php
                                } else {
                                    //lista as páginas
                                    foreach ($campanhas->result() as $item) {
                                        
                                        $data = date('Y-m-d');
                                        
                                        if ((strtotime($item->campanha_data_inicial) <= strtotime($data)) && (strtotime($item->campanha_data_final) >= strtotime($data))) {
                                            $status = 'Em andamento';
                                        } else if ((strtotime($item->campanha_data_inicial) >= strtotime($data)) && (strtotime($item->campanha_data_final) >= strtotime($data))) {
                                            $status = 'Futura';
                                        } else {
                                            $status = 'Encerrada';
                                        }

                                        if((strtotime($item->campanha_data_inicial_resgate) <= strtotime($data)) && (strtotime($item->campanha_data_final_resgate) >= strtotime($data))) {
                                            $status = 'Resgate';
                                        }

                                    ?>

                                <tr>
                                    <td><?= $item->campanha_nome ?></td>
                                    <td><?= date('d/m/Y', strtotime($item->campanha_data_inicial)) ?></td>
                                    <td><?= date('d/m/Y', strtotime($item->campanha_data_final)) ?></td>
                                    <td><?= date('d/m/Y', strtotime($item->campanha_data_inicial_resgate)) ?></td>
                                    <td><?= date('d/m/Y', strtotime($item->campanha_data_final_resgate)) ?></td>
                                    <td><span class="<?= $item->campanha_status == 1 ? 'ativo' : 'status' ?>"><?= $item->campanha_status == 1 ? $status : 'Encerrada'; ?></span></td>
                                    <td>
                                        <a href="<?= base_url('control/campanha/editar-campanha/' . $item->campanha_id) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <?php if ($item->campanha_status != 0) { ?>
                                        <a href="<?= base_url('control/campanha/encerrar-campanha/' . $item->campanha_id) ?>"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                                        <?php } ?>
                                        <a href="<?= base_url('control/campanha/excluir-campanha/' . $item->campanha_id) ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>