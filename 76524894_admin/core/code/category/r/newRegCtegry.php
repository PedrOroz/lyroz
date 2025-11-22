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
					if(!isset($_POST['title_category_lang']))
					{
						$valor = array("estado" => "false",
									   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							require_once($slash.'helps/help.php');

							$title_category_lang				 = addslashes(trim($_POST['title_category_lang']));

							if(!empty($title_category_lang))
		                    {
		                    	require_once($slash.'controllers/functions/categoriesController.php');

		                    	$parent_id						 = (isset($_POST['parent_id']) && !empty($_POST['parent_id']) ? intval(trim($_POST['parent_id'])) : 0);
		                    	
		                    	$subtitle_category_lang			 = (isset($_POST['subtitle_category_lang']) && !empty($_POST['subtitle_category_lang']) ? addslashes(trim($_POST['subtitle_category_lang'])) : NULL);

								$description_small_category_lang = (isset($_POST['description_small_category_lang']) && !empty($_POST['description_small_category_lang']) ? addslashes(trim($_POST['description_small_category_lang'])) : NULL);

								if(isset($_POST['description_large_category_lang']) && !empty($_POST['description_large_category_lang'])){

				                  	require_once(dirname(__DIR__).'../../../class/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');
				                  	
				                  	$config 							= HTMLPurifier_Config::createDefault();

									// configuration goes here:
									$config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
									$config->set('HTML.Doctype', 'XHTML 1.0 Transitional'); // replace with your doctype

									$purifier 							= new HTMLPurifier($config);
									$pure_html  						= $purifier->purify($_POST['description_large_category_lang']);
									
									$description_large_category_lang 	= htmlspecialchars(addslashes(trim($pure_html)));
								}else{
			                  		$description_large_category_lang 	= NULL;
			                  	     }

								$color_hexadecimal_category      = (isset($_POST['color_hexadecimal_category']) && !empty($_POST['color_hexadecimal_category']) ? str_replace_string(array("'", '"'),"",trim($_POST['color_hexadecimal_category'])) : NULL);

								categoriesController::registerCategory($title_category_lang,$parent_id,$subtitle_category_lang,$description_small_category_lang,$description_large_category_lang,$color_hexadecimal_category);
							}else{
									$valor = array("estado" => "false",
												   "error" => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
		                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
		                            exit();
								 }
						 }
				}else{
						$valor = array("estado" => "false",
									   "error" => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)');
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			 }
	}catch(Exception $e)
		{
			$valor = array("estado" => "false",
						   "error" => $lang_function['Error en el proceso'].$e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}
