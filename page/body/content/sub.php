<?php
	if (file_exists($sub_file = './page/body/content/specific/' . $config['pageSpecific'] . '.php')) {
		include $sub_file;
	}
?>