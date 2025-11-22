<?php
	class cAttribute
	{
		private $id_attribute;
		private $parent_id_attribute;
		private $sort_attribute;
		private $s_attribute;

		public function getId_attribute(){
			return $this->id_attribute;
		}

		public function setId_attribute($id_attribute){
			$this->id_attribute = $id_attribute;
		}

		public function getParent_id_attribute(){
			return $this->parent_id_attribute;
		}

		public function setParent_id_attribute($parent_id_attribute){
			$this->parent_id_attribute = $parent_id_attribute;
		}

		public function getSort_attribute(){
			return $this->sort_attribute;
		}

		public function setSort_attribute($sort_attribute){
			$this->sort_attribute = $sort_attribute;
		}

		public function getS_attribute(){
			return $this->s_attribute;
		}

		public function setS_attribute($s_attribute){
			$this->s_attribute = $s_attribute;
		}
	}