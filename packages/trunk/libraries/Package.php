<?php
	

	class Package {
		abstract function install();
		abstract function after_install();
		abstract function uninstall();
	}
