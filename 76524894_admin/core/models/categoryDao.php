<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/category_lang.php");

	class categoryDao
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
   		 * [showFormCreateCategory description]
   		 *
   		 * @param  [type] $obj_image_lang [description]
   		 * @return [type]                 [description]
   		 */

   		public static function showFormCreateCategory($obj_image_lang)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<div id="category-form">
	  			<div class="row">
	  				<div class="col-12 col-lg-5 col-xl-4" style="border-right: 1px solid #ddd;">
	  					<form id="registerCategory" class="form-horizontal" autocomplete="off" novalidate="novalidate">
	  						<div class="card-body">
								<div class="row">
									<div class="col-12 mb-2">
							  			<div class="form-group">
											<label class="f-medium c-negro" for="title_category_lang"><span class="required">*</span> '.$lang_global["Título"].'</label>
											<input type="text" class="form-control" data-plugin-maxlength maxlength="70" name="title_category_lang" id="title_category_lang" value="" required>
										</div>
									</div>
									<div class="col-12 mb-2">
										<div class="form-group">
											<label class="f-medium c-negro" for="subtitle_category_lang">'.$lang_global["Subtítulo"].'</label>
											<input type="text" class="form-control" data-plugin-maxlength maxlength="45" name="subtitle_category_lang" id="subtitle_category_lang" value="">
										</div>
									</div>
									<div class="col-12 mb-2">
										<div class="form-group">
											<label class="f-medium c-negro"><span class="required">*</span> '.$lang_global["Categoría padre"].' <button type="button" class="info ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="'.$lang_global["Info categoría padre"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button>
											</label>
											<ul class="ps-0" style="list-style: none;">
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
															//$obj_blog_lang->getId_blog()
														//4 = ES OBLIGATORIO EL ID_EVENTO
															//$obj_event_lang->getId_event()
													//$view
														//1 = lista con radio y/o checkbox
														//2 = lista con etiqueta badge
														//3 = lista mediaboxes

	  												$topCategoriesArray =  categoryDao::showBaseCategories();

	  																				//$data,$type_action,$view,$id_table
	  												echo categoryDao::generateTree($topCategoriesArray,0,1,0);

								  		  echo('</li>
								  		  	</ul>
								  		</div>
									</div>
									<div class="col-12 mb-2">
										<div class="form-group">
											<label class="f-medium c-negro" for="description_small_category_lang">'.$lang_global["Descripción corta"].'</label>
											<textarea id="description_small_category_lang" class="form-control" data-plugin-maxlength maxlength="100" rows="4" name="description_small_category_lang"></textarea>
										</div>
									</div>
									<div class="col-12 mb-2">
										<div class="form-group">
											<label class="f-medium c-negro" for="description_large_category_lang">'.$lang_global["Descripción larga"].'</label>
											<textarea
												name="description_large_category_lang"
												id="description_large_category_lang"
												class="summernote"
												data-plugin-summernote></textarea>
										</div>
							  	  	</div>
									<div class="col-12 mb-5 d-flex align-items-center">
										<label class="f-medium c-negro" for="color_hexadecimal_category">'.$lang_global["Color de fondo"].'</label>
										<input type="color" id="color_hexadecimal_category" class="border-0 ms-2" name="color_hexadecimal_category" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff" />
									</div>
								</div>
							</div>
							<div class="card-footer text-center">
								<button type="submit" class="btn btn-dark">'.$lang_global["Registrar"].'</button>
							</div>
	  					</form>
	  				</div>
	  				<div class="col-12 col-lg-7 col-xl-8">');
						if(!empty(intval(trim($obj_image_lang->getId_type_image())))){
							categoryDao::showRegisteredAccountsParentCategories($obj_image_lang->getId_type_image());
						}
	  		  echo('</div>
	  			</div>
	  	   </div>');
		}

		/**
		 * [showBaseCategories description]
		 *
		 * @param  array  $information             [description]
		 * @return [type]                          [description]
		 */

		public static function showBaseCategories($information = array())
        {
    		//CREAR OBJETO
    		$ob_conectar 				= new conectorDB();

    		$consulta_base_categories 	= "CALL showAllCategories".($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? '' : 'ByUser') ."(".($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? '' : ':id_user') .")";

    		$valores_base_categories	= $_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? null : array('id_user' => intval(trim($_SESSION['id_user_dao'])));

            $resultadoBC = $ob_conectar->consultarBD($consulta_base_categories,$valores_base_categories);

            if(count($resultadoBC) > 0){
            	foreach($resultadoBC as $indice => $datosBC)
				{
					if($datosBC['ERRNO'] == 1){
						$information = array(
						    array("ERRNO" => 0)
						);
					}else{
							$information[] = $datosBC;
						 }
				}
            }else{
            		$information = array(
					    array("ERRNO" => 0)
					);
            	 }
            return $information;
		}

		/**
		 * [generateTree description]
		 *
		 * @param  [type]  $data        [description]
		 * @param  [type]  $type_action [description]
		 * @param  [type]  $view        [description]
		 * @param  [type]  $id_table    [description]
		 * @param  integer $parent      [description]
		 * @param  integer $depth       [description]
		 * @return [type]               [description]
		 */

		public static function generateTree($data,$type_action,$view,$id_table,$parent = 0,$depth=0)
        {
        	self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

        	//CREAR OBJETO
			$ob_conectar 		= new conectorDB();

        	$tree = '<ul '.($view == 1 || $view == 2 ? 'style="list-style: none;'.($view == 2 && $depth == 0 ? 'padding-left:0;' : 'padding-left:20px;').'"' : 'class="'.($view == 3 && $depth == 0 ? 'media-boxes-filter filters nav-parent' : 'filters nav-children').'"') . ' data-view="'.$view.'">';
				if($view == 3 && $depth == 0){
					$tree .= '<li data-level="'.($depth+1).'"><a class="c-negro selected" href="#" data-filter="*">Todos</a></li>';
				}

			    for ($i=0, $ni=count($data); $i < $ni; $i++) {
			    	if ($data[$i]['ERRNO'] > 1) {
			    		if ($data[$i]['parent_id'] == $parent) {
				      $tree .= "<li data-level='".($depth+1)."'>";

      				//$type_action
						//0 = NO ES OBLIGATORIO EL ID
							//0 = NULLO
						//1 = ES OBLIGATORIO EL ID_PRODUCTO
							//$obj_product_lang->getId_product()
						//2 = ES OBLIGATORIO EL ID_CATEGORY
							//$obj_category_lang->getId_category()
						//3 = ES OBLIGATORIO EL ID_BLOG
							//$obj_blog_lang->getId_blog()
						//4 = ES OBLIGATORIO EL ID_EVENTO
							//$obj_event_lang->getId_event()
					//$view
						//1 = lista con radio y/o checkbox
						//2 = lista con etiqueta badge
						//3 = lista mediaboxes

				      	if($view == 1){
			              $tree .= '<div class="'.($type_action == 0 ? 'radio-custom radio-' : 'checkbox-custom checkbox-') . ($data[$i]['id_category'] == 1 ? 'success' : 'primary') . ' mb-1">
											<input type="'.($type_action == 0 ? 'radio' : 'checkbox').'" '.($data[$i]['id_category'] == 1 ? '' : 'name="parent_id"') . ' value="'.$data[$i]['id_category'].'" '.($depth == 0 ? ' id="parent_category_'.$data[$i]['id_category'].'"' : '').' class="id_category"';

										if(!empty(intval(trim($id_table)))){
						  		  			switch ($type_action) {
						  		  				case 1://PRODUCTO DETALLE
						  		  					$consulta 		= "CALL showSelectedProductCategories(:id_table,:id_category)";
										            $valores 		= array('id_table' 		=> $id_table,
										        							'id_category' 	=> $data[$i]['id_category']);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['CHECKED'] == 2 ? ' checked' : ' ');
									            		}
													}
						  		  				break;
						  		  				case 2://CATEGORIA DETALLE
						  		  					//CATEGORIA PADRE
						  		  					$tree .= ($data[$i]['id_category'] == $id_table ? ' disabled' : ' ');
						  		  					//SUBCATEGORIAS SELECCIONADAS
						  		  					$consulta 		= "CALL showSubcategoriesByParentId(:id_table)";
						  		  					$valores 		= array('id_table' 		=> $id_table);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['SUBCATEGORY'] == $data[$i]['id_category'] ? ' checked' : ' ');
									            		}
													}
						  		  				break;
						  		  				case 3://BLOG DETALLE
						  		  					$consulta 		= "CALL showSelectedBlogCategories(:id_table,:id_category)";
						  		  					$valores 		= array('id_table' 		=> $id_table,
										        							'id_category' 	=> $data[$i]['id_category']);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['CHECKED'] == 2 ? ' checked' : ' ');
									            		}
													}
						  		  				break;
						  		  				case 4://EVENTO DETALLE
						  		  					$consulta 		= "CALL showSelectedEventCategories(:id_table,:id_category)";
						  		  					$valores 		= array('id_table' 		=> $id_table,
										        							'id_category' 	=> $data[$i]['id_category']);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['CHECKED'] == 2 ? ' checked' : ' ');
									            		}
													}
							  		  			break;
						  		  				default://CATEGORIA
													$tree .= ($data[$i]['id_category'] == 1 ? 'checked disabled' : '');
												break;
						  		  			}
						  		  		}

							   $tree .='>';
							   			if($data[$i]['id_category'] > 4){
											$tree .='<label '.($data[$i]['id_category'] == 1 ? 'class="f-bold c-negro"' : '') . ' id="child_category_'.$data[$i]['id_category'].'" data-parent="'.$data[$i]['parent_id'].'" for="child_category_'.$data[$i]['id_category'].'">'.stripslashes($data[$i]['title_category_lang']).'<a class="d-inline" href="'.URL_CARPETA_ADMIN.'/catalogue-category-detail/'.$data[$i]['id_category'].'"><i class="fas fa-pencil-alt c-gris-oscuro ms-1" style="font-size:11px;"></i></a></label>';
										}else{
											$tree .='<label '.($data[$i]['id_category'] == 1 ? 'class="f-bold c-negro"' : '') . ' id="child_category_'.$data[$i]['id_category'].'" data-parent="'.$data[$i]['parent_id'].'" for="child_category_'.$data[$i]['id_category'].'">'.stripslashes($data[$i]['title_category_lang']).'</label>';
											 }
						   $tree .='</div>';
						}

						if($view == 2){
							$tree .='<span class="badge badge-'.($depth == 0 ? 'info' : 'warning').'">'.stripslashes($data[$i]['title_category_lang']).'</span>';
						}

						if($view == 3){
								$tree .='<a href="#" class="c-negro" data-filter=".cat'.$data[$i]['id_category'].'">'.stripslashes($data[$i]['title_category_lang']).'</a>';
							}
																	//$data,$type_action,$view,$id_table
				    			$tree .= categoryDao::generateTree($data,$type_action,$view,$id_table,$data[$i]['id_category'], $depth+1);
				      $tree .= "</li>";
				        }//END if ($data[$i]['parent_id'] == $parent) {
			    	}else{
			    			//EN CASO DE QUE NO SE HAYA ASOCIADO/REGISTRADO ALGUNA CATEGORIA POR PARTE DEL USUARIO
			    			if(!empty(intval(trim($id_table))) && $view == 1 || $view == 2){
			  		  			switch ($type_action) {
			  		  				case 1://PRODUCTO DETALLE
			  		  					$tree .= '<li><p class="mb-0">'.$lang_global["Sin categorías asociadas"].'</p><!--<a href="'.URL_CARPETA_ADMIN.'/catalogue-category" rel="noopener" role="button"><button type="button" class="my-1 me-1 btn btn-xs btn-warning">'.$lang_global["Registrar aquí"].'</button></a>--></li>';
			  		  				break;
			  		  				case 3://BLOG DETALLE
			  		  					$tree .= '<li><p class="mb-0">'.$lang_global["Sin categorías asociadas"].'</p></li>';
			  		  				break;
			  		  				default://CATEGORIA
									break;
			  		  			}
			    		 	}
			    	 	}//END if ($data[$i]['ERRNO'] > 1) {
			    }

		   $tree .= '</ul>';

		    return $tree;
		}

		/**
		 * [registerCategory description]
		 *
		 * @param  [type]  $obj_category_lang   [description]
		 * @param  string  $estado              [description]
		 * @param  string  $tipo_msj            [description]
		 * @param  string  $devuelve            [description]
		 * @param  string  $estadoRedireccionar [description]
		 * @param  integer $x                   [description]
		 * @return [type]                       [description]
		 */

		public static function registerCategory($obj_category_lang,$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$x = 0)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty($obj_category_lang->getTitle_category_lang())){

	            self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta1 		= "CALL registerCategory(:color_hexadecimal_category,:title_category_lang,:subtitle_category_lang,:description_small_category_lang,:description_large_category_lang,:parent_id,:id_user)";
	            $valores1		= array('color_hexadecimal_category' 		=> $obj_category_lang->getColor_hexadecimal_category(),
	        							'title_category_lang' 		 		=> $obj_category_lang->getTitle_category_lang(),
    									'subtitle_category_lang' 			=> $obj_category_lang->getSubtitle_category_lang(),
    									'description_small_category_lang' 	=> $obj_category_lang->getDescription_small_category_lang(),
    									'description_large_category_lang' 	=> $obj_category_lang->getDescription_large_category_lang(),
	        							'parent_id' 				 		=> $obj_category_lang->getParent_id(),
	        							'id_user' 					 		=> intval(trim($_SESSION['id_user_dao'])));

	            $resultado1 	= $ob_conectar->consultarBD($consulta1,$valores1);

	            foreach($resultado1 as &$atributo1)
			 	{
			 		switch ($atributo1['ERRNO']) {
			 			case 2://EL TITULO YA EXITE REGISTRADO
			 				$devuelve 		= replaceStringTwoParametersArray("/PARA1/",stripslashes($obj_category_lang->getTitle_category_lang()),"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]);
			 			break;
			 			case 3://CORRECTO
			 				self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

		 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["la categoría"],$obj_category_lang->getTitle_category_lang(),$lang_record["Historial 2"]);

							$estado 				= "true";
		 					$tipo_msj 				= "resultado";
		 					$devuelve 				= replaceStringTwoParametersArray("/PARA1/",$lang_error["Registro"],"/PARA2/",$lang_error["realizado"],$lang_error["Error 9"]);
                			$estadoRedireccionar	= "true";
			 			break;
			 			default:
			 				//$atributo1['ERRNO']
				 				//1 = ID USER NO EXISTE
			        		$devuelve = $lang_error['Error en el proceso'].$lang_error["Error 11"]."(".$atributo1['ERRNO'].")";
			 			break;
			 		}
			    }//END call registerCategory

			    $valor = array("estado" 		=> $estado,
			    			   $tipo_msj 		=> $devuelve,
			    			   "redireccionar" 	=> $estadoRedireccionar);
	            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			}
		}

		/**
		 * [showRegisteredAccountsParentCategories description]
		 *
		 * @param  [type]  $id_type_image [description]
		 * @param  integer $x             [description]
		 * @return [type]                 [description]
		 */

		public static function showRegisteredAccountsParentCategories($id_type_image,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao']))) && !empty(intval(trim($id_type_image))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableParentCategory".($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? '' : 'ByUser') ."(".($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? '' : ':id_user') .")";

				$valores = $_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2 || $_SESSION['id_role_dao'] == 7 ? null : array('id_user' => intval(trim($_SESSION['id_user_dao'])));

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		//NO ES NECESARIO VALIDAR $datos['TOTAL_SUBCATEGORIES'] YA QUE SU VALOR PUEDE SER 0
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_CATEGORIES'] > 0 && !empty(intval(trim($datos['id_category']))) && !empty(intval(trim($datos['id_lang']))) && !empty(intval(trim($datos['id_category_lang']))) && !empty($datos['title_category_lang'])){

            			if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			          echo('<table class="table table-responsive-xl table-bordered table-striped mb-0" id="datatable-parent-categories" data-order="[]" data-page-length="10">
								<thead>
									<tr>
										<th>ID</th>
										<th>'.$lang_global['Imagen'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['¿Quién creo la categoría?'].'</th>' : '').'
										<th>'.$lang_global['Categoría'].'</th>
										<th>'.$lang_global['Descripción'].'</th>
										<th>'.$lang_global['Productos'].'</th>
										<th>'.$lang_global['Accesorios'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['Estatus'].'</th>' : '').'
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody class="row_position">');
							}

							  echo('<tr id="item-id_category-'.$datos['id_category'].'" data-id="'.$datos['id_category'].'">
									<td>'.$datos['id_category'].'</td>
									<td class="text-center">');
	            		  												//$id_category_lang,$id_type_image,$id_lang
	            		  				categoryDao::showCategoryImage($datos['id_category_lang'],$id_type_image,$datos['id_lang']);
	            		  	  echo('</td>
	            		  	  		'.($_SESSION['id_role_dao'] <= 2 && !empty(intval(trim($datos['id_user']))) && !empty(intval(trim($datos['id_role']))) && !empty($datos['full_name']) ? '<td><a href="'.URL_CARPETA_ADMIN.'/my-profile/'.$datos['id_user'].'" class="btn btn-primary btn-xs" role="button" aria-pressed="true"><i class="fas fa-user me-2"></i>'.limitar_cadena($datos['full_name'], 20, "...").'</a></td>' : '').'
									<td>
										<a class="d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-category-detail/'.$datos['id_category'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-2"></i>'.stripslashes($datos['title_category_lang']).'</a>
									</td>
	            		  	  		<td>'.(!empty($datos['description_small_category_lang']) ? stripslashes($datos['description_small_category_lang']) : '').'</td>
	            		  	  		<td>');
	            		  	  			//id_type_product
	            		  					//1 = Producto
								  			//2 = Accesorios
	            		  																//$id_type_product,$id_category,$id_lang
							  			categoryDao::showProductCategoryByTypeProductId(1,$datos['id_category'],$datos['id_lang']);
	            		  	  echo('</td>
	            		  	  		<td>');
	            		  	  			//id_type_product
	            		  					//1 = Producto
								  			//2 = Accesorios
	            		  																//$id_type_product,$id_category,$id_lang
							  			categoryDao::showProductCategoryByTypeProductId(2,$datos['id_category'],$datos['id_lang']);
	            		  	  echo('</td>');
	            		    if($_SESSION['id_role_dao'] <= 2){
	            		  	   echo('<td class="text-center">');
							  							//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  			pluginIosSwitch('category',$datos['id_category'],stripslashes($datos['title_category_lang']),$datos['s_category'],$id_type_image,$lang_global['Activar o desactivar']);
							  echo('</td>');
	            		  	  		}
	            		  	  echo('<td class="text-center">');

							  	if($datos['TOTAL_SUBCATEGORIES'] > 0){
							  	  echo('<a class="d-inline-block pe-3" data-bs-toggle="tooltip" title="'.$lang_global['Mostrar subcategorías'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-child-category/'.$datos['id_category'].'"><i class="fas fa-eye fa-fade fa-xl"></i></a>');
							  	}
							  	if($datos['id_category'] > 4){
																		//$id_category,$id_category_lang,$title_category_lang,$id_type_section,$id_lang
									categoryDao::showTypeOfLinkToRemoveCategory($datos['id_category'],$datos['id_category_lang'],stripslashes($datos['title_category_lang']),$id_type_image,$datos['id_lang']);
								}
						      echo('</td>
	            		  	  	</tr>');

							if(count($resultado) == $x){
								$x = 1;
								echo('</tbody>
							</table>');
							}
							$x++;
            		}else{
            				echo('<h4 class="f-medium c-negro text-center">'.$lang_global['Error en el proceso'].$lang_global['Sin categorías registradas'].'</h4>');
            			 }
            	}
			}else{
				echo('<h4 class="f-medium c-negro text-center">'.$lang_global['Error en el proceso'].$lang_global['Variables de sesión vacías'].'</h4>');
				 }
		}

		/**
		 * [showCategoryImage description]
		 *
		 * @param  [type]  $id_category_lang [description]
		 * @param  [type]  $id_type_image    [description]
		 * @param  [type]  $id_lang          [description]
		 * @param  integer $measure          [description]
		 * @return [type]                    [description]
		 */

        private static function showCategoryImage($id_category_lang,$id_type_image,$id_lang,$measure = 75)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($id_category_lang))) && !empty(intval(trim($id_type_image))) && !empty(intval(trim($id_lang)))){
				$route_default				= "img/image_not_found_100.jpg";

				//CREAR OBJETO
				$ob_conectar 				= new conectorDB();

	            $consulta_category_image 	= "CALL showCategoryImage(:id_category_lang,:id_lang)";
	            $valores_category_image 	= array('id_category_lang' 	=> $id_category_lang,
	        										'id_lang' 			=> $id_lang);

	            $resultadoCI 	 			= $ob_conectar->consultarBD($consulta_category_image,$valores_category_image);

	            foreach($resultadoCI as &$atributoCI)
			 	{
			 		switch ($atributoCI['ERRNO']) {
			 			case 2://CORRECTO
			 				if(!empty(intval(trim($atributoCI['image_lang']))) && !empty($atributoCI['name_image_section_lang'])){
			 					self::$folder 		= imageDao::showFolderByIdTypeImage($id_type_image);

								if(self::$folder == FALSE || empty(self::$folder))
								{
									self::$full_path		= "";
								}else{
										self::$full_path 	= "../".self::$folder;
									 }

								if($atributoCI['format_image'] == 'image/svg+xml'){
    		  						$measure = 0;
    		  						$class_height = 'height="45"';
    		  					}else{
    		  							$class_height = 'class="img-fluid"';
    		  						 }

						  echo('<a class="image-popup-no-margins" href="');
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
		              					imageDao::returnImage($atributoCI['image_lang'],'',self::$full_path,0,$route_default,1,'',1);
		            			 	echo('" data-bs-toggle="tooltip" title="'.$atributoCI['name_image_section_lang'].'">
									<img '.$class_height.' src="');
															//$image,$dirname,$folder,$measure,$route_default,$type_return,$type_iso,$view
		              					imageDao::returnImage($atributoCI['image_lang'],'',self::$full_path,$measure,$route_default,1,'',1);
		            			 	echo('" />
								</a>');
			 				}else{
			 						echo('<i class="fas fa-tags c-azul" style="font-size: 35px;"></i>');
			 					 }
			 			break;
			 			default:
					    	echo('<i class="fas fa-tags c-azul" style="font-size: 35px;"></i>');
			 			break;
			 		}
			    }
			}else{
					echo('<i class="fas fa-tags c-azul" style="font-size: 35px;"></i>');
				 }
		}

		/**
		 * [showProductCategoryByTypeProductId description]
		 *
		 * @param  [type] $id_type_product [description]
		 * @param  [type] $id_category     [description]
		 * @param  [type] $id_lang         [description]
		 * @return [type]                  [description]
		 */

		private static function showProductCategoryByTypeProductId($id_type_product,$id_category,$id_lang)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($id_type_product))) && !empty(intval(trim($id_category))) && !empty(intval(trim($id_lang)))){
				//CREAR OBJETO
				$ob_conectar 				= new conectorDB();

	            $consulta_product_category 	= "CALL showProductCategoryByTypeProductId(:id_type_product,:id_category,:id_lang)";
	            $valores_product_category 	= array('id_type_product' 	=> $id_type_product,
	        										'id_category' 		=> $id_category,
	        										'id_lang' 			=> $id_lang);

	            $resultadoPC 	= $ob_conectar->consultarBD($consulta_product_category,$valores_product_category);

	            foreach($resultadoPC as &$atributoPC)
			 	{
			 		switch ($atributoPC['ERRNO']) {
			 			case 2://CORRECTO
			 				if(!empty(intval(trim($atributoPC['id_product']))) && !empty($atributoPC['title_product_lang'])){
			 					echo('<a class="d-block" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-product-detail/'.$atributoPC['id_product'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-2" style="font-size:13px;"></i>'.$atributoPC['title_product_lang'].'</a>');
			 				}
			 			break;
			 		}
			    }
			}
		}

		/**
		 * [showTypeOfLinkToRemoveCategory description]
		 *
		 * @param  [type] $id_category         [description]
		 * @param  [type] $id_category_lang    [description]
		 * @param  [type] $title_category_lang [description]
		 * @param  [type] $id_type_section     [description]
		 * @param  [type] $id_lang             [description]
		 * @return [type]                      [description]
		 */

		private static function showTypeOfLinkToRemoveCategory($id_category,$id_category_lang,$title_category_lang,$id_type_section,$id_lang)
		{
			if(!empty(intval(trim($id_category))) && !empty(intval(trim($id_category_lang))) && !empty(intval(trim($id_type_section))) && !empty(intval(trim($id_lang))) && !empty($title_category_lang)){

				self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
				require(self::$file_global);

				//CREAR OBJETO
				$ob_conectar 				= new conectorDB();

	            $consulta_remove_category 	= "CALL showTypeOfLinkToRemoveCategory(:id_category_lang,:id_lang)";
	            $valores_remove_category 	= array('id_category_lang' 	=> $id_category_lang,
	        										'id_lang' 			=> $id_lang);

	            $resultadoRC 	 	= $ob_conectar->consultarBD($consulta_remove_category,$valores_remove_category);

	            foreach($resultadoRC as &$atributoRC)
			 	{
			 		switch ($atributoRC['ERRNO']) {
			 			case 2://TIENE IMAGENES REGISTRADAS
			 			if(!empty(intval(trim($atributoRC['id_image']))) && !empty(intval(trim($atributoRC['id_image_lang'])))){
			 				echo('<a class="d-inline-block c-negro f-medium modal-with-zoom-anim modal-delete-with-image-6-parameters" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.$title_category_lang.'" href="#modal-delete-with-image-6-parameters" data-delete-with-image-6-parameters="'.$id_category.'/'.$atributoRC['id_image'].'/'.$atributoRC['id_image_lang'].'/'.str_replace("/", " ", $title_category_lang).'/'.$id_type_section.'/item-id_category-"><i class="fas fa-trash fa-xl c-gris-oscuro"></i></a>');
			 			}
			 			break;
			 			default://NO TIENE IMAGEN
			 			echo('<a class="d-inline-block c-negro f-medium modal-with-zoom-anim modal-remove-general" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.$title_category_lang.'" href="#modal-remove-general" data-remove="'.$id_category.'/'.str_replace("/", " ", $title_category_lang).'/'.$id_type_section.'"><i class="fas fa-trash fa-xl c-gris-oscuro"></i></a>');
			 			break;
			 		}
			    }
			}
		}

		/**
		 * [showBasicCategorySettings description]
		 *
		 * @param  [type] $obj_lang          [description]
		 * @param  [type] $obj_category_lang [description]
		 * @return [type]                    [description]
		 */

		public static function showBasicCategorySettings($obj_lang,$obj_category_lang)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<div class="card-body">');
			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_category_lang->getId_category())))){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showInformationCategory(:id_category,:id_lang)";
				$valores 		= array('id_category' 	=> $obj_category_lang->getId_category(),
										'id_lang' 		=> $obj_lang->getId_lang());

    			$resultado   	= $ob_conectar->consultarBD($consulta,$valores);

    			foreach($resultado as &$datos)
	            {
	            	if($datos['ERRNO'] == 1 || empty(intval(trim($datos['id_category_lang']))) || empty($datos['title_category_lang']))
	            	{
	            		echo('<h3><span class="badge bg-dark">'.$lang_global["Lo sentimos pero no se puede mostrar la información"].'</span></h3>');
	            	}else{
	          		  echo('<div id="update-category-form" class="pt-3">
					  			<div class="row">
					  				<div class="col-12 col-xl-8">
					  					<form id="updateCategory" class="form-horizontal" data-id-lang="'.$obj_lang->getId_lang().'" data-update-form-ajax="'.$datos['id_category_lang'].'" autocomplete="off" novalidate="novalidate">
					  						<div class="card-body">
					  							<div class="form-group row align-items-center mb-2">
													<label class="col-lg-3 control-label text-lg-end mb-0 f-medium" for="title_category_lang"><span class="required">*</span> '.$lang_global["Título"].'</label>
													<div class="col-lg">
														<input type="text" class="form-control" data-plugin-maxlength maxlength="70" name="title_category_lang" id="title_category_lang" value="'.(!empty($datos['title_category_lang']) ? stripslashes($datos['title_category_lang']) : '').'" required="">
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-3 control-label text-lg-end mb-0 f-medium" for="subtitle_category_lang">'.$lang_global["Subtítulo"].'</label>
													<div class="col-lg">
														<input type="text" class="form-control" data-plugin-maxlength maxlength="45" name="subtitle_category_lang" id="subtitle_category_lang" value="'.(!empty($datos['subtitle_category_lang']) ? stripslashes($datos['subtitle_category_lang']) : '').'">
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-3 control-label text-lg-end mb-0 f-medium" for="description_small_category_lang">'.$lang_global["Descripción corta"].'</label>
													<div class="col-lg">
														<textarea id="description_small_category_lang" class="form-control" data-plugin-maxlength maxlength="100" rows="4" name="description_small_category_lang">'.(!empty($datos['description_small_category_lang']) ? stripslashes($datos['description_small_category_lang']) : '').'</textarea>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-3 control-label text-lg-end mb-0 f-medium" for="description_large_category_lang">'.$lang_global["Descripción larga"].'</label>
													<div class="col-lg">
														<textarea
															name="description_large_category_lang"
															id="description_large_category_lang"
															class="summernote"
															data-plugin-summernote>'.(!empty($datos['description_large_category_lang']) ? stripslashes($datos['description_large_category_lang']) : '').'</textarea>
													</div>
												</div>
												<div class="form-group row align-items-center mb-2">
													<label class="col-lg-3 control-label text-lg-end mb-0 f-medium" for="color_hexadecimal_category">'.$lang_global["Color de fondo"].'</label>
													<div class="col-lg">
														<input type="color" id="color_hexadecimal_category" class="border-0 ms-2" name="color_hexadecimal_category" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="'.$datos['color_hexadecimal_category'].'">
													</div>
												</div>
											</div>
											<div class="card-footer text-center mt-3">
												<button type="submit" class="btn btn-dark">'.$lang_global["Modificar"].'</button>
											</div>
					  					</form>
					  				</div>
					  				<div class="col-12 col-xl-4">
										<div class="form-group">
											<div class="accordion accordion-sm accordion-quaternary" id="accordion">
												<div class="card card-default">
													<div class="card-header">
														<h4 class="card-title m-0">
															<a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion" data-bs-target="#collapse1">'.$lang_global["Inicio"].'</a>
														</h4>
													</div>
													<div id="collapse1" class="collapse show" data-bs-parent="#accordion">
														<div class="card-body" style="background: #fff;border: 1px solid #ced4da;">
															<ul class="pt-3 ps-3" style="list-style: none;">
																<li>
																	<div class="radio-custom radio-success">
																		<input type="radio" id="parent_id_1" checked disabled>
																		<label class="f-bold c-negro">'.$lang_global["Inicio"].'</label>
																	</div>');

											  	  					$topCategoriesArray =  categoryDao::showBaseCategories();

											  						//$type_action
																		//0 = NO ES OBLIGATORIO EL ID
																			//0 = NULLO
																		//1 = ES OBLIGATORIO EL ID_PRODUCTO
																			//$obj_product_lang->getId_product()
																		//2 = ES OBLIGATORIO EL ID_CATEGORY
																			//$obj_category_lang->getId_category()
																		//3 = ES OBLIGATORIO EL ID_BLOG
																			//$obj_blog_lang->getId_blog()
																		//4 = ES OBLIGATORIO EL ID_EVENTO
																			//$obj_event_lang->getId_event()
																	//$view
																		//1 = lista con radio y/o checkbox
																		//2 = lista con etiqueta badge
																		//3 = lista mediaboxes

											  	  													//$data,$type_action,$view,$id_table
											  	  					echo categoryDao::generateTree($topCategoriesArray,2,1,$obj_category_lang->getId_category());

									  	  		  		  echo('</li>
															</ul>
									  	  		  		</div>
													</div><!--END collapse1-->
												</div>
											</div>
								  		</div>
					  				</div>
					  			</div>
					  	    </div><!--END update-category-form-->');
	            	    }
	            }//END FOREACH
			}
	  echo('</div><!--END card-body-->');
		}

		/**
		 * [updateInformationCategory description]
		 *
		 * @param  [type] $obj_category_lang [description]
		 * @return [type]                    [description]
		 */

		public static function updateInformationCategory($obj_category_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_category_lang->getId_category_lang()))) && !empty($obj_category_lang->getTitle_category_lang())){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationCategory(:id_category_lang,:id_color_hexadecimal_category,:title_category_lang,:subtitle_category_lang,:description_small_category_lang,:description_large_category_lang)";
	            $valores 		= array('id_category_lang' 					=> $obj_category_lang->getId_category_lang(),
	        							'id_color_hexadecimal_category' 	=> $obj_category_lang->getColor_hexadecimal_category(),
	        							'title_category_lang' 				=> $obj_category_lang->getTitle_category_lang(),
	        							'subtitle_category_lang' 			=> $obj_category_lang->getSubtitle_category_lang(),
	        							'description_small_category_lang' 	=> $obj_category_lang->getDescription_small_category_lang(),
	        							'description_large_category_lang' 	=> $obj_category_lang->getDescription_large_category_lang());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

			 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Actualizo"],$lang_error["la información"],$obj_category_lang->getTitle_category_lang(),$lang_record["Historial 2"]);
		 					//MENSAJE EMERGENTE
		 					$valor = array("estado" 		=> "true",
		 								   "resultado" 		=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la información"],"/PARA3/",stripslashes($obj_category_lang->getTitle_category_lang()),$lang_error["Error 6"]),
		 								   "redireccionar" 	=> "true");
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
								   "error" 	=> $lang_error['Error en el proceso'].$lang_error["Variables de sesión vacías"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
				 }
		}

		/**
         * [registerParentCategory description]
         *
         * @param  [type] $obj_category_lang [description]
         * @return [type]                    [description]
         */

        public static function registerParentCategory($obj_category_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_category_lang->getParent_id()))) && !empty(intval(trim($obj_category_lang->getId_category())))){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL registerParentCategory(:id_category,:parent_id)";
	            $valores 		= array('id_category' 	=> $obj_category_lang->getId_category(),
	        							'parent_id' 	=> $obj_category_lang->getParent_id());

	            $resultado 		= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            			require_once(self::$file_help);

			 				$valor = array("estado" => "true",
			 							   "resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elemento"],"/PARA2/",$lang_error["modificado"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			default:
			 				$valor = array("estado" => "false",
			 							   "error" => replaceStringTwoParametersArray("/PARA1/",$lang_error["la categoría"],"/PARA2/",$lang_error["ya existe asociada"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 		}
			    }//END call registerParentCategory
			}
		}

		/**
		 * [showCategoryImages description]
		 *
		 * @param  [type] $obj_lang          [description]
		 * @param  [type] $obj_category_lang [description]
		 * @param  [type] $obj_image_lang    [description]
		 * @return [type]                    [description]
		 */

		public static function showCategoryImages($obj_lang,$obj_category_lang,$obj_image_lang)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_lang->getId_lang()))) && !empty(intval(trim($obj_image_lang->getId_type_image()))))
			{
				//$visible_scrollbar
					//0 = Inactivo
					//1 = Activo

													//$id_table,$id_lang,$id_type_image,$visible_scrollbar
				imageDao::showMediaGeneralGallery($obj_category_lang->getId_category(),$obj_lang->getId_lang(),$obj_image_lang->getId_type_image(),1);
			}else{
					echo('<h3><span class="badge bg-dark">'.$lang_global['Error en el proceso'].$lang_global["Variables vacías"].'</h4>');
				 }
		}

		/**
         * [showCategoryAttributesByCategoryId description]
         *
         * @param  [type] $obj_category_lang [description]
         * @return [type]                    [description]
         */

        public static function showCategoryAttributesByCategoryId($obj_category_lang)
        {
        	if(!empty(intval(trim($obj_category_lang->getId_category()))) && !empty(intval(trim($obj_category_lang->getType_info())))){

				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL showCategoryAttributesByCategoryId(:id_category)";
	            $valores 		= array('id_category' => $obj_category_lang->getId_category());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				switch ($obj_category_lang->getType_info()) {
			 					case 1://id_category_lang
			 						return $atributo['id_category_lang'];
			 					break;
			 					case 2://title_category_lang
			 						return stripslashes($atributo['title_category_lang']);
			 					break;
			 					case 3://subtitle_category_lang
			 						return (!empty($datos['subtitle_category_lang']) ? stripslashes($datos['subtitle_category_lang']) : '');
			 					break;
			 					case 4://description_small_category_lang
			 						return (!empty($datos['description_small_category_lang']) ? stripslashes($datos['description_small_category_lang']) : '');
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
         * [showRegisteredAccountsCategories description]
         *
         * @param  [type]  $obj_image_lang    [description]
         * @param  [type]  $obj_category_lang [description]
         * @param  integer $x                 [description]
         * @return [type]                     [description]
         */

        public static function showRegisteredAccountsCategories($obj_image_lang,$obj_category_lang,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_category_lang->getId_category()))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableChildCategoryByCategoryId(:id_category)";
				$valores 		= array('id_category' => $obj_category_lang->getId_category());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		//NO ES NECESARIO VALIDAR $datos['TOTAL_SUBCATEGORIES'] YA QUE SU VALOR PUEDE SER 0
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_CATEGORIES'] > 0 && !empty(intval(trim($datos['id_category']))) && !empty(intval(trim($datos['id_lang']))) && !empty(intval(trim($datos['id_category_lang']))) && !empty($datos['title_category_lang'])){

            			if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			          echo('<table class="table table-responsive-xl table-bordered table-striped mb-0" id="datatable-child-categories" data-order="[]" data-page-length="10">
								<thead>
									<tr>
										<th>ID</th>
										<th>'.$lang_global['Imagen'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['¿Quién creo la categoría?'].'</th>' : '').'
										<th>'.$lang_global['Categoría'].'</th>
										<th>'.$lang_global['Descripción'].'</th>
										<th>'.$lang_global['Productos'].'</th>
										<th>'.$lang_global['Accesorios'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['Estatus'].'</th>' : '').'
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody class="row_position">');
							}

							  echo('<tr id="item-id_category-'.$datos['id_category'].'" data-id="'.$datos['id_category'].'">
									<td>'.$datos['id_category'].'</td>
									<td class="text-center">');
	            		  												//$id_category_lang,$id_type_image,$id_lang
	            		  				categoryDao::showCategoryImage($datos['id_category_lang'],$obj_image_lang->getId_type_image(),$datos['id_lang']);
	            		  	  echo('</td>
	            		  	  		'.($_SESSION['id_role_dao'] <= 2 && !empty(intval(trim($datos['id_user']))) && !empty(intval(trim($datos['id_role']))) && !empty($datos['full_name']) ? '<td><a href="'.URL_CARPETA_ADMIN.'/my-profile/'.$datos['id_user'].'" class="btn btn-primary btn-xs" role="button" aria-pressed="true">'.$datos['full_name'].'</a></td>' : '').'
									<td>
										<a class="d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-category-detail/'.$datos['id_category'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-2" style="font-size:13px;"></i>'.stripslashes($datos['title_category_lang']).'</a>
									</td>
	            		  	  		<td>'.(!empty($datos['description_small_category_lang']) ? stripslashes($datos['description_small_category_lang']) : '').'</td>
	            		  	  		<td>');
	            		  	  			//id_type_product
	            		  					//1 = Producto
								  			//2 = Accesorios
	            		  																//$id_type_product,$id_category,$id_lang
							  			categoryDao::showProductCategoryByTypeProductId(1,$datos['id_category'],$datos['id_lang']);
	            		  	  echo('</td>
	            		  	  		<td>');
	            		  	  			//id_type_product
	            		  					//1 = Producto
								  			//2 = Accesorios
	            		  																//$id_type_product,$id_category,$id_lang
							  			categoryDao::showProductCategoryByTypeProductId(2,$datos['id_category'],$datos['id_lang']);
	            		  	  echo('</td>');
	            		    if($_SESSION['id_role_dao'] <= 2){
	            		  	   echo('<td class="text-center">');
							  							//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  			pluginIosSwitch('category',$datos['id_category'],stripslashes($datos['title_category_lang']),$datos['s_category'],$obj_image_lang->getId_type_image(),$lang_global['Activar o desactivar']);
							  echo('</td>');
	            		  	  		}
	            		  	  echo('<td class="text-center">');

							  	if($datos['TOTAL_SUBCATEGORIES'] > 0){
							  	  echo('<a class="d-inline-block pe-3" data-bs-toggle="tooltip" title="'.$lang_global['Mostrar subcategorías'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-child-category/'.$datos['id_category'].'"><i class="fas fa-eye me-2 fa-fade"></i></a>');
							  	}

																		//$id_category,$id_category_lang,$title_category_lang,$id_type_section,$id_lang
								categoryDao::showTypeOfLinkToRemoveCategory($datos['id_category'],$datos['id_category_lang'],stripslashes($datos['title_category_lang']),$obj_image_lang->getId_type_image(),$datos['id_lang']);
						      echo('</td>
	            		  	  	</tr>');

							if(count($resultado) == $x){
								$x = 1;
								echo('</tbody>
							</table>');
							}
							$x++;
            		}else{
            				echo('<h3><span class="badge bg-dark">'.$lang_global['Error en el proceso'].$lang_global['Sin categorías registradas'].'</span></h3>');
            			 }
            	}
			}else{
				echo('<h3><span class="badge bg-dark">'.$lang_global['Error en el proceso'].$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		public static function showCategoriesInMediaBoxes($id_lang,$y = 1)
		{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			//CREAR OBJETO
			$ob_conectar 	= new conectorDB();

			$consulta1 		= "CALL showCategoriesInMediaBoxes(:id_lang)";
			$valores1		= array('id_lang' => $id_lang);

			$resultado1 	= $ob_conectar->consultarBD($consulta1,$valores1);

			foreach($resultado1 as &$datos1)
			{
				if($datos1['ERRNO'] == 2 && $datos1['TOTAL_CATEGORIES'] > 0 && !empty($datos1['id_category_lang']) && !empty($datos1['title_category_lang']))
				{
					if($y == 1){

				  echo('<div class="filters-container">
							<div class="media-boxes-search">
								<span class="media-boxes-icon fa fa-search"></span>
								<input type="text" id="search" placeholder="'.$lang_global["Buscar por titulo"].'">
								<span class="media-boxes-clear fa fa-close"></span>
							</div>

							<div class="media-boxes-sort">
								<div class="media-boxes-drop-down" id="sort">
									<div class="media-boxes-drop-down-header"></div>
									<ul class="media-boxes-drop-down-menu">
										<li><a href="#" data-sort-by="original-order" data-sort-ascending="false" class="selected">'.$lang_global["Orden original"].'</a></li>
										<li><a href="#" data-sort-by="title" data-sort-toggle="true">'.$lang_global["Ordenar por titulo"].'</a></li>
										<li><a href="#" data-sort-by="categories" data-sort-toggle="true">'.$lang_global["Ordenar por categorias"].'</a></li>
									</ul>
								</div>

								<div class="media-boxes-sort-order">
									<span class="fa fa-chevron-up selected" data-sort-ascending="true"></span>
									<span class="fa fa-chevron-down" data-sort-ascending="false"></span>
								</div>
							</div>

							<ul class="media-boxes-filter" id="filter">
								<li><a class="selected" href="#" data-filter="*">'.$lang_global["Todas"].'</a></li>');
					}

						  echo('<li><a href="#" data-filter=".Category'.$datos1['id_category_lang'].'">'.$datos1['title_category_lang'].'</a></li>');

					if(count($resultado1) == $y){
					  echo('</ul>
						</div>');
					}

					$y++;
				}
			}
		}
   	}