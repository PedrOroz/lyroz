<?php
	require_once('type_promotion.php');

	class Type_promotion_lang extends Type_promotion
	{
		private $id_type_promotion_lang;
		private $type_promotion_lang;
		private $last_update_type_promotion_lang;

		public function getId_type_promotion_lang(){
			return $this->id_type_promotion_lang;
		}

		public function setId_type_promotion_lang($id_type_promotion_lang){
			$this->id_type_promotion_lang = $id_type_promotion_lang;
		}

		public function getType_promotion_lang(){
			return $this->type_promotion_lang;
		}

		public function setType_promotion_lang($type_promotion_lang){
			$this->type_promotion_lang = $type_promotion_lang;
		}

		public function getLast_update_type_promotion_lang(){
			return $this->last_update_type_promotion_lang;
		}

		public function setLast_update_type_promotion_lang($last_update_type_promotion_lang){
			$this->last_update_type_promotion_lang = $last_update_type_promotion_lang;
		}
	}