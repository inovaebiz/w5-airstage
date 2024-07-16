<?php include ("head.php") ?>
</head>


<body id="dashboard">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">dashboard</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
<h1>Dashboard</h1>


<div class="row">
<!-- Form -->
<form class="form-inline">

  <div class="input-group col-sm-12 col-md-3 col-lg-3">
  <i class="fa fa-search fa-calendar" aria-hidden="true"></i>  
  <input type="text" class="form-control" id="search-from-date"  placeholder="De">
  </div>

  <div class="input-group col-sm-12 col-md-3 col-lg-3">    
  <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
  <input type="text" class="form-control" id="search-to-date" placeholder="Até">
  </div>

 <div class="f1-buttons col-6 col-sm-6 col-md-3 col-lg-2">
  <button type="submit" class="btn btn-primary"> <i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
</div>

<div class="f1-buttons col-6 col-sm-6 col-md-3 col-lg-4">
  <button type="submit" class="btn btn-primary btn-black "> <i class="fa fa-bar-chart" aria-hidden="true"></i> Gerar Relatório</button>
</div>
</form>
</div>



<!-- DESCRICAO -->
<section>
<div class="row">
<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon01.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>700</span>
    <p>usuários inscritos</p> 
  </div>
</div>

<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon02.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>3.500</span>
    <p>obras cadastradas</p> 
  </div>
</div>

<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon03.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>20.500</span>
    <p>pontos liberados</p> 
  </div>
</div>

<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon04.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>250</span>
    <p>condensadores high walls frios</p> 
  </div>
</div>

<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon05.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>178</span>
   <p>condensadores high walls quente e frio</p> 
  </div>
</div>

<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon06.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>103</span>
    <p>Condensadores de teto</p> 
  </div>
</div>


<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon07.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>213</span>
    <p>Condensadores cassetes</p> 
  </div>
</div>


<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon08.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>334</span>
    <p>Condensadores multi</p> 
  </div>
</div>


<!-- box -->
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
  <div class="box-descricao">
    <img class="img-fluid icon-dash" src="assets/img/icon/icon09.png" alt="Projeto Família Airstage" title="Projeto Família Airstage">
    <span>1.325</span>
    <p>unidades externas</p> 
  </div>
</div>


</div>
</section>





</main>
</div>
</div>








<!--FOOTER-->
<?php include ("footer.php") ?>

 
</html>