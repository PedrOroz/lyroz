<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/lang.php");
	//EL ARCHIVO conectorDB.php REQUIERE CLASES DE imageDao.php
	//require_once(dirname(__DIR__)."/models/imageDao.php");
	require_once(dirname(__DIR__)."/models/cfg/conectorDB.php");

	class langDao
	{
		protected static	$ob_conectar;
        private  			$consulta;
        private 			$ruta;
        protected static 	$file_error 	= "";
        protected static 	$file_global 	= "";
        
        public function __construct(){
        	date_default_timezone_set((defined('TIMEZONE_CMS') ? TIMEZONE_CMS : TIMEZONE_FRONT));
	    }

	    public function __destruct(){
	    }

	    public function __clone(){
   			trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
   		}

   		/**
   		 * [prefixLangDefault description]
   		 *
   		 * @param  [type] $ruta [description]
   		 * @return [type]       [description]
   		 */

   		public static function prefixLangDefault($ruta)
   		{
   			//$type_attribute
   				//1 = id_lang
   				//2 = lang
   				//3 = iso_code
   				
   									//$type_attribute
			return $ruta.langDao::showDefaultLanguage(3).".php";
   		}

   		/**
   		 * [showDefaultLanguage description]
   		 * 
   		 * @param  [type] $type_attribute [description]
   		 * @return [type]                 [description]
   		 */
   		
   		private static function showDefaultLanguage($type_attribute)
   		{
   			if(!empty(intval(trim($type_attribute)))){
   				//CREAR OBJETO
   				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDefaultLanguage()";
	            $resultado   	= $ob_conectar->consultarBD($consulta,null);

	          	foreach($resultado as &$datos)
	            {
	            	switch ($type_attribute) {
	            		case 1://id_lang
	            			if($datos['ERRNO'] == 2)
			            	{
			            		return $datos['id_lang'];
			            	}else{
			            			return 1;
			            		 }
	            			break;
	            		case 2://lang
	            			if($datos['ERRNO'] == 2)
			            	{
			            		return $datos['lang'];
			            	}else{
			            			return "Español";
			            		 }
	            			break;
	            		default://iso_code
	            			if($datos['ERRNO'] == 2)
			            	{
			            		return $datos['iso_code'];
			            	}else{
			            			return "ESP";
			            		 }
	            			break;
	            	}
	            }
			}
   		}

   		/**
   		 * [prefixLangByIdLang description]
   		 *
   		 * @param  [type] $obj_lang [description]
   		 * @return [type]           [description]
   		 */

   		public static function prefixLangByIdLang($obj_lang)
   		{
   			//CREAR OBJETO
   			$ob_conectar 			= new conectorDB();

			$consulta_prefix_lang 	= "CALL prefixLangByIdLang(:id_lang)";
			$valores_prefix_lang 	= array('id_lang' => $obj_lang->getId_lang());

            $resultadoPL   			= $ob_conectar->consultarBD($consulta_prefix_lang,$valores_prefix_lang);

          	foreach($resultadoPL as &$datosPL)
            {
            	if($datosPL['ERRNO'] == 2)
            	{
            		return $datosPL['iso_code'];
            	}else{
            			return "ESP";
            		 }
            }
   		}

   		/**
   		 * [showListOfLanguagesWithWelectedLanguage description]
   		 *
   		 * @param  [type] $obj_lang [description]
   		 * @return [type]           [description]
   		 */

   		public static function showListOfLanguagesWithWelectedLanguage($obj_lang)
   		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_lang->getId_lang())))){
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showActiveLanguage()";
	            $resultado   	= $ob_conectar->consultarBD($consulta,null);

	          	foreach($resultado as &$datos)
	            {
	            	if($datos['ERRNO'] == 2)
	            	{
		                if(empty(intval(trim($datos['id_lang']))) && empty($datos['lang']))
		                {
		                	echo('<option value="">'.$lang_error['Error 1'].'</option>');
		                }else{
		                		echo('<option value="'.$datos['id_lang'].'" '.($datos['id_lang'] == $obj_lang->getId_lang() ? 'selected="selected"' : '') . '>'.$datos['lang'].'</option>');
		                     }
	            	}else{
	            			echo('<option value="">'.$lang_error["Error 1"].'(1)</option>');
	            		 }
	            }
			}else{
					echo('<option value="">'.$lang_error['Error en el proceso'].$lang_error['Variables vacías'].'</option>');
				 }
   		}

   		/**
   		 * [langIdLanguage description]
   		 * 
   		 * @return [type] [description]
   		 */
   		
   		public static function langIdLanguage()
   		{
   			//$type_attribute
				//1 = id_lang
				//2 = lang
				//3 = iso_code
   				
   										//$type_attribute
			return langDao::showDefaultLanguage(1);
   		}
   	}