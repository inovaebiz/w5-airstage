<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('login') ?>">Login</a></li>
        <li class="breadcrumb-item active" aria-current="page">CADASTRE-SE</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="top-content">
    <div class="container wrapper text-center">
        <div class="row">
            <div class="col-md-12 form-box">
                <form role="form" action="" method="post" class="f1">

                    <h3>Cadastre-se</h3>
                    <p> Preencha seu cadastro e faça parte da <span>FAMÍLIA</span> AIRSTAGE</p>
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="48" data-number-of-steps="3" style="width: 48%;"></div>
                        </div>
                        <div class="f1-step active step-left">
                            <div class="f1-step-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            <p>Dados da empresa</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            <p>Endereço da empresa</p>
                        </div>
                        <div class="f1-step step-right">
                            <div class="f1-step-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            <p>Autenticação</p>
                        </div>
                    </div>


                    <!-- Dados-empresa -->
                    <fieldset>
                        <div class="form-wrapper">
                            <div class="form-group">
                                <label class="sr-only" for="f1-razao-social">Razão Social*</label>
                                <input type="text" name="cliente_razao_social" placeholder="Razão Social*" class="f1-razao-social form-control" id="f1-razao-social" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="f1-cnpj">CNPJ*</label>
                                <input type="text" data-mask="00.000.000/0000-00" name="cliente_cnpj" placeholder="CNPJ*" class="f1-cnpj form-control" id="f1-cnpj" onblur="validarCnpjCpf('f1-cnpj')" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="f1-responsavel">Nome Completo do Proprietário*</label>
                                <input type="text" name="cliente_responsavel" placeholder="Nome Completo do Proprietário*" class="f1-responsavel form-control" id="f1-responsavel" required>
                            </div>
                            <div class="form-group">
                                <select name="cliente_credenciado" class="f1-responsavel form-control" id="cliente_credenciado" required>
                                    <option value="0">Credenciado?*</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="f1-cpf">CPF do Proprietário*</label>
                                <input type="text" data-mask="000.000.000-00" name="cliente_cpf" placeholder="CPF do Proprietário*" class="f1-cpf form-control" id="f1-cpf" required onblur="validarCnpjCpf('f1-cpf')">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="f1-data-nascimento">Data de Nascimento do Proprietário*</label>
                                <input type="text" data-mask="00/00/0000" name="cliente_data_nascimento" placeholder="Data de Nascimento do Proprietário*" class="f1-data-nascimento form-control" id="f1-data-nascimento">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="f1-email">E-mail*</label>
                                <input type="email" name="cliente_email" placeholder="E-mail*" class="f1-email form-control" id="f1-email" onblur="validEMAIL()">
                            </div>

                            <div class="row">


                                <div class="form-group col-md-6 ">
                                    <label class="sr-only" for="f1-celular">Celular/WhatsApp</label>
                                    <input type="tel" data-mask="(00)00000-0000" name="cliente_celular" placeholder="Celular/WhatsApp*" class="f1-celular form-control" id="f1-celular" autocomplete="off" onblur="validaTelefone()">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="sr-only" for="f1-telefone">Telefone</label>
                                    <input type="text" data-mask="(00)0000-0000" name="cliente_telefone" placeholder="Telefone" class="f1-telefone form-control" id="f1-telefone" autocomplete="off" onblur="validaTelefone()">
                                </div>
                            </div>

                            <div class="form-group">
                                <select name="distribuidores_parceiros[]" title="Distribuidores Parceiros *" id="distribuidores_parceiros" class="form-control selectpicker" multiple data-live-search="true" onchange="validForm()" required>
                                </select>
                            </div>

                            <small>(*) Campos de preenchimento obrigatório</small>

                        </div>



                        <div class="f1-buttons parceiros">
                            <button type="button" class="btn btn-next" value="1">Próximo</button>
                        </div>
                    </fieldset>


                    <!-- Endereco-empresa -->
                    <fieldset>
                        <div class="form-wrapper">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="sr-only">CEP*</label>
                                    <input type="tel" name="cliente_cep" placeholder="CEP*" class="form-control cep" id="cep">
                                    <a onClick="consultaCEP($('#cep').val())" class="search-cep"><i style="color:#ff0000;cursor: pointer;" class="fa fa-search" aria-hidden="true"></i></a>
                                    <span class="search-load" style="display:none"><img src="<?php echo base_url(); ?>assets-cliente/img/loader.gif"></span>
                                </div>

                                <div class="form-group col-md-6">
                                    <a target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="search-cep"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Não sei meu CEP</a>
                                </div>




                                <div class="form-group col-md-6">
                                    <label class="sr-only" for="f1-endereco">Endereço*</label>
                                    <input type="text" name="cliente_endereco" placeholder="Endereço*" class="f1-endereco form-control" id="endereco">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="sr-only" for="f1-numero">Número*</label>
                                    <input type="text" name="cliente_numero" placeholder="Número*" class="f1-numero form-control" id="numero">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="sr-only" for="f1-complemento">Complemento</label>
                                    <input type="tel" name="cliente_complemento" placeholder="Complemento" class="f1-complemento form-control" id="complemento">
                                </div>



                                <div class="form-group col-md-3">
                                    <label class="sr-only" for="f1-bairro">Bairro*</label>
                                    <input type="text" name="cliente_bairro" placeholder="Bairro*" class="f1-bairro form-control" id="bairro">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="sr-only" for="f1-cidade">Cidade*</label>
                                    <input type="text" name="cliente_cidade" placeholder="Cidade*" class="f1-cidade form-control" id="cidade">
                                </div>


                                <div class="form-group col-md-3">
                                    <label class="sr-only" for="f1-estado">Estado*</label>
                                    <select type="text" name="cliente_estado" id="estado" placeholder="Estado*" class="f1-estado form-control">
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

                            </div>

                            <small>(*) Campos de preenchimento obrigatório</small>
                        </div>

                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left step-2" aria-hidden="true"></i> Voltar</button>
                            <button type="button" class="btn btn-next" value="2">Próximo</button>
                        </div>
                    </fieldset>


                    <!-- Autenticacao -->
                    <fieldset>
                        <div class="form-wrapper">
                            <h4>Cadastre sua senha de acesso</h4>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="sr-only" for="f1-senha">Senha</label>
                                    <input type="password" name="cliente_senha" placeholder="Senha" class="f1-senha form-control" id="f1-senha">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="sr-only" for="f1-repetir-senha">Repetir Senha</label>
                                    <input type="password" name="resenha" placeholder="Repetir Senha" class="f1-repetir-senha form-control" id="f1-repetir-senha">
                                </div>
                            </div>

                            <div class="descricao-senha">
                                <p>1. A senha deve conter ao menos 8 caracteres, números e letras, sendo uma maiúscula;</p>
                                <p>2. O login será o e-mail cadastrado nos Dados da empresa.</p>
                            </div>

                        </div>


                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left step-3" aria-hidden="true"></i> Voltar</button>
                            <button type="button" class="btn btn-next" value="3">Próximo</button>
                        </div>
                    </fieldset>




                    <!-- Regulamento -->
                    <fieldset>

                        <h2>Quase lá!</h2>
                        <p>Leia abaixo o Regulamento da campanha <span>FAMÍLIA</span> AIRSTAGE para finalizar seu cadastro.</p>

                        <div class="box-regulamento">

                            <div class="regulamento">

                                <?= $politica->regulamento_texto ?>

                            </div>
                        </div>


                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onClick="if($(this).is(':checked')) $('.btn-finalizado').attr('disabled', false); else $('.btn-finalizado').attr('disabled', true);">
                            <label class="form-check-label" for="exampleCheck1">Declaro ter lido e estar de acordo com o <span>Regulamento da Campanha Família Airstage</span></label>
                        </div>


                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left step-4" aria-hidden="true"></i> Voltar</button>

                            <!-- <p><a class='inline btn' href="#inline_content">Finalizar cadastro</a></p> -->
                            <button type="submit" class="btn btn-finalizado btn btn-next" disabled="">Finalizar cadastro</button>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>

    </div>
