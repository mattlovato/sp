<?php
	//this file generates javascript object for requested file '/cloud/js/marketoData.js' (via .htaccess's rewriteRule)
	chdir($_SERVER['DOCUMENT_ROOT']);
	include './scripts/geoip.php';
	include './scripts/detectors.php';

	//only change this array to change data sent to marketo
	$data = array(
		"SPuser" => true,
		"SPkeywords" => $SPkeywords,
		"SPcampaign" => $SPcampaign,
		"SPdevice" => $SPdevice,
		"SPos" => $SPos,
		"SPbrowserVersion" => $SPbrowser,
		"SPreferringURL" => $SPreferringURL,
		"SPlandingPage" => $SPlandingPage,
		"SPsignupPage" => '',
		"InferredCountry" => $inferred_country,
		"State" => $inferred_state,
		"City" => $inferred_city,
		"InferredCompany" => $inferred_company
	);

	//below code will generate JS object with key/value from array above, don't change
	$js = '' .
	'kerio = window.kerio || {};' .
	'kerio.register = kerio.register || {};' .
	'kerio.register.marketoData = {';
	
	$isset = false;

	foreach ($data as $key => $value) {
		
		if ($isset == false && $value != htmlspecialchars($value)) {
			$isset = true;
			$a = error_log('WEBINTRO MARKETO: ' . $value . json_encode($data));
		}
		
		$js .= $key . ': "' . htmlspecialchars($value) . '",' . "\n";
	}
	
	$js = substr($js, 0, -2); //remove the trailing comma and new line
	$js .= '};';
	
	header('Content-Type: application/javascript');
	header('Content-Length: ' + strlen($js));
	echo $js;
?>

