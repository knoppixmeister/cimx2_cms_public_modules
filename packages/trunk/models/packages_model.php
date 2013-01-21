<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Packages_model extends MY_Model {
		function __construct() {
			parent::__construct();
		}

		function install($pkg_file) {
			$unpack_dir = FCPATH."public/uploads/packages/pkg_unpack_".uniqid()."/";

			if(!file_exists($unpack_dir)) mkdir($unpack_dir, 0777, TRUE);

			$this->zip->unzip($pkg_file, $unpack_dir);

			if($dh = opendir($unpack_dir)) {
				while(($file = readdir($unpack_dir)) !== FALSE) {
					if(filetype($unpack_dir.$file) == "dir" && !str_starts_with($file, '.')) {
						
						
						
						
						if(file_exists($dir.$file."/".$file."_module".EXT)) return $dir;
					}
				}
			}

			return TRUE;
		}
	}
