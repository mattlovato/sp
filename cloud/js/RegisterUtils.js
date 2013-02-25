Ext.define('kerio.register.RegisterUtils', {

    singleton: true,

    MAX_FIELD_LENGTH: 255,

    MIN_PASSWORD_LENGTH: 6,

    JSON_API_PATH: '/register/api/jsonrpc/',

    EMAIL_REGEX: /^(?=[-a-zA-Z0-9_!=\+&'\?\^\{\}~\.]{1,127}@)[-a-zA-Z0-9_!=\+&'\?\^\{\}~]+(\.[-a-zA-Z0-9_!=\+&'\?\^\{\}~]+)*@(?=[-a-zA-Z0-9_\.]{1,67}$)[-a-zA-Z0-9_]+(\.[-a-zA-Z0-9_]+)*$/,

	request: function(config) {

        if(config.scope.login) {
            config.scope.login.loginMethod = this.loginUser;
        }

		var request = {
            url      : window.location.protocol + '//' +  window.location.host + this.JSON_API_PATH,
            method   : "POST",
            timeout  : 30000,
            success  : config.success || Ext.emptyFn,
            failure  : config.failure || Ext.emptyFn, //TODO: handle server errors before failure call
            scope    : config.scope || this,
            headers  : {
                "Accept"       : "application/json-rpc",
                "Content-Type" : "application/json"
            },
            callback : config.callback || Ext.emptyFn, // TODO: callback should be checked against error return codes

            jsonData: {
                "jsonrpc" : "2.0",
                "id" : 1,
                "method" : config.method,
                "params" : config.params || {}
            }
        };

		Ext.Ajax.request(request);
	},

    /**
    * @scope {Object} 
    * - location {String} location to be redirected after successful registration/login
    * - errorEl {Object} dom element to be updated when some error occurs during the registration process, nothing to report when not available
    * - login {Object} login info for autologin; otherwise undefined (for registration)
    */
    handleResponse: function(response) {

        if (response.status !== 200) {
            if (this.errorEl) {
                this.errorEl.update('Failed to register your email. Error status: ' + response.status);
                this.errorEl.setVisible(true);
            }
            return;
        }

        var
            message,
            responseContent = Ext.JSON.decode(response.responseText);

        if(responseContent.error) {
            message = responseContent.error.message;
            if(message) {
                if (this.errorEl) {
                    this.errorEl.update('Request Error: ' + message);
                    this.errorEl.setVisible(true);
                }
            }
        }
        // this should not be here (tomas has to fix it on server side)
        else if(responseContent.result.error) {
            message = responseContent.result.error.message;
            if(message) {
                if (this.errorEl) {
                    this.errorEl.update('Request Error: ' + message);
                    this.errorEl.setVisible(true);
                }
            }
        }
        else {
            if(this.login) {
                var redirectLocation = this.location;
                if(responseContent.result.company) {
                    redirectLocation = responseContent.result.company.url;
                }
                this.login.loginMethod(this.login.name, this.login.password, redirectLocation);
            }
            else {
                // window.location.href = this.location;
                //browser's refresh 'Post data again?' question avoid:
                window.location.hash = '#_sessid=' + +(new Date());
                showCheckEmail(this.params);
            }
        }
     },

    loginUser: function(name, password, location) {
        var
            handleResponse = function() {
                window.location.href = this.location;
            },
            request = {
                url      : window.location.protocol + '//' +  window.location.host + '/server/login',
                method   : "POST",
                timeout  : 30000,
                success  : handleResponse,
                failure  : handleResponse,
                scope    : {location : location},
                headers  : {
                    "Accept"       : "text/html",
                    "Content-Type" : "application/x-www-form-urlencoded"
                },
                params: {
                    "kerio_username" : name,
                    "kerio_password" : password
                }
            };

        Ext.Ajax.request(request);
    },

    passwordQuality: function(password, pwdStrenghtId, pwdMessageId) {
        var
            classes = 0,
            lowerCaseReg = /[a-z]/,
            upperCaseReg = /[A-Z]/,
            numberReg = /[0-9]/,
            specialCaseReg = /[^a-zA-Z0-9]/,
            pwdStrenghtDom = Ext.get(pwdStrenghtId).dom,
            pwdMessageDom = Ext.get(pwdMessageId).dom;

        if(lowerCaseReg.test(password)) {
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
        }

        if(password.length < 6) {
            if(password.length) {
                console.log('password shorter then 6 chars');
                pwdMessageDom.innerHTML = 'Enter at least 6 characters';
                pwdStrenghtDom.style.display = 'block';
                pwdStrenghtDom.className = 'pwdWeak';
            }
            else {
                console.log('empty password');
                pwdMessageDom.innerHTML = 'Tip: Enter 3 or more words - easy to remember and hard to break ;)';
                pwdStrenghtDom.style.display = 'block';
                pwdStrenghtDom.className = 'pwdStrong';
            }
            return 0;
        }
		else {
            console.log('good password');
			pwdStrenghtDom.style.display = 'none';
            return 1;
        }
    },

    // toggles views (text/password) of password input
    pwdToggle: function(target){
        target = Ext.get(target);
        if(target) {
            target.dom.type = (target.dom.type === 'password') ? 'text' : 'password';
        }
    },

    // removes whitespaces form string
    removeWhitespaces: function(string) {
        return string.replace(/^\s+|\s+$/g,'');
    },

    // returns all parameters from URL query as map (object)
    getUrlParameters: function() {
        var matchGroup,
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

    limitInputCharSet: function(element, regex) {
        var target = Ext.get(element);
        if(target) {
            target.on('keypress', function(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode( key );

                if( !regex.test(key) ) {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) {
                        theEvent.preventDefault();
                    }
                }
            });
        }
    }
});
