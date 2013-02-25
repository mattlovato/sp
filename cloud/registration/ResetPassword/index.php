<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<title>Samepage</title>
	<link href="../style.css?v=" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js?v="></script>
	<script type="text/javascript" src="../../js/touchable.js?v="></script>

    <script type="text/javascript" src="../../js/jquery.class.min.js?v="></script>
    <script type="text/javascript" src="../../js/jquery.json-2.4.min.js?v="></script>
    <script type="text/javascript" src="../../js/jquery.cookie.js?v="></script>
    <script type="text/javascript" src="../../js/modernizr.js?v="></script>    
    <script type="text/javascript" src="../../js/Placeholder.js?v="></script>
    <script type="text/javascript" src="../scripts/RegisterUtils.js?v="></script>
    <script type="text/javascript" src="../scripts/FormField.js?v="></script>
    <script type="text/javascript" src="../scripts/FormHandler.js?v="></script>
    <script type="text/javascript" src="../scripts/ResetPassword.js?v="></script>
</head>

<body>
   <div id="top">
		<a href="/cloud">
			<img id="productLogo" src="../images/logo.png?v=">
		</a>
    </div>
    <div class="containerLogin">
    <div class="pageHeading">Reset password</div>
	

    <div class="formSecond">
	<input class="email" name="email" type="hidden" value="" />
    <input class="valid" name="valid" type="hidden" value="" />
    <div class="verificationAlert" style="display: none;">Invalid password</div>
	<input name="password" class="pwdInput" type="password" placeholder="Choose a password" maxlength="256" />
	<input name="password2" class="pwdInput pwdInput2" type="password" placeholder="Re-enter password" maxlength="256" />            
	<div class="pwdStrenght" class="pwdStrong"><p class="pwdMessage">
		<script type="text/javascript">
			document.write('Enter at least ' + kerio.register.RegisterUtils.MIN_PASSWORD_LENGTH + ' characters');
		</script></p></div>
		</p>
	<input class="submitButton submitStep2" type="submit" value="OK"/>
	</div>
	
    </div>

</div>

	<div id="forgot"><a href="/login">Go to login</a></div>

</body>
</html>
