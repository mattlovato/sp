<?php
	if ($config['isHome']) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				kerio.register.InviteCompany.init(['.signupBlock']);
			});
		</script>
	<?php
	}
	else { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				kerio.register.InviteCompany.init(['.signupBlock', '#greenbar']);
			});
		</script>
	<?php
	}
?>

<script type="text/javascript">
	if (self.name != '_refreshed_')
	{
		self.name = '_refreshed_';
		self.location.reload(true);
	}
	else self.name = '';
	
	$(window).bind('load', function() {
		var urlHash = window.location.href.split('#')[1]; // Get hash from URL

		$(document).load().scrollTop(0);

		if (urlHash) {
			$('html,body').animate({scrollTop:$("#"+urlHash).offset().top}, 1000,'easeInOutExpo');
		}
	});
	
	//TODO: preload not needed at all, instead use css image positioning & safe some trafic
	$(document).ready(function() {
		MM_preloadImages('/cloud/img/kerio-blue.png?v=', '/cloud/img/hidelip-over.png?v=');
	});
	
	
//	$('document').ready(function() {
//		var params = kerio.register.RegisterUtils.getUrlParameters();
//		//when going from login page through 'create an account' link, open the registration form automatically
//		if (params.signup !== undefined) {
//			animatedcollapse.toggle('signuptext');
//			animatedcollapse.toggle('signup');
//		}
//		//when going from login page through 'pricing' link, open the pricing div automatically
//		if (params.pricing !== undefined) {
//			animatedcollapse.toggle('signuptext');
//			animatedcollapse.toggle('pricing');
//		}
//	});
	
	//TODO: use local munchkin
	document.write(unescape("%3Cscript src='" + document.location.protocol +
		"//munchkin.marketo.net/munchkin.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script>
	if (Munchkin) {
		Munchkin.init('773-TBA-942');
	}
</script>