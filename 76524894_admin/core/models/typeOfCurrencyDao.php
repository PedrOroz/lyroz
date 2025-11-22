<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/type_of_currency_lang.php");

	class typeOfCurrencyDao
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
   		 * [showSelectedtypeOfCurrencyList description]
   		 * 
   		 * @param  [type] $id_type_of_currency_selected [description]
   		 * @return [type]                               [description]
   		 */
   		
   		public static function showSelectedtypeOfCurrencyList($id_type_of_currency_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//CREAR OBJETO
			$ob_conectar 						= new conectorDB();

			$consulta_type_of_currency_list 	= "CALL showtypeOfCurrencyList()";
		    $resultado_type_of_currency_list   	= $ob_conectar->consultarBD($consulta_type_of_currency_list,null);

		  	foreach($resultado_type_of_currency_list as &$datos_type_of_currency_list)
		    {
		    	if($datos_type_of_currency_list['ERRNO'] == 2 && !empty($datos_type_of_currency_list['id_type_of_currency']) && !empty($datos_type_of_currency_list['type_of_currency_lang']))
		    	{
		      echo('<option value="'.$datos_type_of_currency_list['id_type_of_currency'].'"'.($datos_type_of_currency_list['id_type_of_currency'] == $id_type_of_currency_selected ? ' selected="selected"' : '').'>'.$datos_type_of_currency_list['type_of_currency_lang'].'</option>');
		    	}else{
		      echo('<option value="">'.$lang_global['No hay versiones disponibles'].'</option>');
		    		 }
		    }
		}
   	}