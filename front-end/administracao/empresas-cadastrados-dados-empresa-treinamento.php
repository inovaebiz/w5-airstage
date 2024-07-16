<?php include ("head.php") ?>
</head>


<body id="empresas-cadastradas">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active"><a href="empresas-cadastradas.php">Empresas Cadastradas</a></li>
    <li class="breadcrumb-item active"> <a href="empresas-cadastrados-dados-empresa.php">Detalhes</a></li>
    <li class="breadcrumb-item active"> Dados do Treinamento</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

<!-- link-voltar -->
<a href="empresas-cadastrados-dados-empresa.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Condensadores - Loja Arfrio</h1>


<!-- section -->
<section>
<div class="row">

<div class="col-md-12">

<h2>Dados do treinamento</h2>
<!-- Tabela -->
<table id="lista-padrao" class="table-interna-simples table table-striped table-bordered dt-responsive nowrap">


        </thead>
    <tbody>
    
    <tr>
      <td>NOME DO CLIENTE</td>
      <td>Loja ArFrio</td>
      </tr>      

    
    <tr >
      <td >ENDEREÇO</td>
      <td>Rua Domingos Afonso, 416 122 - Vila Santa Clara - São Paulo SP - CEP: 03161090</td>
    
    </tr>

    <tr>
      <td>NOME DO RESPONSAVEL</td>
      <td>Ricardo Callichio</td>
      
    </tr>

    <tr >
      <td>CPF</td>
      <td>33.333.333-65</td>
      
    </tr>

    <tr >
      <td>DATA DO TREINAMENTO</td>
      <td>20/05/2018</td>
      
    </tr>

    <tr>
      <td>CERTIFICADO</td>
      <td><button type="submit" class="btn btn-primary "> <i class="fa fa-clipboard" aria-hidden="true"></i> Visualizar certificado</button></td>
    </tr>

   

  </tbody>
</table>





<!-- Tabela -->
  <table class="table tabela-pontos">
  
  <tbody>
    
    <tr >
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados neste treinamento</td>
 
      <td class="no-border total" width="30%"> 21 PONTOS </td>
    </tr>

  </tbody>
</table>




</div>
</div>
</section>

<!-- link-voltar -->
<a href="empresas-cadastrados-dados-empresa.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>
</div>
</div>

<!--FOOTER-->
<?php include ("footer.php") ?> 


</html>