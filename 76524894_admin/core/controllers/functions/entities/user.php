<?php
	require_once('user_social_media.php');
	
	class User extends User_social_media
	{
		private $id_user_admin;
		private $id_user;
		private $name_user;
		private $last_name_user;
		private $rfc_user;
		private $curp_user;
		private $membership_number_user;
		private $about_me_user;
		private $biography_user;
		private $birthdate_user;
		private $age_user;
		private $gender_user;
		private $lada_telephone_user;
		private $telephone_user;
		private $lada_cell_phone_user;
		private $cell_phone_user;
		private $email_user;
		private $email_confirmation_user;
		private $ship_address_user;
		private $address_user;
		private $country_user;
		private $state_user;
		private $city_user;
		private $municipality_user;
		private $colony_user;
		private $cp_user;
		private $street_user;
		private $outdoor_number_user;
		private $interior_number_user;
		private $between_street1_user;
		private $between_street2_user;
		private $other_references_user;
		private $nationality_user;
		private $filters_user;
		private $profile_photo_user;
		private $username_website;
		private $password_user;
		private $password_confirmation_user;
		private $salt_user;
		private $interbank_code_user;
		private $parent_user;
		private $sort_user;
		private $s_user;
		private $registration_date_user;
		private $last_session_user;
		private $url;

		public function getId_user_admin(){
			return $this->id_user_admin;
		}

		public function setId_user_admin($id_user_admin){
			$this->id_user_admin = $id_user_admin;
		}

		public function getId_user(){
			return $this->id_user;
		}

		public function setId_user($id_user){
			$this->id_user = $id_user;
		}

		public function getName_user(){
			return $this->name_user;
		}

		public function setName_user($name_user){
			$this->name_user = $name_user;
		}

		public function getLast_name_user(){
			return $this->last_name_user;
		}

		public function setLast_name_user($last_name_user){
			$this->last_name_user = $last_name_user;
		}

		public function getRfc_user(){
			return $this->rfc_user;
		}

		public function setRfc_user($rfc_user){
			$this->rfc_user = $rfc_user;
		}

		public function getCurp_user(){
			return $this->curp_user;
		}

		public function setCurp_user($curp_user){
			$this->curp_user = $curp_user;
		}

		public function getMembership_number_user(){
			return $this->membership_number_user;
		}

		public function setMembership_number_user($membership_number_user){
			$this->membership_number_user = $membership_number_user;
		}

		public function getAbout_me_user(){
			return $this->about_me_user;
		}

		public function setAbout_me_user($about_me_user){
			$this->about_me_user = $about_me_user;
		}

		public function getBiography_user(){
			return $this->biography_user;
		}

		public function setBiography_user($biography_user){
			$this->biography_user = $biography_user;
		}

		public function getBirthdate_user(){
			return $this->birthdate_user;
		}

		public function setBirthdate_user($birthdate_user){
			$this->birthdate_user = $birthdate_user;
		}

		public function getAge_user(){
			return $this->age_user;
		}

		public function setAge_user($age_user){
			$this->age_user = $age_user;
		}

		public function getGender_user(){
			return $this->gender_user;
		}

		public function setGender_user($gender_user){
			$this->gender_user = $gender_user;
		}

		public function getLada_telephone_user(){
			return $this->lada_telephone_user;
		}

		public function setLada_telephone_user($lada_telephone_user){
			$this->lada_telephone_user = $lada_telephone_user;
		}

		public function getTelephone_user(){
			return $this->telephone_user;
		}

		public function setTelephone_user($telephone_user){
			$this->telephone_user = $telephone_user;
		}

		public function getLada_cell_phone_user(){
			return $this->lada_cell_phone_user;
		}

		public function setLada_cell_phone_user($lada_cell_phone_user){
			$this->lada_cell_phone_user = $lada_cell_phone_user;
		}

		public function getCell_phone_user(){
			return $this->cell_phone_user;
		}

		public function setCell_phone_user($cell_phone_user){
			$this->cell_phone_user = $cell_phone_user;
		}

		public function getEmail_user(){
			return $this->email_user;
		}

		public function setEmail_user($email_user){
			$this->email_user = $email_user;
		}

		public function getEmail_confirmation_user(){
			return $this->email_confirmation_user;
		}

		public function setEmail_confirmation_user($email_confirmation_user){
			$this->email_confirmation_user = $email_confirmation_user;
		}

		public function getShip_address_user(){
			return $this->ship_address_user;
		}

		public function setShip_address_user($ship_address_user){
			$this->ship_address_user = $ship_address_user;
		}

		public function getAddress_user(){
			return $this->address_user;
		}

		public function setAddress_user($address_user){
			$this->address_user = $address_user;
		}

		public function getCountry_user(){
			return $this->country_user;
		}

		public function setCountry_user($country_user){
			$this->country_user = $country_user;
		}

		public function getState_user(){
			return $this->state_user;
		}

		public function setState_user($state_user){
			$this->state_user = $state_user;
		}

		public function getCity_user(){
			return $this->city_user;
		}

		public function setCity_user($city_user){
			$this->city_user = $city_user;
		}

		public function getMunicipality_user(){
			return $this->municipality_user;
		}

		public function setMunicipality_user($municipality_user){
			$this->municipality_user = $municipality_user;
		}

		public function getColony_user(){
			return $this->colony_user;
		}

		public function setColony_user($colony_user){
			$this->colony_user = $colony_user;
		}

		public function getCp_user(){
			return $this->cp_user;
		}

		public function setCp_user($cp_user){
			$this->cp_user = $cp_user;
		}

		public function getStreet_user(){
			return $this->street_user;
		}

		public function setStreet_user($street_user){
			$this->street_user = $street_user;
		}

		public function getOutdoor_number_user(){
			return $this->outdoor_number_user;
		}

		public function setOutdoor_number_user($outdoor_number_user){
			$this->outdoor_number_user = $outdoor_number_user;
		}

		public function getInterior_number_user(){
			return $this->interior_number_user;
		}

		public function setInterior_number_user($interior_number_user){
			$this->interior_number_user = $interior_number_user;
		}

		public function getBetween_street1_user(){
			return $this->between_street1_user;
		}

		public function setBetween_street1_user($between_street1_user){
			$this->between_street1_user = $between_street1_user;
		}

		public function getBetween_street2_user(){
			return $this->between_street2_user;
		}

		public function setBetween_street2_user($between_street2_user){
			$this->between_street2_user = $between_street2_user;
		}

		public function getOther_references_user(){
			return $this->other_references_user;
		}

		public function setOther_references_user($other_references_user){
			$this->other_references_user = $other_references_user;
		}

		public function getNationality_user(){
			return $this->nationality_user;
		}

		public function setNationality_user($nationality_user){
			$this->nationality_user = $nationality_user;
		}

		public function getFilters_user(){
			return $this->filters_user;
		}

		public function setFilters_user($filters_user){
			$this->filters_user = $filters_user;
		}

		public function getProfile_photo_user(){
			return $this->profile_photo_user;
		}

		public function setProfile_photo_user($profile_photo_user){
			$this->profile_photo_user = $profile_photo_user;
		}

		public function getUsername_website(){
			return $this->username_website;
		}

		public function setUsername_website($username_website){
			$this->username_website = $username_website;
		}

		public function getPassword_user(){
			return $this->password_user;
		}

		public function setPassword_user($password_user){
			$this->password_user = $password_user;
		}

		public function getPassword_confirmation_user(){
			return $this->password_confirmation_user;
		}

		public function setPassword_confirmation_user($password_confirmation_user){
			$this->password_confirmation_user = $password_confirmation_user;
		}

		public function getSalt_user(){
			return $this->salt_user;
		}

		public function setSalt_user($salt_user){
			$this->salt_user = $salt_user;
		}

		public function getInterbank_code_user(){
			return $this->interbank_code_user;
		}

		public function setInterbank_code_user($interbank_code_user){
			$this->interbank_code_user = $interbank_code_user;
		}

		public function getParent_user(){
			return $this->parent_user;
		}

		public function setParent_user($parent_user){
			$this->parent_user = $parent_user;
		}

		public function getSort_user(){
			return $this->sort_user;
		}

		public function setSort_user($sort_user){
			$this->sort_user = $sort_user;
		}

		public function getS_user(){
			return $this->s_user;
		}

		public function setS_user($s_user){
			$this->s_user = $s_user;
		}

		public function getRegistration_date_user(){
			return $this->registration_date_user;
		}

		public function setRegistration_date_user($registration_date_user){
			$this->registration_date_user = $registration_date_user;
		}

		public function getLast_session_user(){
			return $this->last_session_user;
		}

		public function setLast_session_user($last_session_user){
			$this->last_session_user = $last_session_user;
		}

		public function getUrl(){
			return $this->url;
		}

		public function setUrl($url){
			$this->url = $url;
		}
	}