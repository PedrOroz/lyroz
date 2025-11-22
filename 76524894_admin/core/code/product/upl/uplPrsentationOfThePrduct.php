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
                    if(!isset($_POST['par1']) || !isset($_POST['par2']) || !isset($_POST['par3']) || !isset($_POST['par5']) || !isset($_POST['id_attribute']))
                    {
                        $valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            $id_product           = intval(trim($_POST['par1']));
                            $id_type_image        = intval(trim($_POST['par2']));
                            $id_lang              = intval(trim($_POST['par3']));
                            $id_product_lang      = intval(trim($_POST['par5']));
                            $id_attribute         = intval(trim($_POST['id_attribute']));

                            $file_name            = $_FILES['fileInputProductPresentationImage']['name'];

                            if(!empty($id_product) && !empty($id_type_image) && !empty($id_product_lang) && !empty($id_lang) && !empty($id_attribute) && !empty($file_name)){

                                require_once($slash.'controllers/functions/productPresentationsController.php');

                                $file_error       = $_FILES["fileInputProductPresentationImage"]["error"];
                                $file_type        = $_FILES["fileInputProductPresentationImage"]["type"];
                                $file_tmp_name    = $_FILES["fileInputProductPresentationImage"]["tmp_name"];
                                $file_size        = $_FILES["fileInputProductPresentationImage"]["size"];

                                $general_price_product_lang_presentation_lang       = (isset($_POST['general_price_product_lang_presentation_lang']) && !empty($_POST['general_price_product_lang_presentation_lang']) ? trim(filter_input(INPUT_POST, 'general_price_product_lang_presentation_lang', FILTER_VALIDATE_FLOAT)) : 0.00);

                                $general_stock_product_lang_presentation_lang       = (isset($_POST['general_stock_product_lang_presentation_lang']) && !empty($_POST['general_stock_product_lang_presentation_lang']) ? intval(trim($_POST['general_stock_product_lang_presentation_lang'])) : 0);

                                $reference_product_lang_presentation_lang           = (isset($_POST['reference_product_lang_presentation_lang']) && !empty($_POST['reference_product_lang_presentation_lang']) ? addslashes(trim($_POST['reference_product_lang_presentation_lang'])) : NULL);

                                $meta_title_product_lang_presentation_lang	        = (isset($_POST['meta_title_product_lang_presentation_lang']) && !empty($_POST['meta_title_product_lang_presentation_lang']) ? addslashes(trim($_POST['meta_title_product_lang_presentation_lang'])) : NULL);

								$meta_description_product_lang_presentation_lang    = (isset($_POST['meta_description_product_lang_presentation_lang']) && !empty($_POST['meta_description_product_lang_presentation_lang']) ? addslashes(trim($_POST['meta_description_product_lang_presentation_lang'])) : NULL);

								$meta_keywords_product_lang_presentation_lang	    = (isset($_POST['meta_keywords_product_lang_presentation_lang']) && !empty($_POST['meta_keywords_product_lang_presentation_lang']) ? addslashes(trim($_POST['meta_keywords_product_lang_presentation_lang'])) : NULL);

                                productPresentationsController::uploadPresentationOfTheProduct($id_product,$id_type_image,$id_product_lang,$id_lang,$id_attribute,$general_price_product_lang_presentation_lang,$general_stock_product_lang_presentation_lang,$reference_product_lang_presentation_lang,$meta_title_product_lang_presentation_lang,$meta_description_product_lang_presentation_lang,$meta_keywords_product_lang_presentation_lang,$file_error,$file_name,$file_type,$file_tmp_name,$file_size);
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