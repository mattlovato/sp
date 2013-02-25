Ext.define('kerio.register.FormField', {

    fieldId: undefined,

    element: undefined,

    isValid: undefined,

    validateType: undefined,

    validateFunction: undefined,

    invalidClass: 'invalidField',

    constructor: function(element, type) {
        this.element = element;
        this.isValid = true;
        this.validateType = type;

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
            return false;
        }

        return kerio.register.RegisterUtils.EMAIL_REGEX.test(email);
    },

    _nameValidation: function(value) {
        if(kerio.register.RegisterUtils.removeWhitespaces(value).length === 0) {
            return false;
        }
        else if(value.length > kerio.register.RegisterUtils.MAX_FIELD_LENGTH) {
            //TODO: here should be some better notification for user, or limit it in some listener within FormHandler
            return false;
        }

        return true;
    },

    _passwordValidation: function(value) {
        if(value.length < kerio.register.RegisterUtils.MIN_PASSWORD_LENGTH) {
            return false;
        }
        else if(value.length > kerio.register.RegisterUtils.MAX_FIELD_LENGTH) {
            //TODO: here should be some better notification for user
            return false;
        }


        return true;
    },

    getElement: function() {
      return this.element;
    },

    getFieldName: function() {
        return this.element.dom.name;
    },

    validate: function() {
        this.isValid = (true === this.validateFunction(this.getElement().getValue()));

        if(this.isValid === false) {
            this._addInvalidFlag();
        }

    },

    _addInvalidFlag: function() {
        if(this.element.hasCls(this.invaliClass) === false) {
            this.element.addCls(this.invalidClass);
        }
    },

    removeInvalidFlag: function() {
        this.isValid = true;
        if(this.element.hasCls(this.invalidClass) === true) {
            this.element.removeCls(this.invalidClass);
        }
    }
});


