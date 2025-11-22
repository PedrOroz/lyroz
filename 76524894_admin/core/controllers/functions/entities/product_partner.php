<?php
	class Product_partner
	{
		private $id_product_partner;
		private $parent_id_product;
		private $sort_product_partner;
		private $s_visible_product_partner;

		public function getId_product_partner(){
			return $this->id_product_partner;
		}

		public function setId_product_partner($id_product_partner){
			$this->id_product_partner = $id_product_partner;
		}

		public function getParent_id_product(){
			return $this->parent_id_product;
		}

		public function setParent_id_product($parent_id_product){
			$this->parent_id_product = $parent_id_product;
		}

		public function getSort_product_partner(){
			return $this->sort_product_partner;
		}

		public function setSort_product_partner($sort_product_partner){
			$this->sort_product_partner = $sort_product_partner;
		}

		public function getS_visible_product_partner(){
			return $this->s_visible_product_partner;
		}

		public function setS_visible_product_partner($s_visible_product_partner){
			$this->s_visible_product_partner = $s_visible_product_partner;
		}
	}