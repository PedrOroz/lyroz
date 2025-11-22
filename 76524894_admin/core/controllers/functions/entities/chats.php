<?php
	require_once('conversations.php');

	class Chats extends Conversations
	{
		private $chat_id;
		private $from_id;
		private $to_id;
		private $message;
		private $opened_receiver;
		private $opened_sender;
		private $created_at;

		public function getChat_id(){
			return $this->chat_id;
		}

		public function setChat_id($chat_id){
			$this->chat_id = $chat_id;
		}

		public function getFrom_id(){
			return $this->from_id;
		}

		public function setFrom_id($from_id){
			$this->from_id = $from_id;
		}

		public function getTo_id(){
			return $this->to_id;
		}

		public function setTo_id($to_id){
			$this->to_id = $to_id;
		}

		public function getMessage(){
			return $this->message;
		}

		public function setMessage($message){
			$this->message = $message;
		}

		public function getOpened_receiver(){
			return $this->opened_receiver;
		}

		public function setOpened_receiver($opened_receiver){
			$this->opened_receiver = $opened_receiver;
		}

		public function getOpened_sender(){
			return $this->opened_sender;
		}

		public function setOpened_sender($opened_sender){
			$this->opened_sender = $opened_sender;
		}

		public function getCreated_at(){
			return $this->created_at;
		}

		public function setCreated_at($created_at){
			$this->created_at = $created_at;
		}
	}