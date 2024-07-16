<?php include ("head.php") ?>
</head>


<body id="registro-obras">
<!--HEADER-->
<?php include ("header.php") ?>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Área do cliente</a></li>
    <li class="breadcrumb-item active"><a href="registro-de-obras-listagem.php">Registro de obras</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastre sua obra</li>
  </ol>
</nav>


<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("sidebar.php") ?>


<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

<!-- link-voltar -->
<a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Cadastre sua obra</h1>


<!-- section -->
<section>
<div class="row">
	<!-- Form -->
	<form role="form" action="" method="post" class="f1">

   
        <!-- Endereco-empresa -->
        <fieldset>
		
		<h2>INFORME OS DADOS DA OBRA</h2> 

        <div class="row">

			
			<div class="form-group col-md-6">
                <input type="text" placeholder="Nome da obra*" class="form-control" id="">   
            </div>

            <div class="form-group col-md-6">
                <input type="text" placeholder="Nome do cliente*" class="form-control" id="">   
            </div>


			<div class="form-group col-md-6">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text"  placeholder="CEP*" class=" form-control" id="">   
            </div>
            
            <div class="form-group col-md-6">
            <a href="#" class="search-cep"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Não sei meu CEP</a>
           </div>
            

            <div class="form-group col-md-6">
             <input type="text" placeholder="Endereço*" class=" form-control" id="">
            </div>

            <div class="form-group col-md-2">
                <input type="text" placeholder="Número*" class=" form-control" id="">
            </div>

            <div class="form-group col-md-4">
                <input type="" placeholder="Complemento" class=" form-control" id="">
            </div>

           
            <div class="form-group col-md-5">
                <input type="text"  placeholder="Bairro*" class="f1-bairro form-control" id="">
            </div>

            <div class="form-group col-md-5">
                <input type="text"  placeholder="Cidade*" class="f1-cidade form-control" id="">
            </div>


            <div class="form-group col-md-2">
                <select type="text"  id="" placeholder="Estado*"  class=" form-control" >
                <option value="">Estado*</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                </select>
               
            </div>


            <div class="form-group col-md-4">
                <select type="text"  id="" placeholder="Aplicação*"  class=" form-control" >
                <option value="">Aplicação*</option>
                <option value="">Lorem ipsum dolor sit amet</option>
                <option value="">Dolorum ratione voluptatum</option>
                <option value="">Quo quod excepturi dolores</option>
                
                </select>
               
            </div>


            <div class="form-group col-md-4">
            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
            <input type="text" id="search-from-date" placeholder="Data da instalação*" class="form-control">
            </div>


            <div class="form-group col-md-4">
                <input type="text"  placeholder="Nota fiscal do distribuidor*" class=" form-control" id="">
            </div>


              <div class="form-group col-md-4">
                <select type="text"  id="" placeholder="Distribuidor*"  class=" form-control" >
                <option value="">Distribuidor*</option>
                <option value="">Lorem ipsum dolor sit amet</option>
                <option value="">Dolorum ratione voluptatum</option>
                <option value="">Quo quod excepturi dolores</option>
                
                </select>
               
            </div>


            <div class="form-group col-md-4">
            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
            <input type="text" id="search-from-date" placeholder="Data da nota fiscal do distribuidor*" class="form-control">
            </div>

             </div>

            <small>(*) Campos de preenchimento obrigatório</small>  
            
			<div class="row">
			<div class="form-group col-md-6">
			<div class="box-arquivos">
			<p>Anexar nota fiscal de venda <span>(.jpg/.gif/.pdf)</span> </p>

      <label for="file-upload" class="btn btn-primary btn-arquivos">
      <i class="fa fa-upload" aria-hidden="true"></i> Subir arquivo
      </label>
      <input id="file-upload" type="file"/>
			</div>
			</div>

			

			<div class="form-group col-md-6">
			<div class="box-arquivos">
			<p>Anexar nota fiscal de instalação<span>(.jpg/.gif/.pdf)</span> </p>

      <label for="file-upload" class="btn btn-primary btn-arquivos">
      <i class="fa fa-upload" aria-hidden="true"></i> Subir arquivo
      </label>
      <input id="file-upload" type="file"/>
			
			</div>
			</div>
			</div>


            <div class="botoes-aprovacao col-md-12">
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
            <button type="button" class="btn btn-next">Avançar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
        </fieldset>

      


        <!-- Autenticacao -->
        <fieldset>
      
		<h2>Insira os equipamentos Airstage instalados</h2> 


        <div class="row form-cadastro">
			
			<div class="col-md-12"><p>Selecione os equipamentos que fazem parte do kit instalado. <strong>Cada kit é formado por 1 condensador e seus evaporadores.</strong></p><br></div>

  
  
   <div class="input-group col-md-12">
    
    <select name="" id="" class="form-control">
      <option value="">Categoria</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>
