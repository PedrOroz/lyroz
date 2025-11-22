<?php
	require_once(dirname(__DIR__)."/../models/imageDao.php");

	class imageController
	{
		/**
		 * [uploadSummernoteImage description]
		 * 
		 * @param  [type] $id_type_image    [description]
		 * @param  [type] $title_image_lang [description]
		 * @param  [type] $file_error       [description]
		 * @param  [type] $file_name        [description]
		 * @param  [type] $file_type        [description]
		 * @param  [type] $file_tmp_name    [description]
		 * @param  [type] $file_size        [description]
		 * @param  [type] $view             [description]
		 * @return [type]                   [description]
		 */
		
		public static function uploadSummernoteImage($id_type_image,$title_image_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,$view)
		{
			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setTitle_image_lang($title_image_lang);

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);

			return imageDao::uploadSummernoteImage($view,$obj_image_lang);
		}

		/**
		 * [deleteWithImage5Parameters description]
		 *
		 * @param  [type] $id_image         [description]
		 * @param  [type] $id_image_lang    [description]
		 * @param  [type] $title_image_lang [description]
		 * @param  [type] $id_type_image    [description]
		 * @return [type]                   [description]
		 */

		public static function deleteWithImage5Parameters($id_image,$id_image_lang,$title_image_lang,$id_type_image)
		{
			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_image($id_image);
			$obj_image_lang->setId_image_lang($id_image_lang);
			$obj_image_lang->setId_type_image($id_type_image);

			$obj_image_lang->setTitle_image_lang($title_image_lang);

			return imageDao::deleteWithImage5Parameters($obj_image_lang);
		}

		/**
		 * [deleteWithImageVersion3Parameters description]
		 *
		 * @param  [type] $id_image_lang_version [description]
		 * @param  [type] $title_image_lang      [description]
		 * @param  [type] $id_type_image         [description]
		 * @return [type]                        [description]
		 */

		public static function deleteWithImageVersion3Parameters($id_image_lang_version,$title_image_lang,$id_type_image)
		{
			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_image_lang_version($id_image_lang_version);
			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setTitle_image_lang($title_image_lang);

			return imageDao::deleteWithImageVersion3Parameters($obj_image_lang);
		}

		/**
		 * [uploadImageVersionByImageLangId description]
		 *
		 * @param  [type] $id_image         [description]
		 * @param  [type] $id_image_lang    [description]
		 * @param  [type] $title_image_lang [description]
		 * @param  [type] $id_type_image    [description]
		 * @param  [type] $id_type_version  [description]
		 * @param  [type] $file_error       [description]
		 * @param  [type] $file_name        [description]
		 * @param  [type] $file_type        [description]
		 * @param  [type] $file_tmp_name    [description]
		 * @param  [type] $file_size        [description]
		 * @return [type]                   [description]
		 */

		public static function uploadImageVersionByImageLangId($id_image,$id_image_lang,$title_image_lang,$id_type_image,$id_type_version,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setId_image($id_image);
			$obj_image_lang->setId_image_lang($id_image_lang);
			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setTitle_image_lang($title_image_lang);

			$obj_image_lang->setId_type_version($id_type_version);

			return imageDao::uploadImageVersionByImageLangId($obj_image_lang);
		}

		/**
		 * [uploadImageVersionInASingleLanguageByImageLangId description]
		 *
		 * @param  [type] $id_image         [description]
		 * @param  [type] $id_image_lang    [description]
		 * @param  [type] $id_lang          [description]
		 * @param  [type] $title_image_lang [description]
		 * @param  [type] $id_type_image    [description]
		 * @param  [type] $id_type_version  [description]
		 * @param  [type] $file_error       [description]
		 * @param  [type] $file_name        [description]
		 * @param  [type] $file_type        [description]
		 * @param  [type] $file_tmp_name    [description]
		 * @param  [type] $file_size        [description]
		 * @return [type]                   [description]
		 */

		public static function uploadImageVersionInASingleLanguageByImageLangId($id_image,$id_image_lang,$id_lang,$title_image_lang,$id_type_image,$id_type_version,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setId_image($id_image);
			$obj_image_lang->setId_image_lang($id_image_lang);
			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setTitle_image_lang($title_image_lang);

			$obj_image_lang->setId_type_version($id_type_version);

			return imageDao::uploadImageVersionInASingleLanguageByImageLangId($obj_lang,$obj_image_lang);
		}

		/**
		 * [updateImageByImageLangVersionId description]
		 *
		 * @param  [type] $id_image_lang_version [description]
		 * @param  [type] $title_image_lang      [description]
		 * @param  [type] $id_type_image         [description]
		 * @param  [type] $id_lang               [description]
		 * @param  [type] $file_error            [description]
		 * @param  [type] $file_name             [description]
		 * @param  [type] $file_type             [description]
		 * @param  [type] $file_tmp_name         [description]
		 * @param  [type] $file_size             [description]
		 * @return [type]                        [description]
		 */

		public static function updateImageByImageLangVersionId($id_image_lang_version,$title_image_lang,$id_type_image,$id_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setId_image_lang_version($id_image_lang_version);
			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setTitle_image_lang($title_image_lang);

			return imageDao::updateImageByImageLangVersionId($obj_lang,$obj_image_lang);
		}

		/**
		 * [updateImageByImageLangVersionIdWithoutLanguage description]
		 *
		 * @param  [type] $id_image_lang_version [description]
		 * @param  [type] $title_image_lang      [description]
		 * @param  [type] $id_type_image         [description]
		 * @param  [type] $id_lang               [description]
		 * @param  [type] $file_error            [description]
		 * @param  [type] $file_name             [description]
		 * @param  [type] $file_type             [description]
		 * @param  [type] $file_tmp_name         [description]
		 * @param  [type] $file_size             [description]
		 * @return [type]                        [description]
		 */

		public static function updateImageByImageLangVersionIdWithoutLanguage($id_image_lang_version,$title_image_lang,$id_type_image,$id_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setId_image_lang_version($id_image_lang_version);
			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setTitle_image_lang($title_image_lang);

			return imageDao::updateImageByImageLangVersionIdWithoutLanguage($obj_lang,$obj_image_lang);
		}

		/**
		 * [uploadImage2Parameters description]
		 *
		 * @param  [type] $id_table         [description]
		 * @param  [type] $id_table_lang    [description]
		 * @param  [type] $title_table_lang [description]
		 * @param  [type] $id_type_image    [description]
		 * @param  [type] $id_image_section [description]
		 * @param  [type] $file_error       [description]
		 * @param  [type] $file_name        [description]
		 * @param  [type] $file_type        [description]
		 * @param  [type] $file_tmp_name    [description]
		 * @param  [type] $file_size        [description]
		 * @return [type]                   [description]
		 */

		public static function uploadImage2Parameters($id_table,$id_table_lang,$title_table_lang,$id_type_image,$id_image_section,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_type_image($id_type_image);

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setId_table($id_table);
			$obj_image_lang->setId_table_lang($id_table_lang);
			$obj_image_lang->setTitle_table_lang($title_table_lang);

			$obj_image_lang->setId_image_section($id_image_section);

			return imageDao::uploadImage2Parameters($obj_image_lang);
		}

		/**
		 * [deleteWithImage6Parameters description]
		 *
		 * @param  [type] $id_table         [description]
		 * @param  [type] $id_image         [description]
		 * @param  [type] $id_image_lang    [description]
		 * @param  [type] $title_table_lang [description]
		 * @param  [type] $id_type_image    [description]
		 * @param  [type] $id_type_action   [description]
		 * @return [type]                   [description]
		 */

		public static function deleteWithImage6Parameters($id_table,$id_image,$id_image_lang,$title_table_lang,$id_type_image,$id_type_action)
		{
			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_image($id_image);
			$obj_image_lang->setId_image_lang($id_image_lang);
			$obj_image_lang->setId_type_image($id_type_image);

			$obj_image_lang->setId_table($id_table);
			$obj_image_lang->setTitle_table_lang($title_table_lang);

			return imageDao::deleteWithImage6Parameters($id_type_action,$obj_image_lang);
		}
	}