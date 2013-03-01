<?php
// by setting this variable to 0 you disable registration of new company using intro
define("REGISTRATION_ENABLED", 1);

if (REGISTRATION_ENABLED == 0) {
?>

<style>
    #greenbar {
        display: none;
    }
</style>
    
    <div>
        <h4 class="closedHeading">Thank you for interest!</h4>
        <p>Due to high demand, we temporarily don't accept new registrations. Please check back later.</p>
    </div>  

<?php
} // if-end (registration disabled)  
else {
?>
<div class="createAccountWrap" style="padding:0">
	<div class="signup_top askemail bold">Enter your email address.<br />You'll be up and running in minutes.</div>

	<div class="formMail">
		<input type="email" name="emailInput" value="" size="25" class="emailInput"  placeholder="me@work.com" style="margin-left:15px;"/>
	</div> 
	<div class="button-row">
		<input class="token" name="token" type="hidden" value="webintro" />
		<div name="Submit" class="submitButton createbutton" style="margin-top:-00px;padding:2px 8px;">Create Account</div>
	</div> 

	<div clear="cAWTclear">&nbsp;</div>
	<br />

	<div class="verificationAlert" style="width:100%;text-align:center;">Please enter a valid email address.</div>
</div>
<div class="checkEmailWrap">
	<div class="wide">
		<span class="message">We've sent a verification link to <span class="emailText"></span>. If it doesn't arrive in few minutes, please check your spam folder or <a class="resendLink" href="#">resend the email</a>.</span>
	</div>
</div>
<?php
} // else-end (registration enabled)
?>