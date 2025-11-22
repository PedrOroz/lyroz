<div class="scroll-to-top"><i class="fas fa-angle-up fa-xl text-white"></i></div>
<div id="whatsapp-fixed" class="position-fixed">
	<div class="container">
		<a role="link" aria-live="true" aria-label="Chat on WhatsApp" href="<?php echo URL_WHATSAPP; ?>" target="_blank">
			<lottie-player src="<?php echo URL; ?>lottiefiles/90359-whatsapp-icon.json" background="transparent" speed="1" style="width: 95px; height: 95px;" loop autoplay></lottie-player>
		</a>
	</div>
</div>
<footer class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-6 mb-3">
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>" class="nav-link p-0 text-body-secondary"><?php echo LANG_INICIO; ?></a></li>
					<li class="nav-item mb-2"><a href="<?php echo($type_of_href_nav == 1 ? '#contactanos' : (defined('URL') ? URL : URL_CARPETA_FRONT).'contactanos'); ?>" class="nav-link p-0 text-body-secondary"><a href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>" class="nav-link p-0 text-body-secondary"><?php echo LANG_CONTACTANOS; ?></a></a></li>
				</ul>
			</div>

			<div class="col-md-5 offset-md-1 mb-3">
				<form>
					<h5><?php echo LANG_NEWSLETTER_TITLE; ?></h5>
					<p><?php echo LANG_NEWSLETTER_DESCRIPTION; ?></p>
					<div class="d-flex flex-column flex-sm-row w-100 gap-2">
						<label for="newsletter1" class="visually-hidden"><?php echo LANG_EMAIL; ?></label>
						<input id="newsletter1" type="email" class="form-control" placeholder="<?php echo LANG_EMAIL; ?>">
						<button class="btn btn-primary" type="button"><?php echo LANG_SUSCRIBETE; ?></button>
					</div>
				</form>
			</div>
		</div>
		<div class="d-flex flex-column flex-sm-row justify-content-between pt-4 border-top">
			<ul class="nav justify-content-center">
				<li class="nav-item"><p class="nav-link px-2 text-body-secondary mb-0"><?php echo (defined('COPYRIGHT') ? COPYRIGHT : COPYRIGHT_CMS).' '.WEBSITE; ?></p></li>
				<li class="nav-item"><a rel="noopener" href="<?php echo (defined('URL') ? URL : URL_CARPETA_FRONT); ?>aviso-de-privacidad" class="nav-link px-2 text-body-secondary"><?php echo ucfirst(strtolower(LANG_AVISO_DE_PRIVACIDAD)); ?></a></li>
			</ul>
		</div>
	</div>
</footer>