<?php include ("head.php") ?>
</head>


<body id="cadastro-resgate">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de resgates</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Cadastro de resgates</h1>


<!-- section -->
<section>
 
 <!-- Form -->
<form class="form-cadastro">
<div class="row">

 <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    
    <select name="" id="" class="form-control">
      <option value="">Número Estrelas</option>
      <option value="">1 estrela</option>
      <option value="">2 estrelas</option>
      <option value="">3 estrelas</option>

    </select>
  </div>


  <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Valor do Prêmio"> 
  </div>

  <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Pontos"> 
  </div>


<div class="f1-buttons col-sm-6 col-md-3 col-lg-3 col-xl-3">
  <button type="button" class="btn btn-primary  btn-labeled ">
  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Inserir Resgate</span></button>
  </div>



</div>
</form>


<!-- Tabela -->
<h2>Resgastes cadastrados</h2> 

<div class="row">

<!-- box-estrela -->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-1">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-01" checked>
    <label class="onoffswitch3-label" for="status-01">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>


<!-- box-estrela -->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-2">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-02" checked>
    <label class="onoffswitch3-label" for="status-02">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela -->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-3">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-03" checked>
    <label class="onoffswitch3-label" for="status-03">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela -->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-4">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-04" checked>
    <label class="onoffswitch3-label" for="status-04">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela -->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-5">
    <p>Prêmio</p>
    <span>500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-05" checked>
    <label class="onoffswitch3-label" for="status-05">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
</div>

<!-- box-estrela -->
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<div class="box-estrela">
  <div class="estrela estrela-6">
    <p>Prêmio</p>
    <span>2500 reais</span>
  </div>
  <div class="base-estrela">
    <span>50 pontos</span>
    <span class="divider"></span>
    <p>Saldo <br>insulficiente</p>
  </div>

  <div class="linha-button">
     <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-06" checked>
    <label class="onoffswitch3-label" for="status-06">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>


</div>
</div>
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