</div>
<!-- JANELA-LOGIN -->
<div style='display:none'>

    <div id="inline_content" class="text-center">
        <div class="col-md-12">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets-login/img/icone-final.png" alt="Família Airstage" title="Família Airstage">

            <h2>Cadastro realizado com sucesso!</h2>
            <p>Seu cadastro foi enviado para moderação. Em até 2 dias úteis
                enviaremos um e-mail para ativação da sua conta.</p>

            <button type="button" id="btn-final" class="inline btn btn-finalizado">OK</button>


        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        document.querySelector(".loader").style.display = "none"
    }, 3000)

    function consultaCEP(CEP) {
        var er = new RegExp(/^[0-9]{5}\-?[0-9]{3}$/);
        if (er.test(CEP) != '') {
            $(".search-cep").hide();
            $(".search-load img").show();
            $.ajax({
                url: "<?= base_url('ajax/cep') ?>",
                type: 'GET',
                data: "tpA=buscaCEP&cep=" + escape(CEP),
                dataType: "json",
                success: function(dados) {
                    console.log(dados);
                    if (dados.status == 1) {
                        $("#endereco").val(dados.dados.logradouro);
                        $("#bairro").val(dados.dados.bairro);
                        $("#cidade").val(dados.dados.cidade);
                        $("#estado").val(dados.dados.uf);
                        $(".search-load img").hide();
                        $(".search-cep").show();

                    } else {
                        $("#endereco").val('');
                        $("#bairro").val('');
                        $("#cidade").val('');
                        $("#estado").val('');
                    }
                },
                error: function(dados) {
                    console.log(dados);
                    $('#endereco').attr('readonly', false);
                    $("#bairro").attr('readonly', false);
                    $("#cidade").attr('readonly', false);
                    $("#estado").attr('readonly', false);
                }
            });
        } else {
            alert('O campo CEP não pode ficar fazio!');
        }
    }

    function validaTelefone() {
        let telefone = document.getElementById('f1-telefone').value;
        if (telefone === "") {
            document.getElementById('f1-telefone').value = 'Telefone';
        }
    }

    function validaData() {
        let a = document.querySelector("#obra_data_instalacao").value;

        // Extrai o ano, mês e dia de cada data
        const [anoA, mesA, diaA] = a.split("-").map(Number);
        const [anoB, mesB, diaB] = b.split("-").map(Number);

        // Compara os anos
        if (anoA > anoB) {
            return 1; // 'a' é maior que 'b'
        } else if (anoA < anoB) {
            $("#obra_data_instalacao").val("")
            alert("Data inválida")
        }

        // Se os anos forem iguais, compara os meses
        if (mesA > mesB) {
            return 1; // 'a' é maior que 'b'
        } else if (mesA < mesB) {
            $("#obra_data_instalacao").val("")
            alert("Data inválida")
        }

        // Se os meses forem iguais, compara os dias
        if (diaA > diaB) {
            return 1; // 'a' é maior que 'b'
        } else if (diaA < diaB) {
            $("#obra_data_instalacao").val("")
            alert("Data inválida")
        }

        // As datas são iguais
        return 0;
    }

    function validForm() {
        let parceiros = document.querySelector("#distribuidores_parceiros");
        if (parceiros.value !== "") {
            document.querySelector(".parceiros").style.display = 'block';
        } else {
            document.querySelector(".parceiros").style.display = 'none'

        }
    }
