<?php
    $valor = array();
    $slash = '../../../';

    if(!isset($_SESSION)){
        require_once($slash.'models/cfg/seguridad.php');
        sec_session_start();
    }
    header('Content-Type: application/json');

    try
    {
        require_once($slash.'controllers/functions/langController.php');
        require_once(dirname(__DIR__).'/'.$slash.'languages/'.langController::prefixLangDefault("errorFunction"));

        //SIN SESIONES CREADAS
        if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao'])){
            $valor = array("estado"     => "false",
                           "error"      => $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'],
                           "sin_sesion" => "true");
            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }else{
                //METODO POST
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(!isset($_POST['par1']) || !isset($_POST['par2']) || !isset($_POST['par3']) || !isset($_POST['par4']) || !isset($_POST['par5']) || !isset($_POST['id_type_version']))
                    {
                        $valor = array("estado" => "false",
                                       "error" => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            if(isset($_FILES['fileInputUploadVersion']['name']))
                            {
                                $id_image                   = intval(trim($_POST['par1']));
                                $id_image_lang              = intval(trim($_POST['par2']));
                                //EL ID LANG SOLO ES OBLIGATORIO CUANDO SE REGISTRA LA VERSION DE LA IMAGEN EN UN SOLO IDIOMA, EN NUESTRO CASO NO ES NECESARIO
                                $id_lang                    = intval(trim($_POST['par3']));
                                $id_type_image              = intval(trim($_POST['par5']));
                                $id_type_version            = intval(trim($_POST['id_type_version']));

                                $title_image_lang           = addslashes(trim($_POST['par4']));
                                $file_name                  = trim($_FILES['fileInputUploadVersion']['name']);

                                if(!empty($id_image) && !empty($id_image_lang) && !empty($title_image_lang) && !empty($id_type_image) && !empty($id_type_version) && !empty($file_name))
                                {
                                    require_once($slash.'controllers/functions/imageController.php');

                                    $file_error              = $_FILES["fileInputUploadVersion"]["error"];
                                    $file_type               = $_FILES["fileInputUploadVersion"]["type"];
                                    $file_tmp_name           = $_FILES["fileInputUploadVersion"]["tmp_name"];
                                    $file_size               = $_FILES["fileInputUploadVersion"]["size"];

                                    imageController::uploadImageVersionByImageLangId($id_image,$id_image_lang,$title_image_lang,$id_type_image,$id_type_version,$file_error,$file_name,$file_type,$file_tmp_name,$file_size);
                                }else{
                                        $valor = array("estado" => "false",
                                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(3)');
                                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                        exit();
                                     }
                            }else{
                                    $valor = array("estado" => "false",
                                                   "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
                                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                    exit();
                                 }
                        }
                }else{
                        $valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)');
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                     }
              }
    }catch(Exception $e)
    {
        $valor = array("estado" => "false",
                       "error"  => $lang_function['Error en el proceso'].$e -> getMessage());
        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
        exit();
    }