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
                    if(!isset($_POST['par1']) || !isset($_POST['par2']) || !isset($_POST['color_customize_lang']) || !isset($_POST['text_block_1_customize_lang']))
                    {
                        $valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            require_once($slash.'helps/help.php');

                            $id_user                      = intval(trim($_POST['par1']));
                            $id_type_section              = intval(trim($_POST['par2']));

                            $color_customize_lang         = str_replace_string(array("'", '"'),"",trim($_POST['color_customize_lang']));

                            $text_block_1_customize_lang  = addslashes(trim($_POST['text_block_1_customize_lang']));
                            $file_name                    = trim($_FILES['fileCustomization']['name']);

                            if(!empty($id_user) && !empty($id_type_section) && !empty($color_customize_lang) && !empty($text_block_1_customize_lang) && !empty($file_name)){
                                if(!empty($_FILES['fileCustomization']['name'])){

                                    require_once($slash.'controllers/functions/userController.php');

                                    $file_error           = $_FILES["fileCustomization"]["error"];
                                    $file_type            = $_FILES["fileCustomization"]["type"];
                                    $file_tmp_name        = $_FILES["fileCustomization"]["tmp_name"];
                                    $file_size            = $_FILES["fileCustomization"]["size"];

                                    userController::uploadUserThemeWithFile($id_user,$id_type_section,$color_customize_lang,$text_block_1_customize_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size);
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