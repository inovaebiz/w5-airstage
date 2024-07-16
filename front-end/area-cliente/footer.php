<footer>
<div class="container-fluid">
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
        

     
        
        
  		  <!-- Icon fonts -->
            <link href="assets/css/font-awesome.min.css" rel="stylesheet">
      	<link href="assets/fonts/fonts.css" rel="stylesheet">

		    <!-- DataTable -->
        <link href="assets/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="assets/css/datatable/responsive.bootstrap4.min.css" rel="stylesheet">       

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet">

        <link href="assets/css/editor/theme-default.css" rel="stylesheet">

        <!-- Datapicker -->
        <link href="assets/css/datapicker/jquery.datetimepicker.css" rel="stylesheet">
     
	
	   
       <!-- Custom styles for this template -->
        <link href="assets/css/estilo.css" rel="stylesheet">

	    <!-- All JavaScript files
	    ================================================== -->
        <script src="assets/js/jquery/jquery.min.js"></script>
        <script src="assets/js/popper/popper.min.js"></script>

        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/jquery.mask.js"></script>
        <script src="assets/js/datapicker/jquery.datetimepicker.full.js"></script>


        <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
        <script src="assets/js/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/datatable/dataTables.responsive.min.js"></script>
        <script src="assets/js/datatable/responsive.bootstrap4.min.js"></script>

        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <script type="text/javascript" src="assets/js/editor/plugins/summernote/summernote.js"></script> 
        <script type="text/javascript" src="assets/js/editor/plugins.js"></script>
        


        
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


        

        <div class="dataTables_length" id="lista-padrao_length">
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
       


        $('#filter-date, #search-from-date, #search-to-date').datetimepicker({
            lang:'ch',
            timepicker:false,
            format:'d/m/Y',
            formatDate:'Y/m/d',
            
        });



 </script>


