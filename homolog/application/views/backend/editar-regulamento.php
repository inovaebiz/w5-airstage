<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar regulamento</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
   <div class="row">
      <!--SIDEBAR-->
      <?php include ("includes/sidebar.php") ?>
      <!-- MAIN -->
      <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
         <h1>Editar regulamento</h1>
         <!-- section -->
         <?php
            if(isset($_GET['msg'])){
            	switch($_GET['msg']){
            	case 'success':?>
         <div class="alert alert-success">Regulamento salvo com sucesso!</div>
         <?php
            break;   
            }
            }
            ?> 
         <?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
         <section>
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default tabs">
                     <ul class="nav nav-tabs" role="tablist">
                        <li><a href="#tab-first" class="active" role="tab" data-toggle="tab">Introdução</a></li>
                        <li><a href="#tab-second" role="tab" data-toggle="tab">Introdução Como participar</a></li>
                        <li><a href="#tab-three" role="tab" data-toggle="tab">Regulamento</a></li>
                        <li><a href="#tab-four" role="tab" data-toggle="tab">Política</a></li>
                     </ul>
                     <div class="panel-body tab-content">
                        <div class="tab-pane active" id="tab-first">
                           <form method="POST" action="">
                           <div class="block">
                              <h2>Introdução</h2>
                              <input type="hidden" name="regulamento_id" value="1">
                              <textarea name="regulamento_texto" id="regulamento_texto" class="summernote"><?= set_value('regulamento_texto',$introducao->regulamento_texto)?></textarea>
                           </div>
                           <br>
                              <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-file-o" aria-hidden="true"></i> Salvar</button>
                           </form>
                        </div>
                        <div class="tab-pane" id="tab-second">
                           <form method="POST" action="">
                           <div class="block">
                              <h2>Introdução Como participar</h2>
                              <input type="hidden" name="regulamento_id" value="2">
                              <textarea name="regulamento_texto" id="regulamento_texto" class="summernote"><?= set_value('regulamento_texto',$introPart->regulamento_texto)?></textarea>
                           </div>
                           <br>
                              <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-file-o" aria-hidden="true"></i> Salvar</button>
                           </form>
                        </div>
                        <div class="tab-pane" id="tab-three">
                           <form method="POST" action="">
                              <div class="block">
                                 <h2>Regulamento</h2>
                                 <input type="hidden" name="regulamento_id" value="3">
                                 <textarea name="regulamento_texto" id="regulamento_texto" class="summernote"><?= set_value('regulamento_texto',$regulamento->regulamento_texto)?></textarea>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-file-o" aria-hidden="true"></i> Salvar</button>
                           </form>
                        </div>
                        <div class="tab-pane" id="tab-four">
                           <form method="POST" action="">
                              <div class="block">
                                 <h2>Política de Privacidade</h2>
                                 <input type="hidden" name="regulamento_id" value="4">
                                 <textarea name="regulamento_texto" id="regulamento_texto" class="summernote"><?= set_value('regulamento_texto',$politica->regulamento_texto)?></textarea>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-file-o" aria-hidden="true"></i> Salvar</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
   </div>
</div>