<?php
	require_once('attribute.php');

	class Attribute_lang extends cAttribute
	{
		private $id_attribute_lang;
		private $title_attribute_lang;
		private $last_update_attribute_lang;
		private $s_attribute_lang_visible;
		private $type_info;

		public function getId_attribute_lang(){
			return $this->id_attribute_lang;
		}

		public function setId_attribute_lang($id_attribute_lang){
			$this->id_attribute_lang = $id_attribute_lang;
		}

		public function getTitle_attribute_lang(){
			return $this->title_attribute_lang;
		}

		public function setTitle_attribute_lang($title_attribute_lang){
			$this->title_attribute_lang = $title_attribute_lang;
		}

		public function getLast_update_attribute_lang(){
			return $this->last_update_attribute_lang;
		}

		public function setLast_update_attribute_lang($last_update_attribute_lang){
			$this->last_update_attribute_lang = $last_update_attribute_lang;
		}

		public function getS_attribute_lang_visible(){
			return $this->s_attribute_lang_visible;
		}

		public function setS_attribute_lang_visible($s_attribute_lang_visible){
			$this->s_attribute_lang_visible = $s_attribute_lang_visible;
		}

		public function getType_info(){
			return $this->type_info;
		}

		public function setType_info($type_info){
			$this->type_info = $type_info;
		}
	}