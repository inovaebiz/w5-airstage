<?php include ("head.php") ?>
</head>


<body>
<!--HEADER-->
<header>
<div class="container text-center">
<img class="logo-fujitsu" src="assets/img/logo-fujitsu-fujitsu-general-brazil.svg" alt="Família Airstage" title="Família Airstage">
</div>
</header> 

<!-- CONTAINER -->
<div class="container wrapper">
<div class="row">

<!-- LEFT -->
<div class="circle-left">

  <div class="circle-left-interno">

    <form class="form-signin" id="ja-sou-cadastrado">
      <h1 class="font-weight-normal"><span>Já sou</span> cadastrado</h1>
      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="text"  id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
      <small class="text-muted link-margin" id="link-esquecer-senha"><a href="#">Esqueci a senha</a></small>
     
      <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
    </form>

    

    <form class="form-signin" id="esqueceu-senha">
      <h1 class="font-weight-normal"><span>Esqueceu a senha?</span></h1>

      <p>Digite abaixo o seu e-mail cadastrado para 
enviarmos as instruções de recuperação de senha.</p>

      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
      <br>
     
      <button class="btn btn-lg btn-primary " type="submit">Enviar</button>
      <!-- <small class="btn btn-previous" id="link-voltar"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a></small> -->
      <button type="button" class="btn btn-previous" id="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
    </form>

    </div>


    <p class="link-campanha"><a href="tela-introdutoria.php" alt="Saiba mais sobre a campanha" title="Saiba mais sobre a campanha"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Saiba mais sobre a campanha <span>FAMÍLIA</span> AIRSTAGE</a></p>
  

</div>

<!-- RIGHT -->
<div class="circle-right">

<img class="logo-projeto" src="assets/img/logo-familia-fujitsu.svg" alt="Projeto Família Airstage" title="Projeto Família Airstage">
        <main role="main" class="inner cover">
            <h1 class="cover-heading">Quero me cadastrar!</h1>
            <p class="lead">Cadastre-se para fazer parte da <span>FAMÍLIA</span> AIRSTAGE.</p>
            <p class="lead">
            <a href="cadastro-dados-empresa.php" class="btn btn-lg btn-secondary" alt="Cadastre-se" title="Cadastre-se">Cadastrar agora <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </p>
        </main>
</div>


</div>
</div>



<!--FOOTER-->
<footer>
<div class="container wrapper">
  <div class="row">

  <div class="col-lg-8 col-md-12">
    <span class="text-muted">Todos os direitos reservados, Copyright © 2018 AIRSTAGE GENERAL.</span>
    </div>
    <!-- Copyright -->
     <div class="col-lg-4 col-md-12">
    <a href="http://w5.com.br/" target="_blank"><img class="copyright" src="assets/img/logo_w5_publicidade.svg" alt="W5" title="W5"></a>
    </div>  
    </div>
 
</div>
</footer>

</body>

</body>

<!-- Scripts -->
<?php include ("scripts.php") ?>

</html>