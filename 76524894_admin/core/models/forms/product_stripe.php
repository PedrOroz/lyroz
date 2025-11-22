<?php
  echo('<div class="form-group">
			<label class="f-medium c-negro" for="id_stripe_'.(isset($datos['id_product_stripe']) && !empty($datos['id_product_stripe']) ? $datos['id_product_stripe'] : 0).'"><span class="required">*</span> ID</label>
			<select 
				id="id_stripe_'.(isset($datos['id_product_stripe']) && !empty($datos['id_product_stripe']) ? $datos['id_product_stripe'] : 0).'" 
				class="form-control populate"
				name="id_stripe" 
				data-plugin-selectTwo 
				required>');
  										//$id_lang,$id_stripe_selected
				stripeDao::showStripeList((isset($id_lang_basic_product_settings) && !empty($id_lang_basic_product_settings) ? $id_lang_basic_product_settings : $id_lang),(isset($datos['id_stripe']) && !empty($datos['id_stripe']) ? $datos['id_stripe'] : NULL));
	  echo('</select>
		</div>
		<div class="form-group">
			<label class="f-medium c-negro" for="value_product_stripe_'.(isset($datos['id_product_stripe']) && !empty($datos['id_product_stripe']) ? $datos['id_product_stripe'] : 0).'"><span class="required">*</span> '.$lang_global["Valor"].'</label>
			<input 
				type="text" 
				id="value_product_stripe_'.(isset($datos['id_product_stripe']) && !empty($datos['id_product_stripe']) ? $datos['id_product_stripe'] : 0).'" 
				class="form-control" 
				data-plugin-maxlength maxlength="200" 
				name="value_product_stripe" 
				value="'.(isset($datos['value_product_stripe']) && !empty($datos['value_product_stripe']) ? stripslashes($datos['value_product_stripe']) : '').'" 
				required>
		</div>
		<div class="form-group text-center">
			<button type="submit" class="btn btn-dark">'.(isset($datos['id_product_stripe']) && !empty($datos['id_product_stripe']) ? $lang_global["Modificar"] : $lang_global["Registrar"]).'</button>
			'.(isset($datos['id_product_stripe']) && !empty($datos['id_product_stripe']) ? '<button class="btn btn-default modal-dismiss">'.$lang_global["Cancelar"].'</button>' : '').'
		</div>');