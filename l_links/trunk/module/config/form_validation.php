<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	$config = 	array(
					'l/admin/edit' => 	array(
											array(
												'field'	=>	'long_url', 
												'label'	=>	'Long URL', 
												'rules'	=>	'required|trim|xss_clean', 
											), 
											array(
												'field'	=>	'slug', 
												'label'	=>	'Slug', 
												'rules'	=>	'required|trim|xss_clean|max_length[255]', 
											), 
										), 
				);
