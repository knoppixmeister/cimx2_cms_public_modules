<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class JQuerytools_Tag extends Tag {
		function all() {
			$source =	'ext';
						//$this->get_attribute('source', 'local');// or 'ext'

			return	( 	$source == 'ext' ? 
						'<script src="http://cdn.jquerytools.org/1.2.7/all/jquery.tools.min.js"></script>' :
						'' 
					);
		}
	}
