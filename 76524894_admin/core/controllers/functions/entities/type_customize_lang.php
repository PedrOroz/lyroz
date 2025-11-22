<?php
	require_once('type_customize.php');

	class Type_customize_lang extends Type_customize
	{
		private $id_type_customize_lang;
		private $name_type_customize_lang;

		public function getId_type_customize_lang(){
			return $this->id_type_customize_lang;
		}

		public function setId_type_customize_lang($id_type_customize_lang){
			$this->id_type_customize_lang = $id_type_customize_lang;
		}

		public function getName_type_customize_lang(){
			return $this->name_type_customize_lang;
		}

		public function setName_type_customize_lang($name_type_customize_lang){
			$this->name_type_customize_lang = $name_type_customize_lang;
		}
	}