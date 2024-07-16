</head>
<body id="dashboard">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.min.js" integrity="sha512-2uu1jrAmW1A+SMwih5DAPqzFS2PI+OPw79OVLS4NJ6jGHQ/GmIVDDlWwz4KLO8DnoUmYdU8hTtFcp8je6zxbCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- BREADCRUMB -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
      <li class="breadcrumb-item active" aria-current="page">dashboard</li>
    </ol>
  </nav>

  <?php
  $cat = 1;
  if (isset($_GET['c'])) {
    $cat = $_GET['c'];
  }
  ?>
  <!-- CONTAINER -->
  <div class="container-fluid">
    <div class="row">

      <!--SIDEBAR-->
      <?php include("includes/sidebar.php") ?>

      <!-- MAIN -->
      <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
        <h1>Dashboard</h1>


        <div class="row">
          <!-- Form -->
          <form class="form-inline" method="get">

            <div class="input-group col-md">
              <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
              <input type="text" name="s" class="form-control" id="search-from-date" placeholder="De" value="<?= isset($_GET['s']) ? ($_GET['s'] != "" ? $_GET['s'] : "") : "" ?>" autocomplete="off" required>
            </div>

            <div class="input-group col-md">
              <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
              <input type="text" name="e" class="form-control" id="search-to-date" placeholder="Até" value="<?= isset($_GET['e']) ? ($_GET['e'] != "" ? $_GET['e'] : "") : "" ?>" autocomplete="off" required>
            </div>
            <div class="input-group col-sm-12 col-md-3 col-lg-3">
              <select type="text" name="c" class="form-control">
                <option value="1" <?= $cat == 1 ? 'selected' : '' ?>>Cadastro</option>
                <option value="2" <?= $cat == 2 ? 'selected' : '' ?>>Obras</option>
                <option value="3" <?= $cat == 3 ? 'selected' : '' ?>>Treinamentos</option>
                <option value="4" <?= $cat == 4 ? 'selected' : '' ?>>Credenciados</option>
                <option value="5" <?= $cat == 5 ? 'selected' : '' ?>>Não credenciados</option>
                <option value="6" <?= $cat == 6 ? 'selected' : '' ?>>Resgates</option>
                <option value="7" <?= $cat == 7 ? 'selected' : '' ?>>Fechamento Campanha</option>
              </select>
            </div>

            <div class="f1-buttons col-6 col-sm-6 col-md-2 col-lg-2">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
            </div>
            <?php if ((isset($_GET['e']) || isset($_GET['s']))) { ?>
              <div class="f1-buttons col-6 col-sm-6 col-md-3 col-lg-3">
                <a type="href" href="<?= base_url() ?>control/pag/dashboardXLS?<?= http_build_query($_GET, '&') ?>" class="btn btn-primary btn-black "> <i class="fa fa-bar-chart" aria-hidden="true"></i> Gerar Relatório</a>
              </div>
            <?php } ?>
          </form>
        </div>


        <navs>
          <div class="nav nav-tabs nav-justified p-5" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Índices</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Gráfico</a>
          </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="container">
                <div class="text-right">
                  <button type="submit" class="btn btn-success" onclick="getIndices()">
                    <strong>Gerar Excel</strong>
                  </button>

                </div>
              </div>
              <!-- DESCRICAO -->
              <div class="row">
                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4"></div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosAll ?></span>
                    <input id="totalCadastro" type="text" value="<?= $usuariosAll ?>" style="display: none;">
                    <p>Clientes cadastrados</p>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4"></div>
              </div>
              <div class="row">
                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuarios ?></span>
                    <input id="totalCadastro" type="text" value="<?= $usuarios ?>" style="display: none;">
                    <p>credenciados cadastrados</p>
                  </div>
                </div>



                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosAtivos ?></span>
                    <input id="totalAtivos" type="text" value="<?= $usuariosAtivos ?>" style="display: none;">

                    <p>credenciados ativos</p>
                  </div>
                </div>


                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosInativos ?></span>
                    <input id="totalInativos" type="text" value="<?= $usuariosInativos ?>" style="display: none;">

                    <p>credenciados inativos</p>
                  </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosNaoCreadenciado ?></span>
                    <input id="totalCadastro" type="text" value="<?= $usuariosNaoCreadenciado ?>" style="display: none;">
                    <p>não credenciados cadastrados</p>
                  </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosNaoCreadenciadoAtivo ?></span>
                    <input id="totalCadastro" type="text" value="<?= $usuariosNaoCreadenciadoAtivo ?>" style="display: none;">
                    <p>não credenciados ativos</p>
                  </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosNaoCreadenciadoNaoAtivo ?></span>
                    <input id="totalCadastro" type="text" value="<?= $usuariosNaoCreadenciadoNaoAtivo ?>" style="display: none;">
                    <p>não credenciados pendentes</p>
                  </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosPendente ?></span>
                    <p>credenciados pendentes</p>
                  </div>
                </div>


                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosNaoCreadenciadoReprovados ?></span>
                    <p>não credenciados reprovados</p>
                  </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $usuariosCreadenciadoReprovados ?></span>
                    <p>credenciados reprovados</p>
                  </div>
                </div>

                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon02.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $obras ?></span>
                    <p>obras cadastradas</p>
                  </div>
                </div>

                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon03.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $pontos_a ?></span>
                    <p>pontos liberados</p>
                  </div>
                </div>

                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon03.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $resgateAll ?></span>
                    <p>pontos Resgatados</p>
                  </div>
                </div>

                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon04.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $highWallF ?></span>
                    <p>condensadores high walls frios</p>
                  </div>
                </div>

                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon05.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $highWallQF ?></span>
                    <p>condensadores high walls quente e frio</p>
                  </div>
                </div>

                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon06.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $teto ?></span>
                    <p>Condensadores de teto</p>
                  </div>
                </div>


                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon07.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $cassete ?></span>
                    <p>Condensadores cassetes</p>
                  </div>
                </div>


                <!-- box -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon08.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $multi ?></span>
                    <p>Condensadores multi</p>
                  </div>
                </div>


                <!-- box -->
                <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                  <div class="box-descricao">
                    <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon09.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                    <span><?= $equip_ex ?></span>
                    <p>unidades externas</p>
                  </div>
                </div> -->

                <div style="display: none;">
                  <!-- box -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="box-descricao">
                      <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon06.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                      <span><?= $treinamentos ?></span>
                      <p>treinamentos cadastrados</p>
                    </div>
                  </div>
                  <!-- box -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="box-descricao">
                      <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon03.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                      <span><?= $treinamento_pontos_liberado ?></span>
                      <p>treinamentos pontos Liberados</p>
                    </div>
                  </div>

                  <!-- box -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="box-descricao">
                      <img class="img-fluid icon-dash" src="<?= base_url() ?>assets-control/img/icon/icon03.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
                      <span><?= $treinamento_pontos_aguardando ?></span>
                      <p>treinamentos pontos aguardando liberação</p>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="container">
                <canvas id="myChart" height="130"></canvas>
              </div>
            </div>
          </div>

      </main>
    </div>
  </div>

  <div style="display: none;">
    <table id="lista-indices" class="table">
      <thead class="thead-light">
        <tr>

          <th>ITEM</th>
          <th>TOTAL</th>
        </tr>
      </thead>
      <tbody id="tbodyTableIndice">
        <tr>
          <th>CREDENCIADOS CADASTRADOS</th>
          <td><?= $usuarios ?></td>
        </tr>

        <tr>
          <th>NÃO CREDENCIADOS CADASTRADOS</th>
          <td><?= $usuariosNaoCreadenciado ?></td>
        </tr>

        <tr>
          <th>CREDENCIADOS ATIVOS</th>
          <td><?= $usuariosAtivos ?></td>
        </tr>

        <tr>
          <th>CREDENCIADOS INATIVOS</th>
          <td><?= $usuariosInativos ?></td>
        </tr>

        <tr>
          <th>CREDENCIADOS PENDENTES</th>
          <td><?= $usuariosPendente ?></td>
        </tr>

        <tr>
          <th>NÃO CREDENCIADOS PENDENTES</th>
          <td><?= $usuariosNaoCreadenciadoNaoAtivo ?></td>
        </tr>

        <tr>
          <th>NÃO CREDENCIADOS REPROVADOS</th>
          <td><?= $usuariosNaoCreadenciadoReprovados ?></td>
        </tr>

        <tr>
          <th>OBRAS CADASTRADAS</th>
          <td><?= $obras ?></td>
        </tr>

        <tr>
          <th>PONTOS LIBERADOS</th>
          <td><?= $pontos_a ?></td>
        </tr>

        <tr>
          <th>CONDENSADORES HIGH WALLS FRIOS</th>
          <td><?= $highWallF ?></td>
        </tr>

        <tr>
          <th>CONDENSADORES HIGH WALLS QUENTE E FRIO</th>
          <td><?= $highWallQF ?></td>
        </tr>

        <tr>
          <th>CONDENSADORES DE TETO</th>
          <td><?= $teto ?></td>
        </tr>

        <tr>
          <th>CONDENSADORES CASSETES</th>
          <td><?= $cassete ?></td>
        </tr>

        <tr>
          <th>CONDENSADORES MULTI</th>
          <td><?= $multi ?></td>
        </tr>

        <tr>
          <th>UNIDADES EXTERNAS</th>
          <td><?= $equip_ex ?></td>
        </tr>

        <tr>
          <th>TREINAMENTOS CADASTRADOS</th>
          <td><?= $treinamentos ?></td>
        </tr>

        <tr>
          <th>TREINAMENTOS PONTOS LIBERADOS</th>
          <td><?= $treinamento_pontos_liberado ?></td>
        </tr>

        <tr>
          <th>TREINAMENTOS PONTOS AGUARDANDO LIBERAÇÃO</th>
          <td><?= $treinamento_pontos_aguardando ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    let totalCadastro = document.getElementById("totalCadastro").value;
    let totalAtivos = document.getElementById("totalAtivos").value;
    let totalInativos = document.getElementById("totalInativos").value;

    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Total de cadastro', 'Cadastros Ativos', 'Cadastros Inativos'],
        datasets: [{
          label: 'Cadastros ',
          data: [totalCadastro, totalAtivos, totalInativos],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });



    function getIndices() {

      let divTable = document.getElementById("lista-indices");

      let dataTable = new Blob(['\ufeff' + divTable.outerHTML], {
        type: 'application/vnd.ms-excel'
      });


      // Download

      let url = window.URL.createObjectURL(dataTable);
      let a = document.createElement('a');
      a.href = url;
      a.download = `Lista Indices ${new Date()}`
      a.click();

    }
  </script>
</html>