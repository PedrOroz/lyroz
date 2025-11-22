<?php
	require_once('type_product_lang.php');

	class Product extends Type_product_lang
	{
		private $id_product;
		private $parent_product;
		private $sort_product;
		private $s_product_visible;
		private $s_product;

		public function getId_product(){
			return $this->id_product;
		}

		public function setId_product($id_product){
			$this->id_product = $id_product;
		}

		public function getParent_product(){
			return $this->parent_product;
		}

		public function setParent_product($parent_product){
			$this->parent_product = $parent_product;
		}

		public function getSort_product(){
			return $this->sort_product;
		}

		public function setSort_product($sort_product){
			$this->sort_product = $sort_product;
		}

		public function getS_product_visible(){
			return $this->s_product_visible;
		}

		public function setS_product_visible($s_product_visible){
			$this->s_product_visible = $s_product_visible;
		}

		public function getS_product(){
			return $this->s_product;
		}

		public function setS_product($s_product){
			$this->s_product = $s_product;
		}
	}