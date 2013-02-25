$(document).ready(function() {

  //$("#numUsers").numeric();  // set numeric only via jquery.numeric.js plug-in
  $('input:radio[name=pricingTerm]')[0].checked = true;
  
  // Price settings [monthly, yearly] //
  var prem_user_price = [10,100];
  var prem_storage_price = [5,50];
  var term_indicator = ["/month","/year"];

  // Storage settings [base, increment, ceiling] //
  var free_storage = [2,.5,10];
  var prem_storage = [10,10,999999999999];
  var base = 0;
  var increment = 1;
  var ceiling = 2;
	
  var userBasedStorageAdd = 0;

  // Totals //
  var totals = ["FREE",0,0,0];
  var cost_free = 0;
  var stor_free = 1;
  var cost_prem = 2;
  var stor_prem = 3;
	
  // User set options //
  //var numUsers = $("#numUsers").val();
  var numUsers = 1;
  //var addlStorage = $("#addlStorage").val();
  var term = 0;
  
  // Update pricing //
  $('input:radio[name=pricingTerm]:checked').val()=="monthly" ? term = 0 : term = 1;
 // $("#numUsers").on("keydown", function() {setTimeout(function() {updatePricing();}, 0);});

  // Attach iOS detection Plugin - attaching to one enables all //
  /*
  $("#addlStorage").quickChange(function() { 
    $(this).blur();
    $("#addlStorage").focus(); // somehow prevents an extra blur from firing on focus
    updatePricing();
  });
*/
  $('input[name=pricingTerm]').change(function(){
    updatePricing();
  });

  function updatePricing() {
    var handShake;

    // Check for blank numUsers and force value of 1
    //$("#numUsers").val()=="" ? $("#numUsers").val(1) : false;

    // Get user-chosen values //
	//numUsers = $("#numUsers").val();
	numUsers = 1;
	//addlStorage = $("#addlStorage").val();

//   $('input:radio[name=pricingTerm]:checked').val()=="monthly" ? term = 0 : term = 1;
   $('input:radio[name=pricingTerm]:checked').val()=="monthly" ? $("#costPremium").text("$10") : $("#costPremium").text("$100");

    // Tally Starter Edition numbers //
    /*
	userBasedStorageAdd = free_storage[increment] * (numUsers - 1);
    totals[stor_free] = free_storage[base] + userBasedStorageAdd;
    (totals[stor_free] > free_storage[ceiling]) ? totals[stor_free] = free_storage[ceiling] : false;
*/
/*
    // Tally Premium Edition numbers //
    totals[cost_prem] = prem_user_price[term] + ((numUsers - 1) * prem_user_price[term]) + (prem_storage_price[term] * (addlStorage/prem_storage[increment]));
    handShake = prem_storage[base] * numUsers;
	totals[stor_prem] = parseInt(handShake) + parseInt(addlStorage);
	
	// Update fields //
	$("#costPremium").text("$"+totals[cost_prem]);//+term_indicator[term]);
	$("#spacePremium").text(totals[stor_prem]+" GB");
	$("#costFree").text("Free");
	$("#spaceFree").text(totals[stor_free]+" GB");
 */
  }
});

// Plugin to handle iOS detection of field changes //
$.fn.quickChange = function(handler) {
  return this.each(function() {
    var self = this;
    self.qcindex = self.selectedIndex;
    var interval;
    function handleChange() {
      if (self.selectedIndex != self.qcindex) {
        self.qcindex = self.selectedIndex;
        handler.apply(self);
      }
    }
    $(self).focus(function() {
      interval = setInterval(handleChange, 100);
    }).blur(function() { window.clearInterval(interval); })
    .change(handleChange); //also wire the change event in case the interval technique isn't supported (chrome on android)
  });
};