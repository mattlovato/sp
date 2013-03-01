<?php
if ($_SERVER['SERVER_NAME'] === 'samepage.io') {?>
<script type="text/javascript">
	document.write(unescape('%3Clink href="' + document.location.protocol +
	 '//fast.fonts.com/cssapi/30994873-1a6e-4999-9803-5b996fb15aaa.css" type="text/css" rel="stylesheet" %2F%3E'));
</script>
<?php
}
else {?>
<style>
	@font-face {
		font-family: 'FrutigerLTW01-45Light';
		src: url('//www.kerio.local/fonts/light/icomoon.eot?#iefix') format('embedded-opentype'), 
			 url('//www.kerio.local/fonts/light/icomoon.woff') format('woff'), 
			 url('//www.kerio.local/fonts/light/icomoon.ttf')  format('truetype'),
			 url('//www.kerio.local/fonts/light/icomoon.svg#svgFontName') format('svg');
	}

	@font-face {
		font-family: 'Frutiger LT W01 65 Bold';
		src: url('//www.kerio.local/fonts/bold/icomoon.eot?#iefix') format('embedded-opentype'), 
			 url('//www.kerio.local/fonts/bold/icomoon.woff') format('woff'), 
			 url('//www.kerio.local/fonts/bold/icomoon.ttf')  format('truetype'),
			 url('//www.kerio.local/fonts/bold/icomoon.svg#svgFontName') format('svg');
	}
</style>
<?php
}?>