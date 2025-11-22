<?php
	class Stripe
	{
		private $id_stripe;

		public function getId_stripe(){
			return $this->id_stripe;
		}

		public function setId_stripe($id_stripe){
			$this->id_stripe = $id_stripe;
		}
	}