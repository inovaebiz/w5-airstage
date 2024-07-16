<?php $url = $this->uri->segment(2);
?>
<div class="col-md-12 col-lg-3 col-xl-2 sidebar">
    <nav class="navbar-expand-lg navbar-light">
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li id="pagina_1"><a class="<?= ($url == 'obra' || $view == 'registro-de-obras-listagem') ? 'ativem' : '' ?>" href="<?= base_url('cliente/obra/') ?>" id="registro-obras">Registro de Obras</a></li>
                <!-- <li><a class="<?= $url == 'treinamento' ? 'ativem' : '' ?>" href="<?= base_url('cliente/treinamento/') ?>" id="registro-treinamentos">Registro de treinamentos</a></li> -->
                <li id="pagina_2"><a class="<?= $url == 'pontuacao' ? 'ativem' : '' ?>" href="<?= base_url('cliente/pontuacao/') ?>" id="pontuacao">Pontuação</a></li>

                <li id="pagina_3"><a class="<?= $view == 'resgate-seus-premios' ? 'ativem' : '' ?>" href="<?= base_url('cliente/resgate/') ?>" id="resgate-premios">Resgate de prêmios</a></li>
                <li id="pagina_4"><a class="<?= $view == 'meus-resgates' ? 'ativem' : '' ?>" href="<?= base_url('cliente/resgate/meus-resgates') ?>" id="resgate-premios">Meus Resgates</a></li>
                <li><a class="<?= $view == 'politica-de-pontos' ? 'ativem' : '' ?>" href="<?= base_url('cliente/politica/') ?>" id="politica-pontos">Política de pontos</a></li>
                <li><a class="<?= $url == 'regulamento' ? 'ativem' : '' ?>" href="<?= base_url('cliente/regulamento/') ?>" id="regulamento">Regulamento</a></li>
                <li><a class="<?= $view == 'politica-privacidade' ? 'ativem' : '' ?>" href="<?= base_url('cliente/politica/privacidade/') ?>" id="atendimento">Politica de Privacidade</a></li>
                <li><a class="<?= $url == 'atendimento' ? 'ativem' : '' ?>" href="<?= base_url('cliente/atendimento/') ?>" id="atendimento">Atendimento</a></li>
            </ul>
        </div>
    </nav>
</div>

<script>
let pag1 = +localStorage.getItem('pagina_1');
let pag2 = +localStorage.getItem('pagina_2');
let pag3 = +localStorage.getItem('pagina_3');
let pag4 = +localStorage.getItem('pagina_4');

if (!pag1) {
    document.getElementById("pagina_1").style.display = "none";
}

if (!pag2) {
    document.getElementById("pagina_2").style.display = "none";
}

if (!pag3) {
    document.getElementById("pagina_3").style.display = "none";

}

if (!pag4) {

    document.getElementById("pagina_4").style.display = "none";
}

setTimeout(() => {
    document.querySelector(".loader").style.display = "none"
}, 3000)
</script>