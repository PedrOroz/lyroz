<?php
	if(!isset($_SESSION)){
		require_once('./76524894_admin/core/models/cfg/seguridad.php');
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
	$title 				= "Error 500";
	$description 		= "";
	$key 				= "";
	$url 				= "error-500";
	$url_mobil 			= 'error-500';
	$link 				= (defined('URL') ? URL : URL_CARPETA_FRONT).$url;
	$id 				= 7;
	$id_form 			= "";
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
		<link rel="preload stylesheet" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>css/app.css" as="style" type="text/css" crossorigin="anonymous">
	</head>
	<body>

		<?php require_once (TEMPLATES_HEADER); ?>
  		<main>
			<div class="container-fluid mt-main-header">
	  			<div class="d-sm-flex justify-content-center align-items-center text-center" id="main">
				    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">500</h1>
				    <div class="inline-block align-middle">
				    	<h2 class="ms-3 font-weight-normal lead" id="desc"><?php echo LANG_ERROR_500; ?></h2>
				    </div>
				</div>
	  		</div>
	  	</main>

   		<?php require_once (TEMPLATES_FOOTER); ?>
	</body>
</html>