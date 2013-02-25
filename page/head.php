<?php
include('./scripts/detectors.php');
include('./scripts/geoip.php');

?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280"  />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW" />
	<meta property="og:image" content="http://samepage.io/cloud/img/socialLogo.png?v="/>

	<title><?php echo ($config['title'] ? $config['title'] : "Samepage | File Sharing and Social Collaboration"); ?></title>

	<?php
	include('./page/head/sources.php'); // CSS & JS files
	include('./page/head/init.php'); //all JS inits

	if ($config["pageSpecific"] && file_exists($file = './page/head/specific/' . $config["pageSpecific"] . '.php')) {
		include ($file);
	}
	
	if ($config['isHome'] === false) {
		include "./page/head/specific/subCommon.php";
	}
	
	include ('./page/head/afterInit.php'); 
	
	include('./scripts/marketoData.php');
	?>
</head>