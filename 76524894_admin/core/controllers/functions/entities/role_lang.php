<?php
	require_once('role.php');

	class Role_lang extends Role
	{
		private $id_role_lang;
		private $name_role;

		public function getId_role_lang(){
			return $this->id_role_lang;
		}

		public function setId_role_lang($id_role_lang){
			$this->id_role_lang = $id_role_lang;
		}

		public function getName_role(){
			return $this->name_role;
		}

		public function setName_role($name_role){
			$this->name_role = $name_role;
		}
	}