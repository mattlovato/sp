<script type="text/javascript">
	$('document').ready(function() {
		var params = kerio.register.RegisterUtils.getUrlParameters();
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