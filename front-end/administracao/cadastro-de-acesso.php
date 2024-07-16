<?php include ("head.php") ?>
</head>


<body id="cadastro-acesso">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de acesso</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Cadastro de acesso</h1>


<!-- section -->
<section>
 


 <!-- Form -->
<form class="form-cadastro">
<div class="row">

  <div class="input-group col-md-12 col-lg-3 col-xl-3">
    <input type="text" class="form-control" placeholder="Nome do usuário"> 
  </div>



  <div class="input-group col-md-4 col-lg-3 col-xl-3">
  <input type="password" name="senha" placeholder="Senha" class="form-control" id="senha">
</div>

  <div class="input-group col-md-4 col-lg-3 col-xl-3">
    <input type="password" name="senha" placeholder="Repetir Senha" class="form-control" id="senha">
</div>


 <div class="f1-buttons col-md-4 col-lg-3 col-xl-3">
<button type="button" class="btn btn-primary btn-labeled ">
<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar usuário</span></button>
</div>

</div>
</form>

<div class="row">
<div class="col-md-12">

<!-- Tabela -->
<h2>Usuários cadastrados</h2> 




    <table id="lista-padrao" class="table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="50%">Nome do usuário</th>
      <th width="20%">Senha</th>
      <th width="20%">Repetir Senha</th>
      <th width="10%" ></th>
    </tr>
  </thead>
  <tbody>
    
  <tr>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Gabriel Obras" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="password" id="nome" name="lsm_catal_prod_cat_nome" value="Lorem ipsum dolor sit amet" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="password" id="nome" name="lsm_catal_prod_cat_nome" value="Lorem ipsum dolor sit amet" maxlength="100" class="form-control form-control-interno"></td>

      <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a> 
          <a href="#"  alt="Excluir" title="Excluir"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
      
    </tr>



    <tr>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Ricardo Calicchio" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="password" id="nome" name="lsm_catal_prod_cat_nome" value="Lorem ipsum dolor sit amet" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="password" id="nome" name="lsm_catal_prod_cat_nome" value="Lorem ipsum dolor sit amet" maxlength="100" class="form-control form-control-interno"></td>

      <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a> 
          <a href="#"  alt="Excluir" title="Excluir"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    

    <tr>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Rico Farias" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="password" id="nome" name="lsm_catal_prod_cat_nome" value="Lorem ipsum dolor sit amet" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="password" id="nome" name="lsm_catal_prod_cat_nome" value="Lorem ipsum dolor sit amet" maxlength="100" class="form-control form-control-interno"></td>

      <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a> 
          <a href="#"  alt="Excluir" title="Excluir"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
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