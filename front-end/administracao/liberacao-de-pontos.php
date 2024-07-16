<?php include ("head.php") ?>
</head>


<body id="liberacao-pontos">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Liberação de pontos</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Liberação de pontos</h1>


<!-- section -->
<section>
<div class="row">

<div class="col-md-12">
<!-- Tabela -->

    <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="50%">NOME DA EMPRESA</th>
      <th>OBRA / TREINAMENTO</th>
      <th>PONTOS</th>
      <th>STATUS</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
   <td>Gabriel Obras</td>
      <td>Casa do Ricardo</td>
      <td>5</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="liberacao-de-pontos-dados-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>  
      <td>TRM Refrigeração</td>
      <td>Agência de publicidade</td>
      <td>8</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="liberacao-de-pontos-dados-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
   <td>Gabriel Obras</td>
      <td>Casa do Ricardo</td>
      <td>5</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="liberacao-de-pontos-dados-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr >  
      <td>TRM Refrigeração</td>
      <td>Agência de publicidade</td>
      <td>8</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="liberacao-de-pontos-dados-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
    </tr>


  </tbody>
</table>

</div>

</div>
</section>

</main>
</div>
</div>

<!--FOOTER-->
<?php include ("footer.php") ?> 

</html>