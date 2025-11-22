<?php
	require_once('customize.php');

	class Customize_lang extends Customize
	{
		private $id_customize_lang;
		private $name_customize_lang;
		private $background_color_customize_lang;
		private $color_customize_lang;
		private $text_block_1_customize_lang;

		public function getId_customize_lang(){
			return $this->id_customize_lang;
		}

		public function setId_customize_lang($id_customize_lang){
			$this->id_customize_lang = $id_customize_lang;
		}

		public function getName_customize_lang(){
			return $this->name_customize_lang;
		}

		public function setName_customize_lang($name_customize_lang){
			$this->name_customize_lang = $name_customize_lang;
		}

		public function getBackground_color_customize_lang(){
			return $this->background_color_customize_lang;
		}

		public function setBackground_color_customize_lang($background_color_customize_lang){
			$this->background_color_customize_lang = $background_color_customize_lang;
		}

		public function getColor_customize_lang(){
			return $this->color_customize_lang;
		}

		public function setColor_customize_lang($color_customize_lang){
			$this->color_customize_lang = $color_customize_lang;
		}

		public function getText_block_1_customize_lang(){
			return $this->text_block_1_customize_lang;
		}

		public function setText_block_1_customize_lang($text_block_1_customize_lang){
			$this->text_block_1_customize_lang = $text_block_1_customize_lang;
		}
	}