<div id="modal-update-information-with-2-parameters" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide mw-900">
	<form id="update-information-with-2-parameters" class="form-horizontal" data-update-information-with-2-parameters="" autocomplete="off" novalidate="novalidate">
		<section class="card">
			<header class="card-header">
				<h2 class="card-title"><?php echo $lang_global["Modificar imagen"]; ?></h2>
			</header>
			<div class="card-body">
      			<div class="form-group">
					<label class="f-medium c-negro" for="title_file_lang_upd"><span class="required">*</span> <?php echo $lang_global["Título"]; ?></label>
					<input type="text" class="form-control" data-plugin-maxlength maxlength="70" name="title_file_lang_upd" id="title_file_lang_upd" value="" autocomplete="off" required>
				</div>
			</div>
			<footer class="card-footer">
				<div class="row">
					<div class="col-md-12 text-end">
						<button type="submit" class="btn btn-primary"><?php echo $lang_global["Modificar"]; ?></button>
						<button class="btn btn-default modal-dismiss"><?php echo $lang_global["Cancelar"]; ?></button>
					</div>
				</div>
			</footer>
		</section>
	</form>
</div>