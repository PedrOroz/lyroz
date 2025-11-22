<?php
	class Type_version
	{
		private $id_type_version;
		private $parent_type_version;
		private $sort_type_version;
		private $s_type_version;

		public function getId_type_version(){
			return $this->id_type_version;
		}

		public function setId_type_version($id_type_version){
			$this->id_type_version = $id_type_version;
		}

		public function getParent_type_version(){
			return $this->parent_type_version;
		}

		public function setParent_type_version($parent_type_version){
			$this->parent_type_version = $parent_type_version;
		}

		public function getSort_type_version(){
			return $this->sort_type_version;
		}

		public function setSort_type_version($sort_type_version){
			$this->sort_type_version = $sort_type_version;
		}

		public function getS_type_version(){
			return $this->s_type_version;
		}

		public function setS_type_version($s_type_version){
			$this->s_type_version = $s_type_version;
		}
	}