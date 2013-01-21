<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	$route['menus/admin/(:num)/items/edit/(:any)']	=	"menus_items/edit/$1/$2";
	$route['menus/admin/(:num)/items/(:any)']		=	"menus_items/$2/$1";

	$route['menus/admin/create/group/(:num)'] 	=	"admin/create/group/$1";
	$route['menus/admin/(groups|items)/(:any)']	=	"menus_$1/$2";
	$route['menus/admin/(groups|items)']		=	"menus_$1";
