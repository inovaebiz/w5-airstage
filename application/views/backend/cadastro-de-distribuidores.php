<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de distribuidores</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Cadastro de distribuidores Airstage</h1>
            <!-- section -->
            <section>
                <?php
                if (isset($_GET['msg'])) {
                    switch ($_GET['msg']) {
                        // CADASTRO
                        case 'cadastro' :
                            echo '<div class="alert alert-success text-center">Distribuidor cadastrado com sucesso!</div>';
                        break;
                        // EDITAR
                        case 'editar' :
                            echo '<div class="alert alert-warning text-center">Distribuidor editado com sucesso!</div>';
                        break;
                        // DELETE
                        case 'delete' :
                            echo '<div class="alert alert-danger text-center">Distribuidor excluido com sucesso!</div>';
                        break;
                    }
                }
                echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>');
                ?>
                <!-- Form -->
                <form class="form-cadastro" method="POST" action="">
                    <div class="row d-flex align-items-center">
                        <div class="input-group col-md-6">
                            <input id="distribuidor_nome" type="text" class="form-control" name="distribuidor_nome" placeholder="Nome do distribuidor">
                        </div>
                        <div class="f1-buttons col-md-3">
                            <div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="distribuidor_status" class="onoffswitch3-checkbox" checked>
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
                        <div class="f1-buttons col-md-3">
                            <button type="submit" class="btn btn-primary btn-labeled">
                            <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar distribuidor</span></button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Distribuidores Cadastrados</h2> 
                        <!-- Tabela -->
                        <table id="lista-padrao" class="display table dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="40%">NOME</th>
                                    <th>STATUS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="forms">
                            <?php
                                
                                // Verifica se tem distribuidor
                                if (count($distribuidores->result()) == 0) :
                            ?>
                                <tr>
                                    <td class="text-center" colspan="6">Nenhum distribuidor para mostrar.</td>
                                </tr>
                            <?php
                                
                                else :
                                
                                // Lista os distribuidores
                                foreach($distribuidores->result() as $item) : ?>
                                <tr>
                                    <td>#<?= $item->distribuidor_id ?></td>
                                    <td><?= $item->distribuidor_nome ?></td>
                                    <td class="text-center">
                                        <span class="<?= $item->distribuidor_status == 1 ? 'ativo' : 'status'?>">
                                            <?= $item->distribuidor_status == 1 ? 'Ativo' : 'Inativo'?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url() ?>control/distribuidores/editar-distribuidor/<?=$item->distribuidor_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="<?= base_url() ?>control/distribuidores/excluir-distribuidor/<?=$item->distribuidor_id?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                                endforeach;

                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>