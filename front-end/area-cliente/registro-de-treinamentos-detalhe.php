<?php include ("head.php") ?>
</head>


<body id="registro-treinamentos">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="registro-de-obras-listagem.php">Área do cliente</a></li>
    <li class="breadcrumb-item active"><a href="registro-de-treinamentos.php">Registro de treinamentos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
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
<a href="registro-de-treinamentos.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Condensadores - loja Ar frio</h1>


<!-- section -->
<section>
<div class="row">
<div class="col-md-12">

<h2>Dados do treinamento</h2>

<!-- Tabela -->
<table id="dados-treinamento" class="table table-striped table-bordered dt-responsive nowrap">
    <tbody>
    
    <tr>
      <td width="20%">NOME DO CLIENTE</td>
      <td width="80%">Loja Arfrio</td>
      </tr>

    
    <tr>
      <td >ENDEREÇO</td>
      <td>Rua Domingos Afonso, 416 122 - Vila Santa Clara - São Paulo SP - CEP: 03161090</td>
    
    </tr>

    <tr>
      <td>NOME DO RESPONSÁVEL</td>
      <td>Ricardo Callichio</td>
      
    </tr>

   <tr>
      <td>CPF</td>
      <td>321.458.258-01</td>
      
    </tr>

    <tr>
      <td>DATA DO TREINAMENTO</td>
      <td>20/05/2018 - 09:15</td>
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
 
      <td class="no-border total" width="30%"> 5 PONTOS </td>
    </tr>

  </tbody>
</table>


</div>
</div>
</section>

<!-- link-voltar -->
<a href="registro-de-treinamentos.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>

</div>
</div>








<!--FOOTER-->
<?php include ("footer.php") ?>

         
 
</html>