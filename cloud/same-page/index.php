<?php
	//current directory for all scripts is DOCUMENT_ROOT, for better & expectable handling with files
	chdir($_SERVER['DOCUMENT_ROOT']);
	
	$config = array(
		"title" => "On the Same Page | Samepage.io",
		"isHome" => false,
		
		"pageSpecific" => "samePage" //filename in /page/head/specific/{pageSpecific}.php
	);
// 	echo getcwd();
	include('./page/page.php');
?>