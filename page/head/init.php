<?php
	if ($config['isHome']) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				if (window.kerio && kerio.register && kerio.register.InviteCompany) {
					kerio.register.InviteCompany.init(['.signupBlock']);
				}
			});
		</script>
	<?php
	}
	else { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				if (window.kerio && kerio.register && kerio.register.InviteCompany) {
					kerio.register.InviteCompany.init(['.signupBlock', '#greenbar']);
				}
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
		MM_preloadImages('/cloud/img/kerio-blue.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286', '/cloud/img/hidelip-over.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286');
	});
	
</script>
<script type="text/javascript" src="/cloud/js/munchkin.js"></script>
<script>
	if (window.Munchkin) {
		Munchkin.init('773-TBA-942');
	}
</script>