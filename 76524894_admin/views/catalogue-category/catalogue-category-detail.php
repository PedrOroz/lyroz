<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))) || !isset($_GET['id_category']) || empty(intval(trim($_GET['id_category']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$id_category 	= intval(trim($_GET['id_category']));
	
	$ruta 	= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/catalogue-category-detail/".$id_category;
	$page 				= $lang_global["Catálogo"];
	$title 				= $lang_global["Detalle Categoría"];
	$id_type_section 	= 10;
	$id_page 			= $id_type_section;
	$id_lang_selected 	= 1;

	require_once('./templates/head.php');
	require_once('./core/controllers/functions/categoriesController.php'); ?>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.css" />
		
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

				<?php require_once("./modals/modal-upload-image-2-parameters.php"); ?>

				<?php require_once("./modals/modal-update-image.php"); ?>

				<?php require_once("./modals/modal-delete-with-image-6-parameters.php"); ?>

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
									<div class="card-body cursor-pointer" onClick="document.location='<?php echo URL_CARPETA_ADMIN; ?>/catalogue-category'">
										<div class="widget-summary widget-summary-xs">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-tertiary">
													<i class="fas fa-arrow-alt-circle-left"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title fs-6"><?php echo $lang_global["Regresar a categorías"]; ?></h4>
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
						<div id="showFormCategory" class="row">
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
										      		<div class="tab-pane fade show active" id="showBasicCategorySettings" role="tabpanel" aria-labelledby="showBasicCategorySettings-tab">
														<?php categoriesController::showBasicCategorySettings($id_category,$id_lang_selected); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showPictures" role="tabpanel" aria-labelledby="showPictures-tab">
														<?php categoriesController::showCategoryImages($id_category,$id_type_section,$id_lang_selected); ?>
										      		</div>
										    	</div>
											</div>
											<div class="col-lg-2-5 col-xl-1-5 bg-gris">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="showBasicCategorySettings-tab" data-bs-toggle="pill" data-bs-target="#showBasicCategorySettings" href="#showBasicCategorySettings" role="tab" aria-controls="showBasicCategorySettings" aria-selected="true"><?php echo $lang_global["Ajustes básicos"]; ?></a>
										      		<a class="nav-link" id="showPictures-tab" data-bs-toggle="pill" data-bs-target="#showPictures" href="#showPictures" role="tab" aria-controls="showPictures" aria-selected="false"><?php echo $lang_global["Imágenes"]; ?></a>
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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-appear/jquery.appear.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/js/select2.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
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
					/**** SUBIR IMAGEN 2 PARAMETROS ****/
						//MODAL SUBIR IMAGEN 2 PARAMETROS
													//$form_name
						modalUploadImage2Parameters('modal-upload-image-2-parameters');
						//SUBIR IMAGEN 2 PARAMETROS
						//$title,$url_carpeta_admin,$form_id,$tab_id,$id_table,$id_type_section,$page,$redirect,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4
						formuploadImage2Parameters($lang_global['Detalle Categoría'],URL_CARPETA_ADMIN,'upload-image-2-parameters','showPictures',$id_category,$id_type_section,'catalogue-category-detail',1,$lang_global['Validacion campos form'],$lang_global['Validacion upload imagen 5'],$lang_global['Validacion upload imagen 2'],$lang_global['Validacion upload imagen 3']);
					/**** END CAMBIAR IMAGEN ****/
					/**** CAMBIAR IMAGEN ****/
						//MODAL CAMBIAR IMAGEN
										//$form_name
						modalUploadImage('modal-update-image');
						//FORMULARIO CAMBIAR IMAGEN VERSION
										//$title,$url_carpeta_admin,$form_id,$id_tab,$id_table,$id_type_section,$redirect,$lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4
						formUpdateImage($lang_global['Detalle Categoría'],URL_CARPETA_ADMIN,'update-image','showFormCategory',$id_category,$id_type_section,1,1,$lang_global['Validacion upload imagen 5'],$lang_global['Validacion upload imagen 2'],$lang_global['Validacion campos form'],$lang_global['Validacion upload imagen 3']);
						//BORRAR DATOS DEL FORMULARIO CAMBIAR IMAGEN AL DAR CLIK AL BOTON CANCELAR DEL MODAL
												//$form_name,$data_name
						deleteDataFromTheForm('modal-update-image','data-modal-update-image');
					/**** END CAMBIAR IMAGEN ****/
					/**** ELIMINAR CON IMAGEN 6 PARAMETROS ****/
						//MODAL ELIMINAR CON IMAGEN 6 PARAMETROS
														//$form_name
						modalDeleteWithImage6Parameters('modal-delete-with-image-6-parameters');
						//FORMULARIO ELIMINAR CON IMAGEN 6 PARAMETROS
						//$title,$url_carpeta_admin,$form_id,$id_type_action,$link,$redirect
							//$id_type_action
				  				//1= TABLAS GENERALES
				  				//2 = TABLAS ESPECIFICAS DE TABLAS GENERALES
						formDeleteWithImage6Parameters($lang_global['Detalle Categoría'],URL_CARPETA_ADMIN,'form#delete-with-image-6-parameters',2,$link,0);
					/**** END ELIMINAR CON IMAGEN 6 PARAMETROS ****/ ?>						
					let par1 			= <?php echo $id_category; ?>,
						par2 			= <?php echo $id_type_section; ?>,
						par3,par4 		= 0,
						id_submit1 		= "updateCategory",
						$submit1 		= $('#'+id_submit1).find('button[type=submit]');

					$("#title_category_lang").focus();

					<?php
						validate('#update-image');
						validate('#upload-image-2-parameters'); ?>
					
					//MODIFICAR INFORMACION DE LA CATEGORIA
					$submit1.on('click', function(ev){
						ev.preventDefault();
						let validated_submit1 = $('#'+id_submit1).valid();
						if(validated_submit1){

							par3 = $('#'+id_submit1).attr("data-update-form-ajax");//ID_CATEGORY_LANG

							if(par3 > 0){
								var form_data = new FormData(document.getElementById(id_submit1));
									form_data.append("par1", par3);

								$.ajax({
									type: "POST",
									url:  url_admin+"/upd-inf-ctegry",
						       	 	//TIPO DE ENVIO DE DATOS
										//SERIALIZE()
											//CUANDO SOLO SE MANDEN DATOS DEL FORM
										//FORMDATA
											//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
												//processData: false,
						       	 				//contentType: false,
									data: form_data,
									cache: false,
							        processData: false,
							        contentType: false,
									beforeSend:function(){
										$('#'+id_submit1+" button[type=submit]").attr("disabled","disabled");
									},
									success:function(response)
									{
										if(response.estado == "true")
										{
											new PNotify({
												title: title_pnotify,
												text: response.resultado,
												type: 'success',
												delay: 800,
												before_init: function(){
													$(id_submit1 + " button[type=submit]").removeAttr('disabled');
												},
												before_close: function(PNotify){
													if(response.redireccionar == "true"){
														window.location.href = "<?php echo $link ?>";
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
												before_init: function(){
													$('#'+id_submit1+" button[type=submit]").removeAttr('disabled');
												}
											});
										}
									}
								});
							}
						}
					});
					//REGISTRAR/ELIMINAR LAS CATEGORIAS CHILD DE LA CATEGORIA PADRE
					$('.id_category').on('change', function() {
					    if($(this).is(':checked')){
					    	//REGISTRAR
					    	par4 	= $(this).val();
					    }else{
					    	//ELIMINAR
					    	par4 	= $(this).val();
					    	 }

					    if(par1 > 0 && par4 > 0){

					    	$.ajax({
								type: "POST",
								url:  url_admin+"/new-reg-parnt-ctegry",
								data: { par1: par1, 
										par4: par4 },
								cache: false,
								success:function(response)
								{
									if(response.estado == "true")
									{
										new PNotify({
											title: title_pnotify,
											text: response.resultado,
											type: 'success',
											delay: 1000
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
					//IDIOMA GENERAL
   					$('#id_lang_selected').on('change', function(){
   						$("#form-languague").submit();
					});
				}).apply(this, [jQuery]);
			</script>
		</body>
	</html>