<?php include ("head.php") ?>
</head>


<body id="pontuacao">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pontuação</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-lg-9">
<h1>Pontuação</h1>

<section>


 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="col-md-8">
    <label>Parabéns! Você acumulou um total de 13 pontos!</label>
  </div>


 <div class="f1-buttons col-md-2">
  <button type="submit" class="btn btn-primary btn-campanha"> <i class="fa fa-trophy" aria-hidden="true"></i>   Resgatar Prêmios</button>

</div></div>
</form>




<div class="row ">


<!-- Tabela -->

    <!-- Form -->
<form class="form-inline">


 <label class="sr-only" for="inlineFormInputGroupUsername2">De</label>
  <div class="input-group col-md-2">
    
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="De">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
    </div>
  </div>

  <label class="sr-only" for="inlineFormInputGroupUsername2">Até</label>
  <div class="input-group col-md-2">
    
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Até">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
    </div>
  </div>

 <div class="f1-buttons col-md-2">
  <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>

</div>
</form>



    <table class="table ">
    <thead class="thead-light">
    <tr>
      
      
      <th scope="col" width="20%">DATA</th>
      <th scope="col" width="50%">OBRA</th>
      <th scope="col" width="30%">PONTOS ACUMULADOS</th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>18/05/2018</td>
      <td>Casa do Ricardo</td>
      <td>5</td>
     
    </tr>

    
    <tr class="odd">
      
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
</section>



</main>

</div>
</div>








<!--FOOTER-->
<?php include ("footer.php") ?>

         
 
</html>