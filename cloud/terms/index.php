<?php
	//current directory for all scripts is DOCUMENT_ROOT, for better & expectable handling with files
	chdir($_SERVER['DOCUMENT_ROOT']);
	
	$config = array(
		"title" => "Terms | Samepage.io",
		"isHome" => false,
		
		"pageSpecific" => "terms" //filename in /page/head/specific/{pageSpecific}.php
	);
// 	echo getcwd();
	include('./page/page.php');
?>