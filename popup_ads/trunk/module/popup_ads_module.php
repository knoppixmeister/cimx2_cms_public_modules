<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Popup_ads_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Popup ads', 
											), 
						'description' 	=>	array(
												'en' => 'Popup ads overlay module', 
											), 
						'author' 		=>	"JB", 
						'author_website'=>	"http://swsynth.com", 
						'website'		=>	"http://cimx.com", 
						'is_admin'		=>	TRUE, 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
