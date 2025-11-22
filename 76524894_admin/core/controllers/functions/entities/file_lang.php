<?php
	require_once('file.php');
	
	class File_lang extends File
	{		
		private $id_file_lang;
		private $title_file_lang;
		private $attached_file_lang;
		private $link_file_lang;
		private $last_update_file_lang;
		private $s_file_lang_visible;

		public function getId_file_lang(){
			return $this->id_file_lang;
		}

		public function setId_file_lang($id_file_lang){
			$this->id_file_lang = $id_file_lang;
		}

		public function getTitle_file_lang(){
			return $this->title_file_lang;
		}

		public function setTitle_file_lang($title_file_lang){
			$this->title_file_lang = $title_file_lang;
		}

		public function getAttached_file_lang(){
			return $this->attached_file_lang;
		}

		public function setAttached_file_lang($attached_file_lang){
			$this->attached_file_lang = $attached_file_lang;
		}

		public function getLink_file_lang(){
			return $this->link_file_lang;
		}

		public function setLink_file_lang($link_file_lang){
			$this->link_file_lang = $link_file_lang;
		}

		public function getLast_update_file_lang(){
			return $this->last_update_file_lang;
		}

		public function setLast_update_file_lang($last_update_file_lang){
			$this->last_update_file_lang = $last_update_file_lang;
		}

		public function getS_file_lang_visible(){
			return $this->s_file_lang_visible;
		}

		public function setS_file_lang_visible($s_file_lang_visible){
			$this->s_file_lang_visible = $s_file_lang_visible;
	}
	}