<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Soundmanager2_Module extends Module {
		function __construct() {		
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Soundmanager 2', 
											), 
						'description' 	=>	array(
												'en' => 'Soundmanager 2 module', 
											), 
						'author' 		=>	"JB", 
						'author_website'=>	"http://swsynth.com", 
						'website'		=>	"http://cimx2.com", 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
