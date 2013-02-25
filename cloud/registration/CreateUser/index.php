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
    <script type="text/javascript" src="../../js/munchkin.js?v="></script>
	<script>
		if (Munchkin) {
			Munchkin.init('773-TBA-942');
		}
	</script>
	<script type="text/javascript" src="../scripts/RegisterUtils.js?v="></script>
    <script type="text/javascript" src="../scripts/FormField.js?v="></script>
    <script type="text/javascript" src="../scripts/FormHandler.js?v="></script>
    <script type="text/javascript" src="../scripts/CreateUser.js?v="></script>
	
	

<?php
	include('../../scripts/detectors.php');
	include('../../scripts/marketoData.php');
?>

</head>

<body>
   <div id="top">
		<a href="/cloud">
			<img id="productLogo" src="../images/logo.png?v=">
		</a>
        <div id="userName">
        	<div id="userPhoto">
            	<a href="#"><img src="../images/avatar.png?v=" /></a>
            </div>
            <span id="user_name_preview">Your name</span>
        </div>
    </div>
    <div class="container">
    	<div class="pageHeading">Join <span class="companyName">Samepage</span></div>
        <div class="text">
        	<div class="moreText">
                <span class="infoText">Please enter some more information so you can join your colleagues on Samepage.</span>
            </div>
            <div class="logo">&nbsp;</div>
        </div>

        <div class="formSecond">
            <div class="verificationAlert" style="display: none;">You have to fill all the fields marked red.</div>
            <input class="email" name="user.email" type="hidden" value="" />
            <input class="tenantId" name="tenantId" type="hidden" value="" />
            <input class="valid" name="valid" type="hidden" value="" />

            <input name="user.name" class="nameInput nameInputInv" type="text" placeholder="Your name" maxlength="256"/>
            <input name="user.password" class="pwdInput" type="password" placeholder="Choose a password" maxlength="256"/>
            <input name="user.password2" class="pwdInput2" type="password" placeholder="Re-enter password" maxlength="256" />
            <div class="pwdStrenght" class="pwdStrong"><p class="pwdMessage">
			<script type="text/javascript">
				document.write('Enter at least ' + kerio.register.RegisterUtils.MIN_PASSWORD_LENGTH + ' characters');
			</script></p></div>
			</p>
			
			<input class="submitButton submitStep2" type="submit" value="Start"/>

            <div id="terms">By registering you agree to our <a href="/cloud/terms" target="_blank">Terms of Use</a>.</div>
		</div>
        </div>
    </div>
</body>
</html>
