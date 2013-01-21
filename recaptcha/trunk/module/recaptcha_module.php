<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Recaptcha_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 			=>	"1.0", 
						'name'				=> 	array(
													'en' => 'Recaptcha', 
												), 
						'description' 		=>	array(
													'en' => 'Recaptcha module', 
												), 
						'author' 			=>	"JB", 
						'author_website'	=>	"http://swsynth.com", 
						'website'			=>	"http://swsynth.com", 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
