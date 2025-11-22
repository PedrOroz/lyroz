<?php
	require_once(dirname(__DIR__)."/controllers/functions/entities/attribute_lang.php");

	class attributeDao
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
   		 * [showFormCreateAttribute description]
   		 *
   		 * @param  [type] $obj_image_lang [description]
   		 * @return [type]                 [description]
   		 */

   		public static function showFormCreateAttribute($obj_image_lang)
    	{

			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<div id="attribute-form">
	  			<div class="row">
	  				<div class="col-12 col-lg-5 col-xl-4" style="border-right: 1px solid #ddd;">
	  					<form id="registerAttribute" class="form-horizontal" autocomplete="off" novalidate="novalidate">
	  						<div class="card-body">
								<div class="row">
									<div class="col-12 mb-2">
							  			<div class="form-group">
											<label class="f-medium c-negro" for="title_attribute_lang"><span class="required">*</span> '.$lang_global["Título"].'</label>
											<input type="text" class="form-control" data-plugin-maxlength maxlength="70" name="title_attribute_lang" id="title_attribute_lang" value="" required>
										</div>
									</div>
									<div class="col-12 mb-2">
										<div class="form-group">
											<label class="f-medium c-negro"><span class="required">*</span> '.$lang_global["Atributo padre"].' <button type="button" class="info ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="'.$lang_global["Info atributo padre"].'"><i class="fas fa-question" style="font-size: 9px;"></i></button>
											</label>
											<ul class="ps-0" style="list-style: none;">
												<li>
													<div class="radio-custom radio-success">
														<input type="radio" id="parent_id_attribute_1" checked disabled>
														<label class="f-bold c-negro" for="parent_id_attribute_1">'.$lang_global["General"].'</label>
													</div>');

	  												//$type_action
														//0 = NO ES OBLIGATORIO EL ID
															//0 = NULLO
														//1 = ES OBLIGATORIO EL ID_PRODUCTO
															//$obj_product_lang->getId_product()
														//2 = ES OBLIGATORIO EL ID_ATTRIBUTE
															//$obj_attribute_lang->getid_attribute()
														//3 = ES OBLIGATORIO EL ID_BLOG
															//$obj_blog_lang->getId_blog()
														//4 = ES OBLIGATORIO EL ID_EVENTO
															//$obj_event_lang->getId_event()
													//$view
														//1 = lista con radio y/o checkbox
														//2 = lista con etiqueta badge
														//3 = lista mediaboxes

	  												$topAttributesArray =  attributeDao::showBaseAttributes();

	  												echo attributeDao::generateTree($topAttributesArray,0,1,0);

								  		  echo('</li>
								  		  	</ul>
								  		</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-dark">'.$lang_global["Registrar"].'</button>
							</div>
	  					</form>
	  				</div>
	  				<div class="col-12 col-lg-7 col-xl-8">');
						if(!empty(intval(trim($obj_image_lang->getId_type_image())))){
							attributeDao::showRegisteredAccountsParentAttributes($obj_image_lang->getId_type_image());
						}
	  		  echo('</div>
	  			</div>
	  	   </div>');
		}

		/**
		 * [showBaseAttributes description]
		 *
		 * @param  array  $information             [description]
		 * @param  [type] $valores_base_attributes [description]
		 * @return [type]                          [description]
		 */

		public static function showBaseAttributes($information = array(),$valores_base_attributes = null)
        {
        	if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao'])))){
        		//CREAR OBJETO
	    		$ob_conectar 					= new conectorDB();

	    		$valores_base_attributes 		= "CALL showAttributes".($_SESSION['id_role_dao'] > 2 ? 'ByUser' : '') ."(".($_SESSION['id_role_dao'] > 2 ? ':id_user' : '') .")";

	    		if($_SESSION['id_role_dao'] > 2){
	    			$valores_base_attributes	= array('id_user' => intval(trim($_SESSION['id_user_dao'])));
	    		}

	            $resultadoBC = $ob_conectar->consultarBD($valores_base_attributes,$valores_base_attributes);

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
			    		if ($data[$i]['parent_id_attribute'] == $parent) {
				      $tree .= "<li data-level='".($depth+1)."'>";

      				//$type_action
						//0 = NO ES OBLIGATORIO EL ID
							//0 = NULLO
						//1 = ES OBLIGATORIO EL ID_PRODUCTO
							//$obj_product_lang->getId_product()
						//2 = ES OBLIGATORIO EL ID_ATTRIBUTE
							//$obj_attribute_lang->getid_attribute()
						//3 = ES OBLIGATORIO EL ID_BLOG
							//$obj_blog_lang->getId_blog()
						//4 = ES OBLIGATORIO EL ID_EVENTO
							//$obj_event_lang->getId_event()
					//$view
						//1 = lista con radio y/o checkbox
						//2 = lista con etiqueta badge
						//3 = lista mediaboxes

				      	if($view == 1){
			              $tree .= '<div class="'.($type_action == 0 ? 'radio-custom radio-' : 'checkbox-custom checkbox-') . ($data[$i]['id_attribute'] == 1 ? 'success' : 'primary') . ' mb-1">
											<input type="'.($type_action == 0 ? 'radio' : 'checkbox').'" '.($data[$i]['id_attribute'] == 1 ? '' : 'name="parent_id_attribute"') . ' value="'.$data[$i]['id_attribute'].'" '.($depth == 0 ? ' id="parent_attribute_'.$data[$i]['id_attribute'].'"' : '').' class="id_attribute"';

										if(!empty(intval(trim($id_table)))){
						  		  			switch ($type_action) {
						  		  				case 1://PRODUCTO DETALLE
						  		  					$consulta 		= "CALL showSelectedProductLangAttributes(:id_table,:id_attribute)";
						  		  					$valores 		= array('id_table' 		=> $id_table,
										        							'id_attribute' 	=> $data[$i]['id_attribute']);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['CHECKED'] == 2 ? ' checked' : ' ');
									            		}
													}
						  		  				break;
						  		  				case 2://ATRIBUTO DETALLE
						  		  					//ATRIBUTO PADRE
						  		  					$tree .= ($data[$i]['id_attribute'] == $id_table ? ' disabled' : ' ');
						  		  					//SUBCATEGORIAS SELECCIONADAS
						  		  					$consulta 		= "CALL showSubAttributesByParentIdAttribute(:id_table)";
						  		  					$valores 		= array('id_table' => $id_table);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['SUBATTRIBUTE'] == $data[$i]['id_attribute'] ? ' checked' : ' ');
									            		}
													}
						  		  				break;
						  		  				case 3://BLOG DETALLE
						  		  					$consulta 		= "CALL showSelectedBlogAttributes(:id_table,:id_attribute)";
						  		  					$valores 		= array('id_table' 		=> $id_table,
										        							'id_attribute' 	=> $data[$i]['id_attribute']);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['CHECKED'] == 2 ? ' checked' : ' ');
									            		}
													}
						  		  				break;
						  		  				case 4://EVENTO DETALLE
						  		  					$consulta 		= "CALL showSelectedEventAttributes(:id_table,:id_attribute)";
						  		  					$valores 		= array('id_table' 		=> $id_table,
										        							'id_attribute' 	=> $data[$i]['id_attribute']);

										            $resultado   	= $ob_conectar->consultarBD($consulta,$valores);

									            	foreach($resultado as &$datos){
									            		if($datos['CHECKED'] == 2){
									            			$tree .= ($datos['CHECKED'] == 2 ? ' checked' : ' ');
									            		}
													}
							  		  			break;
						  		  				default://ATRIBUTO
													$tree .= ($data[$i]['id_attribute'] == 1 ? 'checked disabled' : '');
												break;
						  		  			}
						  		  		}

							   $tree .='>';
							   			if($data[$i]['id_attribute'] > 1){
											$tree .='<label '.($data[$i]['id_attribute'] == 1 ? 'class="f-bold c-negro"' : '') . ' id="child_attribute_'.$data[$i]['id_attribute'].'" data-parent="'.$data[$i]['parent_id_attribute'].'">'.stripslashes($data[$i]['title_attribute_lang']).'<a class="d-inline" href="'.URL_CARPETA_ADMIN.'/catalogue-attribute-detail/'.$data[$i]['id_attribute'].'"><i class="fas fa-pencil-alt c-gris-oscuro ms-1" style="font-size:11px;"></i></a></label>';
										}else{
											$tree .='<label '.($data[$i]['id_attribute'] == 1 ? 'class="f-bold c-negro"' : '') . ' id="child_attribute_'.$data[$i]['id_attribute'].'" data-parent="'.$data[$i]['parent_id_attribute'].'">'.stripslashes($data[$i]['title_attribute_lang']).'</label>';
											 }
						   $tree .='</div>';
						}

						if($view == 2){
							$tree .='<span class="badge badge-'.($depth == 0 ? 'default' : 'warning').'">'.stripslashes($data[$i]['title_attribute_lang']).'</span>';
						}

						if($view == 3){
								$tree .='<a href="#" class="c-negro" data-filter=".cat'.$data[$i]['id_attribute'].'">'.stripslashes($data[$i]['title_attribute_lang']).'</a>';
							}
																	//$data,$type_action,$view,$id_table
				    			$tree .= attributeDao::generateTree($data,$type_action,$view,$id_table,$data[$i]['id_attribute'], $depth+1);
				      $tree .= "</li>";
				        }//END if ($data[$i]['parent_id_attribute'] == $parent) {
			    	}else{
			    			//EN CASO DE QUE NO SE HAYA REGISTRADO ALGUNA CATEGORIA POR PARTE DEL USUARIO
			    			if(!empty(intval(trim($id_table))) && $view == 1 || $view == 2){
			  		  			switch ($type_action) {
			  		  				case 1://PRODUCTO DETALLE
			  		  					$tree .= '<li><p class="mb-2">'.$lang_global["Aún no tienes categorías registradas."].'</p><a href="'.URL_CARPETA_ADMIN.'/catalogue-attribute" rel="noopener" role="button"><button type="button" class="my-1 me-1 btn btn-xs btn-primary">'.$lang_global["Registrar aquí"].'</button></a></li>';
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

		public static function selectTree($data,$type_action,$id_table,$parent = 0,$depth=0,$tree = '')
        {
        	//CREAR OBJETO
			$ob_conectar 		= new conectorDB();

		    for ($i=0, $ni=count($data); $i < $ni; $i++) {
		    	if ($data[$i]['ERRNO'] > 1) {
		    		if ($data[$i]['parent_id_attribute'] == $parent) {

  				//$type_action
					//0 = NO ES OBLIGATORIO EL ID
						//0 = NULLO
					//1 = ES OBLIGATORIO EL ID
						//$id_attribute

			      	  $tree .= '<option value="'.$data[$i]['id_attribute'].'"';

		      	  		if($type_action == 1 && !empty($id_table)){
		      	  			$tree .= ($id_table == $data[$i]['id_attribute'] ? ' selected="selected"' : '');
		      	  		}

			      	  $tree .= '>'.str_repeat(" - ", $depth).$data[$i]['title_attribute_lang'].'</option>';
														//$data,$type_action,$id_table
			    	  $tree .= attributeDao::selectTree($data,$type_action,$id_table,$data[$i]['id_attribute'], $depth+1);
			        }
		    	}
		    }

		    return $tree;
		}

		/**
		 * [registerAttribute description]
		 *
		 * @param  [type]  $obj_attribute_lang  [description]
		 * @param  string  $estado              [description]
		 * @param  string  $tipo_msj            [description]
		 * @param  string  $devuelve            [description]
		 * @param  string  $estadoRedireccionar [description]
		 * @param  integer $x                   [description]
		 * @return [type]                       [description]
		 */

		public static function registerAttribute($obj_attribute_lang,$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false",$x = 0)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty($obj_attribute_lang->getTitle_attribute_lang())){

				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            require_once(self::$file_help);

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta1 		= "CALL registerAttribute(:title_attribute_lang,:parent_id_attribute,:id_user)";
	            $valores1		= array('title_attribute_lang' 	=> $obj_attribute_lang->getTitle_attribute_lang(),
	        							'parent_id_attribute' 	=> $obj_attribute_lang->getParent_id_attribute(),
	        							'id_user' 				=> intval(trim($_SESSION['id_user_dao'])));

	            $resultado1 	= $ob_conectar->consultarBD($consulta1,$valores1);

	            foreach($resultado1 as &$atributo1)
			 	{
			 		switch ($atributo1['ERRNO']) {
			 			case 2://EL TITULO YA EXITE REGISTRADO
	                		$devuelve 	= replaceStringTwoParametersArray("/PARA1/",$obj_attribute_lang->getTitle_attribute_lang(),"/PARA2/",$lang_error["ya existe"],$lang_error["Error 9"]);
			 			break;
			 			case 3://CORRECTO
		 					self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

		 					$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Registro"],$lang_error["el atributo"],$obj_attribute_lang->getTitle_attribute_lang(),$lang_record["Historial 2"]);

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
			    }//END call registerAttribute

			    $valor = array("estado" 		=> $estado,
			    			   $tipo_msj 		=> $devuelve,
			    			   "redireccionar" 	=> $estadoRedireccionar);
	            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
			}
		}

		/**
		 * [showRegisteredAccountsParentAttributes description]
		 *
		 * @param  [type]  $id_type_image [description]
		 * @param  integer $x             [description]
		 * @param  [type]  $valores       [description]
		 * @return [type]                 [description]
		 */

		public static function showRegisteredAccountsParentAttributes($id_type_image,$x = 1,$valores = null)
    	{

			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($id_type_image))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableParentAttributes".($_SESSION['id_role_dao'] > 2 ? 'ByUser' : '') ."(".($_SESSION['id_role_dao'] > 2 ? ':id_user' : '') .")";

				if($_SESSION['id_role_dao'] > 2){
					$valores 	= array('id_user' => intval(trim($_SESSION['id_user_dao'])));
				}

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		//NO ES NECESARIO VALIDAR $datos['TOTAL_SUBATTRIBUTES'] YA QUE SU VALOR PUEDE SER 0
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_ATTRIBUTES'] > 0 && !empty(intval(trim($datos['id_attribute']))) && !empty(intval(trim($datos['id_lang']))) && !empty(intval(trim($datos['id_attribute_lang']))) && !empty($datos['title_attribute_lang'])){

            			if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			          echo('<table class="table table-responsive-xl table-bordered table-striped mb-0" id="datatable-parent-attributes" data-order="[]" data-page-length="10">
								<thead>
									<tr>
										<th>ID</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['¿Quién creo el atributo?'].'</th>' : '').'
										<th>'.$lang_global['Atributo'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['Estatus'].'</th>' : '').'
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody class="row_position">');
							}

							  echo('<tr id="item-id_attribute-'.$datos['id_attribute'].'" data-id="'.$datos['id_attribute'].'">
									<td>'.$datos['id_attribute'].'</td>
	            		  	  		'.($_SESSION['id_role_dao'] <= 2 && !empty(intval(trim($datos['id_user']))) && !empty(intval(trim($datos['id_role']))) && !empty($datos['full_name']) ? '<td><a href="'.URL_CARPETA_ADMIN.'/my-profile/'.$datos['id_user'].'" class="btn btn-primary btn-xs" role="button" aria-pressed="true"><i class="fas fa-user me-2"></i>'.$datos['full_name'].'</a></td>' : '').'
									<td>
										<a class="d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-attribute-detail/'.$datos['id_attribute'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-2" style="font-size:13px;"></i>'.stripslashes($datos['title_attribute_lang']).'</a>
									</td>');
	            		    if($_SESSION['id_role_dao'] <= 2){
	            		  	   echo('<td class="text-center">');
							  							//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  			pluginIosSwitch('attribute',$datos['id_attribute'],stripslashes($datos['title_attribute_lang']),$datos['s_attribute'],$id_type_image,$lang_global['Activar o desactivar']);
							  echo('</td>');
	            		  	  		}
	            		  	  echo('<td class="text-center">');

							  	if($datos['TOTAL_SUBATTRIBUTES'] > 0){
							  	    echo('<a class="d-inline-block pe-3" data-bs-toggle="tooltip" title="'.$lang_global['Mostrar subcategorías'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-child-attribute/'.$datos['id_attribute'].'"><i class="fas fa-eye fa-fade"></i></a>');
							  	}

							  	  	echo('<a class="d-inline-block c-negro f-medium modal-with-zoom-anim modal-remove-general" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.stripslashes(str_replace("/", " ", $datos['title_attribute_lang'])).'" href="#modal-remove-general" data-remove="'.$datos['id_attribute'].'/'.stripslashes($datos['title_attribute_lang']).'/'.$id_type_image.'"><i class="fas fa-trash fa-xl c-gris-oscuro"></i></a>
							  	  	</td>
	            		  	  	</tr>');

							if(count($resultado) == $x){
								$x = 1;
								echo('</tbody>
							</table>');
							}
							$x++;
            		}else{
            				echo('<h3><span class="badge bg-dark">'.$lang_global['Sin atributos registrados'].'</span></h3>');
            			 }
            	}
			}else{
				echo('<h3><span class="badge bg-dark">'.$lang_global['Error en el proceso'].$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [showCategoryAttributesByAttributeId description]
		 *
		 * @param  [type] $obj_attribute_lang [description]
		 * @return [type]                     [description]
		 */

        public static function showCategoryAttributesByAttributeId($obj_attribute_lang)
        {
        	if(!empty(intval(trim($obj_attribute_lang->getId_attribute()))) && !empty(intval(trim($obj_attribute_lang->getType_info())))){

				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL showCategoryAttributesByAttributeId(:id_attribute)";
	            $valores 		= array('id_attribute' => $obj_attribute_lang->getId_attribute());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				switch ($obj_attribute_lang->getType_info()) {
			 					case 1://id_attribute_lang
			 						return $atributo['id_attribute_lang'];
			 					break;
			 					case 2://title_attribute_lang
			 						return stripslashes($atributo['title_attribute_lang']);
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
         * @param  [type]  $obj_attribute_lang [description]
         * @param  integer $x                 [description]
         * @return [type]                     [description]
         */

        public static function showRegisteredAccountsAttributes($obj_image_lang,$obj_attribute_lang,$x = 1)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_image_lang->getId_type_image()))) && !empty(intval(trim($obj_attribute_lang->getId_attribute()))))
			{
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showDatatableChildCategoryByAttributeId(:id_attribute)";
				$valores 		= array('id_attribute' => $obj_attribute_lang->getId_attribute());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$datos)
            	{
            		//NO ES NECESARIO VALIDAR $datos['TOTAL_SUBATTRIBUTES'] YA QUE SU VALOR PUEDE SER 0
            		if($datos['ERRNO'] == 2 && $datos['TOTAL_ATTRIBUTES'] > 0 && !empty(intval(trim($datos['id_attribute']))) && !empty(intval(trim($datos['id_lang']))) && !empty(intval(trim($datos['id_attribute_lang']))) && !empty($datos['title_attribute_lang'])){

            			if($x == 1){
            				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

			          echo('<table class="table table-responsive-xl table-bordered table-striped mb-0" id="datatable-child-attributes" data-order="[]" data-page-length="10">
								<thead>
									<tr>
										<th>ID</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['¿Quién creo el atributo?'].'</th>' : '').'
										<th>'.$lang_global['Atributo'].'</th>
										'.($_SESSION['id_role_dao'] <= 2 ? '<th>'.$lang_global['Estatus'].'</th>' : '').'
										<th>'.$lang_global['Acciones'].'</th>
									</tr>
								</thead>
								<tbody class="row_position">');
							}

							  echo('<tr id="item-id_attribute-'.$datos['id_attribute'].'" data-id="'.$datos['id_attribute'].'">
									<td>'.$datos['id_attribute'].'</td>
	            		  	  		'.($_SESSION['id_role_dao'] <= 2 && !empty(intval(trim($datos['id_user']))) && !empty(intval(trim($datos['id_role']))) && !empty($datos['full_name']) ? '<td><a href="'.URL_CARPETA_ADMIN.'/my-profile/'.$datos['id_user'].'" class="btn btn-primary btn-xs" role="button" aria-pressed="true">'.$datos['full_name'].'</a></td>' : '').'
									<td>
										<a class="d-inline" data-bs-toggle="tooltip" title="'.$lang_global['Modificar información'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-attribute-detail/'.$datos['id_attribute'].'"><i class="fas fa-pencil-alt c-gris-oscuro me-2" style="font-size:13px;"></i>'.stripslashes($datos['title_attribute_lang']).'</a>
									</td>');
	            		    if($_SESSION['id_role_dao'] <= 2){
	            		  	   echo('<td class="text-center">');
							  							//$section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo
							  			pluginIosSwitch('attribute',$datos['id_attribute'],stripslashes($datos['title_attribute_lang']),$datos['s_attribute'],$obj_image_lang->getId_type_image(),$lang_global['Activar o desactivar']);
							  echo('</td>');
	            		  	  		}
	            		  	  echo('<td class="text-center">');

							  	if($datos['TOTAL_SUBATTRIBUTES'] > 0){
							  	  echo('<a class="d-inline-block pe-3" data-bs-toggle="tooltip" title="'.$lang_global['Mostrar subcategorías'].'" href="'.URL_CARPETA_ADMIN.'/catalogue-child-category/'.$datos['id_attribute'].'"><i class="fas fa-eye fa-fade"></i></a>');
							  	}
								  echo('<a class="d-inline-block c-negro f-medium modal-with-zoom-anim modal-remove-general" data-bs-toggle="tooltip" title="'.$lang_global['Eliminar'].' '.stripslashes($datos['title_attribute_lang']).'" href="#modal-remove-general" data-remove="'.$datos['id_attribute'].'/'.stripslashes(str_replace("/", " ", $datos['title_attribute_lang'])).'/'.$obj_image_lang->getId_type_image().'"><i class="fas fa-trash c-gris-oscuro" style="font-size:20px;"></i></a>
									</td>
	            		  	  	</tr>');

							if(count($resultado) == $x){
								$x = 1;
								echo('</tbody>
							</table>');
							}
							$x++;
            		}else{
            				echo('<h3><span class="badge bg-dark">'.$lang_global['Error en el proceso'].$lang_global['Sin atributos registrados'].'</span></h3>');
            			 }
            	}
			}else{
				echo('<h3><span class="badge bg-dark">'.$lang_global['Variables de sesión vacías'].'</span></h3>');
				 }
		}

		/**
		 * [showBasicCategorySettings description]
		 *
		 * @param  [type] $obj_lang          [description]
		 * @param  [type] $obj_attribute_lang [description]
		 * @return [type]                    [description]
		 */

		public static function showBasicAttributeSettings($obj_lang,$obj_attribute_lang)
    	{
			self::$file_global = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("global");
			require(self::$file_global);

	  echo('<div class="card-body">');
			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_attribute_lang->getId_attribute())))){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

				$consulta 		= "CALL showInformationAttribute(:id_attribute,:id_lang)";
				$valores 		= array('id_attribute' 	=> $obj_attribute_lang->getId_attribute(),
										'id_lang' 		=> $obj_lang->getId_lang());

    			$resultado   	= $ob_conectar->consultarBD($consulta,$valores);

    			foreach($resultado as &$datos)
	            {
	            	if($datos['ERRNO'] == 1 || empty(intval(trim($datos['id_attribute_lang']))) || empty($datos['title_attribute_lang']))
	            	{
	            		echo('<h3><span class="badge bg-dark">'.$lang_global["Lo sentimos pero no se puede mostrar la información"].'</span></h3>');
	            	}else{
	          		  echo('<div id="update-attribute-form" class="pt-3">
					  			<div class="row">
					  				<div class="col-12 col-xl-8">
					  					<form id="updateAttribute" class="form-horizontal" data-id-lang="'.$obj_lang->getId_lang().'" data-update-form-ajax="'.$datos['id_attribute_lang'].'" autocomplete="off" novalidate="novalidate">
					  						<div class="card-body">
					  							<div class="form-group row align-items-center mb-2">
													<label class="col-lg-3 control-label text-lg-end mb-0 f-medium" for="title_attribute_lang"><span class="required">*</span> '.$lang_global["Título"].'</label>
													<div class="col-lg">
														<input type="text" class="form-control" data-plugin-maxlength maxlength="70" name="title_attribute_lang" id="title_attribute_lang" value="'.stripslashes($datos['title_attribute_lang']).'" required="">
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

												  	  					$topAttributesArray =  attributeDao::showBaseAttributes();

												  						//$type_action
																			//0 = NO ES OBLIGATORIO EL ID
																				//0 = NULLO
																			//1 = ES OBLIGATORIO EL ID_PRODUCTO
																				//$obj_product_lang->getId_product()
																			//2 = ES OBLIGATORIO EL ID_ATTRIBUTE
																				//$obj_attribute_lang->getId_attribute()
																			//3 = ES OBLIGATORIO EL ID_BLOG
																				//$obj_blog_lang->getId_blog()
																			//4 = ES OBLIGATORIO EL ID_EVENTO
																				//$obj_event_lang->getId_event()
																		//$view
																			//1 = lista con radio y/o checkbox
																			//2 = lista con etiqueta badge
																			//3 = lista mediaboxes

												  	  													//$data,$type_action,$view,$id_table
												  	  					echo attributeDao::generateTree($topAttributesArray,2,1,$obj_attribute_lang->getId_attribute());

									  	  		  		  echo('</li>
															</ul>
									  	  		  		</div>
													</div>
												</div>
											</div>
								  		</div>
					  				</div>
					  			</div>
					  	   </div>');
	            	    }
	            }//END FOREACH
			}
	  echo('</div>');
		}

		/**
		 * [registerParentAttribute description]
		 *
		 * @param  [type] $obj_attribute_lang [description]
		 * @return [type]                     [description]
		 */

		public static function registerParentAttribute($obj_attribute_lang)
    	{

			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($obj_attribute_lang->getParent_id_attribute()))) && !empty(intval(trim($obj_attribute_lang->getId_attribute())))){
				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL registerParentAttribute(:id_attribute,:parent_id_attribute)";
	            $valores 		= array('id_attribute' 			=> $obj_attribute_lang->getId_attribute(),
	        							'parent_id_attribute' 	=> $obj_attribute_lang->getParent_id_attribute());

	            $resultado 		= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
	            			require_once(self::$file_help);

			 				$valor = array("estado" 	=> "true",
			 							   "resultado" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["Elemento"],"/PARA2/",$lang_error["modificado"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 			default:
			 				$valor = array("estado" => "false",
			 							   "error" 	=> replaceStringTwoParametersArray("/PARA1/",$lang_error["el atributo"],"/PARA2/",$lang_error["ya existe asociado"],$lang_error["Error 9"]));
	            			return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
	            			exit();
			 			break;
			 		}
			    }//END call registerParentAttribute
			}
		}

		/**
		 * [updateInformationAttribute description]
		 *
		 * @param  [type] $obj_attribute_lang [description]
		 * @return [type]                     [description]
		 */

		public static function updateInformationAttribute($obj_attribute_lang)
    	{
			self::$file_error = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("error");
			require_once(self::$file_error);

			if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($obj_attribute_lang->getId_attribute_lang()))) && !empty($obj_attribute_lang->getTitle_attribute_lang())){

				//CREAR OBJETO
				$ob_conectar 	= new conectorDB();

	            $consulta 		= "CALL updateInformationAttribute(:id_attribute_lang,:title_attribute_lang)";
	            $valores 		= array('id_attribute_lang' 	=> $obj_attribute_lang->getId_attribute_lang(),
	        							'title_attribute_lang' 	=> $obj_attribute_lang->getTitle_attribute_lang());

	            $resultado 	 	= $ob_conectar->consultarBD($consulta,$valores);

	            foreach($resultado as &$atributo)
			 	{
			 		switch ($atributo['ERRNO']) {
			 			case 2://CORRECTO
			 				self::$file_help = dirname(__DIR__).'/helps/help.php';
							require_once(self::$file_help);

							self::$file_record = dirname(__DIR__).'../../languages/'.langController::prefixLangDefault("record");
							require_once(self::$file_record);

			 				$ob_conectar->registerRecordThreeParameters(intval(trim($_SESSION['id_user_dao'])),$lang_error["Actualizo"],$lang_error["la información"],$obj_attribute_lang->getTitle_attribute_lang(),$lang_record["Historial 2"]);

		 					$valor = array("estado" 		=> "true",
		 								   "resultado" 		=> replaceStringThreeParametersArray("/PARA1/",$lang_error["Actualizo"],"/PARA2/",$lang_error["la información"],"/PARA3/",$obj_attribute_lang->getTitle_attribute_lang(),$lang_error["Error 6"]),
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
   	}