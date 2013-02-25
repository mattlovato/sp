$.Class('kerio.register.FormField', {
	
	fieldId: undefined,
	element: undefined,
	isValid: undefined,
	errorMessage: undefined,
	validateType: undefined,
	validateFunction: undefined,
	invalidClass: 'invalidField',

	init: function(element, type, requiredSameValueSelector) {
		this.element = element;
		this.isValid = true;
		this.validateType = type;
		this.requiredSameValueSelector = requiredSameValueSelector;

		switch(type) {
			case 'name':
				this.validateFunction = this._nameValidation;
				break;
			case 'password':
				this.validateFunction = this._passwordValidation;
				break;
			case 'email':
				this.validateFunction = this._emailValidation;
				break;
			default:
				console.log('used bad validation type');
				this.validateFunction = function() {
					return false;
				};
		}
	},

	_emailValidation: function(email) {
		if(kerio.register.RegisterUtils.removeWhitespaces(email).length === 0) {
			return false;
		}

		if(email.length > kerio.register.RegisterUtils.MAX_FIELD_LENGTH) {
                        this.errorMessage = "Email cannot be longer than 255 characters.";
			return false;
		}

		return kerio.register.RegisterUtils.EMAIL_REGEX.test(email);
	},

	_nameValidation: function(value) {
		if(kerio.register.RegisterUtils.removeWhitespaces(value).length === 0) {
			return false;
		}
		else if(value.length > kerio.register.RegisterUtils.MAX_FIELD_LENGTH) {
			this.errorMessage = "Name cannot be longer than 255 characters.";
			return false;
		}

		return true;
	},

	_passwordValidation: function(value) {        
		if(value.length < kerio.register.RegisterUtils.MIN_PASSWORD_LENGTH) {
			this.errorMessage = "Password must have at least 6 characters.";
			return false;
		}
		else if(value.length > kerio.register.RegisterUtils.MAX_FIELD_LENGTH) {
			this.errorMessage = "Password cannot be longer than 255 characters.";
			return false;
		} 
		else if (this.requiredSameValueSelector) {
			this.errorMessage = "Passwords do not match.";
			return $(this.requiredSameValueSelector).val() === value;
		}

		return true;
	},

	getElement: function() {
		return this.element;
	},

	getFieldName: function() {
		return this.element.attr('name');
	},

	validate: function() {
		this.errorMessage = undefined;
		this.isValid = (true === this.validateFunction(this.getElement().val()));

		if(this.isValid === false) {
			this._addInvalidFlag();
		}
		//TODO: mroharik: mprokop: why not to remove invalid class directly?

	},

	_addInvalidFlag: function() {
		if(this.element.hasClass(this.invaliClass) === false) {
			this.element.addClass(this.invalidClass);
		}
	},

	removeInvalidFlag: function() {
		this.isValid = true;
		
		if(this.element.hasClass(this.invalidClass) === true) {
			this.element.removeClass(this.invalidClass);
		}
	}
});