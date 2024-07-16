<?php include ("head.php") ?>
</head>


<body id="cadastro-campanha">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de campanha</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Cadastro de campanha</h1>


<!-- section -->
<section>
 


 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="input-group col-md-12 col-lg-12 col-xl-4">
    <input type="text" class="form-control" placeholder="Nome da campanha"> 
  </div>

<div class="input-group col-md-1 col-lg-2 col-xl-1">
<label>Período:</label>
</div>


  <div class="input-group col-md-4 col-lg-3 col-xl-2">
    <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
    <input type="text" class="form-control" id="search-from-date" placeholder="De">
    
  </div>

  <div class="input-group col-md-4 col-lg-3 col-xl-2">
    
    <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
    <input type="text" class="form-control" id="search-to-date" placeholder="Até">
    
  </div>


 <div class="f1-buttons col-md-3 col-lg-4 col-xl-3">
<button type="button" class="btn btn-primary btn-labeled ">
<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar campanha</span></button>
</div>




</div>
</form>

<div class="row">
<div class="col-md-12">

<!-- Tabela -->
<h2>Campanhas cadastradas</h2> 




    <table id="lista-padrao" class="table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="50%">CAMPANHA</th>
      <th>DATA INICIAL</th>
      <th>DATA FINAL</th>
      <th>STATUS</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Campanha Verão 2018</td>
      <td>01/10/2017</td>
      <td>28/02/2018</td>
      <td><span class="ativo">Em andamento</span> </td>
      <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td>Campanha Verão 2017</td>
      <td>01/10/2016</td>
      <td>28/02/2017</td>
      <td><span class="finalizado">Finalizada</span> </td>
      <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
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