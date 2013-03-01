<body>
	<div id="scrollpoint"></div>
	<div class="wrapper">
	<?php 
		include ('./page/body/top.php');
		include ('./page/body/menu.php');
		include ('./page/body/hideMenu.php');
		include ('./page/body/accountBox.php');
		include ('./page/body/preHeaderShadow.php');
		
		
		
		if ($config['isHome']) { //homepage
			include ('./page/body/content/home.php');
		}
		else { //subpage
			include ('./page/body/content/sub.php');
		}
	?>
    </div>
	
	<?php include('./page/body/footer.php'); ?>
	<?php include('./page/body/ga.php'); ?>
  
</body>