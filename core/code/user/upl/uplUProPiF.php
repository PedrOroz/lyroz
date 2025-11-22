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

        //SIN SESIONES CREADAS
        if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao']))
        {
            $valor = array("estado"     => "false",
                           "error"      => $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'],
                           "sin_sesion" => "true");
            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }else{
        		//METODO POST
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$id_user          	= intval(trim($_SESSION['id_user_dao']));
					$file_name        	= $_FILES['fileUserProfilePictureFront']['name'];

					if(!empty($id_user) && !empty($file_name))
					{
						require_once($slash.'controllers/functions/userController.php');

						$file_error      = $_FILES["fileUserProfilePictureFront"]["error"];
						$file_type       = $_FILES["fileUserProfilePictureFront"]["type"];
						$file_tmp_name   = $_FILES["fileUserProfilePictureFront"]["tmp_name"];
						$file_size       = $_FILES["fileUserProfilePictureFront"]["size"];

						//$view
							//1 = Front
							//2 = Back
																		//$id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,$view
							userController::uploadUserProfilePicture($id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,1);
						}else{
								$valor = array("estado" => "false",
											   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							}
					}else{
							$valor = array("estado" => "false",
										   "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)');
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						}
			 }
		}catch(Exception $e){
			$valor = array("estado" => "false",
						   "error" 	=> $lang_function['Error en el proceso'].$e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}
