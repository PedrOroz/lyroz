<div id="modal-remove-general" class="zoom-anim-dialog modal-block modal-block-danger mfp-hide">
	<form id="remove-general" class="form-horizontal" data-modal-remove-general="" autocomplete="off" novalidate="novalidate">
		<section class="card">
			<header class="card-header">
				<h2 class="card-title"><?php echo $lang_global["Eliminar"]; ?> <span id="modal-title-remove-general"></span></h2>
			</header>
			<div class="card-body">
				<div class="modal-wrapper">
					<div class="modal-icon">
						<i class="fas fa-times-circle"></i>
					</div>
					<div class="modal-text">
						<p class="mb-0"><?php echo $lang_global["Pregunta eliminar"]; ?> <span id="modal-content-remove-general" class="f-medium c-negro"></span>?</p>
					</div>
				</div>
			</div>
			<footer class="card-footer">
				<div class="row">
					<div class="col-md-12 text-end">
						<button type="submit" class="btn btn-primary"><?php echo $lang_global["Eliminar"]; ?></button>
						<button class="btn btn-default modal-dismiss"><?php echo $lang_global["Cancelar"]; ?></button>
					</div>
				</div>
			</footer>
		</section>
	</form>
</div>