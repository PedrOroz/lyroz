<?php
	class Promotion
	{
		private $id_promotion;
		private $parent_promotion;
		private $sort_promotion;
		private $start_date_promotion;
		private $finish_date_promotion;
		private $total_click_promotion;
		private $s_promotion;

		public function getId_promotion(){
			return $this->id_promotion;
		}

		public function setId_promotion($id_promotion){
			$this->id_promotion = $id_promotion;
		}

		public function getParent_promotion(){
			return $this->parent_promotion;
		}

		public function setParent_promotion($parent_promotion){
			$this->parent_promotion = $parent_promotion;
		}

		public function getSort_promotion(){
			return $this->sort_promotion;
		}

		public function setSort_promotion($sort_promotion){
			$this->sort_promotion = $sort_promotion;
		}

		public function getStart_date_promotion(){
			return $this->start_date_promotion;
		}

		public function setStart_date_promotion($start_date_promotion){
			$this->start_date_promotion = $start_date_promotion;
		}

		public function getFinish_date_promotion(){
			return $this->finish_date_promotion;
		}

		public function setFinish_date_promotion($finish_date_promotion){
			$this->finish_date_promotion = $finish_date_promotion;
		}

		public function getTotal_click_promotion(){
			return $this->total_click_promotion;
		}

		public function setTotal_click_promotion($total_click_promotion){
			$this->total_click_promotion = $total_click_promotion;
		}

		public function getS_promotion(){
			return $this->s_promotion;
		}

		public function setS_promotion($s_promotion){
			$this->s_promotion = $s_promotion;
		}
	}