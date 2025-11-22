<?php
	class Category
	{
		private $id_category;
		private $type_info;
		private $parent_id;
		private $sort_category;
		private $color_hexadecimal_category;
		private $s_category;

		public function getId_category(){
			return $this->id_category;
		}

		public function setId_category($id_category){
			$this->id_category = $id_category;
		}

		public function getType_info(){
			return $this->type_info;
		}

		public function setType_info($type_info){
			$this->type_info = $type_info;
		}

		public function getParent_id(){
			return $this->parent_id;
		}

		public function setParent_id($parent_id){
			$this->parent_id = $parent_id;
		}

		public function getSort_category(){
			return $this->sort_category;
		}

		public function setSort_category($sort_category){
			$this->sort_category = $sort_category;
		}

		public function getColor_hexadecimal_category(){
			return $this->color_hexadecimal_category;
		}

		public function setColor_hexadecimal_category($color_hexadecimal_category){
			$this->color_hexadecimal_category = $color_hexadecimal_category;
		}

		public function getS_category(){
			return $this->s_category;
		}

		public function setS_category($s_category){
			$this->s_category = $s_category;
		}
	}