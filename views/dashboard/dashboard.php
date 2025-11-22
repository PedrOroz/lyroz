<?php
	if(!isset($_SESSION)){
		require_once('./76524894_admin/core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao']) || !isset($_SESSION['name_user_dao']) || empty($_SESSION['name_user_dao']))
    {
    	header("location: ".URL);
        exit();
    }
	$title 				= "Dashboard";
	$description 		= "";
	$key 				= "";
	$url 				= "dashboard";
	$url_mobil 			= "dashboard-movil";
	$id 				= 9;
	$id_form 			= "dashboard";
	$og_updated_time 	= "";
	$og_type 			= "website";//website o article
	$og_image 			= "img/logo-head.jpg";
	$og_image_type 		= "image/jpeg";
	$og_image_width 	= "617";
	$og_image_height 	= "387";

	require_once (TEMPLATES_HEAD); ?>
		<link rel="preload stylesheet" href="<?php echo URL; ?>css/dashboard.css" as="style" type="text/css" crossorigin="anonymous">
	</head>

	<body id="dashboardPage" class="bg-verde-4">

		<?php require_once (TEMPLATES_HEADER_DASHBOARD); ?>

		<main>
			<section id="dashboard-1" class="top-navbar pt-5">
				<div class="container">
					<div class="row">
						<div class="col-xxl-5 mx-auto">
							<div class="mb-4">
						        <h1 class="fs-4 fw-normal"><?php echo LANG_HOLA.' <span class="display-5 fw-bold">'.$_SESSION['name_user_dao'].'</span>'; ?></h1>
						        <p class="fs-6"><?php echo LANG_DASHBOARD_DESCRIPTION; ?></p>
						    </div>
						</div>
					</div>
				</div>
			</section>
			<section id="dashboard-2" class="py-4">
				<div class="container">
					<div class="row">
						<div class="col-xxl-5 col-11 mx-auto">
							<div class="list-group">
							    <a href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>ajustes" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-4" aria-current="true">
							      	<i class="fa-regular fa-circle-user fa-lg"></i>
								    <div class="d-flex gap-2 w-100 justify-content-between">
								        <h6 class="mb-0">Mi perfil</h6>
								    </div>
							    </a>
							    <a href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-4" aria-current="true">
							      	<i class="fa-regular fa-rectangle-list fa-lg"></i>
								    <div class="d-flex gap-2 w-100 justify-content-between">
								        <h6 class="mb-0"><?php echo LANG_SEGUIR_COMPRANDO; ?></h6>
								    </div>
							    </a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

   		<?php require_once (TEMPLATES_FOOTER_DASHBOARD); ?>

		<script src="<?php echo URL ?>js/dashboard.js"></script>
	</body>
</html>