<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))) || !isset($_SESSION['id_role_dao']) || empty(intval(trim($_SESSION['id_role_dao']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	require_once('./languages/'.langController::prefixLangDefault("logIn"));
	$id_user 	= intval(trim($_SESSION['id_user_dao']));
	$ruta 		= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$link 		= URL_CARPETA_ADMIN."/main";
	$title 		= $lang_global["Principal"];
	$id_page 	= 1;
	require_once('./templates/head.php');
	require_once('./core/controllers/functions/productsController.php'); ?>

		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
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
		<section id="homepage" class="body">

			<!-- start: top-header -->
			<?php require_once('./templates/top-header.php'); ?>
			<!-- end: top-header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php require_once('./templates/header.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body content-body-modern pb-0">
					<!-- start: page-header -->
					<?php require_once('./templates/page-header.php'); ?>
					<!-- end: page-header -->

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12 col-xl-4">

							<div class="row">
								<div class="col-12">
									<div class="card card-modern">
										<div class="card-body p-0">
											<div class="widget-user-info">
												<div class="widget-user-info-header">

													<?php
														//id_role
										                    //1 = Súper Administrador
										                    //2 = Administrador
										                    //3 = Usuario
										                    //4 = Vendedora
										                    //5 = Diseñador
										                    //6 = Chef
										                    //7 = Editor

										                userController::showProfilePictureMainByIdUser($id_user); ?>

												</div>
												<div class="widget-user-info-body">
													<div class="row">
														<div class="col-auto">
															<strong class="text-color-dark text-5"><?php userController::getTotalUsersByRoleId(3); ?></strong>
															<h3 class="text-4-1"><?php echo $lang_global["Clientes"]; ?></h3>
														</div>
														<div class="col-auto">
															<strong class="text-color-dark text-5"><?php userController::getTotalUsersByRoleId(4); ?></strong>
															<h3 class="text-4-1"><?php echo $lang_global["Vendedores"]; ?></h3>
														</div>
														<div class="col-auto">
															<strong class="text-color-dark text-5"><?php productsController::getTotalProducts(); ?></strong>
															<h3 class="text-4-1"><?php echo $lang_global["Productos"]; ?></h3>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<a href="<?php echo URL_CARPETA_ADMIN.'/my-profile/'.$id_user; ?>" class="btn btn-light btn-xl border font-weight-semibold text-color-dark text-3 mt-4"><?php echo $lang_global["Mi perfil"]; ?></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card card-modern">
										<div class="card-header">
											<div class="card-actions">
												<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											</div>
											<h2 class="card-title"><?php echo $lang_global["Actividad reciente"]; ?></h2>
										</div>
										<div class="card-body">
											<ul class="list list-unstyled mb-0">

												<?php userController::showUserRecordMainWithLimit($id_user); ?>

											</ul>
										</div>
									</div>
								</div>
							</div>

							<?php productsController::showRegisteredProductsMainWithLimit(15); ?>

						</div>
						<div class="col-lg-12 col-xl-8 pt-2 pt-xl-0 mt-4 mt-xl-0">
							<div class="row">
								<div class="col-12 pb-4">
									<div class="row">
										<?php
											//$_SESSION['id_role_dao']
							                    //1 = Súper Administrador
							                    //2 = Administrador
							                    //3 = Usuario
							                    //4 = Cliente
							                    //5 = Diseñador
							                    //6 = Chef
							                    //7 = Editor

						                    if(!empty(intval(trim($_SESSION['id_user_dao'])))){
						                    	$username_website = userController::showPersonalInformationByUserIdInSpecificSection($_SESSION['id_user_dao']);
						                    }

						                    switch (intval(trim($_SESSION['id_role_dao']))) {
						                    	case 3:

						                    	break;
						                    	case 4:

						                    	break;
						                    	case 5:

						                    	break;
						                    	case 6:

						                    	break;
						                    	default:
							                      echo('<div class="col-sm-6 col-xxl-4">
															<section class="card mb-2">
																<div class="card-body bg-quaternary">
																	<div class="widget-summary widget-summary-sm">
																		<div class="widget-summary-col widget-summary-col-icon">
																			<div class="summary-icon">
																				<i class="fas fa-sliders-h"></i>
																			</div>
																		</div>
																		<div class="widget-summary-col">
																			<div class="summary">
																				<h4 class="title">'.$lang_global["Editar sliders"].'</h4>
																				<a href="'.URL_CARPETA_ADMIN.'/design-slider" class="small text-primary text-uppercase">('.$lang_global["Acceder"].')</a>
																			</div>
																		</div>
																	</div>
																</div>
															</section>
														</div>
														<div class="col-sm-6 col-xxl-4">
															<section class="card mb-2">
																<div class="card-body bg-quaternary">
																	<div class="widget-summary widget-summary-sm">
																		<div class="widget-summary-col widget-summary-col-icon">
																			<div class="summary-icon">
																				<i class="far fa-edit"></i>
																			</div>
																		</div>
																		<div class="widget-summary-col">
																			<div class="summary">
																				<h4 class="title">'.$lang_global["Editar categorías"].'</h4>
																				<a href="'.URL_CARPETA_ADMIN.'/catalogue-category" class="small text-primary text-uppercase">('.$lang_global["Acceder"].')</a>
																			</div>
																		</div>
																	</div>
																</div>
															</section>
														</div>
														<div class="col-sm-6 col-xxl-4">
															<section class="card mb-2">
																<div class="card-body bg-quaternary">
																	<div class="widget-summary widget-summary-sm">
																		<div class="widget-summary-col widget-summary-col-icon">
																			<div class="summary-icon">
																				<i class="fas fa-users-cog"></i>
																			</div>
																		</div>
																		<div class="widget-summary-col">
																			<div class="summary">
																				<h4 class="title">'.$lang_global["Editar usuarios"].'</h4>
																				<a href="'.URL_CARPETA_ADMIN.'/configurations-users" class="small text-primary text-uppercase">('.$lang_global["Acceder"].')</a>
																			</div>
																		</div>
																	</div>
																</div>
															</section>
														</div>');
						                    	break;
						                    } ?>
									</div>
								</div>
								<div class="col-12">
									<div class="card card-modern card-modern-table-over-header">
										<div class="card-header">
											<div class="card-actions">
												<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											</div>
											<h2 class="card-title"><?php echo $lang_global["Ordenes recientes"]; ?></h2>
										</div>
										<div class="card-body">
											<div class="datatables-header-footer-wrapper">
												<div class="datatable-header">
													<div class="row align-items-center mb-3">

														<div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
															<div class="d-flex align-items-lg-center flex-column flex-lg-row">
																<label class="ws-nowrap me-3 mb-0">Filter By:</label>
																<select class="form-control select-style-1 filter-by" name="filter-by">
																	<option value="all" selected>All</option>
																	<option value="1">ID</option>
																	<option value="2">Customer Name</option>
																	<option value="3">Date</option>
																	<option value="4">Total</option>
																	<option value="5">Status</option>
																</select>
															</div>
														</div>
														<div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
															<div class="d-flex align-items-lg-center flex-column flex-lg-row">
																<label class="ws-nowrap me-3 mb-0">Show:</label>
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
																	<input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Order">
																	<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
																</div>
															</div>
														</div>
													</div>
												</div>

												<table class="table table-ecommerce-simple table-borderless table-striped mb-0" id="datatable-orders-list" style="min-width: 640px;">

													<thead>
														<tr>
															<th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
															<th width="8%">ID</th>
															<th width="28%">Customer Name</th>
															<th width="18%">Date</th>
															<th width="18%">Total</th>
															<th width="15%">Status</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>191</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example</strong></a></td>
															<td>Nov 21, 2019</td>
															<td>$200</td>
															<td><span class="ecommerce-status on-hold">On Hold</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>192</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example 2</strong></a></td>
															<td>Nov 22, 2019</td>
															<td>$70</td>
															<td><span class="ecommerce-status on-hold">On Hold</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>193</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example 3</strong></a></td>
															<td>Nov 23, 2019</td>
															<td>$20</td>
															<td><span class="ecommerce-status processing">Processing</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>191</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example</strong></a></td>
															<td>Nov 21, 2019</td>
															<td>$200</td>
															<td><span class="ecommerce-status on-hold">On Hold</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>192</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example 2</strong></a></td>
															<td>Nov 22, 2019</td>
															<td>$70</td>
															<td><span class="ecommerce-status on-hold">On Hold</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>193</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example 3</strong></a></td>
															<td>Nov 23, 2019</td>
															<td>$20</td>
															<td><span class="ecommerce-status processing">Processing</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>191</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example</strong></a></td>
															<td>Nov 21, 2019</td>
															<td>$200</td>
															<td><span class="ecommerce-status on-hold">On Hold</span></td>
														</tr>
														<tr>
															<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
															<td><a href="ecommerce-orders-detail.html"><strong>192</strong></a></td>
															<td><a href="ecommerce-orders-detail.html"><strong>Customer Name Example 2</strong></a></td>
															<td>Nov 22, 2019</td>
															<td>$70</td>
															<td><span class="ecommerce-status on-hold">On Hold</span></td>
														</tr>
													</tbody>
												</table>
												<hr class="solid mt-5 opacity-4">
												<div class="datatable-footer">
													<div class="row align-items-center justify-content-between mt-3">
														<div class="col-lg-auto text-center order-3 order-lg-2">
															<div class="results-info-wrapper"></div>
														</div>
														<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
															<div class="pagination-wrapper"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 call-to-action call-to-action-grey">
							<div class="container container-with-sidebar">
								<div class="call-to-action-content">
									<nav class="copyright position-relative">
										<ul class="d-md-flex justify-content-center align-items-center m-0">
											<li>
												<p class="fw-normal mb-0">
													<span class="fw-bold text-uppercase">CMS </span>
													<?php echo $lang_login["versión"]; ?>
												</p>
											</li>
											<li>
												<a rel="noopener" role="button" class="fw-normal text-primary text-decoration-underline mx-3" href="<?php echo URL_CARPETA_FRONT; ?>/aviso-de-privacidad" target="_blank"><?php echo $lang_global["Aviso de privacidad"]; ?></a>
											</li>
											<li>
												<a rel="noopener" role="button" class="fw-normal text-primary text-decoration-underline" href="mailto:Lyrozbusiness7@gmail.com"><?php echo $lang_global["Solicitar soporte"]; ?></a>
											</li>
										</ul>
									</nav>
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
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-appear/jquery.appear.js"></script>
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
				//TABLA ECOMMERCE LIST
										//$datatable_id,$function_name
				datetable_ecommerce_list('datatable-orders-list','datatableOrdersList'); ?>
			}).apply(this, [jQuery]);
		</script>
	</body>
</html>