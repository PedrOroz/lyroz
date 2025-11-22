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
					//NO VALIDAR $_POST['par6'], YA QUE SU VALOR PUEDE SER 0
					if(!isset($_POST['par1']) || !isset($_POST['par8']) || !isset($_POST['par9']))
					{
						$valor = array("estado" => "false",
                                       "error" 	=> $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							$id_product 	= intval(trim($_POST['par1']));
                            $parent_id      = intval(trim($_POST['par6']));
                            $id_category    = intval(trim($_POST['par8']));
                            $id_call        = intval(trim($_POST['par9']));

                            //NO VALIDAR $parent_id, YA QUE SU VALOR PUEDE SER 0
							if(!empty($id_product) && !empty($id_category) && !empty($id_call)){
		                    	
		                    	require_once($slash.'controllers/functions/productsController.php');

		                    	productsController::associateCategryToProduct($id_product,$parent_id,$id_call,$id_category);
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