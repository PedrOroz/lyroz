<?php
	require_once('./core/controllers/functions/langController.php');
	require_once('./core/controllers/functions/userController.php');
	require_once('./core/core.php');
	
	if(isset($_GET['view']))
	{
		if(file_exists(RUTA_CONTROLLER_DIR_CMS.'/' . $_GET['view'] . RUTA_CONTROLLER_DIR_DEFAULT_CMS))
		{
			include(RUTA_CONTROLLER_DIR_CMS.'/' . $_GET['view'] . RUTA_CONTROLLER_DIR_DEFAULT_CMS);
		}else{
				require_once(RUTA_ERROR_DIR_CMS);
			 }
	}else{
			include(RUTA_DEFAULT_DIR_CMS);
		 }