<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Packages_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Packages', 
											), 
						'description' 	=>	array(
												'en' => 'Packages management module', 
											), 
						'author' 		=>	"JB", 
						'author_website'=>	"http://swsynth.com", 
						'website'		=>	"http://swsynth.com", 
						'admin_menu'	=> 	array(
												'url'	=>	admin_url('packages'), 
												'title'	=>	'Packages', 
											), 
					);
		}

		function install() {
			if($this->db->platform() == "mysql") {
				$query1 = "	CREATE TABLE IF NOT EXISTS `package_entries` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `package_id` int(11) NOT NULL,
							  `type` enum('module','tag','helper','library','theme') NOT NULL,
							  `slug` varchar(255) NOT NULL,
							  `created_time` int(11) NOT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

				$query2 = "	CREATE TABLE IF NOT EXISTS `packages` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `version` varchar(255) NOT NULL,
							  `slug` varchar(255) NOT NULL,
							  `title` text NOT NULL,
							  `description` text NOT NULL,
							  `created_time` int(11) NOT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

				return 	$this->db->query($query1) &&  
						$this->db->query($query2);
			}
			elseif($this->db->platform() == "postgre") {
				return TRUE;
			}

			return FALSE;
		}

		function uninstall() {
			$this->load->dbforge();

			return	$this->dbforge->drop_table('package_entries') && 
					$this->dbforge->drop_table('packages');
		}
	}
