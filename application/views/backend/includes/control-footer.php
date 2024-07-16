<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <span class="text-muted">FAMÍLIA AIRSTAGE - Copyright © 2018 - <?php echo date('Y');?>. Todos os direitos reservados.</span>
            </div>
            <!-- Copyright -->
            <div class="col-lg-4 col-md-12">
                <a href="https://w5.com.br/" target="_blank"><img class="copyright" src="<?php echo base_url(); ?>assets-control/img/logo_w5_publicidade.svg" alt="W5" title="W5"></a>
            </div> 
        </div>
    </div>
</footer>
<!-- All JavaScript files
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/popper/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/datapicker/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/datatable/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/editor/plugins/summernote/summernote.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/editor/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets-control/js/chosen/chosen.jquery.min.js"></script>
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
            "sProcessing":   "Processando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords":  "Não foram encontrados resultados",
            "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix":  "",
            "sSearch":       "Buscar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": '<i class="fa fa-caret-left" aria-hidden="true"></i>',
                "sNext":     '<i class="fa fa-caret-right" aria-hidden="true"></i>',
                "sLast":     "Último"
            }
        }
    });

} );
</script>
<div class="dataTables_length" id="lista-padrao_length"></div>
<script>
$(document).ready(function() {

    $('.chosen-select-reason').chosen({
      width: '100%', // Ajusta a largura do Chosen
      placeholder_text_single: "Selecione o motivo da reprovação",
      allow_single_deselect: true // Permite limpar a seleção
    });

    $('.form-reprovar').on('submit', function(e) {
        var selectedValue = $('#stateSelect').val();
        if (!selectedValue) {
            e.preventDefault(); // Previne o envio do formulário
            $('#stateSelect').next('.chosen-container').addClass('error');
            $('#error-message').show();
            // Foca no contêiner Chosen para que o usuário possa perceber o erro
            $('#stateSelect').next('.chosen-container').find('.chosen-single').focus();
        } else {
            $('#stateSelect').next('.chosen-container').removeClass('error');
            $('#error-message').hide();
            // Submeter o formulário, ou prossiga com outras ações
            alert('Mensagem enviado com sucesso!');
        }
    });
    
    // Função para buscar e paginar
    function searchAndPaginate(page = 0) {
        let termoBusca = $('input[name="termoBusca"]').val();
        let perPage = $('select[name="lista-padrao_length"]').val() || 100;

        $.ajax({
            url: '<?php echo site_url("control/numeros-de-series/ajax_list/"); ?>' + page,
            type: 'GET',
            data: {
                termoBusca: termoBusca,
                perPage: perPage
            },
            success: function(data) {
                if (typeof data === 'string') {
                    try {
                        data = JSON.parse(data);
                    } catch (e) {
                        console.error('Erro ao processar resposta JSON: ', e);
                        console.error(data);
                        return;
                    }
                }
                $('#lista-padrao-numeros-series tbody').html(data.table_data);
                $('#pagination').html(data.pagination);
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição AJAX: ', xhr.responseText);
            }
        });
    }

    // Captura o evento 'keyup' do campo de busca
    $('input[name="termoBusca"]').on('keyup', function() {
        searchAndPaginate();
    });

    // Captura o evento 'change' do seletor de quantidade de registros
    $('select[name="lista-padrao_length"]').on('change', function() {
        searchAndPaginate();
    });

    // Paginação usando evento delegado
    $(document).on('click', '#pagination a', function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        let page = href.split('/').pop();
        searchAndPaginate(page);
    });

    // Inicializa a tabela com a primeira carga de dados
    searchAndPaginate();

    if ($.fn.DataTable.isDataTable('#lista-padrao-numeros-series')) {
        $('#lista-padrao-numeros-series').DataTable().destroy();
    }

    /*
    $('#lista-padrao-numeros-series').DataTable({
        "ordering": false,
        "paging": false, // Desativar paginação interna do DataTable
        "serverSide": false, // Ativar processamento do lado do servidor
        responsive: true,
        "ajax": {
            "url": "<?php echo site_url('control/numeros-de-series/ajax_list'); ?>",
            "type": "GET",
            "dataSrc": "" // Usar "dataSrc" para especificar onde os dados estão no objeto de resposta, se necessário
        },
        "columns": [
            { "data": "id" },
            { "data": "distribuidor" },
            { "data": "distribuidor_id" },
            { "data": "produto" },
            { "data": "serie" },
            { "data": "is_used" }
        ]
    });
    */

});
</script>
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

    $('#filter-date, #search-from-date, #search-to-date, #start-date-campaign, #end-date-campaign, #rescue-start-date-campaign, #rescue-end-date-campaign, #issuance-date').datetimepicker({
        lang:'ch',
        timepicker:false,
        format:'d/m/Y',
        formatDate:'Y/m/d',
        
    });
</script>
<!-- /// jQuery-Mask-Plugin-master /// -->
<script type="text/javascript" src="//www.nowcloud.com.br/tools/mask-plugin/jQuery-Mask-Plugin-1.3.2/jquery.mask.js"></script>
<script type="text/javascript">
    $(function () {
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

        $('.cep_with_callback').mask('00000-000', {onComplete: function (cep) {
                console.log('Mask is done!:', cep);
            },
            onKeyPress: function (cep, event, currentField, options) {
                console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
            }
        });

        $('.crazy_cep').mask('00000-000', {onKeyPress: function (cep) {
                var masks = ['00000-000', '0-00-00-00'];
                mask = (cep.length > 7) ? masks[1] : masks[0];
                $('.crazy_cep').mask(mask, this);
            }});

        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.money').mask('#.##0,00', {reverse: true, maxlength: false});

        var SaoPauloCelphoneMask = function (phone, e, currentField, options) {
            return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ? '(00) 00000-0000' : '(00) 0000-0000';
        };

        var celphoneMask = function (phone, e, currentField, options) {
            return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ?
                    '(00) 00000-0000' : '(00) 0000-0000';
        };

        $(".sp_celphones").mask(celphoneMask);

        $(".bt-mask-it").click(function () {
            $(".mask-on-div").mask("000.000.000-00");
            $(".mask-on-div").fadeOut(500).fadeIn(500)
        })

        var masks = ['(00) 00000-0000', '(00) 0000-00009'];
        $('.phoneSP9').mask(masks[1], {onKeyPress:
                    function (val, e, field, options) {
                        field.mask(val.length > 14 ? masks[0] : masks[1], options);
                    }
        });


        $('pre').each(function (i, e) {
            hljs.highlightBlock(e)
        });


        $(".cola").click(function(){
            id = $(this).attr('rel');
            $(".box-empresa-"+ id).toggle();
           // $("#box-" + id).show();
        });

    });
</script>
<!-- /// !jQuery-Mask-Plugin-master /// -->
</body>
</html>