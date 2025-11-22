<?php
	class Product_user_purchase_history
	{
		private $id_product_user_purchase_history;
		private $id_buying_user;
		private $comment_product_user_purchase_history;
		private $payment_status_product_user_purchase_history;
		private $s_visible_product_user_purchase_history;
		private $s_notification_product_user_purchase_history;
		
		public function getId_product_user_purchase_history(){
			return $this->id_product_user_purchase_history;
		}

		public function setId_product_user_purchase_history($id_product_user_purchase_history){
			$this->id_product_user_purchase_history = $id_product_user_purchase_history;
		}

		public function getId_buying_user(){
			return $this->id_buying_user;
		}

		public function setId_buying_user($id_buying_user){
			$this->id_buying_user = $id_buying_user;
		}

		public function getComment_product_user_purchase_history(){
			return $this->comment_product_user_purchase_history;
		}

		public function setComment_product_user_purchase_history($comment_product_user_purchase_history){
			$this->comment_product_user_purchase_history = $comment_product_user_purchase_history;
		}

		public function getPayment_status_product_user_purchase_history(){
			return $this->payment_status_product_user_purchase_history;
		}

		public function setPayment_status_product_user_purchase_history($payment_status_product_user_purchase_history){
			$this->payment_status_product_user_purchase_history = $payment_status_product_user_purchase_history;
		}

		public function getS_visible_product_user_purchase_history(){
			return $this->s_visible_product_user_purchase_history;
		}

		public function setS_visible_product_user_purchase_history($s_visible_product_user_purchase_history){
			$this->s_visible_product_user_purchase_history = $s_visible_product_user_purchase_history;
		}

		public function getS_notification_product_user_purchase_history(){
			return $this->s_notification_product_user_purchase_history;
		}

		public function setS_notification_product_user_purchase_history($s_notification_product_user_purchase_history){
			$this->s_notification_product_user_purchase_history = $s_notification_product_user_purchase_history;
		}
	}