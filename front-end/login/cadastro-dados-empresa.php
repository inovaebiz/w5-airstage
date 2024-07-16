<?php include("head.php") ?>
</head>


<body>
    <!--HEADER-->
    <header>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-4 logo-cadastro"><img class="logo-fujitsu" src="assets/img/logo-fujitsu-fujitsu-general-brazil.svg" alt="Família Airstage" title="Família Airstage"></div>

                <div class="col-sm-12 col-md-6 col-lg-4 text-center"><img class="logo-projeto" src="assets/img/logo-familia-fujitsu.svg" alt="Projeto Família Airstage" title="Projeto Família Airstage"></div>

                <div class="col-sm-12 col-md-6 col-lg-4 link-login">
                    <p class="link-top"><a href="tela-introdutoria.php" alt="Saiba mais sobre a campanha" title="Saiba mais sobre a campanha"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sobre a campanha</a></p>
                    <a href="home-login-cadastro.php" class="btn btn-lg btn-primary" alt="Faça seu login" title="Faça seu login"> <img class="img-fluid" src="assets/img/arrow.png" alt="Família Airstage" title="Família Airstage"> Faça seu Login </a>
                </div>
            </div>
        </div>
    </header>

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home-login-cadastro.php">Login</a></li>
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
                                    <input type="text" name="f1-razao-social" placeholder="Razão Social*" class="f1-razao-social form-control" id="f1-razao-social">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-cnpj">CNPJ*</label>
                                    <input type="text" data-mask="00.000.000/0000-00" name="f1-cnpj" placeholder="CNPJ*" class="f1-cnpj form-control" id="f1-cnpj">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">E-mail*</label>
                                    <input type="text" name="f1-email" placeholder="E-mail*" class="f1-email form-control" id="f1-email">
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-telefone">Telefone*</label>
                                        <input type="text" data-mask="(00)00000-0000" name="f1-telefone" placeholder="Telefone*" class="f1-telefone form-control" id="f1-telefone">
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label class="sr-only" for="f1-celular">Celular</label>
                                        <input type="text" data-mask="(00)00000-0000" name="f1-celular" placeholder="Celular" class="f1-celular form-control" id="f1-celular">
                                    </div>
                                </div>

                                <small>(*) Campos de preenchimento obrigatório</small>

                            </div>



                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
                                <button type="button" class="btn btn-next">Próximo</button>
                            </div>
                        </fieldset>


                        <!-- Endereco-empresa -->
                        <fieldset>
                            <div class="form-wrapper">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-cep">CEP*</label>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <input type="text" name="f1-cep" placeholder="CEP*" class="f1-cep form-control" id="f1-cep">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <a href="#" class="search-cep"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Não sei meu CEP</a>
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-endereco">Endereço*</label>
                                        <input type="text" name="f1-endereco" placeholder="Endereço*" class="f1-endereco form-control" id="f1-endereco">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="sr-only" for="f1-numero">Número*</label>
                                        <input type="text" name="f1-numero" placeholder="Número*" class="f1-numero form-control" id="f1-numero">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="sr-only" for="f1-complemento">Complemento</label>
                                        <input type="" name="f1-complemento" placeholder="Complemento" class="f1-complemento form-control" id="f1-complemento">
                                    </div>



                                    <div class="form-group col-md-3">
                                        <label class="sr-only" for="f1-bairro">Bairro*</label>
                                        <input type="text" name="f1-bairro" placeholder="Bairro*" class="f1-bairro form-control" id="f1-bairro">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-cidade">Cidade*</label>
                                        <input type="text" name="f1-cidade" placeholder="Cidade*" class="f1-cidade form-control" id="f1-cidade">
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="sr-only" for="f1-estado">Estado*</label>
                                        <select type="text" name="f1-estado" id="f1-estado" placeholder="Estado*" class="f1-estado form-control">
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
                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
                                <button type="button" class="btn btn-next">Próximo</button>
                            </div>
                        </fieldset>


                        <!-- Autenticacao -->
                        <fieldset>
                            <div class="form-wrapper">
                                <div class="row">

                                    <div class="form-group col-md-8">
                                        <label class="sr-only" for="f1-nome-responsavel">Nome do responsável*</label>
                                        <input type="text" name="f1-nome-responsavel" placeholder="Nome do responsável*" class="f1-nome-responsavel form-control" id="f1-nome-responsavel">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="sr-only" for="f1-data">Data nasc.*</label>
                                        <i class="fa fa-search fa-calendar" aria-hidden="true"></i>
                                        <input type="text" name="f1-data" id="search-from-date" placeholder="Data nasc.*" class="f1-data form-control" id="f1-data">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-cpf">CPF*</label>
                                        <input type="text" data-mask="000.000.00-00" name="f1-cpf" placeholder="CPF*" class="f1-cpf form-control" id="f1-cpf">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-rg">RG*</label>
                                        <input type="text" data-mask="00.000.000-0" name="f1-rg" placeholder="RG*" class="f1-rg form-control" id="f1-rg">
                                    </div>
                                </div>
                                <small>(*) Campos de preenchimento obrigatório</small>


                                <h4>Cadastre sua senha de acesso</h4>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-senha">Senha</label>
                                        <input type="password" name="f1-senha" placeholder="Senha" class="f1-senha form-control" id="f1-senha">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="f1-repetir-senha">Repetir Senha</label>
                                        <input type="password" name="f1-repetir-senha" placeholder="Repetir Senha" class="f1-repetir-senha form-control" id="f1-repetir-senha">
                                    </div>
                                </div>

                                <div class="descricao-senha">
                                    <p>1. A senha deve conter ao menos 8 caracteres, números e letras, sendo uma maiúscula;</p>
                                    <p>2. O login será o e-mail cadastrado nos Dados da empresa.</p>
                                </div>

                            </div>


                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>
                                <button type="button" class="btn btn-next">Próximo</button>
                            </div>
                        </fieldset>




                        <!-- Regulamento -->
                        <fieldset>

                            <h2>Quase lá!</h2>
                            <p>Leia abaixo o Regulamento da campanha <span>FAMÍLIA</span> AIRSTAGE para finalizar seu cadastro.</p>

                            <div class="box-regulamento">

                                <div class="regulamento">

                                    <h5>Regulamento da campanha <span>FAMÍLIA</span> AIRSTAGE</h5>

                                    <p><strong>1. Lorem ipsum dolor sit amet</strong></p>

                                    <p>Consectetur adipiscing elit. Maecenas interdum, nisl et viverra ornare, eros nisi condimentum arcu, nec tempor dolor lorem in turpis. Curabitur et ligula libero. Fusce mollis malesuada massa vel dapibus. Pellentesque vitae placerat risus, in laoreet nunc. Donec nec diam non purus aliquet fringilla. Etiam eu commodo sapien. Praesent tortor lorem, pellentesque vel mollis et, hendrerit sed felis. Etiam vel sollicitudin tellus.</p>

                                    <p><strong>1. Vestibulum ante ipsum primis in faucibus</strong></p>

                                    <p>Orci luctus et ultrices posuere cubilia Curae; Duis vitae ex eu ante rutrum auctor. In finibus lacus ipsum, id aliquet nunc mattis vel. Vivamus elit nisi, suscipit eget lectus vel, vulputate tincidunt ex. Mauris urna dui,</p>

                                    <p><strong>1. Lorem ipsum dolor sit amet</strong></p>

                                    <p>Consectetur adipiscing elit. Maecenas interdum, nisl et viverra ornare, eros nisi condimentum arcu, nec tempor dolor lorem in turpis. Curabitur et ligula libero. Fusce mollis malesuada massa vel dapibus. Pellentesque vitae placerat risus, in laoreet nunc. Donec nec diam non purus aliquet fringilla. Etiam eu commodo sapien. Praesent tortor lorem, pellentesque vel mollis et, hendrerit sed felis. Etiam vel sollicitudin tellus.</p>

                                    <p><strong>1. Vestibulum ante ipsum primis in faucibus</strong></p>

                                    <p>Orci luctus et ultrices posuere cubilia Curae; Duis vitae ex eu ante rutrum auctor. In finibus lacus ipsum, id aliquet nunc mattis vel. Vivamus elit nisi, suscipit eget lectus vel, vulputate tincidunt ex. Mauris urna dui,</p>

                                    <p><strong>1. Lorem ipsum dolor sit amet</strong></p>

                                    <p>Consectetur adipiscing elit. Maecenas interdum, nisl et viverra ornare, eros nisi condimentum arcu, nec tempor dolor lorem in turpis. Curabitur et ligula libero. Fusce mollis malesuada massa vel dapibus. Pellentesque vitae placerat risus, in laoreet nunc. Donec nec diam non purus aliquet fringilla. Etiam eu commodo sapien. Praesent tortor lorem, pellentesque vel mollis et, hendrerit sed felis. Etiam vel sollicitudin tellus.</p>

                                    <p><strong>1. Vestibulum ante ipsum primis in faucibus</strong></p>

                                    <p>Orci luctus et ultrices posuere cubilia Curae; Duis vitae ex eu ante rutrum auctor. In finibus lacus ipsum, id aliquet nunc mattis vel. Vivamus elit nisi, suscipit eget lectus vel, vulputate tincidunt ex. Mauris urna dui,</p>

                                    <p><strong>1. Lorem ipsum dolor sit amet</strong></p>

                                    <p>Consectetur adipiscing elit. Maecenas interdum, nisl et viverra ornare, eros nisi condimentum arcu, nec tempor dolor lorem in turpis. Curabitur et ligula libero. Fusce mollis malesuada massa vel dapibus. Pellentesque vitae placerat risus, in laoreet nunc. Donec nec diam non purus aliquet fringilla. Etiam eu commodo sapien. Praesent tortor lorem, pellentesque vel mollis et, hendrerit sed felis. Etiam vel sollicitudin tellus.</p>

                                    <p><strong>1. Vestibulum ante ipsum primis in faucibus</strong></p>

                                    <p>Orci luctus et ultrices posuere cubilia Curae; Duis vitae ex eu ante rutrum auctor. In finibus lacus ipsum, id aliquet nunc mattis vel. Vivamus elit nisi, suscipit eget lectus vel, vulputate tincidunt ex. Mauris urna dui,</p>

                                </div>
                            </div>


                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Declaro ter lido e estar de acordo com o <span>Regulamento da Campanha Família Airstage</span></label>
                            </div>


                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</button>

                                <!-- <p><a class='inline btn' href="#inline_content">Finalizar cadastro</a></p> -->
                                <button type="button" class="inline btn btn-finalizado" href="#inline_content">Finalizar cadastro</button>
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
                <img class="img-fluid" src="assets/img/icone-final.png" alt="Família Airstage" title="Família Airstage">

                <h2>Cadastro realizado com sucesso!</h2>
                <p>Seu cadastro foi enviado para moderação. Em até 2 dias úteis
                    enviaremos um e-mail para ativação da sua conta.</p>

                <button type="button" id="btn-final" class="inline btn btn-finalizado">OK</button>


            </div>
        </div>
    </div>




    <!--FOOTER-->
    <footer>
        <div class="container">
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

<script>
    setTimeout(() => {
        document.querySelector(".loader").style.display = "none";
    }, 3000)
</script>

<div class="loader">
    <div class="col-lg-8 text-center mx-auto">
        <img class="animated infinite" src="https://familia.fujitsu-general.com/assets-cliente/img/logo-familia-fujitsu.svg" width="150" height="auto" title="Familia Airstage" alt="Familia Airstage"><br />
        <div class="mt-3 spinner-border" role="status">
            <span class="loaderS"></span>
        </div>
    </div>
</div>

<!-- Scripts -->
<?php include("scripts.php") ?>



</html>