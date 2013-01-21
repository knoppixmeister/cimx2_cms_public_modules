<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Admin extends Admin_Auth_List_Controller {
		function __construct() {
			parent::__construct();

			$this->load->config('menus/config');
		}

		function _list($page=1) {
			$this->data['groups'] = $this->menus_groups_model->get_all();

			for($i=0; $i<count($this->data['groups']); $i++) {
				$this->data['groups'][$i]['menus'] = $this->menus_model->order_by('id', 'DESC')
																		->get_many_by(
																			'group_id', 
																			$this->data['groups'][$i]['id']
																		);
			}

			$this->template->enable_body_parser(FALSE)
							->build('menus/admin/index', $this->data);
		}

		function create($action=NULL, $param1=NULL) {
			$this->_edit(NULL, 'add', $param1);
		}

		function _edit($id=NULL, $action="edit", $group_id=NULL) {
			$this->data['group_id'] = $group_id;

			if($action == "edit") {
				$this->data['item'] 		= $this->menus_model->get($id);
				$this->data['action_url'] 	= admin_url('menus/edit/'.$id);
			}
			elseif($action == "add") {
				$this->data['action_url'] 	= admin_url('menus/create/group/'.$group_id);
			}

			if(!$this->form_validation->run('admin/_edit')) {
				$this->data['groups'] = array('' => '', );

				foreach($this->menus_groups_model->get_all() as $g) {
					$this->data['groups'][$g['id']] = $g['title'];
				}

				$this->template->enable_body_parser(FALSE)
								->build('menus/admin/edit', $this->data);
			}
			else {
				$data = array(
							'group_id'	=>	$this->input->get_post('group'), 
							'title' 	=> 	$this->input->get_post('title'), 
							'class'		=>	$this->input->get_post('class'), 
						);

				if($action == "edit") $this->menus_model->update($id, $data, TRUE);
				else $id = $this->menus_model->insert($data, TRUE);

				$this->session->set_flashdata('success_msg', "Data saved");

				if($this->input->get_post('save_exit')) redirect(admin_url('menus', TRUE));
				else redirect(admin_url('menus/edit/'.$id));
			}
		}

		function view($id) {
			$this->data['menu'] = $this->menus_model->get($id);

			$this->data['items'] = $this->menu_items_model->get_items_tree($id);

			$this->template->enable_body_parser(FALSE)
							->build('menus/admin/view', $this->data);
		}
	}
