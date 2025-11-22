<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}

	$ruta 	= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/error-504";
	$page 				= $lang_global["Páginas"];
	$title 				= "504";
	$id_type_section 	= 0;
	$id_page 			= $id_type_section;

	require_once('./templates/head.php'); ?>
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/modernizr/modernizr.js"></script>
		<script>
            let url_admin 		= "<?php echo URL_CARPETA_ADMIN; ?>",
            	url_front 		= "<?php echo URL_CARPETA_FRONT; ?>",
            	title_pnotify 	= "<?php echo $title; ?>",
            	id_page 		= <?php echo $id_page; ?>,
            	fullLink 		= "<?php echo $link; ?>";
        </script>
	</head>
		<body>
			<section class="body">

				<!-- start: top-header -->
				<?php require_once('./templates/top-header.php'); ?>
				<!-- end: top-header -->

				<div class="inner-wrapper">
					<!-- start: sidebar -->
					<?php require_once('./templates/header.php'); ?>
					<!-- end: sidebar -->

					<section role="main" class="content-body">
						<header class="page-header">
							<h2><?php echo $title; ?></h2>

							<div class="right-wrapper text-end">
								<ol class="breadcrumbs">
									<li>
										<a href="<?php echo URL_CARPETA_ADMIN; ?>/main">
											<span><?php echo $lang_global["Panel de control"]; ?></span>
										</a>
									</li>
									<li><span><?php echo $page; ?></span></li>
									<li><span><?php echo $title; ?></span></li>
								</ol>
							</div>
						</header>

						<!-- start: page -->
						<section class="body-error error-inside">
							<div class="center-error">

								<div class="row">
									<div class="col-lg-8">
										<div class="main-error mb-3">
											<h2 class="error-code text-dark text-center font-weight-semibold m-0"><?php echo $title; ?> <i class="fas fa-file"></i></h2>
											<p class="error-explanation text-center"><?php echo $lang_global["error-504"]; ?></p>
										</div>
									</div>
									<div class="col-lg-4">
										<h4 class="text"><?php echo $page; ?></h4>
										<ul class="nav nav-list flex-column primary">
											<li class="nav-item">
												<a class="nav-link" href="<?php echo URL_CARPETA_ADMIN ?>/main"><i class="fas fa-caret-right text-dark"></i> <?php echo $lang_global["Principal"]; ?></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</section>
						<!-- end: page -->
					</section>
				</div>

				<?php require_once('./templates/sidebar-right.php'); ?>
			</section>

			<!-- Vendor -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery/jquery.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/popper/umd/popper.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/common/common.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/nanoscroller/nanoscroller.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

			<!-- Theme Base, Components and Settings -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

			<!-- Theme Custom -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

			<!-- Theme Initialization Files -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>

		</body>
	</html>