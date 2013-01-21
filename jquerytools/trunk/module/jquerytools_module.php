<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class JQuerytools_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=>	"1.0", 
						'name'			=>	array(
												'en' => 'JQuery Tools', 
											), 
						'description' 	=>	array(
												'en' => 'JQuery Tools module', 
											), 
						'author' 		=>	"JQuery Tools", 
						'author_website'=>	"http://jquerytools.org", 
						'website'		=>	"http://jquerytools.org", 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
