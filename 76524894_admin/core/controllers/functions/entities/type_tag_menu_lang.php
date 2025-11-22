<?php
	require_once('type_tag_menu.php');

	class Type_tag_menu_lang extends Type_tag_menu
	{
		private $id_type_tag_menu_lang;
		private $title_type_tag_menu_lang;
		private $badge_type_tag_menu_lang;

		public function getId_type_tag_menu_lang(){
			return $this->id_type_tag_menu_lang;
		}

		public function setId_type_tag_menu_lang($id_type_tag_menu_lang){
			$this->id_type_tag_menu_lang = $id_type_tag_menu_lang;
		}

		public function getTitle_type_tag_menu_lang(){
			return $this->title_type_tag_menu_lang;
		}

		public function setTitle_type_tag_menu_lang($title_type_tag_menu_lang){
			$this->title_type_tag_menu_lang = $title_type_tag_menu_lang;
		}

		public function getBadge_type_tag_menu_lang(){
			return $this->badge_type_tag_menu_lang;
		}

		public function setBadge_type_tag_menu_lang($badge_type_tag_menu_lang){
			$this->badge_type_tag_menu_lang = $badge_type_tag_menu_lang;
		}
	}