<?php
    $slash = '../../../';

    if(!isset($_SESSION)){
        require_once($slash.'models/cfg/seguridad.php');
        sec_session_start();
    }

    try
    {
        require_once($slash.'controllers/functions/langController.php');
        require_once(dirname(__DIR__).'/'.$slash.'languages/'.langController::prefixLangDefault("errorFunction"));

        //SIN SESIONES CREADAS
        if(!isset($_SESSION['id_user_dao']) || empty($_SESSION['id_user_dao'])){
            header('Content-Type: application/json');
            $valor = array("estado"     => "false",
                           "error"      => $lang_function['Error en el proceso'].$lang_function['Variables de sesión no creadas'],
                           "sin_sesion" => "true");
            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }else{
                //METODO POST
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(isset($_FILES['file']['name']))
                    {
                        $id_type_image          = 7;
                        $file_name              = trim($_FILES['file']['name']);

                        if(!empty($id_type_image) && !empty($file_name))
                        {
                            require_once($slash.'../core/core.php');
                            require_once($slash.'controllers/functions/imageController.php');

                            $file_error         = $_FILES["file"]["error"];
                            $file_type          = $_FILES["file"]["type"];
                            $file_tmp_name      = $_FILES["file"]["tmp_name"];
                            $file_size          = $_FILES["file"]["size"];

                            $title_image_lang   = addslashes(trim(WEBSITE_CMS));

                            //$view
                                //1 = Front
                                //2 = Back
                                
                                                    //$id_type_image,$title_image_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,$view
                            imageController::uploadSummernoteImage($id_type_image,$title_image_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size,2);
                        }else{
                                header('Content-Type: application/json');
                                $valor = array("estado"     => "false",
                                               "error"      => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(3)');
                                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                             }
                    }else{
                            header('Content-Type: application/json');
                            $valor = array("estado"     => "false",
                                           "error"      => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)');
                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                         }
                }else{
                        header('Content-Type: application/json');
                        $valor = array("estado"     => "false",
                                       "error"      => $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)');
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                     }
                exit();
              }
    }catch(Exception $e)
    {
        header('Content-Type: application/json');
        $valor = array("estado"     => "false",
                       "error"      => $lang_function['Error en el proceso'].$e -> getMessage());
        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
        exit();
    }