<?php
	require_once(dirname(__DIR__)."/../models/productPresentationDao.php");

	class productPresentationsController
	{
		public static function uploadPresentationOfTheProduct($id_product,$id_type_image,$id_product_lang,$id_lang,$id_attribute,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_product_lang 	= new Product_lang();
			$obj_product_lang->setId_product($id_product);
			$obj_product_lang->setId_product_lang($id_product_lang);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_attribute_lang = new Attribute_lang();
			$obj_attribute_lang->setId_attribute($id_attribute);

			$obj_product_lang_presentation_lang 	= new Product_lang_presentation_lang();

			$obj_product_lang_presentation_lang->setGeneral_price_product_lang_presentation($general_price_product_lang_presentation_lang);
			$obj_product_lang_presentation_lang->setGeneral_stock_product_lang_presentation_lang($general_stock_product_lang_presentation_lang);
			$obj_product_lang_presentation_lang->setReference_product_lang_presentation_lang($reference_product_lang_presentation_lang);
			$obj_product_lang_presentation_lang->setMeta_title_product_lang_presentation_lang($meta_title_product_lang_presentation_lang);
			$obj_product_lang_presentation_lang->setMeta_description_product_lang_presentation_lang($meta_description_product_lang_presentation_lang);
			$obj_product_lang_presentation_lang->setMeta_keywords_product_lang_presentation_lang($meta_keywords_product_lang_presentation_lang);

			return productPresentationDao::uploadPresentationOfTheProduct($obj_product_lang,$obj_image_lang,$obj_lang,$obj_attribute_lang,$obj_product_lang_presentation_lang);
		}

		public static function leaveAsMainPresentationProduct($id_product_lang_presentation_image_lang)
		{
			$obj_product_lang_presentation_image_lang 		= new Product_lang_presentation_image_lang();
			$obj_product_lang_presentation_image_lang->setId_product_lang_presentation_image_lang($id_product_lang_presentation_image_lang);

			return productPresentationDao::leaveAsMainPresentationProduct($obj_product_lang_presentation_image_lang);
		}
	}