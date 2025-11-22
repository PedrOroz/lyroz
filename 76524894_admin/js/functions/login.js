(function($) {

	'use strict';

	$("#email_usuario").focus();

	let id_submit1 		= "#login",
		button1 		= "button[type=submit]",
		$submit1 		= $(id_submit1).find(button1);

	$submit1.on('click', function(ev){
		ev.preventDefault();
		var validated_submit1 = $(id_submit1).valid();
		if(validated_submit1){
			$.ajax({
				type: "POST",
				url:  url_admin+'/s-lo-in-b',
				//TIPO DE ENVIO DE DATOS
                    //SERIALIZE()
                        //CUANDO SOLO SE MANDEN DATOS DEL FORM
                    //FORMDATA
                        //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                            //processData: false,
                            //contentType: false,
				data: $(id_submit1).serialize(),
				cache: false,
				//processData: false,
                //contentType: false,
				beforeSend:function(){
					$("#email_usuario, #pwd").css("border-color","#ced4da");
					//INHABILITAR BTN ENVIAR
					$(id_submit1 + " button[type=submit]").attr("disabled","disabled");
				},
				success:function(response)
				{
					if(response.estado == "true")
					{
						new PNotify({
							title: title_pnotify,
							text: response.resultado,
							type: 'success',
							delay: 1000,
							before_init: function(){
								//HABILITAR BTN ENVIAR
                                $(id_submit1 + " button[type=submit]").removeAttr('disabled');
                                //RESETEAR FORM
								$(id_submit1)[0].reset();
							},
							before_close: function(PNotify){
								//id_role
									// 1 = Súper Administrador
			                    	// 2 = Administrador
			                    	// 3 = Usuario
			                   	 	// 4 = Vendedor
			                    	// 5 = Diseñador
			                    	// 6 = Chef
			                    	// 7 = Editor
			                    	
								if(response.role == 1 || response.role == 2 || response.role == 7){
									//lo mandamos al home del CMS
									window.location.href = url_admin + "/" + response.page;
								}else{
										if(response.role == 6){
											//lo mandamos a solicitudes del CMS
											window.location.href = url_admin + "/proposals-menu";
										}else{
											//3 = Se inicio sesion con role de usuario, por lo tanto lo mandamos al home del front
											window.location.href = url_front+"dashboard";	
											 }
									 }
							}
						});
					}else{
							if(response.focus){
                                //focus
                                    //0 = Sin efecto
                                    //1 = Focus en input de email
                                    //2 = Focus en input de contraseña
                                    
                                if(response.focus == 1){
                                   $("#email_usuario").css("border-color","#d2322d");
                                }
                                if(response.focus == 2){
                                   $("#pwd").css("border-color","#d2322d");
                                }
                            }
                    		new PNotify({
                                title: title_pnotify,
                                text: response.error,
                                type: 'error',
                                before_init: function()
                                {
                                	//HABILITAR BTN ENVIAR
                                	$(id_submit1 + " button[type=submit]").removeAttr('disabled');
                                }
                            });
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
							title: title_pnotify,
							text: msg,
							type: 'error',
							before_close: function(PNotify){
							}
						});
					}
				}
			});
		}
	});
}).apply(this, [jQuery]);