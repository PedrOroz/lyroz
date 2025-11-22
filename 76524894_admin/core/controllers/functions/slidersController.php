<?php
	require_once(dirname(__DIR__)."/../models/sliderDao.php");

	class slidersController
	{
		/**
		 * [showFormUploadSlider description]
		 *
		 * @return [type] [description]
		 */

		public static function showFormUploadSlider()
		{
			return sliderDao::showFormUploadSlider();
		}

		/**
		 * [registerSlider description]
		 *
		 * @param  [type] $id_type_image                        [description]
		 * @param  [type] $width_image                          [description]
		 * @param  [type] $height_image                         [description]
		 * @param  [type] $file_type                            [description]
		 * @param  [type] $file_size                            [description]
		 * @param  [type] $id_lang                              [description]
		 * @param  [type] $title_image_lang                     [description]
		 * @param  [type] $subtitle_image_lang                  [description]
		 * @param  [type] $description_small_image_lang         [description]
		 * @param  [type] $description_large_image_lang         [description]
		 * @param  [type] $title_hyperlink_image_lang           [description]
		 * @param  [type] $link_image_lang                      [description]
		 * @param  [type] $alt_image_lang                       [description]
		 * @param  [type] $background_color_image_lang          [description]
		 * @param  [type] $background_color_degraded_image_lang [description]
		 * @param  [type] $background_repeat_image_lang         [description]
		 * @param  [type] $background_position_image_lang       [description]
		 * @param  [type] $background_size_image_lang           [description]
		 * @param  [type] $id_type_version                      [description]
		 * @param  [type] $id_menu                              [description]
		 * @param  [type] $file_error                           [description]
		 * @param  [type] $file_name                            [description]
		 * @param  [type] $file_tmp_name                        [description]
		 * @return [type]                                       [description]
		 */

		public static function registerSlider($id_type_image,$width_image,$height_image,$file_type,$file_size,$id_lang,$title_image_lang,$subtitle_image_lang,$description_small_image_lang,$description_large_image_lang,$title_hyperlink_image_lang,$link_image_lang,$alt_image_lang,$background_color_image_lang,$background_color_degraded_image_lang,$background_repeat_image_lang,$background_position_image_lang,$background_size_image_lang,$id_type_version,$id_menu,$file_error,$file_name,$file_tmp_name)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_menu_lang 		= new Menu_lang();
			$obj_menu_lang->setId_menu($id_menu);

			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_version($id_type_version);

			$obj_image_lang->setId_type_image($id_type_image);
			$obj_image_lang->setWidth_image($width_image);
			$obj_image_lang->setHeight_image($height_image);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_size($file_size);

			$obj_image_lang->setTitle_image_lang($title_image_lang);
			$obj_image_lang->setSubtitle_image_lang($subtitle_image_lang);
			$obj_image_lang->setDescription_small_image_lang($description_small_image_lang);
			$obj_image_lang->setDescription_large_image_lang($description_large_image_lang);
			$obj_image_lang->setTitle_hyperlink_image_lang($title_hyperlink_image_lang);
			$obj_image_lang->setLink_image_lang($link_image_lang);
			$obj_image_lang->setAlt_image_lang($alt_image_lang);
			$obj_image_lang->setBackground_color_image_lang($background_color_image_lang);
			$obj_image_lang->setBackground_color_degraded_image_lang($background_color_degraded_image_lang);
			$obj_image_lang->setBackground_repeat_image_lang($background_repeat_image_lang);
			$obj_image_lang->setBackground_position_image_lang($background_position_image_lang);
			$obj_image_lang->setBackground_size_image_lang($background_size_image_lang);

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);

			return sliderDao::registerSlider($obj_lang,$obj_menu_lang,$obj_image_lang);
		}

		/**
		 * [showRegisteredSliders description]
		 *
		 * @param  [type] $id_type_image [description]
		 * @return [type]                [description]
		 */

		public static function showRegisteredSliders($id_type_image)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_image);

			return sliderDao::showRegisteredSliders($obj_image_lang);
		}

		/**
		 * [showBasicSliderSettings description]
		 * 
		 * @param  [type] $id_image         [description]
		 * @param  [type] $id_lang_selected [description]
		 * @return [type]                   [description]
		 */
		
		public static function showBasicSliderSettings($id_image,$id_lang_selected)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_image($id_image);

			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang_selected);

			return sliderDao::showBasicSliderSettings($obj_lang,$obj_image_lang);
		}

		/**
		 * [updateInformationSlider description]
		 *
		 * @param  [type] $id_menu                              [description]
		 * @param  [type] $id_image                             [description]
		 * @param  [type] $id_image_lang                        [description]
		 * @param  [type] $id_lang                              [description]
		 * @param  [type] $width_image                          [description]
		 * @param  [type] $height_image                         [description]
		 * @param  [type] $title_image_lang                     [description]
		 * @param  [type] $subtitle_image_lang                  [description]
		 * @param  [type] $description_small_image_lang         [description]
		 * @param  [type] $description_large_image_lang         [description]
		 * @param  [type] $title_hyperlink_image_lang           [description]
		 * @param  [type] $link_image_lang                      [description]
		 * @param  [type] $alt_image_lang                       [description]
		 * @param  [type] $background_color_image_lang          [description]
		 * @param  [type] $background_color_degraded_image_lang [description]
		 * @param  [type] $background_repeat_image_lang         [description]
		 * @param  [type] $background_position_image_lang       [description]
		 * @param  [type] $background_size_image_lang           [description]
		 * @return [type]                                       [description]
		 */

		public static function updateInformationSlider($id_menu,$id_image,$id_image_lang,$id_lang,$width_image,$height_image,$title_image_lang,$subtitle_image_lang,$description_small_image_lang,$description_large_image_lang,$title_hyperlink_image_lang,$link_image_lang,$alt_image_lang,$background_color_image_lang,$background_color_degraded_image_lang,$background_repeat_image_lang,$background_position_image_lang,$background_size_image_lang)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_menu_lang 		= new Menu_lang();
			$obj_menu_lang->setId_menu($id_menu);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_image($id_image);
			$obj_image_lang->setId_image_lang($id_image_lang);

			$obj_image_lang->setWidth_image($width_image);
			$obj_image_lang->setHeight_image($height_image);

			$obj_image_lang->setTitle_image_lang($title_image_lang);
			$obj_image_lang->setSubtitle_image_lang($subtitle_image_lang);
			$obj_image_lang->setDescription_small_image_lang($description_small_image_lang);
			$obj_image_lang->setDescription_large_image_lang($description_large_image_lang);
			$obj_image_lang->setTitle_hyperlink_image_lang($title_hyperlink_image_lang);
			$obj_image_lang->setLink_image_lang($link_image_lang);
			$obj_image_lang->setAlt_image_lang($alt_image_lang);
			$obj_image_lang->setBackground_color_image_lang($background_color_image_lang);
			$obj_image_lang->setBackground_color_degraded_image_lang($background_color_degraded_image_lang);
			$obj_image_lang->setBackground_repeat_image_lang($background_repeat_image_lang);
			$obj_image_lang->setBackground_position_image_lang($background_position_image_lang);
			$obj_image_lang->setBackground_size_image_lang($background_size_image_lang);

			return sliderDao::updateInformationSlider($obj_lang,$obj_menu_lang,$obj_image_lang);
		}

		/**
		 * [showPictures description]
		 * 
		 * @param  [type] $id_image        [description]
		 * @param  [type] $id_type_section [description]
		 * @param  [type] $id_lang         [description]
		 * @return [type]                  [description]
		 */
		
		public static function showPictures($id_image,$id_type_section,$id_lang)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setId_image($id_image);
			$obj_image_lang->setId_type_image($id_type_section);

			return sliderDao::showPictures($obj_lang,$obj_image_lang);
		}

		/**
		 * [showCarouselSliderByPage description]
		 * 
		 * @param  [type] $id_lang             [description]
		 * @param  [type] $id_menu             [description]
		 * @param  [type] $id_type_image       [description]
		 * @param  [type] $view                [description]
		 * @param  [type] $div_js              [description]
		 * @param  [type] $nameCarrousel       [description]
		 * @param  [type] $color               [description]
		 * @param  [type] $height              [description]
		 * @param  [type] $fondo               [description]
		 * @param  [type] $position_txt_slider [description]
		 * @return [type]                      [description]
		 */
		
		public static function showCarouselSliderByPage($id_lang,$id_menu,$id_type_image,$view,$div_js,$nameCarrousel,$color,$height,$fondo,$position_txt_slider)
		{
			$obj_lang 			= new Lang();
			$obj_lang->setId_lang($id_lang);

			$obj_menu_lang 		= new Menu_lang();
			$obj_menu_lang->setId_menu($id_menu);

			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_image);

			return sliderDao::showCarouselSliderByPage($view,$div_js,$nameCarrousel,$color,$height,$fondo,$position_txt_slider,$obj_lang,$obj_menu_lang,$obj_image_lang);
		}
	}