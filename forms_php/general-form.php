<?php
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	header('Content-Type: application/json');
	
	require_once('../languages/common.php');
	//ini_set("allow_url_fopen", 1);

	if(isset($_POST['type_of_form']) && !empty($_POST['type_of_form'])
		&& isset($_POST['nombre']) && !empty($_POST['nombre'])
		&& isset($_POST['email']) && !empty($_POST['email']))
	{
		require_once('../core/core.php');
		require_once('../core/helps/help.php');

		$type_of_form  	= filter_input(INPUT_POST, 'type_of_form', FILTER_SANITIZE_NUMBER_INT);
		$nombre  		= addslashes(trim($_POST['nombre']));
		$email 			= trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
		$tel       		= (isset($_POST['tel']) && !empty($_POST['tel']) ? str_replace_string(array("'", '"'),"",trim($_POST['tel'])) : '');
		$empresa  		= (isset($_POST['empresa']) && !empty($_POST['empresa']) ? addslashes(trim($_POST['empresa'])) : '');
		$estado  		= (isset($_POST['estado']) && !empty($_POST['estado']) ? addslashes(trim($_POST['estado'])) : '');
		$ciudad  		= (isset($_POST['ciudad']) && !empty($_POST['ciudad']) ? addslashes(trim($_POST['ciudad'])) : '');
		$asunto  		= (isset($_POST['asunto']) && !empty($_POST['asunto']) ? addslashes(trim($_POST['asunto'])) : '');
		$mensaje       	= (isset($_POST['mensaje']) && !empty($_POST['mensaje']) ? addslashes(trim($_POST['mensaje'])) : '');
		$compania       = (isset($_POST['compania']) && !empty($_POST['compania']) ? addslashes(trim($_POST['compania'])) : '');
		$check1  		= trim($_POST['check1']);
		$check2  		= (isset($_POST['check2']) && !empty($_POST['check2']) ? addslashes(trim($_POST['check2'])) : 'No');

		switch ($type_of_form) {
			case 5://PAGE CONTACTO
				require_once('./fcontct.php');
			break;
			case 6://PAGE VACANTES
				require_once('./fvcants.php');
			break;
			default:
				$response = array (
			        'status' => 'error',
			        'info' 	 => LANG_ERROR_CONTACTO_9
			    );
			    print(json_encode($response, JSON_UNESCAPED_UNICODE));
			    exit;
			break;
		}
	}else{
			$response = array (
		        'status' => 'error',
		        'info' 	 => LANG_ERROR_CONTACTO_7.'(1)'
		    );
		    print(json_encode($response, JSON_UNESCAPED_UNICODE));
		    exit;
		 }