<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	$valor = array();
	$slash = '../';

	require_once('core/controllers/functions/langController.php');
	require_once(dirname(__DIR__).'/'.$slash.'languages/'.langController::prefixLangDefault("errorFunction"));

	if(isset($_SESSION['id_user_dao']) && !empty(intval(trim($_SESSION['id_user_dao'])))){

		$id_user  = intval(trim($_SESSION['id_user_dao']));

		if(!empty($id_user)){
			require_once('core/controllers/functions/userController.php');

			userController::signOffBack($id_user);
		}
	}else{
			// Unset all session values
			$_SESSION = array();
			// get session parameters
			$params = session_get_cookie_params();
			// Delete the actual cookie.
			setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
			// Destroy session
			session_destroy();
			header("Location: ".URL_CARPETA_FRONT.'iniciar-sesion');
			exit();
		 }