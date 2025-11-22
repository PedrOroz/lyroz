<?php
	require_once(dirname(__DIR__)."/../models/productDao.php");

	class productsController
	{
		/**
		 * [getNewProductId description]
		 *
		 * @param  [type] $url_carpeta_admin [description]
		 * @return [type]                    [description]
		 */

		public static function getNewProductId($url_carpeta_admin)
		{
			return productDao::getNewProductId($url_carpeta_admin);
		}

		/**
		 * [getTotalProducts description]
		 *
		 * @return [type] [description]
		 */

		public static function getTotalProducts()
		{
			return productDao::getTotalProducts();
		}

		/**
		 * [showRegisteredProductsMainWithLimit description]
		 *
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showRegisteredProductsMainWithLimit($id_type_section)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			return productDao::showRegisteredProductsMainWithLimit($obj_image_lang);
		}

		/**
		 * [showRegisteredProducts description]
		 *
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showRegisteredProducts($id_type_section)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			return productDao::showRegisteredProducts($obj_image_lang);
		}

		/**
		 * [showFormUploadProduct description]
		 *
		 * @param  [type] $id_product      [description]
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showFormUploadProduct($id_product,$id_type_section)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			$obj_product_lang 	= new Product_lang();
			$obj_product_lang->setId_product($id_product);

			return productDao::showFormUploadProduct($obj_image_lang,$obj_product_lang);
		}

		/**
		 * [uploadProductCover description]
		 *
		 * @param  [type] $id_call                   [description]
		 * @param  [type] $id_type_image             [description]
		 * @param  [type] $id_lang                   [description]
		 * @param  [type] $id_product                [description]
		 * @param  [type] $id_product_lang           [description]
		 * @param  [type] $title_product_lang        [description]
		 * @param  [type] $friendly_url_product_lang [description]
		 * @param  [type] $id_type_of_currency       [description]
		 * @param  [type] $id_tax_rule               [description]
		 * @param  [type] $file_error                [description]
		 * @param  [type] $file_name                 [description]
		 * @param  [type] $file_type                 [description]
		 * @param  [type] $file_tmp_name             [description]
		 * @param  [type] $file_size                 [description]
		 * @return [type]                            [description]
		 */

		public static function uploadProductCover($id_call,$id_type_image,$id_lang,$id_product,$id_product_lang,$title_product_lang,$friendly_url_product_lang,$id_type_of_currency,$id_tax_rule,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_lang 				= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_type_of_currency 	= new Type_of_currency();
			$obj_type_of_currency->setId_type_of_currency($id_type_of_currency);

			$obj_tax_rule 			= new Tax_rule();
			$obj_tax_rule->setId_tax_rule($id_tax_rule);

			$obj_product_lang 		= new Product_lang();
			$obj_product_lang->setId_product($id_product);
			$obj_product_lang->setId_product_lang($id_product_lang);
			$obj_product_lang->setTitle_product_lang($title_product_lang);
			$obj_product_lang->setFriendly_url_product_lang($friendly_url_product_lang);

			$obj_image_lang 		= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			return productDao::uploadProductCover($id_call,$obj_lang,$obj_type_of_currency,$obj_tax_rule,$obj_product_lang,$obj_image_lang);
		}

		/**
		 * [showSpecificInformationByProductLangId description]
		 *
		 * @param  [type] $id_product_lang [description]
		 * @param  [type] $id_type_info    [description]
		 * @return [type]                  [description]
		 */

		public static function showSpecificInformationByProductLangId($id_product_lang,$id_type_info)
		{
			$obj_product_lang 		= new Product_lang();
			$obj_product_lang->setId_product_lang($id_product_lang);

			return productDao::showSpecificInformationByProductLangId($id_type_info,$obj_product_lang);
		}

		/**
		 * [updateInformationProductLang description]
		 *
		 * @param  [type] $id_product_lang                            [description]
		 * @param  [type] $title_product_lang                         [description]
		 * @param  [type] $friendly_url_product_lang                  [description]
		 * @param  [type] $id_type_product                            [description]
		 * @param  [type] $id_type_of_currency                        [description]
		 * @param  [type] $id_tax_rule                                [description]
		 * @param  [type] $subtitle_product_lang                      [description]
		 * @param  [type] $general_price_product_lang_old             [description]
		 * @param  [type] $general_price_product_lang                 [description]
		 * @param  [type] $text_button_general_price_product_lang     [description]
		 * @param  [type] $predominant_color_product_lang             [description]
		 * @param  [type] $INT_background_color_degraded_product_lang [description]
		 * @param  [type] $background_color_degraded_product_lang_old [description]
		 * @param  [type] $general_stock_product_lang                 [description]
		 * @param  [type] $reference_product_lang                     [description]
		 * @param  [type] $general_link_product_lang                  [description]
		 * @param  [type] $text_button_general_link_product_lang      [description]
		 * @param  [type] $description_small_product_lang             [description]
		 * @param  [type] $description_large_product_lang             [description]
		 * @param  [type] $special_specifications_product_lang        [description]
		 * @param  [type] $clave_prod_serv_sat_product_lang           [description]
		 * @param  [type] $clave_unidad_sat_product_lang              [description]
		 * @param  [type] $meta_title_product_lang                    [description]
		 * @param  [type] $meta_description_product_lang              [description]
		 * @param  [type] $meta_keywords_product_lang                 [description]
		 * @return [type]                                             [description]
		 */

		public static function updateInformationProductLang($id_product_lang,$title_product_lang,$friendly_url_product_lang,$id_type_product,$id_type_of_currency,$id_tax_rule,$subtitle_product_lang,$general_price_product_lang_old,$general_price_product_lang,$text_button_general_price_product_lang,$predominant_color_product_lang,$INT_background_color_degraded_product_lang,$background_color_degraded_product_lang_old,$general_stock_product_lang,$reference_product_lang,$general_link_product_lang,$text_button_general_link_product_lang,$description_small_product_lang,$description_large_product_lang,$special_specifications_product_lang,$clave_prod_serv_sat_product_lang,$clave_unidad_sat_product_lang,$meta_title_product_lang,$meta_description_product_lang,$meta_keywords_product_lang)
		{
			$obj_type_of_currency 	= new Type_of_currency();
			$obj_type_of_currency->setId_type_of_currency($id_type_of_currency);

			$obj_tax_rule 			= new Tax_rule();
			$obj_tax_rule->setId_tax_rule($id_tax_rule);

			$obj_product_lang 		= new Product_lang();
			$obj_product_lang->setId_type_product($id_type_product);
			$obj_product_lang->setId_product_lang($id_product_lang);
			$obj_product_lang->setTitle_product_lang($title_product_lang);
			$obj_product_lang->setSubtitle_product_lang($subtitle_product_lang);
			$obj_product_lang->setGeneral_price_product_lang($general_price_product_lang);
			$obj_product_lang->setText_button_general_price_product_lang($text_button_general_price_product_lang);
			$obj_product_lang->setPredominant_color_product_lang($predominant_color_product_lang);
			$obj_product_lang->setGeneral_stock_product_lang($general_stock_product_lang);
			$obj_product_lang->setReference_product_lang($reference_product_lang);
			$obj_product_lang->setFriendly_url_product_lang($friendly_url_product_lang);
			$obj_product_lang->setGeneral_link_product_lang($general_link_product_lang);
			$obj_product_lang->setText_button_general_link_product_lang($text_button_general_link_product_lang);
			$obj_product_lang->setDescription_small_product_lang($description_small_product_lang);
			$obj_product_lang->setDescription_large_product_lang($description_large_product_lang);
			$obj_product_lang->setSpecial_specifications_product_lang($special_specifications_product_lang);
			$obj_product_lang->setClave_prod_serv_sat_product_lang($clave_prod_serv_sat_product_lang);
			$obj_product_lang->setClave_unidad_sat_product_lang($clave_unidad_sat_product_lang);
			$obj_product_lang->setMeta_title_product_lang($meta_title_product_lang);
			$obj_product_lang->setMeta_description_product_lang($meta_description_product_lang);
			$obj_product_lang->setMeta_keywords_product_lang($meta_keywords_product_lang);

			return productDao::updateInformationProductLang($general_price_product_lang_old,$INT_background_color_degraded_product_lang,$background_color_degraded_product_lang_old,$obj_type_of_currency,$obj_tax_rule,$obj_product_lang);
		}

		/**
		 * [registerProduct description]
		 *
		 * @param  [type] $id_product                                 [description]
		 * @param  [type] $title_product_lang                         [description]
		 * @param  [type] $friendly_url_product_lang                  [description]
		 * @param  [type] $id_type_product                            [description]
		 * @param  [type] $id_type_of_currency                        [description]
		 * @param  [type] $id_tax_rule                                [description]
		 * @param  [type] $subtitle_product_lang                      [description]
		 * @param  [type] $general_price_product_lang                 [description]
		 * @param  [type] $text_button_general_price_product_lang     [description]
		 * @param  [type] $predominant_color_product_lang             [description]
		 * @param  [type] $INT_background_color_degraded_product_lang [description]
		 * @param  [type] $general_stock_product_lang                 [description]
		 * @param  [type] $reference_product_lang                     [description]
		 * @param  [type] $general_link_product_lang                  [description]
		 * @param  [type] $text_button_general_link_product_lang      [description]
		 * @param  [type] $description_small_product_lang             [description]
		 * @param  [type] $description_large_product_lang             [description]
		 * @param  [type] $special_specifications_product_lang        [description]
		 * @param  [type] $clave_prod_serv_sat_product_lang           [description]
		 * @param  [type] $clave_unidad_sat_product_lang              [description]
		 * @param  [type] $meta_title_product_lang                    [description]
		 * @param  [type] $meta_description_product_lang              [description]
		 * @param  [type] $meta_keywords_product_lang                 [description]
		 * @return [type]                                             [description]
		 */

		public static function registerProduct($id_product,$title_product_lang,$friendly_url_product_lang,$id_type_product,$id_type_of_currency,$id_tax_rule,$subtitle_product_lang,$general_price_product_lang,$text_button_general_price_product_lang,$predominant_color_product_lang,$INT_background_color_degraded_product_lang,$general_stock_product_lang,$reference_product_lang,$general_link_product_lang,$text_button_general_link_product_lang,$description_small_product_lang,$description_large_product_lang,$special_specifications_product_lang,$clave_prod_serv_sat_product_lang,$clave_unidad_sat_product_lang,$meta_title_product_lang,$meta_description_product_lang,$meta_keywords_product_lang)
		{
			$obj_type_of_currency 	= new Type_of_currency();
			$obj_type_of_currency->setId_type_of_currency($id_type_of_currency);

			$obj_tax_rule 			= new Tax_rule();
			$obj_tax_rule->setId_tax_rule($id_tax_rule);

			$obj_product_lang 		= new Product_lang();
			$obj_product_lang->setId_product($id_product);
			$obj_product_lang->setId_type_product($id_type_product);
			$obj_product_lang->setTitle_product_lang($title_product_lang);
			$obj_product_lang->setSubtitle_product_lang($subtitle_product_lang);
			$obj_product_lang->setGeneral_price_product_lang($general_price_product_lang);
			$obj_product_lang->setText_button_general_price_product_lang($text_button_general_price_product_lang);
			$obj_product_lang->setPredominant_color_product_lang($predominant_color_product_lang);
			$obj_product_lang->setGeneral_stock_product_lang($general_stock_product_lang);
			$obj_product_lang->setReference_product_lang($reference_product_lang);
			$obj_product_lang->setFriendly_url_product_lang($friendly_url_product_lang);
			$obj_product_lang->setGeneral_link_product_lang($general_link_product_lang);
			$obj_product_lang->setText_button_general_link_product_lang($text_button_general_link_product_lang);
			$obj_product_lang->setDescription_small_product_lang($description_small_product_lang);
			$obj_product_lang->setDescription_large_product_lang($description_large_product_lang);
			$obj_product_lang->setSpecial_specifications_product_lang($special_specifications_product_lang);
			$obj_product_lang->setClave_prod_serv_sat_product_lang($clave_prod_serv_sat_product_lang);
			$obj_product_lang->setClave_unidad_sat_product_lang($clave_unidad_sat_product_lang);
			$obj_product_lang->setMeta_title_product_lang($meta_title_product_lang);
			$obj_product_lang->setMeta_description_product_lang($meta_description_product_lang);
			$obj_product_lang->setMeta_keywords_product_lang($meta_keywords_product_lang);

			return productDao::registerProduct($INT_background_color_degraded_product_lang,$obj_type_of_currency,$obj_tax_rule,$obj_product_lang);
		}

		/**
		 * [associateCategryToProduct description]
		 *
		 * @param  [type] $id_product  [description]
		 * @param  [type] $parent_id   [description]
		 * @param  [type] $id_call     [description]
		 * @param  [type] $id_category [description]
		 * @return [type]              [description]
		 */

		public static function associateCategryToProduct($id_product,$parent_id,$id_call,$id_category)
		{
			$obj_category_lang 		= new Category_lang();
			$obj_category_lang->setId_category($id_category);
			$obj_category_lang->setParent_id($parent_id);

			$obj_product_lang 		= new Product_lang();
			$obj_product_lang->setId_product($id_product);

			return productDao::associateCategryToProduct($id_call,$obj_category_lang,$obj_product_lang);
		}

		/**
		 * [leaveAsMainProduct description]
		 *
		 * @param  [type] $id_product_lang       [description]
		 * @param  [type] $id_image_lang_version [description]
		 * @return [type]                        [description]
		 */

		public static function leaveAsMainProduct($id_product_lang,$id_image_lang_version)
		{
			$obj_product_lang 	= new Product_lang();
			$obj_product_lang->setId_product_lang($id_product_lang);

			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_image_lang_version($id_image_lang_version);

			return productDao::leaveAsMainProduct($obj_product_lang,$obj_image_lang);
		}

		/**
		 * [registerProductPromotion description]
		 *
		 * @param  [type] $id_product_lang                          [description]
		 * @param  [type] $id_product                               [description]
		 * @param  [type] $title_product_lang                       [description]
		 * @param  [type] $id_type_promotion                        [description]
		 * @param  [type] $title_product_lang_promotion             [description]
		 * @param  [type] $sku_product_lang_promotion               [description]
		 * @param  [type] $price_discount_product_lang_promotion    [description]
		 * @param  [type] $discount_rate_product_lang_promotion     [description]
		 * @param  [type] $description_small_product_lang_promotion [description]
		 * @param  [type] $description_large_product_lang_promotion [description]
		 * @param  [type] $link_product_lang_promotion              [description]
		 * @param  [type] $start_date_product_lang_promotion        [description]
		 * @param  [type] $finish_date_product_lang_promotion       [description]
		 * @return [type]                                           [description]
		 */

		public static function registerProductPromotion($id_product_lang,$id_product,$title_product_lang,$id_type_promotion,$title_product_lang_promotion,$sku_product_lang_promotion,$price_discount_product_lang_promotion,$discount_rate_product_lang_promotion,$description_small_product_lang_promotion,$description_large_product_lang_promotion,$link_product_lang_promotion,$start_date_product_lang_promotion,$finish_date_product_lang_promotion)
		{
			$obj_product_lang 			= new Product_lang();
			$obj_product_lang->setId_product($id_product);
			$obj_product_lang->setId_product_lang($id_product_lang);
			$obj_product_lang->setTitle_product_lang($title_product_lang);

			$obj_type_promotion_lang 	= new Type_promotion_lang();
			$obj_type_promotion_lang->setId_type_promotion($id_type_promotion);

			$obj_product_lang_promotion = new Product_lang_promotion();
			$obj_product_lang_promotion->setTitle_product_lang_promotion($title_product_lang_promotion);
			$obj_product_lang_promotion->setSku_product_lang_promotion($sku_product_lang_promotion);
			$obj_product_lang_promotion->setPrice_discount_product_lang_promotion($price_discount_product_lang_promotion);
			$obj_product_lang_promotion->setDiscount_rate_product_lang_promotion($discount_rate_product_lang_promotion);
			$obj_product_lang_promotion->setDescription_small_product_lang_promotion($description_small_product_lang_promotion);
			$obj_product_lang_promotion->setDescription_large_product_lang_promotion($description_large_product_lang_promotion);
			$obj_product_lang_promotion->setLink_product_lang_promotion($link_product_lang_promotion);
			$obj_product_lang_promotion->setStart_date_product_lang_promotion($start_date_product_lang_promotion);
			$obj_product_lang_promotion->setFinish_date_product_lang_promotion($finish_date_product_lang_promotion);

			return productDao::registerProductPromotion($obj_product_lang,$obj_type_promotion_lang,$obj_product_lang_promotion);
		}

		/**
		 * [updateInformationProductPromotion description]
		 *
		 * @param  [type] $id_product_lang_promotion                [description]
		 * @param  [type] $id_type_promotion                        [description]
		 * @param  [type] $title_product_lang_promotion             [description]
		 * @param  [type] $sku_product_lang_promotion               [description]
		 * @param  [type] $price_discount_product_lang_promotion    [description]
		 * @param  [type] $discount_rate_product_lang_promotion     [description]
		 * @param  [type] $description_small_product_lang_promotion [description]
		 * @param  [type] $description_large_product_lang_promotion [description]
		 * @param  [type] $link_product_lang_promotion              [description]
		 * @param  [type] $start_date_product_lang_promotion        [description]
		 * @param  [type] $finish_date_product_lang_promotion       [description]
		 * @return [type]                                           [description]
		 */

		public static function updateInformationProductPromotion($id_product_lang_promotion,$id_type_promotion,$title_product_lang_promotion,$sku_product_lang_promotion,$price_discount_product_lang_promotion,$discount_rate_product_lang_promotion,$description_small_product_lang_promotion,$description_large_product_lang_promotion,$link_product_lang_promotion,$start_date_product_lang_promotion,$finish_date_product_lang_promotion)
		{
			$obj_type_promotion_lang 	= new Type_promotion_lang();
			$obj_type_promotion_lang->setId_type_promotion($id_type_promotion);

			$obj_product_lang_promotion = new Product_lang_promotion();
			$obj_product_lang_promotion->setId_product_lang_promotion($id_product_lang_promotion);
			$obj_product_lang_promotion->setTitle_product_lang_promotion($title_product_lang_promotion);
			$obj_product_lang_promotion->setSku_product_lang_promotion($sku_product_lang_promotion);
			$obj_product_lang_promotion->setPrice_discount_product_lang_promotion($price_discount_product_lang_promotion);
			$obj_product_lang_promotion->setDiscount_rate_product_lang_promotion($discount_rate_product_lang_promotion);
			$obj_product_lang_promotion->setDescription_small_product_lang_promotion($description_small_product_lang_promotion);
			$obj_product_lang_promotion->setDescription_large_product_lang_promotion($description_large_product_lang_promotion);
			$obj_product_lang_promotion->setLink_product_lang_promotion($link_product_lang_promotion);
			$obj_product_lang_promotion->setStart_date_product_lang_promotion($start_date_product_lang_promotion);
			$obj_product_lang_promotion->setFinish_date_product_lang_promotion($finish_date_product_lang_promotion);

			return productDao::updateInformationProductPromotion($obj_type_promotion_lang,$obj_product_lang_promotion);
		}

		/**
		 * [deleteProductPromotion description]
		 *
		 * @param  [type] $id_product_lang_promotion    [description]
		 * @param  [type] $id_type_image                [description]
		 * @param  [type] $title_product_lang_promotion [description]
		 * @return [type]                               [description]
		 */

		public static function deleteProductPromotion($id_product_lang_promotion,$id_type_image,$title_product_lang_promotion)
		{
			$obj_image_lang 			= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_image);

			$obj_product_lang_promotion = new Product_lang_promotion();
			$obj_product_lang_promotion->setId_product_lang_promotion($id_product_lang_promotion);
			$obj_product_lang_promotion->setTitle_product_lang_promotion($title_product_lang_promotion);

			return productDao::deleteProductPromotion($obj_image_lang,$obj_product_lang_promotion);
		}

		/**
		 * [registerProductStripe description]
		 *
		 * @param  [type] $id_product           [description]
		 * @param  [type] $id_stripe            [description]
		 * @param  [type] $value_product_stripe [description]
		 * @return [type]                       [description]
		 */

		public static function registerProductStripe($id_product,$id_stripe,$value_product_stripe)
		{
			$obj_stripe_lang 	= new Stripe_lang();
			$obj_stripe_lang->setId_stripe($id_stripe);

			$obj_product_lang 	= new Product_lang();
			$obj_product_lang->setId_product($id_product);

			$obj_product_stripe = new Product_stripe();
			$obj_product_stripe->setValue_product_stripe($value_product_stripe);

			return productDao::registerProductStripe($obj_stripe_lang,$obj_product_lang,$obj_product_stripe);
		}

		/**
		 * [updateInformationProductStripe description]
		 *
		 * @param  [type] $id_product_stripe    [description]
		 * @param  [type] $id_stripe            [description]
		 * @param  [type] $value_product_stripe [description]
		 * @return [type]                       [description]
		 */

		public static function updateInformationProductStripe($id_product_stripe,$id_stripe,$value_product_stripe)
		{
			$obj_stripe_lang 	= new Stripe_lang();
			$obj_stripe_lang->setId_stripe($id_stripe);

			$obj_product_stripe = new Product_stripe();
			$obj_product_stripe->setId_product_stripe($id_product_stripe);
			$obj_product_stripe->setValue_product_stripe($value_product_stripe);

			return productDao::updateInformationProductStripe($obj_stripe_lang,$obj_product_stripe);
		}

		/**
		 * [deleteProductStripe description]
		 *
		 * @param  [type] $id_product_stripe [description]
		 * @param  [type] $id_type_image     [description]
		 * @param  [type] $title_stripe_lang [description]
		 * @return [type]                    [description]
		 */

		public static function deleteProductStripe($id_product_stripe,$id_type_image,$title_stripe_lang)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_image);

			$obj_stripe_lang 	= new Stripe_lang();
			$obj_stripe_lang->setTitle_stripe_lang($title_stripe_lang);

			$obj_product_stripe = new Product_stripe();
			$obj_product_stripe->setId_product_stripe($id_product_stripe);

			return productDao::deleteProductStripe($obj_image_lang,$obj_stripe_lang,$obj_product_stripe);
		}

		public static function registerProductAdditionalInformation($id_product_lang,$id_type_tag,$tag_product_lang_additional_information,$content_product_lang_additional_information,$hyperlink_product_lang_additional_information)
		{
			$obj_type_tag_lang 	= new Type_tag_lang();
			$obj_type_tag_lang->setId_type_tag($id_type_tag);

			$obj_product_lang 	= new Product_lang();
			$obj_product_lang->setId_product_lang($id_product_lang);

			$obj_product_lang_additional_information 	= new Product_lang_additional_information();

			$obj_product_lang_additional_information->setTag_product_lang_additional_information($tag_product_lang_additional_information);
			$obj_product_lang_additional_information->setContent_product_lang_additional_information($content_product_lang_additional_information);
			$obj_product_lang_additional_information->setHyperlink_product_lang_additional_information($hyperlink_product_lang_additional_information);

			return productDao::registerProductAdditionalInformation($obj_type_tag_lang,$obj_product_lang,$obj_product_lang_additional_information);
		}

		public static function updateInformationProductAdditionalInformation($id_product_lang_additional_information,$id_type_tag,$tag_product_lang_additional_information,$content_product_lang_additional_information,$hyperlink_product_lang_additional_information)
		{
			$obj_type_tag_lang 	= new Type_tag_lang();
			$obj_type_tag_lang->setId_type_tag($id_type_tag);

			$obj_product_lang_additional_information 	= new Product_lang_additional_information();

			$obj_product_lang_additional_information->setId_product_lang_additional_information($id_product_lang_additional_information);
			$obj_product_lang_additional_information->setTag_product_lang_additional_information($tag_product_lang_additional_information);
			$obj_product_lang_additional_information->setContent_product_lang_additional_information($content_product_lang_additional_information);
			$obj_product_lang_additional_information->setHyperlink_product_lang_additional_information($hyperlink_product_lang_additional_information);

			return productDao::updateInformationProductAdditionalInformation($obj_type_tag_lang,$obj_product_lang_additional_information);
		}

		public static function deleteProductAdditionalInformation($id_product_lang_additional_information,$tag_product_lang_additional_information,$id_type_image)
		{
			$obj_product_lang_additional_information 	= new Product_lang_additional_information();

			$obj_product_lang_additional_information->setId_product_lang_additional_information($id_product_lang_additional_information);
			$obj_product_lang_additional_information->setTag_product_lang_additional_information($tag_product_lang_additional_information);

			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_image);

			return productDao::deleteProductAdditionalInformation($obj_product_lang_additional_information,$obj_image_lang);
		}

		public static function showAllActiveProducts($id_lang)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			return productDao::showAllActiveProducts($obj_lang);
		}
	}