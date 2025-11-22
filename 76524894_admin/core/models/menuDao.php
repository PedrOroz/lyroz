<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/menu_lang.php");

	class menuDao
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
		 * [showMenuList description]
		 * 
		 * @param  [type] $id_menu_selected [description]
		 * @return [type]                   [description]
		 */
		
		public static function showMenuList($id_menu_selected)
   		{
   			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR $id_menu_selected YA QUE SU VALOR PUEDE SER 0
			
			//CREAR OBJETO
			$ob_conectar 	= new conectorDB();

			$consulta_menu 	= "CALL showMenuList()";
            $resultadoM   	= $ob_conectar->consultarBD($consulta_menu,null);

          	foreach($resultadoM as &$datosM)
            {
            	if($datosM['ERRNO'] == 2 || empty(intval(trim($datosM['id_menu']))) || empty($datosM['title_menu_lang']))
            	{
            		echo('<option value="'.$datosM['id_menu'].'"'.($id_menu_selected == $datosM['id_menu'] ? ' selected' : '') . '>'.$datosM['title_menu_lang'].'</option>');
            	}else{
            			echo('<option value="">'.$lang_global['No hay secciones disponibles, registre una'].'</option>');
            		 }
            }
   		}
	}