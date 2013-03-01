<?php
	$current = $_SERVER['REQUEST_URI'];
	$samePage = '/cloud/same-page';
	$socialBusiness = '/cloud/social-business';
	$fileSharing = '/cloud/file-sharing';
?>

<div class="pre-header">
	<nav class="pre-header-frame">
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" width="2" height="38"  class="vertgreendivide" alt="|"/> 
        <a href="?pricing"  rel="expand[signuptext,pricing]" class="menubutton"><div class="menu">Pricing</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" width="2" height="38"  class="vertgreendivide" alt="|"/>
        <a href="<?php echo $samePage . '/'?>" class="menubutton"><div class="menu<?php echo (substr($current, 0, strlen($samePage)) == $samePage ? ' on' : '');?>">On the Same Page</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" width="2" height="38"  class="vertgreendivide" alt="|"/> 
        <a href="<?php echo $socialBusiness . '/'?>" class="menubutton"><div class="menu<?php echo (substr($current, 0, strlen($socialBusiness)) == $socialBusiness ? ' on' : '');?>">Social for Business</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" width="2" height="38"  class="vertgreendivide" alt="|"/> 
        <a href="<?php echo $fileSharing . '/'?>" class="menubutton"><div class="menu<?php echo (substr($current, 0, strlen($fileSharing)) == $fileSharing ? ' on' : '');?>">File Sharing</div></a> 
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" width="2" height="38"  class="vertgreendivide" alt="|"/> 
	</nav>
</div>