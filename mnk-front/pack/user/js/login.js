document

var Login = function () {
    
    return {
        //main function to initiate the module
        init: function () {
        	
           $('.login-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                user_log: {
	                    required: true
	                },
	                pw_log: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                user_log: {
	                    required: "Votre nom d'utilisateur est requis."
	                },
	                pw_log: {
	                    required: "Votre mot de passe est requis."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-error', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();

	            },

	            errorPlacement: function (error, element) {
	                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	            	//$('.login-form').trigger("submit")
	            	var form = $('.login-form');
	            	var action = form.attr("action");
	            	var data = form.serialize();
	            	$.post(action,data,function (eval){
	            		if(eval.error==""){
	            			$(".content").animate({"margin-top":"50","opacity":0},750);
							// $("img.bg-full").fadeOut(750,function(){
								
							// });
	            	window.location.href = "http://"+window.location.host;
	            		}
	            		else{
	            			$(".alert.alert-error").show().find("span").html(eval.error);
	            		}

	            	},"JSON")
	               
	            }
	        });


	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                  	var form = $('.login-form');
		            	var action = form.attr("action");
		            	var data = form.serialize();
		            	$.post(action,data,function (eval){
		            		if(eval.error=="")
		            			{$(".content").animate({"margin-top":"50","opacity":0},750);
								// $("img.bg-full").fadeOut(750,function(){
									
								// });
		            	window.location.href = "http://"+window.location.host;
							}
		            		else{
		            			$('.login-form').find(".alert.alert-error").show().find("span").html(eval.error);
		            		}

	            		},"JSON")
	                }
	                return false;
	            }
	        });

	        $('.forget-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Une adresse Email valide est requise.",
	                    email: "Ceci n'est pas une adresse mail valide.",

	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                window.location.href = "index.html";
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    window.location.href = "index.html";
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form').hide();
	        });

	        $('.register-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                user_crea: {
	                    required: true
	                },
	                pw_crea: {
	                    required: true
	                },
	                rpw_crea: {
	                    equalTo: "#register_password"
	                },
	                mail_crea: {
	                    required: true,
	                    email: true
	                },
	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Acceptez les conditions d'utilisation SVP."
	                },
	                user_crea: {
	                    required: "Un nom d'utilisateur est requis."
	                },
	                pw_crea: {
	                    required: "Un mot de passe est requis."
	                },
	                rpw_crea: {
	                    required: "Un mot de passe est requis.",
	                    equalTo:"Le mot de passe ressaisi ne correspond pas."
	                },
	                mail_crea: {
	                    required: "Une adresse Email est requise.",
	                    email: "Ceci n'est pas une adresse mail valide.",

	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.addClass('help-small no-left-padding').insertAfter($('#register_tnc_error'));
	                } else {
	                    error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	                }
	            },

	            submitHandler: function (form) {
	               var form = $('.register-form');
		            	var action = form.attr("action");
		            	var data = form.serialize();
		            	$.post(action,data,function (eval){
		            		if(eval.error=="")
		            			{
		            				var msg = "<div class='mnk-msg mnk-msg-success'>"+eval.success+"</div>";
		            				var msg = msg+"<br><span class='small'>Vous allez être rediriger dans 5sec";
		            				$(document).mnkModal(msg);
		            				setTimeout(function(){
		            					window.location.href = "http://"+window.location.host;
		            				},5000)
		            			}
		            		else{
		            			$(document).mnkModal("<div class='mnk-msg mnk-msg-error'>"+eval.error+"</div>");
		            			// $('.register-form').find(".alert.alert-error").show().find("span").html(eval.error);
		            		}

	            		},"JSON")
	            }
	        });

	        jQuery('#register-btn').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.register-form').show();
	        });

	        jQuery('#register-back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.register-form').hide();
	        });
        }

    };

}();