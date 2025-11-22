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

	$link 				= URL_CARPETA_ADMIN."/configurations-users";
	$title 				= $lang_global["Usuarios"];
	$page 				= $lang_global["Configuraciones"];
	$id_type_section 	= 1;
	$id_page 			= $id_type_section;

	require_once('./templates/head.php'); ?>

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.css" />
		<link rel="stylesheet" href="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/css/dataTables.bootstrap5.css" />
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/css/intlTelInput.css'>

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
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="tabs-modern row" style="min-height: 490px;">
											<div class="col-lg-1-5 bg-gris">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="createAccount-tab" data-bs-toggle="pill" data-bs-target="#createAccount" href="#createAccount" role="tab" aria-controls="createAccount" aria-selected="true"><?php echo $lang_global["Crear cuenta"]; ?>
										      		</a>
										      		<a class="nav-link" id="registeredAccounts-tab" data-bs-toggle="pill" data-bs-target="#registeredAccounts" href="#registeredAccounts" role="tab" aria-controls="registeredAccounts" aria-selected="false"><?php echo $lang_global["Cuentas registradas"]; ?>
										      		</a>
										    	</div>
											</div>
											<div class="col-lg-4-5 col-xl-4-5">
												<div class="tab-content" id="tabContent">
										      		<div class="tab-pane fade show active" id="createAccount" role="tabpanel" aria-labelledby="createAccount-tab">
										      			<?php userController::showFormCreateAccount(); ?>
										      		</div>
										      		<div class="tab-pane fade" id="registeredAccounts" role="tabpanel" aria-labelledby="registeredAccounts-tab">
										      			<?php userController::showRegisteredAccounts(); ?>
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
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/common/common.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/nanoscroller/nanoscroller.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

			<!-- Specific Page Vendor -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-ui/jquery-ui.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-appear/jquery.appear.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/select2/js/select2.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/fuelux/js/spinner.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/ios7-switch/ios7-switch.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/summernote/summernote-lite.js"></script>

			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>
			
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>

			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
			<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
			
			<!-- Theme Base, Components and Settings -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

			<!-- Theme Custom -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

			<!-- Theme Initialization Files -->
			<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
			<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwYneEwpS-vj0Df0llLDOvXEPsq1HD534&callback=initAutocomplete&libraries=places"></script>
			<script src='https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/intlTelInput.js'></script>
			<script>
				(function($) {
					'use strict';
				<?php
					require_once('./core/helps/help.php');
					//TABLA CON HERRAMIENTAS DE DESCARGA
									//$datatable_id,$function_name
					datetable_tools('datatable-user','datatableUserTableTools');
					//SCRIPT ANIMACION MODAL
					modalWithZoomAnim();
					//SCRIPT POP UP IMAGE
					imagePopupNoMargins();
					//SUMMERNOTE
										//$height,$url_carpeta_admin
					summernoteSaveFiles(300,URL_CARPETA_ADMIN);
					//PLUGIN SWITCH
					formIosSwitch(URL_CARPETA_ADMIN);
					/**** ELIMINAR GENERAL ****/
						//MODAL ELIMINAR GENERAL
											//$form_name
						modalRemoveGeneral('modal-remove-general');
						//FORMULARIO ELIMINAR GENERAL
											//$title,$id_item,$url_carpeta_admin,$form_id,$redirect
						formRemoveGeneral($lang_global['Configuraciones'],'item-user-',URL_CARPETA_ADMIN,'form#remove-general',0);
						//BORRAR DATOS DEL FORMULARIO ELIMINAR GENERAL AL DAR CLIK AL BOTON CANCELAR DEL MODAL
											//$form_name,$data_name
						deleteDataFromTheForm('modal-remove-general','data-modal-remove-general');
					/**** END ELIMINAR GENERAL ****/ ?>					
					let par1			= <?php echo $id_type_section; ?>,
						id_tab 			= 'createAccount',
						id_submit1 		= "registerUser",
						$submit1 		= $('#'+id_submit1).find('button[type=submit]');

					if($("#telephone_user").length || $("#cell_phone_user").length) {
						
						if($("#telephone_user").length) {
							const telephone 	= document.querySelector("#telephone_user");

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
							  	utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
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
							   	placeholderNumberType: 'MOBILE',
							   	separateDialCode:true,
							  	utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
							});
						}
					}

					$("#id_role").focus();

					//REGISTRAR USUARIO DESDE CMS
					$submit1.on('click', function(ev){
						ev.preventDefault();
						var validated_submit1 = $('#'+id_submit1).valid();
						if(validated_submit1){
							//OBTENER LADAS
							var lada_telephone_user 	= $('.telephone_user .iti__selected-dial-code').text(),
								lada_cell_phone_user 	= $('.cell_phone_user .iti__selected-dial-code').text(),
								form_data				= new FormData(document.getElementById(id_submit1));

								form_data.append("lada_telephone_user", lada_telephone_user);
								form_data.append("lada_cell_phone_user", lada_cell_phone_user);

							$.ajax({
								type: "POST",
								url:  url_admin+"/new-reg-u",
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
									$("#emailConfirmation, #password2").css("border-color","#ced4da");
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
											before_init: function(){
												$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
												$('#'+id_submit1)[0].reset();
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
															$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
															$("#emailConfirmation").css("border-color","#ced4da");
															$("#password2").css("border-color","#ced4da");
															$("#rfc_user").css("border-color","#ced4da");
															$("#curp_user").css("border-color","#ced4da");
															
															//focus
                                                                //0 = Sin efecto
                                                                //1 = Focus en input de email
                                                                //2 = Focus en input de contraseña
                                                                //3 = Focus en input de RFC
                                                                //4 = Focus en input de CURP
                                                                
                                                            if(response.focus == 1){
                                                                $("#emailConfirmation").css("border-color","#d2322d");
                                                            }
                                                            if(response.focus == 2){
                                                                $("#password2").css("border-color","#d2322d");
                                                            }
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
											before_init: function(){
												$('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
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