let registerFunctions = new(function() {

    //Forms especificos
    this.registerForms = function(){
        var id_submit1 = "registerGeneralUserFront",
            id_submit2 = "registerSpecificUserFront";

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
                            //REGISTRAR USUARIO DESDE FRONT
                            if(form.id == "registerGeneralUserFront"){
                                $("#"+id_submit1+" .invalid-feedback").css("display","none").text("");

                                //OBTENER LADAS
                                var formData               = new FormData(document.getElementById(id_submit1)),
                                    lada_telephone_user    = $('.telephone_user .iti__selected-dial-code').text(),
                                    lada_cell_phone_user   = $('.cell_phone_user .iti__selected-dial-code').text();

                                formData.append("lada_telephone_user", lada_telephone_user);
                                formData.append("lada_cell_phone_user", lada_cell_phone_user);

                                $.ajax({
                                    type: "POST",
                                    url:  url_global+"new-reg-g-u-f",
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
                                        $("#emailConfirmation, #password2").css("border-color","#dee2e6");
                                        //INHABILITAR BTN ENVIAR
                                        $('#'+id_submit1 + " button[type=submit]").attr("disabled","disabled");
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
                                                    //HABILITAR BTN ENVIAR
                                                    $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
                                                    //RESETEAR FORM
                                                    $("#"+id_submit1)[0].reset();
                                                },
                                                before_close: function(PNotify){
                                                    if(response.redireccionar == "true"){
                                                        window.location.href = url_global+url_desktop;
                                                    }
                                                }
                                            });
                                        }else{
                                                //HABILITAR BTN ENVIAR
                                                $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');

                                                if(response.focus){
                                                    //focus
                                                        //0 = Sin efecto
                                                        //1 = Focus en input de email
                                                        //2 = Focus en input de contraseña

                                                    if(response.focus == 1){
                                                        $("#emailConfirmation").css("border-color","#d2322d");
                                                    }
                                                    if(response.focus == 2){
                                                        $("#password2").css("border-color","#d2322d");
                                                    }
                                                }else{
                                                        new PNotify({
                                                            title: title,
                                                            text: response.error,
                                                            type: 'error',
                                                            before_init: function()
                                                            {
                                                            },
                                                            before_close: function(PNotify){
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
                            //REGISTRAR USUARIO ESPECIFICO DESDE FRONT
                            if(form.id == "registerSpecificUserFront"){
                                $("#"+id_submit2+" .invalid-feedback").css("display","none").text("");

                                //OBTENER LADAS
                                var formData               = new FormData(document.getElementById(id_submit2)),
                                    lada_telephone_user    = $('.telephone_user .iti__selected-dial-code').text(),
                                    lada_cell_phone_user   = $('.cell_phone_user .iti__selected-dial-code').text();

                                formData.append("lada_telephone_user", lada_telephone_user);
                                formData.append("lada_cell_phone_user", lada_cell_phone_user);

                                $.ajax({
                                    type: "POST",
                                    url:  url_global+"new-reg-s-u-f",
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
                                        $("#emailConfirmation, #password2").css("border-color","#dee2e6");
                                        //INHABILITAR BTN ENVIAR
                                        $('#'+id_submit2 + " button[type=submit]").attr("disabled","disabled");
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
                                                    //HABILITAR BTN ENVIAR
                                                    $('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');
                                                    //RESETEAR FORM
                                                    $("#"+id_submit2)[0].reset();
                                                },
                                                before_close: function(PNotify){
                                                    if(response.redireccionar == "true"){
                                                        window.location.href = url_global+url_desktop;
                                                    }
                                                }
                                            });
                                        }else{
                                                //HABILITAR BTN ENVIAR
                                                $('#'+id_submit2 + " button[type=submit]").removeAttr('disabled');

                                                if(response.focus){
                                                    //focus
                                                        //0 = Sin efecto
                                                        //1 = Focus en input de email
                                                        //2 = Focus en input de contraseña

                                                    if(response.focus == 1){
                                                        $("#emailConfirmation").css("border-color","#d2322d");
                                                    }
                                                    if(response.focus == 2){
                                                        $("#password2").css("border-color","#d2322d");
                                                    }
                                                }else{
                                                        new PNotify({
                                                            title: title,
                                                            text: response.error,
                                                            type: 'error',
                                                            before_init: function()
                                                            {
                                                            },
                                                            before_close: function(PNotify){
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
                         }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    };
    //función de arranque
    this.init = function() {
        registerFunctions.registerForms();
    }
});
$(function() {
    registerFunctions.init();
});