<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Menus_items extends Admin_Auth_List_Controller {
		private $_parents_options = array(0 => '', ); 

		function __construct() {
			parent::__construct();

			$this->load->config('menus/config');
		}

		function add($menu_id) {
			$this->_edit(NULL, "add", $menu_id);
		}

		function edit($menu_id, $item_id) {
			$this->_edit($item_id, "edit", $menu_id);
		}

		function _edit($id=NULL, $action="edit", $menu_id=NULL) {
			if($this->input->get_post('cancel')) redirect(admin_url('menus/view/'.$menu_id, TRUE));

			if($action == "edit") {
				$this->data['action_url'] 	= admin_url('menus/'.$menu_id.'/items/edit/'.$id);
				$this->data['item'] 		= $this->menu_items_model->get($id);
			}
			else $this->data['action_url'] = admin_url('menus/'.$menu_id.'/items/add');

			if(!$this->form_validation->run('menus_items/_edit')) {
				$this->data['parents'] = $this->_parents_options($id, $menu_id);

				$this->template->build('admin/items/edit', $this->data);
			}
			else {
				$data = array(
							'menu_id'	=>	$menu_id, 
							'parent_id' =>	$this->input->get_post('parent'), 
							'title_type'=>	$this->input->get_post('title_type'), 
							'title' 	=>	$this->input->get_post('title', TRUE), 
							'type'		=>	$this->input->get_post('type', TRUE), 
							'value' 	=>	$this->input->get_post('value', TRUE), 
							'class'		=>	$this->input->get_post('class', TRUE), 
							'target' 	=> 	$this->input->get_post('target', TRUE), 
						);

				if($action == "edit") $this->menu_items_model->update($id, $data, TRUE);
				else $id = $this->menu_items_model->insert($data, TRUE);

				$this->session->set_flashdata('success_msg', "Data saved");

				if($this->input->get_post('save_exit')) redirect(admin_url('menus/view/'.$menu_id, TRUE));
				else redirect(admin_url('menus/'.$menu_id.'/items/edit/'.$id));
			}
		}

		private function _parents_options($item_id, $menu_id, $parent_id=0, $padding=0) {
			foreach($this->menu_items_model->get_items_tree($menu_id, $parent_id) as $mi) {
				if($mi['id'] == $item_id) continue;

				$this->_parents_options[$mi['id']] = str_repeat('&nbsp;', $padding).$mi['title'];

				if($mi['child_items']) $this->_parents_options($item_id, $menu_id, $mi['id'], $padding+5);
			}

			return $this->_parents_options;
		}
	}
