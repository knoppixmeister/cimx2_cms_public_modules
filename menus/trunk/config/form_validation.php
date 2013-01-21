<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	$config = 	array(
					'admin/_edit' => 	array(
											array(
												'field' => 	'group', 
												'label'	=>	'Group', 
												'rules'	=>	'required|numeric', 
											), 
											array(
												'field' => 	'title', 
												'label'	=>	'Title', 
												'rules'	=>	'required', 
											),
										), 
					'menus_items/_edit'	=> 	array(
												array(
													'field' => 	'parent', 
													'label'	=>	'Parent', 
													'rules'	=>	'numeric', 
												), 
												array(
													'field' => 	'title',
													'label'	=>	'Title', 
													'rules'	=>	'required', 
												), 
											), 
				);
