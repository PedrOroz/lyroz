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
					if(!isset($_POST['par1']) || !isset($_POST['id_social_media']) || !isset($_POST['url_user_social_media']))
					{
						$valor = array("estado" => "false",
                  					"error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							$id_user_social_media       = intval(trim($_POST['par1']));

							foreach($_POST['url_user_social_media'] as $key => $url){
								$id_social_media        = intval(trim($_POST['id_social_media'][$key]));
								$url_user_social_media	= addslashes(trim($url));
							}

							if(!empty($id_user_social_media) && !empty($id_social_media) && !empty($url_user_social_media))
							{
								require_once($slash.'controllers/functions/userController.php');

								userController::updateInformationUserSocialMedia($id_user_social_media,$id_social_media,$url_user_social_media);
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
