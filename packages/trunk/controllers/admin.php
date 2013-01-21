<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Admin extends Admin_Auth_Controller {
		function __construct() {
			parent::__construct();
		}

		function upload() {
			if($this->input->get_post('cancel')) redirect(admin_url('packages', TRUE));

			$config['upload_path'] 		=	FCPATH.'public/uploads/packages/';

			if(!file_exists($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);

			$config['allowed_types'] 	=	'zip';
			$config['overwrite']		=	TRUE;
			$config['remove_spaces'] 	=	TRUE;

			$this->upload->initialize($config);

			if(!$this->upload->do_upload('package')) {
				if($_FILES) $this->data['error'] = $this->upload->display_errors();
				else $this->data['error'] = array();

				$this->template->build('packages/admin/upload', $this->data);
			}
			else {
				$data = $this->upload->data();

				$this->packages_model->install($data['full_path']);

				$this->session->set_flashdata('success_msg', 'Package uploaded');

				redirect(admin_url('packages', TRUE));
			}
		}
	}
