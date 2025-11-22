<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/tax_rule_lang.php");

	class taxRuleLangDao
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
   		 * [showSelectedtaxRuleLangList description]
   		 *
   		 * @param  [type] $id_tax_rule_selected [description]
   		 * @return [type]                       [description]
   		 */

		public static function showSelectedtaxRuleLangList($id_tax_rule_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//CREAR OBJETO
			$ob_conectar 				= new conectorDB();

			$consulta_tax_rule_list 	= "CALL showtaxRuleLangList()";
		    $resultado_tax_rule_list   	= $ob_conectar->consultarBD($consulta_tax_rule_list,null);

		  	foreach($resultado_tax_rule_list as &$datos_tax_rule_list)
		    {
		    	if($datos_tax_rule_list['ERRNO'] == 2 && !empty($datos_tax_rule_list['id_tax_rule']) && !empty($datos_tax_rule_list['title_tax_rule_lang']))
		    	{
		    		echo('<option value="'.$datos_tax_rule_list['id_tax_rule'].'" '.($datos_tax_rule_list['id_tax_rule'] == $id_tax_rule_selected ? 'selected="selected"' : '').'>'.$datos_tax_rule_list['title_tax_rule_lang'].'</option>');
		    	}else{
		    		echo('<option value="">'.$lang_global['No hay versiones disponibles'].'</option>');
		    		 }
		    }
		}
   	}