<?php
	class Type_promotion
	{
		private $id_type_promotion;
		private $parent_type_promotion;
		private $sort_type_promotion;

		public function getId_type_promotion(){
			return $this->id_type_promotion;
		}

		public function setId_type_promotion($id_type_promotion){
			$this->id_type_promotion = $id_type_promotion;
		}

		public function getParent_type_promotion(){
			return $this->parent_type_promotion;
		}

		public function setParent_type_promotion($parent_type_promotion){
			$this->parent_type_promotion = $parent_type_promotion;
		}

		public function getSort_type_promotion(){
			return $this->sort_type_promotion;
		}

		public function setSort_type_promotion($sort_type_promotion){
			$this->sort_type_promotion = $sort_type_promotion;
		}
	}