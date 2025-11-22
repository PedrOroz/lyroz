<?php
	require_once('user_customize.php');

	class User_social_media extends User_customize
	{
		private $id_user_social_media;
		private $url_user_social_media;
		private $s_user_social_media;
		private $last_user_social_media;

		public function getId_user_social_media(){
			return $this->id_user_social_media;
		}

		public function setId_user_social_media($id_user_social_media){
			$this->id_user_social_media = $id_user_social_media;
		}

		public function getUrl_user_social_media(){
			return $this->url_user_social_media;
		}

		public function setUrl_user_social_media($url_user_social_media){
			$this->url_user_social_media = $url_user_social_media;
		}

		public function getS_user_social_media(){
			return $this->s_user_social_media;
		}

		public function setS_user_social_media($s_user_social_media){
			$this->s_user_social_media = $s_user_social_media;
		}

		public function getLast_user_social_media(){
			return $this->last_user_social_media;
		}

		public function setLast_user_social_media($last_user_social_media){
			$this->last_user_social_media = $last_user_social_media;
		}
	}