<?php
	require_once("stripe.php");

	class Stripe_lang extends Stripe
	{
		private $id_stripe_lang;
		private $title_stripe_lang;

		public function getId_stripe_lang(){
			return $this->id_stripe_lang;
		}

		public function setId_stripe_lang($id_stripe_lang){
			$this->id_stripe_lang = $id_stripe_lang;
		}

		public function getTitle_stripe_lang(){
			return $this->title_stripe_lang;
		}

		public function setTitle_stripe_lang($title_stripe_lang){
			$this->title_stripe_lang = $title_stripe_lang;
		}
	}