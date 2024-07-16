<?php include ("head.php") ?>
</head>


<body id="registro-treinamentos">
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
<a href="registro-de-treinamentos.php" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Cadastre seus treinamentos</h1>


<!-- section -->
<section>
<div class="row">
	<!-- Form -->
	<form role="form" action="" method="post" class="f1">

   
        <!-- Endereco-empresa -->
        <fieldset>
		
		<h2>INFORME OS DADOS DO TREINAMENTO</h2> 

        <div class="row">

			
			<div class="form-group col-md-6">
                <input type="text" placeholder="Nome do treinamento*" class="form-control" id="">   
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


            <div class="form-group col-md-8">
                <select type="text"  id="" placeholder=""  class=" form-control" >
                <option value="">Nome do Responsavel*</option>
                <option value="">Lorem ipsum dolor sit amet</option>
                <option value="">Dolorum ratione voluptatum</option>
                <option value="">Quo quod excepturi dolores</option>
                
                </select>
               
            </div>


            <div class="form-group col-md-4">
                <input type="text"  placeholder="CPF*" class=" form-control" id="">
            </div>




            <div class="form-group col-md-6">
            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
            <input type="text" id="search-from-date" placeholder="Data do treinamento*" class="form-control">
            </div>


            <div class="form-group col-md-6">
			<div class="box-arquivos">
			<p>Anexar comprovante <span>(.jpg/.gif/.pdf)</span> </p>


            <label for="file-upload" class="btn btn-primary btn-arquivos">
              <i class="fa fa-upload" aria-hidden="true"></i> Subir arquivo
              </label>
              <input id="file-upload" type="file"/>


			</div>
			</div>

             </div>

            <small>(*) Campos de preenchimento obrigatório</small>  
            


             <div class="botoes-aprovacao col-md-12">
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>

            <button type="submit" class="btn btn-primary btn-filtro" href="registro-de-treinamentos.php">Concluir <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
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