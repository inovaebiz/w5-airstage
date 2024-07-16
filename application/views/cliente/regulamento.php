<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('cliente/politica')?>">Área do cliente</a></li>
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
			<h1>Regulamento</h1>
			<section>
				<div class="row ">
					<div class="col-md-12 regulamento">
						<?= $regulamento->regulamento_texto?>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>