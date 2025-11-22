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
					if(!isset($_POST['par1']) || !isset($_POST['id_stripe']) || !isset($_POST['value_product_stripe']))
					{
						$valor = array("estado" => "false",
	                              	   "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							$id_product 			= intval(trim($_POST['par1']));
                            $id_stripe 				= intval(trim($_POST['id_stripe']));
                            $value_product_stripe 	= addslashes(trim($_POST['value_product_stripe']));

							if(!empty($id_product) && !empty($id_stripe) && !empty($value_product_stripe)){
		                    	require_once($slash.'controllers/functions/productsController.php');

								productsController::registerProductStripe($id_product,$id_stripe,$value_product_stripe);
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
