<?php
	require_once("type_of_currency.php");

	class Type_of_currency_lang extends Type_of_currency
	{
		private $id_type_of_currency_lang;
		private $type_of_currency_lang;
		private $value_type_of_currency_lang;
		private $symbol_type_of_currency_lang;
		private $last_type_of_currency_lang;

		public function getId_type_of_currency_lang(){
			return $this->id_type_of_currency_lang;
		}

		public function setId_type_of_currency_lang($id_type_of_currency_lang){
			$this->id_type_of_currency_lang = $id_type_of_currency_lang;
		}

		public function getType_of_currency_lang(){
			return $this->type_of_currency_lang;
		}

		public function setType_of_currency_lang($type_of_currency_lang){
			$this->type_of_currency_lang = $type_of_currency_lang;
		}

		public function getValue_type_of_currency_lang(){
			return $this->value_type_of_currency_lang;
		}

		public function setValue_type_of_currency_lang($value_type_of_currency_lang){
			$this->value_type_of_currency_lang = $value_type_of_currency_lang;
		}

		public function getSymbol_type_of_currency_lang(){
			return $this->symbol_type_of_currency_lang;
		}

		public function setSymbol_type_of_currency_lang($symbol_type_of_currency_lang){
			$this->symbol_type_of_currency_lang = $symbol_type_of_currency_lang;
		}

		public function getLast_type_of_currency_lang(){
			return $this->last_type_of_currency_lang;
		}

		public function setLast_type_of_currency_lang($last_type_of_currency_lang){
			$this->last_type_of_currency_lang = $last_type_of_currency_lang;
		}
	}