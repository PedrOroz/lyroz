<?php
	if(!isset($_SESSION)){
		require_once('./76524894_admin/core/models/cfg/seguridad.php');
		sec_session_start();
	}
	require_once('./76524894_admin/core/controllers/functions/slidersController.php');
	require_once('./76524894_admin/core/controllers/functions/productsController.php');

	$title 				= "Inicio";
	$description 		= "";
	$key 				= "";
	$adsBot_google 		= "index, follow";
	$url 				= "";
	$url_mobil 			= "inicio-movil";
	$link 				= (defined('URL') ? URL : URL_CARPETA_FRONT).$url;
	$id 				= 1;
	$id_form 			= "home";
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
		<link rel="preload stylesheet" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>css/home.css" as="style" type="text/css" crossorigin="anonymous">
		<style>

	/* == LETS MODIFY SOME COLORS AND STYLE FOR THE DEMO == */

		/* Style the search text field and the sort */
		.media-boxes-search, .media-boxes-sort{
  			float: right;
  		}
  		.media-boxes-search{
  			margin-left: 10px;
  		}

		/* Remove the margin-bottom of the text */
		.media-box-content .media-box-text{
			margin-bottom: 0 !important;
		}

		/* Footer style */
		.media-box-footer{
			-webkit-box-shadow: inset 0 5px 5px -5px rgba(0,0,0,0.1);
			   -moz-box-shadow: inset 0 5px 5px -5px rgba(0,0,0,0.1);
			        box-shadow: inset 0 5px 5px -5px rgba(0,0,0,0.1);
		}
		.media-box-categories{
			margin: 0;
			font-size: 11px;
			color: #777;
		}
		.media-box-date{
			margin-bottom: 8px;
		}

		/* Style of date */
		.media-box-date{
			font-size: 11px;
		    color: #999;
		    margin: 3px 0 0 0;
		}

	</style>
	</head>

	<body id="homePage">

		<?php require_once (TEMPLATES_HEADER); ?>

		<main>
			<?php
                //$id_menu
                    //$id
                        //1 = Inicio
                        //2 = Nosotros
                        //3 = Servicios
                        //4 = Proyectos
                        //5 = Contacto
                        //6 = Productos
                        //7 = Blog
                //$id_type_image
                    //6 = Slider
                //$view
                    //$id
                        //1 = Inicio
                //$div_js
                    //1 = Carousel Bootstrap
                    	//$nameCarrousel
                    		//ID Carousel Bootstrap
                    	//$color
                    		//Hexadecimal dots
                    //2 = Owl
                    //3 = Col- Bootstrap
                    //4 = Slick

                //$height
                    //Altura slider
                //$fondo
                    //hexadecimal slider
                //$position_txt_slider
                    //Top
                    //Center
                    //Botton
                    //None
                                            //$id_lang,$id_menu,$id_type_image,$view,$div_js,$nameCarrousel,$color,$height,$fondo,$position_txt_slider
                slidersController::showCarouselSliderByPage($id_lang,$id,6,$id,1,"carouselHome",'','vh-85','','None'); ?>

			<section id="our-products" class="py-5">
				<div class="container">

					<?php 										//$id_lang
						productsController::showAllActiveProducts($id_lang); ?>

				</div>
			</section>

			<section id="featured-3" class="px-4 py-5">
				<div class="container">
					<h2 class="c-azul-5 fw-bold pb-2 border-bottom"><?php echo LANG_NOSOTROS; ?></h2>
					<div class="row g-5 py-5 row-cols-1 row-cols-lg-2">
						<div class="feature col">
							<div class="feature-icon d-inline-flex align-items-center justify-content-center">
								<span class="fa-stack fa-2x fa-bounce">
									<i class="fa-solid fa-square fa-stack-2x"></i>
									<i class="fa-solid fa-recycle fa-stack-1x fa-inverse"></i>
								</span>
							</div>
							<h3 class="text-body-secondary fs-3 mt-4 mb-3"><?php echo LANG_MISION; ?></h3>
							<p class="lead"><?php echo LANG_MISION_DESCRIPCION; ?></p>
						</div>
						<div class="feature col">
							<div class="feature-icon d-inline-flex align-items-center justify-content-center">
								<span class="fa-stack fa-2x fa-bounce">
									<i class="fa-solid fa-square fa-stack-2x"></i>
									<i class="fa-solid fa-motorcycle fa-stack-1x fa-inverse"></i>
								</span>
							</div>
							<h3 class="text-body-secondary fs-3 mt-4 mb-3"><?php echo LANG_VISION; ?></h3>
							<p class="lead"><?php echo LANG_VISION_DESCRIPCION; ?></p>
						</div>
					</div>
				</div>
			</section>

			<section>
				<hr class="featurette-divider">
				<div class="container">
					<div class="row g-5 featurette">
						<div class="col-md-7">
							<h2 class="featurette-heading fw-normal lh-1 mb-4"><?php echo LANG_QUIENES_SOMOS; ?></h2>
							<p class="lead"><?php echo LANG_QUIENES_SOMOS_DESCRIPCION_1; ?></p>
						</div>
						<div class="col-md-5">
							<img
								src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/quienes-somos-1.jpg"
								data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/quienes-somos-1.jpg"
								data-sizes="auto"
								class="lazyload img-fluid rounded-5"
								width=""
								height=""
								alt="">
						</div>
					</div>
				</div>
				<hr class="featurette-divider">
				<div class="container">
					<div class="row g-5 featurette">
						<div class="col-md-7 order-md-2">
							<h2 class="featurette-heading fw-normal lh-1 mb-4"><?php echo LANG_PORQUE_ELEGIRNOS; ?></h2>
							<p class="lead"><?php echo LANG_QUIENES_SOMOS_DESCRIPCION_2; ?></p>
						</div>
						<div class="col-md-5 order-md-1">
							<img
								src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/quienes-somos-2.jpg"
								data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/quienes-somos-2.jpg"
								data-sizes="auto"
								class="lazyload img-fluid rounded-5"
								width=""
								height=""
								alt="">
						</div>
					</div>
				</div>
				<hr class="featurette-divider">
				<div class="container">
					<div class="row g-5 featurette">
						<div class="col-md-7">
							<h2 class="featurette-heading fw-normal lh-1 mb-4"><?php echo LANG_PILARES_FUNDAMENTALES; ?></h2>
							<p class="lead"><?php echo LANG_QUIENES_SOMOS_DESCRIPCION_3; ?></p>
						</div>
						<div class="col-md-5">
							<img
								src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/quienes-somos-3.jpg"
								data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/quienes-somos-3.jpg"
								data-sizes="auto"
								class="lazyload img-fluid rounded-5"
								width=""
								height=""
								alt="">
						</div>
					</div>
				</div>
			</section>

			<section id="custom-cards" class="px-4 py-5">
				<div class="container">
					<h2 class="c-azul-5 fw-bold pb-2 border-bottom"><?php echo LANG_HUELLA_CARBONO; ?></h2>

					<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
						<div class="col">
							<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/huella-carbono-1.jpg');">
								<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
									<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_1; ?></h3>
									<ul class="d-flex list-unstyled mt-auto">
										<li class="me-auto">
											<img
												src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/brain-svgrepo-com.svg"
												data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/brain-svgrepo-com.svg"
												data-sizes="auto"
												alt=""
												width="32"
												height="32"
												class="lazyload rounded-circle border border-white">
										</li>
										<li class="d-flex align-items-center me-3">
											<svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Location"><use xlink:href="#geo-fill"></use></svg>
											<small><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_1_1; ?></small>
										</li>
										<li class="d-flex align-items-center">
											<svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Duration"><use xlink:href="#calendar3"></use></svg>
											<small><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_1_2; ?></small>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/huella-carbono-2.jpg');">
								<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
									<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_2; ?></h3>
									<ul class="d-flex list-unstyled mt-auto">
										<li class="me-auto">
											<img
													src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/brain-svgrepo-com.svg"
													data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/brain-svgrepo-com.svg"
													data-sizes="auto"
													alt=""
													width="32"
													height="32"
													class="lazyload rounded-circle border border-white">
										</li>
										<li class="d-flex align-items-center me-3">
											<svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Location"><use xlink:href="#geo-fill"></use></svg>
											<small><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_2_1; ?></small>
										</li>
										<li class="d-flex align-items-center">
											<svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Duration"><use xlink:href="#calendar3"></use></svg>
											<small><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_2_2; ?></small>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/huella-carbono-3.jpg');">
								<div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
									<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_3; ?></h3>
									<ul class="d-flex list-unstyled mt-auto">
										<li class="me-auto">
											<img
													src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/brain-svgrepo-com.svg"
													data-src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>img/home/brain-svgrepo-com.svg"
													data-sizes="auto"
													alt=""
													width="32"
													height="32"
													class="lazyload rounded-circle border border-white">
										</li>
										<li class="d-flex align-items-center me-3">
											<svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Location"><use xlink:href="#geo-fill"></use></svg>
											<small><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_3_1; ?></small>
										</li>
										<li class="d-flex align-items-center">
											<svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Duration"><use xlink:href="#calendar3"></use></svg>
											<small><?php echo LANG_HUELLA_CARBONO_DESCRIPCION_3_2; ?></small>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="px-4 py-5">
				<div class="container">
					<h2 class="c-azul-5 fw-bold pb-2 border-bottom"><?php echo LANG_QUE_PODEMOS_HACER; ?></h2>

					<div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
						<div class="col d-flex flex-column align-items-start gap-2">
							<h2 class="featurette-heading fw-normal fs-2 lh-1 mb-4"><?php echo LANG_QUE_PODEMOS_HACER_1; ?></h2>
							<p class="lead"><?php echo LANG_QUE_PODEMOS_HACER_2; ?></p>
							<a href="#" class="btn btn-outline-info"><?php echo LANG_QUE_PODEMOS_HACER_3; ?></a>
						</div>

						<div class="col">
							<div class="row row-cols-1 row-cols-sm-2 g-4">
								<div class="col d-flex flex-column gap-2">
									<div class="feature-icon-small d-inline-flex align-items-center justify-content-center">
										<span class="fa-stack fa-2x">
											<i class="fa-solid fa-square fa-stack-2x"></i>
											<i class="fa-solid fa-fire-flame-simple fa-beat fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<h4 class="text-body-emphasis fs-4 mb-0"><?php echo LANG_QUE_PODEMOS_HACER_4; ?></h4>
									<p class="text-body-secondary"><?php echo LANG_QUE_PODEMOS_HACER_5; ?></p>
								</div>

								<div class="col d-flex flex-column gap-2">
									<div class="feature-icon-small d-inline-flex align-items-center justify-content-center">
										<span class="fa-stack fa-2x">
											<i class="fa-solid fa-square fa-stack-2x"></i>
											<i class="fa-solid fa-hand-holding-heart fa-beat fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<h4 class="text-body-emphasis fs-4 mb-0"><?php echo LANG_QUE_PODEMOS_HACER_6; ?></h4>
									<p class="text-body-secondary"><?php echo LANG_QUE_PODEMOS_HACER_7; ?></p>
								</div>

								<div class="col d-flex flex-column gap-2">
									<div class="feature-icon-small d-inline-flex align-items-center justify-content-center">
										<span class="fa-stack fa-2x">
											<i class="fa-solid fa-square fa-stack-2x"></i>
											<i class="fa-solid fa-tachograph-digital fa-beat fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<h4 class="text-body-emphasis fs-4 mb-0"><?php echo LANG_QUE_PODEMOS_HACER_8; ?></h4>
									<p class="text-body-secondary"><?php echo LANG_QUE_PODEMOS_HACER_9; ?></p>
								</div>

								<div class="col d-flex flex-column gap-2">
									<div class="feature-icon-small d-inline-flex align-items-center justify-content-center">
										<span class="fa-stack fa-2x">
											<i class="fa-solid fa-square fa-stack-2x"></i>
											<i class="fa-solid fa-dumbbell fa-beat fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<h4 class="text-body-emphasis fs-4 mb-0"><?php echo LANG_QUE_PODEMOS_HACER_10; ?></h4>
									<p class="text-body-secondary"><?php echo LANG_QUE_PODEMOS_HACER_11; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

   		<?php require_once (TEMPLATES_FOOTER); ?>

		<?php require_once ('templates/canal-atencion.php'); ?>

		<script src="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT) ?>js/home.js"></script>
	</body>
</html>