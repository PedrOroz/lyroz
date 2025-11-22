<?php
	require_once('type_image.php');
	
	class Type_image_lang extends Type_image
	{		
		private $id_type_image_lang;
		private $type_image_lang;
		private $last_update_type_image_lang;
		
		public function getId_type_image_lang(){
			return $this->id_type_image_lang;
		}

		public function setId_type_image_lang($id_type_image_lang){
			$this->id_type_image_lang = $id_type_image_lang;
		}

		public function getType_image_lang(){
			return $this->type_image_lang;
		}

		public function setType_image_lang($type_image_lang){
			$this->type_image_lang = $type_image_lang;
		}

		public function getLast_update_type_image_lang(){
			return $this->last_update_type_image_lang;
		}

		public function setLast_update_type_image_lang($last_update_type_image_lang){
			$this->last_update_type_image_lang = $last_update_type_image_lang;
		}
	}