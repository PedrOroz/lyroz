<?php
	require_once('type_cancellation.php');

	class Type_cancellation_lang extends type_cancellation
	{
		private $id_type_cancellation_lang;
		private $title_type_cancellation_lang;

		public function getId_type_cancellation_lang(){
			return $this->id_type_cancellation_lang;
		}

		public function setId_type_cancellation_lang($id_type_cancellation_lang){
			$this->id_type_cancellation_lang = $id_type_cancellation_lang;
		}

		public function getTitle_type_cancellation_lang(){
			return $this->title_type_cancellation_lang;
		}

		public function setTitle_type_cancellation_lang($title_type_cancellation_lang){
			$this->title_type_cancellation_lang = $title_type_cancellation_lang;
		}
	}