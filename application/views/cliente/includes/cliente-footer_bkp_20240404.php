<?php
$u = NULL;
$u = $this->session->userdata("cliente");
$popup_manutencao = false; // ATIVA POPUP NO SITE PARA MANUTENÇÃO
if ($u) {
?>
    <?php if ($view == 'resgate-seus-premios' || $view == 'pontuacao') {

        if ($camp) { ?>
            <div class="col-md-12 col-lg-9 offset-lg-3 col-xl-8">
                <div class="banner-resgate">
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 ">
                            <!-- splash -->
                            <img class="splash" src="<?php echo base_url(); ?>assets-cliente/img/banner-resgate/splash.png" alt="Ganhe até R$3.500,00" title="Ganhe até R$3.500,00">
                        </div>

                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 no-padding ">
                            <!-- Flag -->
                            <div class="flag">
                                <div class="texto-flag">
                                    <span>Resgate seus</span> <span class="premio"> Prêmios!</span>
                                    <p>Troque seus pontos por prêmios antes que eles expirem!</p>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-sm-3 row-blank"></div> -->

                        <div class="col-12 col-sm-12  col-md-4 col-lg-4 col-xl-4 no-padding ">
                            <!-- base-banner -->
                            <div class="base-banner">
                                <?php
                                    $data = date('Y-m-d');
                                    if((strtotime($camp->campanha_data_inicial_resgate) <= strtotime($data)) && (strtotime($camp->campanha_data_final_resgate) >= strtotime($data))) {
                                ?>
                                <p>Período do Resgate</p>
                                <span><?= $camp->campanha_nome ?></span>
                                <p class="data">Início: <span><?= date('d/m/Y', strtotime($camp->campanha_data_inicial_resgate)) ?></span></p>
                                <p class="data">Fim: <span><?= date('d/m/Y', strtotime($camp->campanha_data_final_resgate)) ?></span></p>
                                <p>
                                    <button type="submit" onclick="window.location.href='<?php echo base_url('/cliente/resgate/'); ?>'" class="btn btn-primary btn-green"> Resgatar Agora!</button>
                                </p>
                                <?php 
                                    } else {
                                ?>
                                <p>Período da Campanha</p>
                                <span><?= $camp->campanha_nome ?></span>
                                <p class="data">Início: <span><?= date('d/m/Y', strtotime($camp->campanha_data_inicial)) ?></span></p>
                                <p class="data">Fim: <span><?= date('d/m/Y', strtotime($camp->campanha_data_final)) ?></span></p>
                                <p>Solicitação do Resgate</p>
                                <p class="data">Início: <span><?= date('d/m/Y', strtotime($camp->campanha_data_inicial_resgate)) ?></span></p>
                                <p class="data">Fim: <span><?= date('d/m/Y', strtotime($camp->campanha_data_final_resgate)) ?></span></p>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        <?php }
        } ?>
    <footer>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <span class="text-muted">FAMÍLIA AIRSTAGE - Copyright © 2018 - <?php echo date('Y');?>. Todos os direitos reservados.</span>
                </div>
                <!-- Copyright -->
                <div class="col-lg-4 col-md-12">
                    <a href="https://w5.com.br/" target="_blank">
                        <img class="copyright" src="<?php echo base_url(); ?>assets-cliente/img/logo_w5_publicidade.svg" width="100" height="20" title="W5 Publicidade" alt="W5 Publicidade">
                    </a>
                </div>
            </div>

        </div>
    </footer>
<?php
/*
|
| Mudar o valor da varial $mode = "production"; quando colocar em produção.
|
*/

$mode = "development";

if($mode != "production") :
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124576636-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-124576636-1');
</script>
<?php endif; ?>
<!-- All JavaScript files
    ================================================== -->
<script src="<?php echo base_url(); ?>assets-cliente/js/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/popper/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets-cliente/js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/datapicker/jquery.datetimepicker.full.js"></script>

<script src="<?php echo base_url(); ?>assets-cliente/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/datatable/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets-cliente/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/retina-1.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets-cliente/js/scripts.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets-cliente/js/editor/plugins/summernote/summernote.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-cliente/js/editor/plugins.js"></script>

<!-- DATATABLE -->
<!-- <script>
    $(document).ready(function() {
    $('table.display').DataTable();
} );
</script> -->

<script>
    $(document).ready(function() {
        $('#lista-padrao, table.display').DataTable({
            "ordering": false,
            responsive: true,
            "oLanguage": {
                "sProcessing": "Processando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "Não foram encontrados resultados",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": '<i class="fa fa-caret-left" aria-hidden="true"></i>',
                    "sNext": '<i class="fa fa-caret-right" aria-hidden="true"></i>',
                    "sLast": "Último"
                }
            }
        });

    });
</script>

<div class="dataTables_length" id="lista-padrao_length"></div>

<!-- DATAPICKER -->
<script>
    /*jslint browser:true*/
    /*global jQuery, document*/

    // jQuery(document).ready(function () {
    //     'use strict';

    //     jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();
    //      timepicker:false,
    // format:'d/m/Y',
    // formatDate:'Y/m/d',
    // });
    $('#filter-date, #search-from-date, #search-to-date').datetimepicker({
        lang: 'ch',
        timepicker: false,
        format: 'd/m/Y',
        formatDate: 'Y/m/d',
        //  allowDates:['2018/08/20'],
    });

    $('#block-date').datetimepicker({
        lang: 'ch',
        timepicker: false,
        format: 'd/m/Y',
        formatDate: 'Y/m/d',
        <?php if (isset($datas_campanha)) { ?>
            allowDates: [<?= $datas_campanha ?>],
        <?php } ?>
        // allowDates:['2018/08/20'],
    });

    function noscroll() {
        return false;
    }
    $('#filter-date, #search-from-date, #search-to-date').addEventListener('scroll', noscroll);
</script>
<!-- /// jQuery-Mask-Plugin-master /// -->
<script type="text/javascript" src="//www.nowcloud.com.br/tools/mask-plugin/jQuery-Mask-Plugin-1.3.2/jquery.mask.js"></script>
<script type="text/javascript">
    $(function() {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.timeSimple').mask('00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.ip_address').mask('099.099.099.099');
        $(".cnpj").mask("99.999.999/9999-99");

        $('.cep_with_callback').mask('00000-000', {
            onComplete: function(cep) {
                console.log('Mask is done!:', cep);
            },
            onKeyPress: function(cep, event, currentField, options) {
                console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
            }
        });

        $('.crazy_cep').mask('00000-000', {
            onKeyPress: function(cep) {
                var masks = ['00000-000', '0-00-00-00'];
                mask = (cep.length > 7) ? masks[1] : masks[0];
                $('.crazy_cep').mask(mask, this);
            }
        });

        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.money').mask('#.##0,00', {
            reverse: true,
            maxlength: false
        });

        var SaoPauloCelphoneMask = function(phone, e, currentField, options) {
            return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ? '(00) 00000-0000' : '(00) 0000-0000';
        };

        var celphoneMask = function(phone, e, currentField, options) {
            return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ?
                '(00) 00000-0000' : '(00) 0000-0000';
        };

        $(".sp_celphones").mask(celphoneMask);

        $(".bt-mask-it").click(function() {
            $(".mask-on-div").mask("000.000.000-00");
            $(".mask-on-div").fadeOut(500).fadeIn(500)
        })

        var masks = ['(00) 00000-0000', '(00) 0000-00009'];
        $('.phoneSP9').mask(masks[1], {
            onKeyPress: function(val, e, field, options) {
                field.mask(val.length > 14 ? masks[0] : masks[1], options);
            }
        });


        $('pre').each(function(i, e) {
            hljs.highlightBlock(e)
        });


        $(".cola").click(function() {
            id = $(this).attr('rel');
            $(".box-empresa-" + id).toggle();
            // $("#box-" + id).show();
        });

        $('.alpha-no-spaces').mask("A", {
            translation: {
                "A": {
                    pattern: /[\w@\-.+]/,
                    recursive: true
                }
            }
        });
    });
