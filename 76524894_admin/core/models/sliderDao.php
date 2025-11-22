<?php
	//IMAGENES
	require_once(dirname(__DIR__)."/models/imageDao.php");
	//MENU
	require_once(dirname(__DIR__)."/models/menuDao.php");

	class sliderDao
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
   		 * [showFormUploadSlider description]
   		 *
   		 * @return [type] [description]
   		 */

   		public static function showFormUploadSlider()
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<div class="box-progress">
				<div class="progress light m-2">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<form id="registerSlider" class="form-horizontal" autocomplete="off" novalidate="novalidate">
				<h3><span class="badge bg-dark">Información básica</span></h3>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="title_image_lang"><span class="required">*</span> '.$lang_global["Título"].'</label>
					<div class="col-lg-7 col-xl-6">
						<input type="text" id="title_image_lang" class="form-control" data-plugin-maxlength maxlength="70" name="title_image_lang" value="" required />
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="subtitle_image_lang">'.$lang_global["Subtítulo"].'</label>
					<div class="col-lg-7 col-xl-6">
						<input type="text" id="subtitle_image_lang" class="form-control" data-plugin-maxlength maxlength="45" name="subtitle_image_lang" value="" />
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="title_hyperlink_image_lang">'.$lang_global["Título botón link"].'</label>
					<div class="col-lg-7 col-xl-6 col-xxl-3">
						<input type="text" id="title_hyperlink_image_lang" class="form-control" data-plugin-maxlength maxlength="100" name="title_hyperlink_image_lang" value="" placeholder="eje: Envíar" />
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="link_image_lang">'.$lang_global["Link"].'</label>
					<div class="col-lg-7 col-xl-6">
						<input type="text" id="link_image_lang" class="form-control" data-plugin-maxlength maxlength="255" name="link_image_lang" value="" placeholder="eje: https://www.dominio.com" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="description_small_image_lang">'.$lang_global["Descripción corta"].'</label>
					<div class="col-lg-7 col-xl-6">
						<textarea id="description_small_image_lang" class="form-control" data-plugin-maxlength maxlength="400" rows="7" name="description_small_image_lang"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="description_large_image_lang">'.$lang_global["Descripción larga"].'</label>
					<div class="col-lg-7 col-xl-8">
						<textarea
							name="description_large_image_lang"
							id="description_large_image_lang"
							class="summernote"
							data-plugin-summernote></textarea>
					</div>
				</div>
				<hr style="border-style: dashed;"/>
				<h3><span class="badge bg-dark">Característica</span></h3>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="id_type_version"><span class="required">*</span> '.$lang_global["Versión"].'</label>
					<div class="col-lg-7 col-xl-6">
						<select name="id_type_version" id="id_type_version" class="form-control  populate" data-plugin-selectTwo required>
							<option value="">'.$lang_global["Seleccionar una opción"].'</option>');
							imageDao::showVersionList();
				  echo('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="id_menu"><span class="required">*</span> '.$lang_global["Sección"].'</label>
					<div class="col-lg-7 col-xl-6">
						<select name="id_menu" id="id_menu" class="form-control populate" data-plugin-selectTwo required>
							<option value="">'.$lang_global["Seleccionar una opción"].'</option>');
							menuDao::showMenuList(0);
				  echo('</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="background_color_degraded_image_lang">'.$lang_global["Color de fondo degradado"].'</label>
					<div class="col-lg-7 col-xl-6">
						<textarea id="background_color_degraded_image_lang" class="form-control" rows="3" name="background_color_degraded_image_lang"></textarea>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_color_image_lang">'.$lang_global["Color de fondo"].'</label>
					<div class="col-lg-7 col-xl-6">
						<input type="color" id="background_color_image_lang" class="border-0 mt-1" name="background_color_image_lang" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#0088cc" />
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_repeat_image_lang">'.$lang_global["Repetir fondo"].'</label>
					<div class="col-lg-7 col-xl-6">
						<select name="background_repeat_image_lang" id="background_repeat_image_lang" data-plugin-selectTwo class="form-control populate">');
							imageDao::showSelectedBGRList(0);
				  echo('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_position_image_lang" for="background_position_image_lang">'.$lang_global["Posición fondo"].'</label>
					<div class="col-lg-7 col-xl-6">
						<select name="background_position_image_lang" id="background_position_image_lang" data-plugin-selectTwo class="form-control populate">');
							imageDao::showSelectedBGRPList(0);
				 echo ('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_size_image_lang" for="background_size_image_lang">'.$lang_global["Tamaño fondo"].'</label>
					<div class="col-lg-7 col-xl-6">
						<select name="background_size_image_lang" id="background_size_image_lang" data-plugin-selectTwo class="form-control populate">');
							imageDao::showSelectedBGSList($datos['background_size_image_lang']);
				 echo ('</select>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="alt_image_lang">'.$lang_global["Alt imagen"].'</label>
					<div class="col-lg-7 col-xl-6">
						<input type="text" class="form-control" data-plugin-maxlength maxlength="100" name="alt_image_lang" id="alt_image_lang" value="">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="width_image">'.$lang_global["Width"].'</label>
					<div class="col-lg-7 col-xl-3">
						<input type="text" class="form-control" data-plugin-maxlength maxlength="4" name="width_image" id="width_image" value="" placeholder="eje: 100">
					</div>
				</div>
				<div class="form-group row align-items-center">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="height_image">'.$lang_global["Height"].'</label>
					<div class="col-lg-7 col-xl-3">
						<input type="text" class="form-control" data-plugin-maxlength maxlength="4" name="height_image" id="height_image" value="" placeholder="eje: 100">
					</div>
				</div>
				<hr style="border-style: dashed;"/>
				<h3><span class="badge bg-dark">'.$lang_global["Imagen"].'</span></h3>
				<div class="form-group row align-items-center pb-5">
					<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="fileInput"><span class="required">*</span> '.$lang_global["Selecciona la imagen"].'</label>
					<div class="col-lg-7 col-xl-6">
						<small class="d-block mb-2">'.$lang_global["Formatos aceptados: JPG, JPEG, PNG y SVG"].'</small>
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="fas fa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-default btn-file">
									<span class="fileupload-exists">'.$lang_global["Cambiar"].'</span>
									<span class="fileupload-new">'.$lang_global["Seleccionar archivo"].'</span>
									<input type="file" name="file" id="fileInput" class="form-control" required />
								</span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">'.$lang_global["Quitar"].'</a>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center mt-4">
					<button type="submit" class="btn btn-primary">'.$lang_global["Registrar"].'</button>
				</div>
			</form>');
		}

		/**
		 * [registerSlider description]
		 *
		 * @param  [type]  $obj_lang            [description]
		 * @param  [type]  $obj_menu_lang       [description]
		 * @param  [type]  $obj_image_lang      [description]
		 * @param  string  $imageUpload         [description]
		 * @param  string  $return_boolean      [description]
		 * @param  string  $estado              [description]
		 * @param  string  $tipo_msj            [description]
		 * @param  string  $devuelve            [description]
		 * @param  string  $estadoRedireccionar [description]
		 * @param  string  $imageWithPrefixLang [description]
		 * @param  integer $x                   [description]
		 * @param  string  $route_default       [description]
		 * @return [type]                       [description]
		 */

		public static function registerSlider($obj_lang,$obj_menu_lang,$obj_image_lang,$imageUpload = "",$return_boolean = "",$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "true",$imageWithPrefixLang = "",$x = 0,$route_default = "img/image_not_found_580.jpg")
        {
        	self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_menu_lang->getId_menu()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_image_lang->getId_type_version()))) && !empty($obj_image_lang->getTitle_image_lang()))
			{
				self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

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
								//CREAR OBJETO
								$ob_conectar 		= new conectorDB();

								$consulta1 			= "CALL registerImage(:id_type_image,:id_menu,:width_image,:height_image,:file_type,:file_size)";
								$valores1 			= array('id_type_image' 	=> $obj_image_lang->getId_type_image(),
															'id_menu' 			=> $obj_menu_lang->getId_menu(),
															'width_image' 		=> $obj_image_lang->getWidth_image(),
															'height_image' 		=> $obj_image_lang->getHeight_image(),
															'file_type' 		=> $obj_image_lang->getFile_type(),
															'file_size' 		=> $obj_image_lang->getFile_size());

					            $resultado1 	 	= $ob_conectar->consultarBD($consulta1,$valores1);

					            foreach($resultado1 as &$atributo)
							 	{
							 		switch ($atributo['ERRNO'])
							 		{
							 			case 4://CORRECTO
							 				self::$file_help 	= dirname(__DIR__).'/helps/help.php';
								            require_once(self::$file_help);

							 				$id_image 			= $atributo["ID_IMG"];

							 				if(!empty(intval(trim($id_image))))
							 				{
							 					$file_type 		= explode("/", $obj_image_lang->getFile_type());

							 					$consulta2      = "CALL showActiveLanguage()";
									            $resultado2     = $ob_conectar->consultarBD($consulta2,null);

									            foreach($resultado2 as &$atributo2)
									            {
									                if($atributo2['ERRNO'] == 1)
									                {
									                								//$route,$file
									                	imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

									                	$devuelve 		= $lang_error["Error 11"]."(1)";
									                }else{
									                		$id_lang 	= $atributo2['id_lang'];
									                		$iso_code 	= $atributo2['iso_code'];

									                		if(!empty(intval(trim($id_lang))) && !empty($iso_code))
							 								{
							 									if($file_type[0] != "video"){
							 										$imageWithPrefixLang 	= imageDao::renameImageLang($imageUpload,$iso_code);
							 									}else{
							 										$imageWithPrefixLang 	= $imageUpload;
							 										 }

							 									if(!empty($imageWithPrefixLang))
							 									{
							 										$consulta3 	= "CALL registerInformationImage(:id_image,:id_lang,:id_type_image,:id_type_version,:title_image_lang,:subtitle_image_lang,:description_small_image_lang,:description_large_image_lang,:title_hyperlink_image_lang,:link_image_lang,:alt_image_lang,:background_color_image_lang,:background_color_degraded_image_lang,:background_repeat_image_lang,:background_position_image_lang,:background_size_image_lang,:image_lang)";
							 										$valores3 	= array('id_image' 							=> $id_image,
																						'id_lang' 							=> $id_lang,
																						'id_type_image' 					=> $obj_image_lang->getId_type_image(),
																						'id_type_version' 					=> $obj_image_lang->getId_type_version(),
																						'title_image_lang' 					=> $obj_image_lang->getTitle_image_lang(),
																						'subtitle_image_lang' 				=> $obj_image_lang->getSubtitle_image_lang(),
																						'description_small_image_lang' 		=> $obj_image_lang->getDescription_small_image_lang(),
																						'description_large_image_lang' 		=> $obj_image_lang->getDescription_large_image_lang(),
																						'title_hyperlink_image_lang' 		=> $obj_image_lang->getTitle_hyperlink_image_lang(),
																						'link_image_lang' 					=> $obj_image_lang->getLink_image_lang(),
																						'alt_image_lang' 					=> $obj_image_lang->getAlt_image_lang(),
																						'background_color_image_lang' 		=> $obj_image_lang->getBackground_color_image_lang(),
																						'background_color_degraded_image_lang' 	=> $obj_image_lang->getBackground_color_degraded_image_lang(),
																						'background_repeat_image_lang' 		=> $obj_image_lang->getBackground_repeat_image_lang(),
																						'background_position_image_lang'	=> $obj_image_lang->getBackground_position_image_lang(),
																						'background_size_image_lang' 		=> $obj_image_lang->getBackground_size_image_lang(),
																						'image_lang' 						=> $imageWithPrefixLang);

														            $resultado3 	 	= $ob_conectar->consultarBD($consulta3,$valores3);

														            foreach($resultado3 as &$atributo3)
																 	{
																 		switch ($atributo3['ERRNO'])
																 		{
																 			case 4://YA EXISTE REGISTRADA UNA IMAGEN CON ESE IDIOMA
																 				$devuelve 	= replaceStringTwoParametersArray("/PARA1/",$lang_error["La imagen"],"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]);
																 			break;
																 			case 6://YA EXISTE REGISTRADA UNA VERSIÓN
																 											//$route,$file
																 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

																 				$devuelve 				= $lang_error["Error 23"];
																 			break;
																 			case 7://CORRECTO
																 				if($x == 0){
																 					self::$file_record 		= dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
								            										require_once(self::$file_record);

																 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["Slider"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);
																 				}

																				self::$final_full_path  = self::$full_path."/".$imageUpload;

																 				if(!empty(self::$final_full_path))
																 				{
																 					if(file_exists(self::$final_full_path))
																					{
																						if($file_type[0] != "video"){
																												//$folder,$img,$title_prefix_lang
																							imageDao::duplicateImagePrefixLang(self::$full_path,$imageUpload,$iso_code);

																							if($obj_image_lang->getFile_type() != "image/svg+xml")
																							{
																												//$folder,$id_type_image,$img
																								imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$iso_code);
																							}
																						}
																					}
																				}

																				$x++;

																				$estado 	= "true";
															 					$tipo_msj 	= "resultado";
													                			$devuelve 	= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
																 			break;
																 			default:
																 				//$atributo3['ERRNO']
																	 				//1 = ID LANG NO EXISTE
																	 				//2 = ID_IMG NO EXISTE
																	 				//3 = ID TY VERSION NO EXISTE
																	 				//5 = ID IMG LANG VERSION NO EXISTE

																 											//$route,$file
																 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

																 				$devuelve 	 = $lang_error["Error 11"]."(2)(".$atributo3['ERRNO'].")";
																 			break;
																 		}

																 		$imageWithPrefixLang = "";

																    }//End FOREACH registerInformationImage
							 									}else{
							 																		//$route,$file
							 											imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

							 											$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(1)";
							 										 }//END if(!empty($imageWithPrefixLang))
							 								}else{
							 																		//$route,$file
							 										imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

							 										$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(2)";
							 									 }//END if(!empty($id_lang) && !empty($iso_code))
														}
												}//End CALL showActiveLanguage
							 				}else{
							 													//$route,$file
							 						imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

							 						$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(3)";
							 					 }//END if(!empty($id_image))
							 			break;
							 			default:
							 											//$route,$file
							 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

					                		//$atributo1['ERRNO']
								 				//1 = ID TYPE IMG NO EXISTE
								 				//2 = ID MENU NO EXISTE
								 				//3 = ID IMG NO EXISTE

								 			$devuelve = $lang_error["Error 11"]."(1)(".$atributo1['ERRNO'].")";
							 			break;
							 		}
							    }//End FOREACH registerImage

							    $valor = array("estado" 		=> $estado,
							    			   $tipo_msj 		=> $devuelve,
							    			   "redireccionar" 	=> $estadoRedireccionar);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();

							}else{
									$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(4)", "redireccionar" => "true");
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
								 }//END if(!empty($imageUpload))
						}else{
								$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(3)";
								}

								$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//return_boolean
					 }
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables no creadas"], "redireccionar" => "true");
                	return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                	exit();
				 }
        }

        /**
         * [showRegisteredSliders description]
         *
         * @param  [type]  $obj_image_lang [description]
         * @param  string  $image_lang     [description]
         * @param  string  $route_default  [description]
         * @param  integer $measure        [description]
         * @param  integer $x              [description]
         * @return [type]                  [description]
         */

        public static function showRegisteredSliders($obj_image_lang,$image_lang = "",$route_default = "img/image_not_found_100.jpg",$measure = 45,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))))
			{
				self::$folder 			= imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					self::$full_path	= "";
				}else{
					self::$full_path  	= "../".self::$folder;
					 }

				//CREAR OBJETO
				$ob_conectar 			= new conectorDB();

				$consulta 				= "CALL showDatatableSlider(:id_type_image)";
				$valores 				= array('id_type_image' => $obj_image_lang->getId_type_image());

				$resultado 	 			= $ob_conectar->consultarBD($consulta,$valores);

				foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_SLIDER'] > 0 && !empty($datos['id_image']) && !empty($datos['id_image_lang']) && !empty($datos['title_image_lang']) && !empty($datos['image_lang']) && !empty($datos['format_image']) && !empty($datos['size_image']) && !empty($datos['iso_code']))
            		{
            			if($datos['format_image'] == 'image/svg+xml'){
	  						$measure = 0;
	  						$class_height = 'height="45"';
	  					}else{
  							$class_height = 'class="img-fluid"';
	  						 }

            			if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

            	  echo('<table class="table table-bordered table-striped mb-0" id="datatable-sliders" data-order="[]" data-page-length="10">
							<thead>
								<tr>
									<th>ID</th>
									<th>'.$lang_global['Imagen'].'</th>
									<th>'.$lang_global['Nombre'].'</th>
									<th>'.$lang_global['Sección'].'</th>
									<th>'.$lang_global['Formato'].'</th>
									<th>'.$lang_global['Tamaño'].'</th>
									<th>'.$lang_global['Estatus'].'</th>
									<th>'.$lang_global['Acciones'].'</th>
								</tr>
							</thead>
							<tbody class="row_position">');
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
									<td>
										<a class="d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].' '.$lang_global['Slider'].'" href="'.URL_CARPETA_ADMIN.'/design-slider-detail/'.$datos['id_image'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-2" style="font-size:13px;"></i>'.stripslashes($datos['title_image_lang']).'</a>
									</td>
									<td>'.(!empty($datos['title_menu_lang']) ? $datos['title_menu_lang'] : '') . '</td>
									<td>'.$datos['format_image'].'</td>
									<td>'.$datos['size_image'].'</td>
									<td class="text-center">');

							  							//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  			pluginIosSwitch('slider',$datos['id_image'],stripslashes($datos['title_image_lang']),$datos['s_image'],$obj_image_lang->getId_type_image(),$lang_global['Activar o desactivar']);

							  echo('</td>
									<td class="text-center">
										<a class="d-inline modal-with-zoom-anim modal-delete-with-image-5-parameters" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.stripslashes($datos['title_image_lang']).'" href="#modal-delete-with-image-5-parameters" data-delete-with-image-5-parameters="'.$datos['id_image'].'/'.$datos['id_image_lang'].'/'.stripslashes(str_replace("/", " ", $datos['title_image_lang'])).'/'.$obj_image_lang->getId_type_image().'/item-id_image-"><i class="fas fa-trash c-gris-oscuro" style="font-size:20px;"></i></a>
									</td>
								</tr>');

            		  	if(count($resultado) == $x){
            		  echo('</tbody>
						</table>');
            		  	}

            		  	$x++;
            		}else{
					  echo('<h3><span class="badge bg-dark">'.$lang_global['Sin imágenes registradas'].'</span></h3>');
						 }
            	}
			}else{
			  echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [showBasicSliderSettings description]
		 *
		 * @param  [type] $obj_lang       [description]
		 * @param  [type] $obj_image_lang [description]
		 * @return [type]                 [description]
		 */

		public static function showBasicSliderSettings($obj_lang,$obj_image_lang)
    	{
    		self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

      echo('<div class="card-body">');
				if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_image()))) && !empty(intval(trim($obj_lang->getId_lang())))){

					//CREAR OBJETO
					$ob_conectar 	= new conectorDB();

					$consulta 		= "CALL showInformationSliderByImageId(:id_image,:id_lang)";
					$valores 		= array('id_image' 	=> $obj_image_lang->getId_image(),
											'id_lang' 	=> $obj_lang->getId_lang());

            		$resultado   	= $ob_conectar->consultarBD($consulta,$valores);

					foreach($resultado as &$datos)
		            {
		            	if($datos['ERRNO'] == 1 || empty($datos['id_image_lang']) || empty($datos['title_image_lang']) || empty($datos['id_menu']))
		            	{
		            		echo('<h3><span class="badge bg-dark">'.$lang_global["Lo sentimos pero no se puede mostrar la información"].'</span></h3>');
		            	}else{
	          		 	  echo('<form id="updateInformationSlider" class="form-horizontal" data-id-lang="'.$obj_lang->getId_lang().'" data-update-form-ajax="'.$datos['id_image_lang'].'" autocomplete="off" novalidate="novalidate">
									<h3><span class="badge bg-dark">Información básica</span></h3>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="title_image_lang"><span class="required">*</span> '.$lang_global["Título"].'</label>
										<div class="col-lg-7 col-xl-6">
											<input type="text" id="title_image_lang" class="form-control" data-plugin-maxlength maxlength="70" name="title_image_lang" value="'.(!empty($datos['title_image_lang']) ? stripslashes($datos['title_image_lang']) : '').'" required />
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="subtitle_image_lang">'.$lang_global["Subtítulo"].'</label>
										<div class="col-lg-7 col-xl-6">
											<input type="text" id="subtitle_image_lang" class="form-control" data-plugin-maxlength maxlength="45" name="subtitle_image_lang" value="'.(!empty($datos['subtitle_image_lang']) ? stripslashes($datos['subtitle_image_lang']) : '').'" />
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="title_hyperlink_image_lang">'.$lang_global["Título botón link"].'</label>
										<div class="col-lg-7 col-xl-6 col-xxl-3">
											<input type="text" id="title_hyperlink_image_lang" class="form-control" data-plugin-maxlength maxlength="100" name="title_hyperlink_image_lang" value="'.(!empty($datos['title_hyperlink_image_lang']) ? stripslashes($datos['title_hyperlink_image_lang']) : '').'" placeholder="eje: Envíar" />
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 f-medium" for="link_image_lang">'.$lang_global["Link"].'</label>
										<div class="col-lg-7 col-xl-6">
											<input type="text" id="link_image_lang" class="form-control" data-plugin-maxlength maxlength="255" name="link_image_lang" value="'.(!empty($datos['link_image_lang']) ? stripslashes($datos['link_image_lang']) : '').'" placeholder="eje: https://www.dominio.com" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="description_small_image_lang">'.$lang_global["Descripción corta"].'</label>
										<div class="col-lg-7 col-xl-6">
											<textarea id="description_small_image_lang" class="form-control" data-plugin-maxlength maxlength="400" rows="7" name="description_small_image_lang">'.(!empty($datos['description_small_image_lang']) ? stripslashes($datos['description_small_image_lang']) : '').'</textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="description_large_image_lang">'.$lang_global["Descripción larga"].'</label>
										<div class="col-lg-7 col-xl-8">
											<textarea
												name="description_large_image_lang"
												id="description_large_image_lang"
												class="summernote"
												data-plugin-summernote>'.(!empty($datos['description_large_image_lang']) ? stripslashes($datos['description_large_image_lang']) : '').'</textarea>
										</div>
									</div>
									<hr style="border-style: dashed;"/>
									<h3><span class="badge bg-dark">Característica</span></h3>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="id_menu"><span class="required">*</span> '.$lang_global["Sección"].'</label>
										<div class="col-lg-7 col-xl-6">
											<select name="id_menu" id="id_menu" class="form-control populate" data-plugin-selectTwo required>
												<option value="">'.$lang_global["Seleccionar una opción"].'</option>');
													menuDao::showMenuList($datos['id_menu']);
										  echo('</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0" for="background_color_degraded_image_lang">'.$lang_global["Color de fondo degradado"].'</label>
										<div class="col-lg-7 col-xl-6">
											<textarea id="background_color_degraded_image_lang" class="form-control" rows="3" name="background_color_degraded_image_lang">'.$datos['background_color_degraded_image_lang'].'</textarea>
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_color_image_lang">'.$lang_global["Color de fondo"].'</label>
										<div class="col-lg-7 col-xl-6">
											<input type="color" id="background_color_image_lang" class="border-0 mt-1" name="background_color_image_lang" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="'.$datos['background_color_image_lang'].'" />
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_repeat_image_lang">'.$lang_global["Repetir fondo"].'</label>
										<div class="col-lg-7 col-xl-6">
											<select name="background_repeat_image_lang" id="background_repeat_image_lang" data-plugin-selectTwo class="form-control populate">');
												imageDao::showSelectedBGRList($datos['background_repeat_image_lang']);
									 echo ('</select>
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_position_image_lang" for="background_position_image_lang">'.$lang_global["Posición fondo"].'</label>
										<div class="col-lg-7 col-xl-6">
											<select name="background_position_image_lang" id="background_position_image_lang" data-plugin-selectTwo class="form-control populate">');
												imageDao::showSelectedBGRPList($datos['background_position_image_lang']);
									 echo ('</select>
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="background_size_image_lang" for="background_size_image_lang">'.$lang_global["Tamaño fondo"].'</label>
										<div class="col-lg-7 col-xl-6">
											<select name="background_size_image_lang" id="background_size_image_lang" data-plugin-selectTwo class="form-control populate">');
												imageDao::showSelectedBGSList($datos['background_size_image_lang']);
									 echo ('</select>
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="alt_image_lang">'.$lang_global["Alt imagen"].'</label>
										<div class="col-lg-7 col-xl-6">
											<input type="text" class="form-control" data-plugin-maxlength maxlength="100" name="alt_image_lang" id="alt_image_lang" value="'.$datos['alt_image_lang'].'">
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="width_image">'.$lang_global["Width"].'</label>
										<div class="col-lg-7 col-xl-3">
											<input type="text" class="form-control" data-plugin-maxlength maxlength="4" name="width_image" id="width_image" value="'.$datos['width_image'].'" placeholder="eje: 100">
										</div>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="height_image">'.$lang_global["Height"].'</label>
										<div class="col-lg-7 col-xl-3">
											<input type="text" class="form-control" data-plugin-maxlength maxlength="4" name="height_image" id="height_image" value="'.$datos['height_image'].'" placeholder="eje: 100">
										</div>
									</div>
									<div class="text-center mt-4">
										<button type="submit" class="btn btn-primary">'.$lang_global["Modificar"].'</button>
									</div>
								</form>');
		            	    }
		            }//END FOREACH
				}else{
						echo('<h5 class="f-medium c-negro text-center">'.$lang_global['Error en el proceso'].$lang_global["Variables vacías"].'</h5>');
					 }
	   echo('</div>');
		}

		/**
		 * [updateInformationSlider description]
		 *
		 * @param  [type] $obj_lang       [description]
		 * @param  [type] $obj_menu_lang  [description]
		 * @param  [type] $obj_image_lang [description]
		 * @return [type]                 [description]
		 */

		public static function updateInformationSlider($obj_lang,$obj_menu_lang,$obj_image_lang)
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty(intval(trim($obj_image_lang->getId_image_lang()))) && !empty(intval(trim($obj_menu_lang->getId_menu()))) && !empty($obj_image_lang->getTitle_image_lang()))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationSlider(:id_lang,:id_image_lang,:id_menu,:width_image,:height_image,:title_image_lang,:subtitle_image_lang,:description_small_image_lang,:description_large_image_lang,:title_hyperlink_image_lang,:link_image_lang,:alt_image_lang,:background_color_image_lang,:background_color_degraded_image_lang,:background_repeat_image_lang,:background_position_image_lang,:background_size_image_lang)";
	            $valores 		= array('id_lang' 								=> $obj_lang->getId_lang(),
	        							'id_image_lang' 						=> $obj_image_lang->getId_image_lang(),
	        							'id_menu' 								=> $obj_menu_lang->getId_menu(),
	        							'width_image' 							=> $obj_image_lang->getWidth_image(),
	        							'height_image' 							=> $obj_image_lang->getHeight_image(),
	        							'title_image_lang' 						=> $obj_image_lang->getTitle_image_lang(),
	        							'subtitle_image_lang' 					=> $obj_image_lang->getSubtitle_image_lang(),
	        							'description_small_image_lang' 			=> $obj_image_lang->getDescription_small_image_lang(),
	        							'description_large_image_lang' 			=> $obj_image_lang->getDescription_large_image_lang(),
	        							'title_hyperlink_image_lang' 			=> $obj_image_lang->getTitle_hyperlink_image_lang(),
	        							'link_image_lang' 						=> $obj_image_lang->getLink_image_lang(),
	        							'alt_image_lang' 						=> $obj_image_lang->getAlt_image_lang(),
	        							'background_color_image_lang' 			=> $obj_image_lang->getBackground_color_image_lang(),
	        							'background_color_degraded_image_lang' 	=> $obj_image_lang->getBackground_color_degraded_image_lang(),
	        							'background_repeat_image_lang' 			=> $obj_image_lang->getBackground_repeat_image_lang(),
	        							'background_position_image_lang' 		=> $obj_image_lang->getBackground_position_image_lang(),
	        							'background_size_image_lang' 			=> $obj_image_lang->getBackground_size_image_lang());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO'])
			 		{
			 			case 2:
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
			 				require_once(self::$file_record);

			 				$page 		 = imageDao::returnPageImage(6);
			 				$page_detail = $page.'-detail/'.$obj_image_lang->getId_image();

			 				//REGISTRO HISTORIAL
		 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Actualizo"],$lang_error["la información del slider"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);

		 					//MENSAJE EMERGENTE
		 					$valor = array("estado" => "true","resultado" => replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la información del slider"],"/PARA3/",$obj_image_lang->getTitle_image_lang(),$lang_error["Error 6"]),"page" => $page_detail);

                			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
			 			break;
			 			default:
			 				$valor = array("estado" => "false","error" => $lang_error["Error 11"].'(2)');
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
         * [showPictures description]
         *
         * @param  [type]  $obj_lang       [description]
         * @param  [type]  $obj_image_lang [description]
         * @param  integer $x              [description]
         * @param  integer $height_gallery [description]
         * @param  string  $route_default  [description]
         * @return [type]                  [description]
         */

        public static function showPictures($obj_lang,$obj_image_lang,$x = 1,$height_gallery = 0,$route_default	= "img/image_not_found_1240.jpg")
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty(intval(trim($obj_image_lang->getId_image()))) && !empty(intval(trim($obj_image_lang->getId_type_image())))){

				self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

    			if(self::$folder == FALSE || empty(self::$folder))
    			{
    				echo('<h3><span class="badge bg-dark">'.$lang_global['No hay ningún registro disponible'].'(2)</span></h3>');
    			}else{
    					self::$full_path 	= "../".self::$folder;

    					//CREAR OBJETO
						$ob_conectar 		= new conectorDB();

						$consulta 			= "CALL showMediaGalleryByImageId(:id_image,:id_lang)";
		            	$valores 			= array('id_image' 	=> $obj_image_lang->getId_image(),
		            								'id_lang' 	=> $obj_lang->getId_lang());

		            	$resultado 	 		= $ob_conectar->consultarBD($consulta,$valores);

		            	foreach($resultado as &$value)
			            {
			            	if($value['ERRNO'] == 2 && $value['TOTAL_IMAGES'] > 0 && !empty($value["id_image"]) && !empty($value["id_image_lang"]) && !empty($value["title_image_lang"]) && !empty($value["iso_code"]) && !empty($value["image_lang"]) && !empty($value["id_image_lang_version"]) && !empty($value["type_version_lang"]))
			            	{
			            		if($x == 1){
			          echo('<section class="content-with-menu content-with-menu-has-toolbar media-gallery specific">
								<div class="content-with-menu-container">
									<div class="inner-menu-toggle">
										<span class="inner-menu-expand" data-open="inner-menu"><i class="fas fa-chevron-right"></i></span>
									</div>

									<menu id="content-menu" class="inner-menu" role="menu">
										<div class="nano">
											<div class="nano-content">

												<div class="inner-menu-toggle-inside">
													<span class="inner-menu-collapse">
														<i class="fas fa-chevron-left hidden-xs-inline"></i>
													</span>
													<span class="inner-menu-expand" data-open="inner-menu">
														<i class="fas fa-chevron-down"></i>
													</span>
												</div>

												<div class="inner-menu-content">
													<div class="d-grid gap-1">
														<a class="modal-with-zoom-anim modal-upload-image-version btn btn-block btn-dark btn-md py-2 text-3" href="#modal-upload-image-version" data-upload-image-version="'.$value['id_image'].'/'.$value['id_image_lang'].'/'.$obj_lang->getId_lang().'/'.stripslashes(str_replace("/", " ", $value['title_image_lang'])).'"><i class="fas fa-upload me-2"></i>'.$lang_global['Subir versión'].'</a>
													</div>');

											  /*echo('<hr class="separator" />

													<div class="sidebar-widget m-0">
														<div class="widget-header clearfix">
															<h6 class="title float-start mt-1">'.$lang_global['Carpeta'].'</h6>
														</div>
														<div class="widget-content">
															<ul class="mg-folders">');
					  											imageDao::showAllFolders();
													  echo('</ul>
														</div>
													</div>');*/

										  echo('</div>
											</div>
										</div>
									</menu>
									<div class="inner-body mg-main mg-main-left">
										<div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-3 mg-files" data-sort-destination data-sort-id="media-gallery" data-id-lang="'.$obj_lang->getId_lang().'">');
			            		}

						              echo('<div id="box-media-gallery-'.$value["id_image_lang_version"].'" class="isotope-item document col">
												<div class="thumbnail">
													<div class="thumb-preview">
														<a class="thumb-image" href="');
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
									              			imageDao::returnImage($value['image_lang'],'',self::$full_path,0,$route_default,1,'',1);
									            		echo('">
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
									              			imageDao::returnImage($value['image_lang'],'',self::$full_path,400,$route_default,1,'',1);
									            		echo('" alt="'.stripslashes($value['title_image_lang']).'">
														</a>
														<div class="mg-thumb-options">
															<div class="mg-zoom"><i class="bx bx-search"></i></div>
															<div class="mg-toolbar">
																'.($value['s_main_image_lang_version'] == 1 ? '<div class="mg-option"><div class="mg-group pull-left">'.$lang_global['Portada'].'</div></div>' : '') . '
																<div class="mg-group float-end">
																	<!-- CAMBIAR IMAGEN -->
																	<a href="#modal-update-image" class="modal-with-zoom-anim modal-update-image" data-update-image="'.$value['id_image_lang_version'].'/'.stripslashes(str_replace("/", " ", $value['title_image_lang'])).'/'.$obj_lang->getId_lang().'">'.$lang_global['Cambiar imagen'].'</a>
																	<button class="dropdown-toggle mg-toggle" data-bs-toggle="dropdown"><span class="caret"></span></button>
																	<div class="dropdown-menu mg-dropdown" role="menu">
																		<!-- DESCARGAR IMAGEN -->
																		<a class="dropdown-item text-1" href="');
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
													  						imageDao::returnImage($value['image_lang'],'',self::$full_path,0,$route_default,1,'',1);

													  			 	echo('" download><i class="fas fa-download"></i> Download</a>');

													  			 	//$obj_image_lang->getId_type_image()
													  			 		//6 = Slider
													  			 	if($obj_image_lang->getId_type_image() == 6)
																  	{
																  		//s_main_image_lang_version
																  			//0 = General
																  			//1 = Portada
																  	  	if($value['s_main_image_lang_version'] == 0)
											  			 				{
																  echo('<!-- ELIMINAR IMAGEN -->
																  		<a class="modal-with-zoom-anim modal-delete-with-image-version-3-parameters dropdown-item text-1" href="#modal-delete-with-image-version-3-parameters" data-delete-with-image-version-3-parameters="'.$value['id_image_lang_version'].'/'.stripslashes(str_replace("/", " ", $value['title_image_lang'])).'/box-media-gallery-"><i class="fas fa-trash me-1"></i> '.$lang_global['Eliminar'].'</a>');
																		}
																	}

															  echo('</div>
																</div>
															</div>
														</div>
													</div>
													<h5 class="mg-title font-weight-semibold">'.$value['type_version_lang'].'<small> '.$value['format_image'].'</small></h5>
													<div class="mg-description">
														<small class="float-start text-muted">'.$lang_global['Tamaño'].': '.$value['size_image'].'</small>
														<small class="float-end text-muted">'.$value['last_update_image_lang'].'</small>
													</div>
												</div>
											</div>');

			            		if(count($resultado) == $x){
			            			$x = 1;
			            	  	  echo('</div>
									</div>
								</div>
							</section>');
			            		}

			            		$x++;
			            	}
			            }
    				 }
			}else{
					echo('<h3><span class="badge bg-dark">'.$lang_global['Error en el proceso'].$lang_global["Variables vacías"].'</span></h3>');
				 }
		}

		/**
		 * [showCarouselSliderByPage description]
		 *
		 * @param  [type]  $view                [description]
		 * @param  [type]  $div_js              [description]
		 * @param  [type]  $nameCarrousel       [description]
		 * @param  [type]  $color               [description]
		 * @param  [type]  $height              [description]
		 * @param  [type]  $fondo               [description]
		 * @param  [type]  $position_txt_slider [description]
		 * @param  [type]  $obj_lang            [description]
		 * @param  [type]  $obj_menu_lang       [description]
		 * @param  [type]  $obj_image_lang      [description]
		 * @param  integer $x                   [description]
		 * @param  integer $measure             [description]
		 * @param  string  $class_height        [description]
		 * @param  string  $route_default       [description]
		 * @return [type]                       [description]
		 */

		public static function showCarouselSliderByPage($view,$div_js,$nameCarrousel,$color,$height,$fondo,$position_txt_slider,$obj_lang,$obj_menu_lang,$obj_image_lang,$x = 0,$measure = 0,$class_height = "",$route_default = "img/image_not_found_1240.jpg")
   		{
			//NO ES OBLIGATORIO VALIDAR $obj_lang->getId_lang(), $nameCarrousel, $color, $class_height, $fondo YA QUE SU VALOR PUEDE SER 0 U OPCIONAL
			if(!empty($view) && !empty($div_js) && !empty($position_txt_slider) && !empty($obj_menu_lang->getId_menu()) && !empty($obj_image_lang->getId_type_image())){

				$id_lang 		= (empty($obj_lang->getId_lang()) ? langController::langIdLanguage() : $obj_lang->getId_lang());

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showInformationImageActiveByTypeImageIdAndSection(:id_type_image,:id_menu,:id_lang)";
				$valores  		= array('id_type_image' => $obj_image_lang->getId_type_image(),
										'id_menu' 		=> $obj_menu_lang->getId_menu(),
										'id_lang' 		=> $id_lang);

				$resultado 		= $ob_conectar->consultarBD($consulta,$valores);

				//$view
			        //$id
			           //1 = Inicio

				if($view == 1){
			  echo('<section id="main_banner">');
				}

		        foreach($resultado as &$datos)
		        {
		        	if($datos['ERRNO'] == 2 && $datos['TOTAL_SLIDER'] > 0 && !empty($datos['id_image_lang']) && !empty($datos['default_route_type_image']) && !empty($datos['image_lang'] && !empty($datos['format_image']))){

		        		self::$folder 	= $datos['default_route_type_image'];

		        		if($datos['format_image'] == 'image/svg+xml'){
							$class_height = 'height="667"';
						}else{
							$measure = 1920;
							 }

		        		//$div_js
		                    //1 = Carousel Bootstrap
		                    	//$nameCarrousel
		                    		//ID Carousel Bootstrap
		                    	//$color
		                    		//Hexadecimal dots
		                    //2 = Owl
		                    //3 = Col- Bootstrap
		                    //4 = Slick

		        		switch ($div_js) {
		        			case 1://Carousel Bootstrap
		        				if($x == 0){
		        			  echo('<div id="'.$nameCarrousel.'" class="carousel slide" data-bs-ride="carousel">');

		        			  											//$nameCarrousel,$color,$total_slider
		        						sliderDao::showCarouselIndicators($nameCarrousel,$color,count($resultado)-1);

								  echo('<div class="carousel-inner">');
		        				}
		        					  echo('<div id="carousel-item-'.$datos['id_image_lang'].'" class="carousel-item'.(!empty($height) ? ' '.$height : '').''.($x == 0 ? ' active' : '').'">');
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

										  echo('<img src="');
										  								//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
										  			imageDao::returnImage($datos['image_lang'],'',self::$folder,$measure,$route_default,1,'',1);
										  		echo('" class="w-100 h-100" alt="'.$datos['title_image_lang'].'">
										      	<div class="carousel-caption px-xxl-5 d-none d-md-block" data-animation="animated bounceIn delay-500 go">
										        	<h5 class="display-5 fw-bold">'.$datos['title_image_lang'].'</h5>
										        	'.(!empty($datos['description_small_image_lang']) || !empty($datos['description_large_image_lang']) ? (!empty($datos['description_small_image_lang']) ? '<p>'.$datos['description_small_image_lang'].'</p>' : (!empty($datos['description_large_image_lang']) ? $datos['description_large_image_lang'] : '')) : '').'
													'.(!empty($datos['title_hyperlink_image_lang']) && !empty($datos['link_image_lang']) ? '<a class="btn btn-primary" href="'.$datos['link_image_lang'].'" target="_blank" role="button">'.$datos['title_hyperlink_image_lang'].'</a>' : '').'

										        </div>
											</div>');

		        				if($x == (count($resultado)-1)){
		        				  echo('</div>
		        				  		<button class="carousel-control-prev" type="button" data-bs-target="#'.$nameCarrousel.'" data-bs-slide="prev">
										    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										    <span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#'.$nameCarrousel.'" data-bs-slide="next">
										    <span class="carousel-control-next-icon" aria-hidden="true"></span>
										    <span class="visually-hidden">Next</span>
										</button>
									</div>');
		        				}
		        				$x++;
		        			break;
		        			case 3://Col- Bootstrap
		        		  echo('<div id="item-'.$datos['id_image_lang'].'" class="col-md-6">');

	        			  	if(!empty($datos['link_image_lang'])){
	        			  	  echo('<a href="'.$datos['link_image_lang'].'" target="_blank">');
	        			  	}
			                      echo('<img src="');
																//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
			              					imageDao::returnImage($datos['image_lang'],'',self::$folder,$measure,$route_default,1,'',1);
			            			 	echo('" alt="'.$datos['title_image_lang'].'" class="img-fluid">');

			            	if(!empty($datos['link_image_lang'])){
    			  		  	  echo('</a>');
    			  			}
			              echo('</div>');
		        			break;
		        			case 4://Slick
		        		  		if($x == 0){
		        			  echo('<div class="slick slider">');
		        				}
		        												//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
		        					$img = imageDao::returnImage($datos['image_lang'],'',self::$folder,$measure,$route_default,2,'',1);

		        			  							//$id_image_lang,$id_lang,$default_route_type_image,$measure,$class_height,$link_image_lang,$title_image_lang,$img
		        					sliderDao::itemSlider($datos['id_image_lang'],$id_lang,$datos['default_route_type_image'],$measure,$class_height,$datos['link_image_lang'],$datos['title_image_lang'],$img);

				                if($x == (count($resultado)-1)){
		        				  echo('</div>');
		        				}
		        				$x++;
		        			break;
		        			default://Owl
		        				if($x == 0){
		        			  echo('<div class="owl-carousel owl-theme owl-carousel-slider">');
		        				}
		        												//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
		        					$img = imageDao::returnImage($datos['image_lang'],'',self::$folder,$measure,$route_default,2,'',1);

		        										//$id_image_lang,$id_lang,$default_route_type_image,$measure,$class_height,$link_image_lang,$title_image_lang,$img
		        					sliderDao::itemSlider($datos['id_image_lang'],$id_lang,$datos['default_route_type_image'],$measure,$class_height,$datos['link_image_lang'],$datos['title_image_lang'],$img);

				                if($x == (count($resultado)-1)){
		        				  echo('</div>');
		        				}
		        				$x++;
		        			break;
		        		}
		        	}
		        }

				if($view == 1){
			  echo('<!-- Smooth Scroll -->
					<div class="smooth-scroll position-absolute start-50 translate-middle">
						<a href="#our-products">
							<figure>
								<img
									src="'.(defined('URL') ? URL : URL_CARPETA_FRONT).'img/leaf-svgrepo-com.svg"
									data-src="'.(defined('URL') ? URL : URL_CARPETA_FRONT).'img/leaf-svgrepo-com.svg"
									data-sizes="auto"
									class="lazyload scrollDownAnim"
									width="30"
									height="30"
									alt="">
							</figure>
						</a>
					</div>
				</section>');
				}
			}
   		}

   		/**
   		 * [showCarouselIndicators description]
   		 *
   		 * @param  [type] $nameCarrousel [description]
   		 * @param  [type] $color         [description]
   		 * @param  [type] $total_slider  [description]
   		 * @return [type]                [description]
   		 */

   		private static function showCarouselIndicators($nameCarrousel,$color,$total_slider)
   		{
   			//NO ES NECESARIO VALIDAR $color YA QUE SU VALOR PUEDE SER OPCIONAL
   			if(!empty($nameCarrousel) && !empty($total_slider))
   			{
	   		  echo('<div class="carousel-indicators">');

				for ($i=0; $i <= $total_slider; $i++) {
					echo('<button type="button" data-bs-target="#'.$nameCarrousel.'" data-bs-slide-to="'.$i.'" '.($i == 0 ? ' class="active"' : '') . ' aria-current="true" aria-label="Slider '.$i.'"></button>');
				}

		   	  echo('</div>');
			}
   		}

   		/**
   		 * [itemSlider description]
   		 *
   		 * @param  [type] $id_image_lang            [description]
   		 * @param  [type] $id_lang                  [description]
   		 * @param  [type] $default_route_type_image [description]
   		 * @param  [type] $measure                  [description]
   		 * @param  [type] $class_height             [description]
   		 * @param  [type] $link_image_lang          [description]
   		 * @param  [type] $title_image_lang         [description]
   		 * @param  [type] $img                      [description]
   		 * @return [type]                           [description]
   		 */

   		private static function itemSlider($id_image_lang,$id_lang,$default_route_type_image,$measure,$class_height,$link_image_lang,$title_image_lang,$img)
   		{
   			//NO ES NECESARIO VALIDAR $measure, $class_height y $link_image_lang YA QUE SU VALOR PUEDE SER OPCIONAL
   			if(!empty($id_image_lang) && !empty($id_lang) && !empty($default_route_type_image) && !empty($title_image_lang) && !empty($img))
   			{
	   		  echo('<div id="item-'.$id_image_lang.'" class="item d-flex justify-content-center align-items-center">
					    <picture>');
			  												//$id_image_lang,$id_lang,$default_route_type_image,$measure,$class_height
			  				imageDao::showAllVersionsOfTheImageByImageLangId($id_image_lang,$id_lang,$default_route_type_image,$measure,$class_height);

			  				if(!empty($link_image_lang)){
			  		  echo('<a href="'.$link_image_lang.'" target="_blank">');
			  				}
	                      echo('<img src="'.$img.'" data-src="'.$img.'" alt="'.$title_image_lang.'" class="lazyload">');
	            	  if(!empty($link_image_lang)){
			  		  echo('</a>');
			  				}

                  echo('</picture>
                    </div>');
			}
   		}
   	}