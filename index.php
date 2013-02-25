<?php
	//current directory for all scripts is DOCUMENT_ROOT, for better & expectable handling with files
	chdir($_SERVER['DOCUMENT_ROOT']);

	$config = array(
		"title" => "Samepage | File Sharing and Social Collaboration",
		"isHome" => true,
		
		"pageSpecific" => "home" //filename in /page/head/specific/{pageSpecific}.php
	);
 	
	include('./page/page.php');
?>