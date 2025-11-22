<?php
	if(!isset($_SESSION)){
		require_once('../../../../76524894_admin/core/models/cfg/seguridad.php');
		sec_session_start();
	}
    $slash = dirname(__DIR__).'../../../../76524894_admin/core/';
    header('Content-Type: application/json');

	try
	{
		require_once($slash.'controllers/functions/langController.php');
      	require_once(dirname(__DIR__).'../../../../76524894_admin/languages/'.langController::prefixLangDefault("errorFunction"));

        //SIN SESIONES CREADAS
        if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao']))
        {
            $valor = array("estado" 	=> "false",
						   "error" 		=> $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'],
                           "sin_sesion" => "true");
            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }else{
        		//METODO POST
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					//NO ES NECESARIO VALIDAR lada_telephone_user NI cell_phone_user YA QUE SU VALOR PUEDE SER NULL
					if(!isset($_POST['name_user']) || !isset($_POST['last_name_user']) || !isset($_POST['gender_user']))
					{
						$valor = array("estado" => "false",
                                 	   "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					}else{
							require_once($slash.'helps/help.php');

							$id_user          			= intval(trim($_SESSION['id_user_dao']));
							//id_role
		                    	// 1 = Súper Administrador
		                    	// 2 = Administrador
		                    	// 3 = Usuario
		                    	// 4 = Vendedora
		                    	// 5 = Diseñador
		                    	// 6 = Chef

							$name_user_sanitize			= addslashes(ucwords(strtolower(trim($_POST['name_user']))));
							$name_user 					= removeCharacters($name_user_sanitize);

							$last_name_user_sanitize	= addslashes(ucwords(strtolower(trim($_POST['last_name_user']))));
							$last_name_user 			= removeCharacters($last_name_user_sanitize);

							$gender_user 				= str_replace_string(array("'", '"'),"",trim($_POST['gender_user']));

							if(!empty($id_user) && !empty($name_user) && !empty($last_name_user) && !empty($gender_user))
							{
								$rfc_user       		= (isset($_POST['rfc_user']) && !empty($_POST['rfc_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['rfc_user'])) : NULL);

		                  		$curp_user       		= (isset($_POST['curp_user']) && !empty($_POST['curp_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['curp_user'])) : NULL);

		                  		$membership_number_user = (isset($_POST['membership_number_user']) && !empty($_POST['membership_number_user']) ? filter_input(INPUT_POST, str_replace_string(array("'", '"'),"",trim($_POST['membership_number_user'])), FILTER_VALIDATE_INT) : NULL);

								if(isset($_POST['username_website']) && !empty($_POST['username_website'])){
									$username_website_sanitize 			= trim($_POST['username_website']);
								}else{
									//GENERAR UNO DINAMICO
									$username_website_sanitize 			= $name_user.$last_name_user;
									 }

								$username_website_sanitize_acentos 		= removeAccents($username_website_sanitize);
								$username_website_sanitize_c_especiales = removeSpecialCharacters($username_website_sanitize_acentos);
								$username_website_sanitize_caracteres 	= preg_replace('([^A-Za-z0-9])', '', $username_website_sanitize_c_especiales);
								$username_website      					= substr($username_website_sanitize_caracteres, 0, 20);

				                $about_me_user       	= (isset($_POST['about_me_user']) && !empty($_POST['about_me_user']) ? addslashes(trim($_POST['about_me_user'])) : NULL);

						if(isset($_POST['biography_user']) && !empty($_POST['biography_user'])){
				            require_once(dirname(__DIR__).'../../../../76524894_admin/core/class/vendor/ezyang/HTMLPurifier/library/htmlpurifier.auto.php');

			                  	$config 				= HTMLPurifier_Config::createDefault();

								// configuration goes here:
								$config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
								$config->set('HTML.Doctype', 'XHTML 1.0 Transitional'); // replace with your doctype

								$config->set('Attr.EnableID', true);
 								$config->set('CSS.Trusted', true);

								$purifier 				= new HTMLPurifier($config);
								$pure_html  			= $purifier->purify($_POST['biography_user']);

								$biography_user 		= htmlspecialchars(addslashes(trim($pure_html)));
					    }else{
			                  	$biography_user 		= NULL;
					         }

					         	$birthdate_user 		= (isset($_POST['birthdate_user']) && !empty($_POST['birthdate_user']) ? $_POST['birthdate_user'] : NULL);

								$age_user 				= (isset($_POST['age_user']) && !empty($_POST['age_user']) ? filter_input(INPUT_POST, str_replace_string(array("'", '"'),"",trim($_POST['age_user'])), FILTER_VALIDATE_INT) : NULL);

								$lada_telephone_user 	= (isset($_POST['lada_telephone_user']) && !empty($_POST['lada_telephone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['lada_telephone_user'])) : NULL);
								$telephone_user 		= (isset($_POST['telephone_user']) && !empty($_POST['telephone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['telephone_user'])) : NULL);

								$lada_cell_phone_user 	= (isset($_POST['lada_cell_phone_user']) && !empty($_POST['lada_cell_phone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['lada_cell_phone_user'])) : NULL);
								$cell_phone_user 		= (isset($_POST['cell_phone_user']) && !empty($_POST['cell_phone_user']) ? str_replace_string(array("'", '"'),"",trim($_POST['cell_phone_user'])) : NULL);

								$ship_address_user		= (isset($_POST['ship-address']) && !empty($_POST['ship-address']) ? addslashes(trim($_POST['ship-address'])) : NULL);
								$address_user			= (isset($_POST['address_user']) && !empty($_POST['address_user']) ? addslashes(trim($_POST['address_user'])) : NULL);
								$country_user			= (isset($_POST['country_user']) && !empty($_POST['country_user']) ? addslashes(trim($_POST['country_user'])) : NULL);
								$state_user				= (isset($_POST['state_user']) && !empty($_POST['state_user']) ? addslashes(trim($_POST['state_user'])) : NULL);
								$city_user				= (isset($_POST['city_user']) && !empty($_POST['city_user']) ? addslashes(trim($_POST['city_user'])) : NULL);
								$municipality_user		= (isset($_POST['municipality_user']) && !empty($_POST['municipality_user']) ? addslashes(trim($_POST['municipality_user'])) : NULL);
								$colony_user			= (isset($_POST['colony_user']) && !empty($_POST['colony_user']) ? addslashes(trim($_POST['colony_user'])) : NULL);
								$cp_user 				= (isset($_POST['cp_user']) && !empty($_POST['cp_user']) ? addslashes(trim($_POST['cp_user'])) : NULL);
								$street_user			= (isset($_POST['street_user']) && !empty($_POST['street_user']) ? addslashes(trim($_POST['street_user'])) : NULL);
								$outdoor_number_user	= (isset($_POST['outdoor_number_user']) && !empty($_POST['outdoor_number_user']) ? addslashes(trim($_POST['outdoor_number_user'])) : NULL);
								$interior_number_user	= (isset($_POST['interior_number_user']) && !empty($_POST['interior_number_user']) ? addslashes(trim($_POST['interior_number_user'])) : NULL);
								$between_street1_user	= (isset($_POST['between_street1_user']) && !empty($_POST['between_street1_user']) ? addslashes(trim($_POST['between_street1_user'])) : NULL);
								$between_street2_user	= (isset($_POST['between_street2_user']) && !empty($_POST['between_street2_user']) ? addslashes(trim($_POST['between_street2_user'])) : NULL);
								$other_references_user	= (isset($_POST['other_references_user']) && !empty($_POST['other_references_user']) ? addslashes(trim($_POST['other_references_user'])) : NULL);
								$nationality_user		= (isset($_POST['nationality_user']) && !empty($_POST['nationality_user']) ? addslashes(trim($_POST['nationality_user'])) : NULL);

								require_once($slash.'controllers/functions/userController.php');

								userController::updateInformationUserFront($id_user,$name_user,$last_name_user,$rfc_user,$curp_user,$membership_number_user,$about_me_user,$biography_user,$birthdate_user,$age_user,$gender_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$ship_address_user,$address_user,$country_user,$state_user,$city_user,$municipality_user,$colony_user,$cp_user,$street_user,$outdoor_number_user,$interior_number_user,$between_street1_user,$between_street2_user,$other_references_user,$nationality_user,$username_website);
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
                           "error"  => $lang_function['Error en el proceso'].$e -> getMessage());
	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	        exit();
		}