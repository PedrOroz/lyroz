<?php 
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))) || !isset($_SESSION['id_role_dao']) || empty(intval(trim($_SESSION['id_role_dao']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$ruta 		= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 				= URL_CARPETA_ADMIN."/catalogue-product";
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
			<?php require_once("./modals/modal-remove-general.php"); ?>
			<?php require_once("./modals/modal-delete-with-4-parameters.php"); ?>
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
						<div class="col">

							<div class="card card-modern">
								<div class="card-body">
									<div class="datatables-header-footer-wrapper mt-2">
										<div class="datatable-header">
											<div class="row align-items-center mb-3">
												<div class="col-12 col-lg-auto mb-3 mb-lg-0">

													<?php productsController::getNewProductId(URL_CARPETA_ADMIN); ?>

												</div>
												<div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
													<div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<label class="ws-nowrap me-3 mb-0"><?php echo $lang_global["Filtros por"]; ?></label>
														<select class="form-control select-style-1 filter-by" name="filter-by">
															<option value="all" selected><?php echo $lang_global["Todo"]; ?></option>
															<option value="1">ID</option>
															<option value="2"><?php echo $lang_global["Producto"]; ?></option>
															<option value="3"><?php echo $lang_global["Referencia"]; ?></option>
															<option value="4"><?php echo $lang_global["Categoría"]; ?></option>
															<option value="5"><?php echo $lang_global["Tipo de producto"]; ?></option>
														</select>
													</div>
												</div>
												<div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
													<div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<label class="ws-nowrap me-3 mb-0"><?php echo $lang_global["Mostrar"]; ?>:</label>
														<select class="form-control select-style-1 results-per-page" name="results-per-page">
															<option value="12" selected>12</option>
															<option value="24">24</option>
															<option value="36">36</option>
															<option value="100">100</option>
														</select>
													</div>
												</div>
												<div class="col-12 col-lg-auto ps-lg-1">
													<div class="search search-style-1 search-style-1-lg mx-lg-auto">
														<div class="input-group">
															<input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="<?php echo $lang_global["Buscar"]; ?>">
															<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>

										<?php productsController::showRegisteredProducts($id_type_section); ?>

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
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/ios7-switch/ios7-switch.js"></script>

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
				//TABLA ECOMMERCE LIST
										//$datatable_id,$function_name
				datetable_ecommerce_list('datatable-products-list','datatableProductsList');
				//SCRIPT ANIMACION MODAL
				modalWithZoomAnim();
				//SCRIPT POP UP IMAGE
				imagePopupNoMargins();
				//PLUGIN SWITCH VISIBLE
		       	formIosSwitchVisible(URL_CARPETA_ADMIN);//$url_carpeta_admin
		       	//PLUGIN SWITCH
				formIosSwitch(URL_CARPETA_ADMIN);
				//MODIFICAR ORDEN
						//$id_type_section,$url_carpeta_admin
		       	sortable($id_type_section,URL_CARPETA_ADMIN);
		       	/**** ELIMINAR CON 4 PARAMETROS ****/
		       		//MODAL ELIMINAR CON 4 PARAMETROS
												//$form_name
					modalDeleteWith4Parameters('modal-delete-with-4-parameters');
					//FORMULARIO ELIMINAR CON 4 PARAMETROS
											//$title,$url_carpeta_admin,$pagina,$form_id,$redirect
					formDeleteWith4Parameters($lang_global['Productos'],URL_CARPETA_ADMIN,$link,'form#delete-with-4-parameters',1);
					//BORRAR DATOS DEL FORMULARIO ELIMINAR CON 4 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
										//$form_name,$data_name
					deleteDataFromTheForm('modal-delete-with-4-parameters','data-modal-delete-with-4-parameters');
		       	/**** END ELIMINAR CON 4 PARAMETROS ****/
		       	/**** ELIMINAR GENERAL ****/
		       		//MODAL ELIMINAR GENERAL
		       							//$form_name
					modalRemoveGeneral('modal-remove-general');
					//FORMULARIO ELIMINAR GENERAL
									//$title,$id_item,$url_carpeta_admin,$form_id,$redirect
					formRemoveGeneral($lang_global['Productos'],'item-id_product-',URL_CARPETA_ADMIN,'form#remove-general',1);
					//BORRAR DATOS DEL FORMULARIO ELIMINAR GENERAL AL DAR CLIK AL BOTON CANCELAR DEL MODAL
										//$form_name,$data_name
					deleteDataFromTheForm('modal-remove-general','data-modal-remove-general');
		       	/**** END ELIMINAR GENERAL ****/ ?>
			}).apply(this, [jQuery]);
		</script>
	</body>
</html>