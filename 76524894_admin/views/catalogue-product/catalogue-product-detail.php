<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))) || !isset($_SESSION['id_role_dao']) || empty(intval(trim($_SESSION['id_role_dao']))) || !isset($_GET['id_product']) || empty(intval(trim($_GET['id_product']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$ruta 		= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$id_product 		= intval(trim($_GET['id_product']));
	$link 				= URL_CARPETA_ADMIN."/catalogue-product-detail/".$id_product;
	$title 				= $lang_global["Productos"];
	$page 				= $lang_global["Catálogo"];
	$id_type_section 	= 15;
	$id_page 			= $id_type_section;
	$id_user 			= intval(trim($_SESSION['id_user_dao']));

	require_once('./templates/head.php');
	require_once('./core/controllers/functions/productsController.php'); ?>

		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/css/dataTables.bootstrap5.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/dd/dd.css?v=4.0">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/modernizr/modernizr.js"></script>
		<script>
            let url_admin 		= "<?php echo URL_CARPETA_ADMIN; ?>",
            	url_front 		= "<?php echo URL_CARPETA_FRONT; ?>",
            	title_pnotify 	= "<?php echo $title; ?>",
            	id_page 		= <?php echo $id_page; ?>,
            	fullLink 		= "<?php echo $link; ?>";
        </script>
	</head>
	<body>
		<section class="body">
			<!-- start: modals -->
			<?php require_once("./modals/modal-update-image.php"); ?>
			<?php require_once("./modals/modal-delete-specific-table.php"); ?>
			<?php require_once("./modals/modal-delete-with-image-version-3-parameters.php"); ?>
			<!-- end: modals -->

			<!-- start: top-header -->
			<?php require_once('./templates/top-header.php'); ?>
			<!-- end: top-header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php require_once('./templates/header.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body content-body-modern mt-0">

					<!-- start: page-header -->
					<?php require_once('./templates/page-header.php'); ?>
					<!-- end: page-header -->

					<!-- start: page -->
					<div class="row">

						<?php productsController::showFormUploadProduct($id_product,$id_type_section); ?>

					</div>
					<!-- end: page -->

				</section>
			</div>

			<?php require_once('./templates/sidebar-right.php'); ?>

		</section>

		<!-- Vendor -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery/jquery.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/popper/umd/popper.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/common/common.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/js/select2.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/isotope/isotope.js"></script>

		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/dd/dd.min.js?ver=4.0"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
		<!-- Examples -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/examples/examples.mediagallery.js"></script>
		<script>
			//SANATIZA EL STRING PARA CONVERTIRLO EN URL AMIGABLE
			function urlifyTitle(string) {
			    return string.trim().toLowerCase().replace(/ {1,}/g,"-").normalize('NFD').replace(/[\u0300-\u036f]/g, "").replace(new RegExp('[^A-Za-z0-9-_]+','g'),'').replace(/-+/g,"-");
			}
			//SANATIZA EL STRING PARA REEMPLAZAR GUION POR ESPACIO
			function postWithoutScript(string) {
			    return string.replace(/-/gi, " ");
			}
			let friendlyUrlTypeProduct = urlifyTitle($('input:radio[name="id_type_product"]:checked').attr('data-title'));
			//VALOR CHECKED DE TIPO DE PRODUCTO EN INPUT
			$("#urlTypeProduct").val(friendlyUrlTypeProduct);
			//CAMBIAR VALOR DEL TIPO DE PRODUCTO EN URL AMIGABLE Y EN PREVIEW GOOGLE
			$('input:radio[name="id_type_product"]').change(function(){
		    	friendlyUrlTypeProduct = urlifyTitle($(this).attr('data-title'));
		        $("#urlTypeProduct").val(friendlyUrlTypeProduct);
		        $("#snippet_cite").text(friendlyUrlTypeProduct + '/'+ $("#urlPreview").val());
		    });
			//TITULO GENERAL SE CARGA COMO URL AMIGABLE
			$(".postTitle").on("keyup", function(e) {
		        if(e.key!='Dead' && e.keyCode!=222) {
		        	$('#meta_title_product_lang').val($(this).val());
		        	$('#snippet-editor-title').val($(this).val());

		            let friendlyUrl = urlifyTitle($(this).val());
		            $("#urlPreview").val(friendlyUrl);

		            $("#snippet_title").text($(this).val());
		            $("#snippet_cite").text(friendlyUrlTypeProduct + '/' + friendlyUrl);
		            $('#snippet-editor-slug').val(friendlyUrl);

		            $(this).focus();
		        }
		    });
			//CAMBIA SOLO EL TITULO ESPECIFICO DE LA URL AMIGABLE, META TITULO Y SNIPPET PREVIEW GOOGLE
		    $("#urlPreview").on("change", function() {
		        let friendlyUrl 	= urlifyTitle($(this).val());
		        let stringSinGuion 	= postWithoutScript($(this).val());

		        $(this).val(friendlyUrl);
		        $("#snippet_cite").text(friendlyUrlTypeProduct + '/' + friendlyUrl);

		        $(this).focus();
		    });
		    //CARGA META DESCRIPCION EN SNIPPET PREVIEW GOOGLE
		    $('body').on('keyup', '#meta_description_product_lang', function(e) {
		        if(e.key!='Dead' && e.keyCode!=222) {
		            $('#snippet-editor-meta-description').val($(this).val());
		            $('#snippet_meta').text( $(this).val());
		            $(this).focus();
		        }
		    });
		</script>
		<script>
			(function($) {
				'use strict';
			<?php
				require_once('./core/helps/help.php');

				//TABLA ECOMMERCE LIST
										//$datatable_id,$function_name
				datetable_ecommerce_list('datatable-product-promotions','datatableProductsPromotions');
				//TABLA PRODUCTO STRIPE
								//$datatable_id,$function_name
				datetable_default('datatable-products-stripe','datatableProductStripe');
				//TABLA INFORMACION ADICIONAL
								//$datatable_id,$function_name
				datetable_default('datatable-additional-products-information','datatableAdditionalProductInformation');
				//SCRIPT ANIMACION MODAL
				modalWithZoomAnim();
				/**** TABLA ESPECIFICA ****/
					//MODAL ELIMINAR TABLA ESPECIFICA
											//$form_name
					modalDeleteSpecificTable('modal-delete-specific-table');
					//BORRAR DATOS DEL FORMULARIO ELIMINAR GENERAL AL DAR CLIK AL BOTON CANCELAR DEL MODAL
										//$form_name,$data_name
					deleteDataFromTheForm('modal-delete-specific-table','data-modal-delete-specific-table');
				/**** END TABLA ESPECIFICA ****/
				//SUMMERNOTE
									//$height,$url_carpeta_admin
				summernoteSaveFiles(300,URL_CARPETA_ADMIN);
				//BARRA DE CARGA
				progressBar();
       			//PLUGIN SWITCH
				formIosSwitch(URL_CARPETA_ADMIN);
       			//PLUGIN SWITCH SECCIONES INTERNAS
   							//$url_carpeta_admin
   				formIosSwitchInternalSections(URL_CARPETA_ADMIN,$link,0);
				/**** CAMBIAR IMAGEN ****/
					//MODAL CAMBIAR IMAGEN
									//$form_name
					modalUploadImage('modal-update-image');
					//FORMULARIO CAMBIAR IMAGEN VERSION
									//$title,$url_carpeta_admin,$form_id,$id_tab,$id_table,$id_type_section,$redirect,$lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4
					formUpdateImage($lang_global['Detalle Producto'],URL_CARPETA_ADMIN,'update-image','showFormUploadProduct',$id_product,$id_type_section,1,1,$lang_global['Validacion upload imagen 5'],$lang_global['Validacion upload imagen 2']."JPG, JPEG y PNG.",$lang_global['Validacion campos form'],$lang_global['Validacion upload imagen 3']);
					//BORRAR DATOS DEL FORMULARIO CAMBIAR IMAGEN AL DAR CLIK AL BOTON CANCELAR DEL MODAL
											//$form_name,$data_names
					deleteDataFromTheForm('modal-update-image','data-modal-update-image');
				/**** END CAMBIAR IMAGEN ****/
				/**** ELIMINAR IMAGEN VERSION 3 PARAMETROS ****/
					//MODAL ELIMINAR IMAGEN VERSION 3 PARAMETROS
									//$form_name
					modalDeleteWithImageVersion3Parameters('modal-delete-with-image-version-3-parameters');
					//FORMULARIO ELIMINAR CON IMAGEN VERSION 3 PARAMETROS
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado

									//$title,$url_carpeta_admin,$form_id,$id_table,$status_item,$id_type_section,$link,$redirect
					formDeleteWithImageVersion3Parameters($lang_global['Detalle Producto'],URL_CARPETA_ADMIN,'form#delete-with-image-version-3-parameters',$id_product,1,$id_type_section,$link,0);

					//BORRAR DATOS DEL FORMULARIO ELIMINAR IMAGEN VERSION 3 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
											//$form_name,$data_name
					deleteDataFromTheForm('modal-delete-with-image-version-3-parameters','data-modal-delete-with-image-version-3-parameters');
				/**** END ELIMINAR IMAGEN VERSION 3 PARAMETROS ****/
				/**** PROMOCION ****/
					//FORMULARIO MODIFICAR INFORMACION CON FORMULARIO
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado
		       			//$page_general = $id_type_section
		       				//4 = Mi perfil
		       				//$section
		       					//1 =  Redes sociales
		       				//15 = Productos
		       				//$section
		       					//1 = Stripe
  								//2 = Informacion adicional
  								//3 = Promoción

											//$form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect
					formUpdateSpecificTable('modal-update-product-lang-promotion',$lang_global['Promoción'],1,'item-id_product_lang_promotion-',$id_type_section,3,1,'upd-inf-prduct-lang-prmotion',URL_CARPETA_ADMIN,$link,0,1);
					//FORMULARIO ELIMINAR TABLA ESPECIFICA
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado
		       			//$page_general = $id_type_section
		       				//15 = Productos
		       				//$section
		       					//1 = Stripe
  								//2 = Informacion adicional
  								//3 = Promoción

											//$form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect
					formDeleteSpecificTable('delete-product-promotions',$lang_global['Promoción'],1,'item-id_product_lang_promotion-',$id_type_section,3,3,'d-prduct-prmotion',URL_CARPETA_ADMIN,$link,1,1);
				/**** END PROMOCION ****/
				/**** STRIPE ****/
					//FORMULARIO MODIFICAR INFORMACION CON FORMULARIO
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado
		       			//$page_general = $id_type_section
		       				//4 = Mi perfil
		       				//$section
		       					//1 =  Redes sociales
		       				//15 = Productos
		       				//$section
		       					//1 = Stripe
  								//2 = Informacion adicional
  								//3 = Promoción

											//$form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect
					formUpdateSpecificTable('modal-update-product-stripe',$lang_global['Stripe'],1,'item-id_product_stripe-',$id_type_section,1,1,'upd-inf-prduct-strpe',URL_CARPETA_ADMIN,$link,0,1);
					//FORMULARIO ELIMINAR TABLA ESPECIFICA
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado
		       			//$page_general = $id_type_section
		       				//15 = Productos
		       				//$section
		       					//1 = Stripe
  								//2 = Informacion adicional
  								//3 = Promoción

											//$form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect
					formDeleteSpecificTable('delete-product-stripe',$lang_global['Stripe'],1,'item-id_product_stripe-',$id_type_section,1,3,'d-prduct-strpe',URL_CARPETA_ADMIN,$link,1,1);
					//MODIFICAR ORDEN SECCIONES INTERNAS
	       				//$name_sortable_internal_sections
		       				//Orden general (class)
		       					//.row_position
		       				//Orden de una sección interna (id)
		       					//#sortable-SECCION-INTERNA
		       				//$id_type_section
		       					//4
			       				//$id_sortable_internal_sections
			       					//14 = Gallería usuario
		       				//$id_type_section
		       					//15
			       				//$id_sortable_internal_sections
			       					//1 = Stripe
			       					//2 = Información adicional
			       					//3 = Productos relaciones
			       					//4 = Imagenes de portada y generales
			       					//5 = Promociones
		       				//$type_sortable
		       					//1 = table
		       					//2 = grid

		       								//$id_type_section,$name_sortable_internal_sections,$id_sortable_internal_sections,$url_carpeta_admin,$type_sortable
		       		//sortableInternalSections($id_type_section,"#sortable-products-stripe",1,URL_CARPETA_ADMIN,1);
		       	/**** END STRIPE ****/
				/**** INFORMACION ADICIONAL ****/
					//FORMULARIO MODIFICAR INFORMACION CON FORMULARIO
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado
		       			//$page_general = $id_type_section
		       				//4 = Mi perfil
		       				//$section
		       					//1 =  Redes sociales
		       				//15 = Productos
		       				//$section
		       					//1 = Stripe
  								//2 = Informacion adicional
  								//3 = Promoción

											//$form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect
					modalUpdateSpecificTable('modal-update-specific-table',$lang_global['Detalle Producto'],'item-id_product_lang_additional_information-','upd-inf-prduct-lang-add-inf',URL_CARPETA_ADMIN,$link,1);
					//FORMULARIO ELIMINAR TABLA ESPECIFICA
						//$status_item
		       				//0 = Desactivado
		       				//1 = Activado
		       			//$page_general = $id_type_section
		       				//15 = Productos
		       				//$section
		       					//1 = Stripe
  								//2 = Informacion adicional
  								//3 = Promoción

											//$form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect
					formDeleteSpecificTable('delete-additional-information',$lang_global['Detalle Producto'],1,'item-id_product_lang_additional_information-',$id_type_section,2,3,'d-prduct-lang-add-inf',URL_CARPETA_ADMIN,$link,1,1);
					//MODIFICAR ORDEN SECCIONES INTERNAS
	       				//$name_sortable_internal_sections
		       				//Orden general (class)
		       					//.row_position
		       				//Orden de una sección interna (id)
		       					//#sortable-SECCION-INTERNA
		       				//$id_type_section
		       					//4
			       				//$id_sortable_internal_sections
			       					//14 = Gallería usuario
		       				//$id_type_section
		       					//15
			       				//$id_sortable_internal_sections
			       					//1 = Stripe
			       					//2 = Información adicional
			       					//3 = Productos relaciones
			       					//4 = Imagenes de portada y generales
			       					//5 = Promociones
		       				//$type_sortable
		       					//1 = table
		       					//2 = grid

		       								//$id_type_section,$name_sortable_internal_sections,$id_sortable_internal_sections,$url_carpeta_admin,$type_sortable
		       		sortableInternalSections($id_type_section,"#sortable-additional-products-information",2,URL_CARPETA_ADMIN,1);
				/**** END INFORMACION ADICIONAL ****/
		       	/**** IMAGENES DE PORTADA Y GENERALES ****/
		       		//sortableInternalSections($id_type_section,"#sortable-cover-images-and-general-products",4,URL_CARPETA_ADMIN,2);
				/**** END IMAGENES DE PORTADA Y GENERALES ****/ ?>
				var id_tab 								= 'showFormUploadProduct';
				let par1								= <?php echo $id_product; ?>,
					par2								= <?php echo $id_type_section; ?>,
					par3								= $('#showFormUploadProduct').attr('data-lang'),
					par4								= $('#showFormUploadProduct').attr('data-action'),
					par5								= $('#showFormUploadProduct').attr('data-id-product-lang'),
					par6,par7,cadena,url_dinamic,msg	= "",
					par8,par9,par10 					= 0,
					id_submit1 							= "step-1-product",//Información general
					id_submit2 							= "step-2-product",//Stripe
					id_submit3 							= "step-3-product",//Presentaciones
					id_submit6 							= "step-6-product",//Información adicional
					id_submit7 							= "step-7-product",//Promociones
					$submit1 							= $('#'+id_submit1).find('button[type=submit]'),
					$submit2 							= $('#'+id_submit2).find('button[type=submit]'),
					$submit3 							= $('#'+id_submit3).find('button[type=submit]'),
					$submit6 							= $('#'+id_submit6).find('button[type=submit]'),
					$submit7 							= $('#'+id_submit7).find('button[type=submit]');

				$("#title_product_lang").focus();

				<?php
					validate('update-image');
					validate('update-information-with-2-parameters'); ?>

				//AJUSTES BASICOS
				$('#id_lang_basic_product_settings').on('change', function(){
					$("#form-basic-product-settings").submit();
				});

				//SUBIR PORTADA Y REGISTRAR INFORMACION DEL PRODUCTO
				$('#fileProductCover').on('change', function(){
					$("#title_product_lang,#id_type_of_currency,#id_tax_rule,#urlPreview").removeClass('error');

					par6 = $("#title_product_lang").val();
					if(par6 != ""){

						par8 = $("#id_type_of_currency").val();
						if(par8 > 0){

							par9 = $("#id_tax_rule").val();
							if(par9 > 0){

								par7 = $("#urlTypeProduct").val().trim()+"/"+$("#urlPreview").val().trim(); <?php //REGLA DE URL AMIGABLE ?>

								if(par7 != ""){

									if(par1 > 0 && par2 > 0 && par3 > 0){
										if($("#fileProductCover").val().length < 5){
											new PNotify({
												title: title_pnotify,
												text: "<?php echo $lang_global['Validacion upload imagen 5']; ?>",
												type: 'info',
												before_init: function(PNotify){
													$("#fileProductCover").val('');
												}
											});
										}else{
												var archivo 	= $("#fileProductCover").val();
									    		var extensiones = archivo.substring(archivo.lastIndexOf("."));

												if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png")
												{
												    new PNotify({
														title: title_pnotify,
														text: "<?php echo $lang_global['Validacion upload imagen 2']; ?>JPG, JPEG y PNG.",
														type: 'info',
														before_init: function(PNotify){
															$("#fileProductCover").val('');
														}
													});
												}else{
														var form_data 	= new FormData(document.getElementById(id_submit1));

														form_data.append('par1',par1);
														form_data.append('par2',par2);
														form_data.append('par3',par3);
														form_data.append('par4',par4);
														form_data.append('par5',par5);
														form_data.append('par6',par6);
														form_data.append('par7',par7);
														form_data.append('par8',par8);
														form_data.append('par9',par9);

														$.ajax({
															type: "POST",
															url:  url_admin+"/upl-prduct-cver",
															//TIPO DE ENVIO DE DATOS
																//SERIALIZE()
																	//CUANDO SOLO SE MANDEN DATOS DEL FORM
																//FORMDATA
																	//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
																		//processData: false,
												       	 				//contentType: false,
													        data: form_data,
													        cache: false,
															contentType: false,
															processData:false,
															beforeSend:function(){
															},
															xhr: function(){
																var xhr = $.ajaxSettings.xhr();
																if (xhr.upload)
																{
																	xhr.upload.addEventListener('progress', function(ev)
																	{
																		var percent = 0;
																		var position = ev.loaded || ev.position;
																		var total = ev.total;
																		if (ev.lengthComputable)
																		{
																			percent = Math.ceil(position / total * 100);
																		}
																		showProgressBar(percent,"#"+id_tab);
																	},true);
																}
																return xhr;
															}
														}).done(function(response)
													    {
													    	if(response.estado == "true")
															{
																new PNotify({
																	title: title_pnotify,
																	text: response.resultado,
																	type: 'success',
																	delay: 1000,
																	before_init: function(){
																		$("#"+id_submit1)[0].reset();
																		clearProgressBar("#"+id_tab);

																		if(response.div_ajax == "true" && response.box_media != "")
																		{
																			//$('#box-media-gallery-main-product-cover').append(response.div_ajax);
																		}
																	},
																	before_close: function(PNotify){
																		if(response.redireccionar == "true")
																		{
																			window.location.href = "<?php echo $link; ?>";
																		}
																	}
																});
															}else{
																	if(response.sin_sesion == "true"){
									                                    window.location.href = url_front+"iniciar-sesion";
									                                }else{
									                                		new PNotify({
																				title: title_pnotify,
																				text: response.error,
																				type: 'error',
																				before_init: function(){
																					clearProgressBar("#"+id_tab);
																					$("#fileProductCover").val('');
																			    }
																			});
									                                     }
																 }
													    }).fail(function(){
													    	new PNotify({
																title: title_pnotify,
																text: "<?php echo $lang_global['Problemas al ejecutar consulta']; ?>",
																type: 'error',
																before_init: function(){
																	$("#"+id_submit1)[0].reset();
																	clearProgressBar("#"+id_tab);
																	$("#fileProductCover").val('');
															    }
															});
														});
													 }
											 }
									}else{
											new PNotify({
												title: title_pnotify,
												text: '<?php echo $lang_global['Error en el proceso'].$lang_global["Variables vacías"]; ?>',
												type: 'error',
												before_init: function(){
													$("#fileProductCover").val('');
											    }
											});
										 }
								}else{
										new PNotify({
											title: title_pnotify,
											text: '<?php echo $lang_global["Problemas al generar de forma dinámica la URL amigable"]; ?>',
											type: 'info',
											before_init: function(){
												$("#fileProductCover").val('');
												$("#urlPreview").addClass('error').focus();
										    }
										});
									 }//END par7
							}else{
									new PNotify({
										title: title_pnotify,
										text: '<?php echo $lang_global["Selecciona de la lista la regla de impuestos"]; ?>',
										type: 'info',
										before_init: function(){
											$("#fileProductCover").val('');
											$("#id_tax_rule").addClass('error').focus();
									    }
									});
								 }//END par9
						}else{
								new PNotify({
									title: title_pnotify,
									text: '<?php echo $lang_global["Selecciona de la lista el tipo de moneda"]; ?>',
									type: 'info',
									before_init: function(){
										$("#fileProductCover").val('');
										$("#id_type_of_currency").addClass('error').focus();
								    }
								});
							 }//END par8
					}else{
							new PNotify({
								title: title_pnotify,
								text: '<?php echo $lang_global["Introduce el nombre del producto"]; ?>',
								type: 'info',
								before_init: function(){
									$("#fileProductCover").val('');
									$("#title_product_lang").addClass('error').focus();
							    }
							});
						 }//END par6
				});
				//DEJAR COMO PORTADA PRINCIPAL LA IMAGEN DEL PRODUCTO ir_product_lang_image_lang, OJO, NO ES DE LA TABLA ir_product_lang_presentation_image_lang
				$('.leave-as-main-product').on('click', function() {
				    par8 = $(this).attr("data-main-product");

				    if(par5 > 0 && par8 > 0){
				    	$.ajax({
							type: "POST",
							url:  url_admin+"/lev-as-main-prduct",
							data: {
								par5: par5,
								par8: par8
							},
							cache: false,
							success:function(response)
							{
								if(response.estado == "true")
								{
									new PNotify({
										title: title_pnotify,
										text: response.resultado,
										type: 'success',
										delay: 1000,
										before_init: function(){
										},
										before_close: function(PNotify){
										    window.location.href = "<?php echo $link; ?>";
										}
									});
								}else{
										if(response.sin_sesion == 'true'){
											window.location.href = url_front+'iniciar-sesion';
										}else{
												new PNotify({
													title: title_pnotify,
													text: response.error,
													type: 'error'
												});
											 }
									 }
							},
							error: function(jqXHR)
							{
								//console.log(jqXHR);

								if(jqXHR.status != 200){
									if (jqXHR.status === 0) {
							            msg = "<?php echo $lang_global["No conectar. Verificar Red."]; ?>";
							        } else if (jqXHR.status == 404) {
							            msg = '<?php echo $lang_global["Página solicitada no encontrada. [404]"]; ?>';
							        } else if (jqXHR.status == 500) {
							            msg = '<?php echo $lang_global["Error interno del servidor. [500]"]; ?>';
							        } else {
							            msg = '<?php echo $lang_global["Error no detectado"]; ?> ' + jqXHR.responseText;
							        }
									new PNotify({
										title: title_pnotify,
										text: msg,
										type: 'error'
									});
								}
							}
						});
				    }else{
				    		new PNotify({
								title: title_pnotify,
								text: '<?php echo $lang_global["Problemas al ejecutar consulta"]; ?>',
								type: 'info'
							});
				    	 }
				});
				//REGISTRAR/MODIFICAR INFORMACION DEL PRODUCTO
				$submit1.on('click', function(ev){
					ev.preventDefault();

					$("#title_product_lang,#urlPreview").removeClass('error');

					var	validated_submit1 	= $('#'+id_submit1).valid();

						par6 				= $("#title_product_lang").val();
						par7 				= $("#urlTypeProduct").val().trim()+"/"+$("#urlPreview").val().trim();
						par8 				= urlifyTitle(urlifyTitle($('input:radio[name="id_type_product"]:checked').attr('value')));

					//$id_action
						//1 = Update
				    	//2 = Register
					if(par4 == 1){
						url_dinamic = 'upd-inf-prduct-lang';
					}else{
						url_dinamic = 'new-reg-prduct';
						 }

					if(par6 != ""){ <?php //TITULO ?>
						if(par8 > 0){ <?php /*TIPO DE PRODUCTO*/ ?>
							if(par1 > 0){ <?php //ID PRODUCTO ?>
								if(par7 != ""){ <?php //REGLA DE URL AMIGABLE ?>
									if(url_dinamic != ""){ <?php //URL FORM ?>
										if(validated_submit1){
											var formData = new FormData(document.getElementById(id_submit1));
												formData.append("par1", par1);
												formData.append("par5", par5);
												formData.append("par6", par6);
												formData.append("par7", par7);
												formData.append("par8", par8);

											$.ajax({
												type: "POST",
												url:  url_admin+"/"+url_dinamic,
												//TIPO DE ENVIO DE DATOS
													//SERIALIZE()
														//CUANDO SOLO SE MANDEN DATOS DEL FORM
													//FORMDATA
														//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
															//processData: false,
									       	 				//contentType: false,
												data: formData,
												cache: false,
										        processData: false,
										        contentType: false,
												beforeSend:function(){
													$('#'+id_submit1 + " button[type=submit]").attr("disabled","disabled");
												},
												success:function(response)
												{
													if(response.estado == "true")
													{
														new PNotify({
															title: title_pnotify,
															text: response.resultado,
															type: 'success',
															shadow: true,
															delay: 800,
															before_init: function(){
																$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
															},
															before_close: function(PNotify){
																if(response.redireccionar == "true"){
																	window.location.href = "<?php echo $link; ?>";
																}
														    }
														});
													}else{
															if(response.sin_sesion == 'true'){
																window.location.href = url_front+'iniciar-sesion';
															}else{
																	new PNotify({
																		title: title_pnotify,
																		text: response.error,
																		type: 'error',
																		before_init: function(){
																			$('#'+id_submit1+" button[type=submit]").removeAttr('disabled');
																		}
																	});
																 }
														 }
												},
												error: function(jqXHR)
												{
													//console.log(jqXHR);



													if(jqXHR.status != 200){
														if (jqXHR.status === 0) {
												            msg = "<?php echo $lang_global["No conectar. Verificar Red."]; ?>";
												        } else if (jqXHR.status == 404) {
												            msg = '<?php echo $lang_global["Página solicitada no encontrada. [404]"]; ?>';
												        } else if (jqXHR.status == 500) {
												            msg = '<?php echo $lang_global["Error interno del servidor. [500]"]; ?>';
												        } else {
												            msg = '<?php echo $lang_global["Error no detectado"]; ?> ' + jqXHR.responseText;
												        }
														new PNotify({
															title: title_pnotify,
															text: msg,
															type: 'error',
															before_init: function(){
																$('#'+id_submit1+" button[type=submit]").removeAttr('disabled');
															}
														});
													}
												}
											});
										}
									}else{
											new PNotify({
												title: title_pnotify,
												text: '<?php echo $lang_global["Problemas al generar de forma dinámica la URL form"]; ?>',
												type: 'info'
											});
									 	 }//END url_dinamic
								}else{
										new PNotify({
											title: title_pnotify,
											text: '<?php echo $lang_global["Problemas al generar de forma dinámica la URL amigable"]; ?>',
											type: 'info',
											before_init: function(){
												$("#urlPreview").addClass('error').focus();
										    }
										});
								 	 }//END par7
							}else{
									new PNotify({
										title: title_pnotify,
										text: '<?php echo $lang_global['Error en el proceso'].$lang_global["Variables vacías"]; ?>',
										type: 'info'
									});
								 }//END par1
						}else{
								new PNotify({
									title: title_pnotify,
									text: '<?php echo $lang_global["Introduce el tipo de producto"]; ?>',
									type: 'info',
									before_init: function(){
										$("#id_type_product_1").addClass('error').focus();
								    }
								});
							 }//END par8
					}else{
						new PNotify({
							title: title_pnotify,
							text: '<?php echo $lang_global["Introduce el nombre del producto"]; ?>',
							type: 'info',
							before_init: function(){
								$("#title_product_lang").addClass('error').focus();
						    }
						});
				 	 }//END par6
				});
				//REGISTRAR/ELIMINAR LAS CATEGORIAS EN EL PRODUCTO
				$('.id_category').on('change', function() {
					//OBTENER PARAMETROS
				    par6 	= $('label#child_category_'+ $(this).attr('value')).attr('data-parent');
				    par8 	= $(this).val();

				    if($(this).is(':checked')){
				    	par9 = 1;//REGISTRAR
				    }else{
				    	par9 = 2;//ELIMINAR
				    	 }

				   	//NO ES NECESARIO VALIDAR par6 YA QUE PUEDE TENER VALOR 0
				    if(par1 > 0 && par8 > 0 && par9 > 0){
				    	$.ajax({
							type: "POST",
							url:  url_admin+"/asso-ctegry-to-prduct",
							data: {
								par1: par1,
								par6: par6,
								par8: par8,
								par9: par9
							},
							cache: false,
							success:function(response)
							{
								if(response.estado == "true")
								{
									new PNotify({
										title: title_pnotify,
										text: response.resultado,
										type: 'success',
										delay: 1000,
										before_init: function()
										{
											//DETERMINAR SI SE USA EVENTO JS
											if(response.evento == 1){
												if(par9 == 1){
													//ACTIVAR CASILLA
													$('#parent_category_'+par6).attr("checked",true);
												}else{
													//DESACTIVAR CASILLA
													$('#parent_category_'+par6).attr("checked",false);
													 }
											}
										}
									});
								}else{
										if(response.sin_sesion == 'true'){
											window.location.href = url_front+'iniciar-sesion';
										}else{
												new PNotify({
													title: title_pnotify,
													text: response.error,
													type: 'error'
												});
											 }
									 }
							},
							error: function(jqXHR)
							{
								//console.log(jqXHR);



								if(jqXHR.status != 200){
									if (jqXHR.status === 0) {
							            msg = "<?php echo $lang_global["No conectar. Verificar Red."]; ?>";
							        } else if (jqXHR.status == 404) {
							            msg = '<?php echo $lang_global["Página solicitada no encontrada. [404]"]; ?>';
							        } else if (jqXHR.status == 500) {
							            msg = '<?php echo $lang_global["Error interno del servidor. [500]"]; ?>';
							        } else {
							            msg = '<?php echo $lang_global["Error no detectado"]; ?> ' + jqXHR.responseText;
							        }
									new PNotify({
										title: title_pnotify,
										text: msg,
										type: 'error'
									});
								}
							}
						});
				    }else{
				    		new PNotify({
								title: title_pnotify,
								text: '<?php echo $lang_global["Selecciona una categoría"]; ?>',
								type: 'info'
							});
				    	 }
				});
				//REGISTRAR INFORMACION ADICIONAL
				$submit6.on('click', function(ev){
					ev.preventDefault();

					var validated_submit6 = $('#'+id_submit6).valid();
					if(validated_submit6 && par5 > 0){

						var formData = new FormData(document.getElementById(id_submit6));
							formData.append("par5", par5);

						$.ajax({
							type: "POST",
							url:  "<?php echo URL_CARPETA_ADMIN ?>/new-reg-add-inf",
							//TIPO DE ENVIO DE DATOS
								//SERIALIZE()
									//CUANDO SOLO SE MANDEN DATOS DEL FORM
								//FORMDATA
									//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
										//processData: false,
										//contentType: false,
							data : formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend:function(){
								$('#'+id_submit6 + " button[type=submit]").attr("disabled","disabled");
								//$('#'+id_submit6)[0].reset();
							},
							success:function(response)
							{
								if(response.estado == "true")
								{
									new PNotify({
										title: title_pnotify,
										text: response.resultado,
										type: 'success',
										delay: 1500,
										before_init: function(){
											window.location.href = "<?php echo $link; ?>";
										}
									});
								}else{
										new PNotify({
											title: title_pnotify,
											text: response.error,
											type: 'error',
											before_init: function(){
												$('#'+id_submit6 + " button[type=submit]").removeAttr('disabled');
											}
										});
										}
							},
							error: function(response)
							{
								new PNotify({
									title: title_pnotify,
									text: response,
									type: 'error',
									before_init: function(){
										$('#'+id_submit6 + " button[type=submit]").removeAttr('disabled');
									}
								});
							}
						});
					}
				});
				//PROMOCION DEL PRODUCTO
				let general_price_promotion = $('#general_price_promotion').text(),
					id_product_lang_promotion,id_type_promotion,price_discount_product_lang_promotion,discount_rate_product_lang_promotion,paso1,paso2,paso3 = 0;

				//OBTENER EL TIPO DE DESCUENTO DEL PRODUCTO
				$('.id_type_promotion').on('change', function() {
					id_product_lang_promotion 				= $(this).attr('data-id');
					discount_rate_product_lang_promotion 	= $('#discount_rate_product_lang_promotion_'+id_product_lang_promotion);
					price_discount_product_lang_promotion 	= $('#price_discount_product_lang_promotion_'+id_product_lang_promotion);

					if($(this).val() == 1){//IMPORTE
						//BLOQUEAR INPUT PORCENTAJE
						discount_rate_product_lang_promotion.attr({
							//disabled: true,
							readonly: true,
							required: false
						});
						discount_rate_product_lang_promotion.css({
						    "border-color": "#ced4da",
						    "background-color": "#e9ecef"
						});
						//DESBLOQUEAR INPUT IMPORTE
						price_discount_product_lang_promotion.attr({
							//disabled: false,
							readonly: false,
							required: true
						});
						price_discount_product_lang_promotion.css({
						    "border-color": "#d2322d",
						    "background-color": "#ffffff"
						});

						//VALIDAR SI HAY UN IMPORTE ACTIVO
						if(price_discount_product_lang_promotion.val() != ""){
											//general_price,price_discount,discount_rate
							calculateAmount(general_price_promotion,price_discount_product_lang_promotion.val(),discount_rate_product_lang_promotion);
						}
					}else{//PORCENTAJE
							//BLOQUEAR INPUT IMPORTE
							price_discount_product_lang_promotion.attr({
								//disabled: true,
								readonly: true,
								required: false
							});
							price_discount_product_lang_promotion.css({
							    "border-color": "#ced4da",
							    "background-color": "#e9ecef"
							});
							//DESBLOQUEAR INPUT PORCENTAJE
							discount_rate_product_lang_promotion.attr({
								//disabled: false,
								readonly: false,
								required: true
							});
							discount_rate_product_lang_promotion.css({
							    "border-color": "#d2322d",
							    "background-color": "#ffffff"
							});

							//VALIDAR SI HAY UN PORCENTAJE ACTIVO
							if(discount_rate_product_lang_promotion.val() != ""){
													//general_price,discount_rate,price_discount
								calculatePercentage(general_price_promotion,discount_rate_product_lang_promotion.val(),price_discount_product_lang_promotion);
							}
						 }
				});
				//CALCULAR PORCENTAJE SEGUN EL IMPORTE (SOLO SI ESTA SELECCIONADO EN TIPO DE DESCUENTO)
				$(".price_discount_product_lang_promotion").on("keyup", function(e) {
					id_product_lang_promotion 				= $(this).attr('data-id');
					discount_rate_product_lang_promotion 	= $('#discount_rate_product_lang_promotion_'+id_product_lang_promotion);
					price_discount_product_lang_promotion 	= $('#price_discount_product_lang_promotion_'+id_product_lang_promotion);

					if($(".id_type_promotion :selected").val() == 1){//IMPORTE
						if(e.key!='Dead' && e.keyCode!=222) {
							//DESBLOQUEAR INPUT PORCENTAJE
							/*discount_rate_product_lang_promotion.attr({
								//disabled: false,
								readonly: false,
								required: true
							});*/
											//general_price,price_discount,discount_rate
							calculateAmount(general_price_promotion,price_discount_product_lang_promotion.val(),discount_rate_product_lang_promotion);
						}
					}
			    });
			    //CALCULAR IMPORTE SEGUN EL PORCENTAJE (SOLO SI ESTA SELECCIONADO EN TIPO DE DESCUENTO)
				$(".discount_rate_product_lang_promotion").on("keyup", function(e) {
					id_product_lang_promotion 				= $(this).attr('data-id');
					discount_rate_product_lang_promotion 	= $('#discount_rate_product_lang_promotion_'+id_product_lang_promotion);
					price_discount_product_lang_promotion 	= $('#price_discount_product_lang_promotion_'+id_product_lang_promotion);

					if($(".id_type_promotion :selected").val() == 2){//PORCENTAJE
						if(e.key!='Dead' && e.keyCode!=222) {
							//DESBLOQUEAR INPUT IMPORTE
							/*price_discount_product_lang_promotion.attr({
								//disabled: false,
								readonly: false,
								required: true
							});*/

												//general_price,discount_rate,price_discount
							calculatePercentage(general_price_promotion,discount_rate_product_lang_promotion.val(),price_discount_product_lang_promotion);
						}
					}
			    });
				//REGISTRAR PROMOCION DEL PRODUCTO
				$submit7.on('click', function(ev){
					ev.preventDefault();

					var validated_submit7 	= $('#'+id_submit7).valid();
						par6 				= $("#title_product_lang").val();

					if(par6 != ""){ <?php //TITULO ?>
						if(validated_submit7){

							var formData = new FormData(document.getElementById(id_submit7));
								formData.append("par1", par1);
								formData.append("par5", par5);
								formData.append("par6", par6);

							$.ajax({
								type: "POST",
								url:  url_admin+"/new-reg-prduct-prmotion",
								//TIPO DE ENVIO DE DATOS
									//SERIALIZE()
										//CUANDO SOLO SE MANDEN DATOS DEL FORM
									//FORMDATA
										//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
											//processData: false,
					       	 				//contentType: false,
								data: formData,
								cache: false,
						        processData: false,
						        contentType: false,
								beforeSend:function(){
									$('#'+id_submit7 + " button[type=submit]").attr("disabled","disabled");
								},
								success:function(response)
								{
									if(response.estado == "true")
									{
										new PNotify({
											title: title_pnotify,
											text: response.resultado,
											type: 'success',
											delay: 1500,
											before_init: function(){
											},
											before_close: function(PNotify){
											    window.location.href = "<?php echo $link; ?>";
											}
										});
									}else{
											if(response.sin_sesion == 'true'){
												window.location.href = url_front+'iniciar-sesion';
											}else{
													new PNotify({
														title: title_pnotify,
														text: response.error,
														type: 'error',
														before_init: function(){
															$('#'+id_submit7+" button[type=submit]").removeAttr('disabled');
														}
													});
												 }
										 }
								},
								error: function(jqXHR)
								{
									//console.log(jqXHR);



									if(jqXHR.status != 200){
										if (jqXHR.status === 0) {
								            msg = "<?php echo $lang_global["No conectar. Verificar Red."]; ?>";
								        } else if (jqXHR.status == 404) {
								            msg = '<?php echo $lang_global["Página solicitada no encontrada. [404]"]; ?>';
								        } else if (jqXHR.status == 500) {
								            msg = '<?php echo $lang_global["Error interno del servidor. [500]"]; ?>';
								        } else {
								            msg = '<?php echo $lang_global["Error no detectado"]; ?> ' + jqXHR.responseText;
								        }
										new PNotify({
											title: title_pnotify,
											text: msg,
											type: 'error',
											before_init: function(){
												$('#'+id_submit1+" button[type=submit]").removeAttr('disabled');
											}
										});
									}
								}
							});
						}
					}else{
							new PNotify({
								title: title_pnotify,
								text: '<?php echo $lang_global["Introduce el nombre del producto"]; ?>',
								type: 'info',
								before_init: function(){
									$("#title_product_lang").addClass('error').focus();
							    }
							});
					 	 }//END par6
				});
				//STRIPE
					//REGISTRAR STRIPE
				$submit2.on('click', function(ev){
					ev.preventDefault();

					var validated_submit2 = $('#'+id_submit2).valid();

					if(validated_submit2){

						var formData = new FormData(document.getElementById(id_submit2));
							formData.append("par1", par1);

						$.ajax({
							type: "POST",
							url:  url_admin+"/new-reg-strpe",
							//TIPO DE ENVIO DE DATOS
								//SERIALIZE()
									//CUANDO SOLO SE MANDEN DATOS DEL FORM
								//FORMDATA
									//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
										//processData: false,
				       	 				//contentType: false,
							data: formData,
							cache: false,
					        processData: false,
					        contentType: false,
							beforeSend:function(){
								$('#'+id_submit2 + " button[type=submit]").attr("disabled","disabled");
							},
							success:function(response)
							{
								if(response.estado == "true")
								{
									new PNotify({
										title: title_pnotify,
										text: response.resultado,
										type: 'success',
										shadow: true,
										delay: 800,
										before_init: function(){
											//LIMPIAR FORMULARIO
				            				$("#step-2-product")[0].reset();
											//HABILITO BTN ENVIAR
											$('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
										},
										before_close: function(PNotify){
										    window.location.href = "<?php echo $link; ?>";
										}
									});
								}else{
										if(response.sin_sesion == 'true'){
											window.location.href = url_front+'iniciar-sesion';
										}else{
												new PNotify({
													title: title_pnotify,
													text: response.error,
													type: 'error',
													before_init: function(){
														$('#'+id_submit7+" button[type=submit]").removeAttr('disabled');
													}
												});
											 }
									 }
							},
							error: function(jqXHR)
							{
								//console.log(jqXHR);



								if(jqXHR.status != 200){
									if (jqXHR.status === 0) {
							            msg = "<?php echo $lang_global["No conectar. Verificar Red."]; ?>";
							        } else if (jqXHR.status == 404) {
							            msg = '<?php echo $lang_global["Página solicitada no encontrada. [404]"]; ?>';
							        } else if (jqXHR.status == 500) {
							            msg = '<?php echo $lang_global["Error interno del servidor. [500]"]; ?>';
							        } else {
							            msg = '<?php echo $lang_global["Error no detectado"]; ?> ' + jqXHR.responseText;
							        }
									new PNotify({
										title: title_pnotify,
										text: msg,
										type: 'error',
										before_init: function(){
											$('#'+id_submit1+" button[type=submit]").removeAttr('disabled');
										}
									});
								}
							}
						});
					}
				});
				//PRESENTACIONES
					//SUBIR PRESENTACION DEL PRODUCTO
				$submit3.on('click', function(ev){
					ev.preventDefault();
					var validated_submit3 = $('#'+id_submit3).valid();
					if(validated_submit3){
						if(par1 > 0 && par2 > 0 && par3 > 0 && par5 > 0){
							if($("#fileInputProductPresentationImage").val().length < 5){
								new PNotify({
									title: title_pnotify,
									text: "<?php echo $lang_global['Validacion upload imagen 5']; ?>",
									type: 'info',
								});
							}else{
									var archivo 	= $("#fileInputProductPresentationImage").val();
									var extensiones = archivo.substring(archivo.lastIndexOf("."));

									if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png")
									{
										new PNotify({
											title: title_pnotify,
											text: "<?php echo $lang_global['Validacion upload imagen 2']; ?>JPG, JPEG y PNG.",
											type: 'info',
										});
									}else{
											var form_data 	= new FormData(document.getElementById(id_submit3));

											form_data.append('par1',par1);
											form_data.append('par2',par2);
											form_data.append('par3',par3);
											form_data.append('par5',par5);

											$.ajax({
												type: "POST",
												url:  url_admin+"/upl-prsentation-of-the-prduct",
												//TIPO DE ENVIO DE DATOS
													//SERIALIZE()
														//CUANDO SOLO SE MANDEN DATOS DEL FORM
													//FORMDATA
														//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
															//processData: false,
															//contentType: false,
												data: form_data,
												cache: false,
												contentType: false,
												processData:false,
												beforeSend:function(){
												},
												xhr: function(){
													var xhr = $.ajaxSettings.xhr();
													if (xhr.upload)
													{
														xhr.upload.addEventListener('progress', function(ev)
														{
															var percent = 0;
															var position = ev.loaded || ev.position;
															var total = ev.total;
															if (ev.lengthComputable)
															{
																percent = Math.ceil(position / total * 100);
															}
															showProgressBar(percent,"#"+id_tab);
														},true);
													}
													return xhr;
												}
											}).done(function(response)
											{
												if(response.estado == "true")
												{
													new PNotify({
														title: title_pnotify,
														text: response.resultado,
														type: 'success',
														delay: 1500,
														before_init: function(){
															$("#"+id_submit3)[0].reset();
															clearProgressBar("#"+id_tab);
														},
														before_close: function(PNotify){
															window.location.href = "<?php echo $link; ?>";
														}
													});
												}else{//ERROR
														new PNotify({
															title: title_pnotify,
															text: response.error,
															type: 'error',
															before_init: function(){
																clearProgressBar("#"+id_tab);
															}
														});
														}
											}).fail(function(){
												new PNotify({
													title: title_pnotify,
													text: "<?php echo $lang_global['Problemas al ejecutar consulta']; ?>",
													type: 'error',
													before_init: function(){
														$("#"+id_submit3)[0].reset();
														clearProgressBar("#"+id_tab);
													}
												});
											});
											}
									}
						}else{
								new PNotify({
									title: title_pnotify,
									text: '<?php echo $lang_global['Error en el proceso'].$lang_global["Variables vacías"]; ?>',
									type: 'error'
								});
							 }
					}
				});
				//DEJAR COMO PORTADA PRINCIPAL LA PRESENTACION DEL PRODUCTO
				$('.leave-as-main-presentation-product').on('click', function() {
					par8 	= $(this).attr("data-main-presentation-product");

					if(par8 > 0){
						$.ajax({
							type: "POST",
							url:  url_admin+"/lev-as-main-prsentation-prduct",
							data: {
								par8: par8
							},
							cache: false,
							success:function(response)
							{
								if(response.estado == "true")
								{
									new PNotify({
										title: title_pnotify,
										text: response.resultado,
										type: 'success',
										delay: 1000,
										before_init: function(){
										},
										before_close: function(PNotify){
										    window.location.href = "<?php echo $link; ?>";
										}
									});
								}else{
										if(response.sin_sesion == 'true'){
											window.location.href = url_front+'iniciar-sesion';
										}else{
												new PNotify({
													title: title_pnotify,
													text: response.error,
													type: 'error'
												});
											 }
									 }
							},
							error: function(jqXHR)
							{
								//console.log(jqXHR);

								if(jqXHR.status != 200){
									if (jqXHR.status === 0) {
							            msg = "<?php echo $lang_global["No conectar. Verificar Red."]; ?>";
							        } else if (jqXHR.status == 404) {
							            msg = '<?php echo $lang_global["Página solicitada no encontrada. [404]"]; ?>';
							        } else if (jqXHR.status == 500) {
							            msg = '<?php echo $lang_global["Error interno del servidor. [500]"]; ?>';
							        } else {
							            msg = '<?php echo $lang_global["Error no detectado"]; ?> ' + jqXHR.responseText;
							        }
									new PNotify({
										title: title_pnotify,
										text: msg,
										type: 'error'
									});
								}
							}
						});
					}else{
							new PNotify({
								title: title_pnotify,
								text: '<?php echo $lang_global["Problemas al ejecutar consulta"]; ?>',
								type: 'info',
							});
							}
				});
			}).apply(this, [jQuery]);
		</script>
	</body>
</html>