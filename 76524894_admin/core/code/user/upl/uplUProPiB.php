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
                    if(!isset($_POST['par1']))
                    {
                        $valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            $id_user            = intval(trim($_POST['par1']));
                            $file_name          = trim($_FILES['fileUserProfilePicture']['name']);

                            if(!empty($id_user) && !empty($file_name)){

                                require_once($slash.'controllers/functions/userController.php');

                                $file_error      = $_FILES["fileUserProfilePicture"]["error"];
                                $file_type       = $_FILES["fileUserProfilePicture"]["type"];
                                $file_tmp_name   = $_FILES["fileUserProfilePicture"]["tmp_name"];
                                $file_size       = $_FILES["fileUserProfilePicture"]["size"];

                                //$view
                                    //1 = Front
                                    //2 = Back
                                                                    //$id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,$view
                                userController::uploadUserProfilePicture($id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,2);
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