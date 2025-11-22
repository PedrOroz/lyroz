<?php
    require_once("config.php");
    //IMAGENES
    require_once(dirname(__DIR__)."/imageDao.php");

    class ConectorDB extends configuracion
    {
        private             $conexion;
        protected static    $file_error         = "";
        protected static    $file_record        = "";
        protected static    $file_help          = "";
        protected static    $file_global        = "";
        protected static    $file_core          = "";
        private static      $folder             = "";
        private static      $full_path          = "";
        private static      $final_full_path    = "";
        private static      $icon               = "";
        private static      $sqlCall            = "";
        private static      $sqlCall2           = "";
        private static      $sqlOrder           = "";
        private static      $readbleArray       = "";
        private static      $sqlActive          = "";

        private static      $i                  = 0;

        private function __clone(){
            trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
        }

        public function __construct()
        {
            $this->conexion = parent::conectar();
            return $this->conexion;
        }

        /**
         * [consultarBD description]
         *
         * @param  [type] $consulta [description]
         * @param  array  $valores  [description]
         * @return [type]           [description]
         */

        public function consultarBD($consulta, $valores = array()){  //funcion principal, ejecuta todas las consultas
            $resultado  = false;
            $valor      = array();

            if($statement = $this->conexion->prepare($consulta)){  //prepara la consulta
                if(preg_match_all("/(:\w+)/", $consulta, $campo, PREG_PATTERN_ORDER)){ //tomo los nombres de los campos iniciados con :xxxxx
                    $campo = array_pop($campo); //inserto en un arreglo
                    foreach($campo as $parametro){
                        $statement->bindValue($parametro, $valores[substr($parametro,1)]);
                    }
                }
                try {
                    if (!$statement->execute()) { //si no se ejecuta la consulta...
                        $valor = array("estado" => "false","error" => "Error: ".$statement->errorInfo());
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                        exit();
                    }
                    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC); //si es una consulta que devuelve valores los guarda en un arreglo.
                    $statement->closeCursor();
                }
                catch(PDOException $e){
                    $valor = array("estado" => "false","error" => "Error: ".$e -> getMessage());
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }
            }
            return $resultado;
            $this->conexion = null; //cerramos la conexión
        }

        /**
         * [registerRecordOneParameterWithEmail description]
         *
         * @param  [type] $id_user [description]
         * @param  [type] $par1    [description]
         * @param  [type] $array   [description]
         * @return [type]          [description]
         */

        public static function registerRecordOneParameterWithEmail($id_user,$par1,$array)
        {
            if(!empty(intval(trim($id_user))) && !empty($par1) && !empty($array))
            {
                $record         = replaceStringOneParameterArray("/PARA1/",$par1,$array);

                if(!empty($record))
                {
                    ConectorDB::registerRecord($id_user,$record);
                }
            }
        }

        /**
         * [registerRecordOneParameter description]
         *
         * @param  [type] $id_user [description]
         * @param  [type] $par1    [description]
         * @param  [type] $array   [description]
         * @return [type]          [description]
         */

        public static function registerRecordOneParameter($id_user,$par1,$array)
        {
            if(!empty(intval(trim($id_user))) && !empty($par1) && !empty($array))
            {
                $record         = replaceStringOneParameterArray("/PARA1/",$par1,$array);

                if(!empty($record))
                {
                    ConectorDB::registerRecord($id_user,$record);
                }
            }
        }

        /**
         * [registerRecordTwoParameters description]
         *
         * @param  [type] $id_user [description]
         * @param  [type] $par1    [description]
         * @param  [type] $par2    [description]
         * @param  [type] $array   [description]
         * @return [type]          [description]
         */

        public static function registerRecordTwoParameters($id_user,$par1,$par2,$array)
        {
            if(!empty(intval(trim($id_user))) && !empty($par1) && !empty($par2) && !empty($array))
            {
                $record         = replaceStringTwoParametersArray("/PARA1/",$par1,"/PARA2/",$par2,$array);

                if(!empty($record))
                {
                    ConectorDB::registerRecord($id_user,$record);
                }
            }
        }

        /**
         * [registerRecordThreeParameters description]
         *
         * @param  [type] $id_user [description]
         * @param  [type] $par1    [description]
         * @param  [type] $par2    [description]
         * @param  [type] $par3    [description]
         * @param  [type] $array   [description]
         * @return [type]          [description]
         */

        public static function registerRecordThreeParameters($id_user,$par1,$par2,$par3,$array)
        {
            if(!empty(intval(trim($id_user))) && !empty($par1) && !empty($par2) && !empty($par3) && !empty($array))
            {
                $record         = replaceStringThreeParametersArray("/PARA1/",$par1,"/PARA2/",$par2,"/PARA3/",$par3,$array);

                if(!empty($record))
                {
                    ConectorDB::registerRecord($id_user,$record);
                }
            }
        }

        /**
         * [registerRecordFourParameters description]
         *
         * @param  [type] $id_user [description]
         * @param  [type] $par1    [description]
         * @param  [type] $par2    [description]
         * @param  [type] $par3    [description]
         * @param  [type] $par4    [description]
         * @param  [type] $array   [description]
         * @return [type]          [description]
         */

        public static function registerRecordFourParameters($id_user,$par1,$par2,$par3,$par4,$array)
        {
            if(!empty(intval(trim($id_user))) && !empty($par1) && !empty($par2) && !empty($par3) && !empty($par4) && !empty($array))
            {
                $record         = replaceStringFourParametersArray("/PARA1/",$par1,"/PARA2/",$par2,"/PARA3/",$par3,"/PARA4/",$par4,$array);

                if(!empty($record))
                {
                    ConectorDB::registerRecord($id_user,$record);
                }
            }
        }

        /**
         * [registerRecord description]
         *
         * @param  [type] $id_user [description]
         * @param  [type] $record  [description]
         * @return [type]          [description]
         */

        public static function registerRecord($id_user,$record)
        {
            if(!empty(intval(trim($id_user))) && !empty($record))
            {
                $ob_conectar    = new conectorDB();

                $consulta_record    = "CALL registerRecord(:id_user,:record)";
                $valores_record     = array('id_user' => $id_user,
                                            'record'  => $record);

                $resultadoRR    = $ob_conectar->consultarBD($consulta_record,$valores_record);

                foreach($resultadoRR as $atributoRR)
                {
                    if($atributoRR['ERRNO'] == 1)
                    {
                        return FALSE;
                    }else{
                            return TRUE;
                         }
                }
            }
        }

        /**
         * [showFolderPreviousFile description]
         *
         * @param  [type] $id_type_image [description]
         * @return [type]                [description]
         */

        public static function showFolderPreviousFile($id_type_image)
        {
            if(!empty(intval(trim($id_type_image))))
            {
                $ob_conectar                        = new conectorDB();

                $consulta_folder_previous_file      = "CALL showFolderPreviousFile(:id_type_image)";
                $valores_folder_previous_file       = array('id_type_image' => $id_type_image);

                $resultadoFPF                       = $ob_conectar->consultarBD($consulta_folder_previous_file,$valores_folder_previous_file);

                foreach($resultadoFPF as $atributoFPF)
                {
                    if($atributoFPF['ERRNO'] == 1)
                    {
                        return false;
                    }else{
                            return $atributoFPF['default_route_type_image'];
                         }
                }
            }
        }

        /**
         * [returnToSpecificPage description]
         *
         * @param  [type] $id_page  [description]
         * @param  [type] $id_table [description]
         * @param  string $page     [description]
         * @return [type]           [description]
         */

        public static function returnToSpecificPage($id_page,$id_table,$page = "my-profile")
        {
            switch (intval(trim($id_page)))
            {
                case 1://USUARIOS
                    if($id_table != 0){
                        $page = "my-profile/".$id_table;
                    }
                    return $page;
                break;
                case 2://PERFILES
                    if($id_table != 0){
                        $page = "my-profile/".$id_table;
                    }
                    return $page;
                break;
                case 15://PRODUCTOS
                    if($id_table != 0){
                        $page = "catalogue-product-detail/".$id_table;
                    }else{
                        $page = "catalogue-product";
                         }
                    return $page;
                break;
                case 20://BLOG
                    if($id_table != 0){
                        $page = "pages-blog-detail/".$id_table;
                    }else{
                        $page = "pages-blog";
                         }
                    return $page;
                break;
                default:
                    $page = "main";
                    return $page;
                break;
            }
        }

        /**
         * [deleteWith4Parameters description]
         *
         * @param  [type] $id_table [description]
         * @param  [type] $title    [description]
         * @param  [type] $id_call  [description]
         * @return [type]           [description]
         */

        public static function deleteWith4Parameters($id_table,$title,$id_call)
        {
            self::$file_error       = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($id_table))) && !empty(intval(trim($id_call))) && !empty($title))
            {
                self::$file_help    = dirname(__DIR__).'../../helps/help.php';
                require_once(self::$file_help);

                //CREAR OBJETO
                $ob_conectar        = new conectorDB();

                self::$sqlCall      = $ob_conectar->showProcedureDeleteWithParameters($id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Error 1"].'(2)');
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }else{
                        self::$file_record  = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("record");
                        require_once(self::$file_record);

                        self::$folder           = imageDao::showFolderByIdTypeImage($id_call);

                        if(!empty(self::$folder)){
                            self::$full_path    = "../../../../".self::$folder;
                        }

                        switch (intval(trim($id_call))) {
                            case 15://PRODUCTOS
                                if(!empty(self::$folder))
                                {
                                    $productImageInformationArray               = ConectorDB::showAllCoversByCallId($id_call,$id_table);//PORTADA (NO MODIFICAR PROCEDIMIENTO ALMACENADO, NO ESTA DUPLICADO, ESTE INCLUYE PORTADA)
                                    $productLangPresentationInformationArray    = ConectorDB::showPreviewProductLangPresentationImageArrayByProductId($id_table);//PRESENTACIONES CON IMAGEN
                                    //$fileInformationArray                       = ConectorDB::showPreviewFileArrayByProductId($id_table);//ARCHIVOS
                                    $imageVersionInformationArray               = ConectorDB::showPreviewImageVersionArrayByProductId($id_table);//PORTADA (NO MODIFICAR PROCEDIMIENTO ALMACENADO, NO ESTA DUPLICADO, ESTE INCLUYE PORTADA Y PRESENTACION)
                                }
                            break;
                            case 20://BLOG
                                if(!empty(self::$folder))
                                {
                                    $blogImageInformationArray               = ConectorDB::showAllCoversByCallId($id_call,$id_table);//PORTADA (NO MODIFICAR PROCEDIMIENTO ALMACENADO, NO ESTA DUPLICADO, ESTE INCLUYE PORTADA)
                                }
                            break;
                        }

                        $consulta_delete_with_parameters = "CALL ".self::$sqlCall."(:id_table)";
                        $valores_delete_with_parameters  = array('id_table' => $id_table);

                        $resultadoDWP = $ob_conectar->consultarBD($consulta_delete_with_parameters,$valores_delete_with_parameters);

                        foreach($resultadoDWP as &$atributoDWP)
                        {
                            switch (intval(trim($id_call))) {
                                case 15://PRODUCTOS
                                    switch ($atributoDWP['ERRNO']) {
                                        case 2://SOLO TIENE EL REGISTRO BASICO
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                      //$id_page,$id_table
                                            $page   = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor  = array("estado"    => "true",
                                                            "item"      => $id_table,
                                                            "resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(2)',$lang_error["Error 9"]),
                                                            "pagina"    => $page);
                                        break;
                                        case 3://TIENE PORTADA Y/O GENERALES, PRESENTACION SIN IMAGEN PERO NO PRESENTACION CON IMAGEN NI ARCHIVOS
                                            if(!empty(self::$full_path) && !empty($productImageInformationArray)){
                                                foreach($productImageInformationArray as $key => $value){
                                                    switch ($value['ERRNO']) {
                                                        case 2:
                                                            if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                            }
                                                        break;
                                                    }
                                                }//END productImageInformationArray
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(3)',$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        case 4://TIENE PORTADA Y/O GENERALES, PRESENTACION SIN IMAGEN Y PRESENTACION CON IMAGEN PERO NO ARCHIVOS
                                            if(!empty(self::$full_path)){
                                                if(!empty($productImageInformationArray)){
                                                    foreach($productImageInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END productImageInformationArray
                                                }
                                                if(!empty($imageVersionInformationArray)){
                                                    foreach($imageVersionInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END imageVersionInformationArray
                                                }
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(4)',$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        case 5://TIENE PORTADA Y/O GENERALES, PRESENTACION SIN IMAGEN, PRESENTACION CON IMAGEN Y ARCHIVOS
                                            if(!empty(self::$full_path)){
                                                if(!empty($productImageInformationArray)){
                                                    foreach($productImageInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END productImageInformationArray
                                                }
                                                if(!empty($imageVersionInformationArray)){
                                                    foreach($imageVersionInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END imageVersionInformationArray
                                                }
                                                /*if(!empty($fileInformationArray)){
                                                    foreach($fileInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['attached_file_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['attached_file_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END fileInformationArray
                                                }*/
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page   = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor  = array("estado"    => "true",
                                                            "item"      => $id_table,
                                                            "resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(5)',$lang_error["Error 9"]),
                                                            "pagina"    => $page);
                                        break;
                                        case 6://SOLO TIENE PORTADA Y/O GENERALES REGISTRADOS
                                            if(!empty(self::$full_path) && !empty($productImageInformationArray)){
                                                foreach($productImageInformationArray as $key => $value){
                                                    switch ($value['ERRNO']) {
                                                        case 2:
                                                            if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                            }
                                                        break;
                                                    }
                                                }//END productImageInformationArray
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(6)',$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        case 7://TIENE PRESENTACION SIN IMAGEN PERO NO PORTADA, PRESENTACION CON IMAGEN, NI ARCHIVOS
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(7)',$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        case 8://TIENE PRESENTACION SIN IMAGEN, PRESENTACION CON IMAGEN PERO NO PORTADA NI ARCHIVOS
                                            if(!empty(self::$full_path) && !empty($productLangPresentationInformationArray)){
                                                foreach($productLangPresentationInformationArray as $key => $value){
                                                    switch ($value['ERRNO']) {
                                                        case 2:
                                                            if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                            }
                                                        break;
                                                    }
                                                }//END productLangPresentationInformationArray
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(8)',$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        case 9://TIENE PRESENTACION SIN IMAGEN, PRESENTACION CON IMAGEN Y ARCHIVOS PERO NO PORTADA
                                            if(!empty(self::$full_path)){
                                                if(!empty($productLangPresentationInformationArray)){
                                                    foreach($productLangPresentationInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END productLangPresentationInformationArray
                                                }
                                                if(!empty($imageVersionInformationArray)){
                                                    foreach($imageVersionInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END imageVersionInformationArray
                                                }
                                                /*if(!empty($fileInformationArray)){
                                                    foreach($fileInformationArray as $key => $value){
                                                        switch ($value['ERRNO']) {
                                                            case 2:
                                                                if(!empty($value['attached_file_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                    imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['attached_file_lang'],$value['iso_code']);
                                                                }
                                                            break;
                                                        }
                                                    }//END fileInformationArray
                                                }*/
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page   = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor  = array("estado"    => "true",
                                                            "item"      => $id_table,
                                                            "resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(9)',$lang_error["Error 9"]),
                                                            "pagina"    => $page);
                                        break;
                                        default:
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 11"]);
                                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                            exit();
                                        break;
                                    }

                                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                    exit();

                                    break;
                                case 20://BLOG
                                    switch ($atributoDWP['ERRNO']) {
                                        case 2://SOLO TIENE EL REGISTRO BASICO
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                      //$id_page,$id_table
                                            $page   = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor  = array("estado"    => "true",
                                                            "item"      => $id_table,
                                                            "resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(2)',$lang_error["Error 9"]),
                                                            "pagina"    => $page);
                                        break;
                                        case 3://TIENE PORTADA Y/O GENERALES
                                            if(!empty(self::$full_path) && !empty($blogImageInformationArray)){
                                                foreach($blogImageInformationArray as $key => $value){
                                                    switch ($value['ERRNO']) {
                                                        case 2:
                                                            if(!empty($value['image_lang']) && !empty($value['iso_code'])){
                                                                                                    //$id_type_image,$folder,$image_previous,$iso_code
                                                                imageDao::deleteFolderWithPreviousFile($id_call,self::$full_path,$value['image_lang'],$value['iso_code']);
                                                            }
                                                        break;
                                                    }
                                                }//END blogImageInformationArray
                                            }

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"].'(6)',$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        default:
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 11"]);
                                        break;
                                    }

                                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                        exit();

                                    break;
                                default://GENERAL
                                    switch ($atributoDWP['ERRNO']){
                                        case 1:
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 11"]);
                                        break;
                                        case 2:
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                                                                    //$id_page,$id_table
                                            $page   = ConectorDB::returnToSpecificPage($id_call,0);

                                            $valor  = array("estado"    => "true",
                                                            "item"      => $id_table,
                                                            "resultado" => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_error["Error 9"]),
                                                            "pagina"    => $page);
                                        break;
                                        default:
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 1"].'(1)');
                                        break;
                                    }

                                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                    exit();

                                break;
                            }//END switch ($id_call)
                        }//END FOREACH
                     }
            }
        }

        /**
         * [showAllCoversByCallId description]
         *
         * @param  [type] $id_call  [description]
         * @param  [type] $id_table [description]
         * @return [type]           [description]
         */

        private static function showAllCoversByCallId($id_call,$id_table)
        {
            if(!empty(intval(trim($id_call))) && !empty(intval(trim($id_table))))
            {
                self::$sqlCall2  = ConectorDB::showProcedureAllCovers($id_call);
                if(self::$sqlCall2 == FALSE)
                {
                    return FALSE;
                }else{
                        //CREAR OBJETO
                        $ob_conectar    = new conectorDB();

                        $consulta2      = "CALL ".self::$sqlCall2."(:id_table)";
                        $valores2       = array('id_table' => $id_table);

                        $resultado2     = $ob_conectar->consultarBD($consulta2,$valores2);

                        foreach($resultado2 as $indice => $datos2)
                        {
                            if($datos2['ERRNO'] == 1){
                                $allCovers[] = $datos2['ERRNO'];
                            }else{
                                    $allCovers[] = $datos2;
                                 }
                        }
                        return $allCovers;
                     }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [showProcedureAllCovers description]
         *
         * @param  [type] $id_call [description]
         * @return [type]          [description]
         */

        private static function showProcedureAllCovers($id_call)
        {
            if(!empty($id_call)){
                switch ($id_call)
                {
                    case 15://Productos
                        return "showPreviewProductImageArrayByProductId";
                        break;
                    case 20://Blog
                        return "showPreviewBlogImageArrayByBlogId";
                        break;
                    default:
                        return FALSE;
                    break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [showPreviewProductLangPresentationImageArrayByProductId description]
         *
         * @param  [type] $id_table                                [description]
         * @param  array  $ProductLangPresentationImageInformation [description]
         * @return [type]                                          [description]
         */

        public static function showPreviewProductLangPresentationImageArrayByProductId($id_table,$ProductLangPresentationImageInformation = array())
        {
            if(!empty(intval(trim($id_table)))){
                //CREAR OBJETO
                $ob_conectar    = new conectorDB();

                $consulta       = "CALL showPreviewProductLangPresentationImageArrayByProductId(:id_table)";
                $valores        = array('id_table' => $id_table);

                $resultado      = $ob_conectar->consultarBD($consulta,$valores);

                foreach($resultado as $indice => $datos)
                {
                    if($datos['ERRNO'] == 1){
                        $ProductLangPresentationImageInformation[] = $datos['ERRNO'];
                    }else{
                        $ProductLangPresentationImageInformation[] = $datos;
                         }
                }
            }else{
                    $ProductLangPresentationImageInformation = [
                        "ERRNO" => 1
                    ];
                 }

            return $ProductLangPresentationImageInformation;
        }

        /**
         * [showPreviewFileArrayByProductId description]
         *
         * @param  [type] $id_table        [description]
         * @param  array  $FileInformation [description]
         * @return [type]                  [description]
         */

        public static function showPreviewFileArrayByProductId($id_table,$FileInformation = array())
        {
            if(!empty(intval(trim($id_table)))){

                //CREAR OBJETO
                $ob_conectar    = new conectorDB();

                $consulta       = "CALL showPreviewFileArrayByProductId(:id_table)";
                $valores        = array('id_table' => $id_table);

                $resultado      = $ob_conectar->consultarBD($consulta,$valores);

                foreach($resultado as $indice => $datos)
                {
                    if($datos['ERRNO'] == 1){
                        $FileInformation[] = $datos['ERRNO'];
                    }else{
                        $FileInformation[] = $datos;
                         }
                }
            }else{
                    $FileInformation = [
                        "ERRNO" => 1
                    ];
                 }

            return $FileInformation;
        }

        /**
         * [showPreviewImageVersionArrayByProductId description]
         *
         * @param  [type] $id_table                [description]
         * @param  array  $imageVersionInformation [description]
         * @return [type]                          [description]
         */

        public static function showPreviewImageVersionArrayByProductId($id_table,$imageVersionInformation = array())
        {
            if(!empty(intval(trim($id_table)))){
                //CREAR OBJETO
                $ob_conectar    = new conectorDB();

                $consulta       = "CALL showPreviewImageVersionArrayByProductId(:id_table)";
                $valores        = array('id_table' => $id_table);

                $resultado      = $ob_conectar->consultarBD($consulta,$valores);

                foreach($resultado as $indice => $datos)
                {
                    if($datos['ERRNO'] == 1){
                        $imageVersionInformation[] = $datos['ERRNO'];
                    }else{
                        $imageVersionInformation[] = $datos;
                         }
                }
            }else{
                    $imageVersionInformation = [
                        "ERRNO" => 1
                    ];
                 }

            return $imageVersionInformation;
        }

        /**
         * [showProcedureDeleteWithParameters description]
         *
         * @param  [type] $id_call [description]
         * @return [type]          [description]
         */

        private static function showProcedureDeleteWithParameters($id_call)
        {
            if(!empty(intval(trim($id_call)))){
                switch ($id_call)
                {
                    case 1://USUARIOS-REDES SOCIALES
                        return "deleteUserSocialNetwork";
                        break;
                    case 2://USUARIOS-PERSONALIZACIONES
                        return "deleteUserCustomize";
                        break;
                    case 15://PRODUCTOS-IMAGENES
                        return "deleteProductWithImage";
                        break;
                    case 20://BLOG-IMAGENES
                        return "deleteBlogWithImage";
                        break;
                    default:
                        return FALSE;
                        break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [updateGeneralStatus description]
         *
         * @param  [type] $id_table            [description]
         * @param  [type] $title               [description]
         * @param  [type] $switch_status       [description]
         * @param  [type] $id_call             [description]
         * @param  string $estado              [description]
         * @param  string $tipo_msj            [description]
         * @param  string $devuelve            [description]
         * @param  string $estadoRedireccionar [description]
         * @return [type]                      [description]
         */

        public static function updateGeneralStatus($id_table,$title,$switch_status,$id_call,$estado = "false",$tipo_msj = "error",$devuelve = "",$estadoRedireccionar = "false")
        {
            self::$file_error = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            //NO ES NECESARIO VALIDAR $switch_status YA QUE SU VALOR PUEDE SER 0
            if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($id_table))) && !empty(intval(trim($id_call))) && !empty($title))
            {
                self::$sqlCall = ConectorDB::showProcedureUpdateGeneralStatus($id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Error 1"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }else{
                        //CREAR OBJETO
                        $ob_conectar    = new conectorDB();

                        $consulta       = "CALL ".self::$sqlCall."(:id_table,:s_table)";
                        $valores        = array('id_table'  => $id_table,
                                                's_table'   => $switch_status);

                        $resultado      = $ob_conectar->consultarBD($consulta,$valores);

                        foreach($resultado as &$atributo)
                        {
                            if($atributo['ERRNO'] == 1)
                            {
                                $valor = array("estado" => "false",
                                               "error"  => $lang_error["Error 11"]);
                                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                exit();
                            }else{
                                    self::$file_help = dirname(__DIR__).'../../helps/help.php';
                                    require_once(self::$file_help);

                                    self::$file_record = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("record");
                                    require_once(self::$file_record);

                                    if($switch_status == 0)
                                    {
                                        self::$sqlActive = replaceStringOneParameterArray("/PARA1/",$lang_error["Desactivo"],$lang_error["Error 24"]);
                                    }else{
                                        self::$sqlActive = replaceStringOneParameterArray("/PARA1/",$lang_error["Activo"],$lang_error["Error 24"]);
                                         }

                                    switch ($id_call) {
                                        case 15://Productos
                                            switch ($atributo['ERRNO']) {
                                                case 2://NO TIENE CATEGORIA ASOCIADA
                                                    $devuelve   = $lang_error["Para activar el producto es necesario tener una categoría asociada"];
                                                    break;
                                                case 3://NO TIENE IMAGEN REGISTRADA
                                                    $devuelve   = $lang_error["Para activar el producto es necesario tener una imagen (portada o presentación) registrada"];
                                                    break;
                                                case 4://CORRECTO
                                                    $estado                 = "true";
                                                    $tipo_msj               = "title";
                                                    $devuelve               = "Estatus";
                                                    $estadoRedireccionar    = "true";

                                                    ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));
                                                    break;
                                                default://EL ID NO EXISTE
                                                    $devuelve           = $lang_error["Error 11"];
                                                    break;
                                            }
                                        break;
                                        case 20://Blogs
                                            switch ($atributo['ERRNO']) {
                                                case 2://NO TIENE IMAGEN REGISTRADA
                                                    $devuelve           = $lang_error["Para activar el blog es necesario tener una imagen (portada) registrada"];
                                                    break;
                                                case 3://NO TIENE IMAGEN REGISTRADA
                                                    $estado                 = "true";
                                                    $tipo_msj               = "title";
                                                    $devuelve               = "Estatus";
                                                    $estadoRedireccionar    = "true";

                                                    ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));
                                                    break;
                                                default://EL ID NO EXISTE
                                                    $devuelve               = $lang_error["Error 11"];
                                                    break;
                                            }
                                        break;
                                        default://GENERAL
                                            $estado                 = "true";
                                            $tipo_msj               = "title";
                                            $devuelve               = "Estatus";
                                            $estadoRedireccionar    = "true";

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));
                                        break;
                                    }

                                    $valor = array("estado"         => $estado,
                                                   $tipo_msj        => $devuelve,
                                                   "content"        => $lang_error["modificado"],
                                                   "redireccionar"  => $estadoRedireccionar);
                                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                    exit();
                                 }
                        }//END foreach
                     }
            }
        }

        /**
         * [showProcedureUpdateGeneralStatus description]
         *
         * @param  [type] $type_call [description]
         * @return [type]            [description]
         */

        private static function showProcedureUpdateGeneralStatus($id_call)
        {
            if(!empty(intval(trim($id_call)))){
                switch ($id_call)
                {
                    case 1://Usuarios
                        return "updateUserStatus";
                        break;
                    case 2://Perfiles
                        return "updateProfileStatus";
                        break;
                    case 3://Permisos
                        return "updatePermissionsStatus";
                        break;
                    case 4://Mi perfil
                        return "updateMyProfileStatus";
                        break;
                    case 5://Redes sociales
                        return "updateUserSocialNetworkStatus";
                        break;
                    case 6://Sliders
                        return "updateImageStatus";
                        break;
                    case 7://Summernote
                        break;
                    case 8://Archivos adjuntos
                        break;
                    case 9://Testimoniales
                        break;
                    case 10://Categorías
                        return "updateCategoryStatus";
                        break;
                    case 15://Productos
                        return "updateProductStatus";
                        break;
                    case 20://Blogs
                        return "updateBlogStatus";
                        break;
                    case 23://Atributos
                        return "updateAttributeStatus";
                        break;
                    case 24://Promociones
                        return "updatePromotionStatus";
                        break;
                    default:
                        return FALSE;
                    break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [updateStatusInternalSections description]
         *
         * @param  [type] $id_table        [description]
         * @param  [type] $title           [description]
         * @param  [type] $switch_status   [description]
         * @param  [type] $id_type_section [description]
         * @param  [type] $id_call         [description]
         * @param  string $estado          [description]
         * @param  string $tipo_msj        [description]
         * @param  string $devuelve        [description]
         * @return [type]                  [description]
         */

        public static function updateStatusInternalSections($id_table,$title,$switch_status,$id_type_section,$id_call,$estado = "false",$tipo_msj = "error",$devuelve = "")
        {
            self::$file_error = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($_SESSION['id_role_dao']))) && !empty(intval(trim($id_table))) && !empty(intval(trim($id_type_section))) && !empty(intval(trim($id_call))) && !empty($_SESSION['name_user_dao']) && !empty($_SESSION['email_user_dao']) && !empty($title))
            {
                self::$sqlCall  = ConectorDB::showProcedureUpdateStatusInternalSections($id_type_section,$id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Error 1"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }else{
                        //CREAR OBJETO
                        $ob_conectar    = new conectorDB();

                        $consulta       = "CALL ".self::$sqlCall."(:id_table,:s_table)";
                        $valores        = array('id_table'  => $id_table,
                                                's_table'   => $switch_status);

                        $resultado      = $ob_conectar->consultarBD($consulta,$valores);

                        foreach($resultado as &$atributo)
                        {
                            if($atributo['ERRNO'] == 1)
                            {
                                $valor = array("estado" => "false",
                                               "error"  => $lang_error["Error 11"]);
                                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                exit();
                            }else{
                                    self::$file_help = dirname(__DIR__).'../../helps/help.php';
                                    require_once(self::$file_help);

                                    self::$file_record = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("record");
                                    require_once(self::$file_record);

                                    //$id_internal_sections
                                        //4 = Perfil de usuario
                                            //14 = Galería
                                        //15 = Productos
                                            //1 = Stripe
                                            //2 = Informacion adicional
                                            //3 = Promocion s_product_lang_promotion
                                            //4 = Promocion s_visible_product_lang_promotion

                                    switch ($id_type_section) {
                                        case 15://Productos
                                            if($id_call == 3 || $id_call == 4){
                                                $id_product             = intval(trim($atributo['id_product']));
                                                $title_product_lang     = $atributo['title_product_lang'];

                                                if(!empty($id_product) && !empty($title_product_lang)){
                                                    self::$file_global = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("global");
                                                    require_once(self::$file_global);

                                                    //id_role
                                                        //1 = Súper Administrador
                                                        //2 = Administrador
                                                        //3 = Usuario
                                                        //4 = Vendedora
                                                        //5 = Diseñador
                                                        //6 = Chef

                                                    //MANDAR CORREO SIEMPRE Y CUANDO EL ROL SEA DE USUARIO Y LA PROMOCION SE ACTIVE
                                                    if($_SESSION['id_role_dao'] == 3 && $switch_status == 1){
                                                        try {
                                                                ob_start();
                                                                require_once(dirname(__DIR__).'/../class/phpmailer/dominio.php');
                                                                ob_clean();

                                                                //DE:
                                                                $mail->setFrom($_SESSION['email_user_dao'],ucwords(strtolower($_SESSION['name_user_dao'])));
                                                                //AGREGAR RESPUESTA A:
                                                                $mail->addReplyTo($_SESSION['email_user_dao'],ucwords(strtolower($_SESSION['name_user_dao'])));
                                                                //PARA:
                                                                $mail->addAddress($mail_receptor,stripslashes($name_mail_receptor));
                                                                //$mail->addCC('');
                                                                //$mail->addBCC('');
                                                                //ASUNTO
                                                                $mail->Subject = $_SESSION['email_user_dao'].' '.$lang_record["solicita activar promoción del producto"].' '.$title_product_lang;
                                                                //CUERPO DEL MENSAJE
                                                                require_once(dirname(__DIR__).'/../class/phpmailer/bodyActivateProductPromotion.php');

                                                                $mail->MsgHTML($bodyActivateProductPromotion);

                                                                if(!$mail->send()) {
                                                                    $error_mail1 = $mail->ErrorInfo;
                                                                    $mail->getSMTPInstance()->reset();
                                                                }
                                                                //BORRAR CONTENEDORES
                                                                $mail->clearCustomHeaders();
                                                                $mail->clearAllRecipients();
                                                                $mail->clearAddresses();
                                                                $mail->smtpClose();
                                                            }catch(Exception $e){
                                                                //Pretty error messages from PHPMailer
                                                                $valor = array("estado" => "false",
                                                                               "error"  => $lang_error['Error en el proceso'].$e->errorMessage());
                                                                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                                                exit();
                                                            }catch(\Exception $e){
                                                                //The leading slash means the Global PHP Exception class will be caught
                                                                $valor = array("estado" => "false",
                                                                               "error"  => $lang_error['Error en el proceso'].$e->getMessage());
                                                                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                                                exit();
                                                            }
                                                    }
                                                }
                                            }
                                        break;
                                        default:
                                        break;
                                    }

                                    if($switch_status == 0)
                                    {
                                        self::$sqlActive = replaceStringOneParameterArray("/PARA1/",$lang_error["Desactivo"],$lang_error["Error 24"]);
                                    }else{
                                        self::$sqlActive = replaceStringOneParameterArray("/PARA1/",$lang_error["Activo"],$lang_error["Error 24"]);
                                         }

                                    ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                    $valor = array("estado"     => "true",
                                                   "title"      => "Estatus",
                                                   "content"    => $lang_error["modificado"],
                                                   "pagina"     => $lang_error["modificado"]);
                                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                    exit();
                                 }//END f($atributo['ERRNO'] == 1)
                        }//END foreach($resultado as $atributo)
                     }
            }
        }

        /**
         * [showProcedureUpdateStatusInternalSections description]
         *
         * @param  [type] $id_type_section [description]
         * @param  [type] $id_call         [description]
         * @return [type]                  [description]
         */

        private static function showProcedureUpdateStatusInternalSections($id_type_section,$id_call)
        {
            if(!empty(intval(trim($id_type_section))) && !empty(intval(trim($id_call)))){
                switch ($id_type_section) {
                    case 4://Perfil de usuario
                        switch ($id_call)
                        {
                            case 14://Galería
                                return "updateImageStatus";
                                break;
                            default:
                                return FALSE;
                            break;
                        }
                        break;
                    case 15://Productos
                        switch ($id_call)
                        {
                            case 1://Stripe
                                break;
                            case 2://Información adicional
                                return "updateStatusProductAdditionalInformation";
                                break;
                            case 3://Promocion s_product_lang_promotion
                                return "updateStatusProductPromotions";
                                break;
                            case 4://Promocion s_visible_product_lang_promotion
                                return "updateStatusVisibleProductPromotions";
                                break;
                            default:
                                return FALSE;
                            break;
                        }
                        break;
                    default:
                        return FALSE;
                        break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [updateGeneralOrder description]
         *
         * @param  [type]  $id_call  [description]
         * @param  [type]  $position [description]
         * @param  integer $x        [description]
         * @return [type]            [description]
         */

        public static function updateGeneralOrder($id_call,$position,$x = 1)
        {
            self::$file_error = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            if(!empty(intval(trim($id_call))))
            {
                self::$sqlCall = ConectorDB::showProcedureUpdateGeneralOrder($id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Error 1"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }else{
                        self::$file_help    = dirname(__DIR__).'../../helps/help.php';
                        require_once(self::$file_help);

                        //CREAR OBJETO
                        $ob_conectar        = new conectorDB();

                        foreach($position as $readbleArray => $row)
                        {
                            self::$sqlOrder = "CALL ".self::$sqlCall."(:id_table,:sort_table)";
                            $valores        = array('id_table'     => $row,
                                                    'sort_table'   => $x);
                            $ob_conectar->consultarBD(self::$sqlOrder,$valores);

                            $x++;
                        }

                        $valor = array("estado"     => "true",
                                       "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Orden"],"/PARA2/",$lang_error["modificado"],$lang_error["Error 9"]));
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                     }
            }else{
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Variables vacías"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                 }
        }

        /**
         * [showProcedureUpdateGeneralOrder description]
         *
         * @param  [type] $type_call [description]
         * @return [type]            [description]
         */

        private static function showProcedureUpdateGeneralOrder($id_call)
        {
            if(!empty(intval(trim($id_call)))){
                switch ($id_call)
                {
                    case 1://Usuarios
                        return "updateUserOrder";
                        break;
                    case 2://Perfiles
                        return "updateProfileOrder";
                        break;
                    case 3://Permisos
                        return "updatePermissionsOrder";
                        break;
                    case 4://Mi perfil
                        return "updateMyProfileOrder";
                        break;
                    case 5://Redes sociales
                        return "updateUserSocialNetworkOrder";
                        break;
                    case 6://Sliders
                        return "updateImageOrder";
                        break;
                    case 7://Summernote
                        return FALSE;
                        break;
                    case 8://Archivos adjuntos
                        return FALSE;
                        break;
                    case 9://Testimoniales
                        return FALSE;
                        break;
                    case 10://Categorías
                        return "updateCategoryOrder";
                        break;
                    case 15://Productos
                        return "updateProductOrder";
                        break;
                    case 20://Blogs
                        return "updateBlogOrder";
                        break;
                    case 23://Atributos
                        return "updateAttributeOrder";
                        break;
                    case 24://Promociones
                        return "updatePromotionOrder";
                        break;
                    default:
                        return FALSE;
                    break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [updateOrderInternalSections description]
         *
         * @param  [type]  $position        [description]
         * @param  [type]  $id_type_section [description]
         * @param  [type]  $id_call         [description]
         * @param  integer $x               [description]
         * @return [type]                   [description]
         */

        public static function updateOrderInternalSections($position,$id_type_section,$id_call,$x = 1)
        {
            self::$file_error = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            if(!empty(intval(trim($id_type_section))) && !empty(intval(trim($id_call))))
            {
                self::$sqlCall  = ConectorDB::showProcedureUpdateOrderInternalSections($id_type_section,$id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Error 1"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }else{
                        self::$file_help = dirname(__DIR__).'../../helps/help.php';
                        require_once(self::$file_help);

                        //CREAR OBJETO
                        $ob_conectar     = new conectorDB();

                        foreach($position as $readbleArray => $row)
                        {
                            self::$sqlOrder = "CALL ".self::$sqlCall."(:id_table,:sort_table)";
                            $valores        = array('id_table'     => $row,
                                                    'sort_table'   => $x);

                            $ob_conectar->consultarBD(self::$sqlOrder,$valores);

                            $x++;
                        }

                        $valor = array("estado"     => "true",
                                       "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Orden"],"/PARA2/",$lang_error["modificado"],$lang_error["Error 9"]));
                        return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                     }
            }else{
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Variables vacías"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                 }
        }

        /**
         * [showProcedureUpdateOrderInternalSections description]
         *
         * @param  [type] $id_type_section [description]
         * @param  [type] $id_call         [description]
         * @return [type]                  [description]
         */

        private static function showProcedureUpdateOrderInternalSections($id_type_section,$id_call)
        {
            if(!empty(intval(trim($id_type_section))) && !empty(intval(trim($id_call)))){
                switch ($id_type_section) {
                    case 4://Perfil usuario
                        switch ($id_call)
                        {
                            case 14://Galería usuario
                                return "updateImageOrder";
                                break;
                            default:
                                return FALSE;
                            break;
                        }
                        break;
                    case 15://Productos
                        switch ($id_call)
                        {
                            case 1://Stripe
                                return "updateProductStripeOrder";
                                break;
                            case 2://Información adicional
                                return "updateProductAdditionalInformationOrder";
                                break;
                            case 3://Productos relaciones
                                return "updateProductPartnerOrder";
                                break;
                            case 4://Imagenes de portada y generales
                                return "updateImageOrder";
                                break;
                            case 5://Promociones
                                return "updateProductPromotionsOrder";
                                break;
                            default:
                                return FALSE;
                            break;
                        }
                        break;
                    case 20://Blog
                        switch ($id_call)
                        {
                            case 4://Imagenes de portada y generales
                                return "updateImageOrder";
                                break;
                            default:
                                return FALSE;
                            break;
                        }
                        break;
                    default:
                        return FALSE;
                    break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [removeGeneral description]
         *
         * @param  [type] $id_table [description]
         * @param  [type] $title    [description]
         * @param  [type] $id_call  [description]
         * @return [type]           [description]
         */

        public static function removeGeneral($id_table,$title,$id_call)
        {
            self::$file_error   = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($id_table))) && !empty(intval(trim($id_call))) && !empty($title))
            {
                //CREAR OBJETO
                $ob_conectar    = new conectorDB();

                self::$sqlCall  = $ob_conectar->showProcedureDeleteGeneral($id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Error 1"].'(2)');
                }else{
                        self::$file_record  = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("record");
                        require_once(self::$file_record);

                        self::$file_help = dirname(__DIR__).'../../helps/help.php';
                        require_once(self::$file_help);

                        $consulta   = "CALL ".self::$sqlCall."(:id_table)";
                        $valores    = array('id_table' => $id_table);

                        $resultado  = $ob_conectar->consultarBD($consulta,$valores);

                        foreach($resultado as &$atributo)
                        {
                            switch ($id_call) {
                                case 10://CATEGORIAS
                                    switch ($atributo['ERRNO'])
                                    {
                                        case 2://TIENE PRODUCTOS REGISTRADOS
                                            $valor = array("estado" => "false",
                                                           "error"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["la categoría"],"/PARA2/",$lang_error["tiene productos registrados"],$lang_error["Error 27"]));
                                        break;
                                        case 3://NO PUEDE ELIMINAR CATEGORIAS PRINCIPALES
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Las categorías principales no se pueden eliminar"]);
                                        break;
                                        case 4://TIENE BLOGS REGISTRADOS
                                            $valor = array("estado" => "false",
                                                           "error"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["la categoría"],"/PARA2/",$lang_error["tiene blogs registrados"],$lang_error["Error 27"]));
                                        break;
                                        case 5://CORRECTO
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                           $page = ConectorDB::returnPage($id_call);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"],$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        default://EL ID CATEGORIA NO EXISTE
                                            $valor = array("estado" => "false","error" => $lang_error["Error 1"].'(1)');
                                        break;
                                    }
                                break;
                                case 23://ATRIBUTOS
                                    switch ($atributo['ERRNO'])
                                    {
                                        case 2://TIENE PRODUCTOS REGISTRADOS
                                            $valor = array("estado" => "false",
                                                           "error"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["la categoría"],"/PARA2/",$lang_error["tiene productos registrados"],$lang_error["Error 27"]));
                                        break;
                                        case 3://NO PUEDE ELIMINAR ATRIBUTOS PRINCIPALES
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Los atributos principales no se pueden eliminar"]);
                                        break;
                                        case 4://CORRECTO
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                           $page = ConectorDB::returnPage($id_call);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"],$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        default://EL ID ATRIBUTO NO EXISTE
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 1"].'(1)');
                                        break;
                                    }
                                break;
                                default://GENERAL
                                    switch ($atributo['ERRNO'])
                                    {
                                        case 1:
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 11"]);
                                        break;
                                        case 2:
                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                            $page = ConectorDB::returnPage($id_call);

                                            $valor = array("estado"     => "true",
                                                           "item"       => $id_table,
                                                           "resultado"  => replaceStringTwoParametersArray("/PARA1/",$lang_error["Elimino"],"/PARA2/",$lang_error["Elemento"],$lang_error["Error 9"]),
                                                           "pagina"     => $page);
                                        break;
                                        default:
                                            $valor = array("estado" => "false",
                                                           "error"  => $lang_error["Error 1"].'(1)');
                                        break;
                                    }
                                break;
                            }
                        }
                     }
            }else{
                    $valor = array("estado" => "false",
                                   "error"  => $lang_error["Variables vacías"]);
                 }

            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
            exit();
        }

        /**
         * [showProcedureDeleteGeneral description]
         *
         * @param  [type] $id_call [description]
         * @return [type]          [description]
         */

        private static function showProcedureDeleteGeneral($id_call)
        {
            if(!empty(intval(trim($id_call)))){
                switch ($id_call)
                {
                    case 1://Usuarios
                        return "deleteUser";
                        break;
                    case 2://Perfiles
                        return "deleteProfile";
                        break;
                    case 3://Permisos
                        return "deletePermissions";
                        break;
                    case 4://Mi perfil
                        return "deleteMyProfile";
                        break;
                    case 5://Redes sociales
                        return "deleteSocialNetwork";
                        break;
                    case 6://Sliders
                        return "deleteImage";
                        break;
                    case 10://Categorías
                        return "deleteCategory";
                        break;
                    case 15://Productos
                        return "deleteProduct";
                        break;
                    case 20://Blogs
                        return "deleteBlog";
                        break;
                    case 23://Atributos
                        return "deleteAttribute";
                        break;
                    case 24://Promociones
                        return "deletePromotion";
                        break;
                    case 25://Formularios
                        return "deleteForm";
                        break;
                    default:
                        return FALSE;
                        break;
                }
            }else{
                    return FALSE;
                 }
        }

        /**
         * [returnPage description]
         *
         * @param  [type] $id_page [description]
         * @return [type]          [description]
         */

        public static function returnPage($id_page)
        {
            switch ($id_page)
            {
                case 1://Usuarios
                    $page = "configurations-users";
                    return $page;
                break;
                case 2://Perfiles
                    $page = "configurations-profiles";
                    return $page;
                break;
                case 3://Permisos
                    $page = "configurations-permissions";
                    return $page;
                break;
                case 4://Mi perfil
                    $page = "my-profile";
                    return $page;
                break;
                case 5://Redes sociales
                    $page = "configurations-users";
                    return $page;
                break;
                case 6://Sliders
                    $page = "design-slider";
                    return $page;
                break;
                case 7://Summernote
                    $page = "main";
                    return $page;
                break;
                case 8://Archivos adjuntos
                    $page = "main";
                    return $page;
                break;
                case 9://Testimoniales
                    $page = "main";
                    return $page;
                break;
                case 10://Categorías
                    $page = "catalogue-category";
                    return $page;
                break;
                case 12://Códigos promocionales
                    $page = "main";
                    return $page;
                break;
                case 13://Menús
                    $page = "main";
                    return $page;
                break;
                case 14://Galerías
                    $page = "main";
                    return $page;
                break;
                case 15://Productos
                    $page = "catalogue-product";
                    return $page;
                break;
                case 20://Blogs
                    $page = "pages-blog";
                    return $page;
                break;
                case 21://Carrusel
                    $page = "design-carousel";
                    return $page;
                break;
                case 23://Atributos
                    $page = "catalogue-attribute";
                    return $page;
                break;
                case 24://Promociones
                    return "catalogue-promotion";
                break;
                case 25://Formularios
                    return "forms-yard";
                break;
                default:
                    $page = "main";
                    return $page;
                    break;
            }
        }

        /**
         * [updateGeneralStatusVisible description]
         *
         * @param  [type] $id_table              [description]
         * @param  [type] $title                 [description]
         * @param  [type] $switch_status_visible [description]
         * @param  [type] $id_call               [description]
         * @param  string $estado                [description]
         * @param  string $tipo_msj              [description]
         * @param  string $devuelve              [description]
         * @return [type]                        [description]
         */

        public static function updateGeneralStatusVisible($id_table,$title,$switch_status_visible,$id_call,$estado = "false",$tipo_msj = "error",$devuelve = "")
        {
            self::$file_error = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("error");
            require_once(self::$file_error);

            if(!empty(intval(trim($_SESSION['id_user_dao']))) && !empty(intval(trim($id_table))) && !empty(intval(trim($id_call))) && !empty($title))
            {
                self::$sqlCall = ConectorDB::showProcedureUpdateGeneralStatusVisible($id_call);

                if(self::$sqlCall == FALSE)
                {
                    $valor = array("estado" => "false","error" => $lang_error["Error 1"]);
                    return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                    exit();
                }else{
                        self::$file_help = dirname(__DIR__).'../../helps/help.php';
                        require_once(self::$file_help);

                        self::$file_record = dirname(__DIR__).'../../../languages/'.langController::prefixLangDefault("record");
                        require_once(self::$file_record);

                        //CREAR OBJETO
                        $ob_conectar    = new conectorDB();

                        $consulta       = "CALL ".self::$sqlCall."(".$id_table.",".$switch_status_visible.")";
                        $resultado      = $ob_conectar->consultarBD($consulta);

                        foreach($resultado as $atributo)
                        {
                            if($atributo['ERRNO'] == 1)
                            {
                                $valor = array("estado" => "false","error" => $lang_error["Error 11"]);
                                return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                exit();
                            }else{
                                    if($switch_status_visible == 0)
                                    {
                                        self::$sqlActive = replaceStringOneParameterArray("/PARA1/",$lang_error["Desactivo"],$lang_error["Error 24"]);
                                    }else{
                                            self::$sqlActive = replaceStringOneParameterArray("/PARA1/",$lang_error["Activo"],$lang_error["Error 24"]);
                                         }

                                    switch ($id_call) {
                                        case 15://Productos
                                            switch ($atributo['ERRNO']) {
                                                case 1://ID_P NO EXISTE
                                                    $devuelve           = $lang_error["Error 11"];
                                                    break;
                                                case 2://NO TIENE CATEGORIA ASOCIADA
                                                    $devuelve           = $lang_error["Para activar el producto es necesario tener una categoría asociada"];
                                                    break;
                                                case 3://NO TIENE IMAGEN REGISTRADA
                                                    $devuelve           = $lang_error["Para activar el producto es necesario tener una imagen (portada o presentación) registrada"];
                                                    break;
                                                default://CORRECTO
                                                    $estado             = "true";
                                                    $tipo_msj           = "title";
                                                    $devuelve           = "Estatus";

                                                    ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));
                                                    break;
                                            }

                                            $valor = array("estado" => $estado, $tipo_msj => $devuelve, "content" => $lang_error["modificado"]);
                                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                            exit();
                                        break;
                                        case 20://Blogs
                                            switch ($atributo['ERRNO']) {
                                                case 1://EL ID NO EXISTE
                                                    $devuelve           = $lang_error["Error 11"];
                                                    break;
                                                 case 2://NO TIENE CATEGORIA ASOCIADA
                                                    $devuelve           = $lang_error["Para activarlo es necesario tener una categoría asociada"];
                                                    break;
                                                case 3://NO TIENE IMAGEN REGISTRADA
                                                    $devuelve           = $lang_error["Para activarlo es necesario tener una imagen (portada) registrada"];
                                                    break;
                                                default:
                                                    $estado          = "true";
                                                    $tipo_msj        = "title";
                                                    $devuelve        = "Estatus";

                                                    ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));
                                                    break;
                                            }

                                            $valor = array("estado" => $estado, $tipo_msj => $devuelve, "content" => $lang_error["modificado"]);
                                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                            exit();
                                        break;
                                        default://EL RESTO DE LAS SECCIONES
                                            $estado                 = "true";
                                            $tipo_msj               = "title";
                                            $devuelve               = "Estatus";

                                            ConectorDB::registerRecordOneParameter($_SESSION['id_user_dao'],$id_table,replaceStringTwoParametersArray("/PARA1/",self::$sqlActive,"/PARA2/",stripslashes($title),$lang_record["Historial 3"]));

                                            $valor = array("estado" => $estado, $tipo_msj => $devuelve, "content" => $lang_error["modificado"]);
                                            return print(json_encode($valor, JSON_UNESCAPED_UNICODE));
                                            exit();
                                        break;
                                    }
                                 }//END f($atributo['ERRNO'] == 1)
                        }//END foreach($resultado as $atributo)
                     }
            }
        }

        /**
         * [showProcedureUpdateGeneralStatusVisible description]
         *
         * @param  [type] $id_call [description]
         * @return [type]          [description]
         */

        private static function showProcedureUpdateGeneralStatusVisible($id_call)
        {
            if(!empty(intval(trim($id_call)))){
                switch ($id_call)
                {
                    case 15://Productos
                        return "updateProductStatusVisibleHome";
                        break;
                    default:
                        return FALSE;
                    break;
                }
            }else{
                    return FALSE;
                 }
        }
    }