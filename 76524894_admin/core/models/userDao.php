<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/user.php");
	//IMAGENES
	require_once(dirname(__DIR__)."/models/imageDao.php");
	//REDES SOCIALES
	require_once(dirname(__DIR__)."/models/socialMediaDao.php");
	//PERSONALIZACIÓN
	require_once(dirname(__DIR__)."/models/customizeDao.php");
	//CHAT
	//require_once(dirname(__DIR__)."/models/chatsDao.php");

	class userDao
	{
		protected static	$ob_conectar;
		private  			$consulta;
        protected static 	$file_error 		= "";
        protected static 	$file_record 		= "";
        protected static 	$file_help 			= "";
        protected static 	$file_global 		= "";
        protected static 	$file_core 			= "";
        private static      $folder       		= "";
        private static      $full_path       	= "";
        private static      $final_full_path    = "";

		public function __construct(){
			date_default_timezone_set((defined('TIMEZONE_CMS') ? TIMEZONE_CMS : TIMEZONE_FRONT));
	    }

	    public function __destruct(){
	    }

	    public function __clone(){
   			trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
   		}

   		/**
		 * [registerAttemptLogin description]
		 *
		 * @param  [type] $email [description]
		 * @return [type]        [description]
		 */

		private static function registerAttemptLogin($email)
		{
			if(!empty($email))
			{
	            $consulta_attempt 	= "CALL registerAttemptLogin(:email_user,:time_session_attempt)";
	            $valores_attempt 	= array('email_user' 			=> $email,
											'time_session_attempt' 	=> time());

	            $ob_conectar 		= new conectorDB();

	            $resultadoRI 		= $ob_conectar->consultarBD($consulta_attempt,$valores_attempt);

	            foreach($resultadoRI as &$atributoRI)
			 	{
			 		if($atributoRI['ERRNO'] == 1)
			 		{
			 			return TRUE;
			 		}else{
			 				return FALSE;
			 			 }
			    }
			}else{
					return FALSE;
				 }
		}

   		/**
   		 * [logIn description]
   		 *
   		 * @param  [type] $obj_user     [description]
   		 * @param  string $pass_bd      [description]
   		 * @param  string $salt_bd      [description]
   		 * @param  string $password     [description]
   		 * @param  string $user_browser [description]
   		 * @return [type]               [description]
   		 */

		public static function logIn($obj_user,$pass_bd = "",$salt_bd = "",$password = "",$user_browser = "")
		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_user->getEmail_user()) && !empty($obj_user->getPassword_user()))
			{
				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				self::$file_core 	= dirname(__DIR__).'../../core/core.php';
				require_once(self::$file_core);

				$valid_attempts		= time() - (1 * 60 * 60);

				//CREAR OBJETO
				$ob_conectar 		= new conectorDB();

	    		$consulta_logIn 	= "CALL logIn(:email_user,:time_session_attempt)";
	    		$valores_logIn 		= array('email_user' 			=> $obj_user->getEmail_user(),
											'time_session_attempt' 	=> $valid_attempts);

	            $resultadoLI 	 	= $ob_conectar->consultarBD($consulta_logIn,$valores_logIn);

	            foreach($resultadoLI as &$atributoLI)
			 	{
			 		switch ($atributoLI['ERRNO'])
			 		{
			 			case 1:// NO EXISTE EL CORREO O USUARIO
				 				$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["Correo o Usuario"],$lang_error["Error 30"]),"focus" => 1,"redirect" => "false");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
			 				break;
			 			case 2:// EL USUARIO NO ESTA ACTIVO
				 				$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",(defined('CORREO_CONTACTO_CMS') ? CORREO_CONTACTO_CMS : CORREO_CONTACTO),$lang_error["Error 31"]));
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
			 				break;
			 			case 3:// EXCEDIO EL LIMITE DE INTENTOS
				 				$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$obj_user->getEmail_user(),$lang_error["Error 3"]));
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
			 				break;
			 			case 4:// NO RETORNA PASSW Y SALT
				 				$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["Password"],$lang_error["Error 1"]));
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
			 				break;
			 			case 5://ENCRIPTAMOS CONTRASEÑA
			 				$id_user_dao 		= intval(trim($atributoLI['id_user']));
			 				$id_role_dao 		= intval(trim($atributoLI['id_role']));
			 				$name_user_dao 		= stripslashes($atributoLI['name_user']);
			 				$gender_user_dao 	= $atributoLI['gender_user'];
			 				$pass_bd 			= $atributoLI['password_user'];
			 				$salt_bd 			= $atributoLI['salt_user'];

				            if(!empty($id_user_dao) && !empty($id_role_dao) && !empty($name_user_dao) && !empty($gender_user_dao) && !empty($pass_bd) && !empty($salt_bd))
				            {
				            	$password 	= hash('sha512', $obj_user->getPassword_user() . $salt_bd);

				            	if(strlen($password) != 128)
					            {
					            	userDao::registerAttemptLogin($obj_user->getEmail_user());

					            	$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["Password"],$lang_error["Error 2"]."(1)"));
									return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
					            }else{
					            		//COMPARAMOS CONTRASEÑAS
					            		if($password == $pass_bd)
					            		{
					            			if(!isset($_SESSION)){
												require_once(dirname(__DIR__).'/models/cfg/seguridad.php');
												sec_session_start();
											}
					            			$cp_user 						= $atributoLI['cp_user'];//ESTE CAMPO NO ES OBLIGATORIO

					                		$_SESSION['id_user_dao']   		= $id_user_dao;
					                		$_SESSION['id_role_dao']  		= $id_role_dao;
					                		$_SESSION['email_user_dao'] 	= $obj_user->getEmail_user();
					                		$_SESSION['name_user_dao']  	= $name_user_dao;
					                		$_SESSION['gender_user_dao']  	= $gender_user_dao;
					                		$_SESSION['cp_user']  			= $cp_user;//ESTA SESION NO ES OBLIGATORIO PUEDE QUEDAR VACIA
					                		$_SESSION['modal_cp']  			= 0;//BANDERA DE MODAL DESACTIVADA, ES DECIR, SE OBTIENE EL CP DE LA BD Y NO DEL MODAL

											if(empty(intval(trim($_SESSION['id_user_dao']))) && empty($_SESSION['id_role_dao']) && empty($_SESSION['email_user_dao']) && empty($_SESSION['name_user_dao']) && empty($_SESSION['gender_user_dao']))
											{
												session_destroy();
												$valor = array("estado" => "false","error" => $lang_error["Variables de sesión vacías"]);
												return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
												exit();
											}else{
													self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
													require_once(self::$file_record);

													$ob_conectar->registerRecordOneParameterWithEmail($id_user_dao,$obj_user->getEmail_user(),$lang_record["Historial 1"]);

													//id_role
														// 1 = Súper Administrador
								                    	// 2 = Administrador
								                    	// 3 = Usuario
								                   	 	// 4 = Vendedor
								                    	// 5 = Diseñador
								                    	// 6 = Chef
								                    	// 7 = Editor
								                   	//focus
								                    	//0 = Sin efecto
								                    	//1 = Focus en input de email
								                    	//2 = Focus en input de contraseña

													if($id_role_dao == 1 || $id_role_dao == 2){
														$page = "main";
													}else{
														$page = "my-profile/".$id_user_dao;
														 }

													$valor = array("estado" 	=> "true",
																   "resultado" 	=> $lang_error["Error 4"],
																   "role" 		=> $id_role_dao,
																   "page" 		=> $page);
													return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
													exit();
												 }
					            		}else{
					            				userDao::registerAttemptLogin($obj_user->getEmail_user());

					            				$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["Password"],$lang_error["Error 2"]),"focus" => 2);
												return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
												exit();
					            		 	 }
					            	 }
					         }
			 				break;
			 			default:
			 				$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["Correo"],$lang_error["Error 2"]."(2)"));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [showInformationSesionTopHeaderBack description]
		 *
		 * @return [type] [description]
		 */

		public static function showInformationSesionTopHeaderBack()
        {
        	self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao']))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById(intval(trim($_SESSION['id_user_dao'])));

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 1://ERROR ?>
		            		<script>
								$(document).ready(function()
								{
									new PNotify({
										title: "<?php echo $lang_global['Configuraciones']; ?>",
										text: "<?php echo $lang_global["Error 1"]; ?>",
										type: 'error'
									});
								});
							</script> <?php
							break;
						default:
							//CREAR OBJETO
							$ob_conectar = new conectorDB();

							self::$folder = $ob_conectar->showFolderPreviousFile(1);

							if(self::$folder != FALSE)
							{
								if(!empty($value['profile_photo_user']) && !empty($value['name_user']) && !empty($value['email_user']) && !empty($value['name_role']))
								{
							  echo('<header class="header">
										<div class="logo-container">
											<a href="'.URL_IRIDIZEN.'" class="logo">
												<img src="');

							  						//$measure
							  							//0 = Sin medida
							  						//$type_return
														//1 = echo
														//2 = return
													//$type_iso
														//'' = Sin prefijo idioma
														//iso_code (ESP, ENG)
							  						//$view
														//1 = URL_CARPETA_FRONT
														//2 = URL_CARPETA_ADMIN

							  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
							              			imageDao::returnImage('logo-empresa.jpg','','img',0,"img/image_not_found_100.jpg",1,'',2);
							            		echo('" height="50" alt="'.$lang_global["Logo header Iridizen"].'" />
											</a>
											<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
												<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
											</div>
										</div>

										<div class="header-right">
											<span class="separator"></span>
											<div id="userbox" class="userbox">
												<a href="#" data-bs-toggle="dropdown">
													<figure class="profile-picture">
														<img src="');

						            					if($value['profile_photo_user'] == 'profile.png'){
						            								//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
						            						imageDao::returnImage($value['profile_photo_user'],'',self::$folder,35,"img/image_not_found_100.jpg",1,'',2);
					            								echo('" alt="'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'" class="rounded-circle" data-lock-picture="');
					            									//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
					              							imageDao::returnImage($value['profile_photo_user'],'',self::$folder,35,"img/image_not_found_100.jpg",1,'',2);
						            					}else{
						            								//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
						            							imageDao::returnImage($value['profile_photo_user'],'','../'.self::$folder,35,"img/image_not_found_100.jpg",1,'',1);
						            								echo('" alt="'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'" class="rounded-circle" data-lock-picture="');
						            								//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
						              							imageDao::returnImage($value['profile_photo_user'],'','../'.self::$folder,35,"img/image_not_found_100.jpg",1,'',1);
						            						 }
							            			 echo('" />
													</figure>
													<div class="profile-info" data-lock-name="'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'" data-lock-email="'.$value['email_user'].'">
														<span class="name">'.$value['email_user'].'</span>
														<span class="role">'.$value['name_role'].'</span>
													</div>

													<i class="fa custom-caret"></i>
												</a>

												<div class="dropdown-menu">
													<ul class="list-unstyled mb-2">
														<li class="divider"></li>
														<li><p class="text-center m-0">'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'</p></li>
														<li class="divider"></li>
														<li>
															<a role="menuitem" tabindex="-1" href="'.URL_CARPETA_ADMIN.'/my-profile/'.intval(trim($_SESSION['id_user_dao'])).'"><i class="fas fa-user"></i> '.$lang_global["Mi perfil"].'</a>
														</li>
														<li>
															<a role="menuitem" tabindex="-1" href="'.URL_CARPETA_ADMIN.'/sign-off-back"><i class="fas fa-power-off"></i> '.$lang_global["Cerrar sesión"].'</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</header>');
								}else{ ?>
						        		<script>
											$(document).ready(function()
											{
												new PNotify({
													title: "<?php echo $lang_global['Configuraciones']; ?>",
													text: "<?php echo $lang_global['Error en el proceso'].$lang_global["Variables vacías"].'(2)'; ?>",
													type: 'error'
												});
											});
										</script><?php
									  }
							}else{ ?>
					        		<script>
										$(document).ready(function()
										{
											new PNotify({
												title: "<?php echo $lang_global['Configuraciones']; ?>",
												text: "<?php echo $lang_global["No se encontró la carpeta raíz"]; ?>",
												type: 'error'
											});
										});
									</script><?php
								 }
						break;
					}
				}
			}else{ ?>
	        		<script>
						$(document).ready(function()
						{
							new PNotify({
								title: "<?php echo $lang_global['Configuraciones']; ?>",
								text: "<?php echo $lang_global['Error en el proceso'].$lang_global["Variables vacías"].'(1)'; ?>",
								type: 'error'
							});
						});
					</script><?php
				 }
        }

        /**
         * [showPersonalInformationUserById description]
         *
         * @param  [type] $id_user     [description]
         * @param  array  $information [description]
         * @return [type]              [description]
         */

        public static function showPersonalInformationUserById($id_user,$information = array())
        {
        	if(!empty(intval(trim($id_user))))
        	{
        		//CREAR OBJETO
        		$ob_conectar 						= new conectorDB();

	            $consulta_personal_information_u    = "CALL showPersonalInformationUserById(:id_user)";
                $valores_personal_information_u     = array('id_user' => $id_user);

	            $resultadoPIU   					= $ob_conectar->consultarBD($consulta_personal_information_u,$valores_personal_information_u);

	            foreach($resultadoPIU as $indice => $datos)
				{
					if($datos['ERRNO'] == 1){
						$information = array(
						    array("ERRNO" => $datos['ERRNO'])
						);
					}else{
							$information[] = $datos;
						 }
				}

				return $information;
        	}else{
        			$information = array(
					    array("ERRNO" => 1)
					);
        			return $information;
        		 }
		}

		/**
		 * [showPersonalInformationByUserIdInSpecificSection description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function showPersonalInformationByUserIdInSpecificSection($obj_user)
        {
			if(!empty(intval(trim($_SESSION['id_user_dao']))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById(intval(trim($_SESSION['id_user_dao'])));

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 2://CORRECTO
							if(!empty($value['username_website'])){
								return $value['username_website'];
							}
						break;
						default:
							return false;
						break;
					}
				}
			}else{
					return false;
				 }
        }

        /**
         * [signOffBack description]
         *
         * @param  [type] $obj_user [description]
         * @return [type]           [description]
         */

        public static function signOffBack($obj_user)
		{
			self::$file_core 	= dirname(__DIR__).'../../core/core.php';
			require_once(self::$file_core);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
				//CREAR OBJETO
				$ob_conectar 			= new conectorDB();

				$consulta_sign_off 		= "CALL updateUserLastSession(:id_user)";
				$valores_sign_off 		= array('id_user' => $obj_user->getId_user());

	            $resultado_sign_off 	= $ob_conectar->consultarBD($consulta_sign_off,$valores_sign_off);

	            if($resultado_sign_off){
	            	self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
					require_once(self::$file_record);

					$ob_conectar->registerRecord($obj_user->getId_user(),$lang_record["Cerro sesión"]);
	            }

			}

			// Unset all session values
			$_SESSION = array();
			// get session parameters
			$params = session_get_cookie_params();
			// Delete the actual cookie.
			setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
			// Destroy session
			session_destroy();
			header("Location: ".URL_CARPETA_FRONT.'iniciar-sesion');
			exit();
		}

		/**
		 * [showProfilePictureByIdUser description]
		 *
		 * @param  [type] $obj_user      [description]
		 * @param  string $route_default [description]
		 * @return [type]                [description]
		 */

        public static function showProfilePictureByIdUser($obj_user,$route_default="img/image_not_found_580.jpg")
        {
      echo('<div class="mx-auto col-sm-10 col-md-9 col-lg-7 col-xl-4 col-xxl-3 mb-4 mb-xl-0">
				<section id="showProfilePicture" class="card">
					<div class="card-body">');
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById($obj_user->getId_user());

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 1://ERROR
							echo('<hr style="border-style: dashed;"><p class="text-2">'.$lang_global['Problemas al ejecutar consulta'].'</p>');
							break;
						default:
							//CREAR OBJETO
							$ob_conectar = new conectorDB();

							self::$folder = $ob_conectar->showFolderPreviousFile(1);

							if(self::$folder != FALSE && !empty(self::$folder))
							{
								//NO ES NECESARIO VALIDAR $value['last_name_user'] YA QUE SU VALOR PUEDE SER OPCIONAL
								if(!empty($value['name_user']) && !empty($value['profile_photo_user']))
								{
									date_default_timezone_set('America/Mexico_City');
          							setlocale(LC_ALL,"es_ES");
									// Unix
									setlocale(LC_TIME, 'es_ES.UTF-8');
									// En windows
									setlocale(LC_TIME, 'spanish');

									$dateTimeObj 	= new DateTime($value['registration_date_user'], new DateTimeZone('America/Mexico_City'));

									$dateFormatted 	= IntlDateFormatter::formatObject(
									  	$dateTimeObj,
									  	"d 'de' MMMM y, H:mm"
									);

							  echo('<div class="box-progress">
										<div class="progress light m-2">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
							  		<form id="uploadUserProfilePicture" data-id="'.$obj_user->getId_user().'" class="form-horizontal" novalidate="novalidate" method="post" action="/">
							  			<div class="file-select btn btn-sm btn-primary" id="src-file1">
		                  					<i class="fas fa-upload"></i>
										  	<input type="file" name="fileUserProfilePicture" id="fileUserProfilePicture" aria-label="Archivo" value="" required>
										</div>
									</form>
							  		<div class="thumb-info mb-3">
										<img src="');

						  					if($value['profile_photo_user'] == 'profile.png'){
						  						//$measure
							  							//0 = Sin medida
							  						//$type_return
														//1 = echo
														//2 = return
													//$type_iso
														//'' = Sin prefijo idioma
														//iso_code (ESP, ENG)
							  						//$view
														//1 = URL_CARPETA_FRONT
														//2 = URL_CARPETA_ADMIN

							  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
						  						imageDao::returnImage($value['profile_photo_user'],'',self::$folder,400,$route_default,1,'',2);
											}else{
																	//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
													imageDao::returnImage($value['profile_photo_user'],'','../'.self::$folder,400,$route_default,1,'',1);
												 }

			            			 	echo('" class="rounded img-fluid" alt="'.$value['profile_photo_user'].'">
										<div class="thumb-info-title">
											<span class="thumb-info-inner">'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' <span class="d-block">'.stripslashes($value['last_name_user']).'</span>' : '') . '</span>
			            			 		'.(!empty($value['name_role']) ? '<span class="thumb-info-type">'.$value['name_role'].'</span>' : '').'
								  		</div>
									</div>
									<div class="widget-toggle-expand mb-3">
										<div class="widget-content-expanded">
											<ul class="simple-bullet-list mb-3">
												<li class="red">
													<span class="title">'.$lang_global['E-mail'].'</span>
													<span class="description truncate">'.$value['email_user'].'</span>
												</li>');

							  				if(!empty($value['registration_date_user'])){

		              							$registration_date_user = new Datetime($value['registration_date_user']);

		              					  echo('<li class="green">
													<span class="title">'.$lang_global['Fecha de registro'].'</span>
													<span class="description truncate">'.ucfirst(strtolower($dateFormatted)).'</span>
												</li>');
  											}

  											if(!empty($value['last_session_user'])){

  												$dateTimeObjLastSession 	= new DateTime($value['last_session_user'], new DateTimeZone('America/Mexico_City'));

												$dateFormattedLastSession 	= IntlDateFormatter::formatObject(
												  	$dateTimeObjLastSession,
												  	"d 'de' MMMM y, H:mm"
												);

		              					  echo('<li class="blue">
													<span class="title">'.$lang_global['Ultima sesión'].'</span>
													<span class="description truncate">'.ucfirst(strtolower($dateFormattedLastSession)).'</span>
												</li>');
  											}

									  echo('</ul>
										</div>
									</div>');

								  	if(!empty($value['filters_user'])){
								   echo('<hr style="border-style: dashed;">
										<h5 class="mb-2 mt-3 f-semibold">'.$lang_global['Categorías que describen mis artículos'].'</h5>');
										$array2 = explode(", ", $value['filters_user']);
										foreach ($array2 as $arr){
										    echo('<button type="button" class="my-1 me-1 btn btn-xs btn-primary">'.$arr.'</button>');
										}
									}

									if($value['TOTAL_SOCIAL_NETWORK'] > 0){
								  echo('<hr style="border-style: dashed;">
										<div class="social-icons-list">');

								  		$consulta_social_network 		= "CALL showSocialNetworkByUserId(:id_user)";
										$valores_social_network 		= array('id_user' => $obj_user->getId_user());

							            $resultadoSN   					= $ob_conectar->consultarBD($consulta_social_network,$valores_social_network);

							            foreach($resultadoSN as &$datosSN)
						            	{
						            		if($datosSN['ERRNO'] == 2)
						            		{
						            			if(!empty($datosSN['name_social_media']) && !empty($datosSN['icon_social_media']) && !empty($datosSN['url_user_social_media']))
						            			{
						            				echo('<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$datosSN['name_social_media'].'" class="me-1" target="_blank" href="'.$datosSN['url_user_social_media'].'"><i class="'.$datosSN['icon_social_media'].'"></i><span>'.$datosSN['name_social_media'].'</span></a>');
						            			}
						            		}
						            	}
						          echo('</div>');
									}
								}
							}else{
									echo('<hr style="border-style: dashed;"><p class="text-2">'.$lang_global['No se encontró la carpeta raíz'].'</p>');
								 }
						break;
					}
				}
			}else{
					echo('<hr style="border-style: dashed;"><p class="text-2">'.$lang_global['Error en el proceso'].$lang_global['Variables vacías'].'(1)</p>');
				 }
	  		  echo('</div>
				</section>
			</div>');
        }

        /**
         * [showUserInformationByUserId description]
         *
         * @param  [type] $obj_user [description]
         * @return [type]           [description]
         */

        public static function showUserInformationByUserId($obj_user)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_role_dao']))) && !empty(intval(trim($obj_user->getId_user()))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById($obj_user->getId_user());

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 2://CORRECTO
							if(!empty($value['id_role']) && !empty($value['name_user']))
							{
								self::$file_help = dirname(__DIR__).'/helps/help.php';
    							require_once(self::$file_help);

					  echo('<form id="updateInformationUser" class="form-horizontal" data-id="'.$obj_user->getId_user().'" autocomplete="off" novalidate="novalidate">');

					  			if($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2){
					  				if($obj_user->getId_user() != intval(trim($_SESSION['id_user_dao']))){
					      echo('<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="s_user">'.$lang_global["Estatus"].'</label>
									<div class="col-lg col-xxl-4">');

					  									//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
					  					pluginIosSwitch('user',$value['id_user'],stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : ''),$value['s_user'],1,$lang_global['Activar o desactivar']);

					          echo('</div>
					          	</div>
					          	<hr style="border-style: dashed;">');
					  					 }

					      		}

						  echo('<h3><span class="badge bg-dark">'.$lang_global["Datos de sesión"].'</span></h3>');

					  			//$_SESSION['id_role_dao']
				                    // 1 = Súper Administrador
				                    // 2 = Administrador
				                    // 3 = Usuario
				                    // 4 = Vendedora
				                    // 5 = Diseñador
				                    // 6 = Chef
				                    // 7 = Editor

				  				if(intval(trim($_SESSION['id_role_dao'])) == 1 || intval(trim($_SESSION['id_role_dao'])) == 2){
							  echo('<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="id_role"><span class="required">*</span> '.$lang_global["Rol"].'</label>
									<div class="col-lg col-xxl-4">
										<select id="id_role" class="form-control populate" name="id_role" data-plugin-selectTwo required>
											<option value="">'.$lang_global["Selecciona una opción"].'</option>');
			      							userDao::showRoleList($value['id_role']);
								  echo('</select>
									</div>
								</div>');
								}

						  echo('<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="username_website">'.$lang_global["Username"].'</label>
									<div class="col-lg col-xxl-8">
										<div class="alert alert-info mb-1 py-2" role="alert">'.$lang_global["Nota: no se aceptan acentos, comas, espacios y caracteres especiales, solo letras y números"].'</div>
										<input type="text" id="username_website" class="form-control" data-plugin-maxlength maxlength="20" name="username_website" placeholder="'.$lang_global["Ejemplo"].': Joanna, kellyClarkson, john123" value="'.$value['username_website'].'">
									</div>
								</div>
								<hr style="border-style: dashed;"/>
								<h3><span class="badge bg-dark">'.$lang_global["Información básica"].'</span></h3>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="membership_number_user">'.$lang_global["Número de miembro"].'</label>
									<div class="col-lg col-xxl-4">
										<input type="text" id="membership_number_user" class="form-control numeros-sin-punto" name="membership_number_user" data-plugin-maxlength maxlength="25" value="'.$value['membership_number_user'].'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="name_user"><span class="required">*</span> '.$lang_global["Nombre"].'</label>
									<div class="col-lg col-xxl-8">
										<input type="text" id="name_user" class="form-control" name="name_user" data-plugin-maxlength maxlength="50" value="'.stripslashes($value['name_user']).'" required>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="last_name_user"><span class="required">*</span> '.$lang_global["Apellidos"].'</label>
									<div class="col-lg col-xxl-8">
										<input type="text" id="last_name_user" class="form-control" name="last_name_user" data-plugin-maxlength maxlength="50" value="'.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'" required>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="filters_user">'.$lang_global["Categorías que describen mis artículos"].'</label>
									<div class="col-lg col-xxl-8">
										<select id="filters_user" class="form-control" name="filters_user[]" multiple="multiple" data-plugin-multiselect data-plugin-options=\'{ "maxHeight": 200, "enableCaseInsensitiveFiltering": false }\'>');
						  						if(!empty($value['filters_user'])){
													$array2 = explode(", ", $value['filters_user']);
													echo('<option value="Arte y entretenimiento" '.(in_array("Arte y entretenimiento", $array2) ? 'selected' : '') . '>Arte y entretenimiento</option>');
													echo('<option value="Artesanías" '.(in_array("Artesanías", $array2) ? 'selected' : '') . '>Artesanías</option>');
													echo('<option value="Automoción" '.(in_array("Automoción", $array2) ? 'selected' : '') . '>Automoción</option>');
													echo('<option value="Belleza y fitness" '.(in_array("Belleza y fitness", $array2) ? 'selected' : '') . '>Belleza y fitness</option>');
													echo('<option value="Libros y literatura" '.(in_array("Libros y literatura", $array2) ? 'selected' : '') . '>Libros y literatura</option>');
													echo('<option value="Economía e industria" '.(in_array("Economía e industria", $array2) ? 'selected' : '') . '>Economía e industria</option>');
													echo('<option value="Informática y electrónica" '.(in_array("Informática y electrónica", $array2) ? 'selected' : '') . '>Informática y electrónica</option>');
													echo('<option value="Finanzas" '.(in_array("Finanzas", $array2) ? 'selected' : '') . '>Finanzas</option>');
													echo('<option value="Juegos" '.(in_array("Juegos", $array2) ? 'selected' : '') . '>Juegos</option>');
													echo('<option value="Salud" '.(in_array("Salud", $array2) ? 'selected' : '') . '>Salud</option>');
													echo('<option value="Aficiones y tiempo libre" '.(in_array("Aficiones y tiempo libre", $array2) ? 'selected' : '') . '>Aficiones y tiempo libre</option>');
													echo('<option value="Casa y jardín" '.(in_array("Casa y jardín", $array2) ? 'selected' : '') . '>Casa y jardín</option>');
													echo('<option value="Manualidades" '.(in_array("Manualidades", $array2) ? 'selected' : '') . '>Manualidades</option>');
													echo('<option value="Internet y telecomunicaciones" '.(in_array("Internet y telecomunicaciones", $array2) ? 'selected' : '') . '>Internet y telecomunicaciones</option>');
													echo('<option value="Empleo y educación" '.(in_array("Empleo y educación", $array2) ? 'selected' : '') . '>Empleo y educación</option>');
													echo('<option value="Derecho y administración pública" '.(in_array("Derecho y administración pública", $array2) ? 'selected' : '') . '>Derecho y administración pública</option>');
													echo('<option value="Noticias" '.(in_array("Noticias", $array2) ? 'selected' : '') . '>Noticias</option>');
													echo('<option value="Comunidades online" '.(in_array("Comunidades online", $array2) ? 'selected' : '') . '>Comunidades online</option>');
													echo('<option value="Gente y sociedad" '.(in_array("Gente y sociedad", $array2) ? 'selected' : '') . '>Gente y sociedad</option>');
													echo('<option value="Animales y mascotas" '.(in_array("Animales y mascotas", $array2) ? 'selected' : '') . '>Animales y mascotas</option>');
													echo('<option value="Mercado inmobiliario" '.(in_array("Mercado inmobiliario", $array2) ? 'selected' : '') . '>Mercado inmobiliario</option>');
													echo('<option value="Referencia" '.(in_array("Referencia", $array2) ? 'selected' : '') . '>Referencia</option>');
													echo('<option value="Ciencia" '.(in_array("Ciencia", $array2) ? 'selected' : '') . '>Ciencia</option>');
													echo('<option value="Compras" '.(in_array("Compras", $array2) ? 'selected' : '') . '>Compras</option>');
													echo('<option value="Deportes" '.(in_array("Deportes", $array2) ? 'selected' : '') . '>Deportes</option>');
													echo('<option value="Viaje" '.(in_array("Viaje", $array2) ? 'selected' : '') . '>Viaje</option>');
													echo('<option value="Otros" '.(in_array("Otros", $array2) ? 'selected' : '') . '>Otros</option>');
												}else{
												  echo('<option value="Arte y entretenimiento">Arte y entretenimiento</option>
														<option value="Artesanías">Artesanías</option>
														<option value="Automoción">Automoción</option>
														<option value="Belleza y fitness">Belleza y fitness</option>
														<option value="Libros y literatura">Libros y literatura</option>
														<option value="Economía e industria">Economía e industria</option>
														<option value="Informática y electrónica">Informática y electrónica</option>
														<option value="Finanzas">Finanzas</option>
														<option value="Comida y bebida">Comida y bebida</option>
														<option value="Juegos">Juegos</option>
														<option value="Salud">Salud</option>
														<option value="Aficiones y tiempo libre">Aficiones y tiempo libre</option>
														<option value="Casa y jardín">Casa y jardín</option>
														<option value="Manualidades">Manualidades</option>
														<option value="Internet y telecomunicaciones">Internet y telecomunicaciones</option>
														<option value="Empleo y educación">Empleo y educación</option>
														<option value="Derecho y administración pública">Derecho y administración pública</option>
														<option value="Noticias">Noticias</option>
														<option value="Comunidades online">Comunidades online</option>
														<option value="Gente y sociedad">Gente y sociedad</option>
														<option value="Animales y mascotas">Animales y mascotas</option>
														<option value="Mercado inmobiliario">Mercado inmobiliario</option>
														<option value="Referencia">Referencia</option>
														<option value="Ciencia">Ciencia</option>
														<option value="Compras">Compras</option>
														<option value="Deportes">Deportes</option>
														<option value="Viaje">Viaje</option>
														<option value="Otros">Otros</option>');
													 }
									  echo('</select>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="birthdate_user">'.$lang_global["Fecha de nacimiento"].'</label>
									<div class="col-lg col-xxl-4">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fas fa-calendar-alt"></i>
												</span>
											</span>
											<input type="text" id="birthdate_user" class="form-control" name="birthdate_user" data-plugin-datepicker placeholder="aaaa/mm/dd" value="'.$value['birthdate_user'].'">
										</div>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="age_user">'.$lang_global["Edad"].'</label>
									<div class="col-lg col-xxl-8">
										<div data-plugin-spinner data-plugin-options=\'{ "value":18, "step": 1, "min": 18, "max": 100 }\'>
											<div class="input-group" style="width:150px;">
												<button type="button" class="btn btn-default spinner-down">
													<i class="fas fa-minus"></i>
												</button>
												<input type="text" id="age_user" class="spinner-input form-control" name="age_user" maxlength="2" value="'.$value['age_user'].'" readonly>
												<button type="button" class="btn btn-default spinner-up">
													<i class="fas fa-plus"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="gender_user"><span class="required">*</span> '.$lang_global["Género"].'</label>
									<div class="col-lg col-xxl-4">
										<select id="gender_user" class="form-control populate" name="gender_user" data-plugin-selectTwo required>
											<optgroup>');
	                  							userDao::showSelectedGenderListByGender($value['gender_user'],$lang_global["Femenino"],$lang_global["Masculino"],$lang_global["Otro"],$lang_global["Prefiero no decirlo"]);
									  echo('</optgroup>
										</select>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="telephone_user">'.$lang_global["Teléfono"].'</label>
									<div class="col-lg col-xxl-4 telephone_user">
										<input type="tel" id="telephone_user" class="form-control lada" name="telephone_user" data-lada="'.$value['lada_telephone_user'].'" value="'.(!empty($value['lada_telephone_user']) ? $value['lada_telephone_user'] : '') . ''.$value['telephone_user'].'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="cell_phone_user">'.$lang_global["Celular"].'</label>
									<div class="col-lg col-xxl-4 cell_phone_user">
										<input type="tel" id="cell_phone_user" class="form-control lada" name="cell_phone_user" value="'.(!empty($value['lada_cell_phone_user']) ? $value['lada_cell_phone_user'] : '') . ''.$value['cell_phone_user'].'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="nationality_user">'.$lang_global["Nacionalidad"].'</label>
									<div class="col-lg col-xxl-4">
										<input type="text" id="nationality_user" class="form-control" data-plugin-maxlength maxlength="20" name="nationality_user" value="'.(!empty($value['nationality_user']) ? stripslashes($value['nationality_user']) : '').'">
									</div>
								</div>
								<hr style="border-style: dashed;"/>
								<h3><span class="badge bg-dark">'.$lang_global["Información completa"].'</span></h3>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="rfc_user">RFC</label>
									<div class="col-lg col-xxl-8">
										<input type="text" id="rfc_user" class="form-control rfc-sat" name="rfc_user" oninput="validarInputRFC(this)" data-plugin-maxlength maxlength="13" value="'.(!empty($value['rfc_user']) ? stripslashes($value['rfc_user']) : '').'">
										<label id="resultadoRFC" class="d-none"></label>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="curp_user">CURP</label>
									<div class="col-lg col-xxl-8">
										<input type="text" id="curp_user" class="form-control" name="curp_user" data-plugin-maxlength maxlength="18" value="'.(!empty($value['curp_user']) ? stripslashes($value['curp_user']) : '').'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="about_me_user">'.$lang_global["Acerca de mí"].'</label>
									<div class="col-lg col-xxl-8">
										<textarea id="about_me_user" class="form-control" name="about_me_user" data-plugin-maxlength maxlength="1000" rows="5">'.(!empty($value['about_me_user']) ? stripslashes($value['about_me_user']) : '').'</textarea>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="biography_user">'.$lang_global["Biografía"].'</label>
									<div class="col-lg col-xxl-8">
										<textarea
											name="biography_user"
											id="biography_user"
											class="summernote"
											data-plugin-summernote>'.(!empty($value['biography_user']) ? stripslashes($value['biography_user']) : '').'</textarea>
									</div>
								</div>
								<hr style="border-style: dashed;"/>
								<h3><span class="badge bg-dark">'.$lang_global["Dirección"].'</span></h3>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="ship-address">'.$lang_global["Dirección con api google"].'</label>
									<div class="col-lg col-xxl-8">
										<input id="ship-address" class="form-control" name="ship-address" value="'.(!empty($value['ship_address_user']) ? stripslashes($value['ship_address_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="country_user">'.$lang_global["País"].'</label>
									<div class="col-lg col-xxl-4">
										<select id="country_user" class="form-control populate" name="country_user" data-plugin-selectTwo>');
											userDao::selectContry(self::$file_global,$value['country_user']);
								  echo('</select>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="state_user">'.$lang_global["Estado"].'</label>
									<div class="col-lg col-xxl-4">
										<select id="state_user" class="form-control populate" name="state_user" data-plugin-selectTwo>');
			      							userDao::selectState(self::$file_global,(!empty($value['state_user']) ? $value['state_user'] : 'Jalisco'));
								  echo('</select>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="city_user">'.$lang_global["Ciudad"].'</label>
									<div class="col-lg col-xxl-4">
										<input type="text" id="city_user" class="form-control" data-plugin-maxlength maxlength="30" name="city_user" value="'.(!empty($value['city_user']) ? stripslashes($value['city_user']) : '').'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="municipality_user">'.$lang_global["Municipio"].'</label>
									<div class="col-lg col-xxl-4">
										<input type="text" id="municipality_user" class="form-control" data-plugin-maxlength maxlength="30" name="municipality_user" value="'.(!empty($value['municipality_user']) ? stripslashes($value['municipality_user']) : '').'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="colony_user">'.$lang_global["Colonia"].'</label>
									<div class="col-lg col-xxl-4">
										<input type="text" id="colony_user" class="form-control" data-plugin-maxlength maxlength="30" name="colony_user" value="'.(!empty($value['colony_user']) ? stripslashes($value['colony_user']) : '').'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="street_user">'.$lang_global["Calle"].'</label>
									<div class="col-lg col-xxl-8">
										<input id="street_user" class="form-control" name="street_user" data-plugin-maxlength maxlength="30" value="'.(!empty($value['street_user']) ? stripslashes($value['street_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="outdoor_number_user">'.$lang_global["Número Exterior"].'</label>
									<div class="col-lg col-xxl-4">
										<input id="outdoor_number_user" class="form-control" name="outdoor_number_user" data-plugin-maxlength maxlength="10" value="'.(!empty($value['outdoor_number_user']) ? stripslashes($value['outdoor_number_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="interior_number_user">'.$lang_global["Número interior"].'</label>
									<div class="col-lg col-xxl-4">
										<input id="interior_number_user" class="form-control" name="interior_number_user" data-plugin-maxlength maxlength="10" value="'.(!empty($value['interior_number_user']) ? stripslashes($value['interior_number_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="cp_user">'.$lang_global["Código postal"].'</label>
									<div class="col-lg col-xxl-4">
										<input type="text" id="cp_user" class="form-control numeros-sin-punto" data-plugin-maxlength maxlength="7" name="cp_user" value="'.(!empty($value['cp_user']) ? stripslashes($value['cp_user']) : '').'">
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="address_user">Apartamento, unidad, suite o piso #</label>
									<div class="col-lg col-xxl-8">
										<input id="address_user" class="form-control" name="address_user" data-plugin-maxlength maxlength="70" value="'.(!empty($value['address_user']) ? stripslashes($value['address_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="between_street1_user">'.$lang_global["Entre la calle"].'</label>
									<div class="col-lg col-xxl-4">
										<input id="between_street1_user" class="form-control" name="between_street1_user" data-plugin-maxlength maxlength="100" value="'.(!empty($value['between_street1_user']) ? stripslashes($value['between_street1_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="between_street2_user">'.$lang_global["Y la calle"].'</label>
									<div class="col-lg col-xxl-4">
										<input id="between_street2_user" class="form-control" name="between_street2_user" data-plugin-maxlength maxlength="100" value="'.(!empty($value['between_street2_user']) ? stripslashes($value['between_street2_user']) : '').'"/>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="other_references_user">'.$lang_global["Otras referencias"].'</label>
									<div class="col-lg col-xxl-8">
										<textarea id="other_references_user" class="form-control" name="other_references_user" data-plugin-maxlength maxlength="50" rows="4">'.(!empty($value['other_references_user']) ? stripslashes($value['other_references_user']) : '').'</textarea>
									</div>
								</div>
								<div class="text-center mt-4">
									<button type="submit" class="btn btn-primary">'.$lang_global["Modificar"].'</button>
								</div>
							</form>');
							}else{
									echo('<h4 class="mb-3">'.$lang_global['Error en el proceso'].$lang_global["Variables vacías"].'(2)</h4>');
								 }
							break;
						default:
							echo('<h4 class="mb-3">'.$lang_global['Error en el proceso'].$lang_global["Problemas al ejecutar consulta"].'</h4>');
						break;
					}
				}
			}else{
					echo('<h4 class="mb-3">'.$lang_global['Error en el proceso'].$lang_global['Variables vacías'].'(1)</h4>');
				 }
		}

		/**
		 * [showRoleList description]
		 *
		 * @param  [type] $id_role_selected [description]
		 * @return [type]                   [description]
		 */

		private static function showRoleList($id_role_selected)
   		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//NO ES NECESARIO VALIDAR $id_role_selected YA QUE SU VALOR PUEDE SER 0
			//CREAR OBJETO
            $ob_conectar 			= new conectorDB();

            $consulta_role_list 	= "CALL showRoleList()";
            $resultadoRL   			= $ob_conectar->consultarBD($consulta_role_list,null);

          	foreach($resultadoRL as &$datosRL)
            {
            	if($datosRL['ERRNO'] == 2 && !empty($datosRL['id_role']) && !empty($datosRL['name_role']))
            	{
            		echo('<option value="'.$datosRL['id_role'].'" '.($datosRL['id_role'] == $id_role_selected ? 'selected="selected"' : '') . '>'.$datosRL['name_role'].'</option>');
            	}else{
            	    echo('<option value="">'.$lang_error["Error 1"].'(1)</option>');
            		 }
            }
   		}

   		/**
   		 * [showSelectedGenderListByGender description]
   		 *
   		 * @param  [type] $gender_selected     [description]
   		 * @param  [type] $femenino            [description]
   		 * @param  [type] $masculino           [description]
   		 * @param  [type] $otro                [description]
   		 * @param  [type] $prefiero_no_decirlo [description]
   		 * @return [type]                      [description]
   		 */

   		private static function showSelectedGenderListByGender($gender_selected,$femenino,$masculino,$otro,$prefiero_no_decirlo)
   		{
   			if(!empty($gender_selected) && !empty($femenino) && !empty($masculino))
   			{
   			  echo('<option value="F" '.($gender_selected == 'F' ? 'selected="selected"' : '') . '>'.$femenino.'</option>
   			  		<option value="M" '.($gender_selected == 'M' ? 'selected="selected"' : '') . '>'.$masculino.'</option>
   					<option value="U" '.($gender_selected == 'U' ? 'selected="selected"' : '') . '>'.$prefiero_no_decirlo.'</option>
   					<option value="O" '.($gender_selected == 'O' ? 'selected="selected"' : '') . '>'.$otro.'</option>');
   			}
   		}

   		/**
		 * [selectContry description]
		 *
		 * @param  [type] $file     [description]
		 * @param  [type] $selected [description]
		 * @return [type]           [description]
		 */

		private static function selectContry($file,$selected)
		{
			require($file);

		  echo((!empty($selected) ? '<option value="'.$selected.'" selected>'.$selected.'</option>' : '').'
		  		<option value="'.$lang_global["Afganistán"].'">'.$lang_global["Afganistán"].'</option>
				<option value="'.$lang_global["Albania"].'">'.$lang_global["Albania"].'</option>
				<option value="'.$lang_global["Alemania"].'">'.$lang_global["Alemania"].'</option>
				<option value="'.$lang_global["Andorra"].'">'.$lang_global["Andorra"].'</option>
				<option value="'.$lang_global["Angola"].'">'.$lang_global["Angola"].'</option>
				<option value="'.$lang_global["Antigua y Barbuda"].'">'.$lang_global["Antigua y Barbuda"].'</option>
				<option value="'.$lang_global["Arabia Saudita"].'">'.$lang_global["Arabia Saudita"].'</option>
				<option value="'.$lang_global["Argelia"].'">'.$lang_global["Argelia"].'</option>
				<option value="'.$lang_global["Argentina"].'">'.$lang_global["Argentina"].'</option>
				<option value="'.$lang_global["Armenia"].'">'.$lang_global["Armenia"].'</option>
				<option value="'.$lang_global["Australia"].'">'.$lang_global["Australia"].'</option>
				<option value="'.$lang_global["Austria"].'">'.$lang_global["Austria"].'</option>
				<option value="'.$lang_global["Azerbaiyán"].'">'.$lang_global["Azerbaiyán"].'</option>
				<option value="'.$lang_global["Bahamas"].'">'.$lang_global["Bahamas"].'</option>
				<option value="'.$lang_global["Bangladés"].'">'.$lang_global["Bangladés"].'</option>
				<option value="'.$lang_global["Baréin"].'">'.$lang_global["Baréin"].'</option>
				<option value="'.$lang_global["Bélgica"].'">'.$lang_global["Bélgica"].'</option>
				<option value="'.$lang_global["Belice"].'">'.$lang_global["Belice"].'</option>
				<option value="'.$lang_global["Benín"].'">'.$lang_global["Benín"].'</option>
				<option value="'.$lang_global["Bielorrusia"].'">'.$lang_global["Bielorrusia"].'</option>
				<option value="'.$lang_global["Birmania"].'">'.$lang_global["Birmania"].'</option>
				<option value="'.$lang_global["Bolivia"].'">'.$lang_global["Bolivia"].'</option>
				<option value="'.$lang_global["Bosnia-Herzegovina"].'">'.$lang_global["Bosnia-Herzegovina"].'</option>
				<option value="'.$lang_global["Botsuana"].'">'.$lang_global["Botsuana"].'</option>
				<option value="'.$lang_global["Brasil"].'">'.$lang_global["Brasil"].'</option>
				<option value="'.$lang_global["Brunéi"].'">'.$lang_global["Brunéi"].'</option>
				<option value="'.$lang_global["Bulgaria"].'">'.$lang_global["Bulgaria"].'</option>
				<option value="'.$lang_global["Burkina"].'">'.$lang_global["Burkina"].'</option>
				<option value="'.$lang_global["Burundi"].'">'.$lang_global["Burundi"].'</option>
				<option value="'.$lang_global["Bután"].'">'.$lang_global["Bután"].'</option>
				<option value="'.$lang_global["Cabo Verde"].'">'.$lang_global["Cabo Verde"].'</option>
				<option value="'.$lang_global["Camboya"].'">'.$lang_global["Camboya"].'</option>
				<option value="'.$lang_global["Camerún"].'">'.$lang_global["Camerún"].'</option>
				<option value="'.$lang_global["Canadá"].'">'.$lang_global["Canadá"].'</option>
				<option value="'.$lang_global["Catar"].'">'.$lang_global["Catar"].'Catar</option>
				<option value="'.$lang_global["Chile"].'">'.$lang_global["Chile"].'</option>
				<option value="'.$lang_global["China"].'">'.$lang_global["China"].'</option>
				<option value="'.$lang_global["Chipre"].'">'.$lang_global["Chipre"].'</option>
				<option value="'.$lang_global["Colombia"].'">'.$lang_global["Colombia"].'</option>
				<option value="'.$lang_global["Comoras"].'">'.$lang_global["Comoras"].'</option>
				<option value="'.$lang_global["Congo"].'">'.$lang_global["Congo"].'</option>
				<option value="'.$lang_global["Corea del Norte"].'">'.$lang_global["Corea del Norte"].'</option>
				<option value="'.$lang_global["Corea del Sur"].'">'.$lang_global["Corea del Sur"].'</option>
				<option value="'.$lang_global["Costa de Marfil"].'">'.$lang_global["Costa de Marfil"].'</option>
				<option value="'.$lang_global["Costa Rica"].'">'.$lang_global["Costa Rica"].'</option>
				<option value="'.$lang_global["Croacia"].'">'.$lang_global["Croacia"].'</option>
				<option value="'.$lang_global["Cuba"].'">'.$lang_global["Cuba"].'</option>
				<option value="'.$lang_global["Dinamarca"].'">'.$lang_global["Dinamarca"].'</option>
				<option value="'.$lang_global["Dominica"].'">'.$lang_global["Dominica"].'</option>
				<option value="'.$lang_global["Ecuador"].'">'.$lang_global["Ecuador"].'</option>
				<option value="'.$lang_global["Egipto"].'">'.$lang_global["Egipto"].'</option>
				<option value="'.$lang_global["El Salvador"].'">'.$lang_global["El Salvador"].'</option>
				<option value="'.$lang_global["Emiratos Árabes Unidos"].'">'.$lang_global["Emiratos Árabes Unidos"].'</option>
				<option value="'.$lang_global["Eritrea"].'">'.$lang_global["Eritrea"].'</option>
				<option value="'.$lang_global["Eslovaquia"].'">'.$lang_global["Eslovaquia"].'</option>
				<option value="'.$lang_global["Eslovenia"].'">'.$lang_global["Eslovenia"].'</option>
				<option value="'.$lang_global["España"].'">'.$lang_global["España"].'</option>
				<option value="'.$lang_global["Estados Unidos"].'">'.$lang_global["Estados Unidos"].'</option>
				<option value="'.$lang_global["Estonia"].'">'.$lang_global["Estonia"].'</option>
				<option value="'.$lang_global["Etiopía"].'">'.$lang_global["Etiopía"].'</option>
				<option value="'.$lang_global["Filipinas"].'">'.$lang_global["Filipinas"].'</option>
				<option value="'.$lang_global["Finlandia"].'">'.$lang_global["Finlandia"].'</option>
				<option value="'.$lang_global["Fiyi"].'">'.$lang_global["Fiyi"].'</option>
				<option value="'.$lang_global["Francia"].'">'.$lang_global["Francia"].'</option>
				<option value="'.$lang_global["Gabón"].'">'.$lang_global["Gabón"].'</option>
				<option value="'.$lang_global["Gambia"].'">'.$lang_global["Gambia"].'</option>
				<option value="'.$lang_global["Georgia"].'">'.$lang_global["Georgia"].'</option>
				<option value="'.$lang_global["Ghana"].'">'.$lang_global["Ghana"].'</option>
				<option value="'.$lang_global["Granada"].'">'.$lang_global["Granada"].'</option>
				<option value="'.$lang_global["Grecia"].'">'.$lang_global["Grecia"].'</option>
				<option value="'.$lang_global["Guatemala"].'">'.$lang_global["Guatemala"].'</option>
				<option value="'.$lang_global["Guinea"].'">'.$lang_global["Guinea"].'</option>
				<option value="'.$lang_global["Guinea Ecuatorial"].'">'.$lang_global["Guinea Ecuatorial"].'</option>
				<option value="'.$lang_global["Guinea-Bisáu"].'">'.$lang_global["Guinea-Bisáu"].'</option>
				<option value="'.$lang_global["Guyana"].'">'.$lang_global["Guyana"].'</option>
				<option value="'.$lang_global["Haití"].'">'.$lang_global["Haití"].'</option>
				<option value="'.$lang_global["Honduras"].'">'.$lang_global["Honduras"].'</option>
				<option value="'.$lang_global["Hungría"].'">'.$lang_global["Hungría"].'</option>
				<option value="'.$lang_global["India"].'">'.$lang_global["India"].'</option>
				<option value="'.$lang_global["Indonesia"].'">'.$lang_global["Indonesia"].'</option>
				<option value="'.$lang_global["Irak"].'">'.$lang_global["Irak"].'</option>
				<option value="'.$lang_global["Irán"].'">'.$lang_global["Irán"].'</option>
				<option value="'.$lang_global["Irlanda"].'">'.$lang_global["Irlanda"].'</option>
				<option value="'.$lang_global["Islandia"].'">'.$lang_global["Islandia"].'</option>
				<option value="'.$lang_global["Islas Marshall"].'">'.$lang_global["Islas Marshall"].'</option>
				<option value="'.$lang_global["Islas Salomón"].'">'.$lang_global["Islas Salomón"].'</option>
				<option value="'.$lang_global["Israel"].'">'.$lang_global["Israel"].'</option>
				<option value="'.$lang_global["Italia"].'">'.$lang_global["Italia"].'</option>
				<option value="'.$lang_global["Jamaica"].'">'.$lang_global["Jamaica"].'</option>
				<option value="'.$lang_global["Japón"].'">'.$lang_global["Japón"].'</option>
				<option value="'.$lang_global["Jordania"].'">'.$lang_global["Jordania"].'</option>
				<option value="'.$lang_global["Kazajistán"].'">'.$lang_global["Kazajistán"].'</option>
				<option value="'.$lang_global["Kenia"].'">'.$lang_global["Kenia"].'</option>
				<option value="'.$lang_global["Kirguistán"].'">'.$lang_global["Kirguistán"].'</option>
				<option value="'.$lang_global["Kiribati"].'">'.$lang_global["Kiribati"].'</option>
				<option value="'.$lang_global["Kiribati"].'">'.$lang_global["Kiribati"].'</option>
				<option value="'.$lang_global["Kosovo"].'">'.$lang_global["Kosovo"].'</option>
				<option value="'.$lang_global["Kuwait"].'">'.$lang_global["Kuwait"].'</option>
				<option value="'.$lang_global["Laos"].'">'.$lang_global["Laos"].'</option>
				<option value="'.$lang_global["Lesoto"].'">'.$lang_global["Lesoto"].'</option>
				<option value="'.$lang_global["Letonia"].'">'.$lang_global["Letonia"].'</option>
				<option value="'.$lang_global["Líbano"].'">'.$lang_global["Líbano"].'</option>
				<option value="'.$lang_global["Liberia"].'">'.$lang_global["Liberia"].'</option>
				<option value="'.$lang_global["Libia"].'">'.$lang_global["Libia"].'</option>
				<option value="'.$lang_global["Liechtenstein"].'">'.$lang_global["Liechtenstein"].'</option>
				<option value="'.$lang_global["Lituania"].'">'.$lang_global["Lituania"].'</option>
				<option value="'.$lang_global["Luxemburgo"].'">'.$lang_global["Luxemburgo"].'</option>
				<option value="'.$lang_global["Macedonia"].'">'.$lang_global["Macedonia"].'</option>
				<option value="'.$lang_global["Madagascar"].'">'.$lang_global["Madagascar"].'</option>
				<option value="'.$lang_global["Malasia"].'">'.$lang_global["Malasia"].'</option>
				<option value="'.$lang_global["Malaui"].'">'.$lang_global["Malaui"].'</option>
				<option value="'.$lang_global["Maldivas"].'">'.$lang_global["Maldivas"].'</option>
				<option value="'.$lang_global["Malí"].'">'.$lang_global["Malí"].'</option>
				<option value="'.$lang_global["Malta"].'">'.$lang_global["Malta"].'</option>
				<option value="'.$lang_global["Marruecos"].'">'.$lang_global["Marruecos"].'</option>
				<option value="'.$lang_global["Mauricio"].'">'.$lang_global["Mauricio"].'</option>
				<option value="'.$lang_global["Mauritania"].'">'.$lang_global["Mauritania"].'</option>
				<option value="'.$lang_global["México"].'">'.$lang_global["México"].'</option>
				<option value="'.$lang_global["Micronesia"].'">'.$lang_global["Micronesia"].'</option>
				<option value="'.$lang_global["Moldavia"].'">'.$lang_global["Moldavia"].'</option>
				<option value="'.$lang_global["Mónaco"].'">'.$lang_global["Mónaco"].'</option>
				<option value="'.$lang_global["Mongolia"].'">'.$lang_global["Mongolia"].'</option>
				<option value="'.$lang_global["Montenegro"].'">'.$lang_global["Montenegro"].'</option>
				<option value="'.$lang_global["Mozambique"].'">'.$lang_global["Mozambique"].'</option>
				<option value="'.$lang_global["Namibia"].'">'.$lang_global["Namibia"].'</option>
				<option value="'.$lang_global["Nauru"].'">'.$lang_global["Nauru"].'</option>
				<option value="'.$lang_global["Nepal"].'">'.$lang_global["Nepal"].'</option>
				<option value="'.$lang_global["Nicaragua"].'">'.$lang_global["Nicaragua"].'</option>
				<option value="'.$lang_global["Níger"].'">'.$lang_global["Níger"].'</option>
				<option value="'.$lang_global["Nigeria"].'">'.$lang_global["Nigeria"].'</option>
				<option value="'.$lang_global["Noruega"].'">'.$lang_global["Noruega"].'</option>
				<option value="'.$lang_global["Nueva Zelanda"].'">'.$lang_global["Nueva Zelanda"].'</option>
				<option value="'.$lang_global["Omán"].'">'.$lang_global["Omán"].'</option>
				<option value="'.$lang_global["Pakistán"].'">'.$lang_global["Pakistán"].'</option>
				<option value="'.$lang_global["Palaos"].'">'.$lang_global["Palaos"].'</option>
				<option value="'.$lang_global["Palestina"].'">'.$lang_global["Palestina"].'</option>
				<option value="'.$lang_global["Panamá"].'">'.$lang_global["Panamá"].'</option>
				<option value="'.$lang_global["Papúa Nueva Guinea"].'">'.$lang_global["Papúa Nueva Guinea"].'</option>
				<option value="'.$lang_global["Paraguay"].'">'.$lang_global["Paraguay"].'</option>
				<option value="'.$lang_global["Perú"].'">'.$lang_global["Perú"].'</option>
				<option value="'.$lang_global["Polonia"].'">'.$lang_global["Polonia"].'</option>
				<option value="'.$lang_global["Portugal"].'">'.$lang_global["Portugal"].'</option>
				<option value="'.$lang_global["Reino Unido"].'">'.$lang_global["Reino Unido"].'</option>
				<option value="'.$lang_global["República Centro africana"].'">'.$lang_global["República Centro africana"].'</option>
				<option value="'.$lang_global["República Checa"].'">'.$lang_global["República Checa"].'</option>
				<option value="'.$lang_global["República Democrática del Congo"].'">'.$lang_global["República Democrática del Congo"].'</option>
				<option value="'.$lang_global["República Dominicana"].'">'.$lang_global["República Dominicana"].'</option>
				<option value="'.$lang_global["Ruanda"].'">'.$lang_global["Ruanda"].'</option>
				<option value="'.$lang_global["Rumania"].'">'.$lang_global["Rumania"].'</option>
				<option value="'.$lang_global["Rusia"].'">'.$lang_global["Rusia"].'</option>
				<option value="'.$lang_global["Samoa"].'">'.$lang_global["Samoa"].'</option>
				<option value="'.$lang_global["San Cristóbal y Nieves"].'">'.$lang_global["San Cristóbal y Nieves"].'</option>
				<option value="'.$lang_global["San Marino"].'">'.$lang_global["San Marino"].'</option>
				<option value="'.$lang_global["San Vicente y las Granadinas"].'">'.$lang_global["San Vicente y las Granadinas"].'</option>
				<option value="'.$lang_global["Santa Lucía"].'">'.$lang_global["Santa Lucía"].'</option>
				<option value="'.$lang_global["Santo Tomé y Príncipe"].'">'.$lang_global["Santo Tomé y Príncipe"].'</option>
				<option value="'.$lang_global["Senegal"].'">'.$lang_global["Senegal"].'</option>
				<option value="'.$lang_global["Serbia"].'">'.$lang_global["Serbia"].'</option>
				<option value="'.$lang_global["Seychelles"].'">'.$lang_global["Seychelles"].'</option>
				<option value="'.$lang_global["Sierra Leona"].'">'.$lang_global["Sierra Leona"].'</option>
				<option value="'.$lang_global["Singapur"].'">'.$lang_global["Singapur"].'</option>
				<option value="'.$lang_global["Siria"].'">'.$lang_global["Siria"].'</option>
				<option value="'.$lang_global["Somalia"].'">'.$lang_global["Somalia"].'</option>
				<option value="'.$lang_global["Sri Lanka"].'">'.$lang_global["Sri Lanka"].'</option>
				<option value="'.$lang_global["Suazilandia"].'">'.$lang_global["Suazilandia"].'</option>
				<option value="'.$lang_global["Sudáfrica"].'">'.$lang_global["Sudáfrica"].'</option>
				<option value="'.$lang_global["Sudán"].'">'.$lang_global["Sudán"].'</option>
				<option value="'.$lang_global["Sudán del Sur"].'">'.$lang_global["Sudán del Sur"].'</option>
				<option value="'.$lang_global["Suecia"].'">'.$lang_global["Suecia"].'</option>
				<option value="'.$lang_global["Suiza"].'">'.$lang_global["Suiza"].'</option>
				<option value="'.$lang_global["Surinam"].'">'.$lang_global["Surinam"].'</option>
				<option value="'.$lang_global["Tailandia"].'">'.$lang_global["Tailandia"].'</option>
				<option value="'.$lang_global["Taiwán"].'">'.$lang_global["Taiwán"].'</option>
				<option value="'.$lang_global["Tanzania"].'">'.$lang_global["Tanzania"].'</option>
				<option value="'.$lang_global["Tayikistán"].'">'.$lang_global["Tayikistán"].'</option>
				<option value="'.$lang_global["Timor Oriental"].'">'.$lang_global["Timor Oriental"].'</option>
				<option value="'.$lang_global["Togo"].'">'.$lang_global["Togo"].'</option>
				<option value="'.$lang_global["Tonga"].'">'.$lang_global["Tonga"].'</option>
				<option value="'.$lang_global["Trinidad y Tobago"].'">'.$lang_global["Trinidad y Tobago"].'</option>
				<option value="'.$lang_global["Túnez"].'">'.$lang_global["Túnez"].'</option>
				<option value="'.$lang_global["Turquía"].'">'.$lang_global["Turquía"].'</option>');
		}

		/**
		 * [selectState description]
		 *
		 * @param  [type] $file     [description]
		 * @param  [type] $selected [description]
		 * @return [type]           [description]
		 */

		private static function selectState($file,$selected)
		{
			require($file);

		  echo '<option value="'.$selected.'">'.$selected.'</option>
				<optgroup label="'.$lang_global["México"].'">
					<option value="'.$lang_global["Aguascalientes"].'">'.$lang_global["Aguascalientes"].'</option>
					<option value="'.$lang_global["Baja California"].'">'.$lang_global["Baja California"].'</option>
					<option value="'.$lang_global["Baja California Sur"].'">'.$lang_global["Baja California Sur"].'</option>
					<option value="'.$lang_global["Campeche"].'">'.$lang_global["Campeche"].'</option>
					<option value="'.$lang_global["Chiapas"].'">'.$lang_global["Chiapas"].'</option>
					<option value="'.$lang_global["Chihuahua"].'">'.$lang_global["Chihuahua"].'</option>
					<option value="'.$lang_global["Coahuila"].'">'.$lang_global["Coahuila"].'</option>
					<option value="'.$lang_global["Colima"].'">'.$lang_global["Colima"].'</option>
					<option value="'.$lang_global["CD. de México"].'">'.$lang_global["CD. de México"].'</option>
					<option value="'.$lang_global["Durango"].'">'.$lang_global["Durango"].'</option>
					<option value="'.$lang_global["Estado de México"].'">'.$lang_global["Estado de México"].'</option>
					<option value="'.$lang_global["Guanajuato"].'">'.$lang_global["Guanajuato"].'</option>
					<option value="'.$lang_global["Guerrero"].'">'.$lang_global["Guerrero"].'</option>
					<option value="'.$lang_global["Hidalgo"].'">'.$lang_global["Hidalgo"].'</option>
					<option value="'.$lang_global["Jalisco"].'">'.$lang_global["Jalisco"].'</option>
					<option value="'.$lang_global["Michoacán"].'">'.$lang_global["Michoacán"].'</option>
					<option value="'.$lang_global["Morelos"].'">'.$lang_global["Morelos"].'</option>
					<option value="'.$lang_global["Nayarit"].'">'.$lang_global["Nayarit"].'</option>
					<option value="'.$lang_global["Nuevo León"].'">'.$lang_global["Nuevo León"].'</option>
					<option value="'.$lang_global["Oaxaca"].'">'.$lang_global["Oaxaca"].'</option>
					<option value="'.$lang_global["Puebla"].'">'.$lang_global["Puebla"].'</option>
					<option value="'.$lang_global["Querétaro"].'">'.$lang_global["Querétaro"].'</option>
					<option value="'.$lang_global["Quintana Roo"].'">'.$lang_global["Quintana Roo"].'</option>
					<option value="'.$lang_global["San Luis Potosí"].'">'.$lang_global["San Luis Potosí"].'</option>
					<option value="'.$lang_global["Sinaloa"].'">'.$lang_global["Sinaloa"].'</option>
					<option value="'.$lang_global["Sonora"].'">'.$lang_global["Sonora"].'</option>
					<option value="'.$lang_global["Tabasco"].'">'.$lang_global["Tabasco"].'</option>
					<option value="'.$lang_global["Tamaulipas"].'">'.$lang_global["Tamaulipas"].'</option>
					<option value="'.$lang_global["Tlaxcala"].'">'.$lang_global["Tlaxcala"].'</option>
					<option value="'.$lang_global["Veracruz"].'">'.$lang_global["Veracruz"].'</option>
					<option value="'.$lang_global["Yucatán"].'">'.$lang_global["Yucatán"].'</option>
					<option value="'.$lang_global["Zacatecas"].'">'.$lang_global["Zacatecas"].'</option>
				</optgroup>
				<optgroup label="'.$lang_global["Estados Unidos"].'">
					<option value="Alaska">Alaska</option>
					<option value="Hawaii">Hawaii</option>
					<option value="California">California</option>
					<option value="Nevada">Nevada</option>
					<option value="Oregon">Oregon</option>
					<option value="Washington">Washington</option>
					<option value="Arizona">Arizona</option>
					<option value="Colorado">Colorado</option>
					<option value="Idaho">Idaho</option>
					<option value="Montana">Montana</option>
					<option value="Nebraska">Nebraska</option>
					<option value="New Mexico">New Mexico</option>
					<option value="North Dakota">North Dakota</option>
					<option value="Utah">Utah</option>
					<option value="Wyoming">Wyoming</option>
					<option value="Alabama">Alabama</option>
					<option value="Arkansas">Arkansas</option>
					<option value="Illinois">Illinois</option>
					<option value="Iowa">Iowa</option>
					<option value="Kansas">Kansas</option>
					<option value="Kentucky">Kentucky</option>
					<option value="Louisiana">Louisiana</option>
					<option value="Minnesota">Minnesota</option>
					<option value="Mississippi">Mississippi</option>
					<option value="Missouri">Missouri</option>
					<option value="Oklahoma">Oklahoma</option>
					<option value="South Dakota">South Dakota</option>
					<option value="Texas">Texas</option>
					<option value="Tennessee">Tennessee</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Connecticut">Connecticut</option>
					<option value="Delaware">Delaware</option>
					<option value="Florida">Florida</option>
					<option value="Georgia">Georgia</option>
					<option value="Indiana">Indiana</option>
					<option value="Maine">Maine</option>
					<option value="Maryland">Maryland</option>
					<option value="Massachusetts">Massachusetts</option>
					<option value="Michigan">Michigan</option>
					<option value="New Hampshire">New Hampshire</option>
					<option value="New Jersey">New Jersey</option>
					<option value="New York">New York</option>
					<option value="North Carolina">North Carolina</option>
					<option value="Ohio">Ohio</option>
					<option value="Pennsylvania">Pennsylvania</option>
					<option value="Rhode Island">Rhode Island</option>
					<option value="South Carolina">South Carolina</option>
					<option value="Vermont">Vermont</option>
					<option value="Virginia">Virginia</option>
					<option value="West Virginia">West Virginia</option>
				</optgroup>
				<option value="'.$lang_global["Otro"].'">'.$lang_global["Otro"].'</option>';
		}

		/**
		 * [uploadUserProfilePicture description]
		 *
		 * @param  [type] $view           [description]
		 * @param  [type] $obj_user       [description]
		 * @param  [type] $obj_image_lang [description]
		 * @param  string $imageUpload    [description]
		 * @param  string $return_boolean [description]
		 * @param  string $estado         [description]
		 * @param  string $tipo_msj       [description]
		 * @param  string $devuelve       [description]
		 * @param  string $imageAjax      [description]
		 * @param  string $delete_image   [description]
		 * @param  string $route_default  [description]
		 * @return [type]                 [description]
		 */

		public static function uploadUserProfilePicture($view,$obj_user,$obj_image_lang,$imageUpload = "",$return_boolean = "",$estado = "false",$tipo_msj = "error",$devuelve = "",$imageAjax = "",$delete_image = "",$route_default	= "img/image_not_found_580.jpg")
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($view))) && !empty(intval(trim($obj_user->getId_user()))))
			{
				self::$folder = imageDao::showFolderByIdTypeImage(1);

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error["Error 14"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
				}else{
						//$view
                            //1 = Front
                            //2 = Back

						if($view == 1){
							$slash 	= "../../../../";
						}else{
							$slash 	= "../../../../../";
							 }

						self::$full_path = $slash.self::$folder;

						//$allowed_format
							//array()
								//EJEMPLOS:
								//image/jpeg
								//image/png
								//image/svg+xml
								//image/x-icon
								//application/pdf
						//$allowed_size
							//2000000 = 2MB
																						//$obj_image_lang,$folder,$allowed_format,$allowed_size
						$parameters_upload_ajax 			= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png"),2000000);

						$resultado_por_comas1       		= implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   		= explode(",", $resultado_por_comas1);

		    			$return_boolean        				= $resultados_individuales1[0];

						if($return_boolean == TRUE)
						{
							$imageUpload        			= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
								$personalInformationArray 	= userDao::showPersonalInformationUserById($obj_user->getId_user());

								foreach($personalInformationArray as $key => $value)
								{
									if(!empty($value['profile_photo_user'])){
										$delete_image 	= $value['profile_photo_user'];
									}
								}

					            //CREAR OBJETO
								$ob_conectar 				= new conectorDB();

								$consulta1 					= "CALL updateUserProfilePicture(:id_user,:profile_photo_user)";
								$valores1 					= array('id_user' 				=> $obj_user->getId_user(),
																	'profile_photo_user' 	=> $imageUpload);

					            $resultado1     			= $ob_conectar->consultarBD($consulta1,$valores1);

					            foreach($resultado1 as &$atributo1)
					            {
					            	switch ($atributo1['ERRNO']) {
					            		case 2://CORRECTO
					            			self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
								            require_once(self::$file_record);

								            self::$file_help = dirname(__DIR__).'/helps/help.php';
								            require_once(self::$file_help);

					            			if(!empty($delete_image))
							 				{
							 																		//$id_type_image,$folder,$image_previous
							 					imageDao::deleteFolderWithPreviousFileWithoutLanguage(1,self::$full_path,$delete_image);
							 				}

					            			self::$final_full_path  = self::$full_path."/".$imageUpload;

							 				if(!empty(self::$final_full_path))
							 				{
							 					if(file_exists(self::$final_full_path))
												{
													if($obj_image_lang->getFile_type() != "image/svg+xml")
													{
																									//$folder,$id_type_image,$img
														imageDao::parametersUploadFileWithoutLanguage(self::$full_path."/",1,self::$final_full_path);
													}
												}
											}
					            			$ob_conectar->registerRecordTwoParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Modifico"],$lang_error["foto de perfil"],$lang_record["Historial 3"]);

											$estado 				= "true";
						 					$tipo_msj 				= "resultado";
				                			$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Modifico"],"/PARA2/",$lang_error["foto de perfil"],$lang_error["Error 9"]);

				                			//$measure
					  							//0 = Sin medida
					  						//$type_return
												//1 = echo
												//2 = return
											//$type_iso
												//'' = Sin prefijo idioma
												//iso_code (ESP, ENG)
					  						//$view
												//1 = URL_CARPETA_FRONT
												//2 = URL_CARPETA_ADMIN

							  												//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
				                			$imageAjax 	= imageDao::returnImage($imageUpload,'',self::$full_path,400,$route_default,2,'',1);
					            		break;
					            		default:
					            			$devuelve 	= $lang_error["Error 11"]."(1)";
					            		break;
					            	}
					            }//END foreach CALL updateUserProfilePicture()

					            $valor = array("estado" 	=> $estado,
					            			   $tipo_msj 	=> $devuelve,
					            			   "image_ajax" => $imageAjax);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();

							}else{
									$return_error       = $resultados_individuales1[1];

									if(empty($return_error))
									{
										$return_error 	= $lang_error["Error 1"]."(1)";
									}

									$valor = array("estado" => "false",
												   "error" 	=> $return_error);
									return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
								 }//END if(!empty($imageUpload))
					 	}else{
					 			$return_error     = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error = $lang_error["Error 1"]."(2)";
								}

								$valor = array("estado" 		=> "false",
											   "error" 			=> $return_error,
											   "redireccionar" 	=> "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
					 		 }//return_boolean
					 }//END if(self::$folder == FALSE && empty(self::$folder))
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
	                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	                exit();
				 }
		}

		/**
   		 * [updateInformationUser description]
   		 *
   		 * @param  [type] $obj_user [description]
   		 * @return [type]           [description]
   		 */

   		public static function updateInformationUser($obj_user)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_user->getId_user()))) && !empty(intval(trim($obj_user->getId_role()))) && !empty($obj_user->getName_user()) && !empty($obj_user->getLast_name_user()) && !empty($obj_user->getGender_user()))
			{
				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationUser(:id_user,:id_role,:name_user,:last_name_user,:rfc_user,:curp_user,:membership_number_user,:about_me_user,:biography_user,:birthdate_user,:age_user,:gender_user,:lada_telephone_user,:telephone_user,:lada_cell_phone_user,:cell_phone_user,:email_user,:ship_address_user,:address_user,:country_user,:state_user,:city_user,:municipality_user,:colony_user,:cp_user,:street_user,:outdoor_number_user,:interior_number_user,:between_street1_user,:between_street2_user,:other_references_user,:nationality_user,:filters_user,:username_website)";
				$valores 		= array('id_user' 					=> $obj_user->getId_user(),
										'id_role' 					=> $obj_user->getId_role(),
	        							'name_user' 				=> $obj_user->getName_user(),
	        							'last_name_user' 			=> $obj_user->getLast_name_user(),
	        							'rfc_user' 					=> $obj_user->getRfc_user(),
	        							'curp_user' 				=> $obj_user->getCurp_user(),
	        							'membership_number_user' 	=> $obj_user->getMembership_number_user(),
	        							'about_me_user' 			=> $obj_user->getAbout_me_user(),
	        							'biography_user' 			=> $obj_user->getBiography_user(),
	        							'birthdate_user' 			=> $obj_user->getBirthdate_user(),
	        							'age_user' 					=> $obj_user->getAge_user(),
	        							'gender_user' 				=> $obj_user->getGender_user(),
	        							'lada_telephone_user' 		=> $obj_user->getLada_telephone_user(),
	        							'telephone_user' 			=> $obj_user->getTelephone_user(),
	        							'lada_cell_phone_user' 		=> $obj_user->getLada_cell_phone_user(),
	        							'cell_phone_user' 			=> $obj_user->getCell_phone_user(),
	        							'email_user' 				=> $obj_user->getEmail_user(),
	        							'ship_address_user' 		=> $obj_user->getShip_address_user(),
	        							'address_user' 				=> $obj_user->getAddress_user(),
	        							'country_user' 				=> $obj_user->getCountry_user(),
	        							'state_user' 				=> $obj_user->getState_user(),
	        							'city_user' 				=> $obj_user->getCity_user(),
	        							'municipality_user' 		=> $obj_user->getMunicipality_user(),
	        							'colony_user' 				=> $obj_user->getColony_user(),
	        							'cp_user' 					=> $obj_user->getCp_user(),
	        							'street_user' 				=> $obj_user->getStreet_user(),
	        							'outdoor_number_user' 		=> $obj_user->getOutdoor_number_user(),
	        							'interior_number_user' 		=> $obj_user->getInterior_number_user(),
	        							'between_street1_user' 		=> $obj_user->getBetween_street1_user(),
	        							'between_street2_user' 		=> $obj_user->getBetween_street2_user(),
	        							'other_references_user' 	=> $obj_user->getOther_references_user(),
	        							'nationality_user' 			=> $obj_user->getNationality_user(),
	        							'filters_user' 				=> $obj_user->getFilters_user(),
	        							'username_website' 			=> $obj_user->getUsername_website());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            //focus
                	//0 = Sin efecto
                    //1 = Focus en input de email
                    //2 = Focus en input de contraseña
                    //3 = Focus en input de RFC
                    //4 = Focus en input de CURP

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 3://YA EXISTE REGISTRADO EL RFC
			 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["El RFC"],"/PARA2/",$obj_user->getRfc_user(),$lang_error["Error 7"]),"focus" => 3);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 4://YA EXISTE REGISTRADO EL CURP
			 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["La CURP"],"/PARA2/",$obj_user->getCurp_user(),$lang_error["Error 7"]),"focus" => 4);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 5://YA EXISTE REGISTRADO EL ID MIEMBRO
			 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["ID miembro"],"/PARA2/",$obj_user->getMembership_number_user(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 6://EL USERNAME YA EXISTE
			 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Username"],"/PARA2/",$obj_user->getUsername_website(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 7://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

			 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Actualizo"],$lang_error["la información personal de"],$obj_user->getName_user().' '.$obj_user->getLast_name_user(),$lang_record["Historial 2"]);

			 				$valor = array("estado" => "true","resultado" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la información de"],"/PARA3/",$obj_user->getName_user().' '.$obj_user->getLast_name_user(),$lang_error["Error 6"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			default:
			 				//$atributo['ERRNO']
	            				//1 = EL ID USUARIO NO EXISTE
	            				//2 = EL ID ROL NO EXISTE
			 				$valor = array("estado" => "false","error" => $lang_error["Error 1"].'('.$atributo['ERRNO'].')');
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [showEmail description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function showEmail($obj_user)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
		  echo('<div class="row py-4">
		  			<div class="mx-auto col-xl-9 col-xxl-7 mb-4">
		  				<div id="form-email">
		  					<form id="updateEmail" data-id="'.$obj_user->getId_user().'" class="form-horizontal" autocomplete="off" novalidate="novalidate">
					  			<div class="form-group">
									<label class="f-medium c-negro" for="emailUp"><span class="required">*</span> '.$lang_global["E-mail"].'</label>
									<input type="email" class="form-control" data-plugin-maxlength maxlength="50" name="emailUp" id="emailUp" value="" required>
								</div>
								<div class="form-group">
									<label class="f-medium c-negro" for="emailConfirmation"><span class="required">*</span> '.$lang_global["E-mail de confirmación"].'</label>
									<input type="email" class="form-control" data-plugin-maxlength maxlength="50" name="emailConfirmation" id="emailConfirmation" value="" required>
								</div>
								<footer class="mt-3">
									<div class="text-center">
										<button type="submit" class="btn btn-primary">'.$lang_global["Modificar"].'</button>
									</div>
								</footer>
							</form>
		  				</div>
		  			</div>
		  		</div>');
		    }
		}

		/**
		 * [showPassword description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function showPassword($obj_user)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
		  echo('<div class="row py-4">
		  			<div class="mx-auto col-xl-9 col-xxl-7">
		  				<div id="form-password">
		  					<form id="updatePassword" data-id="'.$obj_user->getId_user().'" class="form-horizontal" method="post" action="/">
					  			<div class="form-group">
									<label class="f-medium c-negro" for="password1"><span class="required">*</span> '.$lang_global["Nueva contraseña"].'</label>
									<div class="input-group">
										<input type="text" rel="gp" data-size="14" data-character-set="a-z,A-Z,0-9,#" class="form-control" data-plugin-maxlength minlength="8" maxlength="16" name="password1" id="password1" value="" required>
										<span class="input-group-append">
											<button class="btn btn-default getNewPass" type="button"><i class="fas fa-random fa-fw"></i> Generar</button>
										</span>
									</div>
								</div>
								<div class="form-group">
									<label class="f-medium c-negro" for="password2"><span class="required">*</span> '.$lang_global["Repetir contraseña"].'</label>
									<div class="input-group js-show">
										<input type="password" class="form-control js-pass" minlength="8" data-plugin-maxlength maxlength="16" name="password2" id="password2" value="" required>
										<button type="button" class="btn btn-dark js-check"><i class="fas fa-eye fa-fade"></i></button>
									</div>
								</div>
								<footer class="mt-3 text-end">
									<div class="text-center">
										<button type="submit" class="btn btn-primary">'.$lang_global["Modificar"].'</button>
									</div>
								</footer>
							</form>
		  				</div>
		  			</div>
		  		</div>');
		    }
		}

		/**
		 * [updateEmailUser description]
		 *
		 * @param  [type] $view                [description]
		 * @param  [type] $obj_user            [description]
		 * @param  string $estado              [description]
		 * @param  string $tipo_msj            [description]
		 * @param  string $devuelve            [description]
		 * @param  string $estadoRedireccionar [description]
		 * @param  [type] $error_mail1         [description]
		 * @return [type]                      [description]
		 */

		public static function updateEmailUser($view,$obj_user,$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$error_mail1 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty($view) && !empty(intval(trim($obj_user->getId_user()))) && !empty($obj_user->getEmail_user()) && !empty($obj_user->getEmail_confirmation_user()))
			{
				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				if(userDao::validateEmalConfirmation($obj_user->getEmail_user(),$obj_user->getEmail_confirmation_user()) == TRUE)
				{
					//CREAR OBJETO
					$ob_conectar 	= new conectorDB();

		            $consulta 		= "CALL updateEmailUser(:id_user,:email_user)";
					$valores		= array('id_user' 	 => $obj_user->getId_user(),
											'email_user' => $obj_user->getEmail_user());

		            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

		            foreach($resultado as &$atributo)
				 	{
				 		switch ($atributo['ERRNO'])
				 		{
				 			case 2://YA EXISTE EL CORREO CON OTRO USUARIO
			 					$valor = array("estado" => $estado,
			 								   "error" 	=> replaceStringTwoParametersArray("/PARA1/","El correo","/PARA2/",$obj_user->getEmail_user(),$lang_error["Error 7"]));
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
				 			break;
				 			case 3://CORRECTO
				 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
								require_once(self::$file_record);

				 				if(!empty($atributo['NOMBRE_COMPLETO'])){
				 					self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
									require_once(self::$file_global);

									//ENVIAR AL USUARIO SUS DATOS ACTUALIZADOS
									try {
										ob_start();
										require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
										ob_clean();

										//DE:
										$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
										//AGREGAR RESPUESTA A:
										$mail->addReplyTo($obj_user->getEmail_user(),$atributo['NOMBRE_COMPLETO']);
										//PARA:
										$mail->addAddress($obj_user->getEmail_user(),$atributo['NOMBRE_COMPLETO']);
										//$mail->addCC('');
										//$mail->addBCC('');
										//ASUNTO
										$mail->Subject 	= $lang_record["Asunto confirmacion actualización usuario"];
										//INCRUSTAR HEADER
							           																//filename, cid, name
										$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
										//CUERPO DEL MENSAJE
										require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationUserEmailUpdate.php');

										$mail->MsgHTML($bodyConfirmationUserEmailUpdate);
										//ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail1 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
										//BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
									    $mail->smtpClose();

									}catch(Exception $e){
										//Pretty error messages from PHPMailer
										$valor = array("estado" => $estado,
				 									   "error" 	=> $e->errorMessage());
									}catch(\Exception $e){
										//The leading slash means the Global PHP Exception class will be caught
									    $valor = array("estado" => $estado,
				 									   "error" 	=> $e->getMessage());
									}
				 				}

				 				//$view
				                    //1 = Front
				                    	//La modificación lo hace directamente el usuario logueado
				                    //2 = Back
				                    	//La modificación lo hace directamente el usuario o administrador logueado

				                if($view == 1){
				                	$id_record = $obj_user->getId_user();

				                	//CERRAMOS SESION
				                	$valor = array("estado" 		=> "true",
				                				   "resultado" 		=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["el correo"],"/PARA3/",$obj_user->getEmail_user(),$lang_error["Error 6"]),
				                				   "status_mailer1" => $error_mail1,
				                				   "redirect" 		=> "true");
				                }else{
					                	$id_record = intval(trim($_SESSION['id_user_dao']));

				 						if($obj_user->getId_user() == intval(trim($_SESSION['id_user_dao'])))
						 				{
						 					//CERRAMOS SESION
						 					$valor = array("estado" 		=> "true",
						 								   "resultado" 		=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["el correo"],"/PARA3/",$obj_user->getEmail_user(),$lang_error["Error 6"]),
						 								   "status_mailer1" => $error_mail1,
						 								   "redirect" 		=> "true");
						 				}else{
						 						//MANTENEMOS LA SESION ABIERTA
						 						$valor = array("estado" 		=> "true",
						 									   "resultado" 		=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["el correo"],"/PARA3/",$obj_user->getEmail_user(),$lang_error["Error 6"]),
						 									   "status_mailer1" => $error_mail1,
						 									   "redirect" 		=> "false");
						 					 }
				                	 }

                				//REGISTRAR HISTORIAL
				 				$ob_conectar->registerRecordThreeParameters($id_record,$lang_error["Actualizo"],$lang_error["el correo de"],$obj_user->getEmail_user(),$lang_record["Historial 2"]);

								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
				 			break;
				 			default://EL ID USUARIO NO EXISTE
				 				$valor = array("estado" => $estado,
				 							   "error" 	=> replaceStringThreeParametersArray("/PARA1/",$lang_error["el correo"],"/PARA2/",$obj_user->getEmail_user(),"/PARA3/",$lang_error["no fue modificado"],$lang_error["Error 8"]));
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
				 			break;
				 		}
				    }
				}else{
						$valor = array("estado" => $estado,
									   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["El correo de confirmación es"],$lang_error["Error 2"]));
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => $estado,
								    "error" => $lang_error["Variables de sesión vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [validateEmalConfirmation description]
		 *
		 * @param  [type] $email1 [description]
		 * @param  [type] $email2 [description]
		 * @return [type]         [description]
		 */

		private static function validateEmalConfirmation($email1, $email2)
		{
			if(!empty($email1) && !empty($email2))
			{
				if($email1 == $email2)
				{
					return TRUE;
				}else{
						return FALSE;
					 }
			}else{
					return FALSE;
				 }
		}

		/**
		 * [updatePasswordUser description]
		 *
		 * @param  [type] $view                [description]
		 * @param  [type] $obj_user            [description]
		 * @param  string $estado              [description]
		 * @param  string $tipo_msj            [description]
		 * @param  string $devuelve            [description]
		 * @param  string $estadoRedireccionar [description]
		 * @param  [type] $error_mail1         [description]
		 * @return [type]                      [description]
		 */

		public static function updatePasswordUser($view,$obj_user,$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$error_mail1 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty($_SESSION['email_user_dao']) && !empty($view) && !empty(intval(trim($obj_user->getId_user()))) && !empty($obj_user->getPassword_user()) && !empty($obj_user->getPassword_confirmation_user()))
			{
				if(userDao::validatePasswordConfirmation($obj_user->getPassword_user(),$obj_user->getPassword_confirmation_user()) == TRUE)
				{
					self::$file_help = dirname(__DIR__).'/helps/help.php';
					require_once(self::$file_help);

					if(userDao::validatePasswordLenght($obj_user->getPassword_user()) == TRUE)
					{
						//CREAR OBJETO
						$ob_conectar 	= new conectorDB();

						$random_salt  	= hash('sha512', $obj_user->getPassword_user());
						$passBd 	  	= hash('sha512', $obj_user->getPassword_user() . $random_salt);

			            $consulta 		= "CALL updatePasswordUser(:id_user,:password_user,:salt_user)";
			            $valores 		= array('id_user' 		=> $obj_user->getId_user(),
			        							'password_user' => $passBd,
			        							'salt_user' 	=> $random_salt);

			            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

			            foreach($resultado as &$atributo)
					 	{
					 		switch ($atributo['ERRNO'])
					 		{
					 			case 2://CORRECTO
					 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
									require_once(self::$file_record);

									if(!empty($atributo['EMAIL'])){
										if(!empty($atributo['NOMBRE_COMPLETO'])){
						 					self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
											require_once(self::$file_global);

											$ob_conectar->registerRecordThreeParameters($obj_user->getId_user(),$lang_error["Actualizo"],$lang_error["la contraseña de"],$atributo['EMAIL'],$lang_record["Historial 2"]);

											//ENVIAR AL USUARIO SUS DATOS ACTUALIZADOS
											try {
												ob_start();
												require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
												ob_clean();

												//DE:
												$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
												//AGREGAR RESPUESTA A:
												$mail->addReplyTo($atributo['EMAIL'],$atributo['NOMBRE_COMPLETO']);
												//PARA:
												$mail->addAddress($atributo['EMAIL'],$atributo['NOMBRE_COMPLETO']);
												//$mail->addCC('');
												//$mail->addBCC('');
												//ASUNTO
												$mail->Subject 	= $lang_record["Asunto confirmacion actualización usuario"];

												$EMAIL 			= $atributo['EMAIL'];
												$PASSWORD 		= $obj_user->getPassword_user();
												//INCRUSTAR HEADER
									           																//filename, cid, name
												$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
												//CUERPO DEL MENSAJE
												require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationUserPasswordUpdate.php');

												$mail->MsgHTML($bodyConfirmationUserPasswordUpdate);
												//ENVIAR MAIL
												if(!$mail->send()) {
													$error_mail1 = $mail->ErrorInfo;
													$mail->getSMTPInstance()->reset();
												}
												//BORRAR CONTENEDORES
												$mail->clearCustomHeaders();
											    $mail->clearAllRecipients();
											    $mail->clearAddresses();
												$mail->smtpClose();

											}catch(Exception $e){
												//Pretty error messages from PHPMailer
												$valor = array("estado" => $estado,
						 									   "error" 	=> $e->errorMessage());
											}catch(\Exception $e){
												//The leading slash means the Global PHP Exception class will be caught
											    $valor = array("estado" => $estado,
						 									   "error" 	=> $e->getMessage());
											}
							 			}

						 				//$view
						                    //1 = Front
						                    	//La modificación lo hace directamente el usuario logueado
						                    //2 = Back
						                    	//La modificación lo hace directamente el usuario o administrador logueado

			                    		if($view == 1){
			                				$id_record = $obj_user->getId_user();

			                				$valor = array("estado" 		=> "true",
						 								   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la contraseña"],$lang_error["Error 9"]),
						 								   "status_mailer1" => $error_mail1,
						 								   "redirect" 		=> "true");
			                			}else{
			                					$id_record = intval(trim($_SESSION['id_user_dao']));

			                					if($atributo['EMAIL'] == $_SESSION['email_user_dao'])
								 				{
								 					//CERRAMOS SESION
								 					$valor = array("estado" 		=> "true",
								 								   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la contraseña"],$lang_error["Error 9"]),
								 								   "status_mailer1" => $error_mail1,
								 								   "redirect" 		=> "true");
								 				}else{
								 						//MANTENEMOS LA SESION ABIERTA
								 						$valor = array("estado" 		=> "true",
								 									   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la contraseña"],$lang_error["Error 9"]),
								 									   "status_mailer1" => $error_mail1,
								 									   "redirect" 		=> "false");
								 					 }
			                				 }

			                			//REGISTRAR HISTORIAL
			 							$ob_conectar->registerRecordThreeParameters($id_record,$lang_error["Actualizo"],$lang_error["la contraseña de"],$atributo['EMAIL'],$lang_record["Historial 2"]);
									}else{
											$valor = array("estado" => $estado,
														   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
										 }

									return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
					 			break;
					 			default://ID USUARIO NO EXISTE
					 				$valor = array("estado" => $estado,
					 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["la contraseña"],"/PARA2/",$lang_error["no fue modificada"],$lang_error["Error 5"]));
									return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
					 			break;
					 		}
					    }
					}else{
							$valor = array("estado" => $estado,
										   "error" => $lang_error["Error 10"]);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						 }
				}else{
						$valor = array("estado" => $estado,
									   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["La contraseña de confirmación es"],$lang_error["Error 2"]));
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => $estado,
								   "error" 	=> $lang_error["Variables de sesión vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [validatePasswordConfirmation description]
		 *
		 * @param  [type] $pass1 [description]
		 * @param  [type] $pass2 [description]
		 * @return [type]        [description]
		 */

		private static function validatePasswordConfirmation($pass1, $pass2)
		{
			if(!empty($pass1) && !empty($pass2))
			{
				if($pass1 == $pass2)
				{
					return TRUE;
				}else{
						return FALSE;
					 }
			}else{
					return FALSE;
				 }
		}

		/**
		 * [validatePasswordLenght description]
		 *
		 * @param  [type] $pass1 [description]
		 * @return [type]        [description]
		 */

		public static function validatePasswordLenght($pass1)
		{
			if(!empty($pass1))
			{
				if(strlen($pass1) < 8)
				{
					return FALSE;
				}else{
						return TRUE;
					 }
			}else{
					return TRUE;
				 }
		}

		/**
		 * [showSocialNetworkByUserId description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function showSocialNetworkByUserId($obj_user)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
		  echo('<div class="row py-4">
		  			<div class="mx-auto col-md-12 col-xl-9 col-xxl-7 mb-4">
		  				<div id="form-register-social-network">
		  					<form id="registerOnlySocialNetworkToUser" data-id="'.$obj_user->getId_user().'" class="form-horizontal" autocomplete="off" novalidate="novalidate">
		  						<div class="form-group">
									<label class="f-medium c-negro" for="id_social_media"><span class="required">*</span> '.$lang_global["Red Social"].'</label>
									<select name="id_social_media" id="id_social_media" data-plugin-selectTwo class="form-control populate" required>
										<option value="">'.$lang_global["Selecciona una opción"].'</option>');
		  												//$id_social_media_selected
	          							socialMediaDao::showSocialNetworkList(0);
							  echo('</select>
								</div>
					  			<div class="form-group mt-3 mt-lg-0">
									<label class="f-medium c-negro" for="url_user_social_media"><span class="required">*</span> '.$lang_global["URL"].'</label>
									<input type="url" class="form-control" data-plugin-maxlength maxlength="600" name="url_user_social_media" id="url_user_social_media" value="" placeholder="ej: http://www.dominio.com" required>
								</div>
								<footer class="mt-3">
									<div class="text-center">
										<button type="submit" class="btn btn-primary">'.$lang_global["Registrar"].'</button>
									</div>
								</footer>
							</form>
		  				</div>
		  			</div>');

					if(userDao::getTotalSocialNetworksByUserId($obj_user->getId_user()) > 0)
					{
				  echo('<hr style="border-style: dashed;">
				  		<div class="col-12">
				  			<h2 class="card-title mb-4">Resultados</h2>
			  				<div id="form-update-social-network">');
				  			//CREAR OBJETO
				  			$ob_conectar 	= new conectorDB();

				  	   echo('<table class="table table-responsive-xl table-bordered table-striped mb-0" id="datatable-social-network-user" data-order="[]" data-page-length="25">
								<thead>
									<tr>
										<th>ID</th>
										<th>'.$lang_global['Red Social'].'</th>
										<th>'.$lang_global['URL'].'</th>
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody>');

					  				$consulta 		= "CALL showSocialNetworkByUserId(:id_user)";
					  				$valores 		= array('id_user' => $obj_user->getId_user());

						            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

						            foreach($resultado as &$datos)
					            	{
					            		if($datos['ERRNO'] == 2)
					            		{
					            			if(!empty($datos['id_user_social_media']) && !empty($datos['id_social_media']) && !empty($datos['name_social_media']) && !empty($datos['icon_social_media']) && !empty($datos['url_user_social_media']))
					            			{
					            		  echo('<tr id="item-user_social_media-'.$datos['id_user_social_media'].'">
													<td>'.$datos['id_user_social_media'].'</td>
													<td><span class="d-block text-center c-azul"><i class="'.$datos['icon_social_media'].'" style="font-size: 22px;"></i></span></td>
													<td><span>'.$datos['url_user_social_media'].'</span></td>
													<td class="text-center">
														<!-- MODIFICAR -->
														<a class="modal-with-zoom-anim modal-update-user-social-media" data-bs-toggle="tooltip" title="'.$lang_global['Modificar'].'" href="#modal-update-information-user-social-media-'.$datos['id_user_social_media'].'" data-form="update-information-user-social-media-'.$datos['id_user_social_media'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-3" style="font-size:20px;"></i></a>
														<!-- ELIMINAR -->
														<a class="modal-with-zoom-anim modal-delete-with-4-parameters" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.$lang_global['Red Social'].' '.$datos['name_social_media'].'" href="#modal-delete-with-4-parameters" data-delete-with-4-parameters="'.$datos['id_user_social_media'].'/'.str_replace("/", " ", $datos['name_social_media']).'/1/item-user_social_media-"><i class="fas fa-trash c-gris-oscuro" style="font-size:20px;"></i></a>');

					            		  				//MODAL MODIFICAR INFORMACION REDES SOCIALES
					            		  		  echo('<div id="modal-update-information-user-social-media-'.$datos['id_user_social_media'].'" class="zoom-anim-dialog modal-block modal-block-primary modal-block-lg mfp-hide">
															<section class="card">
																<header class="card-header">
																	<h2 class="card-title">'.$lang_global['Modificar información'].'</h2>
																</header>
																<div class="card-body">
																	<form id="update-information-user-social-media-'.$datos['id_user_social_media'].'" class="form-horizontal" data-modal-update-specific-table-information="'.$datos['id_user_social_media'].'" autocomplete="off" novalidate="novalidate">
																		<div class="form-group">
																			<label class="f-medium c-negro" for="id_social_media_'.$datos['id_user_social_media'].'"><span class="required">*</span> '.$lang_global["Red Social"].'</label>
																			<select name="id_social_media[]" id="id_social_media_'.$datos['id_user_social_media'].'" data-plugin-selectTwo class="form-control populate" required>
																				<option value="">'.$lang_global["Selecciona una opción"].'</option>');
					            		  		  																	//$id_social_media_selected
											          							socialMediaDao::showSocialNetworkList($datos['id_social_media']);
																	  echo('</select>
																		</div>
																		<div class="form-group">
																			<label class="f-medium c-negro" for="url_user_social_media_'.$datos['id_user_social_media'].'"><span class="required">*</span> '.$lang_global["URL"].'</label>
																			<input type="url" class="form-control" data-plugin-maxlength maxlength="600" name="url_user_social_media[]" id="url_user_social_media_'.$datos['id_user_social_media'].'" value="'.$datos['url_user_social_media'].'" placeholder="ej: http://www.dominio.com" required>
																		</div>
																		<div class="form-group text-end">
																			<button type="submit" class="btn btn-primary modal-confirm">'.$lang_global["Modificar"].'</button>
																			<button class="btn btn-default modal-dismiss">'.$lang_global["Cancelar"].'</button>
																		</footer>
																	</form>
																</div>
															</section>
														</div>');

											  echo('</td>
												</tr>');
					            			}else{
						            	  echo('<tr>
													<td colspan="4">'.$lang_global['Error en el proceso'].$lang_global['Variables vacías'].'</td>
												</tr>');
								            	 }
					            		}else{
					            	  echo('<tr>
												<td colspan="4">'.$lang_global['Error en el proceso'].$lang_global['Problemas al ejecutar consulta'].'</td>
											</tr>');
					            			 }
					            	}
						  echo('</tbody>
							</table>');

			  		  echo('</div>
			  			</div>');
					}
		  echo('</div>');
			}
		}

		/**
		 * [getTotalSocialNetworksByUserId description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		private static function getTotalSocialNetworksByUserId($id_user)
        {
			if(!empty($id_user))
			{
				//CREAR OBJETO
				$ob_conectar 					= new conectorDB();

	            $consulta_total_social_network 	= "CALL getTotalSocialNetworksByUserId(:id_user)";
	            $valores_total_social_network 	= array('id_user' => $id_user);

	            $resultadoTSN 	 				= $ob_conectar->consultarBD($consulta_total_social_network,$valores_total_social_network);

	            foreach($resultadoTSN as &$atributoTSN)
			 	{
			 		if(empty($atributoTSN['totalSocialNetworksByUserId']))
			 		{
						return 0;
			 		}else{
			 				return $atributoTSN['totalSocialNetworksByUserId'];
			 			 }
			    }
			}
        }

        /**
         * [registerOnlySocialNetworkToUser description]
         *
         * @param  [type] $obj_user         [description]
         * @param  [type] $obj_social_media [description]
         * @param  string $icon             [description]
         * @return [type]                   [description]
         */

		public static function registerOnlySocialNetworkToUser($obj_user,$obj_social_media,$icon = "")
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_user->getId_user()))) && !empty(intval(trim($obj_social_media->getId_social_media()))) && !empty($obj_user->getUrl_user_social_media()))
			{
				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL registerOnlySocialNetworkToUser(:id_user,:id_social_media,:id_url_user_social_media)";
	            $valores 		= array('id_user' 					=> $obj_user->getId_user(),
	        							'id_social_media' 			=> $obj_social_media->getId_social_media(),
	        							'id_url_user_social_media' 	=> $obj_user->getUrl_user_social_media());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 3://YA EXISTE REGISTRADA LA RED SOCIAL
			 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["La red social"],"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 4://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

							$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Asocio"],$lang_error["Red Social"],$obj_user->getUrl_user_social_media(),$lang_record["Historial 2"]);

			 				if(!empty($atributo['ID_U_SM']))
			 				{
			 					//$id_social_media,$measure_icon
			 					$icon = socialMediaDao::showSocialNetworkIconByIdSocialMedia($obj_social_media->getId_social_media(),22);

			 					$valor = array("estado" 				=> "true",
			 								   "resultado" 				=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Red Social"],"/PARA2/",$lang_error["asociada"],$lang_error["Error 9"]),
			 								   "datetable" 				=> "true",
			 								   "id_user_social_media" 	=> $atributo['ID_U_SM'],
			 								   "icon_social_media" 		=> '<span class="d-block text-center c-azul">'.$icon.'</span>',
			 								   "url_user_social_media" 	=> $obj_user->getUrl_user_social_media());
			 				}else{
			 					$valor = array("estado" 				=> "true",
			 								   "resultado" 				=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Red Social"],"/PARA2/",$lang_error["asociada"],$lang_error["Error 9"]),
			 								   "datetable" 				=> "false");
			 					 }

							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			default:
			 				//$atributo['ERRNO']
	            				//1 = EL ID USUARIO NO EXISTE
	            				//2 = EL ID SOCIAL MEDIA NO EXISTE
			 				$valor = array("estado" => "false","error" => $lang_error["Error 1"].'('.$atributo['ERRNO'].')');
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 		}
			    }
			}
		}

		/**
		 * [showUserRecord description]
		 *
		 * @param  [type]  $obj_user [description]
		 * @param  integer $x        [description]
		 * @return [type]            [description]
		 */

		public static function showUserRecord($obj_user,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
	        	//CREAR OBJETO
	        	$ob_conectar 	= new conectorDB();

	        	$consulta 		= "CALL showUserRecord(:id_user)";
  				$valores 		= array('id_user' => $obj_user->getId_user());

	            $resultado  	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_USER_HISTORY'] > 0)
            		{
            			if($x == 1){
            				date_default_timezone_set('America/Mexico_City');
							setlocale(LC_ALL,"es_ES");
							// Unix
							setlocale(LC_TIME, 'es_ES.UTF-8');
							// En windows
							setlocale(LC_TIME, 'spanish');

					  echo('<table class="table table-responsive-sm table-bordered table-striped mb-0" id="datatable-user-record" data-order="[]" data-page-length="25">
								<thead>
									<tr>
										<th>'.$lang_global['Acción'].'</th>
										<th>'.$lang_global['Fecha'].'</th>
									</tr>
								</thead>
								<tbody>');
            			}

	            					$dateTimeObj 	= new DateTime($datos['date_record'], new DateTimeZone('America/Mexico_City'));

									$dateFormatted 	= IntlDateFormatter::formatObject(
									  	$dateTimeObj,
									  	"d 'de' MMMM y, H:mm"
									);

			            	  echo('<tr>
										<td>'.$datos['resumen_record'].'</td>
										<td>'.ucfirst(strtolower($dateFormatted)).'</td>
									</tr>');

            			if(count($resultado) == $x){
            			  echo('</tbody>
							</table>');
            			}

            			$x++;
            		}else{
            			echo('<h4 class="c-negro f-medium text-center">'.$lang_global['Sin historial'].'</h4>');
            			 }
            	}
			}
		}

		/**
		 * [updateInformationUserSocialMedia description]
		 *
		 * @param  [type] $obj_user         [description]
		 * @param  [type] $obj_social_media [description]
		 * @return [type]                   [description]
		 */

		public static function updateInformationUserSocialMedia($obj_user,$obj_social_media)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_user->getId_user_social_media()))) && !empty(intval(trim($obj_social_media->getId_social_media()))) && !empty($obj_user->getUrl_user_social_media()))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationUserSocialMedia(:id_user_social_media,:id_social_media,:url_user_social_media)";
				$valores 		= array('id_user_social_media' 	=> $obj_user->getId_user_social_media(),
										'id_social_media' 		=> $obj_social_media->getId_social_media(),
										'url_user_social_media' => $obj_user->getUrl_user_social_media());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 3://CORRECTO
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

			 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Modifico"],$lang_error["La red social"],$obj_user->getUrl_user_social_media(),$lang_record["Historial 2"]);

			 				$valor = array("estado" 			=> "true",
			 							   "resultado" 			=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Red Social"],"/PARA2/",
	            						   	$lang_error["actualizada"],$lang_error["Error 9"]),
			 							   "id" 				=> $obj_user->getId_user_social_media(),
			 							   "font_awesome" 		=> '<span class="d-block text-center c-azul"><i class="'.$atributo['ICO'].'" style="font-size: 22px;"></i></span>',
			 							   "url_social_media" 	=> $obj_user->getUrl_user_social_media());
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			default:
			 				//$atributo['ERRNO']
	            				//1 = EL ID USUARIO SOCIAL MEDIA NO EXISTE
	            				//2 = EL ID SOCIAL MEDIA NO EXISTE
			 				$valor = array("estado" => "false","error" => $lang_error["Error 1"].'('.$atributo['ERRNO'].')');
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
         * [showFormUpdateUserTheme description]
         *
         * @param  [type] $obj_image_lang [description]
         * @return [type]                 [description]
         */

        public static function showFormUpdateUserTheme($obj_image_lang)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))))
			{
				//$id_user,$type_info
					//1 = name_customize_lang
					//2 = background_image_customize_lang
					//3 = background_color_customize_lang
					//4 = color_customize_lang
					//5 = text_block_1_customize_lang
					//6 = id_customize

																								//$id_user,$type_info
				$background_image_customize_lang 	= customizeDao::showAThemeAttributeByUserId(intval(trim($_SESSION['id_user_dao'])),2);
																								//$id_user,$type_info
				$color_customize_lang 				= customizeDao::showAThemeAttributeByUserId(intval(trim($_SESSION['id_user_dao'])),4);
																								//$id_user,$type_info
				$text_block_1_customize_lang 		= customizeDao::showAThemeAttributeByUserId(intval(trim($_SESSION['id_user_dao'])),5);
																								//$id_user,$type_info
				$id_customize_selected 				= customizeDao::showAThemeAttributeByUserId(intval(trim($_SESSION['id_user_dao'])),6);

		  echo('<section class="card card-dark mb-4">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
						</div>
						<h2 class="card-title">'.$lang_global["Edita tu diseño"].'</h2>
						<p class="card-subtitle">En esta sección podrás editar el tema.</p>
					</header>
					<form id="updateUserTheme" data-id="'.intval(trim($_SESSION['id_user_dao'])).'" class="form-horizontal form-bordered" novalidate="novalidate" method="post" action="/">
						<div class="card-body">
							<div class="form-group row">
								<div class="col-lg-3">
									<label class="control-label pt-2">'.$lang_global["Fondo del tema actual"].'</label>
								</div>
								<div class="col-lg-6">
									<img src="'.URL_CARPETA_FRONT.'img/personalizaciones/fondos/'.$background_image_customize_lang.'" class="img-thumbnail w-auto" style="height:80px;" alt="">
								</div>
							</div>
							<hr style="border-style: dashed;">
							<div class="form-group row">
								<div class="col-lg-3">
									<label class="control-label pt-2" for="color_customize_lang">'.$lang_global["Color del tema"].'<button type="button" class="info ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="'.$lang_global["Info color del tema"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
								</div>
								<div class="col-lg">
									<input class="border-0 mt-1" type="color" id="color_customize_lang" name="color_customize_lang" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#'.$color_customize_lang.'" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-3">
									<label class="control-label pt-2">'.$lang_global["Selecciona un fondo predefinido"].'</label>
									<a class="my-1 me-1 modal-with-zoom-anim ws-normal f-bold d-block" href="#modalAnimFondo">'.$lang_global["Ejemplo"].'</a>
									<div id="modalAnimFondo" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="card">
											<div class="card-body">
												<div class="modal-wrapper">
													<div class="modal-text">
														<img class="img-fluid" src="'.URL_CARPETA_ADMIN.'/img/pagina_web/fondo-parte-superior.jpg" alt="">
													</div>
												</div>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-default modal-dismiss">'.$lang_global["Cerrar"].'</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
								</div>
								<div class="col-lg-9">');
		  							customizeDao::showAllBackgroundsOfTheTheme($id_customize_selected);
						  echo('</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-3">
									<label class="control-label pt-2" for="fileCustomization">'.$lang_global["O si lo prefieres, sube tu fondo"].'<button type="button" class="info ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="'.$lang_global["Info fondo tema"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
								</div>
								<div class="col-lg-9">
	                  				<small class="d-block text-center c-negro">'.$lang_global["Formatos aceptados: JPG, JPEG, PNG y SVG"].'</small>
									<div class="fileupload fileupload-new mt-3" data-provides="fileupload">
										<div class="input-append text-center">
											<div class="uneditable-input">
												<i class="fas fa-file fileupload-exists"></i>
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">'.$lang_global["Cambiar"].'</span>
												<span class="fileupload-new">'.$lang_global["Seleccionar archivo"].'</span>
												<input type="file" name="fileCustomization" id="fileCustomization" class="form-control">
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">'.$lang_global["Quitar"].'</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-3">
									<label class="control-label pt-2" for="text_block_1_customize_lang">'.$lang_global["Texto bloque 1"].'</label>
									<a class="my-1 me-1 modal-with-zoom-anim ws-normal f-bold d-block" href="#modalAnimTextoBloque1">'.$lang_global["Ejemplo"].'</a>
									<div id="modalAnimTextoBloque1" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="card">
											<div class="card-body">
												<div class="modal-wrapper">
													<div class="modal-text">
														<img class="img-fluid" src="'.URL_CARPETA_ADMIN.'/img/pagina_web/texto-bloque-1.jpg" alt="">
													</div>
												</div>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-end">
														<button class="btn btn-default modal-dismiss">'.$lang_global["Cerrar"].'</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
								</div>
								<div class="col-lg-9">
									<textarea id="text_block_1_customize_lang" class="form-control" data-plugin-maxlength maxlength="100" rows="6" name="text_block_1_customize_lang" required>'.$text_block_1_customize_lang.'</textarea>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-primary">'.$lang_global["Modificar"].'</button>
							</div>
						</div>
					</form>
				</section>');
			}
		}

		/**
		 * [updateUserThemeAndColor description]
		 *
		 * @param  [type] $obj_user           [description]
		 * @param  [type] $obj_customize_lang [description]
		 * @return [type]                     [description]
		 */

		public static function updateUserThemeAndColor($obj_user,$obj_customize_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_user->getId_user()))) && !empty(intval(trim($obj_customize_lang->getId_customize()))) && !empty($obj_customize_lang->getColor_customize_lang()) && !empty($obj_customize_lang->getText_block_1_customize_lang())){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateUserThemeAndColor(:id_user,:id_customize,:color_customize_lang,:text_block_1_customize_lang)";
	            $valores		= array('id_user' 						=> $obj_user->getId_user(),
	        							'id_customize' 					=> $obj_customize_lang->getId_customize(),
	        							'color_customize_lang' 			=> $obj_customize_lang->getColor_customize_lang(),
	        							'text_block_1_customize_lang' 	=> $obj_customize_lang->getText_block_1_customize_lang());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 3://CORRECTO
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

			 				if($atributo['ACTION'] == 1){
    							$accion = $lang_error["Registro"];
    						}else{
    							$accion = $lang_error["Modifico"];
    							 }

    						$ob_conectar->registerRecordTwoParameters($obj_user->getId_user(),$accion,$lang_error["tema"],$lang_record["Historial 3"]);
		 					//MENSAJE EMERGENTE
		 					$valor = array("estado" => "true","resultado" => replaceStringTwoParametersArray("/PARA1/",$accion,"/PARA2/",$lang_error["tema"],$lang_error["Error 9"]),"redireccionar" => "true");
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			default:
			 				//$atributo['ERRNO']
	            				//1 = EL ID USER NO EXISTE
	            				//2 = EL ID CUSTOMIZE NO EXISTE
			 				$valor = array("estado" => "false","error" => $lang_error["Error 1"].'('.$atributo['ERRNO'].')');
			 				return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false","error" => $lang_error["Variables de sesión vacías"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
				 }
		}

		/**
		 * [uploadUserThemeWithFile description]
		 *
		 * @param  [type] $obj_user            [description]
		 * @param  [type] $obj_image_lang      [description]
		 * @param  [type] $obj_customize_lang  [description]
		 * @param  string $imageUpload         [description]
		 * @param  string $return_boolean      [description]
		 * @param  string $estado              [description]
		 * @param  string $tipo_msj            [description]
		 * @param  string $devuelve            [description]
		 * @param  string $estadoRedireccionar [description]
		 * @param  string $accion              [description]
		 * @param  string $imageWithPrefixLang [description]
		 * @return [type]                      [description]
		 */

		public static function uploadUserThemeWithFile($obj_user,$obj_image_lang,$obj_customize_lang,$imageUpload = "",$return_boolean = "",$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "true",$accion = "",$imageWithPrefixLang = "")
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_user->getId_user()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty($obj_customize_lang->getColor_customize_lang()) && !empty($obj_customize_lang->getText_block_1_customize_lang()) && !empty($obj_image_lang->getFile_type()))
			{
				self::$folder = customizeDao::showFolderByCustomizeId(1);

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" => "false","error" => $lang_error["Error 14"], "redireccionar" => "true");
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
				}else{
						self::$full_path 			= "../../../../../".self::$folder;

						//$allowed_format
							//array()
								//EJEMPLOS:
								//image/jpeg
								//image/png
								//image/svg+xml
								//image/x-icon
								//application/pdf
						//$allowed_size
							//2000000 = 2MB
																						//$obj_image_lang,$folder,$allowed_format,$allowed_size
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
					            self::$file_record 	= dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
					            require_once(self::$file_record);

					            self::$file_help 	= dirname(__DIR__).'/helps/help.php';
					            require_once(self::$file_help);

					            //CREAR OBJETO
								$ob_conectar 		= new conectorDB();

								$consulta1      	= "CALL registerCustomization()";
					            $resultado1     	= $ob_conectar->consultarBD($consulta1,null);

					            foreach($resultado1 as &$atributo1){

					            	$id_customize 	= $atributo1['ID_C'];

					            	if(empty($id_customize)){
					            		$devuelve 				= $lang_error["Error 11"]."(1)";
					            	}else{
					            			$file_type 				= explode("/", $obj_image_lang->getFile_type());

					            			$consulta2      		= "CALL showActiveLanguage()";
					            			$resultado2     		= $ob_conectar->consultarBD($consulta2,null);

					            			foreach($resultado2 as &$atributo2){
					            				if($atributo2['ERRNO'] == 1)
								                {
								                	$devuelve 				= $lang_error["Error 11"]."(2)";
								                }else{
								                		$id_lang 			= $atributo2['id_lang'];
								                		$iso_code 			= $atributo2['iso_code'];

								                		if(empty($id_lang) || empty($iso_code))
						 								{
						 									$devuelve 				= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(1)";
						 								}else{
						 										if($file_type[0] != "video"){
							 										$imageWithPrefixLang 	= imageDao::renameImageLang($imageUpload,$iso_code);
							 									}else{
							 										$imageWithPrefixLang 	= $imageUpload;
							 										 }

						 										if(empty($imageWithPrefixLang))
						 										{
						 											$devuelve 				= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(2)";
						 										}else{
						 												$consulta3 			= "CALL registerCustomizationLang(:id_customize,:id_lang,:id_user,:color_customize_lang,:text_block_1_customize_lang,:image_lang)";
						 												$valores3			= array('id_customize' 					=> $id_customize,
						 																			'id_lang' 						=> $id_lang,
						 																			'id_user' 						=> $obj_user->getId_user(),
						 																			'color_customize_lang' 			=> $obj_customize_lang->getColor_customize_lang(),
						 																			'text_block_1_customize_lang' 	=> $obj_customize_lang->getText_block_1_customize_lang(),
						 																			'image_lang' 					=> $imageWithPrefixLang);

												            			$resultado3 	 	= $ob_conectar->consultarBD($consulta3,$valores3);

												            			foreach($resultado3 as &$atributo3){
												            				switch ($atributo3['ERRNO']) {
												            					case 1://EL ID CUSTOMIZE NO EXISTE
												            						$devuelve 				= $lang_error["Error 11"]."(3)";
												            					break;
												            					case 2://EL ID LANG NO EXISTE
												            						$devuelve 				= $lang_error["Error 11"]."(4)";
												            					break;
												            					default://CORRECTO
												            						self::$final_full_path  = self::$full_path."/".$imageUpload;

																	 				if(!empty(self::$final_full_path))
																	 				{
																	 					if(file_exists(self::$final_full_path))
																						{
																							if($file_type[0] != "video"){
																								imageDao::duplicateImagePrefixLang(self::$full_path,$imageUpload,$iso_code);

																								if($obj_image_lang->getFile_type() != "image/svg+xml")
																								{
																									imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$iso_code);
																								}
																							}
																						}
																					}
												            					break;
												            				}//END switch ($atributo3['ERRNO'])
					            										}//END foreach CALL registerCustomizationLang()
						 											 }//END if(empty($imageWithPrefixLang))
						 									 }//END if(empty($id_lang) && empty($iso_code))
								                	 }//END if($atributo2['ERRNO'] == 1)
					            			}//END foreach CALL showActiveLanguage()

					            			$consulta4      = "CALL updateUserTheme(:id_user,:id_customize)";
					            			$valores4		= array('id_user' 		=> $obj_user->getId_user(),
					            									'id_customize' 	=> $id_customize);

					            			$resultado4     = $ob_conectar->consultarBD($consulta4,$valores4);

					            			foreach($resultado4 as &$atributo4){
					            				switch ($atributo4['ERRNO']) {
					            					case 1://EL ID USER NO EXISTE
					            						$devuelve 				= $lang_error["Error 11"]."(5)";
					            					break;
					            					case 2://EL ID CUSTOMIZE NO EXISTE
					            						$devuelve 				= $lang_error["Error 11"]."(6)";
					            					break;
					            					default://CORRECTO
					            						if($atributo4['ERRNO'] == 3){
					            							$accion = $lang_error["Registro"];
					            						}else{
					            							$accion = $lang_error["Modifico"];
					            							 }

					            						$ob_conectar->registerRecordTwoParameters($obj_user->getId_user(),$accion,$lang_error["tema"],$lang_record["Historial 3"]);

														$estado 				= "true";
									 					$tipo_msj 				= "resultado";
							                			$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$accion,"/PARA2/",$lang_error["tema"],$lang_error["Error 9"]);
					            					break;
					            				}
					            			}
					            		 }//END if(empty($id_customize)){
					            }//END foreach CALL registerCustomization()

					            $valor = array("estado" 		=> $estado,
					            				$tipo_msj 		=> $devuelve,
					            				"redireccionar" => $estadoRedireccionar);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();

							}else{
									$return_error       = $resultados_individuales1[1];

									if(empty($return_error))
									{
										$return_error 	= $lang_error["Error 1"]."(1)";
									}

									$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "true");
									return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
								 }//END if(!empty($imageUpload))
					 	}else{
								$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(2)";
								}

								$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//return_boolean
					 }//END if(self::$folder == FALSE && empty(self::$folder))
			}
		}

		/**
		 * [recoverPasswordByEmailUser description]
		 *
		 * @param  [type] $obj_user            [description]
		 * @param  string $pass_rand           [description]
		 * @param  string $random_salt         [description]
		 * @param  string $passBd              [description]
		 * @param  string $estado              [description]
		 * @param  string $tipo_msj            [description]
		 * @param  string $devuelve            [description]
		 * @param  string $estadoRedireccionar [description]
		 * @param  [type] $error_mail1         [description]
		 * @return [type]                      [description]
		 */

		public static function recoverPasswordByEmailUser($obj_user,$pass_rand = "",$random_salt = "",$passBd = "",$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$error_mail1 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_user->getEmail_user()))
			{
				self::$file_help 	= dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				$pass_rand = generar_contrasena(8);

				if(userDao::validatePasswordLenght((!empty($pass_rand) ? $pass_rand : '4E76G8G0')) == TRUE){
					$random_salt  = hash('sha512', $pass_rand);
					$passBd 	  = hash('sha512', $pass_rand . $random_salt);

					//CREAR OBJETO
					$ob_conectar 	= new conectorDB();

		            $consulta 		= "CALL recoverPasswordByEmailUser(:email_user,:password_user,:salt_user)";
					$valores		= array('email_user' 	=> $obj_user->getEmail_user(),
											'password_user' => $passBd,
											'salt_user' 	=> $random_salt);

		            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

		            foreach($resultado as &$atributo)
				 	{
				 		switch ($atributo['ERRNO'])
				 		{
				 			case 1://NO EXISTE EL CORREO
			 					$valor = array("estado" => $estado,
			 								   "error" 	=> replaceStringTwoParametersArray("/PARA1/","El correo","/PARA2/",$obj_user->getEmail_user(),$lang_error["Error 7"]));
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
				 			break;
				 			case 2://CORRECTO
				 				if(!empty($atributo['id_user'])){

									self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
									require_once(self::$file_record);

					 				$ob_conectar->registerRecordThreeParameters($atributo['id_user'],$lang_error["Actualizo"],$lang_error["la contraseña de"],$obj_user->getEmail_user(),$lang_record["Historial 2"]);
					 			}

					 			if(!empty($atributo['NOMBRE_COMPLETO'])){
					 				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
									require_once(self::$file_global);

									//ENVIAR AL USUARIO SUS DATOS ACTUALIZADOS
									try
									{
										ob_start();
										require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
										ob_clean();

										//DE:
										$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
										//AGREGAR RESPUESTA A:
										$mail->addReplyTo($obj_user->getEmail_user(),$atributo['NOMBRE_COMPLETO']);
										//PARA:
										$mail->addAddress($obj_user->getEmail_user(),$atributo['NOMBRE_COMPLETO']);
										//$mail->addCC('');
										//$mail->addBCC('');
										//ASUNTO
										$mail->Subject = $lang_record["Asunto actualización usuario"].' '.$obj_user->getEmail_user();

										$EMAIL 		= $obj_user->getEmail_user();
										$PASSWORD 	= $pass_rand;
										//INCRUSTAR HEADER
							           																//filename, cid, name
										$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
										//CUERPO DEL MENSAJE
										require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationUserPasswordUpdate.php');

										$mail->MsgHTML($bodyConfirmationUserPasswordUpdate);
										//ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail1 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
										//BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
										$mail->smtpClose();

									}catch(Exception $e){
										//Pretty error messages from PHPMailer
										$valor = array("estado" => $estado,
				 									   "error" 	=> $e->errorMessage());
									}catch(\Exception $e){
										//The leading slash means the Global PHP Exception class will be caught
									    $valor = array("estado" => $estado,
				 									   "error" 	=> $e->getMessage());
									}
				 				}

				 				$valor = array("estado" 		=> "true",
											   "resultado" 		=> $lang_error["Mensaje recuperar contraseña"],
											   "status_mailer1" => $error_mail1,
											   "redirect" 		=> "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
				 			break;
				 			default:
				 				$valor = array("estado" => $estado,
				 							   "error" 	=> $lang_error["Error 1"]."(2)");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
				 			break;
				 		}
				    }
				}else{
						$valor = array("estado" => $estado,
									   "error" 	=> $lang_error["Error 10"]);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => $estado,
								   "error" 	=> $lang_error["Variables de sesión vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
   		 * [showFormCreateAccount description]
   		 *
   		 * @return [type] [description]
   		 */

   		public static function showFormCreateAccount()
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<form id="registerUser" class="form-horizontal" autocomplete="off" novalidate="novalidate">
				<h3><span class="badge bg-dark">Datos de sesión</span></h3>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="id_role"><span class="required">*</span> '.$lang_global["Rol"].'</label>
					<div class="col-lg col-xl-7 col-xxl-3">
						<select id="id_role" class="form-control populate" name="id_role" data-plugin-selectTwo required>
							<option value="">'.$lang_global["Selecciona una opción"].'</option>');
  							userDao::showRoleList(0);
				  echo('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="email_user"><span class="required">*</span> '.$lang_global["E-mail"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input type="email" id="email_user" class="form-control" data-plugin-maxlength maxlength="50" name="email_user" value="" required>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="emailConfirmation"><span class="required">*</span> '.$lang_global["E-mail de confirmación"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input type="email" id="emailConfirmation" class="form-control" data-plugin-maxlength maxlength="50" name="emailConfirmation" value="" required>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="username_website">'.$lang_global["Username"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<div class="alert alert-info mb-1 py-2" role="alert">'.$lang_global["Nota: no se aceptan acentos, comas, espacios y caracteres especiales, solo letras y números"].'</div>
						<input type="text" id="username_website" class="form-control" data-plugin-maxlength maxlength="20" name="username_website" placeholder="'.$lang_global["Ejemplo"].': Joanna, kellyClarkson, john123" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="password1"><span class="required">*</span> '.$lang_global["Contraseña"].'</label>
					<div class="col-lg col-xl-6 col-xxl-5">
						<div class="input-group">
							<input type="text" id="password1" class="form-control" name="password1" rel="gp" data-size="14" data-character-set="a-z,A-Z,0-9,#" data-plugin-maxlength minlength="8" maxlength="16" value="" required>
							<span class="input-group-append">
								<button class="btn btn-primary getNewPass" type="button"><i class="fas fa-random fa-fw"></i> Generar</button>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="password2"><span class="required">*</span> '.$lang_global["Repetir contraseña"].'</label>
					<div class="col-lg col-xl-6 col-xxl-5">
						<div class="input-group js-show">
							<input type="password" id="password2" class="form-control js-pass" name="password2" minlength="8" data-plugin-maxlength maxlength="16" value="" required>
							<button class="btn btn-dark js-check" type="button"><i class="fas fa-eye fa-fade"></i></button>
						</div>
					</div>
				</div>
				<hr style="border-style: dashed;"/>
				<h3><span class="badge bg-dark">Información básica</span></h3>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="membership_number_user">'.$lang_global["Número de miembro"].'</label>
					<div class="col-lg col-xl-7 col-xxl-3">
						<input type="text" id="membership_number_user" class="form-control numeros-sin-punto" name="membership_number_user" data-plugin-maxlength maxlength="25" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="name_user"><span class="required">*</span> '.$lang_global["Nombre"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input type="text" id="name_user" class="form-control" name="name_user" data-plugin-maxlength maxlength="50" value="" required>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="last_name_user"><span class="required">*</span> '.$lang_global["Apellidos"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input type="text" id="last_name_user" class="form-control" name="last_name_user" data-plugin-maxlength maxlength="50" value="" required>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="filters_user">'.$lang_global["Categorías que describen mis artículos"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<select id="filters_user" class="form-control" name="filters_user[]" multiple="multiple" data-plugin-multiselect data-plugin-options=\'{ "maxHeight": 200, "enableCaseInsensitiveFiltering": false }\'>
							<option value="Arte y entretenimiento">Arte y entretenimiento</option>
							<option value="Artesanías">Artesanías</option>
							<option value="Automoción">Automoción</option>
							<option value="Belleza y fitness">Belleza y fitness</option>
							<option value="Libros y literatura">Libros y literatura</option>
							<option value="Economía e industria">Economía e industria</option>
							<option value="Informática y electrónica">Informática y electrónica</option>
							<option value="Finanzas">Finanzas</option>
							<option value="Comida y bebida">Comida y bebida</option>
							<option value="Juegos">Juegos</option>
							<option value="Salud">Salud</option>
							<option value="Aficiones y tiempo libre">Aficiones y tiempo libre</option>
							<option value="Casa y jardín">Casa y jardín</option>
							<option value="Manualidades">Manualidades</option>
							<option value="Internet y telecomunicaciones">Internet y telecomunicaciones</option>
							<option value="Empleo y educación">Empleo y educación</option>
							<option value="Derecho y administración pública">Derecho y administración pública</option>
							<option value="Noticias">Noticias</option>
							<option value="Comunidades online">Comunidades online</option>
							<option value="Gente y sociedad">Gente y sociedad</option>
							<option value="Animales y mascotas">Animales y mascotas</option>
							<option value="Mercado inmobiliario">Mercado inmobiliario</option>
							<option value="Referencia">Referencia</option>
							<option value="Ciencia">Ciencia</option>
							<option value="Compras">Compras</option>
							<option value="Deportes">Deportes</option>
							<option value="Viaje">Viaje</option>
							<option value="Otros">Otros</option>
						</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="birthdate_user">'.$lang_global["Fecha de nacimiento"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<div class="input-group">
							<span class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-calendar-alt"></i>
								</span>
							</span>
							<input type="text" id="birthdate_user" class="form-control" name="birthdate_user" data-plugin-datepicker placeholder="aaaa/mm/dd" value="">
						</div>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="age_user">'.$lang_global["Edad"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<div data-plugin-spinner data-plugin-options=\'{ "value":18, "step": 1, "min": 18, "max": 100 }\'>
							<div class="input-group" style="width:150px;">
								<button type="button" class="btn btn-default spinner-down">
									<i class="fas fa-minus"></i>
								</button>
								<input type="text" id="age_user" class="spinner-input form-control" name="age_user" maxlength="2" value="" readonly>
								<button type="button" class="btn btn-default spinner-up">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="gender_user"><span class="required">*</span> '.$lang_global["Género"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<select id="gender_user" class="form-control populate" name="gender_user" data-plugin-selectTwo required>
							<optgroup>
								<option value="">'.$lang_global["Selecciona una opción"].'</option>
								<option value="U">'.$lang_global["Prefiero no decirlo"].'</option>
								<option value="F">'.$lang_global["Femenino"].'</option>
								<option value="M">'.$lang_global["Masculino"].'</option>
							</optgroup>
						</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="telephone_user">'.$lang_global["Teléfono"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4 telephone_user">
						<input type="tel" id="telephone_user" class="form-control lada" name="telephone_user" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0 f-medium" for="cell_phone_user">'.$lang_global["Celular"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4 cell_phone_user">
						<input type="tel" id="cell_phone_user" class="form-control lada" name="cell_phone_user" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="nationality_user">'.$lang_global["Nacionalidad"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<input type="text" id="nationality_user" class="form-control" data-plugin-maxlength maxlength="20" name="nationality_user" value="">
					</div>
				</div>
				<hr style="border-style: dashed;"/>
                <h3><span class="badge bg-dark">'.$lang_global["Información completa"].'</span></h3>
                <div class="form-group row">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="rfc_user">RFC</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<input type="text" id="rfc_user" class="form-control rfc-sat" name="rfc_user" oninput="validarInputRFC(this)" data-plugin-maxlength maxlength="13" value="">
						<label id="resultadoRFC" class="d-none"></label>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="curp_user">CURP</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<input type="text" id="curp_user" class="form-control" name="curp_user" data-plugin-maxlength maxlength="18" value="">
					</div>
				</div>
                <div class="form-group row">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="about_me_user">'.$lang_global["Acerca de mí"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<textarea id="about_me_user" class="form-control" name="about_me_user" data-plugin-maxlength maxlength="1000" rows="5"></textarea>
					</div>
				</div>
                <div class="form-group row">
                    <label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="biography_user">'.$lang_global["Biografía"].'</label>
                    <div class="col-lg col-xl-7 col-xxl-6">
                        <textarea
                            name="biography_user"
                            id="biography_user"
                            class="summernote"
                            data-plugin-summernote></textarea>
                    </div>
                </div>
				<hr style="border-style: dashed;"/>
				<h3><span class="badge bg-dark">'.$lang_global["Dirección"].'</span></h3>
				<div class="form-group row">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="ship-address">'.$lang_global["Dirección con api google"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input id="ship-address" class="form-control" name="ship-address" value=""/>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="country_user">'.$lang_global["País"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<select id="country_user" class="form-control populate" name="country_user" data-plugin-selectTwo>');
							userDao::selectContry(self::$file_global,"México");
				  echo('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="state_user">'.$lang_global["Estado"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<select id="state_user" class="form-control populate" name="state_user" data-plugin-selectTwo>');
  							userDao::selectState(self::$file_global,'Jalisco');
				  echo('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="city_user">'.$lang_global["Ciudad"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<input type="text" id="city_user" class="form-control" data-plugin-maxlength maxlength="30" name="city_user" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="municipality_user">'.$lang_global["Municipio"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<input type="text" id="municipality_user" class="form-control" data-plugin-maxlength maxlength="30" name="municipality_user" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="colony_user">'.$lang_global["Colonia"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<input type="text" id="colony_user" class="form-control" data-plugin-maxlength maxlength="30" name="colony_user" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="street_user">'.$lang_global["Calle"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input id="street_user" class="form-control" name="street_user" data-plugin-maxlength maxlength="30" value=""/>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="outdoor_number_user">'.$lang_global["Número Exterior"].'</label>
					<div class="col-lg col-xl-3 col-xxl-2">
						<input id="outdoor_number_user" class="form-control" name="outdoor_number_user" data-plugin-maxlength maxlength="10" value=""/>
					</div>
					<label class="col-lg-auto control-label text-lg-end pt-2 mt-1 mb-0" for="interior_number_user">'.$lang_global["Número interior"].'</label>
					<div class="col-lg col-xl-3 col-xxl-2">
						<input id="interior_number_user" class="form-control" name="interior_number_user" data-plugin-maxlength maxlength="10" value=""/>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="cp_user">'.$lang_global["Código postal"].'</label>
					<div class="col-lg col-xl-3 col-xxl-2">
						<input type="text" id="cp_user" class="form-control numeros-sin-punto" data-plugin-maxlength maxlength="7" name="cp_user" value="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="address_user">Apartamento, unidad, suite o piso #</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input id="address_user" class="form-control" name="address_user" data-plugin-maxlength maxlength="70" value=""/>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="between_street1_user">'.$lang_global["Entre la calle"].'</label>
					<div class="col-lg col-xl-3 col-xxl-2">
						<input id="between_street1_user" class="form-control" name="between_street1_user" data-plugin-maxlength maxlength="30" value=""/>
					</div>
					<label class="col-lg-auto control-label text-lg-end pt-2 mt-1 mb-0" for="between_street2_user">'.$lang_global["Y la calle"].'</label>
					<div class="col-lg-4 col-xl-3 col-xxl-2">
						<input id="between_street2_user" class="form-control" name="between_street2_user" data-plugin-maxlength maxlength="30" value=""/>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="other_references_user">'.$lang_global["Otras referencias"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<textarea id="other_references_user" class="form-control" name="other_references_user" data-plugin-maxlength maxlength="50" rows="3"></textarea>
					</div>
				</div>
				<hr style="border-style: dashed;"/>
				<h3><span class="badge bg-dark">Redes sociales</span></h3>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="id_social_media">'.$lang_global["Red Social"].'</label>
					<div class="col-lg col-xl-7 col-xxl-4">
						<select id="id_social_media" class="form-control populate" name="id_social_media" data-plugin-selectTwo>
							<option value="">'.$lang_global["Selecciona una opción"].'</option>');
  							socialMediaDao::showSocialNetworkList(0);
				  echo('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-4 col-xl-3 control-label text-lg-end mb-0" for="url_user_social_media">'.$lang_global["URL"].'</label>
					<div class="col-lg col-xl-7 col-xxl-6">
						<input type="text" id="url_user_social_media" class="form-control" data-plugin-maxlength maxlength="600" name="url_user_social_media" placeholder="ej: http://www.dominio.com" value="">
					</div>
				</div>
				<div class="text-center mt-4">
					<button type="submit" class="btn btn-primary">'.$lang_global["Registrar"].'</button>
				</div>
			</form>');
		}

		/**
		 * [registerUser description]
		 *
		 * @param  [type] $obj_user    [description]
		 * @param  string $random_salt [description]
		 * @param  string $passBd      [description]
		 * @param  [type] $error_mail1 [description]
		 * @return [type]              [description]
		 */

		public static function registerUser($obj_user,$random_salt = "",$passBd = "",$error_mail1 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_user->getId_role()))) && !empty($obj_user->getName_user()) && !empty($obj_user->getLast_name_user()) && !empty($obj_user->getGender_user()) && !empty($obj_user->getEmail_user()) && !empty($obj_user->getEmail_confirmation_user()) && !empty($obj_user->getPassword_user()) && !empty($obj_user->getPassword_confirmation_user()))
			{
				if(userDao::validateEmalConfirmation($obj_user->getEmail_user(),$obj_user->getEmail_confirmation_user()) == TRUE)
				{
					if(userDao::validatePasswordConfirmation($obj_user->getPassword_user(),$obj_user->getPassword_confirmation_user()) == TRUE)
					{
						if(userDao::validatePasswordLenght($obj_user->getPassword_user()) == TRUE)
						{
							$password_mail 	= $obj_user->getPassword_user();
							$random_salt  	= hash('sha512', $password_mail);
							$passBd 	  	= hash('sha512', $password_mail . $random_salt);

							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
							require_once(self::$file_global);

							//CREAR OBJETO
							$ob_conectar 	= new conectorDB();

				            $consulta 		= "CALL registerUser(:id_role,:name_user,:last_name_user,:rfc_user,:curp_user,:membership_number_user,:about_me_user,:biography_user,:birthdate_user,:age_user,:gender_user,:lada_telephone_user,:telephone_user,:lada_cell_phone_user,:cell_phone_user,:email_user,:ship_address_user,:address_user,:country_user,:state_user,:city_user,:municipality_user,:colony_user,:cp_user,:street_user,:outdoor_number_user,:interior_number_user,:between_street1_user,:between_street2_user,:other_references_user,:nationality_user,:filters_user,:username_website,:password_user,:salt_user)";
				            $valores 		= array('id_role' 					=> $obj_user->getId_role(),
				        							'name_user' 				=> $obj_user->getName_user(),
				        							'last_name_user' 			=> $obj_user->getLast_name_user(),
				        							'rfc_user' 					=> $obj_user->getRfc_user(),
				        							'curp_user' 				=> $obj_user->getCurp_user(),
				        							'membership_number_user' 	=> $obj_user->getMembership_number_user(),
				        							'about_me_user' 			=> $obj_user->getAbout_me_user(),
				        							'biography_user' 			=> $obj_user->getBiography_user(),
				        							'birthdate_user' 			=> $obj_user->getBirthdate_user(),
				        							'age_user' 					=> $obj_user->getAge_user(),
				        							'gender_user' 				=> $obj_user->getGender_user(),
				        							'lada_telephone_user' 		=> $obj_user->getLada_telephone_user(),
				        							'telephone_user' 			=> $obj_user->getTelephone_user(),
				        							'lada_cell_phone_user' 		=> $obj_user->getLada_cell_phone_user(),
				        							'cell_phone_user' 			=> $obj_user->getCell_phone_user(),
				        							'email_user' 				=> $obj_user->getEmail_user(),
				        							'ship_address_user' 		=> $obj_user->getShip_address_user(),
				        							'address_user' 				=> $obj_user->getAddress_user(),
				        							'country_user' 				=> $obj_user->getCountry_user(),
				        							'state_user' 				=> $obj_user->getState_user(),
				        							'city_user' 				=> $obj_user->getCity_user(),
				        							'municipality_user' 		=> $obj_user->getMunicipality_user(),
				        							'colony_user' 				=> $obj_user->getColony_user(),
				        							'cp_user' 					=> $obj_user->getCp_user(),
				        							'street_user' 				=> $obj_user->getStreet_user(),
				        							'outdoor_number_user' 		=> $obj_user->getOutdoor_number_user(),
				        							'interior_number_user' 		=> $obj_user->getInterior_number_user(),
				        							'between_street1_user' 		=> $obj_user->getBetween_street1_user(),
				        							'between_street2_user' 		=> $obj_user->getBetween_street2_user(),
				        							'other_references_user' 	=> $obj_user->getOther_references_user(),
				        							'nationality_user' 			=> $obj_user->getNationality_user(),
				        							'filters_user' 				=> $obj_user->getFilters_user(),
				        							'username_website' 			=> $obj_user->getUsername_website(),
				        							'password_user' 			=> $passBd,
				        							'salt_user' 				=> $random_salt);

				            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

				            //focus
		                    	//0 = Sin efecto
                                //1 = Focus en input de email
                                //2 = Focus en input de contraseña
                                //3 = Focus en input de RFC
                                //4 = Focus en input de CURP

				            foreach($resultado as &$atributo)
						 	{
						 		switch ($atributo['ERRNO']) {
						 			case 1://EL ID ROLE NO EXISTE
						 				$valor = array("estado" => "false","error" => $lang_error["Error 11"]);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 2://YA EXISTE REGISTRADO EL CORREO
						 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["El correo"],"/PARA2/",$obj_user->getEmail_user(),$lang_error["Error 7"]),"focus" => 1);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 3://YA EXISTE REGISTRADO EL RFC
						 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["El RFC"],"/PARA2/",$obj_user->getRfc_user(),$lang_error["Error 7"]),"focus" => 3);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 4://YA EXISTE REGISTRADO EL CURP
						 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["La CURP"],"/PARA2/",$obj_user->getCurp_user(),$lang_error["Error 7"]),"focus" => 4);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 5://YA EXISTE REGISTRADO EL ID MIEMBRO
						 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["ID miembro"],"/PARA2/",$obj_user->getMembership_number_user(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 6://YA EXISTE REGISTRADO EL USERNAME
						 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Username"],"/PARA2/",$obj_user->getUsername_website(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 7://CORRECTO
						 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
										require_once(self::$file_record);

						 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["al usuario"],$obj_user->getEmail_user(),$lang_record["Historial 2"]);

						 				//ENVIAR CORREO ELECTRONICO AL USUARIO CON SUS DATOS DE REGISTRO
										try {
											ob_start();
											require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
											ob_clean();

											//DE:
											$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
											//AGREGAR RESPUESTA A:
											$mail->addReplyTo($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
											//PARA:
											$mail->addAddress($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
											//$mail->addCC('');
											//$mail->addBCC('');
											//ASUNTO
											$mail->Subject = $obj_user->getName_user().' '.$lang_record["Asunto confirmacion registro usuario"].' '.(defined('WEBSITE') ? WEBSITE : WEBSITE_CMS);
											//INCRUSTAR HEADER
								           																//filename, cid, name
											$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
											//CUERPO DEL MENSAJE
											require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationLogIn.php');

											$mail->MsgHTML($bodyConfirmationLogIn);
											//ENVIAR MAIL
											if(!$mail->send()) {
												$error_mail1 = $mail->ErrorInfo;
												$mail->getSMTPInstance()->reset();
											}
											//BORRAR CONTENEDORES
											$mail->clearCustomHeaders();
										    $mail->clearAllRecipients();
										    $mail->clearAddresses();
											$mail->smtpClose();

										}catch(Exception $e){
											//Pretty error messages from PHPMailer
											$valor = array("estado" => "false",
					 									   "error" 	=> $e->errorMessage());
											return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
										}catch(\Exception $e){
											//The leading slash means the Global PHP Exception class will be caught
										    $valor = array("estado" => "false",
					 									   "error" 	=> $e->getMessage());
										    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
										}

                                    	$valor = array("estado" 		=> "true",
                                    				   "resultado" 		=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["al usuario"],"/PARA3/",$obj_user->getEmail_user(),$lang_error["Error 6"]),
                                    				   "status_mailer1" => $error_mail1,
                                    				   "redireccionar" 	=> "true");
						                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						                exit();
						 			break;
						 			default:
						 				$valor = array("estado" => "false",
						 							   "error" 	=> $lang_error["Error 1"]);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 		}
						    }
						}else{
								$valor = array("estado" => "false",
											   "error" 	=> $lang_error["Error 10"]);
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }
					}else{
							$valor = array("estado" => "false",
										   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["La contraseña de confirmación es"],$lang_error["Error 2"]),"focus" => 2);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						 }
				}else{
						$valor = array("estado" => "false",
									   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["El correo de confirmación es"],$lang_error["Error 2"]),"focus" => 1);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [registerUserWithSocialNetwork description]
		 *
		 * @param  [type] $obj_user         [description]
		 * @param  [type] $obj_social_media [description]
		 * @param  [type] $error_mail1      [description]
		 * @return [type]                   [description]
		 */

		public static function registerUserWithSocialNetwork($obj_user,$obj_social_media,$error_mail1 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_user->getId_role()))) && !empty($obj_user->getName_user()) && !empty($obj_user->getLast_name_user()) && !empty($obj_user->getGender_user()) && !empty($obj_user->getEmail_user()) && !empty($obj_user->getEmail_confirmation_user()) && !empty($obj_user->getPassword_user()) && !empty($obj_user->getPassword_confirmation_user()))
			{
				if(userDao::validateEmalConfirmation($obj_user->getEmail_user(),$obj_user->getEmail_confirmation_user()) == TRUE)
				{
					if(userDao::validatePasswordConfirmation($obj_user->getPassword_user(),$obj_user->getPassword_confirmation_user()) == TRUE)
					{
						if(userDao::validatePasswordLenght($obj_user->getPassword_user()) == TRUE)
						{
							$password_mail 	= $obj_user->getPassword_user();
							$random_salt  	= hash('sha512', $password_mail);
							$passBd 	  	= hash('sha512', $password_mail . $random_salt);

							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
							require_once(self::$file_global);

							//CREAR OBJETO
							$ob_conectar 	= new conectorDB();

				            $consulta 		= "CALL registerUserWithSocialNetwork(:id_role,:name_user,:last_name_user,:rfc_user,:curp_user,:membership_number_user,:about_me_user,:biography_user,:birthdate_user,:age_user,:gender_user,:lada_telephone_user,:telephone_user,:lada_cell_phone_user,:cell_phone_user,:email_user,:ship_address_user,:address_user,:country_user,:state_user,:city_user,:municipality_user,:colony_user,:cp_user,:street_user,:outdoor_number_user,:interior_number_user,:between_street1_user,:between_street2_user,:other_references_user,:nationality_user,:filters_user,:username_website,:password_user,:salt_user,:id_social_media,:url_user_social_media)";
				            $valores 		= array('id_role' 					=> $obj_user->getId_role(),
				        							'name_user' 				=> $obj_user->getName_user(),
				        							'last_name_user' 			=> $obj_user->getLast_name_user(),
				        							'rfc_user' 					=> $obj_user->getRfc_user(),
				        							'curp_user' 				=> $obj_user->getCurp_user(),
				        							'membership_number_user' 	=> $obj_user->getMembership_number_user(),
				        							'about_me_user' 			=> $obj_user->getAbout_me_user(),
				        							'biography_user' 			=> $obj_user->getBiography_user(),
				        							'birthdate_user' 			=> $obj_user->getBirthdate_user(),
				        							'age_user' 					=> $obj_user->getAge_user(),
				        							'gender_user' 				=> $obj_user->getGender_user(),
				        							'lada_telephone_user' 		=> $obj_user->getLada_telephone_user(),
				        							'telephone_user' 			=> $obj_user->getTelephone_user(),
				        							'lada_cell_phone_user' 		=> $obj_user->getLada_cell_phone_user(),
				        							'cell_phone_user' 			=> $obj_user->getCell_phone_user(),
				        							'email_user' 				=> $obj_user->getEmail_user(),
				        							'ship_address_user' 		=> $obj_user->getShip_address_user(),
				        							'address_user' 				=> $obj_user->getAddress_user(),
				        							'country_user' 				=> $obj_user->getCountry_user(),
				        							'state_user' 				=> $obj_user->getState_user(),
				        							'city_user' 				=> $obj_user->getCity_user(),
				        							'municipality_user' 		=> $obj_user->getMunicipality_user(),
				        							'colony_user' 				=> $obj_user->getColony_user(),
				        							'cp_user' 					=> $obj_user->getCp_user(),
				        							'street_user' 				=> $obj_user->getStreet_user(),
				        							'outdoor_number_user' 		=> $obj_user->getOutdoor_number_user(),
				        							'interior_number_user' 		=> $obj_user->getInterior_number_user(),
				        							'between_street1_user' 		=> $obj_user->getBetween_street1_user(),
				        							'between_street2_user' 		=> $obj_user->getBetween_street2_user(),
				        							'other_references_user' 	=> $obj_user->getOther_references_user(),
				        							'nationality_user' 			=> $obj_user->getNationality_user(),
				        							'filters_user' 				=> $obj_user->getFilters_user(),
				        							'username_website' 			=> $obj_user->getUsername_website(),
				        							'password_user' 			=> $passBd,
				        							'salt_user' 				=> $random_salt,
				        							'id_social_media' 			=> $obj_social_media->getId_social_media(),
				        							'url_user_social_media' 	=> $obj_user->getUrl_user_social_media());

				            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

				            //focus
		                    	//0 = Sin efecto
                                //1 = Focus en input de email
                                //2 = Focus en input de contraseña
                                //3 = Focus en input de RFC
                                //4 = Focus en input de CURP

				            foreach($resultado as &$atributo)
						 	{
						 		switch ($atributo['ERRNO']) {
						 			case 1://EL ID ROLE NO EXISTE
						 				$valor = array("estado" => "false","error" => $lang_error["Error 11"]);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 2://YA EXISTE REGISTRADO EL CORREO
						 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["El correo"],"/PARA2/",$obj_user->getEmail_user(),$lang_error["Error 7"]),"focus" => 1);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 3://YA EXISTE REGISTRADO EL RFC
						 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["El RFC"],"/PARA2/",$obj_user->getRfc_user(),$lang_error["Error 7"]),"focus" => 3);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 4://YA EXISTE REGISTRADO EL CURP
						 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["La CURP"],"/PARA2/",$obj_user->getCurp_user(),$lang_error["Error 7"]),"focus" => 4);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 5://YA EXISTE REGISTRADO EL ID MIEMBRO
						 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["ID miembro"],"/PARA2/",$obj_user->getMembership_number_user(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 6://YA EXISTE REGISTRADO EL USERNAME
						 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Username"],"/PARA2/",$obj_user->getUsername_website(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 7://CORRECTO
						 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
										require_once(self::$file_record);

						 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["al usuario"],$obj_user->getEmail_user(),$lang_record["Historial 2"]);

						 				//ENVIAR CORREO ELECTRONICO AL USUARIO CON SUS DATOS DE REGISTRO
										ob_start();
										require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
										ob_clean();
										//DE:
										$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
										//AGREGAR RESPUESTA A:
										$mail->addReplyTo($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
										//PARA:
										$mail->addAddress($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
										//$mail->addCC('');
										//$mail->addBCC('');
										//ASUNTO
										$mail->Subject = $obj_user->getName_user().' '.$lang_record["Asunto confirmacion registro usuario"].' '.(defined('WEBSITE') ? WEBSITE : WEBSITE_CMS);
										//INCRUSTAR HEADER
							           																//filename, cid, name
										$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
										//CUERPO DEL MENSAJE
										require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationLogIn.php');

										$mail->MsgHTML($bodyConfirmationLogIn);
										//ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail1 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
										//BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
										$mail->smtpClose();

                                    	$valor = array("estado" => "true","resultado" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["al usuario"],"/PARA3/",$obj_user->getEmail_user(),$lang_error["Error 6"]),"status_mailer1" => $error_mail1,"redireccionar" => "true");
						                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						                exit();
						 			break;
						 			default:
						 				$valor = array("estado" => "false","error" => $lang_error["Error 1"]);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 		}
						    }
						}else{
								$valor = array("estado" => "false","error" => $lang_error["Error 10"]);
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }
					}else{
							$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["La contraseña de confirmación es"],$lang_error["Error 2"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						 }
				}else{
						$valor = array("estado" => "false","error" => replaceStringOneParameterArray("/PARA1/",$lang_error["El correo de confirmación es"],$lang_error["Error 2"]));
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [showRegisteredAccounts description]
		 *
		 * @param  integer $x             [description]
		 * @param  string  $route_default [description]
		 * @return [type]                 [description]
		 */

		public static function showRegisteredAccounts($x = 1,$route_default	= "img/image_not_found_100.jpg")
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))))
			{
	        	self::$folder 		= imageDao::showFolderByIdTypeImage(1);

	        	if(self::$folder != FALSE && !empty(self::$folder))
	        	{
	        		self::$file_help = dirname(__DIR__).'/helps/help.php';
	        		require_once(self::$file_help);

	        		//CREAR OBJETO
	        		$ob_conectar 	= new conectorDB();

	        		$consulta 		= "CALL showDatatableUserDiscardingIdUserAdmin(:id_user)";
	        		$valores 		= array('id_user' => intval(trim($_SESSION['id_user_dao'])));

				    $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

				    foreach($resultado as &$datos)
	            	{
	            		if($datos['ERRNO'] == 2 && $datos['TOTAL_USER'] > 0 && !empty($datos['id_user']) && !empty($datos['full_name']) && !empty($datos['name_role']) && !empty($datos['email_user']) && !empty($datos['last_session_user']) && !empty($datos['profile_photo_user']))
	            		{
	            			if($x == 1){
        		  echo('<table class="table table-responsive-lg table-bordered table-striped mb-0" id="datatable-user" data-order="[]" data-page-length="25">
							<thead>
								<tr>
									<th>ID</th>
									<th>'.$lang_global['Foto de perfil'].'</th>
									<th>'.$lang_global['Nombre'].'</th>
									<th>'.$lang_global['Usuario'].'</th>
									<th>'.$lang_global['Rol'].'</th>
									<th>'.$lang_global['E-mail'].'</th>
									<th>'.$lang_global['Última actualización'].'</th>
									<th>'.$lang_global['Estatus'].'</th>
									<th>'.$lang_global['Acciones'].'</th>
								</tr>
							</thead>
							<tbody>');
	            			}

	            		  echo('<tr id="item-user-'.$datos['id_user'].'" data-id="'.$datos['id_user'].'">
									<td>'.$datos['id_user'].'</td>
									<td>
										<a class="image-popup-no-margins" href="');
            		  						//$measure
					  							//0 = Sin medida
					  						//$type_return
												//1 = echo
												//2 = return
											//$type_iso
												//'' = Sin prefijo idioma
												//iso_code (ESP, ENG)
					  						//$view
												//1 = URL_CARPETA_FRONT
												//2 = URL_CARPETA_ADMIN

					  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
					              			imageDao::returnImage($datos['profile_photo_user'],'../',self::$folder,400,$route_default,1,'',1);
            		  		       echo('">
											<img class="img-fluid" src="');
	            		  		   				//$measure
						  							//0 = Sin medida
						  						//$type_return
													//1 = echo
													//2 = return
												//$type_iso
													//'' = Sin prefijo idioma
													//iso_code (ESP, ENG)
						  						//$view
													//1 = URL_CARPETA_FRONT
													//2 = URL_CARPETA_ADMIN

						  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
						              			imageDao::returnImage($datos['profile_photo_user'],'../',self::$folder,35,$route_default,1,'',1);
	            		  			   echo('"/>
										</a>
									</td>
									<td>'.(!empty($datos['full_name']) ? stripslashes($datos['full_name']) : '').'</td>
									<td>'.$datos['username_website'].'</td>
									<td>'.$datos['name_role'].'</td>
									<td>'.$datos['email_user'].'</td>
									<td>'.$datos['last_session_user'].'</td>
									<td class="text-center">');

							  							//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  			pluginIosSwitch('user',$datos['id_user'],(!empty($datos['full_name']) ? stripslashes(str_replace("/", " ", $datos['full_name'])) : ''),$datos['s_user'],1,$lang_global['Activar o desactivar']);

							  echo('</td>
									<td class="text-center">
										<a class="d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].' '.(!empty($datos['full_name']) ? stripslashes(str_replace("/", " ", $datos['full_name'])) : '').'" href="'.URL_CARPETA_ADMIN.'/my-profile/'.$datos['id_user'].'"><i class="fas fa-pencil-alt c-gris-oscuro" style="font-size:18px;"></i></a>
										<a class="d-inline modal-with-zoom-anim modal-remove-general c-negro f-medium ms-3" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.(!empty($datos['full_name']) ? stripslashes(str_replace("/", " ", $datos['full_name'])) : '').'" href="#modal-remove-general" data-remove="'.$datos['id_user'].'/'.(!empty($datos['full_name']) ? stripslashes(str_replace("/", " ", $datos['full_name'])) : '').'/1"><i class="fas fa-trash c-gris-oscuro me-2" style="font-size:20px;"></i></a>
									</td>
								</tr>');

									  if(count($resultado) == $x){
									  	$x = 0;
					  echo('</tbody>
						</table>');
									  }

									  $x++;
			            }else{
			            		echo('<h3><span class="badge bg-dark">'.$lang_global['Sin cuentas registradas'].'</span></h3>');
			            	 }
			        }
				}
			}else{
				echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [showFormUploadGallery description]
		 *
		 * @param  [type]  $obj_user             [description]
		 * @param  integer $x                    [description]
		 * @param  string  $route_default        [description]
		 * @param  integer $id_type_image        [description]
		 * @param  integer $id_internal_sections [description]
		 * @param  integer $measure              [description]
		 * @return [type]                        [description]
		 */

		public static function showFormUploadGallery($obj_user,$x = 1,$route_default = "img/image_not_found_580.jpg",$id_type_image = 4,$id_internal_sections = 14,$measure = 35)
    	{
		  echo('<div class="row">
		  			<div class="col-12 offset-lg-1 col-lg-10">
		  				<div id="form-gallery-user">
		  					<form action="'.URL_CARPETA_ADMIN.'/upl-drpzne-gallery-u" class="dropzone dz-square" id="dropzone-gallery-user"></form>
		  				</div>
		  			</div>
		  	   </div>');

		  		if(!empty(intval(trim($obj_user->getId_user()))))
		  		{
					self::$folder 			= imageDao::showFolderByIdTypeImage($id_internal_sections);

					if(self::$folder == FALSE || empty(self::$folder))
					{
						self::$full_path	= "";
					}else{
						self::$full_path  	= "../".self::$folder;
						 }

					//CREAR OBJETO
					$ob_conectar 			= new conectorDB();

					$consulta 				= "CALL showDatatableGalleryUser(:id_user,:id_type_image,:limit)";
					$valores 				= array('id_user' 		=> $obj_user->getId_user(),
													'id_type_image' => $id_internal_sections,
													'limit' 		=> 30);

					$resultado 	 			= $ob_conectar->consultarBD($consulta,$valores);

					foreach($resultado as &$datos)
	            	{
	            		if($datos['ERRNO'] == 2 && $datos['TOTAL_GALLERY_USER'] > 0 && !empty($datos['id_image']) && !empty($datos['id_image_lang']) && !empty($datos['title_image_lang']) && !empty($datos['image_lang']) && !empty($datos['format_image']) && !empty($datos['size_image']) && !empty($datos['iso_code']))
	            		{
	            			if($datos['format_image'] == 'image/svg+xml'){
		  						$measure 		= 0;
		  						$class_height 	= 'height="45"';
		  					}else{
	  							$class_height 	= 'class="img-fluid"';
		  						 }

	            			if($x == 1){
	            				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
								require(self::$file_global);

	            				self::$file_help = dirname(__DIR__).'/helps/help.php';
								require_once(self::$file_help);

	            	  echo('<hr style="border-style: dashed;">
				  			<div class="col-12">
					  			<h2 class="card-title mb-4">Resultados</h2>
				  				<div id="form-update-gallery-user">
			            	  		<table class="table table-bordered table-striped mb-0" id="datatable-gallery-user" data-order="[]" data-page-length="10">
										<thead>
											<tr>
												<th>ID</th>
												<th>'.$lang_global['Imagen'].'</th>
												<th>'.$lang_global['Formato'].'</th>
												<th>'.$lang_global['Tamaño'].'</th>
												<th>'.$lang_global['Estatus'].'</th>
												<th>'.$lang_global['Acciones'].'</th>
											</tr>
										</thead>
										<tbody id="sortable-gallery-user">');
			            	}

			            			  echo('<tr id="item-id_image-'.$datos['id_image'].'" data-id="'.$datos['id_image'].'">
												<td>'.$datos['id_image'].'</td>
												<td>
													<a class="image-popup-no-margins" href="');
			            		  			  			//$measure
															//0 = Sin medida
														//$type_return
															//1 = echo
															//2 = return
														//$type_iso
															//'' = Sin prefijo idioma
															//iso_code (ESP, ENG)
														//$view
															//1 = URL_CARPETA_FRONT
															//2 = URL_CARPETA_ADMIN

									  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
									              			imageDao::returnImage($datos['image_lang'],'',self::$full_path,0,$route_default,1,'',1);
							            			 	echo('">
														<img '.$class_height.' src="');

									  						//$measure
									  							//0 = Sin medida
									  						//$type_return
																//1 = echo
																//2 = return
															//$type_iso
																//'' = Sin prefijo idioma
																//iso_code (ESP, ENG)
									  						//$view
																//1 = URL_CARPETA_FRONT
																//2 = URL_CARPETA_ADMIN

									  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
									              			imageDao::returnImage($datos['image_lang'],'',self::$full_path,$measure,$route_default,1,'',1);
									            		echo('" alt="'.stripslashes($datos['title_image_lang']).'" />
													</a>
												</td>
												<td>'.$datos['format_image'].'</td>
												<td>'.$datos['size_image'].'</td>
												<td class="text-center">');
									            	//$id_internal_sections
									            		//4 = Perfil de usuario
							  								//14 = Galería
							  							//15 = Productos
							  								//1 = Stripe
							  								//2 = Informacion adicional
							  								//3 = Promocion s_product_lang_promotion
                            								//4 = Promocion s_visible_product_lang_promotion

									            					//$section,$id_table,$title_table,$s_table,$id_type_image,$id_internal_sections,$lang_titulo
						  							pluginIosSwitchInternalSections('gallery-user',$datos['id_image'],stripslashes($datos['title_image_lang']),$datos['s_image'],$id_type_image,$id_internal_sections,$lang_global['Activar o desactivar']);

										  echo('</td>
												<td class="text-center">
													<a class="d-inline modal-with-zoom-anim modal-delete-with-image-5-parameters" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.stripslashes(str_replace("/", " ", $datos['title_image_lang'])).'" href="#modal-delete-with-image-5-parameters" data-delete-with-image-5-parameters="'.$datos['id_image'].'/'.$datos['id_image_lang'].'/'.stripslashes($datos['title_image_lang']).'/'.$id_internal_sections.'/item-id_image-"><i class="fas fa-trash c-gris-oscuro" style="font-size:20px;"></i></a>
												</td>
											</tr>');

			            	if(count($resultado) == $x){
			            		  echo('</tbody>
									</table>
								</div>
		  					</div>');
			            	}

			            	$x++;
	            		}
	            	}
		  		}
		}

		/**
		 * [registerGalleryUser description]
		 *
		 * @param  [type]  $obj_user       [description]
		 * @param  [type]  $obj_image_lang [description]
		 * @param  string  $imageUpload    [description]
		 * @param  boolean $return_boolean [description]
		 * @param  integer $status         [description]
		 * @param  string  $msg            [description]
		 * @param  integer $x              [description]
		 * @return [type]                  [description]
		 */

		public static function registerGalleryUser($obj_user,$obj_image_lang,$imageUpload = "",$return_boolean = false,$status = 1,$msg = "",$x = 0)
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
				self::$folder = imageDao::showFolderByIdTypeImage(14);

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$response['status'] = $status;
                    $response['msg']    = $lang_error["Error 14"];
                    print(json_encode($response, JSON_UNESCAPED_UNICODE));
                    exit;
				}else{
						self::$full_path = "../../../../../".self::$folder;

						//$allowed_format
							//array()
								//EJEMPLOS:
								//image/jpeg
								//image/png
								//image/svg+xml
								//image/x-icon
								//application/pdf
						//$allowed_size
							//2000000 = 2MB
																						//$obj_image_lang,$folder,$allowed_format,$allowed_size
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
					            //CREAR OBJETO
								$ob_conectar 		= new conectorDB();

								$consulta1      	= "CALL registerGalleryUser(:id_type_image,:file_type,:file_size)";
								$valores1 			= array('id_type_image' => 14,
															'file_type' 	=> $obj_image_lang->getFile_type(),
															'file_size' 	=> $obj_image_lang->getFile_size());

					            $resultado1     	= $ob_conectar->consultarBD($consulta1,$valores1);

					            foreach($resultado1 as &$atributo1){
					            	switch ($atributo1['ERRNO']) {
					            		case 3://CORRECTO
					            			$id_image 	= $atributo1['ID_IMG'];

							            	if(empty($id_image)){
						                		$msg 	= $lang_error["Error 11"]."(3)";
							            	}else{
							            			self::$final_full_path  = self::$full_path."/".$imageUpload;

			                                        if(!empty(self::$final_full_path))
			                                        {
			                                            if(file_exists(self::$final_full_path))
			                                            {
			                                                if($obj_image_lang->getFile_type() != "image/svg+xml")
			                                                {
			                                                    imageDao::parametersUploadFileWithoutLanguage(self::$full_path."/",14,self::$final_full_path);
			                                                }
			                                            }
			                                        }

							            			$consulta2      = "CALL showActiveLanguage()";
							            			$resultado2     = $ob_conectar->consultarBD($consulta2,null);

							            			foreach($resultado2 as &$atributo2){
							            				if($atributo2['ERRNO'] == 1)
										                {
						                					$msg 	= $lang_error["Error 11"]."(4)";
										                }else{
										                		$id_lang 	= $atributo2['id_lang'];

										                		if(empty($id_lang))
								 								{
						                							$msg 	= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(1)";
								 								}else{
								 										$consulta3 	= "CALL registerInformationGalleryUser(:id_user,:id_image,:id_lang,:image_lang)";
								 										$valores3 	= array('id_user' 		=> $obj_user->getId_user(),
								 															'id_image' 		=> $id_image,
								 															'id_lang' 		=> $id_lang,
								 															'image_lang' 	=> $imageUpload);

												            			$resultado3 = $ob_conectar->consultarBD($consulta3,$valores3);

												            			foreach($resultado3 as &$atributo3){
												            				switch ($atributo3['ERRNO']) {
												            					case 3://CORRECTO
												            						if($x == 0){
												            							self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
																				            require_once(self::$file_record);

																				            self::$file_help = dirname(__DIR__).'/helps/help.php';
																				            require_once(self::$file_help);
																						$ob_conectar->registerRecordTwoParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],strtolower($lang_error["Galería"]),$lang_record["Historial 3"]);

																						$status = 2;
																						$msg 	= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",strtolower($lang_error["Galería"]),$lang_error["Error 9"]);
																					}

																					$x++;
												            					break;
												            					default:
												            						//$atributo3['ERRNO']
															            				//1 = EL IMG NO EXISTE
															            				//2 = EL ID IMG LANG NO EXISTE
						                											$msg 	= $lang_error["Error 1"].'('.$atributo3['ERRNO'].')';
											                                    break;
												            				}//END switch ($atributo3['ERRNO'])
					            										}//END foreach CALL registerInformationGalleryUser()
								 									 }//END if(empty($id_lang)
										                	 }//END if($atributo2['ERRNO'] == 1)
							            			}//END foreach CALL showActiveLanguage()
							            		 }//END if(empty($id_image)){
					            		break;
					            		default:
					            			//$atributo1['ERRNO']
					            				//1 = EL ID TYPE IMAGEN NO EXISTE
					            				//2 = EL ID IMG NO EXISTE
	                                        $msg 	= $lang_error["Error 1"].'('.$atributo1['ERRNO'].')';
	                                    break;
					            	}//END switch ($atributo1['ERRNO'])
					            }//END foreach CALL registerGalleryUser()

					            $response['status'] = $status;
		                        $response['msg']    = $msg;
		                        print(json_encode($response, JSON_UNESCAPED_UNICODE));
		                        exit;
							}else{
									$return_error       = $resultados_individuales1[1];

									if(empty($return_error))
									{
										$return_error 	= $lang_error["Error 1"]."(1)";
									}

									$response['status'] = $status;
			                        $response['msg']    = $return_error;
			                        print(json_encode($response, JSON_UNESCAPED_UNICODE));
			                        exit;
								 }
					 	}else{
					 			$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(1)";
								}

								$response['status'] = $status;
		                        $response['msg']    = $return_error;
		                        print(json_encode($response, JSON_UNESCAPED_UNICODE));
		                        exit;
					 		 }
					 }
			}else{
					$response['status'] = $status;
                    $response['msg']    = $lang_error["Variables no creadas"];
                    print(json_encode($response, JSON_UNESCAPED_UNICODE));
                    exit;
				 }
        }

        /**
         * [showInformationSesionTopHeaderFront description]
         *
         * @param  [type] $view     [description]
         * @param  [type] $obj_user [description]
         * @return [type]           [description]
         */

        public static function showInformationSesionTopHeaderFront($view,$obj_user)
        {
        	self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($view))) && !empty(intval(trim($obj_user->getId_user()))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById($obj_user->getId_user());

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 2://CORRECTO
							//CREAR OBJETO
							$ob_conectar = new conectorDB();

							self::$folder = $ob_conectar->showFolderPreviousFile(1);

							if(self::$folder != FALSE){
								//NO ES NECESARIO VALIDAR $value['last_name_user'] YA QUE SU VALOR PUEDE ESTAR VACIO
								if(!empty($value['profile_photo_user']) && !empty($value['name_user']) && !empty($value['email_user']) && !empty($value['name_role'])){

									//$view
							          	//1 = Header general
							          	//2 = Header dashboard

							  echo('<div id="dropdown-sesion" class="dropdown d-flex align-items-center ps-md-3 pe-0">
							  			'.($view == 2 ? '<span class="fw-medium pe-2 text-truncate">'.$lang_global['Hola'].', '.stripslashes($value['name_user']).'</span>' : '') . '
								      	<a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								        	<img src="');

						  						//$measure
						  							//0 = Sin medida
						  						//$type_return
													//1 = echo
													//2 = return
												//$type_iso
													//'' = Sin prefijo idioma
													//iso_code (ESP, ENG)
						  						//$view
													//1 = URL_CARPETA_FRONT
													//2 = URL_CARPETA_ADMIN

						  											//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
						              			imageDao::returnImage($value['profile_photo_user'],'',self::$folder,35,"img/usuarios/profile_35.png",1,'',1);
						            		echo('" alt="'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'" width="35" height="35" class="rounded-circle">
								      	</a>
								      	<ul class="dropdown-menu dropdown-animation text-small py-0" style="right: 0;left: auto;">
								        	<li>
								        		<div class="dropdown-item py-2'.($view == 2 ? ' text-wrap' : '').'">
								        			<p class="m-0 f-medium">'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '').'<small class="f-regular d-block" style="font-size: 0.8rem;">'.$value['email_user'].'</small></p>
								        		</div>
								        	</li>
								        	<li><a class="dropdown-item py-2" href="'.(defined('URL') ? URL : URL_CARPETA_FRONT).'ajustes"><i class="fa-regular fa-circle-user fa-fw"></i> '.$lang_global['Mi cuenta'].'</a></li>
								        	<li><a class="dropdown-item py-2" href="'.(defined('URL') ? URL : URL_CARPETA_FRONT).'s-off-f"><i class="fa fa-sign-out" aria-hidden="true"></i> '.$lang_global['Cerrar sesión'].'</a></li>
								     	</ul>
								    </div>');
								}
							}else{
									echo('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logInModal" data-bs-whatever="@getbootstrap">'.$lang_global['Acceder'].'</button>');
								 }
							break;
						default://ERROR
							echo('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logInModal" data-bs-whatever="@getbootstrap">'.$lang_global['Acceder'].'</button>');
							break;
					}
				}
			}else{
					echo('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logInModal" data-bs-whatever="@getbootstrap">'.$lang_global['Acceder'].'</button>');
				 }
        }

        /**
         * [showProfilePictureByIdUserFront description]
         *
         * @param  [type] $obj_user      [description]
         * @param  string $route_default [description]
         * @return [type]                [description]
         */

        public static function showProfilePictureByIdUserFront($obj_user,$route_default	= "img/image_not_found_580.jpg")
    	{
    		self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById($obj_user->getId_user());

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 1://ERROR
							echo('<h4 class="h6 text-center mb-4">'.$lang_global['No se puede mostrar la información'].' ( Error X01</h4>');
							break;
						default:
							//CREAR OBJETO
							$ob_conectar = new conectorDB();

							self::$folder = $ob_conectar->showFolderPreviousFile(1);

							if(self::$folder != FALSE && !empty(self::$folder))
							{
								if(!empty($value['name_user']) && !empty($value['profile_photo_user']))
								{
							  echo('<form id="uploadUserProfilePictureFront" novalidate="novalidate">
							  			<div id="src-file1" class="file-select btn btn-sm btn-primary p-0">
					      					<i class="fa-solid fa-upload"></i>
										  	<input type="file" name="fileUserProfilePictureFront" id="fileUserProfilePictureFront" aria-label="Archivo" value="" required="">
										</div>
									</form>
							  		<div class="thumb-info">
										<img src="');

		            					if($value['profile_photo_user'] == 'profile.png'){
		            						//$measure
					  							//0 = Sin medida
					  						//$type_return
												//1 = echo
												//2 = return
											//$type_iso
												//'' = Sin prefijo idioma
												//iso_code (ESP, ENG)
					  						//$view
												//1 = URL_CARPETA_FRONT
												//2 = URL_CARPETA_ADMIN

						  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
					  						imageDao::returnImage($value['profile_photo_user'],'',self::$folder,400,$route_default,1,'',2);
		            					}else{
		            											//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
											imageDao::returnImage($value['profile_photo_user'],'',''.self::$folder,400,$route_default,1,'',1);
		            						 }
			            			 echo('" class="rounded-circle img-fluid" alt="'.stripslashes($value['name_user']).''.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? ' '.stripslashes($value['last_name_user']) : '') . '">
									</div>');
								}
							}else{
									echo('<h4 class="h6 text-center mb-4">'.$lang_global['No se puede mostrar la información'].' ( Error X02</h4>');
								 }
							break;
					}
				}
			}else{
					echo('<h4 class="h6 text-center mb-4">'.$lang_global['No se puede mostrar la información'].' ( Error X03</h4>');
				 }
		}

		/**
		 * [showUserInformationByUserIdFront description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function showUserInformationByUserIdFront($obj_user)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById($obj_user->getId_user());

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 1://ERROR
							echo('<h4 class="h6 text-center mb-4">'.$lang_global['No se puede mostrar la información'].' ( Error X01</h4>');
							break;
						default:
							$birthdate_user = (!empty($value['birthdate_user']) ? $value['birthdate_user'] : '');

					  echo('<form id="updateInformationUserFront" class="needs-validation" autocomplete="off" novalidate="novalidate">
					  			<h2 class="h5"><span class="badge bg-dark">'.$lang_global['Datos de sesión'].'</span></h2>
				        		<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="username_website">'.$lang_global["Username"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<div class="alert alert-info mb-1 py-2" role="alert">'.$lang_global["Nota: no se aceptan acentos, comas, espacios y caracteres especiales, solo letras y números"].'</div>
										<input type="text" id="username_website" class="form-control" data-plugin-maxlength maxlength="20" name="username_website" placeholder="'.$lang_global["Ejemplo"].': Joanna, kellyClarkson, john123" value="'.$value['username_website'].'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
				        		<hr style="border-style: dashed;">
				        		<h2 class="h5"><span class="badge bg-dark">'.$lang_global['Información básica'].'</span></h2>
				        		<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="membership_number_user">'.$lang_global["Número de miembro"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="membership_number_user" class="form-control numeros-sin-punto" name="membership_number_user" data-plugin-maxlength maxlength="25" value="'.$value['membership_number_user'].'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="name_user"><span class="text-danger">*</span> '.$lang_global["Nombre"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<input type="text" id="name_user" class="form-control" name="name_user" data-plugin-maxlength maxlength="50" value="'.stripslashes($value['name_user']).'" required>
										<div class="invalid-feedback"></div>
									</div>
								</div>
				              	<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="last_name_user"><span class="text-danger">*</span> '.$lang_global["Apellidos"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<input type="text" id="last_name_user" class="form-control" name="last_name_user" data-plugin-maxlength maxlength="50" value="'.(!empty($value['last_name_user']) && $value['last_name_user'] != "N/A" ? stripslashes($value['last_name_user']) : '').'" required>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="birthdate_user">'.$lang_global["Fecha de nacimiento"].'</label>
									<div class="col-lg col-xxl-5">
										<div class="input-group date datepicker">
						                    <input type="text" class="form-control" id="birthdate_user" name="birthdate_user" placeholder="" value="'.$birthdate_user.'" readonly>
						                    <span class="input-group-addon px-3 py-2 bg-dark text-white">
						                    	<i class="fa fa-calendar"></i>
						                    </span>
						                </div>
						                <div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="age_user">'.$lang_global["Edad"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="number" id="age_user" class="form-control numeros-sin-punto" name="age_user" minlength="2"  maxlength="2" value="'.$value['age_user'].'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="gender_user"><span class="text-danger">*</span> '.$lang_global["Género"].'</label>
									<div class="col-lg col-xxl-5">
										<select id="gender_user" class="form-select" name="gender_user" aria-label="'.$lang_global["Género"].'" required>');
	                  						userDao::showSelectedGenderListByGender($value['gender_user'],$lang_global["Femenino"],$lang_global["Masculino"],$lang_global["Otro"],$lang_global["Prefiero no decirlo"]);
								  echo('</select>
								  		<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="telephone_user">'.$lang_global["Teléfono"].'</label>
									<div class="col-lg col-xxl-5 telephone_user">
										<input type="tel" id="telephone_user" class="form-control lada" name="telephone_user" data-lada="'.$value['lada_telephone_user'].'" value="'.(!empty($value['lada_telephone_user']) ? $value['lada_telephone_user'] : '') . ''.$value['telephone_user'].'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="cell_phone_user">'.$lang_global["Celular"].'</label>
									<div class="col-lg col-xxl-5 cell_phone_user">
										<input type="tel" id="cell_phone_user" class="form-control lada" name="cell_phone_user" value="'.(!empty($value['lada_cell_phone_user']) ? $value['lada_cell_phone_user'] : '') . ''.$value['cell_phone_user'].'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="nationality_user">'.$lang_global["Nacionalidad"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="nationality_user" class="form-control" data-plugin-maxlength maxlength="20" name="nationality_user" value="'.(!empty($value['nationality_user']) ? stripslashes($value['nationality_user']) : '').'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<hr style="border-style: dashed;">
					        	<h2 class="h5"><span class="badge bg-dark">'.$lang_global['Información completa'].'</span></h2>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="rfc_user">RFC</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="rfc_user" class="form-control rfc-sat" name="rfc_user" oninput="validarInputRFC(this)" data-plugin-maxlength maxlength="13" value="'.(!empty($value['rfc_user']) ? stripslashes($value['rfc_user']) : '').'">
										<label id="resultadoRFC" class="d-none"></label>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="curp_user">CURP</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="curp_user" class="form-control" name="curp_user" data-plugin-maxlength maxlength="18" value="'.(!empty($value['curp_user']) ? stripslashes($value['curp_user']) : '').'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="about_me_user">'.$lang_global["Acerca de mí"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<textarea id="about_me_user" class="form-control" name="about_me_user" data-plugin-maxlength maxlength="1000" rows="5">'.(!empty($value['about_me_user']) ? stripslashes($value['about_me_user']) : '').'</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="biography_user">'.$lang_global["Biografía"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<textarea
											name="biography_user"
											id="biography_user"
											class="summernote"
											data-plugin-summernote>'.(!empty($value['biography_user']) ? stripslashes($value['biography_user']) : '').'</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<hr style="border-style: dashed;">
					        	<h2 class="h5"><span class="badge bg-dark">'.$lang_global['Dirección'].'</span></h2>
					        	<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="ship-address">'.$lang_global["Dirección con api google"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<input id="ship-address" class="form-control" name="ship-address" value="'.(!empty($value['ship_address_user']) ? stripslashes($value['ship_address_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="country_user">'.$lang_global["País"].'</label>
									<div class="col-lg col-xxl-5">
										<select id="country_user" class="form-select populate" name="country_user" data-plugin-selectTwo>');
											userDao::selectContry(self::$file_global,$value['country_user']);
								  echo('</select>
								  		<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="state_user">'.$lang_global["Estado"].'</label>
									<div class="col-lg col-xxl-5">
										<select id="state_user" class="form-select populate" name="state_user" data-plugin-selectTwo>');
			      							userDao::selectState(self::$file_global,(!empty($value['state_user']) ? $value['state_user'] : 'Jalisco'));
								  echo('</select>
								  		<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="city_user">'.$lang_global["Ciudad"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="city_user" class="form-control" data-plugin-maxlength maxlength="30" name="city_user" value="'.(!empty($value['city_user']) ? stripslashes($value['city_user']) : '').'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="municipality_user">'.$lang_global["Municipio"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="municipality_user" class="form-control" data-plugin-maxlength maxlength="30" name="municipality_user" value="'.(!empty($value['municipality_user']) ? stripslashes($value['municipality_user']) : '').'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="colony_user">'.$lang_global["Colonia"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="colony_user" class="form-control" data-plugin-maxlength maxlength="30" name="colony_user" value="'.(!empty($value['colony_user']) ? stripslashes($value['colony_user']) : '').'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="street_user">'.$lang_global["Calle"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<input id="street_user" class="form-control" name="street_user" data-plugin-maxlength maxlength="30" value="'.(!empty($value['street_user']) ? stripslashes($value['street_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="outdoor_number_user">'.$lang_global["Número Exterior"].'</label>
									<div class="col-lg col-xxl-5">
										<input id="outdoor_number_user" class="form-control" name="outdoor_number_user" data-plugin-maxlength maxlength="10" value="'.(!empty($value['outdoor_number_user']) ? stripslashes($value['outdoor_number_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="interior_number_user">'.$lang_global["Número interior"].'</label>
									<div class="col-lg col-xxl-5">
										<input id="interior_number_user" class="form-control" name="interior_number_user" data-plugin-maxlength maxlength="10" value="'.(!empty($value['interior_number_user']) ? stripslashes($value['interior_number_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="cp_user">'.$lang_global["Código postal"].'</label>
									<div class="col-lg col-xxl-5">
										<input type="text" id="cp_user" class="form-control numeros-sin-punto" data-plugin-maxlength maxlength="7" name="cp_user" value="'.(!empty($value['cp_user']) ? stripslashes($value['cp_user']) : '').'">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="address_user">Apartamento, unidad, suite o piso #</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<input id="address_user" class="form-control" name="address_user" data-plugin-maxlength maxlength="70" value="'.(!empty($value['address_user']) ? stripslashes($value['address_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="between_street1_user">'.$lang_global["Entre la calle"].'</label>
									<div class="col-lg col-xxl-5">
										<input id="between_street1_user" class="form-control" name="between_street1_user" data-plugin-maxlength maxlength="100" value="'.(!empty($value['between_street1_user']) ? stripslashes($value['between_street1_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="between_street2_user">'.$lang_global["Y la calle"].'</label>
									<div class="col-lg col-xxl-5">
										<input id="between_street2_user" class="form-control" name="between_street2_user" data-plugin-maxlength maxlength="100" value="'.(!empty($value['between_street2_user']) ? stripslashes($value['between_street2_user']) : '').'"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="form-group row mb-2 align-items-center">
									<label class="col-lg-5 col-xl-3 text-lg-end" for="other_references_user">'.$lang_global["Otras referencias"].'</label>
									<div class="col-lg col-xl-9 col-xxl-7">
										<textarea id="other_references_user" class="form-control" name="other_references_user" data-plugin-maxlength maxlength="50" rows="4">'.(!empty($value['other_references_user']) ? stripslashes($value['other_references_user']) : '').'</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="text-center my-4">
									<button type="submit" class="btn btn-outline-primary">'.$lang_global['Guardar cambios'].'</button>
								</div>
					        </form>');
							break;
					}
				}
			}else{
					echo('<h4 class="h6 text-center mb-4">'.$lang_global['No se puede mostrar la información'].' ( Error X02</h4>');
				 }
		}

		/**
		 * [showSelectedGenderRadioByGender description]
		 *
		 * @param  [type] $gender_selected     [description]
		 * @param  [type] $femenino            [description]
		 * @param  [type] $masculino           [description]
		 * @param  [type] $otro                [description]
		 * @param  [type] $prefiero_no_decirlo [description]
		 * @return [type]                      [description]
		 */

		private static function showSelectedGenderRadioByGender($gender_selected,$femenino,$masculino,$otro,$prefiero_no_decirlo)
   		{
   			if(!empty($gender_selected) && !empty($femenino) && !empty($masculino))
   			{
   			  echo('<div class="form-check form-check-inline">
		              	<input id="femenino" name="genero" type="radio" class="form-check-input" value="F"'.($gender_selected == 'F' ? ' checked' : '') . ' required="">
		              	<label class="form-check-label" for="femenino">'.$femenino.'</label>
		            </div>
		            <div class="form-check form-check-inline">
		              	<input id="masculino" name="genero" type="radio" class="form-check-input" value="M"'.($gender_selected == 'M' ? ' checked' : '') . ' required="">
		              	<label class="form-check-label" for="masculino">'.$masculino.'</label>
		            </div>
		            <div class="form-check form-check-inline me-0">
		              	<input id="prefiero_no_decirlo" name="genero" type="radio" class="form-check-input" value="U"'.($gender_selected == 'U' ? ' checked' : '') . ' required="">
		              	<label class="form-check-label" for="prefiero_no_decirlo">'.$prefiero_no_decirlo.'</label>
		            </div>
		            <div class="form-check form-check-inline">
		              	<input id="otro" name="genero" type="radio" class="form-check-input" value="O"'.($gender_selected == 'O' ? ' checked' : '') . ' required="">
		              	<label class="form-check-label" for="otro">'.$otro.'</label>
		            </div>');
   			}
   		}

   		/**
   		 * [updateInformationUserFront description]
   		 *
   		 * @param  [type] $obj_user [description]
   		 * @return [type]           [description]
   		 */

   		public static function updateInformationUserFront($obj_user)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_user->getId_user()))) && !empty($obj_user->getName_user()) && !empty($obj_user->getLast_name_user()) && !empty($obj_user->getGender_user()))
			{
				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationUserFront(:id_user,:name_user,:last_name_user,:rfc_user,:curp_user,:membership_number_user,:about_me_user,:biography_user,:birthdate_user,:age_user,:gender_user,:lada_telephone_user,:telephone_user,:lada_cell_phone_user,:cell_phone_user,:email_user,:ship_address_user,:address_user,:country_user,:state_user,:city_user,:municipality_user,:colony_user,:cp_user,:street_user,:outdoor_number_user,:interior_number_user,:between_street1_user,:between_street2_user,:other_references_user,:nationality_user,:username_website)";
				$valores 		= array('id_user' 					=> $obj_user->getId_user(),
										'name_user' 				=> $obj_user->getName_user(),
	        							'last_name_user' 			=> $obj_user->getLast_name_user(),
	        							'rfc_user' 					=> $obj_user->getRfc_user(),
	        							'curp_user' 				=> $obj_user->getCurp_user(),
	        							'membership_number_user' 	=> $obj_user->getMembership_number_user(),
	        							'about_me_user' 			=> $obj_user->getAbout_me_user(),
	        							'biography_user' 			=> $obj_user->getBiography_user(),
	        							'birthdate_user' 			=> $obj_user->getBirthdate_user(),
	        							'age_user' 					=> $obj_user->getAge_user(),
	        							'gender_user' 				=> $obj_user->getGender_user(),
	        							'lada_telephone_user' 		=> $obj_user->getLada_telephone_user(),
	        							'telephone_user' 			=> $obj_user->getTelephone_user(),
	        							'lada_cell_phone_user' 		=> $obj_user->getLada_cell_phone_user(),
	        							'cell_phone_user' 			=> $obj_user->getCell_phone_user(),
	        							'email_user' 				=> $obj_user->getEmail_user(),
	        							'ship_address_user' 		=> $obj_user->getShip_address_user(),
	        							'address_user' 				=> $obj_user->getAddress_user(),
	        							'country_user' 				=> $obj_user->getCountry_user(),
	        							'state_user' 				=> $obj_user->getState_user(),
	        							'city_user' 				=> $obj_user->getCity_user(),
	        							'municipality_user' 		=> $obj_user->getMunicipality_user(),
	        							'colony_user' 				=> $obj_user->getColony_user(),
	        							'cp_user' 					=> $obj_user->getCp_user(),
	        							'street_user' 				=> $obj_user->getStreet_user(),
	        							'outdoor_number_user' 		=> $obj_user->getOutdoor_number_user(),
	        							'interior_number_user' 		=> $obj_user->getInterior_number_user(),
	        							'between_street1_user' 		=> $obj_user->getBetween_street1_user(),
	        							'between_street2_user' 		=> $obj_user->getBetween_street2_user(),
	        							'other_references_user' 	=> $obj_user->getOther_references_user(),
	        							'nationality_user' 			=> $obj_user->getNationality_user(),
	        							'username_website' 			=> $obj_user->getUsername_website());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            //focus
                	//0 = Sin efecto
                    //1 = Focus en input de email
                    //2 = Focus en input de contraseña
                    //3 = Focus en input de RFC
                    //4 = Focus en input de CURP

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://YA EXISTE REGISTRADO EL RFC
			 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["El RFC"],"/PARA2/",$obj_user->getRfc_user(),$lang_error["Error 7"]),"focus" => 3);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 3://YA EXISTE REGISTRADO EL CURP
			 				$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["La CURP"],"/PARA2/",$obj_user->getCurp_user(),$lang_error["Error 7"]),"focus" => 4);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 4://YA EXISTE REGISTRADO EL ID MIEMBRO
			 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["ID miembro"],"/PARA2/",$obj_user->getMembership_number_user(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 5://EL USERNAME YA EXISTE
			 				$valor = array("estado" => "false","error" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Username"],"/PARA2/",$obj_user->getUsername_website(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			case 6://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

			 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Actualizo"],$lang_error["la información personal de"],$obj_user->getName_user().' '.$obj_user->getLast_name_user(),$lang_record["Historial 2"]);

			 				$valor = array("estado" => "true","resultado" => $lang_error["Información actualizada"]);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			default://EL ID USUARIO NO EXISTE
			 				$valor = array("estado" => "false","error" => $lang_error["Error 1"]);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [updateEmailFront description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function updateEmailFront($obj_user)
    	{
    		self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
		  echo('<div class="row justify-content-center">
		  			<div class="col-12">
		  				<h2 class="h5"><span class="badge bg-dark">'.$lang_global["Modificar correo"].'</span></h2>
		  			</div>
		  			<div class="col-md-6 col-xl-7">
		  				<div id="form-email">
		  					<form id="updateEmailFront" class="needs-validation" autocomplete="off" novalidate="novalidate">
					  			<div class="form-group mb-4">
									<label for="email" class="form-label"><span class="text-danger">*</span> '.$lang_global["E-mail"].'</label>
						            <input type="email" class="form-control" id="email" name="email" placeholder="nuevo_email@ejemplo.com" required="">
						            <div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<label for="confirma_email" class="form-label"><span class="text-danger">*</span> '.$lang_global["E-mail de confirmación"].'</label>
					              	<input type="email" class="form-control" id="confirma_email" name="confirma_email" placeholder="nuevo_email@ejemplo.com" required="">
					              	<div class="invalid-feedback"></div>
								</div>
								<div class="text-center my-4">
									<button class="btn btn-outline-primary" type="submit">'.$lang_global["Guardar cambios"].'</button>
								</div>
							</form>
		  				</div>
		  			</div>
		  		</div>');
			}
		}

		/**
		 * [updatePasswordFront description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function updatePasswordFront($obj_user)
    	{
    		self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
		  echo('<div class="row justify-content-center">
		  			<div class="col-12">
		  				<h2 class="h5"><span class="badge bg-dark">'.$lang_global["Modificar contraseña"].'</span></h2>
		  			</div>
		  			<div class="col-md-6 col-xl-7">
			  			<div id="form-password">
		  					<form id="updatePasswordFront" class="needs-validation" autocomplete="off" novalidate="novalidate">
					  			<div class="form-group mb-4">
									<label for="password" class="form-label"><span class="text-danger">*</span> '.$lang_global["Nueva contraseña"].'</label>
									<div class="input-group">
										<input type="text" rel="gp" data-size="14" data-character-set="a-z,A-Z,0-9,#" class="form-control" minlength="8" maxlength="16" name="password" id="password" value="" required>
										<span class="input-group-append">
											<button class="btn btn-dark getNewPass" type="button"><i class="fas fa-random fa-fw"></i> Generar</button>
										</span>
									</div>
					              	<div class="invalid-feedback"></div>
								</div>
								<div class="form-group js-show">
									<label for="confirma_password" class="form-label"><span class="text-danger">*</span> '.$lang_global["Repetir contraseña"].'</label>
									<div class="input-group">
										<input type="password" class="form-control js-pass" minlength="8" maxlength="16" name="confirma_password" id="confirma_password" value="" required>
										<button type="button" class="btn btn-dark js-check"><i class="fas fa-eye fa-fade"></i></button>
									</div>
					              	<div class="invalid-feedback"></div>
								</div>
								<div class="text-center my-4">
									<button class="btn btn-outline-primary" type="submit">'.$lang_global["Guardar cambios"].'</button>
								</div>
							</form>
		  				</div>
		  			</div>
		  		</div>');
			}
		}

		/**
		 * [createGeneralUserAccountFront description]
		 *
		 * @return [type] [description]
		 */

		public static function createGeneralUserAccountFront()
    	{
    		self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<form id="registerGeneralUserFront" class="needs-validation" autocomplete="off" novalidate="novalidate">
        		<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="name_user"><span class="text-danger">*</span> '.$lang_global["Nombre"].'</label>
					<div class="col-lg-7 col-xl-6 name">
						<input type="text" id="name_user" class="form-control" name="name_user" data-plugin-maxlength maxlength="50" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
              	<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="last_name_user"><span class="text-danger">*</span> '.$lang_global["Apellidos"].'</label>
					<div class="col-lg-7 col-xl-6 last_name">
						<input type="text" id="last_name_user" class="form-control" name="last_name_user" data-plugin-maxlength maxlength="50" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="telephone_user">'.$lang_global["Teléfono"].'</label>
					<div class="col-lg-7 col-xl-6 telephone">
						<input type="tel" id="telephone_user" class="form-control lada" name="telephone_user" data-lada="" value="">
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="cell_phone_user">'.$lang_global["Celular"].'</label>
					<div class="col-lg-7 col-xl-6 cell_phone">
						<input type="tel" id="cell_phone_user" class="form-control lada" name="cell_phone_user" value="">
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="email_user"><span class="text-danger">*</span> '.$lang_global["E-mail"].'</label>
					<div class="col-lg-7 col-xl-6 email">
						<input type="email" id="email_user" class="form-control" data-plugin-maxlength maxlength="50" name="email_user" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="emailConfirmation"><span class="text-danger">*</span> '.$lang_global["E-mail de confirmación"].'</label>
					<div class="col-lg-7 col-xl-6 email_confirmation">
						<input type="email" id="emailConfirmation" class="form-control" data-plugin-maxlength maxlength="50" name="emailConfirmation" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="password1"><span class="text-danger">*</span> '.$lang_global["Contraseña"].'</label>
					<div class="col-lg-7 col-xl-6 password1">
						<div class="input-group">
							<input type="text" id="password1" class="form-control" name="password1" rel="gp" data-size="14" data-character-set="a-z,A-Z,0-9,#" data-plugin-maxlength minlength="8" maxlength="16" value="" required>
							<span class="input-group-append">
								<button class="btn btn-primary getNewPass" type="button"><i class="fas fa-random fa-fw"></i> Generar</button>
							</span>
						</div>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="password2"><span class="text-danger">*</span> '.$lang_global["Repetir contraseña"].'</label>
					<div class="col-lg-7 col-xl-6">
						<div class="input-group password2 js-show">
							<input type="password" id="password2" class="form-control js-pass" name="password2" minlength="8" data-plugin-maxlength maxlength="16" value="" required>
							<button class="btn btn-dark js-check" type="button"><i class="fas fa-eye fa-fade"></i></button>
						</div>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="text-center mt-4">
					<button type="submit" class="btn btn-outline-info">'.$lang_global['Regístrate'].'</button>
				</div>
	        </form>');
		}

		/**
		 * [registerGeneralUserFront description]
		 *
		 * @param  [type] $obj_user    [description]
		 * @param  string $random_salt [description]
		 * @param  string $passBd      [description]
		 * @param  [type] $error_mail1 [description]
		 * @param  [type] $error_mail2 [description]
		 * @return [type]              [description]
		 */

		public static function registerGeneralUserFront($obj_user,$random_salt = "",$passBd = "",$error_mail1 = null,$error_mail2 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_user->getName_user()) && !empty($obj_user->getLast_name_user()) && !empty($obj_user->getEmail_user()) && !empty($obj_user->getEmail_confirmation_user()) && !empty($obj_user->getPassword_user()) && !empty($obj_user->getPassword_confirmation_user()))
			{
				if(userDao::validateEmalConfirmation($obj_user->getEmail_user(),$obj_user->getEmail_confirmation_user()) == TRUE)
				{
					if(userDao::validatePasswordConfirmation($obj_user->getPassword_user(),$obj_user->getPassword_confirmation_user()) == TRUE)
					{
						if(userDao::validatePasswordLenght($obj_user->getPassword_user()) == TRUE)
						{
							$password_mail 	= $obj_user->getPassword_user();
							$random_salt  	= hash('sha512', $password_mail);
							$passBd 	  	= hash('sha512', $password_mail . $random_salt);

							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
							require_once(self::$file_global);

							//CREAR OBJETO
							$ob_conectar 	= new conectorDB();

				            $consulta 		= "CALL registerGeneralUserFront(:name_user,:last_name_user,:lada_telephone_user,:telephone_user,:lada_cell_phone_user,:cell_phone_user,:email_user,:username_website,:password_user,:salt_user)";
				            $valores 		= array('name_user' 				=> $obj_user->getName_user(),
				        							'last_name_user' 			=> $obj_user->getLast_name_user(),
				        							'lada_telephone_user' 		=> $obj_user->getLada_telephone_user(),
				        							'telephone_user' 			=> $obj_user->getTelephone_user(),
				        							'lada_cell_phone_user' 		=> $obj_user->getLada_cell_phone_user(),
				        							'cell_phone_user' 			=> $obj_user->getCell_phone_user(),
				        							'email_user' 				=> $obj_user->getEmail_user(),
				        							'username_website' 			=> $obj_user->getUsername_website(),
				        							'password_user' 			=> $passBd,
				        							'salt_user' 				=> $random_salt);

				            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

				            //focus
		                    	//0 = Sin efecto
		                    	//1 = Focus en input de email
		                    	//2 = Focus en input de contraseña

				            foreach($resultado as &$atributo)
						 	{
						 		switch ($atributo['ERRNO']) {
						 			case 1://YA EXISTE REGISTRADO EL CORREO
						 				$valor = array("estado" => "false",
						 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["El correo"],"/PARA2/",$obj_user->getEmail_user(),$lang_error["Error 7"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 2://YA EXISTE REGISTRADO EL USERNAME
						 				$valor = array("estado" => "false",
						 							   "error" 	=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Username"],"/PARA2/",$obj_user->getUsername_website(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 3://CORRECTO
						 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
										require_once(self::$file_record);

										//ENVIAR CORREO ELECTRONICO AL USUARIO CON SUS DATOS DE REGISTRO
										ob_start();
										require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
										ob_clean();
										//DE:
										$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
										//AGREGAR RESPUESTA A:
										$mail->addReplyTo($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
										//PARA:
										$mail->addAddress($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
										//$mail->addCC('');
										//$mail->addBCC('');
										//ASUNTO
										$mail->Subject = $obj_user->getName_user().' '.$lang_record["Asunto confirmacion registro usuario"].' '.(defined('WEBSITE') ? WEBSITE : WEBSITE_CMS);
										//INCRUSTAR HEADER
							           																//filename, cid, name
										$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
										//CUERPO DEL MENSAJE
										require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationLogIn.php');

										$mail->MsgHTML($bodyConfirmationLogIn);
										//ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail1 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
										//BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
										$mail->smtpClose();

									    //ENVIARLE UN MAIL AL ADMINISTRADOR PARA INDICARLE QUE HAY UN USUARIO NUEVO E INACTIVO
					                    //DE:
					                    $mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
					                    //PARA:
					                    $mail->addAddress($mail_receptor,stripslashes($name_mail_receptor));
					                    //ASUNTO
					                    $mail->Subject = replaceStringOneParameterArray("/PARA1/",strtolower($lang_global["Usuario"]),$lang_record["Asunto usuario nuevo e inactivo"]);
					                    //CUERPO DEL MENSAJE
					                    require_once(dirname(__DIR__).'/class/forms_php/bodyLogInNewUser.php');

					                    $mail->MsgHTML($bodyLogInNewUser);
					                    //ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail2 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
					                    //BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
										$mail->smtpClose();


                                    	$valor = array("estado" 		=> "true",
                                    				   "resultado" 		=> $lang_record["Asunto confirmacion registro usuario"].(defined('WEBSITE') ? WEBSITE : WEBSITE_CMS),
                                    				   "status_mailer1" => $error_mail1,
                                    				   "status_mailer2" => $error_mail2,
                                    				   "redireccionar" 	=> "true");
						                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						                exit();
						 			break;
						 			default:
						 				$valor = array("estado" => "false",
						 							   "error" 	=> $lang_error["Error 1"]);
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 		}
						    }
						}else{
								$valor = array("estado" => "false",
											   "error" 	=> $lang_error["Error 10"]);
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }
					}else{
							$valor = array("estado" => "false",
										   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["La contraseña de confirmación es"],$lang_error["Error 2"]),
										   "focus" 	=> 2);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						 }
				}else{
						$valor = array("estado" => "false",
									   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["El correo de confirmación es"],$lang_error["Error 2"]),
									   "focus" 	=> 1);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => "false",
								   "error"	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [createSpecificUserAccountFront description]
		 *
		 * @return [type] [description]
		 */

		public static function createSpecificUserAccountFront()
    	{
    		self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<form id="registerSpecificUserFront" class="needs-validation" autocomplete="off" novalidate="novalidate">
        		<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="name_user"><span class="text-danger">*</span> '.$lang_global["Nombre"].'</label>
					<div class="col-lg-7 col-xl-6 name">
						<input type="text" id="name_user" class="form-control" name="name_user" data-plugin-maxlength maxlength="50" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
              	<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="last_name_user"><span class="text-danger">*</span> '.$lang_global["Apellidos"].'</label>
					<div class="col-lg-7 col-xl-6 last_name">
						<input type="text" id="last_name_user" class="form-control" name="last_name_user" data-plugin-maxlength maxlength="50" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="telephone_user">'.$lang_global["Teléfono"].'</label>
					<div class="col-lg-7 col-xl-6 telephone">
						<input type="tel" id="telephone_user" class="form-control lada" name="telephone_user" data-lada="" value="">
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="cell_phone_user">'.$lang_global["Celular"].'</label>
					<div class="col-lg-7 col-xl-6 cell_phone">
						<input type="tel" id="cell_phone_user" class="form-control lada" name="cell_phone_user" value="">
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="email_user">'.$lang_global["E-mail"].'</label>
					<div class="col-lg-7 col-xl-6 email">
						<input type="email" id="email_user" class="form-control" data-plugin-maxlength maxlength="50" name="email_user" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="emailConfirmation">'.$lang_global["E-mail de confirmación"].'</label>
					<div class="col-lg-7 col-xl-6 email_confirmation">
						<input type="email" id="emailConfirmation" class="form-control" data-plugin-maxlength maxlength="50" name="emailConfirmation" value="" required>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="password1">'.$lang_global["Contraseña"].'</label>
					<div class="col-lg-7 col-xl-6 password1">
						<div class="input-group">
							<input type="text" id="password1" class="form-control" name="password1" rel="gp" data-size="14" data-character-set="a-z,A-Z,0-9,#" data-plugin-maxlength minlength="8" maxlength="16" value=""  required>
							<span class="input-group-append">
								<button class="btn btn-primary getNewPass" type="button"><i class="fas fa-random fa-fw"></i> Generar</button>
							</span>
						</div>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group row mb-2 align-items-center">
					<label class="col-lg-5 col-xl-3 text-lg-end" for="password2">'.$lang_global["Repetir contraseña"].'</label>
					<div class="col-lg-7 col-xl-6 password2">
						<div class="input-group js-show">
							<input type="password" id="password2" class="form-control js-pass" name="password2" minlength="8" data-plugin-maxlength maxlength="16" value="" required>
							<button class="btn btn-dark js-check" type="button"><i class="fas fa-eye fa-fade"></i></button>
						</div>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="text-center mt-4">
					<button type="submit" class="btn btn-sm btn-primary text-uppercase">'.$lang_global['Regístrate'].'</button>
				</div>
	        </form>');
		}

		/**
		 * [registerSpecificUserFront description]
		 *
		 * @param  [type] $obj_user    [description]
		 * @param  string $random_salt [description]
		 * @param  string $passBd      [description]
		 * @param  [type] $error_mail1 [description]
		 * @param  [type] $error_mail2 [description]
		 * @return [type]              [description]
		 */

		public static function registerSpecificUserFront($obj_user,$random_salt = "",$passBd = "",$error_mail1 = null,$error_mail2 = null)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_user->getName_user()) && !empty($obj_user->getLast_name_user()) && !empty($obj_user->getEmail_user()) && !empty($obj_user->getEmail_confirmation_user()) && !empty($obj_user->getPassword_user()) && !empty($obj_user->getPassword_confirmation_user()))
			{
				if(userDao::validateEmalConfirmation($obj_user->getEmail_user(),$obj_user->getEmail_confirmation_user()) == TRUE)
				{
					if(userDao::validatePasswordConfirmation($obj_user->getPassword_user(),$obj_user->getPassword_confirmation_user()) == TRUE)
					{
						if(userDao::validatePasswordLenght($obj_user->getPassword_user()) == TRUE)
						{
							$password_mail 	= $obj_user->getPassword_user();
							$random_salt  	= hash('sha512', $password_mail);
							$passBd 	  	= hash('sha512', $password_mail . $random_salt);

							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
							require_once(self::$file_global);

							//CREAR OBJETO
							$ob_conectar 	= new conectorDB();

							//id_role
			                    //1 = Súper Administrador
			                    //2 = Administrador
			                    //3 = Usuario
			                    //4 = Vendedora
			                    //5 = Diseñador
			                    //6 = Chef
			                    //7 = Editor

			                $id_role = 7;

			                switch ($id_role) {
			                	case 7:
			                		$profile = $lang_global["Editor"];
			                	break;
			                	default:
			                		$profile = $lang_global["Usuario"];
			                		break;
			                }

			                $consulta 		= "CALL registerSpecificUserFront(:id_role,:name_user,:last_name_user,:lada_telephone_user,:telephone_user,:lada_cell_phone_user,:cell_phone_user,:email_user,:username_website,:password_user,:salt_user)";
				            $valores 		= array('id_role' 					=> $id_role,
				            						'name_user' 				=> $obj_user->getName_user(),
				        							'last_name_user' 			=> $obj_user->getLast_name_user(),
				        							'lada_telephone_user' 		=> $obj_user->getLada_telephone_user(),
				        							'telephone_user' 			=> $obj_user->getTelephone_user(),
				        							'lada_cell_phone_user' 		=> $obj_user->getLada_cell_phone_user(),
				        							'cell_phone_user' 			=> $obj_user->getCell_phone_user(),
				        							'email_user' 				=> $obj_user->getEmail_user(),
				        							'username_website' 			=> $obj_user->getUsername_website(),
				        							'password_user' 			=> $passBd,
				        							'salt_user' 				=> $random_salt);

				            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

				            //focus
		                    	//0 = Sin efecto
		                    	//1 = Focus en input de email
		                    	//2 = Focus en input de contraseña

				            foreach($resultado as &$atributo)
						 	{
						 		switch ($atributo['ERRNO']) {
						 			case 1://NO EXISTE EL ID_ROLE
						 				$valor = array("estado" => "false",
						 							   "error" 	=> $lang_error["Error 1"].'(1)');
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 2://YA EXISTE REGISTRADO EL CORREO
						 				$valor = array("estado" => "false",
						 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["El correo"],"/PARA2/",$obj_user->getEmail_user(),$lang_error["Error 7"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 3://YA EXISTE REGISTRADO EL USERNAME
						 				$valor = array("estado" => "false",
						 							   "error" 	=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Username"],"/PARA2/",$obj_user->getUsername_website(),"/PARA3/",$lang_error["usuario"],$lang_error["Error 25"]));
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 			case 4://CORRECTO
						 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
										require_once(self::$file_record);

										//ENVIAR CORREO ELECTRONICO AL USUARIO CON SUS DATOS DE REGISTRO
										ob_start();
										require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
										ob_clean();
										//DE:
										$mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
										//AGREGAR RESPUESTA A:
										$mail->addReplyTo($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
										//PARA:
										$mail->addAddress($obj_user->getEmail_user(),$obj_user->getName_user().(!empty($obj_user->getLast_name_user()) ? ' '.$obj_user->getLast_name_user() : ''));
										//$mail->addCC('');
										//$mail->addBCC('');
										//ASUNTO
										$mail->Subject = $obj_user->getName_user().' '.$lang_record["Asunto confirmacion registro usuario"].' '.(defined('WEBSITE') ? WEBSITE : WEBSITE_CMS);
										//INCRUSTAR HEADER
							           																//filename, cid, name
										$mail->AddEmbeddedImage(dirname(__DIR__).'/class/forms_php/mails/header-bienvenido.png', 'headerbienvenido', 'header-bienvenido.png');
										//CUERPO DEL MENSAJE
										require_once(dirname(__DIR__).'/class/forms_php/bodyConfirmationLogIn.php');

										$mail->MsgHTML($bodyConfirmationLogIn);
										//ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail1 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
										//BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
										$mail->smtpClose();

									    //ENVIARLE UN MAIL AL ADMINISTRADOR PARA INDICARLE QUE HAY UN USUARIO NUEVO E INACTIVO
					                    //DE:
					                    $mail->setFrom($mail_receptor,stripslashes($name_mail_receptor));
					                    //PARA:
					                    $mail->addAddress($mail_receptor,stripslashes($name_mail_receptor));
					                    //ASUNTO
					                    $mail->Subject = replaceStringOneParameterArray("/PARA1/",strtolower($lang_global["Editor"]),$lang_record["Asunto usuario nuevo e inactivo"]);
					                    //CUERPO DEL MENSAJE
					                    require_once(dirname(__DIR__).'/class/forms_php/bodyLogInNewUser.php');

					                    $mail->MsgHTML($bodyLogInNewUser);
					                    //ENVIAR MAIL
										if(!$mail->send()) {
											$error_mail2 = $mail->ErrorInfo;
											$mail->getSMTPInstance()->reset();
										}
					                    //BORRAR CONTENEDORES
										$mail->clearCustomHeaders();
									    $mail->clearAllRecipients();
									    $mail->clearAddresses();
										$mail->smtpClose();

                                    	$valor = array("estado" 		=> "true",
                                    				   "resultado" 		=> $lang_record["Asunto confirmacion registro usuario"].(defined('WEBSITE') ? WEBSITE : WEBSITE_CMS),
                                    				   "status_mailer1" => $error_mail1,
                                    				   "status_mailer2" => $error_mail2,
                                    				   "redireccionar" 	=> "true");
						                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						                exit();
						 			break;
						 			default:
						 				$valor = array("estado" => "false",
						 							   "error"  => $lang_error["Error 1"].'(2)');
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
						 			break;
						 		}
						    }
						}else{
								$valor = array("estado" => "false",
											   "error" 	=> $lang_error["Error 10"]);
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }
					}else{
							$valor = array("estado" => "false",
										   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["La contraseña de confirmación es"],$lang_error["Error 2"]),
										   "focus"  => 2);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						 }
				}else{
						$valor = array("estado" => "false",
									   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["El correo de confirmación es"],$lang_error["Error 2"]),
									   "focus" 	=> 1);
						return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						exit();
					 }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [showNotificationOfAllInactiveUsers description]
		 *
		 * @param  [type]  $view                         [description]
		 * @param  [type]  $obj_user                     [description]
		 * @param  string  $notificationUserInactiveList [description]
		 * @param  integer $x                            [description]
		 * @return [type]                                [description]
		 */

		public static function showNotificationOfAllInactiveUsers($view,$obj_user,$notificationUserInactiveList = "",$x = 0)
	    {
	    	self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

	        if(!empty(intval(trim($obj_user->getId_role()))) && !empty(intval(trim($view)))){

	        	self::$file_help = dirname(__DIR__).'/helps/help.php';
		        require_once(self::$file_help);

	        	//CREAR OBJETO
	            $ob_conectar    			= new conectorDB();

	            //$obj_user->getId_role()
                    //1 = Súper Administrador
                    //2 = Administrador
                    //3 = Usuario
                    //4 = Vendedora
                    //5 = Diseñador
                    //6 = Chef

	            $consulta_inactive_users 	= "CALL showAllInactiveUsers()";
	            $resultadoIU 				= $ob_conectar->consultarBD($consulta_inactive_users,NULL);

	            foreach($resultadoIU as &$datosIU)
	            {
	                switch ($datosIU['ERRNO']) {
	                	case 2://CORRECTO
	                		if(!empty($datosIU['id_user']) && !empty($datosIU['full_name']) && !empty($datosIU['name_role']))
			                {
								//$type_return
									//1 = echo
									//2 = return
								//$view
				                    //1 = front
				                    //2 = back

																									//$id_user,$full_name,$name_role,$type_return,$view
								$notificationUserInactiveList .= userDao::notificationUserInactiveList($datosIU['id_user'],$datosIU['full_name'],$datosIU['name_role'],2,$view);

								if($x == (count($resultadoIU)-1)){
									$response['status'] = 3;
									$response['total_inactive_users'] = count($resultadoIU);
									$response['msg'] = $notificationUserInactiveList;
									return print(json_encode($response, JSON_UNESCAPED_UNICODE));
                					exit();
								}

								$x++;
			                }else{
									$response['status'] = 1;
									$response['msg']    = $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)';
									return print(json_encode($response, JSON_UNESCAPED_UNICODE));
				                	exit();
								 }
	                	break;
	                	default://NO HAY USUARIOS INACTIVOS
	                		$response['status'] = 2;
							$response['msg']    = $lang_error['No hay usuarios inactivos'];
							return print(json_encode($response, JSON_UNESCAPED_UNICODE));
		                	exit();
	                	break;
	                }
	            }
	        }else{
	        		$response['status'] = 1;
					$response['msg']    = $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(5)';
					return print(json_encode($response, JSON_UNESCAPED_UNICODE));
                	exit();
	        	 }
	    }

	    /**
	     * [notificationUserInactiveList description]
	     *
	     * @param  [type] $id_user                      [description]
	     * @param  [type] $full_name                    [description]
	     * @param  [type] $name_role                    [description]
	     * @param  [type] $type_return                  [description]
	     * @param  [type] $view                         [description]
	     * @param  string $notificationUserInactiveList [description]
	     * @return [type]                               [description]
	     */

	    private static function notificationUserInactiveList($id_user,$full_name,$name_role,$type_return,$view,$notificationUserInactiveList = "")
		{
			if(!empty($id_user) && !empty($full_name) && !empty($name_role) && !empty($type_return) && !empty($view))
			{
				self::$file_core 	= dirname(__DIR__).'../../core/core.php';
				require_once(self::$file_core);

				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
				require(self::$file_global);

				//$view
                    //1 = front
                    //2 = back

  $notificationUserInactiveList .= '<li'.($view == 1 ? ' class="p-2"' : '').'>
										<a class="clearfix" href="'.URL_CARPETA_ADMIN.'/my-profile/'.$id_user.'" rel="noopener" role="button">';
		  $notificationUserInactiveList .= '<div class="image mt-2">
		  										<span class="text-light badge bg-dark">'.$name_role.'</span>
		  									</div>
		  									<div class="description">
		  										<span class="title '.($view == 1 ? 'text-' : '').'truncate">'.$full_name.'</span>
		  										<span class="message '.($view == 1 ? 'text-' : '').'truncate text-dark badge bg-warning">'.$lang_global["En espera de activación"].'</span>
		  									</div>
		  								</a>
		      						</li>';
				//$type_return
					//1 = echo
					//2 = return

				if($type_return == 1){
					echo $notificationUserInactiveList;
				}else{
					return $notificationUserInactiveList;
					 }
			}
		}

		/**
		 * [showModalWithInstructions description]
		 *
		 * @param  [type] $obj_user [description]
		 * @return [type]           [description]
		 */

		public static function showModalWithInstructions($obj_user)
   		{
   			//$obj_user->getId_role()
                //1 = Súper Administrador
                //2 = Administrador
                //3 = Usuario
                //4 = Vendedora
                //5 = Diseñador
                //6 = Chef

   			if(intval(trim($obj_user->getId_role())) == 6)
   			{
                $personalInformationArray = userDao::showPersonalInformationUserById(intval(trim($_SESSION['id_user_dao'])));

				foreach($personalInformationArray as $key => $value)
				{
					if($value['ERRNO'] == 2){
						if(empty($value['about_me_user']) || empty($value['biography_user']) || $value['profile_photo_user'] == "profile.png"){
					  echo('<div id="instructionsModal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
								<section class="card">
									<header class="card-header">
										<h1 class="modal-title fs-5 mt-0">¡Bienvenido a '.WEBSITE_CMS.'!</h1>
									</header>
									<div class="card-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<p>¡Ahora eres parte de nuestra familia!</p>
										        <p>Para poder empezar a envíar propuestas increíbles a los comensales debes completar primero tu perfil de usuario como: <b>Acerca de mí y Biografía</b>, cambiar la <b>Foto de perfil</b> y seleccionar tus mejores fotos de platillos hechos por tí y añadirlas a la <b>Galería</b>.</p>
										        <p>Tener toda la información de perfil completa te dará más garantías de selección a tus propuestas.</p>
										        <p>¿Qué esperas? es muy fácil.</p>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row">
											<div class="col-md-12 text-center">
												<button type="button" class="btn btn-dark modal-dismiss">Entendido</button>
											</div>
										</div>
									</footer>
								</section>
							</div>');
						}
					}
	            }
   			}
   		}


   		/**
   		 * [showProfilePictureMainByIdUser description]
   		 *
   		 * @param  [type] $obj_user      [description]
   		 * @param  string $route_default [description]
   		 * @return [type]                [description]
   		 */

   		public static function showProfilePictureMainByIdUser($obj_user,$route_default= "img/image_not_found_580.jpg")
        {
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
				$personalInformationArray = userDao::showPersonalInformationUserById($obj_user->getId_user());

				foreach($personalInformationArray as $key => $value)
				{
					switch ($value['ERRNO']) {
						case 1://ERROR
							echo('<p class="mb-0">'.$lang_global['Problemas al ejecutar consulta'].'</p>');
							break;
						default:
							//CREAR OBJETO
							$ob_conectar = new conectorDB();

							self::$folder = $ob_conectar->showFolderPreviousFile(1);

							if(self::$folder != FALSE && !empty(self::$folder))
							{
								//NO ES NECESARIO VALIDAR $value['last_name_user'] YA QUE SU VALOR PUEDE SER OPCIONAL
								if(!empty($value['name_user']) && !empty($value['profile_photo_user']))
								{
							  echo('<h2 class="font-weight-bold text-color-dark text-7"><span class="fs-5">'.$lang_global["Hola"].'</span>'.(!empty(stripslashes($value['name_user'])) ? ', '.stripslashes($value['name_user']) : '').'</h2>
									<p class="mb-0">'.$value['name_role'].'</p>

									<div class="widget-user-acrostic bg-primary">
										<span class="font-weight-bold">
											<img src="');

							  					if($value['profile_photo_user'] == 'profile.png'){
							  						//$measure
								  							//0 = Sin medida
								  						//$type_return
															//1 = echo
															//2 = return
														//$type_iso
															//'' = Sin prefijo idioma
															//iso_code (ESP, ENG)
								  						//$view
															//1 = URL_CARPETA_FRONT
															//2 = URL_CARPETA_ADMIN

								  										//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
							  						imageDao::returnImage($value['profile_photo_user'],'',self::$folder,50,$route_default,1,'',2);
												}else{
																		//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
														imageDao::returnImage($value['profile_photo_user'],'','../'.self::$folder,50,$route_default,1,'',1);
													 }

			            			 	echo('" class="rounded-5 img-fluid" alt="'.$value['profile_photo_user'].'">
			            			 	</span>
									</div>');
								}
							}else{
									echo('<p class="mb-0">'.$lang_global['No se encontró la carpeta raíz'].'</p>');
								 }
						break;
					}
				}
			}else{
					echo('<p class="mb-0">'.$lang_global['Error en el proceso'].$lang_global['Variables vacías'].'(1)</p>');
				 }
        }

        /**
         * [getTotalUsersByRoleId description]
         *
         * @param  [type] $obj_user [description]
         * @return [type]           [description]
         */

        public static function getTotalUsersByRoleId($obj_user)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_user->getId_role()))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL getTotalUsersByRoleId(:id_role)";
				$valores 		= array('id_role' => $obj_user->getId_role());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		echo($atributo['TOTAL_USERS']);
			    }
			}else{
					echo($lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
				 }
		}

		/**
		 * [showUserRecordMainWithLimit description]
		 *
		 * @param  [type]  $obj_user [description]
		 * @param  integer $x        [description]
		 * @return [type]            [description]
		 */

		public static function showUserRecordMainWithLimit($obj_user,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($obj_user->getId_user()))))
			{
	        	//CREAR OBJETO
	        	$ob_conectar 	= new conectorDB();

	        	$consulta 		= "CALL showUserRecordWithLimit(:id_user,:limit)";
  				$valores 		= array('id_user' 	=> $obj_user->getId_user(),
  										'limit' 	=> 5);

	            $resultado  	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_USER_HISTORY'] > 0)
            		{
            			if($x == 1){
            				date_default_timezone_set('America/Mexico_City');
							setlocale(LC_ALL,"es_ES");
							// Unix
							setlocale(LC_TIME, 'es_ES.UTF-8');
							// En windows
							setlocale(LC_TIME, 'spanish');
            			}

            			$dateTimeObj 	= new DateTime($datos['date_record'], new DateTimeZone('America/Mexico_City'));

						$dateFormatted 	= IntlDateFormatter::formatObject(
						  	$dateTimeObj,
						  	"d 'de' MMMM y, H:mm"
						);

			      echo('<li class="activity-item">
							<span class="activity-time">'.ucfirst(strtolower($dateFormatted)).'</span> <i class="fas fa-chevron-right text-color-primary"></i>
							<span class="activity-description">'.$datos['resumen_record'].'</span>
						</li>');

            			$x++;
            		}else{
            			echo('<h4 class="c-negro f-medium text-center">'.$lang_global['Sin historial'].'</h4>');
            			 }
            	}
			}
		}
	}