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
					if(!isset($_POST['par1']) || !isset($_POST['id_type_tag_upd']) || !isset($_POST['tag_product_lang_additional_information_upd']) || !isset($_POST['content_product_lang_additional_information_upd']))
					{
						$valor = array("estado" => "false",
                                       "error" => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							require_once($slash.'helps/help.php');

							$id_product_lang_additional_information     	= intval(trim($_POST['par1']));
							$id_type_tag                					= intval(trim($_POST['id_type_tag_upd']));

							$tag_product_lang_additional_information        = addslashes(trim($_POST['tag_product_lang_additional_information_upd']));
                            $content_product_lang_additional_information    = addslashes(trim($_POST['content_product_lang_additional_information_upd']));

                            if(!empty($id_product_lang_additional_information) && !empty($id_type_tag) && !empty($tag_product_lang_additional_information) && !empty($content_product_lang_additional_information)){

		                    	require_once($slash.'controllers/functions/productsController.php');

								$hyperlink_product_lang_additional_information    = addslashes(trim($_POST['hyperlink_product_lang_additional_information_upd']));

								productsController::updateInformationProductAdditionalInformation($id_product_lang_additional_information,$id_type_tag,$tag_product_lang_additional_information,$content_product_lang_additional_information,$hyperlink_product_lang_additional_information);
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