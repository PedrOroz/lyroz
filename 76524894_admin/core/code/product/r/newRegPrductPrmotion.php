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
					if(!isset($_POST['par1']) || !isset($_POST['par5']) || !isset($_POST['par6']) || !isset($_POST['id_type_promotion']) || !isset($_POST['price_discount_product_lang_promotion']) || !isset($_POST['discount_rate_product_lang_promotion']) || !isset($_POST['start_date_product_lang_promotion']))
					{
						$valor = array("estado" => "false",
	                              	   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							$id_product                				= intval(trim($_POST['par1']));
							$id_product_lang                		= intval(trim($_POST['par5']));
							$id_type_promotion                		= intval(trim($_POST['id_type_promotion']));
							$discount_rate_product_lang_promotion 	= intval(trim($_POST['discount_rate_product_lang_promotion']));

							$title_product_lang             		= addslashes(trim($_POST['par6']));
							$price_discount_product_lang_promotion  = trim(floatval($_POST['price_discount_product_lang_promotion']));
							$start_date_product_lang_promotion		= (isset($_POST['start_date_product_lang_promotion']) && !empty($_POST['start_date_product_lang_promotion']) ? strtotime(trim($_POST['start_date_product_lang_promotion'])) : NULL);

							if(!empty($id_product_lang) && !empty($id_product) && !empty($title_product_lang) && !empty($id_type_promotion) && !empty($price_discount_product_lang_promotion) && !empty($discount_rate_product_lang_promotion) && !empty($start_date_product_lang_promotion)){

								require_once($slash.'controllers/functions/productsController.php');

								$title_product_lang_promotion				= addslashes(trim($_POST['title_product_lang_promotion']));
								$sku_product_lang_promotion					= (isset($_POST['sku_product_lang_promotion']) && !empty($_POST['sku_product_lang_promotion']) ? addslashes(trim($_POST['sku_product_lang_promotion'])) : NULL);
								$description_small_product_lang_promotion	= addslashes(trim($_POST['description_small_product_lang_promotion']));

								if(isset($_POST['description_large_product_lang_promotion']) && !empty($_POST['description_large_product_lang_promotion'])){
									require_once(dirname(__DIR__).'../../../class/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

									$config 	= HTMLPurifier_Config::createDefault();

									// configuration goes here:
									$config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
									$config->set('HTML.Doctype', 'XHTML 1.0 Transitional'); // replace with your doctype

									$purifier 	= new HTMLPurifier($config);
									$pure_html  = $purifier->purify($_POST['description_large_product_lang_promotion']);

									$description_large_product_lang_promotion = htmlspecialchars(addslashes(trim($pure_html)));
								}else{
									$description_large_product_lang_promotion = NULL;
									 }

								$link_product_lang_promotion			= addslashes(trim(filter_input(INPUT_POST, 'link_product_lang_promotion', FILTER_SANITIZE_URL)));
								$finish_date_product_lang_promotion		= (isset($_POST['finish_date_product_lang_promotion']) && !empty($_POST['finish_date_product_lang_promotion']) ? strtotime(trim($_POST['finish_date_product_lang_promotion'])) : NULL);

								productsController::registerProductPromotion($id_product_lang,$id_product,$title_product_lang,$id_type_promotion,$title_product_lang_promotion,$sku_product_lang_promotion,$price_discount_product_lang_promotion,$discount_rate_product_lang_promotion,$description_small_product_lang_promotion,$description_large_product_lang_promotion,$link_product_lang_promotion,date("Y-m-d", $start_date_product_lang_promotion),date("Y-m-d", $finish_date_product_lang_promotion));
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
						   "error" 	=> $e -> getMessage());
			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			exit();
		}