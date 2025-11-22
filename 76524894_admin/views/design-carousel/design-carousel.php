<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$ruta 	= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/design-carousel";
	$title 				= $lang_global["Carrusel"];
	$page 				= $lang_global["Diseño"];
	$id_type_section 	= 21;
	$id_page 			= $id_type_section;
	$id_lang_selected 	= 1;

	require_once('./templates/head.php');
	require_once('./core/controllers/functions/carouselsController.php'); ?>

		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/dropzone/basic.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/dropzone/dropzone.css" />

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

				<?php require_once("./modals/modal-update-image.php"); ?>

				<?php require_once("./modals/modal-delete-with-image-5-parameters.php"); ?>

				<!-- start: top-header -->
				<?php require_once('./templates/top-header.php'); ?>
				<!-- end: top-header -->

				<div class="inner-wrapper">
					<!-- start: sidebar -->
					<?php require_once('./templates/header.php'); ?>
					<!-- end: sidebar -->

					<section role="main" class="content-body">
						<header class="page-header">
							<h2><?php echo $title; ?></h2>

							<div class="right-wrapper text-right">
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

						<?php
							if(isset($_POST['id_lang_selected']) && !empty($_POST['id_lang_selected'])){
								$id_lang_selected = intval(trim($_POST['id_lang_selected']));
							} ?>
						<!-- start: page -->
						<div id="card-main" class="row justify-content-between position-relative zi-1">
							<div class="col-12 col-sm-auto mb-3 mb-sm-0">
								<section class="card card-featured-left card-featured-tertiary">
									<div class="card-body cursor-pointer" onClick="document.location='<?php echo URL_CARPETA_ADMIN; ?>/design-carousel'">
										<div class="widget-summary widget-summary-xs">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-tertiary">
													<i class="fas fa-arrow-alt-circle-left"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title fs-6"><?php echo $lang_global["Regresar al carrusel"]; ?></h4>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<!--<div class="col-sm-6 col-lg-5 col-xl-4 col-xxl-3">
								<section class="card card-featured-left card-featured-tertiary">
									<div class="card-body">
										<div class="widget-summary widget-summary-xs">
											<form id="form-basic-slider-settings" class="bg-white" method="post" action="">
												<label class="f-medium c-negro" for="id_lang_selected"><?php echo $lang_global["Idioma"]; ?></label>
												<select data-plugin-selectTwo id="id_lang_selected" class="form-control populate" name="id_lang_selected" required="">
						  							<?php //langController::showListOfLanguagesWithWelectedLanguage($id_lang_selected); ?>
										  		</select>
											</form>
										</div>
									</div>
								</section>
							</div>-->
						</div>
						<div id="showFormCarrousel" class="row">
							<div class="col">
								<div class="box-progress">
									<div class="progress light m-2">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>

								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="tabs-modern row" style="min-height: 490px;">
											<div class="col-lg-2-5 col-xl-1-5 bg-gris">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="createCarousel-tab" data-bs-toggle="pill" data-bs-target="#createCarousel" href="#createCarousel" role="tab" aria-controls="createCarousel" aria-selected="true"><?php echo $lang_global["Crear carrusel"]; ?>
										      		</a>
										      		<a class="nav-link" id="showPictures-tab" data-bs-toggle="pill" data-bs-target="#showPictures" href="#showPictures" role="tab" aria-controls="showPictures" aria-selected="false"><?php echo $lang_global["Imágenes"]; ?>
										      		</a>
										    	</div>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="tab-content" id="tabContent">
										      		<div class="tab-pane fade show active" id="createCarousel" role="tabpanel" aria-labelledby="createCarousel-tab">
										      			<?php carouselsController::showFormUploadCarousel(); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showPictures" role="tabpanel" aria-labelledby="showPictures-tab">
										      			<?php carouselsController::showCarouselImages($id_type_section,$id_lang_selected); ?>
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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/dropzone/dropzone.js"></script>

			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>

			<!-- Theme Base, Components and Settings -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

			<!-- Theme Custom -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

			<!-- Theme Initialization Files -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
			<!-- Examples -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/examples/examples.mediagallery.js"></script>
			<script>
				(function($) {
					'use strict';
				<?php
					require_once('./core/helps/help.php');
					//SCRIPT ANIMACION MODAL
					modalWithZoomAnim();
					//SCRIPT POP UP IMAGE
					imagePopupNoMargins();
					//PROGRESSBAR
					progressBar();
					/**** CAMBIAR IMAGEN ****/
						//MODAL CAMBIAR IMAGEN
						modalUploadImage('modal-update-image');//$form_name
						//FORMULARIO CAMBIAR IMAGEN VERSION
										//$title,$url_carpeta_admin,$form_id,$id_tab,$id_table,$id_type_section,$redirect,$lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4
						formUpdateImage($lang_global['Carrusel'],URL_CARPETA_ADMIN,'update-image','showFormCarrousel',0,$id_type_section,1,0,$lang_global['Validacion upload imagen 5'],$lang_global['Validacion upload imagen 2']."JPG, JPEG y PNG.",$lang_global['Validacion campos form'],$lang_global['Validacion upload imagen 3']);
						//BORRAR DATOS DEL FORMULARIO CAMBIAR IMAGEN AL DAR CLIK AL BOTON CANCELAR DEL MODAL
											//$form_name,$data_name
						deleteDataFromTheForm('modal-update-image','data-modal-update-image');
					/**** END CAMBIAR IMAGEN ****/
					/**** ELIMINAR CON IMAGEN 5 PARAMETROS ****/
						//MODAL ELIMINAR CON IMAGEN 5 PARAMETROS
													//$form_name
						modalDeleteWithImage5Parameters('modal-delete-with-image-5-parameters');
						//FORMULARIO ELIMINAR CON IMAGEN 5 PARAMETROS
														//$title,$url_carpeta_admin,$pagina,$form_id,$redirect,$id_type_section
						formDeleteWithImage5Parameters($lang_global['Carrusel'],URL_CARPETA_ADMIN,$link,'form#delete-with-image-5-parameters',0,$id_type_section);
						//BORRAR DATOS DEL FORMULARIO ELIMINAR IMAGEN VERSION 3 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
											//$form_name,$data_name
						deleteDataFromTheForm('modal-delete-with-image-5-parameters','data-modal-delete-with-image-5-parameters');
					/**** END ELIMINAR CON IMAGEN 5 PARAMETROS ****/
					validate('#update-image'); ?>
					//FORMULARIO SUBIR IMAGENES DE FORMA MASIVA
					Dropzone.options.dropzoneCarousel = {
						paramName: 			"file",
						maxFiles: 			6,
						maxFilesize: 		2,//MB
	     				acceptedFiles: 		".jpeg,.jpg,.png", // Allowed extensions
	     				init: function () {
					        var totalFilesJavascript 	= 0,
					        	totalFilesBD 			= 0,
					            completeFiles 			= 0,
					            imgTxt 					= " imagen",
					            addTxt 					= " agregada";

					        this.on("addedfile", file => {
					        	totalFilesJavascript 		+= 1;
						      	console.log("A file has been added javascript");
						    });
					        this.on("removed file", file => {
					            totalFilesJavascript 		-= 1;
					            console.log('Removed file ' + totalFilesJavascript);
					        });
					        this.on("success", function(files,response) {
					        	if(response != ''){
						        	var jsonObj = JSON.parse(response);

						            switch (jsonObj.status) {
						            	case 1://ERROR
										    new PNotify({
												title: title_pnotify,
												text: jsonObj.msg,
												type: 'error'
											});
									    break;
									  	case 2://CORRECTO
									  		totalFilesBD 		+= 1;
										    console.log('<?php echo $lang_global["Imagen agregada"]; ?>');
									    break;
									  	default:
									  		window.location.href = url_front+"iniciar-sesion";
									}
								}
					        });
					        this.on("complete", function (file) {
					        	completeFiles 	+= 1;

					        	console.log('totalFilesJavascript ' + totalFilesJavascript);
					        	console.log('completeFiles ' + completeFiles);

					            if (completeFiles === totalFilesJavascript) {

					            	if(totalFilesJavascript > 1){
					            		imgTxt += 'es';
					            		addTxt += 's';
					            	}

					            	new PNotify({
										title: title_pnotify,
										text: '('+totalFilesBD+')' + imgTxt + addTxt,
										type: 'success',
										delay: 800,
										before_close: function(PNotify){
											window.location.href = '<?php echo $link ?>';
										}
									});
					            }
					        });
					    }
					}
					//IDIOMA GENERAL
   					/*$('#id_lang_selected').on('change', function(){
   						$("#form-carousel-images").submit();
					});*/
				}).apply(this, [jQuery]);
			</script>
		</body>
	</html>