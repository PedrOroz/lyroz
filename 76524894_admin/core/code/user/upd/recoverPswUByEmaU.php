<?php
	$valor = array();
    $slash = '../../../';
    header('Content-Type: application/json');

	try
	{
		require_once($slash.'controllers/functions/langController.php');
        require_once(dirname(__DIR__).'/'.$slash.'languages/'.langController::prefixLangDefault("errorFunction"));

		//METODO POST
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(!isset($_POST['email_user']))
			{
				$valor = array("estado" => "false",
							   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
				return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				exit();
			}else{
					require_once($slash.'helps/help.php');

					$email_user_sanitize 	= str_replace_string(array("'", '"'),"",trim($_POST['email_user']));
					$email_user 			= filter_var($email_user_sanitize, FILTER_VALIDATE_EMAIL);

					if(!empty($email_user))
					{
						require_once($slash.'controllers/functions/userController.php');

						userController::recoverPasswordByEmailUser($email_user);
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
			$valor = array("estado" => "false",
						   "error" 	=> $lang_function['Error en el proceso'].$e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}
