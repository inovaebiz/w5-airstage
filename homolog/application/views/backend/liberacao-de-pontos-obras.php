<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liberação de pontos</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">

        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

            <h1>Liberação de pontos de obras</h1>

            <!-- section -->
            <section>
                <div class="row">

                    <div class="col-md-12">

                        <!-- Tabela -->
                        <table id="lista-padrao" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40%">NOME DA EMPRESA</th>
                                    <th>CREDENCIADO</th>
                                    <th>OBRA</th>
                                    <th>PONTOS</th>
                                    <th>STATUS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($obra->result() as $o):?>
                                <tr>
                                    <td><?=$o->cliente_razao_social?></td>
                                    <td>
                                        <?php
                                            $credenciado = '';
                                            foreach($usuarios->result() as $user)
                                            {
                                                if($user->cliente_id == $o->obra_cliente_id)
                                                {
                                                    echo $user->cliente_credenciado  === '1' ? 'Sim' : 'Não';
                                                }
                                            }
                                        ?>                                        
                                    </td>
                                    <td><?=$o->obra_nome?></td>
                                    <td><?=$o->obra_pontos?></td>
                                    <td><span class="status">Aguardando liberação dos pontos</span> </td>
                                    <td> <a href="<?= base_url() ?>control/pontos/liberacao_obras/<?=$o->obra_id?>" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </section>

        </main>
    </div>
</div>