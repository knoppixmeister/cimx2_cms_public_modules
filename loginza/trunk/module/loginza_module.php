<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Loginza_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Loginza', 
											), 
						'description' 	=>	array(
												'en' => 'Loginza module', 
											), 
						'author' 		=>	"Loginza", 
						'author_website'=>	"http://loginza.ru", 
						'website'		=>	"http://loginza.ru", 
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
