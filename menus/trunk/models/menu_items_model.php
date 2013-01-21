<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Menu_items_model extends MY_Model {
		function __construct() {
			parent::__construct();
		}

		function get_items_tree($menu_id, $parent_id=0) {
			$res = $this->order_by('id', 'DESC')->get_many_by(array('menu_id' => $menu_id, 'parent_id' => $parent_id, ));
			for($i=0; $i<count($res); $i++) {
				$res[$i]['child_items'] = $this->get_items_tree($menu_id, $res[$i]['id']);
			}

			return $res;
		}
	}
