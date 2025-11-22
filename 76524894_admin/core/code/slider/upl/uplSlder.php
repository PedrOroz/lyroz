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
                    if(!isset($_POST['par1']) || !isset($_POST['title_image_lang']) || !isset($_POST['id_type_version']) || !isset($_POST['id_menu']))
                    {
                        $valor = array("estado" => "false",
                                       "error"  => $lang_function['Error en el proceso'].$lang_function['Variables no creadas']);
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }else{
                            if(!empty($_FILES['file']['name']))
                            {
                                $id_type_image                    = intval(trim($_POST['par1']));
                                $id_lang                          = 1;
                                $id_type_version                  = intval(trim($_POST['id_type_version']));
                                $id_menu                          = intval(trim($_POST['id_menu']));

                                $title_image_lang                 = addslashes(trim($_POST['title_image_lang']));
                                $file_name                        = trim($_FILES['file']['name']);

                                if(!empty($id_type_image) && !empty($id_lang) && !empty($id_type_version) && !empty($id_menu) && !empty($title_image_lang) && !empty($file_name))
                                {
                                    require_once($slash.'../core/core.php');
                                    require_once($slash.'helps/help.php');
                                    require_once($slash.'controllers/functions/slidersController.php');

                                    $file_error                   = $_FILES["file"]["error"];
                                    $file_type                    = $_FILES["file"]["type"];
                                    $file_tmp_name                = $_FILES["file"]["tmp_name"];
                                    $file_size                    = $_FILES["file"]["size"];

                                    $subtitle_image_lang          = (isset($_POST['subtitle_image_lang']) && !empty($_POST['subtitle_image_lang']) ? addslashes(trim($_POST['subtitle_image_lang'])) : NULL);
                                
                                    $description_small_image_lang = (isset($_POST['description_small_image_lang']) && !empty($_POST['description_small_image_lang']) ? addslashes(trim($_POST['description_small_image_lang'])) : NULL);

                                    $title_hyperlink_image_lang   = (isset($_POST['title_hyperlink_image_lang']) && !empty($_POST['title_hyperlink_image_lang']) ? addslashes(trim($_POST['title_hyperlink_image_lang'])) : NULL);
                                    $link_image_lang              = (isset($_POST['link_image_lang']) && !empty($_POST['link_image_lang']) ? addslashes($_POST['link_image_lang']) : NULL);
                                    
                                    if(isset($_POST['description_large_image_lang']) && !empty($_POST['description_large_image_lang'])){
                                        
                                        require_once(dirname(__DIR__).'../../../class/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');
                                        
                                        $config                         = HTMLPurifier_Config::createDefault();

                                        // configuration goes here:
                                        $config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
                                        $config->set('HTML.Doctype', 'XHTML 1.0 Transitional'); // replace with your doctype

                                        $purifier                        = new HTMLPurifier($config);
                                        $pure_html                       = $purifier->purify($_POST['description_large_image_lang']);
                                        
                                        $description_large_image_lang    = htmlspecialchars(addslashes(trim($pure_html)));
                                    }else{
                                        $description_large_image_lang    = NULL;
                                         }

                                    $background_color_image_lang            = (isset($_POST['background_color_image_lang']) && !empty($_POST['background_color_image_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['background_color_image_lang'])) : NULL);
                                    $background_color_degraded_image_lang   = (isset($_POST['background_color_degraded_image_lang']) && !empty($_POST['background_color_degraded_image_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['background_color_degraded_image_lang'])) : NULL);
                                    $background_repeat_image_lang           = (isset($_POST['background_repeat_image_lang']) && !empty($_POST['background_repeat_image_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['background_repeat_image_lang'])) : NULL);
                                    $background_position_image_lang         = (isset($_POST['background_position_image_lang']) && !empty($_POST['background_position_image_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['background_position_image_lang'])) : NULL);
                                    $background_size_image_lang             = (isset($_POST['background_size_image_lang']) && !empty($_POST['background_size_image_lang']) ? str_replace_string(array("'", '"'),"",trim($_POST['background_size_image_lang'])) : NULL);
                                        
                                    $alt_image_lang = (isset($_POST['alt_image_lang']) && !empty($_POST['alt_image_lang']) ? addslashes(trim($_POST['alt_image_lang'])) : addslashes(WEBSITE_CMS)." ".$title_image_lang);
                                    $width_image    = (isset($_POST['width_image']) && !empty($_POST['width_image']) ? intval(trim($_POST['width_image'])) : 0);
                                    $height_image   = (isset($_POST['height_image']) && !empty($_POST['height_image']) ? intval(trim($_POST['height_image'])) : 0);

                                    slidersController::registerSlider($id_type_image,$width_image,$height_image,$file_type,$file_size,$id_lang,$title_image_lang,$subtitle_image_lang,$description_small_image_lang,$description_large_image_lang,$title_hyperlink_image_lang,$link_image_lang,$alt_image_lang,$background_color_image_lang,$background_color_degraded_image_lang,$background_repeat_image_lang,$background_position_image_lang,$background_size_image_lang,$id_type_version,$id_menu,$file_error,$file_name,$file_tmp_name);
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