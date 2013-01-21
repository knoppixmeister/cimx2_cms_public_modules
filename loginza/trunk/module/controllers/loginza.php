<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Loginza extends Frontend_Controller {
		function __construct() {
			parent::__construct();
		}

		function check_token_key() {
			$url = 	'http://loginza.ru/api/authinfo?token='.$_REQUEST['token']
					.'&id='.config_item('loginza_widget_id')
					.'&sig='.md5($_REQUEST['token'].config_item('loginza_widget_secret_key'));

			$res = file_get_contents($url);

			Debug::dump(json_decode($res));
		}
	}
