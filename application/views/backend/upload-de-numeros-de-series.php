<!-- Preloader -->
<div id="preloader">
    <div class="spinner"></div>
</div>
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('control') ?>">Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Upload de números de séries</li>
    </ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
    <div class="row">
    
        <!--SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>

        <!-- MAIN -->
        <main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
            <h1>Upload de números de séries Airstage</h1>
            <!-- section -->
            <section>
                <h2>Selecione o arquivo Excel de preferência em .CSV</h2>
                <!-- Form -->
                <form class="form-cadastro" method="POST" action="<?= base_url('control/numeros-de-series/upload') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row d-flex align-items-center">
                        <div class="f1-buttons col-md-9">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="f1-buttons col-md-3">   
                            <button type="submit" class="btn btn-primary btn-labeled">
                                <span class="btn-label"><i class="fa fa-upload" aria-hidden="true"></i>Upload</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="mt-3">
                    <p>
                        <small class="text-danger"><strong>IMPORTANTE:</strong> O carregamento dos dados não pode ser uma quantidade grande por causa das regras dos campos para validação de comparação dos mesmos e se possível importar no máximo de 100 a 200 registros no arquivo.</small>
                    </p>
                    <p>
                        <small class="text-success"><a href="<?php echo base_url(); ?>modelo-upload-numeros-de-series.csv" target="_blank">Clique aqui</a>, para baixar o modelo do arquivo de acordo com os parâmetros de preenchimento dos dados.</small>
                    </p>
                </div>
            </section><br>
            <!-- link-voltar -->
            <a href="<?= base_url('control/numeros-de-series/')?>" class="link-voltar">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar
            </a>
        </main>
    </div>
</div>
<style>
    /* Estilo para o preloader */
    #preloader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
    }

    .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #2F6B71;
        width: 100px;
        height: 100px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('form');
        form.addEventListener('submit', function() {
            document.getElementById('preloader').style.display = 'block';
        });

        // Ocultar o preloader após a conclusão do carregamento da página
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });
    });
</script>