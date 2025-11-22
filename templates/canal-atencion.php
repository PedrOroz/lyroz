<div class="bottomBarWrapper position-fixed <?php echo $bar_wrapper; ?>">
	<div class="bottomBarContent">
		<p class="bottomBarTitle <?php echo $bar_wrapper_before; ?> d-none d-md-flex">
			<span class="bottomBarTitleContent">NUESTROS CANALES <span class="d-block d-xl-inline">DE ATENCIÓN</span></span>
		</p>
		<button type="button" class="button__fqhlI" id="tel-button" data-bs-toggle="modal" data-bs-target="#BarModal">
			<span class="d-none d-sm-inline">
				<i class="fa-solid fa-phone"></i>
			</span>
			<div class="buttonContent">
				<span>ATENCIÓN<span class="d-sm-none"> POR</span></span>
				<p id="bottom-bar-by-phone"><span class="d-none d-sm-inline">POR </span>TELÉFONO</p>
			</div>
		</button>
		<a class="button__fqhlI" id="mail-button" href="mailto:<?php echo CORREO_CONTACTO; ?>" target="_blank" rel="noopener" role="button">
			<span class="d-none d-sm-inline">
				<i class="fa-regular fa-envelope"></i>
			</span>
			<div class="buttonContent">
				<span>ATENCIÓN<span class="d-sm-none"> POR</span></span>
				<p id="bottom-bar-by-email"><span class="d-none d-sm-inline">POR </span>EMAIL</p>
			</div>
		</a>
		<div class="button__fqhlI">
			<div class="buttonContent">
				<span>SIGUENOS<span class="d-sm-none"> POR</span></span>
				<div class="buttonContentSocialMedia">
					<a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Facebook" role="link" aria-live="true" aria-label="Facebook" href="<?php echo URL_FACEBOOK; ?>" target="_blank" class="c-gris-2 h-c-azul-3 me-1">
						<i class="fa-brands fa-facebook fa-fw fa-lg"></i>
					</a>
					<a data-bs-toggle="tooltip" data-bs-title="Instagram" role="link" aria-live="true" aria-label="Instagram" href="<?php echo URL_INSTAGRAM; ?>" target="_blank" class="c-gris-2 h-c-naranja-2 me-1">
						<i class="fa-brands fa-instagram fa-fw fa-lg"></i>
					</a>
					<a data-bs-toggle="tooltip" data-bs-title="Tiktok" role="link" aria-live="true" aria-label="Tiktok" href="<?php echo URL_TIKTOK; ?>" target="_blank" class="c-gris-2 h-c-negro me-1">
						<i class="fa-brands fa-tiktok fa-fw fa-lg"></i>
					</a>
					<a data-bs-toggle="tooltip" data-bs-title="Twitter" role="link" aria-live="true" aria-label="Twitter" href="<?php echo URL_TWITTER; ?>" target="_blank" class="c-gris-2 h-c-azul-4 me-1">
						<i class="fa-brands fa-twitter fa-fw fa-lg"></i>
					</a>
					<a data-bs-toggle="tooltip" data-bs-title="Compartir en Whatsapp" role="link" aria-live="true" aria-label="Compartir en Whatsapp" href="<?php echo URL_SHARE_WHATSAPP; ?>" target="_blank" class="c-gris-2 h-c-verde-2">
						<i class="fa-brands fa-whatsapp fa-fw fa-lg"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="BarModal" tabindex="-1" aria-labelledby="BarModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="BarModalLabel">Llámanos</h5>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body text-center">
	      		<a class="button__fqhlI c-negro-1 h-c-naranja-1 text-decoration-none" href="tel:+" rel="noreferrer noopener" role="button">
	      			<i class="fa-solid fa-phone fa-fw"></i>
	      			(+52) 33 2031 6389
	      		</a>
	        	<p class="c-negro-1 mt-3 mb-0">De lunes a viernes de 9:00 as 18:00hs (excepto festivos)</p>
	      	</div>
	    </div>
	</div>
</div>