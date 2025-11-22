<?php
	require_once('product_lang_presentation.php');

	class Product_lang_presentation_lang extends Product_lang_presentation
	{
		private $id_product_lang_presentation_lang;
		private $general_price_product_lang_presentation;
		private $general_stock_product_lang_presentation_lang;
		private $reference_product_lang_presentation_lang;
		private $meta_title_product_lang_presentation_lang;
		private $meta_description_product_lang_presentation_lang;
		private $meta_keywords_product_lang_presentation_lang;
		private $last_update_product_lang_presentation_lang;
		private $s_product_lang_presentation_lang_visible;

		public function getId_product_lang_presentation_lang(){
			return $this->id_product_lang_presentation_lang;
		}

		public function setId_product_lang_presentation_lang($id_product_lang_presentation_lang){
			$this->id_product_lang_presentation_lang = $id_product_lang_presentation_lang;
		}

		public function getGeneral_price_product_lang_presentation(){
			return $this->general_price_product_lang_presentation;
		}

		public function setGeneral_price_product_lang_presentation($general_price_product_lang_presentation){
			$this->general_price_product_lang_presentation = $general_price_product_lang_presentation;
		}

		public function getGeneral_stock_product_lang_presentation_lang(){
			return $this->general_stock_product_lang_presentation_lang;
		}

		public function setGeneral_stock_product_lang_presentation_lang($general_stock_product_lang_presentation_lang){
			$this->general_stock_product_lang_presentation_lang = $general_stock_product_lang_presentation_lang;
		}

		public function getReference_product_lang_presentation_lang(){
			return $this->reference_product_lang_presentation_lang;
		}

		public function setReference_product_lang_presentation_lang($reference_product_lang_presentation_lang){
			$this->reference_product_lang_presentation_lang = $reference_product_lang_presentation_lang;
		}

		public function getMeta_title_product_lang_presentation_lang(){
			return $this->meta_title_product_lang_presentation_lang;
		}

		public function setMeta_title_product_lang_presentation_lang($meta_title_product_lang_presentation_lang){
			$this->meta_title_product_lang_presentation_lang = $meta_title_product_lang_presentation_lang;
		}

		public function getMeta_description_product_lang_presentation_lang(){
			return $this->meta_description_product_lang_presentation_lang;
		}

		public function setMeta_description_product_lang_presentation_lang($meta_description_product_lang_presentation_lang){
			$this->meta_description_product_lang_presentation_lang = $meta_description_product_lang_presentation_lang;
		}

		public function getMeta_keywords_product_lang_presentation_lang(){
			return $this->meta_keywords_product_lang_presentation_lang;
		}

		public function setMeta_keywords_product_lang_presentation_lang($meta_keywords_product_lang_presentation_lang){
			$this->meta_keywords_product_lang_presentation_lang = $meta_keywords_product_lang_presentation_lang;
		}

		public function getLast_update_product_lang_presentation_lang(){
			return $this->last_update_product_lang_presentation_lang;
		}

		public function setLast_update_product_lang_presentation_lang($last_update_product_lang_presentation_lang){
			$this->last_update_product_lang_presentation_lang = $last_update_product_lang_presentation_lang;
		}

		public function getS_product_lang_presentation_lang_visible(){
			return $this->s_product_lang_presentation_lang_visible;
		}

		public function setS_product_lang_presentation_lang_visible($s_product_lang_presentation_lang_visible){
			$this->s_product_lang_presentation_lang_visible = $s_product_lang_presentation_lang_visible;
		}
	}