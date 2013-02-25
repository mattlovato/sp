<script type="text/javascript">
	$(document).ready(function(){
		$t=$('#Touchable').Hoverable();
		$t2=$('#Touchable2').Hoverable();  

		$t.newHover(function(e, touch){ //hoverIN
			$tooltip=$(this).find('.tooltip');
			$tooltip.show();
		}, function(e, touch){//hoverOut
			$tooltip=$(this).find('.tooltip');    
			$tooltip.hide();
		});
		$t2.newHover(function(e, touch){ //hoverIN
			$tooltip=$(this).find('.tooltip');
			$tooltip.show();
		}, function(e, touch){//hoverOut
			$tooltip=$(this).find('.tooltip');    
			$tooltip.hide();
		});
	})
</script>

<div class="createAccountWrapTop">
	<div class="pricingWrapper">

		<div class="pricingBlock blueglow">
			<p class="pricingTitle" style="padding-bottom:10px;">Starter Plan</p>
			<div id="costFree" class="pricingCost">Free</div>
			<div id="spaceFree" class="pricingStor">up to 10 GB </div>


			<div class="touchme" id="Touchable" style="position:relative; width:20px; height:40px; display:inline-block; z-index:9999;">
				<div class="tooltip tooltipstyle" style="display:block;position:absolute;display:none;">
					<div class="inner" >Shared storage: Get 2 GB at signup. Add 500 MB for each invited user.<br /><br /> Max file size: 250 MB</div>
				</div>
				<img height="15" width="15" src="/cloud/img/tip.jpg?v=" style="padding-bottom:5px;"/>
			</div>

			<a href="" rel="expand[signup]"><div class="createbutton" style="margin-left:auto;margin-right:auto;margin-top:10px;">Start Here</div></a>
		</div>
		<div class="pricingSpacer_20">&nbsp;</div>
		<div class="pricingBlock">
			<p class="pricingTitle" style="padding-bottom:10px;">Premium Plan</p>
			<div id="costPremium" class="pricingCost">$10<span style='font-size:14px;'> / user / month</span></div>
			<div id="spacePremium" class="pricingStor">10 GB<span style='font-size:14px;'> / user</span></div>





			<div class="touchme" id="Touchable2" style="position:relative; width:20px; height:40px; display:inline-block; z-index:9999;">
				<div class="tooltip tooltipstyle" style="display:block;position:absolute;display:none;">
					<div class="inner">Annual price: $100/user/year. <br /><br />Additional storage: 10 GB for $5/month or $50/year.</div>
				</div>
				<img height="15" width="15" src="/cloud/img/tip.jpg?v=" style="padding-bottom:5px;"/>
			</div>





			<br /><br />
			<div class="pricing_term">
				<div class="pricing_term_con1">

				</div>
				<div class="pricing_term_con2">

				</div>
				<div style="margin-top:10px;font-size:12px; color:#CCCCCC;">*Start free and upgrade later</div>
			</div>
		</div>
	</div>

</div> 