</script>
<!-- Scripts -->
<?php include("scripts.php") ?>

<?php
if ($camp) {
    echo "<script> let b = '$camp->campanha_data_inicial';  console.log(b)</script> ";
}
?>

<style>
    .parceiros {
        display: none;
    }
</style>

<script>
    /*
    const distribuidores = [
        'AAC', 'ADIAS', 'ARMAZENS GERAIS TRIANON', 'BAUER AR CONDICIONADO E REFRIGERACAO', 'BEM ESTAR & JFS REFRIGERACAO',
        'BHP', 'CENTRAL AR', 'CLIMARIO', 'DUZZI - TOTALINE', 'ELETROFRIG', 'FRIGELAR', 'FRIOPEÇAS', 'FUJITSU GENERAL DO BRASIL', 'INSTITUTO BRASILEIRO DE ENSAIOS DE CONFO', 'JABIL INDUSTRIAL DO BRASIL', 'JOSE HENRIQUE VEDOVELLI', 'LEVEROS', 'ODENIR KAZUO CONNO', 'POLO FRIO', 'POLOAR - STR', 'POLOFRIO', 'UL TESTTECH LABORATORIOS DE AVALIACAO DA'
    ];

    for (distribuidor of distribuidores) {
        var html = '<option>' + distribuidor + '</option>';
        document.getElementById('distribuidores_parceiros').innerHTML += html;
    }

    $('.selectpicker').selectpicker();
    
    */

    function getDistribuidores() {
        $.ajax({
        url: '<?php echo base_url("ajax/distribuidores"); ?>',
        type: 'GET',
        dataType: 'json',
            success:function(data){
                $.each(data, function(key, value){
                    $('#distribuidores_parceiros').append('<option value="'+value.id+'">'+value.distribuidor+'</option>');
                });
                $('.selectpicker').selectpicker('refresh');
            },
            error: function(xhr, status, error) {
                console.error('Erro ao obter os dados:', error);
            }
        });
    }
