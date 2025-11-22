<?php
	if(!isset($_SESSION)){
		require_once('../../../../76524894_admin/core/models/cfg/seguridad.php');
		sec_session_start();
	}
    $slash = dirname(__DIR__).'../../../../76524894_admin/core/';
    header('Content-Type: application/json');

	try
	{
		require_once($slash.'controllers/functions/langController.php');
      	require_once(dirname(__DIR__).'../../../../76524894_admin/languages/'.langController::prefixLangDefault("errorFunction"));

		//METODO POST
        if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			//NO ES NECESARIO VALIDAR lada_telephone_user NI cell_phone_user YA QUE SU VALOR PUEDE SER NULL
			if(!isset($_POST['name_user']) || !isset($_POST['last_name_user']) || !isset($_POST['email_user']) || !isset($_POST['emailConfirmation']) || !isset($_POST['password1']) || !isset($_POST['password2']))
			{
				$valor = array("estado" => "false",
                               "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
				return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				exit();
			}else{
					require_once($slash.'helps/help.php');

					$name_user_sanitize			= addslashes(ucwords(strtolower(trim($_POST['name_user']))));
					$name_user 					= removeCharacters($name_user_sanitize);

					$last_name_user_sanitize	= addslashes(ucwords(strtolower(trim($_POST['last_name_user']))));
					$last_name_user 			= removeCharacters($last_name_user_sanitize);

					$email_user 				= str_replace_string(array("'", '"'),"",trim($_POST['email_user']));
					$emailConfirmation 			= str_replace_string(array("'", '"'),"",trim($_POST['emailConfirmation']));

					$password1 					= str_replace_string(array("'", '"'),"",trim($_POST['password1']));
					$password2 					= str_replace_string(array("'", '"'),"",trim($_POST['password2']));

					if(!empty($name_user) && !empty($last_name_user) && !empty($email_user) && !empty($emailConfirmation) && !empty($password1) && !empty($password2))
                    {
                    	require_once($slash.'controllers/functions/userController.php');

						//GENERAR UNO DINAMICO
						$username_website_sanitize 				= $name_user.$last_name_user;
						$username_website_sanitize_acentos 		= removeAccents($username_website_sanitize);
						$username_website_sanitize_c_especiales = removeSpecialCharacters($username_website_sanitize_acentos);
						$username_website_sanitize_caracteres 	= preg_replace('([^A-Za-z0-9])', '', $username_website_sanitize_c_especiales);
						$username_website      					= substr($username_website_sanitize_caracteres, 0, 20);

						$lada_telephone_user 	= (isset($_POST['lada_telephone_user']) && !empty($_POST['lada_telephone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['lada_telephone_user'])) : NULL);
						$telephone_user 		= (isset($_POST['telephone_user']) && !empty($_POST['telephone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['telephone_user'])) : NULL);

						$lada_cell_phone_user 	= (isset($_POST['lada_cell_phone_user']) && !empty($_POST['lada_cell_phone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['lada_cell_phone_user'])) : NULL);
						$cell_phone_user 		= (isset($_POST['cell_phone_user']) && !empty($_POST['cell_phone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['cell_phone_user'])) : NULL);

                    	userController::registerGeneralUserFront($name_user,$last_name_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$username_website,$email_user,$emailConfirmation,$password1,$password2);
					}else{
							$valor = array("estado" => "false",
										   "error" => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
						 }
				 }
		}else{
				$valor = array("estado" => "false",
                         	   "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)');
				return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				exit();
			 }
	}catch(Exception $e)
		{
			$valor = array("estado" => "false",
                           "error"  => $lang_function['Error en el proceso'].$e -> getMessage());
	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	        exit();
		}