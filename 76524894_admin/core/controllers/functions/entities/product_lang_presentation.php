<?php
	class Product_lang_presentation
	{
		private $id_product_lang_presentation;
		private $parent_product_lang_presentation;
		private $sort_product_lang_presentation;
		private $s_product_lang_presentation;

		public function getId_product_lang_presentation(){
			return $this->id_product_lang_presentation;
		}

		public function setId_product_lang_presentation($id_product_lang_presentation){
			$this->id_product_lang_presentation = $id_product_lang_presentation;
		}

		public function getParent_product_lang_presentation(){
			return $this->parent_product_lang_presentation;
		}

		public function setParent_product_lang_presentation($parent_product_lang_presentation){
			$this->parent_product_lang_presentation = $parent_product_lang_presentation;
		}

		public function getSort_product_lang_presentation(){
			return $this->sort_product_lang_presentation;
		}

		public function setSort_product_lang_presentation($sort_product_lang_presentation){
			$this->sort_product_lang_presentation = $sort_product_lang_presentation;
		}

		public function getS_product_lang_presentation(){
			return $this->s_product_lang_presentation;
		}

		public function setS_product_lang_presentation($s_product_lang_presentation){
			$this->s_product_lang_presentation = $s_product_lang_presentation;
		}
	}