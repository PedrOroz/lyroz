<?php
	require_once("image_section_lang.php");

	class Image extends Image_section_lang
	{
		private 		$id_image;
		private 		$width_image;
		private 		$height_image;
		private 		$parent_image;
		private 		$sort_image;
		private 		$last_image_update;
		private 		$s_image;
		private 		$file_error;
		private 		$file_tmp_name;
		private 		$file_size;
		private 		$file_name;
		private 		$file_type;
		private 		$pathInfo;
		private 		$randomName;
		private 		$fullRoute;
		private 		$fullRouteWeb;
		private 		$folder;
		private 		$folderWeb;
		private 		$id_table;
		private 		$id_table_lang;
		private 		$title_table_lang;

		public function getId_image(){
			return $this->id_image;
		}

		public function setId_image($id_image){
			$this->id_image = $id_image;
		}

		public function getWidth_image(){
			return $this->width_image;
		}

		public function setWidth_image($width_image){
			$this->width_image = $width_image;
		}

		public function getHeight_image(){
			return $this->height_image;
		}

		public function setHeight_image($height_image){
			$this->height_image = $height_image;
		}

		public function getParent_image(){
			return $this->parent_image;
		}

		public function setParent_image($parent_image){
			$this->parent_image = $parent_image;
		}

		public function getSort_image(){
			return $this->sort_image;
		}

		public function setSort_image($sort_image){
			$this->sort_image = $sort_image;
		}

		public function getLast_image_update(){
			return $this->last_image_update;
		}

		public function setLast_image_update($last_image_update){
			$this->last_image_update = $last_image_update;
		}

		public function getS_image(){
			return $this->s_image;
		}

		public function setS_image($s_image){
			$this->s_image = $s_image;
		}

		public function getFile_error(){
			return $this->file_error;
		}

		public function setFile_error($file_error){
			$this->file_error = $file_error;
		}

		public function getFile_tmp_name(){
			return $this->file_tmp_name;
		}

		public function setFile_tmp_name($file_tmp_name){
			$this->file_tmp_name = $file_tmp_name;
		}

		public function getFile_size(){
			return $this->file_size;
		}

		public function setFile_size($file_size){
			$this->file_size = $file_size;
		}

		public function getFile_name(){
			return $this->file_name;
		}

		public function setFile_name($file_name){
			$this->file_name = $file_name;
		}

		public function getFile_type(){
			return $this->file_type;
		}

		public function setFile_type($file_type){
			$this->file_type = $file_type;
		}

		public function getPathInfo(){
			return $this->pathInfo;
		}

		public function setPathInfo($pathInfo){
			$this->pathInfo = $pathInfo;
		}

		public function getRandomName(){
			return $this->randomName;
		}

		public function setRandomName($randomName){
			$this->randomName = $randomName;
		}

		public function getFullRoute(){
			return $this->fullRoute;
		}

		public function setFullRoute($fullRoute){
			$this->fullRoute = $fullRoute;
		}

		public function getFullRouteWeb(){
			return $this->fullRouteWeb;
		}

		public function setFullRouteWeb($fullRouteWeb){
			$this->fullRouteWeb = $fullRouteWeb;
		}

		public function getFolder(){
			return $this->folder;
		}

		public function setFolder($folder){
			$this->folder = $folder;
		}

		public function getFolderWeb(){
			return $this->folderWeb;
		}

		public function setFolderWeb($folderWeb){
			$this->folderWeb = $folderWeb;
		}

		public function getId_table(){
			return $this->id_table;
		}

		public function setId_table($id_table){
			$this->id_table = $id_table;
		}

		public function getId_table_lang(){
			return $this->id_table_lang;
		}

		public function setId_table_lang($id_table_lang){
			$this->id_table_lang = $id_table_lang;
		}

		public function getTitle_table_lang(){
			return $this->title_table_lang;
		}

		public function setTitle_table_lang($title_table_lang){
			$this->title_table_lang = $title_table_lang;
		}
	}