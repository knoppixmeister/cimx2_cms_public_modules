<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Admin extends Admin_Auth_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$this->template->build('phpinfo/admin/index', $this->data);
		}

		function info() {
			phpinfo();
		}
	}
