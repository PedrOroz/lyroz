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
            $valor = array("estado" 	=> "false",
            			   "error" 		=> $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'],
            			   "sin_sesion" => "true");
            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }else{
                //METODO POST
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(!isset($_POST['title_attribute_lang']))
					{
						$valor = array("estado" => "false",
									   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							$title_attribute_lang		= addslashes(trim($_POST['title_attribute_lang']));

							if(!empty($title_attribute_lang))
		                    {
		                    	require_once($slash.'controllers/functions/attributesController.php');

		                    	$parent_id_attribute	= (isset($_POST['parent_id_attribute']) ? intval(trim($_POST['parent_id_attribute'])) : 0);

								attributesController::registerAttribute($title_attribute_lang,$parent_id_attribute);
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
			 }
	}catch(Exception $e)
		{
			$valor = array("estado" 	=> "false",
						   "error" 		=> $lang_function['Error en el proceso'].$e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}
