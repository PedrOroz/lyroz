<?php
	class File
	{
		private $id_file;
		private $format_file;
		private $size_file;
		private $attached_file_error;
		private $attached_file_tmp_name;
		private $attached_file_size;
		private $attached_file_name;
		private $attached_file_type;
		private $parent_file;
		private $sort_file;
		private $s_file;

		public function getId_file(){
			return $this->id_file;
		}

		public function setId_file($id_file){
			$this->id_file = $id_file;
		}

		public function getFormat_file(){
			return $this->format_file;
		}

		public function setFormat_file($format_file){
			$this->format_file = $format_file;
		}

		public function getSize_file(){
			return $this->size_file;
		}

		public function setSize_file($size_file){
			$this->size_file = $size_file;
		}

		public function getAttached_file_error(){
			return $this->attached_file_error;
		}

		public function setAttached_file_error($attached_file_error){
			$this->attached_file_error = $attached_file_error;
		}

		public function getAttached_file_tmp_name(){
			return $this->attached_file_tmp_name;
		}

		public function setAttached_file_tmp_name($attached_file_tmp_name){
			$this->attached_file_tmp_name = $attached_file_tmp_name;
		}

		public function getAttached_file_size(){
			return $this->attached_file_size;
		}

		public function setAttached_file_size($attached_file_size){
			$this->attached_file_size = $attached_file_size;
		}

		public function getAttached_file_name(){
			return $this->attached_file_name;
		}

		public function setAttached_file_name($attached_file_name){
			$this->attached_file_name = $attached_file_name;
		}

		public function getAttached_file_type(){
			return $this->attached_file_type;
		}

		public function setAttached_file_type($attached_file_type){
			$this->attached_file_type = $attached_file_type;
		}

		public function getParent_file(){
			return $this->parent_file;
		}

		public function setParent_file($parent_file){
			$this->parent_file = $parent_file;
		}

		public function getSort_file(){
			return $this->sort_file;
		}

		public function setSort_file($sort_file){
			$this->sort_file = $sort_file;
		}

		public function getS_file(){
			return $this->s_file;
		}

		public function setS_file($s_file){
			$this->s_file = $s_file;
		}
	}