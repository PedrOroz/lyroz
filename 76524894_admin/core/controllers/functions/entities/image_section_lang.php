<?php
	require_once("image_section.php");

	class Image_section_lang extends Image_section
	{
		private 		$id_image_section_lang;
		private 		$name_image_section_lang;

		public function getId_image_section_lang(){
			return $this->id_image_section_lang;
		}

		public function setId_image_section_lang($id_image_section_lang){
			$this->id_image_section_lang = $id_image_section_lang;
		}

		public function getName_image_section_lang(){
			return $this->name_image_section_lang;
		}

		public function setName_image_section_lang($name_image_section_lang){
			$this->name_image_section_lang = $name_image_section_lang;
		}
	}