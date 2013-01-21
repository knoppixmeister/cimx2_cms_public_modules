<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Admin extends Admin_Auth_List_Controller {
		function __construct() {
			parent::__construct();
		}

		protected function _list($page=1) {
			$this->data['title'] = "URL links shortener";

			$this->data['page'] 	= max(1, (int)$page);
			$this->data['per_page'] = 30;

			$mod_name = "links_model";

			$this->load->model($mod_name);

			$this->data['items'] = $this->$mod_name->order_by('id', 'DESC')
													->limit(
														$this->data['per_page'], 
														$this->data['per_page']*$this->data['page']-$this->data['per_page'] 
													)
													->get_all();

			if($this->data['page'] > 1 && count($this->data['items']) == 0) show_404();

			$this->data['items_count'] = $this->$mod_name->count_all();

			$this->template->build('l/admin/index', $this->data);
		}

		protected function _edit($id=NULL, $action="edit") {
			if(get_post('cancel')) redirect(admin_url($this->data['module'], TRUE));

			$this->data['action'] = strtolower($action);
			if($this->data['action'] == "edit") {
				$this->data['action_url'] = admin_url("l/edit/".$id);

				$mod_name = "links_model";

				$this->data['item'] = $this->$mod_name->get($id);

				if(empty($this->data['item'])) redirect(admin_url('l'));
			}
			else $this->data['action_url'] = admin_url($this->data['module']."/create", TRUE);

			if(!$this->form_validation->run('l/admin/edit')) {
				$this->template->build('l/admin/edit', $this->data);
			}
			else {
				$data = array(
							'long_url'	=>	get_post('long_url'), 
							'slug'		=>	get_post('slug'), 
						);

				if($this->data['action'] == 'add') {
					$data['created_time'] = time();

					$id = $this->links_model->insert($data, TRUE);
				}
				else $this->links_model->update($id, $data, TRUE);

				$this->session->set_flashdata('success_msg', 'Data saved.');

				if(get_post('save')) redirect(admin_url("l/edit/".$id));
				elseif(get_post('save_exit')) redirect(admin_url('l'));
			}
		}

		function stat($id=NULL) {
			

			$this->template->build('l/admin/stat', $this->data);
		}

		function delete($id=NULL) {
			
			
			redirect(admin_url('l'));
		}
	}
