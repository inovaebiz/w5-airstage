<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="registro-de-obras-listagem.php">Área do cliente</a></li>
		<li class="breadcrumb-item active" aria-current="page">Regulamento</li>
	</ol>
</nav>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">
		<!--SIDEBAR-->
		<?php include ("includes/sidebar.php") ?>
		<!-- MAIN -->
		<main role="main" class="col-md-12 col-lg-9 col-xl-8 offset-xl-1">
			<h1>Politica de Privacidade</h1>
			<section>
				<div class="row ">
					<div class="col-md-12 regulamento">
						<?= $politica->regulamento_texto?>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>