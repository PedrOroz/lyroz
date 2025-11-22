<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_lang_presentation_lang.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_lang_presentation_image_lang.php");
	//PRODUCTOS
	require_once(dirname(__DIR__)."/models/productDao.php");

	class productPresentationDao
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

   		public static function uploadPresentationOfTheProduct($obj_product_lang,$obj_image_lang,$obj_lang,$obj_attribute_lang,$obj_product_lang_presentation_lang,$imageUpload = "",$return_boolean = "",$devuelve = "",$imageWithPrefixLang = "")
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty($obj_product_lang->getId_product()) && !empty($obj_product_lang->getId_product_lang()) && !empty($obj_image_lang->getId_type_image()) && !empty($obj_lang->getId_lang()) && !empty($obj_attribute_lang->getId_attribute()))
			{
				self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" 		=> "false",
									"error" 		=> $lang_error["Error 14"],
									"redireccionar" => "true");
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
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
								self::$file_help = dirname(__DIR__).'/helps/help.php';
								require_once(self::$file_help);

								self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
								require(self::$file_global);

								$file_type 				= explode("/", $obj_image_lang->getFile_type());
								$iso_code 				= langController::prefixLangByIdLang($obj_lang->getId_lang());

								if($file_type[0] != "video"){
									$imageWithPrefixLang = imageDao::renameImageLang($imageUpload,$iso_code);
								}else{
									$imageWithPrefixLang = $imageUpload;
									 }

								if(!empty($imageWithPrefixLang)){
									//CREAR OBJETO
									$ob_conectar 		= new conectorDB();

									$consulta1 			= "CALL registerProductLangPresentation(:id_type_image,:id_product_lang,:id_lang,:iso_code,:id_attribute,:file_type,:file_size,:image_lang,:general_price_product_lang_presentation,:general_stock_product_lang_presentation,:reference_product_lang_presentation,:meta_title_product_lang_presentation,:meta_description_product_lang_presentation,:meta_keywords_product_lang_presentation);";
									$valores1 			= array('id_type_image' 							=> $obj_image_lang->getId_type_image(),
																'id_product_lang' 							=> $obj_product_lang->getId_product_lang(),
																'id_lang' 									=> $obj_lang->getId_lang(),
																'iso_code' 									=> $iso_code,
																'id_attribute' 								=> $obj_attribute_lang->getId_attribute(),
																'file_type' 								=> $obj_image_lang->getFile_type(),
																'file_size' 								=> $obj_image_lang->getFile_size(),
																'image_lang' 								=> $imageWithPrefixLang,
																'general_price_product_lang_presentation' 	=> $obj_product_lang_presentation_lang->getGeneral_price_product_lang_presentation(),
																'general_stock_product_lang_presentation'	=> $obj_product_lang_presentation_lang->getGeneral_stock_product_lang_presentation_lang(),
																'reference_product_lang_presentation' 		=> $obj_product_lang_presentation_lang->getReference_product_lang_presentation_lang(),
																'meta_title_product_lang_presentation' 		=> $obj_product_lang_presentation_lang->getMeta_title_product_lang_presentation_lang(),
																'meta_description_product_lang_presentation'=> $obj_product_lang_presentation_lang->getMeta_description_product_lang_presentation_lang(),
																'meta_keywords_product_lang_presentation' 	=> $obj_product_lang_presentation_lang->getMeta_keywords_product_lang_presentation_lang());

									$resultado1 	 	= $ob_conectar->consultarBD($consulta1,$valores1);

									foreach($resultado1 as &$atributo1){
										switch ($atributo1['ERRNO']) {
											case 8://CORRECTO
												self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
												require_once(self::$file_record);

												$ob_conectar->registerRecordThreeParameters($_SESSION['id_user_dao'],$lang_error["Registro"],$lang_error["Presentación del producto"].' '.$iso_code.' '.$atributo1['ID_P_LA_PRE'],$obj_product_lang->getId_product_lang(),$lang_record["Historial 2"]);

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

												$valor = array("estado" 		=> "true",
															   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]),
															   "div_ajax" 		=> "false",
															   "redireccionar" 	=> "true");
												return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
												exit();
											break;
											default:
																			//$route,$file
												imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

												//$atributo1['ERRNO']
													//1 = EL ID TIPO DE IMAGEN ES INCORRECTO
													//2 = EL ID PRODUCTO LANG ES INCORRECTO
													//3 = EL ID LANG ES INCORRECTO
													//4 = EL ID ATRIBUTO YA SE ENCUENTRA ASOCIADO CON EL PRODUCTO
													//5 = EL ID PRODUCTO PRESENTACION NO EXISTE
													//6 = EL ID IMAGEN NO EXISTE
													//7 = EL ID IMAGEN LANG NO EXISTE
												$devuelve = ($atributo1['ERRNO'] == 4 ? $lang_error["El atributo ya se encuentra asociado al producto. intente con otro."] : $lang_error["Error 11"]."(".$atributo1['ERRNO'].")");

												$valor = array("estado" 		=> "false",
															   "error" 			=> $devuelve,
															   "div_ajax" 		=> "false",
															   "redireccionar" 	=> "true");
												return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
												exit();
											break;
										}
									}//End FOREACH registerProductLangPresentation
								}else{
																	//$route,$file
										imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										$valor = array("estado" 		=> "false",
													   "error" 			=> $lang_error["Variables vacías"]."(1)",
													   "div_ajax" 		=> "false",
													   "redireccionar" 	=> "true");
										return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
										exit();
										}//END if(!empty($imageWithPrefixLang))
							}else{
									$valor = array("estado" 		=> "false",
												   "error" 			=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(4)",
												   "redireccionar" 	=> "true");
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
									}//END if(!empty($imageUpload))
						}else{
								$return_error = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error = $lang_error['Error en el proceso'].$lang_error["Error 1"]."(3)";
								}

								$valor = array("estado" 		=> "false",
											   "error" 			=> $return_error,
											   "redireccionar" 	=> "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//return_boolean
						}
			}else{
					$valor = array("estado" 		=> "false",
								   "error" 			=> $lang_error['Error en el proceso'].$lang_error["Variables no creadas"],
								   "redireccionar" 	=> "true");
                	return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                	exit();
				 }
        }

		public static function showProductGalleryPresentation($id_type_image,$id_product,$id_product_lang,$symbol_type_of_currency_lang,$id_lang,$route_default	= "img/image_not_found_580.jpg",$measure = 95,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty($id_type_image) && !empty($id_product_lang) && !empty($id_lang))
			{
				self::$file_core = dirname(__DIR__).'../../../core/core.php';
				require_once(self::$file_core);

				self::$folder  	= imageDao::showFolderByIdTypeImage($id_type_image);

				if(self::$folder == FALSE || empty(self::$folder))
				{
					self::$full_path	= "";
				}else{
					self::$full_path 	= "../".self::$folder;
					 }

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showProductGalleryPresentation(:id_product_lang,:id_lang);";
				$valores 		= array('id_product_lang' 	=> $id_product_lang,
      									'id_lang' 			=> $id_lang);

				$resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

				foreach($resultado as &$datos)
				{
					if($datos['ERRNO'] == 2 && $datos['TOTAL_PRODUCT_GALLERY_PRE'] > 0 && !empty($datos['id_image']) && !empty($datos['id_image_lang']) && !empty($datos['id_image_lang_version']) && !empty($datos['id_product_lang_presentation_image_lang']) && !empty($datos['id_product_lang_presentation']) && !empty($datos['image_lang']) && !empty($datos['title_image_lang']) && !empty($datos['id_product_lang_presentation_lang']) && !empty($datos['format_image']))
					{
						$file_type = explode("/", $datos['format_image']);

						if(!empty($file_type[0]) && $file_type[0] == "video"){
							$route_default		= "img/video_not_found_142.jpg";
							$measure 			= 0;
						}

						$id_image 											= $datos['id_image'];
						$id_image_lang 										= $datos['id_image_lang'];
						$id_image_lang_version 								= $datos['id_image_lang_version'];
						$id_product_lang_presentation_image_lang 			= $datos['id_product_lang_presentation_image_lang'];
						$id_product_lang_presentation 						= $datos['id_product_lang_presentation'];
						$image_lang 										= $datos['image_lang'];
						$title_image_lang 									= $datos['title_image_lang'];
						$id_product_lang_presentation_lang 					= $datos['id_product_lang_presentation_lang'];

						if(!empty($id_image) && !empty($id_image_lang) && !empty($id_image_lang_version) && !empty($id_product_lang_presentation_image_lang) && !empty($id_product_lang_presentation) && !empty($image_lang) && !empty($title_image_lang) && !empty($id_product_lang_presentation_lang))
						{
							$general_price_product_lang_presentation_lang 		= number_format($datos['general_price_product_lang_presentation_lang'],2);
							$general_stock_product_lang_presentation_lang 		= $datos['general_stock_product_lang_presentation_lang'];
							$reference_product_lang_presentation_lang 			= $datos['reference_product_lang_presentation_lang'];
							$meta_title_product_lang_presentation_lang 			= $datos['meta_title_product_lang_presentation_lang'];
							$meta_description_product_lang_presentation_lang 	= $datos['meta_description_product_lang_presentation_lang'];
							$meta_keywords_product_lang_presentation_lang 		= $datos['meta_keywords_product_lang_presentation_lang'];

							//$type_iso
								//'' = Sin prefijo idioma
								//iso_code (ESP, ENG)
							//$type_return
								//1 = echo
								//2 = return

										//$id_product,$id_product_lang,$id_lang,$id_product_lang_presentation,$id_product_lang_presentation_lang,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$id_image,$id_image_lang,$image_lang,$type_iso,$title_image_lang,$id_image_lang_version,$s_main_image_lang_version,$dirname,$full_path,$measure,$route_default,$size_image,$format_image,$s_thumbnail_product_lang_presentation_image_lang,$s_main_product_lang_presentation_image_lang,$id_product_lang_presentation_image_lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4,$lang_global_5,$lang_global_6,$lang_global_7,$lang_global_8,$lang_global_9,$lang_global_10,$lang_global_11,$lang_global_12,$lang_global_13,$lang_global_14,$lang_global_15,$lang_global_16,$lang_global_17,$lang_global_18,$lang_global_19,$lang_global_20,$lang_global_21,$lang_global_22,$lang_global_23,$lang_global_24,$lang_global_25,$lang_global_26,$lang_global_27,$lang_global_28,$lang_global_29,$id_type_image,$symbol_type_of_currency_lang,$type_return,$url
							productPresentationDao::boxMediaProductGalleryPresentation($id_product,$id_product_lang,$id_lang,$id_product_lang_presentation,$id_product_lang_presentation_lang,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$id_image,$id_image_lang,$image_lang,'',$title_image_lang,$id_image_lang_version,$datos['s_main_image_lang_version'],'',self::$full_path,530,$route_default,$datos['size_image'],$datos['format_image'],$datos['s_thumbnail_product_lang_presentation_image_lang'],$datos['s_main_product_lang_presentation_image_lang'],$id_product_lang_presentation_image_lang,$lang_global['Portada'],$lang_global['Thumbnail'],$lang_global['Modificar imagen'],$lang_global['Descargar'],$lang_global['Dejar como portada'],$lang_global['Subir versión'],$lang_global['Modificar información'],$lang_global['Eliminar'],$lang_global['Versiones'],$lang_global['Atributo padre'],$lang_global['Info atributo padre'],$lang_global['Precio'],$lang_global['Sin IVA'],$lang_global['Tu precio para este producto'],$lang_global['Ejemplo'],$lang_global['Cantidad'],$lang_global['Tu cantidad para este producto'],$lang_global['Referencia'],$lang_global['Tu código de referencia para este producto'],$lang_global['Optimización motores de búsqueda (SEO)'],$lang_global['Meta-título'],$lang_global['Tu meta titulo'],$lang_global['Meta descripción'],$lang_global['Tu meta descripción'],$lang_global['Meta palabras clave'],$lang_global['Tu meta keywords'],$lang_global['Modificar'],$lang_global['Subir archivos'],$lang_global['Archivos'],$id_type_image,$symbol_type_of_currency_lang,1,URL);
						}
					}
				}

			}
		}

		public static function boxMediaProductGalleryPresentation($id_product,$id_product_lang,$id_lang,$id_product_lang_presentation,$id_product_lang_presentation_lang,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$id_image,$id_image_lang,$image_lang,$type_iso,$title_image_lang,$id_image_lang_version,$s_main_image_lang_version,$dirname,$full_path,$measure,$route_default,$size_image,$format_image,$s_thumbnail_product_lang_presentation_image_lang,$s_main_product_lang_presentation_image_lang,$id_product_lang_presentation_image_lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4,$lang_global_5,$lang_global_6,$lang_global_7,$lang_global_8,$lang_global_9,$lang_global_10,$lang_global_11,$lang_global_12,$lang_global_13,$lang_global_14,$lang_global_15,$lang_global_16,$lang_global_17,$lang_global_18,$lang_global_19,$lang_global_20,$lang_global_21,$lang_global_22,$lang_global_23,$lang_global_24,$lang_global_25,$lang_global_26,$lang_global_27,$lang_global_28,$lang_global_29,$id_type_image,$symbol_type_of_currency_lang,$type_return,$url)
		{
			$type 		= ($s_main_product_lang_presentation_image_lang == 1 ? $lang_global_1 : $lang_global_2);
			$file_type 	= explode("/", $format_image);

	$box_media_product_gallery_presentation = '<div id="isotope-id-'.$id_product_lang_presentation.'" class="isotope-item document col-sm-6">
										<div class="thumbnail">
											<div class="thumb-preview">';

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
	$box_media_product_gallery_presentation .= '<a class="thumb-image" href="'.imageDao::returnImage($image_lang,$dirname,$full_path,95,$route_default,2,$type_iso,1).'">
													<img src="'.imageDao::returnImage($image_lang,$dirname,$full_path,530,$route_default,2,$type_iso,1).'" class="img-fluid" alt="'.$title_image_lang.'">
												</a>
												<div class="mg-thumb-options">
													<div class="mg-zoom"><i class="bx bx-search"></i></div>
													<div class="mg-toolbar">
														<div class="mg-option d-inline">
															<span class="">'.$type.'</span>
														</div>
														<div class="mg-group float-end">
															<a href="#modal-update-image" class="modal-with-zoom-anim modal-update-image" data-update-image="'.$id_image_lang_version.'/'.$title_image_lang.'/'.$id_lang.'">'.$lang_global_3.'</a>
															<button class="dropdown-toggle mg-toggle" data-bs-toggle="dropdown"><span class="caret"></span></button>
															<div class="dropdown-menu mg-dropdown" role="menu">';

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
					$box_media_product_gallery_presentation .= '<a class="dropdown-item text-1" href="'.imageDao::returnImage($image_lang,$dirname,$full_path,$measure,$route_default,2,$type_iso,1).'" download><i class="fas fa-download"></i> '.$lang_global_4.'</a>';

					if($s_main_product_lang_presentation_image_lang == 0){
					$box_media_product_gallery_presentation .= '<span style="cursor:pointer;" class="dropdown-item text-1 leave-as-main-presentation-product" data-main-presentation-product="'.$id_product_lang_presentation_image_lang.'"><i class="fas fa-image"></i> '.$lang_global_5.'</span>';
									  										}
					$box_media_product_gallery_presentation .= '<a class="dropdown-item text-1 modal-with-zoom-anim modal-upload-image-version" href="#modal-upload-image-version" data-upload-image-version="'.$id_image.'/'.$id_image_lang.'/'.$id_lang.'/'.$title_image_lang.'"><i class="fas fa-upload"></i> '.$lang_global_6.'</a>
																<span class="dropdown-item text-1 delete-product-lang-presentation" data-delete-product-lang-presentation="'.$id_product_lang_presentation.'/'.$title_image_lang.'" style="cursor:pointer;"><i class="far fa-trash-alt"></i> '.$lang_global_8.'</span>
															</div>
														</div>
													</div>
												</div>
											</div>';

					//INFORMACION DE LA PRESENTACION DEL PRODUCTO

							//$id_product_lang_presentation,$id_lang,$id_product_lang_presentation_lang,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$format_image,$symbol_type_of_currency_lang,$lang_global_7,$lang_global_10,$lang_global_11,$lang_global_12,$lang_global_13,$lang_global_14,$lang_global_15,$lang_global_16,$lang_global_17,$lang_global_18,$lang_global_19,$lang_global_20,$lang_global_21,$lang_global_22,$lang_global_23,$lang_global_24,$lang_global_25,$lang_global_26,$lang_global_27
	$box_media_product_gallery_presentation .= productPresentationDao::showAttributeByProductLangPresentationId($id_product_lang_presentation,$id_lang,$id_product_lang_presentation_lang,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$format_image,$symbol_type_of_currency_lang,$lang_global_7,$lang_global_8,$lang_global_10,$lang_global_11,$lang_global_12,$lang_global_13,$lang_global_14,$lang_global_15,$lang_global_16,$lang_global_17,$lang_global_18,$lang_global_19,$lang_global_20,$lang_global_21,$lang_global_22,$lang_global_23,$lang_global_24,$lang_global_25,$lang_global_26,$lang_global_27);

					//VERSIONES

					//$id_image,$id_image_lang,$id_product_lang_presentation_lang,$id_lang,$id_type_image,$title_image_lang,$lang_global_3,$lang_global_6,$lang_global_9,$lang_global_8,$lang_global_27
//$box_media_product_gallery_presentation .= productPresentationDao::showAllVersionsOfTheProductPresentationByImageLangId($id_image,$id_image_lang,$id_product_lang_presentation_lang,$id_lang,$id_type_image,$title_image_lang,$lang_global_3,$lang_global_6,$lang_global_9,$lang_global_8,$lang_global_27);

					//ARCHIVOS

//$box_media_product_gallery_presentation .= productPresentationDao::showAllProductFilesPresentationByImageLangId($id_product_lang_presentation_lang,$id_type_image,$title_image_lang,$lang_global_4,$lang_global_8,$lang_global_28,$lang_global_29);

	$box_media_product_gallery_presentation .= '</div>
											</div>';

			//$type_return
				//1 = echo
				//2 = return
			if($type_return == 1){
				echo $box_media_product_gallery_presentation;
			}else{
				return $box_media_product_gallery_presentation;
				 }
		}

		private static function showAttributeByProductLangPresentationId($id_product_lang_presentation,$id_lang,$id_product_lang_presentation_lang,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$format_image,$symbol_type_of_currency_lang,$lang_global_7,$lang_global_8,$lang_global_10,$lang_global_11,$lang_global_12,$lang_global_13,$lang_global_14,$lang_global_15,$lang_global_16,$lang_global_17,$lang_global_18,$lang_global_19,$lang_global_20,$lang_global_21,$lang_global_22,$lang_global_23,$lang_global_24,$lang_global_25,$lang_global_26,$lang_global_27)
        {
        	//CREAR OBJETO
			$ob_conectar = new conectorDB();

			$consulta    = "CALL showAttributeByProductLangPresentationId(:id_product_lang_presentation,:id_lang);";
			$valores     = array('id_product_lang_presentation' => $id_product_lang_presentation,
	        					 'id_lang' 						=> $id_lang);

            $resultado   = $ob_conectar->consultarBD($consulta,$valores);

            foreach($resultado as &$atributo){
            	switch ($atributo['ERRNO']) {
            		case 2://CORRECTO
  $title_attribute_lang  = '<div class="mg-description">
  								<h5 class="mg-title font-weight-semibold mb-0">'.$atributo['title_attribute_lang'].'<small> '.$format_image.'</small></h5>
  							</div>
							<div class="toggle toggle-tertiary toggle-sm mb-0" data-plugin-toggle>
								<section class="toggle">
									<label>'.$lang_global_7.'</label>
									<div id="toggle-info-'.$id_product_lang_presentation_lang.'" class="toggle-content pt-3 pb-3">
										<div class="form-group">
											<label class="f-medium c-negro" for="id_attribute_upd"><span class="required">*</span> '.$lang_global_10.' <button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global_11.'" ><i class="fas fa-question" style="font-size: 9px;"></i></button>
											</label>
											<select data-plugin-selectTwo class="form-control populate" name="id_attribute_upd" id="id_attribute-'.$id_product_lang_presentation_lang.'">';

											//$type_action
												//0 = NO ES OBLIGATORIO EL ID
													//0 = NULLO
												//1 = ES OBLIGATORIO EL ID
													//$id_attribute

					  	  					$topAttributesArray =  attributeDao::showBaseAttributes();

					  	  												//$data,$type_action,$id_table
					$title_attribute_lang  .= attributeDao::selectTree($topAttributesArray,1,$atributo['id_attribute']);

			     $title_attribute_lang  .= '</select>
										</div>
										<div class="form-group">
											<label class="f-medium c-negro" for="general_price_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'">'.$lang_global_12.' ('.$lang_global_13.')</label>
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">'.$symbol_type_of_currency_lang.'</span>
												</span>
												<input  type="text" class="form-control" name="general_price_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" id="general_price_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" autocomplete="off" data-original-title="'.$lang_global_14.'" value="'.$general_price_product_lang_presentation_lang.'" placeholder="'.$lang_global_15.': 42.00" onkeypress="return NumCheck(event, this)">
											</div>
										</div>
										<div class="form-group">
											<label class="f-medium c-negro" for="general_stock_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'">'.$lang_global_16.'</label>
											<input type="text"  class="form-control" name="general_stock_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" id="general_stock_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" value="'.$general_stock_product_lang_presentation_lang.'" autocomplete="off" data-original-title="'.$lang_global_17.'" onkeypress="return soloNumerosSinPunto(event)">
										</div>
										<div class="form-group">
											<label class="f-medium c-negro" for="reference_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'">'.$lang_global_18.'</label>
											<input type="text"  data-plugin-maxlength maxlength="40" class="form-control" name="reference_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" id="reference_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" value="'.$reference_product_lang_presentation_lang.'" autocomplete="off" data-original-title="'.$lang_global_19.'">
										</div>
										<h5 class="c-negro f-medium mt-4 mb-4">'.$lang_global_20.'</h5>
										<div class="form-group">
											<label class="f-medium c-negro" for="meta_title_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'">'.$lang_global_21.'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global_22.'" ><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fab fa-google"></i>
													</span>
												</span>
												<input type="text" data-plugin-maxlength maxlength="128" class="form-control" name="meta_title_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" id="meta_title_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" value="'.$meta_title_product_lang_presentation_lang.'" autocomplete="off">
											</div>
										</div>
										<div class="form-group">
											<label class="f-medium c-negro" for="meta_description_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'">'.$lang_global_23.'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global_24.'" ><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
											<textarea data-plugin-maxlength maxlength="255" id="meta_description_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" class="form-control" rows="4" name="meta_description_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" style="border-radius: 0;">'.$meta_description_product_lang_presentation_lang.'</textarea>
										</div>
										<div class="form-group">
											<label class="f-medium c-negro" for="meta_keywords_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'">'.$lang_global_25.'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global_26.'" ><i class="fas fa-question" style="font-size: 9px;"></i></button>
											</label>
											<input type="text" data-plugin-maxlength maxlength="500" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" name="meta_keywords_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" id="meta_keywords_product_lang_presentation_lang-'.$id_product_lang_presentation_lang.'" value="'.$meta_keywords_product_lang_presentation_lang.'" autocomplete="off">
										</div>
										<div class="form-group mt-4">
											<button type="submit" class="btn btn-xs btn-primary btn-upd-info-product-presentation" data-id-product-lang-presentation-lang="'.$id_product_lang_presentation_lang.'">'.$lang_global_27.'</button>
										</div>
										<hr>
		  	  						</div>
								</section>
							</div>';

            			return $title_attribute_lang;
            		break;
            	}
            }
        }

		public static function leaveAsMainPresentationProduct($obj_product_lang_presentation_image_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_product_lang_presentation_image_lang->getId_product_lang_presentation_image_lang())){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta      	= "CALL leaveAsMainPresentationProduct(:id_product_lang_presentation_image_lang);";
				$valores		= array('id_product_lang_presentation_image_lang' => $obj_product_lang_presentation_image_lang->getId_product_lang_presentation_image_lang());

				$resultado     	= $ob_conectar->consultarBD($consulta,$valores);

				foreach($resultado as &$atributo){
					switch ($atributo['ERRNO']) {
						case 2://CORRECTO
							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							$valor = array("estado" 	=> "true",
										   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Elemento"],"/PARA2/",$lang_error["actualizado"],$lang_error["Error 9"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
						default:
							$valor = array("estado" => "false",
										   "error" 	=> $lang_error["Error 11"]);
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
					}
				}
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}
	}