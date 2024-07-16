<?php include ("head.php") ?>
</head>


<body id="empresas-cadastradas">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresas Cadastradas</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Empresas Cadastradas</h1>


<!-- section -->
<section>
<div class="row">

<!-- Filtro-->
<form class="form-inline">
 <label class="sr-only" for="inlineFormInputGroupUsername2">Razão Social</label>
  <div class="input-group col-md-6">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Razão Social"> 
  </div>

  <label class="sr-only" for="inlineFormInputGroupUsername2">CNPJ</label>
  <div class="input-group col-md-4">
  <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="CNPJ">
  </div>

 

 <div class="f1-buttons col-md-2">
  <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
</div>

</form>


<div class="col-md-12">

<!-- Tabela -->

    <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="50%">RAZÃO SOCIAL DA EMPRESA</th>
      <th>CNPJ</th>
      <th>OBRAS CADASTRADAS</th>
      <th>PONTOS</th>
      <th>STATUS</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Gabriel Obras</td>
      <td>123.456.789.10</td>
      <td>2</td>
      <td>5</td>
      <td><span class="ativo">Ativo</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td>TRM Refrigeração</td>
      <td>444.456.789.14</td>
      <td>10</td>
      <td>78</td>
      <td><span class="inativo">Inativo</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>


 <tr>
      <td>Gabriel Obras</td>
      <td>123.456.789.10</td>
      <td>2</td>
      <td>5</td>
      <td><span class="ativo">Ativo</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
   <tr>
      <td>TRM Refrigeração</td>
      <td>444.456.789.14</td>
      <td>10</td>
      <td>78</td>
      <td><span class="inativo">Inativo</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
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