<?php
	$title 				= "Contactános";
	$description 		= "";
	$key 				= "";
	$adsBot_google 		= "index, follow";
	$url 				= "contactanos";
	$url_mobil 			= 'contactanos-phone';
	$link 				= (defined('URL') ? URL : URL_CARPETA_FRONT).$url;
	$id 				= 5;
	$id_form 			= "contacto";
	$og_updated_time 	= "";
	$og_type 			= "website";//website o article
	$og_image 			= "img/logo-head.jpg";
	$og_image_type 		= "image/jpeg";
	$og_image_width 	= "300";
	$og_image_height 	= "300";
	$bar_wrapper 		= "bg-azul-1";
	$bar_wrapper_before = "azul-2";
	$type_of_href_nav   = 2;//(#)Ancla = 1 / (URL)Redireccionar = 2

	require_once (TEMPLATES_HEAD); ?>
		<link rel="preload stylesheet" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>css/contact-us.css" as="style" type="text/css" crossorigin="anonymous">
		<!-- Google Recaptcha -->
		<script src="https://google.com/recaptcha/api.js?onload=initRecaptcha&render=explicit"></script>
	</head>

	<?php require_once (TEMPLATES_PRELOADER); ?>

	<body id="contactusPage">

		<?php require_once (TEMPLATES_API_FACEBOOK); ?>

		<?php require_once (TEMPLATES_HEADER); ?>

		<main>
			<section id="contacto-1">
	  			<div class="container">
	  				<div class="box">
	  					<div class="box-title">
							<h2 class="c-azul-5 fw-bold pb-2 border-bottom"><?php echo LANG_CONTACTO; ?></h2>
						</div>
	  					<div class="row">
	  						<div class="mx-auto col-xl-6">
	  							<div class="box-form form-container pt-4">
							      	<form id="<?php echo $id_form; ?>" class="placeholder-dark onyx-gap" name="submit-form" autocomplete="off" novalidate>
							      		<div class="alert alert-danger" role="alert"></div>
										<div class="alert alert-success" role="alert"></div>

										<div class="form-group">
								          	<input
								          		type="text"
								          		id="nombre_contacto"
								          		class="form-control border-info"
								          		name="nombre"
								          		value=""
								          		placeholder="*<?php echo LANG_NOMBRE; ?>"
								          		required>
							          	</div>
							          	<div class="form-group">
								          	<input
								          		type="email"
								          		id="email_contacto"
								          		class="form-control border-info"
								          		name="email"
								          		value=""
								          		placeholder="*<?php echo LANG_EMAIL; ?>"
								          		required>
							          	</div>
							          	<div class="form-group">
								          	<input
								          		type="text"
								          		id="tel_contacto"
								          		class="form-control border-info numeros-sin-punto"
								          		name="tel"
								          		value=""
								          		placeholder="<?php echo LANG_TEL; ?>">
							          	</div>
							      		<div class="form-group">
					      					<textarea
					      						id="mensaje_contacto"
					      						class="form-control border-info"
					      						name="mensaje"
					      						placeholder="*<?php echo LANG_MENSAJE; ?>"
					      						rows="10"
					      						required></textarea>
							          	</div>
										<div class="form-group d-flex align-items-center pt-1 mb-1">
											<input
												type="checkbox"
												id="check1"
												class="form-check-input ms-4 pt-2"
												name="check1"
												value="<?php echo LANG_SI ?>"
												required>
                    						<label class="form-check-label ps-1" for="check1"><?php echo ucfirst(LANG_CHECK1) ?></label>
							          	</div>
							          	<div class="form-group d-flex align-items-center pt-1">
											<input
												type="checkbox"
												id="check2"
												class="form-check-input ms-4 pt-2"
												name="check2"
												value="<?php echo LANG_SI ?>">
                    						<label class="form-check-label ps-1" for="check2"><?php echo ucfirst(LANG_CHECK2_1).' '.WEBSITE.' '.LANG_CHECK2_2 ?></label>
							          	</div>
										<div class="form-group mb-0">
											<div class="recaptcha"></div>
											<input
												type="hidden"
												id="type_of_form_contacto"
												class="form-control c-transparent border-transparent bg-transparent"
												name="type_of_form"
												value="<?php echo $id; ?>"
												readonly="readonly"
												required>
										</div>
										<div class="text-center">
											<button
												type="submit"
												class="btn btn-primary"
												name="submit"><?php echo LANG_ENVIAR; ?></button>
										</div>
								    </form>
								</div>
	  						</div>
	  					</div>
					</div>
				</div>
			</section>
		</main>

   		<?php require_once (TEMPLATES_FOOTER); ?>

   		<?php require_once ('templates/canal-atencion.php'); ?>

  		<script src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT) ?>js/contact-us.js"></script>
  		<script>
			<?php require_once ('./templates/js-form.php'); ?>
		</script>
	</body>
</html>