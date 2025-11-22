<?php
	class Product_stripe
	{
		private $id_product_stripe;
		private $value_product_stripe;
		private $sort_product_stripe;
		private $s_visible_product_stripe;
		private $id_product_image_lang;

		public function getId_product_stripe(){
			return $this->id_product_stripe;
		}

		public function setId_product_stripe($id_product_stripe){
			$this->id_product_stripe = $id_product_stripe;
		}

		public function getValue_product_stripe(){
			return $this->value_product_stripe;
		}

		public function setValue_product_stripe($value_product_stripe){
			$this->value_product_stripe = $value_product_stripe;
		}

		public function getSort_product_stripe(){
			return $this->sort_product_stripe;
		}

		public function setSort_product_stripe($sort_product_stripe){
			$this->sort_product_stripe = $sort_product_stripe;
		}

		public function getS_visible_product_stripe(){
			return $this->s_visible_product_stripe;
		}

		public function setS_visible_product_stripe($s_visible_product_stripe){
			$this->s_visible_product_stripe = $s_visible_product_stripe;
		}

		public function getId_product_image_lang(){
			return $this->id_product_image_lang;
		}

		public function setId_product_image_lang($id_product_image_lang){
			$this->id_product_image_lang = $id_product_image_lang;
		}
	}