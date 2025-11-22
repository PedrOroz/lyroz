<?php
	require_once('diner_menu_cancel.php');

	class Type_tag_menu extends Diner_menu_cancel
	{
		private $id_type_tag_menu;

		public function getId_type_tag_menu(){
			return $this->id_type_tag_menu;
		}

		public function setId_type_tag_menu($id_type_tag_menu){
			$this->id_type_tag_menu = $id_type_tag_menu;
		}
	}