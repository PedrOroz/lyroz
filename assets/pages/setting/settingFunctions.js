import '../../common-sass/bootstrap-datepicker/bootstrap-datepicker';
import '../../common-sass/bootstrap-datepicker/bootstrap-datepicker.es';

let settingFunctions = new(function() {
    //Calendario
    this.datepickerAjustes = function(){
        $('.datepicker').datepicker({
            language: 'es',
            autoclose: true,
            format: 'yyyy-mm-dd',
            //startDate: '+0d',
            //todayHighlight: true,
        });
    };
    //Summernote
    this.summernoteSaveFiles = function(){
        $(".summernote").summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            blockquoteBreakingLevel: 0,
            styleTags: [
                'span',
                'pre',
                'h1',
                'h2',
                'h3',
                'h4',
                'h5',
                'h6'
            ],
            addDefaultFonts: false,
            callbacks: {
                onImageUpload: function(files) {
                    var $editor = $(this),
                        data    = new FormData();
                    data.append("file", files[0]);
                    $.ajax({
                        url: url_global+"upl-summernote-image",
                        method: "POST",
                        data: data,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response)
                        {
                            if(response.estado == "false"){
                                if(response.sin_sesion == "true"){
                                    window.location.href = url_global+"iniciar-sesion";
                                }else{
                                        new PNotify({
                                            title: title,
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
                                title: title,
                                text: textStatus +" "+ errorThrown,
                                type: "error"
                            });
                        }
                    });
                }
            }
        });
    };
    //Forms especificos
    this.settingForms = function(){
        var id_submit1      = "updateInformationUserFront",
            id_submit2      = "updateEmailFront",
            id_submit3      = "updatePasswordFront",
            id_submit4      = "uploadUserProfilePictureFront";

        function showProgressBar(r,s){
            $(s+" .box-progress").css("display","block"),
            $(s+" .box-progress .progress .progress-bar").css("width",+r+"%"),
            $(s+" .box-progress .progress .progress-bar").attr("aria-valuenow",r),
            $(s+" .box-progress .progress .progress-bar").text(r+"%")
        }
        function clearProgressBar(r){
            $(r+" .box-progress").css("display","none"),
            $(r+" .progress .progress-bar").css("width","0%"),
            $(r+" .progress .progress-bar").attr("aria-valuenow",0),
            $(r+" .progress .progress-bar").text("")
        }

        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll(".needs-validation")

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    event.preventDefault()

                    if (!form.checkValidity()) {
                        event.stopPropagation()
                    }else{
                            //MODIFICAR INFORMACION
                            if(form.id == "updateInformationUserFront"){
                                $("#"+id_submit1+" .invalid-feedback").css("display","none").text("");

                                //OBTENER LADAS
                                var formData               = new FormData(document.getElementById(id_submit1)),
                                    lada_telephone_user    = $('.telephone_user .iti__selected-dial-code').text(),
                                    lada_cell_phone_user   = $('.cell_phone_user .iti__selected-dial-code').text();

                                formData.append("lada_telephone_user", lada_telephone_user);
                                formData.append("lada_cell_phone_user", lada_cell_phone_user);

                                $.ajax({
                                    type: "POST",
                                    url:  url_global+"upd-inf-u-f",
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
                                    beforeSend:function(){
                                        $('#'+id_submit1+" button[type=submit]").attr("disabled","disabled");
                                    },
                                    success:function(response)
                                    {
                                        //QUITAR CLASE
                                        form.classList.remove('was-validated')

                                        if(response.estado == "true")
                                        {
                                            new PNotify({
                                                title: title,
                                                text: response.resultado,
                                                type: 'success',
                                                delay: 1000,
                                                before_close: function(PNotify){
                                                    $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
                                                }
                                            });
                                        }else{
                                                if(response.sin_sesion == "true"){
                                                    window.location.href = url_global+"iniciar-sesion";
                                                }else{
                                                        //$('#'+id_submit1 + " .invalid-feedback").css("display","block").text(response.error);
                                                        new PNotify({
                                                            title: title,
                                                            text: response.error,
                                                            type: 'error',
                                                            before_close: function(PNotify){
                                                                $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
                                                            }
                                                        });
                                                     }
                                             }
                                    },
                                    error: function(jqXHR)
                                    {
                                        //console.log(jqXHR);

                                        var msg = '';

                                        if(jqXHR.status != 200){
                                            if (jqXHR.status === 0) {
                                                msg = "No conectar. Verificar Red.";
                                            } else if (jqXHR.status == 404) {
                                                msg = 'Página solicitada no encontrada. [404].';
                                            } else if (jqXHR.status == 500) {
                                                msg = 'Error interno del servidor [500].';
                                            } else {
                                                msg = 'Error no detectado. ' + jqXHR.responseText;
                                            }
                                            new PNotify({
                                                title: title,
                                                text: msg,
                                                type: 'error',
                                                before_close: function(PNotify){
                                                    $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                            //MODIFICAR CORREO
                            if(form.id == "updateEmailFront"){
                                $("#"+id_submit2+" .invalid-feedback").css("display","none").text("");

                                $.ajax({
                                    type: "POST",
                                    url:  url_global+"upd-ema-u-f",
                                    //TIPO DE ENVIO DE DATOS
                                        //SERIALIZE()
                                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                        //FORMDATA
                                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                                //processData: false,
                                                //contentType: false,
                                    data : $("#"+id_submit2).serialize(),
                                    cache: false,
                                    //processData: false,
                                    //contentType: false,
                                    beforeSend:function(){
                                        $('#'+id_submit2+" button[type=submit]").attr("disabled","disabled");
                                    },
                                    success:function(response)
                                    {
                                        //QUITAR CLASE
                                        form.classList.remove('was-validated')

                                        if(response.estado == "true")
                                        {
                                            new PNotify({
                                                title: title,
                                                text: response.resultado,
                                                type: 'success',
                                                delay: 1000,
                                                before_init: function()
                                                {
                                                    $('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
                                                }, 
                                                before_close: function(PNotify){
                                                    if(response.redirect == "true")
                                                    {
                                                        window.location.href = url_global+"s-off-f";
                                                    }
                                                }
                                            });
                                        }else{
                                                if(response.sin_sesion == "true"){
                                                    window.location.href = url_global+"iniciar-sesion";
                                                }else{
                                                        //$('#'+id_submit2 + " .invalid-feedback").css("display","block").text(response.error);
                                                        new PNotify({
                                                            title: title,
                                                            text: response.error,
                                                            type: 'error',
                                                            before_close: function(PNotify){
                                                                $('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
                                                            }
                                                        });
                                                     }
                                             }
                                    },
                                    error: function(jqXHR)
                                    {
                                        //console.log(jqXHR);

                                        var msg = '';

                                        if(jqXHR.status != 200){
                                            if (jqXHR.status === 0) {
                                                msg = "No conectar. Verificar Red.";
                                            } else if (jqXHR.status == 404) {
                                                msg = 'Página solicitada no encontrada. [404].';
                                            } else if (jqXHR.status == 500) {
                                                msg = 'Error interno del servidor [500].';
                                            } else {
                                                msg = 'Error no detectado. ' + jqXHR.responseText;
                                            }
                                            new PNotify({
                                                title: title,
                                                text: msg,
                                                type: 'error',
                                                before_close: function(PNotify){
                                                    $('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                            //MODIFICAR CONTRASEÑA
                            if(form.id == "updatePasswordFront"){
                                $("#"+id_submit3+" .invalid-feedback").css("display","none").text("");

                                $.ajax({
                                    type: "POST",
                                    url:  url_global+"upd-psw-u-f",
                                    //TIPO DE ENVIO DE DATOS
                                        //SERIALIZE()
                                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                        //FORMDATA
                                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                                //processData: false,
                                                //contentType: false,
                                    data : $("#"+id_submit3).serialize(),
                                    cache: false,
                                    //processData: false,
                                    //contentType: false,
                                    beforeSend:function(){
                                        $('#'+id_submit3+" button[type=submit]").attr("disabled","disabled");
                                    },
                                    success:function(response)
                                    {
                                        if(response.estado == "true")
                                        {
                                            new PNotify({
                                                title: title,
                                                text: response.resultado,
                                                type: 'success',
                                                delay: 1000,
                                                before_init: function()
                                                {
                                                    $('#'+id_submit3 + " button[type=submit]").removeAttr('disabled');
                                                },
                                                before_close: function(PNotify){
                                                    if(response.redirect == "true")
                                                    {
                                                        window.location.href = url_global+"s-off-f";
                                                    }
                                                }
                                            });
                                        }else{
                                                if(response.sin_sesion == "true"){
                                                    window.location.href = url_global+"iniciar-sesion";
                                                }else{
                                                        //$('#'+id_submit3 + " .invalid-feedback").css("display","block").text(response.error);
                                                        new PNotify({
                                                            title: title,
                                                            text: response.error,
                                                            type: 'error',
                                                            before_close: function(PNotify){
                                                                $('#'+id_submit3 + " button[type=submit]").removeAttr('disabled');
                                                            }
                                                        });
                                                     }
                                             }
                                    },
                                    error: function(jqXHR)
                                    {
                                        //console.log(jqXHR);

                                        var msg = '';

                                        if(jqXHR.status != 200){
                                            if (jqXHR.status === 0) {
                                                msg = "No conectar. Verificar Red.";
                                            } else if (jqXHR.status == 404) {
                                                msg = 'Página solicitada no encontrada. [404].';
                                            } else if (jqXHR.status == 500) {
                                                msg = 'Error interno del servidor [500].';
                                            } else {
                                                msg = 'Error no detectado. ' + jqXHR.responseText;
                                            }
                                            new PNotify({
                                                title: title,
                                                text: msg,
                                                type: 'error',
                                                before_close: function(PNotify){
                                                    $('#'+id_submit3 + " button[type=submit]").removeAttr('disabled');
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                         }         
                    form.classList.add('was-validated')
                }, false)
            })
        })()
        //CAMBIAR IMAGEN DE PERFIL
        $('#fileUserProfilePictureFront').on('change', function(ev) {
            ev.preventDefault();

            if($("#fileUserProfilePictureFront").val().length < 5)
            {
                new PNotify({
                    title: title,
                    text: "Aún no has seleccionado el archivo!!",
                    type: 'info'
                });
            }else{
                    var archivo     = $("#fileUserProfilePictureFront").val();
                    var extensiones = archivo.substring(archivo.lastIndexOf("."));

                    if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png" && extensiones != ".svg")
                    {
                        new PNotify({
                            title: title,
                            text: "Seleccione un archivo con los siguientes formatos válidos: JPG, JPEG, PNG y SVG.",
                            type: 'info'
                        });
                    }else{
                            var formData    = new FormData(document.getElementById(id_submit4)),
                                id_tab      = 'showProfilePictureByIdUserFront';

                            $.ajax({
                                type: "POST",
                                url:  url_global+"upl-u-pro-pi-f",
                                //TIPO DE ENVIO DE DATOS
                                    //SERIALIZE()
                                        //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                    //FORMDATA
                                        //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                            //processData: false,
                                            //contentType: false,
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                    //$('#'+id_submit4+" button[type=submit]").attr("disabled","disabled");
                                },
                                xhr: function(){
                                    var xhr = $.ajaxSettings.xhr();
                                    if (xhr.upload)
                                    {
                                        xhr.upload.addEventListener('progress', function(ev)
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
                                    if(response.image_ajax == "false"){
                                        $("#"+id_submit4)[0].reset();
                                        clearProgressBar("#"+id_tab);
                                    }else{
                                            $("#"+id_submit4)[0].reset();
                                            clearProgressBar("#"+id_tab);
                                            $(".thumb-info img").attr("src", response.image_ajax);
                                         }
                                }else{
                                        if(response.sin_sesion == "true"){
                                            window.location.href = url_global+"iniciar-sesion";
                                        }else{
                                                new PNotify({
                                                    title: title,
                                                    text: response.error,
                                                    type: 'error',
                                                    before_init: function(){
                                                        clearProgressBar("#"+id_tab);
                                                    }
                                                });
                                             }
                                     }
                            }).fail(function(){
                                new PNotify({
                                    title: title,
                                    text: "Problemas al ejecutar consulta.",
                                    type: 'error',
                                    before_init: function(){
                                        $("#"+id_submit4)[0].reset();
                                        clearProgressBar("#"+id_tab);
                                    }
                                });
                            });
                         }
                 }
        });
    };
    //función de arranque
    this.init = function() {
        settingFunctions.datepickerAjustes();
        settingFunctions.settingForms();
    }
});
$(function() {
    settingFunctions.init();
    settingFunctions.summernoteSaveFiles();
});