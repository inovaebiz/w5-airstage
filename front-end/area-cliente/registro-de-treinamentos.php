<?php include ("head.php") ?>
</head>


<body id="registro-treinamentos">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="registro-de-obras-listagem.php">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro de Treinamentos</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Registro de treinamentos</h1>

<section>

<!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="col-md-8 col-lg-8 col-xl-8">
    <p><span>Cadastre seus Treinamentos</span> e acumule pontos que serão revertidos em prêmios.</p>
  </div>

<div class="f1-buttons col-md-4 col-lg-4 col-xl-4">

<a class="btn btn-primary btn-labeled" href="registro-de-treinamentos-cadastre-seu-treinamento.php" role="button">

<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar Novo treinamento</span></a>
</div>

</div>
</form>


<div class="row ">
<div class="col-md-12">

<!-- Tabela -->
<h2>Treinamentos cadastrados</h2> 

<!-- Form -->
<form class="form-inline">


  <div class="input-group col-md-5">
    <input type="text" class="form-control" placeholder="Nome do Treinamento"> 
  </div>

<div class="input-group col-md-1">
<label>Período:</label>
</div>


  <div class="input-group col-md-2">
    <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
    <input type="text" class="form-control" id="search-from-date" placeholder="De">
    
  </div>

  <div class="input-group col-md-2">
    
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
      
      <th width="35%">TREINAMENTO</th>
      <th>DATA</th>
      <th>PONTOS ACUMULADOS</th>
      <th>STATUS</th>
      <th width="7%"></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Loja Ar Frio</td>
      <td>18/05/2018 - 10:36</td>
      <td>5</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="registro-de-treinamentos-detalhe.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td>Instaladora Gelair</td>
      <td>15/05/2018 - 09:15</td>
      <td>8</td>
      <td><span class="ativo">Pontos liberados</span> </td>
      <td> <a href="registro-de-treinamentos-detalhe.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
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