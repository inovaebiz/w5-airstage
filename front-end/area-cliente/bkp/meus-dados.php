<?php include ("head.php") ?>
</head>


<body id="registro-obras">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Área do cliente</a></li>
    <li class="breadcrumb-item active" aria-current="page">Meus Dados</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-lg-9">

<!-- link-voltar -->
<a href="#" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Meus Dados</h1>


<!-- section -->
<section>
  

<div class="row">

<h2>Dados da empresa</h2>
<!-- Tabela -->
<table class="table">
    <tbody>
    
    <tr>
      <td width="25%">RAZÃO SOCIAL</td>
      <td width="60%"><span class="lock">Silva e Ferreira Refrigeração e climatização</span></td>
      <td width="15%"><i class="fa fa-lock" aria-hidden="true"></i></td>
    </tr>

    
    <tr class="odd">
      <td >CNPJ</td>
      <td><span class="lock">00.000.000/0001-12</span></td>
      <td><i class="fa fa-lock" aria-hidden="true"></i></td>
    </tr>

    <tr>
      <td >E-MAIL</td>
      <td><span class="lock">contato.silvaeferreira@gmail.com</span></td>
      <td><i class="fa fa-lock" aria-hidden="true"></i></td>
    </tr>

    <tr class="odd">
      <td >TELEFONE</td>
      <td>11 3356-5645</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr>
      <td >CELULAR</td>
      <td>11 99144-5566</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

  </tbody>
</table>


<!-- Tabela -->
<h2>Endereço da empresa</h2>
<table class="table ">
  <tbody>
    
    <tr>
      <td width="25%">CEP</td>
      <td width="60%">11075-758</td>
      <td width="15%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    
    <tr class="odd">
      <td >ENDEREÇO</td>
      <td>Rua Itamirim</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr>
      <td>NÚMERO</td>
      <td>33</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr class="odd">
      <td>COMPLEMENTO</td>
      <td>----</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr>
      <td>BAIRRO</td>
      <td>Tupi</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr class="odd">
      <td>CIDADE</td>
      <td>Praia Grande</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr>
      <td>ESTADO</td>
      <td>SP</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

  </tbody>
</table>

<!-- Tabela -->
<h2>Autenticação</h2>
<table class="table ">
  <tbody>
    
    <tr>
      <td width="25%">NOME DO RESPONSÁVEL</td>
      <td width="60%">José Ricardo</td>
      <td width="15%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    
    <tr class="odd">
      <td>DATA DE NASCIMENTO</td>
      <td>26/01/1955</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr>
      <td>CPF</td>
      <td>383.895.456-86</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>

    <tr class="odd">
      <td>RG</td>
      <td>34.478.147-4</td>
      <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</td>
    </tr>


  </tbody>
</table>


<!-- Filtro-->
<form class="form-inline">

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


<!-- BOTOES -->
 <div class="botoes-aprovacao col-md-12">
  <div class="row">
 <div class="col-md-6">
<a href="#" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
</div>

 <div class="col-md-6">
  <button type="submit" class="btn btn-primary btn-filtro"> Atualizar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
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