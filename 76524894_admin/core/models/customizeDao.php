<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/type_customize_lang.php");

	class customizeDao
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
	     * [showAThemeAttributeByUserId description]
	     *
	     * @param  [type] $id_user   [description]
	     * @param  [type] $type_info [description]
	     * @return [type]            [description]
	     */

	    public static function showAThemeAttributeByUserId($id_user,$type_info)
        {
        	if(!empty(intval(trim($id_user))) && !empty(intval(trim($type_info)))){

				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL showAThemeByUserId(:id_user)";
	            $valores 		= array('id_user' => $id_user);

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				switch ($type_info) {
			 					case 1://name_customize_lang
			 						return $atributo['name_customize_lang'];
			 					break;
			 					case 2://background_image_customize_lang
			 						return $atributo['background_image_customize_lang'];
			 					break;
			 					case 3://background_color_customize_lang
			 						return $atributo['background_color_customize_lang'];
			 					break;
			 					case 4://color_customize_lang
			 						return $atributo['color_customize_lang'];
			 					break;
			 					case 5://text_block_1_customize_lang
			 						return $atributo['text_block_1_customize_lang'];
			 					break;
			 					case 6://id_customize
			 						return $atributo['id_customize'];
			 					break;
			 					default:
			 						return false;
			 					break;
			 				}
			 			break;
			 			default:
			 				return false;
			 			break;
			 		}
			    }
			}
        }

        /**
         * [showAllBackgroundsOfTheTheme description]
         * 
         * @param  [type]  $id_customize_selected [description]
         * @param  string  $image_lang            [description]
         * @param  integer $x                     [description]
         * @param  string  $route_default         [description]
         * @return [type]                         [description]
         */
        
        public static function showAllBackgroundsOfTheTheme($id_customize_selected,$image_lang = "",$x = 1,$route_default = "img/image_not_found_580.jpg")
   		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($id_customize_selected))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showAllBackgroundsOfTheThemeByCustomizeId(:id_customize)";
				$valores 		= array('id_customize' => $id_customize_selected);

	            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

	          	foreach($resultado as &$datos)
	            {
	            	if($datos['ERRNO'] == 2 && $datos['TOTAL_BACKGROUNDS'] > 0 && !empty(intval(trim($datos['id_customize']))) && !empty($datos['name_customize_lang']))
	            	{
	            		if($x == 1){
	            			self::$folder 	= customizeDao::showFolderByCustomizeId($datos['id_customize']);

                			if(!empty(self::$folder)){
                				if(self::$folder == FALSE || empty(self::$folder))
								{
									self::$full_path		= "";
								}else{
										self::$full_path 	= "../".self::$folder;
									 }
                			}

	              echo('<div class="owl-carousel owl-theme" data-plugin-carousel data-plugin-options=\'{ "dots": true, "loop": false, "margin": 20, "nav": false, "responsive": {"0":{"items":1 }, "600":{"items":3 }, "1000":{"items":4 } }  }\'>');
	          			}
	          				if(!empty($datos['background_image_customize_lang']) && !empty(self::$full_path))
	                		{
					  echo('<div class="item">
								<div class="radio-custom radio-success">');
	                  		echo('<input type="radio" id="id_customize_'.$datos['id_customize'].'" name="id_customize"  value="'.$datos['id_customize'].'">
	                  				<label for="id_customize_'.$datos['id_customize'].'">
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
					              			imageDao::returnImage($datos['background_image_customize_lang'],'',self::$full_path,0,$route_default,1,'',1);
				            			 	echo('" data-bs-toggle="tooltip" title="'.$datos['name_customize_lang'].'">
											<img class="img-thumbnail" src="');
																	//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
				              					imageDao::returnImage($datos['background_image_customize_lang'],'',self::$full_path,201,$route_default,1,'',1);
				            			 	echo('" />
					            		</a>
									</label>
								</div>
							</div>');
							}
				        if(count($resultado) == $x){
		            		$x = 1;
		              echo('</div>');
		            	}

                		$x++;
	            	}else{
	            			echo('<h3><span class="badge bg-dark">'.$lang["Error 1"].'(1)</span></h3>');
	            		 }
	            }
			}
   		}

   		/**
   		 * [showFolderByCustomizeId description]
   		 *
   		 * @param  [type] $id_customize [description]
   		 * @return [type]               [description]
   		 */

   		public static function showFolderByCustomizeId($id_customize)
	    {
        	if(!empty(intval(trim($id_customize))))
        	{
        		//CREAR OBJETO
	            $ob_conectar    = new conectorDB();

	            $consulta       = "CALL showFolderByCustomizeId(:id_customize)";
	            $valores 		= array('id_customize' => $id_customize);

	            $resultado      = $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
	            {
	                if($atributo['ERRNO'] == 1)
	                {
	                    return false;
	                }else{
	                        return $atributo['default_type_route_customize'];
	                     }
	            }
        	}
	    }
	}