<?php
	if(!isset($_SESSION)){
		require_once('./76524894_admin/core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao']) || !isset($_SESSION['id_role_dao']) || empty($_SESSION['id_role_dao']))
    {
    	header("location: ".(defined('URL') ? URL : URL_CARPETA_FRONT));
        exit();
    }else{
			$id_user 	= intval(trim($_SESSION['id_user_dao']));
		 }
	$title 				= "Editar mi perfil";
	$description 		= "";
	$key 				= "";
	$adsBot_google 		= "index, follow";
	$url 				= "ajustes";
	$url_mobil 			= "ajustes-movil";
	$link 				= (defined('URL') ? URL : URL_CARPETA_FRONT).$url;
	$id 				= 8;
	$id_form 			= "settings";
	$og_updated_time 	= "";
	$og_type 			= "website";//website o article
	$og_image 			= "img/logo-head.jpg";
	$og_image_type 		= "image/jpeg";
	$og_image_width 	= "300";
	$og_image_height 	= "300";
	$bar_wrapper 		= "bg-azul-1";
	$bar_wrapper_before = "azul-2";
	$type_of_href_nav   = 2;//(#)Ancla = 1 / (URL)Redireccionar = 2s

	require_once (TEMPLATES_HEAD); ?>
		<link rel="preload stylesheet" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>css/setting.css" as="style" type="text/css" crossorigin="anonymous">
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwYneEwpS-vj0Df0llLDOvXEPsq1HD534&callback=initAutocomplete&libraries=places"></script>
   		<script src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT) ?>js/summernote/summernote-lite.js"></script>
	</head>

	<body id="settingPage" class="bg-verde-4">

		<?php require_once (TEMPLATES_HEADER_DASHBOARD); ?>

		<main>
			<section id="mis-ajustes" class="top-navbar pt-4">
				<div class="container">
					<div class="box mb-5">
						<div class="box-content">
							<a class="btn btn-outline-primary mb-4" href="<?php echo URL.'dashboard'; ?>" role="button"><span><?php echo LANG_REGRESAR ?></span></a>
			    		</div>
		    			<div class="box-title">
		    				<h2 class="c-negro fw-bold m-0 h3"><?php echo LANG_PERFIL_PERSONAL ?></h2>
		    			</div>
			    	</div>
				    <div class="row g-xxl-5">
				    	<div class="col-sm-5 col-md-12 col-lg-5 col-xxl-4">
				    		<div id="showProfilePictureByIdUserFront" class="card pb-4 rounded-0">
						        <div class="card-body pt-5 pb-0">
						            <div class="box-progress">
										<div class="progress">
										  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Cargando imagen" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<?php userController::showProfilePictureByIdUserFront($id_user); ?>
						        </div>
						    </div>
					    </div>
				    	<div class="col-sm-7 col-md-12 col-lg-7 col-xxl-8">
				    		<nav>
							  	<div id="nav-tab" class="nav nav-tabs border-bottom-0" role="tablist">
								    <button class="nav-link border-secondary border-1 px-4 active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true"><?php echo LANG_INFORMACION ?></button>
								    <button class="nav-link border-secondary border-1 px-4" id="nav-email-tab" data-bs-toggle="tab" data-bs-target="#nav-email" type="button" role="tab" aria-controls="nav-email" aria-selected="false"><?php echo LANG_CORREO ?></button>
								    <button class="nav-link border-secondary border-1 px-4" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false"><?php echo LANG_CONTRASENIA ?></button>
							  	</div>
							</nav>
							<div id="nav-tabContent" class="tab-content pt-4 px-3 border-secondary border-3 border">
								<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
									<?php userController::showUserInformationByUserIdFront($id_user); ?>
								</div>
								<div class="tab-pane fade" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab" tabindex="0">
									<?php userController::updateEmailFront($id_user); ?>
								</div>
								<div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab" tabindex="0">
									<?php userController::updatePasswordFront($id_user); ?>
								</div>
							</div>
					    </div>
					</div>
				</div>
			</section>

		</main>

   		<?php require_once (TEMPLATES_FOOTER_DASHBOARD); ?>

		<script src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT) ?>js/setting.js"></script>
	</body>
</html>