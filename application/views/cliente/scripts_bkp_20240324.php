<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets-login/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets-login/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets-login/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url(); ?>assets-login/js/retina-1.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets-login/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets-login/js/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>assets-login/js/jquery.colorbox.js"></script>
<script src="<?php echo base_url(); ?>assets-login/js/datapicker/jquery.datetimepicker.full.js"></script>
<!--[if lt IE 10]>
    <script src="<?php echo base_url(); ?>assets/js/placeholder.js"></script>
<![endif]-->
<!-- DATAPICKER -->
<script>
    /*jslint browser:true*/
    /*global jQuery, document*/

    // jQuery(document).ready(function () {
    //     'use strict';

    //     jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();
    // });
            
    $('#filter-date, #search-from-date, #search-to-date').datetimepicker({
        lang:'ch',
        timepicker:false,
        format:'d/m/Y',
        formatDate:'y/m/d',

    });

    <?php
    /*     if(isset($training_dates)){
            echo "allowDates: [".$training_dates."],";
        }*/
    ?>
</script>
<!-- COLORBOX -->
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
        $(".inline").colorbox({inline:true});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });

        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){ 
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
        });
    });

    $('#link-esquecer-senha').on('click',function(){
        // $('#link-esquecer-senha').hide(); // desaaparece o div
        // $('#familiar_hover').show(); // aparece o div   
        $('#ja-sou-cadastrado').hide(); // aparece o div
        $('#esqueceu-senha').show(); // aparece o div
        // window.open(seulink,'_blank'); // abre nova janela
    });


    $('#link-voltar').on('click',function(){
        $('#esqueceu-senha').hide(); // aparece o div
        $('#ja-sou-cadastrado').show(); // aparece o div
    });

    $('#btn-final').on('click',function(){
        $('#cboxOverlay').hide(); // aparece o div
        // $('#ja-sou-cadastrado').show(); // aparece o div
        window.open('home-login-cadastro.php','_parent'); // abre nova janela
    });
</script>