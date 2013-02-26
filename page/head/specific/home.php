<meta name="description" content="Samepage is a secure file sharing and social collaboration platform designed to help teams communicate, share content, and manage projects.">

<script type="text/javascript">
	
	jQuery(document).ready(function($) {
	
		$("#popover1").popover({
			title: "Synchronize files to every device",
			content: "<ul><li><hr />Save changes to files on your computer and you'll automatically update copies on your team's computers. The history of changes will be safely stored online.<br /><br /><a href='/cloud/file-sharing/#sync' class='bold'><img src='/cloud/img/plus-button.png?v=' style='width:12px;' alt='Learn more'  width='12' height='12'/> Learn more</a></li></ul>",
			trigger: 'manual',
			position:'right'
		});
				
				
			
		$("#popover3").popover({
			title: "Comment. Click. Done.",
			content: "<ul><li><hr />Comment on anything and instantly deliver the message to all the right people with a single click, all necessary links included.<br /><br /><a href='/cloud/social-business/' class='bold'><img src='/cloud/img/plus-button.png?v=' style='width:12px;' alt='Learn more'   width='12' height='12'/> Learn more</a> </li></ul>",
			trigger: 'manual',
			position:'left'
		});
				
		$("#popover5").popover({
			title: "Keep content in context",
			content: "<ul><li><hr />Surround your files and conversations with calendars, task lists and other team coordination tools.<br /><br /><a href='/cloud/same-page/' class='bold'><img src='/cloud/img/plus-button.png?v=' style='width:12px;' alt='Learn more'   width='12' height='12'/> Learn more</a> </li></ul>",
			trigger: 'manual',
			position:'right'
					
		});
				
	});

	$(window).resize( function(){
		$('#popover1').each( function(i){
			$(this).popover('hide');
		}); 
		$('#popover3').each( function(i){
			$(this).popover('hide');
		}); 
		$('#popover5').each( function(i){
			$(this).popover('hide');
		});  
	});

</script>

<script type="text/javascript">
	$(document).ready(function(){
    
		var slider = $('.bxslider').bxSlider({
			mode: 'horizontal',
			speed: 800,
			infiniteLoop: true,
			touchEnabled: false,
			easing: 'easeInOutExpo',
			auto: true,
			autoHover: false,
			pause: 9500,
			controls:true,
			startSlide:6,

			onSliderLoad: function(){
				document.getElementById('box1-on').style.display = "none"; 
				document.getElementById('box2-on').style.display = "none"; 
				document.getElementById('box3-on').style.display = "none"; 
			},


			onSlideAfter: function(){
				var current = slider.getCurrentSlide();
	
				if (current=='0' || current=='1'){
					document.getElementById('box1-on').style.display = "block"; 
					document.getElementById('box2-on').style.display = "none"; 
					document.getElementById('box3-on').style.display = "none"; 
				};

				if (current=='1'){
					$("#popover1").popover('show');	
				};
				if (current=='2' || current=='3'){
					document.getElementById('box1-on').style.display = "none"; 
					document.getElementById('box2-on').style.display = "block"; 
					document.getElementById('box3-on').style.display = "none"; 	
				};
				if (current=='3'){
					$("#popover3").popover('show');
				};
				if (current=='4' || current=='5'){
					document.getElementById('box1-on').style.display = "none"; 
					document.getElementById('box2-on').style.display = "none"; 
					document.getElementById('box3-on').style.display = "block";
				};
				if (current=='5'){
					$("#popover5").popover('show');	
				};
				if (current=='6'){
					document.getElementById('box1-on').style.display = "none"; 
					document.getElementById('box2-on').style.display = "none"; 
					document.getElementById('box3-on').style.display = "none";
				};
			}, 
			onSlideBefore: function(){
				$("#popover1").popover('fadeOut');
				$("#popover3").popover('fadeOut');
				$("#popover5").popover('fadeOut');	
			}
		});


		$('.createbutton').click(function(){
			$("#popover1").popover('fadeOut');
			$("#popover3").popover('fadeOut');
			$("#popover5").popover('fadeOut');	
		});

		$('.menu').click(function(){
			$("#popover1").popover('fadeOut');
			$("#popover3").popover('fadeOut');
			$("#popover5").popover('fadeOut');	
		});


		$('.createbutton').click(function(){
			slider.stopAuto();
		});
		$('.menu').click(function(){
			slider.stopAuto();
		});
		$('#slide1').click(function(){
			slider.goToSlide(0);
			slider.stopAuto();
			return false;
		});
		$('#slide2').click(function(){
			slider.goToSlide(2);
			slider.stopAuto();
			return false;
		});
		$('#slide3').click(function(){
			slider.goToSlide(4);
			slider.stopAuto();
			return false;
		});
	});
</script>

<script type='text/javascript'>//<![CDATA[ 

	function setRoomHeight() {
		$(".room").height(document.documentElement.clientHeight - $(".footer").height()-108);
	}
	$(setRoomHeight);
	$(window).resize(setRoomHeight);
	//]]>  


	animatedcollapse.addDiv('signuptext', 'fade=1,speed=300,height=100px,group=1');
	animatedcollapse.addDiv('pricing', 'fade=1,speed=300,height=340px,group=2');
	animatedcollapse.addDiv('signup', 'fade=1,speed=300,height=340px,group=2');
	animatedcollapse.ontoggle=function($, divobj, state){
		if (divobj.id=="signup"){ 
			if (state=="block") 
				$("a[href*='?signup']").attr('rel', 'collapse[signuptext,signup]');
			else
				$("a[href*='?signup']").attr('rel', 'expand[signuptext,signup]');
		}
		if (divobj.id=="pricing"){ 
			if (state=="block") 
				$("a[href*='?pricing']").attr('rel', 'collapse[signuptext,pricing]');
			else
				$("a[href*='?pricing']").attr('rel', 'expand[signuptext,pricing]');
		} 
	}
	animatedcollapse.init();
</script>