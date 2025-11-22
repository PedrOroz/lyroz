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
					if(!isset($_POST['par5']) || !isset($_POST['id_type_tag']) || !isset($_POST['tag_product_lang_additional_information']) || !isset($_POST['content_product_lang_additional_information']))
					{
						$valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							require_once($slash.'helps/help.php');

							$id_product_lang                				= intval(trim($_POST['par5']));
							$id_type_tag                					= intval(trim($_POST['id_type_tag']));

                            $tag_product_lang_additional_information    	= (isset($_POST['tag_product_lang_additional_information']) && !empty($_POST['tag_product_lang_additional_information']) ? addslashes(trim($_POST['tag_product_lang_additional_information'])) : NULL);

                            $content_product_lang_additional_information    = (isset($_POST['content_product_lang_additional_information']) && !empty($_POST['content_product_lang_additional_information']) ? addslashes(trim($_POST['content_product_lang_additional_information'])) : NULL);

							if(!empty($id_product_lang) && !empty($id_type_tag) && !empty($tag_product_lang_additional_information) && !empty($content_product_lang_additional_information)){

		                    	require_once($slash.'controllers/functions/productsController.php');

		                    	$hyperlink_product_lang_additional_information    = (isset($_POST['hyperlink_product_lang_additional_information']) && !empty($_POST['hyperlink_product_lang_additional_information']) ? addslashes(trim($_POST['hyperlink_product_lang_additional_information'])) : NULL);

								productsController::registerProductAdditionalInformation($id_product_lang,$id_type_tag,$tag_product_lang_additional_information,$content_product_lang_additional_information,$hyperlink_product_lang_additional_information);
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