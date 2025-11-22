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
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					//EN ESTE CASO NO ES NECESARIO EL PAR5 (id_product_lang), IGNORAR ESE CAMPO
					if(!isset($_POST['par1']) || !isset($_POST['par6']) || !isset($_POST['par7']) || !isset($_POST['par8']) || !isset($_POST['id_type_of_currency']) || !isset($_POST['id_tax_rule']))
					{
						$valor = array("estado" => "false",
                                       "error" => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							require_once($slash.'helps/help.php');

                            $id_product                		= intval(trim($_POST['par1']));
                            $id_type_product                = intval(trim($_POST['par8']));
                            $id_type_of_currency            = intval(trim($_POST['id_type_of_currency']));
                            $id_tax_rule                    = intval(trim($_POST['id_tax_rule']));

                            $title_product_lang             = addslashes(trim($_POST['par6']));
                            $friendly_url_product_lang 		= trim($_POST['par7']);

							if(!empty($id_product) && !empty($id_type_product) && !empty($id_type_of_currency) && !empty($id_tax_rule) && !empty($title_product_lang) && !empty($friendly_url_product_lang)){

		                    	require_once($slash.'controllers/functions/productsController.php');

		                    	$subtitle_product_lang		= (isset($_POST['subtitle_product_lang']) && !empty($_POST['subtitle_product_lang']) ? addslashes(trim($_POST['subtitle_product_lang'])) : NULL);
		                    	$general_price_product_lang = (isset($_POST['general_price_product_lang']) && !empty($_POST['general_price_product_lang']) ? trim(filter_input(INPUT_POST, 'general_price_product_lang', FILTER_VALIDATE_FLOAT)) : 0.00);

								$text_button_general_price_product_lang	= (isset($_POST['text_button_general_price_product_lang']) && !empty($_POST['text_button_general_price_product_lang']) ? addslashes(trim($_POST['text_button_general_price_product_lang'])) : NULL);

								$predominant_color_product_lang	= (isset($_POST['predominant_color_product_lang']) && !empty($_POST['predominant_color_product_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['predominant_color_product_lang'])) : NULL);

								$INT_background_color_degraded_product_lang	= intval(trim($_POST['background_color_degraded_product_lang']));
	                    		
	                    		$general_stock_product_lang	= (isset($_POST['general_stock_product_lang']) && !empty($_POST['general_stock_product_lang']) ? intval(trim($_POST['general_stock_product_lang'])) : 0);

								$reference_product_lang     = (isset($_POST['reference_product_lang']) && !empty($_POST['reference_product_lang']) ? addslashes(trim($_POST['reference_product_lang'])) : NULL);
								
								$general_link_product_lang  = (isset($_POST['general_link_product_lang']) && !empty($_POST['general_link_product_lang']) ? addslashes(trim(filter_input(INPUT_POST, 'general_link_product_lang', FILTER_SANITIZE_URL))) : NULL);
								
								$text_button_general_link_product_lang	= (isset($_POST['text_button_general_link_product_lang']) && !empty($_POST['text_button_general_link_product_lang']) ? addslashes(trim($_POST['text_button_general_link_product_lang'])) : NULL);
								
								$description_small_product_lang	= (isset($_POST['description_small_product_lang']) && !empty($_POST['description_small_product_lang']) ? addslashes(trim($_POST['description_small_product_lang'])) : NULL);
								
								if(isset($_POST['description_large_product_lang']) && !empty($_POST['description_large_product_lang'])){
				                  	require_once(dirname(__DIR__).'../../../class/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');
				                  	
				                  	$config 				= HTMLPurifier_Config::createDefault();

									// configuration goes here:
									$config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
									$config->set('HTML.Doctype', 'XHTML 1.0 Transitional'); // replace with your doctype

									$purifier 				= new HTMLPurifier($config);
									$pure_html  			= $purifier->purify($_POST['description_large_product_lang']);
									
									$description_large_product_lang = htmlspecialchars(addslashes(trim($pure_html)));
								}else{
			                  		$description_large_product_lang = NULL;
			                  	     }

								$special_specifications_product_lang = (isset($_POST['special_specifications_product_lang']) && !empty($_POST['special_specifications_product_lang']) ? addslashes(trim($_POST['special_specifications_product_lang'])) : NULL);

								$clave_prod_serv_sat_product_lang = (isset($_POST['clave_prod_serv_sat_product_lang']) && !empty($_POST['clave_prod_serv_sat_product_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['clave_prod_serv_sat_product_lang'])) : NULL);

                            	$clave_unidad_sat_product_lang = (!empty($clave_prod_serv_sat_product_lang) || $clave_prod_serv_sat_product_lang != NULL ? getClaveUnidadSat($clave_prod_serv_sat_product_lang) : NULL);

                            	$meta_title_product_lang	= (isset($_POST['meta_title_product_lang']) && !empty($_POST['meta_title_product_lang']) ? addslashes(trim($_POST['meta_title_product_lang'])) : $title_product_lang);
								
								$meta_description_product_lang = (isset($_POST['meta_description_product_lang']) && !empty($_POST['meta_description_product_lang']) ? addslashes(trim($_POST['meta_description_product_lang'])) : NULL);
								
								$meta_keywords_product_lang	= (isset($_POST['meta_keywords_product_lang']) && !empty($_POST['meta_keywords_product_lang']) ? addslashes(trim($_POST['meta_keywords_product_lang'])) : NULL);

								productsController::registerProduct($id_product,$title_product_lang,$friendly_url_product_lang,$id_type_product,$id_type_of_currency,$id_tax_rule,$subtitle_product_lang,$general_price_product_lang,$text_button_general_price_product_lang,$predominant_color_product_lang,$INT_background_color_degraded_product_lang,$general_stock_product_lang,$reference_product_lang,$general_link_product_lang,$text_button_general_link_product_lang,$description_small_product_lang,$description_large_product_lang,$special_specifications_product_lang,$clave_prod_serv_sat_product_lang,$clave_unidad_sat_product_lang,$meta_title_product_lang,$meta_description_product_lang,$meta_keywords_product_lang);
							}else{
									$valor = array("estado" => "false",
                                                   "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
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
			$valor = array("estado" => "false",
                       	   "error" 	=> $lang_function['Error en el proceso'].$e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}