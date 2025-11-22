<?php
	require_once('product.php');

	class Product_lang extends Product
	{
		private $id_product_lang;
		private $parent_id_product;
		private $title_product_lang;
		private $subtitle_product_lang;
		private $general_price_product_lang;
		private $text_button_general_price_product_lang;
		private $predominant_color_product_lang;
		private $background_color_degraded_product_lang;
		private $general_stock_product_lang;
		private $reference_product_lang;
		private $friendly_url_product_lang;
		private $general_link_product_lang;
		private $text_button_general_link_product_lang;
		private $description_small_product_lang;
		private $description_large_product_lang;
		private $special_specifications_product_lang;
		private $clave_prod_serv_sat_product_lang;
		private $clave_unidad_sat_product_lang;
		private $input_product_lang;
		private $output_product_lang;
		private $meta_title_product_lang;
		private $meta_description_product_lang;
		private $meta_keywords_product_lang;
		private $creation_date_product_lang;
		private $last_update_product_lang;

		public function getId_product_lang(){
			return $this->id_product_lang;
		}

		public function setId_product_lang($id_product_lang){
			$this->id_product_lang = $id_product_lang;
		}

		public function getParent_id_product(){
			return $this->parent_id_product;
		}

		public function setParent_id_product($parent_id_product){
			$this->parent_id_product = $parent_id_product;
		}

		public function getTitle_product_lang(){
			return $this->title_product_lang;
		}

		public function setTitle_product_lang($title_product_lang){
			$this->title_product_lang = $title_product_lang;
		}

		public function getSubtitle_product_lang(){
			return $this->subtitle_product_lang;
		}

		public function setSubtitle_product_lang($subtitle_product_lang){
			$this->subtitle_product_lang = $subtitle_product_lang;
		}

		public function getGeneral_price_product_lang(){
			return $this->general_price_product_lang;
		}

		public function setGeneral_price_product_lang($general_price_product_lang){
			$this->general_price_product_lang = $general_price_product_lang;
		}

		public function getText_button_general_price_product_lang(){
			return $this->text_button_general_price_product_lang;
		}

		public function setText_button_general_price_product_lang($text_button_general_price_product_lang){
			$this->text_button_general_price_product_lang = $text_button_general_price_product_lang;
		}

		public function getPredominant_color_product_lang(){
			return $this->predominant_color_product_lang;
		}

		public function setPredominant_color_product_lang($predominant_color_product_lang){
			$this->predominant_color_product_lang = $predominant_color_product_lang;
		}

		public function getBackground_color_degraded_product_lang(){
			return $this->background_color_degraded_product_lang;
		}

		public function setBackground_color_degraded_product_lang($background_color_degraded_product_lang){
			$this->background_color_degraded_product_lang = $background_color_degraded_product_lang;
		}

		public function getGeneral_stock_product_lang(){
			return $this->general_stock_product_lang;
		}

		public function setGeneral_stock_product_lang($general_stock_product_lang){
			$this->general_stock_product_lang = $general_stock_product_lang;
		}

		public function getReference_product_lang(){
			return $this->reference_product_lang;
		}

		public function setReference_product_lang($reference_product_lang){
			$this->reference_product_lang = $reference_product_lang;
		}

		public function getFriendly_url_product_lang(){
			return $this->friendly_url_product_lang;
		}

		public function setFriendly_url_product_lang($friendly_url_product_lang){
			$this->friendly_url_product_lang = $friendly_url_product_lang;
		}

		public function getGeneral_link_product_lang(){
			return $this->general_link_product_lang;
		}

		public function setGeneral_link_product_lang($general_link_product_lang){
			$this->general_link_product_lang = $general_link_product_lang;
		}

		public function getText_button_general_link_product_lang(){
			return $this->text_button_general_link_product_lang;
		}

		public function setText_button_general_link_product_lang($text_button_general_link_product_lang){
			$this->text_button_general_link_product_lang = $text_button_general_link_product_lang;
		}

		public function getDescription_small_product_lang(){
			return $this->description_small_product_lang;
		}

		public function setDescription_small_product_lang($description_small_product_lang){
			$this->description_small_product_lang = $description_small_product_lang;
		}

		public function getDescription_large_product_lang(){
			return $this->description_large_product_lang;
		}

		public function setDescription_large_product_lang($description_large_product_lang){
			$this->description_large_product_lang = $description_large_product_lang;
		}

		public function getSpecial_specifications_product_lang(){
			return $this->special_specifications_product_lang;
		}

		public function setSpecial_specifications_product_lang($special_specifications_product_lang){
			$this->special_specifications_product_lang = $special_specifications_product_lang;
		}

		public function getClave_prod_serv_sat_product_lang(){
			return $this->clave_prod_serv_sat_product_lang;
		}

		public function setClave_prod_serv_sat_product_lang($clave_prod_serv_sat_product_lang){
			$this->clave_prod_serv_sat_product_lang = $clave_prod_serv_sat_product_lang;
		}

		public function getClave_unidad_sat_product_lang(){
			return $this->clave_unidad_sat_product_lang;
		}

		public function setClave_unidad_sat_product_lang($clave_unidad_sat_product_lang){
			$this->clave_unidad_sat_product_lang = $clave_unidad_sat_product_lang;
		}

		public function getInput_product_lang(){
			return $this->input_product_lang;
		}

		public function setInput_product_lang($input_product_lang){
			$this->input_product_lang = $input_product_lang;
		}

		public function getOutput_product_lang(){
			return $this->output_product_lang;
		}

		public function setOutput_product_lang($output_product_lang){
			$this->output_product_lang = $output_product_lang;
		}

		public function getMeta_title_product_lang(){
			return $this->meta_title_product_lang;
		}

		public function setMeta_title_product_lang($meta_title_product_lang){
			$this->meta_title_product_lang = $meta_title_product_lang;
		}

		public function getMeta_description_product_lang(){
			return $this->meta_description_product_lang;
		}

		public function setMeta_description_product_lang($meta_description_product_lang){
			$this->meta_description_product_lang = $meta_description_product_lang;
		}

		public function getMeta_keywords_product_lang(){
			return $this->meta_keywords_product_lang;
		}

		public function setMeta_keywords_product_lang($meta_keywords_product_lang){
			$this->meta_keywords_product_lang = $meta_keywords_product_lang;
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