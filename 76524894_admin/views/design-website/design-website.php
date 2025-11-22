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

	$link 				= URL_CARPETA_ADMIN."/design-website";
	$title 				= $lang_global["Página web"];
	$page 				= $lang_global["Diseño"];
	$id_type_section 	= 12;
	$id_page 			= $id_type_section;

	require_once('./templates/head.php'); ?>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/owl.carousel/assets/owl.carousel.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/owl.carousel/assets/owl.theme.default.css" />

		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
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

						<!-- start: page -->

						<div id="showPersonalization" class="row">
							<div class="box-progress">
								<div class="progress light m-2">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="col-12 mx-auto col-md-8 col-xl-6">

								<?php userController::showFormUpdateUserTheme($id_type_section); ?>

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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/owl.carousel/owl.carousel.js"></script>

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
				<?php
					require_once('./core/helps/help.php');
					//SCRIPT ANIMACION MODAL
					modalWithZoomAnim();
					//BARRA DE CARGA
	       			progressBar(); ?>
					$("#color_customize_lang").focus();

					let par1,par2		= 0,
						id_submit1 		= "updateUserTheme",
						$submit1 		= $('#'+id_submit1).find('button[type=submit]');

					<?php validate('#updateUserTheme'); ?>

					$submit1.on('click', function(ev){
						ev.preventDefault();
						var validated_submt1 = $('#'+id_submit1).valid();
						if(validated_submt1){
							par1 		= $('#'+id_submit1).attr('data-id');
							par2 		= <?php echo $id_type_section; ?>;

							if(par1 > 0 && par2 > 0)
							{
								//VALIDAR SI ESTA SELECCIONADO UN FONDO
								if($("input[name='id_customize']:radio").is(':checked')){

									var form_data = new FormData(document.getElementById(id_submit1));
										form_data.append("par1", par1);

									$.ajax({
										type: 'POST',
										url:  url_admin+"/upd-u-theme-and-col",
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
											$('#'+id_submit1)[0].reset();
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
													before_init: function()
													{
														$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
														window.location.href = "<?php echo $link; ?>";
													}
												});
											}else{
													new PNotify({
														title: title_pnotify,
														text: response.error,
														type: 'error',
														before_init: function()
														{
															$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
														},
														before_close: function(PNotify){
														}
													});
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
								}else{
										//VALIDAR SI SUBIO ARCHIVO
										if($("#fileCustomization").val().length < 5)
										{
											new PNotify({
												title: title_pnotify,
												text: "<?php echo $lang_global['Debe seleccionar un fondo predefinido o subir uno']; ?>",
												type: 'info',
											});
										}else{
												var archivo 	= $("#fileCustomization").val();
									    		var extensiones = archivo.substring(archivo.lastIndexOf("."));

												if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png")
												{
												    new PNotify({
														title: title_pnotify,
														text: "<?php echo $lang_global['Validacion upload imagen 2']; ?>JPG, JPEG y PNG.",
														type: 'info',
													});
												}else{
														var id_tab 		= 'showPersonalization',
													    	id_form 	= 'updateUserTheme',
													    	form_data 	= new FormData(document.getElementById(id_form));

														form_data.append('par1',par1);
														form_data.append('par2',par2);

														$.ajax({
															url:  url_admin+"/upl-u-theme-wth-file",
															type: "POST",
													        data : form_data,
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
																		$("#"+id_form)[0].reset();
																		clearProgressBar("#"+id_tab);
																	},
																	before_close: function(PNotify){
																		if(response.redireccionar == "true")
																		{
																	    	window.location.href = "<?php echo $link; ?>";
																	    }
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
													    }).fail(function()
													    {
													    	new PNotify({
																title: title_pnotify,
																text: "<?php echo $lang_global['Color del tema']; ?>",
																type: 'error',
																before_init: function(){
																	$("#"+id_form)[0].reset();
																	clearProgressBar("#"+id_tab);
															    }
															});
														});
													 }
											 }
									 }
							}else{
									new PNotify({
										title: title_pnotify,
										text: '<?php echo $lang_global["Variables vacías"]; ?>',
										type: 'error',
										before_close: function(PNotify){
											$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
										}
									});
								 }
						}
					});
				}).apply(this, [jQuery]);
			</script>
		</body>
	</html>