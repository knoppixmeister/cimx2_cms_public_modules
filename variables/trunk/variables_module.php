<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Variables_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 	=> "1.0", 
						'name'		=> 	array(
											'en' => 'Variables', 
										), 
						'description' =>  	array(
												'en' => 'Variables module', 
											), 
						'author' 	=> "JB", 
						'site_url' 	=> "http://swsynth.com", 
						'menu'		=> 	array(
											'slug' 	=> 'variables', 
											'title' => 'Variables', 
										), 
					);
		}

		function install() {

			return TRUE;
		}
	}
