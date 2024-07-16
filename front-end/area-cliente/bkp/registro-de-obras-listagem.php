<?php include ("head.php") ?>
</head>


<body id="registro-obras">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro de Obras</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-lg-9">
<h1>Registro de Obras</h1>

<section>


 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="col-md-8">
    <label>cadastre suas obras e acumule pontos que serão revertidos em prêmios.</label>
  </div>


 <div class="f1-buttons col-md-2">
  <button type="submit" class="btn btn-primary btn-campanha"> <i class="fa fa-plus" aria-hidden="true"></i>   Cadastrar Nova obra</button>

</div></div>
</form>




<div class="row ">


<!-- Tabela -->
<h2>Obras cadastradas</h2> 

    <!-- Form -->
<form class="form-inline">

<label class="sr-only" for="inlineFormInputGroupUsername2">Nome da obra</label>
  <div class="input-group col-md-5">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Nome da obra"> 
  </div>

<label>Período:</label>

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
      
      <th scope="col" width="25%">OBRA</th>
      <th scope="col" width="20%">DATA</th>
      <th scope="col" width="20%">PONTOS ACUMULADOS</th>
      <th scope="col" width="25%">STATUS</th>
      <th scope="col" width="10%"></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Casa do Ricardo</td>
      <td>18/05/2018 - 10:36</td>
      <td>5</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr class="odd">
      <td>Agência de publicidade</td>
      <td>15/05/2018 - 09:15</td>
      <td>8</td>
      <td><span class="ativo">Pontos liberados</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
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