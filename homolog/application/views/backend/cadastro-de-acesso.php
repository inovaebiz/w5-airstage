<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de acesso</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Cadastro de acesso</h1>


<!-- section -->
<section>
 
  <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'success':?>
			<div class="alert alert-success">Usuário cadastrado com sucesso!</div>
			<?php
		break;   
	}
}
?> 
  <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'delete':?>
			<div class="alert alert-danger">Usuário excluído com sucesso!</div>
			<?php
		break;   
	}
}
?> 
<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
    


 <!-- Form -->
<form class="form-cadastro" action="" method="POST">
<div class="row">

  <div class="input-group col-md-4">
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= set_value('nome')?>"> 
    <input type="hidden" name="status" value="1"> 
  </div>
<div class="input-group col-md-4">
  <input type="text" name="tel" id="tel" placeholder="Telefone" class="form-control phoneSP9" id="senha" value="<?= set_value('tel')?>">
</div>

<div class="input-group col-md-4">
  <input type="email" name="email" id="email" placeholder="Email" class="form-control" id="senha" value="<?= set_value('email')?>">
</div>

  <div class="input-group col-md-4">
    <input type="text" name="login" id="login" placeholder="Login" class="form-control" id="senha" value="<?= set_value('login')?>">
</div>
<div class="input-group col-md-3">
  <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" id="senha" >
</div>

  <div class="input-group col-md-3">
    <input type="password" name="resenha" id="resenha" placeholder="Repetir Senha" class="form-control" id="senha">
</div>


 <div class="f1-buttons col-md-2">
<button type="submit" class="btn btn-primary btn-labeled ">
<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Cadastrar</span></button>
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
      
      <th width="30%">Nome</th>
      <th width="30%">Login</th>
      <th width="30%">Email</th>
      <th width="10%" ></th>
    </tr>
  </thead>
  <tbody>
     <?php
    //verifica se tem página
    if(count($usuarios->result()) == 0)
    {
        ?>
        <tr>
            <td class="text-center" colspan="6">Nenhuma usuário cadastrado.</td>
        </tr>
        <?php
    }else
    {
        //lista as páginas
        foreach ($usuarios->result() as $item)
        {
    ?>
  <tr>
      <td><?= $item->nome?></td>

      <td><?= $item->login?></td>

      <td><?= $item->email?></td>

      <td><a href="<?= base_url('control/auth/editar-usuario/'.$item->id)?>" alt="Editar" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
          <a href="<?= base_url('control/auth/excluir-usuario/'.$item->id)?>"  alt="Excluir" title="Excluir"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
      
    </tr>
    <?php
	    }
	    }
    ?>



    <!--<tr>
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
-->

  </tbody>
</table>
</div>

</div>
</section>


</main>
</div>
</div>
