<?php
	class Product_user_questions
	{
		private $id_product_user_questions;
		private $ask_product_user_questions;
		private $question_date_product_user_questions;
		private $answer_product_user_questions;
		private $response_date_product_user_questions;
		private $last_update_product_user_questions;
		private $s_visible_product_user_questions;
		
		public function getId_product_user_questions(){
			return $this->id_product_user_questions;
		}

		public function setId_product_user_questions($id_product_user_questions){
			$this->id_product_user_questions = $id_product_user_questions;
		}

		public function getAsk_product_user_questions(){
			return $this->ask_product_user_questions;
		}

		public function setAsk_product_user_questions($ask_product_user_questions){
			$this->ask_product_user_questions = $ask_product_user_questions;
		}

		public function getQuestion_date_product_user_questions(){
			return $this->question_date_product_user_questions;
		}

		public function setQuestion_date_product_user_questions($question_date_product_user_questions){
			$this->question_date_product_user_questions = $question_date_product_user_questions;
		}

		public function getAnswer_product_user_questions(){
			return $this->answer_product_user_questions;
		}

		public function setAnswer_product_user_questions($answer_product_user_questions){
			$this->answer_product_user_questions = $answer_product_user_questions;
		}

		public function getResponse_date_product_user_questions(){
			return $this->response_date_product_user_questions;
		}

		public function setResponse_date_product_user_questions($response_date_product_user_questions){
			$this->response_date_product_user_questions = $response_date_product_user_questions;
		}

		public function getLast_update_product_user_questions(){
			return $this->last_update_product_user_questions;
		}

		public function setLast_update_product_user_questions($last_update_product_user_questions){
			$this->last_update_product_user_questions = $last_update_product_user_questions;
		}

		public function getS_visible_product_user_questions(){
			return $this->s_visible_product_user_questions;
		}

		public function setS_visible_product_user_questions($s_visible_product_user_questions){
			$this->s_visible_product_user_questions = $s_visible_product_user_questions;
		}
	}