<?php

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
	"SPsignupPage" => $SPsignupPage,
	"InferredCountry" => $inferred_country,
	"State" => $inferred_state,
	"City" => $inferred_city,
	"InferredCompany" => $inferred_company
);


//below code will generate JS object with key/value from array above, don't change
?>
<script type="text/javascript">

<?php
	$js = 'kerio.register.marketoData = {';

	foreach ($data as $key => $value) {
		$js .= $key . ': "' . $value . '",' . "\n";
	}
	
	$js = substr($js, 0, -2); //remove the trailing comma and new line
	echo $js . '};';
?>
	
</script>
