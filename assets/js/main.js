import Lenis from 'lenis'

let LangWsite = new(function() {
    //Detectamos en que dispositivo se navega
    this.isMobile = function() {
        var windowsCheck = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (windowsCheck < 768) {
            document.view = 'smart';
        } else {
            document.view = 'desk';
        }
    }
    //Header Affix
    this.scrolled = function(){
        var position = $(window).scrollTop();
        $(window).scroll(function() {
            //console.log(position);
            var scroll = $(window).scrollTop();
            if(scroll > position) {
                //ABAJO
                $('.navbar').removeClass('scrollup').css('top','-100%');
            } else {
                //ARRIBA
                if(position < 36){
                    $('.navbar').removeClass('scrollup').css('top','0');
                }else{
                    $('.navbar').addClass('scrollup').css('top','0');
                     }
            }
            position = scroll;
        });
        /*window.onscroll = function () {
            if ($(window).scrollTop() > 150)
                $('.navbar').addClass('scrollup')
            else
                $('.navbar').removeClass('scrollup')
        }*/
    }
    //Menu hamburguesa
    this.navTrigger = function(){
        var navTrigger = document.querySelector('.nav-trigger');

        navTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.toggle('is-active');
        }, false);
    }
    //Bottom Bar Wrapper
    this.bottomBarWrapper = function(){
        var position        = $(window).scrollTop(),
            headerHeight    = 97,
            footerHeight    = 463,
            bodyHeight      = $("body").height(),
            scrollHeight    = 0;

        if(bodyHeight < 1400) {
            scrollHeight    = 60;
        }else{
            scrollHeight    = (bodyHeight - headerHeight - footerHeight) / 2;
        }
        //console.log(scrollHeight);

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if(scroll > position) {
                if(position > scrollHeight){
                    $('.bottomBarWrapper').css('bottom','0');
                }else{
                    $('.bottomBarWrapper').css('bottom','-60px');
                      }
            }else{
                //ARRIBA
                if(position < scrollHeight){
                    $('.bottomBarWrapper').css('bottom','-60px');
                }
            }
            position = scroll;
        });
    }
    //scroll-to-top
    this.scrollToTop = function(a) {
        a.preventDefault();

        if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
            window.scrollTo(0,0) // first value for left offset, second value for top offset
        }else{
                $("html, body").animate({ scrollTop: 0 }, 800);
             }

        return false;
    }
    //Smooth Scroll
    this.smoothScroll = function(b) {
        if (this.hash !== "") {
            b.preventDefault();
            // Store link's hash value into variable
            const hash = this.hash;
            // console.log(hash)
            // Animate html & body to the hash value position
            if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
                window.scrollTo(0,$(hash).offset().top-$('.navbar').outerHeight()) // first value for left offset, second value for top offset
            }else{
                    $('html, body').stop(true,true).animate({
                        scrollTop: $(hash).offset().top-$('.navbar').outerHeight()
                    },1000);
                 }
        }
    }
    //Lenis - Basic
    this.isBasicLenis = function() {
        // Initialize Lenis
        const lenis = new Lenis({
        autoRaf: true,
        });

        // Listen for the scroll event and log the event data
        lenis.on('scroll', (e) => {
        console.log(e);
        });
    }
    //Lenis - Custom raf loop
    this.isCustomLenis = function() {
        // Initialize Lenis
        const lenis = new Lenis();

        // Use requestAnimationFrame to continuously update the scroll
        function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    }
    //Forms generales
    this.generalForms = function() {
        var id_submit1 = "logIn";

        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    event.preventDefault()

                    if(!form.checkValidity()){
                        event.stopPropagation()
                    }else{
                            if(form.id == "logIn"){
                                $("#"+id_submit1+" .invalid-feedback").css("display","none").text("");

                                $.ajax({
                                    type: "POST",
                                    url:  url_global+"s-lo-in-f",
                                    //TIPO DE ENVIO DE DATOS
                                        //SERIALIZE()
                                            //CUANDO SOLO SE MANDEN DATOS DEL FORM
                                        //FORMDATA
                                            //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                                                //processData: false,
                                                //contentType: false,
                                    data : $("#"+id_submit1).serialize(),
                                    cache: false,
                                    //processData: false,
                                    //contentType: false,
                                    beforeSend:function(){
                                        $("#email_usuario, #pwd").css("border-color","#ced4da");
                                        //INHABILITAR BTN ENVIAR
                                        $('#'+id_submit1 + " button[type=submit]").attr("disabled","disabled");
                                    },
                                    success:function(response)
                                    {
                                        //QUITAR CLASE
                                        form.classList.remove('was-validated');

                                        if(response.estado == "true")
                                        {
                                            new PNotify({
                                                title: "Iniciar sesión",
                                                text: response.resultado,
                                                type: 'success',
                                                delay: 1000,
                                                before_init: function(){
                                                    //CERRAR MODAL
                                                    $("#logInModal").modal("hide");
                                                    //HABILITAR BTN ENVIAR
                                                    $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
                                                    //RESETEAR FORM
                                                    $("#"+id_submit1)[0].reset();
                                                },
                                                before_close: function(PNotify){
                                                    //id_role
                                                        // 1 = Súper Administrador
                                                        // 2 = Administrador
                                                        // 3 = Usuario
                                                        // 4 = Vendedor
                                                        // 5 = Diseñador
                                                        // 6 = Chef

                                                    if(response.role == 1 || response.role == 2){
                                                        //lo mandamos al home del CMS
                                                        window.location.href = url_global+"76524894_admin/"+ response.page;
                                                    }else{
                                                            if(response.role == 6){
                                                                //lo mandamos a solicitudes del CMS
                                                                window.location.href = url_global+"76524894_admin/proposals-menu";
                                                            }else{
                                                                    //3 = Se inicio sesion con role de usuario, por lo tanto lo mandamos al dashboard del front
                                                                window.location.href = url_global+"dashboard";
                                                                 }
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
                                                        $("#email_usuario").css("border-color","#d2322d");
                                                        $("#logIn .email .invalid-feedback").css("display","block").text(response.error);
                                                    }
                                                    if(response.focus == 2){
                                                        $("#pwd").css("border-color","#d2322d");
                                                        $("#logIn .password .invalid-feedback").css("display","block").text(response.error);
                                                    }
                                                }else{
                                                        new PNotify({
                                                            title: "Iniciar sesión",
                                                            text: response.error,
                                                            type: 'error',
                                                            before_init: function()
                                                            {
                                                                //CERRAR MODAL
                                                                $("#logInModal").modal("hide");
                                                                //RESETEAR FORM
                                                                $("#"+id_submit1)[0].reset();
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
                                                msg = "Página solicitada no encontrada. [404].";
                                            } else if (jqXHR.status == 500) {
                                                msg = "Error interno del servidor [500].";
                                            } else {
                                                msg = "Error no detectado. " + jqXHR.responseText;
                                            }
                                            new PNotify({
                                                title: "Iniciar sesión",
                                                text: msg,
                                                type: 'error',
                                                before_init: function(){
                                                    //HABILITAR BTN ENVIAR
                                                    $('#'+id_submit1 + " button[type=submit]").removeAttr('disabled');
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
    }
    //Mostrar última notificación del chat
    this.lastNotificationChatU = function() {
        $.post(url_global+'lst-notifiction-cht-u-f',function(response, status){
            //console.log(response.status);
            switch (response.status) {
                case 1://ERROR
                    console.log(response.msg);
                break;
                case 2://NO EXISTE NINGUNA NOTIFICACION
                    $(".navbar #dropdown-notificaciones .dropdown-menu ul").html('<li><span class="message text-dark text-center px-3 d-block">Aún no hay mensajes</span></li>');
                break;
                case 3://CORRECTO
                    $(".navbar #dropdown-notificaciones .dropdown-menu ul").html(response.msg);
                    if(response.total_unseen_conversations > 0){
                        $(".navbar #dropdown-notificaciones a.notification-icon .badge").html(response.total_unseen_conversations);
                    }
                break;
                default:
                    //window.location.href = url_global;
            }
        });
    }
    //función de arranque
    this.init = function() {
        $(window).resize(LangWsite.isMobile).trigger('resize');

        if($("nav").hasClass("navbar")){
            LangWsite.scrolled();
        }

        if($("button").hasClass("nav-trigger")){
            LangWsite.navTrigger();
        }

        if($("div").hasClass("bottomBarWrapper")){
            LangWsite.bottomBarWrapper();
        }

        //this.isBasicLenis();
        this.isCustomLenis();
    }
});
$(document).ready(function() {
    LangWsite.init();

    $('.scroll-to-top').on('click', LangWsite.scrollToTop);
    $('a[href^="#"]').on('click', LangWsite.smoothScroll);
    $('[data-bs-toggle="tooltip"]').tooltip();

    LangWsite.generalForms();

    if(id_page > 7){
        /*LangWsite.lastNotificationChatU();
        //EJECUTAR LA FUNCION CADA 10 SEGUNDOS
        setInterval(LangWsite.lastNotificationChatU, 10000);*/
    }

    jQuery.event.special.touchstart = {
        setup: function (_, ns, handle) {
            this.addEventListener('touchstart', handle, { passive: !ns.includes('noPreventDefault') });
        }
    };
    jQuery.event.special.touchmove = {
        setup: function (_, ns, handle) {
            this.addEventListener('touchmove', handle, { passive: !ns.includes('noPreventDefault') });
        }
    };

    //ANIMACION EN DROPWDOWN
    if($("ul").hasClass("dropdown-animation")){
        addEventListener("mousemove", (event) => {
            const element = document.querySelector('.dropdown-animation');
            element.classList.add('animate__animated', 'animate__bounceIn', 'animate__slow');

            element.addEventListener('animationend', () => {
            });
        });
    }
});

// Esperar a que el DOM esté listo
document.addEventListener('DOMContentLoaded', function () {
});