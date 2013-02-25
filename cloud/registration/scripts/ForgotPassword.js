kerio.register.ForgotPassword = {
	
	_isSent: false,
	
	showCheckEmail: function(response) {
		var
			params = this.params,
			email = params.email,
			token = params.token,
			resendLink = $('.resendLink');

		kerio.register.ForgotPassword._isSent = true;
		kerio.register.ForgotPassword.swapForms();

		if(!email) {
			email = 'your email';
		}
		else {

			if (!kerio.register.ForgotPassword._clickHandlerSet) {

				resendLink.bind('click touch', this, function(event) {
					kerio.register.ForgotPassword.swapForms();
					event.preventDefault();
					event.stopPropagation();
					
				});

				kerio.register.ForgotPassword._clickHandlerSet = true;
			}
		}

		$('.emailText').text(email); //XSS safe
	},

	swapForms: function() {

		$('.forgotPasswordWrap')[kerio.register.ForgotPassword._isSent ? 'hide' : 'show']();
		$('.checkEmailWrap')[kerio.register.ForgotPassword._isSent ? 'show' : 'hide']();

		kerio.register.ForgotPassword._isSent = !kerio.register.ForgotPassword._isSent;
	},
	
	init: function(){
		var
			form,
			formDefinition,
			urlParams = kerio.register.RegisterUtils.getUrlParameters(),
			email = urlParams.email;

		if (email) {
			$('.emailInput').attr('value', email);
		}

		formDefinition = {
			// id of element that is container of form (it could be div)
			formContainerSelector: '.formMail',

			submitButtonSelector: '.submitButton',
			errorReportSelector: '.verificationAlert',

			onSubmitComplete: kerio.register.ForgotPassword.showCheckEmail,

			// enables to send value of some input as URL parameter to submit success location
			submitLocationParam: [{
				inputName: 'emailInput',
				paramName: 'email'
			}],

			jsonTemplate: {
				email : 'emailInput'
			},

			apiMethodName: 'Register.sendForgotPassword',

			hiddenFields: [
			],

			visibleFields: [
				{selector: '.emailInput', type: 'email'}
			]
		};

		form = new kerio.register.FormHandler(formDefinition);
		form.registerSubmitHandlers();
	}
}