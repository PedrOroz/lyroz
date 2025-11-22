<?php
    /**
     * [generateToken description]
     *
     * @return [type] [description]
     */
    function generateToken()
    {
        return md5(uniqid(mt_rand(), false));
    }

	/**
     * [replaceStringOneParameterArray description]
     *
     * @param  [type] $para1 [description]
     * @param  [type] $val1  [description]
     * @param  [type] $array [description]
     * @return [type]        [description]
     */

    function replaceStringOneParameterArray($para1,$val1,$array)
    {
        if(!empty($para1) && !empty($val1) && !empty($array))
        {
            return preg_replace($para1, $val1, $array);
        }
    }

    /**
     * [replaceStringTwoParametersArray description]
     *
     * @param  [type] $para1 [description]
     * @param  [type] $val1  [description]
     * @param  [type] $para2 [description]
     * @param  [type] $val2  [description]
     * @param  [type] $array [description]
     * @return [type]        [description]
     */

    function replaceStringTwoParametersArray($para1,$val1,$para2,$val2,$array)
    {
        if(!empty($para1) && !empty($val1) && !empty($para2) && !empty($val2) && !empty($array))
        {
            $patrones           = array();
            $patrones[0]        = $para1;
            $patrones[1]        = $para2;

            $sustituciones      = array();
            $sustituciones[2]   = $val1;
            $sustituciones[1]   = $val2;

            return preg_replace($patrones, $sustituciones, $array);
        }
    }

    /**
     * [replaceStringThreeParametersArray description]
     *
     * @param  [type] $para1 [description]
     * @param  [type] $val1  [description]
     * @param  [type] $para2 [description]
     * @param  [type] $val2  [description]
     * @param  [type] $para3 [description]
     * @param  [type] $val3  [description]
     * @param  [type] $array [description]
     * @return [type]        [description]
     */

    function replaceStringThreeParametersArray($para1,$val1,$para2,$val2,$para3,$val3,$array)
    {
        if(!empty($para1) && !empty($val1) && !empty($para2) && !empty($val2) && !empty($para3) && !empty($val3) && !empty($array))
        {
            $patrones           = array();
            $patrones[0]        = $para1;
            $patrones[1]        = $para2;
            $patrones[2]        = $para3;

            $sustituciones      = array();
            $sustituciones[2]   = $val1;
            $sustituciones[1]   = $val2;
            $sustituciones[0]   = $val3;

            return preg_replace($patrones, $sustituciones, $array);
        }
    }

    /**
     * [replaceStringFourParametersArray description]
     *
     * @param  [type] $para1 [description]
     * @param  [type] $val1  [description]
     * @param  [type] $para2 [description]
     * @param  [type] $val2  [description]
     * @param  [type] $para3 [description]
     * @param  [type] $val3  [description]
     * @param  [type] $para4 [description]
     * @param  [type] $val4  [description]
     * @param  [type] $array [description]
     * @return [type]        [description]
     */

    function replaceStringFourParametersArray($para1,$val1,$para2,$val2,$para3,$val3,$para4,$val4,$array)
    {
        if(!empty($para1) && !empty($val1) && !empty($para2) && !empty($val2) && !empty($para3) && !empty($val3) && !empty($para4) && !empty($val4) && !empty($array))
        {
            $patrones           = array();
            $patrones[0]        = $para1;
            $patrones[1]        = $para2;
            $patrones[2]        = $para3;
            $patrones[3]        = $para4;

            $sustituciones      = array();
            $sustituciones[3]   = $val1;
            $sustituciones[2]   = $val2;
            $sustituciones[1]   = $val3;
            $sustituciones[0]   = $val4;

            return preg_replace($patrones, $sustituciones, $array);
        }
    }

    /**
     * [str_replace_string description]
     *
     * @param  [type] $search  [description]
     * @param  [type] $replace [description]
     * @param  [type] $subject [description]
     * @return [type]          [description]
     */

    function str_replace_string($search, $replace, $subject)
    {
        //$replace puede venir vacio
        if(!empty($search) && !empty($subject)){
            return str_replace($search, $replace, $subject);
        }
    }

    /**
     * [limitar_cadena description]
     *
     * @param  [type] $cadena [description]
     * @param  [type] $limite [description]
     * @param  [type] $sufijo [description]
     * @return [type]         [description]
     */

    function limitar_cadena($cadena, $limite, $sufijo){
        // Si la longitud es mayor que el límite...
        if(strlen($cadena) > $limite){
            // Entonces corta la cadena y ponle el sufijo
            return substr($cadena, 0, $limite) . $sufijo;
        }

        // Si no, entonces devuelve la cadena normal
        return $cadena;
    }

    /**
     * [removeAccents description]
     *
     * @param  [type] $string [description]
     * @return [type]         [description]
     */

    function removeAccents($string) {
        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        return $string;
    }

    /**
     * [removeSpecialCharacters description]
     *
     * @param  [type] $string [description]
     * @return [type]         [description]
     */

    function removeSpecialCharacters($string) {
        $string = trim($string);

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
                 "#", "@", "|", "!", "\"",
                 "·", "$", "%", "&", "/",
                 "(", ")", "?", "'", "¡",
                 "¿", "[", "^", "`", "]",
                 "+", "}", "{", "¨", "´",
                 ">", "< ", ";", ",", ":",
                 ".", " ", "="),
            '',
            $string
        );

        return $string;
    }

    /**
     * [removeCharacters description]
     *
     * @param  [type] $string [description]
     * @return [type]         [description]
     */

    function removeCharacters($string) {
        $string = trim($string);

        $string = str_replace(
            array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä'),
            array('á', 'a', 'a', 'a', 'Á', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('è', 'ë', 'ê', 'È', 'Ê', 'Ë'),
            array('é', 'e', 'e', 'É', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('ì', 'ï', 'î', 'Ì', 'Ï', 'Î'),
            array('í', 'i', 'i', 'Í', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô'),
            array('ó', 'o', 'o', 'Ó', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ù', 'ü', 'û', 'Ù', 'Û', 'Ü'),
            array('ú', 'u', 'u', 'Ú', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
                 "#", "@", "|", "!", "\"",
                 "·", "$", "%", "&", "/",
                 "(", ")", "?", "'", "¡",
                 "¿", "[", "^", "`", "]",
                 "+", "}", "{", "¨", "´",
                 ">", "< ", ";", ",", ":",
                 ".", "="),
            '',
            $string
        );


        return $string;
    }

    /**
     * [generar_contrasena description]
     *
     * @param  [type] $limite [description]
     * @return [type]         [description]
     */

    function generar_contrasena($limite){
        $comb       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass       = array();
        $combLen    = strlen($comb) - 1;

        for ($i = 0; $i < $limite; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        return implode($pass);
    }

    /**
     * [modalWithZoomAnim description]
     *
     * @return [type] [description]
     */

    function modalWithZoomAnim()
    {
  echo("$(document).on('click', '.modal-with-zoom-anim', function (e) {
            e.preventDefault();
            $.magnificPopup.open({
                items: {
                    src: $(this).attr('href')
                },
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in',
                modal: true
            });
        });
        $(document).on('click', '.modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });");
    }

    /**
     * [imagePopupNoMargins description]
     *
     * @return [type] [description]
     */

    function imagePopupNoMargins()
    {
  echo("$('.image-popup-no-margins').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });");
    }

    /**
     * [progressBar description]
     *
     * @return [type] [description]
     */

    function progressBar()
    {
      echo('function showProgressBar(r,s){$(s+" .box-progress").css("display","block"),$(s+" .box-progress .progress .progress-bar").css("width",+r+"%"),$(s+" .box-progress .progress .progress-bar").attr("aria-valuenow",r),$(s+" .box-progress .progress .progress-bar").text(r+"%")}
            function clearProgressBar(r){$(r+" .box-progress").css("display","none"),$(r+" .progress .progress-bar").css("width","0%"),$(r+" .progress .progress-bar").attr("aria-valuenow",0),$(r+" .progress .progress-bar").text("")}');
    }

    /**
     * [validate description]
     *
     * @param  [type] $id_or_class [description]
     * @return [type]              [description]
     */

    function validate($id_or_class)
    {
        if(!empty($id_or_class))
        {
        echo('$("'.$id_or_class.'").validate({highlight:function(s){$(s).closest(".form-group").removeClass("has-success").addClass("has-error")},success:function(s){$(s).closest(".form-group").removeClass("has-error"),s.remove()},errorPlacement:function(s,e){var r=e.closest(".input-group");r.get(0)||(r=e),""!==s.text()&&r.after(s)}});');
        }
    }

    /**
     * [summernoteSaveFiles description]
     *
     * @param  [type] $height            [description]
     * @param  [type] $url_carpeta_admin [description]
     * @return [type]                    [description]
     */

    function summernoteSaveFiles($height,$url_carpeta_admin)
    {
  echo('$(".summernote").summernote({
            height: '.$height.',
            minHeight: null,
            maxHeight: null,
            blockquoteBreakingLevel: 0,
            styleTags: [
                \'span\',
                \'pre\',
                \'h1\',
                \'h2\',
                \'h3\',
                \'h4\',
                \'h5\',
                \'h6\'
            ],
            addDefaultFonts: false,
            callbacks: {
                onImageUpload: function(files) {
                    var $editor = $(this),
                        data    = new FormData();
                    data.append("file", files[0]);
                    $.ajax({
                        url: "'.$url_carpeta_admin.'/upl-summernote-image",
                        method: "POST",
                        data: data,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response)
                        {
                            if(response.estado == "false"){
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                     }
                            }else{
                                    $editor.summernote("insertImage", response);
                                 }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            new PNotify({
                                title: title_pnotify,
                                text: textStatus +" "+ errorThrown,
                                type: "error"
                            });
                        }
                    });
                }
            }
        });');
    }

    /**
     * [pluginIosSwitch description]
     *
     * @param  [type] $section       [description]
     * @param  [type] $id_table      [description]
     * @param  [type] $title_table   [description]
     * @param  [type] $s_table       [description]
     * @param  [type] $id_type_image [description]
     * @param  [type] $lang_titulo   [description]
     * @return [type]                [description]
     */

    function pluginIosSwitch($section,$id_table,$title_table,$s_table,$id_type_image,$lang_titulo)
    {
        if(!empty($section) && !empty(intval(trim($id_table))) && !empty($title_table) && !empty($lang_titulo))
        {

          echo('<div id="switch-'.$id_table.'" class="update-general-status switch switch-general switch-sm switch-success" data-bs-toggle="tooltip" title="'.$lang_titulo.'" data-update-general-status="'.$id_table.'/'.$title_table.'/'.($s_table == 1 ? 0 : 1) . '/'.$id_type_image.'">
                    <input type="checkbox" name="s_'.$section.'_'.$id_table.'" data-plugin-ios-switch'.($s_table == 1 ? ' checked="checked"' : '') . ' />
                </div>');
        }
    }

    /**
     * [formIosSwitch description]
     *
     * @param  [type] $url_carpeta_admin [description]
     * @return [type]                    [description]
     */

    function formIosSwitch($url_carpeta_admin)
    {
      echo('$(document).delegate(".switch-general", "click", function(e){
                e.preventDefault();
                var cadena      = $(this).attr("data-update-general-status"),
                    form_data   = new FormData();

                    form_data.append("par1", cadena.split("/")[0]);//id_table
                    form_data.append("par2", cadena.split("/")[1]);//title_table
                    form_data.append("par3", cadena.split("/")[2]);//s_table
                    form_data.append("par4", cadena.split("/")[3]);//id_type_image

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/upd-gnrl-sttus",
                    //TIPO DE ENVIO DE DATOS
                        //SERIALIZE()
                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                        //FORMDATA
                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                //processData: false,
                                //contentType: false,
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if(response.estado == "true"){
                            new PNotify({
                                title: response.title,
                                text: response.content,
                                type: "success",
                                delay: 800,
                                before_init: function()
                                {
                                },
                                before_close: function(PNotify){
                                    if(response.redireccionar == "true"){
                                        window.location.href = fullLink;
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "info"
                                        });
                                     }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
    }

    /**
     * [pluginIosSwitchInternalSections description]
     *
     * @param  [type] $section              [description]
     * @param  [type] $id_table             [description]
     * @param  [type] $title_table          [description]
     * @param  [type] $s_table              [description]
     * @param  [type] $id_type_image        [description]
     * @param  [type] $id_internal_sections [description]
     * @param  [type] $lang_titulo          [description]
     * @return [type]                       [description]
     */

    function pluginIosSwitchInternalSections($section,$id_table,$title_table,$s_table,$id_type_image,$id_internal_sections,$lang_titulo)
    {
        if(!empty($section) && !empty(intval(trim($id_table))) && !empty($title_table) && !empty($lang_titulo))
        {
  echo('<div id="switch-internal-sections-'.$id_table.'" class="update-status-internal-sections switch switch-internal-sections switch-sm switch-warning" data-bs-toggle="tooltip" data-bs-title="'.$lang_titulo.'" data-update-status-internal-sections="'.$id_table.'/'.$title_table.'/'.($s_table == 1 ? 0 : 1) . '/'.$id_type_image.'/'.$id_internal_sections.'">
        <input type="checkbox" name="s_internal_'.$section.'_'.$id_table.'" value="" data-plugin-ios-switch'.($s_table == 1 ? ' checked="checked"' : '') . ' />
        </div>');
        }
    }

    /**
     * [formIosSwitchInternalSections description]
     *
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $pagina            [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formIosSwitchInternalSections($url_carpeta_admin,$pagina,$redirect)
    {
      echo('$(document).delegate(".switch-internal-sections", "click", function(e){
                e.preventDefault();
                var cadena          = $(this).attr("data-update-status-internal-sections"),
                    redireccionar   = '.$redirect.',
                    form_data        = new FormData();

                    form_data.append("par1", cadena.split("/")[0]);//id_table
                    form_data.append("par2", cadena.split("/")[1]);//title_table
                    form_data.append("par3", cadena.split("/")[2]);//s_table
                    form_data.append("par4", cadena.split("/")[3]);//id_type_image
                    form_data.append("par5", cadena.split("/")[4]);//id_internal_sections

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/upd-sttus-intrnl-sctions",
                    //TIPO DE ENVIO DE DATOS
                        //SERIALIZE()
                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                        //FORMDATA
                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                //processData: false,
                                //contentType: false,
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if(response.estado == "true"){
                            new PNotify({
                                title: response.title,
                                text: response.content,
                                type: "success"
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "info"
                                        });
                                     }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
    }

    /**
     * [sortable description]
     *
     * @param  [type] $id_type_section   [description]
     * @param  [type] $url_carpeta_admin [description]
     * @return [type]                    [description]
     */

    function sortable($id_type_section,$url_carpeta_admin)
    {
  echo('$(".row_position").sortable({
            delay: 350,
            placeholder: "ui-state-highlight",
            cursor: "move",
            disabled: false,
            distance: 5,
            opacity: 0.5,
            stop: function() {
                var selectedData = new Array();
                $(".row_position>tr").each(function()
                {
                    selectedData.push($(this).attr("data-id"));
                });
                updateOrder(selectedData);
            }
        });
        function updateOrder(data){
            $.ajax({
                type: "POST",
                url:  "'.$url_carpeta_admin.'/upd-gnrl-oden/call-'.$id_type_section.'",
                data:{position:data},
                beforeSend:function(){
                },
                success:function(response){
                    if(response.estado == "true"){
                        new PNotify({
                            title: title_pnotify,
                            text: response.resultado,
                            type: "success"
                        });
                    }else{
                            if(response.sin_sesion == "true"){
                                window.location.href = url_front+"iniciar-sesion";
                            }else{
                                    new PNotify({
                                        title: title_pnotify,
                                        text: response.error,
                                        type: "error"
                                    });
                                 }
                         }
                },
                error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
            });
        }');
    }

    /**
     * [sortableInternalSections description]
     *
     * @param  [type] $id_type_section                 [description]
     * @param  [type] $name_sortable_internal_sections [description]
     * @param  [type] $id_sortable_internal_sections   [description]
     * @param  [type] $url_carpeta_admin               [description]
     * @param  [type] $type_sortable                   [description]
     * @return [type]                                  [description]
     */

    function sortableInternalSections($id_type_section,$name_sortable_internal_sections,$id_sortable_internal_sections,$url_carpeta_admin,$type_sortable)
    {
        if(!empty(intval(trim($id_type_section))) && !empty($name_sortable_internal_sections) && !empty(intval(trim($id_sortable_internal_sections))) && !empty($url_carpeta_admin) && !empty($type_sortable)){

 echo('$("'.$name_sortable_internal_sections.'").sortable({
                '.($type_sortable == 1 ? 'delay: 350,disabled: false,distance: 5,opacity: 0.5,' : '') . '
                cursor: "move",
                placeholder: "ui-state-highlight",
                stop: function(){
                    var selectedData = new Array();
                    $("'.$name_sortable_internal_sections.' >  '.($type_sortable == 1 ? 'tr' : 'li') . '").each(function(){
                        selectedData.push($(this).attr("data-id"));
                    });
                    updateOrder(selectedData);
                }
            });
            '.($type_sortable == 2 ? '$("'.$name_sortable_internal_sections.'").disableSelection();' : '') . '
            function updateOrder(data){
                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/upd-oden-intrnl-sctions/section-'.$id_type_section.'/call-'.$id_sortable_internal_sections.'",
                    data:{position:data},
                    beforeSend:function(){
                    },
                    success:function(response){
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success"
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                     }
                             }
                    },
                    error: function(jqXHR)
                        {
                            //console.log(jqXHR);

                            var msg = "";

                            if(jqXHR.status != 200){
                                if (jqXHR.status === 0) {
                                    msg = "No conectar. Verificar Red.";
                                } else if (jqXHR.status == 404) {
                                    msg = "Página solicitada no encontrada. [404].";
                                } else if (jqXHR.status == 500) {
                                    msg = "Error interno del servidor [500].";
                                } else {
                                    msg = "Error no detectado. " + jqXHR.responseText;
                                }
                                new PNotify({
                                    title: title_pnotify,
                                    text: msg,
                                    type: "error"
                                });
                            }
                        }
                });
            }');
        }
    }

    /**
     * [modalUploadImageVersion description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalUploadImageVersion($form_name)
    {
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_upload_image_version = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_upload_image_version + " form").attr("data-modal-upload-image-version","");
                //OBTENER DATOS DE FORMA DINAMICA
                //ID_IMAGE + ID_IMAGE_LANG + ID_LANG + TITLE_LANG
                var cadena      = $(this).attr("data-upload-image-version");
                //MOSTRAR DATOS
                $(modal_upload_image_version + " form").attr("data-modal-upload-image-version",cadena);
            });');
    }

    /**
     * [formuploadImageVersion description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $tab_id            [description]
     * @param  [type] $page              [description]
     * @param  [type] $id_type_section   [description]
     * @param  [type] $id_type_action    [description]
     * @param  [type] $redirect          [description]
     * @param  [type] $lang_global_1     [description]
     * @param  [type] $lang_global_2     [description]
     * @param  [type] $lang_global_3     [description]
     * @param  [type] $lang_global_4     [description]
     * @return [type]                    [description]
     */

    function formuploadImageVersion($title,$url_carpeta_admin,$form_id,$tab_id,$page,$id_type_section,$id_type_action,$redirect,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4)
    {
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($form_id) && !empty($tab_id) && !empty(intval(trim($id_type_section))) && !empty($lang_global_1) && !empty($lang_global_2) && !empty($lang_global_3) && !empty($lang_global_4))
        {
      echo('$(document).delegate("#'.$form_id.'", "submit", function(ev){
                ev.preventDefault();

                var redireccionar   = '.$redirect.';

                if($("#id_type_version").val() == "")
                {
                    new PNotify({
                        title: title_pnotify,
                        text: "'.$lang_global_1.'",
                        type: "info"
                    });
                }else{
                        if($("#fileInputUploadVersion").val().length < 5)
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: "'.$lang_global_2.'",
                                type: "info"
                            });
                        }else{
                                var archivo     = $("#fileInputUploadVersion").val();
                                var extensiones = archivo.substring(archivo.lastIndexOf("."));

                                if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png" && extensiones != ".svg")
                                {
                                    new PNotify({
                                        title: title_pnotify,
                                        text: "'.$lang_global_3.'",
                                        type: "info"
                                    });
                                }else{
                                    var id_tab      = "'.$tab_id.'",
                                        id_form     = "'.$form_id.'",
                                        cadena      = $(this).attr("data-modal-upload-image-version"),
                                        par4        = cadena.split("/")[0],//ID_IMAGE
                                        par5        = cadena.split("/")[1],//ID_IMAGE_LANG
                                        par6        = cadena.split("/")[2],//ID_LANG
                                        par7        = cadena.split("/")[3],//TITLE
                                        par8        = '.$id_type_section.',//ID_TYPE_IMAGE
                                        form_data   = new FormData(document.getElementById(id_form));

                                        if(par4 == "" || par5 == "" || par6 == "" || par7 == "" || par8 == "")
                                        {
                                            new PNotify({
                                                title: title_pnotify,
                                                text: "'.$lang_global_1.'",
                                                type: "info"
                                            });
                                        }else{
                                                form_data.append("par1",par4);
                                                form_data.append("par2",par5);
                                                form_data.append("par3",par6);
                                                form_data.append("par4",par7);
                                                form_data.append("par5",par8);

                                                $.ajax({
                                                    type: "POST",
                                                    url:  "'.($id_type_action == 1 ? /*REGISTRAR VERSION EN AMBOS IDIOMAS*/$url_carpeta_admin.'/upl-image-ver-by-image-lang-id' : /*REGISTRAR VERSION EN UN SOLO IDIOMA*/$url_carpeta_admin.'/upl-image-ver-in-a-single-language-by-image-lang-id') . '",
                                                    //TIPO DE ENVIO DE DATOS
                                                        //SERIALIZE()
                                                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                                        //FORMDATA
                                                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                                                //processData: false,
                                                                //contentType: false,
                                                    data: form_data,
                                                    cache: false,
                                                    contentType: false,
                                                    processData:false,
                                                    beforeSend:function()
                                                    {
                                                        $("#"+id_form)[0].reset();
                                                        $.magnificPopup.close();
                                                    },
                                                    xhr: function()
                                                    {
                                                        var xhr = $.ajaxSettings.xhr();
                                                        if (xhr.upload)
                                                        {
                                                            xhr.upload.addEventListener("progress", function(ev)
                                                            {
                                                                var percent = 0;
                                                                var position = ev.loaded || ev.position;
                                                                var total = ev.total;
                                                                if (ev.lengthComputable)
                                                                {
                                                                    percent = Math.ceil(position / total * 100);
                                                                }
                                                                showProgressBar(percent,"#"+id_tab);
                                                            },true);
                                                        }
                                                        return xhr;
                                                    }
                                                }).done(function(response)
                                                {
                                                    if(response.estado == "true")
                                                    {
                                                        new PNotify({
                                                            title: title_pnotify,
                                                            text: response.resultado,
                                                            type: "success",
                                                            delay: 1000,
                                                            before_init: function()
                                                            {
                                                                clearProgressBar("#"+id_tab);
                                                            },
                                                            before_close: function(PNotify){
                                                                if(redireccionar == 1){
                                                                    window.location.href = "'.$page.'";
                                                                }
                                                            }
                                                        });
                                                    }else{
                                                            if(response.sin_sesion == "true"){
                                                                window.location.href = url_front+"iniciar-sesion";
                                                            }else{
                                                                    new PNotify({
                                                                        title: title_pnotify,
                                                                        text: response.error,
                                                                        type: "error",
                                                                        before_init: function(){
                                                                            clearProgressBar("#"+id_tab);
                                                                        }
                                                                    });
                                                                 }
                                                         }
                                                })
                                                .fail(function()
                                                {
                                                    new PNotify({
                                                        title: title_pnotify,
                                                        text: "'.$lang_global_4.'",
                                                        type: "error",
                                                        before_init: function()
                                                        {
                                                            clearProgressBar("#"+id_tab);
                                                        }
                                                    });
                                                });
                                             }
                                     }
                             }
                     }
            });');
        }
    }

    /**
     * [modalUploadImage description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalUploadImage($form_name)
    {
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_update_image = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_update_image + " form").attr("data-modal-update-image","");
                //OBTENER DATOS DE FORMA DINAMICA
                //ID_IMAGE + ID_IMAGE_LANG + ID_LANG + TITLE_LANG
                var cadena      = $(this).attr("data-update-image");
                //MOSTRAR DATOS
                $(modal_update_image + " form").attr("data-modal-update-image",cadena);
            });');
    }

    /**
     * [formUpdateImage description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $id_tab            [description]
     * @param  [type] $id_table          [description]
     * @param  [type] $id_type_section   [description]
     * @param  [type] $redirect          [description]
     * @param  [type] $lang              [description]
     * @param  [type] $lang_global_1     [description]
     * @param  [type] $lang_global_2     [description]
     * @param  [type] $lang_global_3     [description]
     * @param  [type] $lang_global_4     [description]
     * @return [type]                    [description]
     */

    function formUpdateImage($title,$url_carpeta_admin,$form_id,$id_tab,$id_table,$id_type_section,$redirect,$lang,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4)
    {
        //$id_tab ES TEXTO, NO VALIDAR CON intval
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($form_id) && !empty(trim($id_tab)) && !empty(intval(trim($id_type_section))) && !empty($lang_global_1) && !empty($lang_global_2) && !empty($lang_global_3) && !empty($lang_global_4))
        {
      echo('$(document).delegate("#'.$form_id.'", "submit", function(ev){
                ev.preventDefault();

                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.';

                if($("#fileInputChangeVersion").val().length < 5)
                {
                    new PNotify({
                        title: title_pnotify,
                        text: "'.$lang_global_1.'",
                        type: "info"
                    });
                }else{
                        var archivo     = $("#fileInputChangeVersion").val();
                        var extensiones = archivo.substring(archivo.lastIndexOf("."));

                        if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png" && extensiones != ".svg")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: "'.$lang_global_2.'",
                                type: "info"
                            });
                        }else{
                            var id_tab      = "'.$id_tab.'",
                                id_form     = "'.$form_id.'",
                                cadena      = $(this).attr("data-modal-update-image"),
                                par8        = cadena.split("/")[0],//ID_IMG_LANG_VERSION
                                par9        = cadena.split("/")[1],//TITLE
                                par10       = '.$id_type_section.',//ID_TYPE_IMAGE
                                par11       = cadena.split("/")[2],//ID_LANG
                                form_data   = new FormData(document.getElementById(id_form));

                                form_data.append("par1",par8);
                                form_data.append("par2",par9);
                                form_data.append("par3",par10);
                                form_data.append("par4",par11);

                                if(par8 == "" || par9 == "" || par10 == "" || par11 == "")
                                {
                                    new PNotify({
                                        title: title_pnotify,
                                        text: "'.$lang_global_3.'",
                                        type: "info"
                                    });
                                }else{
                                        $.ajax({
                                            type: "POST",
                                            url: "'.($lang == 1 ? /*MODIFICAR IMAGEN CON ISO*/$url_carpeta_admin.'/upd-image-by-image-lang-ver-id' : /*MODIFICAR IMAGEN SIN ISO*/$url_carpeta_admin.'/upd-image-by-image-lang-ver-id-wthout-lang') . '",
                                                    //TIPO DE ENVIO DE DATOS
                                                        //SERIALIZE()
                                                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                                        //FORMDATA
                                                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                                                //processData: false,
                                                                //contentType: false,
                                            data: form_data,
                                            cache: false,
                                            contentType: false,
                                            processData:false,
                                            beforeSend:function()
                                            {
                                                $("#"+id_form)[0].reset();
                                                $.magnificPopup.close();
                                            },
                                            xhr: function()
                                            {
                                                var xhr = $.ajaxSettings.xhr();
                                                if (xhr.upload)
                                                {
                                                    xhr.upload.addEventListener("progress", function(ev)
                                                    {
                                                        var percent = 0;
                                                        var position = ev.loaded || ev.position;
                                                        var total = ev.total;
                                                        if (ev.lengthComputable)
                                                        {
                                                            percent = Math.ceil(position / total * 100);
                                                        }
                                                        showProgressBar(percent,"#"+id_tab);
                                                    },true);
                                                }
                                                return xhr;
                                            }
                                        }).done(function(response)
                                        {
                                            if(response.estado == "true")
                                            {
                                                new PNotify({
                                                    title: title_pnotify,
                                                    text: response.resultado,
                                                    type: "success",
                                                    delay: 1000,
                                                    before_init: function()
                                                    {
                                                        clearProgressBar("#"+id_tab);
                                                    },
                                                    before_close: function(PNotify){
                                                        if(redireccionar == 1){
                                                            '.($id_table == 0 ? 'window.location.href = "'.$url_carpeta_admin.'/" + response.pagina;' : 'window.location.href = "'.$url_carpeta_admin.'/" + response.pagina + "-detail/" + '.$id_table.';').'
                                                        }
                                                    }
                                                });
                                            }else{
                                                    if(response.sin_sesion == "true"){
                                                        window.location.href = url_front+"iniciar-sesion";
                                                    }else{
                                                            new PNotify({
                                                                title: title_pnotify,
                                                                text: response.error,
                                                                type: "error",
                                                                before_init: function(){
                                                                    clearProgressBar("#"+id_tab);
                                                                }
                                                            });
                                                         }
                                                 }
                                        })
                                        .fail(function()
                                        {
                                            new PNotify({
                                                title: title_pnotify,
                                                text: "'.$lang_global_4.'",
                                                type: "error",
                                                before_init: function()
                                                {
                                                    clearProgressBar("#"+id_tab);
                                                }
                                            });
                                        });
                                     }
                             }
                     }
            });');
        }
    }

    /**
     * [modalUploadImage2Parameters description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalUploadImage2Parameters($form_name)
    {
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_upload_image_version_2_parameters = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_upload_image_version_2_parameters + " form").attr("data-modal-upload-image-2-parameters","");
                //OBTENER DATOS DE FORMA DINAMICA
                //ID_TABLE_LANG + TITLE_LANG
                var cadena      = $(this).attr("data-upload-image-2-parameters");
                //MOSTRAR DATOS
                $(modal_upload_image_version_2_parameters + " form").attr("data-modal-upload-image-2-parameters",cadena);
            });');
    }

    /**
     * [formuploadImage2Parameters description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $tab_id            [description]
     * @param  [type] $id_table          [description]
     * @param  [type] $id_type_section   [description]
     * @param  [type] $page              [description]
     * @param  [type] $redirect          [description]
     * @param  [type] $lang_global_1     [description]
     * @param  [type] $lang_global_2     [description]
     * @param  [type] $lang_global_3     [description]
     * @param  [type] $lang_global_4     [description]
     * @return [type]                    [description]
     */

    function formuploadImage2Parameters($title,$url_carpeta_admin,$form_id,$tab_id,$id_table,$id_type_section,$page,$redirect,$lang_global_1,$lang_global_2,$lang_global_3,$lang_global_4)
    {
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($form_id) && !empty(intval(trim($id_table))) && !empty($page) && !empty($lang_global_1) && !empty($lang_global_2) && !empty($lang_global_3) && !empty($lang_global_4))
        {
      echo('$(document).delegate("#'.$form_id.'", "submit", function(ev){
                ev.preventDefault();
                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.';

                if($("#id_image_section_lang").val() == "")
                {
                    new PNotify({
                        title: title_pnotify,
                        text: "'.$lang_global_1.'",
                        type: "info",
                        shadow: true
                    });
                }else{
                        if($("#fileInputUploadImage2Parameters").val().length < 5)
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: "'.$lang_global_2.'",
                                type: "info",
                            });
                        }else{
                                var archivo     = $("#fileInputUploadImage2Parameters").val();
                                var extensiones = archivo.substring(archivo.lastIndexOf("."));

                                if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png" && extensiones != ".svg")
                                {
                                    new PNotify({
                                        title: title_pnotify,
                                        text: "'.$lang_global_3.'",
                                        type: "info",
                                    });
                                }else{
                                    var id_tab      = "'.$tab_id.'",
                                        id_form     = "'.$form_id.'",
                                        cadena      = $(this).attr("data-modal-upload-image-2-parameters"),
                                        par13       = '.$id_table.',//ID_TABLE
                                        par14       = cadena.split("/")[0],//ID_TABLE_LANG
                                        par15       = cadena.split("/")[1],//TITLE_TABLE_LANG
                                        par16       = '.$id_type_section.',//ID_TYPE_IMAGE
                                        form_data   = new FormData(document.getElementById(id_form));

                                        form_data.append("par1",par13);
                                        form_data.append("par2",par14);
                                        form_data.append("par3",par15);
                                        form_data.append("par4",par16);

                                        if(par13 == 0 || par14 == 0 || par15 == 0 || par16 == 0)
                                        {
                                            new PNotify({
                                                title: title_pnotify,
                                                text: "'.$lang_global_1.'",
                                                type: "info",
                                            });
                                        }else{
                                                $.ajax({
                                                    url : "'.$url_carpeta_admin.'/upl-image-2-pmtrs",
                                                    type: "POST",
                                                    //TIPO DE ENVIO DE DATOS
                                                        //SERIALIZE()
                                                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                                        //FORMDATA
                                                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                                                //processData: false,
                                                                //contentType: false,
                                                    data: form_data,
                                                    cache: false,
                                                    contentType: false,
                                                    processData:false,
                                                    beforeSend:function()
                                                    {
                                                        $("#"+id_form)[0].reset();
                                                        $.magnificPopup.close();
                                                    },
                                                    xhr: function()
                                                    {
                                                        var xhr = $.ajaxSettings.xhr();
                                                        if (xhr.upload)
                                                        {
                                                            xhr.upload.addEventListener("progress", function(ev)
                                                            {
                                                                var percent = 0;
                                                                var position = ev.loaded || ev.position;
                                                                var total = ev.total;
                                                                if (ev.lengthComputable)
                                                                {
                                                                    percent = Math.ceil(position / total * 100);
                                                                }
                                                                showProgressBar(percent,"#"+id_tab);
                                                            },true);
                                                        }
                                                        return xhr;
                                                    }
                                                }).done(function(response)
                                                {
                                                    if(response.estado == "true")
                                                    {
                                                        new PNotify({
                                                            title: title_pnotify,
                                                            text: response.resultado,
                                                            type: "success",
                                                            delay: 1000,
                                                            before_init: function()
                                                            {
                                                                clearProgressBar("#"+id_tab);
                                                            },
                                                            before_close: function(PNotify){
                                                                if(redireccionar == 1){
                                                                    window.location.href = "'.$url_carpeta_admin.'/" + "'.$page.'/" + '.$id_table.';
                                                                }
                                                            }
                                                        });
                                                    }else{
                                                            if(response.sin_sesion == "true"){
                                                                window.location.href = url_front+"iniciar-sesion";
                                                            }else{
                                                                    new PNotify({
                                                                        title: title_pnotify,
                                                                        text: response.error,
                                                                        type: "error",
                                                                        before_init: function(){
                                                                            clearProgressBar("#"+id_tab);
                                                                        }
                                                                    });
                                                                 }
                                                         }
                                                })
                                                .fail(function()
                                                {
                                                    new PNotify({
                                                        title: title_pnotify,
                                                        text: "'.$lang_global_4.'",
                                                        type: "error",
                                                        before_init: function()
                                                        {
                                                            clearProgressBar("#"+id_tab);
                                                        }
                                                    });
                                                });
                                             }
                                     }
                             }
                     }
            });');
        }
    }

    /**
     * [datetable_default description]
     *
     * @param  [type] $datatable_id  [description]
     * @param  [type] $function_name [description]
     * @return [type]                [description]
     */

    function datetable_default($datatable_id,$function_name)
    {
      echo('var '.$function_name.'Init = function() {

                $(\'#'.$datatable_id.'\').dataTable({
                    dom: \'<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p\'
                });

            };
            $(function() {
                '.$function_name.'Init();
            });');
    }

    /**
     * [datetable_tools description]
     *
     * @param  [type] $datatable_id  [description]
     * @param  [type] $function_name [description]
     * @return [type]                [description]
     */

    function datetable_tools($datatable_id,$function_name)
    {
  echo('var '.$function_name.'Init = function() {
            var $table = $(\'#'.$datatable_id.'\');
            var table = $table.dataTable({
                sDom: \'<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p\',
                buttons: [
                    {
                        extend: \'print\',
                        text: \'Print\'
                    },
                    {
                        extend: \'excel\',
                        text: \'Excel\'
                    },
                    {
                        extend: \'pdf\',
                        text: \'PDF\',
                        customize : function(doc){
                            var colCount = new Array();
                            $(\'#'.$datatable_id.'\').find(\'tbody tr:first-child td\').each(function(){
                                if($(this).attr(\'colspan\')){
                                    for(var i=1;i<=$(this).attr(\'colspan\');$i++){
                                        colCount.push(\'*\');
                                    }
                                }else{ colCount.push(\'*\'); }
                            });
                            doc.content[1].table.widths = colCount;
                        }
                    }
                ]
            });
            $(\'<div />\').addClass(\'dt-buttons mb-2 pb-1 text-end\').prependTo(\'#'.$datatable_id.'_wrapper\');
            $table.DataTable().buttons().container().prependTo( \'#'.$datatable_id.'_wrapper .dt-buttons\' );
            $(\'#'.$datatable_id.'_wrapper\').find(\'.btn-secondary\').removeClass(\'btn-secondary\').addClass(\'btn-default\');
        };
        $(function() {
            '.$function_name.'Init();
        });');
    }

    /**
     * [datetable_ecommerce_list description]
     *
     * @param  [type] $datatable_id  [description]
     * @param  [type] $function_name [description]
     * @return [type]                [description]
     */

    function datetable_ecommerce_list($datatable_id,$function_name)
    {
      echo('var '.$function_name.'Init = function() {
                var $'.$function_name.'Table = $(\'#'.$datatable_id.'\');
                $'.$function_name.'Table.dataTable({
                    dom: \'<"row justify-content-between"<"col-auto"><"col-auto">><"table-responsive"t>ip\',
                    columnDefs: [
                        {
                            targets: 0,
                            orderable: false
                        }
                    ],
                    pageLength: 12,
                    order: [],
                    language: {
                        paginate: {
                            previous: \'<i class="fas fa-chevron-left"></i>\',
                            next: \'<i class="fas fa-chevron-right"></i>\'
                        }
                    },
                    drawCallback: function() {

                        // Move dataTables info to footer of table
                        $'.$function_name.'Table
                            .closest(\'.dataTables_wrapper\')
                            .find(\'.dataTables_info\')
                            .appendTo( $'.$function_name.'Table.closest(\'.datatables-header-footer-wrapper\').find(\'.results-info-wrapper\') );

                        // Move dataTables pagination to footer of table
                        $'.$function_name.'Table
                            .closest(\'.dataTables_wrapper\')
                            .find(\'.dataTables_paginate\')
                            .appendTo( $'.$function_name.'Table.closest(\'.datatables-header-footer-wrapper\').find(\'.pagination-wrapper\') );

                        $'.$function_name.'Table.closest(\'.datatables-header-footer-wrapper\').find(\'.pagination\').addClass(\'pagination-modern pagination-modern-spacing justify-content-center\');

                    }
                });
                // Link "Show" select for change the "pageLength" of dataTable
                $(document).on(\'change\', \'.results-per-page\', function(){
                    var $this = $(this),
                        $dataTable = $this.closest(\'.datatables-header-footer-wrapper\').find(\'.dataTable\').DataTable();

                    $dataTable.page.len( $this.val() ).draw();
                });
                // Link "Search" field to show results based in the term entered (the "Filter By" is considered to filter the results)
                $(document).on(\'keyup\', \'.search-term\', function(){
                    var $this = $(this),
                        $filterBy = $this.closest(\'.datatables-header-footer-wrapper\').find(\'.filter-by\'),
                        $dataTable = $this.closest(\'.datatables-header-footer-wrapper\').find(\'.dataTable\').DataTable();

                    if( $filterBy.val() == \'all\' ) {
                        $dataTable.search( $this.val() ).draw();
                    } else {
                        $dataTable.column( parseInt( $filterBy.val() ) ).search( $this.val() ).draw();
                    }
                });
                // Trigger "keyup" event when "filter-by" changes
                $(document).on(\'change\', \'.filter-by\', function(){
                    var $this = $(this),
                        $searchField = $this.closest(\'.datatables-header-footer-wrapper\').find(\'.search-term\');

                    $searchField.trigger(\'keyup\');
                });
                // Select All
                $'.$function_name.'Table.find( \'.select-all\' ).on(\'change\', function(){
                    if( this.checked ) {
                        $'.$function_name.'Table.find( \'input[type="checkbox"]:not(.select-all)\' ).prop(\'checked\', true);
                    } else {
                        $'.$function_name.'Table.find( \'input[type="checkbox"]:not(.select-all)\' ).prop(\'checked\', false);
                    }
                })
            };
            '.$function_name.'Init();');
    }

    /**
     * [deleteDataFromTheForm description]
     * @param  [type] $form_name [description]
     * @param  [type] $data_name [description]
     * @return [type]            [description]
     */

    function deleteDataFromTheForm($form_name,$data_name)
    {
      echo('$(document).delegate("#'.$form_name.' form button.modal-dismiss", "click", function(e){
                $("#'.$form_name.' form").attr("'.$data_name.'","");
            });');
    }

    /**
     * [modalRemoveGeneral description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalRemoveGeneral($form_name)
    {
        if(!empty($form_name)){
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_remove_general = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_remove_general + " form").attr("data-modal-remove-general");
                $(modal_remove_general + " h2 span#modal-title-remove-general").text();
                $(modal_remove_general + " p span#modal-content-remove-general").text();
                //OBTENER DATOS DE FORMA DINAMICA
                //ID + NAME + ID_CALL
                var cadena      = $(this).attr("data-remove");
                //MOSTRAR DATOS
                $(modal_remove_general + " form").attr("data-modal-remove-general",cadena);
                $(modal_remove_general + " h2 span#modal-title-remove-general").text(cadena.split("/")[1]);
                $(modal_remove_general + " p span#modal-content-remove-general").text(cadena.split("/")[1]);
            });');
        }
    }

    /**
     * [formRemoveGeneral description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $id_item           [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formRemoveGeneral($title,$id_item,$url_carpeta_admin,$form_id,$redirect)
    {
        if(!empty($title) && !empty(trim($id_item)) && !empty($url_carpeta_admin) && !empty($form_id))
        {
      echo('$("'.$form_id.'").bind("submit", function(){
                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.',
                    cadena          = $(this).attr("data-modal-remove-general"),
                    parametros      = "&par1=" + cadena.split("/")[0] + "&par2=" + cadena.split("/")[1] + "&par3=" + cadena.split("/")[2],
                    f               = $(this),
                    i               = f.serialize();

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/d-gnrl",
                    data: i + parametros,
                    cache: false,
                    beforeSend:function(){
                        $("'.$form_id.'")[0].reset();
                        $.magnificPopup.close();
                    },
                    success:function(response)
                    {
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success",
                                delay: 1000,
                                before_init: function(){
                                    $("tr#'.$id_item.'" + response.item).fadeOut(800, function(){
                                        $(".tooltip.show").remove();
                                        $(this).remove();
                                    });
                                },
                                before_close: function(PNotify){
                                    if(redireccionar == 1){
                                        window.location.href = url_admin+"/"+response.pagina;
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                    }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
        }
    }

    /**
     * [modalDeleteWith4Parameters description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalDeleteWith4Parameters($form_name)
    {
        if(!empty($form_name))
        {
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_delete_with_4_parameters = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_delete_with_4_parameters + " form").attr("data-modal-delete-with-4-parameters");
                $(modal_delete_with_4_parameters + " h2 span#modal-title-delete-with-4-parameters").text();
                $(modal_delete_with_4_parameters + " p span#modal-content-delete-with-4-parameters").text();
                //OBTENER DATOS DE FORMA DINAMICA
                //ID + TITLE + ID_CALL + ITEM-DIV
                var cadena      = $(this).attr("data-delete-with-4-parameters");
                //MOSTRAR DATOS
                $(modal_delete_with_4_parameters + " form").attr("data-modal-delete-with-4-parameters",cadena);
                $(modal_delete_with_4_parameters + " h2 span#modal-title-delete-with-4-parameters").text(cadena.split("/")[1]);
                $(modal_delete_with_4_parameters + " p span#modal-content-delete-with-4-parameters").text(cadena.split("/")[1]);
            });');
      }
    }

    /**
     * [formDeleteWith4Parameters description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $pagina            [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formDeleteWith4Parameters($title,$url_carpeta_admin,$pagina,$form_id,$redirect)
    {
        //NO ES NECESARIO VALIDAR $redirect YA QUE SU VALOR PUEDE SER 0
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($pagina) && !empty($form_id))
        {
      echo('$(document).delegate("'.$form_id.'", "submit", function(e){
                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.',
                    cadena          = $(this).attr("data-modal-delete-with-4-parameters"),
                    parametros      = "&par1=" + cadena.split("/")[0] + "&par2=" + cadena.split("/")[1] + "&par3=" + cadena.split("/")[2],
                    id_item         = cadena.split("/")[3],
                    f               = $(this),
                    i               = f.serialize();

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/d-wth-4-pmtrs",
                    data: i + parametros,
                    cache: false,
                    beforeSend:function(){
                        $("'.$form_id.'")[0].reset();
                        $.magnificPopup.close();
                    },
                    success:function(response)
                    {
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success",
                                delay: 1000,
                                before_init: function()
                                {
                                    $("tr#"+ id_item + response.item).fadeOut(800, function(){
                                        $(".tooltip.show").remove();
                                        $(this).remove();
                                    });
                                },
                                before_close: function(PNotify){
                                    if(redireccionar == 1){
                                        window.location.href = "'.$pagina.'";
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                    }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
        }
    }

    /**
     * [modalDeleteWithImage5Parameters description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalDeleteWithImage5Parameters($form_name)
    {
        if(!empty($form_name)){
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_delete_with_image_5_parameters = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_delete_with_image_5_parameters + " form").attr("data-modal-delete-with-image-5-parameters");
                $(modal_delete_with_image_5_parameters + " h2 span#modal-title-delete-with-image-5-parameters").text();
                $(modal_delete_with_image_5_parameters + " p span#modal-content-delete-with-image-5-parameters").text();
                //OBTENER DATOS DE FORMA DINAMICA
                                    //ID_TABLE + ID_IMAGE_LANG + TITLE + ID_CALL + ITEM-DIV
                var cadena      = $(this).attr("data-delete-with-image-5-parameters");
                //MOSTRAR DATOS
                $(modal_delete_with_image_5_parameters + " form").attr("data-modal-delete-with-image-5-parameters",cadena);
                $(modal_delete_with_image_5_parameters + " h2 span#modal-title-delete-with-image-5-parameters").text(cadena.split("/")[2]);
                $(modal_delete_with_image_5_parameters + " p span#modal-content-delete-with-image-5-parameters").text(cadena.split("/")[2]);
            });');
        }
    }

    /**
     * [formDeleteWithImage5Parameters description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $pagina            [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $redirect          [description]
     * @param  [type] $id_type_section   [description]
     * @return [type]                    [description]
     */

    function formDeleteWithImage5Parameters($title,$url_carpeta_admin,$pagina,$form_id,$redirect,$id_type_section)
    {
        //NO ES NECESARIO VALIDAR $redirect YA QUE SU VALOR PUEDE SER 0
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($pagina) && !empty($form_id) && !empty(intval(trim($id_type_section))))
        {
      echo('$(document).delegate("'.$form_id.'", "submit", function(e){
                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.',
                    cadena          = $(this).attr("data-modal-delete-with-image-5-parameters"),
                    parametros      = "&par1=" + cadena.split("/")[0] + "&par2=" + cadena.split("/")[1] + "&par3=" + cadena.split("/")[2] + "&par4=" + cadena.split("/")[3],
                    f               = $(this),
                    i               = f.serialize(),
                    id_item         = cadena.split("/")[4];//BOX-MEDIA-GALLERY-ID

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/d-wth-img-5-pmtrs",
                    data: i + parametros,
                    cache: false,
                    beforeSend:function(){
                        $("'.$form_id.'")[0].reset();
                        $.magnificPopup.close();
                    },
                    success:function(response){
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success",
                                delay: 800,
                                before_init: function()
                                {');
                                    switch ($id_type_section) {
                                        case 21://Carrusel
                                            //MEDIA GALERY
                                      echo('$("#"+ id_item + response.item).fadeOut(800, function(){
                                                $(".tooltip.show").remove();
                                            });');
                                            break;
                                        default:
                                            //DATATABLE
                                      echo('$("tr#"+ id_item + response.item).fadeOut(800, function(){
                                                $(".tooltip.show").remove();
                                                $(this).remove();
                                            });');
                                            break;
                                    }
                          echo('},
                                before_close: function(PNotify){
                                    if(redireccionar == 1){
                                        window.location.href = "'.$pagina.'";
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                    }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
        }
    }

    /**
     * [modalDeleteWithImage6Parameters description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalDeleteWithImage6Parameters($form_name)
    {
        if(!empty($form_name)){
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_delete_with_image_6_parameters = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_delete_with_image_6_parameters + " form").attr("data-modal-delete-with-image-6-parameters");
                $(modal_delete_with_image_6_parameters + " h2 span#modal-title-delete-with-image-6-parameters").text();
                $(modal_delete_with_image_6_parameters + " p span#modal-content-delete-with-image-6-parameters").text();
                //OBTENER DATOS DE FORMA DINAMICA
                //ID_TABLE + ID_IMAGE + ID_IMAGE_LANG + NAME + ID_CALL + BOX-MEDIA-GALLERY-ID
                var cadena      = $(this).attr("data-delete-with-image-6-parameters");
                //MOSTRAR DATOS
                $(modal_delete_with_image_6_parameters + " form").attr("data-modal-delete-with-image-6-parameters",cadena);
                $(modal_delete_with_image_6_parameters + " h2 span#modal-title-delete-with-image-6-parameters").text(cadena.split("/")[3]);
                $(modal_delete_with_image_6_parameters + " p span#modal-content-delete-with-image-6-parameters").text(cadena.split("/")[3]);
            });');
        }
    }

    /**
     * [formDeleteWithImage6Parameters description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $id_type_action    [description]
     * @param  [type] $link              [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formDeleteWithImage6Parameters($title,$url_carpeta_admin,$form_id,$id_type_action,$link,$redirect)
    {
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($form_id) && !empty(intval(trim($id_type_action))) && !empty($link))
        {
      echo('$(document).delegate("'.$form_id.'", "submit", function(e){
                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.',
                    cadena          = $(this).attr("data-modal-delete-with-image-6-parameters"),
                    //ID_TABLE + ID_IMAGE + ID_IMAGE_LANG + NAME + ID_CALL + BOX-MEDIA-GALLERY-ID
                    parametros      = "&par1=" + cadena.split("/")[0] + "&par2=" + cadena.split("/")[1] + "&par3=" + cadena.split("/")[2] + "&par4=" + cadena.split("/")[3] + "&par5=" + cadena.split("/")[4] + "&par6='.$id_type_action.'",
                    f               = $(this),
                    i               = f.serialize(),
                    id_item         = cadena.split("/")[5];//BOX-MEDIA-GALLERY-ID

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/d-wth-img-6-pmtrs",
                    data: i + parametros,
                    cache: false,
                    beforeSend:function(){
                        $("'.$form_id.'")[0].reset();
                        $.magnificPopup.close();
                    },
                    success:function(response){
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success",
                                delay: 1000,
                                before_init: function()
                                {
                                    $("#"+ id_item + response.item).fadeOut(800, function(){
                                        $(".tooltip.show").remove();
                                        $(this).remove();
                                    });
                                },
                                before_close: function(PNotify){
                                    if(redireccionar == 1){
                                        window.location.href = "'.$link.'";
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                    }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
        }
    }

    /**
     * [modalDeleteWithImageVersion3Parameters description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalDeleteWithImageVersion3Parameters($form_name)
    {
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_delete_with_image_version_3_parameters = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_delete_with_image_version_3_parameters + " form").attr("data-modal-delete-with-image-version-3-parameters","");
                $(modal_delete_with_image_version_3_parameters + " h2 span#modal-title-delete-with-image-version-3-parameters").text();
                $(modal_delete_with_image_version_3_parameters + " p span#modal-content-delete-with-image-version-3-parameters").text();
                //OBTENER DATOS DE FORMA DINAMICA
                //ID_IMAGE_LANG_VERSION + TITLE
                var cadena      = $(this).attr("data-delete-with-image-version-3-parameters");
                //MOSTRAR DATOS
                $(modal_delete_with_image_version_3_parameters + " form").attr("data-modal-delete-with-image-version-3-parameters",cadena);
                $(modal_delete_with_image_version_3_parameters + " h2 span#modal-title-delete-with-image-version-3-parameters").text(cadena.split("/")[1]);
                $(modal_delete_with_image_version_3_parameters + " p span#modal-content-delete-with-image-version-3-parameters").text(cadena.split("/")[1]);
            });');
    }

    /**
     * [formDeleteWithImageVersion3Parameters description]
     *
     * @param  [type] $title             [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $form_id           [description]
     * @param  [type] $id_table          [description]
     * @param  [type] $status_item       [description]
     * @param  [type] $id_type_section   [description]
     * @param  [type] $link              [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formDeleteWithImageVersion3Parameters($title,$url_carpeta_admin,$form_id,$id_table,$status_item,$id_type_section,$link,$redirect)
    {
        //NO ES NECESARIO VALIDAR $status_item,$redirect YA QUE SU VALOR PUEDE SER 0
        if(!empty($title) && !empty($url_carpeta_admin) && !empty($form_id) && !empty(intval(trim($id_table))) && !empty(intval(trim($id_type_section))))
        {
            //$status_item
                //0 = Desactivado
                //1 = Activado

      echo('$(document).delegate("'.$form_id.'", "submit", function(e){
                var title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.',
                    cadena          = $(this).attr("data-modal-delete-with-image-version-3-parameters"),
                    //ID_IMG_LANG_VERSION + TITLE + ID_TYPE_IMAGE
                    parametros      = "&par1=" + cadena.split("/")[0] + "&par2=" + cadena.split("/")[1] + "&par3=" + '.$id_type_section.',
                    f               = $(this),
                    i               = f.serialize(),
                    id_item         = cadena.split("/")[2];//BOX-MEDIA-GALLERY-ID

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/d-wth-img-ver-3-pmtrs",
                    data: i + parametros,
                    cache: false,
                    beforeSend:function(){
                        $("'.$form_id.'")[0].reset();
                        $.magnificPopup.close();
                    },
                    success:function(response){
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success",
                                delay: 1000,
                                before_init: function()
                                {');
                                    if($status_item == 1){
                                  echo('$("#"+ id_item + response.item).fadeOut(1500, function(){
                                            $(this).remove();
                                            $(".tooltip.show").remove();
                                        });');
                                    }
                          echo('},
                                before_close: function(PNotify){
                                    if(redireccionar == 1){
                                        window.location.href = "'.$link.'";
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                    }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
        }
    }

    /**
     * [formUpdateSpecificTable description]
     *
     * @param  [type] $form_name         [description]
     * @param  [type] $title             [description]
     * @param  [type] $status_item       [description]
     * @param  [type] $id_item           [description]
     * @param  [type] $page_general      [description]
     * @param  [type] $section           [description]
     * @param  [type] $total_parameters  [description]
     * @param  [type] $url_php           [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $pagina            [description]
     * @param  [type] $reset             [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formUpdateSpecificTable($form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect)
    {
        //NO ES NECESARIO VALIDAR $status_item,$page_general,$section,$reset y $redirect YA QUE SU VALOR PUEDE SER 0
        if(!empty($form_name) && !empty($title) && !empty(trim($id_item)) && !empty($total_parameters) && !empty($url_php) && !empty($url_carpeta_admin) && !empty($pagina)){

            //$status_item
                //0 = Desactivado
                //1 = Activado
            //$page_general = $id_type_section
                //4 = Mi perfil
                //$section
                    //1 =  Redes sociales
                //15 = Productos
                //$section
                    //1 = Stripe
                    //2 = Informacion adicional
                    //3 = Promoción

      echo('$(document).on("click", "a.'.$form_name.'",function (b){
                b.preventDefault();

                var id_form = "#"+$(this).attr("data-form");

                $(document).delegate(id_form, "submit", function(e) {
                    e.preventDefault();

                    var $form           = $(this),
                        data            = $form.serialize(),
                        title_pnotify   = "'.$title.'",
                        redireccionar   = '.$redirect.',
                        cadena          = $form.attr("data-modal-update-specific-table-information"),
                        parametros      = "&par1=" + cadena.split("/")[0]');
                        switch ($total_parameters) {
                            case 2:
                                echo(' + "&par2=" + cadena.split("/")[1]');
                            break;
                            case 3:
                                echo(' + "&par2=" + cadena.split("/")[1] + "&par3=" + cadena.split("/")[2]');
                            break;
                            default://SOLO SE CUENTA CON 1 PARAMETRO
                            break;
                        }
                  echo(';');

              echo('$.ajax({
                        type: "POST",
                        url:  "'.$url_carpeta_admin.'/'.$url_php.'",
                        data: data + parametros,
                        cache: false,
                        beforeSend:function(){
                        },
                        success:function(response)
                        {
                            if(response.estado == "true")
                            {
                                new PNotify({
                                    title: title_pnotify,
                                    text: response.resultado,
                                    type: "success",
                                    delay: 800,
                                    before_init: function()
                                    {');
                                        if($reset == 1){
                                            echo('$form[0].reset();');
                                        }
                                        if($status_item == 1 && !empty($id_item) && !empty($page_general) && !empty($section)){
                                            switch ($page_general) {
                                                case 4://Mi perfil
                                                    switch ($section) {
                                                        case 1://Redes sociales
                                                          echo('var id_tr = "#'.$id_item.'"+response.id;

                                                                $(id_tr).find("td:eq(1)").html(response.font_awesome);
                                                                $(id_tr).find("td:eq(2)").html(response.url_social_media);');
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    break;
                                                case 15://Productos
                                                    switch ($section) {
                                                        case 1://Stripe
                                                          echo('var id_tr = "#'.$id_item.'"+response.id;

                                                                $(id_tr).find("td:eq(2)").html(response.value);');
                                                            break;
                                                        case 2://Informacion adicional
                                                            break;
                                                        case 3://Promoción
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    break;
                                                default:
                                                    break;
                                            }
                                        }
                                  echo('if(redireccionar == 0){
                                            $.magnificPopup.close();
                                        }
                                    },
                                    before_close: function(PNotify){
                                        if(redireccionar == 1){
                                            window.location.href = "'.$pagina.'";
                                        }
                                    }
                                });
                            }else{
                                    if(response.sin_sesion == "true"){
                                        window.location.href = url_front+"iniciar-sesion";
                                    }else{
                                            new PNotify({
                                                title: title_pnotify,
                                                text: response.error,
                                                type: "error"
                                            });
                                        }
                                 }
                        },
                        error: function(jqXHR)
                        {
                            //console.log(jqXHR);

                            var msg = "";

                            if(jqXHR.status != 200){
                                if (jqXHR.status === 0) {
                                    msg = "No conectar. Verificar Red.";
                                } else if (jqXHR.status == 404) {
                                    msg = "Página solicitada no encontrada. [404].";
                                } else if (jqXHR.status == 500) {
                                    msg = "Error interno del servidor [500].";
                                } else {
                                    msg = "Error no detectado. " + jqXHR.responseText;
                                }
                                new PNotify({
                                    title: title_pnotify,
                                    text: msg,
                                    type: "error"
                                });
                            }
                        }
                    });');
          echo('});
            });');
        }
    }

    /**
     * [modalDeleteSpecificTable description]
     *
     * @param  [type] $form_name [description]
     * @return [type]            [description]
     */

    function modalDeleteSpecificTable($form_name)
    {
        if(!empty($form_name)){
      echo('$(document).delegate("a.'.$form_name.'", "click", function(e){
                e.preventDefault();
                var modal_delete_specific_table = "#'.$form_name.'";
                //LIMPIAR CAMPOS
                $(modal_delete_specific_table + " form").attr("data-modal-delete-specific-table");
                $(modal_delete_specific_table + " h2 span#modal-title-delete-specific-table").text();
                $(modal_delete_specific_table + " p span#modal-content-delete-specific-table").text();
                //OBTENER DATOS DE FORMA DINAMICA
                //ID + NAME + ID_CALL
                var cadena    = $(this).attr("data-delete-specific-table"),
                    formId    = $(this).attr("data-form");
                //MOSTRAR DATOS
                $(modal_delete_specific_table + " form").attr("id",formId);
                $(modal_delete_specific_table + " form").attr("data-modal-delete-specific-table",cadena);
                $(modal_delete_specific_table + " h2 span#modal-title-delete-specific-table").text(cadena.split("/")[1]);
                $(modal_delete_specific_table + " p span#modal-content-delete-specific-table").text(cadena.split("/")[1]);
            });');
        }
    }

    /**
     * [formDeleteSpecificTable description]
     *
     * @param  [type] $form_name         [description]
     * @param  [type] $title             [description]
     * @param  [type] $status_item       [description]
     * @param  [type] $id_item           [description]
     * @param  [type] $page_general      [description]
     * @param  [type] $section           [description]
     * @param  [type] $total_parameters  [description]
     * @param  [type] $url_php           [description]
     * @param  [type] $url_carpeta_admin [description]
     * @param  [type] $pagina            [description]
     * @param  [type] $reset             [description]
     * @param  [type] $redirect          [description]
     * @return [type]                    [description]
     */

    function formDeleteSpecificTable($form_name,$title,$status_item,$id_item,$page_general,$section,$total_parameters,$url_php,$url_carpeta_admin,$pagina,$reset,$redirect)
    {
        //NO ES NECESARIO VALIDAR $status_item,$page_general,$section,$reset y $redirect YA QUE SU VALOR PUEDE SER 0
        if(!empty($form_name) && !empty($title) && !empty(trim($id_item)) && !empty($total_parameters) && !empty($url_php) && !empty($url_carpeta_admin) && !empty($pagina)){

      echo('$(document).delegate("form#'.$form_name.'", "submit", function(e) {
                e.preventDefault();

                var $form           = $(this),
                    data            = $form.serialize(),
                    title_pnotify   = "'.$title.'",
                    redireccionar   = '.$redirect.',
                    cadena          = $form.attr("data-modal-delete-specific-table"),
                    parametros      = "&par1=" + cadena.split("/")[0]');
                    switch ($total_parameters) {
                        case 2:
                            echo(' + "&par2=" + cadena.split("/")[1]');
                        break;
                        case 3:
                            echo(' + "&par2=" + cadena.split("/")[1] + "&par3=" + cadena.split("/")[2]');
                        break;
                        default://SOLO SE CUENTA CON 1 PARAMETRO
                        break;
                    }
              echo(';');

          echo('$.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/'.$url_php.'",
                    data: data + parametros,
                    cache: false,
                    beforeSend:function(){');
                        if($reset == 1){
                            echo('$form[0].reset();');
                        }
              echo('},
                    success:function(response)
                    {
                        if(response.estado == "true")
                        {
                            new PNotify({
                                title: title_pnotify,
                                text: response.resultado,
                                type: "success",
                                shadow: true,
                                delay: 800,
                                before_init: function()
                                {
                                    $.magnificPopup.close();');
                                    if($status_item == 1 && !empty($id_item)){
                                  echo('$("tr#'.$id_item.'" + response.item).fadeOut(800, function(){
                                            $(".tooltip.show").remove();
                                            $(this).remove();
                                        });');
                                    }
                          echo('},
                                before_close: function(PNotify){
                                    if(redireccionar == 1){
                                        window.location.href = "'.$pagina.'";
                                    }
                                }
                            });
                        }else{
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_front+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title_pnotify,
                                            text: response.error,
                                            type: "error"
                                        });
                                    }
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
        }
    }

    function modalUpdateSpecificTable($form_name,$title,$id_item,$url_php,$url_carpeta_admin,$pagina,$redirect)
    {
        //NO ES NECESARIO VALIDAR $redirect YA QUE SU VALOR PUEDE SER 0
        if(!empty($form_name) && !empty($title) && !empty($id_item) && !empty($url_php) && !empty($url_carpeta_admin) && !empty($pagina)){
      echo('$(document).on("click", "a.'.$form_name.'",function (a){
                a.preventDefault();

                var id_form = "#"+$(this).attr("data-form");

                $(document).delegate(id_form, "submit", function(e) {
                    e.preventDefault();
                    var $form           = $(this),
                        data            = $form.serialize(),
                        title_pnotify   = "'.$title.'",
                        redireccionar   = '.$redirect.',
                        cadena          = $form.attr("data-modal-update-specific-table-information"),
                        parametros      = "&par1=" + cadena.split("/")[0];

                    $.ajax({
                        type: "POST",
                        url:  "'.$url_carpeta_admin.'/'.$url_php.'",
                        data: data + parametros,
                        cache: false,
                        beforeSend:function(){
                            //$form[0].reset();
                        },
                        success:function(response)
                        {
                            if(response.estado == "true")
                            {
                                new PNotify({
                                    title: title_pnotify,
                                    text: response.resultado,
                                    type: "success",
                                    delay: 1500,
                                    before_init: function()
                                    {
                                        $.magnificPopup.close();
                                        $("tr#'.$id_item.'" + response.item).fadeOut(800, function(){
                                            $(".tooltip.show").remove();
                                            $(this).remove();
                                        });
                                    },
                                    before_close: function(PNotify){
                                        if(redireccionar == 1){
                                            window.location.href = "'.$pagina.'";
                                        }
                                    }
                                });
                            }else{
                                    if(response.sin_sesion == "true"){
                                        window.location.href = url_front+"iniciar-sesion";
                                    }else{
                                            new PNotify({
                                                title: title_pnotify,
                                                text: response.error,
                                                type: "error"
                                            });
                                        }
                                 }
                        },
                        error: function(jqXHR)
                        {
                            //console.log(jqXHR);

                            var msg = "";

                            if(jqXHR.status != 200){
                                if (jqXHR.status === 0) {
                                    msg = "No conectar. Verificar Red.";
                                } else if (jqXHR.status == 404) {
                                    msg = "Página solicitada no encontrada. [404].";
                                } else if (jqXHR.status == 500) {
                                    msg = "Error interno del servidor [500].";
                                } else {
                                    msg = "Error no detectado. " + jqXHR.responseText;
                                }
                                new PNotify({
                                    title: title_pnotify,
                                    text: msg,
                                    type: "error"
                                });
                            }
                        }
                    });
                });
            });');
        }
    }

    /**
     * [pluginIosSwitchVisible description]
     *
     * @param  [type] $section         [description]
     * @param  [type] $id_table        [description]
     * @param  [type] $title_table     [description]
     * @param  [type] $s_table_visible [description]
     * @param  [type] $id_type_image   [description]
     * @param  [type] $lang_titulo     [description]
     * @return [type]                  [description]
     */

    function pluginIosSwitchVisible($section,$id_table,$title_table,$s_table_visible,$id_type_image,$lang_titulo)
    {
        if(!empty($section) && !empty(intval(trim($id_table))) && !empty($title_table) && !empty($lang_titulo))
        {
          echo('<div id="switch-'.$id_table.'" class="update-status-visible-general switch switch-sm switch-warning" data-bs-toggle="tooltip" title="'.$lang_titulo.'" data-update-status-visible="'.$id_table.'/'.$title_table.'/'.($s_table_visible == 1 ? 0 : 1).'/'.$id_type_image.'">
                    <input type="checkbox" name="s_'.$section.'_'.$id_table.'" data-plugin-ios-switch'.($s_table_visible == 1 ? ' checked="checked"' : '').' required=""/>
                </div>');
        }
    }

    /**
     * [formIosSwitchVisible description]
     *
     * @param  [type] $url_carpeta_admin [description]
     * @return [type]                    [description]
     */

    function formIosSwitchVisible($url_carpeta_admin)
    {
      echo('$(document).delegate(".update-status-visible-general", "click", function(e){
                e.preventDefault();
                var cadena      = $(this).attr("data-update-status-visible"),
                    formData = new FormData();

                    formData.append("par1", cadena.split("/")[0]);
                    formData.append("par2", cadena.split("/")[1]);
                    formData.append("par3", cadena.split("/")[2]);
                    formData.append("par4", cadena.split("/")[3]);

                $.ajax({
                    type: "POST",
                    url:  "'.$url_carpeta_admin.'/upd-gnrl-sttus-visble",
                    //TIPO DE ENVIO DE DATOS
                        //SERIALIZE()
                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                        //FORMDATA
                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                //processData: false,
                                //contentType: false,
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if(response.estado == "true"){
                            new PNotify({
                                title: response.title,
                                text: response.content,
                                type: "success"
                            });
                        }else{
                                new PNotify({
                                    title: title_pnotify,
                                    text: response.error,
                                    type: "info"
                                });
                             }
                    },
                    error: function(jqXHR)
                    {
                        //console.log(jqXHR);

                        var msg = "";

                        if(jqXHR.status != 200){
                            if (jqXHR.status === 0) {
                                msg = "No conectar. Verificar Red.";
                            } else if (jqXHR.status == 404) {
                                msg = "Página solicitada no encontrada. [404].";
                            } else if (jqXHR.status == 500) {
                                msg = "Error interno del servidor [500].";
                            } else {
                                msg = "Error no detectado. " + jqXHR.responseText;
                            }
                            new PNotify({
                                title: title_pnotify,
                                text: msg,
                                type: "error"
                            });
                        }
                    }
                });
                return false;
            });');
    }

    /**
     * [getClaveUnidadSat description]
     *
     * @param  [type] $clave_prod_serv_sat_product_lang [description]
     * @return [type]                                   [description]
     */

    function getClaveUnidadSat($clave_prod_serv_sat_product_lang)
    {
        if(!empty($clave_prod_serv_sat_product_lang))
        {
            //clave_unidad_sat_product_lang
                //H87 - PIEZA
                //E48 - UNIDAD DE SERVICIO
            switch ($clave_prod_serv_sat_product_lang) {
                case '56101519':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '26101100':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '60141012':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '49241701':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '49181510':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '31201616':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '72154003':
                    $clave_unidad_sat_product_lang = "E48";
                    break;
                case '30151901':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '52121600':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '56101505':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '78101802':
                    $clave_unidad_sat_product_lang = "E48";
                    break;
                case '56101500':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '47132100':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '47131800':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                case '47131600':
                    $clave_unidad_sat_product_lang = "H87";
                    break;
                default:
                    $clave_unidad_sat_product_lang = "";
                    break;
            }

            return $clave_unidad_sat_product_lang;
        }
    }