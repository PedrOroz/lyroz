<?php	
	require_once("menu.php");

	class Menu_lang extends Menu
	{	
		private $id_menu_lang;
		private $title_menu;
		private $link_menu;
		private $link_rewrite_menu;
		private $meta_title_menu;
		private $meta_description_menu;
		private $meta_keywords_menu;
		private $last_update_menu_lang;

		public function getId_menu_lang(){
			return $this->id_menu_lang;
		}

		public function setId_menu_lang($id_menu_lang){
			$this->id_menu_lang = $id_menu_lang;
		}

		public function getTitle_menu(){
			return $this->title_menu;
		}

		public function setTitle_menu($title_menu){
			$this->title_menu = $title_menu;
		}

		public function getLink_menu(){
			return $this->link_menu;
		}

		public function setLink_menu($link_menu){
			$this->link_menu = $link_menu;
		}

		public function getLink_rewrite_menu(){
			return $this->link_rewrite_menu;
		}

		public function setLink_rewrite_menu($link_rewrite_menu){
			$this->link_rewrite_menu = $link_rewrite_menu;
		}

		public function getMeta_title_menu(){
			return $this->meta_title_menu;
		}

		public function setMeta_title_menu($meta_title_menu){
			$this->meta_title_menu = $meta_title_menu;
		}

		public function getMeta_description_menu(){
			return $this->meta_description_menu;
		}

		public function setMeta_description_menu($meta_description_menu){
			$this->meta_description_menu = $meta_description_menu;
		}

		public function getMeta_keywords_menu(){
			return $this->meta_keywords_menu;
		}

		public function setMeta_keywords_menu($meta_keywords_menu){
			$this->meta_keywords_menu = $meta_keywords_menu;
		}

		public function getLast_update_menu_lang(){
			return $this->last_update_menu_lang;
		}

		public function setLast_update_menu_lang($last_update_menu_lang){
			$this->last_update_menu_lang = $last_update_menu_lang;
		}	
	}