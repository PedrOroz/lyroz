<?php
	require_once('type_version.php');
	
	class Type_image extends Type_version
	{		
		private $id_type_image;
		private $parent_type_image;
		private $sort_type_image;
		private $default_route_type_image;
		private $s_type_image;
		
		public function getId_type_image(){
			return $this->id_type_image;
		}

		public function setId_type_image($id_type_image){
			$this->id_type_image = $id_type_image;
		}

		public function getParent_type_image(){
			return $this->parent_type_image;
		}

		public function setParent_type_image($parent_type_image){
			$this->parent_type_image = $parent_type_image;
		}

		public function getSort_type_image(){
			return $this->sort_type_image;
		}

		public function setSort_type_image($sort_type_image){
			$this->sort_type_image = $sort_type_image;
		}

		public function getDefault_route_type_image(){
			return $this->default_route_type_image;
		}

		public function setDefault_route_type_image($default_route_type_image){
			$this->default_route_type_image = $default_route_type_image;
		}

		public function getS_type_image(){
			return $this->s_type_image;
		}

		public function setS_type_image($s_type_image){
			$this->s_type_image = $s_type_image;
		}
	}