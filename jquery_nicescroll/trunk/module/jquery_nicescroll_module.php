<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class JQuery_Nicescroll_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version'		=>	"1.0", 
						'name'			=>	array(
												'en' => 'JQuery NiceScroll', 
											), 
						'description'	=>	array(
												'en' => 'JQuery NiceScroll module', 
											), 
						'author'		=>	"", 
						'author_website'=>	"", 
						'website'		=>	"http://cimx2.com", 
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
