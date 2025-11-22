<?php
	require_once('./76524894_admin/core/controllers/functions/langController.php');
	require_once("./76524894_admin/core/controllers/functions/userController.php");
	require_once('./languages/common.php');
	require_once('./core/core.php');

	$temp = $_SERVER["REQUEST_URI"];

	if(isset($_GET['view']))
	{
		if(file_exists(RUTA_CONTROLLER_DIR.'/' . $_GET['view'] . RUTA_CONTROLLER_DIR_DEFAULT))
		{
			include(RUTA_CONTROLLER_DIR.'/' . $_GET['view'] . RUTA_CONTROLLER_DIR_DEFAULT);
		}else{
				require_once(RUTA_ERROR_DIR);
			 }
	}else{
			include(RUTA_DEFAULT_DIR);
		 }