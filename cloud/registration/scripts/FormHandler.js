

$.Class('kerio.register.FormHandler', {

	jsonTemplate: undefined,

	formConfig: undefined,

	init: function(cfg) {
		var
		field,
		queryParams = kerio.register.RegisterUtils.getUrlParameters(),
		templateFields = cfg.templateFields || [],
		i;
		
		this.fields = [];
		this.hiddenFields = [];

		this.formConfig = cfg;
	
		this._formContainerEl = $(cfg.formContainerSelector);

		for (i = 0; i < cfg.visibleFields.length; i++) {
			field = cfg.visibleFields[i];
			this.fields[i] = new kerio.register.FormField($(field.selector, this._formContainerEl), field.type, field.requiredSameValueSelector);
		}

		for (i = 0; i < cfg.hiddenFields.length; i++) {
			field = cfg.hiddenFields[i];
			this.hiddenFields[i] = $(field.selector, this._formContainerEl);
	  
			// load value of hidden fields from URL parameters
			if (queryParams.hasOwnProperty(field.name)) {
				this.hiddenFields[i].val(queryParams[field.name]);
			}
		}
		
		for (i = 0; i < templateFields.length; i++) {
			field = templateFields[i];
			
			if (queryParams.hasOwnProperty(field.name)) {
				$(field.selector).text(queryParams[field.name]); //XSS safe
			}
		}
	
		if (cfg.errorReportSelector) {
			this.errorEl = $(cfg.errorReportSelector, this._formContainerEl);
			this.defaultErrorMessage = this.errorEl.text();
		}

		this.jsonTemplate = cfg.jsonTemplate;

		this._createFieldHandlers();
	},

	registerSubmitHandlers: function() {
		// submit form on submit button click
		$(this.formConfig.submitButtonSelector, this._formContainerEl).bind('click touch', this, function(event) {	
			event.data._submit();
			event.preventDefault();
			return false;
		});

		// submit form on pressed ENTER
		this._formContainerEl.bind('keyup', this, function(event) {

			if(event.keyCode === 13) {
				event.data._submit();
				event.preventDefault();
				return false;
			}
		});
	},

	_createFieldHandlers: function() {
		var
		i = 0,
		context;
		
		for (i = 0; i < this.fields.length; i++) {
			context = {
				elements: this.fields,
				currentId: i,
				scope: this
			};

			this.fields[i].getElement().bind('focus', context, this._onFocusHandler);
//			this.fields[i].getElement().bind('blur', context, this._onBlurHandler);
		}
	},

	_onBlurHandler: function(event) {
		var params = event.data;

		params.elements[params.currentId].validate();
		params.scope._updateErrorAlert();
	},

	/*
	* Remove invalid flag of focused element (field) and validate all elements
	* (fields) that are placed above focused element.
	*/
	_onFocusHandler: function(event) {
		var
		params = event.data,
		scope = params.scope,
		sourceElement = params.elements[params.currentId],
		i;
		
		sourceElement.removeInvalidFlag();

		for (i = 0; i < scope.fields.length; i++) {
			params.elements[i].removeInvalidFlag();
		}

		params.scope._updateErrorAlert();
	},

	_updateErrorAlert: function() {
		var
		i,
		alertElement = this.errorEl;

		for(i = 0; i < this.fields.length; i++) {
			if(this.fields[i].isValid === false) {
				alertElement.css('display', 'block');
				return;
			}
		}

		alertElement.css('display', 'none');		
	},

	_submit: function() {

		if (this._isFormValid() === false || this._formSubmitting) {
			return;
		}
		
		if (this.formConfig.preSubmit !== undefined) {
			this.formConfig.preSubmit();
		}
		
		this._submitData(); //if form is valid
	},
	
	_submitData: function() {
		var
		jsonParams,
		jsonRequest,
		login,
		location,
		i,
		submitButton = $(this.formConfig.submitButtonSelector, this._formContainerEl),
		params = {};
		
		jsonParams = this._formToJson();

		if(this.formConfig.autoLogin) {
			login = {
				name: this._getFieldValue(this.formConfig.autoLogin.name),
				password: this._getFieldValue(this.formConfig.autoLogin.password)
			}
		}
		
		location = this.formConfig.onSuccessSubmitLocation;
		
		if(this.formConfig.submitLocationParam) {
			//TODO: check correct behavior against previous implementation
			location = location + '?' + this.formConfig.submitLocationParam[0].paramName + '=' + this._getFieldValue(this.formConfig.submitLocationParam[0].inputName);
			
			//params[this.formConfig.submitLocationParam[0].paramName] = jsonParams[this.formConfig.submitLocationParam[0].inputName];
			params[this.formConfig.submitLocationParam[0].paramName] = this._getFieldValue(this.formConfig.submitLocationParam[0].inputName);
			
			for(i = 1; i < this.formConfig.submitLocationParam.length; i++) {
				//TODO: check correct behavior against previous implementation
				location = location + '&' + this.formConfig.submitLocationParam[i].paramName + '=' + this._getFieldValue(this.formConfig.submitLocationParam[i].inputName);
				//params[this.formConfig.submitLocationParam[i].paramName] = jsonParams[this.formConfig.submitLocationParam[i].inputName];
				params[this.formConfig.submitLocationParam[i].paramName] = this._getFieldValue(this.formConfig.submitLocationParam[i].inputName);
			}
		}

		jsonRequest = {
			method: this.formConfig.apiMethodName,
			params: jsonParams,
			// success: kerio.register.RegisterUtils.handleResponse,
			complete: this._handleResponse,
			scope: {
				scope: this,
				location: location,
				login: login,
				params: params,
				init: this.formConfig.initFavorites || false,
				onSubmitComplete: this.formConfig.onSubmitComplete
			}
		};

		//disable submit button
		submitButton.attr('disabled', 'disabled');
		this._formSubmitting = true;
		this._oldLabel = submitButton.val();
		
		if (this._oldLabel === '') {
			this._oldLabel = submitButton.text();
			this._submitBtnIsDiv = true;
			submitButton.text('Please wait…');
		}
		else {
			submitButton.val('Please wait…');
		}

		kerio.register.RegisterUtils.request(jsonRequest);
	},

	_isFormValid: function() {
		var
		isValid = true,
		i,
		errorMessage = undefined;

		for (i = 0; i < this.fields.length; i++) {
			this.fields[i].validate();
			
			if (!this.fields[i].isValid && errorMessage === undefined) {
				if (this.fields[i].errorMessage === undefined) {
					errorMessage = this.defaultErrorMessage;
				} else {
					errorMessage = this.fields[i].errorMessage;
				}
			}
			isValid = (isValid && this.fields[i].isValid);
		}
		
		this.errorEl.text(errorMessage);		
		this._updateErrorAlert();

		return isValid;
	},

	_formToJson: function() {
		var jsonObject = this._fieldsToJson(this.jsonTemplate, '');
		return jsonObject;
	},

	_fieldsToJson: function(definition, path) {
		var result = {};

		for (var prop in definition) {
			if (typeof definition[prop] === 'object') {
				result[prop] = this._fieldsToJson(definition[prop], (path + prop + '.'));
			}
			else {
				result[prop] = this._getFieldValue(definition[prop]);
			}
		}

		return result;
	},

	_getFieldValue: function(fieldName) {
		var i;

		for (i = 0; i < this.fields.length; i++) {
			if(this.fields[i].getFieldName() === fieldName) {
				return this.fields[i].getElement().val();
			}
		}

		for (i = 0; i < this.hiddenFields.length; i++) {
			if(this.hiddenFields[i].attr('name') === fieldName) {
				return this.hiddenFields[i].val();
			}
		}

		return '';
	},
	
	_enableButton: function(disable) {
		var 
		submitButton = $(this.formConfig.submitButtonSelector, this._formContainerEl);
		
		//enable submit button
		this._formSubmitting = false;
		submitButton.removeAttr('disabled');
		
		if (this._submitBtnIsDiv) {
			submitButton.text(this._oldLabel);
		}
		else {
			submitButton.val(this._oldLabel);
		}
		
		delete this._oldLabel;
		delete this._submitBtnIsDiv;
	},


	/**
    * @scope {Object} 
    * - location {String} location to be redirected after successful registration/login
    * - errorEl {Object} dom element to be updated when some error occurs during the registration process, nothing to report when not available
    * - login {Object} login info for autologin; otherwise undefined (for registration)
    */
	_handleResponse: function(response, success, xhr) {
		var
		message,
		scope = this.scope,
		errorEl = scope.errorEl;

		if (xhr.status !== 200) {
			if (errorEl) {

				if (success === 'timeout') {
					errorEl.text('Connection timed out. Please try again later.');
				}
				else {
					errorEl.text(xhr.status ? 'Error status: ' + xhr.status : 'Registration failed. Please try again later.');
				}

				errorEl.css('display', 'block');
			}
			
			scope._enableButton();

			return;
		}

		if(response.error) {
			message = response.error.message;
			if(message && errorEl) {
				errorEl.text(message); //XSS safe
				errorEl.css('display', 'block');
			}
			
			scope._enableButton();
		}

		// this should not be here (tomas has to fix it on server side)
		else if(response.result.error) {
			message = response.result.error.message;

			if(message && errorEl) {
				errorEl.text(message); //XSS safe
				errorEl.css('display', 'block');
			}
			
			scope._enableButton();
		}
		else {
			if (this.onSubmitComplete) {
				this.onSubmitComplete.call(this, response, this.params);
			}
			
			scope._enableButton();
		}
	}
});