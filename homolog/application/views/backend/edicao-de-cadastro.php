<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('control/auth/')?>">CADASTRO DE ACESSO</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Dados Acesso</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

<!-- link-voltar -->
<a href="<?= base_url('control/auth')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Editar Dados Acesso</h1>


<!-- section -->
<section class="forms">
<form method="POST" action="" enctype="multipart/form-data">
<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
<div class="row">
<div class="col-md-12">
<input type="hidden" id="id" name="id" value="<?= $this->uri->segment(4)?>">
<h2>Dados da Acesso</h2>
<!-- Tabela -->
<table id="dados-empresa" class="table table-striped table-bordered dt-responsive nowrap">
	<tbody>
	    <tr>
	      <td width="35%">NOME</td>
	      <td><input type="text" id="nome" name="nome" value="<?= $usuario->nome?>" class="form-control form-control-interno"></td>
	    </tr>
	    <tr>
	      <td>EMAIL</td>
	      <td><input type="text" id="email" name="email" value="<?= $usuario->email?>" class="form-control form-control-interno"></td>
	    </tr>
	    <tr>
	      <td>TELEFONE</td>
	      <td><input type="text" id="tel" name="tel" value="<?= $usuario->tel?>" class="phoneSP9 form-control form-control-interno"></td>
	    </tr>
	</tbody>
</table>

<!-- Tabela -->
<h2>Autenticação</h2>
<table id="autenticacao" class="table table-striped table-bordered dt-responsive nowrap">
<tbody>
	<tr>
       <td width="35%">LOGIN</td>
	   <td><input type="text" id="login" name="login" placeholder="Login" class="form-control form-control-interno" value="<?= $usuario->login?>"></td>
    </tr>
    <tr>
       <td>NOVA SENHA</td>
	   <td><input type="password" id="senha" name="senha" placeholder="Apenas se deseja alterar" class="form-control form-control-interno"></td>
    </tr>
    <tr>
      <td>REPETIR A NOVA SENHA</td>
      <td><input type="password" id="resenha" name="resenha" placeholder="Apenas se deseja alterar" class="form-control form-control-interno"></td>
    </tr>
  </tbody>
</table>

<!-- BOTOES -->
 <div class="botoes-aprovacao col-md-12">
  <div class="row">
 <div class="col-md-6">
<a href="<?= base_url('control/auth')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
</div>

 <div class="col-md-6">
  <button type="submit" class="btn btn-primary btn-filtro"> Atualizar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
  </div>
</div>
</div>
</form>
</div>
</div>
</section>



</main>

</div>
</div>