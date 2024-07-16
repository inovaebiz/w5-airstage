<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de Prêmio</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
  <div class="row">

    <!--SIDEBAR-->
    <?php include("includes/sidebar.php") ?>

    <!-- MAIN -->
    <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


      <h1>Cadastro de Prêmios</h1>


      <!-- section -->
      <section>
        <?php
        if (isset($_GET['msg'])) {
          switch ($_GET['msg']) {
            case 'cadastrado': ?>
              <div class="alert alert-success">Prêmio cadastrado com sucesso!</div>
        <?php
              break;
          }
        }
        ?>
        <?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>', '</b></div>'); ?>


        <!-- Form -->
        <form class="form-cadastro container" method="POST" action="">
          <div class="input-group col-md">
            <input type="hidden" name="resgate_status" id="resgate_status" value="1">
            <select name="resgate_nro_estrelas" id="resgate_nro_estrelas" class="form-control">
              <option value="">Número Estrelas</option>
              <option value="1">1 estrela</option>
              <option value="2">2 estrelas</option>
              <option value="3">3 estrelas</option>
              <option value="4">4 estrelas</option>
              <option value="5">5 estrelas</option>
              <option value="6">6 estrelas</option>
              <option value="7">7 estrelas</option>
              <option value="8">8 estrelas</option>
              <option value="9">9 estrelas</option>
              <option value="10">10 estrelas</option>

            </select>
          </div>

          <div class="input-group col-md">
            <select name="tipo_cre" id="tipo_cre" class="form-control">
              <option value="">Selecione o tipo</option>
              <option value="0">Não Credenciados</option>
              <option value="1">Credenciados</option>
            </select>
          </div>

          <div class="input-group col-md">
            <input type="number" class="form-control" name="resgate_pontos" id="resgate_pontos" placeholder="Pontos">
          </div>



          <div class="row">
            <div class="input-group col-md">
              <input type="radio" class="form-control" name="tipo_premio" value="0" id="tipo_premio_0" onclick="muda(0)">
              <span class="radio2">Brindes</span>
            </div>

            <div class="input-group col-md">

              <input type="radio" class="form-control" checked="" value="1" name="tipo_premio" id="tipo_premio_1" onclick="muda(1)"><br>
              <span class="radio">Dinheiro</span>
            </div>
          </div>

          <div class="input-group col-md">
            <input type="text" class="form-control" name="img_premio" id="img_premio" placeholder="URL Imagem">
          </div>

          <div class="input-group col-md">
            <select name="campanha_id" id="campanha_id" class="form-control">
              <option value="0">Escolha uma campanha</option>
              <?php foreach ($campanhas->result() as $item) { ?>
                <option value="<?= $item->campanha_id ?>"><?= $item->campanha_nome ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="input-group col-md" id="cash">
            <input type="number" class="form-control" name="resgate_valor_premio" id="resgate_valor_premio" placeholder="Valor do Prêmio">
          </div>

          <div class="f1-buttons col-md">
            <button type="submit" class="btn btn-primary  btn-labeled">
              <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Inserir Prêmio</span></button>
          </div>
        </form>

        <script>
          function muda(e) {
            if (e == 1) {
              $("#cash input").attr('placeholder', 'Valor do Prêmio');
              $("#cash input").attr('type', 'number');
            } else {
              $("#cash input").attr('placeholder', 'Prêmio');
              $("#cash input").attr('type', 'text');
            }
          }
        </script>
        <?php
        $c = '';
        if (isset($_GET['c'])) {
          $c = $_GET['c'];
        } else {
          $c = '01';
        }
        ?>
        <!-- Tabela -->
        <h2 class="pull-left">Prêmios cadastrados</h2>
        <div class="pull-right filtry-cam">
          <select class="form-control" onchange="window.location.href = $(this).val();">
            <option value="<?= base_url() ?>control/resgate/" <?= $c == '01' ? 'selected' : '' ?>>Selecione uma campanha</option>
            <?php foreach ($campanhas->result() as $item) { ?>
              <option value="<?= base_url() ?>control/resgate?c=<?= $item->campanha_id ?>" <?= $c == $item->campanha_id ? 'selected' : '' ?>><?= $item->campanha_nome ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="clean"></div>
        <div class="row col-md-12">
          <?php
          //verifica se tem página
          if (count($resgates->result()) == 0) {
          ?>
            <tr>
              <td class="text-center" colspan="6">Selecione uma campanha acima para mostrar os prêmios.</td>
            </tr>
            <?php
          } else {
            $i = 1;
            //lista as páginas
            foreach ($resgates->result() as $item) {
            ?>

              <!-- box-estrela -->
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="box-estrela">
                  <?php if ($item->img_premio == null) { ?>
                    <div class="estrela estrela-<?= $item->resgate_nro_estrelas ?>">
                      <p>Prêmio</p>
                      <?php if ($item->tipo_premio == 1) { ?>
                        <span><?= $item->resgate_valor_premio ?> reais</span>
                      <?php } else { ?>
                        <span style="font-size: 18px;margin-top:6px;"><?= $item->resgate_valor_premio ?></span>
                      <?php } ?>
                    </div>
                    <div class="base-estrela">
                      <span><?= $item->resgate_pontos ?> pontos</span>
                      <!--<span class="divider"></span>
                    <p>Saldo <br>insulficiente</p>-->
                    </div>

                  <?php } else { ?>
                    <div class="text-center">
                      <img src="<?= $item->img_premio ?>" alt="" style="width: 90%">
                      <div class="base-estrela">
                        <span><?= $item->resgate_pontos ?> pontos <br><?= $item->resgate_nro_estrelas ?> estrelas</span>
                        <span></span>
                      </div>
                    </div>
                  <?php } ?>

                  <div class="linha-button">
                    <div class="onoffswitch3">
                      <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-0<?= $i ?>" onchange="window.location='<?= base_url() ?>control/resgate/status/<?= $item->resgate_id ?>'" <?= $item->resgate_status == 1 ? 'checked' : '' ?>>
                      <label class="onoffswitch3-label" for="status-0<?= $i ?>">
                        <span class="onoffswitch3-inner">
                          <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
                          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
                        </span>
                      </label>
                    </div>


                  </div>
                </div>
              </div>
          <?php
              $i++;
            }
          } ?>
          <!-- box-estrela ->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-2">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-02" checked>
    <label class="onoffswitch3-label" for="status-02">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela ->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-3">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-03" checked>
    <label class="onoffswitch3-label" for="status-03">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela ->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-4">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-04" checked>
    <label class="onoffswitch3-label" for="status-04">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela ->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-5">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-05" checked>
    <label class="onoffswitch3-label" for="status-05">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela ->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-6">
    <p>Prêmio</p>
    <span>2500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-06" checked>
    <label class="onoffswitch3-label" for="status-06">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>
-->
        </div>


  </div>
  </section>


  </main>
</div>
</div>