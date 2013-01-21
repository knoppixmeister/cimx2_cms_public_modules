<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Menus_groups_model extends MY_Model {
		function __construct() {
			parent::__construct();
		}

		function delete($id) {
			$menus = $this->menus_model->get_many_by('group_id', $id);

			foreach($menus as $m) {
				$this->menu_items_model->delete_by('menu_id', $m['id']);
				$this->menus_model->delete($m['id']);
			}

			return parent::delete($id);
		}
	}
