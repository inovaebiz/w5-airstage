<?php include("head.php") ?>
</head>


<body id="registro-obras">
  <!--HEADER-->
  <?php include("header.php") ?>

  <!-- BREADCRUMB -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="registro-de-obras-listagem.php">Área do cliente</a></li>
      <li class="breadcrumb-item active"><a href="registro-de-obras-listagem.php">Registro de obras</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
    </ol>
  </nav>


  <!-- CONTAINER -->
  <div class="container-fluid">
    <div class="row">

      <!--SIDEBAR-->
      <?php include("sidebar.php") ?>


      <!-- MAIN -->
      <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

        <!-- link-voltar -->
        <a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

        <h1>Casa do Ricardo</h1>


        <!-- section -->
        <section>
          <div class="row">
            <div class="col-md-12">

              <h2>Dados da obra</h2>

              <!-- Tabela -->
              <table id="dados-obra" class="table table-striped table-bordered dt-responsive nowrap">
                <tbody>

                  <tr>
                    <td width="20%">NOME DO CLIENTE</td>
                    <td width="80%">Ricardo Callichio</td>
                  </tr>

                  <tr>
                    <td>ENDEREÇO</td>
                    <td>Rua Domingos Afonso, 416 122 - Vila Santa Clara - São Paulo SP - CEP: 03161090</td>

                  </tr>

                  <tr>
                    <td>APLICAÇÃO</td>
                    <td>Apartamento</td>

                  </tr>

                  <tr>
                    <td>DATA DA INSTALAÇÃO</td>
                    <td>20/05/2018 - 09:15</td>

                  </tr>

                  <tr>
                    <td>NOTA FISCAL</td>
                    <td>232323323232</td>
                  </tr>

                  <tr>
                    <td>DISTRIBUIDOR</td>
                    <td>Frigelar</td>

                  </tr>

                  <tr>
                    <td>DATA DA NOTA FISCAL DO DISTRIBUIDOR</td>
                    <td>20/05/2018 <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-clipboard" aria-hidden="true"></i> Visualizar notas fiscais</button></td>
                  </tr>

                </tbody>
              </table>




              <!-- Tabela -->
              <h2>EQUIPAMENTOS fujitsu INSTALADOS</h2>

              <table id="lista-padrao" class="display table-interna table table-striped table-bordered dt-responsive nowrap">
                <thead class="thead-light">
                  <tr>

                    <th width="25%">CATEGORIA</th>
                    <th width="30%">CONDENSADOR</th>
                    <th width="30%">EVAPORADORES</th>
                    <!-- <th width="5%"></th> -->
                    <th width="15%"></th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>High Wall Quente e Frio</td>
                    <td>Sistema Multi-Split 2, 3 e
                      4 Ambientes (AOBG14LAC2)
                      Número de série: u654321</td>
                    <td>
                      <p>Compacto com sensor de presença (asbg09lmca)
                        Número de série: U415263</p>
                      <p>Compacto com sensor de presença (asbg09lmca)
                        Número de série: U415263 </p>
                      <p>Compacto com sensor de presença (asbg09lmca)
                        Número de série: U415263</p>
                    </td>
                    <!--  <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td> -->

                    <td class="pontos"> + 12 PONTOS </td>
                  </tr>


                  <tr>
                    <td>Cassete</td>
                    <td>Sistema Multi-Split 2, 3 e
                      4 Ambientes (AOBG14LAC2)
                      Número de série: u654321</td>
                    <td>Compacto com sensor de presença (asbg09lmca)
                      Número de série: U415263</td>
                    <!-- <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td> -->

                    <td class="pontos"> + 5 PONTOS </td>
                  </tr>

                </tbody>
              </table>


              <!-- Tabela -->
              <table class="table tabela-pontos">

                <tbody>

                  <tr>
                    <td class="no-border" width="20%"></td>
                    <td class="no-border total-acumulado" width="50%">Total de pontos acumulados nesta obra</td>

                    <td class="no-border total" width="30%"> 21 PONTOS </td>
                  </tr>

                </tbody>
              </table>


            </div>
          </div>
        </section>

        <!-- link-voltar -->
        <a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

      </main>

    </div>
  </div>








  <!--FOOTER-->
  <?php include("footer.php") ?>



  </html>