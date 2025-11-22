<?php	
	require_once("image.php");

	class Image_lang extends Image
	{		
		private 		$id_image_lang;
		private 		$title_image_lang;
		private 		$subtitle_image_lang;
		private 		$description_small_image_lang;
		private 		$description_large_image_lang;
		private 		$title_hyperlink_image_lang;
		private 		$link_image_lang;
		private 		$alt_image_lang;
		private 		$background_color_image_lang;
		private 		$background_color_degraded_image_lang;
		private 		$background_repeat_image_lang;
		private 		$background_position_image_lang;
		private 		$background_size_image_lang;
		private 		$last_update_image_lang;
		private 		$s_image_lang_visible;

		public function getId_image_lang(){
			return $this->id_image_lang;
		}

		public function setId_image_lang($id_image_lang){
			$this->id_image_lang = $id_image_lang;
		}

		public function getTitle_image_lang(){
			return $this->title_image_lang;
		}

		public function setTitle_image_lang($title_image_lang){
			$this->title_image_lang = $title_image_lang;
		}

		public function getSubtitle_image_lang(){
			return $this->subtitle_image_lang;
		}

		public function setSubtitle_image_lang($subtitle_image_lang){
			$this->subtitle_image_lang = $subtitle_image_lang;
		}

		public function getDescription_small_image_lang(){
			return $this->description_small_image_lang;
		}

		public function setDescription_small_image_lang($description_small_image_lang){
			$this->description_small_image_lang = $description_small_image_lang;
		}

		public function getDescription_large_image_lang(){
			return $this->description_large_image_lang;
		}

		public function setDescription_large_image_lang($description_large_image_lang){
			$this->description_large_image_lang = $description_large_image_lang;
		}

		public function getTitle_hyperlink_image_lang(){
			return $this->title_hyperlink_image_lang;
		}

		public function setTitle_hyperlink_image_lang($title_hyperlink_image_lang){
			$this->title_hyperlink_image_lang = $title_hyperlink_image_lang;
		}

		public function getLink_image_lang(){
			return $this->link_image_lang;
		}

		public function setLink_image_lang($link_image_lang){
			$this->link_image_lang = $link_image_lang;
		}

		public function getAlt_image_lang(){
			return $this->alt_image_lang;
		}

		public function setAlt_image_lang($alt_image_lang){
			$this->alt_image_lang = $alt_image_lang;
		}

		public function getBackground_color_image_lang(){
			return $this->background_color_image_lang;
		}

		public function setBackground_color_image_lang($background_color_image_lang){
			$this->background_color_image_lang = $background_color_image_lang;
		}

		public function getBackground_color_degraded_image_lang(){
			return $this->background_color_degraded_image_lang;
		}

		public function setBackground_color_degraded_image_lang($background_color_degraded_image_lang){
			$this->background_color_degraded_image_lang = $background_color_degraded_image_lang;
		}

		public function getBackground_repeat_image_lang(){
			return $this->background_repeat_image_lang;
		}

		public function setBackground_repeat_image_lang($background_repeat_image_lang){
			$this->background_repeat_image_lang = $background_repeat_image_lang;
		}

		public function getBackground_position_image_lang(){
			return $this->background_position_image_lang;
		}

		public function setBackground_position_image_lang($background_position_image_lang){
			$this->background_position_image_lang = $background_position_image_lang;
		}

		public function getBackground_size_image_lang(){
			return $this->background_size_image_lang;
		}

		public function setBackground_size_image_lang($background_size_image_lang){
			$this->background_size_image_lang = $background_size_image_lang;
		}

		public function getLast_update_image_lang(){
			return $this->last_update_image_lang;
		}

		public function setLast_update_image_lang($last_update_image_lang){
			$this->last_update_image_lang = $last_update_image_lang;
		}

		public function getS_image_lang_visible(){
			return $this->s_image_lang_visible;
		}

		public function setS_image_lang_visible($s_image_lang_visible){
			$this->s_image_lang_visible = $s_image_lang_visible;
		}
	}