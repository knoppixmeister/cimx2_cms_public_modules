<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class JQuery_Countdown_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version'		=>	"1.0", 
						'name'			=>	array(
												'en' => 'JQuery Countdown', 
											), 
						'description' 	=>	array(
												'en' => 'JQuery Countdown module', 
											), 
						'author' 		=>	"Martin Conte Mac Donell", 
						'author_website'=>	"reflejo@gmail.com", 
						'website'		=>	"http://swsynth.com", 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
