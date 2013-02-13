<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class JQuery_Nicescroll_Tag extends Tag {
		function js() {
			$src = $this->get_attribute('src', 'ext');

			if($src == 'ext') {
				return '<script src="https://raw.github.com/inuyaksa/jquery.nicescroll/master/jquery.nicescroll.js" type="text/javascript"></script>';
			}
			else {
				return '<script src="'.base_url(TRUE).'public/modules/jquery_nicescroll/js/jquery.nicescroll.min.js" type="text/javascript"></script>';
			}
		}
	}
