<?php include ("head.php") ?>
</head>


<body id="pontuacao">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="registro-de-obras-listagem.php">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pontuação</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

<h1>Pontuação</h1>

<section>

 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="col-md-9">
    <p><span>Parabéns!</span> Você acumulou um total de <span class="pontos"> 13 pontos!</span></p>
  </div>

<div class="f1-buttons col-md-3">
<a class="btn btn-primary btn-labeled" href="resgate-seus-premios.php" role="button">
<span class="btn-label"><i class="fa fa-trophy fa-2x" aria-hidden="true"></i>Resgatar Prêmios</span></a>

</div>

</div>
</form>




<div class="row ">
<div class="col-md-12">

<!-- Form -->
<form class="form-inline">


  <div class="input-group col-md-3">
    <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
    <input type="text" class="form-control" id="search-from-date" placeholder="De">
    
  </div>

  <div class="input-group col-md-3">
    
    <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
    <input type="text" class="form-control" id="search-to-date" placeholder="Até">
    
  </div>


 <div class="f1-buttons col-md-2">
 <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
</div>

</form>



    <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      
      <th width="20%">DATA</th>
      <th width="60%">OBRA</th>
      <th width="20%">PONTOS ACUMULADOS</th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>18/05/2018</td>
      <td>Casa do Ricardo</td>
      <td>5</td>
     
    </tr>

    
     <tr>
      
      <td>15/05/2018 </td>
      <td>Agência de publicidade</td>
      <td>8</td>
      
    </tr>


  </tbody>
</table>

<!-- Tabela -->
    <table class="table ">
  
  <tbody>
    
    <tr >
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados </td>
 
      <td class="no-border total" width="30%"> 13 PONTOS </td>
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
