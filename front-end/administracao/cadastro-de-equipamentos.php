<?php include ("head.php") ?>
</head>


<body id="cadastro-equipamentos">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="adm-dashboard-inicial.php">Administrador</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de equipamentos</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>

<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">


<h1>Cadastro de equipamentos Airstage</h1>


<!-- section -->
<section>
 


 <!-- Form -->
<form class="form-cadastro">

<div class="row">
  <div class="input-group  col-sm-8 col-md-9 col-lg-9 col-xl-9">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Nome"> 
  </div>


 
  <div class="f1-buttons col-sm-4 col-md-3 col-lg-3 col-xl-3">
 <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="ativar" checked>
    <label class="onoffswitch3-label" for="ativar">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
</div>
</div>
  
  
   <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    
    <select name="" id="" class="form-control">
      <option value="">Sub-categoria</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>


  <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    
    <select name="" id="" class="form-control">
      <option value="">Tipo</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>


  <div class="input-group col-sm-6 col-md-3 col-lg-3 col-xl-3">
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="pontos"> 
  </div>

  <div class="f1-buttons col-sm-6 col-md-3 col-lg-3 col-xl-3">
  <button type="button" class="btn btn-primary btn-labeled ">
  <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Novo Equipamento</span></button>
  </div>



</div>
</form>


<div class="row">
<div class="col-md-12">

<h2>EQUIPAMENTOS Cadastrados</h2> 

<!-- Tabela -->
   <table id="lista-padrao" class="display table  dt-responsive nowrap ">
    <thead class="thead-light">
    <tr>
      
      <th width="40%">NOME</th>
      <th>SUB-CATEGORIA</th>
      <th>TIPO</th>
      <th >STATUS</th>
      <th>PONTUAÇÃO</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="High Wall Quente e Frio" maxlength="100" class="form-control form-control-interno"></td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Categoria Principal" maxlength="100" class="form-control form-control-interno"></td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="----------------------" maxlength="100" class="form-control form-control-interno"></td>
      
      <td> <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-01" checked>
    <label class="onoffswitch3-label" for="status-01">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
    </div>
    </td>
      <td class="pontos"> 6 PONTOS </td>
      <td>
      <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
      </td>
      
    </tr>

      <!-- Table-primary -->
      <tr class="table-primary">
      <td><input type="text" rows="4" id="nome" name="lsm_catal_prod_cat_nome" value="• Sistema Multi-Split 2, 3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="High Wall Quente e Frio" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="CONDENSADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-02" checked>
        <label class="onoffswitch3-label" for="status-02">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 4 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>


        <!-- Table-second -->
      <tr class="table-second">
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="- Compacto com
sensor de presença (ASBG09LMCA)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Sistema Multi-Split 
2,3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="EVAPORADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-03" checked>
        <label class="onoffswitch3-label" for="status-03">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 4 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>

          <!-- Table-second -->
      <tr class="table-second">
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="- Compacto com
sensor de presença (ASBG09LMCA)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Sistema Multi-Split 
2,3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="EVAPORADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-04" checked>
        <label class="onoffswitch3-label" for="status-04">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 3 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>


     <tr>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Cassete" maxlength="100" class="form-control form-control-interno"></td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Categoria Principal" maxlength="100" class="form-control form-control-interno"></td>
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="----------------------" maxlength="100" class="form-control form-control-interno"></td>
      
      <td> <div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-05" checked>
    <label class="onoffswitch3-label" for="status-05">
        <span class="onoffswitch3-inner">
           
            <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
          <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
        </span>
    </label>
    </div>
    </td>
      <td class="pontos"> 6 PONTOS </td>
      <td>
      <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
      </td>
      
    </tr>


       <!-- Table-primary -->
      <tr class="table-primary">
      <td><input type="text" rows="4" id="nome" name="lsm_catal_prod_cat_nome" value="• Sistema Multi-Split 2, 3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="High Wall Quente e Frio" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="CONDENSADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-06" checked>
        <label class="onoffswitch3-label" for="status-06">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 4 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>


        <!-- Table-second -->
      <tr class="table-second">
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="- Compacto com
sensor de presença (ASBG09LMCA)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Sistema Multi-Split 
2,3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="EVAPORADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-07" checked>
        <label class="onoffswitch3-label" for="status-07">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 4 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>

          <!-- Table-second -->
      <tr class="table-second">
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="- Compacto com
sensor de presença (ASBG09LMCA)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Sistema Multi-Split 
2,3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="EVAPORADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-08" checked>
        <label class="onoffswitch3-label" for="status-08">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 3 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>


         <!-- Table-primary -->
      <tr class="table-primary">
      <td><input type="text" rows="4" id="nome" name="lsm_catal_prod_cat_nome" value="• Sistema Multi-Split 2, 3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="High Wall Quente e Frio" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="CONDENSADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="status-09" checked>
        <label class="onoffswitch3-label" for="status-09">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 4 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>


        <!-- Table-second -->
      <tr class="table-second">
      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="- Compacto com
sensor de presença (ASBG09LMCA)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="Sistema Multi-Split 
2,3 e 4 Ambientes (AOBG14LAC2)" maxlength="100" class="form-control form-control-interno"></td>

      <td><input type="text" id="nome" name="lsm_catal_prod_cat_nome" value="EVAPORADOR" maxlength="100" class="form-control form-control-interno"></td>

       <td> <div class="onoffswitch3">
        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
        <label class="onoffswitch3-label" for="myonoffswitch3">
            <span class="onoffswitch3-inner">
               
                <span class="onoffswitch3-active">Desativar<span class="onoffswitch3-switch">Ativo</span></span>
              <span class="onoffswitch3-inactive">Ativar<span class="onoffswitch3-switch">Inativo</span></span>
            </span>
        </label>
        </div>
        </td>
          <td class="pontos"> 4 PONTOS </td>
          <td>
          <a href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
          </td>
          
        </tr>

    
        

  </tbody>
</table>

</div>


</div>
</section>


</main>
</div>
</div>

<!--FOOTER-->
<?php include ("footer.php") ?> 


</html>