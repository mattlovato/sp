$(document).ready(function(){
    var
        pwdInputEl = $('.pwdInput'),
        pwdInputEl2 = $('.pwdInput2'),
        userNamePreviewEl = $('#user_name_preview'),
        userNameEl = $('.nameInput'),
        formDefinition,
        validationId,
		params = kerio.register.RegisterUtils.getUrlParameters(),
		email = params.email,
        form;
	
	if (email) {
		kerio.register.RegisterUtils.assignCustomer(email);
	}

    formDefinition = {

		formContainerSelector: '.formSecond',
		submitButtonSelector: '.submitButton',
        errorReportSelector: '.verificationAlert',

        onSuccessSubmitLocation: '/',
		
		initFavorites: true,

        onSubmitComplete: kerio.register.RegisterUtils.loginUser,
		
		templateFields: [{
			selector: '.companyName',
			name: 'companyName'
		}],

        autoLogin: {
            name: 'user.email',
            password: 'user.password'
        },

        submitLocationParam: [{
            inputName: 'user.email',
            paramName: 'name'
        }, {
            inputName: 'user.password',
            paramName: 'password'
        }],

        jsonTemplate: {
            user : {
                email : 'user.email',
                name : 'user.name',
                password : 'user.password'
            },
            tenantId: 'tenantId',
            valid : 'valid'
        },

        apiMethodName: 'Register.createUser',
		
		hiddenFields: [
            {selector: '.email', name: 'email'},
            {selector: '.tenantId', name: 'tenantId'},
            {selector: '.valid', name: 'valid'}
        ],

        visibleFields: [
          {selector: '.nameInput', type: 'name'},
          {selector: '.pwdInput', type: 'password'},
          {selector: '.pwdInput2', type: 'password', requiredSameValueSelector: '.pwdInput'}
        ]
    };

    form = new kerio.register.FormHandler(formDefinition);
    form.registerSubmitHandlers();

    pwdInputEl.bind('focus', function() {
        if($('.pwdInput').val().length === 0) {
            $('.pwdStrenght').css('display', 'block');
        }
    });

    userNameEl.bind('keyup', {
        target : userNamePreviewEl,
        source : userNameEl
    }, function(event) {
        event.data.target.text(event.data.source.val()); //XSS safe - text() automatically encodes the value
    });

    pwdInputEl.bind('keyup', function() {
        kerio.register.RegisterUtils.checkPasswords($('.pwdInput').val(), $('.pwdInput2').val(), '.pwdStrenght', '.pwdMessage');
    });

    pwdInputEl2.bind('keyup', function() {

        if (validationId) {
            clearTimeout(validationId);
        }

        validationId = setTimeout(function() {
            kerio.register.RegisterUtils.checkPasswords($('.pwdInput').val(), $('.pwdInput2').val(), '.pwdStrenght', '.pwdMessage');
        }, 500);
    });
});