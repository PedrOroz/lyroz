<?php	
	class Menu
	{		
		private $id_menu;
		private $parent_menu;
		private $sort_menu;
		private $s_menu;

		public function getId_menu(){
			return $this->id_menu;
		}

		public function setId_menu($id_menu){
			$this->id_menu = $id_menu;
		}

		public function getParent_menu(){
			return $this->parent_menu;
		}

		public function setParent_menu($parent_menu){
			$this->parent_menu = $parent_menu;
		}

		public function getSort_menu(){
			return $this->sort_menu;
		}

		public function setSort_menu($sort_menu){
			$this->sort_menu = $sort_menu;
		}

		public function getS_menu(){
			return $this->s_menu;
		}

		public function setS_menu($s_menu){
			$this->s_menu = $s_menu;
		}
	}