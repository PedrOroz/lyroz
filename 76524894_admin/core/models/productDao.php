<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_lang.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_category.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_lang_image_lang.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/type_tag_lang.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_lang_additional_information.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_lang_promotion.php");
	require_once(dirname(__DIR__)."/controllers/functions/entities/product_stripe.php");
	//TAX RULE
	require_once(dirname(__DIR__)."/models/taxRuleLangDao.php");
	//TAX CURRENCY
	require_once(dirname(__DIR__)."/models/typeOfCurrencyDao.php");
	//CATEGORY
	require_once(dirname(__DIR__)."/models/categoryDao.php");
	//ATRIBUTE
	require_once(dirname(__DIR__)."/models/attributeDao.php");
	//PROMOTION
	require_once(dirname(__DIR__)."/models/promotionDao.php");
	//STRIPE
	require_once(dirname(__DIR__)."/models/stripeDao.php");
	//PRODUCT PRESENTATION
	require_once(dirname(__DIR__)."/models/productPresentationDao.php");

	class productDao
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

	    public function __destruct() {
	    }

	    public function __clone(){
   			trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
   		}

   		/**
   		 * [getNewProductId description]
   		 *
   		 * @param  [type] $url_carpeta_admin [description]
   		 * @return [type]                    [description]
   		 */

   		public static function getNewProductId($url_carpeta_admin)
		{
			if(!empty($url_carpeta_admin)){

				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
				require(self::$file_global);

				//CREAR OBJETO
				$ob_conectar 			= new conectorDB();

				$consulta_new_product 	= "CALL getNewProductId()";
			    $resultado_new_product  = $ob_conectar->consultarBD($consulta_new_product,null);

			  	foreach($resultado_new_product as &$datos_new_product)
			    {
		    		if(!empty(intval(trim($datos_new_product['ID_PRODUCT'])))){
		          echo('<a href="'.$url_carpeta_admin.'/catalogue-product-detail/'.$datos_new_product['ID_PRODUCT'].'" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ '.$lang_global["Nuevo producto"].'</a>');
		            }
			    }
			}
		}

		/**
		 * [getTotalProducts description]
		 *
		 * @return [type] [description]
		 */

		public static function getTotalProducts()
		{
			//CREAR OBJETO
			$ob_conectar 	= new conectorDB();

			$consulta 		= "CALL getTotalProducts()";
		    $resultado  	= $ob_conectar->consultarBD($consulta,null);

		  	foreach($resultado as &$datos)
		    {
	    		echo($datos['TOTAL_PRODUCTS']);
		    }
		}

		/**
		 * [showRegisteredProductsMainWithLimit description]
		 *
		 * @param  [type]  $obj_image_lang [description]
		 * @param  integer $x              [description]
		 * @param  [type]  $valores        [description]
		 * @return [type]                  [description]
		 */

		public static function showRegisteredProductsMainWithLimit($obj_image_lang,$x = 1,$valores = null)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showProductsWithLimit(:limit)";
				$valores 		= array('limit' => 5);

				$resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_PRODUCTS'] > 0 && !empty(intval(trim($datos['id_product']))) && !empty(intval(trim($datos['id_product_lang']))) && !empty($datos['title_product_lang'])){

            		  	if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			          echo('<div class="row">
								<div class="col-12">
									<div class="card card-modern">
										<div class="card-header">
											<div class="card-actions">
												<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											</div>
											<h2 class="card-title">'.$lang_global["Productos recientes"].'</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-ecommerce-simple table-borderless table-striped mb-1">
													<thead>
														<tr>
															<th colspan="2">'.$lang_global["Nombre"].'</th>
														</tr>
													</thead>
													<tbody>');
							}
  							  				  	  echo('<tr>
															<td width="65">');
		            		  																//$id_product_lang,$id_type_image
							            		  				productDao::showProductImage($datos['id_product_lang'],$obj_image_lang->getId_type_image());
							            		  	  echo('</td>
															<td><a href="'.URL_CARPETA_ADMIN.'/catalogue-product-detail/'.$datos['id_product'].'" class="font-weight-semibold">'.limitar_cadena(stripslashes($datos['title_product_lang']), 20, "...").'</a></td>
														</tr>');
            			if(count($resultado) == $x){
							  				  echo('</tbody>
												</table>
											</div>
											<a href="'.URL_CARPETA_ADMIN.'/catalogue-product" class="btn btn-light btn-xl border font-weight-semibold text-color-dark text-3 mt-3">'.$lang_global["Ver todo"].'</a>
										</div>
									</div>
								</div>
							</div>');
							}
							$x++;
            		}
            	}
			}
		}

		/**
		 * [showRegisteredProducts description]
		 *
		 * @param  [type]  $obj_image_lang [description]
		 * @param  integer $x              [description]
		 * @return [type]                  [description]
		 */

		public static function showRegisteredProducts($obj_image_lang,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableProduct".($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? '' : 'ByUser') ."(".($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? '' : ':id_user') .")";

				$valores = $_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? null : array('id_user' => intval(trim($_SESSION['id_user_dao'])));

				$resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_PRODUCTS'] > 0 && !empty(intval(trim($datos['id_product']))) && !empty(intval(trim($datos['id_product_lang']))) && !empty($datos['title_product_lang'])){

            		  	$creation_date_product_lang 	= new Datetime($datos['creation_date_product_lang']);
						$creationFormatted 			= IntlDateFormatter::formatObject(
						  	$creation_date_product_lang,
						  	'EEEE dd MMMM yyyy',
						  	'es'
						);

						$last_update_product_lang 		= new Datetime($datos['last_update_product_lang']);
						$lastFormatted 				= IntlDateFormatter::formatObject(
						  	$last_update_product_lang,
						  	'EEEE dd MMMM yyyy',
						  	'es'
						);

            		  	if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			          echo('<table class="table table-ecommerce-simple table-striped mb-0" id="datatable-products-list">
								<thead>
									<tr>
										<th>'.$lang_global['Imagen'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['¿Quién lo creo?'].'</th>' : '').'
										<th>'.$lang_global['Producto'].'</th>
										<th>'.$lang_global['SKU / Código de referencia'].'</th>
										<th>'.$lang_global['Categoría'].'</th>
										<th>'.$lang_global['Tipo'].'</th>
										<th>'.$lang_global["Precio"].'<br/>('.$lang_global["Con IVA"].')</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['Mostrar en carrusel'].'</th>' : '').'
										<th>'.($_SESSION['id_role_dao'] <= 2 ? $lang_global['Estatus Usuario'] : $lang_global['Estatus']).'</th>
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody class="row_position">');
							}
  							  echo('<tr id="item-id_product-'.$datos['id_product'].'" data-id="'.$datos['id_product'].'">
										<td>');
		            		  											//$id_product_lang,$id_type_image
		            		  				productDao::showProductImage($datos['id_product_lang'],$obj_image_lang->getId_type_image());
		            		  	  echo('</td>
										'.($_SESSION['id_role_dao'] <= 2 && !empty(intval(trim($datos['id_user']))) && !empty(intval(trim($datos['id_role']))) && !empty($datos['full_name']) ? '<td><a href="'.URL_CARPETA_ADMIN.'/my-profile/'.$datos['id_user'].'" class="btn btn-primary btn-xs" role="button" aria-pressed="true"><i class="fas fa-user me-2"></i>'.limitar_cadena($datos['full_name'], 20, "...").'</a></td>' : '').'
										<td>
											<div class="mb-2">
												<span class="badge badge-'.($datos['s_product'] == 0 ? 'info' : 'success').'">'.($datos['s_product'] == 0 ? $lang_global['Borrador'] : $lang_global['Publicado']).'</span>
											</div>
											<a data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-product-detail/'.$datos['id_product'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-1"></i>'.limitar_cadena(stripslashes($datos['title_product_lang']), 50, "...").'</a>
										</td>
										<td>'.$datos['reference_product_lang'].'</td>
										<td>');
		            		  				//$type_action
												//0 = NO ES OBLIGATORIO EL ID
													//0 = NULLO
												//1 = ES OBLIGATORIO EL ID_PRODUCTO
													//$obj_product_lang->getId_product()
												//2 = ES OBLIGATORIO EL ID_CATEGORY
													//$obj_category_lang->getId_category()
												//3 = ES OBLIGATORIO EL ID_BLOG
													//$obj_product_lang->getId_product()
										      	//4 = ES OBLIGATORIO EL ID_EVENTO
													//$obj_event_lang->getId_event()
											//$view
												//1 = lista con radio y/o checkbox
												//2 = lista con etiqueta badge
												//3 = lista mediaboxes
																											//$id_product,$id_lang
											$topCategoriesArray = productDao::showProductCategoriesByProductId($datos['id_product'],$datos['id_lang']);

																			//$data,$type_action,$view,$id_table
											echo categoryDao::generateTree($topCategoriesArray,1,2,$datos['id_product']);
	            		  	  	  echo('</td>
										<td>');
		            		  													//$id_lang,$id_product
		            		  				productDao::showProductTypeByProductId($datos['id_lang'],$datos['id_product']);
		            		  	  echo('</td>
										<td>'.($datos['general_price_product_lang'] == NULL || $datos['general_price_product_lang'] != 0.00 ? '<button type="button" class="mb-1 mt-1 me-1 btn btn-xs btn-danger">'.$lang_global['Sin precio'].'</button>' : $datos['symbol_type_of_currency_lang'].number_format($datos['general_price_product_lang'],2)).'</td>');

	            		  	  		if($_SESSION['id_role_dao'] <= 2){
		            		  	  echo('<td class="text-center">');
								  									//$section,$id_table,$title_table,$s_table_visible,$id_type_image,$lang_titulo
								  			pluginIosSwitchVisible('product_visible',$datos['id_product'],$lang_global['Producto'],$datos['s_product_visible'],$obj_image_lang->getId_type_image(),$lang_global['Activar o desactivar']);
								  echo('</td>');
			            		  	  		}

								  echo('<td class="text-center">');
							  								//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  				pluginIosSwitch('product',$datos['id_product'],$lang_global['Producto'],$datos['s_product'],$obj_image_lang->getId_type_image(),$lang_global['Activar o desactivar']);
							  	  echo('</td>
										<td class="text-center">');
							  														//$id_product,$id_product_lang,$title_product_lang,$id_type_section,$lang_1
											productDao::showTypeOfLinkToRemoveProduct($datos['id_product'],$datos['id_product_lang'],stripslashes($datos['title_product_lang']),$obj_image_lang->getId_type_image(),$lang_global['Eliminar']);
								  echo('</td>
									</tr>');

            			if(count($resultado) == $x){
							  echo('</tbody>
							</table>
							<hr class="solid mt-5 opacity-4">
							<div class="datatable-footer">
								<div class="row align-items-center justify-content-between mt-3">
									<div class="col-lg-auto text-center order-3 order-lg-2">
										<div class="results-info-wrapper"></div>
									</div>
									<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
										<div class="pagination-wrapper"></div>
									</div>
								</div>
							</div>');
							}
							$x++;
            		}else{
            	  			echo('<h3><span class="badge bg-dark">'.$lang_global['Sin productos registrados'].'</span></h3>');
            			 }
            	}
			}else{
				echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [showProductImage description]
		 *
		 * @param  [type] $id_product_lang [description]
		 * @param  [type] $id_type_image   [description]
		 * @param  string $route_default   [description]
		 * @param  string $icon            [description]
		 * @param  string $class           [description]
		 * @param  string $tooltip         [description]
		 * @return [type]                  [description]
		 */

		private static function showProductImage($id_product_lang,$id_type_image,$route_default = "img/image_not_found_50.jpg",$icon = '<i class="fas fa-tags c-azul" style="font-size: 35px;"></i>',$class = "image-popup-no-margins",$tooltip = "")
		{
			if(!empty(intval(trim($id_product_lang))) && !empty(intval(trim($id_type_image)))){

				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
				require(self::$file_global);

				//CREAR OBJETO
				$ob_conectar 			= new conectorDB();

	            $consulta_product_image = "CALL showProductImage(:id_product_lang)";
	            $valores_product_image 	= array('id_product_lang' => $id_product_lang);

	            $resultadoPIMG 			= $ob_conectar->consultarBD($consulta_product_image,$valores_product_image);

	            foreach($resultadoPIMG as &$atributoPIMG)
			 	{
			 		switch ($atributoPIMG['ERRNO']) {
			 			case 2://CORRECTO
			 				if(!empty($atributoPIMG['image_lang']) && !empty($atributoPIMG['title_image_lang']) && !empty($atributoPIMG['format_image'])){

			 					$file_type 				= explode("/", $atributoPIMG['format_image']);

			 					if($file_type[0] == "video"){
				 					$route_default		= "img/video_not_found_50.jpg";
				 				}

			 					self::$folder 			= imageDao::showFolderByIdTypeImage($id_type_image);

								if(self::$folder == FALSE || empty(self::$folder))
								{
									self::$full_path	= "";
								}else{
									self::$full_path  	= "../".self::$folder;
									 }

								if(!empty($file_type[0]) && $file_type[0] == "video"){
									$class 		= "popup-youtube";
		            			}else{
		            				$tooltip 	= ' data-bs-toggle="tooltip" data-bs-placement="top" title="'.$atributoPIMG['title_image_lang'].'"';
		            				 }

		            		  echo('<a class="'.$class.'" href="');
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
			              				imageDao::returnImage($atributoPIMG['image_lang'],'',self::$full_path,0,$route_default,1,'',1);
		            			echo('"'.$tooltip.'>
										<img class="img-fluid" src="');
																//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
			              					imageDao::returnImage($atributoPIMG['image_lang'],'',self::$full_path,50,$route_default,1,'',1);
			            			 	echo('" />
									</a>');
			 				}else{
			 						echo($icon);
			 					 }
			 			break;
			 			default:
					    	echo($icon);
			 			break;
			 		}
			    }
			}else{
					echo($icon);
				 }
		}

		/**
		 * [showProductCategoriesByProductId description]
		 *
		 * @param  [type] $id_product  [description]
		 * @param  [type] $id_lang     [description]
		 * @param  array  $information [description]
		 * @return [type]              [description]
		 */

		public static function showProductCategoriesByProductId($id_product,$id_lang,$information = array())
		{
			if(!empty(intval(trim($id_product))) && !empty(intval(trim($id_lang)))){

				//CREAR OBJETO
				$ob_conectar 					= new conectorDB();

				$consulta_product_categories 	= "CALL showProductCategoriesByProductId(:id_product,:id_lang)";
			    $valores_product_categories 	= array('id_product' 	=> $id_product,
	        						 					'id_lang' 		=> $id_lang);

			    $resultadoPC = $ob_conectar->consultarBD($consulta_product_categories,$valores_product_categories);

			    if(count($resultadoPC) > 0){
			    	foreach($resultadoPC as $indice => $datos)
					{
						if($datos['ERRNO'] == 1){
							$information = array(
							    array("ERRNO" => 0)
							);
						}else{
								$information[] = $datos;
							 }
					}
			    }else{
			    		$information = array(
						    array("ERRNO" => 0)
						);
			    	 }
			}else{
					$information = array(
					    array("ERRNO" => 0)
					);
				 }

		    return $information;
		}

		/**
		 * [showProductTypeByProductId description]
		 *
		 * @param  [type] $id_lang    [description]
		 * @param  [type] $id_product [description]
		 * @return [type]             [description]
		 */

		private static function showProductTypeByProductId($id_lang,$id_product)
		{
			/*NO ES NECESARIO VALIDAR $id_type_product_selected YA QUE SI ES UN REGISTRO NUEVO, ESTE INT SERA = 0*/
			if(!empty(intval(trim($id_lang))) && !empty(intval(trim($id_product)))){
				//CREAR OBJETO
				$ob_conectar 					= new conectorDB();

				$consulta_product_type_by_id 	= "CALL showProductTypeByProductId(:id_product,:id_lang)";
			    $valores_product_type_by_id 	= array('id_product' 	=> $id_product,
	        						 					'id_lang' 		=> $id_lang);

			    $resultadoPTID   				= $ob_conectar->consultarBD($consulta_product_type_by_id,$valores_product_type_by_id);

			  	foreach($resultadoPTID as &$datosPTID)
			    {
			    	if($datosPTID['ERRNO'] == 2)
			    	{
			            if(!empty($datosPTID['title_type_product_lang']))
			            {
			            	echo('<span class="badge badge-'.(!empty($datosPTID['badge_type_product_lang']) ? $datosPTID['badge_type_product_lang'] : 'primary').'">'.$datosPTID['title_type_product_lang'].'</span>');
			            }
			    	}
			    }
			}
		}

		/**
		 * [showTypeOfLinkToRemoveProduct description]
		 *
		 * @param  [type] $id_product         [description]
		 * @param  [type] $id_product_lang    [description]
		 * @param  [type] $title_product_lang [description]
		 * @param  [type] $id_type_section    [description]
		 * @param  [type] $lang_1             [description]
		 * @param  string $class_delete       [description]
		 * @param  string $data_delete        [description]
		 * @param  string $tooltip            [description]
		 * @return [type]                     [description]
		 */

		private static function showTypeOfLinkToRemoveProduct($id_product,$id_product_lang,$title_product_lang,$id_type_section,$lang_1,$class_delete = "modal-remove-general",$data_delete = "data-remove",$tooltip = "")
		{
			if(!empty(intval(trim($id_product))) && !empty(intval(trim($id_product_lang))) && !empty(intval(trim($id_type_section))) && !empty($title_product_lang) && !empty($lang_1)){
				//CREAR OBJETO
				$ob_conectar 					= new conectorDB();

				$tooltip 						= $lang_1.' '.$title_product_lang;

	            $consulta_link_remove_product 	= "CALL showTypeOfLinkToRemoveProduct(:id_product_lang)";
	            $valores_link_remove_product 	= array('id_product_lang' => $id_product_lang);

	            $resultadoLRP 					= $ob_conectar->consultarBD($consulta_link_remove_product,$valores_link_remove_product);

	            foreach($resultadoLRP as &$atributoLRP)
			 	{
			 		if($atributoLRP['ERRNO'] == 2){//TIENE IMAGENES REGISTRADAS
			 			$class_delete 	= "modal-delete-with-4-parameters";
			 			$data_delete 	= "data-delete-with-4-parameters";
			 		}
			    }

			    echo("<a class=\"modal-with-zoom-anim $class_delete\" data-bs-toggle=\"tooltip\" title=\"$tooltip\" href=\"#$class_delete\" $data_delete=\"$id_product/$title_product_lang/$id_type_section/item-id_product-\"><i class=\"fas fa-trash fa-lg\"></i></a>");
			}
		}

		/**
		 * [showFormUploadProduct description]
		 *
		 * @param  [type]  $obj_image_lang                         [description]
		 * @param  [type]  $obj_product_lang                       [description]
		 * @param  integer $id_lang_basic_product_settings         [description]
		 * @param  integer $id_action                              [description]
		 * @param  integer $id_user                                [description]
		 * @param  integer $id_type_product                        [description]
		 * @param  integer $id_product_lang                        [description]
		 * @param  integer $s_product                              [description]
		 * @param  integer $id_tax_rule                            [description]
		 * @param  integer $id_type_of_currency                    [description]
		 * @param  integer $input_product_lang                     [description]
		 * @param  integer $output_product_lang                    [description]
		 * @param  float   $general_price_product_lang             [description]
		 * @param  string  $symbol_type_of_currency_lang           [description]
		 * @param  string  $predominant_color_product_lang         [description]
		 * @param  string  $class_title                            [description]
		 * @param  string  $friendly_url_product_lang              [description]
		 * @param  string  $title_product_lang                     [description]
		 * @param  string  $subtitle_product_lang                  [description]
		 * @param  string  $text_button_general_price_product_lang [description]
		 * @param  string  $text_button_general_link_product_lang  [description]
		 * @param  string  $general_stock_product_lang             [description]
		 * @param  string  $background_color_degraded_product_lang [description]
		 * @param  string  $reference_product_lang                 [description]
		 * @param  string  $general_link_product_lang              [description]
		 * @param  string  $description_small_product_lang         [description]
		 * @param  string  $description_large_product_lang         [description]
		 * @param  string  $special_specifications_product_lang    [description]
		 * @param  string  $clave_prod_serv_sat_product_lang       [description]
		 * @param  string  $clave_unidad_sat_product_lang          [description]
		 * @param  string  $meta_title_product_lang                [description]
		 * @param  string  $meta_description_product_lang          [description]
		 * @param  string  $meta_keywords_product_lang             [description]
		 * @return [type]                                          [description]
		 */

		public static function showFormUploadProduct($obj_image_lang,$obj_product_lang,$id_lang_basic_product_settings = 1,$id_action = 1,$id_user = 0,$id_type_product = 0,$id_product_lang = 0,$s_product = 0,$id_tax_rule = 3,$id_type_of_currency = 1,$input_product_lang = 0,$output_product_lang = 0,$general_price_product_lang = 0.00,$symbol_type_of_currency_lang = "$",$predominant_color_product_lang = "#ffffff",$class_title = " error",$friendly_url_product_lang = "producto/",$title_product_lang = "",$subtitle_product_lang = "",$text_button_general_price_product_lang = "",$text_button_general_link_product_lang  = "",$general_stock_product_lang = "",$background_color_degraded_product_lang = "",$reference_product_lang = "",$general_link_product_lang = "",$description_small_product_lang = "",$description_large_product_lang = "",$special_specifications_product_lang = "",$clave_prod_serv_sat_product_lang = "",$clave_unidad_sat_product_lang = "",$meta_title_product_lang = "",$meta_description_product_lang = "",$meta_keywords_product_lang = "")
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_product_lang->getId_product()))))
			{
				if(isset($_POST['id_lang_basic_product_settings']) && !empty(intval(trim($_POST['id_lang_basic_product_settings'])))){
					$id_lang_basic_product_settings = $_POST['id_lang_basic_product_settings'];
				}

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showProductInformationByProductId(:id_product,:id_lang)";
			    $valores 		= array('id_product' 	=> $obj_product_lang->getId_product(),
									    'id_lang' 		=> $id_lang_basic_product_settings);

			    $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

			    foreach($resultado as &$datos)
			    {
			    	$id_action  = $datos['ACTION'];

			    	//ACTION
				    	//1 = Update
				    	//2 = Register
			    	if($id_action == 1)
			    	{
			    		$id_user     								= $datos['id_user'];
			    		$id_type_product     						= $datos['id_type_product'];
			    		$id_product_lang     						= $datos['id_product_lang'];
			    		$id_tax_rule     							= $datos['id_tax_rule'];
			    		$symbol_type_of_currency_lang     			= $datos['symbol_type_of_currency_lang'];
			    		$id_type_of_currency     					= $datos['id_type_of_currency'];
			    		$s_product 									= $datos['s_product'];

			    		$title_product_lang     					= (!empty($datos['title_product_lang']) ? stripslashes($datos['title_product_lang']) : '');
			    		$subtitle_product_lang     					= (!empty($datos['subtitle_product_lang']) ? stripslashes($datos['subtitle_product_lang']) : '');
			    		$general_price_product_lang    				= $datos['general_price_product_lang'];
			    		$text_button_general_price_product_lang    	= (!empty($datos['text_button_general_price_product_lang']) ? stripslashes($datos['text_button_general_price_product_lang']) : '');
			    		$predominant_color_product_lang    			= $datos['predominant_color_product_lang'];
			    		$background_color_degraded_product_lang    	= $datos['background_color_degraded_product_lang'];
			    		$general_stock_product_lang     			= $datos['general_stock_product_lang'];
			    		$reference_product_lang     				= (!empty($datos['reference_product_lang']) ? stripslashes($datos['reference_product_lang']) : '');

			    		$friendly_url_product_lang     		 		= $datos['friendly_url_product_lang'];

			    		$general_link_product_lang     				= (!empty($datos['general_link_product_lang']) ? stripslashes($datos['general_link_product_lang']) : '');
			    		$text_button_general_link_product_lang    	= (!empty($datos['text_button_general_link_product_lang']) ? stripslashes($datos['text_button_general_link_product_lang']) : '');
			    		$description_small_product_lang     		= (!empty($datos['description_small_product_lang']) ? stripslashes($datos['description_small_product_lang']) : '');
			    		$description_large_product_lang     		= (!empty($datos['description_large_product_lang']) ? stripslashes($datos['description_large_product_lang']) : '');
			    		$special_specifications_product_lang    	= (!empty($datos['special_specifications_product_lang']) ? stripslashes($datos['special_specifications_product_lang']) : '');
			    		$clave_prod_serv_sat_product_lang    		= $datos['clave_prod_serv_sat_product_lang'];
			    		$clave_unidad_sat_product_lang    			= $datos['clave_unidad_sat_product_lang'];
			    		$input_product_lang    						= $datos['input_product_lang'];
			    		$output_product_lang    					= $datos['output_product_lang'];

			    		$meta_title_product_lang     				= (!empty($datos['meta_title_product_lang']) ? stripslashes($datos['meta_title_product_lang']) : '');
			    		$meta_description_product_lang     			= (!empty($datos['meta_description_product_lang']) ? stripslashes($datos['meta_description_product_lang']) : '');
			    		$meta_keywords_product_lang     			= (!empty($datos['meta_keywords_product_lang']) ? stripslashes($datos['meta_keywords_product_lang']) : '');
			    		$class_title 								= "";
			    	}

			    		$separator_friendly_url_product_lang 		= explode("/", $friendly_url_product_lang);

			  echo('<section id="showFormUploadProduct" class="col-12 card action-buttons-fixed" data-action="'.$id_action.'" data-lang="'.$id_lang_basic_product_settings.'" data-id-product-lang="'.$id_product_lang.'">
			  			<div class="box-progress">
							<div class="progress light m-2">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>');

				  /*echo('<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 me-2"></i> '.$lang_global["Guardar"].'
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="'.URL_CARPETA_ADMIN.'/catalogue-product" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">'.$lang_global["Cancelar"].'</a>
							</div>
							<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 me-2"></i> '.$lang_global["Eliminar"].'
								</a>
							</div>
						</div>');*/

				  echo('<div id="top-1" class="card-body pb-2">
							<div class="row">
								<div class="col-12">
									<div class="form-group pb-4">');
			  														//$id_type_product_selected,$id_action,$id_lang,$lang_global_1
										productDao::showProductType($id_type_product,$id_action,$id_lang_basic_product_settings,$lang_global["Tipo de producto"]);
						      echo('</div>
						      	</div>
								<div class="col-md">
									<div class="form-group position-relative">
										'.($s_product == 0 ? '<span class="badge badge-primary position-absolute" style="top: -17px;border-bottom-left-radius: 0;">'.$lang_global["Borrador"].'</span>' : '<span class="badge badge-primary position-absolute" style="top: -17px;border-bottom-left-radius: 0;">'.$lang_global["Publicado"].'</span>').'
										<input type="text" class="form-control form-control-lg postTitle'.$class_title.'" style="border-top-left-radius: 0px;" data-plugin-maxlength maxlength="150" name="title_product_lang" id="title_product_lang" value="'.$title_product_lang.'" placeholder="*'.$lang_global["Introduce el nombre del producto"].' "autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-5 col-lg-4 col-xl-2 pt-2">
									<form id="form-basic-product-settings" method="post" action="">
										<div class="form-group">
											<select data-plugin-selectTwo id="id_lang_basic_product_settings" class="form-control populate" name="id_lang_basic_product_settings" required>');
									            langController::showListOfLanguagesWithWelectedLanguage($id_lang_basic_product_settings);
									  echo('</select>
										</div>
									</form>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-12">
									<!-- URL AMIGABLE PERSONALIZADA -->
									<div class="d-flex">
										<div>
											<label for="urlPreview">
												<span class="f-medium c-negro me-1">URL amigable:</span>
												<span id="urlFront">'.URL_CARPETA_FRONT.'</span>
											</label>
										</div>
										<div>
											<input type="text" id="urlTypeProduct" class="bg-transparent border-0 border-bottom" value="'.$separator_friendly_url_product_lang[0].'" disabled>
											<span class="f-regular c-gris">/</span>
										</div>
										<div id="separator-friendly-url-product-lang">
											<input type="text" id="urlPreview" class="bg-transparent border-0 border-bottom w-100" value="'.$separator_friendly_url_product_lang[1].'">
										</div>
									</div>
									<!-- END URL AMIGABLE PERSONALIZADA -->
								</div>
							</div>
						</div>
						<div class="card-footer pt-3">
							<div class="tabs tabs-modern-row">
								<div class="nav nav-tabs" id="tab" role="tablist" aria-orientation="horizontal">
						      		<a class="nav-link active" id="basicSettings-tab" data-bs-toggle="pill" data-bs-target="#basicSettings" href="#basicSettings" role="tab" aria-controls="basicSettings" aria-selected="true">'.$lang_global["Ajustes básicos"].'</a>');
							//ACTION
						    	//1 = Update
						    	//2 = Register
					    	if($id_action == 1 && !empty(intval(trim($id_product_lang))))
					    	{
					    		if($general_price_product_lang != 0.00)
							    {
						      echo('<a class="nav-link" id="promotions-tab" data-bs-toggle="pill" data-bs-target="#promotions" href="#promotions" role="tab" aria-controls="promotions" aria-selected="false">'.$lang_global["Promociones"].'</a>

						      		<!--<a class="nav-link" id="stripe-tab" data-bs-toggle="pill" data-bs-target="#stripe" href="#stripe" role="tab" aria-controls="stripe" aria-selected="false">Stripe</a>-->');
						      	}
						      /*echo('<a class="nav-link" id="additional_information-tab" data-bs-toggle="pill" data-bs-target="#additional_information" href="#additional_information" role="tab" aria-controls="additional_information" aria-selected="false">'.$lang_global["Información adicional"].'</a>

						      		<a class="nav-link" id="presentations-tab" data-bs-toggle="pill" data-bs-target="#presentations" href="#presentations" role="tab" aria-controls="presentations" aria-selected="false">'.$lang_global["Presentaciones"].'</a>');
						      		//$id_type_product
							  			//0 = Registro nuevo
							  			//1 = Producto
							  			//2 = Accesorio
							  		//$id_user
							  			//0 = Registro nuevo
					  			if($id_type_product != 2 && $id_user > 0){
						      echo('<a class="nav-link" id="related_products-tab" data-bs-toggle="pill" data-bs-target="#related_products" href="#related_products" role="tab" aria-controls="related_products" aria-selected="false">'.$lang_global["Productos relacionados"].'</a>');
						  		}
						      echo('<a class="nav-link" id="attached_files-tab" data-bs-toggle="pill" data-bs-target="#attached_files" href="#attached_files" role="tab" aria-controls="attached_files" aria-selected="false">'.$lang_global["Archivos adjuntos"].'</a>');*/
						  	}
						  echo('</div>
								<div class="tab-content" id="tabContent">
						      		<div class="tab-pane fade show active" id="basicSettings" role="tabpanel" aria-labelledby="basicSettings-tab">
										<form id="step-1-product" class="step-1 form-horizontal" autocomplete="off" novalidate="novalidate">
											<div class="row">
												<div class="col-lg-8 position-relative" style="border-right: 1px solid #2baab1;">
													<div class="pt-5 px-3" style="border-left: 1px solid #ced4da;border-right: 1px solid #ced4da;border-bottom: 1px solid #ced4da;">
														<span class="text-white bg-dark p-absolute info-top">Arrastra la imagen para modificar el orden</span>
														<div id="box-media-gallery-main-product-cover" class="row">
															<div id="box-media-gallery-product-cover-0" class="col-auto box-media-gallery-product-cover">
																<div class="container-input border-primary mb-3">
																	<input type="file" name="fileProductCover" id="fileProductCover" class="inputfile inputfile-7" />
																	<label class="ver-1 text-primary" for="fileProductCover">
																		<i class="fas fa-plus-circle" style="font-size: 38px;"></i>
																		<span class="badge badge-primary mt-2 d-block">Agregar imagen</span>
																	</label>
																</div>
															</div>
															<ul id="sortable-cover-images-and-general-products" class="sortable-cover-images-and-general p-0" style="list-style: none;display: contents;">');
										  															//$id_type_image,$id_product,$id_lang
										  						productDao::showGalleryProductsHome($obj_image_lang->getId_type_image(),$obj_product_lang->getId_product(),$id_lang_basic_product_settings);

												 	   echo('</ul>
												  		</div>
													</div>
													<div class="pt-2">
														<div class="row">
															<div class="form-group col-xl">
																<label class="f-medium c-negro d-block" for="subtitle_product_lang">'.$lang_global["Subtítulo"].'</label>
																<input type="text" class="form-control" data-plugin-maxlength maxlength="100" name="subtitle_product_lang" id="subtitle_product_lang" value="'.$subtitle_product_lang.'" placeholder="">
															</div>
															<div class="form-group pt-xl-0 col-xl-auto">
																<label class="f-medium c-negro d-block" for="predominant_color_product_lang">'.$lang_global["Color predominante"].'</label>
																	<input type="color" id="predominant_color_product_lang" class="border-0 ms-2" name="predominant_color_product_lang" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="'.$predominant_color_product_lang.'">
															</div>
														</div>
														<hr>
														<div class="form-group">
															<label class="f-medium c-negro" for="general_link_product_lang">'.$lang_global["Link"].'</label>
															<div class="input-group">
																<span class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="fas fa-globe fa-fw"></i>
																	</span>
																</span>
																<input type="url" class="form-control" data-plugin-maxlength maxlength="600" name="general_link_product_lang" id="general_link_product_lang" value="'.$general_link_product_lang.'" placeholder="eje: https://www.dominio.com">
															</div>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="text_button_general_link_product_lang">'.$lang_global["Texto personalizado Link"].'</label>
															<div class="input-group">
																<span class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="fas fa-text-width fa-fw"></i>
																	</span>
																</span>
																<input type="text" data-plugin-maxlength maxlength="50" class="form-control" name="text_button_general_link_product_lang" id="text_button_general_link_product_lang" value="'.$text_button_general_link_product_lang.'">
															</div>
														</div>
														<hr>
													</div>');

								              echo('<div class="tabs tabs-modern-row mb-2">
														<div class="nav nav-tabs" id="tab" role="tablist" aria-orientation="horizontal">
												      		<a class="nav-link active" id="large1_description-tab" data-bs-toggle="pill" data-bs-target="#large1_description" href="#large1_description" role="tab" aria-controls="large1_description" aria-selected="true">'.$lang_global["Descripción con diseño"].'</a>
												      		<a class="nav-link" id="specialSpecifications-tab" data-bs-toggle="pill" data-bs-target="#specialSpecifications" href="#specialSpecifications" role="tab" aria-controls="specialSpecifications" aria-selected="false">'.$lang_global["Especificaciones especiales"].'</a>
												    	</div>
														<div class="tab-content p-0" id="tabContent">
												      		<div class="tab-pane fade show active" id="large1_description" role="tabpanel" aria-labelledby="large1_description-tab">
																<textarea
																	id="description_large_product_lang"
																	class="summernote"
																	name="description_large_product_lang"
																	data-plugin-summernote>'.(!empty($description_large_product_lang) ? stripslashes($description_large_product_lang) : '').'</textarea>
															</div>
												      		<div class="tab-pane fade" id="specialSpecifications" role="tabpanel" aria-labelledby="specialSpecifications-tab">
																<textarea
																	id="special_specifications_product_lang"
																	class="summernote"
																	name="special_specifications_product_lang"
																	data-plugin-summernote>'.(!empty($special_specifications_product_lang) ? stripslashes($special_specifications_product_lang) : '').'</textarea>
												      		</div>
												    	</div>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<span class="badge badge-primary">'.$lang_global["Optimización motores de búsqueda (SEO)"].'</span>
															<div class="form-group mt-2">
																<label class="f-medium c-negro" for="meta_title_product_lang">'.$lang_global["Meta-título"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu meta titulo"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
																<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fab fa-google"></i>
																		</span>
																	</span>
																	<input type="text" data-plugin-maxlength maxlength="128" class="form-control" name="meta_title_product_lang" id="meta_title_product_lang" value="'.$meta_title_product_lang.'" required>
																</div>
															</div>
															<div class="form-group">
																<label class="f-medium c-negro" for="meta_description_product_lang">'.$lang_global["Meta descripción"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu meta descripción"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
																<textarea data-plugin-maxlength maxlength="250" id="meta_description_product_lang" class="form-control" rows="4" name="meta_description_product_lang" style="border-radius: 0;">'.$meta_description_product_lang.'</textarea>
															</div>
															<div class="form-group">
																<label class="f-medium c-negro" for="meta_keywords_product_lang">'.$lang_global["Meta palabras clave"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu meta keywords"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button>
																</label>
																<input type="text" data-plugin-maxlength maxlength="2000" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" name="meta_keywords_product_lang" id="meta_keywords_product_lang" value="'.$meta_keywords_product_lang.'">
															</div>
														</div>
														<div class="col-lg-6">
															<!-- Preview google -->
															<span class="badge badge-primary">'.$lang_global["Preview google"].'</span>
										                    <div id="snippet-preview-view" class="snippet-editor__view snippet-editor__view--desktop mt-2">
										                        <div class="snippet_container snippet_container__title snippet-editor__container" id="title_container">
										                            <span class="screen-reader-text">SEO title preview:</span>
										                            <span class="title" id="render_title_container">
										                                <span id="snippet_title">'.(!empty($title_product_lang) ? $title_product_lang : $lang_global["Snippet title"]).'</span>
										                            </span>
										                            <span class="title" id="snippet_sitename"></span>
										                        </div>
										                        <div class="snippet_container snippet_container__url snippet-editor__container" id="url_container">
										                            <span class="screen-reader-text">'.$lang_global["Slug preview"].'</span>
										                            <span class="urlFull">
										                                <cite class="url urlBase" id="snippet_citeBase">'.URL_CARPETA_FRONT.'</cite><cite class="url" id="snippet_cite">'.(!empty($friendly_url_product_lang) ? $friendly_url_product_lang : $lang_global["Snippet cite"]).'</cite>
										                            </span><span class="down_arrow"></span>
										                        </div>
										                        <div class="snippet_container snippet_container__meta snippet-editor__container" id="meta_container">
										                            <span class="screen-reader-text">'.$lang_global["Meta description preview"].'</span>
										                            <span class="desc desc-render" id="snippet_meta">'.(!empty($meta_description_product_lang) ? $meta_description_product_lang : $lang_global["Snippet meta"]).'</span>
										                        </div>
										                    </div>
														</div>
													</div>
												</div>
												<div class="col-lg-4">');
								  	  				//ACTION
												    	//1 = Update
												    	//2 = Register
											    	if($id_action == 1)
											    	{
											    		//$s_product
													    	//0 = Borrador
													    	//1 = Publicar
												  echo('<div class="btn-group d-flex" role="group" aria-label="Button group with nested dropdown">
															<a class="btn btn-dark w-100" href="'.URL_CARPETA_FRONT.$friendly_url_product_lang.'/preview" target="_blank" role="button"><i class="fas fa-eye me-2 fa-fade"></i>'.$lang_global["Vista previa"].'</a>
															<div class="btn-group w-100" role="group">
															    <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-sync me-2 fa-spin"></i>'.$lang_global["Cambiar estatus"].'</button>
															    <ul class="dropdown-menu dropdown-menu-end">
															    	'.($s_product == 0 ? '<li><a class="dropdown-item update-general-status switch-general" href="#" data-update-general-status="'.$obj_product_lang->getId_product().'/'.$title_product_lang.'/1/'.$obj_image_lang->getId_type_image().'">'.$lang_global["Publicar"].'</a></li>' : '<li><a class="dropdown-item update-general-status switch-general" href="#" data-update-general-status="'.$obj_product_lang->getId_product().'/'.$title_product_lang.'/0/'.$obj_image_lang->getId_type_image().'">'.$lang_global["Borrador"].'</a></li>').'
															    </ul>
															</div>
														</div>');
													}
											  echo('<div class="form-group">
														<div class="toggle toggle-quaternary toggle-sm" data-plugin-toggle>
															<!-- Factura CFDI 4.0 -->
															<section id="factura" class="toggle">
																<label>Factura CFDI 4.0</label>
																<div class="toggle-content mt-2">
																	<div class="form-group pb-1">
																		<label class="f-medium c-negro" for="clave_prod_serv_sat_product_lang">'.$lang_global["Clave de producto o servicio"].'</label>
																		<select class="form-control" name="clave_prod_serv_sat_product_lang" id="clave_prod_serv_sat_product_lang" data-bs-toggle="tooltip" data-bs-placement="left" title="'.$lang_global["c_ClaveProdServ"].'">
																			<option value="">'.$lang_global["Selecciona una opción"].'</option>
																			<option value="56101519"'.($clave_prod_serv_sat_product_lang == "56101519" ? ' selected="selected"' : '').'>MESA CON SILLAS</option>
																			<option value="56101519"'.($clave_prod_serv_sat_product_lang == "56101519" ? ' selected="selected"' : '').'>TABLONES</option>
																			<option value="26101100"'.($clave_prod_serv_sat_product_lang == "26101100" ? ' selected="selected"' : '').'>MOTOR TURBO</option>
																			<option value="60141012"'.($clave_prod_serv_sat_product_lang == "60141012" ? ' selected="selected"' : '').'>INFLABLES</option>
																			<option value="49241701"'.($clave_prod_serv_sat_product_lang == "49241701" ? ' selected="selected"' : '').'>TRAMPOLINES</option>
																			<option value="49181510"'.($clave_prod_serv_sat_product_lang == "49181510" ? ' selected="selected"' : '').'>FUTBOLITOS</option>
																			<option value="31201616"'.($clave_prod_serv_sat_product_lang == "31201616" ? ' selected="selected"' : '').'>PEGALONAS</option>
																			<option value="72154003"'.($clave_prod_serv_sat_product_lang == "72154003" ? ' selected="selected"' : '').'>SERVICIO DE INSTALACION DE LONAS</option>
																			<option value="30151901"'.($clave_prod_serv_sat_product_lang == "30151901" ? ' selected="selected"' : '').'>TOLDOS</option>
																			<option value="52121600"'.($clave_prod_serv_sat_product_lang == "52121600" ? ' selected="selected"' : '').'>MANTELERIA</option>
																			<option value="56101505"'.($clave_prod_serv_sat_product_lang == "56101505" ? ' selected="selected"' : '').'>TORO MECANICO</option>
																			<option value="78101802"'.($clave_prod_serv_sat_product_lang == "78101802" ? ' selected="selected"' : '').'>SERVICIO DE LOGISTICA</option>
																			<option value="56101500"'.($clave_prod_serv_sat_product_lang == "56101500" ? ' selected="selected"' : '').'>SILLAS</option>
																			<option value="47132100"'.($clave_prod_serv_sat_product_lang == "47132100" ? ' selected="selected"' : '').'>KITS DE LIMPIEZA</option>
																			<option value="47131800"'.($clave_prod_serv_sat_product_lang == "47131800" ? ' selected="selected"' : '').'>SOLUCIONES DE LIMPIEZA Y DESINFECCION</option>
																			<option value="26101100"'.($clave_prod_serv_sat_product_lang == "26101100" ? ' selected="selected"' : '').'>MOTOR</option>
																			<option value="47131600"'.($clave_prod_serv_sat_product_lang == "47131600" ? ' selected="selected"' : '').'>CEPILLO</option>
																		</select>
																	</div>
																	<a href="http://pys.sat.gob.mx/PyS/catPyS.aspx" target="_blank" class="f-bold" style="text-decoration:underline">'.$lang_global["Link clave del Producto"].'</a>
																	<div class="form-group">
																		<label class="f-medium c-negro" for="description_small_product_lang">'.$lang_global["Descripción"].'</label>
																		<textarea id="description_small_product_lang" class="form-control" rows="4" name="description_small_product_lang" style="border-radius: 0;"  data-bs-toggle="tooltip" title="'.$lang_global["Tu resumen para este producto"].'">'.$description_small_product_lang.'</textarea>');
														      echo('</div>
														  		</div>
															</section>
															<section class="toggle">
																<label>'.$lang_global["Personalización"].'</label>
																<div class="toggle-content mt-2">
																	<div class="form-group">
																		<select id="background_color_degraded_product_lang" name="background_color_degraded_product_lang" is="ms-dropdown">
																		    <option value="" data-description="'.$lang_global["Selecciona una opción"].'">'.$lang_global["Color de fondo degradado"].'</option>
																		    <option value="1" data-image="'.URL_CARPETA_FRONT.'img/degradados/gradient1.png" data-description="">Gradient 1</option>
																		    <option value="2" data-image="'.URL_CARPETA_FRONT.'img/degradados/gradient2.png" data-description="">Gradient 2</option>
																		    <option value="3" data-image="'.URL_CARPETA_FRONT.'img/degradados/gradient3.png" data-description="">Gradient 3</option>
																		</select>
																	</div>
																	'.(!empty($background_color_degraded_product_lang) ? '<div class="widget-summary"><div class="summary" style="min-height: auto;"><h4 class="title my-2">'.$lang_global["Fondo actual"].'</h4></div><div class="summary-icon" style="'.$background_color_degraded_product_lang.'"></div></div>' : '').'
																</div>
															</section>
															<section class="toggle">
																<label>'.$lang_global["Stock y precios"].'</label>
																<div class="toggle-content mt-2">
																	<div class="form-group">
																		<label class="f-medium c-negro" for="reference_product_lang">'.$lang_global["SKU / Código de referencia"].'</label>
																		<div class="input-group">
																			<span class="input-group-prepend">
																				<span class="input-group-text">
																					<i class="fas fa-tag"></i>
																				</span>
																			</span>
																			<input type="text" data-plugin-maxlength maxlength="40" class="form-control" name="reference_product_lang" id="reference_product_lang" value="'.$reference_product_lang.'" data-bs-toggle="tooltip" title="'.$lang_global["Tu código de referencia para este producto"].'">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="f-medium c-negro" for="general_stock_product_lang">'.$lang_global["Stock / Cantidad"].'</label>
																		<input type="text" class="form-control" name="general_stock_product_lang" id="general_stock_product_lang" value="'.$general_stock_product_lang.'" data-bs-toggle="tooltip" title="'.$lang_global["Tu cantidad para este producto"].'" onkeypress="return soloNumerosSinPunto(event)">
																	</div>
																	<div class="form-group">
																		<label class="f-medium c-negro" for="id_type_of_currency"><span class="required">*</span> '.$lang_global["Tipo de moneda"].'</label>
																		<select name="id_type_of_currency" id="id_type_of_currency" data-plugin-selectTwo class="form-control populate" required>');
									  										typeOfCurrencyDao::showSelectedtypeOfCurrencyList($id_type_of_currency);
																  echo('</select>
																	</div>
																	<div class="form-group">
																		<label class="f-medium c-negro" for="id_tax_rule"><span class="required">*</span> '.$lang_global["Reglas de IVA"].')</label>
																		<select name="id_tax_rule" id="id_tax_rule" data-plugin-selectTwo class="form-control populate" required>');
									  										taxRuleLangDao::showSelectedtaxRuleLangList($id_tax_rule);
																  echo('</select>
																  	</div>
																  	<div class="form-group">
																		<label class="f-medium c-negro" for="general_price_product_lang">'.$lang_global["Precio"].' ('.$lang_global["Con IVA"].')</label>
																		<div class="input-group">
																			<span class="input-group-prepend">
																				<span class="input-group-text">'.$symbol_type_of_currency_lang.'</span>
																			</span>
																			<input type="text" class="form-control" name="general_price_product_lang" id="general_price_product_lang" value="'.($general_price_product_lang == 0.00 ? '' : $general_price_product_lang).'" data-bs-toggle="tooltip" title="'.$lang_global["Tu precio para este producto"].'" placeholder="'.$lang_global["Ejemplo"].': 42.00" onkeypress="return NumCheck(event, this)">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="f-medium c-negro" for="text_button_general_price_product_lang">'.$lang_global["Texto personalizado Precio"].'</label>
																		<div class="input-group">
																			<span class="input-group-prepend">
																				<span class="input-group-text">
																					<i class="fas fa-text-width fa-fw"></i>
																				</span>
																			</span>
																			<input type="text" data-plugin-maxlength maxlength="50" class="form-control" name="text_button_general_price_product_lang" id="text_button_general_price_product_lang" value="'.$text_button_general_price_product_lang.'">
																		</div>
																	</div>
																</div>
															</section>');
															//ACTION
														    	//1 = Update
														    	//2 = Register
													    	if($id_action == 1)
													    	{
													  echo('<section class="toggle active">
																<label>'.$lang_global["Categorías"].'</label>
																<div class="toggle-content">
																	<ul class="ps-0 mt-2" style="list-style: none;">
																		<li>
																			<div class="radio-custom radio-success">
																				<input type="radio" id="parent_id_1" checked disabled>
																				<label class="f-bold c-negro" for="parent_id_1">'.$lang_global["Inicio"].'</label>
																			</div>');

													  						//$type_action
																				//0 = NO ES OBLIGATORIO EL ID
																					//0 = NULLO
																				//1 = ES OBLIGATORIO EL ID_PRODUCTO
																					//$obj_product_lang->getId_product()
																				//2 = ES OBLIGATORIO EL ID_CATEGORY
																					//$obj_category_lang->getId_category()
																				//3 = ES OBLIGATORIO EL ID_BLOG
																					//$obj_product_lang->getId_product()
																			//$view
																				//1 = lista con radio y/o checkbox
																				//2 = lista con etiqueta badge
																				//3 = lista mediaboxes


														  	  					$topCategoriesArray =  categoryDao::showBaseCategories();

														  	  									//$data,$type_action,$view,$id_table
														  	  					echo categoryDao::generateTree($topCategoriesArray,1,1,$obj_product_lang->getId_product());

											  	  		  		  echo('</li>
     															    </ul>
																</div>
															</section>');
											  	  		}
												  echo('</div>
											  		</div>
												</div>
											</div>
											<div class="row action-buttons">
												<div class="col-12 col-md-auto">
													<button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="'.$lang_global["Cargando"].'">
														<i class="bx bx-save text-4 me-2"></i> '.$lang_global["Guardar"].'
													</button>
												</div>
												<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
													<a href="'.URL_CARPETA_ADMIN.'/catalogue-product" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">'.$lang_global["Regresar"].'</a>
												</div>
											</div>
										</form>
									</div>');
								//ACTION
							    	//1 = Update
							    	//2 = Register
						    	if($id_action == 1 && !empty(intval(trim($id_product_lang))))
						    	{
						    		if($general_price_product_lang != 0.00)
							    	{
						      echo('<div class="tab-pane fade" id="promotions" role="tabpanel" aria-labelledby="promotions-tab">
										<div class="row">
											<div class="col-lg-6 col-xl-4">
												<form id="step-7-product" class="form-horizontal" autocomplete="off" novalidate="novalidate">
													<div class="p-2" style="border: 1px solid #ced4da;">');
														require(dirname(__DIR__)."/models/forms/product_lang_promotion.php");
											  echo('</div>
												</form>
											</div>
											<div class="col-lg-6 col-xl-8">
												<div class="datatables-header-footer-wrapper">
													<div class="datatable-header py-3">
														<div class="row align-items-center">
															<div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
																<div class="d-flex align-items-lg-center flex-column flex-lg-row">
																	<label class="ws-nowrap me-3 mb-0">'.$lang_global["Filtros por"].'</label>
																	<select class="form-control select-style-1 filter-by" name="filter-by">
																		<option value="all" selected>'.$lang_global["Todo"].'</option>
																		<option value="1">ID</option>
																		<option value="2">'.$lang_global["Producto"].'</option>
																		<option value="3">'.$lang_global["Referencia"].'</option>
																		<option value="4">'.$lang_global["Categoría"].'</option>
																		<option value="5">'.$lang_global["Tipo de producto"].'</option>
																	</select>
																</div>
															</div>
															<div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
																<div class="d-flex align-items-lg-center flex-column flex-lg-row">
																	<label class="ws-nowrap me-3 mb-0">'.$lang_global["Mostrar"].':</label>
																	<select class="form-control select-style-1 results-per-page" name="results-per-page">
																		<option value="12" selected>12</option>
																		<option value="24">24</option>
																		<option value="36">36</option>
																		<option value="100">100</option>
																	</select>
																</div>
															</div>
															<div class="col-12 col-lg-auto ps-lg-1">
																<div class="search search-style-1 search-style-1-lg mx-lg-auto">
																	<div class="input-group">
																		<input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="'.$lang_global["Buscar"].'">
																		<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
																	</div>
																</div>
															</div>
														</div>
													</div>');
							  						//$id_internal_sections
							  							//En productos
							  								//1 = Stripe
							  								//2 = Informacion adicional
							  								//3 = Promocion

																						//$id_product_lang,$id_type_image,$symbol_type_of_currency_lang,$general_price_product_lang,$id_lang,$id_internal_sections
													productDao::displayProductPromotions($id_product_lang,$obj_image_lang->getId_type_image(),$symbol_type_of_currency_lang,$general_price_product_lang,$id_lang_basic_product_settings,3);
									  	  echo('</div>
									  		</div>
										</div>
						      		</div><!-- END promotions -->
						      		<div class="tab-pane fade" id="stripe" role="tabpanel" aria-labelledby="stripe-tab">
										<div class="row">
											<div class="col-lg-6 col-xl-4">
												<div class="p-2" style="border: 1px solid #ced4da;">
													<form id="step-2-product" class="form-horizontal" autocomplete="off" novalidate="novalidate">');
														require(dirname(__DIR__)."/models/forms/product_stripe.php");
											  echo('</form>
												</div>
											</div>
											<div class="col-lg-6 col-xl-8 pt-5">');
																							//$id_product,$id_lang,$id_type_image
												productDao::showStripeRegisteredInTheProduct($obj_product_lang->getId_product(),$id_lang_basic_product_settings,$obj_image_lang->getId_type_image());
									  echo('</div>
										</div>
						      		</div><!-- END stripe -->');
						  			}
						      echo('<div class="tab-pane fade" id="additional_information" role="tabpanel" aria-labelledby="additional_information-tab">
										<div class="row">
											<div class="col-lg-6 col-xl-4">
												<form id="step-6-product" class="form-horizontal" autocomplete="off" novalidate="novalidate">
													<div class="p-4" style="border: 1px solid #ced4da;">
														<div class="form-group">
															<div class="form-group">
																<label class="f-medium c-negro" for="id_type_tag"><span class="required">*</span> '.$lang_global["Tipo de contenido"].'</label>
																<select name="id_type_tag" id="id_type_tag" data-plugin-selectTwo class="form-control id_type_tag populate" required>
																	<option value="">'.$lang_global["Selecciona una opción"].'</option>');
							  											//$selected
								  											//0 = inactivo
								  											//1 = activo
								  										//$id_type_tag_selected
								  											//0 = No hay type_tag_selected
								  											//1 = $id_type_tag

								  													//$selected,$id_type_tag_selected
																		productDao::showTypeTagList(0,0);
														  echo('</select>
															</div>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="tag_product_lang_additional_information"><span class="required">*</span> '.$lang_global["Título"].'</label>
															<input type="text" class="form-control" data-plugin-maxlength maxlength="100" name="tag_product_lang_additional_information" id="tag_product_lang_additional_information" value="" required>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="content_product_lang_additional_information"><span class="required">*</span> '.$lang_global["Contenido"].'</label>
															<textarea id="content_product_lang_additional_information" class="form-control" rows="6" name="content_product_lang_additional_information" style="border-radius: 0;" required></textarea>
														</div>
														<div class="form-group form-group-additional-information">
															<label class="f-medium c-negro" for="hyperlink_product_lang_additional_information">'.$lang_global["Link"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu hipervínculo para esta información adicional"].'"><i class="fas fa-question"></i></button></label>
															<input type="text" class="form-control hyperlink_product_lang_additional_information" name="hyperlink_product_lang_additional_information" id="hyperlink_product_lang_additional_information" value="" placeholder="">
														</div>
														<div class="form-group mt-4">
															<button type="submit" class="btn btn-dark">'.$lang_global["Registrar"].'</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-lg-6 col-xl-8 pt-5">');
							  						//$id_internal_sections
														//4 = Perfil de usuario
															//14 = Galería
														//15 = Productos
															//1 = Stripe
															//2 = Informacion adicional
															//3 = Promocion s_product_lang_promotion
															//4 = Promocion s_visible_product_lang_promotion

																									//$id_product_lang,$id_type_image,$id_internal_sections
													productDao::displayAdditionalProductInformation($id_product_lang,$obj_image_lang->getId_type_image(),2);
									  echo('</div>
										</div>
						      		</div><!-- END additional_information -->
						      		<div class="tab-pane fade" id="presentations" role="tabpanel" aria-labelledby="presentations-tab">
										<form id="step-3-product" class="form-horizontal" autocomplete="off" novalidate="novalidate">
											<div class="row">
												<div class="col-lg-6 col-xl-4">
													<div class="p-4" style="border: 1px solid #ced4da;">
														<div class="form-group">
															<label class="f-medium c-negro" for="id_attribute"><span class="required">*</span> '.$lang_global["Atributo padre"].' <button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Info atributo padre"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button>
															</label>
															<select data-plugin-selectTwo class="form-control populate" name="id_attribute" id="id_attribute">');

							  									//$type_action
																	//0 = NO ES OBLIGATORIO EL ID
																		//0 = NULLO
																	//1 = ES OBLIGATORIO EL ID
																		//$id_attribute

										  	  					$topAttributesArray =  attributeDao::showBaseAttributes();

										  	  												//$data,$type_action,$id_table
										  	  					echo attributeDao::selectTree($topAttributesArray,0,0);

													  echo('</select>
														</div>
														<div class="form-group">
							                  				<label class="f-medium c-negro d-block text-center mb-0" for="fileInputProductPresentationImage"><span class="required">*</span> '.$lang_global["Selecciona la imagen"].'</label>
							                  				<small class="d-block text-center c-negro">'.$lang_global["Formatos aceptados: JPG, JPEG, PNG y SVG"].'</small>
															<div class="fileupload fileupload-new mt-3" data-provides="fileupload">
																<div class="input-append text-center">
																	<div class="uneditable-input">
																		<i class="fas fa-file fileupload-exists"></i>
																		<span class="fileupload-preview"></span>
																	</div>
																	<span class="btn btn-default btn-file">
																		<span class="fileupload-exists">'.$lang_global["Cambiar"].'</span>
																		<span class="fileupload-new">'.$lang_global["Seleccionar archivo"].'</span>
																		<input type="file" name="fileInputProductPresentationImage" id="fileInputProductPresentationImage" class="form-control" required>
																	</span>
																	<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">'.$lang_global["Quitar"].'</a>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="general_price_product_lang_presentation_lang">'.$lang_global["Precio"].' ('.$lang_global["Sin IVA"].')</label>
															<div class="input-group">
																<span class="input-group-prepend">
																	<span class="input-group-text">'.$symbol_type_of_currency_lang.'</span>
																</span>
																<input type="text" class="form-control" name="general_price_product_lang_presentation_lang" id="general_price_product_lang_presentation_lang" value="" data-bs-toggle="tooltip" title="'.$lang_global["Tu precio para este producto"].'" placeholder="'.$lang_global["Ejemplo"].': 42.00" onkeypress="return NumCheck(event, this)">
															</div>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="general_stock_product_lang_presentation_lang">'.$lang_global["Cantidad"].'</label>
															<input type="text" class="form-control" name="general_stock_product_lang_presentation_lang" id="general_stock_product_lang_presentation_lang" value="" data-bs-toggle="tooltip" title="'.$lang_global["Tu cantidad para este producto"].'" onkeypress="return soloNumerosSinPunto(event)">
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="reference_product_lang_presentation_lang">'.$lang_global["Referencia"].'</label>
															<input type="text" data-plugin-maxlength maxlength="40" class="form-control" name="reference_product_lang_presentation_lang" id="reference_product_lang_presentation_lang" value="" data-bs-toggle="tooltip" title="'.$lang_global["Tu código de referencia para este producto"].'">
														</div>
														<h5 class="c-negro f-medium mt-4 mb-4">'.$lang_global["Optimización motores de búsqueda (SEO)"].'</h5>
														<div class="form-group">
															<label class="f-medium c-negro" for="meta_title_product_lang_presentation_lang">'.$lang_global["Meta-título"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu meta titulo"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
															<div class="input-group">
																<span class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="fab fa-google"></i>
																	</span>
																</span>
																<input type="text" data-plugin-maxlength maxlength="128" class="form-control" name="meta_title_product_lang_presentation_lang" id="meta_title_product_lang_presentation_lang" value="">
															</div>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="meta_description_product_lang_presentation_lang">'.$lang_global["Meta descripción"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu meta descripción"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
															<textarea data-plugin-maxlength maxlength="255" id="meta_description_product_lang_presentation_lang" class="form-control" rows="4" name="meta_description_product_lang_presentation_lang" style="border-radius: 0;"></textarea>
														</div>
														<div class="form-group">
															<label class="f-medium c-negro" for="meta_keywords_product_lang_presentation_lang">'.$lang_global["Meta palabras clave"].'<button type="button" class="info ms-2 mb-1" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="right" data-bs-content="'.$lang_global["Tu meta keywords"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button>
															</label>
															<input type="text" data-plugin-maxlength maxlength="500" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" name="meta_keywords_product_lang_presentation_lang" id="meta_keywords_product_lang_presentation_lang" value="">
														</div>
														<div class="form-group mt-4">
															<button type="submit" class="btn btn-dark">'.$lang_global["Registrar"].'</button>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-xl-8 pt-5">
													<section class="media-gallery product-presentation">
														<div class="clearfix">
															<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">');

									  											//$id_type_image,$id_product,$id_product_lang,$symbol_type_of_currency_lang,$id_lang
									  						productPresentationDao::showProductGalleryPresentation($obj_image_lang->getId_type_image(),$obj_product_lang->getId_product(),$id_product_lang,$symbol_type_of_currency_lang,$id_lang_basic_product_settings);

									      			  echo('</div>
														</div>
													</section>
									      		</div>
											</div>
										</form>
						      		</div><!-- END presentations -->');
						      		//$id_type_product
							  			//0 = Registro nuevo
							  			//1 = Producto
							  			//2 = Accesorio
							  		//$id_user
							  			//0 = Registro nuevo
					  				if($id_type_product != 2 && $id_user > 0){
						      echo('<div class="tab-pane fade" id="related_products" role="tabpanel" aria-labelledby="related_products-tab">
										<div class="row">
											<div class="col-lg-6 col-xl-4">
												<form id="step-4-product" class="form-horizontal pb-5" autocomplete="off" novalidate="novalidate">
													<div class="p-5" style="border: 1px solid #ced4da;">
														<div class="form-group">
															<label class="f-medium c-negro" for="parent_id_product"><span class="required">*</span> '.$lang_global["Asociar producto"].'</label>
															<select name="parent_id_product" id="parent_id_product" data-plugin-selectTwo class="form-control populate" required>');

							  									//$id_lang,$id_product_main,$id_user_main
						  										//productDao::showListOfProductsToAssociate($id_lang_basic_product_settings,$obj_product_lang->getId_product(),$id_user);

													  echo('</select>
														</div>
														<div class="form-group mt-4">
															<button type="submit" class="btn btn-dark">'.$lang_global["Asociar"].'</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-lg-6 col-xl-8 pt-5">');
												//$id_product,$id_lang,$id_type_image
												//productDao::showAssociatedProducts($obj_product_lang->getId_product(),$id_lang_basic_product_settings,$obj_image_lang->getId_type_image());
									  echo('</div>
										</div>
						      		</div><!-- END related_products -->');
						  			}
						      echo('<div class="tab-pane fade" id="attached_files" role="tabpanel" aria-labelledby="attached_files-tab">
										<div class="row">
											<div class="col-lg-6 col-xl-3 pt-5">
												<form id="step-5-product" class="form-horizontal" autocomplete="off" novalidate="novalidate">
													<div class="p-4">
														<div class="form-group">
															<label class="f-medium c-negro" for="title_file_lang">'.$lang_global["Título"].' <em>('.$lang_global["opcional"].')</em></label>
															<input type="text" class="form-control" data-plugin-maxlength maxlength="70" name="title_file_lang" id="title_file_lang" value="">
														</div>
														<div class="form-group">
															<div class="btn btn-xs btn-dark mb-3">
																<input type="file" name="generalFile" id="generalProductLangFile-'.$id_product_lang.'" class="inputfile inputfile-2 generalProductLangFile" data-id-general-file="'.$id_product_lang.'">
																<label class="ver-2" for="generalProductLangFile-'.$id_product_lang.'">
																	<i class="fas fa-upload me-2 c-blanco"></i>
																	<span class="iborrainputfile c-blanco">'.$lang_global["Subir archivos"].'</span>
																</label>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="col-lg-6 col-xl-9 pt-4">');
												//$id_product_lang,$id_type_image,$title_product_lang
												//productDao::showRegisteredProductFiles($id_product_lang,$obj_image_lang->getId_type_image(),$title_product_lang);
									  echo('</div>
										</div>
						      		</div><!-- END attached_files -->');
						  		}
						  echo('</div>
							</div>
						</div>

					</section>');
				}
			}else{
					echo('<h4 class="text-center f-bold">'.$lang_global["Variables vacías"].'</h4>');
				 }
		}

		/**
		 * [showProductType description]
		 *
		 * @param  [type]  $id_type_product_selected [description]
		 * @param  [type]  $id_action                [description]
		 * @param  [type]  $id_lang                  [description]
		 * @param  [type]  $lang_global_1            [description]
		 * @param  integer $x                        [description]
		 * @return [type]                            [description]
		 */

		private static function showProductType($id_type_product_selected,$id_action,$id_lang,$lang_global_1,$x = 0)
		{
			//NO ES NECESARIO VALIDAR $id_type_product_selected YA QUE SI ES UN REGISTRO NUEVO, ESTE INT SERA = 0
			if(!empty(intval(trim($id_action))) && !empty(intval(trim($id_lang))) && !empty($lang_global_1)){
		  echo('<span class="badge badge-primary">'.$lang_global_1.'</span>
				<div class="d-flex">');

		  			//CREAR OBJETO
					$ob_conectar 			= new conectorDB();

					$consulta_product_type 	= "CALL showProductType(:id_lang)";
					$valores_product_type	= array('id_lang' => $id_lang);

				    $resultado_product_type = $ob_conectar->consultarBD($consulta_product_type,$valores_product_type);

				  	foreach($resultado_product_type as &$datos_product_type)
				    {
				    	if($datos_product_type['ERRNO'] == 2 && !empty(intval(trim($datos_product_type['id_type_product']))) && !empty($datos_product_type['title_type_product_lang']))
				    	{
			            	//$id_action
						    	//1 = Update
						    	//2 = Register

						  echo('<div class="radio-custom radio-success mb-0 me-3">
						  			<input type="radio" id="id_type_product_'.$datos_product_type['id_type_product'].'" name="id_type_product" data-title="'.$datos_product_type['title_type_product_lang'].'" value="'.$datos_product_type['id_type_product'].'"');

					            	if($id_action == 2)
						            {
						            	echo($x == 0 ? ' checked' : '');
						            }else{
						            	echo($id_type_product_selected == $datos_product_type['id_type_product'] ? ' checked' : '');
						                 }

						      echo('/><label for="id_type_product_'.$datos_product_type['id_type_product'].'">'.$datos_product_type['title_type_product_lang'].'</label>
						  	    </div>');

				            $x++;
				    	}
				    }

		  echo('</div>');
			}
		}

		/**
		 * [showTypeTagList description]
		 *
		 * @param  [type] $selected             [description]
		 * @param  [type] $id_type_tag_selected [description]
		 * @return [type]                       [description]
		 */

		private static function showTypeTagList($selected,$id_type_tag_selected)
   		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//$selected
				//0 = inactivo
				//1 = activo
			//$id_type_tag_selected
				//0 = No hay type_tag_selected
				//1 = $id_type_tag

			$ob_conectar 	= new conectorDB();

			$consulta 		= "CALL showTypeTagList()";
            $resultado   	= $ob_conectar->consultarBD($consulta,null);

          	foreach($resultado as &$datos)
            {
            	if($datos['ERRNO'] == 2)
            	{
            		echo(empty($datos['id_type_tag']) || empty($datos['title_type_tag_lang']) ? '<option value="">'.$lang_global["Error 1"].'</option>' : '<option value="'.$datos['id_type_tag'].'"'.($selected == 1 && $id_type_tag_selected > 0 && $datos['id_type_tag'] == $id_type_tag_selected ? ' selected' : '').'>'.$datos['title_type_tag_lang'].'</option>');
            	}else{
            			echo('<option value="">'.$lang_global["Error 1"].'</option>');
            		 }
            }
   		}

		public static function displayAdditionalProductInformation($id_product_lang,$id_type_image,$id_internal_sections,$x = 1)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty($id_product_lang) && !empty($id_type_image) && !empty($id_internal_sections))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 	= "CALL showDatatableAdditionalProductInformation(:id_product_lang)";
				$valores	= array('id_product_lang' => $id_product_lang);
				$resultado 	= $ob_conectar->consultarBD($consulta,$valores);

				foreach($resultado as &$datos)
				{
					//EL $datos['s_visible_product_lang_additional_information']) NO ES OBLIGATORIO POR QUE SU VALOR PUEDE SER 0
					if($datos['ERRNO'] == 2 && $datos['TOTAL_ADDITIONALS_PRODUCTS'] > 0 && !empty($datos['id_product_lang_additional_information']) && !empty($datos['id_type_tag']) && !empty($datos['tag_product_lang_additional_information']) && !empty($datos['content_product_lang_additional_information']))
					{
						if($x == 1){
							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

					  echo('<table class="table table-bordered table-striped mb-0" id="datatable-additional-products-information" data-order="[]" data-page-length="10">
								<thead>
									<tr>
										<th>ID</th>
										<th>'.$lang_global['Tipo de contenido'].'</th>
										<th>'.$lang_global['Título'].'</th>
										<th>'.$lang_global['Contenido'].'</th>
										<th>'.$lang_global['Link'].'</th>
										<th>'.$lang_global['Estatus'].'</th>
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody id="sortable-additional-products-information">');
						}

								echo('<tr id="item-id_product_lang_additional_information-'.$datos['id_product_lang_additional_information'].'" data-id="'.$datos['id_product_lang_additional_information'].'">
										<td>'.$datos['id_product_lang_additional_information'].'</td>
										<td>');
																					//$id_type_tag
											productDao::showTypeTagByTypeTagId($datos['id_type_tag']);
								echo('</td>
										<td>'.$datos['tag_product_lang_additional_information'].'</td>
										<td>'.$datos['content_product_lang_additional_information'].'</td>
										<td>'.$datos['hyperlink_product_lang_additional_information'].'</td>
										<td class="text-center">');
											//$id_internal_sections
												//4 = Perfil de usuario
													//14 = Galería
												//15 = Productos
													//1 = Stripe
													//2 = Informacion adicional
													//3 = Promocion s_product_lang_promotion
													//4 = Promocion s_visible_product_lang_promotion

																			//$section,$id_table,$title_table,$s_table,$id_type_image,$id_internal_sections,$lang_titulo
											pluginIosSwitchInternalSections('product-internal-sections',$datos['id_product_lang_additional_information'],$lang_global['Información adicional'],$datos['s_visible_product_lang_additional_information'],$id_type_image,$id_internal_sections,$lang_global['Activar o desactivar']);
								  echo('</td>
										<td class="text-center">
											<a class="modal-with-zoom-anim modal-update-specific-table d-inline me-2" data-bs-toggle="tooltip" title="'.$lang_global['Modificar'].'" href="#modal-update-specific-information-'.$datos['id_product_lang_additional_information'].'" data-form="update-information-product-lang-additional-information-'.$datos['id_product_lang_additional_information'].'"><i class="fas fa-pencil-alt fa-lg"></i></a>
											<a class="modal-with-zoom-anim modal-delete-specific-table d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.$datos['content_product_lang_additional_information'].'" href="#modal-delete-specific-table" data-form="delete-additional-information" data-delete-specific-table="'.$datos['id_product_lang_additional_information'].'/'.$datos['tag_product_lang_additional_information'].'/'.$id_type_image.'"><i class="fas fa-trash fa-lg"></i></a>

											<div id="modal-update-specific-information-'.$datos['id_product_lang_additional_information'].'" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide mw-900">
												<section class="card">
													<header class="card-header">
														<h2 class="card-title">'.$lang_global['Modificar información'].'</h2>
													</header>
													<form id="update-information-product-lang-additional-information-'.$datos['id_product_lang_additional_information'].'" class="form-horizontal" data-modal-update-specific-table-information="'.$datos['id_product_lang_additional_information'].'" method="POST" action="/" novalidate="novalidate">
														<div class="card-body rounded-0">
															<div class="form-group">
																<label class="f-medium c-negro" for="id_type_tag_upd"><span class="required">*</span> '.$lang_global["Tipo de contenido"].'</label>
																<select name="id_type_tag_upd" id="id_type_tag_upd" data-plugin-selectTwo class="form-control id_type_tag populate" required>
																	<option value="">'.$lang_global["Selecciona una opción"].'</option>');
																		//$selected
																			//0 = inactivo
																			//1 = activo
																		//$id_type_tag_selected
																			//0 = No hay type_tag_selected
																			//1 = $id_type_tag

																					//$selected,$id_type_tag_selected
																		productDao::showTypeTagList(1,$datos['id_type_tag']);
														echo('</select>
															</div>
															<div class="form-group mb-3">
																<label class="f-medium c-negro" for="tag_product_lang_additional_information_upd"><span class="required">*</span> '.$lang_global["Título de información adicional"].'</label>
																<input type="text" class="form-control" data-plugin-maxlength maxlength="100" name="tag_product_lang_additional_information_upd" id="tag_product_lang_additional_information_upd" value="'.$datos['tag_product_lang_additional_information'].'" autocomplete="off" required>
															</div>
															<div class="form-group mb-3">
																<label class="f-medium c-negro" for="content_product_lang_additional_information_upd"><span class="required">*</span> '.$lang_global["Contenido de información adicional"].'</label>
																<textarea id="content_product_lang_additional_information_upd" class="form-control" rows="6" name="content_product_lang_additional_information_upd" style="border-radius: 0;" required>'.$datos['content_product_lang_additional_information'].'</textarea>
															</div>
															<div class="form-group mb-3 form-group-additional-information"'.($datos['id_type_tag'] == 1 ? ' style="display:none;"' : '') . '>
																<label class="f-medium c-negro" for="hyperlink_product_lang_additional_information_upd">'.$lang_global["Hipervínculo de información adicional"].'<button type="button" class="info ml-2" data-toggle="popover" data-container="body" data-placement="right" data-content="'.$lang_global["Tu hipervínculo para esta información adicional"].'" data-original-title="" title=""><i class="fas fa-question" style="font-size: 9px;"></i></button></label>
																<input type="text" class="form-control hyperlink_product_lang_additional_information" name="hyperlink_product_lang_additional_information_upd" id="hyperlink_product_lang_additional_information_upd" value="'.$datos['hyperlink_product_lang_additional_information'].'" placeholder="" autocomplete="off">
															</div>
														</div>
														<footer class="card-footer text-right">
															<button type="submit" class="btn btn-primary modal-confirm">'.$lang_global["Modificar"].'</button>
															<button class="btn btn-default modal-dismiss">'.$lang_global["Cancelar"].'</button>
														</footer>
													</form>
												</section>
											</div>
										</td>
									</tr>');
						if(count($resultado) == $x){
							echo('</tbody>
							</table>');
						}
						$x++;
					}else{
							echo('<h3><span class="badge bg-dark">'.$lang_global['Sin productos registrados'].'</span></h3>');
						 }//END IF
				}//END FOREACH

			}else{
					echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [showTypeTagByTypeTagId description]
		 *
		 * @param  [type] $id_type_tag [description]
		 * @return [type]              [description]
		 */

		private static function showTypeTagByTypeTagId($id_type_tag)
		{
			if(!empty($id_type_tag)){

				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
				require(self::$file_global);

	 			//CREAR OBJETO
				$ob_conectar 		= new conectorDB();

				$consulta_pt 		= "CALL showTypeTagByTypeTagId(:id_type_tag)";
				$valores_pt			= array('id_type_tag'=> $id_type_tag);
			    $resultado_pt   	= $ob_conectar->consultarBD($consulta_pt,$valores_pt);

			  	foreach($resultado_pt as &$datos_pt)
			    {
			    	if($datos_pt['ERRNO'] == 2)
			    	{
			            if(!empty($datos_pt['title_type_tag_lang']) && !empty($datos_pt['badge_type_tag_lang']))
			            {
			            	echo('<span class="badge badge-'.(!empty($datos_pt['badge_type_tag_lang']) ? $datos_pt['badge_type_tag_lang'] : 'primary').'">'.$datos_pt['title_type_tag_lang'].'</span>');
			            }
			    	}
			    }
			}
		}

		public static function registerProductAdditionalInformation($obj_type_tag_lang,$obj_product_lang,$obj_product_lang_additional_information)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_product_lang->getId_product_lang()) && !empty($obj_type_tag_lang->getId_type_tag()) && !empty($obj_product_lang_additional_information->getTag_product_lang_additional_information()) && !empty($obj_product_lang_additional_information->getContent_product_lang_additional_information())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL registerProductAdditionalInformation(:id_product_lang,:id_type_tag,:tag_product_lang_additional_information,:content_product_lang_additional_information,:hyperlink_product_lang_additional_information)";
	            $valores		= array('id_product_lang' 								=> $obj_product_lang->getId_product_lang(),
	        							'id_type_tag' 									=> $obj_type_tag_lang->getId_type_tag(),
	        							'tag_product_lang_additional_information' 		=> $obj_product_lang_additional_information->getTag_product_lang_additional_information(),
	        							'content_product_lang_additional_information' 	=> $obj_product_lang_additional_information->getContent_product_lang_additional_information(),
	        							'hyperlink_product_lang_additional_information' => $obj_product_lang_additional_information->getHyperlink_product_lang_additional_information());

				$resultado 	= $ob_conectar->consultarBD($consulta,$valores);

				foreach($resultado as &$atributo)
				{
					switch ($atributo['ERRNO']) {
						case 3://EL TITULO YA ESTA REGISTRADO
							$valor = array("estado" => "false",
										   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["El título"],"/PARA2/",stripslashes($obj_product_lang_additional_information->getTag_product_lang_additional_information()),$lang_error["Error 7"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
						case 4://CORRECTO
							self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

							$ob_conectar->registerRecordFourParameters($_SESSION['id_user_dao'],$lang_error["Asocio"],$obj_product_lang_additional_information->getTag_product_lang_additional_information(),$lang_error["al producto"],$obj_product_lang->getId_product_lang(),$lang_record["Historial 4"]);

							$valor = array("estado" 										=> "true",
										   "resultado" 										=> $lang_error["Información adicional asociada"],
										   "id_product_lang_additional_information" 		=> $atributo['ID_P_LA_ADD_I'],
										   "id_type_tag" 									=> $obj_type_tag_lang->getId_type_tag(),
										   "tag_product_lang_additional_information" 		=> $obj_product_lang_additional_information->getTag_product_lang_additional_information(),
										   "content_product_lang_additional_information" 	=> $obj_product_lang_additional_information->getContent_product_lang_additional_information(),
										   "hyperlink_product_lang_additional_information" 	=> $obj_product_lang_additional_information->getHyperlink_product_lang_additional_information());
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
						default:
							//$atributo['ERRNO']
								//1 = EL ID PRODUCTO LANG NO EXISTE
								//2 = EL ID TYPE TAG NO EXISTE
							$valor = array("estado" => "false",
										   "error" 	=> $lang_error["Error 1"].'('.$atributo['ERRNO'].')');
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
					}
				}//END call registerProductAdditionalInformation
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang['Variables vacías'].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		public static function updateInformationProductAdditionalInformation($obj_type_tag_lang,$obj_product_lang_additional_information)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty($obj_product_lang_additional_information->getId_product_lang_additional_information()) && !empty($obj_type_tag_lang->getId_type_tag()) && !empty($obj_product_lang_additional_information->getTag_product_lang_additional_information()) && !empty($obj_product_lang_additional_information->getContent_product_lang_additional_information())){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL updateInformationProductAdditionalInformation(:id_product_lang_additional_information,:id_type_tag,:tag_product_lang_additional_information,:content_product_lang_additional_information,:hyperlink_product_lang_additional_information)";
				$valores		= array('id_product_lang_additional_information' 		=> $obj_product_lang_additional_information->getId_product_lang_additional_information(),
										'id_type_tag' 									=> $obj_type_tag_lang->getId_type_tag(),
										'tag_product_lang_additional_information' 		=> $obj_product_lang_additional_information->getTag_product_lang_additional_information(),
										'content_product_lang_additional_information' 	=> $obj_product_lang_additional_information->getContent_product_lang_additional_information(),
										'hyperlink_product_lang_additional_information' => $obj_product_lang_additional_information->getHyperlink_product_lang_additional_information());

				$resultado 	= $ob_conectar->consultarBD($consulta,$valores);

				foreach($resultado as &$atributo)
				{
					switch ($atributo['ERRNO']) {
						case 3://EL TITULO YA ESTA REGISTRADO
							$valor = array("estado" => "false",
											"error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["El título"],"/PARA2/",stripslashes($obj_product_lang_additional_information->getTag_product_lang_additional_information()),$lang_error["Error 7"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
						case 4://CORRECTO
							self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

							$ob_conectar->registerRecordThreeParameters($_SESSION['id_user_dao'],$lang_error["Modifico"],$lang_error["la información adicional"],$obj_product_lang_additional_information->getTag_product_lang_additional_information(),$lang_record["Historial 2"]);

							$valor = array("estado" 	=> "true",
											"resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Información adicional"],"/PARA2/",$lang_error["actualizada"],$lang_error["Error 9"]));
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
						default:
							//$atributo['ERRNO']
								//1 = EL ID PRODUCTO LANG NO EXISTE
								//2 = EL ID TYPE TAG NO EXISTE
							$valor = array("estado" => "false",
											"error" 	=> $lang_error["Error 1"].'('.$atributo['ERRNO'].')');
							return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
							exit();
						break;
					}
				}
			}else{
					$valor = array("estado" => "false",
									"error" 	=> $lang_error['Variables vacías'].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		public static function deleteProductAdditionalInformation($obj_product_lang_additional_information,$obj_image_lang)
		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require(self::$file_error);

			if(!empty($obj_product_lang_additional_information->getId_product_lang_additional_information()) && !empty($obj_product_lang_additional_information->getTag_product_lang_additional_information()) && !empty($obj_image_lang->getId_type_image()))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

      			$consulta 		= "CALL deleteProductAdditionalInformation(:id_product_lang_additional_information)";
	            $valores		= array('id_product_lang_additional_information' => $obj_product_lang_additional_information->getId_product_lang_additional_information());

				$resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		switch ($datos['ERRNO']) {
            			case 2://CORRECTO
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

            				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
		            		require_once(self::$file_record);

            				$ob_conectar->registerRecordOneParameter($_SESSION['id_user_dao'],$obj_product_lang_additional_information->getId_product_lang_additional_information(),replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($obj_product_lang_additional_information->getTag_product_lang_additional_information()),$lang_record["Historial 3"]));

            				$page = $ob_conectar->returnPage($obj_image_lang->getId_type_image());

            				$valor = array("estado" 	=> "true",
										   "item" 		=> $obj_product_lang_additional_information->getId_product_lang_additional_information(),
										   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"],$lang_error["Error 9"]),
										   "pagina" 	=> $page);
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
            			break;
            			default:
            				$valor = array("estado" => "false",
										   "error" 	=> replaceStringOneParameterArray("/PARA1/",$lang_error["la información adicional"],$lang_error["Error 26"]));
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

		/**
		 * [showGalleryProductsHome description]
		 *
		 * @param  [type]  $id_type_image [description]
		 * @param  [type]  $id_product    [description]
		 * @param  [type]  $id_lang       [description]
		 * @param  string  $route_default [description]
		 * @param  integer $measure       [description]
		 * @param  integer $x             [description]
		 * @return [type]                 [description]
		 */

		private static function showGalleryProductsHome($id_type_image,$id_product,$id_lang,$route_default = "img/image_not_found_100.jpg",$measure = 95,$x = 1)
    	{
			self::$file_global 	= dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($id_type_image))) && !empty(intval(trim($id_product))) && !empty(intval(trim($id_lang))))
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

      			$consulta 		= "CALL showGalleryProductsHome(:id_product,:id_lang)";
      			$valores 		= array('id_product' 	=> $id_product,
      									'id_lang' 		=> $id_lang);

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_GALLERY_PRODUCT'] > 0 && !empty(intval(trim($datos['id_product_lang_image_lang']))) && !empty(intval(trim($datos['id_product_lang']))) && !empty(intval(trim($datos['id_image']))) && !empty(intval(trim($datos['id_image_lang']))) && !empty(intval(trim($datos['id_image_lang_version']))) && !empty($datos['title_image_lang']) && !empty($datos['image_lang']) && !empty($datos['format_image']))
            		{
        				$file_type = explode("/", $datos['format_image']);

						if(!empty($file_type[0]) && $file_type[0] == "video"){
							$route_default		= "img/video_not_found_142.jpg";
							$measure 			= 0;
						}

						//$type_iso
							//'' = Sin prefijo idioma
							//iso_code (ESP, ENG)
        				//$type_return
							//1 = echo
							//2 = return

       								//$id_image,$image_lang,$type_iso,$title_image_lang,$id_image_lang_version,$s_main_image_lang_version,$dirname,$full_path,$measure,$route_default,$size_image,$format_image,$id_product_lang_image_lang,$lang_global_1,$lang_global_2,$type_return,$url
        				productDao::boxMediaGalleryProductCover($datos['id_image'],$datos['image_lang'],'',$datos['title_image_lang'],$datos['id_image_lang_version'],$datos['s_main_image_lang_version'],'',self::$full_path,$measure,$route_default,$datos['size_image'],$datos['format_image'],$datos['id_product_lang_image_lang'],$lang_global['Portada'],$lang_global['General'],1,URL);
            		}
				}
			}
		}

		/**
		 * [boxMediaGalleryProductCover description]
		 *
		 * @param  [type] $id_image                   [description]
		 * @param  [type] $image_lang                 [description]
		 * @param  [type] $type_iso                   [description]
		 * @param  [type] $title_image_lang           [description]
		 * @param  [type] $id_image_lang_version      [description]
		 * @param  [type] $s_main_image_lang_version  [description]
		 * @param  [type] $dirname                    [description]
		 * @param  [type] $full_path                  [description]
		 * @param  [type] $measure                    [description]
		 * @param  [type] $route_default              [description]
		 * @param  [type] $size_image                 [description]
		 * @param  [type] $format_image               [description]
		 * @param  [type] $id_product_lang_image_lang [description]
		 * @param  [type] $lang_global_1              [description]
		 * @param  [type] $lang_global_2              [description]
		 * @param  [type] $type_return                [description]
		 * @param  [type] $url                        [description]
		 * @return [type]                             [description]
		 */

		private static function boxMediaGalleryProductCover($id_image,$image_lang,$type_iso,$title_image_lang,$id_image_lang_version,$s_main_image_lang_version,$dirname,$full_path,$measure,$route_default,$size_image,$format_image,$id_product_lang_image_lang,$lang_global_1,$lang_global_2,$type_return,$url)
    	{
			$type 		= ($s_main_image_lang_version == 1 ? $lang_global_1 : $lang_global_2);
			$file_type 	= explode("/", $format_image);

    $box_media_gallery_product_cover = '<li class="ms-1 me-2" data-id="'.$id_image.'">
	   										<div id="box-media-gallery-product-cover-'.$id_image_lang_version.'" class="col-auto box-media-gallery-product-cover">
									  			<section class="card card-featured-left card-featured-tertiary mb-3">
													<div class="card-body" style="background: #fff;border-top: 1px solid #2baab1;border-bottom: 1px solid #2baab1;border-right: 1px solid #2baab1;padding: .8rem .8rem .3rem;">
														<div class="widget-summary widget-summary-lg">
															<div class="widget-summary-image p-relative">';

																if(!empty($file_type[0]) && $file_type[0] == "video"){
																//MOSTRAR POPUP DEL VIDEO
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
						   $box_media_gallery_product_cover .= '<a class="popup-youtube" href="'.imageDao::returnImage($image_lang,$dirname,$full_path,$measure,$route_default,2,$type_iso,1).'">
						   											<i class="fas fa-video fa-fw c-blanco text-center d-flex align-items-center" style="font-size: 15px;position: absolute;left:5px;top:3px;width: 100%;"> <span class="f-medium ms-1" style="font-size: 0.6rem;">Reproducir</span></i>
						   											<img src="'.$url.$route_default.'" alt="'.$title_image_lang.'">
						   										</a>';
																}else{
																	//MOSTRAR POPUP IMAGEN
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
							   $box_media_gallery_product_cover .= '<img src="'.imageDao::returnImage($image_lang,$dirname,$full_path,$measure,$route_default,2,$type_iso,1).'" alt="'.$title_image_lang.'">';
																	 }

		   			   $box_media_gallery_product_cover .= '</div>
													  		<div class="widget-summary-col ps-3">
																<div class="summary">
																	<div class="info mb-2">
																		<strong class="amount">'.$type.'</strong>
																	</div>
															        <span class="text-danger f-bold">('.$size_image.')</span>
																	<span class="text-primary f-medium ps-1">'.$format_image.'</span>
																</div>
																<div class="summary-footer">
																	<div class="btn-group flex-wrap">
																		<button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown"><span class="caret"></span></button>
																		<div class="dropdown-menu" role="menu">
																			<span class="dropdown-item text-1 leave-as-main-product" rel="noopener" role="button" data-main-product="'.$id_image_lang_version.'">
																				<i class="far fa-file-video fa-fw" style="font-size: 15px;"></i> Dejar como portada principal
																			</span>
																			<a class="dropdown-item text-1 modal-with-zoom-anim modal-update-image" href="#modal-update-image" data-update-image="'.$id_image_lang_version.'/'.$title_image_lang.'/1">
																				<i class="far fa-edit fa-fw" style="font-size: 15px;"></i> Modificar archivo
																			</a>
																			<div class="dropdown-divider"></div>
																			<a class="dropdown-item text-1 modal-with-zoom-anim modal-delete-with-image-version-3-parameters" href="#modal-delete-with-image-version-3-parameters" data-delete-with-image-version-3-parameters="'.$id_image_lang_version.'/'.$title_image_lang.'/box-media-gallery-product-cover-">
																				<i class="fas fa-trash fa-fw" style="font-size: 15px;"></i> Eliminar
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</section>
									  		</div>
									  	</li>';

			//$type_return
				//1 = echo
				//2 = return
			if($type_return == 1){
				echo $box_media_gallery_product_cover;
			}else{
				return $box_media_gallery_product_cover;
				 }
		}

		/**
		 * [uploadProductCover description]
		 *
		 * @param  [type]  $id_call                      [description]
		 * @param  [type]  $obj_lang                     [description]
		 * @param  [type]  $obj_type_of_currency         [description]
		 * @param  [type]  $obj_tax_rule                 [description]
		 * @param  [type]  $obj_product_lang             [description]
		 * @param  [type]  $obj_image_lang               [description]
		 * @param  string  $imageUpload                  [description]
		 * @param  string  $return_boolean               [description]
		 * @param  string  $estado                       [description]
		 * @param  string  $tipo_msj                     [description]
		 * @param  string  $devuelve                     [description]
		 * @param  string  $div_ajax                     [description]
		 * @param  string  $box_media                    [description]
		 * @param  string  $imageWithPrefixLang          [description]
		 * @param  integer $x                            [description]
		 * @param  string  $estadoRedireccionar          [description]
		 * @param  string  $route_default                [description]
		 * @param  array   $arrayWithImageWithPrefixLang [description]
		 * @return [type]                                [description]
		 */

		public static function uploadProductCover($id_call,$obj_lang,$obj_type_of_currency,$obj_tax_rule,$obj_product_lang,$obj_image_lang,$imageUpload = "",$return_boolean = "",$estado = "false",$tipo_msj = "error",$devuelve = "",$div_ajax = "false",$box_media = "",$imageWithPrefixLang = "",$x = 0,$estadoRedireccionar = "true",$route_default = "img/image_not_found_100.jpg")
        {
        	self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//NO ES NECESARIO VALIDAR $obj_product_lang->getId_product_lang() YA QUE SU VALOR PUEDE SER 0
			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty(intval(trim($obj_type_of_currency->getId_type_of_currency()))) && !empty(intval(trim($obj_tax_rule->getId_tax_rule()))) && !empty(intval(trim($obj_product_lang->getId_product()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($id_call))) && !empty($obj_product_lang->getTitle_product_lang()) && !empty($obj_product_lang->getFriendly_url_product_lang()))
			{
				self::$folder = imageDao::showFolderByIdTypeImage($obj_image_lang->getId_type_image());

				if(self::$folder == FALSE || empty(self::$folder))
				{
					$valor = array("estado" 		=> "false",
								   "error" 			=> $lang_error["Error 14"],
								   "redireccionar" 	=> "true");
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
					            //CREAR OBJETO
								$ob_conectar 		= new conectorDB();

								$consulta1 			= "CALL registerImageProduct(:id_product,:id_user,:id_type_image,:file_type,:file_size)";
								$valores1 			= array('id_product' 		=> $obj_product_lang->getId_product(),
															'id_user' 			=> $_SESSION['id_user_dao'],
															'id_type_image' 	=> $obj_image_lang->getId_type_image(),
															'file_type' 		=> $obj_image_lang->getFile_type(),
															'file_size' 		=> $obj_image_lang->getFile_size());

					            $resultado1 	 	= $ob_conectar->consultarBD($consulta1,$valores1);

					            foreach($resultado1 as &$atributo1)
								{
							 		switch (intval(trim($atributo1['ERRNO'])))
							 		{
							 			case 5://CORRECTO
							 				self::$file_help 	= dirname(__DIR__).'/helps/help.php';
								            require_once(self::$file_help);

							 				$id_image = intval(trim($atributo1["ID_IMG"]));

							 				if(!empty($id_image))
							 				{
							 					$file_type 		= explode("/", $obj_image_lang->getFile_type());

							 					//$id_call
													//1 = Update
											    	//2 = Register

							 					$consulta2  = "CALL ".($id_call == 1 ? 'showAllProductsLangByProductId(:id_product)' : 'registerBasicInformationProduct(:id_product,:id_tax_rule,:id_type_of_currency,:title_product_lang,:friendly_url_product_lang)')."";

							 					$valores2 			  = array('id_product' => $obj_product_lang->getId_product());

							 					if($id_call == 2){
							 						$valores2['id_tax_rule'] 	 			= $obj_tax_rule->getId_tax_rule();
													$valores2['id_type_of_currency'] 	 	= $obj_type_of_currency->getId_type_of_currency();
													$valores2['title_product_lang'] 	 	= $obj_product_lang->getTitle_product_lang();
													$valores2['friendly_url_product_lang'] 	= $obj_product_lang->getFriendly_url_product_lang();
							 					}

							 					$resultado2 = $ob_conectar->consultarBD($consulta2,$valores2);

									            foreach($resultado2 as &$atributo2)
									            {
									                if(intval(trim($atributo2['ERRNO'])) == 1)
									                {
									                								//$route,$file
									                	imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

								                		$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 11"]."(1)";
									                }else{
									                		$id_product_lang  	= intval(trim($atributo2['id_product_lang']));
									                		$id_lang  			= intval(trim($atributo2['id_lang']));
									                		$iso_code 			= $atributo2['iso_code'];

									                		if(!empty($id_product_lang) && !empty($id_lang) && !empty($iso_code))
							 								{
							 									if($file_type[0] != "video"){
							 										$imageWithPrefixLang = imageDao::renameImageLang($imageUpload,$iso_code);
							 									}else{
							 										$imageWithPrefixLang = $imageUpload;
							 										 }

							 									if(!empty($imageWithPrefixLang))
							 									{
							 										$consulta3 	= "CALL registerInformationImageProduct(:id_product_lang,:id_lang,:id_image,:title_product_lang,:iso_code,:image_lang)";

																	$valores3 	= array('id_product_lang' 		=> $id_product_lang,
																		     			'id_lang' 				=> $id_lang,
							 															'id_image' 				=> $id_image,
																						'title_product_lang' 	=> $obj_product_lang->getTitle_product_lang(),
																						'iso_code' 				=> $iso_code,
																						'image_lang' 			=> $imageWithPrefixLang);

														            $resultado3 = $ob_conectar->consultarBD($consulta3,$valores3);

														            foreach($resultado3 as &$atributo3)
																 	{
																 		switch (intval(trim($atributo3['ERRNO'])))
																 		{
																 			case 1://CORRECTO
																 				//NO ES NECESARIO VALIDAR S_MAIN_IMG_LA_VER YA QUE SU VALOR PUEDE SER DE 0
																 				if(!empty(intval(trim($atributo3['ID_P_LA_IMG_LA']))) && !empty(intval(trim($atributo3['ID_IMG_LA_VER'])))){

																 					if($x == 0){
																 						self::$file_record 		= dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
								            											require_once(self::$file_record);

																	 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],mb_strtolower($lang_error["La imagen"]),$obj_product_lang->getTitle_product_lang(),$lang_record["Historial 2"]);
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
																														//$folder,$id_type_image,$img
																									imageDao::parametersUploadFile(self::$full_path."/",$obj_image_lang->getId_type_image(),self::$final_full_path,$iso_code);
																								}
																							}
																						}
																					}

																					if($x == 0){
																						self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
																						require(self::$file_global);

																						self::$file_core = dirname(__DIR__).'../../../core/core.php';
					            														require_once(self::$file_core);

																						$estado 	= "true";
																	 					$tipo_msj 	= "resultado";
															                			$devuelve 	= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
															                			$div_ajax   = "true";

															                			//$type_iso
																							//'' = Sin prefijo idioma
																							//iso_code (ESP, ENG)
																        				//$type_return
																							//1 = echo
																							//2 = return

																       								//$id_image,$image_lang,$type_iso,$title_image_lang,$id_image_lang_version,$s_main_image_lang_version,$dirname,$full_path,$measure,$route_default,$size_image,$format_image,$id_product_lang_image_lang,$lang_global_1,$lang_global_2,$type_return,$url
																						$box_media  = productDao::boxMediaGalleryProductCover($id_image,$imageUpload,$iso_code,$obj_product_lang->getTitle_product_lang(),intval(trim($atributo3['ID_IMG_LA_VER'])),intval(trim($atributo3['S_MAIN_IMG_LA_VER'])),'',self::$full_path,95,$route_default,$obj_image_lang->getFile_size(),$obj_image_lang->getFile_type(),intval(trim($atributo3['ID_P_LA_IMG_LA'])),$lang_global['Portada'],$lang_global['General'],2,URL);
															                		}

														                			$x++;
																 				}else{
																 													//$route,$file
																 						imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

																                		$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 1"]."(2)";
																 					 }
																 			break;
																 			default:
																 											//$route,$file
																 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

														                		$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 1"]."(1)";
																 			break;
																 		}

																 		$imageWithPrefixLang = "";

																    }//End FOREACH registerInformationImage
							 									}else{
							 																		//$route,$file
							 											imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

										                				$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(1)";
							 										 }//END if(!empty($imageWithPrefixLang))
							 								}else{
							 																	//$route,$file
							 										imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

									                				$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(2)";
							 									 }//END if(!empty($id_lang) && !empty($iso_code))
														}
												}
							 				}else{
							 													//$route,$file
							 						imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

					                				$devuelve = $lang_error['Error en el proceso'].$lang_error["Variables vacías"]."(3)";
							 					 }//END if(!empty($id_image))
							 			break;
							 			default:
							 											//$route,$file
							 				imageDao::deletedPreviousFile(self::$full_path,$imageUpload);

							 				//$atributo1['ERRNO']
								 				//1 = EL ID_U NO EXISTE
								 				//2 = EL ID_T_IMG NO EXISTE
								 				//3 = EL ID_P NO EXISTE
								 				//4 = EL ID_IMG NO EXISTE
							 				$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 11"]."(1)(".$atributo1['ERRNO'].")";
							 			break;
							 		}
							    }//End FOREACH registerImageProduct

							    $valor = array("estado" 		=> $estado,
							    			   $tipo_msj 		=> $devuelve,
							    			   "div_ajax" 		=> $div_ajax,
							    			   "box_media" 		=> $box_media,
							    			   "redireccionar" 	=> $estadoRedireccionar);
					            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					            exit();
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

        /**
         * [showSpecificInformationByProductLangId description]
         *
         * @param  [type] $id_type_info     [description]
         * @param  [type] $obj_product_lang [description]
         * @param  string $inf              [description]
         * @return [type]                   [description]
         */

        public static function showSpecificInformationByProductLangId($id_type_info,$obj_product_lang,$inf = "")
    	{
    		if(!empty(intval(trim($id_type_info))) && !empty(intval(trim($obj_product_lang->getId_product_lang())))){
	    		//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

			 	$consulta_specific_information 	= "CALL showSpecificInformationByProductLangId(".$obj_product_lang->getId_product_lang().")";
			 	$valores_specific_information 	= array('id_product_lang' => $obj_product_lang->getId_product_lang());

	            $resultadoSI   	= $ob_conectar->consultarBD($consulta_specific_information,$valores_specific_information);

	          	foreach($resultadoSI as &$datosSI)
	            {
	            	if($datosSI['ERRNO'] == 2)
	            	{
	      				//$id_type_info
					    	//1  = title_product_lang
					    	//2  = subtitle_product_lang
					    	//3  = general_price_product_lang
					    	//4  = text_button_general_price_product_lang
					    	//5  = predominant_color_product_lang
					    	//6  = background_color_degraded_product_lang
					    	//7  = general_stock_product_lang
					    	//8  = reference_product_lang
					    	//9  = friendly_url_product_lang
					    	//10 = general_link_product_lang
					    	//11 = text_button_general_link_product_lang
					    	//12 = description_small_product_lang
					    	//13 = description_large_product_lang
					    	//14 = special_specifications_product_lang
					    	//15 = clave_prod_serv_sat_product_lang
					    	//16 = clave_unidad_sat_product_lang
					    	//17 = input_product_lang
					    	//18 = output_product_lang
					    	//19 = meta_title_product_lang
					    	//20 = meta_description_product_lang
					    	//21 = meta_keywords_product_lang

	      				switch ($id_type_info) {
	      					case 1:
	      						$inf 	= stripslashes($datosSI['title_product_lang']);
	      						return $inf;
	      						break;
	      					case 2:
	      						$inf 	= stripslashes($datosSI['subtitle_product_lang']);
	      						return $inf;
	      						break;
	      					case 3:
	      						$inf 	= $datosSI['general_price_product_lang'];
	      						return $inf;
	      						break;
	      					case 4:
	      						$inf 	= stripslashes($datosSI['text_button_general_price_product_lang']);
	      						return $inf;
	      						break;
	      					case 5:
	      						$inf 	= $datosSI['predominant_color_product_lang'];
	      						return $inf;
	      						break;
	      					case 6:
	      						$inf 	= $datosSI['background_color_degraded_product_lang'];
	      						return $inf;
	      						break;
	      					case 7:
	      						$inf 	= $datosSI['general_stock_product_lang'];
	      						return $inf;
	      						break;
	      					case 8:
	      						$inf 	= stripslashes($datosSI['reference_product_lang']);
	      						return $inf;
	      						break;
	      					case 9:
	      						$inf 	= $datosSI['friendly_url_product_lang'];
	      						return $inf;
	      						break;
	      					case 10:
	      						$inf 	= stripslashes($datosSI['general_link_product_lang']);
	      						return $inf;
	      						break;
	      					case 11:
	      						$inf 	= stripslashes($datosSI['text_button_general_link_product_lang']);
	      						return $inf;
	      						break;
	      					case 12:
	      						$inf 	= stripslashes($datosSI['description_small_product_lang']);
	      						return $inf;
	      						break;
	      					case 13:
	      						$inf 	= stripslashes($datosSI['description_large_product_lang']);
	      						return $inf;
	      						break;
	      					case 14:
	      						$inf 	= stripslashes($datosSI['special_specifications_product_lang']);
	      						return $inf;
	      						break;
	      					case 15:
	      						$inf 	= $datosSI['clave_prod_serv_sat_product_lang'];
	      						return $inf;
	      						break;
	      					case 16:
	      						$inf 	= $datosSI['clave_unidad_sat_product_lang'];
	      						return $inf;
	      						break;
	      					case 17:
	      						$inf 	= $datosSI['input_product_lang'];
	      						return $inf;
	      						break;
	      					case 18:
	      						$inf 	= $datosSI['output_product_lang'];
	      						return $inf;
	      						break;
	      					case 19:
	      						$inf 	= stripslashes($datosSI['meta_title_product_lang']);
	      						return $inf;
	      						break;
	      					case 20:
	      						$inf 	= stripslashes($datosSI['meta_description_product_lang']);
	      						return $inf;
	      						break;
	      					case 21:
	      						$inf 	= stripslashes($datosSI['meta_keywords_product_lang']);
	      						return $inf;
	      						break;
	      					default:
	      						break;
	      				}
	            	}
	        	}
			}
		}

		/**
		 * [updateInformationProductLang description]
		 *
		 * @param  [type] $general_price_product_lang_old             [description]
		 * @param  [type] $INT_background_color_degraded_product_lang [description]
		 * @param  [type] $background_color_degraded_product_lang_old [description]
		 * @param  [type] $obj_type_of_currency                       [description]
		 * @param  [type] $obj_tax_rule                               [description]
		 * @param  [type] $obj_product_lang                           [description]
		 * @return [type]                                             [description]
		 */

		public static function updateInformationProductLang($general_price_product_lang_old,$INT_background_color_degraded_product_lang,$background_color_degraded_product_lang_old,$obj_type_of_currency,$obj_tax_rule,$obj_product_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//NO ES NECESARIO VALIDAR $general_price_product_lang_old YA QUE PUEDE ESTAR EN 0.00 NI $INT_background_color_degraded_product_lang Y $background_color_degraded_product_lang_old
			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_type_of_currency->getId_type_of_currency()))) && !empty(intval(trim($obj_tax_rule->getId_tax_rule()))) && !empty(intval(trim($obj_product_lang->getId_type_product()))) && !empty(intval(trim($obj_product_lang->getId_product_lang()))) && !empty($obj_product_lang->getTitle_product_lang()) && !empty($obj_product_lang->getFriendly_url_product_lang())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	           	require_once(self::$file_help);

				//OBTENER EL DEGRADADO EN CODIGO
				$background_color_degraded_product_lang = (!empty($INT_background_color_degraded_product_lang ) ? productDao::getProductGradientById($INT_background_color_degraded_product_lang) : $background_color_degraded_product_lang_old);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta1      = "CALL updateInformationProductLang(:id_type_product,:id_product_lang,:id_user,:id_tax_rule,:id_type_of_currency,:title_product_lang,:subtitle_product_lang,:general_price_product_lang,:text_button_general_price_product_lang,:predominant_color_product_lang,:background_color_degraded_product_lang,:general_stock_product_lang,:reference_product_lang,:friendly_url_product_lang,:general_link_product_lang,:text_button_general_link_product_lang,:description_small_product_lang,:description_large_product_lang,:special_specifications_product_lang,:clave_prod_serv_sat_product_lang,:clave_unidad_sat_product_lang,:meta_title_product_lang,:meta_description_product_lang,:meta_keywords_product_lang)";
				$valores1 		= array('id_type_product' 							=> $obj_product_lang->getId_type_product(),
	        							'id_product_lang' 							=> $obj_product_lang->getId_product_lang(),
	        							'id_user' 									=> intval(trim($_SESSION['id_user_dao'])),
	        							'id_tax_rule' 								=> $obj_tax_rule->getId_tax_rule(),
	        							'id_type_of_currency' 						=> $obj_type_of_currency->getId_type_of_currency(),
	        							'title_product_lang' 						=> $obj_product_lang->getTitle_product_lang(),
	        							'subtitle_product_lang' 					=> $obj_product_lang->getSubtitle_product_lang(),
	        							'general_price_product_lang' 				=> $obj_product_lang->getGeneral_price_product_lang(),
	        							'text_button_general_price_product_lang' 	=> $obj_product_lang->getText_button_general_price_product_lang(),
	        							'predominant_color_product_lang' 			=> $obj_product_lang->getPredominant_color_product_lang(),
	        							'background_color_degraded_product_lang' 	=> $background_color_degraded_product_lang,
	        							'general_stock_product_lang' 				=> $obj_product_lang->getGeneral_stock_product_lang(),
	        							'reference_product_lang' 					=> $obj_product_lang->getReference_product_lang(),
	        							'friendly_url_product_lang' 				=> $obj_product_lang->getFriendly_url_product_lang(),
	        							'general_link_product_lang' 				=> $obj_product_lang->getGeneral_link_product_lang(),
	        							'text_button_general_link_product_lang' 	=> $obj_product_lang->getText_button_general_link_product_lang(),
	        							'description_small_product_lang' 			=> $obj_product_lang->getDescription_small_product_lang(),
	        							'description_large_product_lang' 			=> $obj_product_lang->getDescription_large_product_lang(),
	        							'special_specifications_product_lang' 		=> $obj_product_lang->getSpecial_specifications_product_lang(),
	        							'clave_prod_serv_sat_product_lang' 			=> $obj_product_lang->getClave_prod_serv_sat_product_lang(),
	        							'clave_unidad_sat_product_lang' 			=> $obj_product_lang->getClave_unidad_sat_product_lang(),
	        							'meta_title_product_lang' 					=> $obj_product_lang->getMeta_title_product_lang(),
	        							'meta_description_product_lang' 			=> $obj_product_lang->getMeta_description_product_lang(),
	        							'meta_keywords_product_lang' 				=> $obj_product_lang->getMeta_keywords_product_lang());

	            $resultado1     = $ob_conectar->consultarBD($consulta1,$valores1);

	            foreach($resultado1 as &$atributo){
	            	switch ($atributo['ERRNO']) {
	            		case 2://EL TITULO DEL PRODUCTO YA EXISTE
			 				$valor = array("estado" => "false",
	            						   "error" 	=> replaceStringTwoParametersArray("/PARA1/",stripslashes($obj_product_lang->getTitle_product_lang()),"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
	            		case 3://CORRECTO
	           	 			self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
	            			require_once(self::$file_record);

	            			//VALIDAR SI ES NECESARIO ACTUALIZAR LA PROMOCION DEL PRODUCTO
	            			if(!empty($general_price_product_lang_old) && $general_price_product_lang_old != 0.00){
                    			//EL PRECIO ANTERIOR ES DIFERENTE AL NUEVO
                    			if($general_price_product_lang_old != $obj_product_lang->getGeneral_price_product_lang()){
                    				//VALIDAR SI TIENE ALGUN TIPO DE PROMOCION
                    				$consulta2 	= "CALL showAnProducPromotionByProductLangId(:id_product_lang)";
							        $valores2 	= array('id_product_lang' => $obj_product_lang->getId_product_lang());

							        $resultado2 = $ob_conectar->consultarBD($consulta2,$valores2);

							        foreach($resultado2 as &$datos2)
							        {
							        	if($datos2['ERRNO'] == 2 && $datos2['TOTAL_PROMOTIONS'] > 0 && !empty(intval(trim($datos2['id_product_lang_promotion']))) && !empty($datos2['discount_rate_product_lang_promotion']))
							        	{
							        		//HAY QUE CALCULAR EL DESCUENTO POR PORCENJATE
								        		//DIVIDIR PORCENTAJE ENTRE 100
												$paso1 = $datos2['discount_rate_product_lang_promotion'] / 100;
												//EL RESULTADO SE MULTIPLICA POR EL PRECIO GENERAL
												$paso2 = $paso1 * $obj_product_lang->getGeneral_price_product_lang();
												//RESTAR PRECIO GENERAL MENOS EL RESULTADO
												$paso3 = $obj_product_lang->getGeneral_price_product_lang() - $paso2;
											//ACTUALIZAR EN LA TABLA PROMOCION EL DESCUENTO POR MONTO Y PORCENTAJE
											$consulta3 	= "CALL updatePriceDiscountProductPromotion(:id_product_lang_promotion,:price_discount_product_lang_promotion)";
											$valores3 	= array('id_product_lang_promotion' 			=> $datos2['id_product_lang_promotion'],
        						 								'price_discount_product_lang_promotion' => $paso3);

        									$resultado3 = $ob_conectar->consultarBD($consulta3,$valores3);
				  						}
				  					}
                    			}
                    		}

	            			$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Modifico"],$lang_error["el producto"],$obj_product_lang->getTitle_product_lang(),$lang_record["Historial 2"]);

	            			$valor = array("estado" 		=> "true",
	            						   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Producto"],"/PARA2/",$lang_error["actualizado"],$lang_error["Error 9"]),
	            						   "redireccionar" 	=> "true",
	            						   "price" 			=> $obj_product_lang->getGeneral_price_product_lang());
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
	            		break;
	            		default:
	            			$valor = array("estado" => "false",
	            						   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Error 11"]);
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
	            		break;
	            	}
	            }
			}
		}

		/**
		 * [getProductGradientById description]
		 *
		 * @param  [type] $INT_background [description]
		 * @return [type]                 [description]
		 */

		private static function getProductGradientById($INT_background)
        {
        	if(!empty(intval(trim($INT_background)))){
				switch ($INT_background) {
					case 2://Gradient 2
						return "background: linear-gradient(228deg, #F5F955 1.15%, #FE6EFD 100%);";
						break;
					case 3://Gradient 3
						return "background: linear-gradient(228deg, #F5F955 1.15%, #2D51FF 100%);";
						break;
					default://Gradient 1
						return "background: linear-gradient(228deg, #A449CF 1.15%, #1CD3F7 100%)";
						break;
				}
			}else{
					//Gradient 1
					return "background: linear-gradient(228deg, #A449CF 1.15%, #1CD3F7 100%)";
				 }
        }

        /**
         * [registerProduct description]
         *
         * @param  [type]  $INT_background_color_degraded_product_lang [description]
         * @param  [type]  $obj_type_of_currency                       [description]
         * @param  [type]  $obj_tax_rule                               [description]
         * @param  [type]  $obj_product_lang                           [description]
         * @param  string  $estado                                     [description]
         * @param  string  $tipo_msj                                   [description]
         * @param  string  $devuelve                                   [description]
         * @param  string  $estadoRedireccionar                        [description]
         * @param  integer $x                                          [description]
         * @return [type]                                              [description]
         */

        public static function registerProduct($INT_background_color_degraded_product_lang,$obj_type_of_currency,$obj_tax_rule,$obj_product_lang,$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$x = 0)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//NO ES NECESARIO VALIDAR $INT_background_color_degraded_product_lang YA QUE SU VALOR PUEDE SER 0
			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_type_of_currency->getId_type_of_currency()))) && !empty(intval(trim($obj_tax_rule->getId_tax_rule()))) && !empty(intval(trim($obj_product_lang->getId_type_product()))) && !empty(intval(trim($obj_product_lang->getId_product()))) && !empty($obj_product_lang->getTitle_product_lang()) && !empty($obj_product_lang->getFriendly_url_product_lang())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

	            //OBTENER EL DEGRADADO EN CODIGO
				$background_color_degraded_product_lang = (!empty($INT_background_color_degraded_product_lang ) ? productDao::getProductGradientById($INT_background_color_degraded_product_lang) : NULL);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta1 		= "CALL registerProduct(:id_product,:id_user,:id_type_product)";
				$valores1		= array('id_product' 		=> $obj_product_lang->getId_product(),
	        							'id_user' 		 	=> intval(trim($_SESSION['id_user_dao'])),
	        							'id_type_product' 	=> $obj_product_lang->getId_type_product());

	            $resultado1 	= $ob_conectar->consultarBD($consulta1,$valores1);

	            foreach($resultado1 as &$atributo1)
			 	{
			 		switch ($atributo1['ERRNO']) {
			 			case 1://ID USER NO EXISTE
			 				$devuelve 	= $lang_error["Error 11"];
			 			break;
			 			case 2://CORRECTO
                			$consulta2 	= "CALL registerInformationProduct(:id_product,:id_user,:id_tax_rule,:id_type_of_currency,:title_product_lang,:subtitle_product_lang,:general_price_product_lang,:text_button_general_price_product_lang,:predominant_color_product_lang,:background_color_degraded_product_lang,:general_stock_product_lang,:reference_product_lang,:friendly_url_product_lang,:general_link_product_lang,:text_button_general_link_product_lang,:description_small_product_lang,:description_large_product_lang,:special_specifications_product_lang,:clave_prod_serv_sat_product_lang,:clave_unidad_sat_product_lang,:meta_title_product_lang,:meta_description_product_lang,:meta_keywords_product_lang)";
                			$valores2  	= array('id_product' 							=> $obj_product_lang->getId_product(),
												'id_user' 								=> intval(trim($_SESSION['id_user_dao'])),
												'id_tax_rule' 							=> $obj_tax_rule->getId_tax_rule(),
			        							'id_type_of_currency' 					=> $obj_type_of_currency->getId_type_of_currency(),
			        							'title_product_lang' 					=> $obj_product_lang->getTitle_product_lang(),
			        							'subtitle_product_lang' 				=> $obj_product_lang->getSubtitle_product_lang(),
			        							'general_price_product_lang' 			=> $obj_product_lang->getGeneral_price_product_lang(),
			        							'text_button_general_price_product_lang' => $obj_product_lang->getText_button_general_price_product_lang(),
			        							'predominant_color_product_lang' 		=> $obj_product_lang->getPredominant_color_product_lang(),
			        							'background_color_degraded_product_lang' => $background_color_degraded_product_lang,
			        							'general_stock_product_lang' 			=> $obj_product_lang->getGeneral_stock_product_lang(),
			        							'reference_product_lang' 				=> $obj_product_lang->getReference_product_lang(),
			        							'friendly_url_product_lang' 			=> $obj_product_lang->getFriendly_url_product_lang(),
			        							'general_link_product_lang' 			=> $obj_product_lang->getGeneral_link_product_lang(),
			        							'text_button_general_link_product_lang' => $obj_product_lang->getText_button_general_link_product_lang(),
			        							'description_small_product_lang' 		=> $obj_product_lang->getDescription_small_product_lang(),
			        							'description_large_product_lang' 		=> $obj_product_lang->getDescription_large_product_lang(),
			        							'special_specifications_product_lang' 	=> $obj_product_lang->getSpecial_specifications_product_lang(),
			        							'clave_prod_serv_sat_product_lang' 		=> $obj_product_lang->getClave_prod_serv_sat_product_lang(),
			        							'clave_unidad_sat_product_lang' 		=> $obj_product_lang->getClave_unidad_sat_product_lang(),
			        							'meta_title_product_lang' 				=> $obj_product_lang->getMeta_title_product_lang(),
			        							'meta_description_product_lang' 		=> $obj_product_lang->getMeta_description_product_lang(),
			        							'meta_keywords_product_lang' 			=> $obj_product_lang->getMeta_keywords_product_lang());

				            $resultado2  = $ob_conectar->consultarBD($consulta2,$valores2);

				            foreach($resultado2 as &$atributo2)
						 	{
						 		switch ($atributo2['ERRNO'])
						 		{
						 			case 4://CORRECTO
						 				if($x == 0){
						 					self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
											require_once(self::$file_record);

						 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["el producto"],$obj_product_lang->getTitle_product_lang(),$lang_record["Historial 2"]);
						 				}

						 				$x++;

						 				$estado 				= "true";
					 					$tipo_msj 				= "resultado";
					 					$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
					 					$estadoRedireccionar 	= "true";
						 			break;
						 			default:
						 				//$atributo2['ERRNO']
							 				//1 = ID_P  NO EXISTE
							 				//2 = ID LA NO EXISTE
							 				//3 = EL TITULO DEL PRODUCTO YA EXISTE
						 				if($atributo2['ERRNO'] == 3){
						 					$devuelve = replaceStringTwoParametersArray("/PARA1/",stripslashes($obj_product_lang->getTitle_product_lang()),"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]);
						 				}else{
						 					$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 11"]."(".$atributo2['ERRNO'].")";
						 					 }
						 			break;
						 		}
						 	}//END call registerInformationProduct
			 			break;
			 			default:
	                		$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 1"]."(1)";
			 			break;
			 		}
			    }//END call registerProduct

			    $valor = array("estado"  		=> $estado,
			    			   $tipo_msj 		=> $devuelve,
			    			   "redireccionar" 	=> $estadoRedireccionar);
	            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            exit();
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [associateCategryToProduct description]
		 *
		 * @param  [type] $id_call           [description]
		 * @param  [type] $obj_category_lang [description]
		 * @param  [type] $obj_product_lang  [description]
		 * @return [type]                    [description]
		 */

		public static function associateCategryToProduct($id_call,$obj_category_lang,$obj_product_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			//NO VALIDAR $obj_category_lang->getParent_id(), YA QUE SU VALOR PUEDE SER 0
			if(!empty(intval(trim($obj_product_lang->getId_product()))) && !empty(intval(trim($id_call))) && !empty(intval(trim($obj_category_lang->getId_category())))){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar = new conectorDB();

				//id_call
					//1 = REGISTRAR
					//2 = ELIMINAR

				$consulta   = "CALL registerProductCategory(:id_product,:id_category,:id_parent_id,:id_action)";
	            $valores	= array('id_product' 	=> $obj_product_lang->getId_product(),
	        						'id_category' 	=> $obj_category_lang->getId_category(),
	        						'id_parent_id' 	=> $obj_category_lang->getParent_id(),
	        						'id_action' 	=> $id_call);

	            $resultado  = $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo){
	            	//NO ES NECESARIO VALIDAR $atributo['EVENTO']
	            	switch ($atributo['ERRNO']) {
	            		case 3://CORRECTO
	           	 			//$atributo['EVENTO']
	           	 				//1 = Activar/Desactivar evento JS
	           	 				//2 = No usar evento JS

	           	 			if($id_call == 1){
	           	 				$type_action 	= $lang_error["Registro"];
	           	 				$value_action 	= $lang_error["realizado"];
	           	 			}else{
	           	 				$type_action 	= $lang_error["Categoría"];
	           	 				$value_action 	= $lang_error["eliminada"];
	           	 				 }

	            			$valor = array("estado" 	=> "true",
	            						   "evento" 	=> $atributo['EVENTO'],
	            						   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$type_action,"/PARA2/",$value_action,$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
	            		break;
	            		default:
	            			//$atributo['ERRNO']
	            				//1 = EL ID PRODUCTO NO EXISTE
	            				//2 = EL PARENT ID NO EXISTE
	            			$valor = array("estado" => "false",
	            						   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Error 11"].'('.$atributo['ERRNO'].')');
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
	            		break;
	            	}
	            }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
        			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
        			exit();
				 }
		}

		/**
		 * [leaveAsMainProduct description]
		 *
		 * @param  [type] $obj_product_lang [description]
		 * @param  [type] $obj_image_lang   [description]
		 * @return [type]                   [description]
		 */

		public static function leaveAsMainProduct($obj_product_lang,$obj_image_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_product_lang->getId_product_lang()))) && !empty(intval(trim($obj_image_lang->getId_image_lang_version())))){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	           	require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta      	= "CALL leaveAsMainProduct(:id_product_lang,:id_image_lang_version)";
	            $valores		= array('id_product_lang' 		=> $obj_product_lang->getId_product_lang(),
	        							'id_image_lang_version' => $obj_image_lang->getId_image_lang_version());

	            $resultado     = $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo){
	            	switch ($atributo['ERRNO']) {
	            		case 3://CORRECTO
	            			$valor = array("estado" 	=> "true",
	            						   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Elemento"],"/PARA2/",$lang_error["actualizado"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
	            		break;
	            		default:
	            			//$atributo['ERRNO']
	            				//1 = ID_P_LA NO EXISTE
	            				//2 = ID_IMG_LA_V NO EXISTE
	            			$valor = array("estado" => "false",
	            						   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Error 11"].'('.$atributo['ERRNO'].')');
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
	            		break;
	            	}
	            }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables vacías"]);
        			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
        			exit();
				 }
		}

		/**
		 * [registerProductPromotion description]
		 *
		 * @param  [type]  $obj_product_lang           [description]
		 * @param  [type]  $obj_type_promotion_lang    [description]
		 * @param  [type]  $obj_product_lang_promotion [description]
		 * @param  integer $id_table                   [description]
		 * @return [type]                              [description]
		 */

		public static function registerProductPromotion($obj_product_lang,$obj_type_promotion_lang,$obj_product_lang_promotion,$id_table = 0)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao']))) && !empty(trim($_SESSION['name_user_dao'])) && !empty(trim($_SESSION['email_user_dao'])) && !empty(intval(trim($obj_product_lang->getId_product_lang()))) && !empty(intval(trim($obj_product_lang->getId_product()))) && !empty(intval(trim($obj_type_promotion_lang->getId_type_promotion()))) && !empty(trim($obj_product_lang->getTitle_product_lang())) && !empty($obj_product_lang_promotion->getPrice_discount_product_lang_promotion()) && !empty($obj_product_lang_promotion->getDiscount_rate_product_lang_promotion())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				$id_product 			= $obj_product_lang->getId_product();
				$title_product_lang 	= $obj_product_lang->getTitle_product_lang();

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL registerProductPromotion(:id_product_lang,:id_type_promotion,:title_product_lang_promotion,:sku_product_lang_promotion,:price_discount_product_lang_promotion,:discount_rate_product_lang_promotion,:description_small_product_lang_promotion,:description_large_product_lang_promotion,:link_product_lang_promotion,:start_date_product_lang_promotion,:finish_date_product_lang_promotion)";
	            $valores		= array('id_product_lang' 							=> $obj_product_lang->getId_product_lang(),
	        							'id_type_promotion' 						=> $obj_type_promotion_lang->getId_type_promotion(),
	        							'title_product_lang_promotion' 				=> $obj_product_lang_promotion->getTitle_product_lang_promotion(),
	        							'sku_product_lang_promotion' 				=> $obj_product_lang_promotion->getSku_product_lang_promotion(),
	        							'price_discount_product_lang_promotion' 	=> $obj_product_lang_promotion->getPrice_discount_product_lang_promotion(),
	        							'discount_rate_product_lang_promotion' 		=> $obj_product_lang_promotion->getDiscount_rate_product_lang_promotion(),
	        							'description_small_product_lang_promotion' 	=> $obj_product_lang_promotion->getDescription_small_product_lang_promotion(),
	        							'description_large_product_lang_promotion' 	=> $obj_product_lang_promotion->getDescription_large_product_lang_promotion(),
	        							'link_product_lang_promotion' 				=> $obj_product_lang_promotion->getLink_product_lang_promotion(),
	        							'start_date_product_lang_promotion' 		=> $obj_product_lang_promotion->getStart_date_product_lang_promotion(),
	        							'finish_date_product_lang_promotion' 		=> $obj_product_lang_promotion->getFinish_date_product_lang_promotion());

	            $resultado 		= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://YA EXISTE EL TITULO DE LA PROMOCION
			 				$valor = array("estado" => "false",
			 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["El título"],"/PARA2/",$obj_product_lang_promotion->getTitle_product_lang_promotion(),$lang_error["Error 7"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			case 3://CORRECTO
			 				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
		        			require_once(self::$file_global);

			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
		        			require_once(self::$file_record);

			 				$id_table = $atributo['ID_P_LA_PROM'];

			 				if(!empty($id_table)){
				 				$ob_conectar->registerRecordFourParameters($_SESSION['id_user_dao'],$lang_error["Asocio"],$obj_product_lang_promotion->getTitle_product_lang_promotion(),$lang_error["al producto"],$obj_product_lang->getId_product_lang(),$lang_record["Historial 4"]);

				 				//id_role
                                    //1 = Súper Administrador
				                    //2 = Administrador
				                    //3 = Usuario
				                    //4 = Vendedora
				                    //5 = Diseñador
				                    //6 = Chef
				                    //7 = Editor

				 				//ENVIAR CORREO AL ADMINISTRADOR SOLICITANDO LA ACTIVACION DE LA PROMOCION DE UN USUARIO SIEMPRE Y CUANDO EL ROL SEA DE USUARIO
                                if($_SESSION['id_role_dao'] == 3){
                                	try {
		                                    ob_start();
											require_once(dirname(__DIR__).'/class/forms_php/dominio.php');
											ob_clean();

		                                    //DE:
		                                    $mail->setFrom($_SESSION['email_user_dao'],ucwords(strtolower($_SESSION['name_user_dao'])));
		                                    //AGREGAR RESPUESTA A:
		                                    $mail->addReplyTo($_SESSION['email_user_dao'],ucwords(strtolower($_SESSION['name_user_dao'])));
		                                    //PARA:
		                                    $mail->addAddress($mail_receptor,stripslashes($name_mail_receptor));
		                                    //$mail->addCC('');
		                                    //$mail->addBCC('');
		                                    //ASUNTO
		                                    $mail->Subject = $_SESSION['email_user_dao'].' '.$lang_record["solicita activar promoción del producto"].' '.stripslashes($title_product_lang);
		                                    //CUERPO DEL MENSAJE
		                                    require_once(dirname(__DIR__).'/class/forms_php/bodyActivateProductPromotion.php');

		                                    $mail->MsgHTML($bodyActivateProductPromotion);

		                                    if(!$mail->send()) {
		                                    	$error_mail1 = $mail->ErrorInfo;
												$mail->getSMTPInstance()->reset();
											}
											//BORRAR CONTENEDORES
											$mail->clearCustomHeaders();
										    $mail->clearAllRecipients();
										    $mail->clearAddresses();
											$mail->smtpClose();
										}catch(Exception $e){
											//Pretty error messages from PHPMailer
											$valor = array("estado" => "false",
					 									   "error" 	=> $lang_error['Error en el proceso'].$e->errorMessage());
											return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
										}catch(\Exception $e){
											//The leading slash means the Global PHP Exception class will be caught
										    $valor = array("estado" => "false",
					 									   "error" 	=> $lang_error['Error en el proceso'].$e->getMessage());
										    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
											exit();
										}
		                        }
		            		}

		            		$valor = array("estado" 								=> "true",
			 							   "resultado" 								=> $lang_error["Promoción registrada. Es necesario que el administrador active esta promoción para poder ser visible en la página."],
			 							   "id_product_lang_promotion" 				=> $atributo['ID_P_LA_PROM'],
			 							   "price_discount_product_lang_promotion" 	=> $obj_product_lang_promotion->getPrice_discount_product_lang_promotion(),
			 							   "discount_rate_product_lang_promotion" 	=> $obj_product_lang_promotion->getDiscount_rate_product_lang_promotion());
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			default://ID_P_LA NO EXISTE
			 				$valor = array("estado" => "false",
			 							   "error" 	=> $lang_error["Primero registre la información básica del producto"]);
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 		}
			    }//END call registerProductPromotion
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [displayProductPromotions description]
		 *
		 * @param  [type]  $id_product_lang              [description]
		 * @param  [type]  $id_type_image                [description]
		 * @param  [type]  $symbol_type_of_currency_lang [description]
		 * @param  [type]  $general_price_product_lang   [description]
		 * @param  [type]  $id_lang                      [description]
		 * @param  [type]  $id_internal_sections         [description]
		 * @param  integer $x                            [description]
		 * @param  [type]  $valores                      [description]
		 * @return [type]                                [description]
		 */

		public static function displayProductPromotions($id_product_lang,$id_type_image,$symbol_type_of_currency_lang,$general_price_product_lang,$id_lang,$id_internal_sections,$x = 1,$valores = null)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao']))) && !empty(intval(trim($id_product_lang))) && !empty(intval(trim($id_lang))) && !empty(intval(trim($id_type_image))) && !empty(intval(trim($id_lang))) && !empty(intval(trim($id_internal_sections))) && !empty($symbol_type_of_currency_lang) && !empty($general_price_product_lang))
			{
				self::$file_help = dirname(__DIR__).'/helps/help.php';
				require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableProductPromotions(:id_product_lang)";
				$valores 		= array('id_product_lang' => $id_product_lang);

		        $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

		        foreach($resultado as &$datos)
            	{
            		//NO ES NECESARIO VALIDAR $datos['s_product_lang_promotion']), $datos['s_visible_product_lang_promotion']) YA QUE SU VALOR PUEDE SER 0
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_PRODUCT_PROMOTIONS'] > 0 && !empty(intval(trim($datos['id_product_lang_promotion']))) && !empty($datos['title_product_lang_promotion']))
            		{
            			if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

		            	  echo('<table class="table table-ecommerce-simple table-striped mb-0" id="datatable-product-promotions">
									<thead>
										<tr>
											<th>'.$lang_global['Título'].'</th>
											<th>'.$lang_global['SKU / Código de referencia'].'</th>
											<th>'.$lang_global['Precio con descuento'].'</th>
											<th>'.$lang_global['Descuento en porcentaje'].'</th>
											<th>'.$lang_global['Fecha inicio'].'</th>
											<th>'.$lang_global['Fecha final'].'</th>
											'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['Estatus Administrador'].'</th>' : '').'
											<th>'.($_SESSION['id_role_dao'] <= 2 ? $lang_global['Estatus Usuario'] : $lang_global['Estatus']).'</th>
											<th>'.$lang_global['Acciones'].'</th>
										</tr>
									</thead>
									<tbody data-id-product-lang="'.$id_product_lang.'">');
						}
								  echo('<tr id="item-id_product_lang_promotion-'.$datos['id_product_lang_promotion'].'" data-id="'.$datos['id_product_lang_promotion'].'">
				        		  	  		<td><a href="#modal-update-product-lang-promotion-'.$datos['id_product_lang_promotion'].'" class="modal-with-zoom-anim modal-update-product-lang-promotion btn btn-primary btn-xs"'.(!empty($datos['description_small_product_lang_promotion']) ? ' data-bs-toggle="tooltip" title="'.stripslashes($datos['description_small_product_lang_promotion']).'"' : '').' data-form="update-information-product-lang-promotions-'.$datos['id_product_lang_promotion'].'"><i class="fas fa-pencil-alt me-1"></i>'.stripslashes($datos['title_product_lang_promotion']).'</a></td>
				        		  	  		<td>'.(!empty($datos['sku_product_lang_promotion']) ? stripslashes($datos['sku_product_lang_promotion']) : '').'</td>
				        		  	  		<td><button type="button" class="btn btn-xs btn-danger">$'.$datos['price_discount_product_lang_promotion'].'</button></td>
				        		  	  		<td><button type="button" class="btn btn-xs btn-warning">'.$datos['discount_rate_product_lang_promotion'].'%</button></td>
				        		  	  		<td>'.ucwords($datos['start_date_product_lang_promotion_format']).'</td>
				        		  	  		<td>'.ucwords($datos['finish_date_product_lang_promotion_format']).'</td>');

				    		  	  		if($_SESSION['id_role_dao'] <= 2){
				        		  	  echo('<td class="text-center">');
				        		  				//$id_internal_sections
								            		//4 = Perfil de usuario
						  								//14 = Galería
						  							//15 = Productos
						  								//1 = Stripe
						  								//2 = Informacion adicional
						  								//3 = Promocion s_product_lang_promotion
                        								//4 = Promocion s_visible_product_lang_promotion

									            							//$section,$id_table,$title_table,$s_table,$id_type_image,$id_internal_sections,$lang_titulo
									  			pluginIosSwitchInternalSections('product-internal-sections',$datos['id_product_lang_promotion'],stripslashes($datos['title_product_lang_promotion']),$datos['s_visible_product_lang_promotion'],$id_type_image,4,$lang_global['Activar o desactivar']);
									  echo('</td>');
				        		  	  		}
									  echo('<td class="text-center">');
				        		  				if($datos['s_visible_product_lang_promotion'] == 0){
									  				//AVISARLE AL USUARIO QUE SU PROMOCION AUN NO ESTA ACTIVA
									  				echo($lang_global['Promoción en espera de activación por parte del administrador']);
									  			}else{
							  					//$id_internal_sections
								            		//4 = Perfil de usuario
						  								//14 = Galería
						  							//15 = Productos
						  								//1 = Stripe
						  								//2 = Informacion adicional
						  								//3 = Promocion s_product_lang_promotion
                        								//4 = Promocion s_visible_product_lang_promotion

									            							//$section,$id_table,$title_table,$s_table,$id_type_image,$id_internal_sections,$lang_titulo
									  			pluginIosSwitchInternalSections('product-internal-sections',$datos['id_product_lang_promotion'],stripslashes($datos['title_product_lang_promotion']),$datos['s_product_lang_promotion'],$id_type_image,3,$lang_global['Activar o desactivar']);
									  				 }
									  echo('</td>
				        		  	  		<td class="text-center">
				        		  	  			<a href="#modal-delete-specific-table" class="modal-with-zoom-anim modal-sizes modal-delete-specific-table" data-bs-toggle="tooltip" title="'.$lang_global["Eliminar"].'" data-form="delete-product-promotions" data-delete-specific-table="'.$datos['id_product_lang_promotion'].'/'.stripslashes($datos['title_product_lang_promotion']).'/'.$id_type_image.'"><i class="fas fa-trash fa-lg"></i></a>
				        		  	  			<!-- MODAL MODIFICAR INFORMACION PROMOCION -->
				        		  	  			<div id="modal-update-product-lang-promotion-'.$datos['id_product_lang_promotion'].'" class="zoom-anim-dialog modal-block modal-block-primary modal-block-lg mfp-hide">
													<section class="card">
														<header class="card-header">
															<h2 class="card-title">'.$lang_global['Modificar información'].'</h2>
														</header>
														<div class="card-body">
															<form id="update-information-product-lang-promotions-'.$datos['id_product_lang_promotion'].'" class="form-horizontal" data-modal-update-specific-table-information="'.$datos['id_product_lang_promotion'].'" autocomplete="off" novalidate="novalidate">');
																	require(dirname(__DIR__)."/models/forms/product_lang_promotion.php");
													  echo('</form>
													  	</div>
													</section>
												</div>
												<!-- END MODAL -->
				        		  	  		</td>
				        		  	  	</tr>');
					    if(count($resultado) == $x){
							  echo('</tbody>
								</table>
								<hr class="solid mt-5 opacity-4">
								<div class="datatable-footer">
									<div class="row align-items-center justify-content-between mt-3">
										<div class="col-lg-auto text-center order-3 order-lg-2">
											<div class="results-info-wrapper"></div>
										</div>
										<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
											<div class="pagination-wrapper"></div>
										</div>
									</div>
								</div>');
						}
						$x++;
            		}else{
            	  echo('<h3><span class="badge bg-dark">'.$lang_global['Sin promociones registradas'].'</span></h3>');
            			 }
            	}
			}else{
				  echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [updateInformationProductPromotion description]
		 *
		 * @param  [type] $obj_type_promotion_lang    [description]
		 * @param  [type] $obj_product_lang_promotion [description]
		 * @return [type]                             [description]
		 */

		public static function updateInformationProductPromotion($obj_type_promotion_lang,$obj_product_lang_promotion)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_product_lang_promotion->getId_product_lang_promotion()))) && !empty(intval(trim($obj_type_promotion_lang->getId_type_promotion()))) && !empty($obj_product_lang_promotion->getPrice_discount_product_lang_promotion()) && !empty($obj_product_lang_promotion->getDiscount_rate_product_lang_promotion())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationProductPromotion(:id_product_lang_promotion,:id_type_promotion,:title_product_lang_promotion,:sku_product_lang_promotion,:price_discount_product_lang_promotion,:discount_rate_product_lang_promotion,:description_small_product_lang_promotion,:description_large_product_lang_promotion,:link_product_lang_promotion,:start_date_product_lang_promotion,:finish_date_product_lang_promotion)";
	            $valores		= array('id_product_lang_promotion' 				=> $obj_product_lang_promotion->getId_product_lang_promotion(),
	        							'id_type_promotion' 						=> $obj_type_promotion_lang->getId_type_promotion(),
	        							'title_product_lang_promotion' 				=> $obj_product_lang_promotion->getTitle_product_lang_promotion(),
	        							'sku_product_lang_promotion' 				=> $obj_product_lang_promotion->getSku_product_lang_promotion(),
	        							'price_discount_product_lang_promotion' 	=> $obj_product_lang_promotion->getPrice_discount_product_lang_promotion(),
	        							'discount_rate_product_lang_promotion' 		=> $obj_product_lang_promotion->getDiscount_rate_product_lang_promotion(),
	        							'description_small_product_lang_promotion' 	=> $obj_product_lang_promotion->getDescription_small_product_lang_promotion(),
	        							'description_large_product_lang_promotion' 	=> $obj_product_lang_promotion->getDescription_large_product_lang_promotion(),
	        							'link_product_lang_promotion' 				=> $obj_product_lang_promotion->getLink_product_lang_promotion(),
	        							'start_date_product_lang_promotion' 		=> $obj_product_lang_promotion->getStart_date_product_lang_promotion(),
	        							'finish_date_product_lang_promotion' 		=> $obj_product_lang_promotion->getFinish_date_product_lang_promotion());

	            $resultado 		= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://YA EXISTE EL TITULO DE LA PROMOCION
			 				$valor = array("estado" => "false",
			 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["El título"],"/PARA2/",$obj_product_lang_promotion->getTitle_product_lang_promotion(),$lang_error["Error 7"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			case 3://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
		        			require_once(self::$file_record);

		        			$ob_conectar->registerRecordThreeParameters($_SESSION['id_user_dao'],$lang_error["Modifico"],$lang_error["la promoción"],$obj_product_lang_promotion->getTitle_product_lang_promotion(),$lang_record["Historial 2"]);

			 				$valor = array("estado" 		=> "true",
			 							   "resultado" 		=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Promoción"],"/PARA2/",$lang_error["actualizada"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();

			 			break;
			 			default://ID_P_PRO NO EXISTE
			 				$valor = array("estado" => "false",
			 							   "error" 	=> $lang_error["Primero registre la información básica del producto"]);
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [deleteProductPromotion description]
		 *
		 * @param  [type] $obj_image_lang             [description]
		 * @param  [type] $obj_product_lang_promotion [description]
		 * @return [type]                             [description]
		 */

		public static function deleteProductPromotion($obj_image_lang,$obj_product_lang_promotion)
		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_product_lang_promotion->getId_product_lang_promotion()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty($obj_product_lang_promotion->getTitle_product_lang_promotion()))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

      			$consulta 		= "CALL deleteProductPromotion(:id_product_lang_promotion)";
	            $valores		= array('id_product_lang_promotion' => $obj_product_lang_promotion->getId_product_lang_promotion());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		switch ($datos['ERRNO']) {
            			case 2://CORRECTO
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

            				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
		            		require_once(self::$file_record);

            				$ob_conectar->registerRecordOneParameter($_SESSION['id_user_dao'],$obj_product_lang_promotion->getId_product_lang_promotion(),replaceStringTwoParametersArray("/PARA1/",$lang_error["Quito"],"/PARA2/",$obj_product_lang_promotion->getTitle_product_lang_promotion(),$lang_record["Historial 3"]));

            				$valor = array("estado" 	=> "true",
            							   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Quito"],"/PARA2/",$lang_error["Elemento"],$lang_error["Error 9"]),
            								"item" 		=> $obj_product_lang_promotion->getId_product_lang_promotion());
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
            			break;
            			default:
            				$valor = array("estado" => "false",
            							   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Error 11"]);
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
            			break;
            		}
            	}
			}else{
                    $valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                 }
		}

		/**
		 * [registerProductStripe description]
		 *
		 * @param  [type] $obj_stripe_lang    [description]
		 * @param  [type] $obj_product_lang   [description]
		 * @param  [type] $obj_product_stripe [description]
		 * @return [type]                     [description]
		 */

		public static function registerProductStripe($obj_stripe_lang,$obj_product_lang,$obj_product_stripe)
    	{
    		self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_stripe_lang->getId_stripe()))) && !empty(intval(trim($obj_product_lang->getId_product()))) && !empty($obj_product_stripe->getValue_product_stripe())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL registerProductStripe(:id_product,:id_stripe,:value_product_stripe)";
	            $valores		= array('id_product' 			=> $obj_product_lang->getId_product(),
	        							'id_stripe' 			=> $obj_stripe_lang->getId_stripe(),
	        							'value_product_stripe' 	=> $obj_product_stripe->getValue_product_stripe());

	            $resultado 		= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://YA EXISTA REGISTRADO
			 				$valor = array("estado" => "false",
			 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Stripe"],"/PARA2/","ID",$lang_error["Error 7"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			case 3://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
	            			require_once(self::$file_record);

			 				$ob_conectar->registerRecordFourParameters($_SESSION['id_user_dao'],$lang_error["Asocio"],$obj_product_stripe->getValue_product_stripe(),$lang_error["al producto"],$obj_product_lang->getId_product(),$lang_record["Historial 4"]);

			 				$valor = array("estado" 				=> "true",
			 							   "resultado" 				=> $lang_error["Stripe asociado"],
			 							   "id_product_stripe" 		=> $atributo['ID_P_S'],
			 							   "title_stripe_lang" 		=> $atributo['TI_S_LA'],
			 							   "value_product_stripe" 	=> $obj_product_stripe->getValue_product_stripe());
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			default://NO EXISTE ID_P
			 				$valor = array("estado" => "false",
			 							   "error" 	=> $lang_error["Primero registre la información básica del producto"]);
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [showStripeRegisteredInTheProduct description]
		 *
		 * @param  [type]  $id_product    [description]
		 * @param  [type]  $id_lang       [description]
		 * @param  [type]  $id_type_image [description]
		 * @param  integer $x             [description]
		 * @param  [type]  $valores       [description]
		 * @return [type]                 [description]
		 */

		public static function showStripeRegisteredInTheProduct($id_product,$id_lang,$id_type_image,$x = 1,$valores = null)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($id_product))) && !empty(intval(trim($id_lang))) && !empty(intval(trim($id_type_image))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableProductStripe(:id_product,:id_lang)";
				$valores 		= array('id_product' 	=> $id_product,
										'id_lang' 		=> $id_lang);

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_PRODUCT_STRIPE'] > 0 && !empty($datos['id_product_stripe']) && !empty($datos['title_stripe_lang']) && !empty($datos['value_product_stripe'])){
            			if($x == 1){
				      echo('<table class="table table-responsive-md table-striped mb-0" id="datatable-products-stripe" data-order="[]" data-page-length="10">
								<thead>
									<tr>
										<th>ID</th>
										<th>'.$lang_global['Tipo'].'</th>
										<th>'.$lang_global['Valor'].'</th>
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody id="sortable-products-stripe">');
				  		}
		            		  echo('<tr id="item-id_product_stripe-'.$datos['id_product_stripe'].'" data-id="'.$datos['id_product_stripe'].'">
										<td>'.$datos['id_product_stripe'].'</td>
		            		  	  		<td><a href="#modal-update-product-stripe-'.$datos['id_product_stripe'].'" class="modal-with-zoom-anim modal-update-product-stripe btn btn-primary btn-xs"'.(!empty($datos['value_product_stripe']) ? ' data-bs-toggle="tooltip" title="'.stripslashes($datos['value_product_stripe']).'"' : '').' data-form="update-information-product-stripe-'.$datos['id_product_stripe'].'"><i class="fas fa-pencil-alt me-1"></i>'.stripslashes($datos['title_stripe_lang']).'</a></td>
		            		  	  		<td>'.$datos['value_product_stripe'].'</td>
		            		  	  		<td class="text-center">
		            		  	  			<a href="#modal-delete-specific-table" class="modal-with-zoom-anim modal-sizes modal-delete-specific-table" data-bs-toggle="tooltip" title="'.$lang_global["Eliminar"].'" data-form="delete-product-stripe" data-delete-specific-table="'.$datos['id_product_stripe'].'/'.$datos['title_stripe_lang'].'/'.$id_type_image.'"><i class="fas fa-trash fa-lg"></i></a>
		            		  	  			<!-- MODAL MODIFICAR INFORMACION STRIPE -->
			        		  	  			<div id="modal-update-product-stripe-'.$datos['id_product_stripe'].'" class="zoom-anim-dialog modal-block modal-block-primary modal-block-lg mfp-hide">
												<section class="card">
													<header class="card-header">
														<h2 class="card-title">'.$lang_global['Modificar información'].'</h2>
													</header>
													<div class="card-body">
														<form id="update-information-product-stripe-'.$datos['id_product_stripe'].'" class="form-horizontal" data-modal-update-specific-table-information="'.$datos['id_product_stripe'].'" autocomplete="off" novalidate="novalidate">');
																require(dirname(__DIR__)."/models/forms/product_stripe.php");
												  echo('</form>
												  	</div>
												</section>
											</div>
											<!-- END MODAL -->
		            		  	  		</td>
		            		  	  	</tr>');

				        if(count($resultado) == $x){
				          echo('</tbody>
							</table>');
						}
						$x++;
					}else{
            	  			echo('<h3><span class="badge bg-dark">'.$lang_global['Sin productos registrados'].'</span></h3>');
            			 }
				}
			}else{
				echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [updateInformationProductStripe description]
		 *
		 * @param  [type] $obj_stripe_lang    [description]
		 * @param  [type] $obj_product_stripe [description]
		 * @return [type]                     [description]
		 */

		public static function updateInformationProductStripe($obj_stripe_lang,$obj_product_stripe)
    	{
    		self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_product_stripe->getId_product_stripe()))) && !empty(intval(trim($obj_stripe_lang->getId_stripe()))) && !empty($obj_product_stripe->getValue_product_stripe())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationProductStripe(:id_product_stripe,:id_stripe,:value_product_stripe)";
	            $valores		= array('id_product_stripe' 	=> $obj_product_stripe->getId_product_stripe(),
	        							'id_stripe' 			=> $obj_stripe_lang->getId_stripe(),
	        							'value_product_stripe' 	=> $obj_product_stripe->getValue_product_stripe());

	            $resultado 		= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://YA EXISTA REGISTRADO
			 				$valor = array("estado" => "false",
			 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Stripe"],"/PARA2/","ID",$lang_error["Error 7"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			case 3://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
	            			require_once(self::$file_record);

			 				$ob_conectar->registerRecordFourParameters($_SESSION['id_user_dao'],$lang_error["Asocio"],$obj_product_stripe->getValue_product_stripe(),$lang_error["al producto"],$obj_product_stripe->getId_product_stripe(),$lang_record["Historial 4"]);

			 				$valor = array("estado" 	=> "true",
			 							   "resultado" 	=> $lang_error["Stripe asociado"],
			 							   "id" 		=> $obj_product_stripe->getId_product_stripe(),
			 							   "value" 		=> $obj_product_stripe->getValue_product_stripe());
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			default://NO EXISTE ID_P_S
			 				$valor = array("estado" => "false",
			 							   "error" 	=> $lang_error["Primero registre la información básica del producto"]);
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 		}
			    }
			}else{
					$valor = array("estado" => "false",
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
					return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
					exit();
				 }
		}

		/**
		 * [deleteProductStripe description]
		 *
		 * @param  [type] $obj_image_lang     [description]
		 * @param  [type] $obj_stripe_lang    [description]
		 * @param  [type] $obj_product_stripe [description]
		 * @return [type]                     [description]
		 */

		public static function deleteProductStripe($obj_image_lang,$obj_stripe_lang,$obj_product_stripe)
		{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_product_stripe->getId_product_stripe()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty($obj_stripe_lang->getTitle_stripe_lang()))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

      			$consulta 		= "CALL deleteProductStripe(:id_product_stripe)";
      			$valores		= array('id_product_stripe' => $obj_product_stripe->getId_product_stripe());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		switch ($datos['ERRNO']) {
            			case 2://CORRECTO
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

            				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
		            		require_once(self::$file_record);

            				$ob_conectar->registerRecordOneParameter($_SESSION['id_user_dao'],$obj_product_stripe->getId_product_stripe(),replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$obj_stripe_lang->getTitle_stripe_lang(),$lang_record["Historial 3"]));

            				$valor = array("estado" 	=> "true",
            							   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"],$lang_error["Error 9"]),
            							   "item" 		=> $obj_product_stripe->getId_product_stripe());
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
            			break;
            			default:
            				$valor = array("estado" => "false",
            							   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Error 11"]);
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                            exit();
            			break;
            		}
            	}
			}else{
                    $valor = array("estado" => "false",
                    			   "error" 	=> $lang_error['Error en el proceso'].$lang_error['Variables vacías'].'(3)');
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                 }
		}

		public static function showAllActiveProducts($obj_lang,$main_image = "",$class_categories = "",$route_default = "img/image_not_found_580.jpg",$measure = 95,$x = 1)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//CATEGORIAS
			categoryDao::showCategoriesInMediaBoxes($obj_lang->getId_lang());

			self::$folder  	= imageDao::showFolderByIdTypeImage(15);

			//CREAR OBJETO
			$ob_conectar 	= new conectorDB();

			$consulta2 		= "CALL showProductsInMediaBoxes(:id_lang)";
			$valores2		= array('id_lang' => $obj_lang->getId_lang());

			$resultado2 	= $ob_conectar->consultarBD($consulta2,$valores2);

			foreach($resultado2 as &$datos2)
			{
				if($datos2['ERRNO'] == 2 && $datos2['TOTAL_PRODUCTS_MB'] > 0 && !empty($datos2['id_product']) && !empty($datos2['id_product_lang']) && !empty($datos2['title_product_lang']))
				{
					//OBTENER LAS CATEGORIAS ASOCIADAS AL PRODUCTO
					$consulta3 	= "CALL showActiveCategoriesByProductId(:id_product,:id_lang)";
					$valores3	= array('id_product' 	=> $datos2['id_product'],
										'id_lang' 		=> $obj_lang->getId_lang());

					$resultado3 = $ob_conectar->consultarBD($consulta3,$valores3);

					foreach($resultado3 as &$datos3)
					{
						if($datos3['ERRNO'] == 2 && !empty($datos3['id_category_lang']) && !empty($datos3['title_category_lang'])){
							$class_categories .= " Category".$datos3['id_category_lang'];
						}
					}

					//MOSTRAR PORTADA DEL PRODUCTO
					$consulta4 		= "CALL showMainProductCoverByProductId(:id_product,:id_lang)";
					$valores4		= array('id_product' => $datos2['id_product'],
											'id_lang' 	 => $obj_lang->getId_lang());

					$resultado4 	= $ob_conectar->consultarBD($consulta4,$valores4);

					foreach($resultado4 as &$datos4)
					{
						if($datos4['ERRNO'] == 2 && !empty($datos4['format_image']) && !empty($datos4['image_lang']) && !empty($datos4['title_image_lang']))
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
							$main_image = imageDao::returnImage($datos4['image_lang'],'',self::$folder,530,$route_default,2,'',1);
						}
					}

					if($x == 1){
				  echo('<div id="gridProductHome">');
					}

					  echo('<div class="media-box'.$class_categories.'" data-mediabox="'.$datos2['id_product'].'" data-id-product-lang="'.$datos2['id_product_lang'].'">
								<div class="media-box-image">
									<div data-width="320" data-height="214" data-thumbnail="'.$main_image.'"></div>

									<div class="thumbnail-overlay">
										<a href="#" class="btn btn-sm btn-danger"><span class="fa fa-shopping-cart"></span>&nbsp; '.$lang_global["Agregar carro"].'</a>
										<a href="#" class="mb-open-popup btn btn-sm btn-danger" data-src="'.$main_image.'" data-title="'.$datos2['title_product_lang'].'">
											<span class="fa fa-search"></span>&nbsp; Zoom
										</a>
									</div>
								</div>

								<div class="media-box-content">
									<div class="media-box-title fs-4">'.$datos2['title_product_lang'].'</div>
									'.(!empty($datos2['subtitle_product_lang']) ? '<div class="media-box-carbon-footprint"><h6 class="f-regular">'.$lang_global["Fact huella carbono"].' <span class="badge text-bg-success text-white">'.$datos2['subtitle_product_lang'].'</span></h6></div>' : '').'
									'.(!empty($datos2['general_price_product_lang']) ? '<div class="media-box-price">$'.number_format($datos2['general_price_product_lang'], 2).'</div>' : '').'
								</div>
							</div>');

					if(count($resultado2) == $x){
				  echo('</div>');
					}

					$x++;

					$main_image 		= "";
				    $class_categories 	= "";
				}
			}
		}
   	}