<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Phpinfo_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version'		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Php info', 
											), 
						'description'	=>	array(
												'en' => 'Phpinfo module', 
											), 
						'author'		=>	"JB (knoppixmeister@gmail.com)", 
						'author_website'=>	"http://swsynth.com", 
						'website'		=>	"http://swsynth.com", 
						'admin_menu'	=>	array(
												'url' 	=>	admin_url('phpinfo'), 
												'title' =>	'phpinfo', 
											), 
					);
		}

		function install() {
			return TRUE;
		}

		function uninstall() {
			return TRUE;
		}
	}
