<?php
	if(!isset($_SESSION)){
		require_once('../../76524894_admin/core/models/cfg/seguridad.php');
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
	require_once('../core.php');
	header("Location: ".(defined('URL') ? URL.'iniciar-sesion' : URL_CARPETA_FRONT));
	exit();