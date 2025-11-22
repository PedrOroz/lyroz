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
        if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao']) || !isset($_SESSION['id_role_dao']) || empty($_SESSION['id_role_dao'])){
            $response['status'] = 0;
            $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'];
            print(json_encode($response, JSON_UNESCAPED_UNICODE));
            exit;
        }else{
                //METODO POST
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$id_role = intval(trim($_SESSION['id_role_dao']));

					if(!empty($id_role))
                    {
                    	//$id_role
	                        // 1 = Súper Administrador
		                    // 2 = Administrador
		                    // 3 = Usuario
		                    // 4 = Vendedora
		                    // 5 = Diseñador
		                    // 6 = Chef
                    	if($id_role == 1 || $id_role == 2)
                    	{
                    		require_once($slash.'controllers/functions/userController.php');

		                    //$view
			                    //1 = front
			                    //2 = back
	                    													//$id_role,$view
	                    	userController::showNotificationOfAllInactiveUsers($id_role,2);
                    	}else{
                    			$response['status'] = 1;
                                $response['msg']    = $lang_function['Error en el proceso'].$lang_function['No cuenta con los permisos'];
                                return print(json_encode($response, JSON_UNESCAPED_UNICODE));
            					exit();
                    		 }
					}else{
							$response['status'] = 1;
                            $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)';
                            return print(json_encode($response, JSON_UNESCAPED_UNICODE));
        					exit();
						 }
				}else{
						$response['status'] = 1;
                        $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)';
                        return print(json_encode($response, JSON_UNESCAPED_UNICODE));
                		exit();
					 }
			  }
	}catch(Exception $e)
		{
			$response['status'] = 1;
            $response['msg']    = $lang_function['Error en el proceso'].$e -> getMessage();
            return print(json_encode($response, JSON_UNESCAPED_UNICODE));
			exit();
		}