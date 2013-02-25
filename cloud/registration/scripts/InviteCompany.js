kerio.register.InviteCompany = {

	_isSent: false,

	showCheckEmail: function(response, params) {
		var
			email = params.email,
			token = params.token,
			resendLink = $('.resendLink');

		kerio.register.InviteCompany._isSent = true;
		kerio.register.InviteCompany.swapForms();

		if(!email) {
			email = 'your email';
		}
		else {

			if (!kerio.register.InviteCompany._clickHandlerSet) {

				resendLink.bind('click touch', this, function(event) {
					kerio.register.InviteCompany.swapForms();
					event.preventDefault();
					event.stopPropagation();
					
				});

				kerio.register.InviteCompany._clickHandlerSet = true;
			}
		}

		$('.emailText').text(email); //XSS safe
	},

	swapForms: function() {

		$('.createAccountWrap')[kerio.register.InviteCompany._isSent ? 'hide' : 'show']();
		$('.checkEmailWrap')[kerio.register.InviteCompany._isSent ? 'show' : 'hide']();
		
		if (kerio.register.InviteCompany._isSent) {
			$('.signup_mid_header').text('Thank you!');
		}
		else {
			$('.signup_mid_header').text('Sign up today & get up to 10GB of file-sharing space free!');
		}

		kerio.register.InviteCompany._isSent = !kerio.register.InviteCompany._isSent;
	},
	
	init: function(formContainerSelectors) {
		formContainerSelectors = [].concat(formContainerSelectors);
		
		var i,
		form,
		formContainerEl,
		urlParams = kerio.register.RegisterUtils.getUrlParameters(),
		email = urlParams.email,
		token = urlParams.token,
		cnt = formContainerSelectors.length,
		formDefinition = {
			formContainerSelector: '.container',
			submitButtonSelector: '.submitButton',
			errorReportSelector: '.verificationAlert',

			// defines submit succes location (where the user is redirect on successful submit)
			onSuccessSubmitLocation: '',

			onSubmitComplete: function(response, params) {
				kerio.register.RegisterUtils.assignCustomer(params.email);
				kerio.register.InviteCompany.showCheckEmail(response, params);
			},

			// enables to send value of some input as URL parameter to submit success location
			submitLocationParam: [{
				inputName: 'emailInput',
				paramName: 'email'
			}, {
				inputName: 'token',
				paramName: 'token'
			}],

			jsonTemplate: {
				token : 'token',
				email : 'emailInput'
			},

			apiMethodName: 'Register.inviteCompany',

			visibleFields: [ //selectors down from 'formContainerSelector' parent
				{selector: '.emailInput', type: 'email'}
			],

			hiddenFields: [
				{selector: '.token', name: 'token'}
			]
		};
		
		for (i = 0; i < cnt; i++) {
			formDefinition.formContainerSelector = formContainerSelectors[i];
			
			form = new kerio.register.FormHandler(formDefinition);
			form.registerSubmitHandlers();
			
			formContainerEl = $(formDefinition.formContainerSelector);

			if(email) {
				$('.emailInput', formContainerEl).val(email);
			}

			// TODO: temporary solution
			if(typeof token !== 'string') {
				$('.token', formContainerEl).val('default token');
			}
		}
		
	}
};