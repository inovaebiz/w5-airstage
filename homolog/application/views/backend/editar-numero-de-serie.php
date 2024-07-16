<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar número de série</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Editar número de série</h1>
            <!-- section -->
            <section>
            	<!-- Form -->
                <form class="form-cadastro" method="POST" action="">
                    <input type="hidden" name="id" value="<?=$numeros_series->id?>">
                    <div class="row pb-3">
                        <div class="input-group col-md-3">
                            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="data_emissao" id="search-from-date" placeholder="Data da emissão" value="<?= date('d/m/Y', strtotime($numeros_series->data_emissao)) ?>" disabled>
                        </div>
                        <div class="input-group col-md-3">
                            <select id="distribuidor_id" class="form-control" name="distribuidor_id" disabled>
                                <option value="">Selecione um distribuidor</option>
                                <?php foreach ($distribuidores->result() as $distribuidor): ?>
                                    <option value="<?= $distribuidor->distribuidor_id ?>" <?= ($numeros_series->distribuidor_id == $distribuidor->distribuidor_id) ? 'selected' : '' ?>>
                                        <?= $distribuidor->distribuidor_nome ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <input id="produto" type="text" class="form-control" name="produto" placeholder="Número do equipamento" value="<?=$numeros_series->produto?>" disabled>
                        </div>
                        <div class="input-group col-md-3">
                            <input id="serie" type="text" class="form-control" name="serie" placeholder="Número de série" value="<?=$numeros_series->serie?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="f1-buttons col-md-6">
                            <div class="onoffswitch3">
                                <input id="ativar" type="checkbox" name="is_used" class="onoffswitch3-checkbox" <?=$numeros_series->is_used == 1 ? "checked" : ""?>>
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
                        <div class="f1-buttons col-md-6">
                            <button type="submit" class="btn btn-primary btn-labeled">
                                <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Salvar</span>
                            </button>
                        </div>
                    </div>
                </form>
			</section><br>
			<!-- link-voltar -->
			<a href="<?= base_url('control/numeros-de-series/')?>" class="link-voltar">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
			</a>
        </main>
    </div>
</div>