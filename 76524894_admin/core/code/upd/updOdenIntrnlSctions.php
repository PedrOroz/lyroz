<?php
	$valor = array();
    $slash = '../../';

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
					if(!isset($_GET['id_type_section']) || !isset($_GET['id_call']) || !isset($_POST['position']))
					{
						$valor = array("estado" => "false",
                                       "error" => $lang_function['Error en el proceso'].$lang_function['Variables no creadas'].'1');
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
			        }else{
			        		require_once($slash.'helps/help.php');

				            $id_type_section    = intval(trim($_GET['id_type_section']));
				            $id_call            = intval(trim($_GET['id_call']));

				            $position 			= $_POST['position'];

				            if(!empty($id_type_section) && !empty($id_call) && !empty($position))
				            {
				            	require_once($slash.'models/cfg/conectorDB.php');

				            	ConectorDB::updateOrderInternalSections($position,$id_type_section,$id_call);
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
						   "error" 	=> $lang_function['Error en el proceso'].$e -> getMessage());
	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	        exit();
		}
