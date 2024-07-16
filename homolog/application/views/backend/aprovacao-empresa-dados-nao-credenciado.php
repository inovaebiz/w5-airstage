<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Aprovação de empresa</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">

        <!--SIDEBAR-->
        <?php include("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Aprovação de não Credenciados</h1>
            <!-- section -->
            <section>
                <?php
                if (isset($_GET['msg'])) {
                    switch ($_GET['msg']) {
                        // APROVADA
                        case 'aprovada' :
                            echo '<div class="alert alert-success text-center">Empresa aprovada com sucesso!</div>';
                        break;
                        // REPROVADA
                        case 'reprovada' :
                            echo '<div class="alert alert-danger text-center">Empresa reprovada com sucesso!</div>';
                        break;
                        // EDITADA
                        case 'edit' :
                            echo '<div class="alert alert-success text-center">Empresa editada com sucesso!</div>';
                        break;
                    }
                }
                echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabela -->
                        <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th width="60%">NOME DA EMPRESA</th>
                                    <th>DATA</th>
                                    <th>STATUS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    //verifica se tem página
                                    if (count($empresas->result()) == 0) {
                                    ?>
                                <tr>
                                    <td class="text-center" colspan="6">Nenhuma empresa cadastrada.</td>
                                </tr>
                                    <?php
                                    } else {
                                        //lista as páginas
                                        foreach ($empresas->result() as $item) {
                                    ?>
                                    <td><?= $item->cliente_razao_social ?></td>
                                    <td><?= date('d/m/Y', strtotime($item->cliente_cadastro)) ?></td>
                                    <td><span class="status">Aguardando aprovação</span> </td>
                                    <td> <a href="<?= base_url('control/empresas/visualizar_aprovacao_nao_credenciado/' . $item->cliente_id) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

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