<!-- CONTAINER -->
<div class="container wrapper">
    <div class="row">
        <!-- LEFT -->
        <div class="circle-left esqueci">
            <div class="logo-projeto-esqueci">  
                <img class="logo-projeto" src="/assets-login/img/logo-familia-fujitsu.svg" alt="Projeto Família Airstage" title="Projeto Família Airstage">
            </div>
            <form name="form" method="post" class="form-signin" id="esqueceu-senha">        	
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
                        <h2 style="color: #ff0000; font-size: 22px;line-height: 20px;">Senha altera com sucesso!</h2>
                        <button type="button" onclick="window.location.href = '/login';" class="btn btn-finalizado">Ir para Login</button>
                    </div>
                </div>
                <h1 class="font-weight-normal"><span>Redifinir senha?</span></h1>
                <p>Entre com a nova senha abaixo.</p>
                <label for="inputSenhaSenha" class="sr-only">Nova senha</label>
                <input type="password" id="senha" class="form-control" name="cliente_senha" placeholder="Nova senha">
                <label for="inputNovaSenha" class="sr-only">Confirme a nova senha</label>
                <input type="password" id="nova_senha" class="form-control" name="resenha" placeholder="Confirme a nova senha" required>
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