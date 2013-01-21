<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Menus_Tag extends Tag {
		function __construct() {
			$this->load->model(array('menus/menus_model', 'menus/menu_items_model', ));
		}

		function show() {
			$id = $this->get_attribute('id');

			return $this->_get_menu($id);
		}

		function group() {
			$id = $this->get_attribute('id');

			$menus = $this->menus_model->get_many_by('group_id', $id);

			$res = '<div class="">';
			foreach($menus as $m) {
				$res .= $this->_get_menu($m['id']);
			}
			$res .= '</div>';

			return $res;
		}

		private function _get_menu($id, $parent_id=0) {
			$m = $this->menus_model->get($id);

			$res = '<ul class="'.($parent_id == 0 ? $m['class'] : "").'">';

			$items = $this->menu_items_model->get_items_tree($id, $parent_id);
			foreach($items as $i) {
				$res .= '<li class="'.$i['class'].'"><a href="#">'.($i['title_type'] == "text" ? $i['title'] : lang($i['title'])).'</a>';

				if(!empty($i['child_items'])) $res .= $this->_get_menu($id, $i['id']);

				$res .= '</li>';
			}

			$res .= '</ul>';

			return $res;
		}
	}
