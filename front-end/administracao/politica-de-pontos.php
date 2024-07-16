<?php include ("head.php") ?>
</head>


<body id="politica-pontos">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Política de Pontos</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Política de Pontos</h1>

<section>

  
 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="input-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Item"> 
  </div>


 
<div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">   
<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Valor"> 
</div>



<div class="f1-buttons col-sm-6 col-md-3 col-lg-3 col-xl-3">
  <button type="button" class="btn btn-primary btn-labeled ">
  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar Pontos</span></button>
  </div>


</div>
</form>




<div class="row">
<div class="col-md-12">


<h2>Pontos cadastrados</h2> 

<!-- Tabela -->
     <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="85%">ITEM</th>
      <th width="10%">VALOR</th>
      <th width="5%"></th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Participar do Treinamento</td>
      <td>1 ponto</td>
      <td><a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
     
    </tr>

    
    <tr>
      <td>High Wall</td>
      <td>2 pontos</td>
      <td><a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
   
    </tr>

  <tr>
      <td>Cassete</td>
      <td>3 pontos</td>
      <td><a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
     
    </tr>

    
    <tr>
      <td>Teto</td>
      <td>8 pontos</td>
      <td><a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
   
    </tr>
      <tr>
      <td>Participar do Treinamento</td>
      <td>1 ponto</td>
      <td><a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
     
    </tr>

    
    <tr>
      <td>High Wall</td>
      <td>2 pontos</td>
      <td><a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
   
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