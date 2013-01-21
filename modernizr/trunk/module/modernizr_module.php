<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Modernizr_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version'		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Modernizr', 
											), 
						'description' 	=>	array(
												'en' => 'Modernizr module', 
											), 
						'author' 		=>	"JB", 
						'author_website'=>	"", 
						'website'		=>	"http://cimx2.com", 
						'is_system'		=>	FALSE, 
						'is_admin'		=>	FALSE, 
						'is_frontend'	=>	TRUE, 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
