<?php
	class Product_user_wishlist
	{
		private $id_product_user_wishlist;
		private $registration_date_product_user_wishlist;

		public function getId_product_user_wishlist(){
			return $this->id_product_user_wishlist;
		}

		public function setId_product_user_wishlist($id_product_user_wishlist){
			$this->id_product_user_wishlist = $id_product_user_wishlist;
		}

		public function getRegistration_date_product_user_wishlist(){
			return $this->registration_date_product_user_wishlist;
		}

		public function setRegistration_date_product_user_wishlist($registration_date_product_user_wishlist){
			$this->registration_date_product_user_wishlist = $registration_date_product_user_wishlist;
		}
	}