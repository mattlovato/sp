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
	$SPkeywords = 'file sharing';
	$SPcampaign = 'file sharing campaign';
	$SPdevice = 'some device';
	$SPbrowser = 'some browser';
	$SPos = 'some operating system';
	$SPreferringURL = 'some referring url';
	$SPsignupPage = 'some signup page';
	$SPlandingPage = 'some landing page';
	$InferredCountry = 'some inferred country';
	$InferredState = 'some inferred state';
	$InferredCity = 'some inferred city';
	$InferredCompany = 'some inferred company';
	
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
		"LeadSource" => 'Samepage',
		"SPkeywords" => $SPkeywords,
		"SPcampaign" => $SPcampaign,
		"SPdevice" => $SPdevice,
		"SPos" => $SPos,
		"SPbrowserVersion" => $SPbrowser,
		"SPreferringURL" => $SPreferringURL,
		"SPlandingPage" => $SPlandingPage,
		"SPsignupPage" => $SPsignupPage,
		"InferredCountry" => $InferredCountry,
		"State" => $InferredState,
		"City" => $InferredCity,
		"InferredCompany" => $InferredCompany		  
		);
		
		$attrs2 = array (
		"SPconfirmURL" => $SPconfirmURL,
      	"SPemailTriggerConfirm" => true  
		);
	
	
    	$success = $client->syncLead($email, $attrs, $cookie);
		echo 'success1!';
		
		
    	$success = $client->syncLead($email, $attrs2, $cookie);
		echo 'success2!';
	
	exit();
?>