<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Menus_Groups extends Admin_Auth_List_Controller {
		function __construct() {
			parent::__construct();

			$this->load->config('menus/config');
		}

		function index() {
			redirect(admin_url('menus'));
		}

		function _edit($id=NULL, $action="edit") {
			if($this->input->get_post('cancel')) redirect(admin_url('menus'));

			$mod_name = "menus_groups_model";

			$this->data['action'] = strtolower($action);

			$this->form_validation->set_rules('title',	'Title',	'required|trim');
			$this->form_validation->set_rules('slug',	'Url',		'required|trim|alpha_dash|callback__category_slug_uniq'.($this->data['action'] == "edit" ? "[".$id."]" : "" ));
			$this->form_validation->set_rules('class',	'Class',	'trim');

			if(!$this->form_validation->run()) {
				if($this->data['action'] == "edit") {
					$this->data['action_url'] = admin_url('menus/groups/edit/'.$id);

					$this->data['item'] = $this->$mod_name->get($id);
				}
				else $this->data['action_url'] = admin_url('menus/groups/create');

				$this->template->build('menus/admin/groups/edit', $this->data);
			}
			else {
				$data = array(
							'slug'	=> $this->input->get_post('slug', TRUE), 
							'title'	=> $this->input->get_post('title', TRUE), 
							'class'	=> $this->input->get_post('class', TRUE), 
						);

				if($this->data['action'] == "add") $id = $this->$mod_name->insert($data, TRUE);
				else $this->$mod_name->update($id, $data, TRUE);

				$this->session->set_flashdata('success_msg', "Data saved");

				redirect(admin_url('menus/groups/edit/'.$id, TRUE));
			}
		}

		function delete($id=NULL) {
			$this->menus_groups_model->delete($id);

			redirect(admin_url('menus'));
		}
	}
