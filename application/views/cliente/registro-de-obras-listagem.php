<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica') ?>">Área do cliente</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registro de Obras</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">

        <!--SIDEBAR-->
        <?php include("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Registro de Obras</h1>
            <!-- section -->
            <section>
                <?php
                //lista as páginas
                foreach ($pages->result() as $item) :
                    
                    if($item->site_pag_id == 1) ://página de registro de obras

                        if($item->status_pagina == 1) :
                ?> 
                <?php
                    $data = date('Y-m-d');
                    if((isset($camp) && isset($camp->campanha_data_inicial)) && (isset($camp) && isset($camp->campanha_data_final))) {
                        if((strtotime($camp->campanha_data_inicial) <= strtotime($data)) && (strtotime($camp->campanha_data_final) >= strtotime($data))) {
                ?>
                    <!-- Form -->
                    <form class="form-cadastro">
                        <div class="row">
                            <div class="col-md-9">
                                <p><span>Cadastre suas obras</span></p>
                            </div>
                            <div class="f1-buttons col-md-3">
                                <a class="btn btn-primary btn-labeled" href="<?php echo base_url(); ?>cliente/obra/cadastrar" role="button">
                                <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar Nova obra</span></a>
                            </div>
                        </div>
                    </form>
               	<?php
                        } else {
               	?>		<div class="row mt-5">
                            <div class="col-md-12">
                                <div class='alert alert-danger text-center'>Sem campanha ativa.</div>
                            </div>
                        </div>
                <?php
                        }
                    } else {
                ?> 
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class='alert alert-danger text-center'>Sem campanha ativa.</div>
                            </div>
                        </div>
                <?php
                    }
                ?>

                <?php
                        else :
                ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class='alert alert-danger text-center'>Registro de obras não liberada.</div>
                    </div>
                </div>
                <?php
                        endif;

                    endif;

                endforeach;

                ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabela -->
                        <h2>Obras cadastradas</h2>
                        <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th width="35%">OBRA</th>
                                    <th>DATA</th>
                                    <th>PONTOS ACUMULADOS</th>
                                    <!--<th>R$</th>-->
                                    <th>STATUS</th>
                                    <th>MOTIVO</th>
                                    <th>OBS</th>
                                    <th width="7%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //verifica se tem página
                                if (count($obras->result()) == 0) {
                                ?>
                                <tr>
                                    <td class="text-center" colspan="7">Nenhuma obra para exibir.</td>
                                </tr>
                                <?php
                                } else {
                                    //lista as obras
                                    foreach ($obras->result() as $item) {
                                ?>
                                <?php
                                        $status = array(
                                            'Aguardando liberação dos pontos',
                                            'Pontos Liberados',
                                            'Recusado'
                                        );
                                        $m = '';
                                        foreach ($mot->result() as $mo) {
                                            if ($mo->mr_id == $item->obra_motivo) {
                                                $m = $mo->mr_nome;
                                            }
                                        }

                                ?>
                                <tr>
                                    <td><?= $item->obra_nome ?></td>
                                    <td><?= date('d/m/Y', strtotime($item->obra_data_instalacao)) ?></td>
                                    <td><?= $item->campanha_id == $camp->campanha_id ? $item->obra_pontos : '***'; ?></td>
                                    <!--<td><?= $item->obra_reais ? $item->obra_reais . ',00' : '0,00' ?></td>-->
                                    <td><span class="<?= $item->obra_status == 1 ? 'ativo' : 'status' ?>"><?= $status[$item->obra_status] ?></span> </td>
                                    <td><?= $m == '' ? '-' : $m ?></td>
                                    <td><?= $item->obra_obs ?></td>
                                    <td><a href="<?= base_url('cliente/obra/visualizar/' . $item->obra_id) ?>" class="icone-eye" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <!--
                                    <?php if ($item->obra_status != 1) { ?>
                                    <a href="<?= base_url('cliente/obra/editar/' . $item->obra_id) ?>" class="icone-edit" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <?php } ?>
                                    -->
                                    <!--
                                    <?php if ($item->obra_status != 1) { ?>
                                    <a href="#" onclick="removeObra('<?= $item->obra_id ?>')" class="icone-close" title="Excluir"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                    <?php } ?>
                                    -->
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
<script>
function removeObra(obra_id) {

    if (confirm("Tem certeza que deseja excluir esta obra?")) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('/cliente/obra/excluir/');?>" + obra_id,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    
                    alert("Obra excluído com sucesso!");

                } else {

                    alert("Erro ao excluir a obra.");
                
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Erro ao processar a solicitação.");
            }
        });
    }
}
</script>