<?php include ("head.php") ?>
</head>


<body id="registro-obras">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="registro-de-obras-listagem.php">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Meus Dados</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

<!-- link-voltar -->
<a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Meus Dados</h1>


<!-- section -->
<section>
<div class="row">
<div class="col-md-12">

<h2>Dados da empresa</h2>
<!-- Tabela -->
<table id="dados-empresa" class="table table-striped table-bordered dt-responsive nowrap">


    <tbody>
    
    <tr>
      <td width="35%">RAZÃO SOCIAL</td>
      <td><span class="lock">Silva e Ferreira Refrigeração e climatização</span></td>
      <td width="5%"><i class="fa fa-lock" aria-hidden="true"  alt="Bloqueado" title="Bloqueado"></i></td>
    </tr>

    
    <tr>
      <td >CNPJ</td>
      <td><span class="lock">00.000.000/0001-12</span></td>
      <td><i class="fa fa-lock" aria-hidden="true" alt="Bloqueado" title="Bloqueado"></i></td>
    </tr>

    <tr>
      <td >E-MAIL</td>
      <td><span class="lock">contato.silvaeferreira@gmail.com</span></td>
      <td><i class="fa fa-lock" aria-hidden="true"  alt="Bloqueado" title="Bloqueado"></i></td>
    </tr>

    <tr>
      <td >TELEFONE</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="11 3356-5645" maxlength="100" class="form-control form-control-interno"></td>
      <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td >CELULAR</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="11 99144-5566" maxlength="100" class="form-control form-control-interno"></td>
      <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

  </tbody>
</table>


<!-- Tabela -->
<h2>Endereço da empresa</h2>
<table id="endereco-empresa" class="table table-striped table-bordered dt-responsive nowrap">

  
    <tbody>
    
    <tr>
       <td width="35%">CEP</td>
    
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="11075-758" maxlength="100" class="form-control form-control-interno"></td>
      <td width="5%"><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td >ENDEREÇO</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Rua Itamirim" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>NÚMERO</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="33" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>COMPLEMENTO</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="-------------------" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>BAIRRO</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Tupi" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>CIDADE</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Praia Grande" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>ESTADO</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="SP" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

  </tbody>
</table>

<!-- Tabela -->
<h2>Autenticação</h2>
<table id="autenticacao" class="table table-striped table-bordered dt-responsive nowrap">
   

  <tbody>

    
    <tr>
       <td width="35%">NOME DO RESPONSÁVEL</td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="José Ricardo" maxlength="100" class="form-control form-control-interno"></td>
     <td width="5%"><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td>DATA DE NASCIMENTO</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="26/01/1955" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>CPF</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="383.895.456-86" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>

    <tr>
      <td>RG</td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="34.478.147-4" maxlength="100" class="form-control form-control-interno"></td>
     <td><a href="#" alt="Salvar" title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td>
    </tr>


  </tbody>
</table>


<!-- Filtro-->
<form class="form-inline">

<div class="row">

  <div class="input-group col-md-3">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Senha Atual"> 
  </div>

  
  <div class="input-group col-md-3">
  <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Nova Senha">
  </div>


 <div class="input-group col-md-3">
  <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Repetir a Nova Senha">
  </div>
 

 <div class="f1-buttons col-md-3">
  <button type="submit" class="btn btn-primary btn-filtro"> Alterar Senha</button>
</div>

</form>

<div class="descricao-senha">
<p>1. A senha deve conter ao menos 8 caracteres, números e letras, sendo uma maiúscula;</p>
<p>2. O login será o e-mail cadastrado nos Dados da empresa.</p>
</div>
</div>


<!-- BOTOES -->
 <div class="botoes-aprovacao col-md-12">
  <div class="row">
 <div class="col-md-6">
<a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
</div>

 <div class="col-md-6">
  <button type="submit" class="btn btn-primary btn-filtro"> Atualizar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
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