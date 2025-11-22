<?php
	require_once("type_image_lang.php");

	class Image_section extends Type_image_lang
	{
		private 		$id_image_section;
		private 		$parent_image_section;
		private 		$sort_image_section;
		private 		$s_image_section;

		public function getId_image_section(){
			return $this->id_image_section;
		}

		public function setId_image_section($id_image_section){
			$this->id_image_section = $id_image_section;
		}

		public function getParent_image_section(){
			return $this->parent_image_section;
		}

		public function setParent_image_section($parent_image_section){
			$this->parent_image_section = $parent_image_section;
		}

		public function getSort_image_section(){
			return $this->sort_image_section;
		}

		public function setSort_image_section($sort_image_section){
			$this->sort_image_section = $sort_image_section;
		}

		public function getS_image_section(){
			return $this->s_image_section;
		}

		public function setS_image_section($s_image_section){
			$this->s_image_section = $s_image_section;
		}
	}