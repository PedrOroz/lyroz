<?php
  echo('<div class="form-group">
					<label class="f-medium c-negro" for="general_price_promotion">'.$lang_global["Precio general"].'</label>
					<div id="general_price_promotion" class="btn btn-xs btn-warning">'.$general_price_product_lang.'</div>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="title_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"><span class="required">*</span> '.$lang_global["Título"].'</label>
					<input 
						type="text" 
						id="title_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
						class="form-control" 
						name="title_product_lang_promotion" 
						data-plugin-maxlength maxlength="70" 
						value="'.(isset($datos['title_product_lang_promotion']) && !empty($datos['title_product_lang_promotion']) ? stripslashes($datos['title_product_lang_promotion']) : '').'"
						required>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="sku_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'">'.strip_tags($lang_global["Código"]).'</label>
					<div class="input-group">
						<span class="input-group-prepend">  
							<span class="input-group-text">
								<i class="fas fa-tag"></i>
							</span>
						</span>
						<input 
							type="text" 
							id="sku_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
							class="form-control" 
							name="sku_product_lang_promotion" 
							data-plugin-maxlength maxlength="30"
							value="'.(isset($datos['sku_product_lang_promotion']) && !empty($datos['sku_product_lang_promotion']) ? stripslashes($datos['sku_product_lang_promotion']) : '').'">
					</div>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="id_type_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"><span class="required">*</span> '.$lang_global["Tipo de descuento"].'</label>
					<select 
						id="id_type_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
						class="form-control populate id_type_promotion" 
						name="id_type_promotion" 
						data-id="'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"
						data-plugin-selectTwo 
						required>');
															//$id_lang,$id_type_promotion_selected
							promotionDao::showPromotionTypeList((isset($id_lang_basic_product_settings) && !empty($id_lang_basic_product_settings) ? $id_lang_basic_product_settings : $id_lang),(isset($datos['id_type_promotion']) && !empty($datos['id_type_promotion']) ? $datos['id_type_promotion'] : NULL));
				echo('</select>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="price_discount_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'">'.$lang_global["Precio con descuento"].'</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text">'.$symbol_type_of_currency_lang.'</span>
						</span>
						<input 
							type="text" 
							id="price_discount_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"
							class="form-control price_discount_product_lang_promotion" 
							name="price_discount_product_lang_promotion" 
							data-id="'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"
							onkeypress="return NumCheck(event, this)" 
							placeholder="'.$lang_global["Ejemplo"].': 42.00"
							value="'.(isset($datos['price_discount_product_lang_promotion']) && !empty($datos['price_discount_product_lang_promotion']) ? $datos['price_discount_product_lang_promotion'] : '').'" 
							style="'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? (isset($datos['id_type_promotion']) && $datos['id_type_promotion'] == 1 ? 'background-color:#fff;border-color:#d2322d;' : 'background-color:#e9ecef;') : 'border-color:#d2322d;').'" 
							required>
					</div>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="discount_rate_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'">'.$lang_global["Descuento en porcentaje"].'(sin el signo %)</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text">%</span>
						</span>
						<input 
							type="text" 
							id="discount_rate_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
							class="form-control numeros-sin-punto discount_rate_product_lang_promotion"
							name="discount_rate_product_lang_promotion" 
							data-id="'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"
							placeholder="'.$lang_global["Ejemplo"].': 25" 
							data-plugin-maxlength maxlength="3" 
							value="'.(isset($datos['discount_rate_product_lang_promotion']) && !empty($datos['discount_rate_product_lang_promotion']) ? $datos['discount_rate_product_lang_promotion'] : '').'" 
							style="'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) && isset($datos['id_type_promotion']) && $datos['id_type_promotion'] == 2 ? 'background-color:#fff;border-color:#d2322d;' : 'background-color:#e9ecef;').'"
							'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? (isset($datos['id_type_promotion']) && $datos['id_type_promotion'] == 1 ? 'readonly ' : '') : 'readonly ').'required>
					</div>
				</div>
				<div class="tabs tabs-modern-row pt-3 mb-0">
					<div class="nav nav-tabs" id="tab" role="tablist" aria-orientation="horizontal">
				  		<a class="nav-link active" id="small2_description-tab" data-bs-toggle="pill" data-bs-target="#small2_description" href="#small2_description" role="tab" aria-controls="small2_description" aria-selected="false">'.$lang_global["Resumen"].'</a>
				  		<a class="nav-link" id="large2_description-tab" data-bs-toggle="pill" data-bs-target="#large2_description" href="#large2_description" role="tab" aria-controls="large2_description" aria-selected="true">'.$lang_global["Descripción con diseño"].'</a>
					</div>
					<div class="tab-content p-0 mb-2" id="tabContent">
				  		<div class="tab-pane fade show active" id="small2_description" role="tabpanel" aria-labelledby="small2_description-tab">
							<textarea 
								id="description_small_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"
								class="form-control rounded-0"
								name="description_small_product_lang_promotion"
								data-plugin-maxlength
								maxlength="255"
								rows="5">'.(isset($datos['description_small_product_lang_promotion']) && !empty($datos['description_small_product_lang_promotion']) ? stripslashes($datos['description_small_product_lang_promotion']) : '').'</textarea>
				  		</div>
				  		<div class="tab-pane fade" id="large2_description" role="tabpanel" aria-labelledby="large2_description-tab">
							<textarea
								id="description_large_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
								class="summernote rounded-0" 
								name="description_large_product_lang_promotion"
								data-plugin-summernote>'.(isset($datos['description_large_product_lang_promotion']) && !empty($datos['description_large_product_lang_promotion']) ? stripslashes($datos['description_large_product_lang_promotion']) : '').'</textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="start_date_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'"><span class="required">*</span> '.$lang_global["Fecha"].'</label>
					<div class="input-daterange input-group" data-plugin-datepicker>
						<span class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-calendar-alt"></i>
							</span>
						</span>
						<input 
							type="text" 
							id="start_date_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
							class="form-control" name="start_date_product_lang_promotion" 
							placeholder="'.$lang_global["Inicio"].'" 
							value="'.(isset($datos['start_date_product_lang_promotion']) && !empty($datos['start_date_product_lang_promotion']) ? $datos['start_date_product_lang_promotion'] : '').'" 
							required>
						<span class="input-group-text border-left-0 border-right-0 rounded-0">a</span>
						<input 
							type="text" 
							id="finish_date_product_lang_promotion" 
							class="form-control" 
							name="finish_date_product_lang_promotion" 
							placeholder="'.$lang_global["Final"].'"
							value="'.(isset($datos['finish_date_product_lang_promotion']) && !empty($datos['finish_date_product_lang_promotion']) ? $datos['finish_date_product_lang_promotion'] : '').'">
					</div>
				</div>
				<div class="form-group">
					<label class="f-medium c-negro" for="link_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'">'.$lang_global["Link"].'</label>
					<input 
						type="url" 
						id="link_product_lang_promotion_'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $datos['id_product_lang_promotion'] : 0).'" 
						class="form-control" 
						data-plugin-maxlength maxlength="600" 
						name="link_product_lang_promotion" 
						placeholder="eje: https://www.dominio.com"
						value="'.(isset($datos['link_product_lang_promotion']) && !empty($datos['link_product_lang_promotion']) ? $datos['link_product_lang_promotion'] : '').'">
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-dark">'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? $lang_global["Modificar"] : $lang_global["Registrar"]).'</button>
		'.(isset($datos['id_product_lang_promotion']) && !empty($datos['id_product_lang_promotion']) ? '<button class="btn btn-default modal-dismiss">'.$lang_global["Cancelar"].'</button>' : '').'
				</div>');