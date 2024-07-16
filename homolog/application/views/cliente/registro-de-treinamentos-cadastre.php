<?php $cliente_id = $this->session->userdata("cliente")->cliente_id;?>
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('cliente/politica/')?>">Área do cliente</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('cliente/treinamento/')?>">Registro de treinamento</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastre seu treinamento</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
<div class="row">

<!--SIDEBAR-->
<?php include ("includes/sidebar.php") ?>


<!-- MAIN -->
<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">

<!-- link-voltar -->
<a href="<?= base_url('/cliente/treinamento')?>" class="link-voltar"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>

<h1>Cadastre seus treinamentos</h1>


<!-- section -->
<section>
<div class="row">
	<!-- Form -->
	<form role="form" class="f1" method="POST" action="" enctype="multipart/form-data" id="ok">

		<?php echo validation_errors('<div class="alert alert-warning" role="alert"><b>','</b></div>'); ?>
        <!-- Endereco-empresa -->
        <fieldset>
		
		<h2>INFORME OS DADOS DO TREINAMENTO</h2> 

        <div class="row">
			<input type="hidden" name="treinamento_cliente_id" value="<?= $cliente_id ?>">   
			<div class="form-group col-md-6">
                <input type="text" value="<?= set_value('treinamento_nome')?>" name="treinamento_nome" id="treinamento_nome" placeholder="Nome do participante*" class="form-control">   
            </div>
            

            <div class="form-group col-md-6">
                <input type="text" value="<?= set_value('treinamento_cliente',$cliente->cliente_razao_social)?>" readonly="readonly" name="treinamento_cliente" id="treinamento_cliente" placeholder="Nome do cliente*" class="form-control">   
            </div>


			<!--div class="form-group col-md-6">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" value="<?= set_value('treinamento_cep')?>" name="treinamento_cep" id="cep"  placeholder="CEP*" class=" form-control cep"> 
                <a onclick="consultaCEP($('#cep').val())" class="search-cep"><i style="color:#ff0000;cursor: pointer;" class="fa fa-search" aria-hidden="true"></i></a> 
                <span class="search-load"><img src="/assets-cliente/img/loader.gif"></span>   
            </div-->
            
            <!--div class="form-group col-md-6">
            <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank" class="search-cep"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Não sei meu CEP</a>
           </div-->
            

            <!--div class="form-group col-md-6">
             <input type="text" value="<?= set_value('treinamento_endereco')?>" name="treinamento_endereco" id="endereco" placeholder="Endereço*" class=" form-control" readonly="readonly">
            </div-->

            <!--div class="form-group col-md-2">
                <input type="text" value="<?= set_value('treinamento_numero')?>" name="treinamento_numero" id="numero" placeholder="Número*" class=" form-control">
            </div-->

            <!--div class="form-group col-md-4">
                <input type="tel" value="<?= set_value('treinamento_complemento')?>" name="treinamento_complemento" id="complemento" placeholder="Complemento" class=" form-control">
            </div>

           
            <div class="form-group col-md-5">
                <input type="text" value="<?= set_value('treinamento_bairro')?>" name="treinamento_bairro" id="bairro" placeholder="Bairro*" class="f1-bairro form-control">
            </div>-->

            <div class="form-group col-md-5">
                <input type="text" value="<?= set_value('treinamento_cidade')?>" name="treinamento_cidade" id="cidade"  placeholder="Cidade*" class="f1-cidade form-control">
            </div>


            <div class="form-group col-md-2">
                <select type="text" placeholder="Estado*" value="<?= set_value('treinamento_estado')?>" name="treinamento_estado" id="estado" class="form-control">
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


            <!--<div class="form-group col-md-8">
                <input type="text" value="<?= set_value('treinamento_responsavel',$cliente->cliente_responsavel)?>" readonly="readonly" name="treinamento_responsavel" id="treinamento_responsavel" placeholder="Nome do Responsavel*"  class=" form-control">
               
            </div>


            <div class="form-group col-md-4">
                <input type="text" value="<?= set_value('treinamento_cpf')?>" name="treinamento_cpf" id="treinamento_cpf" placeholder="CPF*" class=" form-control">
            </div>-->



            <div class="form-group col-md-5">
            <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
            <input type="text" value="<?= set_value('treinamento_data')?>" name="treinamento_data" id="block-date" placeholder="Data do treinamento*" class="form-control" autocomplete="off" readonly>
            </div>
			<div class="form-group col-md-6">
				<div class="box-arquivos">
					<p>ANEXAR CERTIFICADO<span>(.jpg/.gif/.pdf)</span> </p>
		
					<input id="selecao-arquivo1" class="btn" name="treinamento_anexo_comprovante" type='file' style="display:inline" required>
					<!--label for="selecao-arquivo1" class="btn btn-primary btn-arquivos">
					<i class="fa fa-upload" aria-hidden="true"></i>
					Subir arquivo</label-->
				</div>
			</div>

            </div>

            <small>(*) Campos de preenchimento obrigatório</small>  
            


             <div class="botoes-aprovacao col-md-12">
            <button class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>

            <button type="submit" onclick="valida();" class="btn btn-primary btn-filtro">Concluir <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
            </div>
        </fieldset>

      

	
	</form>



</div>
</section>

</main>

</div>
</div>
<script>
	 function consultaCEP(CEP) {
	   var er = new RegExp(/^[0-9]{5}\-?[0-9]{3}$/);
	   if(er.test(CEP) != '') {
	   $(".search-cep").hide();
	   $(".search-load img").show();
	   	$.ajax( {
	   		url: "<?=base_url('ajax/cep')?>",
	   		type: 'GET',
	   		data: "tpA=buscaCEP&cep="+escape(CEP),
	   		dataType:"json",
	   		success: function(dados)
	   		{
	   			console.log(dados);
	   			if(dados.status == 1)
	   			{
	   				$("#endereco").val(dados.dados.logradouro);
	   				$("#bairro").val(dados.dados.bairro);
	   				$("#cidade").val(dados.dados.cidade);
	   				$("#estado").val(dados.dados.uf);
	   				$(".search-load img").hide();
	   				$(".search-cep").show();
	   				
	   			}else
	   			{
	   				$("#endereco").val('');
	   				$("#bairro").val('');
	   				$("#cidade").val('');
	   				$("#estado").val('');
	   				alert(dados.msgErro);
	   			}
	   		},
	   		error: function(dados)
	   		{
	   			console.log(dados);
	   			$('#endereco').attr('readonly', false);
	   			$("#bairro").attr('readonly', false);
	   			$("#cidade").attr('readonly', false);
	   			$("#estado").attr('readonly', false);
	   		}
	   	});
	   }else{
		   alert('O campo CEP não pode ficar fazio!');
	   }
   }
</script>
<script>
	function valida(){
		var arq = $("#selecao-arquivo").val();  
		var msg = '';
		if(arq == ''){
			msg += 'Por favor anexar Nota Fiscal de Venda\n';
		}
		if(msg != ''){
			alert(msg);
		}
	}
</script>