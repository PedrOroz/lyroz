<?php
	class Customize
	{
		private $id_customize;
		private $id_type_customize;

		public function getId_customize(){
			return $this->id_customize;
		}

		public function setId_customize($id_customize){
			$this->id_customize = $id_customize;
		}

		public function getId_type_customize(){
			return $this->id_type_customize;
		}

		public function setId_type_customize($id_type_customize){
			$this->id_type_customize = $id_type_customize;
		}
	}