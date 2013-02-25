$(document).ready(function(){
    var
        pwdInputEl = $('.pwdInput'),
        pwdInputEl2 = $('.pwdInput2'),
        formDefinition,
        validationId,
        form,
		urlParams = kerio.register.RegisterUtils.getUrlParameters(),
		email = urlParams.email,
		valid = urlParams.valid;

    formDefinition = {

        formContainerSelector: '.formSecond',

        submitButtonSelector: '.submitButton',
        errorReportSelector: '.verificationAlert',

        onSuccessSubmitLocation: '/',

        onSubmitComplete: kerio.register.RegisterUtils.loginUser,

        autoLogin: {
            name: 'email',
            password: 'password'
        },

        submitLocationParam: [{
            inputName: 'email',
            paramName: 'email'
        }, {
            inputName: 'valid',
            paramName: 'valid'
        }, {
            inputName: 'password',
            paramName: 'password'
        }],

        jsonTemplate: {
            email : 'email',
            password : 'password',
            valid : 'valid'
        },

        apiMethodName: 'Register.resetPassword',

        hiddenFields: [
            {selector: '.email', name: 'email'},
            {selector: '.valid', name: 'valid'}
        ],

        visibleFields: [
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