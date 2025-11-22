<?php
	require_once('chef_menu_proposal_cancel.php');

	class Chef_menu_proposal extends Chef_menu_proposal_cancel
	{
		private $id_chef_menu_proposal;
		private $description_starters_chef_menu_proposal;
		private $description_first_chef_menu_proposal;
		private $description_main_chef_menu_proposal;
		private $description_desserts_chef_menu_proposal;
		private $budget_per_person_chef_menu_proposal;
		private $total_chef_menu_proposal;
		private $registration_date_chef_menu_proposal;
		private $approval_date_chef_menu_proposal;

		public function getId_chef_menu_proposal(){
			return $this->id_chef_menu_proposal;
		}

		public function setId_chef_menu_proposal($id_chef_menu_proposal){
			$this->id_chef_menu_proposal = $id_chef_menu_proposal;
		}

		public function getDescription_starters_chef_menu_proposal(){
			return $this->description_starters_chef_menu_proposal;
		}

		public function setDescription_starters_chef_menu_proposal($description_starters_chef_menu_proposal){
			$this->description_starters_chef_menu_proposal = $description_starters_chef_menu_proposal;
		}

		public function getDescription_first_chef_menu_proposal(){
			return $this->description_first_chef_menu_proposal;
		}

		public function setDescription_first_chef_menu_proposal($description_first_chef_menu_proposal){
			$this->description_first_chef_menu_proposal = $description_first_chef_menu_proposal;
		}

		public function getDescription_main_chef_menu_proposal(){
			return $this->description_main_chef_menu_proposal;
		}

		public function setDescription_main_chef_menu_proposal($description_main_chef_menu_proposal){
			$this->description_main_chef_menu_proposal = $description_main_chef_menu_proposal;
		}

		public function getDescription_desserts_chef_menu_proposal(){
			return $this->description_desserts_chef_menu_proposal;
		}

		public function setDescription_desserts_chef_menu_proposal($description_desserts_chef_menu_proposal){
			$this->description_desserts_chef_menu_proposal = $description_desserts_chef_menu_proposal;
		}

		public function getBudget_per_person_chef_menu_proposal(){
			return $this->budget_per_person_chef_menu_proposal;
		}

		public function setBudget_per_person_chef_menu_proposal($budget_per_person_chef_menu_proposal){
			$this->budget_per_person_chef_menu_proposal = $budget_per_person_chef_menu_proposal;
		}

		public function getTotal_chef_menu_proposal(){
			return $this->total_chef_menu_proposal;
		}

		public function setTotal_chef_menu_proposal($total_chef_menu_proposal){
			$this->total_chef_menu_proposal = $total_chef_menu_proposal;
		}

		public function getRegistration_date_chef_menu_proposal(){
			return $this->registration_date_chef_menu_proposal;
		}

		public function setRegistration_date_chef_menu_proposal($registration_date_chef_menu_proposal){
			$this->registration_date_chef_menu_proposal = $registration_date_chef_menu_proposal;
		}

		public function getApproval_date_chef_menu_proposal(){
			return $this->approval_date_chef_menu_proposal;
		}

		public function setApproval_date_chef_menu_proposal($approval_date_chef_menu_proposal){
			$this->approval_date_chef_menu_proposal = $approval_date_chef_menu_proposal;
		}
	}