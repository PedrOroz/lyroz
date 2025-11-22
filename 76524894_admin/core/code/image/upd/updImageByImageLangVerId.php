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
                    if(!isset($_POST['par1']) || !isset($_POST['par2']) || !isset($_POST['par3']) || !isset($_POST['par4']))
                    {
                        $valor = array("estado" => "false",
                                       "error" => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            if(isset($_FILES['fileInputChangeVersion']['name']))
                            {
                                $id_image_lang_version = intval(trim($_POST['par1']));
                                $id_type_image         = intval(trim($_POST['par3']));
                                $id_lang               = intval(trim($_POST['par4']));

                                $title_image_lang      = addslashes(trim($_POST['par2']));
                                $file_name             = trim($_FILES['fileInputChangeVersion']['name']);

                                if(!empty($id_image_lang_version) && !empty($title_image_lang) && !empty($id_type_image) && !empty($id_lang) && !empty($file_name))
                                {
                                    require_once($slash.'controllers/functions/imageController.php');

                                    $file_error        = $_FILES["fileInputChangeVersion"]["error"];
                                    $file_type         = $_FILES["fileInputChangeVersion"]["type"];
                                    $file_tmp_name     = $_FILES["fileInputChangeVersion"]["tmp_name"];
                                    $file_size         = $_FILES["fileInputChangeVersion"]["size"];

                                    imageController::updateImageByImageLangVersionId($id_image_lang_version,$title_image_lang,$id_type_image,$id_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size);
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