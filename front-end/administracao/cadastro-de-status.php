<?php include ("head.php") ?>
</head>


<body id="cadastro-status">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de status</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Cadastro de status</h1>


<!-- section -->
<section>
 


 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="input-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Texto do status"> 
  </div>


 
  <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    
    <select class="form-control">
<option value="">Cor</option>
<option value="#000000" style="background-color: Black;color: #FFFFFF;">Preto</option>
<option value="#808080" style="background-color: Gray;color: #FFFFFF;">Cinza</option>
<option value="#FFFFFF" style="background-color: White;">Branco</option>
<option value="#0000FF" style="background-color: Blue; color: #FFFFFF;">Azul</option>
<option value="#008000" style="background-color: Green;color: #FFFFFF;">Verde</option>
<option value="#FFFF00" style="background-color: Yellow;">Amarelo</option>
<option value="#FFA500" style="background-color: Orange;">Laranja</option>
<option value="#FF0000" style="background-color: Red;color: #FFFFFF;">Vermelho</option>
<option value="#A52A2A" style="background-color: Brown; color: #FFFFFF;">Marrom</option>

</select>


</div>



<div class="f1-buttons col-sm-6 col-md-3 col-lg-3 col-xl-3">
  <button type="button" class="btn btn-primary btn-labeled ">
  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar Status</span></button>
  </div>


</div>
</form>


<div class="row">

<div class="col-md-12">

<!-- Tabela -->
<h2>Status cadastrados</h2> 

  

    <table id="lista-padrao" class="table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="80%">TEXTO DO STATUS</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
           
      <td><span class="ativo">Em andamento</span> </td>
      <td>
      <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-01" checked>
        <label class="onoffswitch3-label" for="status-01">
            <span class="onoffswitch3-inner">
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
                <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
      </div>
      </td>
      <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      
      <td><span class="finalizado">Finalizada</span> </td>
       <td><div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-02" checked>
    <label class="onoffswitch3-label" for="status-02">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div></td>
      <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>


    <tr>
           
      <td><span class="status">Aguardando aprovação</span> </td>
      <td><div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-03" checked>
    <label class="onoffswitch3-label" for="status-03">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div></td>
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