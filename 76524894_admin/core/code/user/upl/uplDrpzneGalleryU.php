<?php
    $valor = array();
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
            $response['status'] = 0;
            $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables no creadas'];
            print(json_encode($response, JSON_UNESCAPED_UNICODE));
            exit;
        }else{
                //METODO POST
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(!isset($_POST['par1']) || !isset($_FILES))
                    {
                        $response['status'] = 1;
                        $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(2)';
                        print(json_encode($response, JSON_UNESCAPED_UNICODE));
                        exit;
                    }else{
                            $id_user            = intval(trim($_POST['par1']));
                            $file_name          = trim($_FILES['file']['name']);

                            if(!empty($id_user) && !empty($file_name))
                            {
                                require_once($slash.'controllers/functions/userController.php');

                                $file_error     = $_FILES["file"]["error"];
                                $file_type      = $_FILES["file"]["type"];
                                $file_tmp_name  = $_FILES["file"]["tmp_name"];
                                $file_size      = $_FILES["file"]["size"];

                                userController::registerGalleryUser($id_user,$file_error,$file_name,$file_type,$file_tmp_name,$file_size);
                            }else{
                                    $response['status'] = 1;
                                    $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(3)';
                                    print(json_encode($response, JSON_UNESCAPED_UNICODE));
                                    exit;
                                 } 
                         }
                 }else{
                        $response['status'] = 1;
                        $response['msg']    = $lang_function['Error en el proceso'].$lang_function['Variables vacías'].'(1)';
                        print(json_encode($response, JSON_UNESCAPED_UNICODE));
                        exit;
                     }
             }
    }catch(Exception $e)
    {
        $response['status'] = 1;
        $response['msg']    = $lang_function['Error en el proceso'].$e -> getMessage();
        print(json_encode($response, JSON_UNESCAPED_UNICODE));
        exit;
    }