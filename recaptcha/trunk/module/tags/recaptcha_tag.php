<?php
	defined('BASEPATH') || exit('No direct script access allowed');

	class Recaptcha_Tag extends Tag {
		function show() {
			$this->load->config('recaptcha/recaptcha');

			$this->load->library('recaptcha/recaptcha/recaptcha', config_item('recaptcha'));

			return $this->recaptcha->generate($this->recaptcha->get_error());
		}
	}