<!-- 
  <div class="input-group col-md-2 offset-md-4">
    <button type="submit" class="btn btn-primary btn-filtro"> <i class="fa fa-plus" aria-hidden="true"></i> Inserir Kit</button>
  </div> -->


    <div class="input-group col-md-6">
    
    <select name="" id="" class="form-control">
      <option value="">Condesador</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>

	<div class="input-group col-md-4">
    <input type="text"  placeholder="Número de série" class=" form-control" id="">
  </div>






	<div class="input-group col-md-6">
    
    <select name="" id="" class="form-control">
      <option value="">Evaporador</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>


	<div class="input-group col-md-4">
    <input type="text"  placeholder="Número de série" class=" form-control" id="">
  </div>
  

  	<div class=" col-md-2">
    

    <a class="btn btn-primary btn-labeled" href="" role="button">

<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>Evaporador</span></a>
  </div>




</div>


<div class="row">
<div class="col-md-12">
  <button type="button" class="btn btn-primary btn-inserir"> Inserir Kit</button>
</div>
</div>





  <table id="lista-padrao" class="display table-interna table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="25%">CATEGORIA</th>
      <th width="30%">CONDENSADOR</th>
      <th width="30%">EVAPORADORES</th>
      <!-- <th width="5%"></th> -->
      <th width="15%"></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>High Wall Quente e Frio</td>
      <td>Sistema Multi-Split  2, 3 e 
        4 Ambientes (AOBG14LAC2)
        Número de série: u654321</td>
      <td>
        Compacto com sensor de presença (asbg09lmca)
        Número de série: U415263 <br>
      Compacto com sensor de presença (asbg09lmca)
        Número de série: U415263 <br>
     Compacto com sensor de presença (asbg09lmca)
        Número de série: U415263</td>
     <!--  <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td> -->

       <td class="pontos"> + 12 PONTOS </td>
    </tr>

    
    <tr >
      <td>Cassete</td>
      <td>Sistema Multi-Split  2, 3 e 
        4 Ambientes (AOBG14LAC2)
        Número de série: u654321</td>
      <td>Compacto com sensor de presença (asbg09lmca)
        Número de série: U415263</td>
      <!-- <td> <a href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td> -->

       <td class="pontos"> + 5 PONTOS </td>
    </tr>

  </tbody>
</table>

<!-- Tabela -->
    <table class="table tabela-pontos">
  
  <tbody>
    
    <tr >
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados nesta etapa</td>
 
      <td class="no-border total" width="30%"> 8 PONTOS </td>
    </tr>

  </tbody>
</table>




        <div class="botoes-aprovacao col-md-12">
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
            <button type="button" class="btn btn-next">Avançar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
    </fieldset>




        <!-- Regulamento -->
        <fieldset>
      
		<h2>Insira os equipamentos Airstage instalados de outras marcas</h2> 


        <div class="row form-cadastro">
			
			 
  
   <div class="input-group col-md-3">
    
    <select name="" id="" class="form-control">
      <option value="">Marca</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>

	 <div class="input-group col-md-3">
    
    <select name="" id="" class="form-control">
      <option value="">Categoria</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>

  <div class="input-group col-md-3">
    
    <select name="" id="" class="form-control">
      <option value="">Quantidade</option>
      <option value="">Equipamento 1</option>
      <option value="">Equipamento 2</option>
      <option value="">Equipamento 3</option>

    </select>
  </div>


  <div class="col-md-3">
    

    <a class="btn btn-primary btn-labeled" href="#" role="button">
<span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i> Inserir Equipamento</span></a>
  </div>

</div>


	  <table id="lista-padrao" class="display table table-striped table-bordered dt-responsive nowrap">
    <thead class="thead-light">
    <tr>
      
      <th width="20%">MARCA</th>
      <th width="55%">MODELO DO PRODUTO</th>
      <th width="10%">QUANTIDADE</th>
      <th width="15%"></th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Daikin</td>
      <td>High Wall Quente e Frio</td>
      <td>2</td>
      

      <td class="pontos"> + 4 PONTOS </td>
    </tr>


     <tr>
      <td>Daikin</td>
      <td>High Wall Quente e Frio</td>
      <td>2</td>
      

      <td class="pontos"> + 4 PONTOS </td>
    </tr>
  </tbody>
</table>


<!-- Tabela -->
    <table class="table tabela-pontos">
  
  <tbody>
    
    <tr >
      <td class="no-border" width="20%"></td>
      <td class="no-border total-acumulado" width="50%">Total de pontos acumulados nesta etapa</td>
 
      <td class="no-border total" width="30%"> 8 PONTOS </td>
    </tr>

  </tbody>
</table>




        <div class="botoes-aprovacao col-md-12">
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>

            <button type="submit" class="btn btn-primary btn-filtro" href="registro-de-obras-listagem.php">Concluir <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
    </fieldset>
	
	</form>



</div>
</section>

<!-- link-voltar -->
<!-- <a href="registro-de-obras-listagem.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a> -->

</main>

</div>
</div>








<!--FOOTER-->
<?php include ("footer.php") ?>

         
 
</html>