</script>
<!-- /// !jQuery-Mask-Plugin-master /// -->
<?php } else { ?>

    <!--FOOTER-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-4">
                    <ul id="box-ta-com-duvidas" class="list-inline">
                        <li style="color: white !important" id="li-hover">
                            <a class="btn btn-entrar d-block" href="mailto:marketing@br.fujitsu-general.com">
                                <img src="<?php echo base_url(); ?>assets-cliente/img/icone-ta-com-duvidas.svg" title="Tá com dúvidas?" alt="Tá com dúvidas?">
                                <legend style="color: white !important;">
                                    <strong>Tá com dúvidas?</strong><br />
                                    <small>Clique aqui e fale conosco</small>
                                </legend>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Copyright -->
                <div class="col-sm-12 col-md-12 col-lg-7 col-xl-8">
                    <a href="http://w5.com.br/" target="_blank">
                        <img class="copyright" src="<?php echo base_url(); ?>assets-cliente/img/logo_w5_publicidade.svg" width="100" height="20" title="W5 Publicidade" alt="W5 Publicidade">
                    </a>
                </div>
            </div>
        </div>
    </footer>
<?php
if ($popup_manutencao == true) :
?>
    <div id="aviso" class="modal" style="display: flex;">
        <div class="aviso text-center" style="background-color:#ffffff;">
            <div class="btn btn-fechar" onclick="document.getElementById('aviso').style.display='none';">X</div>
            <br><br>
            <img src="<?php echo base_url(); ?>assets-cliente/img/programa-familia-fujitsu.svg" width="200" style="height:auto;">
            <br><br>
            <h2 class="mb-20 mt-20" style="color: #000000">SISTEMA EM MANUTENÇÃO</h2><br><br>
        </div>
    </div>
<?php endif; ?>
<!-- /// jQuery-Mask-Plugin-master /// -->
<script type="text/javascript" src="//www.nowcloud.com.br/tools/mask-plugin/jQuery-Mask-Plugin-1.3.2/jquery.mask.js"></script>
<script type="text/javascript">
    $(function() {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.timeSimple').mask('00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.ip_address').mask('099.099.099.099');
        $(".cnpj").mask("99.999.999/9999-99");

        $('.cep_with_callback').mask('00000-000', {
            onComplete: function(cep) {
                console.log('Mask is done!:', cep);
            },
            onKeyPress: function(cep, event, currentField, options) {
                console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
            }
        });

        $('.crazy_cep').mask('00000-000', {
            onKeyPress: function(cep) {
                var masks = ['00000-000', '0-00-00-00'];
                mask = (cep.length > 7) ? masks[1] : masks[0];
                $('.crazy_cep').mask(mask, this);
            }
        });

        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.money').mask('#.##0,00', {
            reverse: true,
            maxlength: false
        });

        var SaoPauloCelphoneMask = function(phone, e, currentField, options) {
            return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ? '(00) 00000-0000' : '(00) 0000-0000';
        };

        var celphoneMask = function(phone, e, currentField, options) {
            return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ?
                '(00) 00000-0000' : '(00) 0000-0000';
        };

        $(".sp_celphones").mask(celphoneMask);

        $(".bt-mask-it").click(function() {
            $(".mask-on-div").mask("000.000.000-00");
            $(".mask-on-div").fadeOut(500).fadeIn(500)
        })

        var masks = ['(00) 00000-0000', '(00) 0000-00009'];
        $('.phoneSP9').mask(masks[1], {
            onKeyPress: function(val, e, field, options) {
                field.mask(val.length > 14 ? masks[0] : masks[1], options);
            }
        });


        $('pre').each(function(i, e) {
            hljs.highlightBlock(e)
        });


        $(".cola").click(function() {
            id = $(this).attr('rel');
            $(".box-empresa-" + id).toggle();
            // $("#box-" + id).show();
        });
        $('.alpha-no-spaces').mask("A", {
            translation: {
                "A": {
                    pattern: /[\w@\-.+]/,
                    recursive: true
                }
            }
        });

    });
</script>
<!-- /// !jQuery-Mask-Plugin-master /// -->
<?php } ?>
<script type="text/javascript">
    $('#btn-ok').on('click', function(e) {
        $('.overlay-return').fadeOut();
        $('#inline_content').fadeOut();
    });

    setTimeout(() => {
        document.querySelector(".loader").style.display = "none"
    }, 3000)
</script>
</body>
</html>