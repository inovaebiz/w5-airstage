<!-- CONTAINER -->
<section class="introducao">
    <div class="container wrapper-intro">
        <div class="row">
            <!-- LEFT -->
            <div class="col-md-12 col-lg-6 box-left">
                <div class="container text-center">
                    <img class="logo-introducao pb-4" src="https://familiaairstage.com.br/assets-cliente/img/logo-familia-fujitsu.svg" alt="Família Airstage" title="Família Airstage">
                    <br>
                    <div class="col-md-12 col-lg-10 offset-lg-2">
                        <?= $introducao->regulamento_texto ?>
                    </div>
                </div>
            </div>
            <!-- RIGHT -->
            <div class="col-md-12 col-lg-6 box-right">
                <?= $introPart->regulamento_texto ?>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<?php include("scripts.php") ?>