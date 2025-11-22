<?php
	require_once(dirname(__DIR__)."/../models/userDao.php");

	class userController
	{
		/**
		 * [logIn description]
		 *
		 * @param  [type] $email_usuario [description]
		 * @param  [type] $password      [description]
		 * @return [type]                [description]
		 */

		public static function logIn($email_usuario,$password)
		{
			$obj_user = new User();

			$obj_user->setEmail_user($email_usuario);
			$obj_user->setPassword_user($password);

			return userDao::logIn($obj_user);
		}

		/**
		 * [showInformationSesionTopHeaderBack description]
		 *
		 * @return [type] [description]
		 */

		public static function showInformationSesionTopHeaderBack()
		{
			return userDao::showInformationSesionTopHeaderBack();
		}

		/**
		 * [showPersonalInformationByUserIdInSpecificSection description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showPersonalInformationByUserIdInSpecificSection($id_user)
		{
			$obj_user 			= new User();
			$obj_user->setId_user($id_user);

			return userDao::showPersonalInformationByUserIdInSpecificSection($obj_user);
		}

		/**
		 * [signOffBack description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function signOffBack($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::signOffBack($obj_user);
		}

		/**
		 * [showProfilePictureByIdUser description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showProfilePictureByIdUser($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showProfilePictureByIdUser($obj_user);
		}

		/**
		 * [showUserInformationByUserId description]
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showUserInformationByUserId($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showUserInformationByUserId($obj_user);
		}

		/**
		 * [uploadUserProfilePicture description]
		 *
		 * @param  [type] $id_user       [description]
		 * @param  [type] $file_error    [description]
		 * @param  [type] $file_name     [description]
		 * @param  [type] $file_type     [description]
		 * @param  [type] $file_tmp_name [description]
		 * @param  [type] $file_size     [description]
		 * @param  [type] $view          [description]
		 * @return [type]                [description]
		 */

		public static function uploadUserProfilePicture($id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,$view)
		{
			$obj_user 			= new User();
			$obj_user->setId_user($id_user);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			return userDao::uploadUserProfilePicture($view,$obj_user,$obj_image_lang);
		}

		/**
		 * [updateInformationUser description]
		 *
		 * @param  [type] $id_user                [description]
		 * @param  [type] $id_role                [description]
		 * @param  [type] $name_user              [description]
		 * @param  [type] $last_name_user         [description]
		 * @param  [type] $rfc_user               [description]
		 * @param  [type] $curp_user              [description]
		 * @param  [type] $membership_number_user [description]
		 * @param  [type] $about_me_user          [description]
		 * @param  [type] $biography_user         [description]
		 * @param  [type] $birthdate_user         [description]
		 * @param  [type] $age_user               [description]
		 * @param  [type] $gender_user            [description]
		 * @param  [type] $lada_telephone_user    [description]
		 * @param  [type] $telephone_user         [description]
		 * @param  [type] $lada_cell_phone_user   [description]
		 * @param  [type] $cell_phone_user        [description]
		 * @param  [type] $ship_address_user      [description]
		 * @param  [type] $address_user           [description]
		 * @param  [type] $country_user           [description]
		 * @param  [type] $state_user             [description]
		 * @param  [type] $city_user              [description]
		 * @param  [type] $municipality_user      [description]
		 * @param  [type] $colony_user            [description]
		 * @param  [type] $cp_user                [description]
		 * @param  [type] $street_user            [description]
		 * @param  [type] $outdoor_number_user    [description]
		 * @param  [type] $interior_number_user   [description]
		 * @param  [type] $between_street1_user   [description]
		 * @param  [type] $between_street2_user   [description]
		 * @param  [type] $other_references_user  [description]
		 * @param  [type] $nationality_user       [description]
		 * @param  [type] $filters_user           [description]
		 * @param  [type] $username_website       [description]
		 * @return [type]                         [description]
		 */

		public static function updateInformationUser($id_user,$id_role,$name_user,$last_name_user,$rfc_user,$curp_user,$membership_number_user,$about_me_user,$biography_user,$birthdate_user,$age_user,$gender_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$ship_address_user,$address_user,$country_user,$state_user,$city_user,$municipality_user,$colony_user,$cp_user,$street_user,$outdoor_number_user,$interior_number_user,$between_street1_user,$between_street2_user,$other_references_user,$nationality_user,$filters_user,$username_website)
		{
			$obj_user 	= new User();

			$obj_user->setId_user($id_user);
			$obj_user->setId_role($id_role);

			$obj_user->setName_user($name_user);
			$obj_user->setLast_name_user($last_name_user);
			$obj_user->setRfc_user($rfc_user);
			$obj_user->setCurp_user($curp_user);
			$obj_user->setMembership_number_user($membership_number_user);
			$obj_user->setAbout_me_user($about_me_user);
			$obj_user->setBiography_user($biography_user);
			$obj_user->setBirthdate_user($birthdate_user);
			$obj_user->setAge_user($age_user);
			$obj_user->setGender_user($gender_user);
			$obj_user->setLada_telephone_user($lada_telephone_user);
			$obj_user->setTelephone_user($telephone_user);
			$obj_user->setLada_cell_phone_user($lada_cell_phone_user);
			$obj_user->setCell_phone_user($cell_phone_user);
			$obj_user->setShip_address_user($ship_address_user);
			$obj_user->setAddress_user($address_user);
			$obj_user->setCountry_user($country_user);
			$obj_user->setState_user($state_user);
			$obj_user->setCity_user($city_user);
			$obj_user->setMunicipality_user($municipality_user);
			$obj_user->setColony_user($colony_user);
			$obj_user->setCp_user($cp_user);
			$obj_user->setStreet_user($street_user);
			$obj_user->setOutdoor_number_user($outdoor_number_user);
			$obj_user->setInterior_number_user($interior_number_user);
			$obj_user->setBetween_street1_user($between_street1_user);
			$obj_user->setBetween_street2_user($between_street2_user);
			$obj_user->setOther_references_user($other_references_user);
			$obj_user->setNationality_user($nationality_user);
			$obj_user->setFilters_user($filters_user);
			$obj_user->setUsername_website($username_website);

			return userDao::updateInformationUser($obj_user);
		}

		/**
		 * [showEmail description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showEmail($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showEmail($obj_user);
		}

		/**
		 * [showPassword description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showPassword($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showPassword($obj_user);
		}

		/**
		 * [updateEmailUser description]
		 *
		 * @param  [type] $id_user           [description]
		 * @param  [type] $email             [description]
		 * @param  [type] $emailConfirmation [description]
		 * @param  [type] $view              [description]
		 * @return [type]                    [description]
		 */

		public static function updateEmailUser($id_user,$email,$emailConfirmation,$view)
		{
			$obj_user = new User();

			$obj_user->setId_user($id_user);
			$obj_user->setEmail_user($email);
			$obj_user->setEmail_confirmation_user($emailConfirmation);

			return userDao::updateEmailUser($view,$obj_user);
		}

		/**
		 * [updatePasswordUser description]
		 *
		 * @param  [type] $id_user   [description]
		 * @param  [type] $password1 [description]
		 * @param  [type] $password2 [description]
		 * @param  [type] $view      [description]
		 * @return [type]            [description]
		 */

		public static function updatePasswordUser($id_user,$password1,$password2,$view)
		{
			$obj_user = new User();

			$obj_user->setId_user($id_user);
			$obj_user->setPassword_user($password1);
			$obj_user->setPassword_confirmation_user($password2);

			return userDao::updatePasswordUser($view,$obj_user);
		}

		/**
		 * [showSocialNetworkByUserId description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showSocialNetworkByUserId($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showSocialNetworkByUserId($obj_user);
		}

		/**
		 * [registerOnlySocialNetworkToUser description]
		 *
		 * @param  [type] $id_user               [description]
		 * @param  [type] $id_social_media       [description]
		 * @param  [type] $url_user_social_media [description]
		 * @return [type]                        [description]
		 */

		public static function registerOnlySocialNetworkToUser($id_user,$id_social_media,$url_user_social_media)
		{
			$obj_user 	= new User();
			$obj_user->setId_user($id_user);
			$obj_user->setUrl_user_social_media($url_user_social_media);

			$obj_social_media 	= new Social_media();
			$obj_social_media->setId_social_media($id_social_media);

			return userDao::registerOnlySocialNetworkToUser($obj_user,$obj_social_media);
		}

		/**
		 * [showUserRecord description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showUserRecord($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showUserRecord($obj_user);
		}

		/**
		 * [updateInformationUserSocialMedia description]
		 *
		 * @param  [type] $id_user_social_media  [description]
		 * @param  [type] $id_social_media       [description]
		 * @param  [type] $url_user_social_media [description]
		 * @return [type]                        [description]
		 */

		public static function updateInformationUserSocialMedia($id_user_social_media,$id_social_media,$url_user_social_media)
		{
			$obj_user = new User();

			$obj_user->setId_user_social_media($id_user_social_media);
			$obj_user->setUrl_user_social_media($url_user_social_media);

			$obj_social_media 	= new Social_media();
			$obj_social_media->setId_social_media($id_social_media);

			return userDao::updateInformationUserSocialMedia($obj_user,$obj_social_media);
		}

		/**
		 * [showFormUpdateUserTheme description]
		 *
		 * @param  [type] $id_type_section [description]
		 * @return [type]                  [description]
		 */

		public static function showFormUpdateUserTheme($id_type_section)
		{
			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);

			return userDao::showFormUpdateUserTheme($obj_image_lang);
		}

		/**
		 * [updateUserThemeAndColor description]
		 *
		 * @param  [type] $id_user                     [description]
		 * @param  [type] $id_customize                [description]
		 * @param  [type] $color_customize_lang        [description]
		 * @param  [type] $text_block_1_customize_lang [description]
		 * @return [type]                              [description]
		 */

		public static function updateUserThemeAndColor($id_user,$id_customize,$color_customize_lang,$text_block_1_customize_lang)
		{
			$obj_user 			= new User();
			$obj_user->setId_user($id_user);

			$obj_customize_lang = new Type_customize_lang();
			$obj_customize_lang->setId_customize($id_customize);
			$obj_customize_lang->setColor_customize_lang($color_customize_lang);
			$obj_customize_lang->setText_block_1_customize_lang($text_block_1_customize_lang);

			return userDao::updateUserThemeAndColor($obj_user,$obj_customize_lang);
		}

		/**
		 * [uploadUserThemeWithFile description]
		 *
		 * @param  [type] $id_user                     [description]
		 * @param  [type] $id_type_section             [description]
		 * @param  [type] $color_customize_lang        [description]
		 * @param  [type] $text_block_1_customize_lang [description]
		 * @param  [type] $file_error                  [description]
		 * @param  [type] $file_name                   [description]
		 * @param  [type] $file_type                   [description]
		 * @param  [type] $file_tmp_name               [description]
		 * @param  [type] $file_size                   [description]
		 * @return [type]                              [description]
		 */

		public static function uploadUserThemeWithFile($id_user,$id_type_section,$color_customize_lang,$text_block_1_customize_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_user 			= new User();
			$obj_user->setId_user($id_user);

			$obj_image_lang 	= new Image_lang_version();
			$obj_image_lang->setId_type_image($id_type_section);
			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			$obj_customize_lang = new Type_customize_lang();
			$obj_customize_lang->setColor_customize_lang($color_customize_lang);
			$obj_customize_lang->setText_block_1_customize_lang($text_block_1_customize_lang);

			return userDao::uploadUserThemeWithFile($obj_user,$obj_image_lang,$obj_customize_lang);
		}

		/**
		 * [recoverPasswordByEmailUser description]
		 *
		 * @param  [type] $email_user [description]
		 * @return [type]             [description]
		 */

		public static function recoverPasswordByEmailUser($email_user)
		{
			$obj_user = new User();
			$obj_user->setEmail_user($email_user);

			return userDao::recoverPasswordByEmailUser($obj_user);
		}

		/**
		 * [showFormCreateAccount description]
		 *
		 * @return [type] [description]
		 */

		public static function showFormCreateAccount()
		{
			return userDao::showFormCreateAccount();
		}

		/**
		 * [registerUser description]
		 *
		 * @param  [type] $id_role                [description]
		 * @param  [type] $name_user              [description]
		 * @param  [type] $last_name_user         [description]
		 * @param  [type] $rfc_user               [description]
		 * @param  [type] $curp_user              [description]
		 * @param  [type] $membership_number_user [description]
		 * @param  [type] $about_me_user          [description]
		 * @param  [type] $biography_user         [description]
		 * @param  [type] $birthdate_user         [description]
		 * @param  [type] $age_user               [description]
		 * @param  [type] $gender_user            [description]
		 * @param  [type] $lada_telephone_user    [description]
		 * @param  [type] $telephone_user         [description]
		 * @param  [type] $lada_cell_phone_user   [description]
		 * @param  [type] $cell_phone_user        [description]
		 * @param  [type] $ship_address_user      [description]
		 * @param  [type] $address_user           [description]
		 * @param  [type] $country_user           [description]
		 * @param  [type] $state_user             [description]
		 * @param  [type] $city_user              [description]
		 * @param  [type] $municipality_user      [description]
		 * @param  [type] $colony_user            [description]
		 * @param  [type] $cp_user                [description]
		 * @param  [type] $street_user            [description]
		 * @param  [type] $outdoor_number_user    [description]
		 * @param  [type] $interior_number_user   [description]
		 * @param  [type] $between_street1_user   [description]
		 * @param  [type] $between_street2_user   [description]
		 * @param  [type] $other_references_user  [description]
		 * @param  [type] $nationality_user       [description]
		 * @param  [type] $filters_user           [description]
		 * @param  [type] $username_website       [description]
		 * @param  [type] $email_user             [description]
		 * @param  [type] $emailConfirmation      [description]
		 * @param  [type] $password1              [description]
		 * @param  [type] $password2              [description]
		 * @return [type]                         [description]
		 */

		public static function registerUser($id_role,$name_user,$last_name_user,$rfc_user,$curp_user,$membership_number_user,$about_me_user,$biography_user,$birthdate_user,$age_user,$gender_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$ship_address_user,$address_user,$country_user,$state_user,$city_user,$municipality_user,$colony_user,$cp_user,$street_user,$outdoor_number_user,$interior_number_user,$between_street1_user,$between_street2_user,$other_references_user,$nationality_user,$filters_user,$username_website,$email_user,$emailConfirmation,$password1,$password2)
		{
			$obj_user 	= new User();

			$obj_user->setId_role($id_role);

			$obj_user->setName_user($name_user);
			$obj_user->setLast_name_user($last_name_user);
			$obj_user->setRfc_user($rfc_user);
			$obj_user->setCurp_user($curp_user);
			$obj_user->setMembership_number_user($membership_number_user);
			$obj_user->setAbout_me_user($about_me_user);
			$obj_user->setBiography_user($biography_user);
			$obj_user->setBirthdate_user($birthdate_user);
			$obj_user->setAge_user($age_user);
			$obj_user->setGender_user($gender_user);
			$obj_user->setLada_telephone_user($lada_telephone_user);
			$obj_user->setTelephone_user($telephone_user);
			$obj_user->setLada_cell_phone_user($lada_cell_phone_user);
			$obj_user->setCell_phone_user($cell_phone_user);
			$obj_user->setShip_address_user($ship_address_user);
			$obj_user->setAddress_user($address_user);
			$obj_user->setCountry_user($country_user);
			$obj_user->setState_user($state_user);
			$obj_user->setCity_user($city_user);
			$obj_user->setMunicipality_user($municipality_user);
			$obj_user->setColony_user($colony_user);
			$obj_user->setCp_user($cp_user);
			$obj_user->setStreet_user($street_user);
			$obj_user->setOutdoor_number_user($outdoor_number_user);
			$obj_user->setInterior_number_user($interior_number_user);
			$obj_user->setBetween_street1_user($between_street1_user);
			$obj_user->setBetween_street2_user($between_street2_user);
			$obj_user->setOther_references_user($other_references_user);
			$obj_user->setNationality_user($nationality_user);
			$obj_user->setFilters_user($filters_user);
			$obj_user->setUsername_website($username_website);

			$obj_user->setEmail_user($email_user);
			$obj_user->setEmail_confirmation_user($emailConfirmation);
			$obj_user->setPassword_user($password1);
			$obj_user->setPassword_confirmation_user($password2);

			return userDao::registerUser($obj_user);
		}

		/**
		 * [registerUserWithSocialNetwork description]
		 *
		 * @param  [type] $id_role                [description]
		 * @param  [type] $name_user              [description]
		 * @param  [type] $last_name_user         [description]
		 * @param  [type] $rfc_user               [description]
		 * @param  [type] $curp_user              [description]
		 * @param  [type] $membership_number_user [description]
		 * @param  [type] $about_me_user          [description]
		 * @param  [type] $biography_user         [description]
		 * @param  [type] $birthdate_user         [description]
		 * @param  [type] $age_user               [description]
		 * @param  [type] $gender_user            [description]
		 * @param  [type] $lada_telephone_user    [description]
		 * @param  [type] $telephone_user         [description]
		 * @param  [type] $lada_cell_phone_user   [description]
		 * @param  [type] $cell_phone_user        [description]
		 * @param  [type] $ship_address_user      [description]
		 * @param  [type] $address_user           [description]
		 * @param  [type] $country_user           [description]
		 * @param  [type] $state_user             [description]
		 * @param  [type] $city_user              [description]
		 * @param  [type] $municipality_user      [description]
		 * @param  [type] $colony_user            [description]
		 * @param  [type] $cp_user                [description]
		 * @param  [type] $street_user            [description]
		 * @param  [type] $outdoor_number_user    [description]
		 * @param  [type] $interior_number_user   [description]
		 * @param  [type] $between_street1_user   [description]
		 * @param  [type] $between_street2_user   [description]
		 * @param  [type] $other_references_user  [description]
		 * @param  [type] $nationality_user       [description]
		 * @param  [type] $filters_user           [description]
		 * @param  [type] $username_website       [description]
		 * @param  [type] $email_user             [description]
		 * @param  [type] $emailConfirmation      [description]
		 * @param  [type] $password1              [description]
		 * @param  [type] $password2              [description]
		 * @param  [type] $id_social_media        [description]
		 * @param  [type] $url_user_social_media  [description]
		 * @return [type]                         [description]
		 */

		public static function registerUserWithSocialNetwork($id_role,$name_user,$last_name_user,$rfc_user,$curp_user,$membership_number_user,$about_me_user,$biography_user,$birthdate_user,$age_user,$gender_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$ship_address_user,$address_user,$country_user,$state_user,$city_user,$municipality_user,$colony_user,$cp_user,$street_user,$outdoor_number_user,$interior_number_user,$between_street1_user,$between_street2_user,$other_references_user,$nationality_user,$filters_user,$username_website,$email_user,$emailConfirmation,$password1,$password2,$id_social_media,$url_user_social_media)
		{
			$obj_user 	= new User();

			$obj_user->setId_role($id_role);
			$obj_user->setUrl_user_social_media($url_user_social_media);

			$obj_user->setName_user($name_user);
			$obj_user->setLast_name_user($last_name_user);
			$obj_user->setRfc_user($rfc_user);
			$obj_user->setCurp_user($curp_user);
			$obj_user->setMembership_number_user($membership_number_user);
			$obj_user->setAbout_me_user($about_me_user);
			$obj_user->setBiography_user($biography_user);
			$obj_user->setBirthdate_user($birthdate_user);
			$obj_user->setAge_user($age_user);
			$obj_user->setGender_user($gender_user);
			$obj_user->setLada_telephone_user($lada_telephone_user);
			$obj_user->setTelephone_user($telephone_user);
			$obj_user->setLada_cell_phone_user($lada_cell_phone_user);
			$obj_user->setCell_phone_user($cell_phone_user);
			$obj_user->setShip_address_user($ship_address_user);
			$obj_user->setAddress_user($address_user);
			$obj_user->setCountry_user($country_user);
			$obj_user->setState_user($state_user);
			$obj_user->setCity_user($city_user);
			$obj_user->setMunicipality_user($municipality_user);
			$obj_user->setColony_user($colony_user);
			$obj_user->setCp_user($cp_user);
			$obj_user->setStreet_user($street_user);
			$obj_user->setOutdoor_number_user($outdoor_number_user);
			$obj_user->setInterior_number_user($interior_number_user);
			$obj_user->setBetween_street1_user($between_street1_user);
			$obj_user->setBetween_street2_user($between_street2_user);
			$obj_user->setOther_references_user($other_references_user);
			$obj_user->setNationality_user($nationality_user);
			$obj_user->setFilters_user($filters_user);
			$obj_user->setUsername_website($username_website);

			$obj_user->setEmail_user($email_user);
			$obj_user->setEmail_confirmation_user($emailConfirmation);
			$obj_user->setPassword_user($password1);
			$obj_user->setPassword_confirmation_user($password2);

			$obj_social_media 	= new Social_media();
			$obj_social_media->setId_social_media($id_social_media);

			return userDao::registerUserWithSocialNetwork($obj_user,$obj_social_media);
		}

		/**
		 * [showRegisteredAccounts description]
		 *
		 * @return [type] [description]
		 */

		public static function showRegisteredAccounts()
		{
			return userDao::showRegisteredAccounts();
		}

		/**
		 * [showFormUploadGallery description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showFormUploadGallery($id_user)
		{
			$obj_user 			= new User();
			$obj_user->setId_user($id_user);

			return userDao::showFormUploadGallery($obj_user);
		}

		/**
		 * [registerGalleryUser description]
		 *
		 * @param  [type] $id_user       [description]
		 * @param  [type] $file_error    [description]
		 * @param  [type] $file_name     [description]
		 * @param  [type] $file_type     [description]
		 * @param  [type] $file_tmp_name [description]
		 * @param  [type] $file_size     [description]
		 * @return [type]                [description]
		 */

		public static function registerGalleryUser($id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size)
		{
			$obj_user 			= new User();
			$obj_user->setId_user($id_user);

			$obj_image_lang 	= new Image_lang_version();

			$obj_image_lang->setFile_error($file_error);
			$obj_image_lang->setFile_name($file_name);
			$obj_image_lang->setFile_type($file_type);
			$obj_image_lang->setFile_tmp_name($file_tmp_name);
			$obj_image_lang->setFile_size($file_size);

			return userDao::registerGalleryUser($obj_user,$obj_image_lang);
		}

		/**
		 * [showInformationSesionTopHeaderFront description]
		 *
		 * @param  [type] $id_user [description]
		 * @param  [type] $view    [description]
		 * @return [type]          [description]
		 */

		public static function showInformationSesionTopHeaderFront($id_user,$view)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showInformationSesionTopHeaderFront($view,$obj_user);
		}

		/**
		 * [showProfilePictureByIdUserFront description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showProfilePictureByIdUserFront($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showProfilePictureByIdUserFront($obj_user);
		}

		/**
		 * [showUserInformationByUserIdFront description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showUserInformationByUserIdFront($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showUserInformationByUserIdFront($obj_user);
		}

		/**
		 * [updateInformationUserFront description]
		 *
		 * @param  [type] $id_user                [description]
		 * @param  [type] $name_user              [description]
		 * @param  [type] $last_name_user         [description]
		 * @param  [type] $rfc_user               [description]
		 * @param  [type] $curp_user              [description]
		 * @param  [type] $membership_number_user [description]
		 * @param  [type] $about_me_user          [description]
		 * @param  [type] $biography_user         [description]
		 * @param  [type] $birthdate_user         [description]
		 * @param  [type] $age_user               [description]
		 * @param  [type] $gender_user            [description]
		 * @param  [type] $lada_telephone_user    [description]
		 * @param  [type] $telephone_user         [description]
		 * @param  [type] $lada_cell_phone_user   [description]
		 * @param  [type] $cell_phone_user        [description]
		 * @param  [type] $ship_address_user      [description]
		 * @param  [type] $address_user           [description]
		 * @param  [type] $country_user           [description]
		 * @param  [type] $state_user             [description]
		 * @param  [type] $city_user              [description]
		 * @param  [type] $municipality_user      [description]
		 * @param  [type] $colony_user            [description]
		 * @param  [type] $cp_user                [description]
		 * @param  [type] $street_user            [description]
		 * @param  [type] $outdoor_number_user    [description]
		 * @param  [type] $interior_number_user   [description]
		 * @param  [type] $between_street1_user   [description]
		 * @param  [type] $between_street2_user   [description]
		 * @param  [type] $other_references_user  [description]
		 * @param  [type] $nationality_user       [description]
		 * @param  [type] $username_website       [description]
		 * @return [type]                         [description]
		 */

		public static function updateInformationUserFront($id_user,$name_user,$last_name_user,$rfc_user,$curp_user,$membership_number_user,$about_me_user,$biography_user,$birthdate_user,$age_user,$gender_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$ship_address_user,$address_user,$country_user,$state_user,$city_user,$municipality_user,$colony_user,$cp_user,$street_user,$outdoor_number_user,$interior_number_user,$between_street1_user,$between_street2_user,$other_references_user,$nationality_user,$username_website)
		{
			$obj_user 	= new User();

			$obj_user->setId_user($id_user);

			$obj_user->setName_user($name_user);
			$obj_user->setLast_name_user($last_name_user);
			$obj_user->setRfc_user($rfc_user);
			$obj_user->setCurp_user($curp_user);
			$obj_user->setMembership_number_user($membership_number_user);
			$obj_user->setAbout_me_user($about_me_user);
			$obj_user->setBiography_user($biography_user);
			$obj_user->setBirthdate_user($birthdate_user);
			$obj_user->setAge_user($age_user);
			$obj_user->setGender_user($gender_user);
			$obj_user->setLada_telephone_user($lada_telephone_user);
			$obj_user->setTelephone_user($telephone_user);
			$obj_user->setLada_cell_phone_user($lada_cell_phone_user);
			$obj_user->setCell_phone_user($cell_phone_user);
			$obj_user->setShip_address_user($ship_address_user);
			$obj_user->setAddress_user($address_user);
			$obj_user->setCountry_user($country_user);
			$obj_user->setState_user($state_user);
			$obj_user->setCity_user($city_user);
			$obj_user->setMunicipality_user($municipality_user);
			$obj_user->setColony_user($colony_user);
			$obj_user->setCp_user($cp_user);
			$obj_user->setStreet_user($street_user);
			$obj_user->setOutdoor_number_user($outdoor_number_user);
			$obj_user->setInterior_number_user($interior_number_user);
			$obj_user->setBetween_street1_user($between_street1_user);
			$obj_user->setBetween_street2_user($between_street2_user);
			$obj_user->setOther_references_user($other_references_user);
			$obj_user->setNationality_user($nationality_user);
			$obj_user->setUsername_website($username_website);

			return userDao::updateInformationUserFront($obj_user);
		}

		/**
		 * [updateEmailFront description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function updateEmailFront($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::updateEmailFront($obj_user);
		}

		/**
		 * [updatePasswordFront description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function updatePasswordFront($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::updatePasswordFront($obj_user);
		}

		/**
		 * [createGeneralUserAccountFront description]
		 *
		 * @return [type] [description]
		 */

		public static function createGeneralUserAccountFront()
		{
			return userDao::createGeneralUserAccountFront();
		}

		/**
		 * [registerGeneralUserFront description]
		 *
		 * @param  [type] $name_user            [description]
		 * @param  [type] $last_name_user       [description]
		 * @param  [type] $lada_telephone_user  [description]
		 * @param  [type] $telephone_user       [description]
		 * @param  [type] $lada_cell_phone_user [description]
		 * @param  [type] $cell_phone_user      [description]
		 * @param  [type] $username_website     [description]
		 * @param  [type] $email_user           [description]
		 * @param  [type] $emailConfirmation    [description]
		 * @param  [type] $password1            [description]
		 * @param  [type] $password2            [description]
		 * @return [type]                       [description]
		 */

		public static function registerGeneralUserFront($name_user,$last_name_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$username_website,$email_user,$emailConfirmation,$password1,$password2)
		{
			$obj_user 	= new User();

			$obj_user->setName_user($name_user);
			$obj_user->setLast_name_user($last_name_user);
			$obj_user->setLada_telephone_user($lada_telephone_user);
			$obj_user->setTelephone_user($telephone_user);
			$obj_user->setLada_cell_phone_user($lada_cell_phone_user);
			$obj_user->setCell_phone_user($cell_phone_user);
			$obj_user->setUsername_website($username_website);

			$obj_user->setEmail_user($email_user);
			$obj_user->setEmail_confirmation_user($emailConfirmation);
			$obj_user->setPassword_user($password1);
			$obj_user->setPassword_confirmation_user($password2);

			return userDao::registerGeneralUserFront($obj_user);
		}

		/**
		 * [createSpecificUserAccountFront description]
		 *
		 * @return [type] [description]
		 */

		public static function createSpecificUserAccountFront()
		{
			return userDao::createSpecificUserAccountFront();
		}

		/**
		 * [registerSpecificUserFront description]
		 *
		 * @param  [type] $name_user            [description]
		 * @param  [type] $last_name_user       [description]
		 * @param  [type] $lada_telephone_user  [description]
		 * @param  [type] $telephone_user       [description]
		 * @param  [type] $lada_cell_phone_user [description]
		 * @param  [type] $cell_phone_user      [description]
		 * @param  [type] $username_website     [description]
		 * @param  [type] $email_user           [description]
		 * @param  [type] $emailConfirmation    [description]
		 * @param  [type] $password1            [description]
		 * @param  [type] $password2            [description]
		 * @return [type]                       [description]
		 */

		public static function registerSpecificUserFront($name_user,$last_name_user,$lada_telephone_user,$telephone_user,$lada_cell_phone_user,$cell_phone_user,$username_website,$email_user,$emailConfirmation,$password1,$password2)
		{
			$obj_user 	= new User();

			$obj_user->setName_user($name_user);
			$obj_user->setLast_name_user($last_name_user);
			$obj_user->setLada_telephone_user($lada_telephone_user);
			$obj_user->setTelephone_user($telephone_user);
			$obj_user->setLada_cell_phone_user($lada_cell_phone_user);
			$obj_user->setCell_phone_user($cell_phone_user);
			$obj_user->setUsername_website($username_website);

			$obj_user->setEmail_user($email_user);
			$obj_user->setEmail_confirmation_user($emailConfirmation);
			$obj_user->setPassword_user($password1);
			$obj_user->setPassword_confirmation_user($password2);

			return userDao::registerSpecificUserFront($obj_user);
		}

		/**
		 * [showNotificationOfAllInactiveUsers description]
		 *
		 * @param  [type] $id_role [description]
		 * @param  [type] $view    [description]
		 * @return [type]          [description]
		 */

		public static function showNotificationOfAllInactiveUsers($id_role,$view)
		{
			$obj_user = new User();
			$obj_user->setId_role($id_role);

			return userDao::showNotificationOfAllInactiveUsers($view,$obj_user);
		}

		/**
		 * [showModalWithInstructions description]
		 *
		 * @param  [type] $id_role [description]
		 * @return [type]          [description]
		 */

		public static function showModalWithInstructions($id_role)
		{
			$obj_user = new User();
			$obj_user->setId_role($id_role);

			return userDao::showModalWithInstructions($obj_user);
		}

		/**
		 * [showProfilePictureMainByIdUser description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showProfilePictureMainByIdUser($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showProfilePictureMainByIdUser($obj_user);
		}

		/**
		 * [getTotalUsersByRoleId description]
		 *
		 * @param  [type] $id_role [description]
		 * @return [type]          [description]
		 */

		public static function getTotalUsersByRoleId($id_role)
		{
			$obj_user = new User();
			$obj_user->setId_role($id_role);

			return userDao::getTotalUsersByRoleId($obj_user);
		}

		/**
		 * [showUserRecordMainWithLimit description]
		 *
		 * @param  [type] $id_user [description]
		 * @return [type]          [description]
		 */

		public static function showUserRecordMainWithLimit($id_user)
		{
			$obj_user = new User();
			$obj_user->setId_user($id_user);

			return userDao::showUserRecordMainWithLimit($obj_user);
		}
	}