</script>

<script>
    function validCNPJ() {

        let cnpj = $("#f1-cnpj").val();

        if (cnpj) {
            $.ajax({
                url: "<?= base_url('ajax/cnpj') ?>",
                type: 'POST',
                data: {
                    cnpj
                },
                dataType: "json",
                success: function(dados) {

                    console.log(dados)

                    if (dados[0]) {
                        $("#f1-cnpj").val('');
                        alert('Já existe uma empresa cadastrada com esse cnpj');
                    }
                    return true;

                },
                error: function(dados) {

                }
            });
        }
    }

    async function validarCnpjCpf(idSelect) {

        // Remove caracteres especiais
        let cnpjCpf = document.querySelector(`#${idSelect}`).value;

        cnpjCpf = cnpjCpf.replace(/[^\d]+/g, '');

        // Verifica se é CPF ou CNPJ    
        if (cnpjCpf.length === 11) {
            // Valida CPF
            let sum = 0;
            let remainder;

            for (let i = 1; i <= 9; i++) {
                sum += parseInt(cnpjCpf.substring(i - 1, i)) * (11 - i);
            }

            remainder = (sum * 10) % 11;

            if (remainder === 10 || remainder === 11) {
                remainder = 0;
            }

            if (remainder !== parseInt(cnpjCpf.substring(9, 10))) {
                document.querySelector(`#${idSelect}`).value = "";
                return false;
            }

            sum = 0;

            for (let i = 1; i <= 10; i++) {
                sum += parseInt(cnpjCpf.substring(i - 1, i)) * (12 - i);
            }

            remainder = (sum * 10) % 11;

            if (remainder === 10 || remainder === 11) {
                remainder = 0;
            }

            if (remainder !== parseInt(cnpjCpf.substring(10, 11))) {
                document.querySelector(`#${idSelect}`).value = "";
                return false;
            }

            if (
                cnpjCpf === '00000000000' ||
                cnpjCpf === '11111111111' ||
                cnpjCpf === '22222222222' ||
                cnpjCpf === '33333333333' ||
                cnpjCpf === '44444444444' ||
                cnpjCpf === '55555555555' ||
                cnpjCpf === '66666666666' ||
                cnpjCpf === '77777777777' ||
                cnpjCpf === '88888888888' ||
                cnpjCpf === '99999999999'
            ) {
                document.querySelector(`#${idSelect}`).value = "";
                return false;
            }

            return true;
        } else if (cnpjCpf.length === 14) {
            // Valida CNPJ
            await validCNPJ();

            let size = cnpjCpf.length - 2;
            let numbers = cnpjCpf.substring(0, size);
            const digits = cnpjCpf.substring(size);
            let sum = 0;
            let pos = size - 7;

            for (let i = size; i >= 1; i--) {
                sum += parseInt(numbers.charAt(size - i)) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }

            let result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

            if (result !== parseInt(digits.charAt(0))) {
                document.querySelector(`#${idSelect}`).value = "";
                return false;
            }

            size += 1;
            numbers = cnpjCpf.substring(0, size);
            sum = 0;
            pos = size - 7;

            for (let i = size; i >= 1; i--) {
                sum += parseInt(numbers.charAt(size - i)) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }

            result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

            if (result !== parseInt(digits.charAt(1))) {
                document.querySelector(`#${idSelect}`).value = "";
                return false;
            }

            return true;
        } else {
            // Tamanho inválido
            document.querySelector(`#${idSelect}`).value = "";
            return false;
        }


    }

    function validEMAIL() {

        let email = $("#f1-email").val();

        if (email) {
            $.ajax({
                url: "<?= base_url('ajax/email') ?>",
                type: 'POST',
                data: {
                    email
                },
                dataType: "json",
                success: function(dados) {
                    if (dados[0]) {
                        $("#f1-email").val('');
                        alert('Já existe uma empresa cadastrada com esse e-mail');
                    }
                },
                error: function(dados) {

                }
            });
        }
    }
</script>