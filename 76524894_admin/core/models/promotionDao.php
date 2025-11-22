<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/type_promotion_lang.php");

	class promotionDao
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
   		 * [showPromotionTypeList description]
   		 * 
   		 * @param  [type] $id_lang                    [description]
   		 * @param  [type] $id_type_promotion_selected [description]
   		 * @return [type]                             [description]
   		 */
   		
   		public static function showPromotionTypeList($id_lang,$id_type_promotion_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR id_type_promotion_selected YA QUE EL VALOR PUEDE SER NULL
			if(!empty(intval(trim($id_lang)))){
				//CREAR OBJETO
				$ob_conectar 					= new conectorDB();

				$consulta_promotion_type_list 	= "CALL showPromotionTypeList(:id_lang)";
				$valores_promotion_type_list	= array('id_lang' => $id_lang);
			    
			    $resultadoPTL   				= $ob_conectar->consultarBD($consulta_promotion_type_list,$valores_promotion_type_list);

			  	foreach($resultadoPTL as &$datosPTL)
			    {
			    	if($datosPTL['ERRNO'] == 2)
			    	{
			    		if(empty($datosPTL['id_type_promotion']) && empty($datosPTL['type_promotion_lang']))
			            {
			            	echo('<option value="">'.$lang_global['No hay versiones disponibles'].'</option>');
			            }else{
			            		echo('<option value="'.$datosPTL['id_type_promotion'].'"'.(!empty($id_type_promotion_selected) && $id_type_promotion_selected == $datosPTL['id_type_promotion'] ? ' selected="selected"' : '').'>'.$datosPTL['type_promotion_lang'].'</option>');
			                 }
			    	}else{
			    			echo('<option value="">'.$lang_global['Variables vacías'].'</option>');
			    		 }
			    }
			}
		}
   	}