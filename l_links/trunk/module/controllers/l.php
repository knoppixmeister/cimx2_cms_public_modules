<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class L extends Frontend_Controller {
		function __construct() {
			parent::__construct();
		}

		function _remap($uri=NULL, $param1=NULL) {
			Debug::dump(func_get_args());
		}
	}
