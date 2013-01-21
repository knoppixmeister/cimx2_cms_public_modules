<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Modernizr_Tag extends Tag {
		function js() {
			return '<script type="text/javascript" src="http://modernizr.com/downloads/modernizr-latest.js"></script>';
		}
	}
