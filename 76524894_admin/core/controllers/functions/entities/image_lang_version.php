<?php	
	require_once("image_lang.php");

	class Image_lang_version extends Image_lang
	{		
		private 		$id_image_lang_version;
		private 		$image_lang;
		private 		$s_main_image_lang_version;
		
		public function getId_image_lang_version(){
			return $this->id_image_lang_version;
		}

		public function setId_image_lang_version($id_image_lang_version){
			$this->id_image_lang_version = $id_image_lang_version;
		}

		public function getImage_lang(){
			return $this->image_lang;
		}

		public function setImage_lang($image_lang){
			$this->image_lang = $image_lang;
		}

		public function getS_main_image_lang_version(){
			return $this->s_main_image_lang_version;
		}

		public function setS_main_image_lang_version($s_main_image_lang_version){
			$this->s_main_image_lang_version = $s_main_image_lang_version;
		}
	}