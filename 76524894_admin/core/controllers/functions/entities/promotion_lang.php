<?php
	require_once("promotion.php");

	class Promotion_lang extends Promotion
	{
		private $id_promotion_lang;
		private $title_promotion_lang;
		private $promotional_code_lang;
		private $description_small_promotion_lang;
		private $description_large_promotion_lang;
		private $link_promotion_lang;
		private $last_update_promotion_lang;

		public function getId_promotion_lang(){
			return $this->id_promotion_lang;
		}

		public function setId_promotion_lang($id_promotion_lang){
			$this->id_promotion_lang = $id_promotion_lang;
		}

		public function getTitle_promotion_lang(){
			return $this->title_promotion_lang;
		}

		public function setTitle_promotion_lang($title_promotion_lang){
			$this->title_promotion_lang = $title_promotion_lang;
		}

		public function getPromotional_code_lang(){
			return $this->promotional_code_lang;
		}

		public function setPromotional_code_lang($promotional_code_lang){
			$this->promotional_code_lang = $promotional_code_lang;
		}

		public function getDescription_small_promotion_lang(){
			return $this->description_small_promotion_lang;
		}

		public function setDescription_small_promotion_lang($description_small_promotion_lang){
			$this->description_small_promotion_lang = $description_small_promotion_lang;
		}

		public function getDescription_large_promotion_lang(){
			return $this->description_large_promotion_lang;
		}

		public function setDescription_large_promotion_lang($description_large_promotion_lang){
			$this->description_large_promotion_lang = $description_large_promotion_lang;
		}

		public function getLink_promotion_lang(){
			return $this->link_promotion_lang;
		}

		public function setLink_promotion_lang($link_promotion_lang){
			$this->link_promotion_lang = $link_promotion_lang;
		}

		public function getLast_update_promotion_lang(){
			return $this->last_update_promotion_lang;
		}

		public function setLast_update_promotion_lang($last_update_promotion_lang){
			$this->last_update_promotion_lang = $last_update_promotion_lang;
		}
	}