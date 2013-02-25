<?php

//generate random transation ID
$transaction_ID = rand(100, 10000);

//write a record into the log with timestamp
function write_log($msg) {
    global $transaction_ID;
    $todays_date = date("Y-m-d H:i:s");
    $file = fopen("process.log","a");
    fputs($file,$todays_date. " [".$transaction_ID."] ". $msg."\n");
    fclose($file);
}

   	write_log("REG_DATA: recieving attributes array for ".$email." from email-check.php");


	$email = 'mlovato543@gmail.com';
	$SPinviterName = 'Mister Inviter';
	$SPinviterEmail = 'inviter@company.com';
	$SPinviterPhoto = 'base 64 string goes here';
	$SPinviterText = 'this is not implemented yet';
	$SPcompanyName = 'the company name';
	$SPcompanyPublicUrl = 'http://www.kerio.com';
	$SPcompanyCount = '2';

	$SPconfirmURL = "http://www.mattlovato.com/samepage";

	require_once('marketo-api-client.php');

	//***************************** MARKETO ENTRY POINT *****************************//
	$accessKey = mktSampleMktowsClient::MKTOWS_USER_ID;
	$secretKey = mktSampleMktowsClient::MKTOWS_SECRET_KEY;
	$soapEndPoint = 'https://na-a.marketo.com/soap/mktows/1_8';
	$client = new mktSampleMktowsClient($accessKey, $secretKey, $soapEndPoint);
	//******************************************************************************//
	
	
	//********************* SYNC LEAD SIGN UP DETAILS TO MARKETO *******************//
		$attrs = array (
      "SPuser" => true,
      "SPinviterName" => $SPinviterName,
      "SPinviterEmail" => $SPinviterEmail,
      "SPinviterPhoto" => $SPinviterPhoto,
      "SPinviterText" => $SPinviterText,
      "SPcompanyName" => $SPcompanyName,
      "SPcompanyPublicUrl" => $SPcompanyPublicUrl,
      "SPcompanyCount" => $SPcompanyCount,
      "SPconfirmURL" => $SPconfirmURL,
      "SPemailTriggerInvite" => true
    	);
	
	
    	$success = $client->syncLead($email, $attrs, $cookie);
		echo 'success1!';
	
	exit();
?>