<?php include ("head.php") ?>
</head>


<body id="regulamento">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar regulamento</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Editar regulamento</h1>


<!-- section -->
<section>
 
<div class="row">

<div class="col-md-12">

<div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Introdução</a></li>
                  <li ><a href="#tab-second" role="tab" data-toggle="tab">Introdução Como participar</a></li>
                  <li ><a href="#tab-three" role="tab" data-toggle="tab">Regulamento</a></li>
                  <li ><a href="#tab-four" role="tab" data-toggle="tab">Disponível 01</a></li>
                  <li ><a href="#tab-five" role="tab" data-toggle="tab">Disponível 02</a></li>
                </ul>
                <div class="panel-body tab-content">

                  <div class="tab-pane active" id="tab-first">
                    <div class="block">
                      <h2>Introdução</h2>
                      <textarea name="editor01" class="summernote"></textarea>
                    </div>
                  </div>
                  
                  <div class="tab-pane" id="tab-second">
                    <div class="block">
                      <h2>Introdução Como participar</h2>
                      <textarea class="summernote" name="editor02" ></textarea>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab-three">
                    <div class="block">
                      <h2>Regulamento</h2>
                      <textarea class="summernote" name="editor02" ></textarea>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab-four">
                    <div class="block">
                      <h2>Disponível 01</h2>
                      <textarea class="summernote" name="editor02" ></textarea>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab-five">
                    <div class="block">
                      <h2>Disponível 02</h2>
                      <textarea class="summernote" name="editor02" ></textarea>
                    </div>
                  </div>
                  
                </div>
              </div>

              </div>


</div>
</section>


</main>
</div>
</div>

<!--FOOTER-->
<?php include ("footer.php") ?> 



</html>