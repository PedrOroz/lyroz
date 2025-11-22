<?php
	require_once(dirname(__DIR__)."/../models/categoryDao.php");

	class categoriesController
	{
		/**
		 * [showFormCreateCategory description]
		 *
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showFormCreateCategory($id_type_section)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			return categoryDao::showFormCreateCategory($obj_image_lang);
		}

		/**
		 * [registerCategory description]
		 *
		 * @param  [type] $title_category_lang             [description]
		 * @param  [type] $parent_id                       [description]
		 * @param  [type] $subtitle_category_lang          [description]
		 * @param  [type] $description_small_category_lang [description]
		 * @param  [type] $description_large_category_lang [description]
		 * @param  [type] $color_hexadecimal_category      [description]
		 * @return [type]                                  [description]
		 */

		public static function registerCategory($title_category_lang,$parent_id,$subtitle_category_lang,$description_small_category_lang,$description_large_category_lang,$color_hexadecimal_category)
		{
			$obj_category_lang = new Category_lang();

			$obj_category_lang->setTitle_category_lang($title_category_lang);
			$obj_category_lang->setParent_id($parent_id);
			$obj_category_lang->setSubtitle_category_lang($subtitle_category_lang);
			$obj_category_lang->setDescription_small_category_lang($description_small_category_lang);
			$obj_category_lang->setDescription_large_category_lang($description_large_category_lang);
			$obj_category_lang->setColor_hexadecimal_category($color_hexadecimal_category);

			return categoryDao::registerCategory($obj_category_lang);
		}

		/**
		 * [showBasicCategorySettings description]
		 * 
		 * @param  [type] $id_category      [description]
		 * @param  [type] $id_lang_selected [description]
		 * @return [type]                   [description]
		 */
		
		public static function showBasicCategorySettings($id_category,$id_lang_selected)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang_selected);

			$obj_category_lang = new Category_lang();
			$obj_category_lang->setId_category($id_category);

			return categoryDao::showBasicCategorySettings($obj_lang,$obj_category_lang);
		}

		/**
		 * [updateInformationCategory description]
		 *
		 * @param  [type] $id_category_lang                [description]
		 * @param  [type] $title_category_lang             [description]
		 * @param  [type] $subtitle_category_lang          [description]
		 * @param  [type] $description_small_category_lang [description]
		 * @param  [type] $description_large_category_lang [description]
		 * @param  [type] $color_hexadecimal_category      [description]
		 * @return [type]                                  [description]
		 */

		public static function updateInformationCategory($id_category_lang,$title_category_lang,$subtitle_category_lang,$description_small_category_lang,$description_large_category_lang,$color_hexadecimal_category)
		{
			$obj_category_lang = new Category_lang();

			$obj_category_lang->setId_category_lang($id_category_lang);
			$obj_category_lang->setTitle_category_lang($title_category_lang);
			$obj_category_lang->setSubtitle_category_lang($subtitle_category_lang);
			$obj_category_lang->setDescription_small_category_lang($description_small_category_lang);
			$obj_category_lang->setDescription_large_category_lang($description_large_category_lang);
			$obj_category_lang->setColor_hexadecimal_category($color_hexadecimal_category);

			return categoryDao::updateInformationCategory($obj_category_lang);
		}

		/**
		 * [registerParentCategory description]
		 *
		 * @param  [type] $parent_category [description]
		 * @param  [type] $id_category     [description]
		 * @return [type]                  [description]
		 */

		public static function registerParentCategory($parent_category,$id_category)
		{
			$obj_category_lang = new Category_lang();

			$obj_category_lang->setParent_id($parent_category);
			$obj_category_lang->setId_category($id_category);

			return categoryDao::registerParentCategory($obj_category_lang);
		}

		/**
		 * [showCategoryImages description]
		 * 
		 * @param  [type] $id_category      [description]
		 * @param  [type] $id_type_section  [description]
		 * @param  [type] $id_lang_selected [description]
		 * @return [type]                   [description]
		 */
		
		public static function showCategoryImages($id_category,$id_type_section,$id_lang_selected)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang_selected);

			$obj_category_lang = new Category_lang();
			$obj_category_lang->setId_category($id_category);

			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			return categoryDao::showCategoryImages($obj_lang,$obj_category_lang,$obj_image_lang);
		}

		/**
		 * [showCategoryAttributesByCategoryId description]
		 *
		 * @param  [type] $id_category [description]
		 * @param  [type] $type_info   [description]
		 * @return [type]              [description]
		 */

		public static function showCategoryAttributesByCategoryId($id_category,$type_info)
		{
			$obj_category_lang = new Category_lang();

			$obj_category_lang->setId_category($id_category);
			$obj_category_lang->setType_info($type_info);

			return categoryDao::showCategoryAttributesByCategoryId($obj_category_lang);
		}

		/**
		 * [showRegisteredAccountsCategories description]
		 *
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showRegisteredAccountsCategories($id_type_section,$id_category)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			$obj_category_lang = new Category_lang();
			$obj_category_lang->setId_category($id_category);

			return categoryDao::showRegisteredAccountsCategories($obj_image_lang,$obj_category_lang);
		}
	}