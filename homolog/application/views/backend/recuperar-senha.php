<!-- /// dashboard /// -->
<div class="logo-dashboard">
	<img src="<?php echo base_url(); ?>assets-control/img/logo-fujitsu-fujitsu-general-brazil.svg">
</div>
<div class="login-dashboard">
	
	<form name="form" id="form" method="post" class="form-signin">
		  <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'send':?>
			<div class="alert alert-success">Email de recuperação enviado com sucesso!! 
				<br><a style="color:#155724;font-weight: 700;" href="<?= base_url('control/auth/login/')?>">Ir para Login</a></div>
			<?php
		break;   
	}
}
?> 
		<div class="">Esqueceu a senha?</div>
		<div class="">Digite abaixo o seu e-mail cadastrado para enviarmos as instruções de recuperação de senha.</div>
		<?php
	    echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>');
	    if(isset($ex)){
		    if($ex != ''){
			    echo '<div class="alert alert-warning" role="alert"><b>'.$ex.'</b></div>';
		    }
	    }
        
	    ?>
		
		<div class="form-group">
			<label for="login">Email</label>
			<input type="text" class="form-control form-control input-lg" name="email" id="email" placeholder="Digite seu usuário" value="<?=set_value("email")?>">
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Recuperar Senha">
			
<div class="clean"></div>
		</div>
	</form>
</div>
<div class="footer-dashboard"></div>
<!-- /// !dashboard /// -->
