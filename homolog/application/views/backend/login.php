<!-- /// dashboard /// -->
<div class="logo-dashboard">
	<img src="<?php echo base_url(); ?>assets-control/img/logo-fujitsu-fujitsu-general-brazil.svg">
</div>
<div class="login-dashboard">

	<form name="form" id="form" method="post" class="form-signin">
		<?php
	    echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>');
	    if(isset($ex)){
		    if($ex != ''){
			    echo '<div class="alert alert-warning" role="alert"><b>'.$ex.'</b></div>';
		    }
	    }
        
	    ?>
	    <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'delete':?>
			<div class="alert alert-danger">Senha altera com sucesso!</div>
			<?php
		break;   
	}
}
?> 
		
		<div class="form-group">
			<label for="login">Usuário</label>
			<input type="text" class="form-control form-control input-lg" name="login" id="login" placeholder="Digite seu usuário" value="<?=set_value("login")?>">
		</div>
		
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control form-control input-lg" name="senha" id="senha" value="" placeholder="Digite sua senha">
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Entrar no sistema">
			
<div class="clean"></div>
		</div>
	</form>
</div>
<div class="footer-dashboard">
	<a href="<?= base_url('control/auth/recuperar-senha')?>">Esqueci minha Senha</a>
</div>
<!-- /// !dashboard /// -->
