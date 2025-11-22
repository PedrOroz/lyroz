<?php echo($id == 9 || $id == 12 ? '<a href="'.URL_WHATSAPP.'" class="btn-whatsapp-pulse" target="_blank"><i class="fab fa-whatsapp"></i></a>' : ''); ?>
<footer>
	<div class="container text-center">
		<?php require(TEMPLATES_SOCIAL); ?>
		<div class="mc-copy mt-3">
			<p><?php echo (defined('COPYRIGHT') ? COPYRIGHT : COPYRIGHT_CMS).' '.WEBSITE; ?></p>
		</div>
	</div>
</footer>