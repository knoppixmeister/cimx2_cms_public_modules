<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class L_Module extends Module {
		function __construct() {
			parent::__construct();
		}

		function get_info() {
			return 	array(
						'version' 		=>	"1.0", 
						'name'			=>	array(
												'en' => 'Links', 
											), 
						'description' 	=>	array(
												'en' => 'Links management module', 
											), 
						'author' 		=>	"JB", 
						'author_website'=>	"http://cimx2.com", 
						'website'		=>	"http://cimx2.com", 
						'admin_menu'	=>	array(
												'url'	=>	admin_url('l'), 
												'title'	=>	array(
																'en' => 'Links', 
															), 
											), 
						'is_admin'		=>	TRUE, 
						'is_frontend'	=>	TRUE, 
					);
		}

		function install() {
			if($this->db->platform() == "mysql") {
				$query1 = "	CREATE TABLE IF NOT EXISTS `links` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `long_url` text NOT NULL,
							  `slug` varchar(255) NOT NULL,
							  `clicks_count` int(11) NOT NULL DEFAULT '0',
							  `created_time` int(11) NOT NULL,
							  PRIMARY KEY (`id`),
							  UNIQUE KEY `slug` (`slug`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

				$query2 = "CREATE TABLE IF NOT EXISTS `links_stats` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `link_id` int(11) NOT NULL,
							  `ip` varchar(16) NOT NULL,
							  `browser` text,
							  `created_time` int(11) NOT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

				return 	$this->db->query($query1) && 
						$this->db->query($query2);
			}
			elseif($this->db->platform() == "postgre") {
				/*
				 * 	CREATE TABLE links (
					    id integer NOT NULL,
					    uri text NOT NULL,
					    real_url text NOT NULL,
					    description text
					);

					CREATE SEQUENCE links_id_seq
					    START WITH 1
					    INCREMENT BY 1
					    NO MINVALUE
					    NO MAXVALUE
					    CACHE 1;

					ALTER SEQUENCE links_id_seq OWNED BY links.id;
					
					ALTER TABLE links ALTER COLUMN id SET DEFAULT nextval('links_id_seq'::regclass);

					ALTER TABLE ONLY links
					    ADD CONSTRAINT links_pkey PRIMARY KEY (id);

					ALTER TABLE ONLY links
					    ADD CONSTRAINT links_uri_uniq UNIQUE (uri);

				 */

				return TRUE;
			}

			return FALSE;
		}

		function uninstall() {
			return $this->dbforge->drop_table("links") && $this->dbforge->drop_table("links_stats");
		}
	}
