<?php
	class Lang
	{		
		private $id_lang;
		private $lang;
		private $iso_code;
		private $lang_cod;
		private $locale;
		private $date_format_lite;
		private $date_format_full;
		private $flag;
		private $lang_default;
		private $s_lang;

		public function getId_lang(){
			return $this->id_lang;
		}

		public function setId_lang($id_lang){
			$this->id_lang = $id_lang;
		}

		public function getLang(){
			return $this->lang;
		}

		public function setLang($lang){
			$this->lang = $lang;
		}

		public function getIso_code(){
			return $this->iso_code;
		}

		public function setIso_code($iso_code){
			$this->iso_code = $iso_code;
		}

		public function getLang_cod(){
			return $this->lang_cod;
		}

		public function setLang_cod($lang_cod){
			$this->lang_cod = $lang_cod;
		}

		public function getLocale(){
			return $this->locale;
		}

		public function setLocale($locale){
			$this->locale = $locale;
		}

		public function getDate_format_lite(){
			return $this->date_format_lite;
		}

		public function setDate_format_lite($date_format_lite){
			$this->date_format_lite = $date_format_lite;
		}

		public function getDate_format_full(){
			return $this->date_format_full;
		}

		public function setDate_format_full($date_format_full){
			$this->date_format_full = $date_format_full;
		}

		public function getFlag(){
			return $this->flag;
		}

		public function setFlag($flag){
			$this->flag = $flag;
		}

		public function getLang_default(){
			return $this->lang_default;
		}

		public function setLang_default($lang_default){
			$this->lang_default = $lang_default;
		}

		public function getS_lang(){
			return $this->s_lang;
		}

		public function setS_lang($s_lang){
			$this->s_lang = $s_lang;
		}
	}