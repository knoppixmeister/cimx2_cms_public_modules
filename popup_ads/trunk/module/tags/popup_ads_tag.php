<?php
	

	class Popup_ads_Tag extends Tag {
		function show() {
			$id = $this->get_attribute("id");

			return $this->load->view('popup_ads/popup', $this->data, TRUE);
		}
	}
