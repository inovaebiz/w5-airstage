<style>
	#esqueceu-senha{
		display: block!important;
	}
	.circle-left{
		width: 410px!important;
	    height: 550px!important;
	    margin-top: 40px!important;
	    margin: 0 auto!important;
	    display: inline-table!important;
	}
</style>
</head>
<body>
<!--HEADER-->
<header>
<div class="container text-center">
<img class="logo-fujitsu" src="/assets-login/img/logo-fujitsu-fujitsu-general-brazil.svg" alt="Família Airstage" title="Família Airstage">
</div>
</header> 

<!-- CONTAINER -->
<div class="container wrapper">
<div class="row">

<!-- LEFT -->
<div class="circle-left esqueci">

  

  
  <div class="logo-projeto-esqueci">  
<img class="logo-projeto" src="/assets-login/img/logo-familia-fujitsu.svg" alt="Projeto Família Airstage" title="Projeto Família Airstage">
  </div>
    <form name="form" method="post" class="form-signin" id="esqueceu-senha">
	    <?php
	    echo validation_errors('<div class="overlay-return"></div>
<div id="inline_content" style="background-color: #fff;border-radius: 100%;
    text-align: center;
    width:400px !important;
    position: absolute!important;
    top: 120px!important;
    left: 470px!important;
    z-index: 1001!important;
    height: 400px !important;
    margin: 10px 10px 10px -12px;
    padding: 105px 50px;" class="text-center">
    <div class="col-md-12">
    
        <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">','</h2>
        <a style="color:#fff;" href="/recuperar-senha" class="btn btn-finalizado">Tente novamente</a>
    </div>
</div>');
	    if(isset($ex)){
		    if($ex != ''){
			    echo '<div class="overlay-return"></div>
<div id="inline_content" style="background-color: #fff;border-radius: 100%;
    text-align: center;
    width:400px !important;
    position: absolute!important;
    top: 120px!important;
    left: 470px!important;
    z-index: 1001!important;
    height: 400px !important;
    margin: 10px 10px 10px -12px;
    padding: 105px 50px;" class="text-center">
    <div class="col-md-12">
    
        <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">'.$ex.'</h2>
        <a style="color:#fff;" href="/recuperar-senha" class="btn btn-finalizado">Tente novamente</a>
    </div>
</div>';
		    }
	    }
        
	    ?>
	    <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'send':?>
			<div class="overlay-return"></div>
<div id="inline_content" style="background-color: #fff;border-radius: 100%;
    text-align: center;
    width:400px !important;
    position: absolute!important;
    top: 315px!important;
    left: 452px!important;
    z-index: 1001!important;
    height: 400px !important;
    margin: 10px 10px 10px -12px;
    padding: 105px 50px;" class="text-center">
    <div class="col-md-12">
    
        <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">Email de recuperação enviado com sucesso!</h2>
        <button type="button" id="btn-ok" class="btn btn-finalizado">OK</button>
    </div>
</div>
			<?php
		break;   
	}
}
?> 
      <h1 class="font-weight-normal"><span>Redefinir senha?</span></h1>

      <p>Entre com a nova senha abaixo.</p>
	  <input type="hidden" name="cliente_id" value="<?= $cliente->cliente_id ?>">
	  <input type="hidden" name="recupera_hash" value="<?= $hash ?>">
      <label for="inputEmail" class="sr-only">Nova senha</label>
      <input type="password" id="senha" class="form-control" name="cliente_senha" placeholder="Nova senha" required>
      <label for="inputEmail" class="sr-only">Confirme a nova senha</label>
      <input type="password" id="novasenha" class="form-control" name="resenha" placeholder="Confirme a nova senha" required>
      <br>
     
      <button class="btn btn-lg btn-primary" type="submit">Enviar</button>
      <!-- <small class="btn btn-previous" id="link-voltar"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a></small> -->
      <button type="submit" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
    </form>

    


    <p class="link-campanha"><a href="<?= base_url('/tela-introdutoria')?>" alt="Saiba mais sobre a campanha" title="Saiba mais sobre a campanha"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Saiba mais sobre a campanha <span>FAMÍLIA</span> AIRSTAGE</a></p>
  

</div>

</div>
</div>

<!-- Scripts -->
<?php include ("scripts.php") ?>


<script type="text/javascript">
	$('#btn-ok').on('click', function(e) {
	$('.overlay-return').fadeOut();
	$('#inline_content').fadeOut();
});
</script>