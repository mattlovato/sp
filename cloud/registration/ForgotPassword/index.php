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
		<script type="text/javascript" src="../scripts/ForgotPassword.js?v="></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				kerio.register.ForgotPassword.init(['.formMail']);
			});
		</script>
	</head>

	<body>
		<div id="top">
		<a href="/cloud">
			<img id="productLogo" src="../images/logo.png?v=">
		</a>
		</div>
		<div class="containerLogin">
			
			<div class="forgotPasswordWrap">
				<div class="pageHeading">Forgot password?</div>

				<div class="formMail">
					<div class="verificationAlert" style="display: none;">You have to enter a valid email address.</div>
					<input class="emailInput mailLogin" name="emailInput" type="email" placeholder="Enter your email" maxlength="256"/>
					<input class="submitButton submitStep2" type="submit" value="Continue"  />
				</div>
			</div>
			
			
			<div class="checkEmailWrap" style="display:none">
				<div class="pageHeading">Check your email</div>

				<div class="formMail">
					<div id="text">
						<p>Password reset instructions were sent to <span class="emailText"></span>.</p>
						<p>If they don't arrive in a few minutes, check your spam folder or <a class="resendLink" href="#">resend the instructions</a>.</p>
					</div>
				</div>
			</div>
		</div>

		<div id="forgot"><a href="/login">Back to login</a></div>

	</body>
</html>
