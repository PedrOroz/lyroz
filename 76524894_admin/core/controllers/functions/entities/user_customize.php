<?php
	require_once('role_lang.php');

	class User_customize extends Role_lang
	{
		private $id_user_customize;
		private $last_user_customize;

		public function getId_user_customize(){
			return $this->id_user_customize;
		}

		public function setId_user_customize($id_user_customize){
			$this->id_user_customize = $id_user_customize;
		}

		public function getLast_user_customize(){
			return $this->last_user_customize;
		}

		public function setLast_user_customize($last_user_customize){
			$this->last_user_customize = $last_user_customize;
		}
	}