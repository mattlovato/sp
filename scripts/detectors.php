<?php

include 'Mobile_Detect.php';
$detect = new Mobile_Detect();


//***** Determine Device, OS, and Browser ******/

//DETERMINE MOBILE OS 
if($detect->isMobile()){
	if($detect->isAndroidOS()) {
	$SPos='Android OS';	
	}
	if($detect->isBlackBerryOS()) {
	$SPos='BlackBerry OS';	
	}
	if($detect->isPalmOS()) {
	$SPos='Palm OS';	
	}
	if($detect->isSymbianOS()) {
	$SPos='Symbian OS';	
	}
	if($detect->isWindowsMobileOS()) {
	$SPos='Windows Mobile OS';	
	}
	if($detect->isiOS()) {
	$SPos='iOS';	
	}
	if($detect->isFlashLiteOS()) {
	$SPos='FlashLite OS';	
	}
	if($detect->isJavaOS()) {
	$SPos='Java OS';	
	}
	if($detect->isNokiaOS()) {
	$SPos='Nokia OS';	
	}
	if($detect->iswebOS()) {
	$SPos='Web OS';	
	}
	if($detect->isbadaOS()) {
	$SPos='Bada OS';	
	}
	if($detect->isBREWOS()) {
	$SPos='BREW OS';	
	}
	
	
//DETERMINE MOBILE BROWSER	
	if($detect->isChrome()) {
	$SPbrowser_type='Chrome';
	}
	if($detect->isDolfin()) {
	$SPbrowser_type='Dolfin';	
	}
	if($detect->isOpera()) {
	$SPbrowser_type='Opera';	
	}
	if($detect->isSkyfire()) {
	$SPbrowser_type='Skyfire';	
	}
	if($detect->isIE()) {
	$SPbrowser_type='IE';	
	}
	if($detect->isFirefox()) {
	$SPbrowser_type='Firefox';	
	}
	if($detect->isBolt()) {
	$SPbrowser_type='Bolt';	
	}
	if($detect->isTeaShark()) {
	$SPbrowser_type='TeaShark';	
	}
	if($detect->isBlazer()) {
	$SPbrowser_type='Blazer';	
	}
	if($detect->isSafari()) {
	$SPbrowser_type='Safari';	
	}
	if($detect->isMidori()) {
	$SPbrowser_type='Midori';	
	}
	if($detect->isGenericBrowser()) {
	$SPbrowser_type='Generic Browser';	
	}
	}


