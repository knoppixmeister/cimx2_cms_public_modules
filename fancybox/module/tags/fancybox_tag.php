<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Fancybox_Tag extends Tag {
		function css() {
			return 	//'<link rel="stylesheet" type="text/css" href="http://fancybox.net/js/fancybox-1.3.4/jquery.fancybox-1.3.4.css"/>';
					'<link rel="stylesheet" type="text/css" href="'.base_url(TRUE).'public/modules/fancybox/jquery.fancybox-1.3.4.css"/>';
		}

		function js() {
			return 	//'<script type="text/javascript" src="http://fancybox.net/js/fancybox-1.3.4/jquery.fancybox-1.3.4.js"></script>';
					'<script type="text/javascript" src="'.base_url(TRUE).'public/modules/fancybox/jquery.fancybox-1.3.4.js"></script>';
		}

		function all() {
			$source = $this->get_attribute('source', 'local');// or 'ext'

			return	( $source == 'ext' ?  
					'<script type="text/javascript" src="http://fancybox.net/js/fancybox-1.3.4/jquery.fancybox-1.3.4.js"></script>
					<link rel="stylesheet" type="text/css" href="http://fancybox.net/js/fancybox-1.3.4/jquery.fancybox-1.3.4.css"/>'
					: 
					'<script type="text/javascript" src="'.base_url(TRUE).'public/modules/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
					<link rel="stylesheet" type="text/css" href="'.base_url(TRUE).'public/modules/fancybox/jquery.fancybox-1.3.4.css"/>' );
		}
	}
