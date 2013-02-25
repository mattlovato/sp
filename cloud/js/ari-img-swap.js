$(document).ready(function() {

  // Rollover Action
  $(".ari-img-swap").hover(
    function(){this.src = this.src.replace("-off","-on");},
    function(){this.src = this.src.replace("-on","-off");}
  );

  // Preload Rollover States
  var cache = new Array();
  $(".ari-img-swap").each(function(){
    var cacheImage = document.createElement('img');
    //cacheImage.src = $(this).attr('rel');
    cacheImage.src = this.src.replace("-off","-on");
    cache.push(cacheImage);
  }); 
});