<?php
	class Social_media
	{
		private $id_social_media;
		private $name_social_media;
		private $photo_social_media;
		private $parent_social_media;
		private $sort_social_media;
		private $s_social_media;
		private $last_social_media;

		public function getId_social_media(){
			return $this->id_social_media;
		}

		public function setId_social_media($id_social_media){
			$this->id_social_media = $id_social_media;
		}

		public function getName_social_media(){
			return $this->name_social_media;
		}

		public function setName_social_media($name_social_media){
			$this->name_social_media = $name_social_media;
		}

		public function getPhoto_social_media(){
			return $this->photo_social_media;
		}

		public function setPhoto_social_media($photo_social_media){
			$this->photo_social_media = $photo_social_media;
		}

		public function getParent_social_media(){
			return $this->parent_social_media;
		}

		public function setParent_social_media($parent_social_media){
			$this->parent_social_media = $parent_social_media;
		}

		public function getSort_social_media(){
			return $this->sort_social_media;
		}

		public function setSort_social_media($sort_social_media){
			$this->sort_social_media = $sort_social_media;
		}

		public function getS_social_media(){
			return $this->s_social_media;
		}

		public function setS_social_media($s_social_media){
			$this->s_social_media = $s_social_media;
		}

		public function getLast_social_media(){
			return $this->last_social_media;
		}

		public function setLast_social_media($last_social_media){
			$this->last_social_media = $last_social_media;
		}
	}