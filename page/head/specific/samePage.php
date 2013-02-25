<meta name="description" content="Having your shared files, calendars, tasks, and other collaboration tools on the same page as your team and its conversations is exactly what keeps everything 
and everyone synchronized.">

<script type="text/javascript">
	jQuery(document).ready(function($) {
			
				
		$("#popover0").popover({
			title: "Be a power page designer",
			content: "<ul><li><hr />Add any number of useful components to your page and easily drag them into place. Create task lists, share image galleries, build spreadsheets, embed videos, and more.</li></ul>",
			trigger: 'manual',
			position:'bottom'
		});
				
				
		$("#popover1").popover({
			title: "Catch up and join in",
			content: "<ul><li><hr />Review a page's entire conversation history, post comments of your own, or reply to the team's feedback. It's all nicely organized next to the content under discussion.",
			trigger: 'manual',
			position:'left'
		});
				
		$("#popover2").popover({
			title: "View change histories",
			content: "<ul><li><hr />Review a page's entire activity history so you can hit the ground running when you jump into the project.</li></ul>",
			trigger: 'manual',
			position:'bottom'
		});
				
		$("#popover3").popover({
			title: "For your eyes only",
			content: "<ul><li><hr />Samepage gives you complete sharing control over your content with a few simple clicks. Set sharing rights for entire spaces, or customize sharing rights for specific pages.</li></ul>",
			trigger: 'manual',
			position:'bottom'
		});
				
		$("#popover4").popover({
			title: "Share outside the circle",
			content: "<ul><li><hr />Need to share a page with someone outside your organization? No problem. Any page can easily be opened for public access with or without edit rights,  and password protected if necessary. </li></ul>",
			trigger: 'manual',
			position:'bottom'
		});
				
				
				
				
				
				
		$("#popover6").popover({
			title: "Organize and supervise",
			content: "<ul><li><hr />Spaces do more than allow you to organize and share content with your team. They allow you to see a collection of recent updates made across any page within.</li></ul>",
			trigger: 'manual',
			position:'bottom'
		});
				
				
		$("#popover7").popover({
			title: "Customize your favorites",
			content: "<ul><li><hr />Dragging a space or page into your favorites makes it easier to find, but updates in your favorites also display in your Newsfeed and send updates to your inbox.</li></ul>",
			trigger: 'manual',
			position:'right'
		});
				
		$("#popover8").popover({
			title: "Comprehensive search",
			content: "<ul><li><hr />This search engine not only finds text and files for you, but it also looks inside many popular file types to locate the content you're looking for. </li></ul>",
			trigger: 'manual',
			position:'bottom'
		});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
    
  var slider1 = $('#slider1').bxSlider({
  	  mode: 'horizontal',
	  speed: 600,
	  infiniteLoop: true,
	  touchEnabled: false,
	  easing: 'easeInOutExpo',
	  auto: false,
	  autoHover: false,
	  pause: 8500,
	  controls:true,
	  startSlide:2,

  	  onSlideBefore: function(){
	  	$("#popover0").popover('fadeOut');
	  	$("#popover1").popover('fadeOut');
	  	$("#popover2").popover('fadeOut');	
      },  

      onSlideAfter: function(){
	  var current = slider1.getCurrentSlide();
	  	if (current=='0'){
			$("#popover0").popover('show'); 
	  	};
	  	if (current=='1'){
	 		$("#popover1").popover('show'); 
	  	};
	  	if (current=='2'){
			$("#popover2").popover('show'); 
	  	};
      }
  });
  
   
   
   var slider2 = $('#slider2').bxSlider({
  	  mode: 'horizontal',
	  speed: 600,
	  infiniteLoop: true,
	  touchEnabled: false,
	  easing: 'easeInOutExpo',
	  auto: false,
	  autoHover: false,
	  pause: 8500,
	  controls:true,
	  startSlide:1,

  	  onSlideBefore: function(){
	  	$("#popover3").popover('fadeOut');
	  	$("#popover4").popover('fadeOut');
	  	$("#popover5").popover('fadeOut');	
      },  

      onSlideAfter: function(){
	  var current = slider2.getCurrentSlide();
	  	if (current=='0'){
			$("#popover3").popover('show'); 
	  	};
	  	if (current=='1'){
	 		$("#popover4").popover('show'); 
	  	};
	  	if (current=='2'){
			$("#popover5").popover('show'); 
	  	};
      }
  });
  
  
  
  var slider3 = $('#slider3').bxSlider({
  	  mode: 'horizontal',
	  speed: 600,
	  infiniteLoop: true,
	  touchEnabled: false,
	  easing: 'easeInOutExpo',
	  auto: false,
	  autoHover: false,
	  pause: 8500,
	  controls:true,
	  startSlide:1,

  	  onSlideBefore: function(){
	  	$("#popover6").popover('fadeOut');
	  	$("#popover7").popover('fadeOut');
	  	$("#popover8").popover('fadeOut');	
      },  

      onSlideAfter: function(){
	  var current = slider3.getCurrentSlide();
	  	if (current=='0'){
			$("#popover6").popover('show'); 
	  	};
	  	if (current=='1'){
	 		$("#popover7").popover('show'); 
	  	};
	  	if (current=='2'){
			$("#popover8").popover('show'); 
	  	};
      }
  });
  
  var slidescroll1 = 0
  var slidescroll2 = 0
  var slidescroll3 = 0
	
	
	$(document).ready(function () {
      
      var height = $('body').height();
         if(height > 1000 && slidescroll1 == 0 ) {
    	    slider1.goToSlide(0);
    	    slidescroll1 = 1;
         }
		 
   });	
	
   $(window).scroll(function () {
      
      var height = $('body').height();
      var scrollTop = $('body').scrollTop();
         if(height > 800 && scrollTop > 100 && slidescroll1 == 0 ) {
    	    slider1.goToSlide(0);
    	    slidescroll1 = 1;
         }
		 if(height < 800 && scrollTop > 350 && slidescroll1 == 0 ) {
    	    slider1.goToSlide(0);
    	    slidescroll1 = 1;
         }
         if(height > 800 && scrollTop > 850 && slidescroll2 == 0 ) {
    	    slider2.goToSlide(0);
    	    slidescroll2 = 1;
         }
		 if(height < 800 && scrollTop > 1050 && slidescroll2 == 0 ) {
    	    slider2.goToSlide(0);
    	    slidescroll2 = 1;
         }
		 if(height > 800 && scrollTop > 1500 && slidescroll3 == 0 ) {
    	    slider3.goToSlide(0);
    	    slidescroll3 = 1;
         }
		 if(height < 800 && scrollTop > 1870 && slidescroll3 == 0 ) {
    	    slider3.goToSlide(0);
    	    slidescroll3 = 1;
         }
   });
   
   
   
   

  $('.createbutton').click(function(){
		$("#popover0").popover('fadeOut');
		$("#popover1").popover('fadeOut');
		$("#popover2").popover('fadeOut');
		$("#popover3").popover('fadeOut');
		$("#popover4").popover('fadeOut');
		$("#popover5").popover('fadeOut');
		$("#popover6").popover('fadeOut');
		$("#popover7").popover('fadeOut');	
		$("#popover8").popover('fadeOut');	
	
  });

  $('.menu').click(function(){
		$("#popover0").popover('fadeOut');
		$("#popover1").popover('fadeOut');
		$("#popover2").popover('fadeOut');
		$("#popover3").popover('fadeOut');
		$("#popover4").popover('fadeOut');
		$("#popover5").popover('fadeOut');
		$("#popover6").popover('fadeOut');
		$("#popover7").popover('fadeOut');
		$("#popover8").popover('fadeOut');	
	
  });
  

   	
});
</script>