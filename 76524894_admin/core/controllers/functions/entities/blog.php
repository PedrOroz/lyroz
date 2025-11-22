<?php
	class Blog
	{
		private $id_blog;
		private $parent_blog;
		private $sort_blog;
		private $color_hexadecimal_blog;
		private $background_color_degraded_blog;
		private $s_blog;

		public function getId_blog(){
			return $this->id_blog;
		}

		public function setId_blog($id_blog){
			$this->id_blog = $id_blog;
		}

		public function getParent_blog(){
			return $this->parent_blog;
		}

		public function setParent_blog($parent_blog){
			$this->parent_blog = $parent_blog;
		}

		public function getSort_blog(){
			return $this->sort_blog;
		}

		public function setSort_blog($sort_blog){
			$this->sort_blog = $sort_blog;
		}

		public function getColor_hexadecimal_blog(){
			return $this->color_hexadecimal_blog;
		}

		public function setColor_hexadecimal_blog($color_hexadecimal_blog){
			$this->color_hexadecimal_blog = $color_hexadecimal_blog;
		}

		public function getBackground_color_degraded_blog(){
			return $this->background_color_degraded_blog;
		}

		public function setBackground_color_degraded_blog($background_color_degraded_blog){
			$this->background_color_degraded_blog = $background_color_degraded_blog;
		}

		public function getS_blog(){
			return $this->s_blog;
		}

		public function setS_blog($s_blog){
			$this->s_blog = $s_blog;
		}
	}