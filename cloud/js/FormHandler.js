Ext.define('kerio.register.FormHandler', {

    fields: [],

    hiddenFields: [],

    jsonTemplate: undefined,

    formConfig: undefined,

    constructor: function(cfg) {
         var
            el,
            prop,
            queryParams = kerio.register.RegisterUtils.getUrlParameters(),
            i;

        this.formConfig = cfg;

        for (i = 0; i < cfg.visibleFields.length; i++) {
            this.fields[i] = Ext.create('kerio.register.FormField', Ext.get(cfg.visibleFields[i].id), cfg.visibleFields[i].type);
        }

        for (i = 0; i < cfg.hiddenFieldsIDs.length; i++) {
            this.hiddenFields[i] = Ext.get(cfg.hiddenFieldsIDs[i]);
        }

        this.jsonTemplate = cfg.jsonTemplate;

        this._createFieldHandlers();

        // load value of hidden fields from URL parameters
        for (prop in queryParams) {
            if(queryParams.hasOwnProperty(prop)) {
                el = Ext.get(prop);
                if(el && this._hasRegistredHiddenField(prop, cfg)) {
                    el.dom.value = queryParams[prop];
                }
            }
        }
    },

    registerSubmitHandlers: function() {

        // submit form on submit button click
        Ext.get(this.formConfig.submitButtonId).on('click', function(event) {
            this._submit();
            event.preventDefault();
            return false;
        }, this);

        // submit form on pressed ENTER
        /*Ext.get(this.formConfig.formId).on('keyup', function(event) {
            if(event.keyCode === 13) {
                this._submit();
            }
        }, this);*/
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

            this.fields[i].getElement().on('focus', this._onFocusHandler, context);
            this.fields[i].getElement().on('blur', this._onBlurHandler, context);
        }
    },

    _submit: function() {
        var
            jsonParams,
            jsonRequest,
            login,
            location,
            params = {};

        if (this._isFormValid() === false) {
            return;
        }

        jsonParams = this._formToJson();

        if(this.formConfig.autoLogin) {
            login = {
                name: this._getFieldValue(this.formConfig.autoLogin.name),
                password: this._getFieldValue(this.formConfig.autoLogin.password)
            }
        }
        else {
            login = undefined;
        }

        location = this.formConfig.onSuccessSubmitLocation;
        if(this.formConfig.submitLocationParam) {
            var i;
            location = location + '?' + this.formConfig.submitLocationParam[0].paramName + '=' + jsonParams[this.formConfig.submitLocationParam[0].inputName];
            
            params[this.formConfig.submitLocationParam[0].paramName] = jsonParams[this.formConfig.submitLocationParam[0].inputName];
            // params.push(param);

            for(i = 1; i < this.formConfig.submitLocationParam.length; i++) {
                location = location + '&' + this.formConfig.submitLocationParam[i].paramName + '=' + jsonParams[this.formConfig.submitLocationParam[i].inputName];

                params[this.formConfig.submitLocationParam[i].paramName] = jsonParams[this.formConfig.submitLocationParam[i].inputName];
                // params.push(param);
            }
        }

        jsonRequest = {
            method: this.formConfig.apiMethodName,
            params: jsonParams,
            success: kerio.register.RegisterUtils.handleResponse,
            scope: {
                location: location,
                login: login,
                params: params
            }
        };

        if (this.formConfig.errorReportId) {
            jsonRequest.failure = kerio.register.RegisterUtils.handleResponse;
            jsonRequest.scope.errorEl = Ext.get(this.formConfig.errorReportId);
        }

        kerio.register.RegisterUtils.request(jsonRequest);
    },

    _hasRegistredHiddenField: function(elementId, cfg) {
        for (var i = 0; i < cfg.hiddenFieldsIDs.length; i++) {
            if(cfg.hiddenFieldsIDs[i] === elementId) {
                return true;
            }
        }

        return false;
    },

    _updateErrorAlert: function() {
        var
            i,
            isErrorVisible,
            alertElement = Ext.get('verificationAlert');

        for(i = 0; i < this.fields.length; i++) {
            if(this.fields[i].isValid === false) {
                isErrorVisible = true;
                break;
            }
        }

        if(isErrorVisible) {
            alertElement.show();
        }
        else {
            alertElement.hide();
        }
    },

    _onBlurHandler: function() {
        this.elements[this.currentId].validate();
        this.scope._updateErrorAlert();
    },

    /*
     * Remove invalid flag of focused element (field) and validate all elements
     * (fields) that are placed above focused element.
     */
    _onFocusHandler: function() {
        var
            sourceElement = this.elements[this.currentId],
            i;

        sourceElement.removeInvalidFlag();

        for (i = (this.currentId - 1); i >= 0; i--) {
            this.elements[i].validate();
        }

        this.scope._updateErrorAlert();
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
              result[prop] = this._getFieldValue(path + prop);
          }
      }

      return result;
    },

    _getFieldValue: function(fieldName) {
        var i;

        for (i = 0; i < this.fields.length; i++) {
            if(this.fields[i].getFieldName() === fieldName) {
                return this.fields[i].getElement().getValue();
            }
        }

        for (i = 0; i < this.hiddenFields.length; i++) {
            if(this.hiddenFields[i].dom.name === fieldName) {
                return this.hiddenFields[i].getValue();
            }
        }

        return '';
    },

    _isFormValid: function() {
        var
            isValid = true,
            i;

        for (i = 0; i < this.fields.length; i++) {
            this.fields[i].validate();
            isValid = (isValid && this.fields[i].isValid);
        }

        return isValid;
    }

});