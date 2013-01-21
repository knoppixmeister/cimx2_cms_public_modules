<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Loginza_Tag extends Tag {
		function widget() {
			$id = $this->get_attribute('id');
			$return_url = $this->get_attribute('return_url', '');
			$lang 		= $this->get_attribute('lang', 'en');

			//if(is_null($id)) {

			return '<script src="http://loginza.ru/js/widget.js" type="text/javascript"></script>
					<iframe src="http://loginza.ru/api/widget?overlay=loginza&token_url='.$return_url.'&lang='.$lang.'" style="width:359px; height: 200px;" scrolling="no" frameborder="no"></iframe>';
		}
	}
