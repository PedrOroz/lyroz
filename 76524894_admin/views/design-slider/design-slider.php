<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$ruta 		= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/design-slider";
	$title 				= $lang_global["Sliders"];
	$page 				= $lang_global["Diseño"];
	$id_type_section 	= 6;
	$id_page 			= $id_type_section;

	require_once('./templates/head.php');
	require_once('./core/controllers/functions/slidersController.php'); ?>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/css/dataTables.bootstrap5.css" />

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

			<?php require_once("./modals/modal-delete-with-image-5-parameters.php"); ?>

			<!-- start: top-header -->
			<?php require_once('./templates/top-header.php'); ?>
			<!-- end: top-header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php require_once('./templates/header.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header">
						<h2><?php echo $title; ?></h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo URL_CARPETA_ADMIN; ?>/main">
										<span><?php echo $lang_global["Panel de control"]; ?></span>
									</a>
								</li>
								<li><span><?php echo $page; ?></span></li>
								<li><span><?php echo $title; ?></span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col">
							<section class="card card-modern card-big-info">
								<div class="card-body">
									<div class="tabs-modern row" style="min-height: 490px;">
										<div class="col-lg-2-5 col-xl-1-5 bg-gris">
											<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
									      		<a class="nav-link active" id="uploadSlider-tab" data-bs-toggle="pill" data-bs-target="#uploadSlider" href="#uploadSlider" role="tab" aria-controls="uploadSlider" aria-selected="true"><?php echo $lang_global["Subir imagen"]; ?>
									      		</a>
									      		<a class="nav-link" id="registeredSliders-tab" data-bs-toggle="pill" data-bs-target="#registeredSliders" href="#registeredSliders" role="tab" aria-controls="registeredSliders" aria-selected="false"><?php echo $lang_global["Sliders registrados"]; ?>
									      		</a>
									    	</div>
										</div>
										<div class="col-lg-3-5 col-xl-4-5">
											<div class="tab-content" id="tabContent">
									      		<div class="tab-pane fade show active" id="uploadSlider" role="tabpanel" aria-labelledby="uploadSlider-tab">
									      			<?php slidersController::showFormUploadSlider(); ?>
									      		</div>
									      		<div class="tab-pane fade" id="registeredSliders" role="tabpanel" aria-labelledby="registeredSliders-tab">
									      			<?php slidersController::showRegisteredSliders($id_type_section); ?>
									      		</div>
									    	</div>
										</div>
									</div>
								</div>
							</section>
						</div>
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
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/common/common.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/js/select2.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/ios7-switch/ios7-switch.js"></script>

		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>

		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
		<script>
			(function($) {
				'use strict';
			<?php
				require_once('./core/helps/help.php');
				//DATETABLE DEFAULT
									//$datatable_id,$function_name
				datetable_default('datatable-sliders','datatableSliders');
				//SCRIPT ANIMACION MODAL
				modalWithZoomAnim();
				//SCRIPT POP UP IMAGE
				imagePopupNoMargins();
				//BARRA DE CARGA
       			progressBar();
       			//SUMMERNOTE
									//$height,$url_carpeta_admin
				summernoteSaveFiles(300,URL_CARPETA_ADMIN);
       			//PLUGIN SWITCH
       						//$url_carpeta_admin
       			formIosSwitch(URL_CARPETA_ADMIN);
       			//MODIFICAR ORDEN
       					//$id_type_section,$url_carpeta_admin
       			sortable($id_type_section,URL_CARPETA_ADMIN);
       			/**** ELIMINAR CON IMAGEN 5 PARAMETROS ****/
					//MODAL ELIMINAR CON IMAGEN 5 PARAMETROS
													//$form_name
					modalDeleteWithImage5Parameters('modal-delete-with-image-5-parameters');
					//FORMULARIO ELIMINAR CON IMAGEN 5 PARAMETROS
													//$title,$url_carpeta_admin,$pagina,$form_id,$redirect,$id_type_section
					formDeleteWithImage5Parameters($lang_global['Sliders'],URL_CARPETA_ADMIN,$link,'form#delete-with-image-5-parameters',0,$id_type_section);
					//BORRAR DATOS DEL FORMULARIO ELIMINAR CON IMAGEN 5 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
										//$form_name,$data_name
					deleteDataFromTheForm('modal-delete-with-image-5-parameters','data-modal-delete-with-image-5-parameters');
				/**** END ELIMINAR CON IMAGEN 5 PARAMETROS ****/ ?>
				let par1		= <?php echo $id_type_section; ?>,
					id_tab 		= 'uploadSlider',
					id_submit1 	= "registerSlider",
					$submit1 	= $('#'+id_submit1).find('button[type=submit]');

				$("#title_image_lang").focus();

				//REGISTRAR SLIDER
				$submit1.on('click', function(ev){
					ev.preventDefault();
					var validated_submit1 = $('#'+id_submit1).valid();
					if(validated_submit1){
						if($("#fileInput").val().length < 5)
						{
							new PNotify({
								title: title_pnotify,
								text: "<?php echo $lang_global['Validacion upload imagen 5']; ?>"
							});
						}else{
								var archivo 	= $("#fileInput").val();
					    		var extensiones = archivo.substring(archivo.lastIndexOf("."));

								if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png")
								{
								    new PNotify({
										title: title_pnotify,
										text: "<?php echo $lang_global['Validacion upload imagen 2']; ?>JPG, JPEG y PNG.",
										type: 'info'
									});
								}else{
										var formData 	= new FormData(document.getElementById(id_submit1));

										formData.append('par1',par1);

										$.ajax({
											type: "POST",
											url:  url_admin+"/upl-slder",
											//TIPO DE ENVIO DE DATOS
												//SERIALIZE()
													//CUANDO SOLO SE MANDEN DATOS DEL FORM
												//FORMDATA
													//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
														//processData: false,
								       	 				//contentType: false,
									        data: formData,
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
															    }
															});
					                                     }
												 }
									    }).fail(function()
									    {
									    	new PNotify({
												title: title_pnotify,
												text: "<?php echo $lang_global['Validacion upload imagen 3']; ?>",
												type: 'error',
												before_init: function(){
													$("#"+id_submit1)[0].reset();
													clearProgressBar("#"+id_tab);
											    }
											});
										});
									 }
							 }
					}
				});
			}).apply(this, [jQuery]);
		</script>
	</body>
</html>