//DETERMINE IF DEVICE IS SMARTPHONE
if ($detect->isMobile() && !$detect->isTablet()) {
	if($detect->isiPhone()) {
	$deviceType='iPhone';	
	}
	if($detect->isBlackBerry()) {
	$deviceType='BlackBerry';	
	}
	if($detect->isHTC()) {
	$deviceType='HTC';	
	}
	if($detect->isNexus()) {
	$deviceType='Nexus';	
	}
	if($detect->isDellStreak()) {
	$deviceType='DellStreak';	
	}
	if($detect->isMotorola()) {
	$deviceType='Motorola';	
	}
	if($detect->isSamsung()) {
	$deviceType='Samsung';	
	}
	if($detect->isSony()) {
	$deviceType='Sony';	
	}
	if($detect->isAsus()) {
	$deviceType='Asus';	
	}
	if($detect->isPalm()) {
	$deviceType='Palm';	
	}
	if($detect->isGenericPhone()) {
	$deviceType='Generic Phone';	
	}
	$SPdevice='Smartphone (' . $deviceType . ')';
	
		
	} elseif ($detect->isTablet()) {
	if($detect->isBlackBerryTablet()) {
	$deviceType='BlackBerry Tablet';	
	}	
	if($detect->isiPad()) {
	$deviceType='iPad';	
	}	
	if($detect->isKindle()) {
	$deviceType='Kindle';	
	}	
	if($detect->isSamsungTablet()) {
	$deviceType='Samsung Tablet';	
	}	
	if($detect->isHTCtablet()) {
	$deviceType='HTC Tablet';	
	}	
	if($detect->isMotorolaTablet()) {
	$deviceType='Motorola Tablet';	
	}	
	if($detect->isAsusTablet()) {
	$deviceType='Asus Tablet';	
	}	
	if($detect->isNookTablet()) {
	$deviceType='Nook Tablet';	
	}	
	if($detect->isAcerTablet()) {
	$deviceType='Acer Tablet';	
	}	
	if($detect->isYarvikTablet()) {
	$deviceType='Yarvik Tablet';	
	}
	if($detect->isGenericTablet()) {
	$deviceType='Generic Tablet';	
	}	
	$SPdevice='Tablet (' . $deviceType . ')';
	}
	
	else {
	$SPdevice='Desktop';
	
	// check which browser you're using....
 	$useragent = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
 	$SPbrowser_version=$matched[1];
 	$SPbrowser_type= 'IE';
 	} elseif (preg_match('|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
 	$SPbrowser_version=$matched[1];
 	$SPbrowser_type= 'Opera';
 	} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
 	$SPbrowser_version=$matched[1];
 	$SPbrowser_type= 'Firefox';
 	} elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
	$SPbrowser_version=$matched[1];
 	$SPbrowser_type= 'Chrome';
 	} elseif(preg_match('|Version/([0-9\.]+)|',$useragent,$matched)) {
	$SPbrowser_version=$matched[1];
 	$SPbrowser_type= 'Safari';
 	} else {
 	// browser not recognized!
 	$SPbrowser_version = 0;
 	$SPbrowser_type= 'other';
 	}
 	//os
 	if (strstr($useragent,'Win')) {
 	$SPos='Windows';
 	} else if (strstr($useragent,'Mac')) {
 	$SPos='Mac';
 	} else if (strstr($useragent,'Linux')) {
 	$SPos='Linux';
 	} else if (strstr($useragent,'Unix')) {
 	$SPos='Unix';
 	} else {
 	$SPos='Other';
 	}
	}
	
	

//Compile Browser (and version if using desktop//
if(!empty($SPbrowser_version)){
	$SPbrowser=$SPbrowser_type . ' (version ' . $SPbrowser_version . ')';
	}
	else
	{
	$SPbrowser=$SPbrowser_type;	
	}




//***** Determine Campaign ******/
if (!isset($_SESSION['campaign'])) {
    $_SESSION['campaign'] = isset($_GET["SPcid"]) ? $_GET["SPcid"] : "";
}
$SPcampaign = $_SESSION['campaign'];


//***** Determine Landing Page ******/
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

if(!isset($_SESSION['landing_page']))
{
	$org_landing_page=curPageURL();
	$parts =  explode ('?', $org_landing_page);
	$clean_landing_page=$parts['0']; 
	$_SESSION['landing_page'] = $clean_landing_page; 
}
$SPlandingPage = $_SESSION['landing_page'];




//***** Determine REFERRAL URL ******/
if(!isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = $_SERVER['HTTP_REFERER'];
}
$SPreferringURL = $_SESSION['org_referer'];









//***** Determine SEARCH TERM USED ******/

if(!isset($_SESSION['']))
{

$parse = parse_url($_SERVER['HTTP_REFERER']);
$se = $parse["host"];
$raw_var = explode("&", $parse["query"] );
foreach ($raw_var as $one_var) {
    $raw = explode("=", $one_var);
    $var[$raw[0]] = urldecode ($raw[1]);
}
$se = explode (".", $se);
switch ($se[1]) {
    case 'yahoo':
        $SPkeywords = $var['p'];
        break;
    case 'aol':
        $SPkeywords = $var['query'];
        break;
    default:
        $SPkeywords = $var['q'];
}
unset($parse, $se, $raw_var, $one_var, $var);

$_SESSION['SPkeywords'] = $SPkeywords;
}

$SPkeywords = $_SESSION['SPkeywords'];





//***** Determine Signup Page ******/
$SPsignupPage=curPageURL();


//***** Determine Marketo Cookie ******/
$cookie = $_COOKIE['_mkto_trk'];


?>