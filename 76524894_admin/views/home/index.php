<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	// Destruir todas las variables de sesión.
	$_SESSION = array();

	// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
	// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Finalmente, destruir la sesión.
	session_destroy();
	$link 		= URL_CARPETA_ADMIN."/home";
	$title 		= "home";
	$id_page 	= 0;
	require_once('./templates/head.php');
	require_once('./languages/'.langController::prefixLangDefault("logIn")); ?>
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
            	title_pnotify 	= "<?php echo $lang_login['login']; ?>",
            	id_page 		= <?php echo $id_page; ?>,
            	fullLink 		= "<?php echo $link; ?>";
        </script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign logIn">
			<div class="center-sign">

				<div class="panel card-sign">
					<div class="card-body">
						<div class="box">
							<div class="box-title">
								<h2 class="f-medium c-negro text-center mt-3 mb-3"><?php echo $lang_login["Bienvenido"]; ?></h2>
							</div>
							<div class="box-logo text-center mt-4 mb-4">
								<img src="<?php echo URL_CARPETA_ADMIN ?>/img/logo-empresa.jpg" height="100" alt="Logo">
							</div>
						</div>
						<form id="login" class="form-horizontal" method="post" action="/">
							<div class="form-group">
								<input type="text" name="email_usuario" id="email_usuario" class="form-control" placeholder="<?php echo $lang_login["email o usuario"]; ?>" value="" data-plugin-maxlength maxlength="50" autocomplete="off" required=""/>
							</div>
							<div class="form-group my-4">
								<div class="input-group js-show">
									<input type="password" name="password" id="pwd" class="form-control js-pass" placeholder="<?php echo $lang_login["password"]; ?>" value="" minlength="8" data-plugin-maxlength maxlength="16" autocomplete="off" required=""/>
									<button class="btn btn-default border-top-0 border-start-0 border-end-0 rounded-0 js-check" type="button"><i class="fas fa-eye"></i></button>
								</div>
							</div>
							<div class="mt-2 mb-4">
								<button type="submit" name="submit" class="btn-login w-100"><?php echo $lang_login["login"]; ?></button>
							</div>
						</form>
						<p class="text-center mb-4">
							<a href="<?php echo URL_CARPETA_FRONT ?>registrate" class="text-decoration-none" rel="noopener" role="button"><?php echo $lang_login["Crea tu cuenta"]; ?></a>
						</p>
						<p class="text-center text-muted my-2"><?php echo $lang_login["Administrador de"].' '.WEBSITE_CMS.' '.$lang_login["versión"]; ?></p>
					</div>

				</div>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery/jquery.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/popper/umd/popper.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/common/common.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/functions/login.js"></script>
	</body>
</html>