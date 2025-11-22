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

	$link 				= URL_CARPETA_ADMIN."/catalogue-attribute";
	$title 				= $lang_global["Atributos"];
	$page 				= $lang_global["Catálogo"];
	$id_type_section 	= 23;
	$id_page 			= $id_type_section;
	$id_user 			= intval(trim($_SESSION['id_user_dao']));

	require_once('./templates/head.php');
	require_once('./core/controllers/functions/attributesController.php'); ?>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
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

				<?php require_once("./modals/modal-remove-general.php"); ?>

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
						<div class="row">

							<div class="col-12">
								<div class="tabs tabs-dark">
									<ul class="nav nav-tabs tabs-primary">
										<li class="nav-item active">
											<a class="nav-link" href="#createAttribute" data-toggle="tab"><?php echo $lang_global["Crear atributo"]; ?></a>
										</li>
									</ul>

									<div class="tab-content">

										<div id="createAttribute" class="tab-pane active">
											<?php attributesController::showFormCreateAttribute($id_type_section); ?>
										</div>

									</div>
								</div>
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
					//TABLA DEFAULT
									//$datatable_id,$function_name
					datetable_default('datatable-parent-attributes','datatableParentAttributes');
					//SCRIPT ANIMACION MODAL
					modalWithZoomAnim();
					//PLUGIN SWITCH
					formIosSwitch(URL_CARPETA_ADMIN);
	       			//MODIFICAR ORDEN
       						//$id_type_section,$url_carpeta_admin
       				sortable($id_type_section,URL_CARPETA_ADMIN);
       				/**** ELIMINAR GENERAL ****/
						//MODAL ELIMINAR GENERAL
								//$form_name
						modalRemoveGeneral('modal-remove-general');
						//FORMULARIO ELIMINAR GENERAL
										//$title,$id_item,$url_carpeta_admin,$form_id,$redirect
						formRemoveGeneral($lang_global['Atributos'],'item-id_attribute-',URL_CARPETA_ADMIN,'form#remove-general',0);
						//BORRAR DATOS DEL FORMULARIO ELIMINAR GENERAL AL DAR CLIK AL BOTON CANCELAR DEL MODAL
											//$form_name,$data_name
						deleteDataFromTheForm('modal-remove-general','data-modal-remove-general');
					/**** END ELIMINAR GENERAL ****/ ?>
					let id_submit1 		= "#registerAttribute",
						$submit1 		= $(id_submit1).find('button[type=submit]');

					$("#title_attribute_lang").focus();

					$submit1.on('click', function(ev){
						ev.preventDefault();
						var validated_submit1 = $(id_submit1).valid();
						if(validated_submit1){
							$.ajax({
								type: "POST",
								url:  url_admin+'/new-reg-attribte',
								data: $(id_submit1).serialize(),
								cache: false,
								beforeSend:function(){
									$(id_submit1 + " button[type=submit]").attr("disabled","disabled");
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
															$(id_submit1 + " button[type=submit]").removeAttr('disabled');
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
												$(id_submit1 + " button[type=submit]").removeAttr('disabled');
											}
										});
									}
								}
							});
						}
					});
				}).apply(this, [jQuery]);
			</script>
		</body>
	</html>