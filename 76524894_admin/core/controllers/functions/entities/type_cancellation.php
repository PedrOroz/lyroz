<?php
	require_once('chef_menu_proposal.php');

	class Type_cancellation extends Chef_menu_proposal
	{
		private $id_type_cancellation;

		public function getId_type_cancellation(){
			return $this->id_type_cancellation;
		}

		public function setId_type_cancellation($id_type_cancellation){
			$this->id_type_cancellation = $id_type_cancellation;
		}
	}