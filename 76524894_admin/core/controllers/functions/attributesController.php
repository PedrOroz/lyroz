<?php
	require_once(dirname(__DIR__)."/../models/attributeDao.php");

	class attributesController
	{
		/**
		 * [showFormCreateAttribute description]
		 *
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showFormCreateAttribute($id_type_section)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			return attributeDao::showFormCreateAttribute($obj_image_lang);
		}

		/**
		 * [registerAttribute description]
		 *
		 * @param  [type] $title_attribute_lang [description]
		 * @param  [type] $parent_id_attribute  [description]
		 * @return [type]                       [description]
		 */

		public static function registerAttribute($title_attribute_lang,$parent_id_attribute)
		{
			$obj_attribute_lang = new Attribute_lang();

			$obj_attribute_lang->setTitle_attribute_lang($title_attribute_lang);
			$obj_attribute_lang->setParent_id_attribute($parent_id_attribute);

			return attributeDao::registerAttribute($obj_attribute_lang);
		}

		/**
		 * [showCategoryAttributesByAttributeId description]
		 * 
		 * @param  [type] $id_attribute [description]
		 * @param  [type] $type_info    [description]
		 * @return [type]               [description]
		 */
		
		public static function showCategoryAttributesByAttributeId($id_attribute,$type_info)
		{
			$obj_attribute_lang = new Attribute_lang();

			$obj_attribute_lang->setId_attribute($id_attribute);
			$obj_attribute_lang->setType_info($type_info);

			return attributeDao::showCategoryAttributesByAttributeId($obj_attribute_lang);
		}

		/**
		 * [showRegisteredAccountsAttributes description]
		 * 
		 * @param  [type] $id_type_section [description]
		 * @param  [type] $id_attribute    [description]
		 * @return [type]                  [description]
		 */
		
		public static function showRegisteredAccountsAttributes($id_type_section,$id_attribute)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			$obj_attribute_lang = new Attribute_lang();
			$obj_attribute_lang->setId_attribute($id_attribute);

			return attributeDao::showRegisteredAccountsAttributes($obj_image_lang,$obj_attribute_lang);
		}

		/**
		 * [showBasicAttributeSettings description]
		 * 
		 * @param  [type] $id_attribute     [description]
		 * @param  [type] $id_lang_selected [description]
		 * @return [type]                   [description]
		 */
		
		public static function showBasicAttributeSettings($id_attribute,$id_lang_selected)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang_selected);

			$obj_attribute_lang = new Attribute_lang();
			$obj_attribute_lang->setId_attribute($id_attribute);

			return attributeDao::showBasicAttributeSettings($obj_lang,$obj_attribute_lang);
		}

		/**
		 * [registerParentAttribute description]
		 *
		 * @param  [type] $parent_id_attribute [description]
		 * @param  [type] $id_attribute        [description]
		 * @return [type]                      [description]
		 */

		public static function registerParentAttribute($parent_id_attribute,$id_attribute)
		{
			$obj_attribute_lang = new Attribute_lang();

			$obj_attribute_lang->setParent_id_attribute($parent_id_attribute);
			$obj_attribute_lang->setId_attribute($id_attribute);

			return attributeDao::registerParentAttribute($obj_attribute_lang);
		}

		/**
		 * [updateInformationAttribute description]
		 *
		 * @param  [type] $id_attribute_lang    [description]
		 * @param  [type] $title_attribute_lang [description]
		 * @return [type]                       [description]
		 */

		public static function updateInformationAttribute($id_attribute_lang,$title_attribute_lang)
		{
			$obj_attribute_lang = new Attribute_lang();

			$obj_attribute_lang->setId_attribute_lang($id_attribute_lang);
			$obj_attribute_lang->setTitle_attribute_lang($title_attribute_lang);

			return attributeDao::updateInformationAttribute($obj_attribute_lang);
		}
	}