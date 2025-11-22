<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))) || !isset($_GET['id_attribute']) || empty(intval(trim($_GET['id_attribute']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$id_attribute 	= intval(trim($_GET['id_attribute']));

	$ruta 	= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/catalogue-attribute-detail/".$id_attribute;
	$page 				= $lang_global["Catálogo"];
	$title 				= $lang_global["Detalle Atributo"];
	$id_type_section 	= 23;
	$id_page 			= $id_type_section;
	$id_lang_selected 	= 1;

	require_once('./templates/head.php');
	require_once('./core/controllers/functions/attributesController.php'); ?>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />

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
						<div class="row justify-content-between position-relative zi-1">
							<div class="col-12 col-sm-auto mb-3 mb-sm-0">
								<section class="card card-featured-left card-featured-tertiary">
									<div class="card-body cursor-pointer" onClick="document.location='<?php echo URL_CARPETA_ADMIN; ?>/catalogue-attribute'">
										<div class="widget-summary widget-summary-xs">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-tertiary">
													<i class="fas fa-arrow-alt-circle-left"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title fs-6"><?php echo $lang_global["Regresar a Atributos"]; ?></h4>
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
						<div class="row">
							<div class="col-12">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="tabs-modern row">
											<div class="col-lg-2-5 col-xl-1-5 bg-gris">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="showBasicAttributeSettings-tab" data-bs-toggle="pill" data-bs-target="#showBasicAttributeSettings" href="#showBasicAttributeSettings" role="tab" aria-controls="showBasicAttributeSettings" aria-selected="true"><?php echo $lang_global["Ajustes básicos"]; ?></a>
										    	</div>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="tab-content" id="tabContent">
										      		<div class="tab-pane fade show active" id="showBasicAttributeSettings" role="tabpanel" aria-labelledby="showBasicAttributeSettings-tab">
														<?php attributesController::showBasicAttributeSettings($id_attribute,$id_lang_selected); ?>
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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/js/select2.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>

			<!-- Theme Base, Components and Settings -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

			<!-- Theme Custom -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

			<!-- Theme Initialization Files -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
			<script>
				(function($) {
					'use strict';
					
					let par1 			= <?php echo $id_attribute; ?>,
						par2 			= <?php echo $id_type_section; ?>,
						par3,par4 		= 0,
						id_submit1 		= "updateAttribute",
						$submit1 		= $('#'+id_submit1).find('button[type=submit]');

					$("#title_attribute_lang").focus();

					//MODIFICAR INFORMACION DEL ATRIBUTO
					$submit1.on('click', function(ev){
						ev.preventDefault();
						let validated_submit1 = $('#'+id_submit1).valid();
						if(validated_submit1){

							par3 = $('#'+id_submit1).attr("data-update-form-ajax");//ID_ATTRIBUTE_LANG

							if(par3 > 0){
								var formData = new FormData(document.getElementById(id_submit1));

									formData.append("par1", par3);

								$.ajax({
									type: "POST",
									url:  url_admin+"/upd-inf-attribte",
									//TIPO DE ENVIO DE DATOS
										//SERIALIZE()
											//CUANDO SOLO SE MANDEN DATOS DEL FORM
										//FORMDATA
											//CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
												//processData: false,
						       	 				//contentType: false,
									data: formData,
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
												delay: 1000,
												before_init: function(){
													$(id_submit1 + " button[type=submit]").removeAttr('disabled');
												},
												before_close: function(PNotify){
													/*if(response.redireccionar == "true"){
														window.location.href = "<?php echo $link ?>";
													}*/
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

					//REGISTRAR/ELIMINAR LOS ATRIBUTOS CHILD DEL ATRIBUTO PADRE
					$('.id_attribute').on('change', function() {
						
					    if($(this).is(':checked')){
					    	//AGREGAR
					    	par4 	= $(this).val();
					    }else{
					    	//ELIMINAR
					    	par4 	= $(this).val();
					    	 }

					   	if(par1 > 0 && par4 > 0){

					    	$.ajax({
								type: "POST",
								url:  url_admin+"/new-reg-parnt-attribte",
								data: { par1: par1, par4: par4 },
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
										});
									}else{
											if(response.sin_sesion == 'true'){
												window.location.href = url_front+'iniciar-sesion';
											}else{
													new PNotify({
														title: title_pnotify,
														text: response.error,
														type: 'error',
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
									text: '<?php echo $lang_global["Selecciona un atributo"]; ?>',
									type: 'info',
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