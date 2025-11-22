<?php
	require_once('blog.php');

	class Blog_lang extends Blog
	{
		private $id_blog_lang;
		private $title_blog_lang;
		private $subtitle_blog_lang;
		private $place_blog_lang;
		private $author_blog_lang;
		private $friendly_url_blog_lang;
		private $general_link_blog_lang;
		private $text_button_general_link_blog_lang;
		private $description_small_blog_lang;
		private $description_large_blog_lang;
		private $meta_title_blog_lang;
		private $meta_description_blog_lang;
		private $meta_keywords_blog_lang;
		private $creation_date_product_lang;
		private $last_update_product_lang;

		public function getId_blog_lang(){
			return $this->id_blog_lang;
		}

		public function setId_blog_lang($id_blog_lang){
			$this->id_blog_lang = $id_blog_lang;
		}

		public function getTitle_blog_lang(){
			return $this->title_blog_lang;
		}

		public function setTitle_blog_lang($title_blog_lang){
			$this->title_blog_lang = $title_blog_lang;
		}

		public function getSubtitle_blog_lang(){
			return $this->subtitle_blog_lang;
		}

		public function setSubtitle_blog_lang($subtitle_blog_lang){
			$this->subtitle_blog_lang = $subtitle_blog_lang;
		}

		public function getPlace_blog_lang(){
			return $this->place_blog_lang;
		}

		public function setPlace_blog_lang($place_blog_lang){
			$this->place_blog_lang = $place_blog_lang;
		}

		public function getAuthor_blog_lang(){
			return $this->author_blog_lang;
		}

		public function setAuthor_blog_lang($author_blog_lang){
			$this->author_blog_lang = $author_blog_lang;
		}

		public function getFriendly_url_blog_lang(){
			return $this->friendly_url_blog_lang;
		}

		public function setFriendly_url_blog_lang($friendly_url_blog_lang){
			$this->friendly_url_blog_lang = $friendly_url_blog_lang;
		}

		public function getGeneral_link_blog_lang(){
			return $this->general_link_blog_lang;
		}

		public function setGeneral_link_blog_lang($general_link_blog_lang){
			$this->general_link_blog_lang = $general_link_blog_lang;
		}

		public function getText_button_general_link_blog_lang(){
			return $this->text_button_general_link_blog_lang;
		}

		public function setText_button_general_link_blog_lang($text_button_general_link_blog_lang){
			$this->text_button_general_link_blog_lang = $text_button_general_link_blog_lang;
		}

		public function getDescription_small_blog_lang(){
			return $this->description_small_blog_lang;
		}

		public function setDescription_small_blog_lang($description_small_blog_lang){
			$this->description_small_blog_lang = $description_small_blog_lang;
		}

		public function getDescription_large_blog_lang(){
			return $this->description_large_blog_lang;
		}

		public function setDescription_large_blog_lang($description_large_blog_lang){
			$this->description_large_blog_lang = $description_large_blog_lang;
		}

		public function getMeta_title_blog_lang(){
			return $this->meta_title_blog_lang;
		}

		public function setMeta_title_blog_lang($meta_title_blog_lang){
			$this->meta_title_blog_lang = $meta_title_blog_lang;
		}

		public function getMeta_description_blog_lang(){
			return $this->meta_description_blog_lang;
		}

		public function setMeta_description_blog_lang($meta_description_blog_lang){
			$this->meta_description_blog_lang = $meta_description_blog_lang;
		}

		public function getMeta_keywords_blog_lang(){
			return $this->meta_keywords_blog_lang;
		}

		public function setMeta_keywords_blog_lang($meta_keywords_blog_lang){
			$this->meta_keywords_blog_lang = $meta_keywords_blog_lang;
		}

		public function getCreation_date_product_lang(){
			return $this->creation_date_product_lang;
		}

		public function setCreation_date_product_lang($creation_date_product_lang){
			$this->creation_date_product_lang = $creation_date_product_lang;
		}

		public function getLast_update_product_lang(){
			return $this->last_update_product_lang;
		}

		public function setLast_update_product_lang($last_update_product_lang){
			$this->last_update_product_lang = $last_update_product_lang;
		}
	}