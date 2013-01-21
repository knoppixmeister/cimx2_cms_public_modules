<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Menus_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=> 	"1.0", 
							'name'		=> 	array(
												'en' => 'Menus', 
											), 
						'description' 	=>  	array(
												'en' => 'Navigation menus module', 
											), 
						'author' 		=> 	"JB", 
						'author_website'=>	"http://swsynth.com", 
						'website' 		=> 	"http://swsynth.com", 
						'admin_menu'	=> 	array(
												'url' 	=>	admin_url('menus'), 
												'title' =>	'Navigation menus', 
											), 
					);
		}

		function install() {
			$query1 = "	CREATE TABLE IF NOT EXISTS `menus_groups` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `title` text NOT NULL,
						  `slug` text NOT NULL,
						  `class` text NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

			$query2 = "	CREATE TABLE IF NOT EXISTS `menu_items` (
						  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
						  `parent_id` int(11) NOT NULL DEFAULT '0',
						  `menu_id` int(11) NOT NULL,
						  `title` text NOT NULL,
						  `type` enum('page','url','module') NOT NULL,
						  `value` text NOT NULL,
						  `class` text NOT NULL,
						  `target` text NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

			$query3 = "	CREATE TABLE IF NOT EXISTS `menus` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `group_id` int(11) NOT NULL,
						  `title` text NOT NULL,
						  `class` text,
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

			return 	$this->db->query($query1) && 
					$this->db->query($query2) && 
					$this->db->query($query3);
		}

		function uninstall() {
			$this->load->dbforge();

			return 	$this->dbforge->drop_table('menu_items') && 
					$this->dbforge->drop_table('menus') && 
					$this->dbforge->drop_table('menus_groups');
		}
	}
