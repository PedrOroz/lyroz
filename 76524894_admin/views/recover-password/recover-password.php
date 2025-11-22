<?php
	if(!isset($_SESSION)){
		require_once('./core/models/cfg/seguridad.php');
		sec_session_start();
	}
	// Destruir todas las variables de sesión.
	$_SESSION = array();

	// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
	// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Finalmente, destruir la sesión.
	session_destroy();
	$link 		= URL_CARPETA_ADMIN."/recover-password";
	$title 		= "Recuperar contraseña";
	$id_page 	= 0;
	require_once('./templates/head.php');
	require_once('./languages/'.langController::prefixLangDefault("logIn"));
	require_once('./languages/'.langController::prefixLangDefault("global")); ?>
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
            	title_pnotify 	= "<?php echo $lang_login['Recuperar contraseña']; ?>",
            	id_page 		= <?php echo $id_page; ?>,
            	fullLink 		= "<?php echo $link; ?>";
        </script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign logIn">
			<div class="center-sign">

				<div class="panel card-sign">
					<div class="card-body">
						<div class="alert alert-info px-2">
							<p class="m-0"><?php echo $lang_login["Instructiones recuperar contraseña"]; ?></p>
						</div>
						<form id="recover-password" class="form-horizontal" method="post" action="/">
							<div class="form-group">
								<input type="email" id="email_user" class="form-control" name="email_user" placeholder="<?php echo $lang_login["email"]; ?>" value="" data-plugin-maxlength maxlength="50" autocomplete="off" required=""/>
							</div>
							<div class="mt-3 mb-4">
								<button type="submit" class="btn-login w-100"><?php echo $lang_login["Envíar"]; ?></button>
							</div>
						</form>
						<p class="text-center mb-4">
							<a href="<?php echo URL_CARPETA_FRONT ?>iniciar-sesion"><?php echo $lang_login["Iniciar sesión"]; ?></a>
						</p>
						<img src="<?php echo URL_CARPETA_ADMIN ?>/img/logo-empresa.png" class="mx-auto d-block" height="30" alt="Logo <?php echo WEBSITE_CMS; ?>">
						<p class="text-center text-muted my-2"><?php echo $lang_login["Administrador de"].' '.WEBSITE_CMS.' '.$lang_login["versión"]; ?></p>
					</div>
				</div>
			</div>
		</section>
		<!-- end: page -->

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
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo URL_CARPETA_ADMIN ?>/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo URL_CARPETA_ADMIN ?>/js/theme.init.js"></script>
		<script>
			(function($) {
				'use strict';

				$("#email_user").focus();

				let id_submit1 		= "#recover-password",
					button1 		= "button[type=submit]",
					$submit1 		= $(id_submit1).find(button1);

				$submit1.on('click', function(ev){
					ev.preventDefault();
					var validated_submit1 = $(id_submit1).valid();
					if(validated_submit1){
						$.ajax({
							type: "POST",
							url:  url_admin+'/recover-psw-by-ema-u',
							data: $(id_submit1).serialize(),
							cache: false,
							beforeSend:function(){
								$("#email_user").css("border-color","#ced4da");
								//INHABILITAR BTN ENVIAR
								$(id_submit1 + " button[type=submit]").attr("disabled","disabled");
							},
							success:function(response)
							{
								if(response.estado == "true")
								{
									new PNotify({
										title: title_pnotify,
										text: response.resultado,
										type: 'info',
										delay: 9000,
										before_init: function(){
											//HABILITAR BTN ENVIAR
			                                $(id_submit1 + " button[type=submit]").removeAttr('disabled');
			                                //RESETEAR FORM
											$(id_submit1)[0].reset();
										},
										before_close: function(PNotify){
											if(response.redirect == 'true'){
												window.location.href = url_front+'iniciar-sesion';
											}
										}
									});
								}else{
										if(response.focus){
			                                //focus
			                                    //0 = Sin efecto
			                                    //1 = Focus en input de email
			                                    
			                                if(response.focus == 1){
			                                   $("#email_user").css("border-color","#d2322d");
			                                }
			                            }
			                    		new PNotify({
			                                title: title_pnotify,
			                                text: response.error,
			                                type: 'error',
			                                before_init: function()
			                                {
			                                	//HABILITAR BTN ENVIAR
			                                	$(id_submit1 + " button[type=submit]").removeAttr('disabled');
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
										type: 'error'
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