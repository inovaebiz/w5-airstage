<?php include ("head.php") ?>
</head>


<body id="aprovacao-empresas">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active"><a href="aprovacao-de-empresas.php">Aprovação de empresa</a></li>
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
<a href="aprovacao-de-empresas.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Aprovação de Gabriel Obras</h1>



<!-- section -->
<section>
<div class="row">
<div class="col-md-12">


<h2>Dados da empresa</h2>
<!-- Tabela -->
<table id="dados-empresa" class="table table-striped table-bordered dt-responsive nowrap">

    <tbody>
    
    <tr>
      <td width="30%">RAZÃO SOCIAL</td>
      <td><span class="lock">Silva e Ferreira Refrigeração e climatização</span></td>
    </tr>

    
    <tr>
      <td >CNPJ</td>
      <td><span class="lock">00.000.000/0001-12</span></td>
    </tr>

    <tr>
      <td >E-MAIL</td>
      <td><span class="lock">contato.silvaeferreira@gmail.com</span></td>
    </tr>

    <tr>
      <td >TELEFONE</td>
      <td>11 3356-5645</td>
    </tr>

    <tr>
      <td >CELULAR</td>
      <td>11 99144-5566</td>
    </tr>

  </tbody>
</table>


<!-- Tabela -->
<h2>Endereço da empresa</h2>
<table id="endereco-empresa" class="table table-striped table-bordered dt-responsive nowrap">

  <tbody>
    
    <tr>
      <td width="30%">CEP</td>
      <td>11075-758</td>
    </tr>

    
    <tr>
      <td >ENDEREÇO</td>
      <td>Rua Itamirim</td>
    </tr>

    <tr>
      <td>NÚMERO</td>
      <td>33</td>
    </tr>

    <tr>
      <td>COMPLEMENTO</td>
      <td>----</td>
    </tr>

    <tr>
      <td>BAIRRO</td>
      <td>Tupi</td>
    </tr>

    <tr >
      <td>CIDADE</td>
      <td>Praia Grande</td>
    </tr>

    <tr>
      <td>ESTADO</td>
      <td>SP</td>
    </tr>

  </tbody>
</table>

<!-- Tabela -->
<h2>Autenticação</h2>
<table id="autenticao" class="table table-striped table-bordered dt-responsive nowrap">

  <tbody>
    
    <tr>
      <td width="30%">NOME DO RESPONSÁVEL</td>
      <td>José Ricardo</td>
    </tr>

    
    <tr>
      <td>DATA DE NASCIMENTO</td>
      <td>26/01/1955</td>
    </tr>

    <tr>
      <td>CPF</td>
      <td>383.895.456-86</td>
    </tr>

    <tr>
      <td>RG</td>
      <td>34.478.147-4</td>
    </tr>


  </tbody>
</table>

<!-- BOTOES -->
 <div class="botoes-aprovacao">

  <div class="row">

<div class="col-12 col-sm-9 col-md-8 col-lg-8 col-xl-8 offset-xl-2">
  <select name="reprovacao" id="" class="reprovacao">
    <option value="Selecione o motivo da reprovação">Selecione o motivo da reprovação</option>
    <option value="Lorem ipsum dolor sit amet">Lorem ipsum dolor sit amet</option>
    <option value="Consectetur adipisicing elit">Consectetur adipisicing elit</option>
  </select>
  <button type="submit" class="btn btn-primary btn-orange">Reprovar</button>
</div>

<div class="col-12 col-sm-3 col-md-4 col-lg-4 col-xl-2">
  <button type="submit" class="btn btn-primary btn-green"> Aprovar Usuário <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>

</div>
</div>
</div>

</div>
</div>
</section>

<!-- link-voltar -->
<a href="aprovacao-de-empresas.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

</main>
</div>
</div>

<!--FOOTER-->
<?php include ("footer.php") ?> 

</html>