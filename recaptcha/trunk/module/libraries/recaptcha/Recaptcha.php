<?php
	require_once dirname(__FILE__).'/recaptchalib.php';

	class Recaptcha {
		protected $theme = "red";
		protected $private_key = "";
		protected $public_key = "";
		protected $lang = "en";
		protected $type = "normal";//or 'mailhide' - currently not supported;
		protected $_resp = null;
		protected $CI = null;
		protected $tabindex = 0;
		protected $use_ssl = FALSE;
		protected $custom_theme_widget = "";

		function __construct($config = array()) {
			$this->CI = &get_instance();

			$this->CI->load->helper('array');

			if(count($config) > 0) $this->initialize($config);
		}

		function initialize($config = array()) {
			foreach($config as $key => $val) {
				if(isset($this->$key)) {
					$method = 'set_'.$key;

					if(method_exists($this, $method)) $this->$method($val);
					else $this->$key = $val;
				}
			}

			return $this;
		}

		function generate($error=null) {
			$res = '
			<script type="text/javascript">
				var RecaptchaOptions = {
					theme : \''.$this->theme.'\', ';

			if(strtolower($this->theme) == "custom") $res .= 'custom_theme_widget = \''.$this->custom_theme_widget.'\'';

			$res .= 'lang : \''.$this->lang.'\', 
					tabindex : '.$this->tabindex.' 
				};
			</script>'."\r\n".
			recaptcha_get_html($this->public_key, $error, $this->use_ssl);

			return $res;
		}

		function check_respond($user_code=NULL, $remote_addr=NULL, $recaptcha_challenge_field=NULL) {
			if(empty($user_code) && empty($remote_addr) && empty($recaptcha_challenge_field)) {
				$this->_resp = 	recaptcha_check_answer(
									$this->private_key, 
									$this->CI->input->server('REMOTE_ADDR'), 
                                	$this->CI->input->get_post("recaptcha_challenge_field"), 
                                	$this->CI->input->get_post("recaptcha_response_field") 
								);
			}
			else {
				$this->_resp = 	recaptcha_check_answer(
									$this->private_key, 
									$remote_addr, 
									$recaptcha_challenge_field, 
									$user_code 
								);
			}

			return $this->_resp->is_valid;
		}

		function get_error() {
			return !empty($this->_resp) ? $this->_resp->error : "";
		}
	}
