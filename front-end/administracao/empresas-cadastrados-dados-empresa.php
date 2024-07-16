<?php include ("head.php") ?>
</head>


<body id="empresas-cadastradas">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active"><a href="empresas-cadastradas.php">Empresas Cadastradas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
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
<a href="empresas-cadastradas.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<div class="row">
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
<h1>Página de Gabriel Obras</h1>
</div>

<!-- navegacao -->
<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
<a href="#" class="link-ativo"><i class="fa fa-times-circle" aria-hidden="true"></i> Excluir usuário</a>
</div>


<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
<div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
    <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>
</div>
</div>



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
</div>

<div class="col-md-12">
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
</div>


<div class="col-md-12">
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
</div>
</div>
</section>





<!-- section -->
<section>
<div class="row">
<div class="col-md-12">
<!-- Tabela -->
<h2>Obras cadastradas</h2> 

    



  <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      <th width="35%">OBRA</th>
      <th>DATA</th>
      <th>PONTOS ACUMULADOS</th>
      <th>STATUS</th>
      <th width="7%"></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Casa do Ricardo</td>
      <td>18/05/2018 - 10:36</td>
      <td>5</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td>Agência de publicidade</td>
      <td>15/05/2018 - 09:15</td>
      <td>8</td>
      <td><span class="ativo">Pontos liberados</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa-obra.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>
      


  </tbody>
</table>
</div>
</div>
</section>



<!-- section -->
<section>
<div class="row">
<div class="col-md-12">

<!-- Tabela -->
<h2>Treinamentos Cadastrados</h2> 

   

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
      <td>4</td>
      <td><span class="status">Aguardando liberação dos pontos</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa-treinamento.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>

    
    <tr>
      <td>Instalações Gelair</td>
      <td>15/05/2018 - 09:15</td>
      <td>4</td>
      <td><span class="ativo">Pontos liberados</span> </td>
      <td> <a href="empresas-cadastrados-dados-empresa-treinamento.php"><i class="fa fa-eye" aria-hidden="true"></i></a> 
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
    </tr>


  </tbody>
</table>
</div>
</div>
</section>



<!-- section -->
<section>
<div class="row">
<div class="col-md-12">
<!-- Tabela -->
<h2>Resgates Realizados </h2> 


    <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th>DATA</th>
      <th>PONTOS RESGATADOS</th>
      <th>VALOR DO PRÊMIO</th>
     
    </tr>
  </thead>
  <tbody>
    
    <tr>
     
      <td>18/05/2018 - 10:36</td>
      <td>100</td>
      <td><span class="ativo">R$ 1.200,00</span> </td>
      
    </tr>

    
    <tr >
    
      <td>15/05/2018 - 09:15</td>
      <td>70</td>
      <td><span class="ativo">R$ 800,00</span> </td>
      
    </tr>


  </tbody>
</table>
</div>
</div>
</section>

<!-- link-voltar -->
<a href="empresas-cadastradas.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>
</div>
</div>

<!--FOOTER-->
<?php include ("footer.php") ?> 


</html>