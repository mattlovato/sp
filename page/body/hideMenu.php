<?php
	$current = $_SERVER['REQUEST_URI'];
	$samePage = '/cloud/same-page';
	$socialBusiness = '/cloud/social-business';
	$fileSharing = '/cloud/file-sharing';
?>

<div id="hidemenu">
    <div id="hidemenu-frame">
        <a href="#" rel="expand[signuptext,signup]" class="menucreate" onclick="scrollWin();"><div class="menu bluebg">Create an Account</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="vertgreendivide"/> 
		<a href="#" rel="expand[signuptext,pricing]" class="menucreate" onclick="scrollWin();"><div class="menu">Pricing</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="vertgreendivide"/>
        <a href="<?php echo $samePage . '/'?>" class="menubutton"><div class="menu<?php echo (substr($current, 0, strlen($samePage)) == $samePage ? ' on' : '');?>">On the Same Page</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="vertgreendivide"/> 
        <a href="<?php echo $socialBusiness . '/'?>" class="menubutton"><div class="menu<?php echo (substr($current, 0, strlen($socialBusiness)) == $socialBusiness ? ' on' : '');?>">Social for Business</div></a>
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="vertgreendivide"/> 
        <a href="<?php echo $fileSharing . '/'?>" class="menubutton"><div class="menu<?php echo (substr($current, 0, strlen($fileSharing)) == $fileSharing ? ' on' : '');?>">File Sharing</div></a> 
        <img src="/cloud/img/vert-divider-green.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="vertgreendivide"/>
		<?php
		if ($SPdevice == 'Desktop') {
			echo '<div class="menuwatermarkhover"><a href="/cloud"><img class="bottom" src="/cloud/img/samepage-watermark100.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286"/></a></div>';
		}
		?>
        <a href="/cloud/"><img src="/cloud/img/samepage-watermark.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="Samepage" class="menuwatermark bottom"/></a> 
    </div>    
	<div style="z-index:999;background-image: url('/cloud/img/preheader-shadow.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286');background-repeat:repeat-x;margin-left:auto;margin-right:auto;width:850px;height:9px;">&nbsp;</div>
</div>