<div id="modal-update-image" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide mw-900">
	<form id="update-image" class="form-horizontal" data-modal-update-image="" autocomplete="off" novalidate="novalidate">
		<section class="card">
			<header class="card-header">
				<h2 class="card-title"><?php echo $lang_global["Modificar archivo"]; ?></h2>
			</header>
			<div class="card-body">
      			<div class="form-group">
      				<label class="f-medium c-negro d-block text-center mb-0" for="fileInputChangeVersion"><span class="required">*</span> <?php echo $lang_global["Seleccionar archivo"]; ?></label>
      				<small class="d-block text-center c-negro"><?php echo $lang_global["Formatos aceptados: JPG, JPEG, PNG y SVG"]; ?></small>
					<div class="fileupload fileupload-new mt-3" data-provides="fileupload">
						<div class="input-append text-center">
							<div class="uneditable-input">
								<i class="fas fa-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-default btn-file">
								<span class="fileupload-exists"><?php echo $lang_global["Cambiar"]; ?></span>
								<span class="fileupload-new"><?php echo $lang_global["Seleccionar archivo"]; ?></span>
								<input type="file" name="fileInputChangeVersion" id="fileInputChangeVersion" class="form-control" required>
							</span>
							<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload"><?php echo $lang_global["Quitar"]; ?></a>
						</div>
					</div>
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