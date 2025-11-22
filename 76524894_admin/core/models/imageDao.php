<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/image_lang_version.php");

	class imageDao
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
        private static      $sqlCall            = "";
        private static      $sqlCall2           = "";
        private static      $sqlCall3           = "";

		public function __construct(){
			date_default_timezone_set((defined('TIMEZONE_CMS') ? TIMEZONE_CMS : TIMEZONE_FRONT));
	    }

	    public function __destruct(){
	    }

	    public function __clone(){
   			trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
   		}

   		/**
   		 * [returnImage description]
   		 *
   		 * @param  [type] $image                       [description]
   		 * @param  [type] $dirname                     [description]
   		 * @param  [type] $folder                      [description]
   		 * @param  [type] $measure                     [description]
   		 * @param  [type] $route_default               [description]
   		 * @param  [type] $type_return                 [description]
   		 * @param  [type] $type_iso                    [description]
   		 * @param  [type] $view                        [description]
   		 * @param  string $thumb                       [description]
   		 * @param  string $image_with_specific_measure [description]
   		 * @param  string $src                         [description]
   		 * @return [type]                              [description]
   		 */

	    public static function returnImage($image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view,$thumb="",$image_with_specific_measure="",$src="")
	    {
	    	//NO ES NECESARIO VALIDAR $dirname, $measure E $iso YA QUE SU VALOR PUEDE SER 0
	    	if(!empty($image) && !empty($folder) && !empty($route_default) && !empty(intval(trim($type_return))) && !empty(intval(trim($view)))){

	    		self::$file_core 	= dirname(__DIR__).'../../core/core.php';
				require_once(self::$file_core);

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

				switch ($measure) {
					case 0://Sin medida especifica
						$thumb      					= $folder."/".$image;
					break;
					default:
																								//$image,$measure,$type_iso
						$image_with_specific_measure 	= imageDao::showImageWithSpecificMeasure($image,$measure,$type_iso);
		                $thumb      					= $folder."/".$image_with_specific_measure;
					break;
				}

				$route_thumb        = imageDao::validateIftExistImg($dirname,$thumb,$route_default);

		        $route_thumb_local 	= str_replace("../../../../../", "", $route_thumb);
		        $route_thumb_local 	= str_replace("../../../../", "", $route_thumb);
		        $route_thumb_local 	= str_replace("../../../", "", $route_thumb);
		        $route_thumb_local 	= str_replace("../../", "", $route_thumb);
		        $route_thumb_local 	= str_replace("../", "", $route_thumb);

		        $src = ($view == 1 ? URL_CARPETA_FRONT : URL_CARPETA_ADMIN.'/').$route_thumb_local;

				if($type_return == 1){
					echo($src);
				}else{
					return $src;
					 }
	    	}
	    }

	    /**
	     * [showImageWithSpecificMeasure description]
	     *
	     * @param  [type] $image    [description]
	     * @param  [type] $measure  [description]
	     * @param  [type] $type_iso [description]
	     * @return [type]           [description]
	     */

	    public static function showImageWithSpecificMeasure($image,$measure,$type_iso)
	    {
	    	//NO ES NECESARIO VALIDAR $measure Y $type_iso YA QUE SU VALOR PUEDE SER 0
	    	if(!empty($image)){
	    		$infoImageItem      = pathInfo($image);
		        $extImageItem       = $infoImageItem["extension"];
		        $nameImageItem      = $infoImageItem["filename"];

		        //$measure
					//0 = Sin medida
				//$type_iso
					//'' = Sin prefijo idioma
					//iso_code (ESP, ENG)

	    		if($measure == 0){
	    			return $nameImageItem.".".$extImageItem;
	    		}else{
	    				if(empty($type_iso)){
	    					return $nameImageItem."_".$measure.".".$extImageItem;
	    				}else{
	    						return $nameImageItem."_".$type_iso."_".$measure.".".$extImageItem;
	    					 }
	    			 }
	    	}
	    }

	    /**
	     * [validateIftExistImg description]
	     *
	     * @param  [type] $dirname       [description]
	     * @param  [type] $thumb         [description]
	     * @param  [type] $route_default [description]
	     * @return [type]                [description]
	     */

	    public static function validateIftExistImg($dirname,$thumb,$route_default)
	    {
	    	//NO ES NECESARIO VALIDAR $dirname YA QUE SU VALOR PUEDE SER 0
	    	if(!empty($thumb) && !empty($route_default)){
	    		if(file_exists($dirname.$thumb))
		        {
		            return $thumb;
		        }else{
		            return $dirname.$route_default;
		             }
	    	}
	    }

	    /**
   		 * [showFolderByIdTypeImage description]
   		 *
   		 * @param  [type] $id_type_image [description]
   		 * @return [type]                [description]
   		 */

   		public static function showFolderByIdTypeImage($id_type_image)
	    {
        	if(!empty(intval(trim($id_type_image))))
        	{
        		//CREAR OBJETO
	            $ob_conectar    				= new conectorDB();

	            $consulta_folder_type_image 	= "CALL showFolderByIdTypeImage(:id_type_image)";
				$valores_folder_type_image 		= array('id_type_image' => $id_type_image);

	            $resultadoFTI 					= $ob_conectar->consultarBD($consulta_folder_type_image,$valores_folder_type_image);

	            foreach($resultadoFTI as &$atributoFTI)
	            {
	                if($atributoFTI['ERRNO'] == 1)
	                {
	                    return false;
	                }else{
	                        return $atributoFTI['default_route_type_image'];
	                     }
	            }
        	}
	    }

	    /**
	     * [validateAjaxFileParameters description]
	     *
	     * @param  [type] $obj_image_lang [description]
	     * @param  [type] $folder         [description]
	     * @param  [type] $allowed_format [description]
	     * @param  [type] $allowed_size   [description]
	     * @return [type]                 [description]
	     */

	    public static function validateAjaxFileParameters($obj_image_lang,$folder,$allowed_format,$allowed_size)
		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require(self::$file_error);

			if(!empty($obj_image_lang->getFile_tmp_name()) && !empty($obj_image_lang->getFile_type()) && !empty($obj_image_lang->getFile_name()) && !empty($folder) && !empty($allowed_format) && !empty($allowed_size)){

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

				if(imageDao::validateErrorsFileAjax($obj_image_lang->getFile_error()) == TRUE)
				{
					if(imageDao::validateFolderExist($folder) == TRUE)
					{
						if(imageDao::validateIsUploadedFile($obj_image_lang->getFile_tmp_name()) == TRUE)
						{
							if(imageDao::validateFormatImage($obj_image_lang->getFile_type(),$allowed_format) == TRUE)
							{
								if(imageDao::validateSizeImage($obj_image_lang->getFile_size(),$allowed_size) == TRUE)
								{
									if(imageDao::finalRoute($folder,$obj_image_lang->getFile_name()) == FALSE)
									{
										return array(FALSE,$lang_error["Error 19"]."(1)");
									}else{
											$resultadoP1 				= imageDao::finalRoute($folder,$obj_image_lang->getFile_name());

											$resultado_por_comas1       = implode(",", $resultadoP1);
			                    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

			                    			$fullRoute        			= $resultados_individuales1[0];
			                    			$randomName        			= $resultados_individuales1[1];

											if(empty($fullRoute) || empty($randomName))
											{
												return array(FALSE,$lang_error["Error 1"]);
											}else{
													if(imageDao::moveUploadedFile($obj_image_lang->getFile_tmp_name(),$fullRoute) == TRUE)
													{
														return array(TRUE,$randomName);
													}else{
														return array(FALSE,$lang_error["Error 19"]."(2)");
														 }
												 }

												 echo $randomName;
										 }
								}else{
										self::$file_help 	= dirname(__DIR__).'/helps/help.php';
										require_once(self::$file_help);

										return array(FALSE,replaceStringOneParameterArray("/PARA1/",$allowed_size,$lang_error["Error 32"]));
									 }
							}else{
									return array(FALSE,$lang_error["Error 21"]);
								 }
						}else{
								return array(FALSE,$lang_error["Error 22"]);
							 }
					}else{
							return array(FALSE,$lang_error["Error 19"]."(3)");
						 }
				}else{
						return array(FALSE,imageDao::validateErrorsFileAjax($obj_image_lang->getFile_error()));
					 }
			}else{
					return array(FALSE,$lang_error["Error 1"]."(1)");
				 }
		}

		/**
		 * [validateErrorsFileAjax description]
		 *
		 * @param  [type] $file_error [description]
		 * @param  array  $errors     [description]
		 * @return [type]             [description]
		 */

		private static function validateErrorsFileAjax($file_error,$errors = array())
		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require(self::$file_error);

			if($file_error > 0)
            {
            	switch ($file_error)
	            {
	            	case 1://UPLOAD_ERR_INI_SIZE
	                    $errors[] = $lang_error["Error 15"];
	                    break;
	                case 2://UPLOAD_ERR_FORM_SIZE
	                    $errors[] = $lang_error["Error 16"];
	                    break;
	                case 3://UPLOAD_ERR_PARTIAL
	                    $errors[] = $lang_error["Error 17"];
	                    break;
	                case 4://UPLOAD_ERR_NO_FILE
	                    $errors[] = $lang_error["Error 18"];
	                    break;
	                case 6://UPLOAD_ERR_NO_TMP_DIR
	                    $errors[] = $lang_error["Error 19"];
	                    break;
	                case 7://UPLOAD_ERR_CANT_WRITE
	                    $errors[] = $lang_error["Error 20"];
	                    break;
	                case 8://UPLOAD_ERR_EXTENSION
	                    $errors[] = $lang_error["Error 33"];
	                    break;
	                default:
	                	$errors[] = $lang_error["Error 34"];
	                    break;
	            }

            	return implode('<br>', $errors);
            }else{
            		//0 = UPLOAD_ERR_OK (NO HAY ERRORES)
            		return TRUE;
            	 }
		}

		/**
		 * [validateFolderExist description]
		 *
		 * @param  [type] $folder [description]
		 * @return [type]         [description]
		 */

		private static function validateFolderExist($folder)
		{
			if(!empty($folder)){
				//if(file_exists($folder))
				if(!is_dir($folder)){
				    mkdir($folder, 0777, true);
				}
				return TRUE;
			}else{
					return FALSE;
				 }
		}

		/**
		 * [validateIsUploadedFile description]
		 *
		 * @param  [type] $file_tmp_name [description]
		 * @return [type]                [description]
		 */

		private static function validateIsUploadedFile($file_tmp_name)
		{
			if(!empty($file_tmp_name)){

				if(is_uploaded_file($file_tmp_name))
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
		 * [validateFormatImage description]
		 *
		 * @param  [type] $file_type      [description]
		 * @param  [type] $allowed_format [description]
		 * @return [type]                 [description]
		 */

		private static function validateFormatImage($file_type,$allowed_format)
		{
			if(!empty($file_type) && !empty($allowed_format)){
	            if(in_array($file_type,$allowed_format))
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
		 * [validateSizeImage description]
		 *
		 * @param  [type] $file_size    [description]
		 * @param  [type] $allowed_size [description]
		 * @return [type]               [description]
		 */

		private static function validateSizeImage($file_size,$allowed_size)
		{
			if(!empty($file_size) && !empty($allowed_size)){

	            if($file_size <= $allowed_size)
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
		 * [finalRoute description]
		 *
		 * @param  [type] $folder    [description]
		 * @param  [type] $file_name [description]
		 * @return [type]            [description]
		 */

		private static function finalRoute($folder,$file_name)
		{
			if(!empty($folder) && !empty($file_name)){
				$randomName = imageDao::overwriteNameImage($file_name);

				if($randomName == FALSE)
	            {
	            	return FALSE;
	            }else{
						$fullRoute = $folder."/".$randomName;

	            		if(file_exists($fullRoute))
	                    {
	                    	return FALSE;
	                    }else{
	                    		return array($fullRoute,$randomName);
	                    	 }
	            	 }
			}else{
					return FALSE;
				 }
		}

		/**
		 * [overwriteNameImage description]
		 *
		 * @param  [type] $file_name [description]
		 * @return [type]            [description]
		 */

		private static function overwriteNameImage($file_name)
		{
			if(!empty($file_name)){
	            $pathInfo       = pathinfo($file_name);
	            $randomName     = md5(rand().time()).".".$pathInfo['extension'];

	            if(empty($pathInfo) || empty($randomName))
	            {
	            	return FALSE;
	            }else{
	            		return $randomName;
	            	 }
	        }else{
	        		return FALSE;
	        	 }
		}

		/**
		 * [moveUploadedFile description]
		 *
		 * @param  [type] $file_tmp_name [description]
		 * @param  [type] $fullRoute     [description]
		 * @return [type]                [description]
		 */

		private static function moveUploadedFile($file_tmp_name,$fullRoute)
		{
			if(!empty($file_tmp_name) && !empty($fullRoute)){
				if(move_uploaded_file($file_tmp_name,$fullRoute))
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
		 * [renameImageLang description]
		 *
		 * @param  [type] $title_image_lang [description]
		 * @param  [type] $iso_code         [description]
		 * @return [type]                   [description]
		 */

		public static function renameImageLang($title_image_lang,$iso_code)
	    {
	    	if(!empty($title_image_lang) && !empty($iso_code)){
	    		$infoImageItem 	= pathInfo($title_image_lang);
		        $extImageItem   = $infoImageItem["extension"];
		        $nameImageItem  = $infoImageItem["filename"];

		        return $nameImageItem."_".$iso_code.".".$extImageItem;
	    	}
	    }

	    /**
	     * [duplicateImagePrefixLang description]
	     *
	     * @param  [type] $folder            [description]
	     * @param  [type] $img               [description]
	     * @param  [type] $title_prefix_lang [description]
	     * @return [type]                    [description]
	     */

	    public static function duplicateImagePrefixLang($folder,$img,$title_prefix_lang)
	    {
	    	if(!empty($folder) && !empty($img) && !empty($title_prefix_lang)){
	    		$url_origen 			= $folder."/".$img;

	            if(file_exists($url_origen))
	            {
	                chmod($folder, 0777);

	                $infoImageItem1         = pathInfo($img);
	                $extImageItem1          = $infoImageItem1["extension"];
	                $nameImageItem1         = $infoImageItem1["filename"];

	                $archivo_destino 		= $folder."/".$nameImageItem1."_".$title_prefix_lang.".".$extImageItem1;

	                copy($url_origen,$archivo_destino);
	            }
	    	}
        }

		/**
		 * [deleteFolderWithPreviousFile description]
		 *
		 * @param  [type] $id_type_image  [description]
		 * @param  [type] $folder         [description]
		 * @param  [type] $image_previous [description]
		 * @param  [type] $iso_code       [description]
		 * @return [type]                 [description]
		 */

		public static function deleteFolderWithPreviousFile($id_type_image,$folder,$image_previous,$iso_code)
	    {
	    	if(!empty(intval(trim($id_type_image))) && !empty($folder) && !empty($image_previous) && !empty($iso_code)){

	    		$file_deleted = $folder."/".$image_previous;

	            if(file_exists($file_deleted))
	            {
	                $infoImageItem1         = pathInfo($image_previous);
	                $extImageItem1          = $infoImageItem1["extension"];
	                $nameImageItem1         = $infoImageItem1["filename"];

	                switch ($id_type_image){
			            case 6://SLIDERS
			            	imageDao::deleteImageWithoutPrefix($folder,$image_previous,$iso_code);

			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_45.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_1920.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_400.".$extImageItem1);

			            	return TRUE;
			            break;
			            case 7://SUMMERNOTE
			            	return TRUE;
			            break;
			            case 10://CATEGORIAS
			            	imageDao::deleteImageWithoutPrefix($folder,$image_previous,$iso_code);

			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_75.".$extImageItem1);

			            	return TRUE;
			            break;
			            case 15://PRODUCTOS
			            	imageDao::deleteImageWithoutPrefix($folder,$image_previous,$iso_code);

			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_50.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_95.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_285.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_530.".$extImageItem1);

			            	return TRUE;
			            break;
			            case 20://BLOG
			            	imageDao::deleteImageWithoutPrefix($folder,$image_previous,$iso_code);

			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_50.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_95.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_530.".$extImageItem1);

			            	return TRUE;
			            break;
			            case 21://CARRUSEL
			            	imageDao::deleteImageWithoutPrefix($folder,$image_previous,$iso_code);

			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_35.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_250.".$extImageItem1);
			            	return TRUE;
			            break;
	                    default:
	                    	return FALSE;
	                    break;
	                }
	            }else{
	            		return FALSE;
	            	 }
	    	}else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [deleteImageWithoutPrefix description]
	     *
	     * @param  [type] $folder            [description]
	     * @param  [type] $image             [description]
	     * @param  [type] $title_prefix_lang [description]
	     * @return [type]                    [description]
	     */

	    public static function deleteImageWithoutPrefix($folder,$image,$title_prefix_lang)
	    {
	    	if(!empty($folder) && !empty($image) && !empty($title_prefix_lang)){

	    		$imageWithoutPrefix 	= str_replace("_".$title_prefix_lang, "", $image);
		    	$folderPrevious     	= $folder."/".$imageWithoutPrefix;

		        if(file_exists($folderPrevious))
		        {
		            unlink($folderPrevious);
		            return TRUE;
		        }else{
		                return FALSE;
		             }
	    	}else{
	    			return FALSE;
	    		 }
        }

		/**
         * [deleteFolderWithPreviousFileWithoutLanguage description]
         *
         * @param  [type] $id_type_image  [description]
         * @param  [type] $folder         [description]
         * @param  [type] $image_previous [description]
         * @return [type]                 [description]
         */

        public static function deleteFolderWithPreviousFileWithoutLanguage($id_type_image,$folder,$image_previous)
	    {
	    	if(!empty(intval(trim($id_type_image))) && !empty($folder) && !empty($image_previous)){

	    		$file_deleted = $folder."/".$image_previous;

	            if(file_exists($file_deleted))
	            {
	                $infoImageItem1         = pathInfo($image_previous);
	                $extImageItem1          = $infoImageItem1["extension"];
	                $nameImageItem1         = $infoImageItem1["filename"];

	                switch ($id_type_image){
			            case 1://USUARIOS
			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_35.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_50.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_400.".$extImageItem1);

			            	return TRUE;
			            break;
			            case 14://GALERÍA
			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_35.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_250.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_400.".$extImageItem1);

			            	return TRUE;
			            break;
			            case 21://CARRUSEL
			            	imageDao::deletedPreviousFile($folder,$image_previous);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_35.".$extImageItem1);
			            	imageDao::deletedPreviousFile($folder,$nameImageItem1."_250.".$extImageItem1);

			            	return TRUE;
			            break;
	                    default:
	                    	return FALSE;
	                    break;
	                }
	            }else{
	            		return FALSE;
	            	 }
	    	}else{
	    			return FALSE;
	    		 }
	    }

	    /**
         * [deletedPreviousFile description]
         *
         * @param  [type] $route [description]
         * @param  [type] $file  [description]
         * @return [type]        [description]
         */

        public static function deletedPreviousFile($route,$file)
	    {
	    	if(!empty($route) && !empty($file)){

	    		$folderPrevious = $route."/".$file;

		        if(file_exists($folderPrevious))
		        {
		            unlink($folderPrevious);
		            return TRUE;
		        }else{
		                return FALSE;
		             }
	    	}else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [parametersUploadFileWithoutLanguage description]
	     *
	     * @param  [type] $folder        [description]
	     * @param  [type] $id_type_image [description]
	     * @param  [type] $img           [description]
	     * @param  string $type          [description]
	     * @return [type]                [description]
	     */

	    public static function parametersUploadFileWithoutLanguage($folder,$id_type_image,$img,$type = "")
	    {
	    	if(!empty($folder) && !empty(intval(trim($id_type_image))) && !empty($img))
	    	{
	    		require_once(dirname(__DIR__)."/class/get_image.class.php");

		    	if (!defined('FOLDER_IMAGES')) define('FOLDER_IMAGES', $folder);
		    	if (!defined('FOLDER_CACHE')) define('FOLDER_CACHE', $folder);
		    	if (!defined('JPEG_QUALITY')) define('JPEG_QUALITY', 90);
		    	if (!defined('FILEPATH_IMAGE_NOT_FOUND')) define('FILEPATH_IMAGE_NOT_FOUND', "../../../img/image_not_found_1240.jpg");

		    	$getImage = new GetImage();

				$getImage->setImagesFolder(FOLDER_IMAGES);
				$getImage->setCacheFolder(FOLDER_CACHE);
				$getImage->setErrorImagePath(FILEPATH_IMAGE_NOT_FOUND);
				$getImage->setJpegQuality(JPEG_QUALITY);

				//if(isset($_GET["exact"])) $type = GetImage::TYPE_EXACT;
				//else if(isset($_GET["exacttop"])) $type = GetImage::TYPE_EXACT_TOP;

				$type = GetImage::TYPE_EXACT;
				$getImage->showImageWithoutLanguage($img,35,35,$type);

				switch ($id_type_image)
		        {
		            case 1://USUARIOS
		            	$getImage->showImageWithoutLanguage($img,50,50,$type);
		            	$getImage->showImageWithoutLanguage($img,400,400,$type);

		            	return TRUE;
		            break;
		            case 14://GALERIA
		            	$getImage->showImageWithoutLanguage($img,250,250,$type);
		            	$getImage->showImageWithoutLanguage($img,400,400,$type);

		            	return TRUE;
		            break;
		            case 21://CARRUSEL
		            	$getImage->showImageWithoutLanguage($img,250,250,$type);

		            	return TRUE;
		            break;
		            default:
	                    return FALSE;
	                break;
		        }
	    	}else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [parametersUploadFile description]
	     *
	     * @param  [type] $folder            [description]
	     * @param  [type] $id_type_image     [description]
	     * @param  [type] $img               [description]
	     * @param  [type] $title_prefix_lang [description]
	     * @param  string $type              [description]
	     * @return [type]                    [description]
	     */

        public static function parametersUploadFile($folder,$id_type_image,$img,$title_prefix_lang,$type = "")
	    {
	    	if(!empty($folder) && !empty(intval(trim($id_type_image))) && !empty($img) && !empty($title_prefix_lang))
	    	{
	    		require_once(dirname(__DIR__)."/class/get_image.class.php");

		    	if (!defined('FOLDER_IMAGES')) define('FOLDER_IMAGES', $folder);
		    	if (!defined('FOLDER_CACHE')) define('FOLDER_CACHE', $folder);
		    	if (!defined('JPEG_QUALITY')) define('JPEG_QUALITY', 90);
		    	if (!defined('FILEPATH_IMAGE_NOT_FOUND')) define('FILEPATH_IMAGE_NOT_FOUND', "../../../img/image_not_found_1240.jpg");

		    	$getImage = new GetImage();

				$getImage->setImagesFolder(FOLDER_IMAGES);
				$getImage->setCacheFolder(FOLDER_CACHE);
				$getImage->setErrorImagePath(FILEPATH_IMAGE_NOT_FOUND);
				$getImage->setJpegQuality(JPEG_QUALITY);

				//if(isset($_GET["exact"])) $type = GetImage::TYPE_EXACT;
				//else if(isset($_GET["exacttop"])) $type = GetImage::TYPE_EXACT_TOP;

				$type = GetImage::TYPE_EXACT;

				switch ($id_type_image)
		        {
		            case 6://SLIDERS
		            	$getImage->showImage($img,45,45,$title_prefix_lang,$type);
		            	$getImage->showImage($img,1920,1283,$title_prefix_lang,$type);
		            	$getImage->showImage($img,400,300,$title_prefix_lang,GetImage::TYPE_EXACT);

		            	return TRUE;
		            break;
		            case 7://SUMMERNOTE
		            	return TRUE;
		            break;
		            case 10://CATEGORIAS
		            	$getImage->showImage($img,75,75,$title_prefix_lang,$type);

		            	return TRUE;
		            break;
		            case 12://PAGINA WEB
		            	$getImage->showImage($img,201,358,$title_prefix_lang,$type);

		            	return TRUE;
		            break;
		            case 15://PRODUCTOS
		            	$getImage->showImage($img,50,50,$title_prefix_lang,$type);
		            	$getImage->showImage($img,95,95,$title_prefix_lang,$type);
						$getImage->showImage($img,285,285,$title_prefix_lang,$type);
						$getImage->showImage($img,530,530,$title_prefix_lang,$type);

		            	return TRUE;
		            break;
		            case 20://BLOG
		            	$getImage->showImage($img,50,50,$title_prefix_lang,$type);
		            	$getImage->showImage($img,95,95,$title_prefix_lang,$type);
		            	$getImage->showImage($img,530,432,$title_prefix_lang,$type);

		            	return TRUE;
		            break;
		            default:
	                    return FALSE;
	                break;
		        }
	    	}else{
	    			return FALSE;
	    		 }
	    }

	    /**
		 * [showVersionList description]
		 *
		 * @return [type] [description]
		 */

		public static function showVersionList()
   		{
			self::$file_global 	= dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//CREAR OBJETO
			$ob_conectar 		= new conectorDB();

			$consulta_version 	= "CALL showVersionList()";

            $resultadoV  		= $ob_conectar->consultarBD($consulta_version,null);

          	foreach($resultadoV as &$datosV)
            {
            	if($datosV['ERRNO'] == 2)
            	{
	                if(empty(intval(trim($datosV['id_type_version']))) || empty($datosV['type_version_lang']))
	                {
	                	echo('<option value="">'.$lang_global['No hay versiones disponibles'].'</option>');
	                }else{
	                		echo('<option value="'.$datosV['id_type_version'].'">'.$datosV['type_version_lang'].'</option>');
	                     }
            	}else{
            			echo('<option value="">'.$lang_global['Error en el proceso'].$lang_global['Variables vacías'].'</option>');
            		 }
            }
   		}

   		/**
   		 * [uploadSummernoteImage description]
   		 *
   		 * @param  [type]  $view                [description]
   		 * @param  [type]  $obj_image_lang      [description]
   		 * @param  string  $imageUpload         [description]
   		 * @param  string  $return_boolean      [description]
   		 * @param  string  $imageWithPrefixLang [description]
   		 * @param  integer $x                   [description]
   		 * @return [type]                       [description]
   		 */

   		public static function uploadSummernoteImage($view,$obj_image_lang,$imageUpload = "",$return_boolean = "",$imageWithPrefixLang = "",$x = 1)
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty($obj_image_lang->getFile_type()) && !empty($obj_image_lang->getFile_size()) && !empty($obj_image_lang->getTitle_image_lang())){

				self::$folder 		= imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
	                header('Content-Type: application/json');
			        $valor = array("estado" => "false",
			                       "error" 	=> $lang_error['Error 14']);
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

						self::$full_path 			= $slash.self::$folder;

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
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png","image/svg+xml"),2000000);

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

								$consulta1 			= "CALL registerSummernote(:id_type_image,:file_type,:file_size)";
					            $valores1 			= array('id_type_image' => $obj_image_lang->getId_type_image(),
					        								'file_type' 	=> $obj_image_lang->getFile_type(),
					        								'file_size' 	=> $obj_image_lang->getFile_size());

					            $resultado1 	 	= $ob_conectar->consultarBD($consulta1,$valores1);

					            foreach($resultado1 as &$atributo)
							 	{
							 		switch ($atributo['ERRNO'])
							 		{
							 			case 2://CORRECTO
							 				if(!empty(intval(trim($atributo["ID_IMG"]))))
							 				{
							 					self::$file_help = dirname(__DIR__).'/helps/help.php';
												require_once(self::$file_help);

							 					$id_image 				= $atributo["ID_IMG"];
							 					$file_type 				= explode("/", $obj_image_lang->getFile_type());

							 					$consulta2      		= "CALL showActiveLanguage()";
									            $resultado2     		= $ob_conectar->consultarBD($consulta2,null);

									            foreach($resultado2 as &$atributo2)
									            {
									                if($atributo2['ERRNO'] == 1)
									                {
									                	header('Content-Type: application/json');
												        $valor = array("estado" => "false",
												                       "error" 	=> $lang_error["Error 11"]."(2)");
												        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
												        exit();
									                }else{
									                		$id_lang 				= $atributo2['id_lang'];
									                		$iso_code 				= $atributo2['iso_code'];

									                		if(!empty(intval(trim($id_lang))) && !empty($iso_code))
							 								{
										                		$consulta3 		= "CALL registerInformationSummernote(:id_image,:id_lang,:title_image_lang)";
										                		$valores3 		= array('id_image' 			=> $id_image,
										                								'id_lang' 			=> $id_lang,
										                								'title_image_lang' 	=> $obj_image_lang->getTitle_image_lang());

													            $resultado3 	= $ob_conectar->consultarBD($consulta3,$valores3);

													            foreach($resultado3 as &$atributo3)
															 	{
															 		switch ($atributo3['ERRNO'])
															 		{
															 			case 1:
															 				header('Content-Type: application/json');
																	        $valor = array("estado" => "false",
																	                       "error" 	=> $lang_error["Error 11"]."(3)");
																	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																	        exit();
															 			break;
															 			case 2:
															 				header('Content-Type: application/json');
																	        $valor = array("estado" => "false",
																	                       "error" 	=> $lang_error["Error 11"]."(4)");
																	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																	        exit();
															 			break;
															 			case 3:
															 				header('Content-Type: application/json');
																	        $valor = array("estado" => "false",
																	                       "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["La imagen"],"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]));
																	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																	        exit();
															 			break;
															 			case 4:
															 				if($file_type[0] != "video"){
										 										$imageWithPrefixLang 	= imageDao::renameImageLang($imageUpload,$iso_code);
										 									}else{
										 										$imageWithPrefixLang 	= $imageUpload;
										 										 }

															 				if(!empty(intval(trim($atributo3["ID_IMG_LA"]))) && !empty($imageWithPrefixLang))
															 				{
															 					$id_image_lang 		= $atributo3["ID_IMG_LA"];

															 					$consulta4      	= "CALL registerImageVersion(:id_image_lang,:id_type_version,:image_lang)";
															 					$valores4 			= array('id_image_lang' 	=> $id_image_lang,
										                													'id_type_version' 	=> 1,
										                													'image_lang' 		=> $imageWithPrefixLang);

									            								$resultado4     	= $ob_conectar->consultarBD($consulta4,$valores4);

																	            foreach($resultado4 as &$atributo4)
																			 	{
																			 		switch ($atributo4['ERRNO'])
																			 		{
																			 			case 1:
																			 				header('Content-Type: application/json');
																					        $valor = array("estado" => "false",
																					                       "error" 	=> $lang_error["Error 11"]."(5)");
																					        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																					        exit();
																			 			break;
																			 			case 2:
																			 				header('Content-Type: application/json');
																					        $valor = array("estado" => "false",
																					                       "error" 	=> $lang_error["Error 11"]."(6)");
																					        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																					        exit();
																			 			break;
																			 			case 3:
																			 				header('Content-Type: application/json');
																					        $valor = array("estado" => "false",
																					                       "error" 	=> $lang_error["Error 23"]);
																					        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																					        exit();
																			 			break;
																			 			case 4:
																			 				self::$final_full_path  = self::$full_path."/".$imageUpload;

																			 				if(!empty(self::$final_full_path))
																			 				{
																			 					if(file_exists(self::$final_full_path))
																								{
																									if($file_type[0] != "video"){
																														//$folder,$img,$title_prefix_lang
																										imageDao::duplicateImagePrefixLang(self::$full_path,$imageUpload,$iso_code);
																									}
																								}
																							}
																							if($x == 1)
																							{
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
																		              			imageDao::returnImage($imageUpload,'',self::$full_path,0,"img/image_not_found_100.jpg",1,'',1);
																							}
																							$x++;
																			 			break;
																			 			default:
																			 				header('Content-Type: application/json');
																					        $valor = array("estado" => "false",
																					                       "error" 	=> $lang_error["Error 1"]."(9)");
																					        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																					        exit();
																			 			break;
																			 		}
																			 	}//End CALL registerImageVersion
															 				}else{
															 						header('Content-Type: application/json');
																			        $valor = array("estado" => "false",
																			                       "error" 	=> $lang_error["Error 1"]."(8)");
																			        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																			        exit();
															 					 }
															 			break;
															 			default:
															 				header('Content-Type: application/json');
																	        $valor = array("estado" => "false",
																	                       "error" 	=> $lang_error["Error 1"]."(7)");
																	        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
																	        exit();
															 			break;
															 		}

															 		$imageWithPrefixLang 	= "";

															    }//End CALL registerInformationSummernote
							 								}else{
							 										header('Content-Type: application/json');
															        $valor = array("estado" => "false",
															                       "error" 	=> $lang_error["Error 1"]."(6)");
															        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
															        exit();
							 									 }
														}
												}//End CALL showActiveLanguage
							 				}else{
							 						header('Content-Type: application/json');
											        $valor = array("estado" => "false",
											                       "error" 	=> $lang_error["Error 1"]."(5)");
											        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											        exit();
							 					 }
							 				exit();
							 			break;
							 			default:
							 				header('Content-Type: application/json');
									        $valor = array("estado" => "false",
									                       "error" 	=> $lang_error["Error 1"]."(4)");
									        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									        exit();
							 			break;
							 		}
							    }//End CALL registerSummernote
							}else{
				                   	header('Content-Type: application/json');
							        $valor = array("estado" => "false",
							                       "error" 	=> $lang_error["Error 1"]."(3)");
							        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							        exit();
								 }
						}else{
								header('Content-Type: application/json');

								$return_error = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(2)";
								}

						        $valor = array("estado" => "false",
						                       "error" 	=> $return_error);
						        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
						        exit();
							 }//return_boolean
					 }
			}else{
					header('Content-Type: application/json');
			        $valor = array("estado" => "false",
			                       "error" 	=> $lang_error["Error 1"]."(1)");
			        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			        exit();
				 }
        }

        /**
         * [deleteWithImage5Parameters description]
         *
         * @param  [type] $obj_image_lang [description]
         * @return [type]                 [description]
         */

        public static function deleteWithImage5Parameters($obj_image_lang)
	    {
            self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_image()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty($obj_image_lang->getTitle_image_lang()))
			{
				//PRIMERO NOS TRAEMOS LA CONSULTA CON LAS IMAGENES ANTES DE ELIMINARLAS DE LA BD
				$imageInformationArray 	= imageDao::showPreviewImageArrayByImageId($obj_image_lang->getId_image());

				//CREAR OBJETO
	            $ob_conectar 			= new conectorDB();

	            $consulta      			= "CALL deleteImage(:id_image)";
	            $valores 				= array('id_image' => $obj_image_lang->getId_image());

        		$resultado     			= $ob_conectar->consultarBD($consulta,$valores);

        		foreach($resultado as &$atributo)
		        {
		            switch ($atributo['ERRNO'])
		            {
		                case 2://CORRECTO
							self::$file_help 	= dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

		                	self::$file_record 	= dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

		                	self::$folder 		= imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

		                	if(self::$folder == FALSE || empty(self::$folder)){
		                	}else{
		                			self::$full_path 		= "../../../../../".self::$folder;

		                			foreach($imageInformationArray as $key => $value){
				                		switch ($value['ERRNO']) {
				                			case 2://CORRECTO
												if(!empty(intval(trim($value['image_lang'])))){
													switch ($obj_image_lang->getId_type_image()) {
														case 14://Galería
															imageDao::deleteFolderWithPreviousFileWithoutLanguage($obj_image_lang->getId_type_image(),self::$full_path,$value['image_lang']);
															break;
														case 21://Carrusel
															imageDao::deleteFolderWithPreviousFileWithoutLanguage($obj_image_lang->getId_type_image(),self::$full_path,$value['image_lang']);
															break;
														default://General
															if(!empty($value['iso_code'])){
																imageDao::deleteFolderWithPreviousFile($obj_image_lang->getId_type_image(),self::$full_path,$value['image_lang'],$value['iso_code']);
															}
															break;
													}
												}
											break;
				                		}
				                	}
		                		 }//END self::$folder

				            	ConectorDB::registerRecordTwoParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Elimino"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 3"]);

			                    $page 	= imageDao::returnPageImage($obj_image_lang->getId_type_image());

			                    $valor 	= array("estado" => "true","item" => $obj_image_lang->getId_image(),"resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$obj_image_lang->getTitle_image_lang(),$lang_error["Error 9"]),"pagina" => $page);
			                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			                    exit();
		        			break;
		                default:
		                	$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(2)");
		            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
		                break;
		            }
		        }//End CALL deleteImage
			}else{
					$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(1)");
            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
	    }

	    /**
	     * [showPreviewImageArrayByImageId description]
	     *
	     * @param  [type] $id_image [description]
	     * @return [type]           [description]
	     */

	    public static function showPreviewImageArrayByImageId($id_image)
	    {
			$imageInformation 				= array();

			if(!empty(intval(trim($id_image)))){

				//CREAR OBJETO
				$ob_conectar    			= new conectorDB();

	            $consulta_preview_image     = "CALL showPreviewImageArrayByImageId(:id_image)";
	            $valores_preview_image 		= array('id_image' => $id_image);

	            $resultadoPIA     			= $ob_conectar->consultarBD($consulta_preview_image,$valores_preview_image);

	            foreach($resultadoPIA as $indice => $datosPIA)
				{
					if($datosPIA['ERRNO'] == 1){
						$imageInformation[] = $datosPIA['ERRNO'];
					}else{
						$imageInformation[] = $datosPIA;
						 }
				}

				return $imageInformation;
			}else{
    			$imageInformation = [
				    "ERRNO" => 1
				];
    			return $imageInformation;
    		 }
	    }

	    /**
         * [showPreviewImageByImageLangVersionId description]
         *
         * @param  [type] $id_image_lang_version [description]
         * @return [type]                        [description]
         */

        private static function showPreviewImageByImageLangVersionId($id_image_lang_version)
	    {
	        if(!empty(intval(trim($id_image_lang_version)))){
	        	//CREAR OBJETO
	            $ob_conectar    			= new conectorDB();

	            $consulta_preview_image 	= "CALL showPreviewImageByImageLangVersionId(:id_image_lang_version)";
	            $valores_preview_image 		= array('id_image_lang_version' => $id_image_lang_version);

	            $resultadoPIMG    			= $ob_conectar->consultarBD($consulta_preview_image,$valores_preview_image);

	            foreach($resultadoPIMG as &$atributoPIMG)
	            {
	                if($atributoPIMG['ERRNO'] == 1)
	                {
	                    return false;
	                }else{
	                        return $atributoPIMG['image_lang'];
	                     }
	            }
	        }else{
	        		return false;
	        	 }
	    }

	    /**
	     * [returnPageImage description]
	     *
	     * @param  [type] $id_type_image [description]
	     * @return [type]                [description]
	     */

	    public static function returnPageImage($id_type_image)
	    {
	        switch ($id_type_image)
	        {
	            case 4://Mi perfil
	                $page = "my-profile";
	                return $page;
	            break;
	            case 6://Sliders
	                $page = "design-slider";
	                return $page;
	            break;
	            case 10://Categorías
	                $page = "catalogue-category";
	                return $page;
	            break;
	            case 15://Productos
	                $page = "catalogue-product";
	                return $page;
	            break;
	             case 20://Blog
	                $page = "pages-blog";
	                return $page;
	            break;
	            case 21://Carrusel
	                $page = "design-carousel";
	                return $page;
	            break;
	            default:
	                $page = "main";
	                return $page;
	            break;
	        }
	    }

	    /**
	     * [showSelectedBGRList description]
	     *
	     * @param  [type] $bgr_selected [description]
	     * @return [type]               [description]
	     */

	    public static function showSelectedBGRList($bgr_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR $bgr_selected YA QUE SU VALOR PUEDE SER 0
			$array = array('','repeat', 'no-repeat');

			foreach ($array as &$valor)
			{
				echo('<option value="'.$valor.'" '.($valor == $bgr_selected ? 'selected="selected"' : '') . '>'.($valor == '' ? $lang_global["Seleccionar una opción"] : $valor) . '</option>');
			}
		}

		/**
		 * [showSelectedBGRPList description]
		 *
		 * @param  [type] $bgrp_selected [description]
		 * @return [type]                [description]
		 */

		public static function showSelectedBGRPList($bgrp_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR $bgrp_selected YA QUE SU VALOR PUEDE SER 0
			$array = array('','center center', 'left top', 'left bottom', 'left center', 'right top', 'right bottom', 'right center', 'top left', 'top right', 'top center', 'bottom left', 'bottom right', 'bottom center');

			foreach ($array as &$valor)
			{
				echo('<option value="'.$valor.'" '.($valor == $bgrp_selected ? 'selected="selected"' : '') . '>'.($valor == '' ? $lang_global["Seleccionar una opción"] : $valor) . '</option>');
			}
		}

		/**
		 * [showSelectedBGSList description]
		 *
		 * @param  [type] $bgs_selected [description]
		 * @return [type]               [description]
		 */

		public static function showSelectedBGSList($bgs_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR $bgs_selected YA QUE SU VALOR PUEDE SER 0
			$array = array('','contain', 'cover');

			foreach ($array as &$valor)
			{
				echo('<option value="'.$valor.'" '.($valor == $bgs_selected ? 'selected="selected"' : '') . '>'.($valor == '' ? $lang_global["Seleccionar una opción"] : $valor) . '</option>');
			}
		}

		/**
		 * [showAllFolders description]
		 *
		 * @param  string $folder [description]
		 * @return [type]         [description]
		 */

        public static function showAllFolders($folder = "")
	    {
			//CREAR OBJETO
			$ob_conectar 			= new conectorDB();

            $consulta_all_folder 	= "CALL showAllFolders()";
            $resultadoAF 	 		= $ob_conectar->consultarBD($consulta_all_folder,null);

            foreach($resultadoAF as &$atributoAF)
		 	{
		 		switch ($atributoAF['ERRNO'])
		 		{
		 			case 2:
			 			if(!empty($atributoAF["default_route_type_image"]))
			 			{
							$folder = explode("/", $atributoAF["default_route_type_image"]);
					  echo('<li class="mb-1"><i class="fas fa-folder"></i> '.$folder[1].'</li>');
			 			}
		 			break;
		 			default:
		 				return FALSE;
		 			break;
		 		}
		    }
	    }

	    /**
	     * [uploadImageVersionByImageLangId description]
	     *
	     * @param  [type]  $obj_image_lang      [description]
	     * @param  string  $imageUpload         [description]
	     * @param  string  $return_boolean      [description]
	     * @param  string  $pageRedireccionar   [description]
	     * @param  string  $imageWithPrefixLang [description]
	     * @param  string  $estado              [description]
	     * @param  string  $tipo_msj            [description]
	     * @param  string  $devuelve            [description]
	     * @param  string  $estadoRedireccionar [description]
	     * @param  integer $x                   [description]
	     * @return [type]                       [description]
	     */

	    public static function uploadImageVersionByImageLangId($obj_image_lang,$imageUpload = "",$return_boolean = "",$pageRedireccionar = "",$imageWithPrefixLang = "",$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$x = 0)
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_image_lang->getId_image()))) && !empty(intval(trim($obj_image_lang->getId_type_version()))) && !empty($obj_image_lang->getTitle_image_lang())){

				self::$folder 	= imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" 		=> $estado,
								   "error"  		=> $lang_error["Error 14"],
								   "redireccionar" 	=> $estadoRedireccionar);
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
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png","image/svg+xml"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
								$devuelve 			= $lang_error["Error 11"]."(0)";
					            $file_type 			= explode("/", $obj_image_lang->getFile_type());

					            self::$file_help = dirname(__DIR__).'/helps/help.php';
					            require_once(self::$file_help);

					            //CREAR OBJETO
								$ob_conectar 		= new conectorDB();

								$consulta1      	= "CALL showActiveLanguage()";
								$resultado1     	= $ob_conectar->consultarBD($consulta1,null);

								foreach($resultado1 as &$atributo1)
					            {
					                if($atributo1['ERRNO'] == 1)
					                {
					                	imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

					                	$devuelve 	= $lang_error["Error 11"]."C1 (3)";
					                }else{
					                		$id_lang 	= $atributo1['id_lang'];
					                		$iso_code 	= $atributo1['iso_code'];

					                		if(!empty(intval(trim($id_lang))) && !empty($iso_code))
			 								{
		 										$consulta2      = "CALL showIdImageLangByImageIdAndIdLang(:id_image,:id_lang)";
		 										$valores2 		= array('id_image' 	=> $obj_image_lang->getId_image(),
		 																'id_lang' 	=> $id_lang);

									            $resultado2     = $ob_conectar->consultarBD($consulta2,$valores2);

									            foreach($resultado2 as &$atributo2)
											 	{
											 		if($atributo2['ERRNO'] == 1 || empty(intval(trim($atributo2["id_image_lang"]))))
											 		{
											 			imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

											 			$devuelve = $lang_error["Error 11"]."C2 (4)";
											 		}else{
											 				if($file_type[0] != "video"){
						 										$imageWithPrefixLang 	= imageDao::renameImageLang($imageUpload,$iso_code);
						 									}else{
						 										$imageWithPrefixLang 	= $imageUpload;
						 										 }

						 									if(!empty($imageWithPrefixLang))
						 									{
						 										$consulta3 	= "CALL registerImageVersion(:id_image_lang,:id_type_version,:image_lang)";
						 										$valores3 	= array('id_image_lang' 	=> $atributo2["id_image_lang"],
		 																			'id_type_version' 	=> $obj_image_lang->getId_type_version(),
		 																			'image_lang' 		=> $imageWithPrefixLang);

												            	$resultado3 = $ob_conectar->consultarBD($consulta3,$valores3);

												            	foreach($resultado3 as &$atributo3)
															 	{
															 		switch ($atributo3['ERRNO'])
															 		{
															 			case 4://CORRECTO
															 				if($x == 0){

															 					self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
					           			 										require_once(self::$file_record);

															 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["versión"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);
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
																							imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$iso_code);
																						}
																					}
																				}
																			}

																			$x++;

																			$page  = imageDao::returnPageImage($obj_image_lang->getId_type_image());
								 											//$page = $page.'-detail/'.$obj_image_lang->getId_image();

																			$estado 	= "true";
														 					$tipo_msj 	= "resultado";
												                			$devuelve 	= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
												                			$estadoRedireccionar	= "true";
												                			$pageRedireccionar		= $page;
															 			break;
															 			default:
															 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

															 				//$atributo3['ERRNO']
																 				//1 = ID_IMG_LA  NO EXISTE
																 				//2 = ID TY VERSION NO EXISTE
																 				//3 = YA EXISTE REGISTRADA UNA VERSIÓN
															 				if($atributo3['ERRNO'] == 3){
															 					$devuelve = $lang_error["Error 23"];
															 				}else{
															 						$devuelve = $lang_error["Error 11"]."C3 (".$atributo3['ERRNO'].").";
															 					 }
															 			break;
															 		}
															    }
						 									}else{
						 											$devuelve = $lang_error["Error 11"]."(2)";
						 										 }
											 			 }
											 	}//END showIdImageLangByImageIdAndIdLang
					                		}else{
					                				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

					                				$devuelve = $lang_error["Error 11"]."(1)";
					                			 }
					                	 }
					            }//END showActiveLanguage

					            $valor = array("estado"  		=> $estado,
					            			   $tipo_msj 		=> $devuelve,
					            			   "redireccionar" 	=> $estadoRedireccionar,
					            			   "page" 			=> $pageRedireccionar);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();
							}else{
									$valor = array("estado" 		=> $estado,
												   "error" 			=> $lang_error["Error 1"]."(2)",
												   "redireccionar" 	=> $estadoRedireccionar);
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
								 }
						}else{
							 	$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(1)";
								}

								$valor = array("estado" 		=> $estado,
											   "error" 			=> $return_error,
											   "redireccionar" 	=> $estadoRedireccionar);
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//return_boolean
					}
			}else{
					$valor = array("estado" 		=> $estado,
								   "error"  		=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"],
								   "redireccionar" 	=> $estadoRedireccionar);
	            	return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
        }

        /**
         * [uploadImageVersionInASingleLanguageByImageLangId description]
         *
         * @param  [type] $obj_lang            [description]
         * @param  [type] $obj_image_lang      [description]
         * @param  string $imageUpload         [description]
         * @param  string $return_boolean      [description]
         * @param  string $pageRedireccionar   [description]
         * @param  string $imageWithPrefixLang [description]
         * @return [type]                      [description]
         */

        public static function uploadImageVersionInASingleLanguageByImageLangId($obj_lang,$obj_image_lang,$imageUpload = "",$return_boolean = "",$pageRedireccionar	= "",$imageWithPrefixLang = "")
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_image_lang->getId_image_lang()))) && !empty(intval(trim($obj_image_lang->getId_type_version()))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty($obj_image_lang->getTitle_image_lang())){

				$iso_code 			= langController::prefixLangByIdLang($obj_lang->getId_lang());
				self::$folder 		= imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder) || empty($iso_code))
				{
					$valor = array("estado" => "false","error" => $lang_error["Error 14"], "redireccionar" => "false");
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
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png","image/svg+xml"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
								$estado 				= "false";
		 						$tipo_msj 				= "error";
                				$devuelve 				= $lang_error["Error 11"]."(0)";
                				$estadoRedireccionar	= "false";

					            $file_type 				= explode("/", $obj_image_lang->getFile_type());

					            //CREAR OBJETO
								$ob_conectar 			= new conectorDB();

								if($file_type[0] != "video"){
										$imageWithPrefixLang 	= imageDao::renameImageLang($imageUpload,$iso_code);
									}else{
										$imageWithPrefixLang 	= $imageUpload;
										 }

									if(!empty($imageWithPrefixLang))
									{
										$consulta 			= "CALL registerImageVersion(:id_image_lang,:id_type_version,:image_lang)";
										$valores 			= array('id_image_lang' 	=> $obj_image_lang->getId_image_lang(),
																	'id_type_version' 	=> $obj_image_lang->getId_type_version(),
																	'image_lang' 		=> $imageWithPrefixLang);

					            	$resultado 	 		= $ob_conectar->consultarBD($consulta,$valores);

					            	foreach($resultado as &$atributo)
								 	{
								 		switch ($atributo['ERRNO'])
								 		{
								 			case 4://CORRECTO
								 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
									            require_once(self::$file_record);

									            self::$file_help = dirname(__DIR__).'/helps/help.php';
									            require_once(self::$file_help);

								 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["versión"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);

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
																imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$iso_code);
															}
														}
													}
												}

												$page  = imageDao::returnPageImage($obj_image_lang->getId_type_image());
	 											//$page = $page.'-detail/'.$obj_image_lang->getId_image();

												$estado 	= "true";
							 					$tipo_msj 	= "resultado";
					                			$devuelve 	= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
					                			$estadoRedireccionar	= "true";
					                			$pageRedireccionar		= $page;
								 			break;
								 			default:
								 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

								 				$estado 	= "false";
								 				$tipo_msj 	= "error";
								 				//$atributo['ERRNO']
									 				//1 = ID_IMG_LA  NO EXISTE
									 				//2 = ID TY VERSION NO EXISTE
									 				//3 = YA EXISTE REGISTRADA UNA VERSIÓN
								 				if($atributo['ERRNO'] == 3){
								 					$devuelve 				= $lang_error["Error 23"];
								 				}else{
								 						$devuelve 			= $lang_error["Error 11"]."(".$atributo['ERRNO'].").";
								 					 }
						                		$estadoRedireccionar	= "false";
								 			break;
								 		}
								    }
									}else{
											$estado 	= "false";
				 						$tipo_msj 	= "error";
		                				$devuelve 	= $lang_error["Error 11"]."(2)";
		                				$estadoRedireccionar	= "false";
										 }

					            $valor = array("estado" => $estado, $tipo_msj => $devuelve, "redireccionar" => $estadoRedireccionar, "page" => $pageRedireccionar);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();
							}else{
									$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(2)", "redireccionar" => "false");
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
								 }
						}else{
							 	$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(1)";
								}

								$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "false");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//return_boolean
					}
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"], "redireccionar" => "false");
	            	return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
        }

        /**
         * [updateImageByImageLangVersionId description]
         *
         * @param  [type] $obj_lang            [description]
         * @param  [type] $obj_image_lang      [description]
         * @param  string $imageUpload         [description]
         * @param  string $return_boolean      [description]
         * @param  string $delete_image        [description]
         * @param  string $imageWithPrefixLang [description]
         * @return [type]                      [description]
         */

	    public static function updateImageByImageLangVersionId($obj_lang,$obj_image_lang,$imageUpload = "",$return_boolean = "",$delete_image = "",$imageWithPrefixLang = "")
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty(intval(trim($obj_image_lang->getId_image_lang_version()))) && !empty($obj_image_lang->getTitle_image_lang()) && !empty($obj_image_lang->getFile_type()))
			{
				self::$folder 	= imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" 		=> "false",
								   "error" 			=> $lang_error["Error 14"],
								   "redireccionar" 	=> "false");
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
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png","image/svg+xml"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
								$file_type 			 = explode("/", $obj_image_lang->getFile_type());
								$iso_code 			 = langController::prefixLangByIdLang($obj_lang->getId_lang());

							 	if($iso_code == FALSE)
							 	{
							 		$valor = array("estado" => "false",
							 					   "error" 	=> $lang_error["Error 11"]."(1)");
									return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
							 	}else{
							 			if(!empty($iso_code))
							 			{
							 				$delete_image 			 = imageDao::showPreviewImageByImageLangVersionId($obj_image_lang->getId_image_lang_version());

							 				if($file_type[0] != "video"){
		 										$imageWithPrefixLang = imageDao::renameImageLang($imageUpload,$iso_code);
		 									}else{
		 										$imageWithPrefixLang = $imageUpload;
		 										 }

									 		if(!empty($imageWithPrefixLang))
									 		{
									            //CREAR OBJETO
												$ob_conectar 	= new conectorDB();

									            $consulta 		= "CALL updateImageByImageLangVersionId(:id_image_lang_version,:file_type,:image_lang)";
									            $valores 		= array('id_image_lang_version' => $obj_image_lang->getId_image_lang_version(),
									        							'file_type' 			=> $obj_image_lang->getFile_type(),
									        							'image_lang' 			=> $imageWithPrefixLang);

									            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

									            foreach($resultado as &$atributo)
											 	{
											 		switch ($atributo['ERRNO'])
											 		{
											 			case 1:
											 				$valor = array("estado" 		=> "false",
											 							   "error" 			=> $lang_error["Error 11"]."(2)",
											 							   "redireccionar" 	=> "true");
				            								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
															exit();
											 			break;
											 			case 2:
											 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
												            require_once(self::$file_record);

												            self::$file_help = dirname(__DIR__).'/helps/help.php';
												            require_once(self::$file_help);

											 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Modifico"],$lang_error["imagen"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);

											 				$img_lang_update	= self::$full_path."/".$imageUpload;

											 				if(!empty($delete_image))
											 				{
											 					imageDao::deleteFolderWithPreviousFile($obj_image_lang->getId_type_image(),self::$full_path,$delete_image,$iso_code);
											 				}

											 				if(!empty($img_lang_update))
											 				{
											 					if(file_exists($img_lang_update))
																{
																	$file_type = explode("/", $obj_image_lang->getFile_type());

																	if($file_type[0] != "video"){
																										//$folder,$img,$title_prefix_lang
																		imageDao::duplicateImagePrefixLang(self::$full_path,$imageUpload,$iso_code);

																		if($obj_image_lang->getFile_type() != "image/svg+xml")
																		{
																			imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),$img_lang_update,$iso_code);
																		}
																	}
																}
															}

															$page  = imageDao::returnPageImage($obj_image_lang->getId_type_image());

															$valor = array("estado" 		=> "true",
																		   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Modificación"],"/PARA2/",$lang_error["realizada"],$lang_error["Error 9"]),
																		   "redireccionar" 	=> "true",
																		   "pagina" 		=> $page);
				            								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
															exit();
											 			break;
											 			default:
											 				$valor = array("estado" => "false","error" => $lang_error["Error 11"]."(3)", "redireccionar" => "true");
				            								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
															exit();
											 			break;
											 		}
											    }//FOREACH updateImageByImageLangVersionId
									 		}else{
									 				$valor = array("estado" => "false","error" => $lang_error["Error 11"]."(4)");
													return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
													exit();
									 			 }//END imageWithPrefixLang
							 			}else{
						 						$valor = array("estado" => "false","error" => $lang_error["Error 11"]."(5)", "redireccionar" => "true");
	            								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
												exit();
						 					 }//END $iso_code
							 		 }//END $iso_code == FALSE
							}else{
									$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(1)", "redireccionar" => "true");
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
								 }//END imageUpload
						}else{
							 	$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 11"]."(6)";
								}

								$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//$return_boolean == false
					}//END showFolderByIdTypeImage
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"], "redireccionar" => "false");
            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
        }

        /**
         * [updateImageByImageLangVersionIdWithoutLanguage description]
         *
         * @param  [type] $obj_lang       [description]
         * @param  [type] $obj_image_lang [description]
         * @param  string $imageUpload    [description]
         * @param  string $return_boolean [description]
         * @param  string $delete_image   [description]
         * @return [type]                 [description]
         */

        public static function updateImageByImageLangVersionIdWithoutLanguage($obj_lang,$obj_image_lang,$imageUpload = "",$return_boolean = "",$delete_image = "")
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty(intval(trim($obj_image_lang->getId_image_lang_version()))) && !empty($obj_image_lang->getTitle_image_lang()) && !empty($obj_image_lang->getFile_type()))
			{
				self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" => "false","error" => $lang_error["Error 14"], "redireccionar" => "false");
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
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png","image/svg+xml"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
								$delete_image 		= imageDao::showPreviewImageByImageLangVersionId($obj_image_lang->getId_image_lang_version());

								//CREAR OBJETO
								$ob_conectar 		= new conectorDB();

					            $consulta 			= "CALL updateImageByImageLangVersionId(:id_image_lang_version,:file_type,:image_lang)";
					            $valores 			= array('id_image_lang_version' => $obj_image_lang->getId_image_lang_version(),
					            							'file_type' 			=> $obj_image_lang->getFile_type(),
					        								'image_lang' 			=> $imageUpload);

					            $resultado 	 		= $ob_conectar->consultarBD($consulta,$valores);

					            foreach($resultado as &$atributo)
							 	{
							 		switch ($atributo['ERRNO'])
							 		{
							 			case 2://CORRECTO
							 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
								            require_once(self::$file_record);

								            self::$file_help = dirname(__DIR__).'/helps/help.php';
								            require_once(self::$file_help);

							 				if(!empty($delete_image))
							 				{
							 					imageDao::deleteFolderWithPreviousFileWithoutLanguage($obj_image_lang->getId_type_image(),self::$full_path,$delete_image);
							 				}

							 				self::$final_full_path	= self::$full_path."/".$imageUpload;

							 				if(!empty(self::$final_full_path))
							 				{
							 					if(file_exists(self::$final_full_path))
												{
													if($obj_image_lang->getFile_type() != "image/svg+xml")
													{
														imageDao::parametersUploadFileWithoutLanguage(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path);
													}
												}
											}

											$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Modifico"],$lang_error["imagen"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);
											$page = imageDao::returnPageImage($obj_image_lang->getId_type_image());

											$valor = array("estado" => "true","resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Modificación"],"/PARA2/",$lang_error["realizada"],$lang_error["Error 9"]), "redireccionar" => "true","pagina" => $page);
            								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
							 			break;
							 			default:
							 				$valor = array("estado" => "false","error" => $lang_error["Error 11"]."(1)", "redireccionar" => "true");
            								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
							 			break;
							 		}
							    }//FOREACH updateImageByImageLangVersionId
							}else{
									$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(1)", "redireccionar" => "true");
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
								 }//END imageUpload
						}else{
							 	$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 11"]."(2)";
								}

								$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "true");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//$return_boolean == false
					}//END showFolderByIdTypeImage
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"], "redireccionar" => "false");
            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
        }

        /**
	     * [deleteWithImageVersion3Parameters description]
	     *
	     * @param  [type] $obj_image_lang [description]
	     * @return [type]                 [description]
	     */

	    public static function deleteWithImageVersion3Parameters($obj_image_lang)
	    {
            self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_image_lang_version()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty($obj_image_lang->getTitle_image_lang()))
			{
				self::$sqlCall  = imageDao::showProcedureDeleteWithImageVersion($obj_image_lang->getId_type_image());

				if(self::$sqlCall == FALSE || empty(self::$sqlCall))
	            {
            		$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(3)");
        			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
	            }else{
	            		$imageVersionInformationArray 	= imageDao::showPreviewImageVersionArrayByImageLangVersionId($obj_image_lang->getId_image_lang_version());

	            		//CREAR OBJETO
	            		$ob_conectar    				= new conectorDB();

	            		$consulta      					= "CALL ".self::$sqlCall."(:id_image_lang_version)";
	            		$valores 						= array('id_image_lang_version' => $obj_image_lang->getId_image_lang_version());

	            		$resultado     					= $ob_conectar->consultarBD($consulta,$valores);

				        foreach($resultado as &$atributo)
				        {
				            switch ($atributo['ERRNO'])
				            {
				                case 2:
				                	self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
				            		require_once(self::$file_record);

				            		self::$file_help = dirname(__DIR__).'/helps/help.php';
				            		require_once(self::$file_help);

				                	self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				                	if(self::$folder == FALSE || empty(self::$folder)){
				                	}else{
				                			self::$full_path 	= "../../../../../".self::$folder;

				                			foreach($imageVersionInformationArray as $key => $value){
						                		switch ($value['ERRNO']) {
						                			case 2:
														if(!empty($value['image_lang']) && !empty($value['iso_code'])){
															imageDao::deleteFolderWithPreviousFile($obj_image_lang->getId_type_image(),self::$full_path,$value['image_lang'],$value['iso_code']);
														}
													break;
						                		}
						                	}
				                		 }//END imageVersionInformationArray

						            	$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Elimino"],$lang_error["imagen"],$obj_image_lang->getTitle_image_lang(),$lang_record["Historial 2"]);
						            	$pagina = imageDao::returnPageImage($obj_image_lang->getId_type_image());
										//$pagina = $pagina.'-detail/'.$obj_image_lang->getId_image();

					                    $valor = array("estado" => "true","resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["imagen"],$lang_error["Error 9"]), "redireccionar" => "true","pagina" => $pagina, "item" => $obj_image_lang->getId_image_lang_version());
					                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					                    exit();
				        			break;
				                default:
				                	$valor = array("estado" => "false","error" => replaceStringTwoParametersArray("/PARA1/",ucwords($lang_error["imagen"]),"/PARA2/",$lang_error["no fue eliminado"],$lang_error["Error 9"]));
				        			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
									exit();
				                break;
				            }
				        }//FOREACH showProcedureDeleteWithImageVersion
	            	 }
			}else{
					$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(1)");
			        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
	    }

	    /**
	     * [showPreviewImageVersionArrayByImageLangVersionId description]
	     *
	     * @param  [type] $id_image_lang_version [description]
	     * @return [type]                        [description]
	     */

	    public static function showPreviewImageVersionArrayByImageLangVersionId($id_image_lang_version)
	    {
			$imageVersionInformation 				= array();

			if(!empty(intval(trim($id_image_lang_version)))){
				//CREAR OBJETO
				$ob_conectar    					= new conectorDB();

				$consulta_preview_image_version 	= "CALL showPreviewImageByImageLangVersionId(:id_image_lang_version)";
	            $resultado_preview_image_version 	= array('id_image_lang_version' => $id_image_lang_version);

	            $resultadoPIMGV    					= $ob_conectar->consultarBD($consulta_preview_image_version,$resultado_preview_image_version);

		        foreach($resultadoPIMGV as $indice => $datosPIMGV)
				{
					if($datosPIMGV['ERRNO'] == 1){
						$imageVersionInformation[] = $datosPIMGV['ERRNO'];
					}else{
							$imageVersionInformation[] = $datosPIMGV;
						 }
				}
				return $imageVersionInformation;
			}else{
					$imageVersionInformation = [
					    "ERRNO" => 1
					];
					return $imageVersionInformation;
				 }
	    }

	    /**
	     * [showProcedureDeleteWithImageVersion description]
	     *
	     * @param  [type] $type_call [description]
	     * @return [type]            [description]
	     */

	    private static function showProcedureDeleteWithImageVersion($id_call)
	    {
	    	if(!empty(intval(trim($id_call)))){
		        switch ($id_call)
		        {
		        	/*case ://
		                return "deleteImageVersionAndIdImage";
		            break;*/
		            default://GENERAL
		            	//6 = Sliders
		            	//10 = Categorías
		            	//15 = Productos
		            	//20 = Blogs
		                return "deleteImageVersion";
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [showMediaGeneralGallery description]
	     *
	     * @param  [type]  $id_table             [description]
	     * @param  [type]  $id_lang              [description]
	     * @param  [type]  $id_type_image        [description]
	     * @param  [type]  $visible_scrollbar    [description]
	     * @param  integer $x                    [description]
	     * @param  integer $id_box_media_gallery [description]
	     * @param  integer $height_gallery       [description]
	     * @param  integer $measure              [description]
	     * @param  string  $route_default        [description]
	     * @return [type]                        [description]
	     */

	    public static function showMediaGeneralGallery($id_table,$id_lang,$id_type_image,$visible_scrollbar,$x = 1,$id_box_media_gallery = 0,$height_gallery = 0,$measure = 0,$route_default = "img/image_not_found_1240.jpg")
	    {
	    	self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR $id_table NI $visible_scrollbar YA QUE SU VALOR PUEDE SER 0
			if(!empty(intval(trim($id_lang))) && !empty(intval(trim($id_type_image)))){
				//$visible_scrollbar
					//0 = Inactivo
					//1 = Activo

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

          echo('<section class="content-with-menu content-with-menu-has-toolbar media-gallery general">
					<div class="content-with-menu-container">
						<div class="inner-menu-toggle">
							<span class="inner-menu-expand" data-open="inner-menu"><i class="fas fa-chevron-right"></i></span>
						</div>');

          				if($visible_scrollbar == 1){
          		  echo('<menu id="content-menu" class="inner-menu" role="menu">
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

									<div class="inner-menu-content">');

								if(!empty(intval(trim($id_table)))){
								self::$sqlCall  = imageDao::showProcedureInformationByIdTypeImage($id_type_image);

								if(self::$sqlCall == FALSE || empty(self::$sqlCall)){
								  echo('<h3><span class="badge bg-dark">'.$lang_global["Problemas al ejecutar consulta"].'(1)</span></h3>');
								}else{
										$consulta1 		= "CALL ".self::$sqlCall."(:id_table,:id_lang)";
										$valores1 		= array('id_table' 	=> $id_table,
																'id_lang' 	=> $id_lang);

					        			$resultado1   	= $ob_conectar->consultarBD($consulta1,$valores1);

					        			foreach($resultado1 as &$value1)
								        {
								        	if($value1['ERRNO'] == 2)
								        	{
								        		if(!empty(intval(trim($value1['ID_TABLE_LANG']))) && !empty($value1['TITLE_TABLE_LANG'])){
				        		  echo('<div class="d-grid gap-1">
											<a class="modal-with-zoom-anim modal-upload-image-2-parameters btn btn-block btn-dark btn-md py-2 text-3" href="#modal-upload-image-2-parameters" data-upload-image-2-parameters="'.$value1['ID_TABLE_LANG'].'/'.stripslashes(str_replace("/", " ", $value1['TITLE_TABLE_LANG'])).'"><i class="fas fa-upload me-2"></i>'.$lang_global['Subir imagen'].'</a>');
								  echo('</div>
										<hr class="separator" />');
												}
							        		}
								        }//END FOREACH sqlCall
									 }//END sqlCall
							}//END if(!empty($id_table)

								  /*echo('<div class="sidebar-widget m-0">
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
						</menu>');
          				}

						//MEDIA GALERIA
						self::$folder = imageDao::showFolderByIdTypeImage($id_type_image);

		    			if(self::$folder == FALSE || empty(self::$folder))
		    			{
		    				echo('<h3><span class="badge bg-dark">'.$lang_global['No hay ningún registro disponible'].' (3)</span></h3>');
		    			}else{
		    					self::$sqlCall2  = imageDao::showProcedureMediaGalleryByIdTypeImage($id_type_image);

								if(self::$sqlCall2 == FALSE || empty(self::$sqlCall2)){
									echo('<h3><span class="badge bg-dark">'.$lang_global["Problemas al ejecutar consulta"].' (2)</span></h3>');
								}else{
										if($x == 1){
				  echo('<div class="inner-body mg-main'.($visible_scrollbar == 1 ? ' mg-main-left' : '') . '">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-3 mg-files" data-sort-destination data-sort-id="media-gallery" data-id-lang="'.$id_lang.'">');
									 	}

										self::$full_path 	= "../".self::$folder;

										$consulta2 			= "CALL ".self::$sqlCall2."(:parameter,:id_lang)";
										$valores2 			= array('parameter' => (!empty(intval(trim($id_table))) ? $id_table : $id_type_image),
																	'id_lang' 	=> $id_lang);

										$resultado2 = $ob_conectar->consultarBD($consulta2,$valores2);

										foreach($resultado2 as &$value2)
									 	{
									 		if($value2['ERRNO'] == 2 && $value2['TOTAL_IMAGES'] > 0 && !empty(intval(trim($value2["id_image"]))) && !empty(intval(trim($value2["id_image_lang"]))) && !empty($value2["title_image_lang"]) && !empty($value2["iso_code"]) && !empty($value2["image_lang"]) && !empty(intval(trim($value2["id_image_lang_version"]))) && !empty($value2["type_version_lang"]))
									 		{
									 			switch ($id_type_image)
							            	  	{
								            	  	case 10://CATEGORIA
								            	  		$id_box_media_gallery 	= $value2['id_category_lang_image_lang'];
								            	  	break;
								            	  	case 21://CARRUSEL
								            	  		$id_box_media_gallery 	= $value2['id_image'];
								            	  		$measure 				= 250;
								            	  	break;
								            	  	default:
								            	  		$id_box_media_gallery 	= $value2['id_image_lang_version'];
								            	  	break;
								            	}

									 			//BOX MEDIA GALLERY
						  echo('<div id="box-media-gallery-'.$id_box_media_gallery.'" class="isotope-item document col">
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
						              			imageDao::returnImage($value2['image_lang'],'',self::$full_path,0,$route_default,1,'',1);
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
						              			imageDao::returnImage($value2['image_lang'],'',self::$full_path,$measure,$route_default,1,'',1);
						            		echo('"'.(!empty($height_gallery) ? ' height="'.$height_gallery.'"' : '') . ' alt="'.stripslashes($value2['title_image_lang']).'"/>
											</a>
											<div class="mg-thumb-options">
												<div class="mg-zoom"><i class="bx bx-search"></i></div>
												<div class="mg-toolbar">');

							  			switch ($id_type_image)
						  				{
						  					case 10://CATEGORIA
						  						//MOSTRAR SECCIÓN CORRESPONDIENTE A LA IMAGEN
						  						if(!empty($value2['name_image_section_lang']))
		            	  						{
            	  							  echo('<div class="mg-option">
            	  							 			<div class="mg-group pull-left">'.$value2['name_image_section_lang'].'</div>
            	  							 		</div>');
		            	  						}
						  					break;
									  	}

											  echo('<div class="mg-group float-end">
														<!-- CAMBIAR IMAGEN -->
														<a href="#modal-update-image" class="modal-with-zoom-anim modal-update-image" data-update-image="'.$value2['id_image_lang_version'].'/'.stripslashes(str_replace("/", " ", $value2['title_image_lang'])).'/'.$id_lang.'">'.$lang_global['Cambiar imagen'].'</a>
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
										  						imageDao::returnImage($value2['image_lang'],'',self::$full_path,0,$route_default,1,'',1);

										  			 	echo('" download><i class="fas fa-download"></i> Download</a>');

								  			 	//$id_type_image
								  			 		//10 = Categoría
								  			 		//21 = Carrusel
								  			 	switch ($id_type_image)
								  				{
								  					case 10:
								  					  echo('<a class="modal-with-zoom-anim modal-delete-with-image-6-parameters dropdown-item text-1" href="#modal-delete-with-image-6-parameters" data-delete-with-image-6-parameters="'.$id_box_media_gallery.'/'.$value2['id_image'].'/'.$value2['id_image_lang'].'/'.stripslashes(str_replace("/", " ", $value2['title_image_lang'])).'/'.$id_type_image.'/box-media-gallery-"><i class="fas fa-trash me-1"></i> '.$lang_global['Eliminar'].'</a>');
								  					break;
								  					case 21:
								  					  echo('<a class="modal-with-zoom-anim modal-delete-with-image-5-parameters dropdown-item text-1" href="#modal-delete-with-image-5-parameters" data-delete-with-image-5-parameters="'.$value2['id_image'].'/'.$value2['id_image_lang'].'/'.stripslashes(str_replace("/", " ", $value2['title_image_lang'])).'/'.$id_type_image.'/box-media-gallery-"><i class="fas fa-trash me-1"></i> '.$lang_global['Eliminar'].'</a>');
								  					break;
											  	}

												  echo('</div>
													</div>
												</div>
											</div>
										</div>
										<h5 class="mg-title font-weight-semibold">'.$value2['type_version_lang'].'<small> '.$value2['format_image'].'</small></h5>
										<div class="mg-description">
											<small class="float-start text-muted">'.$lang_global['Tamaño'].': '.$value2['size_image'].'</small>
											<small class="float-end text-muted">'.$value2['last_update_image_lang'].'</small>
										</div>
									</div>
								</div>');


										 	}else{
						  echo('<div id="box-media-gallery-0" class="col">
					 				<h3><span class="badge bg-dark">'.$lang_global["No hay ningún registro disponible"].' (2)</span></h3>
					 			</div>');
											 	 }

										if(count($resultado2) == $x){
									 		$x = 1;
					  echo('</div>
						</div>');
										}
										 	$x++;
										}
									  }
			    			  }
			  echo('</div>
				</section>');
			}else{
					echo('<h3><span class="badge bg-dark">'.$lang_global["No hay ningún registro disponible"].' (1)</span></h3>');
				 }//END if(!empty($id_table) && !empty($id_lang) && !empty($id_type_image)){
	    }

	    /**
	     * [showProcedureInformationByIdTypeImage description]
	     *
	     * @param  [type] $id_call [description]
	     * @return [type]          [description]
	     */

	    public static function showProcedureInformationByIdTypeImage($id_call)
	    {
	    	if(!empty(intval(trim($id_call)))){
		        switch ($id_call)
		        {
		            case 10://Categorías
		                return "showInformationCategoryToUploadImage";
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [showProcedureMediaGalleryByIdTypeImage description]
	     *
	     * @param  [type] $id_call [description]
	     * @return [type]          [description]
	     */

	    private static function showProcedureMediaGalleryByIdTypeImage($id_call)
	    {
	    	if(!empty(intval(trim($id_call)))){
		        switch ($id_call)
		        {
		            case 10://Categorías
		                return "showMediaGalleryByCategoryId";
		                break;
		            case 21://Carrusel
		                return "showMediaGalleryCarruselByTypeImageId";
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [uploadImage2Parameters description]
	     *
	     * @param  [type]  $obj_image_lang      [description]
	     * @param  string  $imageUpload         [description]
	     * @param  string  $return_boolean      [description]
	     * @param  string  $imageWithPrefixLang [description]
	     * @param  string  $estado              [description]
	     * @param  string  $tipo_msj            [description]
	     * @param  string  $estadoRedireccionar [description]
	     * @param  integer $x                   [description]
	     * @return [type]                       [description]
	     */

   		public static function uploadImage2Parameters($obj_image_lang,$imageUpload = "",$return_boolean = "",$imageWithPrefixLang = "",$estado 				= "false",$tipo_msj = "error",$estadoRedireccionar = "true",$x = 0)
        {
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_image_lang->getId_table()))) && !empty(intval(trim($obj_image_lang->getId_table_lang()))) && !empty($obj_image_lang->getTitle_table_lang()) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_image_lang->getId_image_section()))) && !empty($obj_image_lang->getFile_type())){

				self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" => "false","error" => $lang_error["Error 14"], "redireccionar" => "false");
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
						$parameters_upload_ajax 	= imageDao::validateAjaxFileParameters($obj_image_lang,self::$full_path,array("image/jpeg","image/png","image/svg+xml"),2000000);

						$resultado_por_comas1       = implode(",", $parameters_upload_ajax);
		    			$resultados_individuales1   = explode(",", $resultado_por_comas1);

		    			$return_boolean        		= $resultados_individuales1[0];

						if($return_boolean == true)
						{
							$imageUpload        	= $resultados_individuales1[1];

							if(!empty($imageUpload))
							{
								$devuelve 			= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(0)";

					            self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
					            require_once(self::$file_record);

					            self::$file_help = dirname(__DIR__).'/helps/help.php';
					            require_once(self::$file_help);

					            //CREAR OBJETO
								$ob_conectar 		= new conectorDB();

					            self::$sqlCall  	= imageDao::showProcedureRegisterImageSectionByIdTypeImage($obj_image_lang->getId_type_image());

					            if(self::$sqlCall == FALSE || empty(self::$sqlCall))
					            {
			                		$devuelve 				= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(1)";
					            }else{
					            		$x 					= 0;
					            		//CREAR OBJETO
										$ob_conectar 		= new conectorDB();

										$consulta1       	= "CALL ".self::$sqlCall."(:id_table,:id_image_section,:id_type_image,:file_type,:file_size)";
										$valores1 			= array('id_table' 			=> $obj_image_lang->getId_table(),
																	'id_image_section' 	=> $obj_image_lang->getId_image_section(),
																	'id_type_image' 	=> $obj_image_lang->getId_type_image(),
																	'file_type' 		=> $obj_image_lang->getFile_type(),
																	'file_size' 		=> $obj_image_lang->getFile_size());

							            $resultado1 	 	= $ob_conectar->consultarBD($consulta1,$valores1);

							            foreach($resultado1 as &$atributo1)
									 	{
									 		//$obj_image_lang->getId_type_image()
										 		//10 = Categorías
										 		//20 = Blogs
									 		if($obj_image_lang->getId_type_image() == 10 || $obj_image_lang->getId_type_image() == 20)
									 		{
									 			switch ($atributo1['ERRNO'])
										 		{
										 			case 4://CORRECTO
										 				$id_image 				= $atributo1["ID_IMG"];
										 				if(!empty(intval(trim($id_image))))
										 				{
										 					self::$sqlCall2  	= imageDao::showProcedureInformationInAllLanguagesByIdTypeImage($obj_image_lang->getId_type_image());
										 					$file_type 			= explode("/", $obj_image_lang->getFile_type());

										 					if(self::$sqlCall2 == FALSE || empty(self::$sqlCall2))
												            {
												            	imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										                		$devuelve       = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(2)";
												            }else{
												            		$consulta2 	= "CALL ".self::$sqlCall2."(:id_table)";
												            		$valores2 	= array('id_table' => $obj_image_lang->getId_table());

								            						$resultado2 = $ob_conectar->consultarBD($consulta2,$valores2);

								            						foreach($resultado2 as &$atributo2)
										 							{
										 								switch ($atributo2['ERRNO']){
										 									case 2://CORRECTO
										 										if(!empty(intval(trim($atributo2['ID_TABLE_LANG']))) && !empty(intval(trim($atributo2['ID_LANG_TABLE']))) && !empty($atributo2['iso_code'])){

										 											self::$sqlCall3  = imageDao::showProcedureRegisterInformationImageLangSectionByIdTypeImage($obj_image_lang->getId_type_image());

										 											if(self::$sqlCall3 == FALSE || empty(self::$sqlCall3)){
										 												imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										 												$devuelve 	= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(3)";
										 											}else{
										 													if($file_type[0] != "video"){
														 										$imageWithPrefixLang = imageDao::renameImageLang($imageUpload,$atributo2['iso_code']);
														 									}else{
														 										$imageWithPrefixLang = $imageUpload;
														 										 }

										 													if(!empty($imageWithPrefixLang)){
										 														$consulta3  = "CALL ".self::$sqlCall3."(:id_table,:id_lang_table,:id_image,:id_image_section,:title_table_lang,:image_lang);";
										 														$valores3 	= array('id_table' => $atributo2['ID_TABLE_LANG'],
										 																			'id_lang_table' => $atributo2['ID_LANG_TABLE'],
										 																			'id_image' => $id_image,
										 																			'id_image_section' => $obj_image_lang->getId_image_section(),
										 																			'title_table_lang' => $obj_image_lang->getTitle_table_lang(),
										 																			'image_lang' => $imageWithPrefixLang);

											 													$resultado3 = $ob_conectar->consultarBD($consulta3,$valores3);

									            												foreach($resultado3 as &$atributo3)
									            												{
									            													switch ($atributo3['ERRNO']) {
									            														case 1://CORRECTO POR QUE SOLO SE REGISTRO LA IMAGEN DEL IDIOMA QUE NO SE ENCUENTRA EN LA TABLA
									            															$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],mb_strtolower($lang_error["La imagen"]),$obj_image_lang->getTitle_table_lang(),$lang_record["Historial 2"]);

																											$estado 				= "true";
																						 					$tipo_msj 				= "resultado";
																				                			$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
																				                			$estadoRedireccionar	= "true";
									            														break;
									            														case 4://CORRECTO SE REGISTRO EN AMBOS IDIOMAS
									            															if($x == 0){
									            																$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],mb_strtolower($lang_error["La imagen"]),$obj_image_lang->getTitle_table_lang(),$lang_record["Historial 2"]);
									            															}

									            															$x++;

																											self::$final_full_path  = self::$full_path."/".$imageUpload;

																							 				if(!empty(self::$final_full_path))
																							 				{
																							 					if(file_exists(self::$final_full_path))
																												{
																													if($file_type[0] != "video"){
																														//$folder,$img,$title_prefix_lang
																														imageDao::duplicateImagePrefixLang(self::$full_path,$imageUpload,$atributo2['iso_code']);

																														if($obj_image_lang->getFile_type() != "image/svg+xml")
																														{
																															imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$atributo2['iso_code']);
																														}
																													}
																												}
																											}

																											$estado 				= "true";
																						 					$tipo_msj 				= "resultado";
																				                			$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
									            														break;
									            														default:
									            															imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

									            															$devuelve = $lang_error["Error 1"]."(2)";
									            														break;
									            													}
									            												}//END FOREACH sqlCall3
										 													}else{
										 															imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										 															$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(4)";
										 														 }//END if(!empty($imageWithPrefixLang)){
										 												 }//END if(self::$sqlCall3 == FALSE || empty(self::$sqlCall3)){
										 										}else{
										 												imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										 												$devuelve = $lang_error["Error 11"]."(3)";
										 											 }//END if(!empty($atributo2['ID_TABLE_LANG']) && !empty($atributo2['ID_LANG_TABLE'])){
										 									break;
										 									default:
										 										$devuelve = $lang_error["Error 11"]."(4)";
										 									break;
										 								}//END switch ($atributo2['ERRNO']) {
										 							}//END FOREACH sqlCall2
												            	 }//END if(self::$sqlCall2 == FALSE || empty(self::$sqlCall2))
										 				}else{
										 						$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(5)";
										 					 }
										 			break;
										 			default:
										 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										 				//$atributo1['ERRNO']
											 				//1 = EL ID TIPO DE IMAGEN ES INCORRECTO
											 				//2 = EL ID IMAGEN ES INCORRECTO
											 				//3 = ESTA CATEGORIA YA CUENTA CON LA SECCION EN TODOS LOS IDIOMAS
										 				if($atributo1['ERRNO'] == 3){
										 					$devuelve 			= $lang_error["Error 28"];
										 				}else{
										 					$devuelve 			= $lang_error["Error 11"]."(".$atributo1['ERRNO'].")";
										 					 }
										 			break;
										 		}//END switch ($atributo1['ERRNO'])
									 		}else{
									 				switch ($atributo1['ERRNO'])
											 		{
											 			case 3://CORRECTO
											 				$id_image 				= $atributo1["ID_IMG"];
											 				if(!empty(intval(trim($id_image))))
											 				{
											 					self::$sqlCall2  	= imageDao::showProcedureInformationInAllLanguagesByIdTypeImage($obj_image_lang->getId_type_image());
											 					$file_type 			= explode("/", $obj_image_lang->getFile_type());

											 					if(self::$sqlCall2 == FALSE || empty(self::$sqlCall2))
													            {
													            	imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

													                $devuelve 		= $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(2)";
													            }else{
													            		$consulta2 	= "CALL ".self::$sqlCall2."(:id_table)";
												            			$valores2 	= array('id_table' => $obj_image_lang->getId_table());

									            						$resultado2 = $ob_conectar->consultarBD($consulta2,$valores2);

									            						foreach($resultado2 as &$atributo2)
											 							{
											 								switch ($atributo2['ERRNO']){
											 									case 2://CORRECTO
											 										if(!empty(intval(trim($atributo2['ID_TABLE_LANG']))) && !empty(intval(trim($atributo2['ID_LANG_TABLE']))) && !empty($atributo2['iso_code'])){

											 											self::$sqlCall3  = imageDao::showProcedureRegisterInformationImageLangSectionByIdTypeImage($obj_image_lang->getId_type_image());

											 											if(self::$sqlCall3 == FALSE || empty(self::$sqlCall3)){
											 												imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

											 												$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(3)";
											 											}else{
											 													if($file_type[0] != "video"){
															 										$imageWithPrefixLang 	= imageDao::renameImageLang($imageUpload,$atributo2['iso_code']);
															 									}else{
															 										$imageWithPrefixLang 	= $imageUpload;
															 										 }

											 													if(!empty($imageWithPrefixLang)){
											 														$consulta3       		= "CALL ".self::$sqlCall3."(".$atributo2['ID_TABLE_LANG'].",".$atributo2['ID_LANG_TABLE'].",".$id_image.",".$obj_image_lang->getId_image_section().",'".$obj_image_lang->getTitle_table_lang()."','".$imageWithPrefixLang."');";

												 													$resultado3 	 	= $ob_conectar->consultarBD($consulta3,null);

										            												foreach($resultado3 as &$atributo3)
										            												{
										            													switch ($atributo3['ERRNO']) {
										            														case 1://CORRECTO POR QUE SOLO SE REGISTRO LA IMAGEN DEL IDIOMA QUE NO SE ENCUENTRA EN LA TABLA
										            															$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],mb_strtolower($lang_error["La imagen"]),$obj_image_lang->getTitle_table_lang(),$lang_record["Historial 2"]);

																												$estado 				= "true";
																							 					$tipo_msj 				= "resultado";
																					                			$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
																					                			$estadoRedireccionar	= "true";
										            														break;
										            														case 4://CORRECTO SE REGISTRO EN AMBOS IDIOMAS
										            															if($x == 0){
										            																$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],mb_strtolower($lang_error["La imagen"]),$obj_image_lang->getTitle_table_lang(),$lang_record["Historial 2"]);
										            															}

										            															$x++;

																												self::$final_full_path  = self::$full_path."/".$imageUpload;

																								 				if(!empty(self::$final_full_path))
																								 				{
																								 					if(file_exists(self::$final_full_path))
																													{
																														if($file_type[0] != "video"){
																															//$folder,$img,$title_prefix_lang
																															imageDao::duplicateImagePrefixLang(self::$full_path,$imageUpload,$atributo2['iso_code']);

																															if($obj_image_lang->getFile_type() != "image/svg+xml")
																															{
																																imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$atributo2['iso_code']);
																															}
																														}
																													}
																												}

																												$estado 				= "true";
																							 					$tipo_msj 				= "resultado";
																					                			$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
																					                			$estadoRedireccionar	= "true";
										            														break;
										            														default:
										            															imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										            															$devuelve = $lang_error["Error 1"]."(2)";
										            														break;
										            													}
										            												}//END FOREACH sqlCall3
											 													}else{
											 															imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

											 															$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(4)";
											 														 }//END if(!empty($imageWithPrefixLang)){
											 												 }//END if(self::$sqlCall3 == FALSE && empty(self::$sqlCall3)){
											 										}else{
											 												imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

											 												$devuelve = $lang_error["Error 11"]."(3)";
											 											 }//END if(!empty($atributo2['ID_TABLE_LANG']) && !empty($atributo2['ID_LANG_TABLE'])){
											 									break;
											 									default:
											 										$devuelve 				= $lang_error["Error 11"]."(4)";
											 									break;
											 								}//END switch ($atributo2['ERRNO']) {
											 							}//END FOREACH sqlCall2
													            	 }//END if(self::$sqlCall2 == FALSE && empty(self::$sqlCall2))
											 				}else{
											 						$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(5)";
											 					 }
											 			break;
											 			default:
											 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

											 				//$atributo1['ERRNO']
												 				//1 = EL ID TIPO DE IMAGEN ES INCORRECTO
												 				//2 = EL ID IMAGEN ES INCORRECTO
											 				$devuelve = $lang_error["Error 11"]."(".$atributo1['ERRNO'].")";
											 			break;
											 		}//END switch ($atributo1['ERRNO'])
									 			 }
									    }//End CALL registerImageSection

										$valor = array("estado" => $estado, $tipo_msj => $devuelve, "redireccionar" => $estadoRedireccionar);
							            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							            exit();
					            	 }//END if(self::$sqlCall == FALSE || empty(self::$sqlCall))

					            $valor = array("estado" => $estado, $tipo_msj => $devuelve, "redireccionar" => $estadoRedireccionar, "page" => $pageRedireccionar);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();
							}else{
									$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(3)", "redireccionar" => "false");
				                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
				                    exit();
								 }
						}else{
							 	$return_error       = $resultados_individuales1[1];

								if(empty($return_error))
								{
									$return_error 	= $lang_error["Error 1"]."(4)";
								}

								$valor = array("estado" => "false","error" => $return_error, "redireccionar" => "false");
								return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
								exit();
							 }//return_boolean
					}
			}else{
					$valor = array("estado" => "false","error" => $lang_error['Error en el proceso'].$lang_error["Variables vacías"], "redireccionar" => "false");
            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
        }

        /**
         * [showProcedureRegisterImageSectionByIdTypeImage description]
         *
         * @param  [type] $id_call [description]
         * @return [type]          [description]
         */

        private static function showProcedureRegisterImageSectionByIdTypeImage($id_call)
	    {
	    	if(!empty(intval(trim($id_call)))){
		        switch ($id_call)
		        {
		            case 10://Categorías
		                return "registerImageCategory";
		                break;
		            case 20://Blog
		                return "registerImageBlog";
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [showProcedureInformationInAllLanguagesByIdTypeImage description]
	     *
	     * @param  [type] $id_call [description]
	     * @return [type]          [description]
	     */

	    private static function showProcedureInformationInAllLanguagesByIdTypeImage($id_call)
	    {
	    	if(!empty(intval(trim($id_call)))){
		        switch ($id_call)
		        {
		            case 10://Categorías
		                return "showCategoryInformationInAllLanguages";
		                break;
		            case 20://Blog
		                return "showBlogInformationInAllLanguages";
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [showProcedureRegisterInformationImageLangSectionByIdTypeImage description]
	     *
	     * @param  [type] $id_call [description]
	     * @return [type]          [description]
	     */

	    private static function showProcedureRegisterInformationImageLangSectionByIdTypeImage($id_call)
	    {
	    	if(!empty(intval(trim($id_call)))){
		        switch ($id_call)
		        {
		            case 10://Categorías
		                return "registerInformationImageLangCategory";
		                break;
		            case 20://Blog
		                return "registerInformationImageLangBlog";
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
   		 * [showSectionListImageByTypeImageId description]
   		 *
   		 * @param  [type] $id_type_section [description]
   		 * @return [type]                  [description]
   		 */

   		public static function showSectionListImageByTypeImageId($id_type_section)
   		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($id_type_section)))){
				//CREAR OBJETO
				$ob_conectar 			= new conectorDB();

				$consulta_section_list 	= "CALL showSectionListImage()";
	            $resultadoSL   			= $ob_conectar->consultarBD($consulta_section_list,null);

	          	foreach($resultadoSL as &$datosSL)
	            {
	            	if($datosSL['ERRNO'] == 2 && !empty(intval(trim($datosSL['id_image_section']))) && !empty($datosSL['name_image_section_lang']))
	            	{
	            		echo('<option value="'.$datosSL['id_image_section'].'">'.$datosSL['name_image_section_lang'].'</option>');
	            	}else{
	            			echo('<option value="">'.$lang_global['No hay secciones disponibles'].'</option>');
	            		 }
	            }
	        }
   		}

   		/**
	     * [deleteWithImage6Parameters description]
	     *
	     * @param  [type] $id_type_action [description]
	     * @param  [type] $obj_image_lang [description]
	     * @return [type]                 [description]
	     */

	    public static function deleteWithImage6Parameters($id_type_action,$obj_image_lang)
	    {
            self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_table()))) && !empty(intval(trim($obj_image_lang->getId_image()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($id_type_action))) && !empty($obj_image_lang->getTitle_table_lang()))
			{
				//CREAR OBJETO
	            $ob_conectar 	= new conectorDB();

	            //$id_type_action
                    //1 = TABLAS GENERALES
						//2 = TABLAS ESPECIFICAS DE TABLAS GENERALES

				self::$sqlCall  = imageDao::showProcedureDeleteWithImagesInTheTable($obj_image_lang->getId_type_image(),$id_type_action);

				if(self::$sqlCall == FALSE || empty(self::$sqlCall))
	            {
	        		$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(3)");
	    			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
	            }else{
	            		self::$file_help = dirname(__DIR__).'/helps/help.php';
        				require_once(self::$file_help);

	            																			//$id_type_image,$id_table,$id_type_action
			            $imageInformationArray = imageDao::showPreviewAllImagesArrayByTableId($obj_image_lang->getId_type_image(),$obj_image_lang->getId_table(),$id_type_action);

			            $consulta1     = "CALL ".self::$sqlCall."(:id_table)";
			            $valores1 	   = array('id_table' 	=> $obj_image_lang->getId_table());

			            $resultado1    = $ob_conectar->consultarBD($consulta1,$valores1);

			            foreach($resultado1 as &$atributo1)
				        {
				        	switch ($obj_image_lang->getId_type_image()) {
				        		case 10://CATEGORIAS
				        			switch ($atributo1['ERRNO'])
						            {
						            	case 2://CORRECTO
						                	self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
	    									require_once(self::$file_record);

						                	self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

						                	if(self::$folder == FALSE || empty(self::$folder)){
						                	}else{
						                			self::$full_path 	= "../../../../../".self::$folder;

						                			foreach($imageInformationArray as $key => $value){
								                		switch ($value['ERRNO']) {
								                			case 2:
																if(!empty($value['image_lang']) && !empty($value['iso_code'])){
		            												imageDao::deleteFolderWithPreviousFile($obj_image_lang->getId_type_image(),self::$full_path,$value['image_lang'],$value['iso_code']);
																}
															break;
								                		}
								                	}
						                		 }//END imageInformationArray

								            	ConectorDB::registerRecordTwoParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Elimino"],$obj_image_lang->getTitle_table_lang(),$lang_record["Historial 3"]);

							                    $page 	= imageDao::returnPageImage($obj_image_lang->getId_type_image());

							                    $valor 	= array("estado" => "true","item" => $obj_image_lang->getId_table(),"resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$obj_image_lang->getTitle_table_lang(),$lang_error["Error 9"]),"pagina" => $page);
							                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							                    exit();
						        			break;
						                default://EL ID NO CORRESPONDE AL REGISTRO SOLICITADO
						                	$valor = array("estado" => "false","error" => $lang["Error 11"]);
						            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
						                break;
						            }
				        		break;
				        		default://GENERAL
				        			switch ($atributo1['ERRNO'])
						            {
						                case 2:
						                	self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
	    									require_once(self::$file_record);

						                	self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

						                	if(self::$folder == FALSE || empty(self::$folder)){
						                	}else{
						                			self::$full_path 	= "../../../../../".self::$folder;

						                			foreach($imageInformationArray as $key => $value){
								                		switch ($value['ERRNO']) {
								                			case 2:
																if(!empty($value['image_lang']) && !empty($value['iso_code'])){
		            												imageDao::deleteFolderWithPreviousFile($obj_image_lang->getId_type_image(),self::$full_path,$value['image_lang'],$value['iso_code']);
																}
															break;
								                		}
								                	}
						                		 }//END imageInformationArray

								            	ConectorDB::registerRecordTwoParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Elimino"],$obj_image_lang->getTitle_table_lang(),$lang_record["Historial 3"]);

							                    $page 	= imageDao::returnPageImage($obj_image_lang->getId_type_image());

							                    $valor 	= array("estado" => "true","item" => $obj_image_lang->getId_table(),"resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$obj_image_lang->getTitle_table_lang(),$lang_error["Error 9"]),"pagina" => $page);
							                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							                    exit();
						        			break;
						                default://EL ID NO CORRESPONDE AL REGISTRO SOLICITADO
						                	$valor = array("estado" => "false","error" => $lang["Error 11"]);
						            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
						                break;
						            }
				        		break;
				        	}
				        }//End CALL showProcedureDeleteWithImagesInTheTable
	            	 }
			}else{
					$valor = array("estado" => "false","error" => $lang_error["Error 1"]."(1)");
            		return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
	    }

	    /**
	     * [showProcedureDeleteWithImagesInTheTable description]
	     *
	     * @param  [type] $id_call        [description]
	     * @param  [type] $id_type_action [description]
	     * @return [type]                 [description]
	     */

	    private static function showProcedureDeleteWithImagesInTheTable($id_call,$id_type_action)
	    {
	    	//$id_type_action
  				//1 = TABLAS GENERALES
  				//2 = TABLAS ESPECIFICAS DE TABLAS GENERALES

	    	if(!empty(intval(trim($id_call))) && !empty(intval(trim($id_type_action)))){
		        switch ($id_call)
		        {
		            case 10://Categorías
		            	if($id_type_action == 1){
		            		return "deleteCategoryWithImage";
		            	}else{
		            		return "deleteCategoryLangImageLang";
		            		 }
		                break;
		            case 20://Blog
		            	if($id_type_action == 1){
		            		return "deleteBlogWithImage";
		            	}else{
		            		return "deleteBlogLangImageLang";
		            		 }
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [showPreviewAllImagesArrayByTableId description]
	     *
	     * @param  [type] $id_type_image  [description]
	     * @param  [type] $id_table       [description]
	     * @param  [type] $id_type_action [description]
	     * @return [type]                 [description]
	     */

	    private static function showPreviewAllImagesArrayByTableId($id_type_image,$id_table,$id_type_action)
		{
			if(!empty(intval(trim($id_type_image))) && !empty(intval(trim($id_table)))){

				$imageInformation 	= array();

				self::$sqlCall2  	= imageDao::showProcedureAllImagesInTheTable($id_type_image,$id_type_action);

				if(self::$sqlCall2 == FALSE || empty(self::$sqlCall2))
	            {
	            	$imageInformation = [
					    "ERRNO" => 1
					];
					return $imageInformation;
	            }else{
	            		//CREAR OBJETO
		            	$ob_conectar 	= new conectorDB();

	            		$consulta      	= "CALL ".self::$sqlCall2."(:id_table)";
	            		$valores 		= array('id_table' 	=> $id_table);

	    				$resultado    	= $ob_conectar->consultarBD($consulta,$valores);

	    				foreach($resultado as $indice => $datos)
						{
							if($datos['ERRNO'] == 1){
								$imageInformation[] = $datos['ERRNO'];
							}else{
									$imageInformation[] = $datos;
								 }
						}
						return $imageInformation;
	            	 }
	           }else{
	           			$imageInformation = [
						    "ERRNO" => 1
						];
						return $imageInformation;
	           	    }
		}

		/**
	     * [showProcedureAllImagesInTheTable description]
	     *
	     * @param  [type] $id_call        [description]
	     * @param  [type] $id_type_action [description]
	     * @return [type]                 [description]
	     */

	    private static function showProcedureAllImagesInTheTable($id_call,$id_type_action)
	    {
	    	//$id_type_action
  				//1 = TABLAS GENERALES
  				//2 = TABLAS ESPECIFICAS DE TABLAS GENERALES

	    	if(!empty(intval(trim($id_call))) && !empty(intval(trim($id_type_action)))){

		        switch ($id_call)
		        {
		            case 10://Categorías
		            	if($id_type_action == 1){
		            		return "showAllImagesInTheCategory";
		            	}else{
		            		return "showAllCategoryLangImageLang";
		            		 }
		                break;
		            case 20://Blog
		            	if($id_type_action == 1){
		            		return "showAllBlogImages";
		            	}else{
		            		return "showAllBlogLangImageLang";
		            		 }
		                break;
		            default://GENERAL
		                return FALSE;
		            break;
		        }
		    }else{
	    			return FALSE;
	    		 }
	    }

	    /**
	     * [showAllVersionsOfTheImageByImageLangId description]
	     *
	     * @param  [type] $id_image_lang            [description]
	     * @param  [type] $id_lang                  [description]
	     * @param  [type] $default_route_type_image [description]
	     * @param  [type] $measure                  [description]
	     * @param  [type] $class_height             [description]
	     * @param  string $route_default            [description]
	     * @return [type]                           [description]
	     */

	    public static function showAllVersionsOfTheImageByImageLangId($id_image_lang,$id_lang,$default_route_type_image,$measure,$class_height,$route_default = "img/image_not_found_1240.jpg")
	    {
			if(!empty(intval(trim($id_image_lang))) && !empty(intval(trim($id_lang))) && !empty($default_route_type_image)){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta      	= "CALL showAllVersionsOfTheImageByImageLangId(:id_image_lang,:id_lang)";
	            $valores  		= array('id_image_lang' => $id_image_lang,
										'id_lang' 		=> $id_lang);

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
	            {
	            	if($datos['ERRNO'] == 2)
	            	{
	            		switch ($datos['id_type_version']) {
	            			case 1://Dispositivos XX-Large (escritorios más grandes, 1400 px y más)
	            				$media 		= 'media="(min-width: 1400px)"';
	            			break;
	            			case 2://Dispositivos X-Large (equipos de escritorio grandes, 1200 px y más)
	            				$media 		= 'media="(min-width: 1200px)"';
	            			break;
	            			case 3://Dispositivos grandes (computadoras de escritorio, 992 px y más)
	            				$media 		= 'media="(min-width: 992px)"';
	            			break;
	            			case 4://Dispositivos medianos (tabletas, 768 px y más)
	            				$media 		= 'media="(min-width: 768px)"';
	            			break;
	            			case 5://Dispositivos pequeños (teléfonos horizontales, 576 px y más)
	            				$media 		= 'media="(min-width: 576px)"';
	            			break;
	            			case 6://Dispositivos X-Small (teléfonos verticales, menos de 576 px)
	            				$media 		= 'media="(max-width: 575px)"';
	            			break;
	            			default:
	            				$media 		= 'media="(min-width: 0px)"';
	            			break;
	            		}

	          echo('<source '.$media.' srcset="');
	          								//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
	            		imageDao::returnImage($datos['image_lang'],'',$default_route_type_image,$measure,$route_default,1,'',1);
	            	echo('">');
	            	}
	            }
			}
	    }
	}