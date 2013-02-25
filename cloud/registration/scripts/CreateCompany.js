$(document).ready(function(){
    var
        pwdInputEl = $('.pwdInput'),
        pwdInputEl2 = $('.pwdInput2'),
        userNamePreviewEl = $('#user_name_preview'),
        userNameEl = $('.nameInput'),
        formDefinition,
        validationId,
        form;

    formDefinition = {

		formContainerSelector: '.formSecond',

        submitButtonSelector: '.submitButton',
        errorReportSelector: '.verificationAlert',

        onSuccessSubmitLocation: '/',
		
		initFavorites: true,

        onSubmitComplete: kerio.register.RegisterUtils.loginUser,

        autoLogin: {
            name: 'admin.email',
            password: 'admin.password'
        },

        submitLocationParam: [{
            inputName: 'admin.email',
            paramName: 'name'
        }, {
            inputName: 'admin.password',
            paramName: 'password'
        }],

        jsonTemplate: {
            admin : {
                email : 'admin.email',
                name : 'admin.name',
                password : 'admin.password'
            },
            companyName : 'companyName',
            token: 'token',
            valid : 'valid'
        },

        apiMethodName: 'Register.createCompany',

        hiddenFields: [
            {selector: '.email', name: 'email'},
            {selector: '.token', name: 'token'},
            {selector: '.valid', name: 'valid'}
        ],

        visibleFields: [
          {selector: '.companyInput', type: 'name'},
          {selector: '.nameInput', type: 'name' },
          {selector: '.pwdInput', type: 'password'},
          {selector: '.pwdInput2', type: 'password', requiredSameValueSelector: '.pwdInput'}
        ]
    };

    form = new kerio.register.FormHandler(formDefinition);
    form.registerSubmitHandlers();
    
/*
    //commented before jquery transition
	Ext.get('pwdToggleBtn').on('click', function() {
        kerio.register.RegisterUtils.pwdToggle('pwdInput');
    });
*/
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