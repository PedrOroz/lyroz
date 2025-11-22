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
                    //NO ES NECESARIO VALIDAR EL PAR5 (id_product_lang) YA QUE SU VALOR PUEDE SER 0
                    if(!isset($_POST['par1']) || !isset($_POST['par2']) || !isset($_POST['par3']) || !isset($_POST['par4']) || !isset($_POST['par6']) || !isset($_POST['par7']) || !isset($_POST['par8']) || !isset($_POST['par9']))
                    {
                        $valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            $id_product                 = intval(trim($_POST['par1']));
                            $id_type_image              = intval(trim($_POST['par2']));
                            $id_lang                    = intval(trim($_POST['par3']));
                            $id_call                    = intval(trim($_POST['par4']));
                            $id_product_lang            = intval(trim($_POST['par5']));
                            $id_type_of_currency        = intval(trim($_POST['par8']));
                            $id_tax_rule                = intval(trim($_POST['par9']));

                            $title_product_lang         = addslashes(trim($_POST['par6']));
                            $friendly_url_product_lang  = trim($_POST['par7']);
                            $file_name                  = trim($_FILES['fileProductCover']['name']);

                            if(!empty($id_product) && !empty($id_type_image) && !empty($id_lang) && !empty($id_call) && !empty($title_product_lang) && !empty($friendly_url_product_lang) && !empty($id_type_of_currency) && !empty($id_tax_rule) && !empty($file_name)){

                                require_once($slash.'controllers/functions/productsController.php');

                                $file_error             = $_FILES["fileProductCover"]["error"];
                                $file_type              = $_FILES["fileProductCover"]["type"];
                                $file_tmp_name          = $_FILES["fileProductCover"]["tmp_name"];
                                $file_size              = $_FILES["fileProductCover"]["size"];

                                productsController::uploadProductCover($id_call,$id_type_image,$id_lang,$id_product,$id_product_lang,$title_product_lang,$friendly_url_product_lang,$id_type_of_currency,$id_tax_rule,$file_error,$file_name,$file_type,$file_tmp_name,$file_size);
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