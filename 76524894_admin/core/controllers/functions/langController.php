<?php
	require_once(dirname(__DIR__)."/../models/langDao.php");

	class langController
	{
		/**
		 * [prefixLangDefault description]
		 *
		 * @param  [type] $ruta [description]
		 * @return [type]       [description]
		 */

		public static function prefixLangDefault($ruta)
		{
			return langDao::prefixLangDefault($ruta);
		}

		/**
		 * [prefixLangByIdLang description]
		 *
		 * @param  [type] $id_lang [description]
		 * @return [type]          [description]
		 */

		public static function prefixLangByIdLang($id_lang)
		{
			$obj_lang 	= new Lang();
			$obj_lang->setId_lang($id_lang);

			return langDao::prefixLangByIdLang($obj_lang);
		}

		/**
		 * [showListOfLanguagesWithWelectedLanguage description]
		 *
		 * @param  [type] $id_lang [description]
		 * @return [type]          [description]
		 */

		public static function showListOfLanguagesWithWelectedLanguage($id_lang)
		{
			$obj_lang 	= new Lang();
			$obj_lang->setId_lang($id_lang);

			return langDao::showListOfLanguagesWithWelectedLanguage($obj_lang);
		}

		/**
		 * [langIdLanguage description]
		 * 
		 * @return [type] [description]
		 */
		
		public static function langIdLanguage()
		{
			return langDao::langIdLanguage();
		}
	}