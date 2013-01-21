<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Admin extends Admin_Auth_Controller {
		function __construct() {
			parent::__construct();

			$this->load->model('variables/variables_model');
		}

		function _edit($id=NULL, $action="edit") {
			parent::_edit($id, $action);

			$this->form_validation->set_rules('name',	'Name',		'required|trim|strtolower|alpha_dash|xss_clean');
			$this->form_validation->set_rules('value',	'Value', 	'required|trim|xss_clean');

			$mod_name = $this->data['module']."_model";

			if(!$this->form_validation->run()) {
				$this->template->enable_body_parser(FALSE)
								->build($this->data['module'].'/admin/edit', $this->data);
			}
			else {
				$data = array(
							'name'	=>	$this->input->get_post('name', TRUE), 
							'value'	=>	$this->input->get_post('value', TRUE), 
						);

				if($this->data['action'] == "add") $id = $this->$mod_name->insert($data, TRUE);
				else $this->$mod_name->update($id, $data, TRUE);

				$this->session->set_flashdata('success_msg', "Data saved");

				if($this->input->get_post('save_exit')) header("Location: ".base_url()."admin/".$this->data['module']);
				else header("Location: ".base_url()."admin/".$this->data['module']."/edit/".$id);
			}
		}
	}
