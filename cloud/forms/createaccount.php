<!-- Main Form Content -->

<?php
// by setting this variable to 0 you disable registration of new company using intro
define("REGISTRATION_ENABLED", 1);

if (REGISTRATION_ENABLED == 0) {
?>

<style>
    .createAccountInline {
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

    <div class="createAccountWrap">
        <h4 class="emailAddress">Enter your email address. You'll be up and running in minutes.</h4>
        <h4 class="freeSpace">Sign up today &amp; get 10GB of file-sharing space free!</h4>
        <div class="kerioForm">

            <div class="formMail" >
                <div class="verificationAlert">Please enter a valid work email address.</div>
                <input type="email" name="emailInput" value="" size="30" maxlength="100" class="emailInput" autofocus="autofocus" placeholder="me@work.com" />
            </div> 


            <div class="button-row">
                <input class="token" name="token" type="hidden" value="webintro" />
                <div name="Submit" class="submitButton createbutton">Create an Account</div>
            </div> 


        </div>

    </div>
    <div class="checkEmailWrap">
        <h4>Thank you! Please check your email to complete registration.</h4>
        <div class="wide">
            <span class="message">Verification link was sent to <span class="emailText"></span>, because we take security seriously. If it doesn't arrive in few minutes, check your spam folder or <a class="resendLink" href="#">resend the email</a>.</span>
        </div>
    </div>    

<?php
} // else-end (registration enabled)
?>



