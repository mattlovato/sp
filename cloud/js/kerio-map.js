$(document).ready(function() {
  var currentID = "#map_us";
  var currentMag = "us";
  var clickedID = "";

  // Initialize Content States
  $(".kerio-map").each(function(){
    if("#"+$(this).attr('id')!=currentID) $('#'+$(this).attr('id')).fadeOut("fast");
  });
  $("#"+currentMag).fadeOut("fast");
  
  // Set Click Behavior
  $(".kerio-loc").click(
    function(){
      $("#"+currentMag).fadeIn("fast");
      clickedID = this.id;
      currentMag = this.id;
	  $("#"+currentMag).fadeOut("fast");
      $(currentID).fadeOut("fast",function() {
        currentID = "#map_"+clickedID;
        $("#kerio-map-link").attr("href", setKerioMapLink(currentID));
  	    $(currentID).fadeIn("slow");
	  });
	});

  function setKerioMapLink(thisID) {

      switch (thisID) { 
        case '#map_us': 
          return "http://goo.gl/maps/RUaYq";
		  break;
        case '#map_cr1': 
          return "http://goo.gl/maps/xAYs2";
		  break;
        case '#map_cr2': 
          return "http://goo.gl/maps/zQ5fQ";
		  break;
        case '#map_uk': 
          return "http://goo.gl/maps/PEiEG";
		  break;
        case '#map_de': 
          return "http://goo.gl/maps/1FGZe";
		  break;
        case '#map_au': 
          return "http://goo.gl/maps/4biUY";
		  break;
        case '#map_ru': 
          return "http://goo.gl/maps/TdxPk";
		  break;
	  }
  }

});