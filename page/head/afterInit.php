<script type="text/javascript">
	$('document').ready(function() {
		var 
			matchGroup,
			pl     = /\+/g,  //
			search = /([^&=]+)=?([^&]*)/g,
			decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
			query  = window.location.search.substring(1),
			params = {};

		while ((matchGroup = search.exec(query))) {
			params[decode(matchGroup[1])] = decode(matchGroup[2]);
		}
		//when going from login page through 'create an account' link, open the registration form automatically
		if (params.signup !== undefined) {
			animatedcollapse.toggle('signuptext');
			animatedcollapse.toggle('signup');
		}
		//when going from login page through 'pricing' link, open the pricing div automatically
		if (params.pricing !== undefined) {
			animatedcollapse.toggle('signuptext');
			animatedcollapse.toggle('pricing');
		}
	});
</script>