<?php
	$valor = array();
	$slash = '../../';
	header('Content-Type: application/json');

	try
	{
		require_once($slash.'controllers/functions/langController.php');
		require_once(dirname(__DIR__).'/'.$slash.'languages/'.langController::prefixLangDefault("errorFunction"));

		//METODO POST
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(!isset($_POST['email_usuario']) || !isset($_POST['password'])){
				$valor = array("estado" => "false",
							   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
				return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				exit();
			}else{
					require_once($slash.'helps/help.php');

					$email_usuario	= trim($_POST['email_usuario']);
					$password		= trim($_POST['password']); 

					if(!empty($email_usuario) && !empty($password))
					{
						require_once($slash.'controllers/functions/userController.php');

						userController::logIn($email_usuario,$password);
					}else{
							$valor = array("estado" => "false",
										   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
						 }
				 }
		}else{
				$valor = array("estado" => "false",
							   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)');
				return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				exit();
			 }
	}catch(Exception $e)
	{
		$valor = array("estado" 	=> "false",
					   "error" 		=> $lang_function['Error en el proceso'].$e -> getMessage());
        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
        exit();
	}
