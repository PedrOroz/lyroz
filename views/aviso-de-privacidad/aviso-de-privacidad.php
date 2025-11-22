<?php
	$title 				= "Aviso de privacidad";
	$description 		= "Iridizen";
	$key 				= "Iridizen";
	$adsBot_google 		= "index, follow";
	$url 				= "aviso-de-privacidad";
	$url_mobil 			= 'aviso-de-privacidad';
	$link 				= (defined('URL') ? URL : URL_CARPETA_FRONT).$url;
	$id 				= 10;
	$id_form 			= "";
	$og_updated_time 	= "";
	$og_type 			= "website";//website o article
	$og_image 			= "img/logo-head.png";
	$og_image_type 		= "image/png";
	$og_image_width 	= "300";
	$og_image_height 	= "300";
	$bar_wrapper 		= "bg-azul-1";
	$bar_wrapper_before = "azul-2";
	$type_of_href_nav   = 2;//(#)Ancla = 1 / (URL)Redireccionar = 2

	require_once (TEMPLATES_HEAD); ?>
		<link rel="preload stylesheet" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>css/app.css" as="style" type="text/css" crossorigin="anonymous">
	</head>

	<?php require_once (TEMPLATES_PRELOADER); ?>

	<body id="privacynoticepage">

		<?php require_once (TEMPLATES_API_FACEBOOK); ?>

		<?php require_once (TEMPLATES_HEADER); ?>

		<main>
			<section id="aviso-1">
				<div class="container">
					<div class="row">
						<div class="mx-auto col-11 col-sm-12 col-md-10 col-xl-9 col-xxl-8">
							<div class="box">
								<div class="box-title">
									<h1 class="c-naranja-1 fw-bold display-4 text-center mb-4 mb-md-5">Aviso de privacidad</h1>
								</div>
								<div class="box-content">
									<p class="c-negro-1">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae lectus leo. Nullam at eros aliquet, porttitor purus et, luctus dui. Nulla eget magna vel ipsum consequat feugiat et et metus. Aliquam lacus enim, dictum eu tortor sed, faucibus tristique nisi. Cras venenatis felis eget ex placerat, id pellentesque elit pretium. Ut convallis turpis vitae arcu egestas lobortis. Quisque venenatis molestie libero, quis hendrerit erat varius et.
									</p>
									<p class="c-negro-1">
										Donec nec metus ac enim convallis laoreet vitae id ex. Curabitur congue consectetur dapibus. Aenean in ex pharetra, facilisis ex sit amet, blandit arcu. Suspendisse lobortis rhoncus tempus. Morbi a convallis nisi, a porta elit. Nunc pellentesque, libero et pharetra porta, ligula dui suscipit augue, et posuere neque augue non nisl. Phasellus iaculis nisl sit amet elit luctus, vel faucibus orci tincidunt. Fusce consequat, diam vel eleifend consectetur, mauris ipsum sollicitudin urna, dignissim maximus mauris tellus vehicula orci. Vivamus ornare felis eros, nec eleifend nisl volutpat vitae. Suspendisse vel eleifend eros.
									</p>
									<p class="c-negro-1">
										In semper aliquet diam ut vestibulum. Pellentesque sagittis malesuada massa, non pharetra nunc fringilla ac. Vestibulum quis gravida neque. Mauris vel scelerisque orci, vel maximus lectus. Suspendisse vitae velit augue. Vivamus dapibus enim in leo varius, vel pretium tortor dapibus. Quisque vitae tristique neque. Proin convallis nulla ac blandit interdum.
									</p>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

   		<?php require_once (TEMPLATES_FOOTER); ?>

   		<?php require_once ('templates/canal-atencion.php'); ?>

	</body>
</html>