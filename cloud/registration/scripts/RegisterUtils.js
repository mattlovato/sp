window.kerio = window.kerio || {};
kerio.register = kerio.register || {};

kerio.register.RegisterUtils = {

	MAX_FIELD_LENGTH: 255,
	MIN_PASSWORD_LENGTH: 6,
	JSON_API_PATH: '/register/api/jsonrpc/',
	EMAIL_REGEX: /^(?=[\-a-zA-Z0-9_!=\+&'\?\^\{\}~\.]{1,127}@)[\-a-zA-Z0-9_!=\+&'\?\^\{\}~]+(\.[\-a-zA-Z0-9_!=\+&'\?\^\{\}~]+)*@(?=[\-a-zA-Z0-9_\.]{1,67}$)[\-a-zA-Z0-9_]+(\.[\-a-zA-Z0-9_]+)*$/,

	request: function(config) {

		if(config.scope && config.scope.login) {
			config.scope.login.loginMethod = this.loginUser;
		}

		var request = {
			url      : window.location.protocol + '//' +  window.location.host + this.JSON_API_PATH,
			type   : "POST",
			timeout  : 60000,
			success  : config.complete || $.noop, //param swap by purpose (success->complete)
			error  	 : config.error || config.failure || config.complete || $.noop, //TODO: handle server errors before failure call
			context  : config.scope || this,

			headers  : {
				"Accept"       : "application/json-rpc",
				"Content-Type" : "application/json"
			},
			// complete : config.complete || $.noop, // TODO: callback should be checked against error return codes
			processData: false,
			dataType: 'json',
			data: $.toJSON({
				"jsonrpc" : "2.0",
				"id" : 1,
				"method" : config.method,
				"params" : config.params || {}
			})
		};

		$.ajax(request);
	},

  // returns all parameters from URL query as map (object)
  getUrlParameters: function() {
    var 
      matchGroup,
      pl     = /\+/g,  //
      search = /([^&=]+)=?([^&]*)/g,
      decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
      query  = window.location.search.substring(1),
      urlParams = {};

    while ((matchGroup = search.exec(query))) {
      urlParams[decode(matchGroup[1])] = decode(matchGroup[2]);
    }

    return urlParams;
  },

  // removes whitespaces form string
	removeWhitespaces: function(string) {
		return string.replace(/^\s+|\s+$/g,'');
	},

	passwordQuality: function(password) {
		var
			message = '',
			length = 0;
			// classes = 0,
			// lowerCaseReg = /[a-z]/,
			// upperCaseReg = /[A-Z]/,
			// numberReg = /[0-9]/,
			// specialCaseReg = /[^a-zA-Z0-9]/;

			// pwdStrenght = $('#' + pwdStrenghtId),
			// pwdMessage = $('#' + pwdMessageId);

		/*if(lowerCaseReg.test(password)) {
			classes++;
		}
		if(upperCaseReg.test(password)) {
			classes++;
		}
		if(numberReg.test(password)) {
			classes++;
		}
		if(specialCaseReg.test(password)) {
			classes++;
		}*/

		if(password.length < kerio.register.RegisterUtils.MIN_PASSWORD_LENGTH) {
			
			
			message = 'Enter at least ' + kerio.register.RegisterUtils.MIN_PASSWORD_LENGTH + ' characters';	
			/*
			if(password.length) {
				
				// pwdMessage.html('Enter at least 6 characters');
				// pwdStrenght.css('display', 'block');
				// pwdStrenght.addClass('pwdWeak');
				// pwdStrenght.removeClass('pwdStrong');
			}
			else {
				message = 'Tip: Enter 3 or more words - easy to remember and hard to break ;)';
				// pwdMessage.html('Tip: Enter 3 or more words - easy to remember and hard to break ;)');
				// pwdStrenght.css('display', 'block');
				// pwdStrenght.addClass('pwdNone');
				// pwdStrenght.removeClass('pwdWeak');
			}*/
			// return 0;
		}
		// else {
		// 	pwdStrenght.css('display', 'none');
		// 	pwdStrenght.addClass('pwdOk');
		// 	return 1;
		// }

		return message;
	},

	passwordParity: function(password, password2) {
		if (password2.length !== 0 && password !== password2) {
			return 'Passwords do not match';
		}

		return '';
	},

	checkPasswords: function(password, password2, pwdStrenghtSelector, pwdMessageSelector) {
		var 
			pwd1message,
			parity,
			show = false,
			pwdStrenght = $(pwdStrenghtSelector),
			pwdMessage = $(pwdMessageSelector);

			pwd1message = kerio.register.RegisterUtils.passwordQuality(password);

			if (pwd1message !== '') {
				pwdMessage.text(pwd1message); //XSS safe
				show = true;
			}
			else {
				parity = kerio.register.RegisterUtils.passwordParity(password, password2);

				if (parity !== '') {
					pwdMessage.text(parity); //XSS safe
					show = true;
				}
			}

			pwdStrenght.css('display', show ? 'block' : 'none');
	},

	// // toggles views (text/password) of password input
	// pwdToggle: function(target){
	// 	target = $(target);

	// 	debugger; //TODO: check target content
		
	// 	if(target) {
	// 		target.attr('type', (target.attr('type') === 'password') ? 'text' : 'password');
	// 	}
	// },

	limitInputCharSet: function(element, regex) {
		var target = $(element);

//		debugger;  //TODO: check target content

		if (target) {
			target.bind('keypress', function(evt) {
				var 
					theEvent = evt || window.event,
					key = theEvent.keyCode || theEvent.which;
				
				key = String.fromCharCode( key );

				if( !regex.test(key) ) {
					theEvent.returnValue = false;
					
					if(theEvent.preventDefault) {
						theEvent.preventDefault();
					}
				}
			});
		}
	},

	loginUser: function(response, params) {

		var
			name = this.login.name, 
			password = this.login.password,
			location = '/',
			handleResponse = function() {
				var 
					tokenRegExp = new RegExp('TOKEN_WORKSPACE=([a-z0-9\\-]+)', 'i'),
					token = tokenRegExp.exec(document.cookie),
				
					_handleResponse = function() {
						window.location.href = this.location;
					},
					request = {
					url      : window.location.protocol +'//' + window.location.hostname + '/' + this.company.publicId + '/server/data',
					type   : "POST",
					timeout  : 60000,
					success  : _handleResponse,
					error  	 : _handleResponse,
					context  : {
						location: this.location
					},

					headers  : {
						"Accept"       : "application/json-rpc",
						"Content-Type" : "application/json",
						"X-Token"	   : token !== null ? token[1] : ''
					},
					// complete : config.complete || $.noop, // TODO: callback should be checked against error return codes
					processData: false,
					dataType: 'json',
					data: $.toJSON({
						"jsonrpc" : "2.0",
						"id" : 1,
						"method" : 'User.init',
						"params" : {}
					})
				};

				if (this.init) {
					$.ajax(request);
				}
				else {
					window.location.href = this.location;
				}
			},
			request;

		//ONLY successful request are getting here, so we can access directly the 'result' object, if 'result' object doesn't exist bug is elsewhere (in some previous step)
		//TODO: remove the if
		if (response.result) {
			location = response.result.company ? response.result.company.url : '/';
		}

		request = {
			url      : window.location.protocol + '//' +  window.location.host + '/server/login',
			type     : "POST",
			timeout  : 30000,
			success  : handleResponse,
			error    : handleResponse,
			context  : {
				location : location,
				company: response.result ? response.result.company : {},
				init: this.init
			},
			headers  : {
				"Accept"       : "text/html",
				"Content-Type" : "application/x-www-form-urlencoded"
			},
			data: {
				"kerio_username" : name,
				"kerio_password" : password
			}
		};
		
		$.ajax(request);
	},
	
	assignCustomer: function(email) {
	
		kerio.register.RegisterUtils.request({
			method: 'Register.assignCustomer',
			params: {
				'email': email,
				'marketoCookie': $.cookie('_mkto_trk'),
				'data': kerio.register.marketoData
			}
		});
	}
};