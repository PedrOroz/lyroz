<?php
	class Conversations
	{
		private $conversation_id;
		private $user_1;
		private $user_2;
		private $blocked;
		private $created_conversation;

		public function getConversation_id(){
			return $this->conversation_id;
		}

		public function setConversation_id($conversation_id){
			$this->conversation_id = $conversation_id;
		}

		public function getUser_1(){
			return $this->user_1;
		}

		public function setUser_1($user_1){
			$this->user_1 = $user_1;
		}

		public function getUser_2(){
			return $this->user_2;
		}

		public function setUser_2($user_2){
			$this->user_2 = $user_2;
		}

		public function getBlocked(){
			return $this->blocked;
		}

		public function setBlocked($blocked){
			$this->blocked = $blocked;
		}

		public function getCreated_conversation(){
			return $this->created_conversation;
		}

		public function setCreated_conversation($created_conversation){
			$this->created_conversation = $created_conversation;
		}
	}