<?php
	header('Content-Type: application/json');
	//ini_set("allow_url_fopen", 1);

	$captcha;

	if(isset($_POST['g-recaptcha-response'])){
	    $captcha = $_POST['g-recaptcha-response'];
	}

	if(!$captcha){
	    $response = array (
	        'status' 	=> 'error',
	        'info'   	=> LANG_ERROR_CONTACTO_1
	    );
	    print(json_encode($response, JSON_UNESCAPED_UNICODE));
	    exit;
	}

	$secretKey = SECRET_KEY;

	$ip = $_SERVER['REMOTE_ADDR'];

	/**
	 * [file_get_contents_curl description]
	 *
	 * @param  [type] $url [description]
	 * @return [type]      [description]
	 */

	function file_get_contents_curl($url) {
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

	    $data = curl_exec($ch);
	    curl_close($ch);

	    return $data;
	}

	/**
	 * [sendMail description]
	 *
	 * @param  [type] $nombre         [description]
	 * @param  [type] $email          [description]
	 * @param  [type] $tel            [description]
	 * @param  [type] $estado         [description]
	 * @param  [type] $ciudad         [description]
	 * @param  [type] $compania       [description]
	 * @param  [type] $asunto         [description]
	 * @param  [type] $mensaje        [description]
	 * @param  [type] $check1         [description]
	 * @param  [type] $check2         [description]
	 * @param  [type] $id_lang        [description]
	 * @param  [type] $nombreFileForm [description]
	 * @return [type]                 [description]
	 */

	function sendMail($nombre,$email,$tel,$estado,$ciudad,$compania,$asunto,$mensaje,$check1,$check2,$id_lang,$nombreFileForm)
	{
		try {
			ob_start();
			require_once("dominio.php");
	    	ob_clean();

	    	//NOMBRE CORREO PRINCIPAL
			$name_mail_receptor     = addslashes(WEBSITE);
			//$mail->SMTPKeepAlive 	= true;
			//DE:
			$mail->setFrom($mail_receptor,$name_mail_receptor);
			//$mail->setFrom("noreply@".HOSTING_PHPMAILER,$name_mail_receptor);
			//AGREGAR RESPUESTA A:
			$mail->addReplyTo($email,ucwords(strtolower($nombre)));
			//PARA:
			$mail->addAddress($mail_receptor,$name_mail_receptor);
			//$mail->addCC('');
			//$mail->addBCC('');
			//ASUNTO
			$mail->Subject = !empty($asunto) ? $asunto : $email.' '.LANG_ERROR_CONTACTO_3;
			if(!empty($nombreFileForm))
			{
				//ARCHIVOS ADJUNTOS
			    $mail->addAttachment('../archivos_adjuntos/contacto/'.$nombreFileForm);
			    //NOMBRE OPCIONAL
			    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
			}
			//INCRUSTAR ICONOS
			                        //filename, cid, name
			$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/email_negro.png', 'blackemailicon', 'email_negro.png');
			$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/deacuerdo_negro.png', 'blackagreeicon', 'deacuerdo_negro.png');

			if(!empty($tel)){
				$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/tel_negro.png', 'blackphoneicon', 'tel_negro.png');
			}
			if(!empty($estado)){
				$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/estado_negro.png', 'blackstateicon', 'estado_negro.png');
			}
			if(!empty($ciudad)){
				$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/ciudad_negro.png', 'blackcityicon', 'ciudad_negro.png');
			}
			if(!empty($compania)){
				$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/empresa_negro.png', 'blackcompanyicon', 'empresa_negro.png');
			}
			if($check2 == 'No'){
				$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/desacuerdo_negro.png', 'blackdisagreeicon', 'desacuerdo_negro.png');
			}
			//CUERPO DEL MENSAJE
			require_once("mailContacto.php");

			$mail->MsgHTML($body);

			//ENVIAR MAIL
			if(!$mail->send())
			{
				$response = array (
			        'status' 	=> 'error',
			        'info' 	 	=> $mail->ErrorInfo,
			    );
			    $mail->getSMTPInstance()->reset();
			    print(json_encode($response, JSON_UNESCAPED_UNICODE));
			    exit;
			}else{
					//BORRAR CONTENEDORES
					$mail->clearAllRecipients();
					$mail->clearAddresses();
					$mail->clearCustomHeaders();
					$mail->clearAttachments();

			       	$mail->smtpClose();

					ob_end_flush();

				    //ENVIARLE UN MAIL DE CONFIRMACION AL USUARIO
					ob_start();
					//DE:
					//$mail->setFrom($mail_receptor,$name_mail_receptor);
					$mail->setFrom("noreply@".HOSTING_PHPMAILER,$name_mail_receptor);
					//PARA:
					$mail->addAddress($email,ucwords(strtolower($nombre)));
					//$mail->addCC('');
					//$mail->addBCC('');
					//ASUNTO
					$mail->Subject =  LANG_ERROR_CONTACTO_4;
					//INCRUSTAR LOGO EMPRESA
					                        //filename, cid, name
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/logo_email_header.jpg', 'logoemailheader', 'logo_email_header.jpg');
					//INCRUSTAR ICONOS REDES SOCIALES
	                                        //filename, cid, name
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/fb.png', 'facebookicon', 'fb.png');
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/ig.png', 'instagramicon', 'ig.png');
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/linkedin.png', 'linkedinicon', 'linkedin.png');
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/pinteres.png', 'pinteresicon', 'pinteres.png');
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/vimeo.png', 'vimeoicon', 'vimeo.png');
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/youtube.png', 'youtubeicon', 'youtube.png');
					$mail->AddEmbeddedImage(dirname(__DIR__).'/img/mails/whatsapp.png', 'whatsappicon', 'whatsapp.png');
					// clean the output buffer
	    			ob_clean();

					//CUERPO MAIL DE CONFIRMACIÓN
					require_once("mailContactoConfirmation.php");

					$mail->MsgHTML($body_confirmation);

					//ENVIAR MAIL
					if(!$mail->send())
					{
						$response = array (
					        'status' 	=> 'success',
					        'info' 	 	=> LANG_ERROR_CONTACTO_5,
			    			'form' 	 	=> 'static',
			    			'id_modal' 	=> '',
			    			'show'   	=> 2
					    );
					    $mail->getSMTPInstance()->reset();
					    print(json_encode($response, JSON_UNESCAPED_UNICODE));
					    exit;
					}else{
							//BORRAR CONTENEDORES
							$mail->clearAllRecipients();
							$mail->clearAddresses();
							$mail->clearCustomHeaders();
							$mail->clearAttachments();

					       	$mail->smtpClose();

							$response = array (
						        'status' 	=> 'success',
						        'info'   	=> LANG_ERROR_CONTACTO_6,
			    				'form' 	 	=> 'static',
			    				'id_modal' 	=> '',
			    				'show'   	=> 2
						    );
						    print(json_encode($response, JSON_UNESCAPED_UNICODE));
						    exit;
						 }
					ob_end_flush();
				 }
		}catch(Exception $e){
			//Pretty error messages from PHPMailer
			$response = array (
		        'status' 	=> 'error',
		        'info' 	 	=> $e->errorMessage()
		    );
		    print(json_encode($response, JSON_UNESCAPED_UNICODE));
			exit;
		}catch(\Exception $e){
			//The leading slash means the Global PHP Exception class will be caught
		    $response = array (
		        'status' 	=> 'error',
		        'info' 	 	=> $e->getMessage()
		    );
		    print(json_encode($response, JSON_UNESCAPED_UNICODE));
			exit;
		}
	}

	$googleResponse =  file_get_contents_curl("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

	//$googleResponse =  file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

	$responseKeys = json_decode($googleResponse,true);

	if(intval($responseKeys["success"]) !== 1) {
	    $response = array (
	        'status' 	=> 'error',
	        'info' 	 	=> LANG_ERROR_CONTACTO_2
	    );
	    print(json_encode($response, JSON_UNESCAPED_UNICODE));
	    exit;
	}else{
			if(!empty($nombre) && !empty($email) && !empty($mensaje))
			{
						//$nombre,$email,$tel,$estado,$ciudad,$compania,$asunto,$mensaje,$check1,$check2,$id_lang,$nombreFileForm
				sendMail(stripslashes($nombre),$email,$tel,stripslashes($estado),stripslashes($ciudad),stripslashes($compania),stripslashes($asunto),stripslashes($mensaje),$check1,$check2,$id_lang,"");
			}else{
					$response = array (
				        'status' 	=> 'error',
				        'info' 	 	=> LANG_ERROR_CONTACTO_7.'(2)'
				    );
				    print(json_encode($response, JSON_UNESCAPED_UNICODE));
				    exit;
				 }
	}