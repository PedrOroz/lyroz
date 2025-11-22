<?php
	require_once('customize_lang.php');

	class Type_customize extends Customize_lang
	{
		private $id_type_customize;
		private $parent_type_customize;
		private $sort_type_ccustomize;
		private $default_type_route_customize;
		private $s_type_customize;

		public function getId_type_customize(){
			return $this->id_type_customize;
		}

		public function setId_type_customize($id_type_customize){
			$this->id_type_customize = $id_type_customize;
		}

		public function getParent_type_customize(){
			return $this->parent_type_customize;
		}

		public function setParent_type_customize($parent_type_customize){
			$this->parent_type_customize = $parent_type_customize;
		}

		public function getSort_type_ccustomize(){
			return $this->sort_type_ccustomize;
		}

		public function setSort_type_ccustomize($sort_type_ccustomize){
			$this->sort_type_ccustomize = $sort_type_ccustomize;
		}

		public function getDefault_type_route_customize(){
			return $this->default_type_route_customize;
		}

		public function setDefault_type_route_customize($default_type_route_customize){
			$this->default_type_route_customize = $default_type_route_customize;
		}

		public function getS_type_customize(){
			return $this->s_type_customize;
		}

		public function setS_type_customize($s_type_customize){
			$this->s_type_customize = $s_type_customize;
		}
	}