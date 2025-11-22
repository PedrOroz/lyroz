<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require_once(dirname(__DIR__).'/forms_php/vendor/autoload.php');
require_once(dirname(__DIR__).'../../core.php');

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set(TIMEZONE_CMS);
setlocale(LC_ALL,"es_ES");
// Unix
setlocale(LC_TIME, 'es_ES.UTF-8');
// En windows
setlocale(LC_TIME, 'spanish');

//Create an instance; passing `true` enables exceptions
$mail                   = new PHPMailer(true);
//Create a new SMTP instance
//$smtp                   = new SMTP();
//Tell PHPMailer to use SMTP
$mail->IsSMTP();
$mail->SMTPAuth         = true;// authentication enabled
//SMTP connection will not close after each email sent, reduces SMTP overhead
//$mail->SMTPKeepAlive    = true;// add it to keep SMTP connection open after each email sent
$mail->isHTML(true);
//Enable SMTP debugging
    //SMTP::DEBUG_OFF = off (for production use)
    //SMTP::DEBUG_CLIENT = client messages
    //SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug        = SMTP::DEBUG_OFF;
//CREDENCIALES DE PRUEBA
$mail->Host             = "smtp.gmail.com";
$mail->Port             = 465; // 465 or 587
//EMPRESA
$mail_receptor          = "Lyrozbusiness7@gmail.com";
$pass_receptor          = "zrav uqbq ibos tadm";
//CREDENCIALES EMPRESA
/*$mail->Host             = "";
$mail->Port             = ;
$mail_receptor          = "";
$pass_receptor          = "secret";
//$mail->addCC('');
//$mail->addBCC('');*/
//PHPMailer::ENCRYPTION_STARTTLS
//OR tls
    //Port = 587
//PHPMailer::ENCRYPTION_SMTPS
//OR ssl
    //Port = 465
$mail->SMTPSecure       = PHPMailer::ENCRYPTION_SMTPS;

//GMAIL
/*$mail->Host               = "smtp.gmail.com";
$mail->Port               = 587; // 465 SSL or 587 TLS*/

//OUTLOOK 365
/*$mail->Host               = "smtp.office365.com";
$mail->Port               = 587; //25 or 587 TLS
$mail_receptor            = "correo_cliente@gmail.com";*/

//NOMBRE CORREO PRINCIPAL
$name_mail_receptor     = addslashes(WEBSITE_CMS);
//CORREO
$mail->Username         = $mail_receptor;
$mail->Password         = $pass_receptor;
$mail->CharSet          = "UTF-8";
$mail->Encoding         = "base64";
$mail->Debugoutput      = "html";
$mail->Priority         = 1;
$mail->Timeout          = 60;
//POR SI EL NAVEGADOR NO SOPORTA HTML MOSTRAMOS EL CODIGO PLANO
$mail->AltBody          = "Lo sentimos, pero no podemos mostrar la información ya que el servidor no es compatible con HTML.";
//INCRUSTAR LOGO EMPRESA
                                                            //filename, cid, name
$mail->AddEmbeddedImage(dirname(__DIR__).'/forms_php/logo_email.jpg', 'logoemail', 'logo_email.jpg');
//INCRUSTAR ICONOS REDES SOCIALES
                                                            //filename, cid, name
$mail->AddEmbeddedImage(dirname(__DIR__).'/forms_php/mails/ig.png', 'instagramicon', 'ig.png');
$mail->AddEmbeddedImage(dirname(__DIR__).'/forms_php/mails/fb.png', 'facebookicon', 'fb.png');
$mail->AddEmbeddedImage(dirname(__DIR__).'/forms_php/mails/twitter.png', 'twittericon', 'twitter.png');
$mail->AddEmbeddedImage(dirname(__DIR__).'/forms_php/mails/linkedin.png', 'linkedinicon', 'linkedin.png');
$mail->AddEmbeddedImage(dirname(__DIR__).'/forms_php/mails/tiktok.png', 'tiktokicon', 'tiktok.png');