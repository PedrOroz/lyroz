!function ($) {

	"use strict";

	// Global Onyx object
	var Onyx = Onyx || {};


	Onyx = {

	    /**
		 * Fire all functions
		**/
		init: function() {
			var self = this,
				obj;

			for (obj in self) {
				if ( self.hasOwnProperty(obj)) {
					var _method =  self[obj];
					if ( _method.selector !== undefined && _method.init !== undefined ) {
						if ( $(_method.selector).length > 0 ) {
							_method.init();
						}
					}
				}
			}
		},


		/**
		 * New user register form
		**/
		registerationForm: {
			selector: 'form#<?php echo $id_form; ?>',
			init: function(){
				var base = this,
					container = $(base.selector),
					limitRuns = 0;

				container.bootstrapValidator({
					container: container.find('.alert-danger')[0], // Select the messages container
					feedbackIcons: {
						valid: 'fas fa-circle-check',
						invalid: 'fas fa-circle-exclamation',
						validating: 'fas fa-arrows-rotate'
					},
					fields: {
						email: {
			                validators: {
			                    regexp: {
			                        regexp: /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,
			                        message: 'The username can only consist of alphabetical, number and underscore'
			                    }
			                }
			            }

					},
					live: 'submitted',
					onError: function(e) {
						/*container.find('.alert-danger').stop(0,0).slideDown(500,function(){
							$(this).css('height','auto');
						});*/
					},
                    onSuccess: function(e) {

                    	// Bootstrap validation was running success three time so I had to limit it this way
						if ( limitRuns == 0 ) {

							if ( grecaptcha.getResponse() !== 0 )
								grecaptcha.execute(); // Start the Google recaptcha

							limitRuns++;
						}
                    }
				});
			}
		}
	}

	$(document).ready(function() {
		Onyx.init();
	});


}(jQuery);


/**
 * Init recaptcha
 */
if (typeof grecaptcha !== 'undefined') {

	console.log('Recaptcha is here');

	var reCaptchaIDs = [];

	var initRecaptcha = function () {
		jQuery('.recaptcha').each(function (index, el) {
			var container = jQuery(this).parents('form');
			var tempID = grecaptcha.render(el, {
				'sitekey': '<?php echo SITE_KEY; ?>',
				'theme': 'light',
				//'badge': 'inline',
				'size': 'invisible',
				'callback': function (token) { // We may need the token later, who knows!
					globalFormsAjax(token, container);
				}
			});
			reCaptchaIDs.push(tempID);
		});
	};

	//Reset reCaptcha
	var recaptchaReset = function () {
		if (typeof reCaptchaIDs != 'undefined') {
			var arrayLength = reCaptchaIDs.length;
			for (var i = 0; i < arrayLength; i++) {
				grecaptcha.reset(reCaptchaIDs[i]);
			}
		}
	};
}


/**
 * The callback
**/
var globalFormsAjax = function(token, container){
	$.ajax({
		method: "POST",
		url: "<?php echo URL; ?>forms_php/general-form.php", // Validate the recaptcha challenge
		//TIPO DE ENVIO DE DATOS
            //SERIALIZE()
                //CUANDO SOLO SE MANDEN DATOS DEL FORM
                //data: container.serialize(),
            //FORMDATA
                //CUANDO SE QUIERA MANDAR PARAMETROS Y DATOS DEL FORMULARIO
                    //processData: false,
                    //contentType: false,
		//dataType:'json',
	    data: new FormData(document.getElementById(id_form)),
	    cache: false,
        contentType: false,
        processData:false,
	    beforeSend: function(xhr) {
			// Show our loader
			container.append('<div class="loading-container"><div class="loading-spinner"><div class="circle_01"></div><div class="circle_02"></div><div class="circle_03"></div><div class="circle_04"></div><div class="circle_05"></div><div class="circle_06"></div><div class="circle_07"></div><div class="circle_08"></div></div></div>');
			container.addClass('ajax-loader');
		},
		success: function(responseObj){
			// Stop the loader
			container.removeClass('ajax-loader');
			container.children('.loading-container').remove();

			// Show error message - Messages are in the PHP functions
			if(responseObj.status == "success") {

				// Now we are OK to submit our form
				container.submit();

				switch (responseObj.show) {
					case 1://Show a success message (just for testing)
						container.find('.alert-success').html(responseObj.info).stop(0,0).slideDown(500,function(){
							$(this).css('height','auto');
							$(this).delay(500).fadeOut(2000, function(){});
						});
					    break;
					case 2:// Show a modal
						//If the form is within a modal, first close it
						if(responseObj.form == "modal") {
							$("#"+responseObj.id_modal).modal("hide");
						}
						//Then show the second modal
						const myTimeout = setTimeout(myGreeting, 100);
						function myGreeting() {
		  					$("#graciasModal").modal("show");
		  				}
					    break;
					case 3:// If you want to show thank-you page
						window.location.href='<?php echo URL; ?>gracias';
					    break;
					case 4:// Google Sheet
						const tiempoTranscurrido = Date.now();
						const hoy = new Date(tiempoTranscurrido);

						var formData = new FormData(document.forms['submit-form']);
							formData.append("Registro", hoy.toLocaleDateString("es-MX"));

						fetch('<?php echo GOOGLE_SHEET1; ?>', { 
							method: 'POST', 
							body: formData
						}).then(
							//response 	=> console.error('Success!', response)
							response 	=> window.location.href = url_global+url_desktop
						 ).catch(
							error 		=> console.error('Error!', error.message)
						 )
					    break;
					default:
				    	
				    break;
				}
				// Reset recaptcha challenge if it's here
				/*if (typeof grecaptcha !== 'undefined') {
					recaptchaReset();
				}*/
				// Reset the form fields
				resetForm(container);
			}else{
				// Show the error message
					container.find('.alert-danger').html(responseObj.info).stop(0,0).slideDown(500,function(){
						$(this).css('height','auto');
					});
				 }
		}
	});
}
/**
 * Reset form fields
**/
var resetForm = function ( $form ) {

	// Reset the error message
	$form.find('.alert-danger').stop(0,0).slideUp(500,function(){
		$(this).css('height','auto').html('');
	});

	$form.find('input:not([readonly]), select, textarea').val('');
	$form.find('input:radio:not([readonly]), input:checkbox:not([readonly])').removeAttr('checked').removeAttr('selected');
	$('.form-check-input').prop('checked', false);
	$form.find('input:text, input:password, input, input:file, select, textarea, input:radio, input:checkbox').parent().find('.form-control-feedback').hide();
	$form.find('.has-feedback').removeClass('has-feedback');
	$form.find('.has-success').removeClass('has-success');
	$form.find('button:submit').removeAttr('disabled',false);
	$form.find('input:hidden').remove();
};