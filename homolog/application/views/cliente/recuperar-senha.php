<!-- CONTAINER -->
<div class="container wrapper">
    <div class="row">
        <!-- LEFT -->
        <div class="circle-left esqueci">
            <div class="logo-projeto-esqueci">  
                <img class="logo-projeto" src="<?php echo base_url(); ?>assets-login/img/logo-familia-airstage.svg" alt="Projeto Família Airstage" title="Projeto Família Airstage">
            </div>
            <form name="form" method="post" class="form-signin" id="esqueceu-senha">
                <?php
                echo validation_errors('<div class="overlay-return"></div>
                <div id="inline_content" style="background-color: #fff;border-radius: 100%;
                    text-align: center;
                    width:400px !important;
                    position: absolute!important;
                    top: 100px!important;
                    left: 470px!important;
                    z-index: 1001!important;
                    height: 400px !important;
                    margin: 10px 10px 10px -12px;
                    padding: 105px 50px;" class="text-center">
                    <div class="col-md-12">
                    
                        <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">','</h2>
                        <button type="button" id="btn-ok" class="btn btn-finalizado">Tente novamente</button>
                    </div>
                </div>');
                if(isset($ex)){
                    if($ex != ''){
                	    echo '<div class="overlay-return"></div>
                <div id="inline_content" style="background-color: #fff;border-radius: 100%;
                    text-align: center;
                    width:400px !important;
                    position: absolute!important;
                    top: 100px!important;
                    left: 470px!important;
                    z-index: 1001!important;
                    height: 400px !important;
                    margin: 10px 10px 10px -12px;
                    padding: 105px 50px;" class="text-center">
                    <div class="col-md-12">
                    
                        <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">'.$ex.'</h2>
                        <button type="button" id="btn-ok" class="btn btn-finalizado">Tente novamente</button>
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
                            top: 255px!important;
                            left: 452px!important;
                            z-index: 1001!important;
                            height: 400px !important;
                            margin: 10px 10px 10px -12px;
                            padding: 105px 50px;" class="text-center">
                            <div class="col-md-12">
                            
                                <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">Email de recuperação enviado com sucesso!</h2>
                                <button type="button" onclick="window.location.href = '<?php echo base_url(); ?>login';" class="btn btn-finalizado">OK</button>
                            </div>
                        </div>
                			<?php
                		break;
            	   }
                }
                ?> 
                <h1 class="font-weight-normal"><span>Esqueceu a senha?</span></h1>

                <p>Digite abaixo o seu e-mail cadastrado para enviarmos as instruções de recuperação de senha.</p>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" id="inputEmailRecu" class="form-control" name="email" placeholder="E-mail" required autofocus>
                <br>

                <button class="btn btn-lg btn-primary" type="submit">Enviar</button>
                <!-- <small class="btn btn-previous" id="link-voltar"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a></small> -->
                <button type="button" onclick="window.location.href = '<?php echo base_url(); ?>login';" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
            </form>
            <p class="link-campanha">
                <a href="<?= base_url('/tela-introdutoria')?>" alt="Saiba mais sobre a campanha" title="Saiba mais sobre a campanha"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Saiba mais sobre a campanha <span>FAMÍLIA</span> AIRSTAGE</a>
            </p>
        </div>
    </div>
</div>

<!-- Scripts -->
<?php include ("scripts.php") ?>