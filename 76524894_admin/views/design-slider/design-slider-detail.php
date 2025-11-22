<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}else{
			if(isset($_GET['id_image']) || !empty($_GET['id_image']))
			{
				$id_image 	= intval(trim($_GET['id_image']));
			}else{
					echo('<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'/design-slider"</script>;');
				 }
		 }
	$ruta 		= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/design-slider-detail/".$id_image;
	$title 				= $lang_global["Detalle Slider"];
	$page 				= $lang_global["Diseño"];
	$id_type_section 	= 6;
	$id_page 			= $id_type_section;
	$id_lang_selected 	= 1;

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

				<?php require_once("./modals/modal-upload-image-version.php"); ?>

				<?php require_once("./modals/modal-update-image.php"); ?>

				<?php require_once("./modals/modal-delete-with-image-version-3-parameters.php"); ?>

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

						<?php
							if(isset($_POST['id_lang_selected']) && !empty($_POST['id_lang_selected'])){
								$id_lang_selected = intval(trim($_POST['id_lang_selected']));
							} ?>
						<!-- start: page -->
						<div id="card-main" class="row justify-content-between position-relative zi-1">
							<div class="col-12 col-sm-auto mb-3 mb-sm-0">
								<section class="card card-featured-left card-featured-tertiary">
									<div class="card-body cursor-pointer" onClick="document.location='<?php echo URL_CARPETA_ADMIN; ?>/design-slider'">
										<div class="widget-summary widget-summary-xs">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-tertiary">
													<i class="fas fa-arrow-alt-circle-left"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title fs-6"><?php echo $lang_global["Regresar a sliders"]; ?></h4>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 col-xxl-3">
								<section class="card card-featured-left card-featured-tertiary">
									<div class="card-body">
										<div class="widget-summary widget-summary-xs">
											<form id="form-languague" class="bg-white" method="post" action="">
												<label class="f-medium c-negro" for="id_lang_selected"><?php echo $lang_global["Idioma"]; ?></label>
												<select data-plugin-selectTwo id="id_lang_selected" class="form-control populate" name="id_lang_selected" required="">
						  							<?php langController::showListOfLanguagesWithWelectedLanguage($id_lang_selected); ?>
										  		</select>
											</form>
										</div>
									</div>
								</section>
							</div>
						</div>
						<div id="showFormSlider" class="row">
							<div class="col-12">
								<div class="box-progress">
									<div class="progress light m-2">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>

								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="tabs-modern row">
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="tab-content" id="tabContent">
										      		<div class="tab-pane fade show active" id="showBasicSliderSettings" role="tabpanel" aria-labelledby="showBasicSliderSettings-tab">
														<?php slidersController::showBasicSliderSettings($id_image,$id_lang_selected); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showPictures" role="tabpanel" aria-labelledby="showPictures-tab">
														<?php slidersController::showPictures($id_image,$id_type_section,$id_lang_selected); ?>
										      		</div>
										    	</div>
											</div>
											<div class="col-lg-2-5 col-xl-1-5 bg-gris">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="showBasicSliderSettings-tab" data-bs-toggle="pill" data-bs-target="#showBasicSliderSettings" href="#showBasicSliderSettings" role="tab" aria-controls="showBasicSliderSettings" aria-selected="true"><?php echo $lang_global["Ajustes básicos"]; ?></a>
										      		<a class="nav-link" id="showPictures-tab" data-bs-toggle="pill" data-bs-target="#showPictures" href="#showPictures" role="tab" aria-controls="showPictures" aria-selected="false"><?php echo $lang_global["Imagen principal"]; ?></a>
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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/isotope/isotope.js"></script>

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
					//PROGRESSBAR
					progressBar();
					//SUMMERNOTE
										//$height,$url_carpeta_admin
					summernoteSaveFiles(300,URL_CARPETA_ADMIN);
					/**** SUBIR VERSION IMAGEN ****/
						//MODAL SUBIR VERSION IMAGEN
												//$form_name
						modalUploadImageVersion('modal-upload-image-version');
						//SUBIR VERSION IMAGEN
							//$id_type_action
								//1 = REGISTRAR VERSION EN AMBOS IDIOMAS
								//2 = REGISTRAR VERSION EN UN SOLO IDIOMA
										//$title,$url_carpeta_admin,$form_id,$tab_id,$page,$id_type_section,$id_type_action,$redirect,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4
						formuploadImageVersion($lang_global['Detalle Slider'],URL_CARPETA_ADMIN,'upload-image-version','showPictures',$link,$id_type_section,1,1,$lang_global['Validacion campos form'],$lang_global['Validacion upload imagen 5'],$lang_global['Validacion upload imagen 2']."JPG, JPEG y PNG.",$lang_global['Validacion upload imagen 3']);
						//BORRAR DATOS DEL FORMULARIO SUBIR VERSION IMAGEN AL DAR CLIK AL BOTON CANCELAR DEL MODAL
												//$form_name,$data_name
						deleteDataFromTheForm('modal-upload-image-version','data-modal-upload-image-version');
					/**** END SUBIR VERSION IMAGEN ****/
					/**** CAMBIAR IMAGEN ****/
						//MODAL CAMBIAR IMAGEN
										//$form_name
						modalUploadImage('modal-update-image');
						//FORMULARIO CAMBIAR IMAGEN VERSION
										//$title,$url_carpeta_admin,$form_id,$id_tab,$id_table,$id_type_section,$redirect,$lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4
						formUpdateImage($lang_global['Detalle Slider'],URL_CARPETA_ADMIN,'update-image','showFormSlider',$id_image,$id_type_section,1,1,$lang_global['Validacion upload imagen 5'],$lang_global['Validacion upload imagen 2']."JPG, JPEG y PNG.",$lang_global['Validacion campos form'],$lang_global['Validacion upload imagen 3']);
						//BORRAR DATOS DEL FORMULARIO CAMBIAR IMAGEN AL DAR CLIK AL BOTON CANCELAR DEL MODAL
												//$form_name,$data_name
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
						formDeleteWithImageVersion3Parameters($lang_global['Detalle Slider'],URL_CARPETA_ADMIN,'form#delete-with-image-version-3-parameters',$id_image,1,$id_type_section,$link,0);

						//BORRAR DATOS DEL FORMULARIO ELIMINAR IMAGEN VERSION 3 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
												//$form_name,$data_name
						deleteDataFromTheForm('modal-delete-with-image-version-3-parameters','data-modal-delete-with-image-version-3-parameters');
					/**** END ELIMINAR IMAGEN VERSION 3 PARAMETROS ****/ ?>
					let par1 		= <?php echo $id_image; ?>,
						par2 		= 0,
						par3 		= <?php echo $id_type_section; ?>,
						id_submit1 	= "updateInformationSlider",
						$submit1 	= $('#'+id_submit1).find('button[type=submit]');

					$("#title_image_lang").focus();

					<?php
						validate('#update-image');
						validate('#upload-image-version'); ?>

					//MODIFICAR INFORMACION SLIDER
					$submit1.on('click', function(ev){
						ev.preventDefault();
						var validated_submit1 	= $('#'+id_submit1).valid();
						if(validated_submit1){

							if(par1 > 0){
								var form_data 	= new FormData(document.getElementById(id_submit1));
									form_data.append("par1", par1);//ID_IMAGE_LANG
									form_data.append("par2", $('#'+id_submit1).attr("data-update-form-ajax"));//ID_LANG
									form_data.append("par3", $('#'+id_submit1).attr("data-id-lang"));

								$.ajax({
									type: "POST",
									url:  url_admin+"/upd-inf-slder",
									//TIPO DE ENVIO DE DATOS
										//SERIALIZE()
											//CUANDO SOLO SE MANDEN DATOS DEL FORM
										//FORMDATA
											//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
												//processData: false,
						       	 				//contentType: false,
									data : form_data,
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
												delay: 1000,
												before_close: function(PNotify){
													$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
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
															before_close: function(PNotify){
																$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
															}
														});
				                                     }
											 }
									},
									error: function(jqXHR)
									{
										//console.log(jqXHR);

										var msg = '';

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
												before_close: function(PNotify){
													$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
												}
											});
										}
									}
								});
							}
						}
					});
					//IDIOMA GENERAL
   					$('#id_lang_selected').on('change', function(){
   						$("#form-languague").submit();
					});
				}).apply(this, [jQuery]);
			</script>
		</body>
	</html>