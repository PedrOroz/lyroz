<?php
	if(isset($_SESSION['id_role_dao'])){
		//MOSTRAR MODAL SOLO SI EL USUARIO NO TIENE SU INFORMACION DE PERFIL COMPLETA
		userController::showModalWithInstructions($_SESSION['id_role_dao']);
	}
	//HEADER
	userController::showInformationSesionTopHeaderBack(); ?>