/* ------------------------------------------------------------------- 

   KERIO TABS (kerio-tabs.js)
   Aristomenis Capogeannis : 2012.01

   Dependent CSS:
	 kerio-tabs.css

   Dependent HTML:
     <div id="tabbed_box_1" class="tabbed_box">
       <div class="tabbed_area">
         <ul class="ktabs">
           <li id="billing" class="kerio-tab active">BILLING</li>
         </ul>
         <div id="billing-content" class="kcontent">
           My billing content
	     </div>
 	   </div>
 	 </div>

   Revisions:
     2012.01.11 : Rev 1.0 - Ari C.

------------------------------------------------------------------- */


 
// Main Tab Code
$(document).ready(function(e) {

  // Global vars
//  var URLvar = location.search.replace('?', '').split('=');
  var URLvar = location.search.replace("?","?").split("?");
  var currentID = "#"+$(".ktabs > li:first-child").attr("id");
  var thisID = "";
  var thisTab = "";
  var thisContent = "";

  // Detect if HTML5 pushState available
  //  var pushStateEnabled = Boolean (
  //	window.history && window.history.pushState && window.history.replaceState
  //	&& !(
  //		/* disable for versions of iOS before version 4.3 (8F190) */
  //		(/ Mobile\/([1-7][a-z]|(8([abcde]|f(1[0-8]))))/i).test(navigator.userAgent)
  //		/* disable for the mercury iOS browser, or at least older versions of the webkit engine */
  //		|| (/AppleWebKit\/5([0-2]|3[0-2])/i).test(navigator.userAgent)
  //	)
  //  ); // end pushState detect

  // Check for existence of tab selection in URL
  if (URLvar[1]) {currentID = "#"+URLvar[1];}

  // Initialize Content States
  $(".kcontent").each(function(){

    // Set vars
    thisID = $(this).attr("id");
    thisContent = "#"+thisID;
	thisTab = thisContent.split("-content")[0];

    // Swap active tabs and corresponding content
    if(thisTab!=currentID) {
      $(thisTab).removeClass("active");
	  $(thisContent).fadeOut("fast",function(){
		$(thisContent).css("visible","none");
	  });
      $(thisTab).on('tap click', function() {setTabBehavior(this);});
      $(thisTab).css("cursor","pointer");
  	} else {
	  $(thisTab).addClass("active");
      $(thisTab).off('tap click');
      $(thisTab).css("cursor","default");
	}
  }); // end content initialize


  // Setup handling for all iOS tap events
  $.event.special.tap = {

    setup: function(data, namespaces) {
      var $elem = $(this);
      $elem.bind('touchstart', $.event.special.tap.handler)
      .bind('touchmove', $.event.special.tap.handler)
      .bind('touchend', $.event.special.tap.handler);
    },

    teardown: function(namespaces) {
      var $elem = $(this);
      $elem.unbind('touchstart', $.event.special.tap.handler)
      .unbind('touchmove', $.event.special.tap.handler)
      .unbind('touchend', $.event.special.tap.handler);
    },

    handler: function(event) {
      event.preventDefault();
      var $elem = $(this);
      $elem.data(event.type, 1);
      if (event.type === 'touchend' && !$elem.data('touchmove')) {
        // set event type to "tap"
        event.type = 'tap';
        // let $ handle the triggering of "tap" event handlers
        $.event.handle.apply(this, arguments);
      } else if ($elem.data('touchend')) {
        // reset our data attributes because our event is over
        $elem.removeData('touchstart touchmove touchend');
      }
    }
  }; // end iOS handling
  
  
  // Bind tap and click events
  //  $('.kerio-tab').on('tap click', function() {setTabBehavior(this);});


  // Set tab behavior
  function setTabBehavior(targetDOM) {

    // Set vars
    thisTab = "#"+$(targetDOM).attr("id");
    thisContent = thisTab+"-content";

    $(thisTab).off('tap click');
	$(thisTab).addClass("active");
    $(thisTab).css("cursor","default");

    // Update browser URL for bookmarking, etc.
    //    if (window.history && pushStateEnabled) {
    //	  (window.location.href.indexOf("?")) ? history.replaceState(null, null, window.location.href.slice(0,window.location.href.indexOf("?"))+"?="+$(targetDOM).attr("id")) : history.replaceState(null, null, window.location.href+"?="+$(targetDOM).attr("id"));
    //	}

	// Set Tab States
	$(".kerio-tab").each(function(){
      var tabStop = "#"+$(this).attr("id");

	  if (tabStop != thisTab) {
  		$(this).removeClass("active");
        $(this).on('tap click', function() {setTabBehavior(this);});
        $(this).css("cursor","pointer");
	  }
	});
	
    // Swap content states
    $(currentID+"-content").fadeOut("fast",function() {
  	  $(thisContent).fadeIn("slow");
      currentID = thisTab;
	}); // end tab behavior
  }

  $(this).scrollTop(0);
});  // end document.ready

// end kerio-tabs.js

