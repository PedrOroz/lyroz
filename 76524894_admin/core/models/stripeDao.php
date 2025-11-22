<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/stripe_lang.php");

	class stripeDao
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
   		 * [showStripeList description]
   		 * 
   		 * @param  [type] $id_lang            [description]
   		 * @param  [type] $id_stripe_selected [description]
   		 * @return [type]                     [description]
   		 */
   		
   		public static function showStripeList($id_lang,$id_stripe_selected)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//NO ES NECESARIO VALIDAR id_stripe_selected YA QUE EL VALOR PUEDE SER NULL
			if(!empty(intval(trim($id_lang)))){
				//CREAR OBJETO
				$ob_conectar 			= new conectorDB();

				$consulta_stripe_list 	= "CALL showStripeList(:id_lang)";
				$valores_stripe_list 	= array('id_lang' => $id_lang);

			    $resultadoSL   			= $ob_conectar->consultarBD($consulta_stripe_list,$valores_stripe_list);

			  	foreach($resultadoSL as &$datosSL)
			    {
			    	if($datosSL['ERRNO'] == 2)
			    	{
			    		if(empty($datosSL['id_stripe']) && empty($datosSL['title_stripe_lang']))
			            {
			            	echo('<option value="">'.$lang_global['No hay versiones disponibles'].'</option>');
			            }else{
			            		echo('<option value="'.$datosSL['id_stripe'].'"'.(!empty($id_stripe_selected) && $id_stripe_selected == $datosSL['id_stripe'] ? ' selected="selected"' : '').'>'.$datosSL['title_stripe_lang'].'</option>');
			                 }
			    	}else{
			    			echo('<option value="">'.$lang_global['Variables vacías'].'</option>');
			    		 }
			    }
			}
		}
   	}