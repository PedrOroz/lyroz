<?php
	require_once('type_cancellation_lang.php');

	class Diner_menu_cancel extends type_cancellation_lang
	{
		private $id_diner_menu_cancel;
		private $reason_user_menu_cancel;

		public function getId_diner_menu_cancel(){
			return $this->id_diner_menu_cancel;
		}

		public function setId_diner_menu_cancel($id_diner_menu_cancel){
			$this->id_diner_menu_cancel = $id_diner_menu_cancel;
		}

		public function getReason_user_menu_cancel(){
			return $this->reason_user_menu_cancel;
		}

		public function setReason_user_menu_cancel($reason_user_menu_cancel){
			$this->reason_user_menu_cancel = $reason_user_menu_cancel;
		}
	}