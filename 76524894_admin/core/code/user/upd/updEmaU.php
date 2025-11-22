<?php
	$valor = array();
    $slash = '../../../';

    if(!isset($_SESSION)){
        require_once($slash.'models/cfg/seguridad.php');
        sec_session_start();
    }
    header('Content-Type: application/json');

	try
	{
		require_once($slash.'controllers/functions/langController.php');
        require_once(dirname(__DIR__).'/'.$slash.'languages/'.langController::prefixLangDefault("errorFunction"));

        //SIN SESIONES CREADAS
        if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao'])){
            $valor = array("estado"     => "false",
                           "error"      => $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'],
                           "sin_sesion" => "true");
            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }else{
        		//METODO POST
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(!isset($_POST['par1']) || !isset($_POST['emailUp']) || !isset($_POST['emailConfirmation']))
					{
						$valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							require_once($slash.'helps/help.php');

							$id_user              		= intval(trim($_POST['par1']));

							$email_sanitize 			= str_replace_string(array("'", '"'),"",trim($_POST['emailUp']));
							$email 						= filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);

							$emailConfirmation_sanitize = str_replace_string(array("'", '"'),"",trim($_POST['emailConfirmation']));
							$emailConfirmation 			= filter_var($emailConfirmation_sanitize, FILTER_VALIDATE_EMAIL);

							if(!empty($id_user) && !empty($email) && !empty($emailConfirmation))
							{
								require_once($slash.'controllers/functions/userController.php');

								//$view
				                    //1 = Front
				                    	//La modificación lo hace directamente el usuario logueado
				                    //2 = Back
				                    	//La modificación lo hace directamente el usuario o administrador logueado
                     
                     											//$id_user,$email,$emailConfirmation,$view
								userController::updateEmailUser($id_user,$email,$emailConfirmation,2);
							}else{
									$valor = array("estado" => "false",
                                       			   "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
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
			  }
	}catch(Exception $e)
		{
			$valor = array("estado" => "false",
                           "error"  => $lang_function['Error en el proceso'].$e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}
