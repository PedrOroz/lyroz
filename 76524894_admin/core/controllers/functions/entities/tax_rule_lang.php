<?php
	require_once("tax_rule.php");

	class Tax_rule_lang extends Tax_rule
	{
		private $id_tax_rule_lang;
		private $title_tax_rule_lang;
		private $value_tax_rule_lang;
		private $last_tax_rule_lang;

		public function getId_tax_rule_lang(){
			return $this->id_tax_rule_lang;
		}

		public function setId_tax_rule_lang($id_tax_rule_lang){
			$this->id_tax_rule_lang = $id_tax_rule_lang;
		}

		public function getTitle_tax_rule_lang(){
			return $this->title_tax_rule_lang;
		}

		public function setTitle_tax_rule_lang($title_tax_rule_lang){
			$this->title_tax_rule_lang = $title_tax_rule_lang;
		}

		public function getValue_tax_rule_lang(){
			return $this->value_tax_rule_lang;
		}

		public function setValue_tax_rule_lang($value_tax_rule_lang){
			$this->value_tax_rule_lang = $value_tax_rule_lang;
		}

		public function getLast_tax_rule_lang(){
			return $this->last_tax_rule_lang;
		}

		public function setLast_tax_rule_lang($last_tax_rule_lang){
			$this->last_tax_rule_lang = $last_tax_rule_lang;
		}
	}