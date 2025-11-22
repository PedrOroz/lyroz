<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	if(!isset($_SESSION['id_user_dao']) || empty(intval(trim($_SESSION['id_user_dao']))) || !isset($_SESSION['id_role_dao']) || empty(intval(trim($_SESSION['id_role_dao']))) || !isset($_GET['id_user']) || empty(intval(trim($_GET['id_user']))))
	{
		echo '<script language="javascript">window.location="'.URL_CARPETA_ADMIN.'"</script>;';
	}
	$ruta 		= 'languages/'.langController::prefixLangDefault("global");
	require_once($ruta);

	$id_user 			= intval(trim($_GET['id_user']));
	$link 				= URL_CARPETA_ADMIN."/my-profile/".$id_user;
	$page 				= $lang_global["Mi perfil"];
	$title 				= $lang_global["Perfil de usuario"];
	$id_type_section 	= 4;
	$id_page 			= $id_type_section;

	require_once('./templates/head.php'); ?>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/dropzone/basic.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/dropzone/dropzone.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/css/dataTables.bootstrap5.css" />
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css'>

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/css/custom.css">

		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/functions/place-autocomplete-address-form.js"></script>
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

				<?php require_once("./modals/modal-delete-with-4-parameters.php"); ?>

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

							<?php userController::showProfilePictureByIdUser($id_user); ?>

							<div class="col-12 col-xl-8 col-xxl-9">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="tabs-modern row" style="min-height: 490px;">
											<div class="col-lg-2-5 col-xl-1-5 bg-gris">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="editInformation-tab" data-bs-toggle="pill" data-bs-target="#editInformation" href="#editInformation" role="tab" aria-controls="editInformation" aria-selected="true"><?php echo $lang_global["Información"]; ?>
										      		</a>
										      		<a class="nav-link" id="showSocialNetwork-tab" data-bs-toggle="pill" data-bs-target="#showSocialNetwork" href="#showSocialNetwork" role="tab" aria-controls="showSocialNetwork" aria-selected="false"><?php echo $lang_global["Redes sociales"]; ?>
										      		</a>
										      		<a class="nav-link" id="showGallery-tab" data-bs-toggle="pill" data-bs-target="#showGallery" href="#showGallery" role="tab" aria-controls="showGallery" aria-selected="false"><?php echo $lang_global["Galería"]; ?>
										      		</a>
										      		<a class="nav-link" id="showEmail-tab" data-bs-toggle="pill" data-bs-target="#showEmail" href="#showEmail" role="tab" aria-controls="showEmail" aria-selected="false"><?php echo $lang_global["Correo electrónico"]; ?>
										      		</a>
										      		<a class="nav-link" id="showPassword-tab" data-bs-toggle="pill" data-bs-target="#showPassword" href="#showPassword" role="tab" aria-controls="showPassword" aria-selected="false"><?php echo $lang_global["Contraseña"]; ?>
										      		</a>

								      		<?php
											//$_SESSION['id_role_dao']
							                    // 1 = Súper Administrador
							                    // 2 = Administrador
							                    // 3 = Usuario
							                    // 4 = Vendedora
							                    // 5 = Diseñador
							                    // 6 = Chef
							                    // 7 = Editor

											if($_SESSION['id_role_dao'] <= 2){
											  echo('<a class="nav-link" id="showHistory-tab" data-bs-toggle="pill" data-bs-target="#showHistory" href="#showHistory" role="tab" aria-controls="showHistory" aria-selected="false">'.$lang_global["Historial"].'
										      		</a>');
											} ?>
										    	</div>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="tab-content" id="tabContent">
										      		<div class="tab-pane fade show active" id="editInformation" role="tabpanel" aria-labelledby="editInformation-tab">
										      			<?php userController::showUserInformationByUserId($id_user); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showSocialNetwork" role="tabpanel" aria-labelledby="showSocialNetwork-tab">
										      			<?php userController::showSocialNetworkByUserId($id_user); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showGallery" role="tabpanel" aria-labelledby="showGallery-tab">
										      			<?php userController::showFormUploadGallery($id_user); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showEmail" role="tabpanel" aria-labelledby="showEmail-tab">
										      			<?php userController::showEmail($id_user); ?>
										      		</div>
										      		<div class="tab-pane fade" id="showPassword" role="tabpanel" aria-labelledby="showPassword-tab">
										      			<?php userController::showPassword($id_user); ?>
										      		</div>
										  <?php if($_SESSION['id_role_dao'] <= 2){
											   echo('<div class="tab-pane fade" id="showHistory" role="tabpanel" aria-labelledby="showHistory-tab">');
										      			userController::showUserRecord($id_user);
										       echo('</div>');
												} ?>
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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/common/common.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/nanoscroller/nanoscroller.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

			<!-- Specific Page Vendor -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/js/select2.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/fuelux/js/spinner.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-appear/jquery.appear.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/ios7-switch/ios7-switch.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/dropzone/dropzone.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.js"></script>

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
			<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwYneEwpS-vj0Df0llLDOvXEPsq1HD534&callback=initAutocomplete&libraries=places"></script>
			<script src='https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.js'></script>
			<script>
				(function($) {
					'use strict';
				<?php
					require_once('./core/helps/help.php');
					//TABLA DEFAULT
										//$datatable_id,$function_name
					datetable_default('datatable-social-network-user','datatableSocialNetworkUser');
										//$datatable_id,$function_name
					datetable_default('datatable-user-record','datatableUserRecord');
										//$datatable_id,$function_name
					datetable_default('datatable-gallery-user','datatableGalleryUser');
					//SCRIPT ANIMACION MODAL
					modalWithZoomAnim();
					//SCRIPT POP UP IMAGE
					imagePopupNoMargins();
					//SUMMERNOTE
										//$height,$url_carpeta_admin
					summernoteSaveFiles(300,URL_CARPETA_ADMIN);
					//BARRA DE CARGA
	       			progressBar();
	       			//$_SESSION['id_role_dao']
                        //1 = Súper Administrador
	                    //2 = Administrador
	                    //3 = Usuario
	                    //4 = Vendedora
	                    //5 = Diseñador
	                    //6 = Chef
	                    //7 = Editor
	       			if($_SESSION['id_role_dao'] == 1 || $_SESSION['id_role_dao'] == 2){
		       			//PLUGIN SWITCH
						formIosSwitch(URL_CARPETA_ADMIN);
					}
	       			//PLUGIN SWITCH SECCIONES INTERNAS
       							//$url_carpeta_admin
       				formIosSwitchInternalSections(URL_CARPETA_ADMIN,$link,0);
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
	       			sortableInternalSections($id_type_section,"#sortable-gallery-user",14,URL_CARPETA_ADMIN,1);
	       			//FORMULARIO MODIFICAR INFORMACION CON FORMULARIO (USUARIOS-REDES SOCIALES)
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
					formUpdateSpecificTable('modal-update-user-social-media',$lang_global['Mi perfil'],1,'item-user_social_media-',$id_type_section,1,1,'upd-inf-u-so-me',URL_CARPETA_ADMIN,$link,1,0);
					/**** ELIMINAR CON 4 PARAMETROS ****/
						//MODAL ELIMINAR CON 4 PARAMETROS
													//$form_name
						modalDeleteWith4Parameters('modal-delete-with-4-parameters');
						//FORMULARIO ELIMINAR CON 4 PARAMETROS
													//$title,$url_carpeta_admin,$pagina,$form_id,$redirect
						formDeleteWith4Parameters($lang_global['Mi perfil'],URL_CARPETA_ADMIN,$link,'form#delete-with-4-parameters',0);
						//BORRAR DATOS DEL FORMULARIO ELIMINAR CON 4 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
												//$form_name,$data_name
						deleteDataFromTheForm('modal-delete-with-4-parameters','data-modal-delete-with-4-parameters');
					/**** END ELIMINAR CON 4 PARAMETROS ****/
					/**** ELIMINAR CON IMAGEN 5 PARAMETROS ****/
						//MODAL ELIMINAR CON IMAGEN 5 PARAMETROS
													//$form_name
						modalDeleteWithImage5Parameters('modal-delete-with-image-5-parameters');
						//FORMULARIO ELIMINAR CON IMAGEN 5 PARAMETROS
														//$title,$url_carpeta_admin,$pagina,$form_id,$redirect,$id_type_section
						formDeleteWithImage5Parameters($lang_global['Galería'],URL_CARPETA_ADMIN,$link,'form#delete-with-image-5-parameters',0,14);
						//BORRAR DATOS DEL FORMULARIO ELIMINAR CON 4 PARAMETROS AL DAR CLIK AL BOTON CANCELAR DEL MODAL
												//$form_name,$data_name
						deleteDataFromTheForm('modal-delete-with-image-5-parameters','data-modal-delete-with-image-5-parameters');
					/**** END ELIMINAR CON IMAGEN 5 PARAMETROS ****/ ?>
					let par1,par2,par3,par4,par5,par6	= 0,
						id_tab 							= "showProfilePicture",
						id_submit1 						= "updateInformationUser",
						id_submit2 						= "updateEmail",
						id_submit3 						= "updatePassword",
						id_submit4 						= "registerOnlySocialNetworkToUser",
						id_submit5 						= "uploadUserProfilePicture",
						$submit1 						= $('#'+id_submit1).find('button[type=submit]'),
						$submit2 						= $('#'+id_submit2).find('button[type=submit]'),
						$submit3 						= $('#'+id_submit3).find('button[type=submit]'),
						$submit4 						= $('#'+id_submit4).find('button[type=submit]');

					if($("#telephone_user").length || $("#cell_phone_user").length) {

						if($("#telephone_user").length) {
							const telephone     = document.querySelector("#telephone_user");

							window.intlTelInput(telephone, {
							   	initialCountry: "auto",
							   	geoIpLookup: callback => {
								    fetch("https://ipapi.co/json")
								    .then(res 	=> res.json())
								    .then(data 	=> callback(data.country_code))
								    .catch(() 	=> callback("mx"));
								},
							   	placeholderNumberType: 'FIXED_LINE',
							   	separateDialCode:true,
							  	utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
							});
						}

						if($("#cell_phone_user").length) {
							const cell_phone 	= document.querySelector("#cell_phone_user");
							window.intlTelInput(cell_phone, {
							   	initialCountry: "auto",
							   	geoIpLookup: callback => {
								    fetch("https://ipapi.co/json")
								    .then(res 	=> res.json())
								    .then(data 	=> callback(data.country_code))
								    .catch(() 	=> callback("mx"));
								},
							   	placeholderNumberType: 'FIXED_LINE',
							   	separateDialCode:true,
							  	utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
							});
						}
					}

					$("#name_userUp").focus();

					//MODIFICAR INFORMACION
					$submit1.on('click', function(ev){
						ev.preventDefault();
						var validated_submit1 = $('#'+id_submit1).valid();
						if(validated_submit1){
							par1 		= $('#'+id_submit1).attr('data-id');

							if(par1 > 0){
								//OBTENER LADAS
								var lada_telephone_user 	= $('.telephone_user .iti__selected-dial-code').text(),
									lada_cell_phone_user 	= $('.cell_phone_user .iti__selected-dial-code').text(),
									formData				= new FormData(document.getElementById(id_submit1));

									formData.append("lada_telephone_user", lada_telephone_user);
									formData.append("lada_cell_phone_user", lada_cell_phone_user);
									formData.append("par1", par1);

								$.ajax({
									type: "POST",
									url:  url_admin+"/upd-inf-u",
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
															before_init: function(){
																$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
																$("#rfc_user").css("border-color","#ced4da");
																$("#curp_user").css("border-color","#ced4da");

																//focus
	                                                                //0 = Sin efecto
	                                                                //1 = Focus en input de email
	                                                                //2 = Focus en input de contraseña
	                                                                //3 = Focus en input de RFC
	                                                                //4 = Focus en input de CURP

	                                                            if(response.focus == 3){
	                                                                $("#rfc_user").css("border-color","#d2322d");
	                                                            }
	                                                            if(response.focus == 4){
	                                                                $("#curp_user").css("border-color","#d2322d");
	                                                            }
															},
															before_close: function(PNotify){
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
					//MODIFICAR CORREO
					$submit2.on('click', function(ev){
						ev.preventDefault();
						var validated_submit2 = $('#'+id_submit2).valid();
						if(validated_submit2){
							var par2 		= $('#'+id_submit2).attr('data-id');

							if(par2 > 0){

								var formData = new FormData(document.getElementById(id_submit2));
									formData.append("par1", par2);

								$.ajax({
									type: 'POST',
									url:  url_admin+"/upd-ema-u",
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
										$('#'+id_submit2)[0].reset();
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
												delay: 1000,
												before_close: function(PNotify){
													if(response.redirect == "true")
													{
														window.location.href = url_admin+"/sign-off-back";
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
															before_close: function(PNotify){
																$('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
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
													$('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
												}
											});
										}
									}
								});
							}else{
									new PNotify({
										title: title_pnotify,
										text: '<?php echo $lang_global["Variables vacías"]; ?>',
										type: 'error',
										before_close: function(PNotify){
											$('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
										}
									});
								 }
						}
					});
					//MODIFICAR CONTRASEÑA
					$submit3.on('click', function(ev){
						ev.preventDefault();
						var validated_submit3 = $('#'+id_submit3).valid();
						if(validated_submit3){

							var par3 		= $('#'+id_submit3).attr('data-id');

							if(par3 > 0){

								var formData = new FormData(document.getElementById(id_submit3));
									formData.append("par1", par3);

								$.ajax({
									type: 'POST',
									url:  url_admin+"/upd-psw-u",
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
										$('#'+id_submit3 + " button[type=submit]").attr("disabled","disabled");
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
													$('#'+id_submit3)[0].reset();
												},
												before_close: function(PNotify){
											  		if(response.redirect == "true")
													{
														window.location.href = url_admin+"/sign-off-back";
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
															before_close: function(PNotify){
																$('#'+id_submit3 + " button[type=submit]").removeAttr('disabled');
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
													$('#'+id_submit3 + " button[type=submit]").removeAttr('disabled');
												}
											});
										}
									}
								});
							}
						}
					});
					//REGISTRAR RED SOCIAL AL USUARIO
					$submit4.on('click', function(ev){
						ev.preventDefault();
						var validated_submit4 = $('#'+id_submit4).valid();
						if(validated_submit4){
							var par4 		= $('#'+id_submit4).attr('data-id');

							if(par4 > 0){

								var formData = new FormData(document.getElementById(id_submit4));
									formData.append("par1", par4);

								$.ajax({
									type: 'POST',
									url:  url_admin+"/new-reg-only-soc-net-to-u",
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
										$('#'+id_submit4)[0].reset();
										$('#'+id_submit4 + " button[type=submit]").attr("disabled","disabled");
									},
									success:function(response)
									{
										if(response.estado == "true")
										{
											if(response.datetable == "true")
											{
												new PNotify({
													title: title_pnotify,
													text: response.resultado,
													type: 'success',
													delay: 1000,
													before_init: function()
													{
														//HABILITO BTN ENVIAR
														$('#'+id_submit4 + " button[type=submit]").removeAttr('disabled');
														/*var trs = $("#datatable-social-network-user tr").length;

														if(trs > 0)
											            {
											            	var tds=$("#datatable-social-network-user tbody tr:first td").length;

												            var nuevaFila = '<tr id="item-user_social_media-'+ response.id_user_social_media +'" role="row">';
													            	nuevaFila+= "<td class='sorting_1'>"+ response.id_user_social_media +"</td>";
													            	nuevaFila+= "<td>"+ response.icon_social_media +"</td>";
													            	nuevaFila+= "<td>"+ response.url_user_social_media +"</td>";
													            	nuevaFila+= '<td class="text-center"><a class="modal-with-zoom-anim modal-update-specific-table" data-toggle="tooltip" title="<?php echo $lang_global['Modificar']; ?>" href="#modal-update-information-user-social-media-'+ response.id_user_social_media +'" data-form="update-information-user-social-media-'+ response.id_user_social_media +'"><i class="fas fa-pencil-alt c-gris-oscuro me-3" style="font-size:20px;"></i></a><a class="modal-with-zoom-anim modal-delete-with-4-parameters" data-toggle="tooltip" title="<?php echo $lang_global['Eliminar'].' '.$lang_global['Red Social']; ?>" href="#modal-delete-with-4-parameters" data-delete-with-4-parameters="'+ response.id_user_social_media +'/'+ response.name + '/' + '/1/item-user_social_media-"><i class="fas fa-trash c-gris-oscuro" style="font-size:20px;"></i></a></td>';
												            	nuevaFila+="</tr>";
												            $("#datatable-social-network-user").append(nuevaFila);
					            							$('#datatable-social-network-user tbody tr:last').hide().fadeIn('slow');
											            }else{*/
											            		window.location.href = "<?php echo $link; ?>";
											            	 //}
													},
													before_close: function(PNotify){

													}
												});
											}else{
													new PNotify({
														title: title_pnotify,
														text: response.resultado,
														type: 'success',
														delay: 1000,
														before_init: function()
														{
															$('#'+id_submit4 + " button[type=submit]").removeAttr('disabled');
														}
													});
												 }
										}else{
												if(response.sin_sesion == "true"){
				                                    window.location.href = url_front+"iniciar-sesion";
				                                }else{
				                                		new PNotify({
															title: title_pnotify,
															text: response.error,
															type: 'error',
															before_init: function()
															{
																$('#'+id_submit4 + " button[type=submit]").removeAttr('disabled');
															},
															before_close: function(PNotify){
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
													$('#'+id_submit4 + " button[type=submit]").removeAttr('disabled');
												}
											});
										}
									}
								});
							}else{
									new PNotify({
										title: title_pnotify,
										text: '<?php echo $lang_global["Variables vacías"]; ?>',
										type: 'error',
										before_close: function(PNotify){
											$('#'+id_submit4 + " button[type=submit]").removeAttr('disabled');
										}
									});
								 }
						}
					});
					//SUBIR IMAGEN DE PERFIL
					$('#fileUserProfilePicture').on('change', function(ev) {
						ev.preventDefault();
						var validated_submt5 = $('#'+id_submit5).valid();
						if(validated_submt5){
							par1 		= $('#'+id_submit5).attr('data-id');

							if(par1 > 0)
							{
								if($("#fileUserProfilePicture").val().length < 5)
								{
									new PNotify({
										title: title_pnotify,
										text: "<?php echo $lang_global['Validacion upload imagen 5']; ?>",
										type: 'info'
									});
								}else{
										var archivo 	= $("#fileUserProfilePicture").val();
							    		var extensiones = archivo.substring(archivo.lastIndexOf("."));

										if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png")
										{
										    new PNotify({
												title: title_pnotify,
												text: "<?php echo $lang_global['Validacion upload imagen 2']; ?>JPG, JPEG y PNG.",
												type: 'info'
											});
										}else{
												var formData = new FormData(document.getElementById(id_submit5));

												formData.append('par1',par1);

												$.ajax({
													type: "POST",
													url:  url_admin+"/upl-u-pro-pi-b",
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
														$("#"+id_submit5)[0].reset();
														clearProgressBar("#"+id_tab);

														if(response.image_ajax == "false"){
														}else{
																clearProgressBar("#"+id_tab);
																$(".thumb-info img").attr("src", response.image_ajax);
															 }
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
											    }).fail(function(){
											    	new PNotify({
														title: title_pnotify,
														text: "<?php echo $lang_global['Problemas al ejecutar consulta']; ?>",
														type: 'error',
														before_init: function(){
															$("#"+id_submit5)[0].reset();
															clearProgressBar("#"+id_tab);
													    }
													});
												});
											 }
									 }
							}else{
									new PNotify({
										title: title_pnotify,
										text: '<?php echo $lang_global["Variables vacías"]; ?>',
										type: 'error',
										before_close: function(PNotify){
											$('#'+id_submit5 + " button[type=submit]").removeAttr('disabled');
										}
									});
								 }
						}
					});
					//FORMULARIO SUBIR IMAGENES DE FORMA MASIVA CON PARAMETRO
					Dropzone.options.dropzoneGalleryUser = {
						paramName: 			"file",
						maxFiles: 			6,
						maxFilesize: 		2,//MB
	     				acceptedFiles: 		".jpeg,.jpg,.png", // Allowed extensions
	     				params: 			{'par1':<?php echo $id_user; ?>},
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
				}).apply(this, [jQuery]);
			</script>
		</body>
	</html>