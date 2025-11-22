<?php
	require_once('category.php');

	class Category_lang extends Category
	{
		private $id_category_lang;
		private $title_category_lang;
		private $subtitle_category_lang;
		private $description_small_category_lang;
		private $description_large_category_lang;
		private $last_update_category_lang;
		private $s_category_lang_visible;
		private $type_info;

		public function getId_category_lang(){
			return $this->id_category_lang;
		}

		public function setId_category_lang($id_category_lang){
			$this->id_category_lang = $id_category_lang;
		}

		public function getTitle_category_lang(){
			return $this->title_category_lang;
		}

		public function setTitle_category_lang($title_category_lang){
			$this->title_category_lang = $title_category_lang;
		}

		public function getSubtitle_category_lang(){
			return $this->subtitle_category_lang;
		}

		public function setSubtitle_category_lang($subtitle_category_lang){
			$this->subtitle_category_lang = $subtitle_category_lang;
		}

		public function getDescription_small_category_lang(){
			return $this->description_small_category_lang;
		}

		public function setDescription_small_category_lang($description_small_category_lang){
			$this->description_small_category_lang = $description_small_category_lang;
		}

		public function getDescription_large_category_lang(){
			return $this->description_large_category_lang;
		}

		public function setDescription_large_category_lang($description_large_category_lang){
			$this->description_large_category_lang = $description_large_category_lang;
		}

		public function getLast_update_category_lang(){
			return $this->last_update_category_lang;
		}

		public function setLast_update_category_lang($last_update_category_lang){
			$this->last_update_category_lang = $last_update_category_lang;
		}

		public function getS_category_lang_visible(){
			return $this->s_category_lang_visible;
		}

		public function setS_category_lang_visible($s_category_lang_visible){
			$this->s_category_lang_visible = $s_category_lang_visible;
		}

		public function getType_info(){
			return $this->type_info;
		}

		public function setType_info($type_info){
			$this->type_info = $type_info;
		}
	}