<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0" />
		<title>Samepage</title>
		<meta name="viewport" content="width=device-width" />
		<meta name="viewport" content="initial-scale = 1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
		<script type="text/javascript" src="../scripts/InviteCompany.js?v="></script>
		<script type="text/javascript">
			$(document).ready(function() {
				kerio.register.InviteCompany.init(['.container']);
			});
		</script>
		
</head>

<body>
		<div id="top">
		<a href="/cloud">
			<img id="productLogo" src="../images/logo.png?v=">
		</a>
		</div>
		<div class="container">
			<div class="createAccountWrap">
				<div class="pageHeading">Create your account</div>
				<div class="text">
					<div class="moreText">
            	<span class="infoText">
            		Enter your work email address. You'll be up and running in minutes.
				</span>
					</div>
				</div>
				<div class="formMail">

					<div class="verificationAlert" style="display: none;">You have to enter a valid email address.</div>
					<input class="token" name="token" type="hidden" value="" />
					<input class="emailInput" name="emailInput" class="mailInput" type="email" placeholder="Your work e-mail" maxlength="256" />
					<input class="submitButton" type="submit" value="Go"  />
				</div>

			</div>

			<div class="checkEmailWrap" style="display:none">
				<div class="pageHeading">Thank you!</div>
				<div class="text wide">
			        <h3>Please check your email to complete registration.</h3>
			        <span class="message">Verification link was sent to <span class="emailText"></span>, because we take security seriously. If it doesn't arrive in a few minutes, check your spam folder or <a class="resendLink" href="#">resend the mail</a>.</span>
				</div>
			</div>

		</div>
</body>
</html>
