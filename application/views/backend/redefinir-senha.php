<!-- /// dashboard /// -->
<div class="logo-dashboard">
	<img src="<?php echo base_url(); ?>assets-cliente/img/logo-fujitsu-fujitsu-general-brazil.svg">
</div>
<div class="login-dashboard">
	
	<form name="form" id="form" method="post" class="form-signin">
		  <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'send':?>
			<div class="alert alert-success">Email de recuperação enviado com sucesso!!</div>
			<?php
		break;   
	}
}
?> 
		<div class="">Redifinir senha?</div>
	<div class="">Entre com a nova senha abaixo.</div>
		<?php
	    echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>');
	    if(isset($ex)){
		    if($ex != ''){
			    echo '<div class="alert alert-warning" role="alert"><b>'.$ex.'</b></div>';
		    }
	    }
        
	    ?>
		<input type="hidden" name="id" value="<?= $cliente->id ?>">
		<input type="hidden" name="recupera_hash" value="<?= $hash ?>">
		<div class="form-group">
			<label for="login">Nova senha</label>
			<input type="password" class="form-control form-control input-lg" name="senha" id="senha" placeholder="Digite sua nova senha">
		</div>
		<div class="form-group">
			<label for="login">Email</label>
			<input type="password" class="form-control form-control input-lg" name="resenha" id="resenha" placeholder="Confirme sua nova senha">
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Recuperar Senha">
			
<div class="clean"></div>
		</div>
	</form>
</div>
<div class="footer-dashboard"></div>
<!-- /// !dashboard /// -->
