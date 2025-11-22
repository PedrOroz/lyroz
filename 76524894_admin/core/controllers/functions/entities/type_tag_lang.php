<?php
	require_once('type_tag.php');

	class Type_tag_lang extends Type_tag
	{
		private $id_type_tag_lang;
		private $title_type_tag_lang;
		private $badge_type_tag_lang;

		public function getId_type_tag_lang(){
			return $this->id_type_tag_lang;
		}

		public function setId_type_tag_lang($id_type_tag_lang){
			$this->id_type_tag_lang = $id_type_tag_lang;
		}

		public function getTitle_type_tag_lang(){
			return $this->title_type_tag_lang;
		}

		public function setTitle_type_tag_lang($title_type_tag_lang){
			$this->title_type_tag_lang = $title_type_tag_lang;
		}

		public function getBadge_type_tag_lang(){
			return $this->badge_type_tag_lang;
		}

		public function setBadge_type_tag_lang($badge_type_tag_lang){
			$this->badge_type_tag_lang = $badge_type_tag_lang;
		}
	}