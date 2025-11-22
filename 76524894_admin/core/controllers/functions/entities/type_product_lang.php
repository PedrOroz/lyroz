<?php
	require_once('type_product.php');

	class Type_product_lang extends Type_product
	{
		private $id_type_product_lang;
		private $title_type_product_lang;
		private $badge_type_product_lang;

		public function getId_type_product_lang(){
			return $this->id_type_product_lang;
		}

		public function setId_type_product_lang($id_type_product_lang){
			$this->id_type_product_lang = $id_type_product_lang;
		}

		public function getTitle_type_product_lang(){
			return $this->title_type_product_lang;
		}

		public function setTitle_type_product_lang($title_type_product_lang){
			$this->title_type_product_lang = $title_type_product_lang;
		}

		public function getBadge_type_product_lang(){
			return $this->badge_type_product_lang;
		}

		public function setBadge_type_product_lang($badge_type_product_lang){
			$this->badge_type_product_lang = $badge_type_product_lang;
		}
	}