{tag:jquery:jquery}
{tag:fancybox:all}

<style type="text/css">
	#fancybox-bg-e, 
	#fancybox-bg-se, 
	#fancybox-bg-s, 
	#fancybox-bg-sw, 
	#fancybox-bg-w, 
	#fancybox-bg-n, 
	#fancybox-bg-nw {
		background: none;
	}

	#fancybox-outer {
		background: none;
	}
</style>

<a href="#inline1" id="various1">Inline - auto detect width / height</a>
<div style="display: none;">
	<div id="inline1" style="width: 700px; padding: 10px; border: 1px solid lime;">

		<div style="width: 500px; margin: 0 auto;">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
			Etiam quis mi eu elit tempor facilisis id et neque. 
			Nulla sit amet sem sapien. Vestibulum imperdiet porta ante ac ornare. 
			Nulla et lorem eu nibh adipiscing ultricies nec at lacus. 
			Cras laoreet ultricies sem, at blandit mi eleifend aliquam. 
			Nunc enim ipsum, vehicula non pretium varius, cursus ac tortor. 
			Vivamus fringilla congue laoreet. Quisque ultrices sodales orci, 
			quis rhoncus justo auctor in. Phasellus dui eros, bibendum eu feugiat ornare, f
			aucibus eu mi. Nunc aliquet tempus sem, id aliquam diam varius ac. Maecenas nisl nunc, 
			molestie vitae eleifend vel, iaculis sed magna. Aenean tempus lacus vitae orci posuere porttitor 
			eget non felis. Donec lectus elit, aliquam nec eleifend sit amet, vestibulum sed nunc.
		</div>

		<div style="border: 1px solid red; width: 600px; position: relative; margin: 0 auto;">
			<table style="margin: 0 auto;" border="1">
			<tr>
				<td>Your name: </td>
				<td><input type="text" name="name"></td>
				<td>Your e-mail: </td>
				<td><input type="text" name="email"></td>
				<td><input type="submit" value="Subscribe"></td>
			</tr>
			</table>
		</div>

	</div>
</div>

<script type="text/javascript">
	$("#various1").fancybox({
		'titlePosition'		: 'inside', 
		'transitionIn'		: 'none', 
		'transitionOut'		: 'none', 
		'padding'			: 0, 
		'overlayOpacity'	: 0, 
		'margin'			: 0, 
		'hideOnOverlayClick': false, 
		'onClosed'			: function() {
			//alert('aaa');
		}
	});
</script>
