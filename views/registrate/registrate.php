<?php
	if(!isset($_SESSION)){
		require_once('./76524894_admin/core/models/cfg/seguridad.php');
		sec_session_start();
	}
	$title 				= "Conviertete en un usuario";
	$description 		= "";
	$key 				= "";
	$adsBot_google 		= "index, follow";
	$url 				= "registrate";
	$url_mobil 			= "registrate-movil";
	$link 				= (defined('URL') ? URL : URL_CARPETA_FRONT).$url;
	$id 				= 10;
	$id_form 			= "registerGeneralUser";
	$og_updated_time 	= "";
	$og_type 			= "website";//website o article
	$og_image 			= "img/logo-head.jpg";
	$og_image_type 		= "image/jpeg";
	$og_image_width 	= "300";
	$og_image_height 	= "300";
	$bar_wrapper 		= "bg-azul-1";
	$bar_wrapper_before = "azul-2";
	$type_of_href_nav   = 2;//(#)Ancla = 1 / (URL)Redireccionar = 2

	require_once (TEMPLATES_HEAD); ?>
		<link rel="preload stylesheet" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>css/register.css" as="style" type="text/css" crossorigin="anonymous">
	</head>

	<body id="registerGeneralUserPage">

		<?php require_once (TEMPLATES_HEADER); ?>

		<main>
			<section class="my-5">
				<div class="p-5 text-center bg-body-tertiary">
					<div class="container py-5">
						<h1 class="text-body-emphasis mt-5"><?php echo LANG_CONVIERTETE_EN_USUARIO; ?></h1>
						<p class="col-lg-8 mx-auto lead"><?php echo LANG_CONVIERTETE_EN_USUARIO_DESCRIPCION; ?></p>
					</div>
				</div>
			</section>

			<section id="mi-registro" class="top-navbar">
				<div class="container">
		    		<div class="box mb-5">
		    			<div class="box-form">
		    				<?php userController::createGeneralUserAccountFront();
		    					  //userController::createSpecificUserAccountFront(); ?>
		    			</div>
			    	</div>
				</div>
			</section>
		</main>

   		<?php require_once (TEMPLATES_FOOTER); ?>

   		<script src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT) ?>js/register.js"></script>
	</body>
</html>