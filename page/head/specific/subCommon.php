<script type="text/javascript">
	function scrollWin(){
		$('html,body').animate({
			scrollTop: $("#scrollpoint").offset().top
		},700,'easeInOutExpo');
		return false;
	}
</script>

<script type='text/javascript'>//<![CDATA[ 
	$(window).load(function(){
		$(document).ready(function() {
			$(window).scroll( function(){
<?php
if ($SPdevice == 'Desktop') {
	echo 'if ($(this).scrollTop() > 570) {' .
	'$(\'#hidemenu\').fadeIn("fast");' .
	'} else {' .
	'$(\'#hidemenu\').fadeOut("fast");' .
	'}';
}
?>
								$('.hideme').each( function(i){
									var bottom_of_object = $(this).position().top + $(this).outerHeight();
									var bottom_of_window = $(window).scrollTop() + $(window).height();
									if( bottom_of_window + 250 > bottom_of_object ){
										$(this).animate({'opacity':'1'},500);
									}
								});
								$('.hidepopover').each( function(i){
									var bottom_of_object = $(this).position().top + 550;
									var bottom_of_window = $(window).scrollTop() + $(window).height();
									if( bottom_of_window - 0 > bottom_of_object ){
										$(this).popover('show');
									}
								});  
							});
							$(window).resize( function(){
								$('.hidepopover').each( function(i){
									var bottom_of_object = $(this).position().top + 550;
									var bottom_of_window = $(window).scrollTop() + $(window).height();
									if( bottom_of_window - 0 > bottom_of_object ){
										$(this).popover('show');
									}
								});  
							});
						});
					});//]]>  
</script>

<script type="text/javascript">
	var triggered=0;
	
	animatedcollapse.addDiv('signuptext', 'fade=1,speed=300,height=100px,group=1');
	animatedcollapse.addDiv('pricing', 'fade=1,speed=300,height=340px,group=2');
	animatedcollapse.addDiv('signup', 'fade=1,speed=300,height=340px,group=2');
	animatedcollapse.addDiv('greenbar', 'fade=1,speed=300,height=160px,group=3,hide=0');
	animatedcollapse.ontoggle=function($, divobj, state){
		if (divobj.id=="signup"){ 
			if (state=="block"){ 
				$("a[href*='?signup']").attr('rel', 'collapse[signuptext,signup]');
				animatedcollapse.hide('greenbar');
				triggered=1;
			}
			else
				$("a[href*='?signup']").attr('rel', 'expand[signuptext,signup]');
		}
				
		if (divobj.id=="pricing"){ 
			if (state=="block"){ 
				$("a[href*='?pricing']").attr('rel', 'collapse[signuptext,pricing]');
				animatedcollapse.hide('greenbar');
				triggered=1;
			}
			else
				$("a[href*='?pricing']").attr('rel', 'expand[signuptext,pricing]');
		}
				
		if (divobj.id=="signuptext"){ 
			if (state=="none" && triggered==1){ 
				animatedcollapse.show('greenbar');
			}
		}   
	}
	animatedcollapse.init();
</script>