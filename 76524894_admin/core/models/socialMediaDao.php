<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/social_media.php");

	class socialMediaDao
	{
		protected static	$ob_conectar;
		private  			$consulta;
        protected static 	$file_error 		= "";
        protected static 	$file_record 		= "";
        protected static 	$file_help 			= "";
        protected static 	$file_global 		= "";
        protected static 	$file_core 			= "";

	    public function __construct(){
	    	date_default_timezone_set((defined('TIMEZONE_CMS') ? TIMEZONE_CMS : TIMEZONE_FRONT));
	    }

	    public function __destruct(){
	    }

	    public function __clone(){
   			trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
   		}

   		/**
   		 * [showSocialNetworkList description]
   		 * 
   		 * @param  [type] $id_social_media_selected [description]
   		 * @return [type]                           [description]
   		 */
   		
		public static function showSocialNetworkList($id_social_media_selected)
   		{
			//NO ES NECESARIO VALIDAR $id_social_media_selected YA QUE SU VALOR PUEDE SER 0
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//CREAR OBJETO
			$ob_conectar 				= new conectorDB();

			$consulta_social_network 	= "CALL showSocialNetworkList()";
            
            $resultadoSN   				= $ob_conectar->consultarBD($consulta_social_network,null);

          	foreach($resultadoSN as &$datosSN)
            {
            	if($datosSN['ERRNO'] == 2 && $datosSN['TOTAL_SOCIAL_NETWORK'] > 0)
            	{
            		if(empty($datosSN['id_social_media']) || empty($datosSN['name_social_media']))
	                {
	                	echo('<option value="">'.$lang_error["Error 1"].'</option>');
	                }else{
	                		echo('<option value="'.$datosSN['id_social_media'].'"'.($id_social_media_selected == $datosSN['id_social_media'] ? ' selected' : '') . '>'.$datosSN['name_social_media'].'</option>');
	                     }
            	}else{
            			echo('<option value="">'.$lang_error["Error 1"].'</option>');
            		 }

            }
   		}

   		/**
   		 * [showSocialNetworkIconByIdSocialMedia description]
   		 *
   		 * @param  [type] $id_social_media [description]
   		 * @param  [type] $measure_icon    [description]
   		 * @return [type]                  [description]
   		 */

   		public static function showSocialNetworkIconByIdSocialMedia($id_social_media,$measure_icon)
   		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//CREAR OBJETO
            $ob_conectar 	= new conectorDB();

			$consulta 		= "CALL showSocialNetworkBySocialMediaId(:id_social_media)";
			$valores 		= array('id_social_media' => $id_social_media);

            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

          	foreach($resultado as &$datos)
            {
            	if($datos['ERRNO'] == 2)
            	{
            		$icon_social_media    = $datos['icon_social_media'];

	                if(empty($icon_social_media) || empty($measure_icon))
	                {
	                	return $lang_error["Icono"];
	                }else{
	                		return '<i class="'.$icon_social_media.'" style="font-size: '.$measure_icon.'px;"></i>';
	                     }
            	}else{
            			return $lang_error["Icono"];
            		 }
            }
   		}
   	}