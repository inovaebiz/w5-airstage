<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica')?>">Área do cliente</a></li>
        <li class="breadcrumb-item active" aria-current="page">Atendimento</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
   <div class="row">
      <!--SIDEBAR-->
      <?php include ("includes/sidebar.php") ?>
      <!-- MAIN -->
      <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
         <h1>Atendimento</h1>
         <section>
	           <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
		case 'send':?>
			<div class="alert alert-success"> Mensagem enviada com sucesso!</div>
			<?php
		break;   
	}
}
?> 
          <?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
		  <div class="row">   
               <!-- Form -->
               <form class="form-inline" method="POST" action="">
                  <div class="input-group col-md-12">
                     <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto*"> 
                  </div>
                  <div class="input-group col-md-12">
                     <textarea cols="30" rows="5" name="mensagem" id="mensagem" class="form-control" placeholder="Mensagem*"></textarea> 
                  </div>
                  <span class="caracter">500 caracteres restantes </span>
                  <div class="botoes-aprovacao col-md-12">
                     <div class="row">
                        <div class="col-md-9">
                           <span class="caracter-b">* Todos os campos são de preenchimento obrigatório</span>
                        </div>
                        <div class="col-md-3">
                           <button type="reset" class="btn btn-limpar"> Limpar</button>
                           <button type="submit" class="btn btn-primary btn-filtro">Enviar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </section>
      </main>
   </div>
</div>